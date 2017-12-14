<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class RechargeController extends AdminController
{
     function index(){
        /*$recharge = D('user_recharge');
        if($_POST['search']){
            $search = trim($_POST['search']);
        }else{
            $search = '';
        }
        $map['username'] = array('LIKE',"%{$search}%"); */
        $model = D();
        $count = D('user_recharge')->group("userid")-> select();
        $count = count($count);
        $p = new \Think\Page($count,10);
        $userList = $model ->field('b.username,b.iphone,count(a.rc_id) as count,a.userid')->table("lh_user_recharge as a,lh_user_patient as b")->where("a.userid = b.userid")->group("a.userid")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p -> show();
        //dump($userList);exit;
        $first = $_GET['p']?$_GET['p']:"1";
        $this->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
        $this ->assign('userList',$userList);
        //dump($postalList);
        $this ->display();
     }
     function records(){
        $recharge = D('user_recharge');
        if($_POST['search']){
            if(empty($_POST['userid'])){
                $this->redirect('Recharge/index');
            }
            $map['rc_no'] = trim($_POST['search']);
            $map['userid'] = $_POST['userid'];
        }else{
            $map['userid'] = $_GET['userid'];
        }
       // dump($map);exit;
        $count = D('user_recharge')->where($map)->count();
        $p = new \Think\Page($count,10);
        $rechargeList = $recharge->where($map)->order("inputtime desc")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p -> show();
        //dump($userList);exit;
        $first = $_GET['p']?$_GET['p']:"1";
        $this->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
        $this ->assign('rechargeList',$rechargeList);
        //dump($postalList);
        $this ->display();
     }
     function del(){
        //$map['userid'] = array('neq','28');
        D('user_recharge')->where("userid is null")->delete();
        $list =  D('user_recharge')->select();
        dump($list);exit;
     }
     function lookup(){
        $rc_id = $_GET['rc_id'];
        $userid = $_GET['userid'];
        $recharge = D('user_recharge');
        $userinfo = D('user_patient')->field('username,iphone')->find($userid);

        $rechargeinfo = $recharge->find($rc_id);
        $this ->assign('userinfo',$userinfo);
        $this ->assign('rechargeinfo',$rechargeinfo);
        $this ->display();
        
     }
}