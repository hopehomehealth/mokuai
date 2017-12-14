<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class TeamAssessController extends HomeController
{
       //列表
    function showlist(){
        $assess = D('TeamAssess');
        $assessinfo = $assess->select();
        $this->assign('assessinfo', $assessinfo); // 赋值数据集

        $nurse = D('TeamNurse');
        $nurseinfo = $nurse->select();
        $this->assign('nurseinfo',$nurseinfo);

        $health = D('TeamHealth');
        $healthinfo = $health->select();
        $this->assign('healthinfo',$healthinfo);

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        
        $this->display();
    }
}