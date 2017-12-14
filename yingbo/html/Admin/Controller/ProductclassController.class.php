<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class ProductclassController extends AdminController
{
    //商品列表
    function showlist()
    {
        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $n = D('Productclass');
        $count = $n -> count();
        $p = new \Think\Page($count,10);
        $info = $n ->where($map)
            -> order('cat_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    function tianjia(){
        if(IS_POST){
            $productclass = new \Model\ProductclassModel();
            $shuju = $productclass->create();
            if($productclass->add($shuju)){
                $this -> success('添加分类成功',U('showlist'),1);
            }else{
                $this -> error('添加分类失败',U('tianjia'),1);
            }
        }else{
            $catinfo = D('Productclass')
                ->where(array('level'=>array('in','0,1')))
                ->order('path')
                ->select();
            $this -> assign('catinfo',$catinfo);
            /****获得供选取的上级(前两个级别)分类信息****/
            $this -> display();
        }
    }
    
        function upd(){
            $cat_id = I('get.cat_id');
            $productclass = new \Model\ProductclassModel();
            if(IS_POST){
                $shuju = $productclass -> create();
                
                if($productclass->save($shuju)){
                    $this -> success('修改成功',U('showlist'),1);
                }else{
                    $this -> error('修改失败',U('upd',array('cat_id'=>$cat_id)),1);
                }
            }else{
                $info = $productclass->find($cat_id);

                /****获得“第一级分类信息”并传递给模板****/
                $catinfoA = D('Productclass')
                    ->where(array('level'=>0))
                    ->select();
                $this -> assign('catinfoA',$catinfoA);
                /****获得“第一级分类信息”并传递给模板****/

                $this -> assign('info',$info);
                $this -> display();
            }
        }
 

    //根据父级获得子级的分类信息
    function getCatByPid(){
        $cat_id = I('get.cat_id');
        $catinfo = D('Productclass')
            -> where(array('pid'=>$cat_id))
            -> select();
        echo json_encode($catinfo);
    }

    function del(){
        $cat_id = I('get.cat_id');

        if(D('Productclass')->delete($cat_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('cat_id'=>$cat_id)),1);
        }
    }
}