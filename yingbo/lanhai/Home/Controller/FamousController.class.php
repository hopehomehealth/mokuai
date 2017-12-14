<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Home\Controller;
use Common\Common\ComController;

class FamousController extends ComController
{
    //名家论坛文章列表
    function slanders1(){
        if(isset($_GET['f_id'])){
            $map['f_id'] = $_GET['f_id'];
            $condition['s.f_id'] = $_GET['f_id'];
			$famousinfo = M('famous')->find($_GET['f_id']);
			if($famousinfo){
				$this->assign('famousinfo',$famousinfo);
			}
        }
        $map['is_show'] = '1';
        $map['type'] = '1';
        $condition['s.is_show'] = '1';
        $condition['s.type'] = '1';
        $famousinfo = M('famous')->find($_GET['f_id']);
        $this->assign('famousinfo',$famousinfo);
        $slanders_model = M('slanders');
        $bbsset = M('bbs')->field("pg_posts")->find();//获取论坛分页设置
        $count = $slanders_model -> where($map) -> count();
        $p = new \Think\Page($count,$bbsset['pg_posts']);

        $slanders = $slanders_model
                  -> alias('s')
                  -> field("s.*,f.f_name,f_photo")
                  -> join("cq_famous as f on f.f_id = s.f_id")
                  -> where($condition)
                  -> order("f.f_fans desc,s.views desc,s.add_time desc")
                  -> limit($p->firstRow.','.$p->listRows)
                  -> select();
        foreach($slanders as $key=>$value){
            $slanders[$key]['content'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['content']))),100);
            if($value['views'] >= 10000){
                $slanders[$key]['views'] =  round($value['views'] /10000,1).'万';
            }
            if($value['views'] >= 10000){
                $slanders[$key]['comments'] =  round($value['comments'] /10000,1).'万';
            }
        }
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('slanders',$slanders);
        //dump($famousinfo);exit;
        //推荐名家人物
        $tuijianlist = M('famous')->where("f_type = '1' AND is_tuijian = '1' AND f_id <> {$famousinfo['f_id']}")->order("f_fans desc,f_artnums desc")->limit(5)->select();
        $this->assign('tuijianlist',$tuijianlist);
        //热点文章
        $hotlist = M('slanders')->alias('s')->join("cq_famous as f on f.f_id = s.f_id")->where("s.is_show = '1' AND s.type = '1' AND s.is_tui = '1'")->order('s.views desc,s.comments desc')->limit(10)->select();
        $this->assign('hotlist',$hotlist);
        //dump($slanders);exit;

		$title = $famousinfo['f_name'].'_'.'名家讲坛'.'_'.'蓝海长青';
		$this->assign('title',$title);
        $this->display();
    }
    //蓝海人物文章列表
    function slanders2(){
        $map['f_id'] = $_GET['f_id'];
        $famousinfo = M('famous')->find($_GET['f_id']);
        $this->assign('famousinfo',$famousinfo);
        $map['is_show'] = '1';
        $map['type'] = '2';
        $slanders_model = M('slanders');
        $bbsset = M('bbs')->field("pg_posts")->find();//获取论坛分页设置
        $count = $slanders_model -> where($map) -> count();
        $p = new \Think\Page($count,$bbsset['pg_posts']);
        $slanders = $slanders_model
                  -> where($map)
                  -> order("is_tui desc,add_time desc")
                  -> limit($p->firstRow.','.$p->listRows)
                  -> select();
        foreach($slanders as $key=>$value){
            $slanders[$key]['content'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['content']))),100);
            if($value['views'] >= 10000){
                $slanders[$key]['views'] =  round($value['views'] /10000,1).'万';
            }
            if($value['views'] >= 10000){
                $slanders[$key]['comments'] =  round($value['comments'] /10000,1).'万';
            }
        }
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('slanders',$slanders);
        //推荐蓝海人物
        $tuijianlist = M('famous')->where("f_type = '2' AND is_tuijian = '1' AND f_id <> {$famousinfo['f_id']}")->order("f_fans desc,f_artnums desc")->limit(5)->select();
        $this->assign('tuijianlist',$tuijianlist);
        //热点文章
         $hotlist = M('slanders')->alias('s')->join("cq_famous as f on f.f_id = s.f_id")->where("s.is_show = '1' AND s.type = '2' AND s.is_tui = '1'")->order('s.views desc,s.comments desc')->limit(10)->select();
        $this->assign('hotlist',$hotlist);
        //dump($tuijianlist);exit;
		$title = $famousinfo['f_name'].'_'.'蓝海人物'.'_'.'蓝海长青';
		$this->assign('title',$title);
        $this->display();
    }
    //名家讲坛
    function famousbbs(){
        $bbsset = M('bbs')->field("pg_posts")->find();//获取论坛分页设置
        $count = M()->query("select count(*) as count from cq_slanders a left join cq_famous as f on f.f_id = a.f_id where add_time = (select max(add_time) from cq_slanders where f_id = a.f_id) AND f.f_type = '1'  order by a.f_id ");
        $p = new \Think\Page($count[0]['count'],$bbsset['pg_posts']);
        $slanders = M()->query("select a.*,f.f_id,f.f_photo,f.f_name from cq_slanders a left join cq_famous as f on f.f_id = a.f_id where add_time = (select max(add_time) from cq_slanders where f_id = a.f_id) AND f.f_type = '1'  order by a.add_time desc limit {$p->firstRow},{$p->listRows}");
        foreach($slanders as $key=>$value){
            $slanders[$key]['content'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['content']))),100);
            if($value['views'] >= 10000){
                $slanders[$key]['views'] =  round($value['views'] /10000,1).'万';
            }
            if($value['views'] >= 10000){
                $slanders[$key]['comments'] =  round($value['comments'] /10000,1).'万';
            }
        }
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('slanders',$slanders);

        //推荐名家人物
        $tuijianlist = M('famous')->where("f_type = '1' AND is_tuijian = '1'")->order("f_fans desc,f_artnums desc")->limit(5)->select();
        $this->assign('tuijianlist',$tuijianlist);
        //热点文章
         $hotlist = M('slanders')->alias('s')->join("cq_famous as f on f.f_id = s.f_id")->where("s.is_show = '1' AND s.type = '1' AND s.is_tui = '1'")->order('s.views desc,s.comments desc')->limit(10)->select();
        $this->assign('hotlist',$hotlist);
        //dump($slanders);exit;

				$lan_id = I('get.lan_id');
		     $adinfo=D('Banner')->where("lan_id={$lan_id} AND is_show='0'")->select();
        $this->assign('adinfo',$adinfo);
		$title = '名家讲坛'.'_'.'蓝海长青';
		$this->assign('title',$title);
        $this->display();
    }
    //蓝海人物
    function character(){
        $map['is_show'] = '1';
        $map['type'] = '2';
        /* $condition['s.is_show'] = '1';
        $condition['s.type'] = '2';*/
        $slanders_model = M('slanders');
        $famous_model = M('famous');
        $bbsset = M('bbs')->field("pg_posts")->find();//获取论坛分页设置
        $count = $famous_model -> where("f_type = 2") -> count();
        $p = new \Think\Page($count,$bbsset['pg_posts']);
        $famous = $famous_model -> where("f_type = 2") -> order("f_fans desc") -> limit($p->firstRow.','.$p->listRows) -> select();
        foreach($famous as $key=>$value){
            $artcount = $slanders_model->where("f_id = {$value['f_id']}")->count();
            if($artcount <= 0){
                unset($famous[$key]);continue;
            }elseif($artcount <= 3){
                $famous[$key]['more'] = 0;
            }elseif($artcount > 3){
                $famous[$key]['more'] = 1;
            }
$slanders1 = $slanders_model->where("f_id = {$value['f_id']}")->order('sland_id')->limit(0,1)->select();
$famous[$key]['slanders1'] = $slanders1;
$count = $slanders_model->where("f_id = {$value['f_id']}")->order('sland_id desc')->count();

if($count > 3){
            $slanders = $slanders_model->where("f_id = {$value['f_id']}")->order('sland_id desc')->limit(0,2)->select();
            $famous[$key]['slanders'] = $slanders;
}elseif($count <= 3){
 $slanders = $slanders_model->where("f_id = {$value['f_id']}")->order('sland_id')->limit(1,2)->select();
            $famous[$key]['slanders'] = $slanders;
}
        }

        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('famous',$famous);

        //推荐蓝海人物
        $tuijianlist = M('famous')->where("f_type = '2' AND is_tuijian = '1'")->order("f_fans desc,f_artnums desc")->limit(5)->select();
        $this->assign('tuijianlist',$tuijianlist);
        //热点文章
         $hotlist = M('slanders')->alias('s')->join("cq_famous as f on f.f_id = s.f_id")->where("s.is_show = '1' AND s.type = '2' AND s.is_tui = '1'")->order('s.views desc,s.comments desc')->limit(10)->select();
        $this->assign('hotlist',$hotlist);

        $this->assign('slandinfo',$slanderinfo[0]);
        //dump($famous);exit;

			$lan_id = I('get.lan_id');
		     $adinfo=D('Banner')->where("lan_id={$lan_id} AND is_show='0'")->select();
        $this->assign('adinfo',$adinfo);
		$title = '蓝海人物'.'_'.'蓝海长青';
		$this->assign('title',$title);
        $this->display();
    }
    //文章内容
    function detail(){
        $slanders_model = M('slanders');
        $sland_id = $_GET['sland_id'];
        $sess_id = cookie('PHPSESSID');
        $nowtime = date('Y-m-d',time());

        /*浏览量*/
        if(cookie('brwrecords')){
            $brwrecords = json_decode(cookie('brwrecords'));
            if(($brwrecords->createtime == $nowtime) && ($brwrecords->slandid == $sland_id)){

            }else{
                cookie('brwrecords',json_encode(array('mysessid'=>$sess_id,'createtime'=>$nowtime,'slandid'=>$sland_id)),3600*24);
                $slanders_model -> where("sland_id = {$sland_id}") -> setInc('views',1);
            }
        }else{
            cookie('brwrecords',json_encode(array('mysessid'=>$sess_id,'createtime'=>$nowtime,'slandid'=>$sland_id)),3600*24);
            $slanders_model -> where("sland_id = {$sland_id}") -> setInc('views',1);
        }


        $famous_model = M('famous');
        $slanderinfo = $slanders_model
                 -> alias('a')
                 -> field("a.*,f_name,f.f_id,f.f_photo,f_type,f_province")
                 //-> join("cq_blog as b on b.user_id = a.user_id")
                 -> join("cq_famous as f on f.f_id = a.f_id")
                 -> where("a.sland_id = {$sland_id}")
                 ->select();
        $slanderinfo[0]['content'] = htmlspecialchars_decode($slanderinfo[0]['content']);

        if($slanderinfo[0]['views'] >= 10000){
            $slanderinfo[0]['views'] =  round($slanderinfo[0]['views'] /10000,1).'万';
        }
        if($slanderinfo[0]['comments'] >= 10000){
            $slanderinfo[0]['comments'] =  round($slanderinfo[0]['comments'] /10000,1).'万';
        }


        //推荐蓝海人物
        if($slanderinfo[0]['f_type'] == 1){
            $f_type = 1;
            $type = 1;
			$typename = '名家讲坛';
        }else{
            $f_type = 2;
            $type = 2;
			$typename = '蓝海人物';
        }
        $tuijianlist = M('famous')->where("f_type = {$f_type} AND is_tuijian = '1' AND f_id <> {$slanderinfo[0]['f_id']}")->order("f_fans desc,f_artnums desc")->limit(5)->select();
        $this->assign('tuijianlist',$tuijianlist);
        //热点文章
         $hotlist = M('slanders')->alias('s')->join("cq_famous as f on f.f_id = s.f_id")->where("s.is_show = '1' AND s.type = '{$type}' AND s.is_tui = '1'")->order('s.views desc,s.comments desc')->limit(10)->select();
        $this->assign('hotlist',$hotlist);
        //dump($slanderinfo);exit;
		//生成文章的二维码
		if(empty($slanderinfo[0]['qrcode'])){
			$qrurl = SITE_URL."/index.php/Mobile/Famous/detail/sland_id/{$slanderinfo[0]['sland_id']}";
			$filename = 'slander'.time().substr(md5(rand(0,999)),0,8).'.png';
			$code = $this->qrcode($qrurl,$filename);
			if($code){
				$slanders_model->where("sland_id = {$slanderinfo[0]['sland_id']}")->setField('qrcode',$code);
				$slanderinfo[0]['qrcode'] = $code;
			}
		}
        $this->assign('slandinfo',$slanderinfo[0]);
		$title = $slanderinfo[0]['title'].'_'.$slanderinfo[0]['f_name'].'_'.$typename.'_'.'蓝海长青';
		$this->assign('title',$title);
        $this->display();
    }
    //评论文章
    function comment(){
        $userid = $_SESSION['userInfo']['user_id'];
        if(IS_POST){
            if(empty($_POST['content'])){
                $this->ajaxReturn(array(
                    'error' => 1
                ));
            }
            if(empty($_POST['sland_id'])){
                $this->ajaxReturn(array(
                    'error' => 1
                ));
            }
            $result = $this->mycheckwords($_POST['content']);
			if($result != ''){
				$this->ajaxReturn(array(
					'error'=> 'illegalword',
					'content' => '含有敏感词'.$result
				));
			}
            $com_model = M('scomment');
            $_POST['user_id'] = $userid;
            $_POST['add_time'] = time();
            if($com_model -> create()){
                $lastid = $com_model->add();
                M('slanders')->where("sland_id = {$_POST['sland_id']}")->setInc('comments',1);//评论数加1
                $_POST['add_time'] = '刚刚';
                $_POST['com_id'] = $lastid;
                $userinfo = M('user')->field("username,userhead")->find($userid);
                $_POST['username'] = $userinfo['username'];
                $_POST['userhead'] = $userinfo['userhead'];
                $this->ajaxReturn(array(
                    'error' => 0,
                    'comment' => $_POST
                ));
            }
            $this->ajaxReturn(array(
                'error' => 1
            ));
        }
    }
    //评论列表
    function comments(){
        if(IS_GET){
            if(isset($_SESSION['flag'])){
                $userid = $_SESSION['userInfo']['user_id'];
            }
            //评论信息
            $sland_id = $_GET['sland_id'];
            $com_model = M('scomment');
            $bbsset = M('bbs')->field("pg_comm")->find();//获取论坛分页设置
            $count = $com_model -> where("sland_id = {$sland_id} AND display = '1'") -> count();
            $p = new \Think\Page($count,$bbsset['pg_comm']);
            $comments = $com_model
                      -> alias('c')
                      -> field("c.com_id,c.ids,c.content,c.add_time,c.zan,u.username,u.userhead")
                      -> join("cq_user as u on u.user_id = c.user_id")
                      -> where("c.sland_id = {$sland_id} AND c.display = '1'")
                      -> order("c.add_time desc")
                      -> limit($p->firstRow.','.$p->listRows)
                      -> select();
            foreach($comments as $key => $value){
                //判断是否点过赞
                $useridArr =  explode(',',ltrim($value['ids'],','));
                if($userid){
                    if(in_array($userid,$useridArr)){
                        $comments[$key]['allow'] = 0;
                    }else{
                        $comments[$key]['allow'] = 1;
                    }
                }else{
                    $comments[$key]['allow'] = 2;
                }

                if($value['zan'] >= 10000){
                    $comments[$key]['zan'] = round($comments[$key]['zan'] /10000,1).'万';
                }
                $comments[$key]['content'] = htmlspecialchars_decode($value['content']);

                $timediff = time() - $value['add_time'];
                if($timediff<= 60){
                    $comments[$key]['add_time'] = '刚刚';
                }elseif(60 < $timediff && $timediff <= 600){
                    $comments[$key]['add_time'] = floor($timediff / 60).'分钟前';
                }elseif(600 < $timediff){
                    $comments[$key]['add_time'] = date('Y-m-d H:i',$value['add_time']);
                }
            }
            $page = $p->show();
            $this->ajaxReturn(array(
                'error' => 0,
                'comments' => $comments,
                'page' => $page
            ));
        }
    }
    //关注
    function follow(){
        if(IS_GET){
            $userid = $_SESSION['userInfo']['user_id'];
            $detail_model = M('userdetail');
            $f_id = $_GET['f_id'];
            $userdetail = $detail_model ->where("user_id = {$userid}")->find();
            //判断是否关注过
            $collArr =  explode(',',ltrim($userdetail['myfollows'],','));
            if(!in_array($f_id,$collArr)){
                if($detail_model -> where("user_id = {$userid}") -> setField('myfollows',$userdetail['myfollows'].','.$f_id)){
                    M('famous')->where("f_id = {$f_id}")->setInc('f_fans',1);
					echo 'success';die;
                }
            }else{
                echo 'followed';die;
            }
            echo 'error';
        }
    }
    /*function nofollow(){
        if(IS_GET){
            $userid = $_SESSION['userInfo']['user_id'];
            $detail_model = M('userdetail');
            $f_id = $_GET['f_id'];
            $userdetail = $detail_model ->where("user_id = {$userid}")->find();
            //判断是否关注过
            $collArr =  explode(',',ltrim($userdetail['myfollows'],','));
            if(!in_array($f_id,$collArr)){
                if($detail_model -> where("user_id = {$userid}") -> setField('myfollows',$userdetail['myfollows'].','.$f_id)){
                    echo 'success';die;
                }
            }else{
                echo 'followed';die;
            }
            echo 'error';
        }
    }*/
    //点赞
    function giveup(){
        if(IS_GET){
            $com_model = M('scomment');
            $userid = $_SESSION['userInfo']['user_id'];
            $com_id = $_GET['com_id'];
            $cominfo = $com_model -> find($com_id);
            $data['zan'] = array('exp','zan + 1');
            $data['ids'] = $cominfo['ids'].','.$userid;

            if($com_model->where("com_id = {$com_id}")->save($data)){
                $this->ajaxReturn(array(
                    'error' => 0
                ));
            }
        }
    }
}