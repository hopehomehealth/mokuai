<?php

/**
 * Class templates_model
 */
class templates_model extends Lowxp_Model{

    public $baseTable = '###_templates';
    function __construct(){}

    //保存数据
    function save(){
        $post = $_POST['post'];
        $code = trim($_POST['code']);

        #表单处理
        if(empty($post['template_subject'])){ return array('code'=>10001, 'message'=>'模板名称不能为空!'); }
        if(empty($post['template_content'])){ return array('code'=>10001, 'message'=>'模板内容不能为空!'); }

        #添加模板表单处理
        if(empty($code)){
            if(empty($post['template_code'])){ return array('code'=>10001, 'message'=>'模板标识不能为空!'); }

            $res = $this->db->select("select * from ".$this->baseTable." where template_code='".trim($post['template_code'])."'");
            if($res){ return array('code'=>10003, 'message'=>'模板标识已存在，请更换!'); }
        }

        #初始值
        $post['last_modify'] = time();

        #保存
        $where = $code?array('template_code'=>$code):'';
        $res = $this->db->save($this->baseTable,$post,'',$where);
        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); }

        $template_code = '';
        if($code) $template_code = $code;
        else{
            $template_code = $this->db->getstr("SELECT template_code FROM ".$this->baseTable." WHERE template_id=".$this->db->insert_id());
        }

        //生成模板文件
        $smarty = smartyTpl();
        $this->load->library('dir');
        $this->dir->filePutContents(str_replace('\\','/',$smarty->template_dir[0]).$template_code.'.html', $post['template_content']);
        unset($smarty);

        if($code){
            admin_log('编辑模板：'.$post['template_subject']);
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }else{
            admin_log('添加模板：'.$post['template_subject']);
            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');
        }
    }

}