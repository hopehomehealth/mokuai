<?php

namespace Model;
use Think\Model;

class ProductModel extends Model{
    //insert完成数据添加的后续处理
    protected function _after_insert($data,$options){
        
        if(!empty($_POST['ext_cat'])){
            foreach($_POST['ext_cat'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'pro_id'=>$data['pro_id'],
                        'cat_id' => $v,
                    );
                    D('ProductclassCat')->add($arr);
                }
            }
        }
    }

    //商品update更新完毕后，要对属性进行维护
    protected function _after_update($data,$options){

        if(!empty($_POST['ext_cat'])){
            //去除旧的扩展分类
            D('ProductclassCat')
                ->where(array('pro_id'=>$data['pro_id']))
                ->delete();
            foreach($_POST['ext_cat'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'pro_id'=>$data['pro_id'],
                        'cat_id' => $v,
                    );
                    D('ProductclassCat')->add($arr);
                }
            }
        }
    }
}