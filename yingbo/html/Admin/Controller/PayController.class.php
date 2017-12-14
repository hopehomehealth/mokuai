<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class PayController extends AdminController
{
    function showlist()
    {
        $pay = D('pay');
        $payList = $pay-> select();
        $this -> assign('payList',$payList);
        $this->display();
    }
    function add(){
        if($_POST){
            $pay =D('pay');
            if($pay->create()){
                $pay ->add();
                $this ->redirect("Pay/showlist");
                exit;
            }
        }
        $this ->display();
    }
    function upd(){
        $pay = D('pay');
        $info = $pay -> find($_GET['id']);
        if($_POST){
            $_POST['id'] = $_POST['payid'];
            if($pay->create()){
                $pay ->save();
                $this ->redirect("Pay/showlist");
                exit;
            }
        }
        $this ->assign("info",$info);
        $this ->display();
    }
    function open(){
        $pay = D('pay');
        $data['paykg'] = 1;
        $pay ->where("id = {$_GET['id']}")-> save($data);
        $this ->redirect("Pay/showlist");
    }
    function close(){
        $pay = D('pay');
        $data['paykg'] = 0;
        $pay ->where("id = {$_GET['id']}")-> save($data);
        $this ->redirect("Pay/showlist");
    }
}