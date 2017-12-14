<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class NewsController extends ComController {
    function showlist(){
        $daohang = array(
            'second'=>'新闻资讯',
        );
        $this->assign('daohang',$daohang);

        $bannerinfo = D('Banner')
            ->where("is_area='1'")
            ->select();
        $this->assign('bannerinfo',$bannerinfo);

        $newsinfo = D('News')
            ->alias('n')
            ->join('__NEWSTYPE__ t on n.type_id=t.type_id')
            ->field('n.*,t.type_name')
            ->where("is_show='0'")
            ->order('news_id desc')
            ->select();
        $this->assign('newsinfo',$newsinfo);
        $this ->display();
    }

    function detail(){
        $daohang = array(
            'second'=>'新闻详情',
        );
        $this->assign('daohang',$daohang);
        $news_id= I('get.news_id');
        $info = D('News')
            ->alias('n')
            ->join('__NEWSTYPE__ t on n.type_id=t.type_id')
            ->field('n.*,t.type_name')
            ->where(array('news_id'=>$news_id))
            ->where("is_show='0'")
            ->find();
        $this->assign('info',$info);
        $this->display();
    }

    function type(){

        $type_id=I('get.type_id');
        $typeinfo = D('News')
            ->alias('n')
            ->join('__NEWSTYPE__ t on n.type_id=t.type_id')
            ->field('n.*,t.type_name')
            ->where(array('n.type_id'=>$type_id))
            ->where("is_show='0'")
            ->order('news_id desc')
            ->select();
//        dump($typeinfo);die;
        $this->assign('typeinfo',$typeinfo);
        $this->display();
    }
}