<?php
namespace app\index\model;

use think\Model;

class SameModel extends Model{
	//数据库名字
	protected $name = 'commodity';
	//获取列表
	/** 
		$offset,$limit
	**/
	public function getSame($offset,$limit){
		  $condition = $this->field('bar_code')->group('bar_code')->having('count(bar_code)>1')->select();
		  //循环取出二维数组的值
		  $arr = [];
		  foreach ($condition as $k=>$v){
			  $arr[] = $condition[$k]["bar_code"];
		  }
		  return $this->where('bar_code','in',$arr)->limit($offset, $limit)->order('bar_code desc')->select();
	}
	//获取数据条数
	public function getSameCount()
    {
    	$condition = $this->field('bar_code')->group('bar_code')->having('count(bar_code)>1')->select();
	    //循环取出二维数组的值
	    $arr = [];
	    foreach ($condition as $k=>$v){
		  $arr[] = $condition[$k]["bar_code"];
	    }
        return $this->where('bar_code','in',$arr)->count();
    }
    /**
     * 删除商品
     * @param $id
     */
    public function delSame($id)
    {
        try{
            $this->where('id', $id)->delete();
            return msg(1, '1', '删除商品成功!');

        }catch(\Exception $e){
            return msg(0, '', $e->getMessage());
        }
    }
}