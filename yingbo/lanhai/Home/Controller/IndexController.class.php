<?php

namespace Home\Controller;
use Common\Common\ComController;

class IndexController extends ComController
{
    function index(){
    $title = "蓝海长青";
$this->assign('title',$title);
        //顶部banner
        $bannerinfo1 = D('Banner')
            ->where("is_show='0' AND is_area='0' AND lan_id=1 AND is_del='0'")->order('add_time desc')->limit(0,5)->select();
        $this->assign('bannerinfo1',$bannerinfo1);
//      dump($bannerinfo1);die;

//中部banner
        $bannerinfo2 = D('Banner')
            ->where("is_show='0' AND is_area='1' AND lan_id=1 AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('bannerinfo2',$bannerinfo2);

        //顶部推荐幻灯片
        $tuiinfo = D('News')
            ->where("is_show='0' AND is_tui='0' AND is_del='0'")->order('add_time desc')->limit(0,6)->select();
				foreach($tuiinfo as $k=>$v){
					$tuimatch = substr($tuiinfo[$k]['picfirst'],0,4);
					$tuiinfo[$k]['match'] = $tuimatch;
				}

        $this->assign('tuiinfo',$tuiinfo);

        //蓝海头条
        $toutiaoinfo = D('News')
            ->where("is_show='0' AND lan_id='3' AND is_del='0'")->order('add_time desc')->limit(0,3)->select();
        $this->assign('toutiaoinfo',$toutiaoinfo);

        //点击排行
        $clickinfo = D('News')
            ->where("is_show='0' AND is_del='0'")->order('click desc')->limit(0,8)->select();
        $this->assign('clickinfo',$clickinfo);

        //蓝海视点
        $shidianinfo1 = D('News')
            ->where("is_show='0' AND lan_id='18' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
			foreach($shidianinfo1 as $k=>$v){
					$shidianmatch = substr($shidianinfo1[$k]['picfirst'],0,4);$shidianinfo1[$k]['match'] = $shidianmatch;
					$this->assign('shidianmatch',$shidianmatch);
				}
        $this->assign('shidianinfo1',$shidianinfo1);
        $shidianinfo2 = D('News')
            ->where("is_show='0' AND lan_id='18' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('shidianinfo2',$shidianinfo2);

        //安全纵横
        $anquanzonghenginfo1 = D('News')
            ->where("is_show='0' AND lan_id='20' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
			foreach($anquanzonghenginfo1 as $k=>$v){
					$anquanmatch = substr($anquanzonghenginfo1[$k]['picfirst'],0,4);$anquanzonghenginfo1[$k]['match'] = $anquanmatch;
					$this->assign('anquanmatch',$anquanmatch);
				}
        $this->assign('anquanzonghenginfo1',$anquanzonghenginfo1);
        $anquanzonghenginfo2 = D('News')
            ->where("is_show='0' AND lan_id='20' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('anquanzonghenginfo2',$anquanzonghenginfo2);

        //思海缆绳
        $sihailanshenginfo1 = D('News')
            ->where("is_show='0' AND lan_id='22' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
			foreach($sihailanshenginfo1 as $k=>$v){
					$sihaimatch = substr($sihailanshenginfo1[$k]['picfirst'],0,4);$sihailanshenginfo1[$k]['match'] = $sihaimatch;
					$this->assign('sihaimatch',$sihaimatch);
				}
        $this->assign('sihailanshenginfo1',$sihailanshenginfo1);
        $sihailanshenginfo2 = D('News')
            ->where("is_show='0' AND lan_id='22' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('sihailanshenginfo2',$sihailanshenginfo2);

        //军事动态
        $junshidongtaiinfo1 = D('News')
            ->where("is_show='0' AND lan_id='19' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
foreach($junshidongtaiinfo1 as $k=>$v){
					$junshimatch = substr($junshidongtaiinfo1[$k]['picfirst'],0,4);$junshidongtaiinfo1[$k]['match'] = $junshimatch;
					$this->assign('junshimatch',$junshimatch);
				}
        $this->assign('junshidongtaiinfo1',$junshidongtaiinfo1);
        $junshidongtaiinfo2 = D('News')
            ->where("is_show='0' AND lan_id='19' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('junshidongtaiinfo2',$junshidongtaiinfo2);

        //尖端科技
        $jianduankejiinfo1 = D('News')
            ->where("is_show='0' AND lan_id='21' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
		foreach($jianduankejiinfo1 as $k=>$v){
					$jianduanmatch = substr($jianduankejiinfo1[$k]['picfirst'],0,4);$jianduankejiinfo1[$k]['match'] = $jianduanmatch;
					$this->assign('jianduanmatch',$jianduanmatch);
				}
        $this->assign('jianduankejiinfo1',$jianduankejiinfo1);
        $jianduankejiinfo2 = D('News')
            ->where("is_show='0' AND lan_id='21' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('jianduankejiinfo2',$jianduankejiinfo2);

        //开心乐园
             $kaixinleyuaninfo1 = D('News')
                 ->where("is_show='0' AND lan_id='23' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
			 	foreach($kaixinleyuaninfo1 as $k=>$v){
					$kaixinmatch = substr($kaixinleyuaninfo1[$k]['picfirst'],0,4);$kaixinleyuaninfo1[$k]['match'] = $kaixinmatch;
					$this->assign('kaixinmatch',$kaixinmatch);
				}
        $this->assign('kaixinleyuaninfo1',$kaixinleyuaninfo1);
        $kaixinleyuaninfo2 = D('News')
            ->where("is_show='0' AND lan_id='23' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('kaixinleyuaninfo2',$kaixinleyuaninfo2);

        //蓝海发布

$lanhaifabuinfo1 = D('News')
    ->where("is_show='0' AND lan_id='9' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
	foreach($lanhaifabuinfo1 as $k=>$v){
					$fabumatch = substr($lanhaifabuinfo1[$k]['picfirst'],0,4);$lanhaifabuinfo1[$k]['match'] = $fabumatch;
					$this->assign('fabumatch',$fabumatch);
				}
        $this->assign('lanhaifabuinfo1',$lanhaifabuinfo1);
        $lanhaifabuinfo2 = D('News')
            ->where("is_show='0' AND lan_id='9' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('lanhaifabuinfo2',$lanhaifabuinfo2);

        //文化传媒

        $wenhuachuanmeiinfo1 = D('News')
            ->where("is_show='0' AND lan_id='27' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
			foreach($wenhuachuanmeiinfo1 as $k=>$v){
					$wenhuamatch = substr($wenhuachuanmeiinfo1[$k]['picfirst'],0,4);$wenhuachuanmeiinfo1[$k]['match'] = $wenhuamatch;
					$this->assign('wenhuamatch',$wenhuamatch);
				}
        $this->assign('wenhuachuanmeiinfo1',$wenhuachuanmeiinfo1);
        $wenhuachuanmeiinfo2 = D('News')
            ->where("is_show='0' AND lan_id='27' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('wenhuachuanmeiinfo2',$wenhuachuanmeiinfo2);

        //产业发展
        $chanyefazhaninfo1 = D('News')
            ->where("is_show='0' AND lan_id='25' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
		foreach($chanyefazhaninfo1 as $k=>$v){
					$chanyematch = substr($chanyefazhaninfo1[$k]['picfirst'],0,4);$chanyefazhaninfo1[$k]['match'] = $chanyematch;
					$this->assign('chanyematch',$chanyematch);
				}
        $this->assign('chanyefazhaninfo1',$chanyefazhaninfo1);
        $chanyefazhaninfo2 = D('News')
            ->where("is_show='0' AND lan_id='25' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('chanyefazhaninfo2',$chanyefazhaninfo2);

        //安全论坛
        $anquanluntaninfo1 = D('News')
            ->where("is_show='0' AND lan_id='28' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
			foreach($anquanluntaninfo1 as $k=>$v){
					$anquanmatch = substr($anquanluntaninfo1[$k]['picfirst'],0,4);$anquanluntaninfo1[$k]['match'] = $anquanmatch;
					$this->assign('anquanmatch',$anquanmatch);
				}
        $this->assign('anquanluntaninfo1',$anquanluntaninfo1);
        $anquanluntaninfo2 = D('News')
            ->where("is_show='0' AND lan_id='28' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('anquanluntaninfo2',$anquanluntaninfo2);

        //教育培训
        $jiaoyupeixuninfo = D('News')
            ->where("is_show='0' AND lan_id='26' AND is_del='0'")->order('add_time desc')->limit(0,6)->select();
				foreach($jiaoyupeixuninfo as $k=>$v){
$jiaoyumatch = substr($jiaoyupeixuninfo[$k]['picfirst'],0,4);$jiaoyupeixuninfo[$k]['match'] = $jiaoyumatch;

$this->assign('jiaoyumatch',$jiaoyumatch);
		}
        $this->assign('jiaoyupeixuninfo',$jiaoyupeixuninfo);

        //图书馆
         $tushuguaninfo = D('News')
             ->where("is_show='0' AND lan_id='38' AND is_del='0'")->order('add_time desc')->limit(0,9)->select();
			foreach($tushuguaninfo as $k=>$v){
$tushumatch = substr($tushuguaninfo[$k]['picfirst'],0,4);$tushuguaninfo[$k]['match'] = $tushumatch;

$this->assign('tushumatch',$tushumatch);
		}
        $this->assign('tushuguaninfo',$tushuguaninfo);


        //园区建设
         $yuanqujiansheinfo1 = D('News')
             ->where("is_show='0' AND lan_id='29' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
		 	foreach($yuanqujiansheinfo1 as $k=>$v){
					$yuanqumatch = substr($yuanqujiansheinfo1[$k]['picfirst'],0,4);$yuanqujiansheinfo1[$k]['match'] = $yuanqumatch;
					$this->assign('yuanqumatch',$yuanqumatch);
				}
				//dump($yuanqujiansheinfo1);
        $this->assign('yuanqujiansheinfo1',$yuanqujiansheinfo1);
        $yuanqujiansheinfo2 = D('News')
            ->where("is_show='0' AND lan_id='29' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('yuanqujiansheinfo2',$yuanqujiansheinfo2);

        //科技服务
         $kejifuwuinfo1 = D('News')
             ->where("is_show='0' AND lan_id='30' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
		 	foreach($kejifuwuinfo1 as $k=>$v){
					$kejiumatch = substr($kejifuwuinfo1[$k]['picfirst'],0,4);$kejifuwuinfo1[$k]['match'] = $kejiumatch;
					$this->assign('kejiumatch',$kejiumatch);
				}
        $this->assign('kejifuwuinfo1',$kejifuwuinfo1);
        $kejifuwuinfo2 = D('News')
            ->where("is_show='0' AND lan_id='30' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('kejifuwuinfo2',$kejifuwuinfo2);

        //法规政策
         $faguizhengceinfo1 = D('News')
             ->where("is_show='0' AND lan_id='31' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('faguizhengceinfo1',$faguizhengceinfo1);
        $faguizhengceinfo2 = D('Faguicat')

            ->where("is_show='0'")->order('sort')->limit(0,8)->select();
        $this->assign('faguizhengceinfo2',$faguizhengceinfo2);

        //人才交流
         $rencaijiaoliuinfo1 = D('News')
             ->where("is_show='0' AND lan_id='32' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
		 	foreach($rencaijiaoliuinfo1 as $k=>$v){
					$rencaimatch = substr($rencaijiaoliuinfo1[$k]['picfirst'],0,4);$rencaijiaoliuinfo1[$k]['match'] = $rencaimatch;
					$this->assign('rencaimatch',$rencaimatch);
				}
        $this->assign('rencaijiaoliuinfo1',$rencaijiaoliuinfo1);
        $rencaijiaoliuinfo2 = D('News')
            ->where("is_show='0' AND lan_id='32' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
        $this->assign('rencaijiaoliuinfo2',$rencaijiaoliuinfo2);

        //长青论坛
        $boardlist = M()->query("select p1.*,b.board_id,b.board_title,b.todposts,b.posts,b.board_img,u.username from (select p.* from cq_posts as p where p.ctime = (select max(ctime) from cq_posts where board_id = p.board_id)) as p1 right join cq_boards as b on b.board_id = p1.board_id left join cq_user as u on u.user_id = p1.user_id where b.pid <> 0 order by b.sort");
        foreach($boardlist as $key => $value){
            if(!empty($value['ctime'])){
                $boardlist[$key]['ctime'] = date("Y-m-d H:i:s",$value['ctime']);
            }
        }
        $this->assign('boardlist',$boardlist);

//友情链接
$linkinfo1 = D('Link')
    ->where("is_show='0' AND cat_id='1'")->order('sort')->limit(0,8)->select();
        $this->assign('linkinfo1',$linkinfo1);
        $linkinfo2 = D('Link')
            ->where("is_show='0' AND cat_id='2'")->order('sort')->limit(0,8)->select();
        $this->assign('linkinfo2',$linkinfo2);
        $linkinfo3 = D('Link')
            ->where("is_show='0' AND cat_id='3'")->order('sort')->limit(0,8)->select();
        $this->assign('linkinfo3',$linkinfo3);
        $linkinfo4 = D('Link')
            ->where("is_show='0' AND cat_id='4'")->order('sort')->limit(0,8)->select();
        $this->assign('linkinfo4',$linkinfo4);


        $this->display();
    }
}