<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class RoleController extends AdminController
{
    function showlist()
    {
        $n = D('Role');
        $count = $n -> count();
        $p = new \Think\Page($count,10);
        $info = $n
            ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);

        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $role = D('Role');
            if($_POST['auth_id1'] != 0){
                $_POST['auth_id'] =   $_POST['auth_id1'] ;
            }
        
            $info = $role->create();
            if($role->add($info)){
                $this->success('添加成功','showlist');
            }else{
                $this->error('添加失败','tianjia');
            }
        }else {
            $this->display();
        }
    }

    function upd(){
        $role_id = I('get.role_id');
        $role = D('Role');
        if(IS_POST){
            $data = $role -> create();
            if($role -> save($data)){
                $this->success('修改成功','showlist');
            }else{
                $this->error('修改失败','upd');
            }
        }else{
            $authinfoA = D('Auth')
                ->where(array('level'=>0))
                ->select();
            $this -> assign('authinfoA',$authinfoA);

            $info = $role ->find($role_id);
            $this->assign('info',$info);
            $this->display();
        }
    }

    //分配权限
    function distribute(){
        $role_id = I('get.role_id');
        $role = new \Model\RoleModel();
        if(IS_POST){
            $shuju = $role -> create();
            $shuju['role_auth_ids'] = implode(',',$_POST['authid']);
            if($role->save($shuju)){
                $this -> success('分配权限成功',U('showlist'),1);
            }else{
                $this -> error('分配权限失败',U('distribute',array('role_id'=>$role_id)),1);
            }
        }else{
            //获得被分配权限的角色信息
            $roleinfo = D('Role')->find($role_id);
            $this -> assign('roleinfo',$roleinfo);
            /****获得被分配的权限信息(顶级/次级)****/
            $auth_infoA = D('Auth')
                ->where(array('auth_level'=>0))
                ->select();
            $auth_infoB = D('Auth')
                ->where(array('auth_level'=>1))
                ->select();
            $this -> assign('auth_infoA',$auth_infoA);
            $this -> assign('auth_infoB',$auth_infoB);
            /****获得被分配的权限信息(顶级/次级)****/
            $this -> display();
        }
    }
}