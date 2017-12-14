<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Home\Controller;
use Common\Common\ComController;

class FaguiController extends ComController
{

 function falvfagui(){
 if(IS_GET){
    if(IS_AJAX){
         $lan_id= 31;

        $map['lan_id']= $lan_id;

        $cat_id = I('get.cat_id');

        $count = D('News')
            ->alias('n')
            ->join('__FAGUICAT__ as f on n.cat_id=f.cat_id')
            ->where("n.lan_id={$lan_id} AND n.is_show='0' AND f.is_show='0' AND is_del='0' AND f.cat_id={$cat_id}")
            ->count();
         $p = new \Think\Page($count,10);

        $info = D('News')
            ->alias('n')
            ->join('__FAGUICAT__ as f on n.cat_id=f.cat_id')
            ->where("n.lan_id={$lan_id} AND n.is_show='0' AND f.is_show='0' AND is_del='0' AND f.cat_id={$cat_id}")
            ->field('n.news_id,n.lan_id,n.news_title,n.add_time,f.cat_id,f.name')
            ->order('add_time desc')

          ->limit($p->firstRow.','.$p->listRows)->select();
            $page = $p->show();
        $this -> assign('page',$page);
             $this->ajaxReturn(array(
                        'error'=>0,
                        'fagui'=>$info,
                        'page'=>$page
                    ));

            }


        $lan_id= 31;

        $map['lan_id']= $lan_id;

        $cat_id = I('get.cat_id');
        $catinfo = D('Faguicat')
            ->field('cat_id,name,sort')
            ->where("is_show='0'")
			->order('sort')
            ->select();//返回一维
        $this -> assign('catinfo',$catinfo);

        $info = D('News')
            ->alias('n')
            ->join('__FAGUICAT__ as f on n.cat_id=f.cat_id')
            ->where("n.lan_id={$lan_id} AND n.is_show='0' AND f.is_show='0' AND is_del='0'")
            ->field('n.*,f.*')
            ->order('add_time desc')
            ->select();

         foreach($catinfo as $k =>$v){
            $catinfo[$k]['info']= array();
            foreach($info as $kk => $vv){
                if($v['cat_id'] == $vv['cat_id']){
                    $catinfo[$k]['info'][] = $vv;
                }
            }
        }
        //dump($catinfo);die;
        $this->assign('catinfo',$catinfo);






          $adinfo0=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo0',$adinfo0);
        $adinfo3=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='3'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo3',$adinfo3);
        $adinfo4=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='4'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo4',$adinfo4);
        $adinfo5=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='5'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo5',$adinfo5);

        $laninfo=D('Lanmu')->where(array('lan_id'=>$lan_id))->select();
        $pid=$laninfo[0]['pid'];
        $this->assign('pid',$pid);
        $firstname = $laninfo[0]['lan_title'];
            $laninfo2=D('Lanmu')->where(array('lan_id'=>$pid))->select();
            $secondname= $laninfo2[0]['lan_title'];
            $daohang=array(
                'first'=>"$firstname",
                'second'=>"$secondname",
//                'first_url'=>U('newslist',array('lan_id'=>$pid)),
            );
        $this -> assign('daohang',$daohang);



$this->assign('cat_id',$cat_id);

$title = "法规政策_咨询服务_蓝海长青";
$this->assign('title',$title);
        $this->display();
    }
}

