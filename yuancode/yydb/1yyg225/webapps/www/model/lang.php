<?php

/**
 * Class lang_model
 */
class lang_model extends Lowxp_Model{

    private $baseTable = '###_lang';

    function __construct(){}

    //返回多语言列表
    function select(){

        $array = $this->db->select("SELECT * FROM ".$this->baseTable." WHERE status=1 ORDER BY listorder,id");
        $res = array();
        foreach($array as $k=>$v){
            $res[$v['id']] = $v;
        }

        return $res;

    }

    //保存数据
    function save($post){

        #表单处理
        if(empty($post['name'])){ return array('code'=>10001, 'message'=>'请输入语言名!'); }
        if(empty($post['mark'])){ return array('code'=>10001, 'message'=>'请输入语言标识!'); }

        #重复处理
        $where = $post['id'] ? ' and id!='.$post['id'] : '';
        $res = $this->db->select("select * from ".$this->baseTable." where name='".trim($post['name'])."'".$where);
        if($res){ return array('code'=>10003, 'message'=>'语言名已经存在，请更换!'); }
        $res = $this->db->select("select * from ".$this->baseTable." where mark='".trim($post['mark'])."'".$where);
        if($res){ return array('code'=>10003, 'message'=>'语言标识已经存在，请更换!'); }

        #保存
        $where = $post['id'] ? array('id'=>(int) $post['id']) : '';
        $res = $this->db->save($this->baseTable,$post,'',$where);

        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误
        if($post['id']){
            admin_log('编辑多语言：'.$post['name']);
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }
        else{
            admin_log('添加多语言：'.$post['name']);
            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');
        }

    }

}