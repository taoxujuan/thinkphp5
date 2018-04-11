<?php
namespace app\index\controller;
use think\Controller;

use app\index\model\AccountModel;

class Account extends Controller
{
    public function account()
    {
        return $this->fetch();
    }
    public function getAccList()
    {
    	//判断是否是ajax操作
    	if(request()->isGet()){
    		$param = input('param.');
    	
    		$limit = $param['pageSize'];
    		$offset = ($param['pageNumber'] - 1) * $limit;

    		$account = model('AccountModel');
    		$selectResult = $account->getList($offset,$limit);
    		//返回值
    		$return['total'] = $account->getCount();  // 总数据
            $return['rows'] = $selectResult;
           	$return['success'] = 1;
            return json($return);
         }
    }
    public function addAccount()
    {
    	if (request()->isPost()) {
    		$param = input('post.');

    		$account = model('AccountModel');
    		$flag = $account->addData($param);

    		return json(msg($flag['success'], $flag['data'], $flag['msg']));
    	}
    }
    public function updateAccount()
    {
    	if (request()->isPost()) {
    		$param = input('post.');

    		$account = model('AccountModel');
    		$flag = $account->updateData($param);

    		return json(msg($flag['success'], $flag['data'], $flag['msg']));
    	}
    }
    public function delAccount()
    {
    	$id = input('param.id');

        $account = model('AccountModel');
    	$flag = $account->delData($id);
        return json(msg($flag['success'], $flag['data'], $flag['msg']));
    }
}
