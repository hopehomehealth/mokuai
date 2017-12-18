<?php
/**
 * 挖宝 首页
 */
class yunbuy extends Lowxp{
    function __construct(){
        parent::__construct();
        $method = $_SERVER['request']['method'];
        //需登录的操作
        $LoginActions = in_array($method, array('checkout','done'));
        if($LoginActions && empty($_SESSION['mid'])){
            //$this->msg('',array('url'=>url('/member/login')));
            exit;
        }
        $this->load->model('yunbuy');
        $this->smarty->assign('navMark', 'yunbuy');
    }

    function index($page=1){
        $this->load->model("yuncat");
        $this->load->model('taglib');

        //2小时更换随机排列
        $order_arr = array('end_num ASC','goods_click DESC','listorders DESC','add_time DESC','need_num DESC','need_num ASC');
        $cookies_order = cookie('dborder');
        $cookies_order = explode("|",$cookies_order);
        if(empty($cookies_order) || $cookies_order[1]<=RUN_TIME-3600*2){
            $cookies_order = $order_arr[array_rand($order_arr)].'|'.RUN_TIME;
            zzcookie('dborder',$cookies_order);
            $cookies_order = explode("|",$cookies_order);
        }
        $rand_order = explode(" ",$cookies_order[0]);

        $where = '';
        $cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : 0;
        $bid = isset($_REQUEST['bid']) ? intval($_REQUEST['bid']) : 0;
        $type = isset($_REQUEST['type']) ? intval($_REQUEST['type']) : 1;
        if($cid){
            $cat = $this->db->get("SELECT * FROM yuncat WHERE id = '$cid'");
            if(!empty($cat)) $where.=" AND b.cid" . $this->yuncat->condArrchild($cid);
        }
        if($bid){ $where.=" AND g.bid = '$bid'"; }
        if($type){ $where.=" AND b.type = '$type'"; }

        #专区
        if(!empty($_REQUEST['zq']) && $_REQUEST['zq'] =='limit'){
            $where .= " AND b.buynum <> 0";
            $title = "限购".$this->L['unit_area'];
        }elseif(!empty($_REQUEST['zq']) && intval($_REQUEST['zq'])){
            $where .= " AND b.price = '".intval($_REQUEST['zq'])."'";
            $title = num2char(intval($_REQUEST['zq']))."元".$this->L['unit_area'];
        }
        if(!empty($_REQUEST['zq']) && $_REQUEST['zq'] =='buy'){
            $where .= " AND b.gobuy=1";
            $title = $this->L['unit_go_buy'].$this->L['unit_area'];
            $template = 'index_buy.html';
            $template_mobile = 'lists_buy.html';
        }else{
            $where .= " AND b.gobuy=0";
        }
        $title = !empty($title) ? $title : $this->L['unit_yun_one'];
        #挖宝分类
        $yuncat = array();
        $res = $this->db->select("SELECT * FROM ###_yuncat WHERE parentid = 0 AND ismenu = 1 ORDER BY listorder DESC,id ASC");
        foreach($res as $v){
            $yuncat[$v['id']] = $v;
        }


        //赠币
        //$free_list = $this->yunbuy->getyunbuy("end_num > 0 AND is_show =1 AND type = 2 ORDER BY buy_id DESC",10,1);
        //$this->smarty->assign('free_list',$free_list);

        $key = in_array($_GET['k'] , array('goods_click','end_num','need_num','add_time')) ? $_GET['k'] : 'listorders';
        $sort = in_array($_GET['s'] , array('desc','asc')) ? $_GET['s'] : 'desc';
        $order = $key." ".$sort;
        if(empty($_GET['k'])) $order = $cookies_order[0];
        switch(intval($_GET['order'])){
            case 1:
                $order = "ratio DESC";
                break;
            case 2:
                $order = "goods_click DESC";
                break;
            case 3:
                $order = "goods_price DESC";
                break;
            case 4:
                $order = "goods_price ASC";
                break;
            case 5:
                $order = "is_rec DESC,b.listorders DESC,b.buy_id DESC";
                break;
	    case 6:
		$order = "goods_price ASC";
		break;	
            default:
                $order = "b.listorders DESC,b.buy_id DESC";
        }
        $url = 'href="/yunbuy/index/{num}/?cid='.$cid.'&k='.$_GET['k'].'&s='.$_GET['s'].'&zq='.$_GET['zq'];

        //搜索
        if(isset($_REQUEST['q'])){
            $url .= '&q='.$_REQUEST['q'];
            $this->load->model('auction');
            if($page==1) $this->auction->setSearch($_REQUEST['q']);
            if(isset($_REQUEST['q']) && !empty($_REQUEST['q'])){
                $where .= " AND b.title LIKE '%". htmlspecialchars(trim($_REQUEST['q'])) ."%'";
            }
        }
        $url .= '"';

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $page_size = 6;
        $this->page->set_vars(array('per'=>$page_size,'url'=>$url));
        $appVersion=$_REQUEST['appVersion'];
        $app_checking=$this->site_config['app_checking'];
        $sql = "SELECT b.*,b.buy_num/need_num AS ratio FROM ###_yunbuy AS b ".
               "LEFT JOIN ###_goods AS g ON g.id = b.goods_id ".
               "WHERE ";
        if($app_checking==$appVersion){
            $sql.=" b.title not LIKE '%Apple%' and ";
        }
                $sql.="b.end_num>0 AND b.is_show=1 $where ".
               "ORDER BY $order";
        $list = $this->page->hashQuery($sql)->result_array();
        if($list){
            foreach($list as $key=>$val){
                $val['jindu'] = sprintf("%.2f",$val['buy_num']/$val['need_num']*100);
                if(!empty($val['ext_info'])){
                    $ext_info = unserialize($val['ext_info']);
                    if(!empty($ext_info)) $val = array_merge($val, $ext_info);
                }
                $val['goods_price'] = $val['price'];
                $val['num2char'] = num2char($val['price']);
                $val['imgw'] = 100;
                $val['imgh'] = 100;
                $val = $this->yunbuy->getThumb($val,1);
                $val['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200,'type'=>1));
                if($val['type']==2) $val['unit'] = $this->L['unit_pay_points'];
                
                $list[$key] = $val;
            }   
        }
        if($_REQUEST['ajaxcontent']){
            $data = array();
            if(!empty($list)) $data['yunbuy'] = $list;
        }else{
//             if($appVersion!=$app_checking){
//                 foreach($list as $key=>$val){
//                     $title=$list[$key]['title'];
//                     $tmp = explode('Apple',$title);
//                     if(count($tmp)>1){
//                         unset($list[$key]);
//                     }
//                 }
//             }
            $data['yunbuy'] = $list;
            $cat_array = array();
            foreach($yuncat as $val){
                $val['catname_en'] = 'cid:'.$val['id'];
                $cat_array[] = $val;
            }
//            $this->load->model('mobilecat');
//            $mobilecat = $this->mobilecat->select(false);
//
//            if(!empty($mobilecat)){
//                foreach($mobilecat as $key=>$val){
//                    if($val['ismenu']!=1 || empty($val['catname_en'])) unset($mobilecat[$key]);
//                }
//                $cat_array = array_merge($mobilecat,$cat_array);
//            }
            array_unshift($cat_array,array('catname'=>'全部分类','catname_en'=>"cid:'',limit:''"));
            foreach($cat_array as $key=>$val){
                $cat_array[$key]['catname_en'] = $val['catname_en'].',ckey:'.$key;
            }
            $data['cat'] = $cat_array;
        }
        $this->api_result(array('data'=>$data));
    }

    /**
     * 云购详情
     */
    function detail($id='',$op=''){
        $id = intval($id);
        $data = array();
        if(empty($id)) $this->msg();
        $row = $this->yunbuy->yuninfo($id);
        if(empty($row)) $this->api_result(array('msg'=>'商品数据不存在'));
        if($row['is_show'] == 0)  $this->api_result(array('msg'=>'商品无法正常显示'));

        /**
         * 传入直购ID时，判断并获取云购ID
         */
        if($row['gobuy']==1){
            $buy_id = $this->db->getstr("SELECT buy_id FROM ###_yunbuy WHERE  goods_id=".$row['goods_id']." AND is_show=1 AND end_num>0 AND gobuy=0 ORDER BY buy_id DESC LIMIT 1");
            if($buy_id){
                $id = $buy_id;
                $row = $this->yunbuy->yuninfo($id);
                unset($buy_id);
            }
        }
        /**
         * 传入云购ID时，判断并获取直购ID
         */
        if($row && !$row['gobuy']){
            $row_buy = $this->db->get("SELECT * FROM ###_yunbuy WHERE  goods_id=".$row['goods_id']." AND is_show=1 AND gobuy=1 ORDER BY buy_id DESC LIMIT 1");
            if($row_buy){
                $row_buy['custom_price'] = price_format($row_buy['custom_price']);
                $data['row_buy'] = $row_buy;
            }
        }

        $this->load->model('taglib');

        #商品来源
        $goods = $this->db->get("SELECT * FROM ###_goods WHERE id = '$row[goods_id]'");
        $from = explode('|',$goods['desc']);
        $this->smarty->assign('from',$from);

        //echo $fuck = $this->db->getstr("SELECT SUM(qty) FROM ###_yundb WHERE buy_id = $id AND status <> 1");
        //echo "<br/>".($row['need_num']-$fuck);
        #超过等待时间时开奖
        if(!empty($row['wait_time']) && RUN_TIME >= $row['wait_time'] && empty($row['luck_code'])){
            $this->yunbuy->lottery($id);
            $row = $this->yunbuy->yuninfo($id);
        }

        //合并参数
        $ext_info = unserialize($row['ext_info']);
        $this->smarty->assign('ext_info', $ext_info);

        #商品详情
        $row['goods_body'] = $this->db->getstr("SELECT content FROM ###_goods WHERE id = '$row[goods_id]'",'content');

        #商品图片
        $thumbs = json_decode($row['thumbs'],true);
        $this->load->model('taglib');
        if(!empty($thumbs)){
            $row['pics'] = array();
            foreach($thumbs as $k=>$v){
                $v['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$v['path'],'width'=>500,'height'=>300));
                $row['pics'][$k] = $v;
            }
        }else{
            $row['pics'] = json_decode($row['pics'],true);
            $picdata = array();
            if(is_array($row['pics'])){
                foreach($row['pics'] as $v)$picdata[] = array('id'=>$v);
                $this->load->model('upload');
                $row['pics'] = $this->upload->getGalleryImgUrls($picdata,array('middle','src','thumb'));
            }
        }
        $qty_config = intval($this->site_config['qty']);
        $row['jindu'] = number_format($row['buy_num']/$row['need_num']*100,1);
        $row['max_mun'] = $row['end_num']>=$qty_config ? $qty_config : $row['end_num'];
        if($row['type']==2 || $row['gobuy']==1) $row['goods_price'] = $row['custom_price']>0 ? $row['custom_price'] : $goods['price'];

        #待开奖时间
        if($row['wait_time']>RUN_TIME) $data['end_time'] = ($row['wait_time']-time())*1000;

        if($row['luck_code']) $row['residue'] = str_split(fmod($row['time_total']+$row['kjjg'],$row['need_num']));
        $row['kjjg_str'] = $row['kjjg'];
        $row['kjjg'] = !empty($row['kjjg']) ? str_split($row['kjjg']) : '';
        $row['wait_lottery'] = $row['wait_time']>RUN_TIME ? 1 : 0;
        $row['wait_time'] = microtime_format($row['wait_time'],'Y-m-d H:i:s.x');
        $row['last_dbtime'] = microtime_format($row['last_dbtime'],'Y-m-d H:i:s.x');
        $row['goods_body'] = picurl(stripcslashes($row['goods_body']));
        $exp=Array("/height=.{0,6}\s/i","/width=.{0,6}\s/i");
        $exp_o=Array('','');
        $row['goods_body'] = preg_replace($exp,$exp_o,$row['goods_body']);
        $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png|\.jpeg]))[\'|\"].*?[\/]?>/";
        preg_match_all($pattern,$row['goods_body'],$match);
        if(!empty($match[1])){
            foreach($match[1] as $imgurl){
                if(strpos($imgurl,'http://')===false && strpos($imgurl,'https://')===false && strpos($imgurl,'//')===false){
                    $row['goods_body'] = str_replace("='".$imgurl,"='".RootUrl.$imgurl,$row['goods_body']);
                    $row['goods_body'] = str_replace('="'.$imgurl,'="'.RootUrl.$imgurl,$row['goods_body']);
                }
            }
        }

        $row['num2char'] = num2char($row['price']);
        
        #wx分享
        $goods_id=$row['goods_id'];
        $wx_share=$row['wx_share'];
        if(empty($wx_share)){
            $wxshares=$this->db->select("select wxshares from ###_goods where id = '$goods_id'");
            if($wxshares!=null){
                $row['wx_share']=$wxshares[0]['wxshares'];
            }
        }
        
        $data['info'] = $row;

        #同商品期数
//        $qishu_arr = $this->db->select("SELECT * FROM ###_yunbuy WHERE sid = '$row[sid]' AND is_show = 1 ORDER BY qishu DESC");
//        $data['qishu_arr'] = $qishu_arr;

        #晒单数
        $data['share_num'] = $this->db->getstr("SELECT COUNT(*) FROM ###_share WHERE obj_id = '$row[buy_id]' AND extension_code = 3 AND is_show = 1");

        #最新一期
        $new_buy = $this->db->get("SELECT * FROM ###_yunbuy WHERE  sid = '$row[sid]' ORDER BY  buy_id DESC");
        $new_buy['jindu'] = sprintf("%.2f",$new_buy['buy_num']/$new_buy['need_num']*100);
        $new_buy = $this->yunbuy->getThumb($new_buy,1,array('src'));
        $data['new_buy'] = $new_buy;
        $data['is_ssc'] = $this->site_config['is_ssc'];

        #您的参与记录
        $join_member = $_SESSION['mid'] ? $_SESSION['mid'] : '';
        $status = $_SESSION['mid'] && empty($row['luck_code']) ? " <> 1" : " = '3'";
        $join_arr = $this->yunbuy->getyunDb(" AND d.mid = '$join_member' AND d.buy_id = '$id' AND d.status <> 1");

        $member_join = array();
        $a = array();
        if($join_arr){
            foreach($join_arr as $key=>$val){
                $member_join[] = $val['yun_code'];
                $member_join = explode(",",implode(",",$member_join));
            }
        }
        $data['join_arr'] = $join_arr;
        $data['member_join'] = $member_join;
        $data['member_join_count'] = count($member_join);

        #中奖者信息
        if($row['member_id']){
            $luck_code = str_split($row['luck_code']);
            $this->smarty->assign('luck_code',$luck_code);
            $this->load->model('member');
            $luck_member = $this->member->member_info($row['member_id']);
            $luck_member['username'] = nickname($luck_member['username'],$luck_member['nickname']);
            $luck_member2 = $this->db->get("SELECT ip,add_time FROM ###_yundb WHERE mid = '$row[member_id]' AND buy_id = '$row[buy_id]' AND luck_code <> ''");
            if(!empty($luck_member2)) $luck_member = $luck_member2+$luck_member;
            $luck_db = $this->db->get("SELECT * FROM ###_yundb WHERE status = 3 AND buy_id = '$id'");
            $luck_member['db_time'] = $luck_db['db_time'];
            $luck_member['qty'] = $luck_db['qty'];
            $luck_member['ip_str'] = cityIp($luck_db['ip']);
            $luck_member['photo'] = $this->taglib->_photo(array('source'=>$luck_member['photo'],'size'=>80));
            $luck_member['midFormat'] = sprintf('1%06d',$luck_member['mid']);
            $data['luck_member'] = $luck_member;
        }

        #往期
        $same_db = $this->db->select("SELECT * FROM ###_yunbuy WHERE sid = '$row[sid]' AND is_show = 1 ORDER BY qishu DESC");
        $this->smarty->assign('same_db',$same_db);
        #上期获得者
        if((STPL == 'mobile' && $row['wait_time'] && $row['wait_time']>time() && empty($row['luck_code'])) || (STPL == '' && $row['qishu'] > 1)){
            $prev_buy = $this->db->get("SELECT * FROM ###_yunbuy WHERE  sid = '$row[sid]' AND buy_id < '$row[buy_id]' AND luck_code > 0 ORDER BY buy_id DESC");
            $member = $this->db->get("SELECT photo,nickname,zone,ip FROM ###_member WHERE mid = '$prev_buy[member_id]'");
            $prev_buy['photo'] = $this->taglib->_photo(array('source'=>$member['photo'],'size'=>80));
            $prev_buy['ip_str'] = cityIp($member['ip']);
            $prev_buy['nickname'] = $member['nickname'];
            $prev_buy['wait_time'] = microtime_format($prev_buy['wait_time'],'Y-m-d H:i:s.x');
            $prev_buy['last_dbtime'] = microtime_format($prev_buy['last_dbtime'],'Y-m-d H:i:s.x');
            $this->smarty->assign('prev_buy',$prev_buy);
        }
        #点击量
        $this->db->update('yunbuy',"goods_click = goods_click+1",array('buy_id'=>$id));
        $data['unit_yun_button'] = $this->L['unit_yun_button'];
        $data['unit_yun'] = $this->L['unit_yun'];
        $data['unit_go_buy'] = $this->L['unit_go_buy'];
        $data['unit_yun_one'] = $this->L['unit_yun_one'];
        $data['share_url'] = url('/yunbuy/detail/'.$row['buy_id']);
        $data['share_text'] = $row['title'];
        $data['share_pic'] = $this->taglib->_fileurl(array('source'=>$row['thumb']));
        $data['wxKey'] = $this->site_config['wxKey'];
	    $data['app_shareurl']=$this->site_config['app_shareurl'];
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
    /**
     * 购物车
     */
    function cart(){
        $this->load->model('taglib');
        $type = isset($_REQUEST['free']) ? 2 : 1;
        $cart_goods = $this->yunbuy->cartgoods('',$type);
        $not_buy = empty($cart_goods) ? true : false;
        $goodsArr = array();
        if(!empty($cart_goods)){
            $ids = array();
            foreach($cart_goods as $key=>$val){
                $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = '$val[buy_id]'");
                $cart_goods[$key]['need_num'] = $row['need_num'];
                $cart_goods[$key]['imgurl_thumb'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_thumb'],'width'=>100,'height'=>100,'type'=>1));
                $cart_goods[$key]['end_num'] = $row['end_num'];
                $cart_goods[$key]['extData']= $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$val['qty']));
                $cart_goods[$key]['num_notbuy'] = $row['buy_num']>=$row['need_num'];
                $cart_goods[$key]['notbuy'] = $cart_goods[$key]['num_notbuy'] || $cart_goods[$key]['extData']['error'];
                if(in_array($val['type'],array(1,2))){
                    //过期商品更新到下一期
                    if($cart_goods[$key]['num_notbuy']){
                        #获取下一期，存在则替换
                        $row_next = $this->db->get("SELECT * FROM ###_yunbuy WHERE sid='$row[sid]' AND is_show=1 AND end_num>0 AND buy_id>'$val[buy_id]' ORDER BY buy_id ASC");
                        if($row_next){
                            $row = $row_next;
                            $cart_goods[$key]['num_notbuy'] = 0;

                            #过期的云购ID记录到购物车，并更新购物车
                            $this->db->save('yuncart',array(
                                'prev_buy_id'=> $val['buy_id'],
                                'buy_id'     => $row['buy_id'],
                                'qishu'      => $row['qishu'],
                            ),'',array('id'=>$val['id']));
                        }else{
                            unset($cart_goods[$key]);
                            continue;
                        }
                    }
                }
                $cart_goods[$key]['extData']= $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$val['qty']));
                if(!$cart_goods[$key]['notbuy']) $ids[] = $val['id'];
                $cart_goods[$key]['max_multi'] = $row['max_qishu']-$row['qishu']+1;
                $cart_goods[$key]['multi'] = !empty($val['multi']) ? intval(abs($val['multi'])) : 1;

                if($val['type']==3){
                    $is_cart_buy = 1;
                    if($type==1){ $empty = 0; }
                    if($row['need_num']>0){
                        $cart_goods[$key]['num_notbuy'] = 0;
                        $cart_goods[$key]['notbuy'] = 0;
                        $cart_goods[$key]['price'] = price_format($val['price']);
                        $cart_goods[$key]['goods_price'] = price_format($val['goods_price']);
                    }
                }
                if($val['type']==1){ $is_cart_db = 1; if($type==1){ $empty = 0; } }
                if($val['type']==2){ $is_cart_db_free = 1; if($type==2){ $empty = 0; } }
                if($row['is_show']<1){
                    $cart_goods[$key]['num_notbuy'] = 1;
                    $cart_goods[$key]['notbuy'] = 1;
                }
                if(!$cart_goods[$key]['notbuy']) $ids[] = $val['id'];
                $goodsArr[] = $cart_goods[$key];
            }
            if(empty($ids)) $not_buy = true;
        }
        $unit = $type==1 ?  $this->L['unit_db_points'] : $this->L['unit_pay_points'];
        $cart_total = $this->yunbuy->cartTotal($ids,$type);
        $this->api_result(array('data'=>array('num'=>count($goodsArr),'unit'=>$unit,'total'=>$cart_total?$cart_total:0,'goods'=>$goodsArr,'open_multi'=>$this->site_config['open_multi'],'unit_go_buy'=>$this->L['unit_go_buy'])));
    }

    /**
     * 删除购物车
     */
    function delcart($ids=''){
        $ids = explode(',',$ids);
        foreach($ids as $id){
            $id = intval($id);
            if(!$id) continue;
            if(!$_SESSION['mid']){
                $cartgoods = $this->yunbuy->cartgoods();
                foreach($cartgoods as $key=>$goods){
                    if($goods['buy_id']==$id) unset($cartgoods[$key]);
                }
                $cartgoods = array_values($cartgoods);
            }else{
                $this->db->delete("###_yuncart",array('id'=>$id,'mid'=>$_SESSION['mid']));
            }
        }
        $this->api_result(array('data'=>serialize($cartgoods)));
    }

    /**
     * 更新购物车
     */
    function updatecart(){
        $id = intval($_POST['id']);
        $type = isset($_POST['type']) ? intval($_POST['type']) : 1;
        $qty = intval($_POST['qty'])> 0 ? intval($_POST['qty']) : 1 ;
        $qty = $qty>32767 ? 32767 : $qty;
        $ids = !empty($_POST['ids']) ?  explode(",",trim($_POST['ids'])) : array();
        $data = array();
        if($this->site_config['open_multi']) $multi = intval($_POST['multi']);
        if($_SESSION['mid']){
            $cart_goods =  $this->db->get("SELECT buy_id,price,multi,qty FROM ###_yuncart WHERE id = '$id'",'price');
        }else{
            $cart_goods = $this->yunbuy->cartgoods();
            foreach($cart_goods as $val){
                if($val['id']==$id) $cart_goods = $val;
            }
        }
        $buy_info = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = '$cart_goods[buy_id]'");
        #购买限制
        $extData = $this->yunbuy->extBuy($buy_info, $_SESSION['mid'], array('qty'=>$qty));
        $error = "";
        if($extData['error'] == 2){
            $error = "您推荐注册的人数未达到此商品要求（".$extData['usernum']."人）".($extData['isreal']==1?'（需实名认证）':'');
        }elseif($extData['error'] == 1){
            $error = "您本期购买人次或购物车内购买人次已经达到最大限制（".$extData['buynum']."人次）";
        }elseif($extData['error'] == 3){
            $error = $extData['error_text'];
        }elseif($extData['error'] == 4){
            $error = "本商品可参与人群：从未云购成功的用户";
        }
        if($multi){
            $qty = $cart_goods['qty'];
            $max_multi = $buy_info['max_qishu']-$buy_info['qishu']+1;
            $multi = $multi>$max_multi ? $max_multi : $multi;
        }else{
            $multi = $cart_goods['multi'];
        }
        $subtotal = $cart_goods['price'] * $multi *  $qty;
        if($_SESSION['mid']){
            $this->db->update("###_yuncart",array('qty'=>$qty,'subtotal'=>$subtotal,'multi'=>$multi),array('id'=>$id,'mid'=>$_SESSION['mid']));
            $total = $this->yunbuy->cartTotal($ids,$type);
        }else{
            $cart_goods = $this->yunbuy->cartgoods();
            $total = 0;
            foreach($cart_goods as $key=>$val){
                if($val['id']==$id){
                    $cart_goods[$key]['qty'] = $qty;
                    $cart_goods[$key]['multi'] = $multi;
                    $cart_goods[$key]['subtotal'] = $subtotal;
                }
                if(in_array($val['id'],$ids)) $total += $cart_goods[$key]['subtotal'];
            }
        }
        $this->api_result(array('data'=>array('subtotal'=>$subtotal,'total'=>$total,'cart'=>serialize($cart_goods),'error'=>$error)));
    }

    /**
     * 加入购物车
     */
    function addtocart(){
        $id = intval($_POST['id']);
        $qty = !empty($_POST['qty']) ? intval($_POST['qty']) : 10;
        $type = !empty($_POST['type']) ? intval($_POST['type']) : 1;
        if($qty<=0) $qty = 1;
        $error = '';
        $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE end_num > 0 AND buy_id = $id");
        if(empty($row)){
            $this->api_result(array('msg'=>'商品信息错误'));
        }elseif(!empty($row['start_time']) && $row['start_time']>RUN_TIME){
            $this->api_result(array('msg'=>"该商品将于".date('Y-m-d H:i:s',$row['start_time'])."开始云购"));
        }else{
            //未登录
            if(empty($_SESSION['mid'])){
                if($qty>$row['end_num']) $qty = $row['end_num'];
                $cartgoods = $this->yunbuy->cartgoods();
                $isincart = false;
                $cartgoods = !empty($cartgoods) ? $cartgoods : array();
                foreach($cartgoods as $key=>$goods){
                    if($goods['buy_id']==$id){
                        $isincart = true;
                        $qty = $cartgoods[$key]['qty']+$qty > $row['end_num'] ? $row['end_num'] : $cartgoods[$key]['qty']+$qty;
                        $cartgoods[$key]['qty'] = $qty;
                        $cartgoods[$key]['subtotal'] = $row['price']*$qty;
                    }
                }
                if(!$isincart){
                    $cart['buy_id'] = $row['buy_id'];
                    $cart['goods_name'] = $row['title'];
                    $cart['cover'] = $row['cover'];
                    $cart['qishu'] = $row['qishu'];
                    $cart['qty'] = $qty>$row['end_num'] ? $row['end_num'] : $qty;
                    $cart['goods_price'] = $row['goods_price'];
                    $cart['price'] = $row['gobuy']==1 ? $row['custom_price'] : $row['price'];
                    $cart['subtotal'] = $cart['price']*$cart['qty'];
                    $cart['type'] = $row['gobuy']==1 ? '3' : $row['type'];
                    $cartgoods[] = $cart;
                }
                $cart_base = base64_encode(serialize($cartgoods));
            }else{
                $extData = array();
                //判断是否在购物车
                $cartgoods = $this->db->get("SELECT * FROM ###_yuncart WHERE mid = '$_SESSION[mid]' AND buy_id = '$id'");

                if($cartgoods){
                    $qty = $cartgoods['qty']+$qty > $row['end_num'] ? $row['end_num'] : $cartgoods['qty']+$qty;

                    #购买限制
                    $extData = $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$qty));
                    if($extData['error'] == 2){
                        die(json_encode(array('msg'=>"您推荐注册的人数未达到此商品要求（".$extData['usernum']."人）".($extData['isreal']==1?'（需实名认证）':''))));
                    }elseif($extData['error'] == 1){
                        die(json_encode(array('msg'=>"您本期购买人次或购物车内购买人次已经达到最大限制（".$extData['buynum']."人次）")));
                    }elseif($extData['error'] == 3){
                        die(json_encode(array('msg'=>$extData['error_text'])));
                    }elseif($extData['error'] == 4){
                        die(json_encode(array('msg'=>"本商品可参与人群：从未云购成功的用户")));
                    }

                    $this->db->update('###_yuncart',array('qty'=>$qty,'subtotal'=>$cartgoods['price']*$cartgoods['multi']*$qty),array('mid'=>$_SESSION['mid'],'buy_id'=>$id));
                }else{
                    $cart['buy_id'] = $row['buy_id'];
                    $cart['goods_name'] = $row['title'];
                    $cart['cover'] = $row['cover'];
                    $cart['mid'] = $_SESSION['mid'];
                    $cart['qishu'] = $row['qishu'];
                    $cart['qty'] = $qty>$row['end_num'] ? $row['end_num'] : $qty;
                    $cart['goods_price'] = $row['goods_price'];
                    $cart['price'] = $row['gobuy']==1 ? $row['custom_price'] : $row['price'];
                    $cart['subtotal'] = $cart['price']*$cart['qty'];
                    $cart['type'] = $row['gobuy']==1 ? '3' : $row['type'];

                    #购买限制
                    $extData = $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$cart['qty']));

                    if($extData['error'] == 2){
                        die(json_encode(array('msg'=>"您推荐注册的人数未达到此商品要求（".$extData['usernum']."人）".($extData['isreal']==1?'（需实名认证）':''))));
                    }elseif($extData['error'] == 1){
                        die(json_encode(array('msg'=>"您本期购买人次已经达到最大限制（".$extData['buynum']."人次）")));
                    }elseif($extData['error'] == 3){
                        die(json_encode(array('msg'=>$extData['error_text'])));
                    }elseif($extData['error'] == 4){
                        die(json_encode(array('msg'=>"本商品可参与人群：从未云购成功的用户")));
                    }
                    $this->db->insert('###_yuncart',$cart);
                }
            }
        }
        //更新购物车数量
        if($_SESSION['mid']){
            $cartNum = $this->db->getstr("SELECT COUNT(*) as total FROM ###_yuncart WHERE mid = '$_SESSION[mid]' AND type = 1",'total');
        }else{
            $cartNum = count($cartgoods);
        }
        $result = array('data'=>array('num'=>$cartNum,'cart'=>$cart_base));
        $this->api_result($result);
    }


    /**
     * 提交订单
     */
    function checkout(){
        $data = array();
        $this->load->model('member');
        $data['member'] = $member = $this->member->member_info($_SESSION['mid']);
        $data['member']['user_money_str'] = price_format($data['member']['user_money']);
        $row['title'] = '提交订单';
        $this->ur_here($row['title']);
        $this->display_before($row);
        $ids = !empty($_POST['ids']) ? explode(',',$_POST['ids']) : '';
        $type = $_POST['free'] ? 2 : 1;
        $data['unit'] = $type==1 ?  $this->L['unit_db_points'] : $this->L['unit_pay_points'];

        if(empty($ids)) $this->api_result(array('msg'=>'请选择您要提交的商品'));

        $cartgoods = $this->yunbuy->cartgoods($ids,$type);

        #检查购物车中是否为有效奖品
        if(empty($cartgoods)){
            $this->api_result(array('msg'=>'您的购物车中没有商品'));
        }
        foreach($cartgoods as $goods){
            if($goods['type']==3){
                $go_buy = 1;
                continue;
            }
            $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = '$goods[buy_id]' AND end_num <> '0'");
            if(empty($row)){
                $this->api_result(array('msg'=>'您的购物车中存在已'.$this->L['unit_kaijiang'].'或待'.$this->L['unit_kaijiang'].'商品,请删除后提交'));
            }

            #购买限制
            $extData = $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$goods['qty']));
            if($extData['error'] == 2){
                $this->api_result(array('msg'=>$goods['goods_name'].'此商品您推荐注册人数未达到要求,请删除后提交'));
            }elseif($extData['error'] == 1){
                $this->api_result(array('msg'=>$goods['goods_name'].'此商品您本期购买人次已经达到最大限制,请删除后提交'));
            }elseif($extData['error'] == 3){
                $this->api_result(array('msg'=>$goods['goods_name'].'此商品'.$extData['error_text'].',请删除后提交'));
            }elseif($extData['error'] == 4){
                $this->api_result(array('msg'=>$goods['goods_name'].'此商品可参与人群:从未云购成功的用户,请删除后提交'));
            }
        }

        //存在直购商品
        if($go_buy == 1){
            #收货地址
            $data['addressList'] = $this->member->member_address($_SESSION['mid']);
            if(empty($data['addressList'])){
                $this->api_result(array('msg'=>'请先添加'.$this->L['unit_go_buy'].'商品收货地址','code'=>5));
            }
            $data['order_address_id'] = (isset($_POST['address_id']) && intval($_POST['address_id'])) ? intval($_POST['address_id']) : $data['addressList'][0]['id'];
        }

        $data['goods'] = $cartgoods;
        $data['total'] = $cart_total = $this->yunbuy->cartTotal($ids,$type);

        $this->load->model('payment');
        $this->load->model('taglib');
        $where = "";
        #可用支付方式
        $payment = $this->payment->getPayment("enabled = '1' AND  pay_code <>'balance' $where");

        if(!empty($payment)){
            foreach($payment as $key=>$val){
                if(!empty($val['thumb'])) $payment[$key]['thumb'] = $this->taglib->_fileurl(array('source'=>$val['thumb']));
            }
        }
        $data['payment'] = $payment;
        #检查是否首次参与
        $has_db = $this->db->getstr("SELECT COUNT(*) FROM ###_yundb WHERE mid = '$_SESSION[mid]' AND status > 1");
        $data['is_share'] = $is_share = empty($has_db) ? 1 : 0;

        if($type==2 && $member['pay_points']<$cart_total) $data['disabled_sub'] = 1;
        if($type==1){
            #获取可用的抵用券金额,优先使用
            $this->load->model('bonus');
            $bonus = $this->bonus->getBonusUser(array(
                'mid'=>$_SESSION['mid'],
                'money'=>$cart_total
            ));
            if($bonus && $cart_total>=$bonus['money']){
                $cart_total -= $bonus['money'];
            }
            $bonus['count'] = count($bonus['list']);
            $data['bonus'] = $bonus;

            if(($member['db_points']+$member['user_money'])<$cart_total){
                $data['disabled_sub'] = 1;
            }
            
            if(($member['db_points']+$member['user_money'])<$cart_total){
                $inpay=$member['db_points']+$member['user_money'];
                $outpay=$cart_total-$member['db_points']-$member['user_money'];
                $data['inpay']=$inpay;
                $data['outpay']=$outpay;
            }else{
                $inpay=$cart_total;
                $data['inpay']=$inpay;
                $data['outpay']=0;
            }
        }


        $data['free'] = intval($_POST['free']);
        $data['unit_go_buy'] = $this->L['unit_go_buy'];
        $data['pay_url'] =url('/api/welcome/pay');
        $data['app_checking'] = $this->site_config['app_checking'];
        $data['sign'] = md5($_SESSION['mid'].$member['salt']);
        $this->api_result(array('data'=>$data));
    }

    /**
     * 加入订单
     */
    function done(){
        $this->load->model('member');
        $member = $this->member->member_info($_SESSION['mid']);
        $ids = explode(',',$_POST['ids']);
        $cartgoods = $this->yunbuy->cartgoods($ids);
        $order = array();

        #检查购物车中是否为有效奖品
        if($cartgoods && $ids && $member){
            $type = 1;
            foreach($cartgoods as $goods){
                if($goods['type']==2) $type = 2;
                elseif($goods['type']==3){
                    $go_buy = 1;
                    continue;
                }
                if($goods['qty']<=0){
                    $this->api_result(array('msg'=>'购物车商品数量不能小于1'));
                }
                $yuninfo = $this->yunbuy->yuninfo($goods['buy_id']);
                if($yuninfo['buy_num']>=$yuninfo['need_num']){
                    $this->api_result(array('msg'=>'购物车中有非进行中商品无法支付'));
                }

                #购买限制
                $extData = $this->yunbuy->extBuy($yuninfo, $_SESSION['mid'], array('qty'=>$goods['qty']));
                if($extData['error'] == 2){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品您推荐注册人数未达到要求,请删除后提交'));
                }elseif($extData['error'] == 1){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品您本期购买人次已经达到最大限制,请删除后提交'));
                }elseif($extData['error'] == 3){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品'.$extData['error_text'].',请删除后提交'));
                }elseif($extData['error'] == 4){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品可参与人群:从未云购成功的用户,请删除后提交'));
                }
            }
            if($type == 2){
                $go_buy = 0;
            }

            $cart_total = $this->yunbuy->cartTotal($ids,$type);

            $order['order_sn'] = $this->yunbuy->snOrder();
            $order['total'] = $cart_total;
            //抵用券支付
            if($_POST['bonus_pay'] && $type==1){
                #获取可用的抵用券金额,优先使用
                $this->load->model('bonus');
                $bonus = $this->bonus->getBonusUser(array(
                    'mid'=>$_SESSION['mid'],
                    'money'=>$cart_total
                ));
                if($bonus && $cart_total>=$bonus['money']){
                    $cart_total -= $bonus['money'];
                    $order['user_bonus_id'] = $bonus['ids'];
                }
            }

            //1 强制余额支付
            //$_POST['balance_pay'] = 1;
            if($_POST['balance_pay'] || $type==2){
                if($type==1){
                    //云购币支付
                    if(($member['db_points']+$member['user_money']) < $cart_total){
                        //$this->msg('您的云购币或余额不足，请先充值',array('url'=>'/member/recchage','iniframe'=>false));die;
                    }
                    $order['db_points'] = $member['db_points'] > $cart_total ? $cart_total : $member['db_points'];
                    $cart_total -= $member['db_points'];
                    if($cart_total>0 && $member['user_money']>0){
                        $order['user_money'] = $member['user_money']>=$cart_total ? $cart_total  :  $member['user_money'];
                        $cart_total -= $member['user_money'];
                    }
                }else{
                    //拍币支付
                    if($member['pay_points'] < $cart_total){
                        $this->api_result(array('msg'=>'您的账户拍币不足，无法支付订单'));
                    }
                    $order['pay_points'] =  $member['pay_points'] > $cart_total ? $cart_total : $member['pay_points'];
                    $cart_total -= $member['pay_points'];
                }
            }

            $order['order_amount'] = $cart_total>0 ? $cart_total : 0;
            $order['mid'] = $_SESSION['mid'];
            $order['username'] = $_SESSION['username'];
            $order['status'] = $order['order_amount'] == 0 ? 2 : 1;
            $order['db_time'] = $order['order_amount']==0 ? microtime_float() : '';
            $order['type'] = $type;

            //2 强制余额支付
            //$order['status'] = 2;

            //第三方支付
            if($order['status']==1){
                $pay_code =  !empty($_POST['pay_code']) ? trim($_POST['pay_code']) : 'wxpayapp';
                $this->load->model('payment');
                $payment = $this->db->get("SELECT *  FROM payment WHERE enabled = 1 AND pay_code = '$pay_code'");
                if(empty($payment)) $this->api_result(array('msg'=>'支付方式未启用'));
                $order['pay_id'] = $payment['pay_id'];
                $order['pay_name'] = $payment['pay_name'];
                $order['pay_code'] = $payment['pay_code'];
            }else{
                //记录账户明细 第三方支付时，回调时再处理
                $log_arr = array();
                $log_arr['mid'] = $_SESSION['mid'];
                $log_arr['username'] = $_SESSION['username'];
                $log_arr['pay_points'] = -$order['pay_points'];
                $log_arr['db_points'] = -$order['db_points'];
                $log_arr['user_money'] = -$order['user_money'];
                $log_arr['desc'] = '云购出价 '.$order['order_sn'];
                if($bonus['money']) $log_arr['desc'] .= "(使用".$this->L['unit_bonus']."{$bonus['money']}元)";
                $log_arr['rank_points'] = $order['pay_points']+$order['user_money']+$order['db_points']; #加经验值
                $this->member->accountlog('db',$log_arr);
            }

            //插入订单表
            $order_id = 0;
            do{
                $order['add_time'] = RUN_TIME;
                $this->db->insert("###_yunorder",$order);
                $order_id = $this->db->insert_id();
            }while($order_id==0);


            //插入订单表（直购）
            if($go_buy == 1){
                $order_buy = array(
                    'order_sn'       => $order['order_sn'],
                    'mid'            => $_SESSION['mid'],
                    'note'           => '',
                    'status'         => 1,
                    'c_time'         => time(),
                    'extension_code' => CART_BUY,
                    'extension_id'   => 0,
                    'pay_id'         => isset($pay_id)?$pay_id:0,
                );
                #收货地址
                $addressList = $this->member->member_address($_SESSION['mid']);
                $address_id = $_SESSION['order_address_id'];
                foreach($addressList as $v){
                    if($v['id']==$address_id){
                        $order_buy['deliver'] = $v['address'];
                        $order_buy['area'] = $v['area'];
                        $order_buy['mobile'] = $v['mobile'];
                        $order_buy['name'] = $v['name'];
                        break;
                    }
                }
                #支付信息
                $order_buy['integral'] = 0;
                $order_buy['surplus'] = isset($order['user_money']) ? $order['user_money'] : 0;
                $order_buy['deposit'] = 0;
                $order_buy['amount'] = $order['order_amount'];
                $order_buy['order_price'] = $order['total'];
                #在线支付
                if($order['status']==1){
                    $order_buy['pay_name'] = addslashes($payment['pay_name']);
                    $order_buy['pay_fee'] = $this->payment->pay_fee($pay_id, $order_buy['amount'], 0);
                }else{
                    $order_buy['status']   = 2;
                    $order_buy['pay_time'] = time();
                    $order_buy['amount'] = 0;
                }
                $order_id_buy = $this->db->save('goods_order',$order_buy);
            }

            //统计参与总人次
            $qty = 0;

            //订单云购奖品
            foreach($cartgoods as $goods){
                $insert_arr = array();
                $insert_arr['order_id'] = $order_id;
                $insert_arr['mid'] = $_SESSION['mid'];
                $insert_arr['username'] = $_SESSION['username'];
                $insert_arr['buy_id'] = $goods['buy_id'];
                $insert_arr['goods_name'] = $goods['goods_name'];
                $insert_arr['goods_price'] = $goods['goods_price'];
                $insert_arr['price'] = $goods['price'];
                $insert_arr['qty'] = $goods['qty'];
                $insert_arr['total'] = $goods['subtotal'];
                $insert_arr['cover'] = $goods['cover'];
                $insert_arr['qishu'] = $goods['qishu'];
                $insert_arr['multi'] = intval(abs($goods['multi']));
                $insert_arr['type'] = $goods['type'];
                $insert_arr['status'] = 1;
                $insert_arr['ip'] = getIP();
                $insert_arr['add_time'] = RUN_TIME;
                $insert_arr['agents'] = $this->useragent->getOs();
                if($goods['type']==3){
                    $goods_buy = $this->db->get("SELECT goods_id FROM ###_yunbuy WHERE buy_id = ".$goods['buy_id']);
                    $data_buy = array(
                        'mid'        => $_SESSION['mid'],
                        'order_id'   => $order_id_buy,
                        'good_id'    => $goods_buy['goods_id'],
                        'goods_name' => $goods['goods_name'],
                        'buy_num'    => $goods['qty'],
                        'sell_price' => $goods['price'],
                        'c_time'     => time(),
                        'goods_info' => '',
                        'from'       => 'group', #云购订单
                        'from_id'    => $goods['buy_id'], #云购ID
                    );
                    $this->db->save('goods_order_item', $data_buy);
                }else{
                    $this->db->insert("###_yundb",$insert_arr);
                }
                $qty += $goods['qty'];
            }

            //在线支付,插入支付日志跳转支付
            if($order['status']==1){
                $order['log_id'] = $this->payment->pay_log_save(array('order_id'=>$order_id,'order_amount'=>$order['order_amount'],'order_type'=>PAY_DB,'is_paid'=>PS_UNPAYED));
                $order['pay_id'] = $payment['pay_id'];
                $order['pay_name'] = $payment['pay_name'];
                $order['pay_code'] = $payment['pay_code'];
                include_once(AppDir . 'includes/modules/payment/' . $payment['pay_code'] . '.php');
                $pay_obj = new $payment['pay_code'];
                $payment = unserialize_config($payment['pay_config']);
                if($pay_code=='ipaynow'){
                    $payment['order_amount'] = $order['order_amount'];
                    $payment['notify_url'] = url('/api/welcome/respond');
                    $payment['log_id'] = $order['log_id'];
                }else{
                    $payment = $pay_obj->get_code($order, $payment);
                }
            }else{
                #更新抵用券使用状态 第三方支付时，回调时再处理
                if($order['user_bonus_id']){
                    $this->db->save('member_bonus',array(
                        'used_time' => time(),
                        'order_id'  => $order_id,
                    ),'',"id IN(".$order['user_bonus_id'].")");
                }

                //支付完成，生成云购码
                $this->yunbuy->orderPayed($order_id);
            }
            //清空购物车
            //$this->yunbuy->emptyCart($ids);
            $order['payment'] = $payment;
            $this->api_result(array('data'=>$order));
        }else{
            $this->api_result(array('msg'=>'购物车中暂时没有商品'));
        }
    }

    /**
     * 加入订单
     */
    function donewxsm(){
        $this->load->model('member');
        $member = $this->member->member_info($_SESSION['mid']);
        $ids = explode(',',$_POST['ids']);
        $cartgoods = $this->yunbuy->cartgoods($ids);
        $order = array();
    
        #检查购物车中是否为有效奖品
        if($cartgoods && $ids && $member){
            $type = 1;
            foreach($cartgoods as $goods){
                if($goods['type']==2) $type = 2;
                elseif($goods['type']==3){
                    $go_buy = 1;
                    continue;
                }
                if($goods['qty']<=0){
                    $this->api_result(array('msg'=>'购物车商品数量不能小于1'));
                }
                $yuninfo = $this->yunbuy->yuninfo($goods['buy_id']);
                if($yuninfo['buy_num']>=$yuninfo['need_num']){
                    $this->api_result(array('msg'=>'购物车中有非进行中商品无法支付'));
                }
    
                #购买限制
                $extData = $this->yunbuy->extBuy($yuninfo, $_SESSION['mid'], array('qty'=>$goods['qty']));
                if($extData['error'] == 2){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品您推荐注册人数未达到要求,请删除后提交'));
                }elseif($extData['error'] == 1){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品您本期购买人次已经达到最大限制,请删除后提交'));
                }elseif($extData['error'] == 3){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品'.$extData['error_text'].',请删除后提交'));
                }elseif($extData['error'] == 4){
                    $this->api_result(array('msg'=>$goods['goods_name'].'此商品可参与人群:从未云购成功的用户,请删除后提交'));
                }
            }
            if($type == 2){
                $go_buy = 0;
            }
    
            $cart_total = $this->yunbuy->cartTotal($ids,$type);
    
            $order['order_sn'] = $this->yunbuy->snOrder();
            $order['total'] = $cart_total;
            //抵用券支付
            if($_POST['bonus_pay'] && $type==1){
                #获取可用的抵用券金额,优先使用
                $this->load->model('bonus');
                $bonus = $this->bonus->getBonusUser(array(
                    'mid'=>$_SESSION['mid'],
                    'money'=>$cart_total
                ));
                if($bonus && $cart_total>=$bonus['money']){
                    $cart_total -= $bonus['money'];
                    $order['user_bonus_id'] = $bonus['ids'];
                }
            }
    
            //1 强制余额支付
            //$_POST['balance_pay'] = 1;
            if($_POST['balance_pay'] || $type==2){
                if($type==1){
                    //云购币支付
                    if(($member['db_points']+$member['user_money']) < $cart_total){
                        //$this->msg('您的云购币或余额不足，请先充值',array('url'=>'/member/recchage','iniframe'=>false));die;
                    }
                    $order['db_points'] = $member['db_points'] > $cart_total ? $cart_total : $member['db_points'];
                    $cart_total -= $member['db_points'];
                    if($cart_total>0 && $member['user_money']>0){
                        $order['user_money'] = $member['user_money']>=$cart_total ? $cart_total  :  $member['user_money'];
                        $cart_total -= $member['user_money'];
                    }
                }else{
                    //拍币支付
                    if($member['pay_points'] < $cart_total){
                        $this->api_result(array('msg'=>'您的账户拍币不足，无法支付订单'));
                    }
                    $order['pay_points'] =  $member['pay_points'] > $cart_total ? $cart_total : $member['pay_points'];
                    $cart_total -= $member['pay_points'];
                }
            }
    
            $order['order_amount'] = $cart_total>0 ? $cart_total : 0;
            $order['mid'] = $_SESSION['mid'];
            $order['username'] = $_SESSION['username'];
            $order['status'] = $order['order_amount'] == 0 ? 2 : 1;
            $order['db_time'] = $order['order_amount']==0 ? microtime_float() : '';
            $order['type'] = $type;
    
            //2 强制余额支付
            //$order['status'] = 2;
    
            //第三方支付
            if($order['status']==1){
                $pay_code = 'jhpay'; //!empty($_POST['pay_code']) ? trim($_POST['pay_code']) : 'wxpayapp';
                $this->load->model('payment');
                $payment = $this->db->get("SELECT *  FROM payment WHERE enabled = 1 AND pay_code = '$pay_code'");
                if(empty($payment)) $this->api_result(array('msg'=>'支付方式未启用'));
                $order['pay_id'] = $payment['pay_id'];
                $order['pay_name'] = $payment['pay_name'];
                $order['pay_code'] = $payment['pay_code'];
            }else{
                //记录账户明细 第三方支付时，回调时再处理
                $log_arr = array();
                $log_arr['mid'] = $_SESSION['mid'];
                $log_arr['username'] = $_SESSION['username'];
                $log_arr['pay_points'] = -$order['pay_points'];
                $log_arr['db_points'] = -$order['db_points'];
                $log_arr['user_money'] = -$order['user_money'];
                $log_arr['desc'] = '云购出价 '.$order['order_sn'];
                if($bonus['money']) $log_arr['desc'] .= "(使用".$this->L['unit_bonus']."{$bonus['money']}元)";
                $log_arr['rank_points'] = $order['pay_points']+$order['user_money']+$order['db_points']; #加经验值
                $this->member->accountlog('db',$log_arr);
            }
    
            //插入订单表
            $order_id = 0;
            do{
                $order['add_time'] = RUN_TIME;
                $this->db->insert("###_yunorder",$order);
                $order_id = $this->db->insert_id();
            }while($order_id==0);
    
    
            //插入订单表（直购）
            if($go_buy == 1){
                $order_buy = array(
                    'order_sn'       => $order['order_sn'],
                    'mid'            => $_SESSION['mid'],
                    'note'           => '',
                    'status'         => 1,
                    'c_time'         => time(),
                    'extension_code' => CART_BUY,
                    'extension_id'   => 0,
                    'pay_id'         => isset($pay_id)?$pay_id:0,
                );
                #收货地址
                $addressList = $this->member->member_address($_SESSION['mid']);
                $address_id = $_SESSION['order_address_id'];
                foreach($addressList as $v){
                    if($v['id']==$address_id){
                        $order_buy['deliver'] = $v['address'];
                        $order_buy['area'] = $v['area'];
                        $order_buy['mobile'] = $v['mobile'];
                        $order_buy['name'] = $v['name'];
                        break;
                    }
                }
                #支付信息
                $order_buy['integral'] = 0;
                $order_buy['surplus'] = isset($order['user_money']) ? $order['user_money'] : 0;
                $order_buy['deposit'] = 0;
                $order_buy['amount'] = $order['order_amount'];
                $order_buy['order_price'] = $order['total'];
                #在线支付
                if($order['status']==1){
                    $order_buy['pay_name'] = addslashes($payment['pay_name']);
                    $order_buy['pay_fee'] = $this->payment->pay_fee($pay_id, $order_buy['amount'], 0);
                }else{
                    $order_buy['status']   = 2;
                    $order_buy['pay_time'] = time();
                    $order_buy['amount'] = 0;
                }
                $order_id_buy = $this->db->save('goods_order',$order_buy);
            }
    
            //统计参与总人次
            $qty = 0;
    
            //订单云购奖品
            foreach($cartgoods as $goods){
                $insert_arr = array();
                $insert_arr['order_id'] = $order_id;
                $insert_arr['mid'] = $_SESSION['mid'];
                $insert_arr['username'] = $_SESSION['username'];
                $insert_arr['buy_id'] = $goods['buy_id'];
                $insert_arr['goods_name'] = $goods['goods_name'];
                $insert_arr['goods_price'] = $goods['goods_price'];
                $insert_arr['price'] = $goods['price'];
                $insert_arr['qty'] = $goods['qty'];
                $insert_arr['total'] = $goods['subtotal'];
                $insert_arr['cover'] = $goods['cover'];
                $insert_arr['qishu'] = $goods['qishu'];
                $insert_arr['multi'] = intval(abs($goods['multi']));
                $insert_arr['type'] = $goods['type'];
                $insert_arr['status'] = 1;
                $insert_arr['ip'] = getIP();
                $insert_arr['add_time'] = RUN_TIME;
                $insert_arr['agents'] = $this->useragent->getOs();
                if($goods['type']==3){
                    $goods_buy = $this->db->get("SELECT goods_id FROM ###_yunbuy WHERE buy_id = ".$goods['buy_id']);
                    $data_buy = array(
                        'mid'        => $_SESSION['mid'],
                        'order_id'   => $order_id_buy,
                        'good_id'    => $goods_buy['goods_id'],
                        'goods_name' => $goods['goods_name'],
                        'buy_num'    => $goods['qty'],
                        'sell_price' => $goods['price'],
                        'c_time'     => time(),
                        'goods_info' => '',
                        'from'       => 'group', #云购订单
                        'from_id'    => $goods['buy_id'], #云购ID
                    );
                    $this->db->save('goods_order_item', $data_buy);
                }else{
                    $this->db->insert("###_yundb",$insert_arr);
                }
                $qty += $goods['qty'];
            }
    
            //在线支付,插入支付日志跳转支付
            if($order['status']==1){
                $order['log_id'] = $this->payment->pay_log_save(array('order_id'=>$order_id,'order_amount'=>$order['order_amount'],'order_type'=>PAY_DB,'is_paid'=>PS_UNPAYED));
                $order['pay_id'] = $payment['pay_id'];
                $order['pay_name'] = $payment['pay_name'];
                $order['pay_code'] = $payment['pay_code'];
                include_once(AppDir . 'includes/modules/payment/' . $payment['pay_code'] . '.php');
                $pay_obj = new $payment['pay_code'];
                $payment = unserialize_config($payment['pay_config']);
                if($pay_code=='ipaynow'){
                    $payment['order_amount'] = $order['order_amount'];
                    $payment['notify_url'] = url('/api/welcome/respond');
                    $payment['log_id'] = $order['log_id'];
                }else{
                    $payment = $pay_obj->get_codewxsm($order, $payment);
                }
            }else{
                #更新抵用券使用状态 第三方支付时，回调时再处理
                if($order['user_bonus_id']){
                    $this->db->save('member_bonus',array(
                        'used_time' => time(),
                        'order_id'  => $order_id,
                    ),'',"id IN(".$order['user_bonus_id'].")");
                }
    
                //支付完成，生成云购码
                $this->yunbuy->orderPayed($order_id);
            }
            //清空购物车
            //$this->yunbuy->emptyCart($ids);
            $order['payment'] = $payment;
            $this->api_result(array('data'=>$order));
        }else{
            $this->api_result(array('msg'=>'购物车中暂时没有商品'));
        }
    }


    /**
     * 支付订单
     */
    function pay($order_sn = ''){
        $order = $this->yunbuy->orderInfo(''," order_sn = '$order_sn'");
        if(empty($order) || $order['status']==2) $this->api_result(array('msg'=>'订单信息错误或已支付'));

        $pay_log =  $this->db->get("SELECT * FROM ###_pay_log WHERE order_id = '$order[order_id]' AND order_type = '".PAY_DB."'");
        $order['log_id'] = $pay_log['log_id'];

        $orderdb = $this->yunbuy->orderDb($order['order_id']);
        if(!empty($orderdb)){
            foreach($orderdb as $val){
                $yuninfo = $this->yunbuy->yuninfo($val['buy_id']);
                #购买限制
                $extData = $this->yunbuy->extBuy($yuninfo, $_SESSION['mid'], array('qty'=>$val['qty']));
                if($extData['error'] == 2){
                    $this->api_result(array('msg'=>'此商品您推荐注册人数未达到要求'));
                }elseif($extData['error'] == 1){
                    $this->api_result(array('msg'=>'此商品您本期购买人次已经达到最大限制'));
                }elseif($extData['error'] == 3){
                    $this->api_result(array('msg'=>'此商品'.$extData['error_text'].''));
                }elseif($extData['error'] == 4){
                    $this->api_result(array('msg'=>'此商品可参与人群:从未云购成功的用户'));
                }
            }
        }
        $pay_code = !empty($_POST['pay_code']) ? trim($_POST['pay_code']) : $order['pay_code'];
        if(!empty($pay_code)){
            $payment_info = $this->db->get("SELECT *  FROM payment WHERE pay_code = '$pay_code'");
            if(empty($payment_info)) $this->api_result(array('msg'=>'支付方式未启用'));
            $this->db->update('yunorder',array('pay_id'=>$payment_info['pay_id'],'pay_name'=>$payment_info['pay_name'],'pay_code'=>$payment_info['pay_code']),array('order_id'=>$order['order_id']));
        }
        //取得支付信息，生成支付代码
        $this->load->model('payment');

        include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
        $pay_obj = new $payment_info['pay_code'];
        $payment = unserialize_config($payment_info['pay_config']);
        if($payment_info['pay_code']=='ipaynow'){
            $payment['order_amount'] = $order['order_amount'];
            $payment['log_id'] = $order['log_id'];
            $payment['notify_url'] = url('/api/welcome/respond');
        }else{
            $order['log_id'] = $this->db->getstr("SELECT log_id FROM ###_pay_log WHERE order_id = '$order[order_id]'");
            $payment = $pay_obj->get_code($order, $payment);
        }
        $order['payment'] = $payment;
        $this->api_result(array('data'=>$order));

    }

    /**
     * 支付订单
     */
    function paywxsm($order_sn = ''){
        $order = $this->yunbuy->orderInfo(''," order_sn = '$order_sn'");
        if(empty($order) || $order['status']==2) $this->api_result(array('msg'=>'订单信息错误或已支付'));
    
        $pay_log =  $this->db->get("SELECT * FROM ###_pay_log WHERE order_id = '$order[order_id]' AND order_type = '".PAY_DB."'");
        $order['log_id'] = $pay_log['log_id'];
    
        $orderdb = $this->yunbuy->orderDb($order['order_id']);
        if(!empty($orderdb)){
            foreach($orderdb as $val){
                $yuninfo = $this->yunbuy->yuninfo($val['buy_id']);
                #购买限制
                $extData = $this->yunbuy->extBuy($yuninfo, $_SESSION['mid'], array('qty'=>$val['qty']));
                if($extData['error'] == 2){
                    $this->api_result(array('msg'=>'此商品您推荐注册人数未达到要求'));
                }elseif($extData['error'] == 1){
                    $this->api_result(array('msg'=>'此商品您本期购买人次已经达到最大限制'));
                }elseif($extData['error'] == 3){
                    $this->api_result(array('msg'=>'此商品'.$extData['error_text'].''));
                }elseif($extData['error'] == 4){
                    $this->api_result(array('msg'=>'此商品可参与人群:从未云购成功的用户'));
                }
            }
        }
        $pay_code = 'jhpay';
        if(!empty($pay_code)){
            $payment_info = $this->db->get("SELECT *  FROM payment WHERE pay_code = '$pay_code'");
            if(empty($payment_info)) $this->api_result(array('msg'=>'支付方式未启用'));
            $this->db->update('yunorder',array('pay_id'=>$payment_info['pay_id'],'pay_name'=>$payment_info['pay_name'],'pay_code'=>$payment_info['pay_code']),array('order_id'=>$order['order_id']));
        }
        //取得支付信息，生成支付代码
        $this->load->model('payment');
    
        include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
        $pay_obj = new $payment_info['pay_code'];
        $payment = unserialize_config($payment_info['pay_config']);
        if($payment_info['pay_code']=='ipaynow'){
            $payment['order_amount'] = $order['order_amount'];
            $payment['log_id'] = $order['log_id'];
            $payment['notify_url'] = url('/api/welcome/respond');
        }else{
            $order['log_id'] = $this->db->getstr("SELECT log_id FROM ###_pay_log WHERE order_id = '$order[order_id]'");
            $payment = $pay_obj->get_codewxsm($order, $payment);
        }
        $order['payment'] = $payment;
        $this->api_result(array('data'=>$order));
    
    }

    function pay_order($order_sn = ''){

        if(strpos($order_sn,'R')===false){
            $order = $this->yunbuy->orderInfo(''," order_sn = '$order_sn'");
            if(empty($order) || $order['status']==2) $this->api_result(array('msg'=>'订单信息错误或已支付'));

        }else{
            $order_id = str_replace('R','',$order_sn);
            $order = $this->db->get("SELECT * FROM ###_member_account WHERE id = '$order_id'");
            if(empty($order) || $order['status']==2) $this->api_result(array('msg'=>'订单信息错误或已支付'));
            $order['order_amount'] = $order['amount'];
            $order['order_sn'] = $order_sn;
            $order['order_id'] = $order_id;
        }
        $type = strpos($order_sn,'R')===false ? PAY_DB : PAY_SURPLUS;
        $pay_log =  $this->db->get("SELECT * FROM ###_pay_log WHERE order_id = '$order[order_id]' AND order_type = '".$type."'");
        $order['log_id'] = $pay_log['log_id'];
        $pay_code = !empty($_POST['pay_code']) ? trim($_POST['pay_code']) : $order['pay_code'];
        if(!empty($pay_code)){
            $payment_info = $this->db->get("SELECT *  FROM payment WHERE pay_code = '$pay_code'");
            if(empty($payment_info)) $this->api_result(array('msg'=>'支付方式未启用'));
            $this->db->update('yunorder',array('pay_id'=>$payment_info['pay_id'],'pay_name'=>$payment_info['pay_name'],'pay_code'=>$payment_info['pay_code']),array('order_id'=>$order['order_id']));
        }
        //取得支付信息，生成支付代码
        $this->load->model('payment');

        include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
        $pay_obj = new $payment_info['pay_code'];
        $payment = unserialize_config($payment_info['pay_config']);
        if($payment_info['pay_code']=='ipaynow'){
            $payment['order_amount'] = $order['order_amount'];
            $payment['log_id'] = $order['log_id'];
            $payment['notify_url'] = url('/api/welcome/respond');
        }else{
            $order['log_id'] = $this->db->getstr("SELECT log_id FROM ###_pay_log WHERE order_id = '$order[order_id]'");
            $payment = $pay_obj->get_code($order, $payment);
        }
        if($payment_info['pay_code']=='jubaopay'){
            $html = '<form method="post" action="http://www.jubaopay.com/apiwapsyt.htm" id="payForm">
                            <input type="hidden" name="message" value="'.$payment['message'].'">
                            <input type="hidden" name="signature" value="'.$payment['signature'].'">
                        </form>
                        <script type="text/javascript">
                            document.getElementById(\'payForm\').submit();
                        </script>';
        }elseif($payment_info['pay_code']=='jdpay' || $payment_info['pay_code']=='heepaywechat'){
            $html = $payment['data'];
        }
        echo $html;
    }

    /**
     * 支付成功
     */
    function success($order_sn = ''){
        if(strpos($order_sn,'R')===false){
            $order = $this->yunbuy->orderInfo(''," order_sn = '$order_sn'");
        }else{
            $order_id = str_replace('R','',$order_sn);
            $order = $this->db->get("SELECT * FROM ###_member_account WHERE id = '$order_id'");
        }
        $this->api_result(array('data'=>$order));
    }

    /**
     * 金额统计
     */
    function total(){
        if(!empty($_GET['ids'])) $ids = explode(',',$_GET['ids']);
        $type = empty($ids) ? 1 : '';
        $msg = "";
        $cart_total = $this->yunbuy->cartTotal($ids,$type);
        $balance_pay = intval($_GET['balance_pay']);
        $sharecode = trim($_GET['sharecode']);
        //使用账户余额付款
        if($balance_pay){
            $this->load->model('member');
            $member = $this->member->member_info($_SESSION['mid']);
            $cart_total -= $member['db_points'];
            $cart_total -= $member['user_money'];
        }
        //使用分享码
        if($sharecode){
            $code_value = $this->db->getstr("SELECT value FROM ###_sharecode WHERE used_time < allow_time AND mid <> '$_SESSION[mid]' AND code = '$sharecode'");
            if($code_value){
                $cart_total -= $code_value;
            }else{
                $msg = "分享码无效";
            }
        }
        $amount = $cart_total>0 ? $cart_total : '0.00';
        //购物车检查选中时 显示
        if(isset($_GET['ids']) && empty($_GET['ids'])) $amount = '0';
        $result = array('amount'=>sprintf("%.2f", $amount),'msg'=>$msg);
        echo  json_encode($result);
    }

    //最新揭晓 倒计时结束触发开奖
    function lottery(){
        if(empty($_REQUEST['id'])) $this->api_result(array());
        $id = intval($_REQUEST['id']);
        $skin = trim($_REQUEST['skin']);
        $html = '';
        $row = $this->yunbuy->yuninfo($id);

        if(!empty($row['wait_time']) && RUN_TIME >= $row['wait_time'] && empty($row['luck_code'])){
            $this->yunbuy->lottery($id);
        }
        $this->load->model('taglib');

        $where = " AND d.status=3 AND d.is_show=1 AND d.buy_id=".$id;
        $list = $this->yunbuy->getyunDb($where,1,1,"",'','1/');
        $list = $this->db->lJoin($list,'yunbuy','buy_id,end_time,qihao','buy_id','buy_id');
        $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
        if(!empty($list)){
            foreach($list as $key=>$val){
                $list[$key]['imgurl_thumb'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200,'type'=>1));;
                $list[$key]['username'] = nickname($val['username'],$val['nickname']);
                $list[$key]['end_time'] = formatTime($val['end_time']);
            }
        }
        $data = array('luck_db'=>$list,'list'=>$list);
        exit(json_encode(array('data'=>$data)));
    }

    function getLeftTime($id=0,$type=1){
        $id = intval($id);
        $wait_time = time();
        $array = $this->yunbuy->updateDjx(1);
        if($array['list']){
            foreach($array['list'] as $v){
                if($v['buy_id'] == $id){
                    $wait_time = $v['wait_time'];
                    break;
                }
            }
        }
        if($type==2){
            echo $wait_time-time();
        }else{
            echo ($wait_time-time())*1000;
        }
    }



//    function test(){
//        $this->load->model('payment');
//        $this->load->model('taglib');
//        $where = "";
//        #可用支付方式
//        $payment = $this->payment->getPayment("enabled = '1'  $where");
//        if(!empty($payment)){
//            foreach($payment as $key=>$val){
//                if(!empty($val['thumb'])) $payment[$key]['thumb'] = $this->taglib->_fileurl(array('source'=>$val['thumb']));
//            }
//        }
//
//    }
}
