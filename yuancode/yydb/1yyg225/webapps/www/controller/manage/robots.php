<?php
class robots extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!robots/index','name'=>'模拟购买'),
            1=>array('url'=>'#!robots/add?com=xshow|添加模拟数据','name'=>'添加模拟数据')
        );
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!robots/index','name'=>'机器人购买'),
            1=>array('url'=>'#!robots/add?com=xshow|添加机器人','name'=>'添加机器人')
        );
        parent::__construct();
        $this->load->model('member');
    }

    function index(){
/*
        $row = $this->db->get("select * from ###_menus where `mod`='robots'");
        if($row){
            $this->db->delete('menus', "`mod`='robots'");
        }
        die('访问出错！');
*/
    }
    /**
     * 执行机器人
     */
    function done(){
        //执行夺宝
        $this->load->model('yunbuy');
        $ids = $_POST['ids'];
        $result = array();
        $yunbuy = $this->db->get("SELECT * FROM  ###_yunbuy WHERE buy_id IN ($ids) AND buy_num < need_num ORDER BY RAND( )");
        $member = $this->db->get("SELECT * FROM  ###_member WHERE is_robots = 1 AND status = 1 ORDER BY RAND( )");
        if(!empty($yunbuy) && !empty($member)){
            $num = intval($_POST['num']);
            $fake = intval($_POST['fake']);
            $num = $num>$yunbuy['end_num'] ? $yunbuy['end_num'] : $num;
            if ($num > 0) {
                $order = array();
                $order['order_sn'] = $this->yunbuy->snOrder();
                $order['total'] = $num;
                $order['order_amount'] = $yunbuy['type']==1 ? $num : 0;
                if($yunbuy['type']!=1) $order['pay_points'] = $num;
                $order['mid'] = $member['mid'];
                $order['username'] = $member['username'];
                $order['status'] = 2;
                $order['db_time'] = microtime_float();
                $order['type'] = $yunbuy['type'];

                do{
                    $order['add_time'] = RUN_TIME;
                    $this->db->insert("###_yunorder",$order);
                    $order_id = $this->db->insert_id();
                }while($order_id==0);

                //按付款金额加经验值
                $this->member->accountlog(ACT_DB,array('rank_points'=>$order['order_amount'],'mid'=>$member['mid'],'desc'=>"".$this->L['unit_yun']."在线支付".$order['order_sn']));

                $insert_arr = array();
                $insert_arr['order_id'] = $order_id;
                $insert_arr['mid'] = $member['mid'];
                $insert_arr['username'] = $member['username'];
                $insert_arr['buy_id'] = $yunbuy['buy_id'];
                $insert_arr['goods_name'] = $yunbuy['title'];
                $insert_arr['goods_price'] = $yunbuy['goods_price'];
                $insert_arr['price'] = $num;
                $insert_arr['qty'] = $num;
                $insert_arr['total'] = $num;
                $insert_arr['cover'] = $yunbuy['cover'];
                $insert_arr['qishu'] = $yunbuy['qishu'];
                $insert_arr['type'] = $yunbuy['type'];
                $insert_arr['status'] = 1;
                $insert_arr['ip'] = $member['ip'];
                $insert_arr['add_time'] = RUN_TIME;
                $insert_arr['agents'] = $this->useragent->getOs();
                $this->db->insert("###_yundb",$insert_arr);
                $this->yunbuy->orderPayed($order_id, $fake);
            }
        }

        $result['time'] = date('Y-m-d H:i:s',RUN_TIME);
        $result['username'] = $member['username'];
        $result['goods_name'] = $yunbuy['title'];
        $result['num'] = $num;
        $result['buy_id'] = $yunbuy['buy_id'];
        error_log('result:'.print_r($result,1));
        echo json_encode($result);
    }
    
    /**
     * 模拟执行真人
     */
    function memberDone(){
        //执行夺宝
        $this->load->model('yunbuy');
        $ids = $_POST['ids'];
        $result = array();
        $yunbuy = $this->db->get("SELECT * FROM  ###_yunbuy WHERE buy_id IN ($ids) AND buy_num < need_num ORDER BY RAND( )");
        $member = $this->db->get("SELECT * FROM  ###_member WHERE is_robots = 0 AND status = 1 ORDER BY RAND( )");
        if(!empty($yunbuy) && !empty($member)){
            $num = intval($_POST['num']);
            $num = $num>$yunbuy['end_num'] ? $yunbuy['end_num'] : $num;
            if ($num > 0) {
                $order = array();
                $order['order_sn'] = $this->yunbuy->snOrder();
                $order['total'] = $num;
                $order['order_amount'] = $yunbuy['type']==1 ? $num : 0;
                if($yunbuy['type']!=1) $order['pay_points'] = $num;
                $order['mid'] = $member['mid'];
                $order['username'] = $member['username'];
                $order['status'] = 2;
                $order['db_time'] = microtime_float();
                $order['type'] = $yunbuy['type'];
    
                do{
                    $order['add_time'] = RUN_TIME;
                    $this->db->insert("###_yunorder",$order);
                    $order_id = $this->db->insert_id();
                }while($order_id==0);
    
                //按付款金额加经验值
                $this->member->accountlog(ACT_DB,array('rank_points'=>$order['order_amount'],'mid'=>$member['mid'],'desc'=>"".$this->L['unit_yun']."在线支付".$order['order_sn']));
    
                $insert_arr = array();
                $insert_arr['order_id'] = $order_id;
                $insert_arr['mid'] = $member['mid'];
                $insert_arr['username'] = $member['username'];
                $insert_arr['buy_id'] = $yunbuy['buy_id'];
                $insert_arr['goods_name'] = $yunbuy['title'];
                $insert_arr['goods_price'] = $yunbuy['goods_price'];
                $insert_arr['price'] = $num;
                $insert_arr['qty'] = $num;
                $insert_arr['total'] = $num;
                $insert_arr['cover'] = $yunbuy['cover'];
                $insert_arr['qishu'] = $yunbuy['qishu'];
                $insert_arr['type'] = $yunbuy['type'];
                $insert_arr['status'] = 1;
                $insert_arr['ip'] = $member['ip'];
                $insert_arr['add_time'] = RUN_TIME;
                $insert_arr['agents'] = $this->useragent->getOs();
                $this->db->insert("###_yundb",$insert_arr);
                $this->yunbuy->orderPayed($order_id);
            }
        }
    
        $result['time'] = date('Y-m-d H:i:s',RUN_TIME);
        $result['username'] = $member['username'];
        $result['goods_name'] = $yunbuy['title'];
        $result['num'] = $num;
        $result['buy_id'] = $yunbuy['buy_id'];
        error_log('result:'.print_r($result,1));
        echo json_encode($result);
    }

    /**
     * 添加机器人
     */
    function add(){
        if(isset($_POST['Submit'])){
            if(!empty($_POST['member'])){
                $member = explode("\n",$_POST['member']);
                $insert_num = 0;
                $error_insert = array();
                if(!empty($member)){
                    foreach($member as $row){
                        $password = $this->create_password(6);
                        $row = explode(' ',$row);
                        if(strlen($row[0])<4) continue;
                        $data = array();
                        $data['username'] = trim($row[0]);
                        $data['nickname'] = $row[1];
                        $data['password'] = $password;
                        $data['pay_password'] = $password;
                        $result = $this->member->create_user($data);
                        if($result['mid']){
                            $insert_num++;
                            $ip = $this->randip();
                            $this->db->update("###_member",array('realname'=>'爱一元吧','is_robots'=>1,'ip'=>$ip,'lastip'=>$ip),"mid = $result[mid]");
                        }else{
                            $error_insert[] = $data['username'];
                        }
                    }
                }
                $output = array("count" => $insert_num, "message" => "");
                if(!empty($error_insert)) {
                    $output["message"] = "用户名 [" . implode(", ", $error_insert) . "] 已存在";
                }
                echo json_encode($output);
            }else{
                echo "请输入要添加的机器人";
            }
        }

//        $this->smarty->display('manage/robots/add.html');
    }

    /**
     * 随机密码
     * @param int $pw_length
     * @return string
     */
    function create_password($pw_length = 4){
        $randpwd = '';
        for ($i = 0; $i < $pw_length; $i++){
            $randpwd .= chr(mt_rand(33, 126));

        }
        return $randpwd;
    }
    /**
     * 加载夺宝商品
     */
    function load_db($page=1){
        #加载
        $this->load->model('yunbuy');
        #检索
        $_GET['status'] = isset($_GET['status']) ? $_GET['status'] : 1;
        $conds = $this->getConds();
        $condition = " WHERE buy_id<>0 AND end_num != 0";

        $condition .= count($conds) ? ' AND '.implode(' AND ',$conds) : '';
        $orderby = " ORDER BY buy_id DESC ";

        $ids = explode(",",$_GET['ids']);

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>10));

        #数据集
        $sql = "SELECT * FROM ". $this->yunbuy->baseTable . $condition . $orderby;

        $data['list'] = $this->page->hashQuery($sql)->result_array();
        foreach($data['list'] as $k=>$v){
            $v['status'] = $this->yunbuy->status($v);
            $v['true_price'] = $this->db->getstr("SELECT price FROM ###_goods WHERE id = $v[goods_id]");
            $join_count = $this->db->getstr("SELECT SUM(d.qty) FROM ###_yundb AS d LEFT JOIN ###_member AS m ON d.mid = m.mid WHERE m.is_robots = 1 AND d.buy_id = $v[buy_id]");
            $v['join_count'] = !empty($join_count) ? $join_count : 0;
            $data['list'][$k] = $v;
        }

        $html = "";
        if(!empty($data['list'])){
            foreach($data['list'] as $val){
                $check = in_array($val['buy_id'],$ids) ? 'checked' : '';
                $html .= "<tr><td><input type='checkbox' onclick='choose(this,$val[buy_id])' $check value='$val[buy_id]'> $val[buy_id]</td><td id='tit$val[buy_id]'>$val[title]</td><td align='center'>$val[buy_num]/$val[need_num]</td><td align='center'>$val[join_count]</td><td align='center'>$val[goods_price]</td><td align='center'>$val[qishu]/$val[max_qishu]</td></tr>";
            }
        }
        $data['html'] = $html;
        $data['page_total'] = $this->page->pages['total'];
        $data['current_page'] = $this->page->pages['nonce'];
        echo json_encode($data);
    }

    /** 获取过滤条件
     * @return array
     */
    function getConds(){
        $where = array();

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if(!empty($_GET['q'])){
            $where[] = "`".trim($_GET['k'])."` LIKE '%".addslashes($_GET['q'])."%'";
        }

        $array = array('status','type','posid');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if($_GET['status']!==''){
            $status_sql = $this->yunbuy->status_sql($_GET['status']);
            if($status_sql){
                $status_arr = explode('AND ',$status_sql);
                foreach($status_arr as $v){
                    if(trim($v)) $where[] = $v;
                }
            }
        }
        if($_GET['posid']){
            if($_GET['posid']==1){ $where[] = " posid=1"; }
            else{ $where[] = " posid!=1"; }
        }
        if($_GET['type']!='') $where[] = " `type`=".intval($_GET['type']);
        return $where;
    }

    /**
     * 随机国内IP
     */
    function randip(){
        $ip_long = array(

            array('607649792', '608174079'), //36.56.0.0-36.63.255.255

            array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255

            array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255

            array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255

            array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255

            array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255

            array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255

            array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255

            array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255

            array('-569376768', '-564133889'), //222.16.0.0-222.95.255.255

        );

        $rand_key = mt_rand(0, 9);

        $ip= long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));

        return $ip;
    }
}
