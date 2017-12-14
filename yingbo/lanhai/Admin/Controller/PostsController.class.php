<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class PostsController extends AdminController
{
    //帖子列表
    function showlist(){
        $boards_model = M('boards');
        $boards = $boards_model
                ->field("board_id,board_title,board_desc,pid,concat(path,'/',sort) as newpath")
                ->order("newpath")
                ->select();
        foreach($boards as $key=>$value){
            $count = substr_count($value['newpath'],'/') - 1;
            $boards[$key]['board_title'] = str_repeat('--',$count).$value['board_title'];
        }
        $this->assign("boards",$boards);
        if($_GET['board_id']){
           $map['board_id'] = $_GET['board_id'];
           $map1['p.board_id'] = $_GET['board_id'];
        }
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $map['recycle'] = '0';
        $map1['recycle'] = '0';
    	$posts_model = M('posts');
        $count = $posts_model -> where($map) -> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $posts = $posts_model
               ->alias('p')
               ->field("p.*,u.username,b.board_title")
               ->join("cq_boards as b on b.board_id = p.board_id")
               ->join("cq_user as u on u.user_id = p.user_id")
               ->where($map1)
               ->order("p.sort desc,p.ctime desc")
               ->limit($p->firstRow.','.$p->listRows)
               ->select();
        $page = $p->show();
        //dump($posts);echo $page;exit;
        $this->assign('page',$page);
        $this->assign('posts',$posts);
        $this->display();
    }
    //放入回收站
    function dorecycle(){
        $posts_model = M('posts');
        if(IS_GET){
            $post_id = $_GET['post_id'];
            $posts_model->where("post_id = {$post_id}")->setField('recycle','1');
            $this->ajaxReturn(array(
                        'error'=>0,
                    ));
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['post_id']);
            $map['post_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $posts_model -> where($map) ->setField('recycle','1');
                $this->success('批量操作成功');
            }
        }
    }
    //从回收站恢复帖子
    function recovery(){
        $posts_model = M('posts');
        if(IS_GET){
            $post_id = $_GET['post_id'];
            if($posts_model->where("post_id = {$post_id}")->setField('recycle','0')){
                $this->success('已成功还原一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['post_id']);
            $map['post_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $posts_model -> where($map) ->setField('recycle','0');
                $this->success('批量操作成功');
            }
        }
    }
    //置顶加精新帖以及取消操作
    function sort(){
        $posts_model = M('posts');
        if(IS_GET){
            if($_GET['sort'] == $_GET['sorttype']){
                $posts_model->where("post_id = {$_GET['post_id']}")->setField("sort",0);
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>1
                    ));
            }else{
                $posts_model->where("post_id = {$_GET['post_id']}")->setField("sort",$_GET['sorttype']);
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>2
                    ));
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['post_id']);
            $map['post_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $posts_model -> where($map) ->setField('sort',$_POST['sorttype']);
                $this->success('批量操作成功');
            }
        }
    }
    //回收站帖子列表
    function recycle(){
        $boards_model = M('boards');
        $boards = $boards_model
                ->field("board_id,board_title,board_desc,pid,concat(path,'/',sort) as newpath")
                ->order("newpath")
                ->select();
        foreach($boards as $key=>$value){
            $count = substr_count($value['newpath'],'/') - 1;
            $boards[$key]['board_title'] = str_repeat('--',$count).$value['board_title'];
        }
        $this->assign("boards",$boards);
        if($_GET['board_id']){
           $map['board_id'] = $_GET['board_id'];
           $map1['p.board_id'] = $_GET['board_id'];
        }
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $map['recycle'] = '1';
        $map1['recycle'] = '1';
        $posts_model = M('posts');
        $count = $posts_model -> where($map) -> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $posts = $posts_model
               ->alias('p')
               ->field("p.*,u.username,b.board_title")
               ->join("cq_boards as b on b.board_id = p.board_id")
               ->join("cq_user as u on u.user_id = p.user_id")
               ->where($map1)
               ->order("p.sort desc,p.ctime desc")
               ->limit($p->firstRow.','.$p->listRows)
               ->select();
        $page = $p->show();
        //dump($posts);echo $page;exit;
        $this->assign('page',$page);
        $this->assign('posts',$posts);
        $this->display();
    }
    //彻底删除帖子
    function del(){
        $posts_model = M('posts');
        if(IS_GET){
            $post_id = $_GET['post_id'];
			$postinfo = M('posts')->find($post_id);
            if($posts_model->where("post_id = {$post_id}")->delete()){
				M('boards')->where("board_id = {$postinfo['board_id']}")->setDec('posts',1);
				M('user')->where("user_id = {$postinfo['user_id']}")->setDec('posts',1);
                $this->success('已永久删除一条数据');
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['post_id']);
            //$map['post_id'] = array('in',$str_ids);
			//dump($_POST);exit;
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
				foreach($_POST['post_id'] as $key=>$value){
					$postinfo = $posts_model->find($value);
					if($posts_model->where("post_id = {$value}")->delete()){
						M('boards')->where("board_id = {$postinfo['board_id']}")->setDec('posts',1);
						M('user')->where("user_id = {$postinfo['user_id']}")->setDec('posts',1);
					}
				}

                $this->success('批量操作成功');
            }
        }
    }
}