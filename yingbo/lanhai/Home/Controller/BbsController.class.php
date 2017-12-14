<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Home\Controller;
use Common\Common\ComController;

class BbsController extends ComController
{
    //论坛首页
    function index(){
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

        $sysconf = M('sysconfig')->find();//系统配置
        //轮播数量
        $scrolllist = M('slanders')->where("is_show = '1' AND is_scroll = '1'")->order("add_time desc")->limit($sysconf['pc_scroll_index'])->select();
        //dump($sysconf);exit;
        $this->assign('scrolllist',$scrolllist);
        //新主题
        //dump($sysconf);exit;
        $posts_model = M('posts');
        $jinghua = $posts_model->alias('p')->join("cq_boards as b on b.board_id = p.board_id")->where("p.sort = '2'")->order("p.replys desc")->limit($sysconf['pc_new_index'])->select();//精华帖
        $xintie = $posts_model->alias('p')->join("cq_boards as b on b.board_id = p.board_id")->where("p.sort = '0'")->order("p.ctime desc")->limit($sysconf['pc_new_index'])->select();//新帖
        $this->assign('jinghua',$jinghua);
        $this->assign('xintie',$xintie);
        //dump($xintie);exit;
        //长青博客
        $art_model = M('article');
        $articles = $art_model -> order("is_hot desc,add_time desc") -> limit($sysconf['pc_bg_index']) -> select();
        $this->assign('articles',$articles);
        //巅峰论坛
        $boards_model = M('boards');
        $boards = M()->query("select p1.*,b.board_id,b.board_title,b.todposts,b.uptime,b.posts,b.board_img,u.username from (select p.* from cq_posts as p where p.ctime = (select max(ctime) from cq_posts where board_id = p.board_id)) as p1 right join cq_boards as b on b.board_id = p1.board_id left join cq_user as u on u.user_id = p1.user_id where b.pid <> 0 order by b.sort");
        foreach($boards as $key => $value){
			$nowtime = date('Ymd');
			if($value['uptime'] == $nowtime){
			}else{
				$shuju['uptime'] = $nowtime;
				$shuju['todposts'] = 0;
				M('boards')->where("board_id = {$value['board_id']}")->save($shuju);
			}
            if(!empty($value['ctime'])){
                $boards[$key]['ctime'] = date("Y-m-d H:i:s",$value['ctime']);
            }
        }
        $this->assign('boards',$boards);

        //名家讲坛
        $famous_model = M('famous');
        $famous1 = M()->query("select s1.*,f.f_id,f.f_name,f.f_photo,f.f_artnums from (select s.* from cq_slanders as s where s.add_time = (select max(add_time) from cq_slanders where f_id = s.f_id)) as s1 right join cq_famous as f on f.f_id = s1.f_id where f.f_type = '1' AND f.is_index = '1' order by f.f_fans desc,f.f_artnums desc limit {$sysconf['pc_famous1_index']}");
        foreach($famous1 as $key => $value){
            if(!empty($value['add_time'])){
                $famous1[$key]['add_time'] = date("Y-m-d H:i:s",$value['add_time']);
            }
        }
        $this->assign('famous1',$famous1);

        //蓝海人物
        //$famous_model = M('famous');
        $famous2 = $famous_model->where("f_type = '2' AND is_index = '1'")->order("f_fans desc,f_artnums desc")->limit($sysconf['pc_famous2_index'])->select();
        $this->assign('famous2',$famous2);

			$lan_id = I('get.lan_id');
    $adinfo0=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo0',$adinfo0);
        $adinfo1=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='1'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo1',$adinfo1);
        $adinfo2=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='2'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo2',$adinfo2);
		$title = '长青论坛'.'_'.'蓝海长青';
		$this->assign('title',$title);
        $this->display();
    }
}