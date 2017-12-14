<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Think\Controller;
class CaiclubController extends Controller {
    function index(){
        $daohang = array(
            'second'=>'财商俱乐部',
        );
		if(!isset($_SESSION['flag'])){
			$this->redirect("User/login");
		}else{
			$userid = $_SESSION['userInfo']['userid'];
		}
		//信用积分
		$userdetail = M('userdetail')->where("userid = {$userid}")->find();
		if($userdetail['cash_sc'] > 1000){
			$cash_sc = round($userdetail['cash_sc'] / 10000,2).'万';
			$userdetail['cash_sc'] = $cash_sc;
		}
		$this->assign('userdetail',$userdetail);
		//办卡信息
		$userinfo = M('user')->find($userid);
		//如果办卡成功显示卡信息
		$caiclub = M('caiclub')->where("userid = {$userid} AND status = '1'")->find();
		if($caiclub){
			$userinfo['id_sn'] = $caiclub['num'];
			$userinfo['powerdate'] = $caiclub['add_time']+$caiclub['longer']*365*24*3600;
		}
		$this->assign('userinfo',$userinfo);
        $this -> assign('daohang',$daohang);

        $this ->display();
    }
	function apply() {
		if($_POST){
			$set = M('setting')->field("banka,yangka,tie,daikuan,tuoguan")->find();
			$caiclub_model = M('Caiclub');
			$userid = $_SESSION['userInfo']['userid'];
			$userdetail = M('userdetail')->where("userid = {$userid}")->find();
			if(empty($userdetail['name']) || empty($userdetail['phone'])){
				$this->ajaxReturn(array(
					'error'=>1,
					'content'=>'请完善用户资料'
				));
			}
			$userinfo = M('user')->find($userid);
			$userdetail = M('userdetail')->where("userid = {$userid}")->find();
			$caiclub = $caiclub_model->where("userid = {$userid}")->find();
			if(!$caiclub){

				$data['userid'] = $userid;

				$data['username'] = $userdetail['name'];
				$data['phone'] = $userdetail['phone'];
				$data['add_time'] = time();
				$data['card_fee'] = $set['banka'];
				if($_POST['type'] == 5){
					$data['tuoguan'] = '1';
					$data['card_fee'] = $set['tuoguan'];
				}
				$data['serial_sn'] = '1'.time().rand(10,99);
				$id = $caiclub_model->add($data);
				$this->ajaxReturn(array(
					'error'=>0,
					'type' =>1,
					'content'=>$id
				));
			}else{
				if($caiclub['pay_status'] == '0'){
					$this->ajaxReturn(array(
						'error'=>0,
						'type' =>1,
						'content'=>$caiclub['cai_id']
					));
				}else{
					if($caiclub['status'] == '1'){
						if($_POST['type'] == '1'){
							$this->ajaxReturn(array(
								'error'=>2,
								'content'=>'你已经办理过'
							));
						}elseif($_POST['type'] == '2'){
							$data['userid'] = $userid;
							$data['cardid'] = $caiclub['cai_id'];
							$data['amount'] = $set['yangka'];
							$data['serial_sn'] = '2'.time().rand(10,99);
							$id = M('yangka')->add($data);
							$this->ajaxReturn(array(
								'error'=>0,
								'type' =>2,
								'content'=>$id
							));
						}elseif($_POST['type'] == '3'){
							$data['userid'] = $userid;
							$data['cardid'] = $caiclub['cai_id'];
							$data['amount'] = $set['tie'];
							$data['serial_sn'] = '3'.time().rand(10,99);
							$id = M('tie')->add($data);
							$this->ajaxReturn(array(
								'error'=>0,
								'type' =>3,
								'content'=>$id
							));
						}elseif($_POST['type'] == '4'){
							$data['userid'] = $userid;
							$data['cardid'] = $caiclub['cai_id'];
							$data['amount'] = $set['daikuan'];
							$data['serial_sn'] = '3'.time().rand(10,99);
							$id = M('daikuan')->add($data);
							$this->ajaxReturn(array(
								'error'=>0,
								'type' =>4,
								'content'=>$id
							));
						}elseif($_POST['type'] == '5'){
							$this->ajaxReturn(array(
								'error'=>2,
								'content'=>'你的卡已托管'
							));
						}
					}
				}
			}
		}
		//设置信息
		$set = M('setting')->find();
		$this->assign('set',$set);
		$this->display();
	}


}