<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/14
 * Time: 17:20
 */
namespace Model;
use Think\Model;

class ColumnModel extends Model
{
    //insert完成数据添加的后续处理
    protected function _after_insert($data,$options){

        //1) path维护
        if($data['pid']==0){
            //① 顶级栏目path
            $path = $data['col_id'];
        }else{
            //② 非顶级栏目path
            //获得父级全路径
            $ppath = $this
                ->where(array('col_id'=>$data['pid']))
                ->getField('path');
            $path = $ppath."-".$data['col_id'];
        }
        //2) level维护
        //   算法：等于path里边'-'的个数
        $level = substr_count($path, '-');
        $arr = array(
            'col_id' => $data['col_id'],
            'path' => $path,
            'level' => $level,
        );
        $this -> save($arr);
    }
}