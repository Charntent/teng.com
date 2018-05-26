<?php
namespace app\thome\controller;


use think\Controller;


class Auth extends Controller
{
    protected $beforeActionList = [
        'checklogin'
    ];

    protected $user_id;


    public function checklogin()
    {
        $this->user_id = session('user_id');
        //用户登录，如果没有的直接注册
        if(!$this->user_id) {
            $this->error('请登录系统',url('/passport'));
        }
    }


    public function changeDataToTable($data){
        $data['code'] = 0;
        $data['msg']  =  '';
        $data['count'] = isset($data['total'])?$data['total']:0;
        return $data;
    }

    public function formatPrice($price,$red = false){
        if($red) {
            return '<span style="color: #f00">￥'.$price.'</span>';
        }else{
            return '￥'.$price;
        }
    }

    public function formatDate($intDate = null,$format = 'Y-m-d H:i:s'){

        if(is_null($intDate)) {
            $intDate = time();
        }
        return date($format,$intDate);

    }

    public function formatTradetype($intDate = null,$format = 'Y-m-d H:i:s'){

        if(is_null($intDate)) {
            $intDate = time();
        }
        return date($format,$intDate);

    }

}

