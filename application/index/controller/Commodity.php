<?php
namespace app\index\controller;
use think\Controller;

use app\index\model\CommodityModel;

class Commodity extends Controller
{
    public function commodity()
    {
        return $this->fetch();
    }
    //获取商品列表数据
    public function getList()
    {
    	//判断是否是ajax操作
    	if(request()->isGet()){
    		$param = input('param.');
    	
    		$limit = $param['pageSize'];
    		$offset = ($param['pageNumber'] - 1) * $limit;

    		$where = [];
    		//条件查询
    		if (!empty($param['searchText'])) {
    			$where['bar_code'] = $param['searchText'];
    		}

    		$commodity = model('CommodityModel');
    		$selectResult = $commodity->getDataList($where,$offset,$limit);
    		//返回值
    		$return['total'] = $commodity->getCount($where);  // 总数据
            $return['rows'] = $selectResult;
           	$return['success'] = 1;
            return json($return);
         }
    }
    //添加商品
    public function addCommodity()
    {
    	if (request()->isPost()) {
    		$param = input('post.');

    		$param['price'] = "0";

    		$commodity = model('CommodityModel');
    		$flag = $commodity->addData($param);

    		return json(msg($flag['success'], $flag['data'], $flag['msg']));
    	}
    }
    //修改商品
    public function updateCommodity()
    {
    	if (request()->isPost()) {
    		$param = input('post.');

    		$commodity = model('CommodityModel');
    		$flag = $commodity->updateData($param);

    		return json(msg($flag['success'], $flag['data'], $flag['msg']));
    	}
    }
    //删除商品
    public function delCommodity()
    {
    	$id = input('param.id');

        $commodity = model('CommodityModel');
    	$flag = $commodity->delData($id);
        return json(msg($flag['success'], $flag['data'], $flag['msg']));
    }
}
