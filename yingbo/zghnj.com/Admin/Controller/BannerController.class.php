<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 17:10
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class BannerController extends AdminController
{
    //列表
    function showlist(){

        if($_GET){
            $search = $_GET;
            $map['title'] = array('LIKE',"%{$search['search']}%");
            $map['seller_id'] = 0;
            $map['is_area'] = '0';
        }else{
            $map['is_area'] = '0';
            $map['seller_id'] = 0;
            $map = '';
        }
        $count = D('Banner')
            ->where($map)
            ->count();
        $p = new \Think\Page($count,15);
        $info = D('Banner')
            ->limit($p->firstRow.','.$p->listRows)
            ->where($map)
            ->order('sort desc')
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $p = I('get.p');
        $this->assign('p',$p);
        $this -> display();
    }


    //添加
    function tianjia(){
        if(IS_POST){
            $ad = D('Banner');

            $info = $ad->create();
            $info['add_time'] = time();
            $info['upd_time'] = time();
            $info['is_area'] = '0';
            $cfg = array(
                'rootPath'    =>  './Public/Upd/banner/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            //把上传的图片"路径名"保存到数据库中
            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['pic'] = $picname;


            if($ad->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $this->display();
        }
    }

    //修改
    function upd(){
        $ad_id = I('get.ad_id');
        $p = I('get.p');
        $ad = D('Banner');
        if(IS_POST){
            $shuju = $ad -> create();
            $shuju['upd_time'] = time();
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['ad_id'])) {
                    $oldinfo = D('Banner')->find($shuju['ad_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upd/banner/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }


            if($ad->save($shuju)){
                $this -> success('修改成功',U('showlist',array('ad_id'=>$ad_id,'p'=>$p)),1);
            }else{
                $this -> error('修改失败',U('upd',array('ad_id'=>$ad_id)),1);
            }
        }else{
            $info = $ad->find($ad_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }


    //批量展示
    function zhanshi(){
        $news = M('Banner');
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
        $news = M('Banner');
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

        $news = M('Banner');
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