    function searchlist(){

          if($_POST){

            $search = $_POST;
			$sou = $search['search'];
			//dump($sou);die;
		$this->assign('sou',$sou);

            $map['news_title'] = array('LIKE',"%{$search['search']}%");

        }else{
            $map = '';
        }

        $count = D('News') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->field('n.*,l.lan_title')
            ->order('news_id desc')
           ->where($map)
			->where("n.is_show='0' AND is_del='0'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);
$info[$k]['match'] = $match;
		}
        $page = $p->show();
        $this -> assign('page',$page);

         $clickinfo = D('News')
                ->alias('n')
                ->join('__LANMU__ l on n.lan_id=l.lan_id')
                ->where("n.is_show='0' AND n.is_del='0'")
                ->order('click desc')->limit(0,10)->select();
                $this->assign('clickinfo',$clickinfo);
        $this -> assign('info',$info);
        $this->display();
    }
    function detail(){
        $news_id= I('get.news_id');
        $news = D('News');
        $news->where(array('news_id'=>$news_id))->setInc('click',1);
        $info=$news->find($news_id);
//   dump($info);die;
        $this->assign('info',$info);

        $lan_id=$info['lan_id'];
        //dump($lan_id);die;

        $adinfo0=D('Bannerx')->where("banner_id={$info['ding']}")->select();
        $this->assign('adinfo0',$adinfo0);
        $adinfo3=D('Bannerx')->where("banner_id={$info['yousan']}")->select();
        $this->assign('adinfo3',$adinfo3);
        $adinfo1=D('Bannerx')->where("banner_id={$info['youyi']}")->select();
        $this->assign('adinfo1',$adinfo1);
        $adinfo2=D('Bannerx')->where("banner_id={$info['youer']}")->select();
        $this->assign('adinfo2',$adinfo2);


        $laninfo=D('Lanmu')->where(array('lan_id'=>$lan_id))->select();
        //dump($laninfo);die;
        $pid=$laninfo[0]['pid'];
        $this->assign('pid',$pid);

        $firstname = $laninfo[0]['lan_title'];
        //dump($firstname);die;
        $laninfo2=D('Lanmu')->where(array('lan_id'=>$pid))->select();
        $secondname= $laninfo2[0]['lan_title'];
        $daohang=array(
            'first'=>"$firstname",
            'second'=>"$secondname",
            'first_url'=>U('newslist',array('lan_id'=>$lan_id)),
        );
        $this -> assign('daohang',$daohang);

        //排行
        if($pid == 0){
            $clickinfo = D('News')
                ->where("is_show='0' AND is_del='0' AND lan_id={$lan_id}")->order('click desc')->limit(0,10)->select();
        }else{
            $clickinfo = D('News')
                ->alias('n')
                ->join('__LANMU__ l on n.lan_id=l.lan_id')
                ->where("n.is_show='0' AND n.is_del='0' AND l.pid={$pid}")
                ->order('click desc')->limit(0,10)->select();
        }
        $this->assign('clickinfo',$clickinfo);

        //获得评论的总条数
		$map['news_id']=$news_id;
		$map['display'] = '1';
		// $cominfo = D('Ncomment')->where($map)->order('add_time desc')->select();
		//$this->assign('cominfo',$cominfo);
        $commenttotal = D('Ncomment')->where($map)->order('add_time desc')->count();
        $this -> assign('commenttotal',$commenttotal);

        $this->display();
    }

    function landetail(){

        $lan_id=I('get.lan_id');
        //dump($lan_id);die;
        $adinfo=D('Banner')->where("lan_id={$lan_id} AND is_show='0'")->select();
        $this->assign('adinfo',$adinfo);

        $laninfo=D('Lanmu')->where(array('lan_id'=>$lan_id))->select();
        $laninfo[0]['content1'] = htmlspecialchars_decode($laninfo[0]['content1']);
        $this->assign('laninfo',$laninfo);
        $pid=$laninfo[0]['pid'];
        $this->assign('pid',$pid);

        $firstname = $laninfo[0]['lan_title'];
        //dump($firstname);die;
        $laninfo2=D('Lanmu')->where(array('lan_id'=>$pid))->select();
        $secondname= $laninfo2[0]['lan_title'];
        $daohang=array(
            'first'=>"$firstname",
            'second'=>"$secondname",
            'first_url'=>U('newslist',array('lan_id'=>$lan_id)),
        );
        $this -> assign('daohang',$daohang);

        //排行

            $clickinfo = D('News')
                ->alias('n')
                ->join('__LANMU__ l on n.lan_id=l.lan_id')
                ->where("n.is_show='0' AND n.is_del='0' AND n.lan_id=3")
                ->order('click desc')->limit(0,10)->select();

        $this->assign('clickinfo',$clickinfo);



        $this->display();
    }

    function gongsijianjie(){
        $adinfo=D('Banner')->where("lan_id=10 AND is_area='0' AND is_show='0'")
            ->order('add_time desc')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);
//        dump($adinfo);die;
        $info = D('News')->where("is_show='0' AND is_del='0' AND lan_id=10")
            ->order('add_time desc')->limit('0,1')->select();

        $this->assign('info',$info);
        $this->display();
    }
    function qiyejingshen(){
        $adinfo=D('Banner')->where("lan_id=11 AND is_area='0' AND is_show='0'")
            ->order('add_time desc')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);
