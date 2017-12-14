<?php
namespace Home\Controller;
use Common\Common\HomeController;
class IndexController extends HomeController {

    function index(){
        session_start();//定义session，同一IP登录不累加
        $filepath = 'count.txt';
        if ($_SESSION['temp'] == '')//判断$_SESSION[temp]的值是否为空,其中的temp为自定义的变量
        {
            if (!file_exists($filepath))//检查文件是否存在，不存在刚新建该文件并赋值为0
            {
                $fp = fopen($filepath,'w');
                fwrite($fp,0);
                fclose($fp);
                $this->counter($filepath);
            }else
            {
                $this->counter($filepath);
            }
            $_SESSION['temp'] = 1;//登录以后,给$_SESSION[temp]赋一个值1
        }
        $count = file_get_contents($filepath);
        $this->assign('count',$count);

        $adinfoup = D('Ad')->where('col_id=27')->limit(0,3)->select();

        $this->assign('adinfoup',$adinfoup);

        $adinfodown = D('Ad')->where('col_id=28')->limit(0,3)->select();
        $this->assign('adinfodown',$adinfodown);

        $info1= D('Product')->order('pro_id desc')->limit(0,6)->select();
        $this->assign('info1',$info1);

        $info2= D('Product')->order('pro_id')->limit(0,3)->select();
        $this->assign('info2',$info2);
        $this->display();
    }

    //counter()方法用来得到文件内的数字
private function counter($f_value)
{
    //用w模式打开文件时会清空里面的内容，所以先用r模式打开，取出文件内容，保存到变量
    $fp = fopen($f_value,'r') or die('打开文件时出错。');
    $countNum = fgets($fp,1024);
    fclose($fp);
    $countNum++;
    $fpw = fopen($f_value,'w');
    fwrite($fpw,$countNum);
    fclose($fpw);
}
//注释下面一行可以实现同一IP登录不累加效果，测试时可以打开
//session_destroy();

    function header(){

        $this->display();
    }

    function footer(){
        $this->display();
    }

}