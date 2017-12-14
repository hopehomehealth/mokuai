<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/14
 * Time: 17:20
 */
namespace Model;
use Think\Model;

class RoleModel extends Model{
    //完成role_auth_ac的制作
    protected function _before_update(&$data,$options) {
        //查询被分配权限的相关信息(包括控制器auth_c/操作方法auth_a)
        $authinfo = D('Auth')->select($data['role_auth_ids']);
        $tmp = array();
        foreach($authinfo as $k => $v){
            if(!empty($v['auth_c']) && !empty($v['auth_a'])){
                //拼装控制器操作方法的单元
                $tmp[] = $v['auth_c']."-".$v['auth_a'];
            }
        }
        $tmp_s = implode(',',$tmp);
        $data['role_auth_ac'] = $tmp_s;
    }

    protected function _after_insert($info,$options){
        //完成广告扩展栏目信息填充
        if(!empty($_POST['ext_auth'])){
            foreach($_POST['ext_auth'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'role_id'=>$info['role_id'],
                        'auth_id' => $v,
                    );
                    D('RoleAuth')->add($arr);
                }
            }
        }
    }

    protected function _after_update($data,$options){
        //完成广告扩展栏目信息填充
        if(!empty($_POST['ext_auth'])){
            //去除旧的扩展栏目
            D('RoleAuth')
                ->where(array('role_id'=>$data['role_id']))
                ->delete();
            foreach($_POST['ext_auth'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'role_id'=>$data['role_id'],
                        'auth_id' => $v,
                    );
                    D('RoleAuth')->add($arr);
                }
            }
        }else{
            foreach($_POST['ext_auth'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'role_id'=>$data['role_id'],
                        'auth_id' => $v,
                    );
                    D('RoleAuth')->add($arr);
                }
            }
        }
    }
}