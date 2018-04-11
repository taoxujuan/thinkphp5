<?php
namespace app\index\controller;
use think\Controller;

use app\index\model\SameModel;


class Same extends Controller
{
    public function same()
    {
        return $this->fetch();
    }
    //获取相同商品列表
    public function getSameList()
    {
    	$param = input('param.');
    	
    	$limit = $param['pageSize'];
    	$offset = ($param['pageNumber'] - 1) * $limit;

        //实例化model
    	$same = model('SameModel');
		$selectResult = $same->getSame($offset,$limit);
		// //返回值
		$return['total'] = $same->getSameCount();
        $return['rows'] = $selectResult;
       	$return['success'] = 1;
        return json($return);
    }
    //删除重复商品
    public function delSame(){
    	$id = input('param.id');

        $same = model('SameModel');
    	$flag = $same->delSame($id);
        return json(msg($flag['success'], $flag['data'], $flag['msg']));
    }
}
