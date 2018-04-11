<?php
namespace app\index\controller;
use think\Controller;

use app\index\model\PackageModel;

class Package extends Controller
{
    public function package()
    {
        return $this->fetch();
    }
    //获取包裹列表数据
    public function getPackList()
    {
    	//判断是否是ajax操作
    	if(request()->isGet()){
    		$param = input('param.');
    	
    		$limit = $param['pageSize'];
    		$offset = ($param['pageNumber'] - 1) * $limit;

    		$where = [];
    		//条件查询
    		if (!empty($param['searchText'])) {
    			// $where['pack_id'] = ['like', '%' . $param['searchText'] . '%'];
                $where['pack_id'] = $param['searchText'];
    		}
            if (!empty($param['startDate']) && !empty($param['endDate'])) {
                $where['submit_time'] = ['between time', [$param['startDate'], $param['endDate']]];
            }

    		$package = model('packageModel');
    		$selectResult = $package->getPackList($where,$offset,$limit);
    		//返回值
    		$return['total'] = $package->getCount($where);  // 总数据
            $return['rows'] = $selectResult;
           	$return['success'] = 1;
            return json($return);
         }
    }
    // //修改商品数量
    public function updateNum()
    {
    	if (request()->isPost()) {
    		$param = input('post.');

    		$package = model('packageModel');
    		$flag = $package->updateData($param);

    		return json(msg($flag['success'], $flag['data'], $flag['msg']));
    	}
    }
    // //删除商品
    public function delPack()
    {
    	$id = input('param.id');

        $package = model('packageModel');
    	$flag = $package->delData($id);
        return json(msg($flag['success'], $flag['data'], $flag['msg']));
    }
}
