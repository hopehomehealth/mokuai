<?php
namespace Home\Controller;
use Tools\HomeController;

class UserController extends HomeController {

    public function login(){
        if(IS_POST){
            $user = D('User');
            $shuju = $user -> create();
            $userinfo = $user
                ->where(array('user_name'=>$shuju['user_name'],'user_pwd'=>$shuju['user_pwd']))
                ->find();
            //① 用户名、密码判断
            if($userinfo){
                //② 判断会员是否激活
                if($userinfo['user_check']!='0'){
                    
                    //③ session持久化用户信息
                    session('user_id',$userinfo['user_id']);
                    session('user_name',$userinfo['user_name']);

                    //判断是否有回跳地址并回跳
                    $back_url = session('back_url');
                    //dump($back_url);exit;
                    if(!empty($back_url)){
                        session('back_url',null);//清除回跳地址
                        $this -> redirect($back_url);
                    }

                    //④ 跳转到首页面即可
                    $this -> redirect('Index/index');
                }else{
                    echo "账号没有激活";
                }
            }else{
                echo "用户名或密码错误";
            }
        }
        $this -> display();
    }    
    
    //评论回复，用户登录系统实现
    function loginBack(){
        //校验用户名和密码
        //持久化用户信息
        $user_name = I('post.user_name');
        $user_pwd = I('post.user_pwd');

        $userinfo = D('User')
                ->where(array('user_name'=>$user_name,'user_pwd'=>$user_pwd))
                ->find();
          //① 用户名、密码判断
        if($userinfo){
            //② 判断会员是否激活
            if($userinfo['user_check']!='0'){
                //③ session持久化用户信息
                session('user_id',$userinfo['user_id']);
                session('user_name',$userinfo['user_name']);
                echo json_encode(array('flag'=>'1'));
            }else{
                echo json_encode(array('flag'=>'2','cont'=>"账号没有激活"));
            }
        }else{
            echo json_encode(array('flag'=>'3','cont'=>"用户名或密码错误"));
        }
    }

    //判断用户是否登录系统
    function isLogin(){
        $user_name = session('user_name');
        if($user_name){
            //有登录系统
            echo json_encode(array('flag'=>'1'));
        }else{
            //未登录系统
            echo json_encode(array('flag'=>'2'));
        }
    }

    //qq登录系统实现
    function qq_login(){
        $token = $_SESSION['access_token'];
        $openid = $_SESSION['openid'];
        //获取qq账号信息，并持久化使其登录系统
        //以下地址请求需要信息：access_token、openid、appid
        $url = C('SITE_URL')."Common/Plugin/qq/user/get_user_info.php?access_token=".$token."&openid=".$openid;
        //file_get_contents($url)向其他地址做请求，同时返回请求后的信息
        //file_get_contents($file)打开本地服务器文件

        $qqinfo = file_get_contents($url); //返回json信息

        //json----转化为---->array
        $qqinfo_arr = json_decode($qqinfo,true);

        //把qq账号信息存储给数据库
        //qq账号没有就insert，有则update更新
        //通过openid判断qq记录信息在sp_user表中是否存在
        $userinfo = D('User')->where(array('openid'=>$openid))->find();
        if($userinfo===null){
            //qq记录不存在
            $arr = array(
                'user_name'=>$qqinfo_arr['nickname'],
                'user_sex'=>$qqinfo_arr['gender'],
                'openid'=>$openid,
                'add_time'=>time(),
            );
            $newid = D('User')->add($arr);
        }else{
            //qq记录已经存在
            $newid = $userinfo['user_id'];
            $arr = array(
                'user_id'=>$newid,
                'user_name'=>$qqinfo_arr['nickname'],
                'user_sex'=>$qqinfo_arr['gender'],
                'openid'=>$openid,
            );
            D('User')->save($arr);
        }
        //dump($qqinfo_arr);
        //给qq的昵称持久化操作
        session('user_id',$newid);
        session('user_name',$qqinfo_arr['nickname']);
        //页面跳转
        $this -> redirect('Index/index');
    }

    //会员退出系统
    function logout(){
        session(null);
        $this -> redirect('Index/index');
    }

    
    public function register(){
        $user = new \Model\UserModel();
        if(IS_POST){
            $shuju = $user -> create();
            $shuju['add_time'] = time();
            if($user->add($shuju)){
                $this -> success('注册成功,请登录邮箱激活账号',U('login'),1);
            }else{
                $this -> error('注册失败',U('register'),1);
            }
        }else{
            $this -> display();
        }
    }


    //邮件激活新注册会员
    public function activeUser(){
        $user_id = I('get.user_id');
        $code = I('get.code');

        //① 激活有时间限制(15天)，过期就"删除"未激活的账号
        //   linux:crontab 任务调度指令，每天过滤并删除过期的未激活账号
        //   规定系统在指定时间完成指定的任务
        //② 账号已经激活不能再次重复激活
        $cdt['user_check'] = '0';
        $cdt['user_id'] = $user_id;
        $cdt['user_check_code'] = $code;
        $userinfo = D('User')
            ->where($cdt)
            ->find();
        if($userinfo){
            //激活账号：user_check=1  user_check_code=''
            $arr = array(
                'user_id'=>$user_id,
                'user_check'=>'1',
                'user_check_code'=>'',
            );
            if(D('User')->save($arr)){
                $this -> success('会员激活成功',U('login'),1);
            }else{
                $this -> error('会员激活失败,请联系系统管理',U('login'),1);
            }
        }else{
            exit('非法账号激活');
        }

    }
}
