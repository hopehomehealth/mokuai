<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class NurseController extends FooterController
{
    //商品列表
    function userindex()
    {
         $daohang = array(
            'first'=>'护士中心',
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        $nurse = D("user_nurse");
        $info = $nurse ->field("photo,status") -> where("userid = {$userid}")-> find();
        $info['photo'] = $info['photo']?"/Public/".$info['photo']:"/Public/Mobile/images/pgtu.jpg";
        $info['id_status'] = $info['status'];
        //dump($info);exit;
        $order = D('user_suborder');
        $orderCount = $order ->field("status,count(orderid) as count") -> group("status") ->where("nurseid = {$userid}")-> select();
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
        $this ->assign('info',$info);
        $this ->display();
    }
    function allOrder(){
         $daohang = array(
            'first'=>'我的订单',
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        $model = D();
        $orderList = $model ->query("select a.*,b.username,b.area,b.iphone,b.photo from lh_user_suborder as a,lh_user_patient as b where a.userid=b.userid AND a.nurseid = {$userid} order by a.huwtime desc");
        foreach($orderList as $key => $value){
            $introduce = D('product') ->field('introduce')->find($value['shopid']);
            $orderList[$key]['introduce'] = $introduce['introduce'];

            if($value['is_com'] == 1){
                $comment = D()->field("a.comment,a.inputtime,b.username,b.iphone,b.city")->table('lh_user_comment as a,lh_user_patient as b')->where("suborderid = {$value['orderid']} AND a.userid = b.userid")->select();
                $comment[0]['username'] = cutstr($comment[0]['username'],1).'**';
                $comment[0]['username'] = preg_replace('/\.{3}/','',$comment[0]['username']);
                $comment[0]['iphone'] = substr($comment[0]['iphone'],0,3).'****';
                $comment[0]['city']=cutstr($comment[0]['city'],3)."*";
                $comment[0]['city'] = preg_replace('/\.{3}/','',$comment[0]['city']);
                $orderList[$key]['comment'] = $comment[0];

            }
        }
        //dump($orderList);exit;
        $this ->assign('orderList',$orderList);
        $this ->display();
    }
    function xinxi(){
         $daohang = array(
            'first'=>'个人信息',
        );
        $this -> assign('daohang',$daohang);
        $nurse = D('user_nurse');
        $userid = $_SESSION['userInfo']['userid'];
        if($_POST){
            /*$_POST['city'] = preg_replace("/\d*-/",'',$_POST['province']).preg_replace("/\d*-/",'',$_POST['city']);
            //dump($_POST);exit;
            if(empty($_POST['city'])){
                unset($_POST['city']);
            }*/
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
            $path = $this ->upload();
            if($path){
                if(file_exists("./Public/".$_POST['oldphoto'])){
                    unlink("./Public/".$_POST['oldphoto']);
                }
                $_POST['photo'] = $path;
            }
            if($nurse ->create()){
                if($nurse ->where("userid = {$userid}")->save()){
                    D('user')->where("userid = {$userid}")->setField('user',$_POST['username']);
                    $this ->redirect("Nurse/userindex");
                    exit;
                }
            }
        }
        $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
        $this ->assign('provincelist',$provincelist);
        $info = $nurse ->find($userid);
        $this ->assign('info',$info);
        $this ->display();
    }
    function timetable(){
         $daohang = array(
            'first'=>'作息时间',
        );
        $this -> assign('daohang',$daohang);
        $time = time();
        $day = date('d',$time);
        $month = date("n",$time);
        $year = date("Y",$time);
        $dateList = $this ->rili($day,$month,$year);
        if($month == 12){
            $nextMonth = 1;
            $nextYear = $year +1;
        }else{
            $nextMonth = $month + 1;
            $nextYear = $year;
        }
        $datestr = "本月：<button class='selectmonth month-btn' disabled>".$month."</button>月&nbsp;下月：<button class='month-btn'>".$nextMonth."</button>月";
        $nextDateList = $this ->rili($day,$nextMonth,$nextYear); 
        $this ->assign('datestr',$datestr);
        $this ->assign('dateList',$dateList);
        $this ->assign('nextDateList',$nextDateList);
        $this ->assign('date',$date);
        $this ->display();
    }
    function orderinfo(){
         $daohang = array(
            'first'=>'订单详情',
        );
        $this -> assign('daohang',$daohang);
        $orderid = $_GET['orderid'];
        $model = D();
        $orderinfo = $model ->query("select a.orderid,a.parent_id,a.ordernumber,a.inputtime,a.nsum,a.status,a.is_com,a.if_nay,b.price,b.china from lh_user_suborder as a,lh_product as b where a.shopid = b.pro_id AND a.orderid = {$orderid}"); 
        $this->assign('orderinfo',$orderinfo[0]);
        $this ->display();
    }
    function cash(){
        $daohang = array(
            'first'=>'用户提现',
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        $nurse = D('user_nurse');
        $postal = D('user_postal');
        $account = D('user_account');
        if($_POST){
            $_POST['userid'] = $userid;
            $_POST['inputtime'] = time();
            $_POST['order_no'] = 'PS'.substr(md5(rand(0,100)),4,2).time();
            $info = $nurse->find($userid);
            //var_dump($info);exit;
            $money = $info['money'];
            $_POST['pre_money'] = $money;
            //var_dump($_POST);
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
                    if($nurse ->where("userid = {$userid}")->save($data)){
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
        $userinfo = $nurse ->where("userid = {$userid}")->select();
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
                    $this ->redirect("Nurse/cash");
                    exit;
                }
            }
        }
        $this ->display();
    }
    function toServe(){
        $orderid = $_GET['orderid'];
        $suborder = D('user_suborder');
        $order = D('user_order');
        $parentid = $suborder ->field('parent_id')->find($orderid);
        $data['status'] = '1';
        $data['huctime'] = time();
        if($suborder ->where("orderid = {$orderid}")->save($data)){
            $order ->where("orderid = {$parentid['parent_id']}")->setField('status','1');
        }
        $this ->redirect("Nurse/orderinfo",array('orderid' => $orderid));
    }
    function served(){
        $orderid = $_GET['orderid'];
        $suborder = D('user_suborder');
        $order = D('user_order');
        $data['status'] = '2';
        $data['huwtime'] = time();
        if($suborder ->where("orderid = {$orderid}")->save($data)){
            $parentid = $suborder ->field('parent_id')->find($orderid);
            $map['status'] = array('NEQ','2');
            $map['parent_id'] = $parentid['parent_id'];
            $orders = $suborder ->where($map)->select();
            if(!$orders){
                $order ->where("orderid = {$parentid['parent_id']}")->setField('status','2');
            }
        }
        $this ->redirect("Nurse/orderinfo",array('orderid' => $orderid));
    }
    private function rili($day,$month,$year){
        $userid = $_SESSION['userInfo']['userid'];
        $schedule = D("user_schedule");
        $scheduleList = $schedule ->field("month,day,status")->where("userid = {$userid} AND year ={$year} AND month = {$month}")->select();
        $time = time();
        $thismonth = date("m",$time);
        $dateList = array();
        $nextDateList = array();
        foreach($scheduleList as $key=>$value){
            if($value['month'] == $thismonth){
                $dateList[$value['day']] = $value['status'];
            }else{
                $nextDateList[$value['day']] = $value['status'];
            }
            
        }
        $first = date('w',mktime(0,0,0,$month,1,$year));//获得这个月1号是周几
        $days = date('t',mktime(0,0,0,$month,1,$year));//根据月日年得出总共有多少天
        $last = 42 - $days - $first;//后面空多少个格子
        $nbsp = '';
        for($i = 1 ; $i <= $first ; $i ++){
            $nbsp.= "<li>&nbsp;</li>";
        }

        //输出中间的日期
        $date = '';
        for($j = 1; $j <= $days ; $j++){
            if($thismonth == $month){
                if($j < $day){
                    $date.= "<li><span>{$j}</span></li>";
                }else{
                    //dump($dateList);exit;
                    if(array_key_exists($j,$dateList)){
                        if($dateList[$j] == '1'){
                            $date.= "<li>{$j}</li>";
                        }else{
                            $date.= "<li class='selectdate'><span class='zxsj_ls'>{$j}</span></li>";
                        }
                         
                    }else{
                         $date.= "<li class='selectdate'>{$j}</li>";
                    }
                }
            }else{
                if(array_key_exists($j,$nextDateList)){
                        if($nextDateList[$j] == '1'){
                            $date.= "<li>{$j}</li>";
                        }else{
                            $date.= "<li class='selectdate'><span class='zxsj_ls'>{$j}</span></li>";
                        }
                }else{
                     $date.= "<li class='selectdate'>{$j}</li>";
                }
            }
        }
        if($thismonth == $month){
            return "<ul class='zxsj_list'>".$nbsp.$date."</ul>";
        }else{
            return "<ul class='zxsj_list' style='display:none'>".$nbsp.$date."</ul>";
        }
    }
    function upload(){
        $upload=new \Think\Upload();
        $upload->maxSize=100000000;
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/userimg/";
        $info=$upload->uploadOne($_FILES['photo']);
        return $info['savepath'].$info['savename'];
    }
    function optable(){
        //D()->execute("alter table lh_user_nurse add province_id int unsigned default null");
        $patient = D('user_nurse');
        
        $patientinfo = $patient->find($_SESSION['userInfo']['userid']);
        dump($patientinfo);
    }
}