<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class LinkController extends AdminController
{
    function showlist(){
        if($_POST){
			if(!empty($_POST['search'])){
				$search = $_POST;
				$map['link_name'] = array('LIKE',"%{$search['search']}%");
			}else{
				$map = '';
			}

        }else{
            $map = '';
        }
		$lcats = M('lcat')->select();
		if($lcats){
			$map['k.cat_id'] = $lcats[0]['cat_id'];
			$this->assign('lcats',$lcats);
		}
		if($_POST['cat_id']){
			$map['k.cat_id'] = $_POST['cat_id'];
		}
		$this->assign('catid',$map['k.cat_id']);
        $count = D('Link')->alias('k')->join('__LCAT__ l on k.cat_id=l.cat_id') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Link')
            ->alias('k')
            ->join('__LCAT__ l on k.cat_id=l.cat_id')
            ->field('k.*,l.cat_name')
            ->order('sort')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
//   dump($info);die;
        $page = $p->show();
        $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $link = D('Link');
            $shuju = $link->create();
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();
            $cfg = array(
                'rootPath'    =>  './Public/Upl/link/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $shuju['pic'] = $picname;
//            dump($shuju);die;

            if(empty($_POST['link_name'])){
                $this->error('名称不能为空');
                exit;
            }

            if($link->add($shuju)){
                $this->success('添加成功','showlist');
            }else{

                $this->error('添加失败','tianjia');
            }
        }else{
            /****友情类别****/
            $catinfo = D('Lcat')
                ->select();
            $this -> assign('catinfo',$catinfo);
            /****友情类别****/

            $this->display();
        }
    }


    function upd(){
        $link_id = I('get.link_id');
        $link = D('Link');
        $p = I('get.p');
        if(IS_POST){
            $shuju = $link -> create();
            $shuju['upd_time'] = time();
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['link_id'])) {
                    $oldinfo = D('Link')->find($shuju['link_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upl/link/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }
            //dump($shuju);die;
            if($link->save($shuju)){
                $this -> success('修改成功',U('showlist',array('link_id'=>$link_id,'p'=>$p)),1);
            }else{
                $this -> error('修改失败',U('upd',array('link_id'=>$link_id,'p'=>$p)),1);
            }
        }else{
            $info = $link->find($link_id);

            /****友情类别****/
            $catinfo = D('Lcat')
                ->select();
            $this -> assign('catinfo',$catinfo);
            /****友情类别****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function typelist(){
        $cat_id=I('get.cat_id');
        $map['b.cat_id']  =$cat_id;
        $count = D('Link') ->alias('b')->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Link')
            ->alias('b')
            ->join("__LCAT__ l on b.cat_id=l.cat_id")
            ->field('b.*,l.cat_name')
            ->order('link_id desc')
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
        $link = M('Link');
        if(IS_GET){
            $link_id = $_GET['link_id'];
            if($link->where("link_id = {$link_id}")->setField('is_show','0')){
                $this->success('已成功展示一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['link_id']);
            $map['link_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $link -> where($map) ->setField('is_show','0');
                $this->success('批量操作成功');
            }
        }
    }

    //批量隐藏
    function yincang(){
        $link = M('Link');
        if(IS_GET){
            $link_id = $_GET['link_id'];
            if($link->where("link_id = {$link_id}")->setField('is_show','1')){
                $this->success('已成功隐藏一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['link_id']);
            $map['link_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $link -> where($map) ->setField('is_show','1');
                $this->success('批量隐藏成功');
            }
        }
    }


    function del(){

        $link = M('Link');
        if(IS_GET){
            $link_id = $_GET['link_id'];
            if($link->where("link_id = {$link_id}")->delete()){
                $this->success('已删除一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['link_id']);
            $map['link_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $link -> where($map) ->delete();
                $this->success('批量删除成功');
            }
        }
    }
	function sortlink() {
		if(IS_GET){
			M('link')->where("link_id = {$_GET['link_id']}")->setField('sort',$_GET['sort']);
		}
	}
}