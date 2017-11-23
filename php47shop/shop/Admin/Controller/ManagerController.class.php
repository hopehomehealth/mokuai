<?php
namespace Admin\Controller;
use Tools\AdminController;


//后台管理员控制器
class ManagerController extends AdminController {
    //登录系统
    public function login(){
        layout(false); //去除默认布局
        if(IS_POST){
            //校验验证码
            $vry = new \Think\Verify();
            if($vry -> check($_POST['chknumber'])){
                //校验用户名、密码
                $name = $_POST['name'];
                $pwd = $_POST['pwd'];
                $info = D('Manager')
                    ->where(array('mg_name'=>$name,'mg_pwd'=>$pwd))
                    ->find();
                if($info !== null){
                    //持久化用户信息
                    session('admin_id',$info['mg_id']);
                    session('admin_name',$info['mg_name']);
                    session('admin_role',$info['role_id']); //持久化角色信息
                    //跳转到后台首页面
                    //redirect($url,$params=array(),$delay=0,$msg='')
                    $this -> redirect('Index/index');
                }else{
                    echo "用户名或密码错误";
                }
            }else{
                echo "验证码错误";
            }
        }
        $this -> display();
    }    

    //退出系统
    function logout(){
        session(null);   //清除session
        $this -> redirect('login');  //跳转到登录页面
    }

    function verifyImg(){
        $cfg = array(
            'fontSize'  =>  13,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点  
            'imageH'    =>  34,               // 验证码图片高度
            'imageW'    =>  88,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        $very = new \Think\Verify($cfg);
        $very -> entry();
    }
}

