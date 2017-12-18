<?php
/**
 * ZZCMS 模型管理
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class module extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!module/index','name'=>'模型管理'),
            1=>array('url'=>'#!module/edit?com=xshow|添加模型','name'=>'添加模型'),
        );
        parent::__construct();
        #加载
        $this->load->model('module');
    }

    function index(){
        $data['list'] = $this->module->select();

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/module/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){

            $post = $_POST['post'];
            $res = $this->module->save($post);

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!module/index'");
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            exit;
        }

        $id = (int) $_GET['id'];
        $row = array();

        //编辑
        if($id){
            $row = $this->db->get("SELECT * FROM ###_module WHERE id=".$id);
            $this->smarty->assign('id',$id);
        }

        #添加
        else{
            $row['issearch'] = 1;
            $row['listfields'] = '*';
            $row['type'] = 3;
        }

        //所属模块
        $menusOneList = $this->db->select("SELECT id,name FROM ###_menus WHERE parentid=0 AND issystem=1 AND status=1 ORDER BY listorder,id");
        $this->smarty->assign('menusOneList',$menusOneList);

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/module/edit.html');
    }

    //排序
    function order(){
        #数据
        $post = $_POST['listorders'];

        #提交
        if(!empty($post)){
            foreach($post as $k=>$v){
                $where = array('id'=>$k);
                $data['listorder'] = (int) $v;

                $this->db->update('###_module',$data,$where);
            }
            $this->tip('更新排序成功',array('inIframe'=>true));
        }

        #跳转
        $this->exeJs("main.refresh()");
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;
        $row = $this->db->get("SELECT * FROM ###_module WHERE id=".$id);

        #验证
        if($row['issystem']){ $this->tip('系统模型不允许被删除',array('type'=>1));die; }

        admin_log('删除内容模型：'.$row['title']);
        $del = $this->db->delete('###_module', array('id'=>$id));
        if($del){
            #删除模型内容表
            $del_module =$this->db->query("DROP TABLE IF EXISTS `".$this->db->pre_table($row['name'])."`");
            #字段表删除相关配置字段
            $del_field = $this->db->delete('###_module_field', array('moduleid'=>$id));
            #删除关联的后台菜单
            $del_menus = $this->db->delete('###_menus', array('module'=>$row['name']));

            $this->tip('删除成功',array('type'=>1));
        }
    }
}