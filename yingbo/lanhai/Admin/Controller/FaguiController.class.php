<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class FaguiController extends AdminController
{
    function showlist(){
         if($_POST){
            $search = $_POST;
            $map['news_title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
            $map['lan_id'] = 31;
        }

        $count = D('News') ->where($map)-> count();

        $p = new \Think\Page($count,10);
        $info =  D('News')
            ->alias('n')
            ->join('__FAGUICAT__ f on n.cat_id = f.cat_id')
            ->field('n.*,f.cat_id,f.name')
            ->order('news_id desc')
           ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();



        $page = $p->show();
        $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }


    function tianjia(){
        if(IS_POST){
            $news = new \Model\NewsModel();
            $shuju = $news->create();
          $shuju['add_time'] = $_POST['add_time'];
            $shuju['upd_time'] = time();
            $shuju['content'] = $_POST['content'];

            if(empty($_POST['news_title'])){
                $this->error('文章标题不能为空');
                exit;
            }

            if(empty($_POST['content'])){
                $this->error('文章内容不能为空');
                exit;
            }

            //dump($shuju);die;
            if($news->add($shuju)){
                $this->success('发布成功','showlist');
            }else{

                $this->error('发布失败','tianjia');
            }
        }else{
          $catinfo = D('Faguicat')->where("is_show='0'")->order('sort')->select();
          $this->assign('catinfo',$catinfo);

            //顶部广告
            $dinginfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='0'")->select();
            $this->assign('dinginfo',$dinginfo);
            //右一广告
            $youyiinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='1'")->select();
            $this->assign('youyiinfo',$youyiinfo);
            //右二广告
            $youerinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='2'")->select();
            $this->assign('youerinfo',$youerinfo);
            //右三广告
            $yousaninfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='3'")->select();
            $this->assign('yousaninfo',$yousaninfo);
            $this->display();
        }
    }


    function upd(){
        $news_id = I('get.news_id');
        $news = new \Model\NewsModel();
        $p = I('get.p');
        if(IS_POST){
            //dump($_POST);die;
            $shuju = $news -> create();
			$shuju['add_time'] = $_POST['add_time'];
            $shuju['upd_time'] = time();

            $shuju['content'] = $_POST['content'];

		
               //dump($shuju);die;
            if($news->save($shuju)){
                $this -> success('修改成功',U('showlist',array('news_id'=>$news_id,'p'=>$p)),1);
            }else{
                $this -> error('修改失败',U('upd',array('news_id'=>$news_id,'p'=>$p)),1);
            }
        }else{
            $info = $news->where(array('news_id'=>$news_id))->find();
//dump($info);die;
            $son_lan_id = $info['lan_id'];
            $laninfo1 = D('Lanmu')
                ->where(array('level'=>0))
                ->find($son_lan_id);
            //dump($laninfo1);die;
            $now_pid = $laninfo1['pid'];
            if($now_pid == 0){
                $info['now_pid']=$son_lan_id;
            } else{
                $info['now_pid']=$now_pid;
            }

          $catinfo = D('Faguicat')->where("is_show='0'")->order('sort')->select();
          $this->assign('catinfo',$catinfo);
            //顶部广告
            $dinginfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='0'")->select();
            $this->assign('dinginfo',$dinginfo);
            //dump($dinginfo);die;
            //右一广告
            $youyiinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='1'")->select();
            $this->assign('youyiinfo',$youyiinfo);
            //右二广告
            $youerinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='2'")->select();
            $this->assign('youerinfo',$youerinfo);
            //右三广告
            $yousaninfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='3'")->select();
            $this->assign('yousaninfo',$yousaninfo);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

  
    function tuilist(){

        $info =  D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->field('n.*,l.lan_title')
            ->order('news_id desc')
            ->where("n.is_show='0' AND n.is_tui='0'")
            ->select();
				foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);
$info[$k]['match'] = $match;
		}
        $this -> assign('info',$info);
        $this->display();
    }


    //批量展示
    function zhanshi(){
        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->setField('is_show','0')){
                $this->success('已成功展示一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->setField('is_show','0');
                $this->success('批量操作成功',U('showlist'),1);
            }
        }
    }

    //批量隐藏
    function yincang(){
        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->setField('is_show','1')){
                $this->success('已成功隐藏一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->setField('is_show','1');
                $this->success('批量隐藏成功',U('showlist'),1);
            }
        }
    }


    function del(){

        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->delete()){
                $this->success('已删除一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->delete();
                $this->success('批量删除成功',U('showlist'),1);
            }
        }
    }


}