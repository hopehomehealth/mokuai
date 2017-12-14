<?php
	namespace Admin\Controller;
	use Think\Controller;
	//appid,appsecret测试使用
	define(APPID,'sdssdsd');
	define(APPSECRET,'dsfdsfdf');
	class WxmenuController extends Controller{
		//生产菜单
		function productmenu(){
			$assess_token = $this->get_assess_token();
			$menu = '{"button":[';
			$button=M('menu')->where(array('pid'=>0,'is_show'=>0))->limit(3)->order('sort desc')->select();
			$count = count($button);
			foreach($button as $key=>$value){
				$menu .= '"name":"'.$value['title'].'",';
				$subbutton = M('menu')->where(array('pid'=>$value['id'],'is_show'=>0))->limit(5)->order('sort desc')->select();
				$subcount = count($subbutton);
				//如果有子菜单
				if($subbutton){
					$menu .= '"sub_button":[';
					foreach($subbutton as $key1=>$value1){
						$menu .= '{"name":"'.$value1['title'].'",';
						if($value1['url'] != ''){
							//是否为最后一个
							if($key1 == ($subbutton-1)){
								$menu .= '"type":"view","url":"'.$value1['url'].'"}';
							}else{
								$menu .= '"type":"view","url":"'.$value1['url'].'"},';
							}
						}else{
							//是否为最后一个
							if($key1 == ($subbutton-1)){
								$menu .= '"type":"click","key":"'.$value1['keyword'].'"}';
							}else{
								$menu .= '"type":"click","key":"'.$value1['keyword'].'"},';
							}
						}
					}
					//是否为最后一个
					if($key == ($count-1)){
						$menu .= ']}';
					}else{
						$menu .= ']},';
					}		
				//如果没有子菜单
				}else{
					if($value['url'] != ''){
						//是否为最后一个
						if($key == ($count-1)){
							$menu .= '"type":"view","url":"'.$value['url'].'"';
						}else{
							$menu .= '"type":"view","url":"'.$value['url'].'",';
						}
					}else{
						//是否为最后一个
						if($key == ($count-1)){
							$menu .= '"type":"click","key":"'.$value['keyword'].'"}';
						}else{
							$menu .= '"type":"click","key":"'.$value['keyword'].'"},';
						}
					}
				}
			}
			$menu .= ']}';
			$menuurl = " https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$assess_token;
			$this->http_request($menuurl,$menu);
		}
		//获取assess_token
		function get_assess_token(){
			$get_token_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET";
			$res = $this->https_curl($get_token_url);
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