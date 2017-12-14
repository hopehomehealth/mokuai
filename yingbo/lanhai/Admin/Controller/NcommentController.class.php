<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class NcommentController extends AdminController
{
    //文章列表
//    function showlist(){
//        if($_POST){
//            $search = $_POST;
//            $map['news_title'] = array('LIKE',"%{$search['search']}%");
//        }else{
//            $map = '';
//        }
//        $art_model = M('article');
//        $count = $art_model ->where($map)-> count();
//        $p = new \Think\Page($count,10);
//        $articles =  $art_model
//            ->alias('a')
//            ->join('cq_user as u on u.user_id=a.user_id')
//            ->join('cq_bgtype as t on t.type_id = a.type_id')
//            ->field('a.*,u.username,t.type_name')
//            ->order('a.is_hot desc,a.add_time desc')
//            ->where($map)
//            ->limit($p->firstRow.','.$p->listRows)
//            ->select();
////    dump($info);die;
//        $page = $p->show();
//        $this -> assign('page',$page);
//        $this -> assign('articles',$articles);
//        $this->display();
//    }
    //评论列表
    function comment(){
        $news_id = I('get.news_id');

        $commentinfo =D('Ncomment')
            ->alias('c')
            ->join('__NEWS__ n on c.news_id=n.news_id')
            ->field('c.*,n.news_title,n.news_id')
                 ->where("c.news_id={$news_id}")
                 ->select();
//            dump($commentinfo);die;
        $this->assign('commentinfo',$commentinfo);
        $this->display();
    }

    //显示隐藏
    function isdisplay(){
        if(IS_POST){
	$news_id = $_POST['news_id'];
            if($_POST['display'] == 1){
                $value = 0;
	            if(M('Ncomment')->where("com_id = {$_POST['com_id']}")->setField('display',$value)){
		    M('News')->where("news_id=$news_id")->setDec('talk');
	$list = M('News')->field("talk")->where("news_id=$news_id")->find();
				if($list['talk'] < 0){
					M('News')->where("news_id=$news_id")->setField("$talk",0);
				}
                echo 'success';
            }else{
                echo 'fail';
            }
            }elseif($_POST['display'] == 0){
                $value = 1;
	            if(M('Ncomment')->where("com_id = {$_POST['com_id']}")->setField('display',$value)){
		     M('News')->where("news_id=$news_id")->setInc('talk');
                echo 'success';
            }else{
                echo 'fail';
            }	
            }

        }
    }
    //删除回复
    function del(){
        $com_id = $_GET['com_id'];
	$news_id = $_GET['news_id'];
        if(M('Ncomment')->where("com_id = {$com_id}")->delete()){
	M('News')->where("news_id=$news_id")->setDec('talk');
	$list = M('News')->field("talk")->where("news_id=$news_id")->find();
				if($list['talk'] < 0){
					M('News')->where("news_id=$news_id")->setField("$talk",0);
				}
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

}