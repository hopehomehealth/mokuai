<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class PatientController extends FooterController
{
    function userindex(){
        $daohang = array(
            'first'=>'个人中心',
        );
        $this -> assign('daohang',$daohang);
    	$userid = $_SESSION['userInfo']['userid'];
    	$info = array(); 
    	$patient = D('user_patient');
    	$userinfo = $patient -> find($userid);
    	$info['money'] = $userinfo['money'];//用户账户
        $info['photo'] = $userinfo['photo']?$userinfo['photo']:"/Public/Mobile/images/pgtu.jpg";

    	$order = D('user_order');
    	$orderCount = $order ->field("status,count(orderid) as count") -> group("status") ->where("userid = {$userid}")-> select();
    	foreach($orderCount as $key => $value){
    		if($value['status'] == 0){
    			$info['unfinished'] = $value['count'];
    		}
    		if($value['status'] == 1){
    			$info['finishing'] = $value['count'];
    		}
    		if($value['status'] == 2){
    			$info['finished'] = $value['count'];
    		}
    	}
        $map['shopid'] = '';
        /*判断是否已经预约过start*/
        $yuyueorder = $order ->query("select * from lh_user_order where userid = {$userid} AND shopid is null AND (status = '0' or status= '1')");
        if($yuyueorder){
            $info['apointing'] = 1;
        }
        /*判断是否已经预约过end*/
        //dump($info);exit;
    	$this ->assign('info',$info);
    	$this ->display();
    }
    function seelist(){
        $daohang = array(
            'first'=>'评估结果',
        );
        $this -> assign('daohang',$daohang);
        $orderid = $_GET['orderid'];
        $model = D();
        $orderinfo = $model ->field("b.username,b.iphone,b.area,b.photo,b.credit,a.orderid,a.inputtime,a.status,a.if_pay,a.if_say,a.is_com,a.casexl,a.evaluate")->table("lh_user_order as a,lh_user_assess as b")->where("a.auserid = b.userid AND a.orderid = {$orderid}")-> select();
        if($orderinfo[0]['if_say'] == '0'){
            $orderinfo[0]['evaluate']=cutstr($orderinfo[0]['evaluate'],ceil(mb_strlen($orderinfo[0]['evaluate'])/10));
            //$orderinfo[0]['evaluate'] = preg_replace('/\.{3}/','',$comment[0]['city']);
        }
        $this ->assign("orderinfo",$orderinfo[0]);
        $this ->display("list");
    }
    function allOrder(){
        $daohang = array(
            'first'=>'我的订单',
        );
        $this -> assign('daohang',$daohang);
    	$userid = $_SESSION['userInfo']['userid'];
    	$model = D();
        $order = D('user_order');
        $orderList = $order ->query("select * from lh_user_order where userid = {$userid} AND status = '0' order by inputtime desc");
        
        /*foreach($orderList as $key => $value){
            if(!empty($value['shopid'])){
                $suborder = D('user_suborder')->field('orderid')->where("parent_id = {$value['orderid']}")->limit(1)->select();
                $orderList[$key]['suborder']=$suborder[0];
            }
        }*/

    	$assessorder = $model ->field("b.username,b.iphone,b.area,b.photo,b.credit,a.orderid,a.status,a.inputtime")->table("lh_user_order as a,lh_user_assess as b")->where("a.auserid = b.userid AND a.userid = {$userid}")->order("a.inputtime desc")-> select();
        //$nurseorder = $model ->query("select b.username,b.iphone,b.area,b.photo,a.orderid,a.status from lh_user_suborder as a left join lh_user_nurse as b on a.nurseid = b.userid where a.parent_id in (select c.orderid from lh_user_order as c where c.userid = {$userid})");
        /*$nurseorder = $model ->query("select b.username,b.iphone,b.area,b.photo,a.orderid as suborderid,a.status,c.status as pstatus,c.orderid,c.inputtime from lh_user_suborder as a,lh_user_nurse as b,lh_user_order as c where a.nurseid = b.userid AND c.orderid = a.parent_id AND a.parent_id in (select c.orderid from lh_user_order as c where c.userid = {$userid}) order by a.huctime desc limit 1");*/
        $nurseorder = $order ->query("select a.*,b.introduce from lh_user_order as a,lh_product as b where a.shopid = b.pro_id AND userid = {$userid} AND status != '0' AND (shopid is not null or shopid<>'') order by a.inputtime desc");
        foreach($nurseorder as $k => $v){
            $suborder = D()->query("select b.username,b.iphone,b.area,b.photo,b.credit,a.orderid,a.status,a.inputtime from lh_user_suborder as a,lh_user_nurse as b where a.nurseid = b.userid AND a.parent_id = {$v['orderid']} order by a.huctime desc limit 1");
            $nurseorder[$k]['suborder'] = $suborder[0];
        }
        //dump($orderList);exit;
        $this ->assign('orderList',$orderList);
        //dump($nurseorder);exit;
    	$this ->assign('assessorder',$assessorder);
        $this ->assign('nurseorder',$nurseorder);
    	$this ->display();
    }
    function xinxi(){
        $daohang = array(
            'first'=>'个人信息',
        );
        $this -> assign('daohang',$daohang);
    	$patient = D('user_patient');
    	$userid = $_SESSION['userInfo']['userid'];
    	if($_POST){
            //$_POST['city'] = preg_replace("/\d*-/",'',$_POST['province']).preg_replace("/\d*-/",'',$_POST['city']);
            //dump($_POST);exit;
            if($_POST['province_id'] != 0){
                if(($_POST['city_id'] == 0) || ($_POST['country_id'] == 0)){
                    unset($_POST['province_id']);
                    unset($_POST['city_id']);
                    unset($_POST['country_id']);
                    unset($_POST['city']);
                }
            }else{
                unset($_POST['province_id']);
                unset($_POST['city_id']);
                unset($_POST['country_id']);
                unset($_POST['city']);
            }
            //dump($_POST);exit;
    		if($patient ->create()){
    			if($patient ->where("userid = {$userid}")->save()){
                    //$_POST['user'] = $_POST['username'];
                    D("user")->where("userid = {$userid}")->setField("user",$_POST['username']);
    				$this ->redirect("Patient/userindex");
    				exit;
    			}
    		}
    	}
        $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
    	$userInfo = $patient -> find($userid);
        $this ->assign('provincelist',$provincelist);
    	$this ->assign('userInfo',$userInfo);
    	$this ->display();
    }
    function orderinfo(){
        $daohang = array(
            'first'=>'订单详情',
        );
        $this -> assign('daohang',$daohang);
        $orderid = $_GET['orderid'];
        $suborderid = $_GET['suborderid'];
        $order = D("user_order");
        $suborder = D('user_suborder');
        $parentid = $suborder ->find($orderid);
        $parent_id = $parentid['parent_id'];
        $model = D();
        $orderinfo = $model ->query("select a.orderid,a.inputtime,a.ordernumber,a.number,a.ssum,a.if_say,b.china,b.price,b.pro_id from lh_user_order as a,lh_product as b where a.shopid=b.pro_id AND a.orderid = {$orderid}");
        //$orderinfo = $order ->find($orderid);
        //$where['parent_id'] = $parent_id;
        //$where['status'] = array(neq,'2');
        if(isset($_GET['suborderid'])){
            $suborderInfo = $suborder ->find($suborderid);
            //$suborderInfo = $suborderList[0];
            //dump($orderinfo);
            //dump($suborderInfo);exit;
            $this ->assign('suborderInfo',$suborderInfo);
        }
        
        $this ->assign('orderinfo',$orderinfo[0]);
        $this->display();
    }
    function payorder(){
        if(!isset($_SESSION['flag'])){
            $this ->redirect("User/login");
            exit;
        }
        $daohang = array(
            'first'=>'订单支付',
        );
        $this -> assign('daohang',$daohang);
        $order = D("user_order");
        $suborder = D("user_suborder");
        $product = D("product");
        $model = D();
        $pay = D('pay');
        if($_POST){
            $userid = $_SESSION['userInfo']['userid'];
            if($_SESSION['userInfo']['shenfen'] != 1){
                $this->redirect("Product/detail",array('pro_id'=>$_POST['shopid']));
                exit;
            }
            $proinfo = $product ->find($_POST['shopid']);
            $_POST['ssum'] = $_POST['number'] * $proinfo['price'];
            $_POST['userid'] = $userid;
            $_POST['inputtime'] = time();
            $_POST['ordernumber'] = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
            $_POST['status'] = 0;
            //var_dump($_POST);exit;
            if($order ->create()){
                $lastid = $order ->add();
                if($lastid){
                    $data['parent_id'] = $lastid;
                    $data['nsum'] = $proinfo['price'];
                    $data['inputtime'] = $_POST['inputtime']; 
                    $data['userid'] = $userid;
                    $data['shopid'] = $_POST['shopid'];
                    for($i=1;$i<=$_POST['number'];$i++){
                        $data['ordernumber'] = $_POST['ordernumber'].'_'.$i;
                        $suborder ->add($data);
                    }
                }
            }
        }
        $payList = $pay ->where("paykg = '1'")->select();
        //dump($payList);
        $orderid = $_GET['orderid']? $_GET['orderid']: $lastid;
        $orderinfo = $model ->query("select a.orderid,a.inputtime,a.ordernumber,a.number,a.ssum,a.if_say,b.china,b.price from lh_user_order as a,lh_product as b where a.shopid=b.pro_id AND a.orderid = {$orderid}");
        $this ->assign('payList',$payList);
        $this ->assign('orderinfo',$orderinfo[0]);
        $this->display();
    }
    function yuyue(){
        $daohang = array(
            'first'=>'预约评估',
        );
        $this -> assign('daohang',$daohang);
        if($_POST){
            $order = D('user_order');
            $data['userid'] = $_SESSION['userInfo']['userid'];
            $data['casexl'] = $_POST['casexl'];
            $data['inputtime'] = time();
            $data['ordernumber'] = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
            $data['status'] = 0;
            if($order ->add($data)){
                $this ->ajaxReturn(array(
                    "error" =>0,
                    "content"=>''
                ));
            }else{
                $this ->ajaxReturn(array(
                    "error"=>1,
                    "content"=>''
                ));
            }
        }
        $this ->display();
    } 
    function confirm(){
        $suborderid = $_GET['suborderid'];
        $orderid = $_GET['orderid'];
        $suborder = D('user_suborder');
        $nurse = D('user_nurse');
        $data['if_nay'] = '1';
        if($suborder ->where("orderid = {$suborderid}")->save($data)){
            $orderinfo = $suborder ->field('nsum,nurseid')->find($suborderid);
            if($nurse ->where("userid = {$orderinfo['nurseid']}")->setInc('money',$orderinfo['nsum'])){
                $this ->redirect("Patient/orderinfo",array('orderid'=>$orderid,'suborderid'=>$suborderid));
            }else{
                $suborder ->where("orderid = {$suborderid}")->setField('if_nay','0');
            }
        }
        $this ->redirect("Patient/orderinfo",array('orderid'=>$orderid,'suborderid'=>$suborderid));
    }
    function comment(){
        $daohang = array(
            'first'=>'服务评价',
        );
        $this -> assign('daohang',$daohang);
        $preurl = $_SERVER['HTTP_REFERER'];
        $suborderid = $_GET['suborderid']?$_GET['suborderid']:'';
        $orderid = $_GET['orderid'];
        $userid = $_SESSION['userInfo']['userid'];
        if($_POST){
            $assess = D('user_assess');
            $nurse = D('user_nurse');
            $comment = D('user_comment');
            $suborder = D('user_suborder');
            $order = D('user_order');
            $_POST['inputtime'] = time();
            $_POST['status'] = '1';
            $_POST['userid'] = $userid;
            if(!empty($_POST['suborderid'])){
                $nurseid = $suborder ->field('nurseid')->where("orderid = {$_POST['suborderid']}")->select();
                $_POST['muserid'] = $nurseid[0]['nurseid'];
                if($comment->create()){
                    $comment->add();//添加评论
                    $suborder ->where("orderid = {$_POST['suborderid']}")->setField('is_com','1');//设置评论状态
                    $allcomment = $comment->field('sum(star) as star,count(*) as sum')->where("muserid = {$_POST['muserid']}")->select();
                    $credit = $allcomment[0]['star']/$allcomment[0]['sum'];
                    if($credit > 5){
                        $credit = 5;
                    }else{
                        $credit = $credit;
                    }
                    $nurse ->where("userid = {$_POST['muserid']}")->setField('credit',$credit);
                }
                header("location:".$_POST['preurl']);
                exit;
            }else{
                unset($_POST['suborderid']);
                $auserid =$order ->field('auserid')->where("orderid = {$_POST['orderid']}")->select();
                $_POST['muserid'] = $auserid[0]['auserid'];
                if($comment->create()){
                    $comment->add();//添加评论
                    $order ->where("orderid = {$_POST['orderid']}")->setField('is_com','1');//设置评论状态
                    $allcomment = $comment->field('sum(star) as star,count(*) as sum')->where("muserid = {$_POST['muserid']}")->select();
                    $credit = $allcomment[0]['star']/$allcomment[0]['sum'];
                    if($credit > 5){
                        $credit = 5;
                    }else{
                        $credit = $credit;
                    }
                    $assess ->where("userid = {$_POST['muserid']}")->setField('credit',$credit);
                }
                header("location:".$_POST['preurl']);
                exit;
            }
            
        }
        if(!empty($suborderid)){
            $is_com=D('user_suborder')->field('is_com')->find($suborderid);
            $this->assign('is_com',$is_com['is_com']);
        }else{
            $is_com=D('user_order')->field('is_com')->find($orderid);
            $this->assign('is_com',$is_com['is_com']);
        }
        $this->assign('preurl',$preurl);
    	$this ->display('pinggu');
    }
    function cash(){
        $daohang = array(
            'first'=>'用户提现',
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        $patient = D('user_patient');
        $postal = D('user_postal');
        $account = D('user_account');
        if($_POST){
            $_POST['userid'] = $userid;
            $_POST['inputtime'] = time();
            $_POST['order_no'] = 'PS'.substr(md5(rand(0,100)),4,2).time();
            $info = $patient->find($userid);
            //var_dump($info);exit;
            $money = $info['money'];
            $_POST['pre_money'] = $money;
            if(empty($_POST['balance'])){
                $this ->ajaxReturn(array(
                        'error' => 1,
                        'content' => '请输入金额'
                    ));
            }
            if(empty($_POST['count_id'])){
                $this ->ajaxReturn(array(
                        'error' => 1,
                        'content' => '请选择账户'
                    ));
            }
            if($money < $_POST['balance']){
                //echo $money.'-----'.$_POST['balance'];
                $this ->ajaxReturn(array(
                        'error' => 1,
                        'content' => '余额不足'
                    ));
            }else{
                $money = $money - $_POST['balance'];
                $_POST['money'] = $money;
            }
            if($postal->create()){
                if($postal->add()){
                    $data['money'] = $money;
                    //var_dump($money);exit;
                    if($patient ->where("userid = {$userid}")->save($data)){
                        $this ->ajaxReturn(array(
                            'error' => 0,
                            'money' => $data['money'],
                            'content' => '申请成功'
                        ));
                    }
                }
            }
        }
        $accountList = $account ->where("userid ={$userid}")->select();
        $userinfo = $patient ->where("userid = {$userid}")->select();
        $money = $userinfo[0]['money'];
        $this->assign('accountList',$accountList);
        $this ->assign('money',$money);
        $this ->display();
    }
    function records(){
        $daohang = array(
            'first'=>'提现记录',
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        $postal = D('user_postal');
        $postalList = $postal ->where("userid = {$userid}")->order("inputtime DESC")->select();
        //dump($postalList);
        $this ->assign('postalList',$postalList);
        $this->display();
    }
    function addCount(){
        $daohang = array(
            'first'=>'提现账户',
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        $account = D('user_account');
        if($_POST){
            $_POST['userid'] = $userid;
            if($_POST['count_type'] == 1){
                $_POST['count_type'] = "支付宝";
            }else if($_POST['count_type'] == 2){
                $_POST['count_type'] = "银行卡";
            }
            if($account ->create()){
                if($account ->add()){
                    $this ->redirect("Patient/cash");
                    exit;
                }
            }
        }
        $this ->display();
    }
    function pinglist(){
        $daohang = array(
            'first'=>'评估列表',
        );
        $this -> assign('daohang',$daohang);
        $order = D('user_order');
        $suborder = D('user_suborder');
        $userid = $_SESSION['userInfo']['userid'];
        $model = D();
        $assessorder = $model ->field("b.username,b.iphone,b.area,b.photo,b.credit,a.orderid,a.status,a.inputtime")->table("lh_user_order as a,lh_user_assess as b")->where("a.auserid = b.userid AND a.userid = {$userid} AND is_com = '0'")-> select();
        $nurseorder = $model ->field("b.username,b.iphone,b.area,b.photo,b.credit,a.orderid,a.status,a.inputtime,a.parent_id")->table("lh_user_suborder as a,lh_user_nurse as b")->where("a.nurseid = b.userid AND a.userid = {$userid} AND is_com = '0'")-> select();
        //dump($nurseorder);exit;
        $this ->assign('assessorder',$assessorder);
        $this ->assign('nurseorder',$nurseorder);
        $this->display();
    }
    function payassess(){
        $daohang = array(
            'first'=>'订单支付',
        );
        $this -> assign('daohang',$daohang);
        $orderid = $_GET['orderid'];
        $model = D();
        $pay = D('pay');
        $orderinfo = $model ->field("b.username,b.iphone,b.area,b.photo,b.credit,a.orderid,a.ordernumber,a.inputtime,a.status,a.if_pay,a.if_say,a.is_com,a.ssum,a.casexl,a.evaluate")->table("lh_user_order as a,lh_user_assess as b")->where("a.auserid = b.userid AND a.orderid = {$orderid}")-> select();
        $payList = $pay ->where("paykg = '1'")->select();
        $this->assign('payList',$payList);
        $this ->assign("orderinfo",$orderinfo[0]);
        $this ->display();
    }
    function vip(){
    	$this ->display();
    }
    function recharge(){
        $daohang = array(
            'first'=>'账户充值',
        );
        $this -> assign('daohang',$daohang);
        if($_POST){
            $patient = D('user_patient');
            $recharge = D('user_recharge');
            $userid = $_SESSION['userInfo']['userid'];
            $userinfo = $patient->find($userid);
            $_POST['userid'] = $userid;
            $_POST['inputtime'] = time();
            $_POST['pre_money'] = $userinfo['money'];
            $_POST['money'] = $_POST['pre_money'] + $_POST['amount'];
            $_POST['rc_no'] = 'RC'.substr(md5(rand(0,999)),5,2).time();
            //dump($_POST);exit;
            if($recharge->create()){
                $rc_id = $recharge->add();
                if($rc_id){
                    $this->redirect("Patient/dorecharge",array('rc_id'=>$rc_id));
                }

            }
        }
    	$this ->display();
    }
    function dorecharge(){
        $daohang = array(
            'first'=>'充值详情',
        );
        $this -> assign('daohang',$daohang);
        $recharge = D('user_recharge');
        $rcinfo = $recharge->find($_GET['rc_id']);
        $this->assign('rcinfo',$rcinfo);
        $this -> display();
    }
    function optable(){
        //D()->execute("alter table lh_user_patient add country_id int unsigned default null");
        $patient = D('user_patient');
        
        $patientinfo = $patient->find($_SESSION['userInfo']['userid']);
        dump($patientinfo);
    }
}