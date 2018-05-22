<?php
namespace app\thome\controller;
define('SITEID',1);
use think\Controller;
class Cases extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

}
