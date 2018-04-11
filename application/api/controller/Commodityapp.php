<?php
namespace app\api\controller;
use think\Controller;

use app\api\model\AppCommodityModel;


class Commodityapp extends Controller
{
    //根据条码查询商品
    public function getCommodityByCode()
    {
        $bar_code = input('param.bar_code');

        $commodity = model('AppCommodityModel');
        $selectResult = $commodity->getOneData($bar_code);

        //返回值
        $return['data'] = $selectResult;
        $return['success'] = 1;
        return json($return);
    }
    //添加商品数据
    public function addCommodity()
    {
        $param = input('param.');

        $commodity = model('AppCommodityModel');
        $flag = $commodity->addData($param);
        return json($flag);
    }
}