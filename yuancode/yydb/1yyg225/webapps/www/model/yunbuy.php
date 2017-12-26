<?php
/**
 * Class yunbuy_model
 */
class yunbuy_model extends Lowxp_Model{

    public $baseTable = '###_yunbuy';
    function __construct(){}

    //获取夺宝
    function getyunbuy($where="",$page_size=10, $page=1, $feild="*",$url='href="/yunbuy/{num}"'){
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $page_size = empty($page_size) ? (int)$this->site_config['page_size'] : $page_size;
        $this->page->set_vars(array('per'=>$page_size,'url'=>$url));

        //扩展where参数
        if(strpos($where, 'gobuy') === false){
            $where = "gobuy=0 AND ".$where;
        }

        $list = $this->page->hashQuery("SELECT " . $feild . " FROM ###_yunbuy WHERE " . $where)->result_array();

        if($list){
            foreach($list as $key=>$val){
                $val = $this->getThumb($val,1);
                $val['jindu'] = sprintf("%.2f",$val['buy_num']/$val['need_num']*100);
                $list[$key] = $val;
            }
        }
        $this->load->model('upload');
        $list = $this->upload->getImgUrls($list,'cover','gallery',array('src'));
        if(!empty($list) && ISAPI==1){
            foreach($list as $key=>$val){
                $list[$key]['imgurl_src'] = $this->upload->thumb($val['imgurl_src'],array('width'=>'200','height'=>'200'));
            }
        }
        return $list;
    }

    /** 重新获取
     * @param array $val 一元数组
     * @param int $type 1返回主图 2返回展示图集
     */
    function getThumb($val,$type=1,$sizeList=array('src')){
        //主图
        $thumb = json_decode($val['thumb'],true);
        $thumbs = json_decode($val['thumbs'],true);
        if($type==2){
            $pics = array();
            foreach($thumbs as $k=>$v){
                $pics[$k]['imgurl_src'] = $v['path'];
            }
            return $pics;
        }else{
            if($thumb[0]['path']){
                $val['imgurl_src'] = $thumb[0]['path'];
            }else{
                $thumbs = json_decode($val['thumbs'],true);
                if($thumbs[0]['path']){
                    $val['imgurl_src'] = $thumbs[0]['path'];
                }
            }
            foreach($sizeList as $size){
                if(isset($val['imgurl_src'])){
                    $val['imgurl_'.$size] = $val['imgurl_src'];
                }
            }
            return $val;
        }
    }

    //保存数据
    function save($post=''){
        $post = empty($post) ? $_POST['post'] : $post;
        $id = intval($_POST['id']);
        $gobuy = isset($post['gobuy']) ? intval($post['gobuy']) : 0;

        #表单处理
        if(empty($post['goods_id'])){ return array('code'=>10001, 'message'=>'请搜索并选择竞拍商品!'); }
        if(empty($post['title'])){ return array('code'=>10001, 'message'=>'请输入商品名称!'); }
        if(empty($post['cid'])){ return array('code'=>10001, 'message'=>"请选择".$this->L['unit_yun']."分类!"); }

        if($gobuy == 1){
            if($this->base->validate($post['custom_price'],'number')==false || trim($post['custom_price']) <= 0){
                return array('code'=>10001, 'message'=>'购买价格必须是大于0的数字!');
            }
        }else{
            if($this->base->validate($post['wap_display_order'],'number')==false || trim($post['wap_display_order']) < 0 || trim($post['wap_display_order']) > 10){
                return array('code'=>10001, 'message'=>'wap展示顺序必须是0-10的数字!');
            }
            if($this->base->validate($post['home_display_order'],'number')==false || trim($post['home_display_order']) < 0 || trim($post['home_display_order']) > 5){
                return array('code'=>10001, 'message'=>'首页展示顺序必须是0-5的数字!');
            }
            if($this->base->validate($post['goods_price'],'number')==false || trim($post['goods_price']) <= 0){
                return array('code'=>10001, 'message'=>'商品总价必须是大于0的数字!');
            }
            if($this->base->validate($post['price'],'number')==false || trim($post['price']) <= 0){
                return array('code'=>10001, 'message'=>'单次价格必须是大于0的数字!');
            }
            if($this->base->validate($post['max_qishu'],'number')==false || trim($post['max_qishu']) < 0){
                return array('code'=>10001, 'message'=>'最大期数必须是大于等于0的数字!');
            }
            $rc = $post['goods_price']/$post['price'];
            if(ceil($rc) != $rc){
                return array('code'=>10001, 'message'=>'商品总需必须是单次价格的整数倍!');
            }
        }

        $data = $this->base->certW(array(
            'title' => array('name'=>'商品名称','content'=>$post['title']),
            'goods_subtit' => array('name'=>'副标题','content'=>$post['goods_subtit']),
        ), $post['goods_price']);
        if($data['error']>0){
            return array('code'=>10001, 'message'=>$data['error_text']);
        }

        //初始化参数
        if($gobuy == 1){
            $post['end_num'] = $post['need_num'];
        }else{
            if(empty($id)){
                $post['buy_num'] = 0;
                $post['need_num'] = ceil($post['goods_price']/$post['price']);
                $post['end_num'] = $post['need_num'];

                if($gobuy == 2){
                    $post['qishu'] = 0;
                }else{
                    #查询同商品期数
                    $max_qishu = $this->db->get("SELECT qishu,sid FROM ###_yunbuy WHERE goods_id = '$post[goods_id]' AND end_num <= 0 AND type = '$post[type]' AND qishu >= max_qishu ORDER BY buy_id DESC");
                    $issmall = $this->db->getstr("SELECT COUNT(*) FROM ###_yunbuy WHERE goods_id = '$post[goods_id]' AND type = '$post[type]' AND end_num>0");
                    $post['qishu'] = !empty($max_qishu) && empty($issmall) ? $max_qishu['qishu']+1 : 1;
                    if(!empty($max_qishu) && empty($issmall)){
                        $post['sid'] = $max_qishu['sid'];
                        $post['max_qishu'] = $post['max_qishu']+$max_qishu['qishu'];
                    }
                }
            }else{
                $buy_num = $this->db->getstr("SELECT buy_num FROM ###_yunbuy WHERE buy_id = '$id'");
                if(empty($buy_num)){
                    $post['need_num'] = ceil($post['goods_price']/$post['price']);
                    $post['end_num'] = $post['need_num'];
                }else{
                    unset($post['goods_price']);
                }
            }
        }

        $post['add_time'] = RUN_TIME;
        $this->load->model('goods');
        $goods = $this->goods->get($post['goods_id']);
        if(!empty($goods['thumb'])) $post['thumb'] = $goods['thumb'];
        if(!empty($goods['thumbs'])) $post['thumbs'] = $goods['thumbs'];

        #夺宝参数
        $post['ext_info'] = serialize(array(
            'buynum'     => intval($post['buynum']),
            'usernum'   => intval($post['usernum']),
            'isreal'   => intval($post['isreal']),
            'member'   => intval($post['member']),
            'notjoin'   => intval($post['notjoin'])
        ));

        #保存
        $where = $id ? array('buy_id'=>$id) : '';
        $res = $this->db->save($this->baseTable,$post,'',$where);

        if(empty($id) && empty($post['sid'])){
            $new_id = $this->db->insert_id();
            $this->db->update($this->baseTable,array('sid'=>$new_id),array('buy_id'=>$new_id));
        }

        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误
        if($id){
            admin_log('编辑一元购商品：'.$post['title']);
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }else{
            admin_log('添加一元购商品：'.$post['title']);
            /*
            if(!empty($new_id)){
                //埋点范围
                $key_value=$this->site_config['key_value'];
                error_log($key_value);
                $key_value=!empty($key_value)?$key_value:10000;
                $newcode_arr = range(10000001,10000000+$post['need_num']);
                $robot_arr = array();
                if($post['need_num']>10000){
                    array_push($robot_arr,10000000+$post['need_num']);
                    $robot_key = mt_rand(0,$key_value-1);
                    $f=intval($post['need_num']/$key_value);
                    for($i=0;$i<=$f;$i++){
                        $temp=$i*$key_value+$robot_key+10000001;
                        if($temp<(10000000+$post['need_num'])){
                            array_push($robot_arr,$temp);
                        }
                    }
                }
                $newcode_arr = array_diff($newcode_arr,$robot_arr);
                $newcode_arr = implode(',',$newcode_arr);
                $this->db->save("###_yuncollection",array('buy_id'=>$new_id,'yun_code_collection'=>$newcode_arr));
                $robot_arr = implode(',',$robot_arr);
                $this->db->save("###_robotcollection",array('buy_id'=>$new_id,'robot_code_collection'=>$robot_arr));
            }
            */
            if($post['cid']==36||$post['cid']==37){
                $goods_id=$post['goods_id'];
                $this->db->query("LOCK TABLES zz_".$goods_id."_collection WRITE;");
                    for($i=0;$i<ceil($post['need_num']/10000);$i++){
                        $sql="insert into zz_".$goods_id."_collection (buy_id,qishu,num) values ";
                        if(($i+1)==ceil($post['need_num']/10000)){
                            for($j=$i*10000;$j<$post['need_num'];$j++){
                                $tp=10000001+$j;
                                $sql.="(".$new_id.",".$post['qishu'].",".$tp."),";
                            }
                        }else{
                            for($j=$i*10000;$j<($i+1)*10000;$j++){
                                $tp=10000001+$j;
                                $sql.="(".$new_id.",".$post['qishu'].",".$tp."),";
                            }
                        }
                        $sql = rtrim($sql, ',');
                        $this->db->query($sql);
                    }
                    $robot_arr = array();
                    $key_value=$this->site_config['key_value'];
                    $key_value=!empty($key_value)?$key_value:10000;
                    if($post['need_num']>10000){
                        array_push($robot_arr,10000000+$post['need_num']);
                        $robot_key = mt_rand(0,$key_value-1);
                        $f=intval($post['need_num']/$key_value);
                        for($i=0;$i<=$f;$i++){
                            $temp=$i*$key_value+$robot_key+10000001;
                            if($temp<(10000000+$post['need_num'])){
                                array_push($robot_arr,$temp);
                            }
                        }
                    }
                    $sql="update zz_".$goods_id."_collection set is_robot =1 where qishu=".$post['qishu']." and num in (";
                    foreach ($robot_arr as $rval){
                        $sql.=$rval.",";
                    }
                    $sql = rtrim($sql, ',');
                    $sql.=")";
                    $this->db->query($sql);
                    $this->db->query("UNLOCK TABLES ;");
            }
            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');
        }
    }

    //查询状态
    function status_sql($status){
        switch($status){
            case 1:
                $status_sql = " AND buy_num < need_num";
                break;
            case 2:
                $status_sql = " AND luck_code<> '0' ";
                break;
            case 3:
                $status_sql = " AND wait_time<> '' AND luck_code = '0'";
                break;
            case 4:
                $status_sql = " AND qishu = max_qishu ";
                break;
            default:
                $status_sql = '';
        }
        return $status_sql;
    }

