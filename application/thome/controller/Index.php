<?php
namespace app\thome\controller;
define('SITEID',1);
use think\Controller;




class abc {

    public function __construct()
    {
        self::$obj = new NULLException();

    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    public  static function __callStatic($method,$args){
          return call_user_func([self::obj,$method],$args);
    }

    private static $obj;
}


class NULLException extends \Exception {

     public function __construct($message, $code = null)
     {
         parent::__construct($message, $code);
     }
}

class isNull {

    function __construct($name)
    {
        $this->name = $name;
    }

    function isnulla()
    {
        if($this->name == null) {
            throw new NULLException('name Mush No Empty');
        }
        echo $this->name;
    }

    private $name;
}

class Index extends Controller
{
    public function index()
    {
        /*$a = 0.8;
        $b = 0.8;
        echo bccomp($a,$b,1);
        echo $res = 0.5888*1000/10;
        echo gettype($res);
        echo intval($res);

       // var_dump(bcadd($a,$b,2) == 0.9);
        echo 0.84 == 0.84;
        $ar = ['2'];
        $br = ['22'];
        if($ar == $br) {
           echo '想的';
        }
        echo '<br>';
        echo $ss = 0xA0200;
        echo '<br>';
        echo --$ss;
        exit();*/

       /*try{
           $isNull = new isNull('2');
           $isNull2 = new isNull(null);
           $isNull->isnulla();
           $isNull2->isnulla();
       }catch (NULLException $e) {

           echo $e->getLine();
           echo $e->getMessage();

       }catch (\Exception $e){

       }*/

       /*$res = \ReflectionClass::export('\ReflectionClass');

       dump($res);

        exit();*/

       return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function contact()
    {
        return $this->fetch();
    }
}
