<?php

namespace Model;
use Think\Model;

class MedicalModel extends Model{
    //insert完成数据添加的后续处理
    protected function _after_insert($info,$options){
        //完成扩展栏目信息填充
        if(!empty($_POST['ext_col'])){
            foreach($_POST['ext_col'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'medical_id'=>$info['medical_id'],
                        'col_id' => $v,
                    );
                    D('MedicalColumn')->add($arr);
                }
            }
        }
    }

    protected function _after_update($data,$options){
        //完成扩展栏目信息填充
        if(!empty($_POST['ext_col'])){
            //去除旧的扩展栏目
            D('MedicalColumn')
                ->where(array('medical_id'=>$data['medical_id']))
                ->delete();
            foreach($_POST['ext_col'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'medical_id'=>$data['medical_id'],
                        'col_id' => $v,
                    );
                    D('MedicalColumn')->add($arr);
                }
            }
        }
    }
}