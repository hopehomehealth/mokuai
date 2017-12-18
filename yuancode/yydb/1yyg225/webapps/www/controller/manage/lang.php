<?php
/**
 * ZZCMS 多语言管理
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class lang extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!lang/index','name'=>'多语言管理'),
            1=>array('url'=>'#!lang/edit?com=xshow|添加语言','name'=>'添加语言'),
        );
        parent::__construct();
        #加载
        $this->load->model('lang');
        $this->list = $this->db->select("SELECT * FROM ###_lang ORDER BY listorder,id");
    }

    function index(){
        $data['list'] = $this->list;

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/lang/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){

            $post = $_POST['post'];
            $res = $this->lang->save($post);

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!lang/index'");
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
            $row = $this->db->get("SELECT * FROM ###_lang WHERE id=".$id);
            $this->smarty->assign('id',$id);
        }

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/lang/edit.html');
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        #至少保留一个
        if(count($this->list) == 1){
            $this->tip('必须保留一个语言',array('type'=>1));die;
        }

        admin_log('删除多语言：'.$this->db->getstr("SELECT name FROM ###_lang WHERE id=".$id));
        $this->db->delete('###_lang', array('id'=>$id));
        $this->tip('删除成功',array('type'=>1));
    }
}