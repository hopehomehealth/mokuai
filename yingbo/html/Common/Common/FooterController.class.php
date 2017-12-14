<?php
namespace Common\Common;
use Think\Controller;
class FooterController extends Controller
{
	var $token;
    function __construct()
    {
			
        parent::__construct();
		$is_weixin = $this->is_weixin();
		$_GET['token'] = 'si3U5iw8W03wiKikiIvQwII895WiQZ3w';
		//$_GET['token'] = 'v2pnbaTE77Nr2zb7T7Eb1u9Ie72A4nG2';
		if(isset($_GET['token'])){
			$this->token = $_GET['token'];
		}
		if(CONTROLLER_NAME != 'User'){
			if((CONTROLLER_NAME == 'Assess') || (CONTROLLER_NAME == 'Patient') || (CONTROLLER_NAME == 'Nurse') || (CONTROLLER_NAME == 'Recharge') || (CONTROLLER_NAME == 'Schedule')){
				if(!isset($_SESSION['flag'])){
					$this->redirect("User/login");
					exit;
				}
			}
		}
		//判断是否是微信
		if($is_weixin){
			//如果openid不存在者去获取
			if(!isset($_SESSION['weixin']['openid']) && $_SESSION['weixin']['openid'] == ''){
				$referer_uri =  SITE_URL.__SELF__;
				$model = M('basic');
				$setting = $model->find();

				if(empty($setting['appid'])){
					$this->error('请配置appid',U('Index/index',array('token'=>$this->token)));
					exit;
				}else{
					$_SESSION['appid'] = $setting['appid'];
					$_SESSION['appsecret'] = $setting['appsecret'];
					$appid = $setting['appid'];
				}
				$redirect_uri = urlencode("http://".$_SERVER['SERVER_NAME']."/index.php/Mobile/Useradd/getuserinfo/?token=".$this->token.'&referer_uri='.$referer_uri);
				$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
				header("Location:$url");
			}
			/*else{
				$openid = $_SESSION['weixin']['openid'];
				 $userModel = M("user");
				 $userinfo = $userModel->where(array('openid'=>$openid))->find();
				 if(!$userinfo){
					$adduser['nikename'] = $_SESSION['weixin']['nickname']; 
					$adduser['userhead'] = $_SESSION['weixin']['headimgurl']; 
					$adduser['openid'] = $_SESSION['weixin']['openid'];
					$adduser['shenfen'] = 1;
					//$adduser['is'] = 1;
					$adduser['sex'] = $_SESSION['weixin']['sex']; 
					$adduser['country'] = $_SESSION['weixin']['country']; 
					$adduser['provice'] = $_SESSION['weixin']['provice'];
					$adduser['city'] = $_SESSION['weixin']['city'];
					$userModel->add($adduser);
				 }else{
					$_SESSION['weixin']['openid'] = $userinfo['openid'];
				 }

			}
			*/
		}
        $table = empty($_SESSION['userInfo']['shenfen'])?"":"{$_SESSION['userInfo']['shenfen']}";
        $userid = empty($_SESSION['userInfo']['userid'])?"":"{$_SESSION['userInfo']['userid']}";
        if(!empty($table) && !empty($userid) && $table == 1){
            $autoChange = "Patient/userindex/userid/{$userid}";
        }else if(!empty($table) && !empty($userid) && $table == 2){
            $autoChange = "Assess/userindex/userid/{$userid}";
        }else if(!empty($table) && !empty($userid) && $table == 3){
            $autoChange = "Nurse/userindex/userid/{$userid}";
        }else{
            $autoChange = 'User/login';
        }
        /*if(empty($table) && !empty($userid)){
            $autoChange = 'User/perfectData/userid/{$userid}';
        }*/
        $this ->assign('autoChange',$autoChange);
    }


	function is_weixin()
	{ 
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
			return true;
		}  
			return false;
	}
	function getcity(){
		if($_POST){
			$upid = $_POST['upid'];
			$province = D('province');
			$datalist = $province->where("upid = {$upid}")->select();
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
}
