<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Mobile\Controller;
use Common\Common\ComController;

class BlogController extends ComController
{
    //博客首页
    function index(){
    	$article_model = M('article');
    	$bbsset = M('bbs')->field("pg_posts")->find();//获取论坛分页设置
    	$count = $article_model -> count();
    	$p = new \Think\Page($count,$bbsset['pg_posts']);
    	$articlelist = $article_model -> alias('p') -> field('p.*,u.username,userhead') -> join("cq_user as u on u.user_id = p.user_id") -> order("p.views desc,p.comments desc,p.add_time desc") -> limit($p->firstRow.','.$p->listRows) -> select();
    	foreach($articlelist as $key=>$value){
    		//$matchstr = htmlspecialchars_decode($value['content']);
			/*preg_match_all('/<img.*?src="(.*?)".*?>/is', $matchstr, $imgArr);
			if($imgArr){
				$articlelist[$key]['img'] = $imgArr[1][0];
			}*/
    		$articlelist[$key]['content'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['content']))),100);
    		$search = array(" ","　","\n","\r","\t");
 			$replace = array("","","","","");
 			$articlelist[$key]['content'] = str_replace($search, $replace, $articlelist[$key]['content']);
 			if($value['views'] >= 10000){
 				$articlelist[$key]['views'] =  round($articlelist[$key]['views'] /10000,1).'万';
 			}
 			if($value['views'] >= 10000){
 				$articlelist[$key]['comments'] =  round($articlelist[$key]['comments'] /10000,1).'万';
 			}
    	}

    	$hotarticle = $article_model->where("is_hot = '1'")->order("add_time desc")->limit(10)->select();//热文推荐
    	$this->assign('hotarticle',$hotarticle);

    	//如果用户登陆显示博客状态
    	if(isset($_SESSION['flag']) && ($_SESSION['userInfo']['is_blog'] == 1)){
    		$userid = $_SESSION['userInfo']['user_id'];
    		$bloginfo = M('blog')->where("user_id = {$userid}")->find();
    		$this->assign('bloginfo',$bloginfo);
    	}
    	$page = $p->show();
    	$this->assign('page',$page);
    	$this->assign('articlelist',$articlelist);
        $this->display();
    }
    //我的博文
    function myarticles(){
        $userid = $_SESSION['userInfo']['user_id'];
    	$article_model = M('article');
    	//我的博文管理列表

		$map['user_id'] = $userid;
		if(isset($_GET['class_id'])){
            if($_GET['class_id'] == 0){
            }else{
                $map['class_id'] = $_GET['class_id'];
            }
		}
        if(!empty($_GET['keywords'])){
            $map['title'] = array('like',"%{$_GET['keywords']}%");
        }

		$article_model = M('article');
    	$count = $article_model -> where($map)-> count();
    	$p = new \Think\Page($count,10);
    	$articlelist = $article_model -> where($map) -> order("is_hot desc,add_time desc") -> limit($p->firstRow.','.$p->listRows) -> select();
    	/*foreach($articlelist as $key=>$value){
 			if($value['views'] >= 10000){
 				$articlelist[$key]['views'] =  round($articlelist[$key]['views'] /10000,1).'万';
 			}
 			if($value['views'] >= 10000){
 				$articlelist[$key]['comments'] =  round($articlelist[$key]['comments'] /10000,1).'万';
 			}
    	}*/

    	if(IS_AJAX){
            if($articlelist){
                $this->ajaxReturn(array(
                    'error' => 0,
                    'articlelist' => $articlelist,
                ));
            }else{
                exit;
            }
        }
		$this->assign('articlelist',$articlelist);

        //文章分类
        $classlist = M('bgclass')->where("user_id = {$userid}")->select();
        $this->assign('classlist',$classlist);
        //博客名等信息
        $bloginfo = M('blog')->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->find();
        $this->assign('bloginfo',$bloginfo);
        $this->display();
    }
    //点击收藏博文
    function collect(){
    	if(IS_GET){
    		$userid = $_SESSION['userInfo']['user_id'];
    		$art_id = $_GET['art_id'];
    		$blog_model = M('blog');
    		$bloginfo = $blog_model -> where("user_id = {$userid}") -> find();
			if($bloginfo){
				//判断是否收藏过
				$collArr =  explode(',',ltrim($bloginfo['coll'],','));
				if(!in_array($art_id,$collArr)){
					if($blog_model -> where("user_id = {$userid}") -> setField('coll',$bloginfo['coll'].','.$art_id)){
						echo 'success';die;
					}
				}
				echo 'error';
			}else{
				echo 'noopen';
			}
    	}
    }
    //博文内容
    function detail(){
    	$art_id = $_GET['art_id'];

        //文章评论start
        if(isset($_SESSION['flag'])){
            $userid = $_SESSION['userInfo']['user_id'];
        }
        //评论信息
        $com_model = M('bgcomment');
        $bbsset = M('bbs')->field("pg_comm")->find();//获取论坛分页设置
        $count = $com_model -> where("art_id = {$art_id} AND display = '1'") -> count();
        $p = new \Think\Page($count,$bbsset['pg_comm']);
        $comments = $com_model
                  -> alias('c')
                  -> field("c.com_id,c.ids,c.content,c.add_time,c.zan,u.username,u.userhead")
                  -> join("cq_user as u on u.user_id = c.user_id")
                  -> where("c.art_id = {$art_id} AND display = '1'")
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
        //dump($comments);exit;
        if(IS_AJAX){
            if($comments){
                $this->ajaxReturn(array(
                    'error' => 0,
                    'comments' => $comments
                ));
            }else{
                exit;
            }
        }

        $this->assign('comments',$comments);
        //文章评论结束
    	$article_model = M('article');
    	$blog_model = M('blog');
    	$views_model = M('artviews');
    	$artinfo = $article_model
    	         -> alias('a')
    	         -> field("a.*,b.*,u.username,u.user_id,u.userhead")
    	         -> join("cq_blog as b on b.user_id = a.user_id")
    	         -> join("cq_user as u on u.user_id = a.user_id")
    	         -> where("a.art_id = {$art_id}")
    	         ->select();
    	$artinfo[0]['content'] = htmlspecialchars_decode($artinfo[0]['content']);

		if($artinfo[0]['views'] >= 10000){
			$artinfo[0]['views'] =  round($artinfo[0]['views'] /10000,1).'万';
		}
		if($artinfo[0]['comments'] >= 10000){
			$artinfo[0]['comments'] =  round($artinfo[0]['comments'] /10000,1).'万';
		}



    	/*计算文章、博客访问量start*/
    		$sess_id = cookie('PHPSESSID');
	    	$history = $views_model->where("art_id = {$art_id}")->find();
	    	$nowdate = date('Y-m-d',time());
	    	if($history){
	    		//判断是否是新的一天
		    	if($nowdate != $history['lasttime']){
		    		$history['lasttime'] = $nowdate;
		    		$history['sess_id'] = '';
		    		$views_model->where("art_id = {$art_id}")->save($history);//是就清空昨天的记录
		    		$blog_model->where("user_id = {$artinfo[0]['user_id']}")->setField('today','0');//并且将today值重置为0
		    	}
	    	}else{
	    		//插入文章浏览量统计数据
	    		$history['art_id'] = $art_id;
	    		$history['sess_id'] = '';
	    		$history['lasttime'] = $nowdate;
	    		$views_model->add($history);
	    	}
	    	//判断今天是否浏览过
		    $sessidArr =  explode(',',ltrim($history['sess_id'],','));
		    //echo $sess_id;exit;
		    if(!in_array($sess_id,$sessidArr)){
		    	//当日第一次浏览
		    	$views_model->where("art_id = {$art_id}")->setField('sess_id',$history['sess_id'].','.$sess_id);//记录用户的sessid
		    	$article_model->where("art_id = {$art_id}")->setInc('views',1);//文章浏览量+1
		    	$blogdata['today'] = array('exp','today + 1');
		    	$blogdata['counts'] = array('exp','counts + 1');
		    	$blog_model->where("user_id = {$artinfo[0]['user_id']}")->save($blogdata);//今日浏览、总浏览+1
		    }
    	/*计算文章、博客访问量end*/
        //查询博客信息
        $bloginfo = M('blog')->where("user_id = {$artinfo[0]['user_id']}")->find();
        //判断文章是否已收藏
    	if(isset($_SESSION['flag'])){
            //查询我的博客信息
            $mybloginfo = M('blog')->where("user_id = {$_SESSION['userInfo']['user_id']}")->find();
    		$collArr =  explode(',',ltrim($mybloginfo['coll'],','));
    		if(!in_array($art_id,$collArr)){
    			$artinfo[0]['allow'] = 1;
    		}else{
    			$artinfo[0]['allow'] = 0;
    		}
    	}else{
    		$artinfo[0]['allow'] = 0;
    	}
    	$this->assign('bloginfo',$bloginfo);
    	//查询博客文章分类信息
    	$classlist = M('bgclass')->where("user_id = {$artinfo[0]['user_id']}")->select();
    	$this->assign('classlist',$classlist);
    	//dump($artinfo);exit;
    	$this->assign('artinfo',$artinfo[0]);
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
			$shareData['title']  = $artinfo[0]['title'].'_蓝海长青';
			$shareData['desc']  =  cutstr(htmlspecialchars_decode(strip_tags($artinfo[0]['content'])),50);
			$shareData['link']  =  'http://'.$_SERVER['HTTP_HOST'].'/index.php/Home/Blog/detail/art_id/'.$artinfo[0]['art_id'];
			$shareData['imgUrl']  = 'http://'.$_SERVER['HTTP_HOST'].$artinfo[0]['userhead'];
			$this->assign('shareData',json_encode($shareData));
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
    		if(empty($_POST['art_id'])){
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
            /*判断是否在回复本文章的周期内start*/
                $nowtime = time();
                $nowtimestr = date("Y-m-d");
                $bbsconf = M('bbs')->field("com_cycle")->find();//发帖周期
                $comart = M('comart')->where("user_id = {$userid}")->find();//回帖记录主表信息
                if(!$comart){
                    $comart['user_id'] = $userid;
                    $comart['counts'] = 0;
                    $comart['uptime'] = $nowtimestr;
                    $comart['upstamp'] = $nowtime;
                    $comart['id'] = M('comart')->add($comart);
                }
                M('comextend')->where("user_id = {$userid} AND uptime != '{$nowtimestr}'")->delete();
                $comextend = M('comextend')->where("user_id = {$userid} AND art_id = {$_POST['art_id']}")->find();//回帖记录扩展表信息
                if($comextend){
                    if(($bbsconf['com_cycle'] * 60 + $comextend['upstamp']) > $nowtime){
                        //提示禁止回帖
                        echo 'stopping';exit;
                    }
                }
            /*判断是否在回复本文章的周期内end*/
    		$com_model = M('bgcomment');
    		$_POST['user_id'] = $userid;
    		$_POST['add_time'] = time();
    		if($com_model -> create()){
    			$lastid = $com_model->add();
    			M('article')->where("art_id = {$_POST['art_id']}")->setInc('comments',1);//评论数加1
                /*计算回帖积分start*/
                    if(!$comextend){
                        $comextend['user_id'] = $userid;
                        $comextend['art_id'] = $_POST['art_id'];
                        $comextend['uptime'] = $nowtimestr;
                        $comextend['upstamp'] = $nowtime;
                        $comextend['id'] = M('comextend')->add($comextend);
                    }else{
                        $extenddata['uptime'] = $nowtimestr;
                        $extenddata['upstamp'] = $nowtime;
                        M('comextend')->where("id = {$comextend['id']}")->save($extenddata);
                    }
                    $scoreconf = M('score')->field('number,counts')->find(14);
                    if($comart['uptime'] == $nowtimestr){
                        if($comart['counts'] < $scoreconf['counts']){
                            $replydata['counts'] = array('exp','counts+1');
                        }
                    }else{
                        $replydata['counts'] = 1;
                        $replydata['uptime'] = $nowtimestr;
                        $replydata['upstamp'] = $nowtime;
                    }
                    if(M('comart')->where("id = {$comart['id']}")->save($replydata)){
                        $userdata['score'] = array('exp','score+'.$scoreconf['number']);
                        $userdata['comments'] = array('exp','comments+'.$scoreconf['number']);
                        M('userdetail')->where("user_id = {$userid}")->save($userdata);
                    }
                /*计算回帖积分end*/
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
    //点赞
    function giveup(){
    	if(IS_GET){
    		$com_model = M('bgcomment');
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
    //评论列表
    function comments(){
    	if(IS_GET){
    		if(isset($_SESSION['flag'])){
    			$userid = $_SESSION['userInfo']['user_id'];
    		}
    		//评论信息
    		$art_id = $_GET['art_id'];
	    	$com_model = M('bgcomment');
	    	$bbsset = M('bbs')->field("pg_comm")->find();//获取论坛分页设置
    		$count = $com_model -> where("art_id = {$art_id}") -> count();
    		$p = new \Think\Page($count,$bbsset['pg_comm']);
	    	$comments = $com_model
	    			  -> alias('c')
	    			  -> field("c.com_id,c.ids,c.content,c.add_time,c.zan,u.username,u.userhead")
	    			  -> join("cq_user as u on u.user_id = c.user_id")
	    			  -> where("c.art_id = {$art_id}")
	    			  -> order("c.zan desc,c.add_time desc")
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
    //博主主页
    function myzone(){
        if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
            $userid = $_GET['user_id'];
            $userinfo = M('user') -> find($userid);
            if($userinfo['is_blog'] == 0){
                header("location:".$_SERVER['HTTP_REFERER']);exit;
            }
			if(isset($_SESSION['flag'])){
				$userid1 = $_SESSION['userInfo']['user_id'];
				if($userid == $userid1){
					$this->assign('isme','1');//如果是本人进入主页显示博客管理连接
				}else{
					$this->assign('isme','0');//如果不是本人进入主页隐藏博客管理连接
				}
			}else{
				$this->assign('isme','0');//如果不是本人进入主页隐藏博客管理连接
			}
        }else{
            if(isset($_SESSION['flag'])){
                $userid = $_SESSION['userInfo']['user_id'];
                $userinfo = M('user') -> find($userid);
                if($userinfo['is_blog'] == 0){
                    $this->redirect('Blog/openblog');
                }
                $this->assign('isme','1');//如果是本人进入主页显示博客管理连接
            }else{
                header("location:".$_SERVER['HTTP_REFERER']);exit;
            }
        }
        //博主博文
        if(isset($_GET['class_id'])){
            $classid = intval($_GET['class_id']);
            if(!empty($classid)){
                $map['class_id'] = $classid;
            }
        }else{
            $_GET['class_id'] = '';
        }
        $article_model = M('article');
        $map['user_id'] = $userid;
        $count = $article_model -> where($map)-> count();
        $p = new \Think\Page($count,10);
        $articlelist = $article_model -> where($map) -> order("is_hot desc,add_time desc") -> limit($p->firstRow.','.$p->listRows) -> select();
        /*foreach($articlelist as $key=>$value){
            if($value['views'] >= 10000){
                $articlelist[$key]['views'] =  round($articlelist[$key]['views'] /10000,1).'万';
            }
            if($value['views'] >= 10000){
                $articlelist[$key]['comments'] =  round($articlelist[$key]['comments'] /10000,1).'万';
            }
        }*/
        //dump($articlelist);exit;
        if(IS_AJAX){
            if($articlelist){
                $this->ajaxReturn(array(
                    'error' => 0,
                    'articlelist' => $articlelist,
                ));
            }else{
                exit;
            }
        }
        $this->assign('articlelist',$articlelist);





    	//博客信息
    	$blog_model = M('blog');
    	$bloginfo = $blog_model->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->select();
    	$this->assign('bloginfo',$bloginfo[0]);
    	//博客分类信息
    	$bgclass_model = M('bgclass');
    	$classlist = $bgclass_model->where("user_id = {$userid}")->select();
    	$this->assign('classlist',$classlist);
    	$this->display();
    }
    //博客设置
    function blogset(){
    	$userid = $_SESSION['userInfo']['user_id'];
    	if(IS_POST){
    		foreach($_POST as $value){
    			if(empty($value) && $value != 0){
    				$this->ajaxReturn(array(
	    				'error' => 1
	    			));
    			}
    		}
    		$blog_model = M('blog');
    		if($blog_model -> create()){
    			if($blog_model->where("user_id = {$userid}")->save()){
    				$this->ajaxReturn(array(
	    				'error' => 0
	    			));
    			}
    		}
    		$this->ajaxReturn(array(
				'error' => 1
			));
    	}
    	$bloginfo = M('blog')->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->find();
        $this->assign('bloginfo',$bloginfo);
        $this->display();
    }
    //文章分类
    function myclass(){
    	$userid = $_SESSION['userInfo']['user_id'];
    	$bgclass_model = M('bgclass');
    	/*if(IS_GET){
    		$classlist = $bgclass_model->where("user_id = {$userid}")->select();
    		$this->ajaxReturn(array(
    				'error' => 0,
    				'classlist' => $classlist
    			));
    	}*/
    	if(IS_POST){
    		$_POST['user_id'] = $userid;
            if(empty($_POST['class_name'])){
                echo 'error';exit;
            }
    		if($bgclass_model->create()){
    			$lastid = $bgclass_model -> add();
    		}
    		$this->ajaxReturn(array(
    				'error' => 0,
    				'classid' => $lastid
    			));
    	}
        $classlist = $bgclass_model->where("user_id = {$userid}")->select();
        $this->assign('classlist',$classlist);
        $bloginfo = M('blog')->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->find();
        $this->assign('bloginfo',$bloginfo);
        $this->display();
    }
    //删除分类
    function delclass(){
    	$userid = $_SESSION['userInfo']['user_id'];
    	$bgclass_model = M('bgclass');
    	if(IS_GET){
    		if(M('article')->where("class_id = {$_GET['class_id']}")->select()){
    			$this->ajaxReturn(array(
    				'error' => 1
    			));
    		}
    		if($bgclass_model->where("user_id = {$userid} AND class_id = {$_GET['class_id']}")->delete()){
    			$this->ajaxReturn(array(
    				'error' => 0
    			));
    		}else{
    			$this->ajaxReturn(array(
    				'error' => 1
    			));
    		}
    	}
    }
    //我的评论管理
    function mycomments(){
        $userid = $_SESSION['userInfo']['user_id'];
        $bgcom_model = M('bgcomment');
        if(!isset($_GET['comtype'])){
            $_GET['comtype'] = 1;
        }
        if($_GET['comtype'] == 1){
            //评论我的
            $count1 = $bgcom_model -> alias('b') -> join("cq_user as u on u.user_id = b.user_id") -> join("cq_article as a on a.art_id = b.art_id") -> where("a.user_id = {$userid} AND b.display = '1'") -> count();
            $p1 = new \Think\Page($count1,50);
            $commentme = $bgcom_model -> alias('b') -> field("b.*,a.title,u.username,u.userhead") -> join("cq_user as u on u.user_id = b.user_id") -> join("cq_article as a on a.art_id = b.art_id") -> where("a.user_id = {$userid} AND b.display = '1'") -> order("b.add_time desc") -> limit($p1->firstRow.','.$p1->listRows) -> select();
            foreach($commentme as $key => $value){
                $commentme[$key]['content'] = htmlspecialchars_decode($value['content']);
                $commentme[$key]['add_time'] = date('Y-m-d H:i:s',$value['add_time']);
            }
            if(IS_AJAX){
                if($commentme){
                    $this->ajaxReturn(array(
                        'error'=> 0,
                        'content'=> $commentme
                    ));
                }else{
                    exit;
                }
            }
            $this->assign('commentme',$commentme);
        }
        //dump($commentme);exit;
        if($_GET['comtype'] == 2){
            //我的评论
            //我的评论
			$count2 = $bgcom_model -> alias('b') -> join("cq_article as a on a.art_id = b.art_id") -> join("cq_user as u on u.user_id = a.user_id") ->where("b.user_id = {$userid} AND b.display = '1'") -> count();
			$p2 = new \Think\Page($count2,8);
			$mycomment = $bgcom_model -> alias('b') -> field("b.*,u.username,u.userhead,a.title") ->  join("cq_article as a on a.art_id = b.art_id") -> join("cq_user as u on u.user_id = a.user_id") ->where("b.user_id = {$userid} AND b.display = '1'") -> order("b.add_time desc") -> limit($p2->firstRow.','.$p2->listRows) -> select();
            foreach($mycomment as $key => $value){
                $mycomment[$key]['content'] = htmlspecialchars_decode($value['content']);
                $mycomment[$key]['add_time'] = date('Y-m-d H:i:s',$value['add_time']);
            }
			//dump($mycomment);
            if(IS_AJAX){
                if($mycomment){
                    $this->ajaxReturn(array(
                        'error'=> 0,
                        'content'=> $mycomment
                    ));
                }else{
                    exit;
                }
            }
        }

        $bloginfo = M('blog')->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->find();
        $this->assign('bloginfo',$bloginfo);
        $this->display();
    }
    //我的收藏
    function mycollect(){
    	$userid = $_SESSION['userInfo']['user_id'];
		$article_model = M('article');
    	$bloginfo = M('blog')->where("user_id = {$userid}")->find();
    	$collstr =  ltrim($bloginfo['coll'],',');
    	if($collstr != ''){
    		$condition['art_id'] = array('in',$collstr);
            $map['p.art_id'] = array('in',$collstr);
            $count = $article_model -> where($condition)-> count();
            $p = new \Think\Page($count,10);
            $articlelist = $article_model -> alias('p') -> field('p.*,u.username,u.userhead') -> join("cq_user as u on u.user_id = p.user_id") -> where($map) -> order("p.add_time desc") -> limit($p->firstRow.','.$p->listRows) -> select();
            foreach($articlelist as $key=>$value){
                $articlelist[$key]['add_time'] = date("Y-m-d H:i",$value['add_time']);
                if($value['views'] >= 10000){
                    $articlelist[$key]['views'] =  round($articlelist[$key]['views'] /10000,1).'万';
                }
                if($value['views'] >= 10000){
                    $articlelist[$key]['comments'] =  round($articlelist[$key]['comments'] /10000,1).'万';
                }
            }
            if(IS_AJAX){
                if($articlelist){
                    $this->ajaxReturn(array(
                        'error' => 0,
                        'content' => $articlelist,
                    ));
                }else{
                    exit;
                }
            }
    	}
        $this->assign('articlelist',$articlelist);
        $bloginfo = M('blog')->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->find();
        $this->assign('bloginfo',$bloginfo);
        $this->display();
    }
    //开通博客
    function openblog(){
    	$userid = $_SESSION['userInfo']['user_id'];
    	$is_blog = $_SESSION['userInfo']['is_blog'];
    	if(IS_POST){
    		$blog_model = M('blog');
    		if($is_blog){
    			$this->ajaxReturn(array(
    				'error' => 1
    			));
    		}
    		foreach($_POST as $value){
    			if(empty($value)){
    				$this->ajaxReturn(array(
	    				'error' => 2
	    			));
    			}
    		}
    		$vry = new \Think\Verify();
    		if(!$vry->check($_POST['checkverify'])){
                $this->ajaxReturn("codeerror");
            }

            //dump($_POST);exit;
    		$_POST['ctime'] = time();
    		$_POST['user_id'] = $userid;
    		if($blog_model -> create()){
    			if($blog_model -> add()){
    				M('user')->where("user_id = {$userid}")->setField('is_blog',1);
    				$_SESSION['userInfo']['is_blog'] = 1;
    				$this->ajaxReturn(array(
	    				'error' => 0
	    			));
    			}else{
    				$this->ajaxReturn(array(
	    				'error' => 2
	    			));
    			}
    		}
    	}
    	$this->display();
    }
    //发文章
    function createart(){
    	$userid = $_SESSION['userInfo']['user_id'];
    	$article_model = M('article');
    	if(IS_POST){
    		if(empty($_POST['title'])){
    			$this->ajaxReturn(array(
					'error' => 1
				));
    		}
    		if(empty($_POST['content'])){
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
            $path = $this->upload();
            if($path){
                $_POST['art_img'] = '/Public/'.$path;
            }
            /*判断是否在禁止发帖周期内start*/
                $nowtime = time();
                $nowtimestr = date("Y-m-d");
                $bbsconf = M('bbs')->field("poster_cycle")->find();//发帖周期
                $sendart = M('sendart')->where("user_id = {$userid}")->find();
                if($sendart){
                    if(($bbsconf['poster_cycle'] * 60 + $sendart['upstamp']) > $nowtime){
                        //提示禁止发博文
                        echo 'stopping';exit;
                    }
                }else{
                    $sendart['user_id'] = $userid;
                    $sendart['counts'] = 0;
                    $sendart['uptime'] = $nowtimestr;
                    $sendart['upstamp'] = $nowtime;
                    $sendart['id'] = M('sendart')->add($sendart);
                }
            /*判断是否在禁止发帖周期内end*/
    		$_POST['user_id'] = $userid;
    		$_POST['add_time'] = time();
    		if($article_model->create()){
    			$artid = $article_model->add();
    			M('bgclass')->where("user_id = {$userid} AND class_id = {$_POST['class_id']}")->setInc('number',1);
                /*发表成功计算积分*/
                        $scoreconf = M('score')->field('number,counts')->find(13);
                        if($nowtimestr == $sendart['uptime']){
                            if($sendart['counts'] < $scoreconf['counts']){
                                $postdata['counts'] = array('exp','counts+1');
                                $postdata['upstamp'] = $nowtime;
                            }
                        }else{
                            $postdata['counts'] = 1;
                            $postdata['uptime'] = $nowtimestr;
                            $postdata['upstamp'] = $nowtime;
                        }
                        if(M('sendart')->where("id = {$sendart['id']}")->save($postdata)){
                            $userdata['score'] = array('exp','score+'.$scoreconf['number']);
                            $userdata['sendart'] = array('exp','sendart+'.$scoreconf['number']);
                            M('userdetail')->where("user_id = {$userid}")->save($userdata);
                        }
                /**/
    			$this->ajaxReturn(array(
    				'error' => 0,
					'art_id'=>$artid
    			));
    		}
    		$this->ajaxReturn(array(
				'error' => 1
			));
    	}
        //文章类型
        $classlist = M('bgclass')->where("user_id = {$userid}")->select();
        $this->assign('classlist',$classlist);
        //博客名等信息
        $bloginfo = M('blog')->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->find();
        $this->assign('bloginfo',$bloginfo);
        $this->display();
    }
    //编辑文章
    function editart(){
        $userid = $_SESSION['userInfo']['user_id'];
        $article_model = M('article');
        if(IS_POST){

            if(empty($_POST['title'])){
                $this->ajaxReturn(array(
                    'error' => 1
                ));
            }
            if(empty($_POST['content'])){
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
            $path = $this->upload();
            if($path){
                $_POST['art_img'] = '/Public/'.$path;
            }

            $_POST['user_id'] = $userid;
            $_POST['add_time'] = time();
            if($article_model->create()){
                //dump($_POST);exit;
                $article_model->save();

                $this->ajaxReturn(array(
                    'error' => 0
                ));
            }
            $this->ajaxReturn(array(
                'error' => 1
            ));
        }
        $art_id = $_GET['art_id'];
        //文章类型
        $classlist = M('bgclass')->where("user_id = {$userid}")->select();
        $this->assign('classlist',$classlist);
        //文章内容
        $artinfo = $article_model->where("art_id = {$art_id}")->find();
        $artinfo['content'] = html_entity_decode($artinfo['content']);
        //echo $artinfo['content'];exit;
        $this->assign('artinfo',$artinfo);
        //博客名等信息
        $bloginfo = M('blog')->alias('b')->join("cq_user as u on u.user_id = b.user_id")->where("b.user_id = {$userid}")->find();
        $this->assign('bloginfo',$bloginfo);
        $this->display();
    }
    function delarticle(){
        $userid = $_SESSION['userInfo']['user_id'];
        if(IS_AJAX){
            $art_id = $_GET['art_id'];
            if(M('article')->where("art_id = {$art_id}")->delete()){
                echo 'success';exit;
            }
            echo 'error';exit;
        }else{
            exit;
        }
    }
	//取消收藏的博文
	function cancelcoll() {
		if(IS_AJAX){
			$userid = $_SESSION['userInfo']['user_id'];
    		$art_id = $_GET['art_id'];
    		$blog_model = M('blog');
    		$bloginfo = $blog_model -> where("user_id = {$userid}") -> find();
    		//判断是否收藏过
		    $collArr =  explode(',',ltrim($bloginfo['coll'],','));
			if(count($collArr) > 0){
				foreach($collArr as $key => $value){
					if($art_id == $value){
						unset($collArr[$key]);
						break;
					}
				}
			}
			if(count($collArr) > 0){
				$collstr = ','.implode(',',$collArr);
			}else{
				$collstr = null;
			}

			if($blog_model -> where("user_id = {$userid}") -> setField('coll',$collstr)){
				echo 'success';die;
			}
            echo 'error';exit;
		}else{
			exit;
		}
	}
	//删除评论
	function delcom() {
		if(IS_AJAX){
			$com_id = $_GET['com_id'];
            if(M('bgcomment')->where("com_id = {$com_id}")->setField('display','0')){
                echo 'success';exit;
            }
            echo 'error';exit;
		}else{
			exit;
		}
	}
    //上传图片
    function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/blogimg/";
        $info=$upload->uploadOne($_FILES['art_img']);
        return $info['savepath'].$info['savename'];
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