    //夺宝状态
    function status($row){
        if($row['buy_num']!=$row['need_num']){
            $status = "<span class='c-green'>进行中</span>";
        }elseif(!empty($row['wait_time']) && empty($row['luck_code']) ){
            $status = "<span class='c-orange'>待揭晓</span>";
        }elseif(!empty($row['luck_code'])){
            $status = "<span class='c-red'>已揭晓</span>";
        }
        return $status;
    }

    //获取开奖结果
    function getlottery($qihao){
        $row = $this->db->get("SELECT * FROM ###_lottery WHERE qihao = '$qihao'");
        return $row['code'];
    }

    //获取夺宝详情
    function yuninfo($id){
        if(empty($id)) return false;
        $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = $id");
        if(empty($row)) return false;
        if($row['need_num']>0){
            $row['jindu'] = sprintf("%.2f",$row['buy_num']/$row['need_num']*100);
        }
        $row = $this->getThumb($row,1,array('middle','src','thumb'));
        #商品图片
        if($row['cover']){
            $picdata = array('id'=>$row['cover']);
            $this->load->model('upload');
            $row['show_cover'] = $this->upload->getGalleryImgUrls($picdata,array('middle','src','thumb'));
        }
        return $row;
    }

    //购物车商品
    function cartgoods($ids='',$type=''){
        $type = isset($_REQUEST['free']) ? 2 : 1;
        $cartgoods = array();
        if($_SESSION['mid']){
            if(!empty($ids)) $where = "AND id IN (".implode(',',$ids).")";
            if($type!=1){
                $where .= " AND type = '$type'";
            }elseif($type==1){
                $where .= " AND (type=1 OR type=3)";
            }
            $cartgoods = $this->db->select("SELECT * FROM ###_yuncart WHERE mid = '$_SESSION[mid]' $where ORDER BY id DESC");
        }else{
            $cart_str = !empty($_REQUEST['cart']) ? $_REQUEST['cart'] : cookie('yuncart');
            if (get_magic_quotes_gpc()) $cart_str = stripslashes($cart_str);//去除斜杠
            $cart_str = base64_decode($cart_str);
            $cartgoods = unserialize($cart_str);
            $cartgoods = is_array($cartgoods) ? $cartgoods : array();
        }
        $cartgoods = $this->db->lJoin($cartgoods,'yunbuy','buy_id,thumb,thumbs','buy_id','buy_id');
        foreach($cartgoods as $k=>$v){
            $v = $this->getThumb($v,1,array('src','thumb'));
            $cartgoods[$k] = $v;
            if($v['type']!=$type){
                if($type==1 && $v['type']==3) continue;
                unset($cartgoods[$k]);
            }
        }

        if(!empty($cartgoods) && $_SESSION['mid']){
            $this->load->model('upload');
            $cartgoods = $this->upload->getImgUrls($cartgoods,'cover','gallery',array('src','thumb'));
        }elseif(!empty($cartgoods)){
            $new_goods = array();
            foreach($cartgoods as $val){
                $new_goods[] = $val;
            }
            $cartgoods = $new_goods;
        }


        return $cartgoods;
    }
    //购物车总价
    function cartTotal($ids='', $type=''){
        $total = 0;
        if($_SESSION['mid']){
            if(!empty($ids)) $where = "AND id IN (".implode(',',$ids).")";
            if($type==2||$type==3){
                $where .= " AND type = '$type'";
            }else{
                $where .= " AND (type=1 OR type=3)";
            }
            $total = $this->db->getstr("SELECT SUM(subtotal) AS total FROM ###_yuncart WHERE mid = '$_SESSION[mid]' $where",'total');
        }else{
            $cartgoods = $this->cartgoods();
            $total = 0;
            foreach($cartgoods as $goods){
                $total += $goods['subtotal'];
            }
        }
        return $total;
    }

