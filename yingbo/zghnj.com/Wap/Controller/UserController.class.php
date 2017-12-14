<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Wap\Controller;
use Common\Common\HomeController;
class UserController extends HomeController
{
    function register(){
        if(IS_AJAX){
            foreach($_POST as $key=>$value){
                if(empty($value)){
                    $this->ajaxReturn(array('error'=>1));
                }else{
                    $_POST[$key] = trim($value);
                }
            }
            $user_md = M('user');
            $userinfo = $user_md -> where("username = '{$_POST[username]}'") -> select();
            if($userinfo){
                $this->ajaxReturn(array('error'=>2,'errmsg'=>'用户名已存在'));
            }else{
                $_POST['password'] = md5($_POST['password']);
                if($user_md->create()){
                    $userid = $user_md->add();
                    if($userid){
                        $_POST['userid'] = $userid;
                        $_SESSION['user']['info'] = $_POST;
                        $_SESSION['loginstatus'] = md5($userid);
                        $this->ajaxReturn(array('error'=>0));
                    }
                }
                $this->ajaxReturn(array('error'=>3,'errmsg'=>'意料之外的错误'));
            }
        }
        $title = '用户注册_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    function login(){
        if(IS_AJAX){
            $user_md = M('user');
            $_POST['username'] = trim($_POST['username']);
            $_POST['password'] = md5(trim($_POST['password']));
            $userinfo = $user_md -> where("username = '{$_POST[username]}'") -> select();
            if(!$userinfo){
                $this->ajaxReturn(array('error'=>1,'errmsg'=>'用户名错误'));
            }else{
                if($userinfo[0]['password'] == $_POST['password']){
                    $_SESSION['user']['info'] = $userinfo[0];
                    $_SESSION['loginstatus'] = md5($userinfo[0]['userid']);
                    $this->ajaxReturn(array('error'=>0));
                }else{
                    $this->ajaxReturn(array('error'=>2,'errmsg'=>'密码错误'));
                }
            }
        }
        $title = '用户登录_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    function protocol(){
        $title = '用户使用协议_中国缓粘结网';
        $this->assign('title',$title);
        $result = M('set')->field("protocol")->find();
        $this->assign('protocol',htmlspecialchars_decode($result['protocol']));
        $this->display();
    }
    function logout(){
        session(null);
        $this->redirect("User/login");
    }
}