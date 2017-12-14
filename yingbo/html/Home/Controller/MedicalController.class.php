<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class MedicalController extends HomeController
{
       //列表
    function showlist(){
        $med = D('Medical');

        $count  = $med->count();

        $p = getpage($count,5);
        $info = $med->order('medical_id desc')
             ->where("is_show='0'")
            ->limit($p->firstRow, $p->listRows)->select();

        $this->assign('info', $info); // 赋值数据集

        $this->assign('page', $p->show()); // 赋值分页输出

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }

    function med_list(){
        $medical_id= I('get.medical_id');
        
        $medical = D('Medical');
        $medicalinfo=$medical->where(array('medical_id'=>$medical_id))->find();
        $this->assign('medicalinfo',$medicalinfo);
        //上一篇
        $preid = $medical_id - 1;
        $preshow = $medical->order('medical_id desc')->where('medical_id='.$preid)->find();
        if (!$preshow){
            $firstid =  $medical->order('medical_id desc')->limit(0,1)->select();
            $preshow['medical_id']=$firstid[0]['medical_id'];
            $preshow['title'] = '第一篇';
        }
        $this->assign('preshow',$preshow);

        //下一篇
        $nextid = $medical_id + 1;
        $nextshow = $medical->order('medical_id desc')->where('medical_id='.$nextid)->find();
        if (!$nextshow){
            $lastid = $medical->order('medical_id')->limit(0,1)->select();
            $nextshow['medical_id']= $lastid[0]['medical_id'];
            $nextshow['title'] = '最后一篇';
        }
        $this->assign('nextshow',$nextshow);
//        dump($medicalinfo);die;
        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }
}