<?php
/**
 * ZZCMS 分享码
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 *
 */

class sharecode extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!sharecode/index','name'=>'分享码管理'),
        );
        parent::__construct();
        #加载
        $this->load->model('sharecode');
    }

    function index($page=1){
        #检索
        $condition = "WHERE id <> 0 ";
        if(!empty($_GET['k'])&&!empty($_GET['q']))  $condition .= " AND ".trim($_GET['k']) . " LIKE '%".trim($_GET['q'])."%'";
        $orderby = " ORDER BY id DESC ";

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql = "SELECT * FROM ###_sharecode " . $condition . $orderby;
        $list = $this->page->hashQuery($sql)->result_array();
        if($list){
            foreach($list as $key=>$val){
                #使用日志
                $list[$key]['log'] = $this->db->select("SELECT * FROM ###_usecode_log WHERE sid = '$val[id]'");
            }
        }

        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/sharecode/list.html');
    }
}