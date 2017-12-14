<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class LcatController extends AdminController
{
    function showlist(){
        $info =  D('Lcat')->select();
//    dump($info);die;
        $this -> assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $lcat = D('Lcat');
            $shuju = $lcat->create();

            if(empty($_POST['cat_name'])){
                $this->error('分类名称不能为空');
                exit;
            }

            if($lcat->add($shuju)){
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
        $lcat = D('Lcat');
        if(IS_POST){
            $shuju = $lcat -> create();

            if($lcat->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('cat_id'=>$cat_id)),1);
            }
        }else{
            $info = $lcat->find($cat_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $lcat = M('Lcat');
            $cat_id = $_POST['cat_id'];
            if($lcat->where("cat_id = {$cat_id}")->delete()){
                $this->success('已删除一条数据',U('showlist'),1);
            }
    }

}