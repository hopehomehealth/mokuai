<?php
namespace Admin\Controller;
use Tools\AdminController;

//后台控制器
class CategoryController extends AdminController {

    //分类列表展示
    function showlist(){
        //为"导航"设置文字信息
        $daohang = array(
            'title1' => '分类管理',
            'title2' => '分类列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);

        //获得分类信息并给模板展示
        $info = D('Category')->order('cat_path')->select();
        //SELECT * FROM `sp_Category` ORDER BY cat_path
        $this -> assign('info',$info);

        $this -> display();
    }

    //添加分类
    function tianjia(){
        $Category = new \Model\CategoryModel();
        if(IS_POST){
            //dump($_POST);
            $shuju = $Category -> create();//收集到2个字段数据

            if($Category -> add($shuju)){
                //清除memcache对应的商品分类数据
                //(类似分类的修改、删除 都要刷新memcache数据)
                $this->mem->delete('catinfoA');
                $this->mem->delete('catinfoB');
                $this->mem->delete('catinfoC');

                $this -> success('添加分类成功',U('showlist'),1);
            }else{
                $this -> error('添加分类失败',U('tianjia'),1);
            }
        }else{
            //为"导航"设置文字信息
            $daohang = array(
                'title1' => '分类管理',
                'title2' => '添加分类',
                'act' => '返回',
                'act_link' => U('showlist'),
            );
            //assign给模板的变量信息，"普通模板和布局模板"都可以使用
            $this -> assign('daohang',$daohang);

            //获得供选取的上级(cat_level=0/1)并传递给模板
            $pcatinfo = D('Category')
                ->order('cat_path')
                ->where(array('cat_level'=>array('in','0,1')))
                ->select();
            //SELECT * FROM `sp_Category` WHERE `cat_level` IN ('0','1') ORDER BY cat_path
            $this -> assign('pcatinfo',$pcatinfo);

            $this -> display();
        }

    }

    //根据父级获得“子级分类”信息
    function getCatByPid(){
        $cat_id = I('get.cat_id');//父级id信息

        $catinfo = D('Category')
            ->where(array('cat_pid'=>$cat_id))
            ->select();
        echo json_encode($catinfo); //[{},{},{}....]
    }
}

