<?php
/**
 * ZZCMS 推荐位管理
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class posid extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!posid/index','name'=>'推荐位管理'),
            1=>array('url'=>'#!posid/edit?com=xshow|添加推荐位','name'=>'添加推荐位'),
        );
        parent::__construct();
        #加载
        $this->load->model('posid');
    }

    function index($page=1){
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql = "SELECT * FROM ###_posid ORDER BY listorder,id";
        $data['list'] = $this->page->hashQuery($sql)->result_array();

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/posid/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){

            $post = $_POST['post'];
            $res = $this->posid->save($post);

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!posid/index'");
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
            $row = $this->db->get("SELECT * FROM ###_posid WHERE id=".$id);
            $this->smarty->assign('id',$id);
        }

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/posid/edit.html');
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        admin_log('删除推荐位：'.$this->db->getstr("SELECT name FROM ###_posid WHERE id=".$id));
        $this->db->delete('###_posid', array('id'=>$id));
        $this->tip('删除成功',array('type'=>1));
    }
}