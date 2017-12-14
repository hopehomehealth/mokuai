<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class CommentController extends AdminController
{
    //商品列表
    function index()
    {
        $comment = D('user_comment');
        $count =  $comment->group("muserid")-> count();
        $p = new \Think\Page($count['count'],10);
        $commentList = D()->field('b.shenfen,b.user,b.iphone,count(a.id) as num,avg(a.star) as star,a.muserid')->table("lh_user_comment as a,lh_user as b")->where("a.muserid = b.userid")->group("a.muserid")->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $first = $_GET['p']?$_GET['p']:"1";
        //dump($commentList);exit;
        $this -> assign('page',$page);
        $this -> assign('firstno',($first-1)*10+1);
        $this -> assign('commentList',$commentList);
        $this->display();
    }
    function info(){
        $muserid = $_GET['muserid'];
        $count =  D('user_comment')->where("muserid = {$muserid}")-> count();
        $p = new \Think\Page($count,10);
        $comment = D()->field('a.user,b.star,b.id,b.inputtime,b.comment,b.status')->table("lh_user as a,lh_user_comment as b")->where("muserid = {$muserid} AND a.userid = b.userid")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $first = $_GET['p']?$_GET['p']:"1";
        $this -> assign('page',$page);
        $this ->assign('comment',$comment);
        $this -> assign('firstno',($first-1)*1+1);
        $this ->display();
    }
    /*function del(){
        $comment = D('user_comment');
        $commentList = $comment ->select();
        dump($commentList);exit;
    }*/
    function upd(){
        $comment = D('user_comment');
        $data['status'] = $_GET['status'];
        $comment->where("id = {$_GET['id']}")->save($data);
        $this ->redirect("Comment/info",array('muserid'=>$_GET['muserid']));
    }
}