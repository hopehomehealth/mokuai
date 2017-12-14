<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class TeamManageController extends HomeController
{
       //列表
    function showlist(){
        $manage = D('TeamManage');
        $count  = $manage->count();

        $p = getpage($count,6);
        $manageinfo = $manage->order('team_id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('manageinfo', $manageinfo); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }
}