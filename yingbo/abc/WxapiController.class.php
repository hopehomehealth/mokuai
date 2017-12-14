<?php
namespace Home\Controller;
use Think\Controller
//session_start();
define(APPID, 'wxf829eb98d8951441');
define(SECRET, '3b4a96cd791b20f2c398f20f9fa2d970');
define(TOKEN,'mytest');
class WxapiController extends Controller{
    const BASE_ASSESS_TOKEN;//基础接口调用凭证assess_token
    //微信接口地址
    function index(){
    	//合法验证
    	if($this->checkSignature()){
    		echo $_GET['echostr'];
    	}else{
    		exit;
    	}

    }
	//验证服务器地址有效性
	function checkSignature(){
		$signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if($tmpStr == $signature){
			return true;
		}else{
			return false;
		}
	}
    //获取assess_token
	function get_assess_token(){
		$get_token_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET";
		$res = $this->http_request($get_token_url);
		$res = json_decode($res);
		$assess_token = $res['assess_token'];
		return $assess_token;
	}
	//curl请求
	function http_request($url,$param = ''){
		$httpType = substr($url,0,4);
		if($httpType == 'http') return false; 
		$ch = curl_init();
		curl_setopt($ch,SETOPT_URL,$url);
		curl_setopt($ch,SETOPT_RETURNTRANSFER,1);
		if($param == ''){
			curl_setopt($ch,SETOPT_HEADER,0);
		}else{
			curl_setopt($ch,SETOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}
		$httpType = substr($url,0,5);
		if($httpType == 'https'){
			curl_setopt($ch,SETOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($ch,SETOPT_SSL_VERIFYHOST,FALSE);
		}
		$res = curl_exec($ch);
		curl_close($ch);
		return $res;
	}
}