<?php



namespace app\thome\controller;
use think\Controller;
class Compnent extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

}
