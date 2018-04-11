<?php
namespace app\api\controller;
use think\Controller;

class Loginapp extends Controller
{
    public function logincheck()
    {
        $param = input('post.');
        // 验证用户名
        $has = db('user')->where('name', $param['name'])->find();
        if(empty($has)){
            $data = ['success'=>0,'msg'=>'用户名错误'];
            return json($data);
        }
        if($has['password'] != $param['password']){
            $data = ['success'=>0,'msg'=>'密码错误'];
            return json($data);
        }

        $data = ['success'=>1,'msg'=>'登陆成功','site_id'=>$has['site_id']];
        return json($data); 
    }
}