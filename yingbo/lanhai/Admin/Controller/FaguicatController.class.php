<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class FaguicatController extends AdminController
{
    function showlist(){
        $info =  D('Faguicat')->select();
//    dump($info);die;
        $this -> assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $cat = D('Faguicat');
            $shuju = $cat->create();

            if(empty($_POST['name'])){
                $this->error('分类名称不能为空');
                exit;
            }

            if($cat->add($shuju)){
                $this->success('添加成功','showlist');
            }else{
                $this->error('添加失败','tianjia');
            }
        }else{
            $this->display();
        }
    }


    function upd(){
        $cat_id = I('get.cat_id');
        $cat = D('Faguicat');
        if(IS_POST){
            $shuju = $cat -> create();

            if($cat->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('cat_id'=>$cat_id)),1);
            }
        }else{
            $info = $cat->find($cat_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $cat = M('Faguicat');
            $cat_id = $_POST['cat_id'];
            if($cat->where("cat_id = {$cat_id}")->delete()){
                $this->success('已删除一条数据',U('showlist'),1);
            }
    }

}