<?php
/**
 * ZZCMS content_model
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class content_model extends Lowxp_Model{
    private $baseTable = '';
    private $moduleinfo = '';
    private $fieldsinfo = '';

    function __construct(){}
    function getModuleinfo(){ return $this->moduleinfo; }
    function getFieldsinfo(){ return $this->fieldsinfo; }

    function chkModule($m){

        $res_module = $m ? $this->db->get("select * from ###_module where name='".$m."'") : '';
        if(!$m || !$res_module){
            showError('模型不存在');die;
        }
        $this->baseTable = '###_'.$m;
        $this->moduleinfo = $res_module;

        $res_fileds = $this->db->select("select * from ###_module_field where status=1 and moduleid='".$res_module['id']."' order by listorder,id");
        foreach($res_fileds as $key => $val){
            $val['setup'] = json_decode($val['setup'],true);
            $this->fieldsinfo[$val['field']]=$val;
        }
    }

    //保存数据
    function save(){
        $post = $_POST['post'];
        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

        #表单验证
        $return = $this->checkfield($post);
        if(!empty($return['error'])){ return $return['error']; }
        $post = $return['post'];

        #初始化
        $post['lang'] = LANG_ID;
        if(!$id){
            $post['userid'] = defined('UID')?UID:0;
            $post['username'] = defined('USER')?USER:'';
            if(empty($post['createtime'])){
                $post['createtime'] = time();
            }
        }else{
            $post['updatetime'] = time();
        }

        #保存
        $where = $id ? array('id'=>$id) : '';

        $res = $this->db->save($this->baseTable,$post,'',$where);
        $res_id = $id ? $id : $this->db->insert_id();

        $this->repair($res_id);

        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误
        if($id){
            admin_log('编辑'.$this->moduleinfo['title'].'：'.($post['title']?$post['title']:'ID='.$id));
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }
        else{
            admin_log('添加'.$this->moduleinfo['title'].'：'.($post['title']?$post['title']:'ID='.$id));
            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');
        }
    }

    #批量更新内容
    function repair($ids=''){
        if(!is_array($ids)) $ids = explode(',',$ids);
        $ids = array_filter($ids);
        if(empty($ids)) return;
        $ids_str = implode(',',$ids);

        $module = $this->moduleinfo['name'];
        $res = $this->db->select("SELECT id,catid FROM ###_".$module." WHERE id IN(".$ids_str.")");
        $arr = array();
        foreach($res as $v){
            $arr[$v['id']] = $v;
        }

        foreach($ids as $id){
            $url = '/content/show/'.$arr[$id]['catid'].'/'.$id;
            $this->db->update($this->baseTable,array('url'=>$url),array('id'=>$id));
        }
    }

    #处理并验证post数据
    function checkfield($postdata){
        $fields = $this->fieldsinfo;
        $error = '';

        #初始化post中未获取的字段
        foreach($fields as $key=>$val){
            if(!isset($postdata[$key])){
                $postdata[$key] = '';
            }
        }

        foreach($postdata as $key=>$val){
            $setup=$fields[$key]['setup'];

            #必填验证
            if(!empty($fields[$key]['required']) && $postdata[$key]===''){
                $error = array('code'=>10001, 'message'=>$fields[$key]['name'].'不能为空！');
            }
            #正则验证
            elseif(!empty($fields[$key]['pattern']) && $this->base->validate($val,$fields[$key]['pattern'])==false){
                if($fields[$key]['tips']){
                    $error = array('code'=>10001, 'message'=>$fields[$key]['tips']);
                }else{
                    $error = array('code'=>10001, 'message'=>$fields[$key]['name'].'验证不正确！');
                }
            }
            #验证码验证
            elseif($key=='verifyCode' && isset($postdata[$key]) && (strtolower(trim($postdata[$key])) != strtolower($_SESSION['icode']))){
                $error = array('code'=>10001, 'message'=>$fields[$key]['name'].'错误！');
            }
            if(!empty($error)){ return array('error'=>$error); }

            if($setup['multiple'] || $setup['inputtype']=='checkbox' || $fields[$key]['type']=='checkbox' || $fields[$key]['type']=='posid'){
                if(!empty($postdata[$key]) && is_array($postdata[$key])){
                    $postdata[$key] = implode(',',$postdata[$key]);
                }
            }elseif($fields[$key]['type']=='linkage'){
                $postdata[$key] = array_filter($postdata[$key]);
                $postdata[$key] = end($postdata[$key]);
            }elseif($fields[$key]['type']=='datetime'){
                $postdata[$key] = !empty($postdata[$key])?strtotime($postdata[$key]):'';
            }elseif(in_array($fields[$key]['type'],array('image','file','images','files')) || $key=='thumb'){
                $arrData = array();
                if(is_array($postdata[$key])){
                    foreach($postdata[$key]['path'] as $k=>$v){
                        $arrData[$k]['path'] = $v;
                        $arrData[$k]['title'] = $postdata[$key]['title'][$k];
                    }
                }
                $postdata[$key] = json_encode($arrData);
            }
        }
        return array('post'=>$postdata);
    }

    /** 获取过滤条件
     * @param array $listsearch 模型检索字段
     * @return array
     */
    function getConds($listsearch=array()){
        $where = array();

        $array = array('k','q');
        foreach($listsearch as $v){
            if(!$this->fieldsinfo[$v]){ continue; }

            if(in_array($this->fieldsinfo[$v]['type'],array('catid','select','radio','checkbox','posid')) && !in_array($v,$array)){
                $array[] = $v;
            }
        }

        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }

        if(!empty($_GET['q'])){
            $where[] = "`".trim($_GET['k'])."` LIKE '%".addslashes($_GET['q'])."%'";
        }

        unset($array[0]);
        unset($array[1]);
        foreach($array as $v){
            if(isset($_GET[$v]) && $_GET[$v] !== ''){
                if($this->fieldsinfo[$v]['type']=='catid'){
                    $where[] = $v.$this->category->condArrchild($_GET[$v]);
                }else{
                    $where[] = "find_in_set('".$_GET[$v]."',`$v`)";
                }
            }
        }

        return $where;
    }

    #获取检索表单
    function searchForm($listsearch=array(),$get=array()){
        $html = '';
        $k = isset($get['k']) ? $get['k'] : '';
        $q = isset($get['q']) ? $get['q'] : '';

        $array_q = array();
        $array_s = array();
        foreach($listsearch as $v){
            if(!$this->fieldsinfo[$v]){ continue; }

            if(in_array($this->fieldsinfo[$v]['type'],array('title','text','textarea','editor','number'))){
                $array_q[$v] = $this->fieldsinfo[$v]['name'];
            }
            if(in_array($this->fieldsinfo[$v]['type'],array('catid','select','radio','checkbox','posid'))){
                $array_s[] = $v;
            }
        }

        #生成select k
        $array_q['id'] = 'ID';
        $html .= $this->form->select($array_q, $k, 'name="k" id="k"');

        #生成input q
        $html .= '<input type="text" name="q" id="q" class="form-i w140 sitem" value="'.$q.'" />';

        #生成select get
        foreach($array_s as $v){
            if(in_array($this->fieldsinfo[$v]['type'],array('catid'))){
                $catid = isset($get['catid']) ? $get['catid'] : '';
                $this->load->model('category');
                $html .= '<select name="catid" id="catid">';
                $html .= '<option value="">所有栏目</option>';
                $html .= $this->category->category_option($catid, $this->moduleinfo['id'], true);
                $html .= '</select>';
            }
            if(in_array($this->fieldsinfo[$v]['type'],array('posid'))){
                $getv = isset($get[$v]) ? $get[$v] : '';
                $res_posid = $this->db->select('select * from ###_posid order by listorder,id');
                foreach($res_posid as $key=>$r) {
                    $options[$r['id']]=$r['name'];
                }
                $html .= $this->form->select($options,$getv,'name="'.$v.'" id="'.$v.'"',$this->fieldsinfo[$v]['name']);
            }
            else{
                $optionsarr = array();
                if($this->fieldsinfo[$v]['setup']['options']){
                    $getv = isset($get[$v]) ? $get[$v] : '';
                    $optionsarr = $this->base->explodeChar($this->fieldsinfo[$v]['setup']['options']);
                    $html .= $this->form->select($optionsarr,$getv,'name="'.$v.'" id="'.$v.'"', $this->fieldsinfo[$v]['name']);
                }
            }
        }

        return $html;
    }

}