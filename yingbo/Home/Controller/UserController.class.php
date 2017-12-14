<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class UserController extends ComController {
	//退出登陆
    function logout(){
        unset($_SESSION['userInfo']);
        unset($_SESSION['flag']);
		$this->redirect("Index/index");
    }
    //会员注册
    function register(){
        $daohang = array(
            'second'=>'注　册',
        );
        $setting_model = M('setting');
        $set = $setting_model->find();
        $user_model = M('user');
        $detail_model = M('userdetail');
        $regfee_model = M('regfee');
        if($_POST){
			if(!isset($_POST['xieyi'])){
				$this->ajaxReturn(array(
                        'error' => 'fail'
                ));
			}else{
				unset($_POST['xieyi']);
			}
            //验证注册内容是否为空
            $errorno = 1;
            foreach($_POST as $value){
                if(empty($value)){
                    $this->ajaxReturn(array(
                        'error' => $errorno
                    ));
                }
                $errorno++;
            }
            //验证两次密码是否一致
            if($_POST['password'] != $_POST['repassword']){
                $this->ajaxReturn(array(
                        'error' => $errorno
                    ));
            }
            //验证手机号是否合法
            $myreg = "/^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/";
            if(!preg_match($myreg,trim($_POST['reg_phone']))){
                $this->ajaxReturn(array(
                        'error' => $errorno + 1
                    ));
            }else{
                $errorno = $errorno + 1;
            }
			//echo 111;exit;
			//验证手机验证码是否正确
			if(cookie('authnum')){
				$errorno = $errorno + 1;
				$authnum = cookie('authnum');
				if($authnum == $_POST['code']){
					$errorno = $errorno + 1;
				}else{
					$this->ajaxReturn(array(
                        'error' => $errorno + 1
                    ));
				}
			}else{
				$this->ajaxReturn(array(
                        'error' => $errorno + 1
                    ));
			}

			//判断验证码是否正确
			$vry = new \Think\Verify();
            if($vry -> check($_POST['verifycode'])){
				$errorno = $errorno + 1;
			}else{
				$this->ajaxReturn(array(
                        'error' => $errorno + 1
                    ));
			}

            $_POST['reg_phone'] = trim($_POST['reg_phone']);
            //验证手机号是否已注册
            $userinfo = $user_model -> where("reg_phone = {$_POST['reg_phone']}")->select();
            //var_dump($_POST);var_dump($_POST);
            if($userinfo){
                $this->ajaxReturn(array(
                        'error' => $errorno + 1,
                    ));
            }else{
                $errorno = $errorno + 1;
            }
            //验证通过则存储注册信息


            //判断邀请码是否存在并获取该邀请码的会员id
            $_POST['invitecode'] = trim($_POST['invitecode']);
            $pinfo = $user_model -> where("invitecode = '{$_POST['invitecode']}'")->select();
			//dump($pinfo);
            if($pinfo){
                if(!isset($_POST['pid'])){
                    $_POST['pid'] = $pinfo[0]['userid'];
                }
                $errorno = $errorno + 1;
            }else{
                $this->ajaxReturn(array(
                        'error' => $errorno + 1,
                    ));
            }

			//邀请者手机号
            $_POST['invitecode'] = trim($_POST['reg_phone']);
            //生成会员唯一编号
            $_POST['id_sn'] = '68'.substr("{$_POST['reg_phone']}",5,6);
            $_POST['password'] = md5(trim($_POST['password']));
			$_POST['userhead'] = $_SESSION['weixin']['headimgurl'];

            if($user_model ->create()){
                $lastId = $user_model ->add();
                if($lastId){
                    $data['inputtime'] = time();
                    $data['userid'] = $lastId;
                    $data['phone'] = $_POST['reg_phone'];
					$data['shop_sc'] = $set['reg_sc'];
                    $detail_model -> add($data);
					//更新操作记录表
					$records['sourceid'] = $lastId;
					$records['destid'] = $lastId;
					$records['amount'] = $set['reg_sc'];
					$records['type'] = '注册';
					$records['sc_type'] = '乐购';
					$records['time'] = time();
					M('operate')->add($records);
					/*添加会员支付记录
					$vip['userid'] = $lastId;
					$vip['reg_sn'] = "R".time().rand(10,99);
					$vip['inputtime'] = time();
					$regfee_model -> add($vip);*/
					$this->ajaxReturn(array(
                        'error' => 0
                    ));
                }
            }

        }
        $this->assign('daohang',$daohang);
		if($_GET['userid']){
			$puserinfo = $user_model->find($_GET['userid']);
			$this->assign('invitecode',$puserinfo['reg_phone']);
		}else{
			$this->assign('invitecode','');
		}
        $xieyi = M('xieyi')->find();
		$this->assign('xieyi',$xieyi);
        $this ->display();
    }

	//输出验证码
    function verifyImg(){
        $cfg = array(
            'fontSize'  =>  12,              // 验证码字体大小(px)
            'imageH'    =>  30,               // 验证码图片高度
            'imageW'    =>  80,               // 验证码图片宽度
            'useNoise'  =>  false,            // 是否添加杂点
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '6.ttf',              // 验证码字体，不设置随机获取
        );
        $very = new \Think\Verify($cfg);
		$very->codeSet = '0123456789';
		//ob_clean();
        $very -> entry();
    }

    //成为会员缴费and积分冲值
    function regfee(){
        $daohang = array(
            'second'=>'积分充值',
        );
		$userid = $_SESSION['userInfo']['userid'];
        $setting_model = M("setting");
        $set = $setting_model->find();
		$regfee_model = M('regfee');
		$regfee = $regfee_model->where("userid = {$userid} AND status = '0'")->find();
		$nowtime = time();
		if($regfee){
			$data['reg_sn'] = 'R'.$nowtime.rand(10,99);
			$data['amount'] = $set['regfee'];
			$data['inputtime'] = $nowtime;
			$regfee_model->where("regid = {$regfee['regid']}")->save($data);
		}else{
			$data['userid'] = $userid;
			$data['reg_sn'] = 'R'.$nowtime.rand(10,99);
			$data['inputtime'] = $nowtime;
			$data['amount'] = $set['regfee'];
			$data['score'] = $set['back_reg'];
			$regid = $regfee_model->add($data);
			$regfee['regid'] = $regid;
		}
		$this->assign('regfee',$regfee);
        $this->assign('set',$set);
        $this->assign('daohang',$daohang);
        $this->display();
    }

    //用户登陆
    function login(){
        $daohang = array(
            'second'=>'登　录',
        );
        $user_model = M('user');
		$regfee_model = M('regfee');
        if($_POST){

            //验证登陆内容是否为空
            $errorno = 2;
            foreach($_POST as $value){
                if(empty($value)){
                    $this->ajaxReturn(array(
                        'error' => $errorno
                    ));
                }
                $errorno++;
            }
            //验证手机号是否合法
            $myreg = "/^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/";
            if(!preg_match($myreg,trim($_POST['reg_phone']))){
                $this->ajaxReturn(array(
                        'error' => $errorno
                    ));
            }

            //判断用户名密码
            $map['reg_phone'] = trim($_POST['reg_phone']);
            $map['password'] = md5(trim($_POST['password']));
            $userInfo = $user_model -> where("reg_phone = {$map['reg_phone']}") ->select();
            if(!$userInfo){
                $this->ajaxReturn(array(
                        'error' => $errorno + 1
                    ));
            }else{
                $errorno = $errorno + 1;
                if($map['password'] != $userInfo[0]['password']){
                    $this->ajaxReturn(array(
                        'error' => $errorno + 1,
                    ));
                }else{
                    //登陆成功将信息存入session
                    $_SESSION['userInfo']=$userInfo[0];
                    //现在做一个唯一的标识号，用来判断用户是否登陆
                    $_SESSION['flag']=md5($userInfo[0]['userid']);
					//将openid存入cookie
					cookie('openid',$_SESSION['weixin']['openid'],1800);
					//start判断用户是否有退款操作并进行相应操作
					$book_model = M('booking');
					$bookinfo = $book_model->where("userid = {$userInfo[0]['userid']}")->find();
					if($bookinfo){
						if($bookinfo['is_refunds'] == '1'){
							if($bookinfo['refunds_status'] == '0'){
								$this->refunds();
							}
						}
					}
					//退款操作end

					//start判断用户是否有消费积分转换为乐购积分
					if($bookinfo){
						if($bookinfo['is_takecar'] == '1'){
							$this->exchange();
						}
					}
					//end积分转换
                    $this->ajaxReturn(array(
                        'error' => 0,
                    ));
                }
            }
        }
        $this->assign('daohang',$daohang);
        $this ->display();
    }
	//密码找回
	function mmzh() {
		 $daohang = array(
            'second'=>'密码找回',
        );
		 $this->assign('daohang',$daohang);
		if($_POST){
			$user_model = M('user');
			//验证手机是否注册
			$userinfo = $user_model -> where("reg_phone = {$_POST['reg_phone']}")->select();
            //var_dump($_POST);var_dump($_POST);
            if($userinfo){

            }else{
                $this->ajaxReturn(array(
                        'error' => 1
                    ));
            }
			//验证手机验证码是否正确
			if(cookie('authnum')){
				$authnum = cookie('authnum');
				if($authnum == $_POST['code']){
					if($user_model -> where("userid = {$userinfo[0]['userid']}") -> setField('password',md5(trim($_POST['password'])))){
						//删除session重新登陆
						if($_SESSION['flag']){
							unset($_SESSION['userInfo']);
							unset($_SESSION['flag']);
						}
						$this->ajaxReturn(array(
							'error' => 0
						));
					}else{
						$this->ajaxReturn(array(
						'error' => 4
					));
					}
				}else{
					$this->ajaxReturn(array(
						'error' => 2
					));
				}
			}else{
				$this->ajaxReturn(array(
						'error' => 3
					));
			}
		}
		$this->display();
	}
    //渠道建设
    function channel(){
        $daohang = array(
            'second'=>'渠道申请',
        );
		$detail_model = M('userdetail');
        $userid = $_SESSION['userInfo']['userid'];
		$userdetail = $detail_model->where("userid = {$userid}")->find();
		$setting_model = M('setting');
        $set = $setting_model -> find();
		$agent_model = M('agentfee');
		if($_POST){
			if(empty($userdetail['name'])){
				$this->ajaxReturn(array(
						'error' => 1,
						'content' => '请完善用户资料'
				));
			}
			if(empty($userdetail['phone'])){
				$this->ajaxReturn(array(
						'error' => 1,
						'content' => '请完善用户资料'
				));
			}
			if(empty($userdetail['addr'])){
				$this->ajaxReturn(array(
						'error' => 1,
						'content' => '请完善用户资料'
				));
			}
			$level = $_SESSION['userInfo']['level'];
			if($level == 1){
				$this->ajaxReturn(array(
					'error' => 1,
					'content' => '你已经是代理'
				));
			}
			$agentfee = $agent_model->where("userid = {$userid}")->select();
			$path = $this->upload();
			if($path){
				$data['picscreen'] = $path;
			}
			if(!$agentfee){
				$data['project'] = $_POST['project'];
				$data['userid'] = $userid;
				$data['agent_sn'] = 'A'.time().rand(10,99);
				$data['amount'] = $set['agentfee'];
				$data['inputtime'] = time();
				$agentid = M('agentfee')->add($data);
				$this->ajaxReturn(array(
						'error' => 0,
						'content' => $agentid
					));
			}else{

				if($agentfee[0]['picscreen'] != ''){

					$this->ajaxReturn(array(
						'error' => 2,
						'content' => '你已经申请'
					));
				}else{

					$data['project'] = $_POST['project'];
					$agent_model ->where("agentid = {$agentfee[0]['agentid']}")->save($data);

					$this->ajaxReturn(array(
						'error' => 0,
						'content' => $agentfee[0]['agentid']
					));
				}
			}
		}
		$agentfee = $agent_model->where("userid = {$userid}")->find();
        $this->assign('agentfee',$agentfee);
        $this->assign('set',$set);
        $this->assign('userdetail',$userdetail);
        $this->assign('daohang',$daohang);
        $this->display();
    }
	//生成渠道建设信息并跳转到支付
	function agentfee(){
		$userid = $_SESSION['userInfo']['userid'];
		$userdetail = M('userdetail')->where("userid = {$userid}")->find();
		if(empty($userdetail['name'])){
			$this->ajaxReturn(array(
					'error' => 1,
					'content' => '请完善用户资料'
			));
		}
		if(empty($userdetail['phone'])){
			$this->ajaxReturn(array(
					'error' => 1,
					'content' => '请完善用户资料'
			));
		}
		if(empty($userdetail['addr'])){
			$this->ajaxReturn(array(
					'error' => 1,
					'content' => '请完善用户资料'
			));
		}
		$level = $_SESSION['userInfo']['level'];
		if($level == 1){
			$this->ajaxReturn(array(
				'error' => 1,
				'content' => '你已经是代理'
			));
		}
		$agentinfo = M('agentfee')->where("userid = {$userid}")->find();
		$set = M('setting')->find();
		if(!$agentinfo){
			$data['userid'] = $userid;
			$data['agent_sn'] = 'A'.time().rand(10,99);
			$data['amount'] = $set['agentfee'];
			$data['inputtime'] = time();
			$agentid = M('agentfee')->add($data);
			if($agentid){
				$this->ajaxReturn(array(
					'error' => 0,
					'content'=> $agentid
				));
			}
		}else{
			if($agentinfo['status'] == '1'){
				$this->ajaxReturn(array(
					'error' => 2,
					'content' => '你已经申请'
				));
			}else{
				$data['project'] = $_POST['project'];
				M('agentfee') ->where("agentid = {$agentfee['agentid']}")->save($data);
				$this->ajaxReturn(array(
					'error' => 0,
					'content' =>$agentinfo['agentid']
				));
			}
		}
	}
    //会员中心
    function userindex(){
        $daohang = array(
            'second'=>'会员中心',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $model = M();
        $user_model = M('user');
        $detail_model = M('userdetail');

        $userinfo = $user_model->find($userid);
        $onelevel = $this->onecount(); //一级人数
        $twolevel = $this->twocount();//二级人数
        $friends = $onelevel + $twolevel;//我的人脉总数
        $userdetail = $detail_model->field("cash_sc,shop_sc,consume_sc,credit_sc")->find($userid);
		foreach($userdetail as $key=>$value){
			if($value > 10000){
				$userdetail[$key] = round($value / 10000,2).'万';
			}
		}
        $this->assign('onelevel',$onelevel);
        $this->assign('twolevel',$twolevel);
        $this->assign('friends',$friends);
        $this->assign('userdetail',$userdetail);
        $this->assign('userinfo',$userinfo);
        $this->assign('daohang',$daohang);
        $this ->display();
    }
    //我的人脉   一级
    function onelevel(){
        $daohang = array(
            'second'=>'我的人脉',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $model = M();
        $myconnect = $model->field('u.userhead,u.nikename,u.id_sn,d.consume_sc')->table("hc_user as u,hc_userdetail as d")->where("u.userid = d.userid AND u.pid = {$userid}")->select();
        $this->assign('myconnect',$myconnect);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //我的人脉   二级
    function twolevel(){
        $daohang = array(
            'second'=>'我的人脉',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $model = M();
        $user_model = M('user');
        //获取一级的id
        $userids = $user_model->field('userid')->where("pid = {$userid}")->select();
        $arr_userid = array();
        foreach($userids as $key=>$value){
            $arr_userid[] = $value['userid'];
        }
        $str_userid = implode(',',$arr_userid);
        $map['u.pid'] = array('in',$str_userid);
        $myconnect = $model->field('u.userhead,u.nikename,u.id_sn,d.consume_sc')->table("hc_user as u,hc_userdetail as d")->where("u.userid = d.userid")->where($map)->select();
        //dump($myconnect);exit;
        if(!$userids){
            $myconnect = array();
        }
        $this->assign('myconnect',$myconnect);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //我的积分
    function myscore(){
        $daohang = array(
            'second'=>'我的积分',
        );
		$userid = $_SESSION['userInfo']['userid'];
		$operate_model = M('operate');
		$count = $operate_model ->where("destid = {$userid}")-> count();

        $p = new \Think\Page($count,6);
		$operates = $operate_model
				  ->alias("o")
			      ->field("o.*,us.userhead,us.nikename,us.id_sn")
				  ->join("left join hc_user as us on us.userid = o.sourceid")
				  ->where("o.destid = {$userid}")
			      ->order("o.time desc")
			      ->limit($p->firstRow.','.$p->listRows)
				  ->select();
		foreach($operates as $key => $value){
			$operates[$key]['time'] = date("Y-m-d H:i:s",$value['time']);
		}
		$totalPages = $p->totalPages;
		if(IS_POST){
			$this->ajaxReturn(array(
				'error'   => 0,
				'content' => $operates
			));
		}
		//dump($operates);exit;
		$this->assign("totalPages",$totalPages);
		$this->assign('operates',$operates);
        $this->assign('daohang',$daohang);
        $this->display();
    }
	//乐购冲值
	function recharge() {
		$userid = $_SESSION['userInfo']['userid'];
		$set = M('setting')->find();
		if($_POST){
			$regfee_model = M('regfee');
			$regfee = $regfee_model ->where("userid = {$userid} AND status = '0'")->select();
			if($regfee){
				$regfe_model->where("regid = {$regfee['regid']}")->setField('inputtime',time());
				$this->redirect('User/regfee');
			}else{
				$data['userid'] = $userid;
				$data['reg_sn'] = 'R'.time().rand(10,99);
				$data['inputtime'] = time();
				$data['amount'] = $set['regfee'];
				$data['score'] = $set['back_reg'];
				$regid = $regfee_model->add($data);
				$this->redirect('User/regfee');
			}
		}
	}
    //我的二维码
    function myQRcode(){
        $daohang = array(
            'second'=>'我要结缘',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $user_model = M('user');
        $userinfo = $user_model->find($userid);
        if(empty($userinfo['qrcode'])){
            $data = SITE_URL."index.php/Home/User/register/userid/{$userid}";
            $filename = time().substr(md5(rand(0,999)),0,8).'.png';
            $code = $this->qrcode($data,$filename);
            if($code){
                $user_model->where("userid = {$userid}")->setField('qrcode',$code);
                $userinfo['qrcode'] = $code;
            }
        }

        $this->assign('userinfo',$userinfo);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //同步微信资料
    function wxdata(){
        $openid = $_SESSION['userInfo']['openid'];
        $userid = $_SESSION['userInfo']['userid'];
        $user_model = M('user');
        if(!$openid){
            if(isset($_SESSION['weixin'])){
                $_POST['nikename'] = $_SESSION['weixin']['nickname'];
                $_POST['userhead'] = $_SESSION['weixin']['headimgurl'];
                $_POST['openid'] = $_SESSION['weixin']['openid'];
                $_POST['sex'] = $_SESSION['weixin']['sex'];
                $_POST['country'] = $_SESSION['weixin']['country'];
                $_POST['provice'] = $_SESSION['weixin']['provice'];
                $_POST['city'] = $_SESSION['weixin']['city'];
                if($user_model->create()){
                    $user_model->where("userid = {$userid}")->save();
                    foreach($_POST as $key=>$value){
                        if($_SESSION['userInfo'][$key] == ''){
                            $_SESSION['userInfo'][$key] = $value;
                        }
                    }
                    $this->ajaxReturn(array(
                        'error'=>0,
                        'content'=>'资料同步成功'
                    ));
                }
            }else{
                $this->ajaxReturn(array(
                    'error'=>2,
                    'content'=>'资料同步失败'
                ));
            }
        }else{
            $this->ajaxReturn(array(
                'error'=>1,
                'content'=>'你的资料已同步'
                ));
        }
    }
    //个人资料
    function personal(){
        $userid = $_SESSION['userInfo']['userid'];
        $daohang = array(
            'second'=>'个人资料',
        );
        $region_model = M('region');
        $user_model = M('user');
        $detail_model = M('userdetail');
        if($_POST){
            //dump($_POST);
            unset($_POST['country_id']);
            if($_POST['city_id'] == 0 || $_POST['province_id'] == 0){
                unset($_POST['city_id']);
                unset($_POST['province_id']);
                unset($_POST['city']);
            }
            $_POST['edit_name'] = '1';
            $data1 = $detail_model->create();
            if(!$data1['name']){
                unset($data1['edit_name']);
            }
			$flag = false;
            if($detail_model->where("userid = {$userid}")->save($data1)){
				$flag = true;
			}
            $data2 = $user_model->create();
            if($user_model->where("userid = {$userid}")->save($data2)){
				$flag = true;
			}
			if($flag){
				echo 'success';exit;
			}else{
				echo 'fail';exit;
			}
        }
        $userinfo = $user_model->find($userid);
        $detail = $detail_model->find($userid);
		if(!empty($detail['idnumber'])){
			$detail['idnumber'] = substr_replace($detail['idnumber'],'********',6,8);
			//echo $detail['idnumber'];
		}
		if(!empty($detail['phone'])){
			$detail['phone'] = substr_replace($detail['phone'],'*****',3,5);
			//echo $detail['idnumber'];
		}
        $this->assign('detail',$detail);
        $this->assign('userinfo',$userinfo);
        $province = $region_model->where("pid = 1")->select();
        $this->assign('province',$province);
        $this->assign('daohang',$daohang);
        $this ->display();
    }
	//用户协议页面
	function xieyi() {
		$xieyi = M('xieyi')->find();
		$this->assign('xieyi',$xieyi);
		$this->display();
	}
    //获取城市列表
    function getcity(){
        if($_POST){
            $pid = $_POST['pid'];
            $region_model = M('region');
            $datalist = $region_model->where("pid = {$pid}")->select();
            if($datalist){
                $this->ajaxReturn(array(
                        'error'=>0,
                        'content'=>$datalist
                    ));
            }else{
                $this->ajaxReturn(array(
                        'error'=>1,
                        'content'=>''
                    ));
            }
        }
    }


    /*私有工具函数，仅能在控制器中调用*/
    //获取一级人数
    private function onecount(){
        $userid = $_SESSION['userInfo']['userid'];
        $user_model = M('user');
        $count = $user_model->where("pid = {$userid}")->count();
        return $count;
    }
    //获取二级人数
    private function twocount(){
        $userid = $_SESSION['userInfo']['userid'];
        $model = M();
        $user_model = M('user');
        //获取一级的id
        $userids = $user_model->field('userid')->where("pid = {$userid}")->select();
        if(!$userids){
            return 0;
        }
        $arr_userid = array();
        foreach($userids as $key=>$value){
            $arr_userid[] = $value['userid'];
        }
        $str_userid = implode(',',$arr_userid);
        $map['u.pid'] = array('in',$str_userid);
        $count = $model->table("hc_user as u,hc_userdetail as d")->where($map)->where("u.userid = d.userid")->count();
        return $count;
    }
    private function qrcode($data,$filename,$picPath=false,$logo=false,$size='4',$level='L',$padding=2,$saveandprint=false){
         vendor("phpqrcode.phpqrcode");//引入工具包
         $object = new \QRcode();
         // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false

          $path = "./Public/Upl/user/qrcode"; //图片输出路径
          //使用 “$path = $picPath?$picPath:SITE_PATH."\\Uploads\\Picture\\QRcode"; //图片输出路径” 的方式是有问题的。
          //如果路径不存在可以创建 mkdir($path);
         //在二维码上面添加LOGO

        if ($filename==false){
             //$filename=tempnam('','').'.png';//生成临时文件
            die('参数错误');
         }else {
             //生成二维码,保存到文件
             $filename = $path . '/' . $filename; //合成路径
         }
         $object::png($data, $filename, $level, $size, $padding);
         $QR = imagecreatefromstring(file_get_contents($filename));
         $logo = imagecreatefromstring(file_get_contents($logo));
         $QR_width = imagesx($QR);
         $QR_height = imagesy($QR);
         $logo_width = imagesx($logo);
         $logo_height = imagesy($logo);
         $logo_qr_width = $QR_width / 5;
         $scale = $logo_width / $logo_qr_width;
         $logo_qr_height = $logo_height / $scale;
         $from_width = ($QR_width - $logo_qr_width) / 2;
         imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
         if ($filename === false) {
             Header("Content-type: image/png");
             imagepng($QR);
         } else {
             if ($saveandprint === true) {
                 imagepng($QR, $filename);
                 header("Content-type: image/png");//输出到浏览器
                 imagepng($QR);
             } else {
                imagepng($QR, $filename);
             }
        }
        return str_replace('./','/',$filename); //输出时加上前面的/
  }
  //登陆时退款操作
  private function refunds() {
	$userid = $_SESSION['userInfo']['userid'];
	$refunds_model = M('refunds');
	$book_model = M('booking');
	$set = M('setting')->find();
	$refunds = $refunds_model->where("userid = {$userid}")->order("upd_time desc")->select();
	$bookinfo = $book_model->where("userid = {$userid}")->find();
	$nowtime = time();
	$backamount = ceil($bookinfo['downpay'] * ($set['pct_refunds'] / 10000));
	//如果不存在退款记录
	if(!$refunds){
		$data['userid'] = $userid;
		$data['surplus'] = $bookinfo['downpay'];
		$data['upd_time'] = $nowtime;
		//退款操作start
		$lasttime = $bookinfo['refundstime'];
		$timediff = $nowtime - $lasttime;
		$days = floor($timediff / (24*3600));
		$diff = $data['surplus'] - $days * $backamount;
		if($diff > 0){
			$data['surplus'] = $diff;//剩余未退款数量
			$data['amount'] = $days * $backamount;//本次退款数量
		}else{
			$data['amount'] = $data['surplus'];//本次退款数量
			$data['surplus'] = 0;//剩余未退款数量
			$book_model->where("userid = {$userid}")->setField('refunds_status','1');
		}
		//更新操作记录表
		$records['sourceid'] = $userid;
		$records['destid'] = $userid;
		$records['amount'] = $data['amount'];
		$records['type'] = '系统退款';
		$records['sc_type'] = '兑现';
		$records['time'] = $nowtime;
		M('operate')->add($records);
		$refunds_model->add($data);
		M('userdetail')->where("userid = {$userid}")->setField('cash_sc',$data['amount']);
		//退款操作end
	}else{
		//存在的话查看最新一次退款记录
		$lastrefunds = $refunds[0];
		//退款操作start
		$lasttime = $lastrefunds['upd_time'];
		$timediff = $nowtime - $lasttime;
		$days = floor($timediff / (24*3600));
		$diff = $lastrefunds['surplus'] - $days * $backamount;
		if($diff > 0){
			$data['userid'] = $userid;
			$data['surplus'] = $diff;//剩余未退款数量
			$data['upd_time'] = $nowtime;
			$data['amount'] = $days * $backamount;//本次退款数量
			$book_model->where("userid = {$userid}")->setField('refunds_status','1');
		}else{
			$data['userid'] = $userid;
			$data['amount'] = $lastrefunds['surplus'];//本次退款数量
			$data['upd_time'] = $nowtime;
			$data['surplus'] = 0;//剩余未退款数量
			$book_model->where("userid = {$userid}")->setField('refunds_status','1');
		}
		//更新操作记录表
		$records['sourceid'] = $userid;
		$records['destid'] = $userid;
		$records['amount'] = $data['amount'];
		$records['type'] = '系统退款';
		$records['sc_type'] = '兑现';
		$records['time'] = $nowtime;
		M('operate')->add($records);
		$refunds_model->add($data);
		M('userdetail')->where("userid = {$userid}")->setField('cash_sc',$data['amount']);
		//退款操作end
	}
  }
  //登陆成功时积分自动转换操作
  private function exchange() {
	$userid = $_SESSION['userInfo']['userid'];
	$detail_model = M('userdetail');
	$userdetail = $detail_model->where("userid = {$userid}")->find();
	if($userdetail['consume_sc'] > 0){
		$data['shop_sc'] = array('exp','shop_sc+'.$userdetail['consume_sc']);
		$data['consume_sc'] = 0;
		$detail_model->where("userid = {$userid}")->save($data);
		//更新操作记录表
		$records['sourceid'] = $userid;
		$records['destid'] = $userid;
		$records['amount'] = $userdetail['consume_sc'];
		$records['type'] = '消费积分转换';
		$records['sc_type'] = '兑现';
		$records['time'] = $nowtime;
		M('operate')->add($records);
		$refunds_model->add($data);
	}
  }
  function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/payscreen/";
        $info=$upload->uploadOne($_FILES['picscreen']);
        return $info['savepath'].$info['savename'];
  }
  //兑现密码设置
  function cashpwd() {
	$daohang = array(
		'second'=>'兑现密码',
	);
	 $this->assign('daohang',$daohang);
	if($_POST){
		$user_model = M('user');
		$detail_model = M('userdetail');
		//验证手机是否注册
		$userinfo = $user_model -> where("reg_phone = {$_POST['reg_phone']}")->select();
		//var_dump($_POST);var_dump($_POST);
		if($userinfo){

		}else{
			$this->ajaxReturn(array(
					'error' => 1
				));
		}
		//验证手机验证码是否正确
		if(cookie('authnum')){
			$authnum = cookie('authnum');
			if($authnum == $_POST['code']){
				if($detail_model -> where("userid = {$userinfo[0]['userid']}") -> setField('cashpwd',md5(trim($_POST['password'])))){
					$this->ajaxReturn(array(
						'error' => 0
					));
				}else{
					$this->ajaxReturn(array(
						'error' => 4
					));
				}
			}else{
				$this->ajaxReturn(array(
					'error' => 2
				));
			}
		}else{
			$this->ajaxReturn(array(
					'error' => 3
				));
		}
	}
	$this->display();
  }
  //发送手机验证码
  function sendsms() {
	 // echo 'success';exit;
	  $phone = $_POST['phone'];
	  $set_model = M('setting');
	  $set = $set_model->find();
	  $userCode = $set['smsno'];
	  $userPass = $set['smspwd'];
	  $urlsend= $set['sendurl'];
	  $ychar="0,1,2,3,4,5,6,7,8,9";
	  $list=explode(",",$ychar);
	  for($i=0;$i<4;$i++){
		  $randnum=rand(0,9); // 10+26;
		  $authnum.=$list[$randnum];
	  }
	  $token=array("userCode"=>$userCode,"userPass"=>$userPass,"DesNo"=>$phone,"Msg"=>"本次验证码为：".$authnum.", 你正在申请通过新农缘天下用户注册，请勿泄露给他人【新农缘天下】","Channel"=>"0");

      //echo http($urlsend,$token,"GET"); //get请求

      $error = $this->http($urlsend,$token,"POST"); //post请求
	  if(strlen($error) > 5){
		cookie('authnum',$authnum,180);
		echo 'success';
	  }else{
		echo $error;
	  }
  }
  function http($url,$param,$action="GET"){
		$ch=curl_init();
		$config=array(CURLOPT_RETURNTRANSFER=>true,CURLOPT_URL=>$url);
		if($action=="POST"){
			$config[CURLOPT_POST]=true;
		}
		$config[CURLOPT_POSTFIELDS]=http_build_query($param);
		curl_setopt_array($ch,$config);
		$result=curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}