    //生成订单号
    function snOrder() {
        /* 选择一个随机的方案 */
        return date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(md5(microtime(true)),true), 7, 13), 1))), 0, 8);
    }

    //清空购物车
    function emptyCart($ids=''){
        $where = 'mid='.$_SESSION['mid'];
        if(is_array($ids)){
            $ids = implode(',',$ids);
        }
        if($ids){
            $where .= " AND id IN($ids)";
            return $this->db->delete("yuncart",$where);
        }
        return $this->db->delete("yuncart",$where);
    }

    //清空购物车(没办法先把这个改掉会员)recchage_discount
    function emptyCart_1($ids=''){
        $where = 'mid='.$_SESSION['mid'];
        if(is_array($ids)){
            $ids = implode(',',$ids);
        }
        $where .= " AND buy_id IN($ids)";
        return $this->db->delete("yuncart",$where);
    }

    //订单信息
    function orderInfo($id='',$where=''){
        $where = $where ? $where : "order_id = '$id'";
        $row = $this->db->get("SELECT * FROM ###_yunorder WHERE $where");
        return $row;
    }
    //订单夺宝商品
    function orderDb($order_id){
        $list = $this->db->select("SELECT * FROM ###_yundb WHERE order_id = '$order_id'");
        return $list;
    }
    //订单信息
    function dbInfo($id='',$where=''){
        $where = $where ? $where : "id = '$id'";
        $row = $this->db->get("SELECT * FROM ###_yundb WHERE $where");
        return $row;
    }

    //更新订单
    function updateOrder($update_arr,$order_id,$where=''){
        #更新云购订单
        $where = empty($where) ? array('order_id'=>$order_id) : $where;
        $this->db->update("###_yunorder",$update_arr,$where);
    }

    //更新夺宝商品
    function updateDb($update_arr,$id,$where=''){
        $where = empty($where) ? array('id'=>$id) : $where;
        return $this->db->update("###_yundb",$update_arr,$where);
    }

    //支付完成后分配夺宝号码
    function orderPayed($order_id, $fake = false){
        $order = $this->orderInfo($order_id);
        $this->load->model('member');
        if($order['status']==2){
            $orderdb = $this->orderDb($order_id);

            #返现给归属用户
            if($this->site_config['order_back'] && $order['used_sharecode']){
                $share = $this->db->get("SELECT mid,id FROM ###_sharecode WHERE code = '$order[used_sharecode]'");
                $this->member->accountlog('admin',array('mid'=>$share['mid'],'user_money'=>$this->site_config['order_back'],'desc'=>'分享码被使用返现收益'));
                $this->db->update("sharecode","used_time = used_time+1",array('code'=>$order['used_sharecode']));
                $insert_arr = array();
                $insert_arr['mid'] = $order['mid'];
                $insert_arr['username'] = $order['username'];
                $insert_arr['sid'] = $share['id'];
                $insert_arr['order_id'] = $order_id;
                $insert_arr['order_sn'] = $order['order_sn'];
                $insert_arr['use_time'] = RUN_TIME;
                $this->db->insert("usecode_log",$insert_arr);
            }

            if($order['type']!=2){
                //奖励邀请用户佣金
                $this->load->model('member');
                $member = $this->member->member_info($order['mid']);
                $is_robots = $member['is_robots'];
                if($member['ivt_id']){
                    $ivt_member = $this->db->get("SELECT mid,username FROM ###_member WHERE mid = '$member[ivt_id]'");

                    //减掉抵用券使用的金额
                    $total = $order['total'];
                    if($order['user_bonus_id']){
                        $bonus_money = $this->db->getstr("SELECT SUM(money) FROM ###_member_bonus WHERE id IN(".$order['user_bonus_id'].")");
                        if(!empty($bonus_money) && $order['total']>=$bonus_money){
                            $total -= $bonus_money;
                        }
                    }

                    //推荐人分销提成
                    if($member['ivt_id'] && !empty($ivt_member) && $total>0){
                        $levels = $this->comss_levels($order['mid']);
                        $comss_po = $this->comss_po();

                        if(!empty($levels)){
                            foreach($levels as $k=>$v){
                                if($comss_po[$k] > 0){
                                    $commission = $total * ($comss_po[$k] / 100);

                                    if($commission>0){
                                        $insert_arr = array();
                                        $insert_arr['mid'] = $v['mid'];
                                        $insert_arr['username'] = $v['username'];
                                        $insert_arr['ivt_mid'] = $order['mid'];
                                        $insert_arr['ivt_username'] = $order['username'];
                                        $insert_arr['order_id'] = $order['order_id'];
                                        $insert_arr['total'] = $total;
                                        $insert_arr['commission'] = $commission;
                                        $insert_arr['desc'] = "邀请会员参与".$this->L['unit_yun']."(订单号$order[order_sn]),获得".$comss_po[$k]."%佣金收益(".$this->member->ivtLevelName($k+1).")";
                                        $this->member->save_commission($insert_arr);
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if($orderdb){
                $key_value=$this->site_config['key_value'];
                $key_value=!empty($key_value)?$key_value:10000;
                $key_rate= $this->site_config['key_rate'];
                $key_rate= !empty($key_rate)?$key_rate:10;
                $log_bool = false;
                $log_desc = "以下商品购买人次超过总需50%（云购订单号：".$order['order_sn']."）：";

                $this->load->library('lock');
                foreach($orderdb as $val){
                    /** 生成云购号加锁段
                     *  加载文件锁，每个云购商品单独一个锁
                     **/
                    $this->lock->config('yun_'.$val['buy_id']);
                    $this->lock->lock();

                    //剩余人次
                    $end_num = $this->db->getstr("SELECT end_num FROM ###_yunbuy WHERE buy_id = '$val[buy_id]'");
                    //剩余人次小于购买数退还剩余金额
                    if($end_num < $val['qty']){
                        $this->load->model('member');
                        $back_points = $val['price']*($val['qty']-$end_num)*$val['multi'];
                        $log_arr = array();
                        $log_arr['mid'] = $val['mid'];
                        $log_arr['username'] = $val['username'];
                        if($val['type']==1){
                            $log_arr['db_points'] = $back_points;
                            $log_arr['desc'] = "参与人次大于剩余人次，退还剩余".$this->L['unit_db_points']." ".$this->L['unit_yun']."订单".$order['order_sn'];
                        }else{
                            $log_arr['pay_points'] = $back_points;
                            $log_arr['desc'] = "参与人次大于剩余人次，退还剩余".$this->L['unit_pay_points']." ".$this->L['unit_yun']."订单".$order['order_sn'];
                        }
                        $this->member->accountlog('admin',$log_arr);
                        $val['qty'] = $end_num;
                        $is_back = true;
                    }
                    
                    //商品详情
                    $yunbuy = $this->yuninfo($val['buy_id']);
                    
                    if($yunbuy['cid']==36||$yunbuy['cid']==37){
                        $goods_id=$yunbuy['goods_id'];
                        $collection = $this->db->select("select count(num) count from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and buy_id='$val[buy_id]'");
                        if($collection[0]['count']==0){//数据不存在
                            //生成所有中奖号码
                            //error_log("before inster:".time());
                            $this->db->query("LOCK TABLES zz_yundb WRITE ,zz_".$goods_id."_collection WRITE;");
                            for($i=0;$i<ceil($yunbuy['need_num']/10000);$i++){
                                $sql="insert into zz_".$goods_id."_collection (buy_id,qishu,num) values ";
                                if(($i+1)==ceil($yunbuy['need_num']/10000)){
                                    for($j=$i*10000;$j<$yunbuy['need_num'];$j++){
                                        $tp=10000001+$j;
                                        $sql.="(".$val['buy_id'].",".$yunbuy['qishu'].",".$tp."),";
                                    }
                                }else{
                                    for($j=$i*10000;$j<($i+1)*10000;$j++){
                                        $tp=10000001+$j;
                                        $sql.="(".$val['buy_id'].",".$yunbuy['qishu'].",".$tp."),";
                                    }
                                }
                                $sql = rtrim($sql, ',');
                                $this->db->query($sql);
                            }
                            
                            //error_log("after inster:".time());
                            //所有已购买次数
                            
                            //error_log("before delete:".time());
                            $sold_code = array();
                            $order_arr = $this->db->select("SELECT * FROM ###_yundb WHERE buy_id = '$val[buy_id]' AND status = '2' ");
                            if(!empty($order_arr)){
                                $solded_code = array();
                                foreach($order_arr as $v){
                                    $sold_code = explode(",",$v['yun_code']);
                                    foreach($sold_code as $code){
                                        $solded_code[$code-10000001] = $code;
                                    }
                                }
                                $sold_code = $solded_code;
                            }
                            
                            if(count($sold_code)>0){
                                $sql="delete from  zz_".$goods_id."_collection  where qishu=".$yunbuy['qishu']." and num in (";
                                foreach ($sold_code as $sval){
                                    if($sval!==''){
                                        $sql.=$sval.",";
                                    }
                                }
                                $sql = rtrim($sql, ',');
                                $sql.=")";
                                $this->db->query($sql);
                            }
                            //error_log("after delete:".time());
                            
                            //所有埋点集
                            //error_log("befor update:".time());
                            $robot_arr = array();
                            if($yunbuy['need_num']>10000){
                                array_push($robot_arr,10000000+$yunbuy['need_num']);
                                $robot_key = mt_rand(0,$key_value-1);
                                $f=intval($yunbuy['need_num']/$key_value);
                                for($i=0;$i<=$f;$i++){
                                    $temp=$i*$key_value+$robot_key+10000001;
                                    if($temp<(10000000+$yunbuy['need_num'])){
                                        array_push($robot_arr,$temp);
                                    }
                                }
                            }
                            //新的值
                            $d_array=array();
                            //重复的值
                            $b_array=array();
                            for($d=0;$d<count($robot_arr);$d++){
                                $dtemp=$robot_arr[$d];
                                $result=$this->db->select("select * from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and num='$dtemp'");
                                $is_used=$result[0];
                                if(empty($is_used)){
                                    $nresult=$this->db->select("select * from ###_".$goods_id."_collection where num>".$dtemp."  and qishu=".$yunbuy['qishu']." limit 0,1");
                                    array_push($d_array,$nresult[0]['num']);
                                    array_push($b_array,$dtemp);
                                }
                            }
                            $robot_arr=array_diff($robot_arr,$b_array);
                            $robot_arr=array_merge($robot_arr,$d_array);
                            $sql="update zz_".$goods_id."_collection set is_robot =1 where qishu=".$yunbuy['qishu']." and num in (";
                            foreach ($robot_arr as $rval){
                                $sql.=$rval.",";
                            }
                            $sql = rtrim($sql, ',');
                            $sql.=")";
                            $this->db->query($sql);
                            //error_log("after update:".time());
                            $this->db->query("UNLOCK TABLES ;");
                        }
                    }
                    
                    if($yunbuy['cid']==36||$yunbuy['cid']==37){
                        //锁表
                        $this->db->query("LOCK TABLES zz_yundb WRITE ,zz_".$goods_id."_collection WRITE;");
                        //对比已购买数额
                        $robot_code=$this->db->select("select * from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=1");
                        if($is_robots&&(count($robot_code)>0)&&$fake==2){//机器人购买流程
                            //对比已购买次数以及剩下的机器人次数
                            //if($fake==2){//if(intval(($yunbuy['buy_num']*$key_rate/$key_value))>=intval(intval($yunbuy['need_num']/$key_value)-count($robot_code)+1)){
                                $lukycode_arr = array();
                                $qt=mt_rand(0,count($robot_code));
                                $num=$this->db->select("select num from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=1 limit ".$qt.",1");
                                $num=$num[0]['num'];
                                if($num!=""){
                                    array_push($lukycode_arr,$num);
                                    $this->db->query("delete from  zz_".$goods_id."_collection  where qishu=".$yunbuy['qishu']." and num=".$num);
                                }
                                if($val['qty']>1){
                                    $mqty=$val['qty']-1;
                                    $numlist=$this->db->select("select num from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0 order by rand() limit ".$mqty);
                                    if(count($numlist)>0){
                                        $sql="delete from  zz_".$goods_id."_collection  where  qishu=".$yunbuy['qishu']." and num in (";
                                        for($b=0;$b<count($numlist);$b++){
                                            $temp=$numlist[$b]['num'];
                                            $sql.=$temp.",";
                                            array_push($lukycode_arr,$temp);
                                        }
                                        $sql = rtrim($sql, ',');
                                        $sql.=")";
                                        $this->db->query($sql);
                                    }
                                    /*
            						$count=$this->db->select("select count(*) count from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0");
            						$count=$count[0]['count'];
            						$sql="delete from  zz_".$goods_id."_collection  where  qishu=".$yunbuy['qishu']." and num in (";
                                    for(;;){
                                        $qtt=mt_rand(0,$count);
                                        $numt=$this->db->select("select num from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0 limit ".$qtt.",1");
                                        $numt=$numt[0]['num'];
                                        if(!array_search($numt,$lukycode_arr)){
                                            array_push($lukycode_arr,$numt);
                                            $sql.=$numt.",";
                                        }
                                        if(count($lukycode_arr)==$val['qty']){
                                            break;
                                        }
                                        
                                    }
                                    $sql = rtrim($sql, ',');
                                    $sql.=")";
                                    $this->db->query($sql);
                                    */
                                }
                                /*
                                $lukycode_arr = array();
                                $mqty=$val['qty'];
                                $numlist=$this->db->select("select num from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0 order by rand() limit ".$mqty);
                                $sql="delete from  zz_".$goods_id."_collection  where  qishu=".$yunbuy['qishu']." and num in (";
                                for($b=0;$b<count($numlist);$b++){
                                    $temp=$numlist[$b]['num'];
                                    $sql.=$temp.",";
                                    array_push($lukycode_arr,$temp);
                                }
                                $sql = rtrim($sql, ',');
                                $sql.=")";
                                error_log('sql:'.$sql);
                                $this->db->query($sql);
                                */
                                /*
        						$count=$this->db->select("select count(*) count from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0");
        						$count=$count[0]['count'];
        						$sql="delete from  zz_".$goods_id."_collection  where  qishu=".$yunbuy['qishu']." and num in (";
                                for(;;){
                                    $qt=mt_rand(0,$count);
                                    $num=$this->db->select("select num from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0 limit ".$qt.",1");
                                    $num=$num[0]['num'];
                                    if(!array_search($num,$lukycode_arr)){
                                        array_push($lukycode_arr,$num);
                                         $sql.=$num.",";
                                    }
                                    if(count($lukycode_arr)==$val['qty']){
                                        break;
                                    }
                                }
                                $sql = rtrim($sql, ',');
                                $sql.=")";
                                $this->db->query($sql);
                                */          
                        }else{//正常购买流程
                            
    						$lukycode_arr = array();
    						$mqty=$val['qty'];
    						$numlist=$this->db->select("select num from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0 order by rand() limit ".$mqty);
    						if(count($numlist)>0){
        						$sql="delete from  zz_".$goods_id."_collection  where  qishu=".$yunbuy['qishu']." and num in (";
        						for($b=0;$b<count($numlist);$b++){
        						    $temp=$numlist[$b]['num'];
        						    $sql.=$temp.",";
        						    array_push($lukycode_arr,$temp);
        						}
        						$sql = rtrim($sql, ',');
        						$sql.=")";
        						$this->db->query($sql);
    						}
    						/*
    						$count=$this->db->select("select count(*) count from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0");
    						$count=$count[0]['count'];
    						$sql="delete from  zz_".$goods_id."_collection  where  qishu=".$yunbuy['qishu']." and num in (";
                            for(;;){
                                $qt=mt_rand(0,$count);
                                $num=$this->db->select("select num from ###_".$goods_id."_collection where qishu=".$yunbuy['qishu']." and is_robot=0 limit ".$qt.",1");
                                $num=$num[0]['num'];
                                if(!array_search($num,$lukycode_arr)){
                                    array_push($lukycode_arr,$num);
                                    $sql.=$num.",";
                                }
                                if(count($lukycode_arr)==$val['qty']){
                                    break;
                                }
                            }
                            $sql = rtrim($sql, ',');
                            $sql.=")";
                            error_log($sql);
                            $this->db->query($sql);
                            */
                        }
                        $this->db->query("UNLOCK TABLES ;");
                    }else{
                        //所有已使用号码
                        $sold_code = array();
                        $order_arr = $this->db->select("SELECT * FROM ###_yundb WHERE buy_id = '$val[buy_id]' AND status = '2' ");
                        if(!empty($order_arr)){
                            $solded_code = array();
                            foreach($order_arr as $v){
                                $sold_code = explode(",",$v['yun_code']);
                                foreach($sold_code as $code){
                                    $solded_code[$code-10000001] = $code;
                                }
                            }
                            $sold_code = $solded_code;
                        }
                        //未生成抽奖号
                        $newcode_arr = range(10000001,10000000+$yunbuy['need_num']);
                        $newcode_arr = array_diff_assoc($newcode_arr,$sold_code);
                        
                        //生成抽奖号
                        shuffle($newcode_arr);
                        $lukycode_arr = array_slice($newcode_arr,0,$val['qty']);
                    }
                    
                    /*
                    //已生成抽奖号
                    $luck_code_list = null;
                    //抽奖号
                    $yuncollection = $this->db->select("select * from ###_yuncollection where buy_id = '$val[buy_id]'");
                    //埋点号
                    $robotcollection = $this->db->select("select * from ###_robotcollection where buy_id = '$val[buy_id]'");
                    //范围
                    $key_value=$this->site_config['key_value'];
                    $key_value=!empty($key_value)?$key_value:10000;
                    //速率
                    $key_rate=$this->site_config['key_rate'];
                    $key_rate=!empty($key_rate)?$key_rate:1;
                    
                    //非新结构构建
                    if(empty($yuncollection)){
                        $sold_code = array();
                        $order_arr = $this->db->select("SELECT * FROM ###_yundb WHERE buy_id = '$val[buy_id]' AND status = '2'");
                        if(!empty($order_arr)){
                            $solded_code = array();
                            foreach($order_arr as $v){
                                $sold_code = explode(",",$v['yun_code']);
                                foreach($sold_code as $code){
                                    $solded_code[$code-10000001] = $code;
                                }
                            }
                            $sold_code = $solded_code;
                        }
                        $yunbuy = $this->yuninfo($val['buy_id']);
                        //所有未使用集
                        $newcode_arr = range(10000001,10000000+$yunbuy['need_num']);
                        $newcode_arr = array_diff_assoc($newcode_arr,$sold_code);
                        //所有埋点集
                        $robot_arr = array();
                        if($yunbuy['need_num']>10000){
                            array_push($robot_arr,10000000+$yunbuy['need_num']);
                            $robot_key = mt_rand(0,$key_value-1);
                            $f=intval($yunbuy['need_num']/$key_value);
                            for($i=0;$i<=$f;$i++){
                                $temp=$i*$key_value+$robot_key+10000001;
                                if($temp<(10000000+$yunbuy['need_num'])){
                                    array_push($robot_arr,$temp);
                                }
                            }
                        }
                        
                        $d_array=array();
                        for($d=0;$d<count($robot_arr);$d++){
                            $dtemp=$robot_arr[$d];
                            if(!in_array($dtemp,$newcode_arr)){
                                array_push($dtemp,$d_array);
                                array_splice($robot_arr,$d);
                            }
                        }
                        
                        $robot_arr=array_merge($robot_arr,$d_array);
                        
                        $newcode_arr = array_diff($newcode_arr,$robot_arr);
                        $newcode_arr = implode(',',$newcode_arr);
                        $this->db->save("###_yuncollection",array('buy_id'=>$val[buy_id],'yun_code_collection'=>$newcode_arr));
                        $robot_arr = implode(',',$robot_arr);
                        $this->db->save("###_robotcollection",array('buy_id'=>$val[buy_id],'robot_code_collection'=>$robot_arr));
                    }
                    
                    //抽奖号
                    $yuncollection = $this->db->select("select * from ###_yuncollection where buy_id = '$val[buy_id]'");
                    //埋点号
                    $robotcollection = $this->db->select("select * from ###_robotcollection where buy_id = '$val[buy_id]'");
                    
                    $robot_code=array();
                    if($robotcollection[0]['robot_code_collection']!=''){
                        $robot_code = explode(',',$robotcollection[0]['robot_code_collection']);
                    }
                    if($is_robots&&(count($robot_code)>0)){//机器人购买流程
                        //所有已购买次数
                        $sold_code = array();
                        $order_arr = $this->db->select("SELECT * FROM ###_yundb WHERE buy_id = '$val[buy_id]' AND status = '2'");
                        if(!empty($order_arr)){
                            $solded_code = array();
                            foreach($order_arr as $v){
                                $sold_code = explode(",",$v['yun_code']);
                                foreach($sold_code as $code){
                                    $solded_code[$code-10000001] = $code;
                                }
                            }
                            $sold_code = $solded_code;
                        }
                        $yunbuy = $this->yuninfo($val['buy_id']);

                        //对比已购买次数以及剩下的机器人次数
                        if(intval((count($sold_code)*$key_rate/$key_value))>=intval(intval($yunbuy['need_num']/$key_value)-count($robot_code)+1)){
                            shuffle($robot_code);
                            $lukycode_arr = array_slice($robot_code,0,1);
                            $remain_arr = array_slice($robot_code,1,count($robot_code)-1);
                            $remain = implode(',',$remain_arr);
                            $this->db->update('robotcollection',array('robot_code_collection'=>$remain),array('buy_id'=>$val[buy_id]));
                            if(intval($val['qty'])>1){//参与次数大于1次的处理
                                $sold_code = array();
                                $sold_code = explode(',',$yuncollection[0]['yun_code_collection']);
                                shuffle($sold_code);
                                $lukycode_arr = array_merge($lukycode_arr,array_slice($sold_code,0,$val['qty']-1));
                                $remain_arr = array_slice($sold_code,$val['qty']-1,count($sold_code)-1);
                                $remain = implode(',',$remain_arr);
                                $this->db->update('yuncollection',array('yun_code_collection'=>$remain),array('buy_id'=>$val[buy_id]));
                            }
                        }else{
                            $sold_code = array();
                            $sold_code = explode(',',$yuncollection[0]['yun_code_collection']);
                            shuffle($sold_code);
                            $lukycode_arr = array_slice($sold_code,0,$val['qty']);
                            $remain_arr = array_slice($sold_code,$val['qty'],count($sold_code)-1);
                            $remain = implode(',',$remain_arr);
                            $this->db->update('yuncollection',array('yun_code_collection'=>$remain),array('buy_id'=>$val[buy_id]));
                        }            
                    }else{//正常购买流程
						$sold_code = array();
                        $sold_code = explode(',',$yuncollection[0]['yun_code_collection']);
                        shuffle($sold_code);
                        $lukycode_arr = array_slice($sold_code,0,$val['qty']);
                        $remain_arr = array_slice($sold_code,$val['qty'],count($sold_code)-1);
                        $remain = implode(',',$remain_arr);
                        $this->db->update('yuncollection',array('yun_code_collection'=>$remain),array('buy_id'=>$val[buy_id]));
                    }
                    
                    */

                    $luck_code_list =implode(',',$lukycode_arr);
                    $param = array();
                    $param['yun_code'] = $luck_code_list;
                    $param['db_time'] = microtime_float();
                    $param['timenum'] = microtime_format($param['db_time'],'Hisx');
                    $param['status'] = 2;
                    if($is_back){
                        $param['qty'] = $val['qty'];
                        $param['total'] = $val['qty']*$val['price'];
                    }

                    //首次夺宝或使用分享码时生成分享码
                    $order_count = $this->db->getstr("SELECT COUNT(*) FROM ###_yunorder WHERE mid = '$order[mid]' AND status = 2");
                    if(($order['used_sharecode'] || $order_count==1) && $this->site_config['order_share'] && $order['type']!=2 && 1==2){
                        $this->load->model('sharecode');
                        $code = $this->sharecode->creat_code($_SESSION['mid'],$this->site_config['order_share']);
                        $this->updateOrder(array('sharecode'=>$code),$order_id);
                        $param['sharecode'] = $code;
                    }

                    //更新商品信息
                    $fake_count = 0;
                    if ($fake) {
                        $fake_count = $val[qty];
                    }
                    $this->db->update($this->baseTable,"buy_num=buy_num+'$val[qty]',end_num=end_num-'$val[qty]',auto_buy_done=auto_buy_done+'$fake_count',fake_num=fake_num+'$fake_count'",array('buy_id'=>$val['buy_id']));

                    //更新参与人数
                    $this->setting->logCount($val['qty']);

                    //删除退还后参与人次为0的记录
                    if($val['qty'] <= 0){
                        $this->db->delete('yundb', array('id'=>$val['id']));
                    }else{
                        $state = $this->updateDb($param,$val['id']);
                    }
                    //删除空yun_code购买
                    if($param['yun_code']==""&&$param['status']==2){
                        $this->db->delete('yundb', array('id'=>$val['id']));
                    }
                    //刷新商品信息查询是否开奖
                    $goods_info = $this->yuninfo($val['buy_id']);
                    if($goods_info['buy_num']>=$goods_info['need_num']){
                        //圈子商品获得佣金
                        $this->load->model('quanzi');
                        $this->quanzi->getReward(array(
                            'yun_info' => $goods_info,
                        ));
                        //fusheng
                        $yuninfo = $this->yuninfo($val['buy_id']);
                        if($yunbuy['cid']==36||$yunbuy['cid']==37){//$yuninfo['need_num']>10000
                            $sleep_time=0;
                            //大于48秒进位
                            $temp_time=$param['db_time'];
                            error_log('temp_time:'.$temp_time);
                            $s_time = microtime_format($temp_time,'s');
                            error_log('s_time:'.$s_time);
                            if(intval($s_time)>48){
                                $param['db_time']=str_pad(strval($temp_time+11),14,"0",STR_PAD_RIGHT);
                                $param['timenum'] = microtime_format($param['db_time'],'Hisx');
                                $state = $this->updateDb($param,$val['id']);
                                $sleep_time=$sleep_time+11;
                            }
                            //计算中奖号码
                            $buy_id=$val['buy_id'];
                            $time_total=$this->sum_time($param['db_time']);
                            error_log('time_total:'.$time_total);
                            $luck_code = 10000001+fmod(floatval($time_total),$yuninfo['need_num']);
                            error_log('luck_code:'.$luck_code);
                            $robot_list = $this->db->select("select yun_code from ###_yundb db,###_member member where db.mid=member.mid and member.is_robots=1 and db.buy_id=".$buy_id);
                            $rlist =array();
                            foreach ($robot_list as $robot_code){
                                $robot_code=explode(',',$robot_code['yun_code']);
                                $rlist=array_merge($rlist,$robot_code);
                            }
                            error_log('rlist-0:'.print_r($rlist,1));
                            $isin=in_array($luck_code,$rlist);
                            error_log('isin:'.$isin);
                            //是否robot已经中奖
                            if($isin){
                                
                            }else{
                                //robot的yun_code
                                if(count($rlist)>0){
                                    array_push($rlist,$luck_code);
                                    sort($rlist);
                                    error_log('rlist-1:'.print_r($rlist,1));
                                    $site=array_keys($rlist,$luck_code);
                                    error_log('site:'.print_r($site,1));
                                    if(count($site)>0){
                                        $si=$site[0];
                                        error_log('si:'.$si);
                                        if(($si+1) < count($rlist)){
                                            $robot_luck_code = $rlist[$si+1];
                                            error_log('robot_luck_code:'.$robot_luck_code);
                                            $yushu=$robot_luck_code-$luck_code;
                                            error_log('yushu:'.$yushu);
                                            $sleep_time=$sleep_time+intval($yushu/1000);
                                            error_log('sleep_time:'.$sleep_time);
                                            //$chushu=($yuninfo['time_total']+$luck_code-10000001)/$yuninfo['need_num'];
                                            //$robot_total=$chushu*$yuninfo['need_num']+$robot_luck_code-10000001;
                                            $param['timenum']=intval($param['timenum'])+$yushu;
                                            error_log('timenum:'.$param['timenum']);
                                            $str_time=str_pad($param['timenum'],9,"0",STR_PAD_LEFT);
                                            error_log('str_time:'.$str_time);
                                            $str_hour=substr($str_time,0,2);
                                            error_log('str_hour:'.$str_hour);
                                            $str_min=substr($str_time,2,2);
                                            error_log('str_min:'.$str_min);
                                            $str_second=substr($str_time,4,2);
                                            error_log('str_second:'.$str_second);
                                            $str_mill=substr($str_time,6,3);
                                            error_log('str_mill:'.$str_mill);
                                            $ymd=microtime_format($param['db_time'],'Y-m-d ');
                                            error_log('ymd:'.$ymd);
                                            $str_db_time=$ymd.$str_hour.":".$str_min.":".$str_second;
                                            error_log('str_db_time:'.$str_db_time);
                                            $db_time = strtotime($str_db_time).".".$str_mill;
                                            error_log('db_time:'.$db_time);
                                            $param['db_time']=$db_time;
                                            error_log('val[id]:'.$val['id']);
                                            $state = $this->updateDb($param,$val['id']);
                                        }
                                    }
                                }
                            }
                            //锁表
                            $this->db->query("LOCK TABLES zz_yundb WRITE ;");
                            sleep($sleep_time);
                            $this->db->query("UNLOCK TABLES ;");
                            //
                        }
                        
                        if(!empty($yuninfo['zdhm'])&&($yunbuy['cid']!=36&&$yunbuy['cid']!=37)){
                            //计算中奖号码
                            $sleep_time=0;
                            $buy_id=$val['buy_id'];
                            error_log('buy_id:'.$buy_id);
                            $time_total=$this->sum_time($param['db_time']);
                            error_log('time_total:'.$time_total);
                            $luck_code = 10000001+fmod(floatval($time_total),$yuninfo['need_num']);
                            error_log('luck_code:'.$luck_code);
                            $zdhm = $yuninfo['zdhm'];
                            error_log('zdhm:'.$zdhm);
                            $max=10000001+$yunbuy['need_num'];
                            if(($zdhm>=10000001)&&($zdhm<=$max)&&($zdhm!=$luck_code)){
                                $yushu=intval($zdhm)-$luck_code;
                                if($yushu<0){
                                    error_log('余数小于0');
                                    $yushu=$yuninfo['need_num']-fmod(floatval($time_total),$yuninfo['need_num'])+$zdhm-10000001;
                                }
                                //大于48秒进位
                                $temp_time=$param['db_time'];
                                error_log('temp_time:'.$temp_time);
                                $s_time = intval(microtime_format($temp_time,'s'));
                                error_log('s_time:'.$s_time);
                                if(($s_time+intval($yushu/1000))>=60){
                                    error_log('temp_time+61+s_time:'.strval($temp_time+61-$s_time));
                                    $param['db_time']=str_pad(strval($temp_time+61-$s_time),14,"0",STR_PAD_RIGHT);
                                    error_log('db_time:'.$param['db_time']);
                                    $param['timenum'] = microtime_format($param['db_time'],'Hisx');
                                    $state = $this->updateDb($param,$val['id']);
                                    error_log('timenum:'.$param['timenum']);
                                    $sleep_time=$sleep_time+61-$s_time;
                                }
                                $time_total=$this->sum_time($param['db_time']);
                                $luck_code = 10000001+fmod(floatval($time_total),$yuninfo['need_num']);
                                $yushu=intval($zdhm)-$luck_code;
                                if($yushu<0){
                                    error_log('余数小于0');
                                    $yushu=$yuninfo['need_num']-fmod(floatval($time_total),$yuninfo['need_num'])+$zdhm-10000001;
                                }
                                $param['timenum']=intval($param['timenum'])+$yushu;
                                $sleep_time=$sleep_time+intval($yushu/1000);
                                error_log('timenum:'.$param['timenum']);
                                $str_time=str_pad($param['timenum'],9,"0",STR_PAD_LEFT);
                                error_log('str_time:'.$str_time);
                                $str_hour=substr($str_time,0,2);
                                error_log('str_hour:'.$str_hour);
                                $str_min=substr($str_time,2,2);
                                error_log('str_min:'.$str_min);
                                $str_second=substr($str_time,4,2);
                                error_log('str_second:'.$str_second);
                                $str_mill=substr($str_time,6,3);
                                error_log('str_mill:'.$str_mill);
                                $ymd=microtime_format($param['db_time'],'Y-m-d ');
                                error_log('ymd:'.$ymd);
                                $str_db_time=$ymd.$str_hour.":".$str_min.":".$str_second;
                                error_log('str_db_time:'.$str_db_time);
                                $db_time = strtotime($str_db_time).".".$str_mill;
                                error_log('db_time:'.$db_time);
                                $param['db_time']=$db_time;
                                error_log('val[id]:'.$val['id']);
                                $state = $this->updateDb($param,$val['id']);
                            }
                            
                            //锁表
                            $this->db->query("LOCK TABLES zz_yundb WRITE ;");
                            sleep($sleep_time);
                            $this->db->query("UNLOCK TABLES ;");
                            //
                        }
                        
                        $this->wait_lottery($val['buy_id'],$param['db_time'],$val['qty']);
                    }
                    if($val['total']*2 >= $val['goods_price']){
                        $log_bool = true;
                        $log_desc .= '<br />'.$val['goods_name'];
                    }

                    //释放文件锁
                    $this->lock->unlock();
                    /** 生成云购号加锁段 END **/
                }

                if($log_bool){
                    $this->member->accountlog(ACT_DB,array(
                        'mid'=>$v['mid'],
                        'desc'=>$log_desc
                    ));
                }
            }
            //直购商品更新库存
            $order_info = $this->db->get("SELECT id FROM ###_goods_order WHERE order_sn='".$order['order_sn']."'");
            if($order_info){
                $order_items = $this->db->select("SELECT * FROM ###_goods_order_item WHERE order_id='".$order_info['id']."'");
                if($order_items){
                    $count_virtual = 0;
                    $this->load->model('virtual');
                    foreach($order_items as $v){
                        //这里操作执行直购送拍币
                        if(number_format($this->site_config['zhigou_lv'],2)>0){
                            $log_arr = array();
                            $log_arr['mid'] = $v['mid'];
                            $log_arr['pay_points'] = ceil($v['buy_num']*$v['sell_price']*$this->site_config['zhigou_lv']);
                            $log_arr['desc'] = "直购送".$this->L['unit_pay_points'];
                            $this->load->model('member');
                            $this->member->accountlog(ACT_ZHIGOU,$log_arr);
                        }
                        if($v['from']=='group' && $v['from_id'] && $v['buy_num']>0){
                            $this->db->update('yunbuy',"need_num=need_num-".$v['buy_num'],"buy_id=".$v['from_id']." AND need_num>=".$v['buy_num']);
                            $this->db->update('yunbuy',"buy_num=buy_num+".$v['buy_num'],array('buy_id'=>$v['from_id']));
                        }
                        //虚拟商品发送卡密
                        $this->virtual->send($v['id'], $v);
                        if($v['virtual'] == 1){
                            $count_virtual++;
                        }
                    }
                    //直购商品全部是虚拟商品时，自动发货
                    if($count_virtual == count($order_items)){
                        $this->load->model('order');
                        $this->order->chageOrderState($order_info['id'],3,'虚拟商品自动发货');
                    }
                }
            }

            //清空购物车
            if(empty($_SESSION['mid'])) $_SESSION['mid'] = $order['mid'];

            $ids = array();
            foreach($orderdb as $k=>$v){
                $ids[$k] = $v['buy_id'];
            }
            if(!empty($ids)){
                $this->emptyCart_1($ids);
            }
        }
    }

    //得到分销比例
    function comss_po(){
        $c = ($this->mod=='manage') ? $this->common : $this->site_config;
        $comss_po = explode(',', trim($c['ivtreg_db']));
        for($i=0;$i<count($comss_po);$i++){
            if(!$comss_po[$i]){
                $comss_po[$i] = 0;
            }else{
                $comss_po[$i] = floatval($comss_po[$i]);
            }
        }
        return $comss_po;
    }

    /** 获取会员所有推荐人信息
     * @param $mid
     * @param int $type 1获取订单额
     * @return array
     */
    function comss_levels($mid){
        $c = ($this->mod=='manage') ? $this->common : $this->site_config;
        $comss_po = explode(',', trim($c['ivtreg_db']));
        static $levels = array();

        $this->load->model('member');
        $member = $this->member->member_info($mid,'mid,username,ivt_id');
        if($member){
            $arr = array(
                'mid' => $mid,
                'username' => $member['username'],
            );

            $levels[] = $arr;
        }

        //存在父级，递归输出
        if($member['ivt_id']){
            if(count($levels)<=count($comss_po)){
                $this->comss_levels($member['ivt_id']);
            }
        }

        unset($levels[0]);
        $array = array();
        foreach($levels as $v){
            $array[] = $v;
        }

        return $array;
    }

    /**
     * 更新待开奖商品
     */
    function wait_lottery($buy_id,$last_dbtime,$qty=1){
        if($qty > 0){
            $goods_info = $this->yuninfo($buy_id);
            $update_arr = array();
            $time = time();
            $hour = date('H',$time);
            $minute = date('i',$time);
            //彩期在每天白天10点至22点，夜场22点至凌晨2点开售；白天10分钟一期，夜场5分钟一期；每日期数：白天72期，夜场48期，共120期；
            if($hour<2){
                $qihao = floor(($time - strtotime(date('Y-m-d 00:00:00',time())))/300)+1;
                //2点不开奖 10点开24期
                if($minute>=55 && $hour==1){
                    $waittime = strtotime(date('Y-m-d 10:03:00'));
                }else{
                    $waittime = $time-$time%300+480;
                }
            }elseif($hour>=2&&$hour<10){
                $qihao = 24;
                $waittime = strtotime(date('Y-m-d 10:03:00',$time));
            }elseif($hour>=10&&$hour<22){
                $qihao = floor(($time - strtotime(date('Y-m-d 10:00:00',time())))/600)+25;
                $waittime = $time-$time%600+780;
            }elseif($hour>=22){
                //超过23:55明天第一期
                if($hour==23&&$minute>55){
                    $update_arr['qihao'] = date('ymd',strtotime('+1 day')).'001';
                }else{
                    $qihao = floor(($time - strtotime(date('Y-m-d 22:00:00',time())))/300)+97;
                }
                $waittime = $time-$time%300+480;
            }
            $c = ($this->mod=='manage') ? $this->common : $this->site_config;
            $waittime = $c['is_ssc'] ? $waittime : RUN_TIME + 60*10;

            $update_arr['qihao'] = empty($update_arr['qihao']) ? date('ymd',$time).sprintf("%03d", $qihao) : $update_arr['qihao'];
            $update_arr['wait_time'] = $waittime;
            //参与记录时间和
            $update_arr['time_total'] = $this->sum_time($last_dbtime);
            $update_arr['last_dbtime'] = $last_dbtime;
            $update_arr['end_time'] = $waittime;
            $state = $this->db->update("###_yunbuy",$update_arr,array('buy_id'=>$buy_id));

            //更新夺宝记录为待揭晓
            $this->updateDb(array('status'=>4),'',"buy_id='$buy_id' AND yun_code <> ''");
            $this->updateDjx();

            //得到最大期数
            $qishu = $this->db->getstr("SELECT qishu FROM ###_yunbuy WHERE sid='".$goods_info['sid']."' AND gobuy=0 ORDER BY qishu DESC");

            //加入新一期产品
            if($state && $qishu == $goods_info['qishu'] && $qishu<$goods_info['max_qishu']){
                $new_id = $this->insertYunNew($goods_info);
                $this->multi_yunbuy($new_id,$buy_id);

                //强制更新云购商品缓存
                $this->cacheYunInfo($buy_id,2);
            }
        }
    }

    /** 克隆新的云购商品
     * @param $goods_info
     * @param array $array 合并到第一个参数
     * @return mixed
     */
    function insertYunNew($goods_info, $array = array()){
        $insert_arr['sid'] = $goods_info['sid'];
        $insert_arr['title'] = $goods_info['title'];
        $insert_arr['goods_id'] = $goods_info['goods_id'];
        $insert_arr['goods_subtit'] = $goods_info['goods_subtit'];
        $insert_arr['goods_price'] = $goods_info['goods_price'];
        $insert_arr['price'] = $goods_info['price'];
        $insert_arr['custom_price'] = $goods_info['custom_price'];
        $insert_arr['cover'] = $goods_info['cover'];
        $insert_arr['pics'] = $goods_info['pics'];
        $insert_arr['cid'] = $goods_info['cid'];
        $insert_arr['need_num'] = $goods_info['need_num'];
        $insert_arr['max_qishu'] = $goods_info['max_qishu'];
        $insert_arr['is_rec'] = $goods_info['is_rec'];
        $insert_arr['listorders'] = $goods_info['listorders'];
        $insert_arr['keywords'] = $goods_info['keywords'];
        $insert_arr['description'] = $goods_info['description'];
        $insert_arr['ext_info'] = $goods_info['ext_info'];
        $insert_arr['buynum'] = $goods_info['buynum'];
        $insert_arr['type'] = $goods_info['type'];
        $insert_arr['is_return'] = $goods_info['is_return'];
        $insert_arr['posid'] = $goods_info['posid'];
        $insert_arr['thumb'] = $goods_info['thumb'];
        $insert_arr['thumbs'] = $goods_info['thumbs'];
        $insert_arr['mid'] = $goods_info['mid'];

        $insert_arr['end_num'] = $goods_info['need_num'];
        $insert_arr['is_show'] = 1;
        $insert_arr['add_time'] = RUN_TIME;

        $max_qishu = $this->db->getstr("SELECT qishu FROM ###_yunbuy WHERE sid='".$goods_info['sid']."' ORDER BY qishu DESC");
        $insert_arr['qishu'] = $max_qishu+1;

        //追加字段
        if(!empty($array)){
            $insert_arr = array_merge($insert_arr, $array);
        }

        $new_id = $this->db->save("###_yunbuy",$insert_arr);
        
        /*
        if(!empty($new_id)){
            $key_value=$this->site_config['key_value'];
            $key_value=!empty($key_value)?$key_value:10000;
            $newcode_arr = range(10000001,10000000+$insert_arr['need_num']);
            $robot_arr = array();
            if($insert_arr['need_num']>10000){
                array_push($robot_arr,10000000+$insert_arr['need_num']);
                $robot_key = mt_rand(0,$key_value-1);
                $f=intval($insert_arr['need_num']/$key_value);
                for($i=0;$i<=$f;$i++){
                    $temp=$i*10+$robot_key+10000001;
                    if($temp<(10000000+$insert_arr['need_num'])){
                        array_push($robot_arr,$temp);
                    }
                }
            }
            $newcode_arr = array_diff($newcode_arr,$robot_arr);
            $newcode_arr = implode(',',$newcode_arr);
            $this->db->save("###_yuncollection",array('buy_id'=>$new_id,'yun_code_collection'=>$newcode_arr));
            $robot_arr = implode(',',$robot_arr);
            $this->db->save("###_robotcollection",array('buy_id'=>$new_id,'robot_code_collection'=>$robot_arr));
        }
        */
        //商品详情
        if($insert_arr['cid']==36||$insert_arr['cid']==37){
            $goods_id=$insert_arr['goods_id'];
            $this->db->query("LOCK TABLES zz_".$goods_id."_collection WRITE;");
                //生成所有中奖号码
                for($i=0;$i<ceil($insert_arr['need_num']/10000);$i++){
                    $sql="insert into zz_".$goods_id."_collection (buy_id,qishu,num) values ";
                    if(($i+1)==ceil($insert_arr['need_num']/10000)){
                        for($j=$i*10000;$j<$insert_arr['need_num'];$j++){
                            $tp=10000001+$j;
                            $sql.="(".$new_id.",".$insert_arr['qishu'].",".$tp."),";
                        }
                    }else{
                        for($j=$i*10000;$j<($i+1)*10000;$j++){
                            $tp=10000001+$j;
                            $sql.="(".$new_id.",".$insert_arr['qishu'].",".$tp."),";
                        }
                    }
                    $sql = rtrim($sql, ',');
                    $this->db->query($sql);
                }
                $robot_arr = array();
                $key_value=$this->site_config['key_value'];
                $key_value=!empty($key_value)?$key_value:10000;
                if($insert_arr['need_num']>10000){
                    array_push($robot_arr,10000000+$insert_arr['need_num']);
                    $robot_key = mt_rand(0,$key_value-1);
                    $f=intval($insert_arr['need_num']/$key_value);
                    for($i=0;$i<=$f;$i++){
                        $temp=$i*$key_value+$robot_key+10000001;
                        if($temp<(10000000+$insert_arr['need_num'])){
                            array_push($robot_arr,$temp);
                        }
                    }
                }
                $sql="update zz_".$goods_id."_collection set is_robot =1 where qishu=".$insert_arr['qishu']." and num in (";
                foreach ($robot_arr as $rval){
                    $sql.=$rval.",";
                }
                $sql = rtrim($sql, ',');
                $sql.=")";
                $this->db->query($sql);
                $this->db->query("UNLOCK TABLES ;");
            }
        return $new_id;
    }

    //开奖
    function lottery($buy_id){
        $c = ($this->mod=='manage') ? $this->common : $this->site_config;
        $yuninfo = $this->yuninfo($buy_id);
        if($yuninfo['end_num']>0) return false;
        //开奖号
        if($c['is_ssc']){
            $kjjg = $this->lottery_code($yuninfo['qihao']);
            $kjjg = !empty($kjjg) ? $kjjg : '00000';
        }else{
            $kjjg = 0;
        }
        $luck_code = 10000001+fmod(floatval($yuninfo['time_total'] +$kjjg),$yuninfo['need_num']);
        
        //fusheng
        
        
        
        
        
        
        //
        
        $state = 0;
        //判断云购是否已经开奖
        $yun_info = $this->db->get("SELECT buy_id FROM ###_yunbuy WHERE buy_id='".$buy_id."' AND luck_code>0");
        if($yun_info){ return false; }
        //查询中奖人更新开奖订单
        $db_info = $this->db->get("SELECT * FROM ###_yundb WHERE yun_code LIKE '%".$luck_code."%' AND buy_id='$buy_id' AND status<>3");
        if($db_info && !$yun_info){
            $state = $this->updateDb(array('luck_code'=>$luck_code,'status'=>'3'),$db_info['id']);
        }
        if($state){
            $update_arr = array();
            $update_arr['member_id'] = $db_info['mid'];
            $update_arr['member_name'] = $db_info['username'];
            $update_arr['luck_code'] = $luck_code;
            //$update_arr['end_time'] = microtime_float();
            $update_arr['kjjg'] = $kjjg;
            $this->db->update("yunbuy",$update_arr,array('buy_id'=>$buy_id));
            #未中奖返回抵用券
            if($this->site_config['gobuyback_status']==1&&$this->site_config['backmanual_status']==0){
                $this->load->model('gobuyback');
                $this->gobuyback->gobuyback($buy_id);
            }
            //更新夺宝记录为未中奖
            $this->updateDb(array('status'=>5),'',"buy_id='$buy_id' AND status <> 3 AND yun_code <> ''");
            $this->updateDjx();

            #发送中奖通知
            $db_member = $this->db->get("SELECT openid,mobile,email,username FROM ###_member WHERE mid = '$db_info[mid]'");
            /*$this->smarty->assign('username',$db_member['username']);
            $this->smarty->assign('goodsname',$db_info['goods_name']);*/

            //将中奖消息暂时写入缓存队列，延迟1分钟，从bidcount定时器中发送
            $data = $this->base->read_static_cache('msg_queue','');
            if($data === false){ $data = array(); }
            if($db_member['openid']){
                //微信模板消息
                $data[] = array(
                    'time'   => RUN_TIME,
                    'type'   => 'wx',
                    'msg'    => '提醒:恭喜您获得'.$yuninfo['title'],
                    'openid' => $db_member['openid'],
                    'username' => $db_member['username'],
                    'goodsname' => $db_info['goods_name'],
                );
            }
            if($this->site_config['sms_open']==1 && statusTpl('sms_cod') && $db_member['mobile']){
                //短信消息
                $data[] = array(
                    'time'   => RUN_TIME,
                    'type'   => 'sms',
                    'tpl'    => 'sms_cod',
                    'mobile' => $db_member['mobile'],
                    'username' => $db_member['username'],
                    'goodsname' => $db_info['goods_name'],
                );
            }
            if(trim($this->site_config['ios_url']) || trim($this->site_config['and_url'])){
                //app推送
                $data[] = array(
                    'time'     => RUN_TIME,
                    'type'     => 'app',
                    'msg'      => '提醒:恭喜您获得'.$yuninfo['title'],
                    'buy_id'   => $yuninfo['buy_id'],
                    'username' => $db_member['username'],
                    'goodsname' => $db_info['goods_name'],
                );
            }
            if($db_member['email']){
                //邮件消息
                $data[] = array(
                    'time'   => RUN_TIME,
                    'type'   => 'email',
                    'tpl'    => 'mail_cod',
                    'email'  => $db_member['email'],
                    'username' => $db_member['username'],
                    'goodsname' => $db_info['goods_name'],
                );
            }
            $this->base->write_static_cache('msg_queue', $data, '');
        }

    }

    //开奖前参与记录时间和
    function sum_time($time){
        $num = 0;
        $list = $this->getyunDb("AND d.status <> 1 AND d.db_time <= '$time' ORDER BY db_time DESC",100,1);
        foreach($list as $v){
            $num += $v['timenum'];
        }
        return $num;

        //$sum_time = $this->db->get("SELECT SUM(timenum) as sum_time,COUNT(*) AS count FROM (SELECT timenum FROM ###_yundb WHERE status <> 1 AND db_time <= $time ORDER BY db_time DESC LIMIT 100) AS s");
        //return $sum_time['count']>=100 ? $sum_time['sum_time'] : '10000001';
        //return $sum_time['sum_time'];
    }

    //多期参与
    function multi_yunbuy($new_id,$buy_id){
        $mulitdb = $this->db->select("SELECT * FROM ###_yundb WHERE buy_id = '$buy_id' AND multi > 1 AND status <> 1");

        if(!empty($mulitdb)){
            //已生成抽奖号
            $order_arr = $this->db->select("SELECT * FROM ###_yundb WHERE buy_id = '$new_id' AND status = '2'");
            $sold_code = array();
            if(!empty($order_arr)){
                $solded_code = array();
                foreach($order_arr as $v){
                    $sold_code = explode(",",$v['yun_code']);
                    foreach($sold_code as $code){
                        $solded_code[$code-10000001] = $code;
                    }
                }
                $sold_code = $solded_code;
            }
            $yunbuy = $this->yuninfo($new_id);

            foreach($mulitdb as $val){
                $qty = $val['qty'];
                if($yunbuy['buynum']>0){
                    $have_buynum = $this->db->getstr("SELECT SUM(total) FROM ###_yundb WHERE buy_id = '$new_id' AND mid='$val[mid]' AND status='2'");
                }
                if($have_buynum>=$yunbuy['buynum']&&$yunbuy['buynum']>0){
                    continue;
                }
                if($have_buynum>0&&($val['qty']+$have_buynum)>$yunbuy['buynum']){
                    $back_num = $val['qty']+$have_buynum-$yunbuy['buynum'];
                    $val['qty'] = ($yunbuy['buynum']-$have_buynum);
                }
                //加入夺宝记录
                $insert_arr = array();
                $insert_arr['order_id'] = $val['order_id'];
                $insert_arr['mid'] = $val['mid'];
                $insert_arr['username'] = $val['username'];	
                $insert_arr['buy_id'] = $new_id;
                $insert_arr['goods_name'] = $val['goods_name'];
                $insert_arr['goods_price'] = $val['goods_price'];
                $insert_arr['price'] = $val['price'];
                $insert_arr['qty'] = $val['qty'];
                $insert_arr['total'] = $val['price']*$val['qty'];
                $insert_arr['cover'] = $val['cover'];
                $insert_arr['qishu'] = $val['qishu']+1;
                $insert_arr['multi'] = $val['multi']-1;
                $insert_arr['auto_multi'] = 1;
                $insert_arr['type'] = $val['type'];
                $insert_arr['status'] = 1;
                $insert_arr['ip'] = $val['ip'];
                $insert_arr['add_time'] = RUN_TIME;
                $insert_arr['agents'] = $val['agents'];
                $db_id = $this->db->insert("###_yundb",$insert_arr);
                $order = $this->db->get("SELECT * FROM ###_yunorder WHERE order_id = $val[order_id]");
                //剩余人次
                $end_num = $this->db->getstr("SELECT end_num FROM ###_yunbuy WHERE buy_id = '$new_id'");
                //剩余人次小于购买数退还剩余金额
                if($end_num < $val['qty']){
                    $back_num = $val['qty']-$end_num+$back_num;
                }
                if($back_num>0){
                    $this->load->model('member');
                    $back_points = $val['price']*$back_num*($val['multi']-1);
                    $log_arr = array();
                    $log_arr['mid'] = $val['mid'];
                    $log_arr['username'] = $val['username'];
                    if($val['type']==1){
                        $log_arr['db_points'] = $back_points;
                        $log_arr['desc'] = "参与人次大于剩余人次，退还剩余".$this->L['unit_db_points']." ".$this->L['unit_yun']."订单".$order['order_sn'];
                    }else{
                        $log_arr['pay_points'] = $back_points;
                        $log_arr['desc'] = "参与人次大于剩余人次，退还剩余".$this->L['unit_pay_points']." ".$this->L['unit_yun']."订单".$order['order_sn'];
                    }
                    $this->member->accountlog('admin',$log_arr);
                    $val['qty'] = $end_num;
                    $is_back = true;
                }

                //未生成抽奖号
                $newcode_arr = range(10000001,10000000+$yunbuy['need_num']);
                $newcode_arr = array_diff_assoc($newcode_arr,$sold_code);

                //生成抽奖号
                shuffle($newcode_arr);
                $lukycode_arr = array_slice($newcode_arr,0,$val['qty']);
                foreach($lukycode_arr as $lcode){
                    $sold_code[$lcode-10000001] = $lcode;
                }

                $param = array();
                $param['yun_code'] = implode(',',$lukycode_arr);
                $param['db_time'] = microtime_float();
                $param['timenum'] = microtime_format($param['db_time'],'Hisx');
                $param['status'] = 2;
                if($is_back){
                    $param['qty'] = $val['qty'];
                    $param['total'] = $val['qty']*$val['price'];
                }

                //更新订单
                if($val['qty'] <= 0){
                    $this->db->delete('yundb', array('id'=>$db_id));
                }else{
                    $state = $this->updateDb($param,$db_id);
                }
                //更新商品信息
                $this->db->update($this->baseTable,"buy_num = buy_num+'$val[qty]' , end_num = end_num - '$val[qty]'",array('buy_id'=>$new_id));

                //刷新商品信息查询是否开奖
                $goods_info = $this->yuninfo($new_id);
                if($goods_info['buy_num']>=$goods_info['need_num']) $this->wait_lottery($new_id,$param['db_time'],$val['qty']);

            }
        }
    }


    //参与记录
    function getyunDb($where,$page_size='99999',$page=1,$feild="",$url='href="/yunbuy/{num}"',$url_page=''){
        $page_size = empty($page_size) ? (int)$this->site_config['page_size'] : $page_size;
        $where = empty($where) ? "d.buy_id <> 0" : $where;
        $sql = "FROM ###_yundb AS d ";
        //$sql .= "LEFT JOIN ###_yunbuy AS y ON y.buy_id=d.buy_id ";
        $sql .= "WHERE d.id <> 0 $where";

        //返回数量
        if($page_size=='count'){
            $count = $this->db->getstr("SELECT COUNT(*) " . $sql);
            return $count;
        }

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>$page_size,'url'=>$url));

        //echo "SELECT d.*,y.thumb,y.thumbs".$feild." ".$sql;die;
        $list = $this->page->hashQuery("SELECT d.id,d.order_id,d.mid,d.username,d.cover,d.buy_id,d.goods_name,d.goods_price,d.price,d.qty,d.total,d.qishu,d.multi,d.auto_multi,d.yun_code,d.luck_code,d.db_time,d.timenum,d.status,d.ip,d.is_show,d.is_award,d.add_time,d.type,d.sharecode,d.fdis,d.agents".$feild." ".$sql,$url_page)->result_array();
        if($list){
            $list = $this->db->lJoin($list,'yunbuy','buy_id,thumb,thumbs','buy_id','buy_id');
            $list = $this->db->lJoin($list,'member','mid,nickname,photo','mid','mid');
            foreach($list as $key=>$val){
                if(preg_match('/GROUP BY/',$where)){
                    //查询参与的同期记录
                    $some_buy = $this->db->select("SELECT qty,yun_code FROM ###_yundb WHERE buy_id = '$val[buy_id]' AND mid = '$val[mid]' AND status <> 1 AND id <> '$val[id]' ");
                    if(!empty($some_buy)){
                        foreach($some_buy as $k=>$v){
                            $val['qty']+= $v['qty'];
                            $val['yun_code'] .= ','.$v['yun_code'];
                        }
                    }
                }
                if($val['goods_price']>0) $val['need_num'] = ceil($val['goods_price']/$val['price']);
                $val=$this->getThumb($val,1,array('src','thumb'));
                $list[$key] = $val;
            }
            $this->load->model('upload');
            $list = $this->upload->getImgUrls($list,'cover','gallery',array('src','thumb'));
        }
        return $list;
    }

    //晒单
    function getShare($where,$page_size='99999',$page=1,$feild="s.*",$url='href="/yunbuy/{num}"',$url_page=''){
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $page_size = empty($page_size) ? (int)$this->site_config['page_size'] : $page_size;
        $this->page->set_vars(array('per'=>$page_size,'url'=>$url));

        $where = empty($where) ? "s.id <> 0" : $where;
        $sql = "SELECT s.* FROM ###_share AS s WHERE ".$where;

        $list = $this->page->hashQuery($sql,$url_page)->result_array();
        $list = $this->db->lJoin($list,'member','mid,nickname','mid','mid');
        if($list){
            foreach($list as $key=>$val){
                if(in_array($val['extension_code'], array(CART_WIN,CART_AUC))){
                    $list[$key]['url'] = url('/auction/view/').$val['obj_id'];

                }elseif($val['extension_code']==CART_DB){
                    $list[$key]['url'] = url('/yunbuy/detail/').$val['obj_id'];
                }
                $list[$key]['thumbs'] = unserialize($val['thumbs']);
            }
        }
        return $list;
    }

    function getDbtotal($where){
        $result = $this->db->getstr("SELECT COUNT(DISTINCT buy_id) AS count FROM ###_yundb WHERE $where");
        return $result;
    }

    /**夺宝商品购买限制
     * @param $row
     * @param $mid
     * @param array $options
     * @return array
     */
    function extBuy($row, $mid, $options=array()){
        $data = array('error'=>0);
        $qty = isset($options['qty']) ? intval($options['qty']) : 1;

        $ext_info = unserialize($row['ext_info']);

        #购买人次限制
        if($ext_info['buynum'] > 0){
            $buyCount = $this->db->getstr("SELECT SUM(qty) AS qty FROM ###_yundb WHERE mid = '$mid' AND status > 1 AND buy_id=".$row['buy_id']);

            if(($buyCount+$qty) > $ext_info['buynum']){
                $data['error'] = 1;
                $data['buynum'] = $ext_info['buynum'];
                $data['error_text'] = "您本期购买人次或购物车内购买人次已经达到最大限制（".$data['buynum']."人次）";
            }
        }
        #推荐人数限制
        if($ext_info['usernum'] > 0){
            $this->load->model('member');
            $options['where'] = (isset($ext_info['isreal']) && $ext_info['isreal']==1) ? " AND realname!=''" : '';
            $itvCount = $this->member->itvCount($mid, $options);
            if($itvCount < $ext_info['usernum']){
                $data['error'] = 2;
                $data['usernum'] = $ext_info['usernum'];
                $data['isreal'] = $ext_info['isreal'];
                $data['error_text'] = "您推荐注册的人数未达到此商品要求（".$data['usernum']."人）".($data['isreal']==1?'（需实名认证）':'');
            }
        }
        #会员条件限制
        if(!empty($ext_info['member'])){
            #7天内注册新会员
            if($ext_info['member']=='-1'){
                $member = $this->db->get("SELECT rank_id,c_time FROM ###_member WHERE mid = '$mid'");
                if(RUN_TIME-3600*24*7>$member['c_time']){
                    $data['error'] = 3;
                    $data['error_text'] = "7天内注册的新会员才能参与".$this->L['unit_yun']."";
                }
            }
        }
        #中奖后限制参与
        if($ext_info['notjoin'] && $row['type']==2 && $_SESSION['mid']){
            #查询是否中奖
            $luck_db = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_yunbuy WHERE member_id = '$_SESSION[mid]' AND type = 2");
            if($luck_db){
                $data['error'] = 4;
                $data['error_text'] = "本商品可参与人群：从未".$this->L['unit_yun']."成功的用户";
            }
        }
        #已发布的圈子商品 参与人数限制
        if($row['gobuy'] == 2 && $row['qishu'] > 0){
            $this->load->model('quanzi');
            $return = $this->quanzi->checkMaxNum($row['buy_id']);
            if($return['error']){
                $data['error'] = $return['error'];
                $data['error_text'] = $return['error_text'];
            }

            //1小时过期失效
            $time = time() - $this->quanzi->left_time;
            if($row['add_time'] <= $time && $row['buy_num'] <= 0){
                $data['error'] = 6;
                $data['error_text'] = "该".$this->L['unit_yun_team']."商品已失效！";
            }
        }

        return $data;
    }

    //编辑晒单
    function saveShare(){
        $id = $_POST['id'];
        $post = $_POST['post'];

        #表单处理
        if(empty($post['obj_name'])){ return array('code'=>10001, 'message'=>'请输入商品名称!'); }
        if(empty($post['title'])){ return array('code'=>10001, 'message'=>'请输入晒单标题!'); }
        if(empty($post['content'])){ return array('code'=>10001, 'message'=>'请输入晒单内容!'); }

        #保存
        $res = $this->db->save('share',$post,'',array('id'=>$id));

        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误
        if($id){
            admin_log('编辑晒单：'.$post['title']."($id)");
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }else{
            return array('code'=>1003, 'message'=>'更新失败');
        }
    }

    /** 获取所有待揭晓夺宝商品 写入缓存 */
    function updateDjx($type=0){
        $array = array();
        $list = $this->base->read_static_cache('dbDjx', '');

        if ($type==0 || ($type==1 && $list==false))
        {
            $sql = "SELECT * FROM ###_yunbuy ".
                "WHERE buy_id<>0 AND is_show=1 AND luck_code=0 AND last_dbtime>0 AND gobuy != 1 ORDER BY wait_time DESC";
            $list = $this->db->select($sql);
            $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
            $list = $this->db->lJoin($list,'member','mid,username,nickname,photo','member_id','mid');
            #单独保存待揭晓的buy_id
            $ids = ',';
            if($list){
                foreach($list as $k=>$v){
                    $this->getYunUrl($v);
                    $v = $this->getThumb($v);
                    $list[$k]=$v;
                    $ids .= $v['buy_id'].',';
                }
            }

            #获取图像
            $this->load->model('upload');
            $list = $this->upload->getImgUrls($list,'cover','gallery',array('src'));

            $this->base->write_static_cache('dbDjx', array('ids'=>$ids,'list'=>$list), '');
        }else{
            $array = $list;
        }

        return $array;
    }

    //格式化一些云购内容
    function getYunUrl(& $v, $type = 0){
        $v['url'] = '/yunbuy/detail/'.$v['buy_id'];
        $v['qishu_name'] = "（第".$v['qishu']."期）";

        if($v['gobuy'] == 2){
            $v['url'] = '/quanzi/detail/'.$v['buy_id'];
            $v['qishu_name'] = ($type == 1) ? "（圈号".$v['qz_sn']."）" : "";
        }

    }

    /**
     * 抓取开奖结果
     * http://cp.360.cn/ssccq
     * http://caipiao.163.com/award/cqssc/20160310.html
     * http://baidu.lecai.com/lottery/draw/sorts/cqssc.php
     * http://data.shishicai.cn/cqssc/haoma/2016-03-10/
     */
    function lottery_code($qihao=""){
        if(!$this->site_config['is_ssc']){
            return '1';
        }

        //存在时直接返回
        $code = $this->getlottery($qihao);
        if($code){ return $code; }

        //采集网易时时彩数据（任意期号）
        $this->load->library('snoopy');
        $ymd = substr(date('Y'),0,2).substr($qihao,0,6);
        $url = 'http://caipiao.163.com/award/cqssc/'.$ymd.'.html';
        $qh  = substr($qihao,-3);

        $class = $this->snoopy->fetch($url);
        $html = $class->results;
        $index = strpos($html,'data-period="'.$qihao.'">'.$qh.'</td>');
        if($index!==false && $index>0){
            $code = substr($html,$index-11,9);
            $code = str_replace(' ','',$code);
        }else{
            $code = '';
        }

        //采集360时时彩数据（只能采集当天，当网易采集失败时调用）
        if(!$code){
            $url = 'http://cp.360.cn/ssccq';
            $class = $this->snoopy->fetch($url);
            $html = $class->results;
            $code = preg_match("/<td><span class=\"gary\">".substr($qihao,strlen($qihao)-3,3)."<\/span><em class=\"code\">(.*?)<\/em>(.*?)<\/td>/",$html,$arrStr);
            $code = (isset($arrStr[1]) && !empty($arrStr[1])) ? $arrStr[1] : '';
        }

        if($code && (!is_numeric($code) || strlen($code) != 5)){
            $code = '';
        }

        if(!empty($qihao) && !empty($code)){
            $this->db->save('lottery',array(
                'qihao' => $qihao,
                'code'  => $code,
                'add_time' => RUN_TIME
            ));
        }
        return $code;
    }

    //标记超过50%以上的购买记录
    function yunHalf($cartGoods, $order_sn){
        $this->load->model('member');
        $log_bool = false;
        $log_desc = "以下商品购买人次超过总需50%（云购订单号：$order_sn）：<br />";

        if($cartGoods){
            foreach($cartGoods as $v){
                if($v['qty']*$v['price']*2 >= $v['goods_price']){
                    $log_bool = true;
                    $log_desc .= '<br />'.$v['goods_name'];
                }
            }
        }

        if($log_bool){
            $this->member->accountlog(ACT_DB,array(
                'mid'=>$v['mid'],
                'desc'=>$log_desc
            ));
        }
    }

    /** 缓存（已揭晓）云购商品
     * @param $buy_id
     * @param int $cache #1无缓存时，生成缓存 2强制生成缓存 3不生成缓存，从数据库获取 4删除缓存 5更新部分 6只返回缓存
     * @param array $data2 #更新部分
     * @return array
     */
    function cacheYunInfo($buy_id, $cache = 1, $data2 = array()){
        $array = array();
        $data = false;
        //$cache = 3; 不使用缓存

        if($cache != 3){
            $data = $this->base->read_static_cache($buy_id, 'yun_info');
            if($cache == 6){
                return $data;
            }
        }

        //更新部分
        if($data !== false && $cache == 5 && $data2){
            $array = $this->base->arrayCoverRecursive($data, $data2);
            $this->base->write_static_cache($buy_id, $array, 'yun_info');
            return $array;
        }

        if ($data === false || in_array($cache, array(2, 3))){
            if($cache == 4) return $array;

            /************动态生成**************/
            //云购商品信息
            $yun_info = $this->yuninfo($buy_id);
            //最后105条参与记录
            if($yun_info['last_dbtime']){
                $sql = "select * from ###_yundb where status <> 1 AND db_time <= '".$yun_info['last_dbtime']."' ORDER BY db_time DESC LIMIT 105";
                $array['join'] = $this->db->select($sql);
                $array['join'] = $this->db->lJoin($array['join'],'member','mid,nickname,photo','mid','mid');
            }
            /************动态生成 END**************/

            if($cache == 3) return $array;
            $this->base->write_static_cache($buy_id, $array, 'yun_info');
        }else{
            //删除缓存
            if($cache == 4){
                $files = AppDir . "data/yun_info/" . $buy_id . '.php';
                if (is_file($files)){
                    @unlink($files);
                }
                return $array;
            }

            $array = $data;
        }

        return $array;
    }

    /** 重新计算支付订单金额
     * @param $val 单条云购订单记录
     * @param $mid 会员ID
     * @return mixed
     */
    function updateOrderAmount($val, $mid){
        if($val['status'] != 1){ return $val; }

        $this->load->model('member');
        $memberinfo = $this->member->member_info($mid);

        //判断抵用券是否还存在并且未使用
        $update = array('order_amount'=>$val['order_amount']);
        if($val['user_bonus_id'] > 0){
            $bonus = $this->db->select("select * from ###_member_bonus where id IN(".$val['user_bonus_id'].")");
            if($bonus){
                foreach($bonus as $v){
                    if($v['order_id'] || $v['end_time']<time()){
                        //抵用券部分已使用，增加金额到第三方支付
                        $update['order_amount'] += $v['money'];
                    }else{
                        if(isset($update['user_bonus_id']) && !empty($update['user_bonus_id'])){
                            $update['user_bonus_id'] .= ',' . $v['id'];
                        }else{
                            $update['user_bonus_id'] = $v['id'];
                        }
                    }
                }
                if(!isset($update['user_bonus_id'])){
                    $update['user_bonus_id'] = '';
                }
            }
        }
        //余额不足时，增加金额到第三方支付
        if($val['user_money'] && $val['user_money'] > $memberinfo['user_money']){
            $update['user_money'] = $memberinfo['user_money'];
            $update['order_amount'] += $val['user_money'] - $memberinfo['user_money'];
        }
        //夺宝币不足时，增加金额到第三方支付
        if($val['db_points'] && $val['db_points'] > $memberinfo['db_points']){
            $update['db_points'] = $memberinfo['db_points'];
            $update['order_amount'] += $val['db_points'] - $memberinfo['db_points'];
        }
        //更新相关表
        if(count($update) > 1){
            //云购订单价格修改
            //$this->updateOrder($update, $val['order_id']);

            //恢复支付状态
            /*$pay_log = $this->db->get("SELECT log_id,is_paid FROM ###_pay_log WHERE order_type=".PAY_DB." AND order_id='".$val['order_id']."'");
            if($pay_log['is_paid'] == 1){
                $this->db->save('pay_log',array('is_paid'=>'0'),'',array('log_id'=>$pay_log['log_id']));
            }*/

            if($update['order_amount'] != $val['order_amount']){
                //支付日志价格修改
                //$this->db->save('pay_log',array('order_amount'=>$update['order_amount']),'',array('log_id'=>$pay_log['log_id']));

                //直购订单价格修改
                /*$row = $this->db->get("select id,order_sn from ###_goods_order where order_sn='".$val['order_sn']."'");
                if($row){
                    $this->db->save('goods_order',array('amount'=>$update['order_amount']),'',array('order_sn'=>$val['order_sn']));
                }*/

                //屏蔽页面上的支付按钮
                $val['allow_pay'] = 0;
                //屏蔽功能上的支付跳转
                $val['status'] = 2;
            }

            //$val = array_merge($val, $update);
        }
        return $val;
    }

    /** 云购订单状态配置
     * @param int $key
     * @return array
     */
    function status_order($key = 0){
        $array = array(
            1 => array('id'=>1, 'title'=>'未支付', 'class'=>'c-disable'),
            2 => array('id'=>2, 'title'=>'进行中', 'class'=>'c-green'),
            3 => array('id'=>3, 'title'=>'已中奖', 'class'=>'c-red'),
            4 => array('id'=>4, 'title'=>'待揭晓', 'class'=>'c-orange'),
            5 => array('id'=>5, 'title'=>'未中奖', 'class'=>'c-gray'),
        );

        if(isset($array[$key])){
            return $array[$key];
        }

        return $array;
    }
}