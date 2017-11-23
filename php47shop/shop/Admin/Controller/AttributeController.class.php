<?php
namespace Admin\Controller;
use Tools\AdminController;


//后台控制器
class AttributeController extends AdminController {
    //属性列表展示
    function showlist(){
        //为"导航"设置文字信息
        $daohang = array(
            'title1' => '属性管理',
            'title2' => '属性列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);

        //获得属性列表信息
        /*
        $info = D('Attribute')
            ->alias('a')
            //->join('sp_type t on a.type_id=t.type_id')
            ->join('__TYPE__ t on a.type_id=t.type_id')
            ->field('a.*,t.type_name')
            ->select();
        $this -> assign('info',$info);
        */

        //获得供选取的“类型”信息
        $typeinfo = D('Type')->select();
        $this -> assign('typeinfo',$typeinfo);

        $this -> display();
    }

    //添加属性操作
    function tianjia(){
        $Attribute = D('Attribute');
        if(IS_POST){
            //收集form表单信息，存储到数据库
            $shuju = $Attribute -> create();
            if($Attribute -> add($shuju)){
                $this -> success('添加属性成功',U('showlist'),1);
            }else{
                $this -> error('添加属性失败',U('tianjia'),1);
            }
        }else{
            //为"导航"设置文字信息
            $daohang = array(
                'title1' => '属性管理',
                'title2' => '添加属性',
                'act' => '返回',
                'act_link' => U('showlist'),
            );
            //assign给模板的变量信息，"普通模板和布局模板"都可以使用
            $this -> assign('daohang',$daohang);

            //获得供选取的“类型”信息
            $typeinfo = D('Type')->select();
            $this -> assign('typeinfo',$typeinfo);
            $this -> display();
        }
    }

    //根据类型获得对应的属性信息
    function getAttrByType(){
        $type_id = I('get.type_id');//获得类型id

        $cdt = array();
        //如果type_id=0就不要限制属性的获取(要获取全部属性)
        if($type_id!=0){
            $cdt['a.type_id'] = $type_id;
        }

        //获得对应的属性信息
        $info = D('Attribute')
            ->alias('a')
            ->join('__TYPE__ t on a.type_id=t.type_id')
            ->field('a.*,t.type_name')
            ->where($cdt)
            ->select();
        echo json_encode($info); //[{},{},{},{}...]
    }


    //添加商品时，根据“类型”获取并返回对应的“属性”信息
    function getAttrByType2(){
        $type_id = I('get.type_id');//获得类型id

        //获得对应的属性信息
        $info = D('Attribute')
            ->field('attr_id,attr_name,attr_sel,attr_vals')
            ->where(array('type_id'=>$type_id))
            ->select();
        echo json_encode($info); //[{},{},{},{}...]
    }

    //修改商品时，根据“类型”获取并返回对应的“属性”信息
    function getAttrByType3(){
        $type_id = I('get.type_id');//获得类型id
        $goods_id = I('get.goods_id'); //当前被修改商品的goods_id

        //获得的属性信息两种情况：空壳、实体
        //sp_goods_attr  商品---属性关联
        //sp_attribute   属性信息
        $flag = 1; //1：实体属性信息，2：空壳属性信息

        //1) 获得"实体"属性信息
        $info = D('GoodsAttr')
            ->alias('ga')
            ->join('__ATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>$goods_id,'a.type_id'=>$type_id))
            ->field('a.attr_id,a.attr_name,a.attr_sel,a.attr_vals,group_concat(ga.attr_value) as attrvalues')
            ->group('a.attr_id')
            ->select();

        //判断是否存在实体属性信息
        if(empty($info)){
            //2) 获得“空壳”属性信息
            //获得对应的属性信息
            $flag = 2;
            $info = D('Attribute')
                ->field('attr_id,attr_name,attr_sel,attr_vals')
                ->where(array('type_id'=>$type_id))
                ->select();
        }
        //整合数据 与 $flag标志
        $shuju['flag'] = $flag;
        $shuju['data'] = $info;
        echo json_encode($shuju); //{{flag:1/2},{data:[{},{},{},...]}}
    }
}