//        dump($adinfo);die;
        $info = D('News')->where("is_show='0' AND is_del='0' AND lan_id=11")
            ->order('add_time desc')->limit('0,1')->select();

        $this->assign('info',$info);
        $this->display();
    }
   function yewufanwei(){
        $adinfo=D('Banner')->where("lan_id=12 AND is_area='0' AND is_show='0'")
            ->order('add_time desc')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);
//        dump($adinfo);die;
        $info = D('News')->where("is_show='0' AND is_del='0' AND lan_id=12")
            ->order('add_time desc')->limit('0,1')->select();

        $this->assign('info',$info);
        $this->display();
    }
   function zuzhijiagou(){
        $adinfo=D('Banner')->where("lan_id=13 AND is_area='0' AND is_show='0'")
            ->order('add_time desc')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);
//        dump($adinfo);die;
        $info = D('News')->where("is_show='0' AND is_del='0' AND lan_id=13")
            ->order('add_time desc')->limit('0,1')->select();

        $this->assign('info',$info);
        $this->display();
    }
  function zhuanjiaduiwu(){
        $adinfo=D('Banner')->where("lan_id=14 AND is_area='0' AND is_show='0'")
            ->order('add_time desc')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);
//        dump($adinfo);die;
        $info = D('News')->where("is_show='0' AND is_del='0' AND lan_id=14")
            ->order('add_time desc')->limit('0,6')->select();

        $this->assign('info',$info);
        $this->display();
    }
function rencaizhaopin(){
        $adinfo=D('Banner')->where("lan_id=15 AND is_area='0' AND is_show='0'")
            ->order('add_time desc')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);
