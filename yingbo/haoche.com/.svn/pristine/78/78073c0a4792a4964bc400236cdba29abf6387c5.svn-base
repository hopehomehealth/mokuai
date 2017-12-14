<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Sadmin\Controller;
use Common\Common\ScomaController;

class UserController extends ScomaController
{
    function userlist(){
        if($_GET['keywords']){
            $search = $_GET['keywords'];
            $map['nikename'] = array('LIKE',"%{$search}%");
        }else{
            $map = '';
        }
        $user_model = M('user');
        $count = $user_model ->where($map)-> count();
		//echo $count;
        $p = new \Think\Page($count,10);
        /*$userList = M()->query("select a.*,a.nikename,b.nikename as pname,b.userhead as puserhead from hc_user as a left join hc_user as b on a.pid = b.userid {$where} order by userid desc limit {$p->firstRow},{$p->listRows}");*/
        $userList = $user_model ->where($map)->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p -> show();
        $first = $_GET['p'] ? $_GET['p']:'1';
        $this ->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
        //dump($userList);
        $this -> assign('userList',$userList);
        $this->display();
    }
    function userdetail(){
    	$this->display();
    }
	function tianjia() {
		if($_POST){
			$user_model = M('user');
			$detail_model = M('userdetail');
			$set = M('setting')->find();
			foreach($_POST as $value){
                if(empty($value)){
                    $this->error("信息不能为空");
					exit;
                }
            }
			$myreg = "/^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/";
            if(!preg_match($myreg,trim($_POST['reg_phone']))){
                $this->error("非法的手机号");
				exit;
            }
			//验证两次密码是否一致
            if($_POST['password'] != $_POST['repassword']){
                $this->error("确认密码错误");
				exit;
            }
			//验证手机号是否已注册
            $userinfo = $user_model -> where("reg_phone = {$_POST['reg_phone']}")->select();
            if($userinfo){
				$this->error("手机号已注册");
				exit;
			}
			$_POST['reg_phone'] = trim($_POST['reg_phone']);
			$_POST['password']  = md5(trim($_POST['password']));
			$_POST['pid'] = 0;//顶级会员标志
			$_POST['invitecode'] = $_POST['reg_phone'];
			 //生成会员唯一编号
            $_POST['id_sn'] = '68'.substr("{$_POST['reg_phone']}",5,6);
			$_POST['userhead'] = "/Public/Home/images/sysimg.jpg";
			if($user_model->create()){
				$userid = $user_model->add();
				$data['inputtime'] = time();
                $data['userid'] = $userid;
                $data['phone'] = $_POST['reg_phone'];
				$data['shop_sc'] = $set['reg_sc'];
                $detail_model -> add($data);
				$this->success("添加成功");
				exit;
			}else{
				$this->error("添加失败");
				exit;
			}
		}
		$this->display();
	}

    function login(){
        layout(false);
        C('SHOW_PAGE_TRACE',false);
        if(IS_POST){
        	//dump($_POST);exit;
            $phone = $_POST['reg_phone'];
            $pwd =md5($_POST['password']);
            $info = D('user')
                ->where(array('reg_phone'=>$phone,'password'=>$pwd))
                ->find();

            if($info){
            	if($info['is_merch'] == '1'){
            		$_SESSION['userInfo']=$info;
	                //dump($_SESSION['userInfo']);die;
	                session('userid',$info['userid']);
	                session('reg_phone',$info['reg_phone']);
	                session('flag',$info['userid']);
	                //echo session('suserid');exit;
	                //echo session('flag');exit;
	                $this -> redirect('Index/index'); //迅速发生跳转
            	}else{
            		echo "<script type='text/javascript'>alert('非法登录');</script>";
            	}
                
            }else{
                echo "<script type='text/javascript'>alert('手机号或密码错误');</script>";
            }
        }
        $this -> display();
    }

    //退出系统
    function logout(){
        session(null); //销毁session
        $this -> redirect('login');
    }


	function aplaylist() {
		$agent_model = M('agentfee');
		$count = $agent_model -> count();
        $p = new \Think\Page($count,10);
		$aplaylist = $agent_model ->field("hc_agentfee.*,hc_user.nikename,hc_user.nikename,hc_user.userhead")
				   ->join("left join hc_user on hc_user.userid = hc_agentfee.userid")
				   ->select();
		$page = $p -> show();
        $first = $_GET['p'] ? $_GET['p']:'1';
        $this ->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
		$this->assign('aplaylist',$aplaylist);
		$this->display();
	}
	//确认用户支付操作
	function checkout() {
		$agentid = $_GET['agentid'];
		$agentfee = M('agentfee')->find($agentid);
		if($agentfee['picscreen'] != ''){
			$data['status'] = '1';
			$data['paytime'] = $agentfee['inputtime'];
			M('agentfee')->where("agentid")->save($data);
			M('user')->where("userid = {$agentfee['userid']}")->setField('is_aplay','1');
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	}
    function beagent(){
		$userid = $_GET['userid'];
		$agentfee = M('agentfee')->where("userid = {$userid}")->find();
		if($agentfee && $agentfee['status'] == 1){
			M('user')->where("userid = {$userid}")->setField('level',1);
			$this->success("确认资格操作成功");
		}else{
			$this->error("确认资格操作失败");
		}
    }
	function cancel() {
		$userid = $_GET['userid'];
		$data['level'] = '0';
		if(M('user')->where("userid = {$userid}")->save($data)){
			$res['status'] = '0';
			$res['paytime'] = '';
			$res['picscreen'] = '';
			M('agentfee')->where("userid = {$userid}")->save($res);
			M('user')->where("userid = {$userid}")->setField('is_aplay','0');
			$this->success("取消资格操作成功");
		}else{
			$this->error("取消资格操作失败");
		}
	}
}