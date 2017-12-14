<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class ScheduleController extends AdminController
{
    function nurse(){
        $model = D();
        if($_POST){
            $arr = explode("-",$_POST['date']);
            $_POST['year'] = $arr[0]?$arr[0]:'';
            $_POST['month'] = $arr[1]?intval($arr[1]):'';
            $_POST['day'] = $arr[2]?intval($arr[2]):'';
            $year = $_POST['year'];
            $month = $_POST['month'];
            $day = $_POST['day'];
            //dump($_POST);exit;
            $nurseList = $model -> query("select a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id from lh_user_nurse as a,lh_user_schedule as b where a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'");
            foreach($nurseList as $key => $value){
                if(isset($_POST['country_id']) && !empty($_POST['country_id'])){
                    if($_POST['country_id'] != $value['country_id']){
                        unset($nurseList[$key]);
                    }
                }else{
                    if(isset($_POST['city_id']) && !empty($_POST['city_id'])){
                        if($_POST['city_id'] != $value['city_id']){
                            unset($nurseList[$key]);
                        }
                    }else{
                        if(isset($_POST['province_id']) && !empty($_POST['province_id'])){
                            if($_POST['province_id'] != $value['province_id']){
                                unset($nurseList[$key]);
                            }
                        }
                    }
                }
            }
            $this->assign('selectdate',$_POST['date']);
            $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
            $this ->assign('provincelist',$provincelist);
            $this -> assign('firstno',1);
            $this ->assign('nurseList',$nurseList);
            $this ->display();exit;
        }
        $time = time();
        $month = date('n',$time);
        $day = date('d',$time);
        $year = date('Y');
        $nurseres = $model -> query("select a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id from lh_user_nurse as a,lh_user_schedule as b where a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'");
        $count = count($nurseres);
        $p = new \Think\Page($count,15);
        $nurseList = $model -> field("a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id")->table("lh_user_nurse as a,lh_user_schedule as b")-> where("a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'")->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
        $this ->assign('provincelist',$provincelist);
        $first = $_GET['p']?$_GET['p']:"1";
        $this -> assign('firstno',($first-1)*15+1);
        $this -> assign('page',$page);
        $this ->assign('nurseList',$nurseList);
        $this ->display();
    }
    function assess(){
        $model = D();
        if($_POST){
            $arr = explode("-",$_POST['date']);
            $_POST['year'] = $arr[0]?$arr[0]:'';
            $_POST['month'] = $arr[1]?intval($arr[1]):'';
            $_POST['day'] = $arr[2]?intval($arr[2]):'';
            $year = $_POST['year'];
            $month = $_POST['month'];
            $day = $_POST['day'];
            //dump($_POST);exit;
            $assessList = $model -> query("select a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id from lh_user_assess as a,lh_user_schedule as b where a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'");
            foreach($assessList as $key => $value){
                if(isset($_POST['country_id']) && !empty($_POST['country_id'])){
                    if($_POST['country_id'] != $value['country_id']){
                        unset($assessList[$key]);
                    }
                }else{
                    if(isset($_POST['city_id']) && !empty($_POST['city_id'])){
                        if($_POST['city_id'] != $value['city_id']){
                            unset($assessList[$key]);
                        }
                    }else{
                        if(isset($_POST['province_id']) && !empty($_POST['province_id'])){
                            if($_POST['province_id'] != $value['province_id']){
                                unset($assessList[$key]);
                            }
                        }
                    }
                }
            }
            $this->assign('selectdate',$_POST['date']);
            $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
            $this ->assign('provincelist',$provincelist);
            $this -> assign('firstno',1);
            $this ->assign('assessList',$assessList);
            $this ->display();exit;
        }
        $time = time();
        $month = date('n',$time);
        $day = date('d',$time);
        $year = date('Y');
        $assessres = $model -> query("select a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id from lh_user_assess as a,lh_user_schedule as b where a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'");
        $count = count($assessres);
        $p = new \Think\Page($count,15);
        $assessList = $model -> field("a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id")->table("lh_user_assess as a,lh_user_schedule as b")-> where("a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'")->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
        $this ->assign('provincelist',$provincelist);
        $first = $_GET['p']?$_GET['p']:"1";
        $this -> assign('firstno',($first-1)*15+1);
        $this -> assign('page',$page);
        $this ->assign('assessList',$assessList);
        $this ->display();
    }
    function ajaxAssess(){
        $model = D();
        if($_POST){
            $userid = $_POST['userid'];
            $info = D('user_patient')->find($userid);
            $year = $_POST['year'];
            $month = intval($_POST['month']);
            $day = intval($_POST['day']);
            $assessList = $model -> query("select a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id from lh_user_assess as a,lh_user_schedule as b where a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'");
            foreach($assessList as $key => $value){
                if($_POST['fanwei'] == '1'){
                    if($info['province_id'] != $value['province_id']){
                        unset($assessList[$key]);
                    }
                }else if($_POST['fanwei'] == '2'){
                    if($info['city_id'] != $value['city_id']){
                        unset($assessList[$key]);
                    }
                }else if($_POST['fanwei'] == '3'){
                    if($info['country_id'] != $value['country_id']){
                        unset($assessList[$key]);
                    }
                }else{
                    continue;
                }
            }
            $this->ajaxReturn(array(
                    'error'=>0,
                    'content'=>$assessList
                ));
        }
    }
    function ajaxNurse(){
        $model = D();
        if($_POST){
            $userid = $_POST['userid'];
            $info = D('user_patient')->find($userid);
            $year = $_POST['year'];
            $month = intval($_POST['month']);
            $day = intval($_POST['day']);
            //echo $month.'=='.$day;
            $nurseList = $model -> query("select a.userid,a.username,a.city,a.province_id,a.city_id,a.country_id,a.iphone,b.status,b.id from lh_user_nurse as a,lh_user_schedule as b where a.userid = b.userid AND b.year = {$year} AND b.month = {$month} AND b.day = {$day} AND b.status = '0'");
            foreach($nurseList as $key => $value){
                if($_POST['fanwei'] == '1'){
                    if($info['province_id'] != $value['province_id']){
                        unset($nurseList[$key]);
                    }
                }else if($_POST['fanwei'] == '2'){
                    if($info['city_id'] != $value['city_id']){
                        unset($nurseList[$key]);
                    }
                }else if($_POST['fanwei'] == '3'){
                    if($info['country_id'] != $value['country_id']){
                        unset($nurseList[$key]);
                    }
                }else{
                    continue;
                }
            }
            $this->ajaxReturn(array(
                    'error'=>0,
                    'content'=>$nurseList
                ));
        }
    }
}