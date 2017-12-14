<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class TrailerController extends HomeController
{
     function showlist(){
         $trailer = D('Trailer');
         $count  = $trailer->count();

         $p = getpage($count,6);
         $info = $trailer->order('trailer_id desc')->limit($p->firstRow, $p->listRows)->select();
         $this->assign('info', $info); // 赋值数据集
         $this->assign('page', $p->show()); // 赋值分页输出

         $adinfofen=D('Ad')->where("col_id=29")->select();
         $this->assign('adinfofen',$adinfofen);
         $this->display();
     }

    function trailer_list(){
        $trailer_id= I('get.trailer_id');
        $trailer = D('Trailer');
        $info=$trailer->where(array('trailer_id'=>$trailer_id))->find();
        $this->assign('info',$info);

        //上一篇
        $preid = $trailer_id - 1;
        $preshow = $trailer->order('trailer_id desc')->where('trailer_id='.$preid)->find();
        if (!$preshow){
            $firstid =  $trailer->order('trailer_id desc')->limit(0,1)->select();
            $preshow['trailer_id']=$firstid[0]['trailer_id'];
            $preshow['title'] = '第一篇';
        }
        $this->assign('preshow',$preshow);

        //下一篇
        $nextid = $trailer_id + 1;
        $nextshow = $trailer->order('trailer_id desc')->where('trailer_id='.$nextid)->find();
        if (!$nextshow){
            $lastid = $trailer->order('trailer_id')->limit(0,1)->select();
            $nextshow['trailer_id']= $lastid[0]['trailer_id'];
            $nextshow['title'] = '最后一篇';
        }
        $this->assign('nextshow',$nextshow);

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }

}