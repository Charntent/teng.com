<?php
namespace app\thome\controller;


use think\Controller;
use app\thome\model\User;
use think\facade\Session;
use think\model\concern\TimeStamp;


class Passport extends Controller
{
    public function index()
    {
        if(Session::get('user_id')) {
            $this->redirect('/thome/console');
        }
       return $this->fetch();
    }

    public function login()
    {
        //用户登录，如果没有的直接注册
        if(Session::get('user_id')) {
            $this->error('请勿重新登录',url('/thome/console'));
        }
        $data = $this->request->request();
        $result = $this->validate($data,'User.save');
        if(true !== $result){
            // 验证失败 输出错误信息
            $this->error($result);
        }
        $User = new User();
        $res = $User->getByPhone($data['phone']);
        if ($res) {
            if(!checkPwd($res['userpwd'],$data['password'],$res['salt'])) {
                $this->error('密码错误');
            }
            $User = User::get($res['user_id']);
            $User->lastlogintime = time();
            $User->lastip        = $this->request->ip();
            //$User->loginnum      = $User->loginnum + 1;
            $User->save();
            $User->setInc('loginnum');
            $userId = $res['user_id'];
        } else {
            $data['salt']    = randomkeys(6);
            $data['userpwd'] = makePwd($data['password'],$data['salt']);
            //自动注册
            $userId = $User->saveUser($data);
        }
        Session::set('user_id',$userId);
        $this->success('登录成功',url('/thome/console'),['user_id'=>$userId]);
    }

    public function find()
    {
        return $this->fetch();
    }

    public function editpwd()
    {
        return $this->fetch();
    }

    public function editpwdPost()
    {
        if(!session('user_id')) {
            $this->error('请登陆系统');
        }

        $data = $this->request->post();
        if($data['oldpwd'] == '' || $data['newpwd'] ==''){
            $this->error('密码不能为空!');
        }

        if($data['newpwd']  != $data['newpwd1']){
            $this->error('两次输入的密码不相同!');
        }
        $adminid =  Session::get('user_id');
        $ps = model('user')->where("user_id='$adminid'")->field(['salt','userpwd'])->find();


        if(!checkPwd($ps['userpwd'],$data['oldpwd'],$ps['salt'])){
            $this->error('旧密码输入错误!');
        }
        $salt = $ps['salt'];
        $new_pwd = makePwd($data['newpwd'],$salt);
        model('user')->isUpdate(true)->save(['user_id' => $adminid, 'userpwd' => $new_pwd]);


        return $this->success('修改成功');
    }



}
