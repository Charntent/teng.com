<?php
namespace app\thome\controller;

use think\Controller;
use app\thome\model\User;
use think\facade\Session;
use think\model\concern\TimeStamp;


class Sites extends Controller
{
  
    public function index()
    {
        if (Session::get('user_id')) {
            $this->redirect('/thome/console');
        }
        return $this->fetch();
    }
}