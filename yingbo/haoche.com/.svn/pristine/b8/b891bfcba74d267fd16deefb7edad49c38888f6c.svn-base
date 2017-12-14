<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Sadmin\Controller;
use Common\Common\ScomaController;

class SexchangeController extends ScomaController
{
    //提现列表展示
    function showlist(){
		$set = M('setting')->find();
    	if(isset($_GET['nikename'])){
    		$search = $_GET['nikename'];
            $where = "AND u.nikename like '%{$search}%'";
        }
        if(isset($_GET['status'])){
        	$status = $_GET['status'];
        	$where .= " AND e.status = '{$status}'";
        }
        $exchange_model = M('Sexchange');

        $count = $exchange_model ->table('hc_user as u,hc_sexchange as e')->where("u.userid = e.userid {$where}")-> count();
        //echo $count;
        $p = new \Think\Page($count,10);
        $exchange = M()->field("e.*,u.nikename,u.userhead")->table('hc_user as u,hc_sexchange as e')->where("u.userid = e.userid {$where}")->order("status,inputtime")->limit($p->firstRow.','.$p->listRows)->select();
		$nowtime = time();
		foreach($exchange as $key=>$value){
			if(($value['ex_id'] == 34) || ($value['ex_id'] == 35)){
				$exchange[$key]['relsend'] = $value['amount'];
			}
			$secdiff =  $value['inputtime'] + 7 * 24 * 3600 - $nowtime;
			$days = floor($secdiff / (24*3600));
			$hours = floor(($secdiff % (24*3600)) / 3600);
			$mins = floor((($secdiff % (24*3600)) % 3600) / 60);
			$exchange[$key]['relsend'] = $value['amount'] * 100 / (100 -$set['commission']);
			$exchange[$key]['daojishi'] = "<span style='font-weight:bolder;color:red'>".$days."</span>天"."<span style='font-weight:bolder;color:red'>".$hours."</span>时"."<span style='font-weight:bolder;color:red'>".$mins."</span>分";
		}
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
    	$exchange = M('sexchange');
    	$ex_id = $_GET['ex_id'];
    	$data['status'] = '1';
    	$data['checktime'] = time();
    	if($exchange ->where("ex_id = {$ex_id}")->save($data)){
    		$this->success("操作成功");
    	}else{
    		$this->error("系统繁忙，请稍后重试");
    	}

    }
    //执行提现申请不通过操作
    function opfail(){
    	$exchange = M('sexchange');
    	$userdetail = M('userdetail');
    	$ex_id = $_GET['ex_id'];
		$data['status'] = '2';
    	$data['checktime'] = time();
    	if($exchange ->where("ex_id = {$ex_id}")->save($data)){
    		$exch = $exchange->find($ex_id);
    		$userdetail->where("userid = {$exch['userid']}")->setInc('cash_sc',intval($exch['refunds']));
    		$this->success("操作成功");
    	}else{
    		$this->error("系统繁忙，请稍后重试");
    	}
    }
}