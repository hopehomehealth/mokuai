<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Home\Controller;
use Common\Common\ComController;

class LinkController extends ComController
{
    function linklist(){
    $title = "友情链接_蓝海长青";
$this->assign('title',$title);
        $adinfo=D('Banner')->where("lan_id = 40")->order('sort')->limit('0,1')->select();
        $this->assign('adinfo',$adinfo);

        $linkinfo1 = D('Link')->where("cat_id = 1")->order('sort')->select();
        $this->assign('linkinfo1',$linkinfo1);

        $linkinfo2 = D('Link')->where("cat_id = 2")->order('sort')->select();
        $this->assign('linkinfo2',$linkinfo2);

        $linkinfo3 = D('Link')->where("cat_id = 3")->order('sort')->select();
        $this->assign('linkinfo3',$linkinfo3);

        $linkinfo4 = D('Link')->where("cat_id = 4")->order('sort')->select();
        $this->assign('linkinfo4',$linkinfo4);

        $this->display();
    }



}