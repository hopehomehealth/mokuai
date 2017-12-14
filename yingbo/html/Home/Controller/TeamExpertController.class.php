<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class TeamExpertController extends HomeController
{
       //列表
    function showlist(){
        $expert = D('TeamExpert');
        $count  = $expert->count();

        $p = getpage($count,6);
        $expertinfo = $expert->order('team_id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('expertinfo', $expertinfo); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        
        $this->display();
    }
}