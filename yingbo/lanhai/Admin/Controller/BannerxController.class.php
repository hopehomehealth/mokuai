<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class BannerxController extends AdminController
{
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['banner_title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Bannerx') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Bannerx')
            ->order('banner_id desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
//    dump($info);die;
        $page = $p->show();
        $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $banner = D('Bannerx');
            $shuju = $banner->create();
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();

            $cfg = array(
                'rootPath'    =>  './Public/Upl/banner/', //保存根路径
            );
            $up = new \Think\Upload($cfg);$im = new \Think\Image();
            $z = $up -> uploadOne($_FILES['pic']);

            $picname = $up->rootPath.$z['savepath'].$z['savename'];
			$im -> open($picname);//打开原图
            $im -> thumb(375,108,\Think\Image::IMAGE_THUMB_CENTER); //大图 缩略图
            $bigname = $up->rootPath.$z['savepath'].'b_'.$z['savename'];
            $im -> save($bigname);
            $shuju['pic_big'] = $bigname;
            $shuju['pic'] = $picname;

//            dump($shuju);die;

            if(empty($_POST['banner_title'])){
                $this->error('文章标题不能为空');
                exit;
            }

            if($banner->add($shuju)){
                $this->success('发布成功','showlist');
            }else{

                $this->error('发布失败','tianjia');
            }
        }else{

            $this->display();
        }
    }


    function upd(){
        $banner_id = I('get.banner_id');
        $banner = D('Bannerx');
        $p = I('get.p');
        if(IS_POST){
            $shuju = $banner -> create();
            $shuju['upd_time'] = time();


            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['banner_id'])) {
                    $oldinfo = D('Bannerx')->find($shuju['banner_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upl/banner/', //保存根路径
                );
                $up = new \Think\Upload($cfg);$im = new \Think\Image();
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
				$im -> open($picname);//打开原图
            $im -> thumb(375,108,\Think\Image::IMAGE_THUMB_CENTER); //大图 缩略图
            $bigname = $up->rootPath.$z['savepath'].'b_'.$z['savename'];
            $im -> save($bigname);
            $shuju['pic_big'] = $bigname;
            $shuju['pic'] = $picname;

            }
            //dump($shuju);die;
            if($banner->save($shuju)){
                $this -> success('修改成功',U('showlist',array('banner_id'=>$banner_id,'p'=>$p)),1);
            }else{
                $this -> error('修改失败',U('upd',array('banner_id'=>$banner_id,'p'=>$p)),1);
            }
        }else{
            $info = $banner->find($banner_id);

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function dinglist(){
        $count = D('Bannerx') -> count();
        $p = new \Think\Page($count,10);
        $info =  D('Bannerx')
            ->order('banner_id desc')
            ->where("is_area='0'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
                $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    function youyilist(){
        $count = D('Bannerx') -> count();
        $p = new \Think\Page($count,10);
        $info =  D('Bannerx')
            ->order('banner_id desc')
            ->where("is_area='1'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
                $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    function youerlist(){
        $count = D('Bannerx') -> count();
        $p = new \Think\Page($count,10);
        $info =  D('Bannerx')
            ->order('banner_id desc')
            ->where("is_area='2'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
                $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    function yousanlist(){
        $count = D('Bannerx') -> count();
        $p = new \Think\Page($count,10);
        $info =  D('Bannerx')
            ->order('banner_id desc')
            ->where("is_area='3'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
                $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    //批量展示
    function zhanshi(){
        $banner = M('Bannerx');
        if(IS_GET){
            $banner_id = $_GET['banner_id'];
            if($banner->where("banner_id = {$banner_id}")->setField('is_show','0')){
                $this->success('已成功展示一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['banner_id']);
            $map['banner_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $banner -> where($map) ->setField('is_show','0');
                $this->success('批量操作成功');
            }
        }
    }

    //批量隐藏
    function yincang(){
        $banner = M('Bannerx');
        if(IS_GET){
            $banner_id = $_GET['banner_id'];
            if($banner->where("banner_id = {$banner_id}")->setField('is_show','1')){
                $this->success('已成功隐藏一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['banner_id']);
            $map['banner_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $banner -> where($map) ->setField('is_show','1');
                $this->success('批量隐藏成功');
            }
        }
    }


    function del(){

        $banner = M('Bannerx');
        if(IS_GET){
            $banner_id = $_GET['banner_id'];
            if($banner->where("banner_id = {$banner_id}")->delete()){
                $this->success('已删除一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['banner_id']);
            $map['banner_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $banner -> where($map) ->delete();
                $this->success('批量删除成功');
            }
        }
    }

}