<?php
namespace app\thome\controller;


use think\Controller;
use think\Db;

class Article extends Controller
{
    public function index()
    {
        return $this->fetch();
    }


    public function listArc()
    {
        $list = Db::table('article')->where('site_id',0)->field("id,catid,title,description,thumb,click")->order(['is_top'=>'ASC','id'=>'desc'])->paginate(10);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function show($aid){

        $arc = Db::table('article')->where('id',$aid)->field("title,content")->find();
        if(!$arc) {
            $this->error('文章不存在');
        }
        $this->assign('arc',$arc);
        return $this->fetch();
    }



}
