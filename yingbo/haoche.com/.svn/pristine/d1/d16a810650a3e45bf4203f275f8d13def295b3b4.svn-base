<?php
namespace Common\Common;
use Think\Controller;
class ComController extends Controller
{
	var $token;
    function __construct()
    {
        parent::__construct();
		$is_weixin = $this->is_weixin();
		//$_GET['token'] = 'T1rGN08N7H27n1yn7M51vN0577z3nyhn';
		//$_GET['token'] = 'T1rGN08N7H27n1yn7M51vN0577z3nyhn';
		$_GET['token'] = 'v2pnbaTE77Nr2zb7T7Eb1u9Ie72A4nG2';
		if(isset($_GET['token'])){
			$this->token = $_GET['token'];
		}
		if(CONTROLLER_NAME == 'User'){
			if((ACTION_NAME != 'login') && (ACTION_NAME != 'register')){
				if(!isset($_SESSION['flag'])){
				if(IS_AJAX){
					$this->ajaxReturn('nologin');
				}else{
					$this->redirect("User/login");
				}
			}
			}
		}

		if((CONTROLLER_NAME == 'Order') || (CONTROLLER_NAME == 'Sorder') || (CONTROLLER_NAME == 'Delivery') || (CONTROLLER_NAME == 'Exchange') || (CONTROLLER_NAME == 'Delivery')){
			if(!isset($_SESSION['flag'])){
				if(IS_AJAX){
					$this->ajaxReturn('nologin');
				}else{
					$this->redirect("User/login");
				}
			}
		}
		if(CONTROLLER_NAME == 'Core'){
			if(!isset($_SESSION['flag'])){
				if(IS_AJAX){
					$this->ajaxReturn('nologin');
				}else{
					$this->redirect("User/login");
				}
			}
			if((ACTION_NAME == 'become') || (ACTION_NAME == 'become1') || (ACTION_NAME == 'become2') || (ACTION_NAME == 'become3') || (ACTION_NAME == 'bemerch')){
				if($_SESSION['userInfo']['is_merch'] == 1){
					if(IS_AJAX){
						$this->ajaxReturn('ismerch');
					}else{
						$this->redirect("Core/index");
					}
				}
			}else{
				if(ACTION_NAME == 'checkvip'){
					if($_SESSION['userInfo']['is_supvip'] == 1){
	                    $this->ajaxReturn('ok');
	                }else{
	                    $this->ajaxReturn('error');
	                }
				}
				if($_SESSION['userInfo']['is_merch'] != 1){
					if(IS_AJAX){
						$this->ajaxReturn('notmerch');
					}else{
						$this->redirect("Core/become");
					}
				}
			}
		}
		
		//判断是否是微信
		if($is_weixin){

			//如果openid不存在者去获取
			if(!isset($_SESSION['weixin']['openid']) && $_SESSION['weixin']['openid'] == ''){
				$referer_uri =  SITE_URL.__SELF__;
				$model = M('setting');
				$setting = $model->find();

				if(empty($setting['appid'])){
					$this->error('请配置appid',U('Index/index',array('token'=>$this->token)));
					exit;
				}else{
					$_SESSION['appid'] = $setting['appid'];
					$_SESSION['appsecret'] = $setting['appsecret'];
					$appid = $setting['appid'];
				}
				$redirect_uri = urlencode("http://".$_SERVER['SERVER_NAME']."/index.php/Home/Useradd/getuserinfo/?token=".$this->token.'&referer_uri='.$referer_uri);
				$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
				header("Location:$url");
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
}
