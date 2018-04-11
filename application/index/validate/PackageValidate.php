<?php
namespace app\index\validate;

use think\Validate;

class PackageValidate extends Validate {
    protected $rule = [
        ['id', 'require', 'id不能为空'],
        ['commodity_num', 'require', '商品数量不能为空']
    ];
}