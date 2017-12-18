<?php
/**
 * ZZCMS 模型字段管理
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class field extends Lowxp{
    function __construct(){
        $this->moduleid = (int) $_REQUEST['moduleid'];

        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!module/index','name'=>'模型管理'),
            1=>array('url'=>'#!module/edit?com=xshow|添加模型','name'=>'添加模型'),
            2=>array('url'=>'#!field/index/?moduleid='.$this->moduleid,'name'=>'字段管理'),
            3=>array('url'=>'#!field/edit/?moduleid='.$this->moduleid.'&com=xshow|添加字段','name'=>'添加字段'),
        );

        parent::__construct();

        #加载
        $this->load->model('field');

        $this->list = $this->db->select("SELECT * FROM ###_module_field WHERE moduleid=".$this->moduleid." ORDER BY listorder,id");
        $this->module = $this->db->get("SELECT issystem,title,name FROM ###_module WHERE id=".$this->moduleid);
        $this->smarty->assign('moduleid',$this->moduleid);
        $this->smarty->assign('module',$this->module);
    }

    function index(){
        #禁止删除或更新状态的字段
        $this->smarty->assign('nodelete',array('catid','title','status','createtime','userid','username','thumb','keywords','description','posid','url'));
        $this->smarty->assign('nostatus',array('catid','title','status','createtime'));

        $data['list'] = $this->list;

        $this->smarty->assign('data',$data);
        $this->smarty->assign('btnNo',2);
        $this->smarty->display('manage/field/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){

            $post = $_POST['post'];
            $post['setup'] = $_POST['setup'];
            $post['moduleid'] = $this->moduleid;
            $post['module'] = $this->module;

            $res = $this->field->save($post);

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!field/index?moduleid=".$this->moduleid."'");
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            exit;
        }

        $id = (int) $_GET['id'];
        $row = array();
        $step = array();

        //编辑
        if($id){
            $row = $this->db->get("SELECT * FROM ###_module_field WHERE id=".$id);
            $this->smarty->assign('id',$id);
        }

        #所有验证规则
        $array = $this->base->validate();
        $validate = array();
        foreach($array as $k=>$v){ $validate[$k]=$v[0]; }
        $this->smarty->assign('field_validate',$this->form->select($validate,$row['pattern'],'name="post[pattern]"','请选择'));

        #所有字段类型
        $this->load->model('content');
        $this->content->chkModule($this->module['name']);
        $fieldsinfo = $this->content->getFieldsinfo();
        $field_type = array(
            ''=>'请选择字段类型',
            'catid'=>'栏目',
            'title'=>array('标题',isset($fieldsinfo['title'])?'disabled':''),
            //'typeid'=>'类别',
            'text'=>'单行文本',
            'textarea'=>'多行文本',
            'editor'=>'编辑器',
            'select'=>'下拉列表',
            'radio'=>'单选按钮',
            'checkbox'=>'复选框',
            'images'=>'图片上传控件',
            'files'=>'文件上传控件',
            'number'=>'数字',
            'datetime'=>'日期和时间',
            'posid'=>'推荐位',
            //'groupid'=>'会员组',
            'linkage'=>'联动菜单',
            'template'=>'模板选择',
            'verify'=>array('验证码',isset($fieldsinfo['verifyCode'])?'disabled':''),
        );
        unset($fieldsinfo);
        $disable = $id ? ' disabled' : '';
        $this->smarty->assign('field_type',$this->form->select($field_type,$row['type'],'name="post[type]" onchange="javascript:field.chang_field(this.value);"'.$disable));

        if(!$id) $this->smarty->assign('btnNo',3);
        else $this->smarty->assign('btnNo',2);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/field/edit.html');
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;
        $row = $this->db->get("SELECT * FROM ###_module_field WHERE id=".$id);

        #验证
        if($row['issystem']){ $this->tip('系统字段不允许被删除',array('type'=>1));die; }

        $del = $this->db->delete('###_module_field', array('id'=>$id));
        if($del){
            #删除模型内容表字段
            $res = $this->db->get("select name from ###_module where id=".$row['moduleid']);
            $field = $row['field'];
            $tablename = $this->db->pre_table($res['name']);
            $del_module =$this->db->query("ALTER TABLE `$tablename` DROP `$field`");

            admin_log('删除模型字段：'.$field.'('.$res['name'].')');
            $this->tip('删除成功',array('type'=>1));
        }
    }

    //获取字段相关html
    function chang_field(){
        $type = trim($_POST['type']);
        if(!$type) die;

        $id = (int) $_POST['id'];
        $row = $id ? $this->db->get("SELECT * FROM ###_module_field WHERE id=".$id) : array();
        $setup = !empty($row['setup']) ? json_decode($row['setup'],true) : array();

        #是否要显示字段类型，需要新建字段时为true;
        $nofield = (bool) $_POST['nofield'];

        #获取一级联动菜单
        if($type=='linkage'){
            $this->load->model('linkage');
            $array = $this->linkage->select(0);
            $list = array();
            foreach($array as $v){
                $list[$v['mark']] = $v['name'].'('.$v['mark'].')';
            }

            $select_linkage = $this->form->select($list,$setup['mark'],'name="setup[mark]"','请选择');
            $this->smarty->assign('select_linkage',$select_linkage);
        }

        $this->smarty->assign('setup',$setup);
        $this->smarty->assign('type',$type);
        $this->smarty->assign('nofield',$nofield);
        $this->smarty->display('manage/field/type.html');
    }
}