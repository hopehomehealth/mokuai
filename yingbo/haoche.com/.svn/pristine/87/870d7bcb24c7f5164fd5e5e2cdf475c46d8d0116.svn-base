<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class ExchangeController extends Controller
{
    //提现列表展示
    function showlist(){
    	if(isset($_GET['nikename'])){
    		$search = $_GET['nikename'];
            $where = "AND u.nikename like '%{$search}%'";
        }
        if(isset($_GET['status'])){
        	$status = $_GET['status'];
        	$where .= " AND e.status = '{$status}'";
        }
        $exchange_model = M('exchange');

        $count = $exchange_model ->table('hc_user as u,hc_exchange as e,hc_user_account as a')->where("u.userid = e.userid AND a.count_id = e.count_id {$where}")-> count();
        //echo $count;
        $p = new \Think\Page($count,10);
        $exchange = M()->field("e.*,a.count_name,a.bankname,a.card_no,a.count_no,a.bindphone,u.nikename,u.userhead")->table('hc_user as u,hc_exchange as e,hc_user_account as a')->where("u.userid = e.userid AND a.count_id = e.count_id {$where}")->order("e.inputtime desc")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p -> show();
        $first = $_GET['p'] ? $_GET['p']:'1';
        $this ->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
        //dump($exchange);exit;
        $this -> assign('exchange',$exchange);
        $this->display();
    }
    //执行提现申请通过操作
    function oppass(){
    	$exchange = M('exchange');
    	$ex_id = $_GET['ex_id'];
    	$data['status'] = '1';
    	$data['checktime'] = time();
    	if($exchange ->where("ex_id = {$ex_id}")->save($data)){
    		$this->success("操作成功");
    	}else{
    		$this->error("系统繁忙，请稍后重试");
    	}

    }
    //执行提现申请不通过草错
    function opfail(){
    	$exchange = M('exchange');
    	$userdetail = M('userdetail');
    	$ex_id = $_GET['ex_id'];
    	$data['checktime'] = time();
    	if($exchange ->where("ex_id = {$ex_id}")->save($data)){
    		$exch = $exchange->find($ex_id);
    		$userdetail->where("userid = {$exch['userid']}")->setInc('cash_sc',intval($exch['amount']));
    		$this->success("操作成功");
    	}else{
    		$this->error("系统繁忙，请稍后重试");
    	}
    }
}