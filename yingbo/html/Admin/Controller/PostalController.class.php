<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class PostalController extends AdminController
{
     function index(){
        $postal = D('user_postal');
        if($_POST['search']){
            $map['order_no'] = trim($_POST['search']);
        }else{
            $map = '';
        }
        $count = $postal ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $postalList = $postal ->where($map)->limit($p->firstRow.','.$p->listRows)->order("status asc,inputtime desc")->select();
        $page = $p -> show();
        $first = $_GET['p']?$_GET['p']:'1';
        $this->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
        $this ->assign('postalList',$postalList);
        //dump($postalList);
        $this ->display();
     }
     /*function del(){
        $postal = D('user_postal');
        //D()->execute("alter table lh_user_postal add money decimal(10,2) default '0.00'");
        D('user_postal')->where("money = '0.00'")->delete();
        //echo 222;
        //dump($list);exit;
     }*/
     function examine(){
        $cash_id = $_GET['cash_id'];
        $count_id = $_GET['count_id'];
        $userid = $_GET['userid'];
        $postal = D('user_postal');
        $account = D('user_account');
        if($_POST){
            $data['status'] = '1';
            $data['succtime'] = time();
            $postal ->where("cash_id = {$_POST['cash_id']}")->save($data);
            $this ->redirect("Postal/index");
            exit;
            //}
        }
        $userinfo = D('user')->field('shenfen')->find($userid);
        if($userinfo['shenfen'] == 1){
            $model = D('user_patient');
        }else if($userinfo['shenfen'] == 2){
            $model = D('user_assess');
        }else if($userinfo['shenfen'] == 3){
            $model = D('user_nurse');
        }
        $userinfo = $model ->find($userid);
        $postalinfo = $postal ->find($cash_id);
        $accountinfo = $account->find($count_id);
        $this ->assign('userinfo',$userinfo);
        $this ->assign('postalinfo',$postalinfo);
        $this ->assign('accountinfo',$accountinfo);
        $this ->display();
        
     }
}