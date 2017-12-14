<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Think\Controller;
class CaiclubController extends Controller
{

    function showlist(){



        if($_POST){
            $search = $_POST;
            $map['username'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $cai = D('Caiclub');
        $count = $cai -> count();
        $p = new \Think\Page($count,10);
        $info = $cai ->where($map)
            -> order('cai_id desc')
            ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
		$first = $_GET['p'] ? $_GET['p']:'1';
        $this ->assign('firstno',($first-1)*10+1);
        $this -> assign('page',$page);
        $this -> assign('info',$info);

        $this->display();
    }

//    function tianjia(){
//        if(IS_POST){
//            $userid = $_SESSION['userInfo']['userid'];
//            $userinfo = D('User')
//                ->where(array('userid'=>$userid))
//                ->field('name,phone,id_sn')
//                ->find();
//
//
//            $cai = D('Caiclub');
//            $info = $cai->create();
//            $info['add_time'] = time();
//
//            if($cai->add($info)){
//                $this->success('添加成功','showlist',1);
//            }else{
//                $this->error('添加失败','tianjia',1);
//            }
//        }else{
//            $this->display();
//        }
//    }

    function upd(){
        $cai_id = I('get.cai_id');
        $cai = D('Caiclub');
        if(IS_POST){



            $shuju = $cai -> create();
            $shuju['add_time'] = time();

            if($cai->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('cai_id'=>$cai_id)),1);
            }
        }else{
            $info = $cai->find($cai_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $cai_id = I('get.cai_id');
        if(D('cai')->delete($cai_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('cai_id'=>$cai_id)));
        }
    }






}