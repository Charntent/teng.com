<?php
namespace app\thome\controller;


use app\thome\controller\Auth;
use think\Db;

class User extends Auth
{
    public function index()
    {
        return $this->fetch();
    }

    /*
     *  余额的获取
     *  void()
     *
     */
    public function balance()
    {

        $balance = Db::name('user')->where('user_id',$this->user_id)->value('balance');
        $this->assign('balance',$balance);
        return $this->fetch();
    }


    /*
     *  交易明细的获取
     *  void()
     *
     */
    public function trade()
    {
        if($this->request->isAjax()) {
            $list = Db::name('trade')->where('user_id',$this->user_id)->order("id","desc")->paginate(10)->toArray();
            // 把分页数据赋值给模板变量list
            foreach ($list['data'] as $k=>$v) {
                $v['money']  = $this->formatPrice($v['money'],true);
                $v['nowmoney']  = $this->formatPrice($v['nowmoney']);
                $v['addtime']  = $this->formatDate($v['addtime']);
                $v['paytype']  = payTypeFormat($v['paytype']);
                $v['tradetype']  = tradeTypeFormat($v['tradetype']);

                $list['data'][$k] = $v;
            }
            return  $this->changeDataToTable($list);
        }

        return $this->fetch();
    }

    /*
    *  充值的获取
    *  void()
    *
    */
    public function recharge()
    {

        $balance = Db::name('user')->where('user_id',$this->user_id)->value('balance');
        $this->assign('balance',$balance);
        return $this->fetch();
    }

    /*
    *  收益的获取
    *  void()
    *
    */
    public function profit()
    {

        $balance = Db::name('user')->where('user_id',$this->user_id)->value('balance');
        $this->assign('balance',$balance);
        return $this->fetch();
    }


}
