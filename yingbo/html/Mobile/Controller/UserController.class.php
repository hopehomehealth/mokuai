<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class UserController extends FooterController {
    function register(){
        $daohang = array(
            'first'=>'用户注册',
        );
        if($_POST){
            foreach($_POST as $value){
                if(empty($value)){
                    $this->redirect("User/register");
                }
            }
            $_POST['user'] = trim($_POST['user']);
            $_POST['password'] = md5(trim($_POST['password']));
            $_POST['iphone'] = trim($_POST['iphone']);
            if(isset($_SESSION['weixin'])){
                $_POST['nikename'] = $_SESSION['weixin']['nickname']; 
                $_POST['userhead'] = $_SESSION['weixin']['headimgurl']; 
                $_POST['openid'] = $_SESSION['weixin']['openid'];
                $_POST['sex'] = $_SESSION['weixin']['sex']; 
                $_POST['country'] = $_SESSION['weixin']['country']; 
                $_POST['provice'] = $_SESSION['weixin']['provice'];
                $_POST['city'] = $_SESSION['weixin']['city'];
            }
            $user = D('user');
            if($user ->create()){
                $lastId = $user ->add();
                if($lastId){
                    if($_POST['shenfen'] == 1){
                        $patient = D('user_patient');
                        $_POST['username'] = $_POST['user'];
                        $_POST['inputtime'] = time();
                        if($_POST['userhead']){
                            $_POST['photo'] = $_POST['userhead'];
                        }
                        $_POST['userid'] = $lastId;
                        if($patient ->create()){
                            if($patient ->add()){
                                $this ->redirect("User/login");
                                exit;
                            }
                        }
                    }
                    if($_POST['shenfen'] == 2){
                        $assess = D('user_assess');
                        $_POST['username'] = $_POST['user'];
                        $_POST['inputtime'] = time();
                        if($_POST['userhead']){
                            $_POST['photo'] = $_POST['userhead'];
                        }
                        $_POST['userid'] = $lastId;
                        if($assess ->create()){
                            if($assess ->add()){
                                $this ->redirect("User/login");
                                exit;
                            }
                        }
                    }
                    if($_POST['shenfen'] == 3){
                        $nurse = D('user_nurse');
                        $_POST['username'] = $_POST['user'];
                        $_POST['inputtime'] = time();
                        if($_POST['userhead']){
                            $_POST['photo'] = $_POST['userhead'];
                        }
                        $_POST['userid'] = $lastId;
                        if($nurse ->create()){
                            if($nurse ->add()){
                                $this ->redirect("User/login");
                                exit;
                            }
                        }
                    }
                }
            }
        }
        $this -> assign('daohang',$daohang);
        $this ->display();
    }
    function doregister(){
        if($_POST){
            $user = D('user');
            if(empty($_POST['user'])){
                $this->ajaxReturn(array(
                        'error' => 1,
                        'content'=>'请输入姓名'
                    ));
            }
            if(empty($_POST['password'])){
                $this->ajaxReturn(array(
                        'error' => 2,
                        'content'=>'请输入密码'
                    ));
            }
            if(empty($_POST['iphone'])){
                $this->ajaxReturn(array(
                        'error' => 3,
                        'content'=>'请输入手机号'
                    ));
            }
            if(empty($_POST['shenfen'])){
                $this->ajaxReturn(array(
                        'error' => 4,
                        'content'=>'请选择身份'
                    ));
            }
            $_POST['user'] = trim($_POST['user']);
            $_POST['password'] = md5(trim($_POST['password']));
            $_POST['iphone'] = trim($_POST['iphone']);
            //$code = trim($_POST['verify']);
            /*$check = $this ->check($code);
            if(!$check){
                $this ->error("验证码不正确");
                exit;
            }*/
            $userinfo = $user -> where("iphone = {$_POST['iphone']}")->select();
            if($userinfo){
                $this->ajaxReturn(array(
                        'error' => 5,
                        'content'=>'该手机号已注册'
                    ));
            }
            if(!$userinfo){
                  $this->ajaxReturn(array(
                        'error' => 0,
                        'content'=>''
                    )); 
            }
        }
    }
    function login(){
        $daohang = array(
            'first'=>'用户登陆',
        );
        $this -> assign('daohang',$daohang);
    	if($_POST){
            $user = D('user');
    		$map['iphone'] = trim($_POST['iphone']);
    		$map['password'] = md5(trim($_POST['password']));
    		$userInfo = $user -> where($map) ->select();
    		if(!$userInfo){
    			$this ->redirect("User/login");
    		}else{
    			$userInfo = $userInfo[0];
    			if($userInfo['shenfen'] == 1){
                    if(empty($userInfo['openid'])){
                        if(isset($_SESSION['weixin'])){
                            $data['nikename'] = $_SESSION['weixin']['nickname']; 
                            $data['userhead'] = $_SESSION['weixin']['headimgurl']; 
                            $data['openid'] = $_SESSION['weixin']['openid'];
                            $data['sex'] = $_SESSION['weixin']['sex']; 
                            $data['country'] = $_SESSION['weixin']['country']; 
                            $data['provice'] = $_SESSION['weixin']['provice'];
                            $data['city'] = $_SESSION['weixin']['city'];
                            if($user ->where("userid = {$userInfo['userid']}")->save($data)){
                                D('user_patient') ->where("userid = {$userInfo['userid']}")->setField('photo',$data['userhead']);
                                $_SESSION['userInfo']=array_merge($userInfo,$data);
                            }
                        }else{
                            $_SESSION['userInfo']=$userInfo;
                        }
                    }else{
                        $_SESSION['userInfo']=$userInfo;
                    }
					//现在做一个唯一的标识号，用来判断用户是否登陆
					$_SESSION['flag']=md5($userInfo['userid']);
                    //dump($_SESSION);die;
    				$this ->redirect("Index/index");
    				exit;
    			}
    			if($userInfo['shenfen'] == 2){
    				if(empty($userInfo['openid'])){
                        if(isset($_SESSION['weixin'])){
                            $data['nikename'] = $_SESSION['weixin']['nickname']; 
                            $data['userhead'] = $_SESSION['weixin']['headimgurl']; 
                            $data['openid'] = $_SESSION['weixin']['openid'];
                            $data['sex'] = $_SESSION['weixin']['sex']; 
                            $data['country'] = $_SESSION['weixin']['country']; 
                            $data['provice'] = $_SESSION['weixin']['provice'];
                            $data['city'] = $_SESSION['weixin']['city'];
                            if($user ->where("userid = {$userInfo['userid']}")->save($data)){
                                $_SESSION['userInfo']=array_merge($userInfo,$data);
                            }
                        }else{
                            $_SESSION['userInfo']=$userInfo;
                        }
                    }else{
                        $_SESSION['userInfo']=$userInfo;
                    }
                    //现在做一个唯一的标识号，用来判断用户是否登陆
                    $_SESSION['flag']=md5($userInfo['userid']);
                    $this ->redirect("Index/index");
                    exit;
    			}
    			if($userInfo['shenfen'] == 3){
    				if(empty($userInfo['openid'])){
                        if(isset($_SESSION['weixin'])){
                            $data['nikename'] = $_SESSION['weixin']['nickname']; 
                            $data['userhead'] = $_SESSION['weixin']['headimgurl']; 
                            $data['openid'] = $_SESSION['weixin']['openid'];
                            $data['sex'] = $_SESSION['weixin']['sex']; 
                            $data['country'] = $_SESSION['weixin']['country']; 
                            $data['provice'] = $_SESSION['weixin']['provice'];
                            $data['city'] = $_SESSION['weixin']['city'];
                            if($user ->where("userid = {$userInfo['userid']}")->save($data)){
                                $_SESSION['userInfo']=array_merge($userInfo,$data);
                            }
                        }else{
                            $_SESSION['userInfo']=$userInfo;
                        }
                    }else{
                        $_SESSION['userInfo']=$userInfo;
                    }
                    //现在做一个唯一的标识号，用来判断用户是否登陆
                    $_SESSION['flag']=md5($userInfo['userid']);
                    $this ->redirect("Index/index");
                    exit;
    			}
    			$this ->redirect("User/login");
    			exit;
    		}

    	}
    	$this ->display();
    }
    function dologin(){
        if($_POST){
            $user = D('user');
            if(empty($_POST['iphone'])){
                $this->ajaxReturn(array(
                        'error' => 1,
                        'content'=>'请输入手机号'
                    ));
            }
            if(empty($_POST['password'])){
                $this->ajaxReturn(array(
                        'error' => 2,
                        'content'=>'请输入密码'
                    ));
            }
            $map['iphone'] = trim($_POST['iphone']);
            $map['password'] = md5(trim($_POST['password']));
            $userInfo = $user -> where($map) ->select();
            if(!$userInfo){
                $iphone = $user ->where("iphone = {$map['iphone']}")->select();
                if($iphone[0]['iphone']){
                    $this->ajaxReturn(array(
                        'error' => 3,
                        'content'=>'密码不正确'
                    ));
                }else{
                    $this->ajaxReturn(array(
                        'error' => 4,
                        'content'=>'手机号未注册'
                    ));
                }
            }
        }
    }
    function is_weixin()
    { 
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return true;
        }  
            return false;
    }
    function perfectData(){
        $daohang = array(
             'first'=>'基本资料',
         );
        $this -> assign('daohang',$daohang);
        if($_POST){
            $user = D('user');
            $userid = $_SESSION['userInfo']['userid'];
            if($user ->create()){
                $user ->where("userid = {$userid}")->save();
                $data['username'] = $_POST['user'];
                $data['iphone'] = $_POST['iphone'];
                $data['inputtime'] = time();
                if($userInfo['shenfen'] == 1){
                    $patient =D('user_patient');
                    $patient ->add($data);
                    $this ->redirect("User/userindex/userid/{$userid}");
                    exit;
                }
                if($userInfo['shenfen'] == 2){
                    $assess =D('user_assess');
                    $assess ->add($data);
                    $this ->redirect("User/userindex/userid/{$userid}");
                    exit;
                }
                if($userInfo['shenfen'] == 3){
                    $nurse =D('user_nurse');
                    $nurse ->add($data);
                    $this ->redirect("User/userindex/userid/{$userid}");
                    exit;
                }
            }
        }
        $this ->display();
    }
    /*function send(){
        $sms = new \Org\Sms\SmsBao("jimochxy", "917751145");//在短信宝注册的账户名和密码
        srand((double)microtime()*1000000);//create a random number feed.
        $ychar="0,1,2,3,4,5,6,7,8,9";
        $list=explode(",",$ychar);
        for($i=0;$i<4;$i++){
	        $randnum=rand(0,35); // 10+26;
	        $authnum.=$list[$randnum];
    	}
    	$seKey = 'WEISHE.COM';
        $iphone = $_POST['iphone'];
        $content = "【消息云】 验证码：{$authnum}，30分钟内有效，如非本人操作，请忽略。";
		$str = $sms->sendSms($iphone,$content);//支持批量发送，多个手机号之间用英文逗号分隔，返回值为数组
		if($str['status'] == 0){//status=0表示发送成功
			$key        =   $this->authcode($seKey);
	        $code       =   $this->authcode(strtoupper($authnum));
	        $secode     =   array();
	        $secode['verify_code'] = $code; // 把校验码保存到session
	        $secode['verify_time'] = NOW_TIME;  // 验证码创建时间
	        session($key, $secode);
	        $this ->ajaxReturn(array(
	        		"error" => 0,
	        		"content" => "短信已发送"
	        	));
		}else{//发送失败
			echo "短信验证码发送失败，请联系客服";
		}
		//初始化必填
    }
    private function authcode($str){
    	$seKey = 'WEISHE.COM';
        $key = substr(md5($seKey), 5, 8);
        $str = substr(md5($str), 8, 10);
        return md5($key . $str);
    }
    private function check($code) {
    	$seKey = 'WEISHE.COM';
        $key = $this->authcode($seKey);
        // 验证码不能为空
        $secode = session($key);
        if(empty($code) || empty($secode)) {
            return false;
        }
        // session 过期
        if(NOW_TIME - $secode['verify_time'] > 60) {
            session($key, null);
            return false;
        }

        if($this->authcode(strtoupper($code)) == $secode['verify_code']) {
            session($key, null);
            return true;
        }

        return false;
    }*/
}