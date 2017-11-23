<?php
namespace Model;
use Think\Model;

//model模型类

class GoodsModel extends Model {
    //数据写入成功后回调方法
    protected function _after_insert($data,$options){
        //goods_id在$data的数组里边
        //dump($data);
        //遍历$_POST['attrids'],并
        if(!empty($_POST['attrids'])){
            foreach($_POST['attrids'] as $k => $v){
                foreach($v as $kk => $vv){
                    //给sp_goods_attr写入数据
                    $arr = array(
                        'goods_id'=>$data['goods_id'],
                        'attr_id'=>$k,
                        'attr_value'=>$vv,
                    );
                    D('GoodsAttr')->add($arr);
                }
            }
        }
        //对扩展分类进行维护入库
        if(!empty($_POST['ext_cat'])){
            //遍历ext_cat,同时给sp_goods_cat添加记录
            foreach($_POST['ext_cat'] as $k => $v){
                if($v != '0'){
                    $arr = array(
                        'goods_id' => $data['goods_id'],
                        'cat_id' => $v,
                    );
                    D('GoodsCat')->add($arr);
                }
            }
        }
    }

    //数据修改之前调用的方法
    protected function _before_update($data,$options){
        $goods_id = $options['where']['goods_id'];
        if(!empty($_POST['attrids'])){
        //给商品修改"属性"信息
        //删除旧的属性，写入新的属性
            //1) 删除旧属性
            D('GoodsAttr')
                ->where(array('goods_id'=>$goods_id))
                ->delete();
            //2) 写入新的属性
            foreach($_POST['attrids'] as $k => $v){
                foreach($v as $kk => $vv){
                    //给sp_goods_attr写入数据
                    $arr = array(
                        'goods_id'=>$goods_id,
                        'attr_id'=>$k,
                        'attr_value'=>$vv,
                    );
                    D('GoodsAttr')->add($arr);
                }
            }
        }

        //收集扩展分类信息
        //1)删除旧的扩展分类信息
        D('GoodsCat')->where(array('goods_id'=>$goods_id))->delete();
        if(!empty($_POST['ext_cat'])){
            //2)添加新的
            //遍历ext_cat,同时给sp_goods_cat添加记录
            foreach($_POST['ext_cat'] as $k => $v){
                if($v != '0'){
                    //有选取具体的扩展分类信息
                    $arr = array(
                        'goods_id' => $goods_id,
                        'cat_id' => $v,
                    );
                    D('GoodsCat')->add($arr);
                }
            }
        }

    }
}
