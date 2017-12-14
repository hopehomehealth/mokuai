<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class MedicalController extends FooterController
{
    function medical()
    {
        $daohang = array(
            'first'=>'医学知识',
        );
        $this -> assign('daohang',$daohang);

        $adinfo = D('Ad')->where('col_id=22')->limit(0,1)->select();
        $this->assign('adinfo', $adinfo);
        $this->display();
    }

    function huli(){
        $daohang = array(
            'first'=>'护理健康知识',
        );
        $this -> assign('daohang',$daohang);

        $huliinfo = D('Medical')
//            ->where('col_id=30')
                ->order('medical_id desc')
            ->limit(0,6)->select();

        $this->assign('huliinfo',$huliinfo);
        $this->display();
    }

//    function yiliao(){
//        $daohang = array(
//            'first'=>'相关医疗信息和政策',
//        );
//        $this -> assign('daohang',$daohang);
//
//        $yiliaoinfo = D('Medical')->where('col_id=31')->limit(0,6)->select();
//        $this->assign('yiliaoinfo',$yiliaoinfo);
//        $this->display();
//    }

    function medical_list(){
        $daohang = array(
            'first'=>'医学知识',
        );
        $this -> assign('daohang',$daohang);

        $medical_id= I('get.medical_id');
        $medical = D('Medical');
        $info=$medical->where(array('medical_id'=>$medical_id))->find();
        $this->assign('info',$info);
        $this->display();
    }
}
