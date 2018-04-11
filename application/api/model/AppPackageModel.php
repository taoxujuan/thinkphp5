<?php
namespace app\api\model;

use think\Model;

class AppPackageModel extends Model{
	//数据库名字
	protected $name = 'pack';

	/**
		添加包裹信息
	   @param $param
	**/
	public function addDatas($param)
	{
		$insertArr = [];
		$arr = $param['commodityArr'];

		foreach ($arr as $vo) { // $arr是原数组
		    $temp = $vo;
		    $temp['bar_code'] = $vo['bar_code'];
            $temp['commodity_num'] = $vo['commodity_num'];
            $temp['oper_id'] = $param['oper_id'];
            $temp['pack_id'] = $param['pack_id'];
            $temp['site_id'] = $param['site_id'];
            $temp['submit_time'] = $param['submit_time'];
		    array_push($insertArr,$temp);
		}
        try{
            $result = $this->saveAll($insertArr);
            if(false === $result){
                return msg(0, '', $this->getError());
            }else{
                return msg(1, '1', "添加成功");
            }
        }catch (\Exception $e){
            return msg(0, '', $e->getMessage());
        }
	}

}