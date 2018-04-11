<?php
namespace app\index\validate;

use think\Validate;

class AccountValidate extends Validate {
    protected $rule = [
        ['name', 'require|unique:user', '账号不能为空|该账号已存在'],
        ['password', 'require', '密码不能为空'],
        ['site_id', 'require|number', '网店编码不能为空|网店编码必须为数字']
    ];
}