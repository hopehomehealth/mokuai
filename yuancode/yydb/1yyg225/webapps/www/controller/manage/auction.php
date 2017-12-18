<?php
/**
 * 竞拍活动
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 *
 */

class auction extends Lowxp{
    function __construct(){
        parent::__construct();
        $this->btnMenu = array(
            0=>array('url'=>'#!auction/index','name'=>$this->L['unit_pay'].'管理'),
            1=>array('url'=>"#!auction/edit?com=xshow|添加".$this->L['unit_pay']."活动",'name'=>'添加'.$this->L['unit_pay']),
            2=>array('url'=>'#!auction/log?status=1','name'=>$this->L['unit_winning'].'记录'),
        );

        //按钮菜单
        $this->smarty->assign('btnMenu',isset($this->btnMenu)?$this->btnMenu:array());
        $this->smarty->assign('btnNo',0);

        $this->load->model('auction');
    }

    function index($page=1){
        #检索
        $conds = $this->getConds();
        $condition = " WHERE a.act_type=0 ";
        $condition .= count($conds['where']) ? " AND ".implode(' AND ',$conds['where']) : '';
        $orderby = $conds['order'];

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql = "SELECT a.*,g.thumb FROM ". $this->auction->baseTable . " AS a " .
               "LEFT JOIN ###_goods AS g ON g.id=a.goods_id " .$condition . $orderby;
        $data['list'] = $this->page->hashQuery($sql)->result_array();

        foreach($data['list'] as $k=>$v){
            $ext_info = unserialize($v['ext_info']);
            $v = array_merge($v, $ext_info);

            if($v['thumb']){
                $thumb = json_decode($v['thumb'],true);
                $v['imgurl_thumb'] = $thumb[0]['path'];
            }

            #是否已添加下期预告
            $sql = "SELECT count(act_id) FROM ". $this->auction->baseTable .
                " WHERE goods_id='".$v['goods_id']."' AND start_time>".$v['start_time']."";
            $v['copy'] = $this->db->getstr($sql);

            $v['status'] = $this->auction->status($v);
            $v['start_time']  = date('Y-m-d H:i', $v['start_time']);
            $v['end_time']    = date('Y-m-d H:i', $v['end_time']);

            #中奖人数
            $v['cod_count'] = $this->auction->logList(0, 1, $v['act_id'], 0, AllWIN);

            #标题加期数
            $v['title'] = "(第". $v['qishu'] . "期)".$v['title'];

            $data['list'][$k] = $v;
        }

        #竞拍分类
        $this->smarty->assign('actTypes', $this->auction->actTypes);

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/auction/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){
            $res = $this->auction->save();

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            exit;
        }

        $id = (int) $_GET['id'];
        $act = $_GET['act'];
        $row = array();

        //编辑
        if($id){
            $row = $this->db->get("SELECT * FROM ". $this->auction->baseTable ." WHERE act_id=".$id);
            $row['status'] = $this->auction->status($row);
            $ext_info = unserialize($row['ext_info']);
            $row = array_merge($row, $ext_info);
            $row['bid_user_count'] = $this->auction->logNumberUser($id);

            //复制
            if($act=='copy'){
                $start_time = $row['start_time'];
                $row['start_time'] = $row['end_time'];
                $row['end_time'] = $row['end_time'] + ($row['end_time']-$start_time);
            }else{
                $act='edit';
            }
        }
        else{
            $row = array(
                'winnum'     => -1,
                'win'        => 10,
                'bid_user_count' => 0,
                'posid'      => 0,
            );
            $act='add';
        }

        #商品分类
        $this->load->model('goodscat');
        $select_categorys = $this->goodscat->category_option();
        $this->smarty->assign('select_categorys', $select_categorys);

        #竞拍分类
        $this->smarty->assign('actTypes', $this->auction->actTypes);

        #设置中奖率
        $this->smarty->assign('winList', array(0.01, 0.05, 0.1, 0.5, 1, 5, 10, 20, 50, 100));

        //生成图片控件
        $row['html_thumb'] = $this->form->files('thumb',$row['thumb']);

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->assign('act',$act);
        $this->smarty->display('manage/auction/edit.html');
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        if($this->auction->logNumberUser($id) > 0){
            $this->tip('已经有人出价，不允许被删除！',array('type'=>2));die;
        }

