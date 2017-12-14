<?php

namespace Mobile\Controller;
use Common\Common\ComController;

class IndexController extends ComController
{
    function index(){
        //顶部banner
        $bannerinfo1 = D('Banner')
            ->where("is_show='0' AND is_area='0' AND lan_id=1 AND is_del='0'")->order('add_time desc')->limit(0,5)->select();
        $this->assign('bannerinfo1',$bannerinfo1);


//中部banner
        $bannerinfo2 = D('Banner')
            ->where("is_show='0' AND is_area='1' AND lan_id=1 AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('bannerinfo2',$bannerinfo2);



        //蓝海头条
        $toutiaoinfo1 = D('News')
            ->where("is_show='0' AND lan_id='3' AND is_del='0'")->order('add_time desc')->limit(0,5)->select();
			foreach($toutiaoinfo1 as $k=>$v){
			$toutiaomatch = substr($toutiaoinfo1[$k]['picfirst'],0,4);$toutiaoinfo1[$k]['match'] = $toutiaomatch;
			$this->assign('toutiaomatch',$toutiaomatch);
		}
        $this->assign('toutiaoinfo1',$toutiaoinfo1);
    //蓝海头条
        $toutiaoinfo2 = D('News')
            ->where("is_show='0' AND lan_id='3' AND is_del='0'")->order('add_time desc')->limit(5,4)->select();
        $this->assign('toutiaoinfo2',$toutiaoinfo2);

        //蓝海资讯
        $lanhaizixunclickinfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=4")
            ->order('add_time desc')->limit(0,3)->select();
	foreach($lanhaizixunclickinfo as $k=>$v){
			$lanhaizixunmatch = substr($lanhaizixunclickinfo[$k]['picfirst'],0,4);$lanhaizixunclickinfo[$k]['match'] = $lanhaizixunmatch;
			$this->assign('lanhaizixunmatch',$lanhaizixunmatch);
		}
        $this->assign('lanhaizixunclickinfo',$lanhaizixunclickinfo);
        //军民融合
        $junminrongheinfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=5")
            ->order('add_time desc')->limit(0,3)->select();
			foreach($junminrongheinfo as $k=>$v){
			$junminronghematch = substr($junminrongheinfo[$k]['picfirst'],0,4);$junminrongheinfo[$k]['match'] = $junminronghematch;
			$this->assign('junminronghematch',$junminronghematch);
		}
        $this->assign('junminrongheinfo',$junminrongheinfo);
        //咨询服务
        $zixunfuwuinfo = D('News')
            ->where("is_show='0' AND is_del='0' AND lan_id=29 OR lan_id=30 OR lan_id=32")
            ->order('add_time desc')->limit(0,3)->select();
			foreach($zixunfuwuinfo as $k=>$v){
			$zixunfuwumatch = substr($zixunfuwuinfo[$k]['picfirst'],0,4);$zixunfuwuinfo[$k]['match'] = $zixunfuwumatch;
			$this->assign('zixunfuwumatch',$zixunfuwumatch);
		}
        $this->assign('zixunfuwuinfo',$zixunfuwuinfo);
        //巅峰论坛
        $boards = M()->query("select p1.*,b.board_id,b.board_title,b.todposts,b.posts,b.board_img,u.username from (select p.* from cq_posts as p where p.ctime = (select max(ctime) from cq_posts where board_id = p.board_id)) as p1 right join cq_boards as b on b.board_id = p1.board_id left join cq_user as u on u.user_id = p1.user_id where b.pid <> 0 order by p1.ctime desc");
        foreach($boards as $key => $value){
            if(!empty($value['ctime'])){
                $boards[$key]['ctime'] = date("Y-m-d H:i:s",$value['ctime']);
            }
        }
        $this->assign('boards',$boards);




        $this->display();
    }
}