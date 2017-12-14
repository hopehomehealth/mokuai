<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Sadmin\Controller;
use Think\Controller;

class ScategoryController extends Controller
{
    function showlist(){
        $userid = $_SESSION['userInfo']['userid'];
        $info =D('Scategory')->where("userid={$userid}")
            ->select();
        $this -> assign('info',$info);
        $this -> display();
    }

    function tianjia(){
        $userid = $_SESSION['userInfo']['userid'];
        if(IS_POST){

            $category = D('Scategory');

            $shuju = $category->create();
            $shuju['userid'] = $userid;
            if($category->add($shuju)){
                $this -> success('添加分类成功',U('showlist'),1);
            }else{
                $this -> error('添加分类失败',U('tianjia'),1);
            }
        }else{
            $this -> display();
        }
    }


    function upd(){
        $cat_id = I('get.cat_id');
        $userid = $_SESSION['userInfo']['userid'];
        $cat = D('Scategory');
        if(IS_POST){
            $shuju = $cat-> create();
            $shuju['userid'] = $userid;
            if($cat->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('cat_id'=>$cat_id)),1);
            }
        }else{
            $info = $cat->where("userid={$userid}")->find($cat_id);


            $this -> assign('info',$info);
            $this -> display();
        }
    }
    function del(){
        $cat_id = I('get.cat_id');

        if(D('Scategory')->delete($cat_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('cat_id'=>$cat_id)),1);
        }
    }
}