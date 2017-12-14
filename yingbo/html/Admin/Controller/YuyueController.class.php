<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class YuyueController extends AdminController
{
     function index()
    {
        if($_POST['keywords']){
            $map['ordernumber'] = trim($_POST['keywords']);
        }
        if(isset($_GET['type'])){
            if($_GET['type'] == 1){
                $map['if_say'] = '1';
            }else if($_GET['type'] == 2){
                $map['if_say'] = '0';
            }else if($_GET['type'] == 3){
                $map['status'] = '2';
            }else if($_GET['type'] == 4){
                $map['status'] = array('neq','2');
            }
        }
        $map['shopid'] = array('exp','is NULL'); 
        $order = D('user_order');
        $count = $order ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $orderList = $order ->where($map)-> order('orderid desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        //dump($orderList);exit;
        $page = $p->show();
        $first = $_GET['p']?$_GET['p']:"1";
        $this -> assign('firstno',($first-1)*10+1);
        $this -> assign('page',$page);
        $this -> assign('orderList',$orderList);
        $this->display();
    }
    function orderinfo(){
        $orderid = $_GET['orderid']; 
        $model = D();
        $suborder = D('user_suborder');
        $assess = D('user_assess');
        $nurse = D('user_nurse');
        $orderinfo = $model ->query("select a.*,b.userid,b.username,b.area,b.iphone from lh_user_order as a,lh_user_patient as b where a.userid = b.userid AND a.orderid = {$orderid}");
        //dump($orderinfo);exit;
        $orderinfo = $orderinfo[0];
        if(!empty($orderinfo['auserid'])){
            $assessinfo = $assess ->find($orderinfo['auserid']);
            $this ->assign('assessinfo',$assessinfo);
        }
        /*$suborderList = $suborder ->where("parent_id = {$orderinfo['orderid']}")->select();
        foreach($suborderList as $key => $value){
            if(!empty($value['nurseid'])){
                $nurseinfo = $nurse ->find($value['nurseid']);
                $suborderList[$key]['nurseinfo'] = $nurseinfo;
            }
        }
        $orderinfo['suborderList'] = $suborderList; */     
        //dump($orderinfo);exit;
        $this ->assign("orderinfo",$orderinfo);
        $this ->display();
    }
    function del(){
        $order = D('user_order');
        $order -> where("orderid = {$_GET['orderid']}")-> delete();
        $this -> success("成功取消订单");
    }
    function handleOrder(){
        if($_POST){
            $order = D('user_order');
            $schedule = D('user_schedule');
            $assess = D('user_assess');
            if(!empty($_POST['comid'])){
                $arr = explode('-',$_POST['comid']);
                $_POST['auserid'] = $arr[0];
                $id = $arr[1];
            }
            $_POST['pingtime'] = time();
            //var_dump($_POST);exit;
            if($order ->create()){
                if($order ->save()){
                    $data['status'] = 1;
                    $schedule ->where("id = {$id}")->save($data);
                    if(!empty($_POST['auserid'])){
                        $assessinfo=$assess ->find($_POST['auserid']);
                    }
                    $this ->ajaxReturn(array(
                            "error" =>0,
                            'content'=>"姓名：".$assessinfo['username']."    电话：".$assessinfo['iphone'] ."    详细地址：".$assessinfo['area']
                        ));
                }else{
                    $this ->ajaxReturn(array(
                            "error" =>1
                        ));
                }
            }
        }
    }
    function productssum(){
        if($_POST){
            $order = D('user_order');
            //dump($_POST);exit;
            $_POST['ssum'] = $_POST['psum'];
            if($order ->create()){
                if($order ->where("orderid = {$_POST['orderid']}")->save()){
                    $this->ajaxReturn(array(
                            'error' => 0
                        ));
                }else{
                    $this->ajaxReturn(array(
                            'error' => 1
                        ));
                }
            }else{
                $this->ajaxReturn(array(
                            'error' => 1
                        ));
            }
        }
    }
}