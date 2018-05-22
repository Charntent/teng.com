<?php

namespace app\thome\model;
use think\facade\Request;
use think\Model;


class User extends Model{

    protected $insert = [
        'regtime',
        'lastlogintime',
        'regip',
        'lastip',
        'loginnum'
    ];

    protected $pk = 'user_id';

    protected function setRegtimeAttr()
    {
        return time();
    }

    protected function setLastlogintimeAttr()
    {
        return time();
    }

    protected function setLoginnumAttr()
    {
        return 1;
    }

    protected function setRegipAttr()
    {
        return Request::ip();
    }

    protected function setLastipAttr()
    {
        return Request::ip();
    }

    public function saveUser($data)
    {
       $this->data($data)->allowField(['phone','userpwd','salt'])->save();
       return $this->user_id;
    }


    public function getByPhone($phone)
    {
         return $this->where(['phone'=>$phone])->field('user_id,userpwd,salt')->find();
    }

}



