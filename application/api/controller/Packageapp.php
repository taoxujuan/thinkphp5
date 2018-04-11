<?php
namespace app\api\controller;
use think\Controller;

use app\api\model\AppPackageModel;


class Packageapp extends Controller
{
    public function addPackageInfo()
    {
    	$param = input('param.');

    	$package = model('AppPackageModel');
    	$flag = $package->addDatas($param);

    	return json(msg($flag['success'], $flag['data'], $flag['msg']));
    }
}