<?php
namespace app\index\model;

use think\Model;

class CommodityModel extends Model{
	//数据库名字
	protected $name = 'commodity';
	//获取列表
	/**
		$map. 查询条件
		$pageSize 每页条数
		$pageNumber 页数 
	**/
	public function getDataList($where,$offset,$limit){

		  return $this->where($where)->limit($offset, $limit)->order('id desc')->select();
	}
	//获取
	public function getCount($where)
    {
        return $this->where($where)->count();
    }
    /**
     * 添加商品
     * @param $param
     */
    public function addData($param)
    {
        try{
            $result = $this->validate('CommodityValidate')->save($param);
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

    /**
     * 编辑商品
     * @param $param
     */
    public function updateData($param)
    {
        try{

            $result = $this->validate('CommodityValidate')->save($param, ['id' => $param['id']]);

            if(false === $result){
                // 验证失败 输出错误信息
                return msg(0, '', $this->getError());
            }else{

                return msg(1, '1', '修改商品成功');
            }
        }catch(\Exception $e){
            return msg(0, '', $e->getMessage());
        }
    }
    /**
     * 根据商品的id获取商品信息
     * @param $id
     */
    public function getOneData($id)
    {
        return $this->where('id', $id)->find();
    }
    /**
     * 删除商品
     * @param $id
     */
    public function delData($id)
    {
        try{
            $this->where('id', $id)->delete();
            return msg(1, '1', '删除商品成功!');

        }catch(\Exception $e){
            return msg(0, '', $e->getMessage());
        }
    }
}