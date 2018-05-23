<?php
namespace app\thome\controller;


use think\Controller;




class Sites extends Controller
{
    public function index()
    {
        return $this->fetch();
    }


    public function add()
    {
        return $this->fetch();
    }

    public function addPost()
    {
        //开始保存网站
    }

}
