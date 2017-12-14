<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class HaoattributeController extends Controller
{
    function showlist(){
        $info = D('Haoattribute')
            ->alias('a')
            ->join('__HAOTYPE__ t on a.type_id=t.type_id')
            ->field('a.*,t.type_name')
            ->select();
        $this -> assign('info',$info);

        /****获得全部的类型信息****/
        $typeinfo = D('Haotype')->select();
        $this -> assign('typeinfo',$typeinfo);
        /****获得全部的类型信息****/

        $this -> display();
    }
    function tianjia(){
        if(IS_POST){
            $att = D('Haoattribute');
            $shuju = $att -> create();
            if($att->add($shuju)){
                $this -> success('添加属性成功',U('showlist'));
            }else{
                $this -> error('添加属性失败',U('tianjia'));
            }
        }else{
            $typeinfo = D('Haotype')->select();
            $this -> assign('typeinfo',$typeinfo);

            $this -> display();
        }
    }

    //根据typeid类型信息 获得对应的属性信息
    function getAttributeByType(){
        //接收get方式过来的typeid信息
        $typeid = I('get.typeid');

        //如果类型的值=0，则获取的属性信息不通过类型限制
        $cdt = array();
        if($typeid>0){
            $cdt['a.type_id']= $typeid;
        }

        //获得对应的属性信息
        $attrinfo = D('Haoattribute')
            ->alias('a')
            ->join('__HAOTYPE__ t on a.type_id=t.type_id')
            ->field('a.*,t.type_name')
            ->where($cdt)
            ->select();

        echo json_encode($attrinfo);
    }

    //【添加商品】 根据typeid类型信息 获得对应的属性信息
    function getAttributeByType2(){

        $typeid = I('get.typeid');

        $cdt = array();
        if($typeid>0){
            $cdt['a.type_id']= $typeid;
        }

        $attrinfo = D('Haoattribute')
            ->alias('a')
            ->join('__HAOTYPE__ t on a.type_id=t.type_id')
            ->field('a.*,t.type_name')
            ->where($cdt)
            ->select();
        echo json_encode($attrinfo);
    }

    //【修改商品】 根据typeid类型信息 获得对应的属性信息
    function getAttributeByType3(){

        $typeid = I('get.typeid');
        $goodsid = I('get.goodsid');

        $attrinfo = D('HaocheAttr')
            ->alias('ga')
            ->join('__HAOATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>$goodsid,'a.type_id'=>$typeid))
            ->field('a.attr_id,a.attr_name,a.attr_sel,a.attr_vals,group_concat(ga.attr_value) attrvalues')
            ->group('a.attr_id')
            ->select();

        $info['flag'] = 0;
        if(empty($attrinfo)){
            $attrinfo = D('Haoattribute')
                ->where(array('type_id'=>$typeid))
                ->select();
            $info['flag'] = 1;
        }

        $info['data'] = $attrinfo;

        echo json_encode($info);
    }
//    function upd(){
//        $attr_id = I('get.attr_id');
//        $type = D('Haoattribute');
//        if(IS_POST){
//            $shuju = $type -> create();
//            $aa=$type->save($shuju);
//             dump($aa);die;
//            if($type->save($shuju)){
//                $this -> success('修改成功',U('showlist'),1);
//            }else{
//                $this -> error('修改失败',U('upd',array('attr_id'=>$attr_id)),1);
//            }
//        }else{
//            $info = $type->find($attr_id);
//
//            $typeinfo = D('Haotype')->select();
//            $this -> assign('typeinfo',$typeinfo);
//
//            $this -> assign('info',$info);
//            $this -> display();
//        }
//    }

    function del(){
        $attr_id = I('get.attr_id');

        if(D('Haoattribute')->delete($attr_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('attr_id'=>$attr_id)),1);
        }
    }
}