<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Mobile\Controller;
use Common\Common\ComController;

class UserController extends ComController
{
    //退出登录
    function logout(){
        session(null);
		cookie('remember_key',null);
        $this->redirect("Index/index");
    }
    //注册
    function register(){
        if(IS_POST){
            //dump($_POST);exit;
            $user_model = M('user');
            if($_POST['xieyi'] != 'on'){
                $this->ajaxReturn(array(
                    'error'=>1,
                ));
            }
            foreach($_POST as $value){
                if(empty($value)){
                    $this->ajaxReturn(array(
                        'error'=>1,
                    ));
                }
            }
            if(!$this->checkname($_POST['username'])){
                $this->ajaxReturn(array(
                    'error'=>1,
                ));
            }
            if(!$this->checkemail($_POST['email'])){
                $this->ajaxReturn(array(
                    'error'=>1,
                ));
            }
            $_POST['password'] = md5(trim($_POST['password']));
            $_POST['username'] = trim($_POST['username']);
            $_POST['email'] = trim($_POST['email']);
			$_POST['add_time'] = time();
            if($user_model->create()){
                $lastid = $user_model->add();
                $data['user_id'] = $lastid;
                $scoreconf = M('score')->field('number')->find(10);
                $data['register'] =  $scoreconf['number'];
                $data['score'] = $scoreconf['number'];
                M('userdetail')->add($data);//添加用户详情记录
                $this->ajaxReturn(array(
                    'error'=>0,
                ));
            }
        }
        $this->display();
    }
    //验证用户名
    function checkname($username=''){
        $user_model = M('user');
        if(IS_GET){
            $userinfo = $user_model -> where("username = '{$_GET['username']}'") -> select();
            if($userinfo){
                echo 'error';
            }else{
                echo 'success';
            }
        }else{
            if($username != ''){
                $userinfo = $user_model -> where("username = '{$username}'") -> select();
                if($userinfo){
                    return false;
                }else{
                    return true;
                }
            }else{
                return false;
            }
        }
   }
   //验证邮箱
    function checkemail($email=''){
        $user_model = M('user');
        if(IS_GET){
            $userinfo = $user_model -> where("email = '{$_GET['email']}'") -> select();
            if($userinfo){
                echo 'error';
            }else{
                echo 'success';
            }
        }else{
            if($email != ''){
                $userinfo = $user_model -> where("email = '{$email}'") -> select();
                if($userinfo){
                    return false;
                }else{
                    return true;
                }
            }else{
                return false;
            }
        }
   }
   //验证验证码
   function checkcode($verifycode=''){
        $vry = new \Think\Verify();
        if(IS_GET){
            if($vry -> check($_GET['verifycode'])){
                echo 'success';
            }else{
                echo 'error';
            }
        }else{
            if($verifycode != ''){
                if($vry -> check($verifycode)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
   }
    //登陆
    function login(){
        //账号密码登陆
        if(IS_POST){
            $username = trim($_POST['username']);
            $password = md5(trim($_POST['password']));
            $user_model = M('user');
            $userinfo = $user_model->where("username = '{$username}' AND password = '{$password}'")->find();
            if($userinfo){
					$userdetail = M('userdetail')->where("user_id = {$userinfo['user_id']}")->find();
                    //自动登录
                    if($_POST['remember'] == 'on'){
                        $remember_model = M('remember');
                        $remember_key = md5(time().rand(0,999));
                        $data['remember_key'] = $remember_key;
                        $data['user_id'] = $userinfo['user_id'];
                        $data['add_time'] = time();
                        $remember_model->add($data);
                        $condition['add_time'] = array('lt',(time() - 1800));
                        $remember_model->where($condition)->delete();
                        cookie('remember_key',$remember_key,1800);
                    }
                    $user_model -> where("user_id = {$userinfo['user_id']}") -> setField('lastlogin',time());//更新最近一次登陆时间
                    $_SESSION['userInfo'] = $userinfo;
                    $_SESSION['flag'] = md5($userinfo['user_id']);
                    //登陆奖励积分
                    $nowtime = date('Y-m-d');
                    $scoreconf = M('score')->field('number,counts')->find(11);
                    $logininfo = M('login')->where("user_id = {$userinfo['user_id']}")->find();
                    if(!$logininfo){
                        $logininfo['user_id'] = $userinfo['user_id'];
                        $logininfo['counts'] = 0;
                        $logininfo['uptime'] = $nowtime;
                        $logininfo['id'] = M('login')->add($logininfo);
                    }

                    if($nowtime == $logininfo['uptime']){
                        if($logininfo['counts'] < $scoreconf['counts']){
                            $logindata['counts'] = array('exp','counts+1');
                        }
                    }else{
                        $logindata['counts'] = 1;
                        $logindata['uptime'] = $nowtime;
                    }
                    if(M('login')->where("id = {$logininfo['id']}")->save($logindata)){
                        $userdata['score'] = array('exp','score+'.$scoreconf['number']);
                        $userdata['login'] = array('exp','login+'.$scoreconf['number']);
                        M('userdetail')->where("user_id = {$userinfo['user_id']}")->save($userdata);
                    }
                    //登陆奖励积分
					$this->transformlevel($userdetail['score'],$userdetail['user_id']);//更新等级
                    $this->ajaxReturn(array(
                        'error'=>0,
                    ));
            }else{
				$userinfo = $user_model->where("username = '{$username}'")->select();
				if($userinfo){
					$this->ajaxReturn(array(
                        'error'=>1,
                    ));
				}else{
					$this->ajaxReturn(array(
						'error'=>2,
					));
				}
            }
        }

        $this->display();
    }

    //用户中心
    function ucenter(){

        $userid = $_SESSION['userInfo']['user_id'];
        $user_model = M('user');
        $detail = $user_model -> alias('u') -> field("u.username,u.lastlogin,u.userhead,u.sex,d.mysign,d.birth,d.address,d.phone,d.qq,d.hobby") -> join("cq_userdetail as d on d.user_id = u.user_id") -> where("u.user_id = {$userid}") -> select();//用户资料
        $this->assign('detail',$detail[0]);
        //签到记录
        $nowtime = date("Y-m-d");
        $signature = M('signature')->where("user_id = {$userid}")->find();
        if(!$signature){
            $signature['user_id'] = $userid;
            $signature['status'] = '0';
            $signature['uptime'] = $nowtime;
            M('signature')->add($signature);
        }else{
            if($nowtime == $signature['uptime']){

            }else{
                $signature['status'] = '0';
                $signature['uptime'] = $nowtime;
                M('signature')->save($signature);
            }
        }
        $this->assign('signature',$signature);
        $this->display();
    }
    //个人资料
    function personal(){
        $userid = $_SESSION['userInfo']['user_id'];
        if(IS_POST){
            $user_model = M('user');
            $detail_model = M('userdetail');
            if(strlen($_POST['username']) > 24){
                $_POST['username'] = str_replace('...','',cutstr($_POST['username'],24));
            }
            if(strlen($_POST['mysign']) > 60){
                $_POST['mysign'] = str_replace('...','',cutstr($_POST['mysign'],60));
            }
            $path = $this->upload();
            if($path){
                $_POST['userhead'] = '/Public/'.$path;
            }
			//dump($_POST);exit;
            $data1 = $user_model -> create();
            $data2 = $detail_model -> create();

            //dump($data1);dump($data2);exit;
            $upstatus = false;
            if($user_model->where("user_id = {$userid}")->save($data1)){
                $upstatus = true;
            }
            if($detail_model->where("user_id = {$userid}")->save($data2)){
                $upstatus = true;
            }
            if($upstatus === true){
                header("location:".SITE_URL.'/index.php/Mobile/User/personal/upstatus/success');exit;
            }else{
                header("location:".SITE_URL.'/index.php/Mobile/User/personal/upstatus/fail');exit;
            }
        }
        $user_model = M('user');
        $detail = $user_model -> alias('u') -> field("u.username,u.lastlogin,u.userhead,u.sex,u.level,d.mysign,d.birth,d.address,d.phone,d.qq,d.hobby") -> join("cq_userdetail as d on d.user_id = u.user_id") -> where("u.user_id = {$userid}") -> select();//用户资料
        $this->assign('detail',$detail[0]);
        $this->display();
    }
    //设置管理
    function set(){
        $this->display();
    }
    //个人资料
    function upd(){
        $userid = $_SESSION['userInfo']['user_id'];
        if(IS_POST){
            $user_model = M('user');
            $detail_model = M('userdetail');
            if(strlen($_POST['username']) > 24){
                $_POST['username'] = str_replace('...','',cutstr($_POST['username'],24));
            }
            if(strlen($_POST['mysign']) > 60){
                $_POST['mysign'] = str_replace('...','',cutstr($_POST['mysign'],60));
            }
            $data1 = $user_model -> create();
            $data2 = $detail_model -> create();


            $upstatus = false;
            if($user_model->where("user_id = {$userid}")->save($data1)){
                $_SESSION['userInfo']['username'] = $data1['username'];
                $upstatus = true;
            }
            if($detail_model->where("user_id = {$userid}")->save($data2)){
                $upstatus = true;
            }
            if($upstatus === true){
                $this->ajaxReturn(array(
                    'error' => 0,
                    'username' => $data1['username']
                ));
            }else{
                $this->ajaxReturn(array(
                    'error' => 1,
                ));
            }
        }
    }
    //修改图像
    function edituserhead(){
        $userid = $_SESSION['userInfo']['user_id'];
        if(IS_POST){
            $path = $this->upload();
            if($path){
                if(file_exists(".".$_POST['olduserhead']) && (!strpos($_POST['olduserhead'],'Home/images'))){
                    unlink(".".$_POST['olduserhead']);
                }
                $_POST['userhead'] = "/Public/".$path;
            }
            if(M('user')->where("user_id = {$userid}")->setField('userhead',$_POST['userhead'])){
                $_SESSION['userInfo']['userhead'] = $_POST['userhead'];
                $this->ajaxReturn(array(
                    'error' => 0,
                    'userhead' => $_POST['userhead']
                ));
            }else{
                $this->ajaxReturn(array(
                    'error' => 1,
                ));
            }
        }
    }
    //修改密码
    function modpsword(){
        $userid = $_SESSION['userInfo']['user_id'];
		$user_model = M('user');
        $userinfo = $user_model -> find($userid);
        if(IS_POST){

            //dump($userinfo);echo md5($_POST['oldpwd']);exit;
            if($userinfo && $userinfo['password'] == md5(trim($_POST['oldpwd']))){
                if($user_model -> where("user_id = {$userid}") ->setField('password',md5(trim($_POST['newpwd'])))){
                    session(null);
                    $this->ajaxReturn(array(
                        'error' => 0
                    ));
                }else{
                    $this->ajaxReturn(array(
                        'error' => 2
                    ));
                }
            }else{
                $this->ajaxReturn(array(
                    'error' => 1,
                ));
            }
        }
		$this->assign('userinfo',$userinfo);
        $this->display();
    }
    //我的积分
    function myscore(){
        $userid = $_SESSION['userInfo']['user_id'];
        $userdetail = M('userdetail')->where("user_id = $userid")->find();
        $this->assign('userdetail',$userdetail);
        $this->display();
    }
    //积分规则
    function rule(){
        $score_model = M('score');
        $rulelist = $score_model -> select();
        foreach($rulelist as $key => $value){
            if($value['cycle'] == 1){
                $rulelist[$key]['cycle'] = '每天';
            }else if($value['cycle'] == 2){
                $rulelist[$key]['cycle'] = '一次性';
            }else if($value['cycle'] == 3){
                $rulelist[$key]['cycle'] = '无周期限制';
            }
        }
        $this->assign('rulelist',$rulelist);
        $this->display();
    }
    //邀请好友
    function invite(){
		//分享到微信、qq

		vendor("Wxshare.JSSDK");
		try{
			$sysconf = M('sysconfig')->field("appid,appsecret")->find();
			$jssdk = new \JSSDK("{$sysconf['appid']}", "{$sysconf['appsecret']}");
			$signPackage = $jssdk->GetSignPackage();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		$this->assign('signPackage',json_encode($signPackage));//签名数据
		$shareData = array();//分享的数据
		$shareData['title']  = '蓝海长青注册邀请';
		$shareData['desc']  =  '';
		$shareData['link']  =  'http://'.$_SERVER['HTTP_HOST'].'/index.php/Home/user/register';
		$shareData['imgUrl']  = 'http://'.$_SERVER['HTTP_HOST'].'/Public/Home/images/images_155.jpg';
		$this->assign('shareData',json_encode($shareData));


        $this->display();
    }
    //我的收藏
    function mycollect(){

        $userid = $_SESSION['userInfo']['user_id'];
        $posts_model = M('posts');
        $userdetail = M('userdetail')->where("user_id = {$userid}")->find();
        $collstr = ltrim($userdetail['coll'],',');
        if($collstr != ''){
            $map['p.post_id'] = array('in',$collstr);
            $count = $posts_model -> alias('p') -> join("cq_user as u on u.user_id = p.user_id")->  where($map) -> count();
            $p = new \Think\Page($count,10);
            $mycollect = $posts_model -> field("p.*,u.username") -> alias('p') -> join("cq_user as u on u.user_id = p.user_id")->  where($map)-> order("sort desc,ctime desc") -> limit($p->firstRow.','.$p->listRows) -> select();
            foreach($mycollect as $key=>$value){
                $mycollect[$key]['ctime'] = date("Y-m-d H:i:s",$value['ctime']);
                $mycollect[$key]['body'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['body']))),100);
                $search = array(" ","　","\n","\r","\t");
                $replace = array("","","","","");
                $mycollect[$key]['body'] = str_replace($search, $replace, $mycollect[$key]['body']);
                if($value['views'] >= 10000){
                    $mycollect[$key]['views'] =  round($mycollect[$key]['views'],1).'万';
                }
                if($value['views'] >= 10000){
                    $mycollect[$key]['comments'] =  round($mycollect[$key]['comments'],1).'万';
                }
            }
            if(IS_AJAX){
                if($mycollect){
                    $this->ajaxReturn(array(
                        'error'=>0,
                        'content'=>$mycollect
                    ));
                }else{
                    exit;
                }
            }
            $this->assign('postlist',$mycollect);
        }else{
            if(IS_AJAX){
                exit;
            }
        }
        $this->display();
    }
    //我的帖子
    function myposts(){

        $userid = $_SESSION['userInfo']['user_id'];
        $posts_model = M('posts');
        $count = $posts_model -> where("user_id = {$userid}") -> count();
        $p = new \Think\Page($count,10);
        $postlist = $posts_model ->  where("user_id = {$userid}")-> order("sort desc,ctime desc") -> limit($p->firstRow.','.$p->listRows) -> select();
        foreach($postlist as $key=>$value){
            $postlist[$key]['ctime'] = date("Y-m-d H:i:s",$value['ctime']);
            $postlist[$key]['body'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['body']))),100);
            $search = array(" ","　","\n","\r","\t");
            $replace = array("","","","","");
            $postlist[$key]['body'] = str_replace($search, $replace, $postlist[$key]['body']);
            if($value['views'] >= 10000){
                $postlist[$key]['views'] =  round($postlist[$key]['views'],1).'万';
            }
            if($value['views'] >= 10000){
                $postlist[$key]['comments'] =  round($postlist[$key]['comments'],1).'万';
            }
        }
        //dump($postlist);exit;
        if(IS_AJAX){
            if($postlist){
                $this->ajaxReturn(array(
                    'error'=>0,
                    'content'=>$postlist
                ));
            }else{
                exit;
            }
        }
        $this->assign('postlist',$postlist);

        $this->display();
    }
    //我的关注
    function myfollows(){

        $userid = $_SESSION['userInfo']['user_id'];
        $famous_model = M('famous');
        $userdetail = M('userdetail')->where("user_id = {$userid}")->find();
        $collstr = ltrim($userdetail['myfollows'],',');
        if($collstr != ''){
            $map['f_id'] = array('in',$collstr);
            $count = $famous_model -> where($map) -> count();
            $p = new \Think\Page($count,10);
            $famous = $famous_model->where($map)->order("f_fans desc,f_artnums desc") -> limit($p->firstRow.','.$p->listRows)->select();
            if(IS_AJAX){
                if($famous){
                    $this->ajaxReturn(array(
                        'error'=>0,
                        'myfollows'=>$famous
                    ));
                }else{
                    exit;
                }
            }
            $this->assign('famous',$famous);
        }else{
            if(IS_AJAX){
                exit;
            }
        }

        $this->display();
    }
    //取消关注
    function cancelfollow(){
        if(IS_GET){
            $f_id = $_GET['f_id'];
            $detail_model = M('userdetail');
            $userid = $_SESSION['userInfo']['user_id'];
            $userdetail = $detail_model->where("user_id = {$userid}")->find();
            $followstr = ltrim($userdetail['myfollows'],',');
            $followArr = explode(',',$followstr);
            $key=array_search($f_id,$followArr);
            array_splice($followArr,$key,1);
            $upfollow = implode(',',$followArr);
            if($detail_model -> where("user_id = {$userid}")->setField('myfollows',','.$upfollow)){
                echo 'success';die;
            }
            echo 'error';
        }
    }
    //签到
    function signature(){
        if(IS_AJAX){
            $userid = $_SESSION['userInfo']['user_id'];
            $nowtime = date('Y-m-d');
            $scoreconf = M('score')->field('number')->find(12);
            $signdata['status'] = '1';
            $signdata['uptime'] = $nowtime;
            if(M('signature')->where("user_id = {$userid}")->save($signdata)){
                $userdata['score'] = array('exp','score+'.$scoreconf['number']);
                $userdata['signature'] = array('exp','signature+'.$scoreconf['number']);
                $userdata['signdays'] = array('exp','signdays+1');
                M('userdetail')->where("user_id = {$userid}")->save($userdata);
                echo 'success';exit;
            }
            echo 'error';exit;
        }else{
            header("location:".$_SERVER['HTTP_REFERER']);
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
    //上传图片
    function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/userhead/";
        $info=$upload->uploadOne($_FILES['userhead']);
        return $info['savepath'].$info['savename'];
    }
}