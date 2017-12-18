<?php

/**
 * 圈子
 */
class quanzi extends Lowxp {

    function __construct() {
        parent::__construct();
        $this->load->model('yunbuy');
        $this->load->model('quanzi');
        $this->smarty->assign('navMark', 'quanzi');
    }

    function index($page = 1) {
        $this->load->model('taglib');
        $this->load->model('yuncat');
        $template = 'index.html';
        $template_mobile = 'lists.html';

        $where = '';
        $cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : 0;
        if ($cid) {
            $cat = $this->db->get("SELECT * FROM yuncat WHERE id = '$cid'");
            if (!empty($cat))
                $where.=" AND b.cid" . $this->yuncat->condArrchild($cid);
        }
        $this->smarty->assign('cid', $cid);

        $send = isset($_GET['send']) ? intval($_GET['send']) : 0;
        $this->smarty->assign('send', $send);

        //已发布与未发布圈子条件
        if ($send == 1) {
            $where .= " AND b.qishu>0";

            //1小时前发布且没人参拍的不显示
            $time = time() - $this->quanzi->left_time;
            $where .= " AND ((b.add_time <= $time AND b.buy_num > 0) or b.add_time > $time)";
        } else {
            $where .= " AND b.qishu=0";
        }

        $where .= " AND b.gobuy=2";
        $title = $this->L['unit_yun_team'] . $this->L['unit_yun'];

        //只显示我发布的
        $manage = isset($_REQUEST['manage']) ? intval($_REQUEST['manage']) : 0;
        if ($manage == 1 && isset($_SESSION['mid'])) {
            $where .= " AND q.qz_mid=" . $_SESSION['mid'];
        }
        $this->smarty->assign('manage', $manage);

        #排序
        $order = in_array($_GET['k'], array('need_num', 'add_time')) ? $_GET['k'] : 'add_time';
        $sort = in_array($_GET['s'], array('desc', 'asc')) ? $_GET['s'] : 'desc';
        switch ($_GET['order']) {
            case 'new':
                $order = 'add_time';
                break;
            case 'need_numa':
                $order = 'custom_price';
                $sort = 'asc';
                break;
            case 'need_numd':
                $order = 'custom_price';
                $sort = 'desc';
                break;
        }


        #分页
        $_GET['page'] = intval($page);
        $size = !empty($_REQUEST['size']) ? intval($_REQUEST['size']) : 10;
        $this->load->model('page');
        $this->page->set_vars(array('per' => $size));

        //搜索
        if (isset($_REQUEST['q']) && !empty($_REQUEST['q'])) {
            $this->load->model('auction');
            if ($page == 1)
                $this->auction->setSearch($_REQUEST['q']);
            $where .= " AND b.title LIKE '%" . htmlspecialchars(trim($_REQUEST['q'])) . "%'";
        }

        $sql = "SELECT b.*,q.* FROM ###_yunbuy AS b " .
                "LEFT JOIN ###_goods AS g ON g.id = b.goods_id " .
                "LEFT JOIN ###_yunqz AS q ON b.buy_id=q.qz_buy_id " .
                "WHERE b.end_num > 0 AND b.is_show=1 $where ORDER BY b.$order $sort";
        $list = $this->page->hashQuery($sql)->result_array();

        $this->load->model('upload');
        $list = $this->upload->getImgUrls($list, 'cover', 'gallery', array('src'));

        if ($list) {
            foreach ($list as $key => $val) {
                if (!empty($val['ext_info'])) {
                    $ext_info = unserialize($val['ext_info']);
                    if (!empty($ext_info))
                        $val = array_merge($val, $ext_info);
                }
                $val['jindu'] = sprintf("%.2f", $val['buy_num'] / $val['need_num'] * 100);
                $val['qz_sn_name'] = $val['qz_sn'] ? "（圈号" . $val['qz_sn'] . "）" : '';
                $val['imgw'] = 100;
                $val['imgh'] = 100;
                $val = $this->yunbuy->getThumb($val, 1);
                $val['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200,'type'=>1));
                $list[$key] = $val;
            }
        }

        #异步加载
        if ($_REQUEST['ajaxcontent']) {
            $data = array();
            if (!empty($list)) {
                $data['yunbuy'] = $list;
            }
        }else {
            //分类加载
            $yuncat = $this->yuncat->select();

            $data['yunbuy'] = $list;
            $cat_array = array();
            foreach ($yuncat as $val) {
                $val['catname_en'] = 'cid:' . $val['id'];
                $cat_array[] = $val;
            }
            array_unshift($cat_array, array('catname' => '全部商品', 'catname_en' => "cid:'',limit:''"));
            foreach ($cat_array as $key => $val) {
                $cat_array[$key]['catname_en'] = $val['catname_en'] . ',ckey:' . $key;
            }
            $data['cat'] = $cat_array;
            $data['title'] = $this->business_row['bus_name'] . '_商家店铺';
        }

        $code = 1;
        $this->api_result(compact('data','code'));
    }

     /**
     * 圈子详情
     */
    function detail($id = '', $op = '') {
        $id = intval($id);
        $data = array();
        if (empty($id))
            $this->msg();
        $row = $this->yunbuy->yuninfo($id);
        if(empty($row)) $this->api_result(array('msg'=>'商品数据不存在'));
        if($row['is_show'] == 0)  $this->api_result(array('msg'=>'商品无法正常显示'));

        if ($row['gobuy'] != 2) {
            $this->msg();
        }

        //合并圈子配置
        $array = $this->quanzi->get(array('qz_buy_id' => $id));
        if ($array) {
            $row = array_merge($row, $array);
        }

        //1小时前发布且没人参拍的自动失效
        $time = time() - $this->quanzi->left_time;
        if ($row['qz_sn'] && $row['add_time'] <= $time && $row['buy_num'] <= 0) {
            $this->db->save('yunbuy', array('is_show' => 0), '', array('buy_id' => $id));
            $this->msg();
        }

        #商品来源
        $goods = $this->db->get("SELECT * FROM ###_goods WHERE id = '$row[goods_id]'");
        $from = explode('|', $goods['desc']);
        $this->smarty->assign('from', $from);
        $this->smarty->assign('goods', $goods);

        #超过等待时间时开奖
        if (!empty($row['wait_time']) && RUN_TIME >= $row['wait_time'] && empty($row['luck_code'])) {
            $this->yunbuy->lottery($id);
            $row = $this->yunbuy->yuninfo($id);
        }

        //合并参数
        $ext_info = unserialize($row['ext_info']);
        $this->smarty->assign('ext_info', $ext_info);

        #商品详情
        $row['goods_body'] = $this->db->getstr("SELECT content FROM ###_goods WHERE id = '$row[goods_id]'", 'content');

        #商品图片
        $thumbs = json_decode($row['thumbs'], true);
        $this->load->model('taglib');
        if (!empty($thumbs)) {
            $row['pics'] = array();
            foreach ($thumbs as $k => $v) {
                $v['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$v['path'],'width'=>500,'height'=>300));
                $row['pics'][$k] = $v;
            }
        } else {
            $row['pics'] = json_decode($row['pics'], true);
            $picdata = array();
            if (is_array($row['pics'])) {
                foreach ($row['pics'] as $v)
                    $picdata[] = array('id' => $v);
                $this->load->model('upload');
                $row['pics'] = $this->upload->getGalleryImgUrls($picdata, array('middle', 'src', 'thumb'));
            } else {
                $row['pics'] = array('', '', '', '', '', '');
            }
        }

        $qty_config = intval($this->site_config['qty']);
        $row['jindu'] = number_format($row['buy_num'] / $row['need_num'] * 100, 1);
        $row['max_mun'] = $row['end_num'] >= $qty_config ? $qty_config : $row['end_num'];

        if ($row['luck_code'])
            $row['residue'] = str_split(fmod($row['time_total'] + $row['kjjg'], $row['need_num']));
        $row['kjjg_str'] = $row['kjjg'];
        $row['kjjg'] = !empty($row['kjjg']) ? str_split($row['kjjg']) : '';

        if (STPL == 'mobile') {
            $row['head'] = $this->L['unit_yun_tem'] . "详情";
        }

        $this->smarty->assign('row', $row);

        #待开奖时间
        if ($row['wait_time'])
             $data['end_time'] = ($row['wait_time']-time())*1000;

        #您的参与记录
        $join_member = $_SESSION['mid'] && empty($row['luck_code']) ? $_SESSION['mid'] : $row['member_id'];
        $join_arr = $this->yunbuy->getyunDb(" AND d.mid = '$join_member' AND d.buy_id = '$id' AND d.status <> 1");

        $member_join = array();
        if ($join_arr) {
            foreach ($join_arr as $key => $val) {
                if (empty($val['yun_code']))
                    continue;
                $member_join[] = $val['yun_code'];
                $join_arr[$key]['code'] = explode(",", $val['yun_code']);
            }
            $member_join = explode(",", implode(",", $member_join));
        }
        $data['join_arr'] = $join_arr;
        $data['member_join'] = $member_join;
        $data['member_join_count'] = count($member_join);

        if ($row['last_dbtime']) {
            #全站参与记录
            $arr = $this->yunbuy->cacheYunInfo($id);
            $data['site_join'] = $arr['join'];
        }

        #中奖者信息
        if ($row['member_id']) {
            $luck_code = str_split($row['luck_code']);
            $this->smarty->assign('luck_code', $luck_code);
            $this->load->model('member');
            $luck_member = $this->member->member_info($row['member_id']);
            $luck_member2 = $this->db->get("SELECT ip,add_time,db_time FROM ###_yundb WHERE mid = '$row[member_id]' AND buy_id = '$row[buy_id]' AND luck_code <> ''");
            if (!empty($luck_member2))
                $luck_member = $luck_member2 + $luck_member;
            $this->smarty->assign('luck_member', $luck_member);
        }
        $catname = $this->db->getstr("SELECT catname FROM ###_yuncat WHERE id = '$row[cid]'");

        $row['qz_sn_name'] = $row['qz_sn'] ? "（圈号" . $row['qz_sn'] . "）" : '';
        $data['info'] = $row;

        #点击量
        $this->db->update('yunbuy', "goods_click = goods_click+1", array('buy_id' => $id));
        $data['unit_yun_button'] = '立即参与';
        $data['unit_yun'] = $this->L['unit_yun'];
        $data['unit_go_buy'] = $this->L['unit_go_buy'];
        $data['share'] = array('text'=>$row['qz_sn_name'].$row['title'].$row['goods_subtit'],'url'=>url('/quanzi/detail/').$id,'pic'=>$this->taglib->_fileurl(array('source'=>$row['imgurl_src'],'width'=>500,'height'=>300)),'wxKey'=>$this->site_config['wxKey']);
        $this->api_result(array('data'=>$data));
    }
    /**
     * 奖品期号
     */
    function ajax_qishu($page=1){
        if(!isAjax()){ $this->msg(); }
        $id=intval($_GET['id']);
        $row = $this->yunbuy->yuninfo($id);

        $list = $this->yunbuy->getyunbuy("sid = '$row[sid]' AND is_show = 1 ORDER BY qishu DESC",15,$page,"*",'href="/yunbuy/ajax_qishu/{num}?id='.$id);

        $this->smarty->assign('list',$list);
        $this->smarty->display('yunbuy/ajax_qishu.html');
    }

    /** 往期揭晓
     * @param int $page
     */
    function ajax_win($page=1){
        $this->load->model('taglib');
        $id=intval($_REQUEST['id']);

        $sql = "SELECT sid FROM ###_yunbuy ".
               "WHERE buy_id = $id";
        $sid = $this->db->getstr($sql);

        $size = 10;
        $list = $this->yunbuy->getyunbuy("sid='$sid' AND buy_id<$id AND is_show=1 AND luck_code > 0 ORDER BY buy_id DESC",$size,$page,"*");
        $list = $this->db->lJoin($list,'yundb','id,buy_id,mid,username,ip,luck_code,db_time','buy_id','buy_id','',"status=3");
        $list = $this->db->lJoin($list,'member','mid,nickname,photo','mid','mid');
        foreach($list as $k=>$v){
            #统计中奖会员总参与次数
            $sql = "SELECT SUM(qty) FROM ###_yundb ".
                   "WHERE mid='$v[mid]' AND buy_id='$v[buy_id]' AND status<>1";
            $v['mid_buy_num'] = $this->db->getstr($sql);
            $v['last_dbtime'] = microtime_format($v['last_dbtime'],'Y-m-d H:i:s');
            $v['db_time'] = microtime_format($v['db_time'],'Y-m-d H:i:s');
            $v['username'] = nickname($v['username'],$v['nickname']);
            $v['ip_str'] = cityIp($v['ip']);
            $v['photo'] = $this->taglib->_photo(array('source'=>$v['photo'],'size'=>80));
            $list[$k] = $v;
        }
        $this->api_result(array('data'=>$list));
    }
    /**
     * 参与记录
     */
    function ajax_join($page=1){
        $this->load->model('taglib');
        $id=intval($_REQUEST['id']);
        $size = 10;
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>$size,'url'=>''));
        $list = $this->page->hashQuery("SELECT username,mid,qty,qishu,db_time,ip FROM ###_yundb WHERE buy_id = '$id' AND status <> 1 ORDER BY db_time DESC",'')->result_array();
        $list = $this->db->lJoin($list,'member','mid,nickname,photo','mid','mid');
        $join_arr = array();

        if($list){
            foreach($list as $key=>$val){
                $data = microtime_format($val['db_time'],'Y-m-d');
                $val['yun_code'] = explode(",",$val['yun_code']);
                $val['photo'] = $this->taglib->_photo(array('source'=>$val['photo'],'size'=>80));
                $val['username'] = nickname($val['username'],$val['nickname']);
                $val['ip_str'] = cityIp($val['ip']);
                $val['db_time'] =  microtime_format($val['db_time'],'Y-m-d H:i:s.x');
                $join_arr[$data][$key] = $val;
            }
            $data = array();
            if(!empty($join_arr)){
                foreach($join_arr as $key=>$val){
                    $list_arr = array();
                    foreach($val as $v) $list_arr[] = $v;
                    $data[] = array('time'=>$key,'list'=>$list_arr);
                }
            }
        }
        $this->api_result(array('data'=>$data));
    }
    /**
     * 晒单
     */
    function ajax_share($page=1){
        $this->load->model('taglib');
        $id=intval($_GET['id']);
        $yuninfo = $this->yunbuy->yuninfo($id);
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>15,'url'=>'href="/yunbuy/ajax_share/{num}?id='.$id));
        $list = $this->page->hashQuery("SELECT s. *,m.photo,m.nickname FROM ###_yunbuy as b,###_share AS s LEFT JOIN ###_member AS m ON m.mid = s.mid WHERE b.sid = '$yuninfo[sid]' AND b.buy_id = s.obj_id AND s.extension_code = ".CART_DB)->result_array();
        if(!empty($list)){
            foreach($list as $key=>$val){
                $val['addtime'] = date('Y-m-d H:i:s',$val['addtime']);
                $val['photo'] = $this->taglib->_photo(array('source'=>$val['photo'],'size'=>80));
                $val['username'] = nickname($val['username'],$val['nickname']);
                $val['content'] = mb_substr($val['content'],0,120,'utf-8');
                $val['thumb'] = $this->taglib->_fileurl(array('source'=>$val['thumb'],'width'=>100));
                $list[$key] = $val;
            }
        }
        $this->api_result(array('data'=>$list));
    }
    /**
     * 计算详情
     */
    function ajax_result($id=0){
        $row = $this->yunbuy->yuninfo($id);
        if(empty($row['last_dbtime'])) $this->api_result(array('msg'=>'该奖品未'.$this->L['unit_kaijiang']));
        $row['kjjg_str'] = $row['kjjg'];
        $row['last_dbtime_str'] = microtime_format($row['last_dbtime'],'Y-m-d H:i:s.x');
        if($row['luck_code']) $row['residue'] = str_split(fmod($row['time_total']+$row['kjjg'],$row['need_num']));
        $data = array();
        $data['info'] = $row;
        $data['is_ssc'] = $this->site_config['is_ssc'];
        #全站参与记录
        $site_join = $this->yunbuy->getyunDb("AND d.status <> 1 AND d.db_time <= '$row[last_dbtime]' ORDER BY db_time DESC",105,1);
        if(!empty($site_join)){
            foreach($site_join as $key=>$val){
                $site_join[$key]['db_time_a'] = microtime_format($val['db_time'],'Y-m-d');
                $site_join[$key]['db_time_b'] = microtime_format($val['db_time'],'H:i:s.x');
                $nickname = $this->db->getstr("SELECT nickname FROM member WHERE mid = $val[mid]");
                $site_join[$key]['username'] = nickname($val['username'],$nickname);
            }
        }
        $data['site_join'] = $site_join;
        $this->api_result(array('data'=>$data));
    }
    
    
    //发起圈子（弹窗）
    function checkSendQz() {
        if (!isAjax())
            die;

        //先登录
        $data = $this->quanzi->checkLogin();
        if ($data['error']) {
            die(json_encode($data));
        }

        //商品合法性验证
        $data = $this->quanzi->checkQz($_POST['buy_id']);
        if ($data['error']) {
            die(json_encode($data));
        }

        $row = $data['row'];
        unset($data['row']);

        $data['title'] = $row['title'];
        $data['need_num'] = $row['need_num'];

        die(json_encode($data));
    }

    //发起圈子（执行）
    function sendQz() {
        //商品合法性验证
        $data = $this->quanzi->checkQz($_POST['buy_id']);
        if ($data['error']) {
            $code = 0;
            $msg = '商品不合法';
            $this->api_result(compact('code','msg'));
        }

        $row = $data['row'];
        unset($data['row']);

        //发起表单数据验证
        $data = $this->quanzi->checkSendQz(array(
            'qz_max_num' => $_POST['qz_max_num'],
            'qz_pass' => $_POST['qz_pass'],
        ));
        if ($data['error']) {
            $code = 0;
            $msg = '表单验证失败';
            $this->api_result(compact('code','msg'));
        }

        //获取数据
        $buy_id = $row['buy_id'];
        $qz_max_num = intval($_POST['qz_max_num']);
        $qz_pass = intval($_POST['qz_pass']);

        //发起圈子商品
        $data = $this->quanzi->sendQz(array(
            'yun_info' => $row,
            'qz_max_num' => $_POST['qz_max_num'],
            'qz_pass' => $_POST['qz_pass'],
            'mid' => $_SESSION['mid'],
        ));
        if ($data['error']) {
            $code = 0;
            $msg = '发起失败';
            $this->api_result(compact('code', 'msg', 'data'));
        } else {
            $code = 1;
            $msg = '发起成功';
            $this->api_result(compact('code', 'msg', 'data'));
        }
    }

    //设置圈子（弹窗）
    function checkSetQz() {
        //商品合法性验证
        $data = $this->quanzi->checkQz($_POST['buy_id'], 1);
        if ($data['error']) {
            $code = 0;
            $msg = '商品不合法';
            $this->api_result(compact('code','msg'));
        }

        $row = $data['row'];
        unset($data['row']);

        $data['title'] = $row['title'];
        $data['qz_max_num'] = $row['qz_max_num'];
        $data['qz_pass'] = $row['qz_pass'];

        die(json_encode($data));
    }

    //设置圈子（执行）
    function setQz() {
        //商品合法性验证
        $data = $this->quanzi->checkQz($_POST['buy_id'], 1);
        if ($data['error']) {
            $code = 0;
            $msg = '商品不合法';
            $this->api_result(compact('code','msg'));
        }

        $row = $data['row'];
        unset($data['row']);

        //发起表单数据验证
        $data = $this->quanzi->checkSendQz(array(
            'qz_max_num' => $_POST['qz_max_num'],
            'qz_pass' => $_POST['qz_pass'],
                //'row'        => $row,
                ), 1);
        if ($data['error']) {
            $code = 0;
            $msg = '表单验证失败';
            $this->api_result(compact('code','msg'));
        }

        //获取数据
        $buy_id = $row['buy_id'];
        $qz_max_num = intval($_POST['qz_max_num']);
        $qz_pass = intval($_POST['qz_pass']);

        //发起圈子商品
        $data = $this->quanzi->sendQz(array(
            //'yun_info'   => $row,
            'qz_max_num' => $_POST['qz_max_num'],
            'qz_pass' => $_POST['qz_pass'],
            'mid' => $_SESSION['mid'],
            'qz_buy_id' => $buy_id,
                ), 1);
        
        if ($data['error']) {
            $code = 0;
            $msg = '设置失败';
            $this->api_result(compact('code', 'msg'));
        } else {
            $code = 1;
            $msg = '设置成功';
            $this->api_result(compact('code', 'msg','data'));
        }
    }

    //验证密码（弹窗）
    function checkPassAlertQz() {
        //商品合法性验证
        $data = $this->quanzi->checkQz($_POST['buy_id'], 1);
        if ($data['error']) {
            $code = 0;
            $msg = '商品不合法';
            $this->api_result(compact('code','msg'));
        }

        $row = $data['row'];
        unset($data['row']);

        $data['title'] = $row['title'];

        //发布圈子的会员直接加入购物车
        if ($_SESSION['mid'] == $row['qz_mid']) {
            $data['error'] = 2;
            $_SESSION['qz_pass'] = $row['qz_pass'];
        }

        die(json_encode($data));
    }

    //验证密码（执行）
    function checkPassQz() {
        //商品合法性验证
        $data = $this->quanzi->checkQz($_POST['buy_id'], 1);
        if ($data['error']) {
            $code = 0;
            $msg = '商品不合法';
            $this->api_result(compact('code','msg'));
        }

        $row = $data['row'];
        unset($data['row']);

        //验证已参与人次
        $data = $this->quanzi->checkMaxNum($row['buy_id']);
        if ($data['error']) {
            $code = 0;
            $msg = '人数已满';
            $this->api_result(compact('code','msg'));
        }

        //获取数据
        $buy_id = $row['buy_id'];
        $qz_pass = intval($_POST['qz_pass']);

        //验证密码
        $data = $this->quanzi->checkPassQz(array(
            'yun_info' => $row,
            'qz_pass' => $_POST['qz_pass'],
        ));
        
        if ($data['error']) {
            $code = 0;
            $msg = '验证失败';
            $this->api_result(compact('code', 'msg'));
        } else {
            $code = 1;
            $msg = '验证成功';
            $this->api_result(compact('code', 'msg'));
        }
    }

}
