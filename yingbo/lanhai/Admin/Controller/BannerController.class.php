<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class BannerController extends AdminController
{
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['banner_title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Banner') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Banner')
            ->alias('b')
            ->join('__LANMU__ l on b.lan_id=l.lan_id')
            ->field('b.*,l.lan_title')
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
            $banner = new \Model\BannerModel();
            $shuju = $banner->create();
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();

            if($_POST['ext_lan'][0] == 0){
                $shuju['lan_id'] = $_POST['lan_id'];
            } else{
                $shuju['lan_id']=$_POST['ext_lan'][0];
            }

            $cfg = array(
                'rootPath'    =>  './Public/Upl/banner/', //保存根路径
            );
            $up = new \Think\Upload($cfg);$im = new \Think\Image();
            $z = $up -> uploadOne($_FILES['pic']);

            $picname = $up->rootPath.$z['savepath'].$z['savename'];

            $im -> open($picname);//打开原图
            $im -> thumb(900,300,\Think\Image::IMAGE_THUMB_CENTER); //大图 缩略图
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
            /****获得“第一级栏目信息”并传递给模板****/
            $laninfoA = D('Lanmu')
                ->where(array('level'=>0))
				->where("is_show='0'")
                ->select();
            $this -> assign('laninfoA',$laninfoA);
            /****获得“第一级栏目信息”并传递给模板****/

            $this->display();
        }
    }


    function upd(){
        $banner_id = I('get.banner_id');
        $banner = new \Model\BannerModel();
        $p = I('get.p');
        if(IS_POST){
            $shuju = $banner -> create();
            $shuju['upd_time'] = time();

            if($_POST['ext_lan'][0] == 0){
                $shuju['lan_id'] = $_POST['lan_id'];
            } else{
                $shuju['lan_id']=$_POST['ext_lan'][0];
            }
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['banner_id'])) {
                    $oldinfo = D('Banner')->find($shuju['banner_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                    if(!empty($oldinfo['pic_big'])){
                        unlink($oldinfo['pic_big']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upl/banner/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);
$im = new \Think\Image();
                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];

                $im -> open($picname);//打开原图
            $im -> thumb(900,300,\Think\Image::IMAGE_THUMB_CENTER); //大图 缩略图
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
            $son_lan_id = $info['lan_id'];
            $laninfo1 = D('Lanmu')
                ->where(array('level'=>0))
                ->find($son_lan_id);

            $now_pid = $laninfo1['pid'];
            if($now_pid == 0){
                $info['now_pid']=$son_lan_id;
            } else{
                $info['now_pid']=$now_pid;
            }
            //dump($info);die;
            /****获得“第一级栏目信息”并传递给模板****/
            $laninfoA = D('Lanmu')
                ->where(array('level'=>0))
				->where("is_show='0'")
                ->select();
            $this -> assign('laninfoA',$laninfoA);
            /****获得“第一级栏目信息”并传递给模板****/
            /****获得文章的所有扩展栏目信息****/
            $ext = D('BannerLanmu')
                ->where(array('banner_id'=>$banner_id))
                ->field('group_concat(lan_id) as extids')
                ->find();
            $extlanids = $ext['extids'];
            //dump($extlanids);die;
            $this -> assign('extlanids',$extlanids);

            /****获得文章的所有扩展栏目信息****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function typelist(){

        $lan_id=I('get.lan_id');
        //dump($lan_id);die;
        if($_POST){
            $lan_id = $_POST['lan_id'];
            $search1 = $_POST;
            $map['banner_title'] = array('LIKE',"%{$search1['search1']}%");
        }else{
            $map = "";
        }
        $map['b.lan_id']  =$lan_id;
        $count = D('Banner') ->alias('b')->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Banner')
            ->alias('b')
            ->join("__LANMU__ l on b.lan_id=l.lan_id")
            ->field('b.*,l.lan_title')
            ->order('banner_id desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
  // dump($info);die;
        $page = $p->show();
                $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    //批量展示
    function zhanshi(){
        $banner = M('Banner');
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
        $banner = M('Banner');
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

        $banner = M('Banner');
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