<?php
namespace Admin\Controller;
use Tools\AdminController;

//后台控制器
class AuthController extends AdminController {

    //权限列表展示
    function showlist(){
        //为"导航"设置文字信息
        $daohang = array(
            'title1' => '权限管理',
            'title2' => '权限列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);

        //获得权限信息并给模板展示
        $info = D('Auth')->order('auth_path')->select();
        //SELECT * FROM `sp_auth` ORDER BY auth_path
        $this -> assign('info',$info);

        $this -> display();
    }

    //添加权限
    function tianjia(){
        $auth = new \Model\AuthModel();
        if(IS_POST){
            //dump($_POST);
            $shuju = $auth -> create();//收集到4个字段数据

            if($auth -> add($shuju)){
                $this -> success('添加权限成功',U('showlist'),1);
            }else{
                $this -> error('添加权限失败',U('tianjia'),1);
            }
        }else{
            //为"导航"设置文字信息
            $daohang = array(
                'title1' => '权限管理',
                'title2' => '添加权限',
                'act' => '返回',
                'act_link' => U('showlist'),
            );
            //assign给模板的变量信息，"普通模板和布局模板"都可以使用
            $this -> assign('daohang',$daohang);

            //获得供选取的上级(auth_level=0/1)并传递给模板
            $pauthinfo = D('Auth')
                ->order('auth_path')
                ->where(array('auth_level'=>array('in','0,1')))
                ->select();
            //SELECT * FROM `sp_auth` WHERE `auth_level` IN ('0','1') ORDER BY auth_path
            $this -> assign('pauthinfo',$pauthinfo);

            $this -> display();
        }

    }
}

