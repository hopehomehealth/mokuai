<?php
namespace Model;
use Think\Model;

//model模型类

class AuthModel extends Model {
    //重写父类的添加瞻前顾后机制方法
    // 插入成功后的回调方法
    protected function _after_insert($data,$options) {
        //获得新记录的主键id值
        /*dump($data);
        array(5) {
          ["auth_name"] => string(12) "品牌列表"
          ["auth_pid"] => int(101)
          ["auth_c"] => string(5) "Brand"
          ["auth_a"] => string(8) "showlist"
          ["auth_id"] => string(3) "113"
        }
        */
        //auth_path和auth_level维护
        //1) 维护auth_path 全路径
        if($data['auth_pid']==0){
            //① 顶级权限：  全路径====本身记录id值
            $path = $data['auth_id'];
        }else{
            //② 非顶级权限：  全路径====父级全路径-本身记录id值
            //获得父级权限信息
            $pinfo = $this ->find($data['auth_pid']);
            $path = $pinfo['auth_path']."-".$data['auth_id'];
        }

        //2) 维护auth_level
        //等级:就是path全路径里边'-'的个数
        $level = substr_count($path,'-');

        //把path和level更新给记录
        $arr = array(
            'auth_id'=>$data['auth_id'],
            'auth_path'=>$path,
            'auth_level'=>$level,
        );
        $this -> save($arr);
    }
}
