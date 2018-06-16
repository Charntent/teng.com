<?php

namespace app\thome\validate;
use think\Validate;


class Sites extends Validate{

    protected $rule =   [
        'site_name'  => 'require|max:25',
        'site_logo'   => 'require',
        'font_max'   => 'number',
        'font_mid'   => 'number',
        'font_small'   => 'number',
        'color_main'   => 'require',
        'color_minor'   => 'require',
        'color_light'   => 'require',
       ];

    protected $message  =   [
        'phone'        => '手机号码不正确',
        'password'     => '密码不正确'
    ];

    protected $scene = [
        'save'  =>  ['site_name','site_logo','font_max','font_mid','font_small','color_main','color_minor','color_light'],
    ];

    protected function checkPhone($value)
    {
        return preg_match('/^1[347589]{1}\d{9}$/', $value)?true:false;
    }

    protected function checkPwd($value,$rule,$data=[])
    {
        return preg_match('/^[\S]{6,12}$/', $value)?true:false;
    }


}



