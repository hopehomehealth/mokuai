<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/28 0028
 * Time: 14:01
 */
namespace Model;
use Think\Model;

class AuthModel extends Model{
    protected function _after_insert($data,$options) {
        //1) 维护auth_path
        //顶级
        if($data['auth_pid']==0){
            $path = $data['auth_id'];
        }else{
            //非顶级
            $ppath = $this
                ->where(array('auth_id'=>$data['auth_pid']))
                ->getField('auth_path');
            $path = $ppath.'-'.$data['auth_id'];
        }
        //2) 维护等级
        $level = substr_count($path,'-');
        //把path和level给更新到数据记录里边
        $arr = array(
            'auth_id'=>$data['auth_id'],
            'auth_path'=>$path,
            'auth_level'=>$level,
        );
        $this -> save($arr);
    }
}