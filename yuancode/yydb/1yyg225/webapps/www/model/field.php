<?php

/**
 * Class field_model
 */
class field_model extends Lowxp_Model{

    private $baseTable = '###_module_field';

    function __construct(){

    }

    //保存数据
    function save($post){

        $id = isset($post['id']) ? (int) $post['id'] : 0;
        if(isset($post['field'])){ $post['field'] = trim($post['field']); }

        #表单处理
        if(!$id && empty($post['type'])){ return array('code'=>10001, 'message'=>'请选择字段类型!'); }
        if(!$id && empty($post['field'])){ return array('code'=>10001, 'message'=>'请输入字段名称!'); }
        if(empty($post['name'])){ return array('code'=>10001, 'message'=>'请输入字段别名!'); }
        if(isset($post['field']) && !$this->base->validate($post['field'],'english')){
            return array('code'=>10001, 'message'=>'字段名只能是英文字母!');
        }

        #初始值
        if(!$id){
            $post['status'] = 1;
            $post['issystem'] = 0;
        }

        #重复处理
        $where = $post['id'] ? ' and id!='.$post['id'] : '';
        if(!$id){
            $res = $this->db->check_fields($post['module']['name'],array($post['field']));
            if(empty($res)){ return array('code'=>10003, 'message'=>'该字段已经存在，请更换!'); }
        }else{
            //if($post['type']){ unset($post['type']); }
        }

        #保存
        $where = $post['id'] ? array('id'=>(int) $post['id']) : '';
        $tablesql = $this->get_tablesql($post);
        $post['setup'] = $_POST['setup'] ? json_encode($_POST['setup']) : '';
        $res_save = $this->db->save($this->baseTable,$post,'',$where);

        if($res_save){
            if(is_array($tablesql)){
                foreach($tablesql as $sql){
                    $this->db->query($sql);
                }
            }else{
                $this->db->query($tablesql);
            }
        }

        if(empty($res_save)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误
        if($post['id']){
            admin_log('更新模型字段：'.$post['field'].'('.$post['module']['name'].')');
            return array('code'=>0, 'type'=>'update', 'message'=>'字段更新成功');
        }
        else{
            admin_log('添加模型字段：'.$post['field'].'('.$post['module']['name'].')');
            return array('code'=>0, 'type'=>'insert', 'message'=>'字段添加成功');
        }

    }

    function get_tablesql($info){

        $fieldtype = $info['type'];
        if($info['setup']['fieldtype']){
            $fieldtype=$info['setup']['fieldtype'];
        }
        $moduleid = $info['moduleid'];
        $default=$info['setup']['default'];
        $field = $info['field'];
        $tablename = $this->db->pre_table(strtolower($info['module']['name']));
        $maxlength = intval($info['maxlength']);
        $minlength = intval($info['minlength']);
        $numbertype = $info['setup']['numbertype'];
        $oldfield = $info['oldfield'];
        if($oldfield){ $do = " CHANGE `".$oldfield."` ";}else{$do =  " ADD ";}

        switch($fieldtype) {
            case 'varchar':
                if(!$maxlength) $maxlength = 255;
                $maxlength = min($maxlength, 255);
                $sql = "ALTER TABLE `$tablename` $do `$field` VARCHAR( $maxlength ) NOT NULL DEFAULT '$default'";
                break;

            case 'title':
                if(!$maxlength) $maxlength = 255;
                $maxlength = min($maxlength, 255);
                $sql[] = "ALTER TABLE `$tablename` $do `title` VARCHAR( $maxlength ) NOT NULL DEFAULT '$default'";
                $sql[] = "ALTER TABLE `$tablename` $do `title_style` VARCHAR( 40 ) NOT NULL DEFAULT ''";
                $sql[] = "ALTER TABLE `$tablename` $do `thumb` VARCHAR( 255 ) NOT NULL DEFAULT ''";
                break;

            case 'catid':
                $sql = "ALTER TABLE `$tablename` $do `$field` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0'";
                break;

            case 'number':
                $decimaldigits = $info['setup']['decimaldigits'];
                $default = $decimaldigits == 0 ? intval($default) : floatval($default);
                $sql = "ALTER TABLE `$tablename` $do `$field` ".($decimaldigits == 0 ? 'INT' : 'decimal( 10,'.$decimaldigits.' )')." ".($numbertype ==1 ? 'UNSIGNED' : '')."  NOT NULL DEFAULT '$default'";
                break;

            case 'tinyint':
                if(!$maxlength) $maxlength = 3;
                $maxlength = min($maxlength,3);
                $default = intval($default);
                $sql = "ALTER TABLE `$tablename` $do `$field` TINYINT( $maxlength ) ".($numbertype ==1 ? 'UNSIGNED' : '')." NOT NULL DEFAULT '$default'";
                break;


            case 'smallint':
                $default = intval($default);
                if(!$maxlength) $maxlength = 8;
                $maxlength = min($maxlength,8);
                $sql = "ALTER TABLE `$tablename` $do `$field` SMALLINT( $maxlength ) ".($numbertype ==1 ? 'UNSIGNED' : '')." NOT NULL DEFAULT '$default'";
                break;

            case 'int':
                $default = intval($default);
                $sql = "ALTER TABLE `$tablename` $do `$field` INT ".($numbertype ==1 ? 'UNSIGNED' : '')." NOT NULL DEFAULT '$default'";
                break;

            case 'mediumint':
                $default = intval($default);
                $sql = "ALTER TABLE `$tablename` $do `$field` INT ".($numbertype ==1 ? 'UNSIGNED' : '')." NOT NULL DEFAULT '$default'";
                break;

            case 'mediumtext':
                $sql = "ALTER TABLE `$tablename` $do `$field` MEDIUMTEXT NOT NULL";
                break;

            case 'text':
                $sql = "ALTER TABLE `$tablename` $do `$field` TEXT NOT NULL";
                break;

            case 'posid':
                $sql = "ALTER TABLE `$tablename` $do `$field` varchar(40) NOT NULL DEFAULT ''";
                break;

            case 'linkage':
                $sql = "ALTER TABLE `$tablename` $do `$field` varchar(40) NOT NULL DEFAULT ''";
                break;

            //case 'typeid':
            //$sql = "ALTER TABLE `$tablename` $do `$field` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0'";
            //break;

            case 'datetime':
                $sql = "ALTER TABLE `$tablename` $do `$field` INT(11) UNSIGNED NOT NULL DEFAULT '0'";
                break;

            case 'editor':
                $sql = "ALTER TABLE `$tablename` $do `$field` TEXT NOT NULL";
                break;

            case 'image':
                $sql = "ALTER TABLE `$tablename` $do `$field` VARCHAR( 200 ) NOT NULL DEFAULT ''";
                break;

            case 'images':
                $sql = "ALTER TABLE `$tablename` $do `$field` MEDIUMTEXT NOT NULL";
                break;

            case 'file':
                $sql = "ALTER TABLE `$tablename` $do `$field` VARCHAR( 200 ) NOT NULL DEFAULT ''";
                break;

            case 'files':
                $sql = "ALTER TABLE `$tablename` $do `$field` MEDIUMTEXT NOT NULL";
                break;
        }
        return $sql;
    }

}