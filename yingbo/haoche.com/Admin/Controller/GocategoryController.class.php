<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class GocategoryController extends Controller
{
    function showlist(){

        $info =D('Gocategory')
            ->order('path')
            ->select();

        $this -> assign('info',$info);
        $this -> display();

    }

    function tianjia(){
        if(IS_POST){

            $category = new \Model\GocategoryModel();
            $shuju = $category->create();
            if($category->add($shuju)){
                $this -> success('添加分类成功',U('showlist'),1);
            }else{
                $this -> error('添加分类失败',U('tianjia'),1);
            }
        }else{

            /****获得供选取的上级(前两个级别)分类信息****/
            $catinfo = D('Gocategory')
                ->where(array('level'=>array('in','0,1')))
                ->order('path')
                ->select();
            $this -> assign('catinfo',$catinfo);
            /****获得供选取的上级(前两个级别)分类信息****/

            $this -> display();
        }
    }

    function getCatByPid(){
        $cat_id = I('get.cat_id');

        //查询子级分类信息
        $catinfo = D('Gocategory')
            -> where(array('pid'=>$cat_id))
            -> select();
        echo json_encode($catinfo);
    }


    function upd(){
        $cat_id = I('get.cat_id');
        $cat = new \Model\GocategoryModel();
        if(IS_POST){
            $shuju = $cat -> create();

            if($cat->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('cat_id'=>$cat_id)),1);
            }
        }else{
            $info = $cat->find($cat_id);

            $catinfo = D('Gocategory')
                ->where(array('level'=>array('in','0,1')))
                ->order('path')
                ->select();
            $this -> assign('catinfo',$catinfo);

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $cat_id = I('get.cat_id');

        if(D('Gocategory')->delete($cat_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('cat_id'=>$cat_id)),1);
        }
    }
}