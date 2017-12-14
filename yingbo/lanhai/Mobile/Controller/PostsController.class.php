<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Mobile\Controller;
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
			$result = $this->mycheckwords($_POST['body']);
			if($result != ''){
				$this->ajaxReturn(array(
					'error'=> 'illegalword',
					'content' => '含有敏感词'.$result
				));
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
            $path = $this->upload();
            if($path){
                $_POST['post_img'] = '/Public/'.$path;
            }
        	$board = $boards_model -> find($_POST['board_id']);
        	$_POST['user_id'] = $userid;
        	$_POST['ctime'] = time();
            //dump($_POST);exit;
        	if($board && ($board['pid'] != 0)){
        		if($posts_model -> create()){
        			$post_id = $posts_model -> add();
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
        $this->display();
    }
    //帖子详细内容
    function detail(){
    	$post_id = $_GET['post_id'];
    	$posts_model = M('posts');
    	$reply_model = M('reply');


    	/*帖子回复start*/
    	$count = $reply_model->where("post_id = {$post_id} AND display = '1'")->count();
        $p = new \Think\Page($count,8);
    	$replylist = $reply_model -> alias('r') -> field('r.*,r1.reply_body as reply_body1,r1.ctime as ctime1,u.username,u.score,u.posts,u.userhead,u1.username as username1') -> join("cq_user as u on u.user_id = r.user_id") -> join("left join cq_reply as r1 on r1.reply_id = r.pid") -> join("left join cq_user as u1 on u1.user_id = r1.user_id") -> where("r.post_id = {$post_id} AND r.display = '1'") -> order("r.ctime") -> limit($p->firstRow.','.$p->listRows) -> select();
    	$first = $_GET['p'] ? $_GET['p']:'1';//当前页码

    	foreach($replylist as $key => $value){
    		$replylist[$key]['reply_body'] = htmlspecialchars_decode($value['reply_body']);
			$replylist[$key]['ctime'] = date('Y-m-d H:i:s',$value['ctime']);
    		if($replylist[$key]['reply_body1']){
    			$replylist[$key]['reply_body1'] = htmlspecialchars_decode($value['reply_body1']);
                //echo $replylist[$key]['reply_body1'];exit;
    		}
    		$thefloor = ($first-1)*8+1+1+$key;//对数据编号
    		if($thefloor == 2){
    			$replylist[$key]['thefloor'] = '沙发';
    		}elseif($thefloor == 3){
    			$replylist[$key]['thefloor'] = '藤椅';
    		}elseif($thefloor == 4){
    			$replylist[$key]['thefloor'] = '板凳';
    		}elseif($thefloor == 5){
    			$replylist[$key]['thefloor'] = '报纸';
    		}elseif($thefloor == 6){
    			$replylist[$key]['thefloor'] = '地板';
    		}else{
    			$replylist[$key]['thefloor'] = $thefloor.'楼';
    		}
    	}
		//dump($replylist);exit;
		if(IS_AJAX){

			if($replylist){
				$this->ajaxReturn(array(
					'error'=>0,
					'content'=>$replylist
				));
			}else{
				exit;
			}
		}
    	$page = $p -> show();

    	/*帖子回复end*/

        /*帖子主体内容start*/
        $postinfo = $posts_model -> alias('p') -> field('p.*,u.username,u.score,u.posts,u.userhead') -> join("cq_user as u on u.user_id = p.user_id") -> where("p.post_id = {$post_id}") -> select();
            /*上一篇下一篇start*/
            $prevAndnext = M() -> query("select * from (select post_id,topic from cq_posts as t1 where board_id = {$postinfo[0]['board_id']} AND ctime > '{$postinfo[0]['ctime']}' order by ctime limit 1) as t1 union all select * from(select post_id,topic from cq_posts as t2 where board_id = {$postinfo[0]['board_id']} AND ctime < '{$postinfo[0]['ctime']}' order by ctime desc limit 1) as t2");
            $this->assign('prevAndnext',$prevAndnext);
            /*上一篇下一篇end*/
        $postinfo[0]['body'] = htmlspecialchars_decode($postinfo[0]['body']);
        if($postinfo[0]['views'] >= 10000){
            $postinfo[0]['views'] = round($postinfo[0]['views'] / 10000,1).'万';
        }
        /*帖子主体内容end*/

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
        $this->assign('postinfo',$postinfo[0]);
        $this->assign('replylist',$replylist);
        $this->assign('page',$page);
		//分享到微信、qq
        vendor("Wxshare.JSSDK");
        $sysconf = M('sysconfig')->field("appid,appsecret")->find();
        $jssdk = new \JSSDK("{$sysconf['appid']}", "{$sysconf['appsecret']}");
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage',json_encode($signPackage));//签名数据
        $shareData = array();//分享的数据
        $shareData['title']  = $postinfo[0]['topic'].'_蓝海长青';
        $shareData['desc']  =  cutstr(htmlspecialchars_decode(strip_tags($postinfo[0]['body'])),20);
        $shareData['link']  =  SITE_URL.'/index.php/Home/Posts/detail/post_id/'.$postinfo[0]['post_id'];
        $shareData['imgUrl']  = 'http://'.$_SERVER['HTTP_HOST'].$postinfo[0]['userhead'];
        $this->assign('shareData',json_encode($shareData));
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
			$result = $this->mycheckwords($_POST['reply_body']);
			if($result != ''){
				$this->ajaxReturn(array(
					'error'=> 'illegalword',
					'content' => '含有敏感词'.$result
				));
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
				//dump($replypost);
                M('replyextend')->where("user_id = {$userid} AND uptime != '{$nowtimestr}'")->delete();
                $replyextend = M('replyextend')->where("user_id = {$userid} AND post_id = {$_POST['post_id']}")->find();//回帖记录扩展表信息
                if($replyextend){
                    if(($bbsconf['reply_cycle'] * 60 + $replyextend['upstamp']) > $nowtime){

                        //提示禁止回帖
                        echo 'stopping';exit;
                    }
                }
				//exit;
            /*判断是否在回复本文章的周期内end*/
            if($reply_model -> create()){
				$_POST['reply_id'] = $reply_model -> add();
            	if($_POST['reply_id']){
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
					$_POST['ctime'] = date('Y-m-d H:i:s',$_POST['ctime']);
					$_POST['userhead'] = $_SESSION['userInfo']['userhead'];
					$_POST['username'] = $_SESSION['userInfo']['username'];
					$_POST['thefloor'] = '';
					if($_POST['replypid'] == 0){
						$this->ajaxReturn(array(
							'error' => 0,
							'content' => $_POST
						));
					}else{
						$replyinfo = M('reply')->alias('r')->field('r.*,u.username')->join('cq_user as u on u.user_id = r.user_id')->select();
						$replyinfo[0]['ctime'] = date('Y-m-d H:i:s',$replyinfo[0]['ctime']);
						$this->ajaxReturn(array(
							'error' => 0,
							'content' => $_POST,
							'replyinfo'=>$replyinfo[0]
						));
					}

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
    	$board_id = $_GET['board_id'];
    	$bbsset = M('bbs')->field("pg_posts")->find();//获取论坛分页设置
    	$posts_model = M('posts');
    	$count = $posts_model -> where("board_id = {$board_id}") -> count();
    	$p = new \Think\Page($count,$bbsset['pg_posts']);
    	$postlist = $posts_model -> alias('p') -> field('p.*,u.username') -> join("cq_user as u on u.user_id = p.user_id") -> where("p.board_id = {$board_id} AND p.recycle = '0'")-> order("p.sort desc,p.ctime desc") -> limit($p->firstRow.','.$p->listRows) -> select();
    	foreach($postlist as $key=>$value){
    		$postlist[$key]['body'] = cutstr(strip_tags(preg_replace('/<img.*?alt\=[\"|\'](.*?)[\"|\'].*?>/i','',htmlspecialchars_decode($value['body']))),100);
    		$search = array(" ","　","\n","\r","\t");
 			$replace = array("","","","","");
 			$postlist[$key]['body'] = str_replace($search, $replace, $postlist[$key]['body']);
            $postlist[$key]['nctime'] = date('Y-m-d H:i',$value['ctime']);
 			if($value['views'] >= 10000){
 				$postlist[$key]['views'] =  round($postlist[$key]['views'] /10000,1).'万';
 			}
 			if($value['comments'] >= 10000){
 				$postlist[$key]['comments'] =  round($postlist[$key]['comments'] /10000,1).'万';
 			}
    	}
        if(IS_AJAX){

            if($postlist){
                $this->ajaxReturn(array(
                    'error' => 0,
                    'content' => $postlist
                ));
            }else{
                exit;
            }
        }
    	$page = $p->show();
    	$this->assign('page',$page);
    	$this->assign('postlist',$postlist);

        //热门帖子推荐
        $hotposts = $posts_model->where("board_id = {$board_id} AND recycle = '0'")->order("views desc,replys desc")->limit(10)->select();
        $this->assign('hotposts',$hotposts);
    	$this->display();
    }
    //点击收藏帖子
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
    //上传图片
    function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/postimg/";
        $info=$upload->uploadOne($_FILES['post_img']);
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