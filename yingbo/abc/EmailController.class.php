<?php


namespace Home\Controller;
use Common\Common\ComController;

class EmailController extends ComController {
	public function findpwd() {
		if(IS_POST){
			foreach($_POST as $key => $value){
				if(empty($value)){
					exit;
				}
			}
			$vry = new \Think\Verify();
            if(!$vry -> check($_POST['verifycode'])){
                $this->ajaxReturn(array(
					'error'=>1,
					'content'=>'验证码不正确'
				));
            }
			$username = trim($_POST['username']);
			$email = trim($_POST['email']);
			$userinfo = M('user')->where("username = '{$username}' AND ((openid is null) OR openid = '')")->find();
			
			if($userinfo){
				if($userinfo['email'] != $email){
					$this->ajaxReturn(array(
						'error'=>3,
						'content'=>'邮箱不正确'
					));
				}
			}else{
				$this->ajaxReturn(array(
					'error'=>2,
					'content'=>'用户名不存在'
				));
			}
			if ($userinfo) {
				////$this->success ( '发送成功...', U ( 'Email/email' ), 2 );

				$key = md5($userinfo['username'].'+'.$userinfo['password']);
				// MD5不可逆，验证$string中username，防止URL更改username
				$string = urlencode(base64_encode($userinfo ['username'].'+'.$key)); // 加密，可解密
				$time = time();
				$code=md5('mytime'.$time);

				// 生成URL

				$findpwd = $_SERVER['HTTP_HOST'].'/index.php/Home/Email/newpassword'.'?key='.$key.'&info='.$string.'&time='.$time.'&code='.$code; // code是用来检验time是否有修改过

				// 调用发送邮件函数
				$title="找回密码(蓝海长青)";

				$content="<h3>亲爱的蓝海长青会员：$username 用户</h3><br/><br/><br/>请点击下面链接找回密码<br><br><a href='http://".$findpwd."'>".$findpwd."</a><br><br><br><h4>有效期30分钟</h4><br><br>";
				$sysconf = M('sysconfig')->find();
				$from= $sysconf['email']; //修改为你的发送邮箱
				$emailpwd = $sysconf['emailpwd'];//邮箱密码

				$to=$userinfo ['email'];
				$status = \send_mail ( $title,$content,$from,$to,$emailpwd);
				if($status==1){
					 $this->ajaxReturn(array(
							'error' =>0,
							'content'=>'邮件发送成功'
						));
				}else{
					 $this->ajaxReturn(array(
							'error' => 4,
							'content'=>'邮件发送失败'
						));

				}

			} else {
				$this->ajaxReturn(array(
					'error' => 1,
					'content'=>'此邮箱不是您注册时填写的邮箱'
				));
			}
		}
	}
	public function getpassword() {
		if(isMobile()){
			$this->display ('getpasswordMB');
		}else{
			$this->display ('getpassword');
		}
	}
	public function newpassword() {
		if(isset($_GET ['key']) && isset($_GET ['info']) && isset($_GET ['code']) && isset($_GET ['time']) && !empty($_GET ['key']) && !empty($_GET ['info']) && !empty($_GET ['code']) && !empty($_GET ['time'])){
			$_SESSION['emailpwd'] = array (
				'key'  => trim($_GET ['key']),
				'info' => $_GET ['info'].'111',
				'code' => trim($_GET ['code']),
				'time' => trim($_GET ['time'])
			);
			if(isMobile()){
				$this->display ('newpasswordMB');
			}else{
				$this->display ('newpassword');
			}
		}else{
			echo '非法操作';
		}
	}
	public function uppassword() {
		if(IS_POST){
			if(empty($_POST['password'])){
				$this->ajaxReturn(array(
							'error' => 1,
							'content'=>'请输入新密码'
				));
			}
			if(empty($_POST['repassword'])){
				$this->ajaxReturn(array(
							'error' => 2,
							'content'=>'请再次输入'
				));
			}
			$str = base64_decode ( $_SESSION ['emailpwd'] ['info'] );
			$arr = explode ('+', $str);
			$user['username'] = "{$arr[0]}";
			$user1['openid'] = array(array('EQ',null),array('EQ',''),'OR');
			///dump($user);exit;
			$reinfo = M ( 'user' )->where ( $user )->find ();
			// 判断是否在有效期，这里用时间戳判断，还可以用SESSION有效期判断,这里设置为30分钟
			$retime = time ();
			fwrite(fopen('./Home/sendmail.txt','a'),print_r($_SESSION ['emailpwd'] ['key'],true));
			//fwrite(fopen('./Home/sendmail.txt','a'),print_r($reinfo['username'].'+'.$reinfo['password'].'----'.$_SESSION ['emailpwd']['key']."\r\n"),true);
			if(($_SESSION ['emailpwd'] ['code'] == md5 ( 'mytime' . $_SESSION ['emailpwd'] ['time'] )) && ((($_SESSION ['emailpwd'] ['time']) + (60 * 30)) >= $retime)){
				if(md5($reinfo['username'].'+'.$reinfo['password'] ) == $_SESSION ['emailpwd'] ['key']){ // 判断URL传输中username是否更改
					$upid ['userid'] = $reinfo ['userid'];
					$username = $reinfo ['username'];
					if($_POST ['password'] == $_POST ['repassword'] && $_POST ['password'] != ''){
						$data ['password'] = md5 ( trim ( $_POST ['repassword'] ) );
						$edit = M ( 'user' )->where ( $upid )->data ( $data )->save ();
						if($edit) {
							 unset ( $_SESSION ['emailpwd'] );
							 $this->ajaxReturn(array(
								'error' => 0,
								'content'=>'密码修改成功'
							));
						}else {
							 $this->ajaxReturn(array(
								'error' => 3,
								'content'=>'密码修改失败'
							 ));
						}
					}else {
						 $this->ajaxReturn(array(
							'error' => 2,
							'content'=>'确认密码错误！'
						 ));
					}
				}else {
					 $this->ajaxReturn(array(
							'error' => 3,
							'content'=>'链接出现错误，请重试！'
					 ));

				}
			}else {
				unset( $_SESSION ['emailpwd'] );
				 $this->ajaxReturn(array(
					'error' => 3,
					'content'=>'链接失效，请重新申请！'
				 ));
			}
		}
	}
	 //输出验证码
    function verifyImg(){
        $cfg = array(
            'fontSize'  =>  14,              // 验证码字体大小(px)
            'imageH'    =>  36,               // 验证码图片高度
            'imageW'    =>  100,               // 验证码图片宽度
            'useNoise'  =>  false,            // 是否添加杂点
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '6.ttf',              // 验证码字体，不设置随机获取
        );
        $very = new \Think\Verify($cfg);
        //$very->codeSet = '0123456789';
        //ob_clean();
        $very -> entry();
    }
}


