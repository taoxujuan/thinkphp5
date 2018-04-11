<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	// 判断用户是否登录
    	if(!session('username')){
            $this->redirect(url('login/login')); 
        }
        return $this->fetch();
    }
}
