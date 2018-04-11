<?php
namespace app\api\model;

use think\Model;

class AppCommodityModel extends Model{
	//数据库名字
	protected $name = 'commodity';

    /**
     * 根据商品的bar_code获取商品信息
       获取id最大的数
     * @param $bar_code
     */
    public function getOneData($bar_code)
    {
        return $this->where('bar_code', $bar_code)->order('id desc')->find();
    }
    /**
     * 添加商品
     * @param $param
     */
    public function addData($param)
    {
        try{
            $result = $this->save($param);
            if(false === $result){
                // 验证失败 输出错误信息
                return msg(0, '', $this->getError());
            }else{

                return msg(1, '1', "添加商品成功");
            }
        }catch (\Exception $e){
            return msg(0, '', $e->getMessage());
        }
    }
}