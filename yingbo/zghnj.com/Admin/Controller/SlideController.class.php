<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 17:10
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class SlideController extends AdminController
{
    //列表
    function showlist(){
        $map['s.is_show'] = '0';
        if(isset($_GET['cat_id']) && ($_GET['cat_id'] != '')){
            $map['s.cat_id'] = intval($_GET['cat_id']);
        }
        $model = D('Slide');
        $count = $model
            ->alias('s')
            ->join("left join __CATEGORY__ as c on c.cat_id = s.cat_id")
            ->where($map)
            ->count();
        $p = new \Think\Page($count,15);
        $info = $model
            ->alias('s')
            ->field("s.*,c.cat_name")
            ->join("left join __CATEGORY__ as c on c.cat_id = s.cat_id")
            ->where($map)
            ->order('s.sort,upd_time desc')
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $p = I('get.p');
        $this->assign('p',$p);
        $catlist = M('category')->select();
        $this -> assign('catlist',$catlist);
        $this -> display();
    }


    //添加
    function tianjia(){
        if(IS_POST){
            $ad = D('Slide');

            $info = $ad->create();
            $info['add_time'] = time();
            $info['upd_time'] = time();
            $cfg = array(
                'rootPath'    =>  './Public/Upd/banner/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> upload();
            if(isset($z['pic'])){
                //把上传的图片"路径名"保存到数据库中
                $info['pic'] = $up->rootPath.$z['pic']['savepath'].$z['pic']['savename'];
            }
            if(isset($z['picmobile'])){
                //把上传的图片"路径名"保存到数据库中
                $info['picmobile'] = $up->rootPath.$z['picmobile']['savepath'].$z['picmobile']['savename'];
            }
            


            if($ad->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $category = M('category')->where("is_show = 1 AND pid = 0")->order("sort,cat_id")->select();
            $this->assign('category',$category);
            $this->display();
        }
    }

    //修改
    function upd(){
        $ad_id = I('get.ad_id');
        $p = I('get.p');
        $ad = D('Slide');
        if(IS_POST){
            $shuju = $ad -> create();
            $shuju['upd_time'] = time();
            
            $cfg = array(
                'rootPath'    =>  './Public/Upd/banner/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> upload();
            if(isset($z['pic'])){
                unlink($_POST['oldpic']);
                //把上传的图片"路径名"保存到数据库中
                $shuju['pic'] = $up->rootPath.$z['pic']['savepath'].$z['pic']['savename'];
            }
            if(isset($z['picmobile'])){
                unlink($_POST['oldpicmobile']);
                //把上传的图片"路径名"保存到数据库中
                $shuju['picmobile'] = $up->rootPath.$z['picmobile']['savepath'].$z['picmobile']['savename'];
            }
            


            if($ad->save($shuju)){
                $this -> success('修改成功',U('showlist',array('ad_id'=>$ad_id,'p'=>$p)),1);
            }else{
                $this -> error('修改失败',U('upd',array('ad_id'=>$ad_id)),1);
            }
        }else{
            $category = M('category')->where("is_show = 1 AND pid = 0")->order("sort,cat_id")->select();
            $this->assign('category',$category);
            $info = $ad->find($ad_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }


    //批量展示
    function zhanshi(){
        $news = M('Slide');
        if(IS_GET){
            $ad_id = $_GET['ad_id'];
            if($news->where("ad_id = {$ad_id}")->setField('is_show','0')){
                $this->success('已成功展示一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['ad_id']);
            $map['ad_id'] = array('in',$str_ids);
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
        $news = M('Slide');
        if(IS_GET){
            $ad_id = $_GET['ad_id'];
            if($news->where("ad_id = {$ad_id}")->setField('is_show','1')){
                $this->success('已成功隐藏一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['ad_id']);
            $map['ad_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->setField('is_show','1');
                $this->success('批量隐藏成功',U('showlist'),1);
            }
        }
    }

    //批量删除
    function del(){

        $news = M('Slide');
        if(IS_GET){
            $ad_id = $_GET['ad_id'];
            if($news->where("ad_id = {$ad_id}")->delete()){
                $this->success('已删除一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['ad_id']);
            $map['ad_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->delete();
                $this->success('批量删除成功',U('showlist'),1);
            }
        }
    }

}