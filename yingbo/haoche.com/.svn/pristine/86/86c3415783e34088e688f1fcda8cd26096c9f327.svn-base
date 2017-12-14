<?php

namespace Model;
use Think\Model;

class HaocheModel extends Model{
    //insert完成数据添加的后续处理
    protected function _after_insert($data,$options){

        if(!empty($_POST['attrid'])){
            //判断商品有设置具体“类型”
            foreach($_POST['attrid'] as $k => $v){
                foreach($v as $kk => $vv){
                    $arr = array(
                        'goods_id' => $data['goods_id'],
                        'attr_id' => $k,
                        'attr_value' => $vv,
                    );
                    D('HaocheAttr')->add($arr);
                }
            }
        }

        //完成商品扩展分类信息填充
        //sp_goods_cat
        if(!empty($_POST['ext_cat'])){
            foreach($_POST['ext_cat'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'goods_id'=>$data['goods_id'],
                        'cat_id' => $v,
                    );
                    D('HaocheCat')->add($arr);
                }
            }
        }
    }

    //商品update更新完毕后，要对属性进行维护
    protected function _after_update($data,$options){
        //dump($data);//array('goods_id'=>30)
        if(!empty($_POST['attrid'])){
            //1) 删除商品当前的属性信息
            D('HaocheAttr')->where(array('goods_id'=>$data['goods_id']))->delete();

            //2) 添加新的属性信息入库
            foreach($_POST['attrid'] as $k => $v){
                foreach($v as $kk => $vv){
                    $arr = array(
                        'goods_id' => $data['goods_id'],
                        'attr_id' => $k,
                        'attr_value' => $vv,
                    );
                    D('HaocheAttr')->add($arr);
                }
            }
        }

        //完成商品扩展分类信息填充
        //sp_goods_cat
        if(!empty($_POST['ext_cat'])){
            //去除旧的扩展分类
            D('HaocheCat')
                ->where(array('goods_id'=>$data['goods_id']))
                ->delete();
            foreach($_POST['ext_cat'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'goods_id'=>$data['goods_id'],
                        'cat_id' => $v,
                    );
                    D('HaocheCat')->add($arr);
                }
            }
        }
    }
}