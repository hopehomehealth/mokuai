<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends AdminController{
    public function index($username = NULL, $password = NULL, $verify = NULL)
    {
        if (IS_POST) {
            if (!($verify)) {
                $this->error('验证码输入错误！');
            }

            $admin = M('Admin')->where(array('username' => $username))->find();

            if ($admin['password'] != md5($password)) {
                $this->error('用户名或密码错误！');
            }else if($admin['status'] == '0'){
                $this->error('账户已冻结!');
            }
            else {
                session('admin_id', $admin['id']);
                session('admin_username', $admin['username']);
                session('admin_password', $admin['password']);
                $this->success('登陆成功!', U('Index/index'));
            }
        }
        else {


            if (session('admin_id')) {
                $this->redirect('Admin/Index/index');
            }

            $this->display();
        }
    }
    public function loginout(){
        session(null);
        $this->redirect('Login/index');
    }
}