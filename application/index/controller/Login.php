<?php
namespace app\index\controller;
use think\Controller;

use think\Captcha;

class Login extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
    public function logincheck() {
        $param = input('post.');
        //验证验证码
        $code = $param['code'];
        $captcha = new \think\captcha\Captcha();
        $result=$captcha->check($code);  
        if($result===false){  
            $data = ['success'=>0,'msg'=>'验证码错误'];
            return json($data); 
        }  
        // 验证用户名
        $has = db('admin')->where('name', $param['name'])->find();
        if(empty($has)){
            $data = ['success'=>0,'msg'=>'用户名错误'];
            return json($data);
        }
        if($has['password'] != $param['password']){
            $data = ['success'=>0,'msg'=>'密码错误'];
            return json($data);
        }

        //存储用户登录信息
        session('username', $param['name']);

        $data = ['success'=>1,'msg'=>'登陆成功'];
        return json($data); 
    }
    // 验证码 
    public function show_captcha(){  
        $captcha = new \think\captcha\Captcha();  
        $captcha->imageW=121;  
        $captcha->imageH = 32;  //图片高  
        $captcha->fontSize =14;  //字体大小  
        $captcha->length   = 4;  //字符数  
        $captcha->fontttf = '5.ttf';  //字体  
        $captcha->expire = 30;  //有效期  
        $captcha->useNoise = false;  //不添加杂点  
        return $captcha->entry();  
    }
    //登出
    public function loginout(){
        session('username', null);
        return $this->redirect(url('login'));
    }
}