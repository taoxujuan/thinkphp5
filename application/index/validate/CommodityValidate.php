<?php
namespace app\index\validate;

use think\Validate;

class CommodityValidate extends Validate {
    protected $rule = [
        ['bar_code', 'require', '商品条码不能为空'],
        ['name', 'require', '商品名称不能为空'],
        ['brand_name', 'require', '品牌名称不能为空'],
        ['specification', 'require', '规格不能为空']
    ];
}