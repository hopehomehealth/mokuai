<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{

	//用户控制器首页
	public function index(){
		echo 'this usercontroller index page';
	}


	public function login(){
		
	}

	public function register(){
		//判断是否有提交过来的post数据,就是判断 是表单提交
		if(IS_POST){
			//收集表单数据
			$username = I('post.username');
			$password = I('post.password');
			$mail = I('post.mail');

			//组合插入数据的数组数据
			$data = array(
               'username' => $username,
               'password' => $password,
               'mail' => $mail
				);
			//实例化一个model对象
			$userModel = M('user');
			$rs = $userModel->add($data);
			//判断返回值，确定注册是否成功
			//注册 成功
			if($rs){
				//注册成功之后，进行邮件的发送
				$mailRs = sendMail('商城会员用户激活','欢迎您，注册我们的产品，请点击链接进行激活<a href="http://www.youjian.com/index.php/home/User/active/uid/'.$rs.'">点击激活</a>',$mail);
				//首次发送变量标注为1
				$tmp = 1;
				a:
				if($mailRs === true){
					$this->success('注册成功，已经大宋邮件成功，请注意查收邮件进行激活',U('User/index'),3);
					exit();
				}else{
					if($tmp == 2){
						$this->error('已经发送了两次，我也没有招儿了！！',U('User/register'),3);

					}
					//邮件没有发送成功
					$mailRs = sendMail('商城会员用户激活','欢饮您，注册我们的产品，请点击链接进行激活<a href="http://www.youjian.com/index.php/home/User/active">点击激活</a>',$mail);
					//发送失败一次，所以发送第二次，并且标注变量为2
					$tmp = 2;
					goto a;
				}
			}else {
				//注册不成功
				$this->error('注册失败',U('User/register'),3);
			}
		}else {
			//加载静态页面
           $this->display();
		}
	}


	//用户激活的方法
	public function active(){
		//接受用户id信息
		$uid = I('get.uid');
		//实例化模型类
		$userModel = M('User');
		$rs = $userModel->where("id = $uid")->setField('active','1');
		//惊醒用户激活操作
		if($rs) {
			//激活成功的操作
			$this->success('用户激活成功，请登录！',U('User/index'),3);
		}else{
			//激活不成功的操作
			$this->error('非法激活操作',U('User/register'),3);
		}
	}
}







?>