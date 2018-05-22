<?php
namespace app\thome\controller;



define('SITEID',1);
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



}
