<?php

namespace Model;
use Think\Model;

class AdModel extends Model{
    //insert完成数据添加的后续处理
    protected function _after_insert($info,$options){
        //完成广告扩展栏目信息填充
        if(!empty($_POST['ext_col'])){
            foreach($_POST['ext_col'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'ad_id'=>$info['ad_id'],
                        'col_id' => $v,
                    );
                    D('AdColumn')->add($arr);
                }
            }
        }
    }

    protected function _after_update($data,$options){
        //完成广告扩展栏目信息填充
        if(!empty($_POST['ext_col'])){
            //去除旧的扩展栏目
            D('AdColumn')
                ->where(array('ad_id'=>$data['ad_id']))
                ->delete();
            foreach($_POST['ext_col'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'ad_id'=>$data['ad_id'],
                        'col_id' => $v,
                    );
                    D('AdColumn')->add($arr);
                }
            }
        }else{
            foreach($_POST['ext_col'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'ad_id'=>$data['ad_id'],
                        'col_id' => $v,
                    );
                    D('AdColumn')->add($arr);
                }
            }
        }
    }
}