        admin_log("删除".$this->L['unit_pay']."商品：".$this->db->getstr("SELECT title FROM ".$this->auction->baseTable." WHERE act_id=".$id));
        $this->db->delete($this->auction->baseTable, array('act_id'=>$id));
        $this->tip('删除成功',array('type'=>1));
    }

    /** 获取过滤条件
     * @return array
     */
    private function getConds(){
        $where = array();
        $order = ' ORDER BY ';

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if(!empty($_GET['q'])){
            if(in_array($_GET['k'],array('goods_id'))){
                $where[] = "a.".trim($_GET['k'])." LIKE '".addslashes($_GET['q'])."'";
            }else{
                $where[] = "a.".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";
            }
        }

        $array = array('status','cat_type');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if($_GET['status']!==''){
            $status_sql = $this->auction->status_sql($_GET['status'],'a.');
            if($status_sql){
                $where[] = $status_sql;
            }
        }
        if($_GET['cat_type']){
            $where[] = "a.cat_type='".$_GET['cat_type']."'";
        }

        #快速排序
        $order .= isset($_GET['sortby']) ? $_GET['sortby'] : 'act_id';
        $order .= ' ';
        $order .= isset($_GET['sortorder']) ? $_GET['sortorder'] : 'DESC';

        $this->smarty->assign($_GET);
        return array('where'=>$where, 'order'=>$order);
    }

    function log($page=1){
        #检索
        $conds = $this->getCondsLog();
        $condition = " WHERE 1 ";
        $condition .= count($conds['where']) ? " AND ".implode(' AND ',$conds['where']) : '';
        $orderby = $conds['order'];

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql = "SELECT DISTINCT l.log_id,l.*,m.username,m.mobile,ga.title,ga.type,ga.cat_type,ga.deposit FROM ". $this->auction->logTable . " AS l " .
               "LEFT JOIN ###_member AS m ON m.mid=l.bid_user " .
               "LEFT JOIN " . $this->auction->baseTable . " AS ga ON ga.act_id=l.act_id " .
               $condition . $orderby;
        $data['list'] = $this->page->hashQuery($sql)->result_array();
        $act_ids = ',';
        foreach($data['list'] as $k=>$v){
            if($v['type'] == 1 && strpos($act_ids,','.$v['act_id'].',') === false){
                $sql = "SELECT bid_user FROM ###_auction_log WHERE act_id = ".$v['act_id']." ORDER BY log_id DESC LIMIT 1";
                $bid_user = $this->db->getstr($sql);
                $v['last_mid'] = $bid_user;
                $act_ids .= $v['act_id'].',';
            }

            #判断失效
            if($v['status'] == OKWIN && $v['cod_time']<strtotime('-'.$this->auction->disDays.' days')){
                if($v['fdis']==1){ $v['disabled'] = 0; }
                else{ $v['disabled'] = 1; }
            }else{
                $v['disabled'] = 0;
            }

            $data['list'][$k] = $v;
        }

        $this->smarty->assign('btnNo',2);
        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/auction/list_log.html');
    }

    /** 获取过滤条件 出价记录
     * @return array
     */
    private function getCondsLog(){
        $where = array();
        $order = ' ORDER BY ';

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if(!empty($_GET['q'])){
            $where[] = "l.".trim($_GET['k'])." LIKE '".addslashes($_GET['q'])."'";
        }

        if(isset($_GET['title']) && trim($_GET['title'])){
            $where[] = "ga.title LIKE '%".trim($_GET['title'])."%'";
        }
        if(isset($_GET['username']) && trim($_GET['username'])){
            $where[] = "m.username LIKE '%".trim($_GET['username'])."%'";
        }
        if(isset($_GET['start_time']) && trim($_GET['start_time'])){
            $where[] = "l.bid_time>='".strtotime($_GET['start_time'].' 00:00:00')."'";
        }
        if(isset($_GET['end_time']) && trim($_GET['end_time'])){
            $where[] = "l.bid_time<='".strtotime($_GET['end_time'].' 23:59:59')."'";
        }
        if(isset($_GET['frozen']) && trim($_GET['frozen'])){
            $frozen = $_GET['frozen']>=98?0:1;
            $where[] = "l.frozen=".$frozen;
            if($frozen==0){
                $where[] = "l.first=1 AND ga.deposit>0";
            }
            if($_GET['frozen']==98){
                $where[] = "ga.end_time<".time();
            }
        }
        if(!isset($_GET['status'])) $_GET['status'] = '99';
        if($_GET['status'] != 99){
            if($_GET['status'] == 1){
                $where[] = "l.status = '".$_GET['status']."' AND (l.fdis=1 OR l.cod_time>=".strtotime('-'.$this->auction->disDays.' days').")";
            }elseif($_GET['status'] == -2){
                $where[] = "(l.status = '".$_GET['status']."' OR (l.status=1 AND l.fdis=0 AND l.cod_time<".strtotime('-'.$this->auction->disDays.' days')."))";
            }else{
                $where[] = " l.status = '".$_GET['status']."'";
            }
        }

        #快速排序
        $order .= isset($_GET['sortby']) ? $_GET['sortby'] : 'log_id';
        $order .= ' ';
        $order .= isset($_GET['sortorder']) ? $_GET['sortorder'] : 'DESC';

        $this->smarty->assign($_GET);
        return array('where'=>$where, 'order'=>$order);
    }
}