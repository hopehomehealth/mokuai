<?php

namespace Model;
use Think\Model;

class GocategoryModel extends Model{
    //insert完成数据添加的后续处理
    protected function _after_insert($data,$options){

        if($data['pid']==0){

            $path = $data['cat_id'];
        }else{

            $ppath = $this
                ->where(array('cat_id'=>$data['pid']))
                ->getField('path');
            $path = $ppath."-".$data['cat_id'];
        }

        $level = substr_count($path, '-');

        $arr = array(
            'cat_id' => $data['cat_id'],
            'path' => $path,
            'level' => $level,
        );
        $this -> save($arr);
    }
}
