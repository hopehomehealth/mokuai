<?php
namespace Admin\Controller;
use Tools\AdminController;


//后台控制器
class RoleController extends AdminController {
    //角色列表展示
    function showlist(){
        //为"导航"设置文字信息
        $daohang = array(
            'title1' => '角色管理',
            'title2' => '角色列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);

        //获得角色列表信息
        $info = D('Role')->select();
        $this -> assign('info',$info);

        $this -> display();
    }

    //根据$auth_ids的字符串获得对应权限的"控制器-操作方法"字符串
    private function saveAuthAC($auth_ids){
        //根据$auth_ids获得权限信息
        //select() 全部数据
        //select(数字) 单个记录信息(id=数字)
        //select("数字,数字,数字。。")多个记录信息(id in 数字,数字,数字。。)
        $authinfo = D('Auth')->select($auth_ids);
        $s = "";
        foreach($authinfo as $k => $v){
            if(!empty($v['auth_c']) && !empty($v['auth_a']))
            $s .= $v['auth_c'].'-'.$v['auth_a'].",";
        }
        $s = rtrim($s,',');
        return $s;
    }

    //给角色分配权限
    function distribute(){
        //为"导航"设置文字信息
        $daohang = array(
            'title1' => '角色管理',
            'title2' => '分配权限',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);

        $role_id = I('get.role_id'); //获得被分配权限的角色id信息
        $role = D('Role');
        if(IS_POST){
            //dump($_POST);
            //维护角色信息:role_auth_ids可以直接维护
            //            但是role_auth_ac需要做二次查询制作
            //            通过以下saveAuth实现ac的二期制作
            $role_id = I('post.role_id');
            $auth_ids = implode(',',$_POST['auth_id']); //Array-->String
            $auth_ac = $this -> saveAuthAC($auth_ids);

            $arr = array(
                'role_id' => $role_id,
                'role_auth_ids' => $auth_ids,
                'role_auth_ac' => $auth_ac,
            );
            if($role->save($arr)){
               $this -> success('分配权限成功',U('showlist'),1);
            }else{
                $this -> error('分配权限失败',U('distribute',array('role_id'=>$role_id)),1);
            }

        }else{
            //根据$role_id获得被分配权限的角色信息
            $roleinfo = D('Role')->find($role_id);
            $this -> assign('roleinfo',$roleinfo);

            //获得全部的权限信息并给模板展示
            $authinfoA = D('Auth')->where(array('auth_level'=>0))->select();
            $authinfoB = D('Auth')->where(array('auth_level'=>1))->select();
            $this -> assign('authinfoA',$authinfoA);
            $this -> assign('authinfoB',$authinfoB);

            $this -> display();
        }
    }
}

