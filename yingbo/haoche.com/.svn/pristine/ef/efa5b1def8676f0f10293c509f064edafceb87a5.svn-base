<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class SellercatController extends Controller
{
    function showlist(){
        $info =D('Sellercat')
            ->select();
        $this -> assign('info',$info);
        $this -> display();
    }

    function tianjia(){
        if(IS_POST){

            $category = D('Sellercat');
            $shuju = $category->create();
            if($category->add($shuju)){
                $this -> success('添加行业成功',U('showlist'),1);
            }else{
                $this -> error('添加行业失败',U('tianjia'),1);
            }
        }else{
            $this -> display();
        }
    }


    function upd(){
        $cat_id = I('get.cat_id');
        $cat = D('Sellercat');
        if(IS_POST){
            $shuju = $cat-> create();
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
        $cat_id = I('get.cat_id');

        if(D('Sellercat')->delete($cat_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('cat_id'=>$cat_id)),1);
        }
    }
}