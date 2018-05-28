<?php
namespace app\thome\controller;
define('SITEID',1);
use think\Controller;
class Index extends Controller
{
    public function index()
    {
       return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function contact()
    {
        return $this->fetch();
    }
}
