<?php/** * Class block_model */class block_model extends Lowxp_Model{    private $baseTable = '###_block';    function __construct(){}    /** 获取单条商家信息     * @param string $where     * @param string $field     * @return array|null     */    function get($where='1', $field='*'){        $where = $this->whereFormat($where);        $sql = "select $field from ".$this->baseTable." WHERE ".$where;        $row = $this->db->get($sql);        return $row;    }    //保存数据    function save(){        $post = $_POST['post'];        #表单处理        if(empty($post['name'])){ return array('code'=>10001, 'message'=>'请输入碎片名称!'); }        if(empty($post['mark'])){ return array('code'=>10001, 'message'=>'请输入mark碎片标识!'); }        #重复处理        $where = $post['id'] ? ' and id!='.$post['id'] : '';        $where .= ' and lang='.LANG_ID;        $res = $this->db->select("select * from ".$this->baseTable." where name='".$post['name']."'".$where);        if($res){ return array('code'=>10003, 'message'=>'碎片名称已经存在，请更换!'); }        $res = $this->db->select("select * from ".$this->baseTable." where mark='".$post['mark']."'".$where);        if($res){ return array('code'=>10003, 'message'=>'碎片标识已经存在，请更换!'); }        #初始值        $post['lang'] = LANG_ID;        #保存        $where = $post['id'] ? array('id'=>(int) $post['id']) : '';        if(empty($post['id'])) unset($post['id']);        $res = $this->db->save($this->baseTable,$post,'',$where);        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误        if($post['id']){            admin_log('编辑文章碎片：'.$post['name']);            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');        }        else{            admin_log('添加文章碎片：'.$post['name']);            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');        }    }}