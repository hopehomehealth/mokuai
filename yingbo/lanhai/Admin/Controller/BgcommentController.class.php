<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class BgcommentController extends AdminController
{
    //文章列表
    function showlist(){
        if($_GET['search']){
            $map['title'] = array('LIKE',"%{$_GET['search']}%");
            $map['username'] = array('LIKE',"%{$_GET['search']}%");
            $map['_logic'] = 'OR';
        }else{
            $map = '';
        }
        //dump($map);
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $art_model = M('article');
        $count = $art_model->alias('a')->join('cq_user as u on u.user_id=a.user_id') ->where($map)-> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $articles =  $art_model
            ->alias('a')
            ->join('cq_user as u on u.user_id=a.user_id')
            ->join("left join cq_bgclass as c on c.class_id = a.class_id")
            ->field('a.*,u.username,c.class_name')
            ->order('a.is_hot desc,a.add_time desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
   
        $page = $p->show();
        $nowpage = $_GET['p']?$_GET['p']:1;
        $No1 = ($nowpage-1)*$bbsset['pg_admin']+1;
        $this->assign('No1',$No1);
        $this -> assign('page',$page);
        //dump($articles);die;
        $this -> assign('articles',$articles);
        $this->display();
    }
    //评论列表
    function comment(){
        if($_GET['search']){
            $map['username'] = array('LIKE',"%{$_GET['search']}%");
            $map1['username'] = array('LIKE',"%{$_GET['search']}%");
        }
        $map['art_id'] = $_GET['art_id'];
        $map1['c.art_id'] = $_GET['art_id'];
        $com_model = M('bgcomment');
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $count = $com_model->alias('c')->join('cq_user as u on u.user_id=c.user_id') ->where($map)-> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $comments = $com_model
                 ->alias('c')
                 ->join("left join cq_user as u on u.user_id = c.user_id")
                 ->join("left join cq_article as a on a.art_id = c.art_id")
                 ->field("c.*,u.username,u.userhead,a.title")
                 ->where($map1)
                 ->order("c.add_time desc")
                 ->limit($p->firstRow.','.$p->listRows)
                 ->select();
                 foreach($comments as $key => $value){
                    $comments[$key]['content'] = htmlspecialchars_decode($value['content']);
                 }
                 //dump($comments);exit;
        $page = $p->show();
        $nowpage = $_GET['p']?$_GET['p']:1;
        $No1 = ($nowpage-1)*$bbsset['pg_admin']+1;
        $this->assign('No1',$No1);
        $this -> assign('page',$page);
        $this->assign('comments',$comments);
        $this->display();
    }  
    
    //显示隐藏
    function isdisplay(){
        if(IS_POST){
            if($_POST['display'] == 1){
                $value = 0;
            }elseif($_POST['display'] == 0){
                $value = 1;
            }
            if(M('bgcomment')->where("com_id = {$_POST['com_id']}")->setField('display',$value)){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }
    //删除回复
    function del(){
        $com_id = $_GET['com_id'];
        if(M('bgcomment')->where("com_id = {$com_id}")->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

}