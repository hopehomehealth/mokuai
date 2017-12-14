<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class NewsController extends HomeController
{

    function news()
    {

        if($_POST){
            $username = $_POST;
            $map['title'] = array('LIKE',"%{$username['username']}%");
        }else{
            $map = '';
        }


        $news = D('News');
        $count  = $news->where($map)->count();

        $p = getpage($count,2);
        $newsinfo = $news->order('news_id desc')->where($map)->limit($p->firstRow, $p->listRows)->select();
        $this->assign('newsinfo', $newsinfo); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }

    function news_list(){
        $news_id= I('get.news_id');
        $news = D('News');
         $info=$news->where(array('news_id'=>$news_id))->find();
        $this->assign('info',$info);

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        //上一篇
        $preid = $news_id - 1;
        $preshow = $news->order('news_id desc')->where('news_id='.$preid)->find();
        if (!$preshow){
            $firstid =  $news->order('news_id desc')->limit(0,1)->select();
            $preshow['news_id']=$firstid[0]['news_id'];
            $preshow['title'] = '第一篇';
        }
        $this->assign('preshow',$preshow);

        //下一篇
        $nextid = $news_id + 1;
        $nextshow = $news->order('news_id desc')->where('news_id='.$nextid)->find();
        if (!$nextshow){
            $lastid = $news->order('news_id')->limit(0,1)->select();
            $nextshow['news_id']= $lastid[0]['news_id'];
        $nextshow['title'] = '最后一篇';
        }
        $this->assign('nextshow',$nextshow);

        $this->display();
    }
}
