<?php
namespace Home\Controller;
use Think\Controller;
//session_start();
define(APPID, $_SESSION['appid']);
define(SECRET, $_SESSION['appsecret']);
class UseraddController extends Controller {
    function httpscurl($get_token_url){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$get_token_url);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		$res = curl_exec($ch);
		return $res;
	}

	public function send_get($url, $post = '') {

		if(strtolower(substr($url,0,4) != 'http')) return false;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		if(!empty($post)) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		} else {
			curl_setopt($ch, CURLOPT_HEADER, 0);
		}

		$ssl = strtolower(substr($url, 0, 5));
		if($ssl == 'https') {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}

		$result = curl_exec($ch);
		curl_close($ch);
		//var_dump($$result);exit;
		return $result;
	}

	//根据openid和access_token查询用户信息
	//解析json
	public function getuserinfo() {
		if(!isset($_SESSION['code'])){
			$_SESSION['code'] = $_GET['code'];
		}
		$code = $_GET["code"];

		$get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.APPID.'&secret='.SECRET.'&code='.$code.'&grant_type=authorization_code';
		//$get_token_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".SECRET;
		//echo $get_token_url;exit;
		$list = $this->send_get($get_token_url);
		//var_dump($list);exit;
		$json_obj = json_decode($list,true);
		$access_token = $json_obj['access_token'];
		$openid = $json_obj['openid'];
		$get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
		$res = $this->send_get($get_user_info_url);
		$user_obj = json_decode($res,true);
		//var_dump($get_user_info_url);exit;
		if($user_obj){
			$_SESSION['weixin'] = $user_obj;
		}
		//dump($_SESSION['weixin']);exit;
		//echo $_GET['referer_uri'];exit;
		$url = $_GET['referer_uri'];
		header("Location:".$url);
		//fwrite(fopen('./Lib/Action/Wap/user.txt', 'w'), print_r($user_obj, true));


	}
}

?>