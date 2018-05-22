<?php


namespace app\thome\controller;

use think\Controller;
use think\facade\Session;

class Console extends Controller
{
    public function index()
    {
        $this->assign('adminName', '藤1');
        return $this->fetch();
    }


    public function homepage()
    {
        return $this->fetch();
    }

    public function logout()
    {
        Session::delete('user_id');
        $this->redirect('/passport');
    }

}
