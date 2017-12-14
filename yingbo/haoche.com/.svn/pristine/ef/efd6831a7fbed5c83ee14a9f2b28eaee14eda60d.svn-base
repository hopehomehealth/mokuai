<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class ExchangeController extends ComController {
    //积分兑现首页历史兑现记录记录
    function index(){
        $daohang = array(
            'second'=>'积分兑换',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $exchange_model = M('exchange');
        
        
        if($_GET['viewmore']){
            $count = $exchange_model->where("userid = {$userid}")->count();
            $p = new \Think\Page($count,3);
            $exchange = $exchange_model->where("userid = {$userid}")->order("inputtime desc")->limit($p->firstRow.','.$p->listRows)->select();
            foreach($exchange as $key=>$value){
                $exchange[$key]['inputtime'] = date('Y-m-d H:i:s',$value['inputtime']);
            }
            $this->ajaxReturn(array(
                        'error'=>0,
                        'content'=>$exchange
                    ));
        }
        $count = $exchange_model->where("userid = {$userid}")->count();
        $p = new \Think\Page($count,3);
        $exchange = $exchange_model->where("userid = {$userid}")->order("inputtime desc")->limit($p->firstRow.','.$p->listRows)->select();
        $this->assign('count',$count);
        $this->assign('exchange',$exchange);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //申请兑换
    function exchange(){
        $daohang = array(
            'second'=>'申请兑换',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $detail_model = M('userdetail');
        $account_model = M('user_account');
        $userdetail = $detail_model->find($userid);
        if($_POST){
            $exchange_model = M('exchange');
            $_POST['userid'] = $userid;
            $_POST['allow'] = $userdetail['cash_sc'];
            $_POST['inputtime'] = time();
            $_POST['order_no'] = 'EX'.time().rand(10,99);
            if(($_POST['amount'] > $_POST['allow']) && ($_POST['amount']%100 != 0)){
                $this->ajaxReturn(array(
                        'error'=>1,
                        'content'=>'申请失败'
                    ));
            }
            if($exchange_model->create()){
                $exchange_model->add();
                $detail_model -> where("userid = {$userid}")->setDec("cash_sc",$_POST['amount']);
                $this->ajaxReturn(array(
                        'error'=>0,
                        'cash_sc'=>$_POST['allow'] - $_POST['amount'],
                        'content'=>'申请成功'
                    ));
            }
        }
        $account = $account_model->where("userid = {$userid}")->select();
        foreach($account as $key=>$value){
            if($value['count_type'] == "支付宝"){

            }
            if($value['count_type'] == "银行卡"){
                $account[$key]['card_no'] = '尾号('.substr($value['card_no'],15,4).")";
            }
        }
        $cash_sc = $userdetail['cash_sc'];
        $this->assign('account',$account);
        $this->assign('cash_sc',$cash_sc);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //兑现账户列表
    function account(){
        $daohang = array(
            'second'=>'提现账户',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $account_model = M('user_account');
        $account = $account_model->where("userid = {$userid}")->select();
        $this->assign('account',$account);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //添加兑现账户
    function addaccount(){
        $daohang = array(
            'second'=>'添加账户',
        );
        if($_POST){
            $userid = $_SESSION['userInfo']['userid'];
            $account_model = M('user_account');
            //控制一个用户最多添加6个提现账户
            $account_num = $account_model->where("userid = {$userid}")->count();
            if($account_num >= 6){
                $this->ajaxReturn(array(
                        'error'=>0,
                        'content'=>'账户数量已达上限'
                    ));
            }
            if($_POST['count_type'] == 1){
                unset($_POST['card_no']);
                unset($_POST['bankname']);
                $_POST['count_type'] = '支付宝';
            }
            if($_POST['count_type'] == 2){
                unset($_POST['count_no']);
                $_POST['count_type'] = "银行卡";
            }
            $_POST['userid'] = $userid;
            if($account_model->create()){
                $account_model->add();
                $this->ajaxReturn(array(
                        'error'=>0,
                        'content'=>'账户添加成功'
                    ));
            }
        }
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //删除兑现账户
    function delaccount(){
        $userid = $_SESSION['userInfo']['userid'];
        $account_model = M('user_account');
        if($_POST['count_id']){
            if($account_model->where("userid = {$userid} AND count_id = {$_POST['count_id']}")->delete()){
                $this->ajaxReturn(array(
                            'error'=>0,
                            'content'=>'删除成功'
                        ));
            }
        }
    }
}