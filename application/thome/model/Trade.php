<?php
namespace app\thome\model;


use think\Model;


class Trade extends Model
{
    protected $type = [
        'addtime'    =>  'datetime'
    ];

    public function getList($where,$nums)
    {
        return $this->where($where)->order('id','desc')->paginate($nums)->toArray();
    }
}