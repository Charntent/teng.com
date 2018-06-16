<?php

namespace app\thome\model;
use think\facade\Request;
use think\Model;


class Sites extends Model{

    protected $insert = [
        'add_time'
    ];

    protected $pk = 'user_id';

    protected function setAddtimeAttr()
    {
        return time();
    }

    

    public function saveData($data)
    {
        return $this->data($data)->allowField(
           ['site_name',
            'site_logo',
            'font_max',
            'font_mid',
            'font_small',
            'color_main',
            'color_minor',
            'color_light'
       ])->save();   
       
    }


}



