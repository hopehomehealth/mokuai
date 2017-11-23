<?php
namespace Admin\Controller;
use Tools\AdminController;


//后台控制器
class TypeController extends AdminController {
    //类型列表展示
    function showlist(){
        //为"导航"设置文字信息
        $daohang = array(
            'title1' => '类型管理',
            'title2' => '类型列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);

        //获得类型列表信息
        $info = D('Type')->select();
        $this -> assign('info',$info);

        $this -> display();
    }

    //添加类型操作
    function tianjia(){
        $type = D('Type');
        if(IS_POST){
            //收集form表单信息，存储到数据库
            $shuju = $type -> create();
            if($type -> add($shuju)){
                $this -> success('添加类型成功',U('showlist'),1);
            }else{
                $this -> error('添加类型失败',U('tianjia'),1);
            }
        }else{
            //为"导航"设置文字信息
            $daohang = array(
                'title1' => '类型管理',
                'title2' => '添加类型',
                'act' => '返回',
                'act_link' => U('showlist'),
            );
            //assign给模板的变量信息，"普通模板和布局模板"都可以使用
            $this -> assign('daohang',$daohang);

            $this -> display();
        }
    }


}

