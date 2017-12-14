<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class OrderController extends AdminController
{
    //商品列表
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
        $map['shopid'] = array('NEQ',''); 
        $order = D('user_order');
        $count = $order ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $orderList = $order ->where($map)-> order('orderid desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $time = time();
        foreach($orderList as $key => $value){
            $orderList[$key]['hours'] = floor(($time-$value['inputtime'])/3600);
        }
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
        $suborderList = $suborder ->where("parent_id = {$orderinfo['orderid']}")->select();
        foreach($suborderList as $key => $value){
            if(!empty($value['nurseid'])){
                $nurseinfo = $nurse ->find($value['nurseid']);
                $suborderList[$key]['nurseinfo'] = $nurseinfo;
            }
        }
        $orderinfo['suborderList'] = $suborderList;      
        //dump($orderinfo);exit;
        $this ->assign("orderinfo",$orderinfo);
        $this ->display();
    }
    function del(){
        $order = D('user_order');
        $order -> where("orderid = {$_GET['orderid']}")-> delete();
        $this -> success("成功取消订单");
    }
    function handleSubOrder(){
        //var_dump($_POST);exit;
        if($_POST){
            $order = D('user_suborder');
            $schedule = D('user_schedule');
            $nurse = D('user_nurse');
            $arr = explode('-',$_POST['comid']);
            $_POST['nurseid'] = $arr[0];
            $id = $arr[1];
            $_POST['hutime'] = time();
            //var_dump($_POST);exit;
            if($order ->create()){
                if($order ->save()){
                    $data['status'] = 1;
                    $schedule ->where("id = {$id}")->save($data);
                    $nurseinfo=$nurse ->find($_POST['nurseid']);
                    $this ->ajaxReturn(array(
                            "error" =>0,
                            'content'=>"姓名：".$nurseinfo['username']."    电话：".$nurseinfo['iphone'] ."    详细地址：".$nurseinfo['area']
                        ));
                }else{
                    $this ->ajaxReturn(array(
                            "error" =>1
                        ));
                }
            }
        }
    }
    /*function allorder(){
        $orderlist = D('user_order')->select();
        dump($orderlist);exit;
    }*/
}