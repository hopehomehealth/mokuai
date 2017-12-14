<?php

namespace Model;
use Think\Model;

class ProductclassModel extends Model{
    //insert完成数据添加的后续处理
    protected function _after_insert($data,$options){
        //1) path维护
        if($data['pid']==0){
            //① 顶级分类path=new_id
            $path = $data['cat_id'];
        }else{
            //② 非顶级分类path = ppath-new_id
            //获得父级全路径
            $ppath = $this
                ->where(array('cat_id'=>$data['pid']))
                ->getField('path');
            $path = $ppath."-".$data['cat_id'];
        }
        //2) level维护
        //   算法：等于path里边'-'的个数
        $level = substr_count($path, '-');

        $arr = array(
            'cat_id' => $data['cat_id'],
            'path' => $path,
            'level' => $level,
        );
        $this -> save($arr);
    }
}
