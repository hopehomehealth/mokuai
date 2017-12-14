<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class BgtypeController extends AdminController
{
    function showlist(){
        $type_model = M('bgtype');
        $typelist = $type_model -> select();
        $this->assign('typelist',$typelist);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $type_model = M('bgtype');
            if($type_model->create()){
                $type_model -> add();
                $this->redirect('Bgtype/showlist',"添加成功");
            }else{
                $this->error("添加失败");
                exit;
            }
        }
        $this->display();
    }


    function upd(){
        $type_model = M('bgtype');
        if(IS_POST){
            
            if($type_model->create()){
                $type_model -> save();
                $this->redirect('Bgtype/showlist',"修改成功");
                exit;
            }else{
                $this->error("修改失败");
                exit;
            }
        }
        $typeinfo = $type_model->find($_GET['type_id']);
        $this->assign('typeinfo',$typeinfo);
        $this->display();
    }

    function del(){
        $type_model = M('bgtype');
        $art_model = M('article');
        $type_id = $_GET['type_id'];
        $res = $art_model -> where("type_id = {$type_id}") -> select();
        //dump($res);exit;
        if($res){
            $this->error('不能删除该分类');
            exit;
        }else{     
            $type_model -> where("type_id = {$type_id}") -> delete();
            $this->success('成功删除一条数据');
            exit;
        }      
    }

}