//        dump($adinfo);die;
        $info = D('News')->where("is_show='0' AND is_del='0' AND lan_id=15")
            ->order('add_time desc')->limit('0,5')->select();

        $this->assign('info',$info);
        $this->display();
    }

    function fabu(){
        $lan_id= 24;
        $news = D('News');
        $map['lan_id']= $lan_id;
        $map['is_show'] ='0';
        $count =$news ->where($map)-> count();
        $p = new \Think\Page($count,3);
        $page = $p->show();
        foreach($map as $key=>$val) {
            $p->parameter   .=   "$key=".urlencode($val[1]).'&';
        }

        $info = $val = D('News')
            ->order('add_time desc')
            ->limit($p->firstRow.','.$p->listRows)
            ->where($map)
            ->select();
foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);$info[$k]['match'] = $match;

		}
        $this->assign('info',$info);
        $this -> assign('page',$page);

    $adinfo0=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo0',$adinfo0);
        $adinfo3=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='3'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo3',$adinfo3);
        $adinfo4=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='4'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo4',$adinfo4);
        $adinfo5=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='5'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo5',$adinfo5);

        $laninfo=D('Lanmu')->where(array('lan_id'=>$lan_id))->select();
        $pid=$laninfo[0]['pid'];
        $this->assign('pid',$pid);
        $firstname = $laninfo[0]['lan_title'];
        $laninfo2=D('Lanmu')->where(array('lan_id'=>$pid))->select();
        $secondname= $laninfo2[0]['lan_title'];
        $daohang=array(
            'first'=>"$firstname",
            'second'=>"$secondname",
            'first_url'=>U('newslist',array('lan_id'=>$pid)),
        );
        $this -> assign('daohang',$daohang);

        //排行
        if($pid == 0){
            $clickinfo = D('News')
                ->where("is_show='0' AND is_del='0' AND lan_id={$lan_id}")->order('click desc')->limit(0,10)->select();
        }else{
            $clickinfo = D('News')
                ->alias('n')
                ->join('__LANMU__ l on n.lan_id=l.lan_id')
                ->where("n.is_show='0' AND n.is_del='0' AND l.pid={$pid}")
                ->order('click desc')->limit(0,10)->select();
        }
        $this->assign('clickinfo',$clickinfo);

        $this->display();
    }

    //蓝海资讯
    function lanhaizixun(){
        $adinfo0=D('Banner')->where("lan_id=4 AND is_show='0' AND is_area='0'")
            ->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo0',$adinfo0);
        $adinfo2=D('Banner')->where("lan_id=4 AND is_show='0' AND is_area='2'")
            ->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo2',$adinfo2);
        $clickinfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=4")
            ->order('click desc')->limit(0,6)->select();
            foreach($clickinfo as $k=>$v){
$clickmatch = substr($clickinfo[$k]['picfirst'],0,4);$clickinfo[$k]['match'] = $clickmatch;


$this->assign('clickmatch',$clickmatch);
		}
        $this->assign('clickinfo',$clickinfo);

        $pinginfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=4")
            ->order('talk desc')->limit(0,5)->select();
            // dump($pinginfo);die;
        $this->assign('pinginfo',$pinginfo);

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


            $this->display();
    }


    //军民融合
    function junminronghe(){
        $adinfo0=D('Banner')->where("lan_id=5 AND is_show='0' AND is_area='0'")
            ->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo0',$adinfo0);

 $adinfo2=D('Banner')->where("lan_id=5 AND is_show='0' AND is_area='2'")
            ->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo2',$adinfo2);
        $clickinfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=5")
            ->order('click desc')->limit(0,6)->select();
		     foreach($clickinfo as $k=>$v){
$clickmatch = substr($clickinfo[$k]['picfirst'],0,4);$clickinfo[$k]['match'] = $clickmatch;

$this->assign('clickmatch',$clickmatch);
		}
        $this->assign('clickinfo',$clickinfo);

        $pinginfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=5")
            ->order('talk desc')->limit(0,5)->select();
        $this->assign('pinginfo',$pinginfo);

        //蓝海发布

        $lanhaifabuinfo1 = D('News')
            ->where("is_show='0' AND lan_id='24' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
			foreach($lanhaifabuinfo1 as $k=>$v){
					$fabumatch = substr($lanhaifabuinfo1[$k]['picfirst'],0,4);$lanhaifabuinfo1[$k]['match'] = $fabumatch;
					$this->assign('fabumatch',$fabumatch);
				}
        $this->assign('lanhaifabuinfo1',$lanhaifabuinfo1);
        $lanhaifabuinfo2 = D('News')
            ->where("is_show='0' AND lan_id='24' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
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
            ->where("is_show='0' AND lan_id='28' AND is_del='0'")->order('add_time desc')->limit(1,4)->select();
        $this->assign('anquanluntaninfo2',$anquanluntaninfo2);

        //教育培训
        $jiaoyupeixuninfo = D('News')
            ->where("is_show='0' AND lan_id='26' AND is_del='0'")->order('add_time desc')->limit(0,8)->select();
			foreach($jiaoyupeixuninfo as $k=>$v){
$jiaoyumatch = substr($jiaoyupeixuninfo[$k]['picfirst'],0,4);$jiaoyupeixuninfo[$k]['match'] = $jiaoyumatch;

$this->assign('jiaoyumatch',$jiaoyumatch);
		}
        $this->assign('jiaoyupeixuninfo',$jiaoyupeixuninfo);

        $this->display();
    }
      //咨询服务
    function zixunfuwu(){
     $adinfo0=D('Banner')->where("lan_id=6 AND is_show='0' AND is_area='0'")
            ->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo0',$adinfo0);
        $adinfo2=D('Banner')->where("lan_id=6 AND is_show='0' AND is_area='2'")
            ->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo2',$adinfo2);

        $clickinfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=6")
            ->order('click desc')->limit(0,6)->select();
		     foreach($clickinfo as $k=>$v){
$clickmatch = substr($clickinfo[$k]['picfirst'],0,4);$clickinfo[$k]['match'] = $clickmatch;

$this->assign('clickmatch',$clickmatch);
		}
        $this->assign('clickinfo',$clickinfo);

        $pinginfo = D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->where("n.is_show='0' AND n.is_del='0' AND l.pid=6")
            ->order('talk desc')->limit(0,5)->select();
        $this->assign('pinginfo',$pinginfo);

        //图书馆
        $tushuguaninfo = D('News')
            ->where("is_show='0' AND lan_id='38' AND is_del='0'")->order('add_time desc')->limit(0,8)->select();
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
			foreach($faguizhengceinfo1 as $k=>$v){
					$faguiumatch = substr($faguizhengceinfo1[$k]['picfirst'],0,4);$faguizhengceinfo1[$k]['match'] = $faguiumatch;
					$this->assign('faguiumatch',$faguiumatch);
				}
        $this->assign('faguizhengceinfo1',$faguizhengceinfo1);
        $faguizhengceinfo2 = D('News')
            ->where("is_show='0' AND lan_id='31' AND is_del='0'")->order('add_time desc')->limit(1,3)->select();
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
            ->where("is_show='0' AND lan_id='32' AND is_del='0'")->order('add_time desc')->limit(1,11)->select();
        $this->assign('rencaijiaoliuinfo2',$rencaijiaoliuinfo2);

        $this->display();
    }
}