<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class MemberController extends AdminController
{
    function members(){
        if($_POST){
            $search = $_POST;
            $map['username'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        $model = M('member');
        $count = $model -> count();
        $p = new \Think\Page($count,10);
        $info = $model
            ->alias('m')
            ->join('__ROLE__ r on m.role_id = r.role_id')
            ->field('m.*,r.role_name')
            ->order('role_id') 
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);

        $this->assign('info',$info);
        $this->display();
    }
    function tianjia(){
        if(IS_POST){
            $model = M('member');
            $info=$model->create();
            if(empty($info['username'])){
                echo '<script>history.go(-1);alert("请输入用户名");</script>';
                exit;
            }
            if(empty($info['password'])){
                echo '<script>history.go(-1);alert("密码不能为空");</script>';
                exit;
            }
            $member = $model->where("username = '{$info[username]}'")->find();
            if($member){
                echo '<script>history.go(-1);alert("该账号已存在");</script>';
                exit;
            }
            $info['ctime'] = time();
            $info['password'] = md5($_POST['password']);
            if($model->add($info)){
                $this->success('添加成功','members',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $roleinfo = M('role')->select();
            $this->assign('roleinfo',$roleinfo);
            $this->display();
        }
    }
    function upd(){
        $uid = I('get.uid');
        $model = M('member');
        if(IS_POST){
            $shuju = $model -> create();
            if(empty($shuju['username'])){
                unset($shuju['username']);
            }
            if(empty($shuju['password'])){
                unset($shuju['password']);
            }else{
                $shuju['password'] = md5($shuju['password']);
            }
            $member = $model->find($uid);
            if(($member['username'] == 'admin') && ($shuju['username'] != 'admin')){
                echo '<script>history.go(-1);alert("管理员账号不可修改");</script>';
                exit;
            }
            if($model->where("uid = {$uid}")->save($shuju)){
                $this -> success('修改成功',U('members'),1);
            }else{
                $this -> error('修改失败',U('upd',array('uid'=>$uid)),1);
            }
        }else{
            $info = $model->find($uid);
            $roleinfo = M('role')->select();
            $this -> assign('roleinfo',$roleinfo);

            $this -> assign('info',$info);
            $this -> display();
        }
    }
    function del(){
        $uid = I('get.uid');
        $model = M('member');
        $member = $model->find($uid);
        if($member['username'] == 'admin'){
            $this->error('无法删除总账号');exit;
        }
        if($model->delete($uid)){
            $this->success('删除成功',U('members'));
        }else{
            $this->error('删除失败');
        }
    }

    //角色列表
    function roles()
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

    function add_role(){
        if(IS_POST){
            $role = D('Role');
            if($_POST['auth_id1'] != 0){
                $_POST['auth_id'] =   $_POST['auth_id1'] ;
            }

            $info = $role->create();
            if($role->add($info)){
                $this->success('添加成功','roles');
            }else{
                $this->error('添加失败','add_role');
            }
        }else {
            $this->display();
        }
    }

    function upd_role(){
        $role_id = I('get.role_id');
        $role = D('Role');
        if(IS_POST){
            $data = $role -> create();
            if($role -> save($data)){
                $this->success('修改成功','roles');
            }else{
                $this->error('修改失败','upd_role');
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
    function del_role(){
        $role_id = I('get.role_id');

        if(M('role')->delete($role_id)){
            $this->success('删除成功',U('roles'));
        }else{
            $this->error('删除失败');
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
                $this -> success('分配权限成功',U('roles'),1);
            }else{
                $this -> error('分配权限失败',U('distribute',array('role_id'=>$role_id)),1);
            }
        }else{
            //获得被分配权限的角色信息
            $roleinfo = D('Role')->find($role_id);
            $this -> assign('roleinfo',$roleinfo);
            /****获得被分配的权限信息(顶级/次级)****/
            $authinfoA = D('Auth')
                ->where(array('auth_level'=>0))
                ->select();
            $authinfoB = D('Auth')
                ->where(array('auth_level'=>1))
                ->select();
            $this -> assign('authinfoA',$authinfoA);
            $this -> assign('authinfoB',$authinfoB);
            /****获得被分配的权限信息(顶级/次级)****/
            $this -> display();
        }
    }

    //权限列表
    function auths(){
        $n = D('Auth');
        $count = $n -> count();
        $p = new \Think\Page($count,20);
        $info = $n
            -> order('auth_path') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this -> display();
    }
    //添加权限
    function add_auth(){
        $auth = new \Model\AuthModel();
        if(IS_POST){
            $shuju = $auth -> create();
            //auth_path和auth_level两个字段在瞻前顾后机制维护
            if($auth->add($shuju)){
                $this -> success('添加权限成功',U('auths'),1);
            }else{
                $this -> error('添加权限失败',U('add_auth'),1);
            }
        }else{
            //获取供选择的上级权限信息
            $authinfo = D('Auth')->order('auth_path')->select();
            $this -> assign('authinfo',$authinfo);
            $this -> display();
        }
    }

    function del_auth(){
        $auth_id = I('get.auth_id');

        if(D('Auth')->delete($auth_id)){
            $this->success('删除成功',U('auths'));
        }else{
            $this->error('删除失败',U('del',array('auth_id'=>$auth_id)),1);
        }

    }

    function upd_auth(){
        $auth_id = I('get.auth_id');
        $auth = new \Model\AuthModel();
        if(IS_POST){
            //dump($_POST);
            $shuju = $auth -> create();
            if($auth->save($shuju)){
                $this -> success('修改权限成功',U('auths'),1);
            }else{
                $this -> error('修改权限失败',U('upd',array('auth_id'=>$auth_id)),1);
            }
        }else{
            $info = $auth->find($auth_id);
            $son_lan_id = $info['auth_id'];
            $laninfo1 = D('Auth')
                ->where(array('auth_level'=>0))
                ->find($son_lan_id);
            $now_pid = $laninfo1['auth_pid'];
            $info['now_pid']=$now_pid;
            // dump($now_pid);die;
            $authinfo = D('Auth')->order('auth_path')->select();
            $this -> assign('authinfo',$authinfo);

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function login(){
        layout(false);
        C('SHOW_PAGE_TRACE',false);

        if(IS_POST){
            $name = $_POST['username'];
            $pwd = md5($_POST['password']);

            $info = D('Member')
                ->where(array('username'=>$name,'password'=>$pwd))
                ->find();

            if($info !== null){
                $_SESSION['member']['info'] = $info;
                $this -> redirect('Index/index');
            }else{
                echo "<script type='text/javascript'>alert('用户名或密码错误');</script>";
            }
        }
        $this -> display();
    }


    //退出系统
    function logout(){
        session(null); //销毁session
        $this -> redirect('login');
    }
}