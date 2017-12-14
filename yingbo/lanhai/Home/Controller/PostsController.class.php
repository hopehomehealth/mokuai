<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Home\Controller;
use Common\Common\ComController;

class PostsController extends ComController
{
    //发帖
    function createpost(){

        /*保存帖子start*/
        if(IS_POST){
        	$userid = $_SESSION['userInfo']['user_id'];
        	$posts_model = M('posts');
        	$boards_model = M('boards');
        	foreach($_POST as $value){
                if(empty($value)){
                    echo 'error';
                    exit;
                }
            }
			$result = mycheckword($_POST['body']);
			if($result != $_POST['body']){
				$this->ajaxReturn(array(
					'error'=> 'illegalword',
					'result'=> $result,
					'content' => '含有敏感词'
				));
			}
            $vry = new \Think\Verify();
            if(!$vry->check($_POST['verifycode'])){
                echo 'codeerror';
                exit;
            }
            /*判断是否在禁止发帖周期内start*/
                $nowtime = time();
                $nowtimestr = date("Y-m-d");
                $bbsconf = M('bbs')->field("poster_cycle")->find();//发帖周期
                $sendpost = M('sendpost')->where("user_id = {$userid}")->find();
                if($sendpost){
                    if(($bbsconf['poster_cycle'] * 60 + $sendpost['upstamp']) > $nowtime){
                        //提示禁止发帖
                        echo 'stopping';exit;
                    }
                }else{
                    $sendpost['user_id'] = $userid;
                    $sendpost['counts'] = 0;
                    $sendpost['uptime'] = $nowtimestr;
                    $sendpost['upstamp'] = $nowtime;
                    $sendpost['id'] = M('sendpost')->add($sendpost);
                }
            /*判断是否在禁止发帖周期内end*/
        	$board = $boards_model -> find($_POST['board_id']);
        	$_POST['user_id'] = $userid;
        	$_POST['ctime'] = time();
        	if($board && ($board['pid'] != 0)){
        		if($posts_model -> create()){
        			$post_id = $posts_model -> add();
					M('boards')->where("board_id = {$_POST['board_id']}")->setField('uptime',date('Y-m-d'));
					M('user')->where("user_id = {$userid}")->setInc('posts',1);
                    /*帖子数量+1*/
                        if($nowtimestr == $sendpost['uptime']){
                            $boarddata['todposts'] = array('exp','todposts+1');
                        }else{
                            $boarddata['todposts'] = 1;
                        }
                        $boarddata['posts'] = array('exp','posts+1');
                        M('boards')->where("board_id = {$_POST['board_id']}")->save($boarddata);
                    /*帖子数量+1*/
                    /*发表成功计算积分*/
                        $scoreconf = M('score')->field('number,counts')->find(1);
                        if($nowtimestr == $sendpost['uptime']){
                            if($sendpost['counts'] < $scoreconf['counts']){
                                $postdata['counts'] = array('exp','counts+1');
                                $postdata['upstamp'] = $nowtime;
                            }else{
								$postdata['upstamp'] = $nowtime;
							}
                        }else{
                            $postdata['counts'] = 1;
                            $postdata['uptime'] = $nowtimestr;
                            $postdata['upstamp'] = $nowtime;
                        }

                        if(M('sendpost')->where("id = {$sendpost['id']}")->save($postdata)){
                            $userdata['score'] = array('exp','score+'.$scoreconf['number']);
                            $userdata['sendpost'] = array('exp','sendpost+'.$scoreconf['number']);
                            M('userdetail')->where("user_id = {$userid}")->save($userdata);
                        }
                    /**/
					$this->ajaxReturn(array(
						'error'=>0,
						'post_id'=>$post_id
					));
        			echo "success";
        		}else{
        			echo "error";
        		}
        	}else{
        		echo "error";
        	}
        	exit;
        }
        /*保存帖子start*/
    	/*帖子主题start*/
        $boards_model = M('boards');
        $boards = $boards_model -> field("board_id,pid,board_title,concat(path,'/',sort) as newpath") -> order("newpath") -> select();
        $this->assign('boards',$boards);
        /*帖子主题end*/
		//热门帖子推荐
        $hotposts = M('posts')->where("recycle = '0'")->order("views desc,replys desc")->limit(10)->select();
        $this->assign('hotposts',$hotposts);
        $this->display();
    }
    //帖子详细内容
    function detail(){
    	$post_id = $_GET['post_id'];
    	$posts_model = M('posts');
    	$reply_model = M('reply');
    	/*帖子主体内容start*/
    	$postinfo = $posts_model -> alias('p') -> field('p.*,b.board_title,u.username,u.posts,u.userhead,u.level,u.level_img,d.score,d.signdays') -> join("cq_user as u on u.user_id = p.user_id") -> join("cq_userdetail as d on d.user_id = p.user_id") -> join("cq_boards as b on b.board_id = p.board_id") -> where("p.post_id = {$post_id}") -> select();
        //dump($postinfo);exit;
        if(!$postinfo){
            header("location:".$_SERVER['HTTP_REFERER']);exit;
        }
    		/*上一篇下一篇start*/
    		$prev = M() -> query("select * from cq_posts where board_id = {$postinfo[0]['board_id']} AND ctime > '{$postinfo[0]['ctime']}' order by ctime limit 1");
            $next = M() -> query("select * from cq_posts where board_id = {$postinfo[0]['board_id']} AND ctime < '{$postinfo[0]['ctime']}' order by ctime desc limit 1");
            $prevAndnext[0] = $prev[0];
            $prevAndnext[1] = $next[0];
    		$this->assign('prevAndnext',$prevAndnext);
            //dump($prevAndnext);exit;
    		/*上一篇下一篇end*/
    	$postinfo[0]['body'] = htmlspecialchars_decode($postinfo[0]['body']);
    	if($postinfo[0]['views'] >= 10000){
    		$postinfo[0]['views'] = round($postinfo[0]['views'] / 10000,1).'万';
    	}
    	/*帖子主体内容end*/

    	/*帖子回复start*/
    	$count = $reply_model->where("post_id = {$post_id} AND display = '1'")->count();
        $p = new \Think\Page($count,5);
		if(isset($_GET['anchor']) && $_GET['anchor'] != ''){
			$totalpages = $p->totalPages;
			header('location:'.SITE_URL."/index.php/Home/Posts/detail/post_id/{$post_id}/p/{$totalpages}#{$_GET['anchor']}");
		}

    	$replylist = $reply_model -> alias('r') -> field('r.*,r1.reply_body as reply_body1,r1.ctime as ctime1,u.username,d.score,d.signdays,u.posts,u.userhead,u.level,u.level_img,u1.username as username1') -> join("cq_user as u on u.user_id = r.user_id") -> join("left join cq_userdetail as d on d.user_id = r.user_id") -> join("left join cq_reply as r1 on r1.reply_id = r.pid") -> join("left join cq_user as u1 on u1.user_id = r1.user_id") -> where("r.post_id = {$post_id} AND r.display = '1'") -> order("r.ctime") -> limit($p->firstRow.','.$p->listRows) -> select();
    	$first = $_GET['p'] ? $_GET['p']:'1';//当前页码

    	foreach($replylist as $key => $value){
    		$replylist[$key]['reply_body'] = htmlspecialchars_decode($value['reply_body']);
    		if($replylist[$key]['reply_body1']){
    			$replylist[$key]['reply_body1'] = htmlspecialchars_decode($value['reply_body1']);
    		}
    		$thefloor = ($first-1)*5+1+1+$key;//对数据编号
    		if($thefloor == 2){
    			$replylist[$key]['thefloor'] = '<span class="red fr" style="font-weight:bolder">沙发</span>';
    		}elseif($thefloor == 3){
    			$replylist[$key]['thefloor'] = '<span class="red fr" style="font-weight:bolder">藤椅</span>';
    		}elseif($thefloor == 4){
    			$replylist[$key]['thefloor'] = '<span class="red fr" style="font-weight:bolder">板凳</span>';
    		}elseif($thefloor == 5){
    			$replylist[$key]['thefloor'] = '<span class="red fr" style="font-weight:bolder">报纸</span>';
    		}elseif($thefloor == 6){
    			$replylist[$key]['thefloor'] = '<span class="red fr" style="font-weight:bolder">地板</span>';
    		}else{
    			$replylist[$key]['thefloor'] = '<span class="fr">'.$thefloor.'楼</span>';
    		}
    	}
    	$page = $p -> show();

    	/*帖子回复end*/

        /*计算帖子访问量start*/
            $views_model = M('postviews');
            $sess_id = cookie('PHPSESSID');
            $history = $views_model->where("post_id = {$post_id}")->find();
            $nowdate = date('Y-m-d',time());
            if($history){
                //判断是否是新的一天
                if($nowdate != $history['lasttime']){
                    $history['lasttime'] = $nowdate;
                    $history['sess_id'] = '';
                    $views_model->where("post_id = {$post_id}")->save($history);//是就清空昨天的记录
                }
            }else{
                //插入文章浏览量统计数据
                $history['post_id'] = $post_id;
                $history['sess_id'] = '';
                $history['lasttime'] = $nowdate;
                $views_model->add($history);
            }
            //判断今天是否浏览过
            $sessidArr =  explode(',',ltrim($history['sess_id'],','));
            //echo $sess_id;exit;
            if(!in_array($sess_id,$sessidArr)){
                //当日第一次浏览
                $views_model->where("post_id = {$post_id}")->setField('sess_id',$history['sess_id'].','.$sess_id);//记录用户的sessid
                $posts_model->where("post_id = {$post_id}")->setInc('views',1);//帖子浏览量+1
            }
        /*计算帖子访问量end*/

        //判断是否收藏过
        if(isset($_SESSION['flag'])){
            //判断是否收藏过
            $userdetail = M('userdetail')->where("user_id = {$_SESSION['userInfo']['user_id']}")->find();
            $collArr =  explode(',',ltrim($userdetail['coll'],','));
            if(!in_array($post_id,$collArr)){
                $postinfo[0]['allow'] = 1;
            }else{
                $postinfo[0]['allow'] = 0;
            }
        }else{
            $postinfo[0]['allow'] = 0;
        }
		//生成文章的二维码
		if(empty($postinfo[0]['qrcode'])){
			$qrurl = SITE_URL."/index.php/Mobile/Posts/detail/post_id/{$postinfo[0]['post_id']}";
			$filename = 'posts'.time().substr(md5(rand(0,999)),0,8).'.png';
			$code = $this->qrcode($qrurl,$filename);
			if($code){
				$posts_model->where("post_id = {$postinfo[0]['post_id']}")->setField('qrcode',$code);
				$postinfo[0]['qrcode'] = $code;
			}
		}
        $this->assign('postinfo',$postinfo[0]);
        $this->assign('replylist',$replylist);
        $this->assign('page',$page);
		$title = $postinfo[0]['topic'].'_'.'巅峰论剑'.'_'.$postinfo[0]['board_title'].'_'.'蓝海长青';
		$this->assign('title',$title);
    	$this->display();
    }
    //回复帖子
    function reply(){
    	$userid = $_SESSION['userInfo']['user_id'];
    	if(IS_POST){
    		$reply_model = M('reply');
    		if(empty($_POST['reply_body'])){
    			echo 'replyisnull';exit;
    		}
    		if(empty($_POST['verifycode'])){
    			echo 'codeisnull';exit;
    		}
			$result = mycheckword($_POST['reply_body']);
			if($result != $_POST['reply_body']){
				$this->ajaxReturn(array(
					'error'=> 'illegalword',
					'result'=> $result,
					'content' => '含有敏感词'
				));
			}
    		$vry = new \Think\Verify();
            if($vry -> check($_POST['verifycode'])){
            	unset($_POST['verifycode']);
            }else{
            	echo 'codeerror';exit;
            }
            $_POST['user_id'] = $userid;
    		$_POST['ctime'] = time();
    		$_POST['pid'] = $_POST['replypid'];
            /*判断是否在回复本文章的周期内start*/
                $nowtime = time();
                $nowtimestr = date("Y-m-d");
                $bbsconf = M('bbs')->field("reply_cycle")->find();//发帖周期
                $replypost = M('replypost')->where("user_id = {$userid}")->find();//回帖记录主表信息
                if(!$replypost){
                    $replypost['user_id'] = $userid;
                    $replypost['counts'] = 0;
                    $replypost['uptime'] = $nowtimestr;
                    $replypost['upstamp'] = $nowtime;
                    $replypost['id'] = M('replypost')->add($replypost);
                }
                M('replyextend')->where("user_id = {$userid} AND uptime != '{$nowtimestr}'")->delete();
                $replyextend = M('replyextend')->where("user_id = {$userid} AND post_id = {$_POST['post_id']}")->find();//回帖记录扩展表信息
                if($replyextend){
                    if(($bbsconf['reply_cycle'] * 60 + $replyextend['upstamp']) > $nowtime){
                        //提示禁止回帖
                        echo 'stopping';exit;
                    }
                }
            /*判断是否在回复本文章的周期内end*/
            if($reply_model -> create()){
				$replyid = $reply_model -> add();
            	if($replyid){
                    M('posts')->where("post_id = {$_POST['post_id']}")->setInc('replys',1);//回复数量+1
                    /*计算回帖积分start*/
                        if(!$replyextend){
                            $replyextend['user_id'] = $userid;
                            $replyextend['post_id'] = $_POST['post_id'];
                            $replyextend['uptime'] = $nowtimestr;
                            $replyextend['upstamp'] = $nowtime;
                            $replyextend['id'] = M('replyextend')->add($replyextend);
                        }else{
                            $extenddata['uptime'] = $nowtimestr;
                            $extenddata['upstamp'] = $nowtime;
                            M('replyextend')->where("id = {$replyextend['id']}")->save($extenddata);
                        }
                        $scoreconf = M('score')->field('number,counts')->find(3);
                        if($replypost['uptime'] == $nowtimestr){
                            if($replypost['counts'] < $scoreconf['counts']){
                                $replydata['counts'] = array('exp','counts+1');
                            }
                        }else{
                            $replydata['counts'] = 1;
                            $replydata['uptime'] = $nowtimestr;
                            $replydata['upstamp'] = $nowtime;
                        }
                        if(M('replypost')->where("id = {$replypost['id']}")->save($replydata)){
                            $userdata['score'] = array('exp','score+'.$scoreconf['number']);
                            $userdata['replypost'] = array('exp','replypost+'.$scoreconf['number']);
                            M('userdetail')->where("user_id = {$userid}")->save($userdata);
                        }
                    /*计算回帖积分end*/
					$this->ajaxReturn(array(
						'error'=>0,
                        'post_id'=>$_POST['post_id'],
						'reply_id'=>$replyid
					));
            		echo 'success';
            	}else{
            		echo 'error';
            	}
            }else{
            	echo 'error';
            }
    		//dump($_POST);exit;
    	}

    }
    //帖子列表
    function postlist(){
        //帖子数量统计、会员数量统计
        $postlist = M('posts')->where("recycle = '0'")->select();
        $totalcount = count($postlist);//总帖数
        $this->assign('totalcount',$totalcount);
        $today = M('posts')->where("ctime > ".strtotime(date("Ymd")))->count();
        $this->assign('today',$today);
        $yesterday = M('posts')->where("ctime > ".strtotime("-1days"))->count() - $today;
        $this->assign('yesterday',$yesterday);
        $members = M('user')->count();
        $this->assign('members',$members);
        //分类板块下的帖子
        if(isset($_GET['board_id'])){
            $map['board_id'] = $_GET['board_id'];
            $map1['p.board_id'] = $_GET['board_id'];
			$boardinfo = M('boards')->find($_GET['board_id']);
			if($boardinfo){
				$this->assign('boardinfo',$boardinfo);
			}
        }
        //dump($map);dump($map1);exit;
        $map['recycle'] = '0';
    	$map1['p.recycle'] = '0';
    	$bbsset = M('bbs')->field("pg_posts")->find();//获取论坛分页设置
    	$posts_model = M('posts');
    	$count = $posts_model -> where($map) -> count();
    	$p = new \Think\Page($count,$bbsset['pg_posts']);

    	$postlist = $posts_model -> alias('p') -> field('p.*,u.username') -> join("cq_user as u on u.user_id = p.user_id") -> where($map1)-> order("p.sort desc,p.ctime desc") -> limit($p->firstRow.','.$p->listRows) -> select();
    	foreach($postlist as $key=>$value){
    		$postlist[$key]['body'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['body']))),100);
    		$search = array(" ","　","\n","\r","\t");
 			$replace = array("","","","","");
 			$postlist[$key]['body'] = str_replace($search, $replace, $postlist[$key]['body']);
 			if($value['views'] >= 10000){
 				$postlist[$key]['views'] =  round($postlist[$key]['views'] /10000,1).'万';
 			}
 			if($value['comments'] >= 10000){
 				$postlist[$key]['comments'] =  round($postlist[$key]['comments'] /10000,1).'万';
 			}
    	}
    	$page = $p->show();
    	$this->assign('page',$page);
    	$this->assign('postlist',$postlist);

        //热门帖子推荐
        $hotposts = $posts_model->where($map)->order("views desc,replys desc")->limit(10)->select();
        $this->assign('hotposts',$hotposts);

			$lan_id = I('get.lan_id');
		     $adinfo=D('Banner')->where("lan_id={$lan_id} AND is_show='0'")->select();
        $this->assign('adinfo',$adinfo);
		$title = '巅峰论剑'.'_'.'蓝海长青';
		$this->assign('title',$title);
    	$this->display();
    }
    //点击收藏博文
    function collect(){
        if(IS_GET){
            $userid = $_SESSION['userInfo']['user_id'];
            $post_id = $_GET['post_id'];
            $detail_model = M('userdetail');
            $userdetail = $detail_model -> where("user_id = {$userid}") -> find();
            //判断是否收藏过
            $collArr =  explode(',',ltrim($userdetail['coll'],','));
            if(!in_array($post_id,$collArr)){
                if($detail_model -> where("user_id = {$userid}") -> setField('coll',$userdetail['coll'].','.$post_id)){
                    echo 'success';die;
                }
            }
            echo 'error';
        }
    }
	//取消收藏的帖子
	function cancelcoll() {
		if(IS_AJAX){
			$userid = $_SESSION['userInfo']['user_id'];
    		$post_id = $_GET['post_id'];
    		$detail_model = M('userdetail');
    		$userdetail = $detail_model -> where("user_id = {$userid}") -> find();
    		//判断是否收藏过
		    $collArr =  explode(',',ltrim($userdetail['coll'],','));
			if(count($collArr) > 0){
				foreach($collArr as $key => $value){
					if($post_id == $value){
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

			if($detail_model -> where("user_id = {$userid}") -> setField('coll',$collstr)){
				echo 'success';die;
			}
            echo 'error';exit;
		}else{
			exit;
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