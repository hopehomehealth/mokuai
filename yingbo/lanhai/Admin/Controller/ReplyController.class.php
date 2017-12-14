<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class ReplyController extends AdminController
{
    //帖子列表
    function showlist(){
        if($_GET['search']){
            $map['topic'] = array('like',"%{$_GET['search']}%");
            $map1['p.topic'] = array('like',"%{$_GET['search']}%");
        }
        $map['recycle'] = '0';
        $map1['recycle'] = '0';
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $posts_model = M('posts');
        $count = $posts_model -> where($map) -> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $posts = $posts_model
               ->alias('p')
               ->field("p.*,u.username,u.userhead,b.board_title")
               ->join("cq_boards as b on b.board_id = p.board_id")
               ->join("cq_user as u on u.user_id = p.user_id")
               ->where($map1)
               ->order("p.ctime desc")
               ->limit($p->firstRow.','.$p->listRows)
               ->select();
        $page = $p->show();
        $nowpage = $_GET['p']?$_GET['p']:1;
        $No1 = ($nowpage-1)*$bbsset['pg_admin']+1;
        $this->assign('No1',$No1);
        //dump($posts);echo $page;exit;
        $this->assign('page',$page);
        $this->assign('posts',$posts);
        $this->display();
    }
    //回复列表
    function reply(){
        if($_GET['search']){
            $map['username'] = array('like',"%{$_GET['search']}%");
            $map1['u.username'] = array('like',"%{$_GET['search']}%");
        }
        $map['display'] = '1';
        $map['post_id'] = $_GET['post_id'];
        $map1['display'] = '1';
        $map1['r.post_id'] = $_GET['post_id'];
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $reply_model = M('reply');
        $count = $reply_model->alias('r')->join('cq_user as u on u.user_id = r.user_id') -> where($map) -> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);    
        $reply = $reply_model
               ->alias('r')
               ->field("r.*,p.topic,u.username,u.userhead")
               ->join('cq_user as u on u.user_id = r.user_id')
               ->join('cq_posts as p on p.post_id = r.post_id')
               ->where($map1)
               ->order("r.ctime desc")
               ->limit($p->firstRow.','.$p->listRows)
               ->select();
               $page = $p->show();
        foreach($reply as $key=>$value){
            $reply[$key]['reply_body'] = htmlspecialchars_decode($value['reply_body']);
        }
        $nowpage = $_GET['p']?$_GET['p']:1;
        $No1 = ($nowpage-1)*$bbsset['pg_admin']+1;
        $this->assign('No1',$No1);
        //dump($posts);echo $page;exit;
        $this->assign('page',$page);
        $this->assign('reply',$reply);
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
            if(M('reply')->where("reply_id = {$_POST['reply_id']}")->setField('display',$value)){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }
    //删除回复
    function del(){
        $reply_id = $_GET['reply_id'];
        if(M('reply')->where("reply_id = {$reply_id}")->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}