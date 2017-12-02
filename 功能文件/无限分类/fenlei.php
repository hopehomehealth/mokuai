<?php

header("content-type:text/html;charset=utf-8");  

$categories = array(
    array('id'=>1,'name'=>'电脑','pid'=>0),
    array('id'=>2,'name'=>'手机','pid'=>0),
    array('id'=>3,'name'=>'笔记本','pid'=>1),
    array('id'=>4,'name'=>'台式机','pid'=>1),
    array('id'=>5,'name'=>'智能机','pid'=>2),
    array('id'=>6,'name'=>'功能机','pid'=>2),
    array('id'=>7,'name'=>'超极本','pid'=>3),
    array('id'=>8,'name'=>'游戏本','pid'=>3),
    
);
$tree = $categories;



function get_attr($a,$pid){
    $tree = array();
    foreach($a as $v){
        if($v['pid'] == $pid){
            $v['children'] = get_attr($a,$v['id']);
            if($v['children'] == null){
                unset($v['children']);
            }
            $tree[] = $v;
        }
    }
    return $tree;
}
echo "<pre>";
print_r(get_attr($tree,0));
