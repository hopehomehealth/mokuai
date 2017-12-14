<?php

namespace Mobile\Controller;
use Common\Common\ComController;

class NewsController extends ComController
{
	//法规分类列表
	function faguilist() {
		   $catinfo = D('Faguicat')
            ->field('cat_id,name,sort')
            ->where("is_show='0'")
			->order('sort')
            ->select();
		   $this->assign('catinfo',$catinfo);
		$cat_id = I('get.cat_id');
		 if($cat_id == ''){
            $cat_id = $_POST['cat_id'];
        }
  $count = D('News') ->alias('n')
            ->join('__FAGUICAT__ as f on n.cat_id=f.cat_id')
            ->where("n.cat_id=$cat_id AND n.is_show='0' AND f.is_show='0' AND is_del='0'")->count();

        $p = new \Think\Page($count,2);

		   $info = D('News')
            ->alias('n')
            ->join('__FAGUICAT__ as f on n.cat_id=f.cat_id')
            ->where("n.cat_id={$cat_id} AND n.is_show='0' AND f.is_show='0' AND is_del='0'")
            ->field('n.*,f.*')
			   ->limit($p->firstRow.','.$p->listRows)
            ->order('add_time desc')
            ->select();
		       $totalPages = $p->totalPages;
        if(IS_POST){
            $this->ajaxReturn(array(
                'error'   => 0,
                'content' => $info
            ));
        }
		 $this->assign("totalPages",$totalPages);
        $this->assign('info',$info);
		$this->display();
	}

	//关于我们
	function guanyuwomen(){
	$lan_id = I('get.lan_id');
	$adinfo=D('Banner')->where("lan_id=2 AND is_area='0' AND is_show='0'")
            ->order('add_time desc')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);


        $cat_id = I('get.cat_id');
        $catinfo = D('Lanmu')
            ->field('lan_id,lan_title')
            ->where("pid=$lan_id AND is_show='0'")
            ->select();//返回一维

