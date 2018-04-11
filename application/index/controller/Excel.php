<?php
namespace app\index\controller;
use think\Controller;
use think\Validate;

use PHPExcel_IOFactory;
use PHPExcel;

class Excel extends Controller
{
    //导入数据
    public function into()
    {
        if (request()->isPost()) {
            vendor("PHPExcel.PHPExcel");
            vendor("PHPExcel.PHPExcel.Writer.Excel5");
            vendor("PHPExcel.PHPExcel.Writer.Excel2007");
            vendor("PHPExcel.PHPExcel.IOFactory");

            //实例化PHPExcel
            $objPHPExcel = new \PHPExcel();
            $file = request()->file('myfile');

            if (!empty($file)) {
                $file_types = explode(".", $_FILES ['myfile'] ['name']);
                $file_type = $file_types [count($file_types) - 1];//xls后缀
                $file_name = $file_types [count($file_types) - 2];//xls去后缀的文件名
                /*判别是不是.xls文件，判别是不是excel文件*/
                if (strtolower($file_type) != "xls" && strtolower($file_type) != "xlsx") {
                    echo '不是Excel文件，重新上传';
                    die;
                }

                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');//上传位置
                $path = ROOT_PATH . 'public' . DS . 'uploads' . DS;
                $file_path = $path . $info->getSaveName();//上传后的EXCEL路径

                $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                //获取上传的excel表格的数据，形成数组
                if($extension == 'xlsx') {  
                    $objReader =\PHPExcel_IOFactory::createReader('Excel2007');  
                    $objPHPExcel = \PHPExcel_IOFactory::load($file_path);  
                }else if($extension == 'xls'){  
                    $objReader =\PHPExcel_IOFactory::createReader('Excel5');  
                    $objPHPExcel = \PHPExcel_IOFactory::load($file_path);
                }  
  
                $excel_array = $objPHPExcel->getsheet(0)->toArray();   //转换为数组格式  
                array_shift($excel_array);
                // dump($excel_array); //查看数组

                $res = [];
                foreach($excel_array as $k=>$v) {
                        $res[$k]['bar_code'] = $v[0];  
                        $res[$k]['name'] = $v[1];  
                        $res[$k]['brand_name'] = $v[2];  
                        $res[$k]['specification'] = $v[3];  
                        $res[$k]['price'] = $v[4];   
                }
                db('commodity')->insertAll($res);
                $this->redirect(url('commodity/commodity')); 
            }
        }
    }
    //导出数据
    public function out()
    {
        
        $path = dirname(__FILE__);
        vendor("PHPExcel.PHPExcel");
        vendor("PHPExcel.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.PHPExcel.IOFactory");

        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);

        // 设置表格样式
        $objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
    
        $filename ='商品信息'.date('Ymd').'.xls';

        $sql = db('commodity')->select();

        // /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '商品条码')
            ->setCellValue('B1', '商品名称')
            ->setCellValue('C1', '品牌名称')
            ->setCellValue('D1', '规格')
            ->setCellValue('E1', '价格');
        // /*--------------开始从数据库提取信息插入Excel表中------------------*/

        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = db('commodity')->count();  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $sql[$i-2]['bar_code']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $sql[$i-2]['brand_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $sql[$i-2]['specification']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $sql[$i-2]['price']);
        }
        //     /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('商品信息');  //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);     //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename='.$filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
}