<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class ScenterController extends ComController {
  //会员列表
  function member(){
    $userid = $_SESSION['userInfo']['userid'];
    $daohang = array(
        'second'=>"会员管理",
        'third'=>"<a class='head_login'>&nbsp;</a>",
    );
    $this -> assign('daohang',$daohang);
    $user_model = M('user'); 
    $userlist = $user_model->where("sid = {$userid}")->select();
    $this->assign('userlist',$userlist);
    $this->display();
  }
  //编辑会员
  function detail(){
    $userid = $_GET['userid'];
    $daohang = array(
        'second'=>"会员信息"
    );
    $this -> assign('daohang',$daohang);
    $userinfo = M('user')->field("u.*,d.area")->alias('u')->join("hc_userdetail as d on d.userid = u.userid")->where("u.userid = {$userid}")->select();
    //dump($userinfo[0]);exit;
    $this->assign('userinfo',$userinfo[0]);
    $this->display();
  }
  //进行中订单
  function doing(){
    $userid = $_SESSION['userInfo']['userid'];
    $daohang = array(
        'second'=>'订单管理',
        'third'=>"<a class='head_login'>&nbsp;</a>"
    );
    $this->assign('daohang',$daohang);
    $map['pay_status'] = '0';
    if($_GET['orderstatus'] && $_GET['orderstatus'] == '2'){
        $map['pay_status'] = '1';
        $map['shipping_status'] = '0';
    }elseif($_GET['orderstatus'] && $_GET['orderstatus'] == '3'){
        $map['pay_status'] = '1';
        $map['shipping_status'] = '1';
    }
    $map['sid'] = $userid; 
    $map['status'] = '0';
    $map['is_close'] = '0';
    $sorder_model = M('sorder');
    $allorder = M('sorder')->where("sid = {$userid} AND is_close = '0' AND status = '0'")->select();
    $payings = 0;//待支付数量
    $sendings = 0;//待发货数量
    $sendeds = 0;//已发货数量
    foreach($allorder as $key=>$value){
        if($value['pay_status'] == '0' AND $value['is_close'] == '0'){
            $payings++;continue;
        }
        if($value['pay_status'] == '1' AND $value['is_close'] == '0'){
            if($value['shipping_status'] == '0'){
                $sendings++;continue;
            }elseif($value['shipping_status'] == '1'){
                $sendeds++;continue;
            }
        }
    }
    if(!isset($_GET['orderstatus'])){
        if($payings >= 1){
            $_GET['orderstatus'] = 1;
        }elseif($sendings >= 1){
            $_GET['orderstatus'] = 2;
            $map['pay_status'] = '1';
            $map['shipping_status'] = '0';
        }elseif($sendeds >= 1){
            $_GET['orderstatus'] = 3;
            $map['pay_status'] = '1';
            $map['shipping_status'] = '1';
        }
    }
    
    //dump($map);exit;
    $orderlist = $sorder_model 
               -> alias('o')
               -> field("o.*,g.goods_id,g.goods_name,g.logo")
               -> join("hc_sgoods as g on g.goods_id = o.goods_id")
               -> where($map)
               -> select();
               //dump($orderlist);exit;
    $this->assign('payings',$payings);
    $this->assign('sendings',$sendings);
    $this->assign('sendeds',$sendeds);
    $this->assign('orderlist',$orderlist);
    $this->display();
  }
  //已完成订单
  function finished(){
    $userid = $_SESSION['userInfo']['userid'];
    $daohang = array(
        'second'=>'订单管理',
        'third'=>"<a class='head_login'>&nbsp;</a>"
    );
    $this->assign('daohang',$daohang);
    $sorder_model = M('sorder');
    $orderlist = $sorder_model 
               -> alias('o')
               -> field("o.*,g.goods_id,g.goods_name,g.logo")
               -> join("hc_sgoods as g on g.goods_id = o.goods_id")
               -> where("sid = {$userid} AND status = '1'")
               -> select();
    $this->assign('orderlist',$orderlist);     
    $this->display();
  }
  //已关闭订单
  function closed(){
    $userid = $_SESSION['userInfo']['userid'];
    $daohang = array(
        'second'=>'订单管理',
        'third'=>"<a class='head_login'>&nbsp;</a>"
    );
    $this->assign('daohang',$daohang);
    $sorder_model = M('sorder');
    $orderlist = $sorder_model 
               -> alias('o')
               -> field("o.*,g.goods_id,g.goods_name,g.logo")
               -> join("hc_sgoods as g on g.goods_id = o.goods_id")
               -> where("sid = {$userid} AND is_close = '1'")
               -> select();
    $this->assign('orderlist',$orderlist);    
    $this->display();
  }
  //订单详细信息
  function orderinfo(){
    $daohang = array(
        'second'=>'订单信息'
    );
    $this->assign('daohang',$daohang);
    $orderid = $_GET['orderid'];
    $sorder_model = M('sorder');
    $orderinfo = $sorder_model 
               -> alias('o')
               -> field("o.*,g.goods_id,g.goods_name,g.logo,g.price,g.nowprice")
               -> join("hc_sgoods as g on g.goods_id = o.goods_id")
               -> where("orderid = {$orderid}")
               -> select();
               //dump($orderinfo);
    $this->assign('orderinfo',$orderinfo[0]);
    $this->display();
  }
  function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/payscreen/";
        $info=$upload->uploadOne($_FILES['picscreen']);
        return $info['savepath'].$info['savename'];
  }
}