        $info = D('News')
            ->alias('n')
            ->join('__LANMU__ as f on n.lan_id=f.lan_id')
            ->where("f.pid={$lan_id} AND n.is_show='0' AND f.is_show='0' AND is_del='0'")
            ->field('n.*,f.*')
            ->select();
//dump($info);die;
         foreach($catinfo as $k =>$v){
            $catinfo[$k]['info']= array();
            foreach($info as $kk => $vv){
                if($v['lan_id'] == $vv['lan_id']){
                    $catinfo[$k]['info'][] = $vv;
                }
            }
        }
        //dump($catinfo);die;
        $this->assign('catinfo',$catinfo);
	$this->display();
	}
    function landetail(){
        $lan_id = I('get.lan_id');
        $laninfo = D('Lanmu')->find($lan_id);
        $laninfo['content1'] = htmlspecialchars_decode($laninfo['content1']);
        $this->assign('laninfo',$laninfo);

        $this->display();
    }


    //蓝海资讯
    	function lanhailist(){
	$pid = I('get.pid');
	$pidinfo = D('Lanmu')->where("lan_id=$pid")->find();
	$pidname = $pidinfo['lan_title'];
	$this->assign('pidname',$pidname);

	$clickinfo = D('News')->alias('n')
            ->join('__LANMU__ as f on n.lan_id=f.lan_id')
            ->where("f.pid={$pid} AND n.is_show='0' AND f.is_show='0' AND is_del='0'")
            ->field('n.*,f.*')
	    ->order('add_time desc')
	    ->limit(0,6)
            ->select();
	    foreach($clickinfo as $k=>$v){

		$match1 = substr($clickinfo[$k]['picfirst'],0,4);$clickinfo[$k]['match'] = $match1;
	}
	$this->assign('clickinfo',$clickinfo);
	//dump($clickinfo);die;
        $catinfo = D('Lanmu')
            ->field('lan_id,lan_title')
            ->where("pid=$pid AND is_show='0'")
            ->select();//返回一维
foreach($catinfo as $k=>$v){
	  $info = D('News')
            ->alias('n')
            ->join('__LANMU__ as f on n.lan_id=f.lan_id')
            ->where("f.lan_id={$v['lan_id']} AND n.is_show='0' AND f.is_show='0' AND is_del='0'")
			 ->limit(0,5)
			 ->order('add_time desc')
            ->field('n.*,f.*')
            ->select();
	  //dump($info);die;
            $catinfo[$k]['info']= array();
            foreach($info as $kk => $vv){
                if($v['lan_id'] == $vv['lan_id']){
                   $catinfo[$k]['info'][] = $vv;
		$match1 = substr($catinfo[$k]['info'][$kk]['picfirst'],0,4);$catinfo[$k]['info'][$kk]['match'] = $match1;
                }
            }
}
        //dump($catinfo);die;
        $this->assign('catinfo',$catinfo);
		$this->display();
	}


	function searchlist() {
 if($_POST){

            $search = $_POST;
			$sou = $search['search'];
			//dump($sou);die;
		$this->assign('sou',$sou);

            $map['news_title'] = array('LIKE',"%{$search['search']}%");

        }else{
            $map = '';
        }

  $count = D('News')->where("is_show='0' AND is_del='0'")->where($map)->order('add_time desc')->count();
        $p = new \Think\Page($count,10);

        $info = D('News')->where("is_show='0' AND is_del='0'")->where($map)
            ->order('add_time desc')->limit($p->firstRow.','.$p->listRows)
                ->select();

	foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);$info[$k]['match'] = $match;

		}
        $totalPages = $p->totalPages;


        $this->assign("totalPages",$totalPages);
        $this->assign('info',$info);

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
    function newslist(){
        $lan_id = I('get.lan_id');
        if($lan_id == ''){
            $lan_id = $_POST['lan_id'];
        }
        $info1 = D('News')->where("is_show='0' AND is_del='0' AND lan_id=$lan_id")
            ->order('add_time desc')->limit('0,5')->select();
			foreach($info1 as $k=>$v){
$match1 = substr($info1[$k]['picfirst'],0,4);$info1[$k]['match'] = $match1;

		}
        $this->assign('info1',$info1);

        $count = D('News')->where("is_show='0' AND is_del='0' AND lan_id=$lan_id")->order('add_time desc')->count();
        $p = new \Think\Page($count,5);

        $info2 = D('News')->where("is_show='0' AND is_del='0' AND lan_id=$lan_id")
            ->order('add_time desc')->limit($p->firstRow+$p->listRows.','.$p->listRows)
                ->select();
	foreach($info2 as $k=>$v){
$match2 = substr($info2[$k]['picfirst'],0,4);$info2[$k]['match'] = $match2;

		}

        $totalPages = $p->totalPages;

        if(IS_POST){
            $this->ajaxReturn(array(
                'error'   => 0,
                'content' => $info2
            ));
        }

        $this->assign("totalPages",$totalPages);
        $this->assign('info2',$info2);
        $laninfo = D('Lanmu')->where("lan_id=$lan_id")->select();
        $pid = $laninfo[0]['pid'];
        if($pid == 0){
            $pidname = $laninfo[0]['lan_title'];
        }else{
            $pidinfo = D('Lanmu')->where("lan_id=$pid")->select();
            $pidname = $pidinfo[0]['lan_title'];
            $pidname1 =  $laninfo[0]['lan_title'];
        }
        $this ->assign('pidname1',$pidname1);
          $this->assign('pidname',$pidname);
         $this->assign('pid',$pid);
        $this->display();
    }

    function falvfagui(){
        $lan_id = 31;
        $map['lan_id']= $lan_id;

        $cat_id = I('get.cat_id');
        $catinfo = D('Faguicat')
            ->field('cat_id,name,sort')
            ->where("is_show='0'")
			->order('sort')
            ->select();//返回一维
      foreach($catinfo as $k =>$v){

        $info = D('News')
            ->alias('n')
            ->join('__FAGUICAT__ as f on n.cat_id=f.cat_id')
            ->where("n.lan_id={$lan_id} AND n.is_show='0' AND f.is_show='0' AND is_del='0'")
            ->field('n.*,f.*')
			//->limit(0,5)
            ->order('add_time desc')
            ->select();

            $catinfo[$k]['info']= array();
            foreach($info as $kk => $vv){
                if($v['cat_id'] == $vv['cat_id']){
                    $catinfo[$k]['info'][] = $vv;
                }
            }
        }
        //dump($catinfo);die;
        $this->assign('catinfo',$catinfo);

        $this->display();
    }

    function detail(){

        $news_id= I('get.news_id');
        if($news_id == ''){
            $news_id = $_POST['news_id'];
        }

        $news = D('News');
        $news->where(array('news_id'=>$news_id))->setInc('click',1);
        $info=$news->find($news_id);
        $content = str_replace("_ueditor_page_break_tag_","",$info['content']);
        $info['content'] = $content;
        $this->assign('info',$info);
$map['news_id']=$news_id;
$map['display'] = '1';
        $count = D('Ncomment')->where($map)->count();

        $p = new \Think\Page($count,10);
        $cominfo = D('Ncomment')->where($map)->order('add_time desc')->limit($p->firstRow.','.$p->listRows)->select();

		//dump($cominfo);die;
        $totalPages = $p->totalPages;
        if(IS_POST){
            $this->ajaxReturn(array(
                'error'   => 0,
                'content' => $cominfo
            ));
        }
        $this->assign("totalPages",$totalPages);
        $this->assign('cominfo',$cominfo);
        //分享到微信、qq
        vendor("Wxshare.JSSDK");
        $sysconf = M('sysconfig')->field("appid,appsecret")->find();
        $jssdk = new \JSSDK("{$sysconf['appid']}", "{$sysconf['appsecret']}");
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage',json_encode($signPackage));//签名数据
        //dump($signPackage);exit;
        $shareData = array();//分享的数据
        $shareData['title']  = $info['news_title'].'_蓝海长青';
        $shareData['desc']  =  cutstr(htmlspecialchars_decode(strip_tags($info['content'])),20);
        $shareData['link']  =  SITE_URL.'/index.php/Home/News/detail/news_id/'.$info['news_id'];
        if(!empty($info['pic'])){
            $shareData['imgUrl']  = 'http://'.$_SERVER['HTTP_HOST'].$info['pic']; 
        }else{
            $shareData['imgUrl']  = $info['picfirst'];
        }
        
        $this->assign('shareData',json_encode($shareData));

        $this->display();
    }
	//图文消息模板
	function moban() {
		$imginfo = M('img')->find($_GET['id']);
		$this->assign('imginfo',$imginfo);
		$this->display();
	}
}