<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\ComController;
class AdviceController extends ComController
{
    //列表
    function showlist(){
        $adinfo=D('Banner')->where("lan_id=33 AND is_show='0' AND is_del='0' AND is_area='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo',$adinfo);
        $this->display();
    }


    function liuYan(){
        if($_POST){
            $content = $_POST['content'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $iphone = $_POST['iphone'];
            $address = $_POST['address'];


            $arr['content'] = $content;
            $arr['name'] = $name;
            $arr['email'] = $email;
            $arr['iphone'] = $iphone;
            $arr['address'] = $address;
            $arr['add_time'] = time();
            if($newid = D('Advice')->add($arr)){
                $arr['advice_id'] = $newid;
                $arr['add_time'] = date('Y-m-d H:i:s');
                echo json_encode($arr);
            }
        }
    }

}