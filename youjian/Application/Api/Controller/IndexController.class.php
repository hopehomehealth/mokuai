<?php
namespace Api\Controller;
use Think\Controller;

class IndexController extends Controller {

   public function testSend(){
   	//直接去调用fuction.php里面公共方法
   	//邮件标题
   	$subject = 'PHP47商城测试邮件';
   	//邮件主体内容
   	$msghtml = '欢迎注册我们的商城网站';
   	//发送到什么地址
   	$sendAddress = 'xingzhehome@126.com';
   	$aaa = sendMail($subject,$msghtml,$sendAddress);
   	echo $aaa;
   	// if(sendMail($subject,$msghtml,$sendAddress)) {
   	// 	echo 1;
   	// } else {
   	// 	echo 0;
   	// }
   	
   }



}