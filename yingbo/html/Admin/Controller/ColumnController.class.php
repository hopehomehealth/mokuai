<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class ColumnController extends AdminController
{
    //列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $column = D('Column');
        $count = $column -> count();
        $p = new \Think\Page($count,20);
        $info = $column ->where($map)
            -> order('path') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    //添加
    function tianjia(){
       if(IS_POST){
           $column = new \Model\ColumnModel();
           $info = $column->create();

           $info['input_time'] = time();
           $info['update_time'] = time();

          if($column->add($info)){
              $this->success('添加成功','showlist',1);
          }else{
              $this->error('添加失败','tianjia',1);
          }
       }else{
           /****获得供选取的上级(前两个级别)栏目信息****/
           $colinfo = D('Column')
               ->where(array('level'=>array('in','0,1,2')))
               ->order('path')
               ->select();
           $this -> assign('colinfo',$colinfo);
           /****获得供选取的上级(前两个级别)栏目信息****/
           $this->display();
       }
    }

    //根据父级获得子级的栏目信息
    function getColByPid()
    {
        $col_id = I('get.col_id');
        //查询子级栏目信息
        $colinfo = D('Column')
            ->where(array('pid' => $col_id))
            ->select();
        echo json_encode($colinfo);
    }
    //修改
    function upd(){
        $col_id = I('get.col_id');
        $column = new \Model\ColumnModel();
        if(IS_POST){
            $shuju = $column -> create();
            $info['input_time'] = time();
            $info['update_time'] = time();
            if($column->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('col_id'=>$col_id)),1);
            }
        }else{
            $info = $column->find($col_id);

            /****获得“第一级栏目信息”并传递给模板****/
            $colinfoA = D('Column')
                ->where(array('level'=>0))
                ->select();
            $this -> assign('colinfoA',$colinfoA);
            /****获得“第一级栏目信息”并传递给模板****/

            /****获得广告的所有扩展栏目信息****/
            $ext = D('AdColumn')
                ->where(array('level'=>array('in','0,1,2')))
                ->field('group_concat(col_id) as extids')
                ->find();
            $extcolids = $ext['extids'];
            $this -> assign('extcolids',$extcolids);
            /****获得广告的所有扩展栏目信息****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }



    //删除栏目
    function del(){
        $col_id = I('get.col_id');
//        $info = D('Column')->find($column_id);
//        unlink($info['Column_id']);

       if(D('Column')->delete($col_id)){
           $this->success('删除成功',U('showlist'));
       }else{
           $this->error('删除失败',U('del',array('col_id'=>$col_id)),1);
       }

    }
}