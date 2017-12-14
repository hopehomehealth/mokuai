<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class TrainController extends HomeController
{
       //列表
    function showlist(){
        $train = D('Train');
        $count  = $train->count();

        $p = getpage($count,6);
        $info = $train->order('train_id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('info', $info); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }

    function train_list(){
        $train_id= I('get.train_id');
        $train = D('Train');
        $traininfo=$train->where(array('train_id'=>$train_id))->find();
        $this->assign('traininfo',$traininfo);
        //上一篇
        $preid = $train_id - 1;
        $preshow = $train->order('train_id desc')->where('train_id='.$preid)->find();
        if (!$preshow){
            $firstid =  $train->order('train_id desc')->limit(0,1)->select();
            $preshow['train_id']=$firstid[0]['train_id'];
            $preshow['china'] = '第一篇';
        }
        $this->assign('preshow',$preshow);

        //下一篇
        $nextid = $train_id + 1;
        $nextshow = $train->order('train_id desc')->where('train_id='.$nextid)->find();
        if (!$nextshow){
            $lastid = $train->order('train_id')->limit(0,1)->select();
            $nextshow['train_id']= $lastid[0]['train_id'];
            $nextshow['china'] = '最后一篇';
        }
        $this->assign('nextshow',$nextshow);
//        dump($traininfo);die;

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }
}