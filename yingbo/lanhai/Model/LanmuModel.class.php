<?php
namespace Model;
use Think\Model;

class LanmuModel extends Model{

    protected function _after_insert($data,$options){

        if($data['pid']==0){

            $path = $data['lan_id'];
        }else{

            $ppath = $this
                ->where(array('lan_id'=>$data['pid']))
                ->getField('path');
            $path = $ppath."-".$data['lan_id'];
        }

        $level = substr_count($path, '-');

        $arr = array(
            'lan_id' => $data['lan_id'],
            'path' => $path,
            'level' => $level,
        );
        $this -> save($arr);
    }


   
}