<?php
namespace app\thome\controller;


use think\Controller;
use app\thome\model\Sites as Msites;



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

    public function dataPost()
    {
        //开始保存网站
        $data = $this->request->request();
        $result = $this->validate($data,'app\thome\validate\Sites.save');

        if(true !== $result){
            // 验证失败 输出错误信息
            $this->error($result);
        }
     
        $Sites = new Msites();
        $Sites->saveData($data);
        $this->success('添加成功');
   }


    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( ROOT_PATH.'/uploads');
        if($info){
            $this->success('cheng','',['url'=>'/uploads/'.$info->getSaveName()]);
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }

}
