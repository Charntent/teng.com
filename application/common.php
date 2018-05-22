<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function checkPwd($upwd,$pwd,$salt = '')
{
   return md5($pwd.$salt)  == $upwd;
}

function randomkeys($length,$type=0)
{
    $pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
    $key ="";

    for($i=0;$i<$length;$i++)
    {
        $key .= $pattern{mt_rand(0,$type==0?35:$type)};    //生成php随机数
    }
    return $key;
}

function makePwd($pwd,$salt = ''){
    $salt = $salt?$salt:randomkeys(6);
    return md5($pwd.$salt);
}