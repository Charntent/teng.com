<?php

namespace app\thome\validate;
use think\Validate;


class Sites extends Validate{

    protected $rule =   [
        'site_name'  => 'require|max:25',
        'site_logo'   => 'require',
    ];

    protected $message  =   [
        'phone'        => '手机号码不正确',
        'password'     => '密码不正确'
    ];

    protected $scene = [
        'save'  =>  ['phone','password'],
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



