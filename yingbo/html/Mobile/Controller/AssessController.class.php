<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class AssessController extends FooterController
{

    function userindex()
    {
        $daohang = array(
            'first'=>'个人中心',
        );
        $this -> assign('daohang',$daohang);

        $userid = $_SESSION['userInfo']['userid'];
        $assess = D("user_assess");
        $info = $assess ->field("photo,iphone,status") -> where("userid = {$userid}")-> find();
        $info['photo'] = $info['photo']?"/Public/".$info['photo']:"/Public/Mobile/images/pgtu.jpg";
        $info['id_status'] = $info['status'];
        $order = D('user_order');
        $orderCount = $order ->field("status,count(orderid) as count") -> group("status") ->where("auserid = {$userid}")-> select();
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
        //dump($info);exit;
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
        $orderList = $model ->field("b.username,b.iphone,b.area,b.photo,a.orderid,a.inputtime,a.pingtime,a.pingctime,a.pingwtime,a.casexl,a.evaluate")->table("lh_user_order as a,lh_user_patient as b")->where("a.userid = b.userid AND a.auserid = {$userid}")->order("a.inputtime desc")-> select();
        //dump($orderList);
        $this ->assign('orderList',$orderList);
        $this ->display();
    }
    function xinxi(){

        $daohang = array(
            'first'=>'个人信息',
        );
        $this -> assign('daohang',$daohang);

        $assess = D('user_assess');
        $userid = $_SESSION['userInfo']['userid'];
        if($_POST){
            /*if(isset($_POST['province'])){
                $_POST['city'] = preg_replace("/\d*-/",'',$_POST['province']).preg_replace("/\d*-/",'',$_POST['city']);
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
            /*if(empty($_POST['city'])){
                unset($_POST['city']);
            }*/
            //dump($_POST);exit;
            $path = $this->upload();
            if($path){
                if(file_exists("./Public/".$_POST['oldphoto'])){
                    unlink("./Public/".$_POST['oldphoto']);
                }
                $_POST['photo'] = $path;
            }
            if($assess ->create()){
                if($assess ->where("userid = {$userid}")->save()){
                    D('user')->where("userid = {$userid}")->setField('user',$_POST['username']);
                    $this ->redirect("Assess/userindex");
                }
            }
        }
        $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
        $this ->assign('provincelist',$provincelist);
        $info = $assess ->find($userid);
        //dump($info);
        $this->assign('info',$info);
        $this ->display();
    }
    function cash(){
        $daohang = array(
            'first'=>'用户提现',
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        $assess = D('user_assess');
        $postal = D('user_postal');
        $account = D('user_account');
        if($_POST){
            $_POST['userid'] = $userid;
            $_POST['inputtime'] = time();
            $_POST['order_no'] = 'PS'.substr(md5(rand(0,100)),4,2).time();
            $info = $assess->find($userid);
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
                    if($assess ->where("userid = {$userid}")->save($data)){
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
        $userinfo = $assess ->where("userid = {$userid}")->select();
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
                    $this ->redirect("Assess/cash");
                    exit;
                }
            }
        }
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
    function submitReport(){
        if($_POST){
            //exit;
             $_POST['orderid'] = $_POST['odrid'];
             $_POST['status'] = '2';
             $order = D('user_order');
             $_POST['evaluate'] = $_POST['evaluate'];
             $model = D();
             $patientInfo = $model -> field("b.username,b.iphone,b.area,b.photo,a.casexl,a.orderid")->table("lh_user_order as a,lh_user_patient as b")->where("a.userid = b.userid AND a.orderid = {$_POST['orderid']}")-> select();
            $imgurl = MBIMG_URL.'tx.jpg';;
            $patientInfo[0]['photo'] = $patientInfo[0]['photo']?"{$patientInfo[0]['photo']}":"{$imgurl}";
            $patientInfo[0]['casexl'] = $patientInfo[0]['casexl']?"{$patientInfo[0]['casexl']}":"脊柱康复（胸、腰）针对椎间盘突出、腰肌劳损、坐骨神经损伤等
  引起的腰背部腿部疼痛不适...";
            $_POST['pingwtime'] = time();
             if($order ->create()){
                if($order ->save()){
                    $this ->ajaxReturn(array(
                        "error" =>0,
                        "content"=>"<li>   
                    <p class='wmc_tb wmc_bj'></p>
                    <div class='wmc_list'>
                    <p class='wmc_tp'><img src='".$patientInfo[0]['photo']."'></p>
                    <p class='wmc_wz'>".$patientInfo[0]['username']."<br>联系电话：".$patientInfo[0]['iphone']."<br>联系地址：".$patientInfo[0]['area']."</p>
                    </div>
                    <p class='ypg_con borTop'>
                   <span>患者自述：</span>".$patientInfo[0]['casexl']."
                    </p>
                    <p class='ypg_con wmc_bj2'><span>评估结果：</span>".$_POST['evaluate']."</p>
                   </li>"
                    ));
                }else{
                    $this ->ajaxReturn(array(
                        "error" =>1,
                        "content"=>""
                    ));
                }
             }
        }  
    }
    function doAssess(){
        if($_POST['step'] = 'doAssess'){
            $order = D('user_order');
            $model = D();
            $patientInfo = $model -> field("b.username,b.iphone,b.area,b.photo,a.casexl,a.orderid")->table("lh_user_order as a,lh_user_patient as b")->where("a.userid = b.userid AND a.orderid = {$_POST['orderid']}")-> select();
            $imgurl =MBIMG_URL.'tx.jpg';
            $patientInfo[0]['photo'] = $patientInfo[0]['photo']?"{$patientInfo[0]['photo']}":"{$imgurl}";
            $patientInfo[0]['casexl'] = $patientInfo[0]['casexl']?"{$patientInfo[0]['casexl']}":"脊柱康复（胸、腰）针对椎间盘突出、腰肌劳损、坐骨神经损伤等
  引起的腰背部腿部疼痛不适...";
            $_POST['pingctime'] = time();
            $_POST['status'] = '1';
            if($order ->create()){
                if($order ->save($data)){
                    $this ->ajaxReturn(array(
                        "error" =>0,
                        "content"=>"<li>   
                    <p class='wmc_tb wmc_bj'></p>
                    <div class='wmc_list'>
                    <p class='wmc_tp'><img src='".$patientInfo[0]['photo']."'></p>
                    <p class='wmc_wz'>".$patientInfo[0]['username']."<br>联系电话：".$patientInfo[0]['iphone']."<br>联系地址：".$patientInfo[0]['area']."</p>
                    </div>
                      <p class='ypg_con borTop borBot'>
                   <span>患者自述：</span>".$patientInfo[0]['casexl']."
                    </p>
                    <div class='jxz_con'>
                  
                    <form action='".U('Assess/submitReport')."' method='post'>
  <textarea name='evaluate' placeholder='输入评估内容...'></textarea>
  <input type='hidden' name='odrid' value=".$patientInfo[0]['orderid'].">
  <span class='jxz_an'><a class='subAssess'>提&nbsp;交</a></span>

                    </form>
                    </div>
                   </li>"
                    ));
                }else{
                    $this ->ajaxReturn(array(
                        "error" =>1,
                        "content"=>''
                    ));
                }
            }
        }
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
        //D()->execute("alter table lh_user_assess add province_id int unsigned default null");
        $patient = D('user_assess');
        
        $patientinfo = $patient->find($_SESSION['userInfo']['userid']);
        dump($patientinfo);
    }
}