<?php
/**
 * 225 会员等级
 *
 */

class member_rank extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!member_rank/index','name'=>'会员等级'),
            1=>array('url'=>'#!member_rank/edit?com=xshow|添加会员等级','name'=>'添加会员等级'),
        );
        parent::__construct();
        #加载
        $this->load->model('member');
    }

    function index($page=1){
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql = "SELECT * FROM ".$this->member->rankTable." ORDER BY id";
        $data['list'] = $this->page->hashQuery($sql)->result_array();

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/member/member_rank.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){
            $res = $this->member->rank_save();

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
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
            $row = $this->db->get("SELECT * FROM ". $this->member->rankTable ." WHERE id=".$id);
        }else{

        }

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/member/member_rank_edit.html');
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        admin_log('删除会员等级：'.$this->db->getstr("SELECT rank_name FROM ".$this->member->rankTable." WHERE id=".$id));
        $this->db->delete($this->member->rankTable, array('id'=>$id));
        $this->tip('删除成功',array('type'=>1));
    }
}