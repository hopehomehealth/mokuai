<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class SorderController extends ComController {
  //判断是否为联盟会员
  function checkvip(){
    if(IS_POST){
      $userid = $_SESSION['userInfo']['userid'];
      $userinfo = M('user')->find($userid);
      if($userinfo['is_supvip'] == '1'){
        if($userinfo['vipexpire'] <= time()){
          $this->ajaxReturn(array(
            'error'=> 1,
            'content'=>'你的会员已到期'
          ));
        }
      }else{
        $this->ajaxReturn(array(
            'error'=> 1,
            'content'=>'请先购买会员'
        ));
      }
      $this->ajaxReturn(array(
          'error'=> 0
      ));
    }
  }
  //订单生成数据采集
  function placeorder(){
    $userid = $_SESSION['userInfo']['userid'];
    $setting_model = M('setting');
    //系统设置数据
    $set = $setting_model->find();
    $daohang = array(
        'second'=>'订单提交',
    );

    $detail_model = M('userdetail');
    $dl_model = M('delivery');
    $goods_model = M('sgoods');
    if(empty($_GET['goods_id'])){
      if(cookie('goods_id')){
        $_GET['goods_id'] = cookie('goods_id');
      }else{
        $preurl = $_SERVER['HTTP_REFERER'];
        header("location:".$preurl);exit;
      }
    }else{
      cookie('goods_id',$_GET['goods_id']);
    }
    $goods_id = $_GET['goods_id'];
    $goodsinfo = $goods_model->find($goods_id);
    $userdetail = $detail_model->where("userid = {$userid}")->find();
    if($userdetail['dl_id']){
        $delivery = $dl_model->find($userdetail['dl_id']);
    }else{
        $delivery = '';
    }
    if($_GET['dl_id']){
      $delivery = $dl_model->find($_GET['dl_id']);
    }
    //dump($goodsinfo);exit;
    //dump($_SESSION);
    $this->assign('delivery',$delivery);
    $this->assign('daohang',$daohang);
    $this->assign('goodsinfo',$goodsinfo);
    $this->display();
  }
  //生成订单并支付
  function addorder(){
      $userid = $_SESSION['userInfo']['userid'];
      $nikename = $_SESSION['userInfo']['nikename']?$_SESSION['userInfo']['nikename']:"匿名购买";
      $order_model = M('sorder');
      if(IS_POST){
        foreach($_POST as $value){
          if(empty($value)){
            echo 'error';exit;
          }
        }
        $way = intval($_POST['way']);
        if($_POST['way'] == 1){
          if(empty($_POST['delivery'])){
            $this->ajaxReturn(array(
                'error'=> 1,
                'content'=>'请选择收货地址'
            ));
          }else{
            $_POST['isexpress'] = '1';
          }
        }elseif($_POST['way'] == 2){
          if(!isset($_POST['noexpress'])){
            $this->ajaxReturn(array(
                'error'=> 1,
                'content'=>'请选择配送方式'
            ));
          }else{
            $_POST['isexpress'] = '0';
          }
        }elseif($_POST['way'] == 3){
          if(!isset($_POST['noexpress']) && empty($_POST['delivery'])){
            $this->ajaxReturn(array(
                'error'=> 1,
                'content'=>'请选择配送方式'
            ));
          }else{
            if(empty($_POST['delivery'])){
              $_POST['isexpress'] = '0';
            }else{
              $_POST['isexpress'] = '1';
            }
          }
        }
        $goodsinfo = M('sgoods')->find($_POST['goods_id']);
        if($goodsinfo){
          if($goodsinfo['number'] < 1){
            $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'库存不足无法购买'
            ));
          }else{
            $_POST['inputtime'] = time();
            $_POST['orderno'] = 'E'.time().rand(10,99);
            $_POST['sid'] = $goodsinfo['userid'];
            $_POST['userid'] = $userid;
            $_POST['orderamount'] = round($goodsinfo['nowprice'] * $_POST['number'],2);
            if($order_model->create()){
              if($lastid = $order_model->add()){
                if(cookie('goods_id')){
                  cookie('goods_id',null);
                  cookie('contrlname',null);
                  cookie('actionname',null);
                }
                $payurl = SITE_URL."index.php/Home/Wxpay/pay/type/sorderpay/id/".$lastid;
                $this->ajaxReturn(array(
                  'error'=> 0,
                  'payurl'=>$payurl
                ));
                //header("location:".$payurl);exit;
              }
            }
          }  
        }
        echo 'error';exit;
      }
  }
  //预约商品信息
  function yuyueinfo(){
    $userid = $_SESSION['userInfo']['userid'];
    $setting_model = M('setting');
    //系统设置数据
    $set = $setting_model->find();
    $daohang = array(
        'second'=>'预约详情'
    );

    $detail_model = M('userdetail');
    $dl_model = M('delivery');
    $zeng_model = M('zeng');
    if(empty($_GET['zeng_id'])){
      if(cookie('zeng_id')){
        $_GET['zeng_id'] = cookie('zeng_id');
      }else{
        $preurl = $_SERVER['HTTP_REFERER'];
        header("location:".$preurl);exit;
      }
    }else{
      cookie('zeng_id',$_GET['zeng_id']);
    }
    $zeng_id = $_GET['zeng_id'];
    $zenginfo = $zeng_model->find($zeng_id);
    
    $userdetail = $detail_model->where("userid = {$userid}")->find();
    if($userdetail['dl_id']){
        $delivery = $dl_model->find($userdetail['dl_id']);
    }else{
        $delivery = '';
    }
    if($_GET['dl_id']){
      $delivery = $dl_model->find($_GET['dl_id']);
    }
    //dump($_SESSION);
    $this->assign('delivery',$delivery);
    $this->assign('daohang',$daohang);
    $this->assign('zenginfo',$zenginfo);
    $this->display();
  }
  //生成预约订单
  function addyuyue(){
    $userid = $_SESSION['userInfo']['userid'];
    if(IS_POST){
      $yuyue_model = M('yuyue');
      //查询是否有未完成的预约订单
      $yuyue = $yuyue_model->where("userid = {$userid} AND status = '0' AND is_del = '0'")->select();
      if($yuyue){
        $this->ajaxReturn(array(
            'error'=> 1,
            'content'=>'你有未完成的预约'
        ));
      }
      //dump($_POST);exit;
      $way = intval($_POST['way']);
      if($_POST['way'] == 1){
        if(empty($_POST['delivery'])){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请选择收货地址'
          ));
        }else{
          $_POST['isexpress'] = '1';
        }
      }elseif($_POST['way'] == 2){
        if(!isset($_POST['noexpress'])){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请选择配送方式'
          ));
        }else{
          $_POST['isexpress'] = '0';
        }
      }elseif($_POST['way'] == 3){
        if(!isset($_POST['noexpress']) && empty($_POST['delivery'])){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请选择配送方式'
          ));
        }else{
          if(empty($_POST['delivery'])){
            $_POST['isexpress'] = '0';
          }else{
            $_POST['isexpress'] = '1';
          }
        }
      }
      //判断库存是否足够
      $zenginfo = M('zeng')->find($_POST['zeng_id']);
      if($zenginfo && $zenginfo['number'] < 1){
        $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'库存不足无法预约'
        ));
      }else{
        $_POST['userid'] = $userid;
        $_POST['sid'] = $zenginfo['userid'];
        $_POST['orderno'] = 'Z'.time().rand(10,99);
        $_POST['inputtime'] = time();
        $_POST['number'] = 1;
        $_POST['orderamount'] = 0.00;
        if($yuyue_model->create()){
          if($yuyue_model->add()){
            M('zeng')->where("zeng_id = {$_POST['zeng_id']}")->setDec('number',1);//库存减1
            if(cookie('zeng_id')){
              cookie('zeng_id',null);
              cookie('contrlname',null);
              cookie('actionname',null);
            }
            $this->ajaxReturn(array(
              'error'=> 0
            ));
          }
        }
      }
    }
  }
  //预约1p商品资格判断
  function yuyue(){
    $userid = $_SESSION['userInfo']['userid'];
    if(IS_GET){
      $yuyue_model = M('yuyue');
      $detail_model = M('userdetail');
      $zeng_id = $_GET['zeng_id'];
      $userdetail = $detail_model->where("userid = {$userid}")->find();
      $zenginfo = M('zeng')->find($zeng_id);//赠品
      $userinfo = M('user')->find($userid);
      if($zenginfo){
        //判断是否是联盟会员
        if($userinfo['is_supvip'] == '1'){
          if($userinfo['vipexpire'] <= time()){
            $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'你的会员已到期'
            ));
          }
        }else{
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请先购买会员'
          ));
        }
        //判断库存是否足够
        if($zenginfo['number'] < 1){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'库存不足无法预约'
          ));
        }
        //查询是否有未完成的预约订单
        $yuyue = $yuyue_model->where("userid = {$userid} AND status = '0' AND is_del = '0'")->select();
        if($yuyue){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'你有未完成的预约'
          ));
        }
        //如果仅能预约一次
        if($zenginfo['isonlyone'] == '1'){
          //判断是否预约过
          $idArr = explode(',',ltrim($userdetial['yuyueids'],','));
          if(in_array($zeng_id,$idArr)){
            $this->ajaxReturn(array(
                'error'=> 1,
                'content'=>'你已经预约过本产品'
            ));
          }else{
            $detail_model->where("userid = {$userid}")->setField('yuyueids',$userdetail['yuyueids'].','.$zeng_id);
          }
        }
        $this->ajaxReturn(array(
              'error'=> 0,
              'zeng_id'=>$zeng_id
        ));
      }
    }
  }
  //商家权益产品预约
  function yuyue2(){
    $userid = $_SESSION['userInfo']['userid'];
    if(IS_GET){
      $quanyi_model = M('quanyiorder');
      $detail_model = M('userdetail');
      $quanyi_id = $_GET['quanyi_id'];
      $userdetail = $detail_model->where("userid = {$userid}")->find();
      $quanyiinfo = M('quanyi')->find($quanyi_id);//预约的权益产品
      $userinfo = M('user')->find($userid);
      if($quanyiinfo){
        //判断是否是联盟会员
        if($userinfo['is_supvip'] == '1'){
          if($userinfo['vipexpire'] <= time()){
            $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'你的会员已到期'
            ));
          }
        }else{
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请先购买会员'
          ));
        }
        //判断库存是否足够
        if($quanyiinfo['number'] < 1){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'库存不足无法预约'
          ));
        }
        //查询是否有未完成的预约订单
        $quanyiorder = $quanyi_model->where("userid = {$userid} AND status = '0' AND is_del = '0'")->select();
        if($quanyiorder){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'你有未完成的预约'
          ));
        }
        //如果仅能预约一次
        if($quanyiinfo['isonlyone'] == '1'){
          //判断是否预约过
          $idArr = explode(',',ltrim($userdetial['quanyiids'],','));
          if(in_array($quanyi_id,$idArr)){
            $this->ajaxReturn(array(
                'error'=> 1,
                'content'=>'你已经预约过本产品'
            ));
          }else{
            $detail_model->where("userid = {$userid}")->setField('quanyiids',$userdetail['quanyiids'].','.$quanyi_id);
          }
        }
        $this->ajaxReturn(array(
              'error'=> 0,
              'quanyi_id'=>$quanyi_id
        ));
      }
    }
  }
  //商家权益商品预约信息
  function yuyueinfo2(){
    $userid = $_SESSION['userInfo']['userid'];
    $setting_model = M('setting');
    //系统设置数据
    $set = $setting_model->find();
    $daohang = array(
        'second'=>'预约详情'
    );

    $detail_model = M('userdetail');
    $dl_model = M('delivery');
    $quanyi_model = M('quanyi');
    if(empty($_GET['quanyi_id'])){
      if(cookie('quanyi_id')){
        $_GET['quanyi_id'] = cookie('quanyi_id');
      }else{
        $preurl = $_SERVER['HTTP_REFERER'];
        header("location:".$preurl);exit;
      }
    }else{
      cookie('quanyi_id',$_GET['quanyi_id']);
    }
    $quanyi_id = $_GET['quanyi_id'];
    $quanyiinfo = $quanyi_model->find($quanyi_id);
    
    $userdetail = $detail_model->where("userid = {$userid}")->find();
    if($userdetail['dl_id']){
        $delivery = $dl_model->find($userdetail['dl_id']);
    }else{
        $delivery = '';
    }
    if($_GET['dl_id']){
      $delivery = $dl_model->find($_GET['dl_id']);
    }
    //dump($_SESSION);
    $this->assign('delivery',$delivery);
    $this->assign('daohang',$daohang);
    $this->assign('quanyiinfo',$quanyiinfo);
    $this->display();
  }
  //生成预约订单
  function addyuyue2(){
    $userid = $_SESSION['userInfo']['userid'];
    if(IS_POST){
      $quanyi_model = M('quanyiorder');
      //查询是否有未完成的预约订单
      $quanyiorder = $quanyi_model->where("userid = {$userid} AND status = '0' AND is_del = '0'")->select();
      if($quanyiorder){
        $this->ajaxReturn(array(
            'error'=> 1,
            'content'=>'你有未完成的预约'
        ));
      }
      //dump($_POST);exit;
      $way = intval($_POST['way']);
      if($_POST['way'] == 1){
        if(empty($_POST['delivery'])){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请选择收货地址'
          ));
        }else{
          $_POST['isexpress'] = '1';
        }
      }elseif($_POST['way'] == 2){
        if(!isset($_POST['noexpress'])){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请选择配送方式'
          ));
        }else{
          $_POST['isexpress'] = '0';
        }
      }elseif($_POST['way'] == 3){
        if(!isset($_POST['noexpress']) && empty($_POST['delivery'])){
          $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'请选择配送方式'
          ));
        }else{
          if(empty($_POST['delivery'])){
            $_POST['isexpress'] = '0';
          }else{
            $_POST['isexpress'] = '1';
          }
        }
      }
      //判断库存是否足够
      $quanyiinfo = M('quanyi')->find($_POST['quanyi_id']);
      if($quanyiinfo && $quanyiinfo['number'] < 1){
        $this->ajaxReturn(array(
              'error'=> 1,
              'content'=>'库存不足无法预约'
        ));
      }else{
        $_POST['userid'] = $userid;
        $_POST['orderno'] = 'Q'.time().rand(10,99);
        $_POST['inputtime'] = time();
        $_POST['number'] = 1;
        $_POST['orderamount'] = 0.00;
        if($quanyi_model->create()){
          if($quanyi_model->add()){
            M('quanyi')->where("quanyi_id = {$_POST['quanyi_id']}")->setDec('number',1);//库存减1
            if(cookie('quanyi_id')){
              cookie('quanyi_id',null);
              cookie('contrlname',null);
              cookie('actionname',null);
            }
            $this->ajaxReturn(array(
              'error'=> 0
            ));
          }
        }
      }
    }
  }
  //整单结算
  function together(){
    $userid = $_SESSION['userInfo']['userid'];
    if(IS_POST){
      //dump($_POST);exit;
      //系统设置
      $set = M('setting')->field("pct_diyong")->find();
      $together_model = M('together');
      $userdetail = M('userdetail')->where("userid = {$userid}")->find();//用户详情
      $together = $together_model->where("userid = {$userid} AND status = '0'")->find();
      $diyong = round($_POST['total'] * $set['pct_diyong'] / 100);
      $coin = $userdetail['coin'];
      if($diyong >= $coin){
        $diyong = $coin;
      }
      if(isset($_POST['is_diyong']) && $_POST['is_diyong'] == 1){
        $_POST['diyong'] = $diyong;
      }
      $nowtime = time();
      $_POST['userid'] = $userid;
      $_POST['orderno'] = 'T'.$nowtime.rand(10,99);
      $_POST['inputtime'] = $nowtime;
      $_POST['orderamount'] = $_POST['total'] - $diyong;
      if($together_model->create()){
        if($together){
          $together_model->where("orderid = {$together['orderid']}")->save();
          $lastid = $together['orderid'];
        }else{
          $lasted = $together_model->add();
        } 
        if($lastid){
          if(isset($_POST['diyong'])){
            M('userdetail')->where("userid = {$userid}")->setDec('coin',intval($diyong));
          }
          
          $payurl = SITE_URL.'index.php/Home/Wxpay/pay/type/together/id/'.$lastid;
          header("location:".$payurl);exit;
        }
      }
    }
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