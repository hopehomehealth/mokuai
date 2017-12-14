<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class DeliveryController extends ComController {
    //收货地址列表
    function address(){
        $daohang = array(
            'second'=>'收货地址',
        );
        $dl_model = M('delivery');
        $detail_model = M('userdetail');
        $userid = $_SESSION['userInfo']['userid'];
        $userdetail = $detail_model->find($userid);
        $defaultid = $userdetail['dl_id'];  
        $delivery = $dl_model->where("userid = {$userid}")->select();
        //默认收货地址id
        $this->assign('defaultid',$defaultid);
        $this->assign('delivery',$delivery);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //添加收货地址
    function addaddr(){
        $daohang = array(
            'second'=>'添加地址',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $dl_model = M('delivery');
        if($_POST){
            $_POST['userid'] = $userid;
            if($dl_model->create()){
                $lastId = $dl_model->add();
                if($lastId){
                    if($_POST['setdefault'] == 'on'){
                        $error = $this->setdefault($lastId);
                    }else{
                        $this->ajaxReturn(array(
                            'error'=>0,
                            'content'=>'添加地址成功'
                        ));
                    }
                    if($error){
                        $this->ajaxReturn(array(
                            'error'=>0,
                            'content'=>'添加地址成功'
                        ));
                    }
                }
            }
        }
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //设置默认收货地址
    function setdefault($dl_id = 0){
        $userid = $_SESSION['userInfo']['userid'];
        $detail_model = M('userdetail');
        if($_POST['dl_id']){
            $dl_id = $_POST['dl_id'];
            $detail_model->where("userid = {$userid}")->setField('dl_id',$dl_id);
            $this->ajaxReturn(array(
                            'error'=>0,
                            'content'=>'已设为默认地址'
                        ));
        }else{
            $detail_model->where("userid = {$userid}")->setField('dl_id',$dl_id);
            return true;
        }
    }
    //删除收货地址
    function deladdr(){
        $dl_model = M('delivery');
        $userid = $_SESSION['userInfo']['userid'];
        if($_POST['dl_id']){
            if($dl_model->where("userid = {$userid} AND dl_id = {$_POST['dl_id']}")->delete()){
                $this->ajaxReturn(array(
                            'error'=>0,
                            'content'=>'删除成功'
                        ));
            }
        }
    }
}