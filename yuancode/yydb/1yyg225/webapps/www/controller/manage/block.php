<?php
/**
 * ZZCMS 碎片管理
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class block extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!block/index','name'=>'碎片管理'),
            1=>array('url'=>'#!block/edit?com=xshow|添加碎片','name'=>'添加碎片'),
        );
        parent::__construct();
        #加载
        $this->load->model('block');
    }

    function index($page=1){
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql = "SELECT * FROM ###_block WHERE lang=".LANG_ID." ORDER BY listorder,id";
        $data['list'] = $this->page->hashQuery($sql)->result_array();

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/block/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){
            $res = $this->block->save();

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!block/index'");
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
            $row = $this->db->get("SELECT * FROM ###_block WHERE id=".$id);
            $this->smarty->assign('id',$id);
        }

        //初始化内容
        $row['html_content'] = $this->form->editor('content',$row['content'],'name="post[content]" style="width:100%;height:200px;"',array('toolbar'=>'basic'));

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/block/edit.html');
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        admin_log('删除文章碎片：'.$this->db->getstr("SELECT name FROM ###_block WHERE id=".$id));
        $this->db->delete('###_block', array('id'=>$id));
        $this->tip('删除成功',array('type'=>1));
    }
}