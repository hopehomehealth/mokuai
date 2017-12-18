<?php
/**
 * 挖宝 首页
 */
class yunbuy extends Lowxp{
    function __construct(){
        parent::__construct();
        $method = $_SERVER['request']['method'];
        //验证登录SIGN（APP使用）
        if(!empty($_REQUEST['mid']) && !empty($_REQUEST['sign']) && empty($_SESSION['mid'])){
            $mid = intval($_REQUEST['mid']);
            $this->load->model('member');
            $member = $this->member->member_info($mid);
            if(!empty($member) && md5($member['mid'].$member['salt'])==$_REQUEST['sign']){
                $this->member->setLogin($member);
            }
        }
        //需登录的操作
        $LoginActions = in_array($method, array('checkout','done'));
        if($LoginActions && empty($_SESSION['mid'])){
            $this->msg('',array('url'=>url('/member/login')));
        }
        $this->load->model('yunbuy');
        $this->smarty->assign('navMark', 'yunbuy');
    }

    function index($page=1){
        $this->load->model("yuncat");
        $template = 'index.html';
        $template_mobile = 'lists.html';
        $row = array();

        $where = '';
        $cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : 0;
        $bid = isset($_REQUEST['bid']) ? intval($_REQUEST['bid']) : 0;
        $type = isset($_REQUEST['type']) ? intval($_REQUEST['type']) : 1;
        if($cid){
            $cat = $row = $this->db->get("SELECT * FROM yuncat WHERE id = '$cid'");
            if(!empty($cat)) $where.=" AND b.cid" . $this->yuncat->condArrchild($cid);
        }
        if($bid){ $where.=" AND g.bid = '$bid'"; }
        if($type){ $where.=" AND b.type = '$type'"; }
        $this->smarty->assign('cid',$cid);
        $this->smarty->assign('bid',$bid);
        $this->smarty->assign('type',$type);

        $zq = isset($_REQUEST['zq']) ? trim($_REQUEST['zq']) : '';

        //ygqq模板
        if(CUR_SKIN == 'theme_01'){
            $ygqq = array();
            if($zq){
                $array_brand = array(
                    '10' => array('brand'=>'/style/theme_01/css/images/ten_banner.jpg'),
                    '100' => array('brand'=>'/style/theme_01/css/images/hundred-banner.jpg'),
                    'limit' => array('brand'=>'/style/theme_01/css/images/purchase-banner.jpg'),
                );
                $ygqq = $array_brand[$zq];
            }
            if($type==2){
                $array_brand = array(
                    '2' => array('brand'=>'/style/theme_01/css/images/free-banner.jpg'),
                );
                $ygqq = $array_brand[$type];
            }

            if(!empty($ygqq)){
                //10条最新揭晓
                $sql = "select * from ###_yunbuy where luck_code>0 and is_show=1 order by end_time DESC LIMIT 5";
                $ygqq['jx'] = $this->db->select($sql);
                $ygqq['jx'] = $this->db->lJoin($ygqq['jx'],'member','mid,username,nickname,photo','member_id','mid');

                $this->smarty->assign('ygqq', $ygqq);
            }
        }elseif(CUR_SKIN == 'cn'){
            //绑定广告位标记
            $ad = array();
            if($zq){
                $array_ad = array(
                    '1' => array('ad_mark'=>'yg-zq-1'),
                    '10' => array('ad_mark'=>'yg-zq-10'),
                    '100' => array('ad_mark'=>'yg-zq-100'),
                    'limit' => array('ad_mark'=>'yg-zq-limit'),
                    'buy' => array('ad_mark'=>'yg-zq-buy'),
                );
                $ad = $array_ad[$zq];
            }else{
                $ad = array('ad_mark'=>'yg-zq-1');
            }
            if($type==2){
                $ad = array('ad_mark'=>'yg-free');
            }
            $this->smarty->assign('ad', $ad);
        }

        //免费专区
        if($type==2){
            $title = "免费".$this->L['unit_area'];
        }

        #专区
        if($zq =='limit'){
            $where .= " AND b.buynum <> 0";
            $title = "限购".$this->L['unit_area'] ;
        }elseif(intval($zq)){
            $where .= " AND b.price = '".intval($zq)."'";
            $title = num2char(intval($_REQUEST['zq']))."元".$this->L['unit_area'];
        }elseif($zq == 'back'){
        	$where .= " AND b.is_return=1 ";
        	$title = "返".$this->L['unit_go_buy'].$this->L['unit_bonus'];
        }
        if($zq =='buy'){
            $where .= " AND b.gobuy=1";
            $title = $this->L['unit_go_buy'].$this->L['unit_area'];
            $template = 'index_buy.html';
            $template_mobile = 'lists_buy.html';
        }else{
            $where .= " AND b.gobuy=0";
        }
        $title = !empty($title) ? $title : $this->L['unit_yun_one'];
        #挖宝分类
        $this->load->model('yuncat');
        $yuncat = $this->yuncat->select();
        $this->smarty->assign('yuncat',$yuncat);

        if(STPL == 'mobile'){
            #排序
            $order = isset($_REQUEST['order']) ? trim($_REQUEST['order']) : '';
            $sort = isset($_REQUEST['sort']) ? trim($_REQUEST['sort']) : ' DESC';
            if($order=='count'){
                $order = 'b.goods_click';
            }elseif($order=='buy_num'){
                $order = 'b.buy_num';
            }elseif($order=='new'){
                $order = 'b.buy_id';
            }elseif($order=='price'){
                $order = 'b.goods_price';
            }elseif($order=='end_num'){
                $order = 'b.end_num';
            }elseif($order=='need_num'){
                $order = 'b.need_num';
            }elseif($order=='custom_price'){
                $order = 'b.custom_price';
            }elseif(!$order){
                $order = 'b.listorders DESC,b.buy_id DESC';
                //$order = 'b.wap_display_order desc';
                $sort = '';
            }
            #分页
            $size = !empty($_REQUEST['size']) ? intval($_REQUEST['size']) : 10;
            $this->load->model('page');
            $_GET['page'] = intval($page);
            $this->page->set_vars(array('per'=>$size));

            //搜索
            if(isset($_REQUEST['q']) && !empty($_REQUEST['q'])){
                $this->load->model('auction');
                if($page==1) $this->auction->setSearch($_REQUEST['q']);
                $where .= " AND b.title LIKE '%". htmlspecialchars(trim($_REQUEST['q'])) ."%'";
            }

            $sql = "SELECT b.*,buy_num/need_num AS ratio FROM ###_yunbuy AS b ".
                "LEFT JOIN ###_goods AS g ON g.id = b.goods_id ".
                "WHERE b.end_num > 0 AND b.is_show =1 $where ORDER BY $order $sort";
            $list = $this->page->hashQuery($sql)->result_array();

            $this->load->model('upload');
            $list = $this->upload->getImgUrls($list,'cover','gallery',array('src'));

            if($list){
                foreach($list as $key=>$val){
                    if(!empty($val['ext_info'])){
                        $ext_info = unserialize($val['ext_info']);
                        if(!empty($ext_info)) $val = array_merge($val, $ext_info);
                    }
                    $val['jindu'] = sprintf("%.2f",$val['buy_num']/$val['need_num']*100);
                    $val = $this->yunbuy->getThumb($val,1);
                    $list[$key] = $val;
                }
            }
            $this->smarty->assign('list',$list);

            #异步加载
            $template_lbi = 'yunbuy/lbi/list.html';
            if($_REQUEST['skin']==2){
                $template_lbi = 'yunbuy/lbi/list2.html';
            }
            if(isset($_GET['load'])){
                if($list){
                    if($_REQUEST['zq']=='buy'){
                        if($_REQUEST['skin']==2){
                            $template_lbi = 'yunbuy/lbi/list_index_buy.html';
                        }else{
                            $template_lbi = 'yunbuy/lbi/list_buy.html';
                        }
                    }
                    $content = $this->smarty->fetch($template_lbi);
                    echo $content;die;
                }
            }

            $row['title'] = $row['title'] ? $row['title'].'_'.$title : $title;
            if($cat_info['title']){
            	$this->display_before($cat_info);
            }else{
            	$this->display_before($row);
            }
            $this->smarty->assign('row',$row);
            $this->smarty->display('yunbuy/'.$template_mobile);
            die;
        }

        //赠币
        $free_list = $this->yunbuy->getyunbuy("end_num > 0 AND is_show =1 AND type = 2 ORDER BY buy_id DESC",10,1);
        $free_list = $this->db->lJoin($free_list,'goods','id,price','goods_id','id','g_');
        $this->smarty->assign('free_list',$free_list);

        $key = in_array($_GET['k'] , array('buy_num','end_num','need_num','add_time','custom_price','goods_click','ratio')) ? $_GET['k'] : '';
        $sort = in_array($_GET['s'] , array('desc','asc')) ? $_GET['s'] : 'desc';
        $order = $key ? ($key." ".$sort) : 'listorders desc,buy_id desc';
        //$order = $key ? ($key." ".$sort) : 'wap_display_order desc';

        $url = 'href="/yunbuy/index/{num}/?cid='.$cid.'&k='.$_GET['k'].'&s='.$_GET['s'].'&zq='.$_GET['zq'];

        //搜索
        if(isset($_REQUEST['q']) && !empty($_REQUEST['q'])){
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
        $page_size = 20;
        $this->page->set_vars(array('per'=>$page_size,'url'=>$url));

        $sql = "SELECT b.*,buy_num/need_num AS ratio FROM ###_yunbuy AS b ".
            "LEFT JOIN ###_goods AS g ON b.goods_id=g.id ".
            "WHERE b.end_num>0 AND b.is_show=1 $where ".
            "ORDER BY $order";
        $list = $this->page->hashQuery($sql)->result_array();

        if($list){
            foreach($list as $key=>$val){
                $val['jindu'] = sprintf("%.2f",$val['buy_num']/$val['need_num']*100);
                if(!empty($val['ext_info'])){
                    $ext_info = unserialize($val['ext_info']);
                    if(!empty($ext_info)) $val = array_merge($val, $ext_info);
                }
                $val['imgw'] = 280;
                $val['imgh'] = 195;
                $val = $this->yunbuy->getThumb($val,1);
                $list[$key] = $val;
            }
        }

        $this->load->model('upload');
        $list = $this->upload->getImgUrls($list,'cover','gallery',array('src'));
        $this->smarty->assign('list',$list);

        #敬请期待
        $this->smarty->assign('listNo', 4-count($list)%4);

        #品牌
        $this->load->model('brand');
        $brand = array();
        if($cid){
            #分类下品牌
            $goods_arr = $this->db->select("SELECT goods_id FROM ###_yunbuy WHERE buy_id <> 0 AND cid = '$cid' AND type = 1");
            $goods_id_arr = array();
            if($goods_arr){
                foreach($goods_arr as $val){
                    $goods_id_arr[] = $val['goods_id'];
                }
                $brand = $this->db->select("SELECT b.* FROM ###_brand AS b,###_goods AS g WHERE g.id IN (".implode(',',$goods_id_arr).") AND g.bid = b.id AND b.ismenu=1 GROUP BY b.id");
            }
        }else{
            $brand = $this->brand->select('',' AND ismenu=1');
        }
        $this->smarty->assign('brand',$brand);

        $row['title'] = $row['title'] ? $row['title'].'_'.$title : $title;
        $this->smarty->assign('total',$this->page->pages['total']);
        if($cat_info['title']){
        	$this->display_before($cat_info);
        }else{
        	$this->display_before($row);
        }
        $this->ur_here($title);
        $this->smarty->display('yunbuy/'.$template);
    }

    /**
     * 猜你喜欢
     */
    function randLove(){
        if(!isAjax()) die;
        $zq = isset($_REQUEST['zq']) ? trim($_REQUEST['zq']) : '';
        $where = " AND gobuy=0";

        $sql = "SELECT * FROM ###_yunbuy WHERE end_num>0 AND is_show=1 $where GROUP BY buy_id ORDER BY rand() LIMIT 5";
        $list = $this->db->select($sql);
        $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
        foreach($list as $k=>$val){
            if(!empty($val['ext_info'])){
                $ext_info = unserialize($val['ext_info']);
                if(!empty($ext_info)) $val = array_merge($val, $ext_info);
            }
            $val['jindu'] = sprintf("%.2f",$val['buy_num']/$val['need_num']*100);
            $val = $this->yunbuy->getThumb($val,1);
            $list[$k] = $val;
        }
        $this->smarty->assign('list', $list);
        $content = $this->smarty->fetch('yunbuy/lbi_yunbuy_love.html');
        echo $content;
    }

    /**
     * 赠币专区
     */
    function free($page=1){
        $this->display_before(array('title'=>"".$this->L['unit_yun']."体验区"));
        $this->ur_here("".$this->L['unit_yun']."体验区");

        //赠币
        $size = 15;
        $list = $this->yunbuy->getyunbuy("end_num > 0 AND is_show =1 AND type = 2 ORDER BY listorders DESC",$size,$page,'*','href="/yunbuy/free/{num}');
        $this->smarty->assign('list',$list);

        $this->smarty->assign('navMark', 'free');
        $this->smarty->display('yunbuy/free.html');
    }

    /**
     * 云购详情
     */
    function detail($id='',$op=''){
        $id = intval($id);
        if(empty($id)) $this->msg();
        $row = $this->yunbuy->yuninfo($id);
        if(empty($row)) $this->msg();
        if($row['is_show'] == 0 && $row['is_off'] == 0){ $this->msg(); }
        if($row['gobuy'] == 2){
            $this->msg('', str_replace('/yunbuy','/quanzi',getUrl()));
        }

        /**
         * 传入直购ID时，判断并获取云购ID
         */
        if($row['gobuy']==1){
            $buy_id = $this->db->getstr("SELECT buy_id FROM ###_yunbuy WHERE goods_id=".$row['goods_id']." AND is_show=1 AND end_num>0 AND gobuy=0 ORDER BY buy_id DESC LIMIT 1");
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
            $row_buy = $this->db->get("SELECT * FROM ###_yunbuy WHERE goods_id=".$row['goods_id']." AND is_show=1 AND gobuy=1 ORDER BY buy_id DESC LIMIT 1");
            if($row_buy){
                $this->smarty->assign('row_buy', $row_buy);
            }
        }

        /*if($this->site_config['index_skin'] == 2){
            if($row['gobuy'] == 0 && empty($row_buy)){ $this->msg(); }
        }*/

        $templates = 'detail.html';

        #商品来源
        $goods = $this->db->get("SELECT * FROM ###_goods WHERE id = '$row[goods_id]'");
        $from = explode('|',$goods['desc']);
        $this->smarty->assign('from',$from);
        $this->smarty->assign('goods',$goods);

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
        if(!empty($thumbs)){
            $row['pics'] = array();
            foreach($thumbs as $k=>$v){
                $v['imgurl_src'] = $v['path'];
                $row['pics'][$k] = $v;
            }
        }else{
            $row['pics'] = json_decode($row['pics'],true);
            $picdata = array();
            if(is_array($row['pics'])){
                foreach($row['pics'] as $v)$picdata[] = array('id'=>$v);
                $this->load->model('upload');
                $row['pics'] = $this->upload->getGalleryImgUrls($picdata,array('middle','src','thumb'));
            }else{
                $row['pics'] = array('','','','','','');
            }
        }

        $qty_config = intval($this->site_config['qty']);
        $row['jindu'] = $row['need_num'] ? number_format($row['buy_num']/$row['need_num']*100,1) : 100;
        $row['max_mun'] = $row['end_num']>=$qty_config ? $qty_config : $row['end_num'];
        //$row['goods_price'] = $goods['price'];

        if($row['luck_code']) $row['residue'] = str_split(fmod($row['time_total']+$row['kjjg'],$row['need_num']));
        $row['kjjg_str'] = $row['kjjg'];
        $row['kjjg'] = !empty($row['kjjg']) ? str_split($row['kjjg']) : '';

        if(STPL == 'mobile'){
            $row['head'] = "商品详情";
        }
	
	    $goods_id=$row['goods_id'];
        $wx_share=$row['wx_share'];
        if(empty($wx_share)){
            $wxshares=$this->db->select("select wxshares from ###_goods where id = '$goods_id'");
            if($wxshares!=null){
                $row['wx_share']=$wxshares[0]['wxshares'];
            }
        }
	
        $this->smarty->assign('row',$row);

        #待开奖时间
        if($row['wait_time']) $this->smarty->assign('end_time',($row['wait_time']-time())*1000);

        #最新一期
        $new_buy = $this->db->get("SELECT * FROM ###_yunbuy WHERE sid = '$row[sid]' ORDER BY  buy_id DESC");
        $new_buy['jindu'] = $new_buy['need_num'] ? sprintf("%.2f",$new_buy['buy_num']/$new_buy['need_num']*100) : 100;
        $new_buy = $this->yunbuy->getThumb($new_buy,1,array('src'));
        $this->smarty->assign('new_buy',$new_buy);

        #您的参与记录
        $join_member = $_SESSION['mid'] && empty($row['luck_code']) ? $_SESSION['mid'] : $row['member_id'];
        //$status = $_SESSION['mid'] && empty($row['luck_code']) ? " <> 1" : " = '3'";
        $join_arr = $this->yunbuy->getyunDb(" AND d.mid = '$join_member' AND d.buy_id = '$id' AND d.status <> 1");

        $member_join = array();
        if($join_arr){
            foreach($join_arr as $key=>$val){
                if(empty($val['yun_code'])) continue;
                $member_join[] = $val['yun_code'];
                $join_arr[$key]['code'] = explode(",",$val['yun_code']);
            }
            $member_join = explode(",",implode(",",$member_join));
        }
        $this->smarty->assign("join_arr",$join_arr);
        $this->smarty->assign("member_join",$member_join);
		
        if($row['last_dbtime']){
            #全站参与记录
            $data = $this->yunbuy->cacheYunInfo($id);
            $site_join = $data['join'];
            $this->smarty->assign('site_join',$site_join);
        }

        #中奖者信息
        if($row['member_id']){
            $luck_code = str_split($row['luck_code']);
            $this->smarty->assign('luck_code',$luck_code);
            $this->load->model('member');
            $luck_member = $this->member->member_info($row['member_id']);
            $luck_member2 = $this->db->get("SELECT ip,add_time,db_time FROM ###_yundb WHERE mid = '$row[member_id]' AND buy_id = '$row[buy_id]' AND luck_code <> ''");
            if(!empty($luck_member2)) $luck_member = $luck_member2+$luck_member;
            $this->smarty->assign('luck_member',$luck_member);
        }
        $catname = $this->db->getstr("SELECT catname FROM ###_yuncat WHERE id = '$row[cid]'");
        if($row['type']==2){
            $this->ur_here($row['title'],array(
                array('url'=>url('/yunbuy?type=2'),'name'=>"免费".$this->L['unit_area']),
                array('url'=>url('/yunbuy').'?cid='.$row['cid'],'name'=>$catname)
            ));
        }else{
            $ur_arr = $row['price']>1 ? array('url'=>url('/yunbuy').'?zq='.intval($row['price']),'name'=>num2char($row['price']).'元'.$this->L['unit_area'])  : array('url'=>url('/yunbuy'),'name'=>"".$this->L['unit_yun_one']."");
            if($row['gobuy'] == 1){
                $ur_arr = array('url'=>url('/yunbuy?zq=buy'),'name'=>$this->L['unit_go_buy'].'商品');
            }
            $this->ur_here($row['title'],array(0=>$ur_arr,1=>array('url'=>url('/yunbuy').'?cid='.$row['cid'],'name'=>$catname)));
        }

        $this->display_before($row);

        #上期获得者
        if($row['qishu'] > 1){
            $prev_buy = $this->db->get("SELECT * FROM ###_yunbuy WHERE sid = '$row[sid]' AND buy_id < '$row[buy_id]' AND luck_code > 0 ORDER BY buy_id DESC");
            if(!empty($prev_buy)){
	            $member = $this->db->get("SELECT photo,nickname,zone,ip FROM ###_member WHERE mid = '$prev_buy[member_id]'");
	            $prev_db = $this->db->get("SELECT * FROM ###_yundb WHERE buy_id=$prev_buy[buy_id] AND mid=$prev_buy[member_id]");
	            $prev_buy['photo'] = $member['photo'];
	            $prev_buy['ip'] = $member['ip'];
	            $prev_buy['nickname'] = $member['nickname'];
	            $prev_buy['db_time'] = $prev_db['db_time'];
	            $this->smarty->assign('prev_buy',$prev_buy);
            }
        }
        #最新云购
        $new_db = $this->db->select("SELECT d.*,m.photo,m.nickname,m.zone FROM ###_yundb AS d,###_member AS m WHERE d.buy_id = '$row[buy_id]' AND d.status <> 1 AND m.mid = d.mid ORDER BY id DESC LIMIT 18");
        $this->smarty->assign('new_db',$new_db);
        #点击量
        $this->db->update('yunbuy',"goods_click = goods_click+1",array('buy_id'=>$id));

        if(STPL == 'mobile'){
            if($op == 'join'){ //所有云购记录
                $row['head'] = "所有".$this->L['unit_yun']."记录";
                $this->smarty->assign('row',$row);
                $this->smarty->display('yunbuy/detail_join.html');
                die;
            }elseif($op == 'info'){ //图文详情
                $row['head'] = '图文详情';
                $this->smarty->assign('row',$row);
                $this->smarty->display('yunbuy/detail_info.html');
                die;
            }elseif($op == 'share'){ //晒单
                $row['head'] = '幸运者晒单';
                $this->smarty->assign('row',$row);
                $this->smarty->display('yunbuy/detail_share.html');
                die;
            }elseif($op == 'win'){ //往期揭晓
                $row['head'] = '往期揭晓';
                $this->smarty->assign('row',$row);
                $this->smarty->display('yunbuy/detail_win.html');
                die;
            }elseif($op == 'luck'){ //计算结果
                $row['head'] = '计算结果';
                $this->smarty->assign('row',$row);
                $this->smarty->display('yunbuy/detail_luck.html');
                die;
            }
        }

        if($row['gobuy'] == 1){
            $templates = 'detail_buy.html';
        }elseif($row['gobuy'] == 0){
            if($this->site_config['index_skin'] == 2 && !empty($row_buy)){
                $row = $row_buy;
                $templates = 'detail_buy.html';
            }
        }

        $this->smarty->display('yunbuy/'.$templates);
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
        if(!isAjax()){ $this->msg(); }
        $id=intval($_REQUEST['id']);

        $sql = "SELECT sid FROM ###_yunbuy ".
            "WHERE buy_id = $id";
        $sid = $this->db->getstr($sql);

        $size = 10;
        $list = $this->yunbuy->getyunbuy("sid='$sid' AND buy_id<$id AND is_show=1 ORDER BY buy_id DESC",$size,$page,"*");
        $list = $this->db->lJoin($list,'yundb','id,buy_id,mid,username,ip,luck_code,db_time','buy_id','buy_id','',"status=3");
        $list = $this->db->lJoin($list,'member','mid,nickname,photo','mid','mid');
        foreach($list as $k=>$v){
            #统计中奖会员总参与次数
            $sql = "SELECT SUM(qty) FROM ###_yundb ".
                "WHERE mid='$v[mid]' AND buy_id='$v[buy_id]' AND status<>1";
            $v['mid_buy_num'] = $this->db->getstr($sql);
            $list[$k] = $v;
        }

        $this->smarty->assign('list',$list);
        $array['content'] = $this->smarty->fetch('yunbuy/lbi/list_win.html');
        die(json_encode($array));
    }
    /**
     * 参与记录
     */
    function ajax_join($page=1){
        if(!isAjax()){ $this->msg(); }
        $id=intval($_REQUEST['id']);
        $size = 20;

        if(STPL == 'mobile'){
            $size = 20;
        }

        $list = $this->yunbuy->getyunDb(" AND d.buy_id = '$id' AND d.status <> 1 AND d.qty>0 ORDER BY db_time DESC",$size,$page,"",'href="/yunbuy/ajax_join/{num}?id='.$id);
        $join_arr = array();
        if($list){
            foreach($list as $key=>$val){
                $data = microtime_format($val['db_time'],'Y-m-d');
                $val['yun_code'] = explode(",",$val['yun_code']);
                $join_arr[$data][$key] = $val;
            }
        }

        if(STPL == 'mobile'){
            $this->smarty->assign('list',$join_arr);
            $array['content'] = $this->smarty->fetch('yunbuy/lbi/list_join.html');
            die(json_encode($array));
        }

        $this->smarty->assign('list',$join_arr);
        $this->smarty->display('yunbuy/ajax_join.html');
    }
	/**
     * 往期云购
     */
    function ajax_history($page=1){
        if(!isAjax()){ $this->msg(); }
        $id=intval($_GET['id']);
        $yuninfo = $this->yunbuy->yuninfo($id);
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>15,'url'=>'href="/yunbuy/ajax_history/{num}?id='.$id));
        $list = $this->page->hashQuery("SELECT buy_id, add_time, end_time, member_id, member_name, buy_num, luck_code FROM ###_yunbuy WHERE sid = '$yuninfo[sid]' and member_id <> 0 order by add_time desc")->result_array();
        $this->smarty->assign('list',$list);
        $this->smarty->display('yunbuy/ajax_history.html');
    }
    /**
     * 晒单
     */
    function ajax_share($page=1){
        if(!isAjax()){ $this->msg(); }
        $id=intval($_GET['id']);
        $yuninfo = $this->yunbuy->yuninfo($id);
        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>15,'url'=>'href="/yunbuy/ajax_share/{num}?id='.$id));
        $list = $this->page->hashQuery("SELECT s. *,m.photo,m.nickname FROM ###_yunbuy as b,###_share AS s LEFT JOIN ###_member AS m ON m.mid = s.mid WHERE b.sid = '$yuninfo[sid]' AND b.buy_id = s.obj_id AND s.extension_code = ".CART_DB)->result_array();
        $this->smarty->assign('list',$list);
        $this->smarty->display('yunbuy/ajax_share.html');
    }
    /**
     * 购物车
     */
    function cart(){
        $row['title'] = '购物车';
        $this->ur_here($row['title']);
        $this->display_before($row);
        $type = isset($_GET['free']) ? 2 : 1;
        $is_cart_buy = 0;
        $is_cart_db = 0;
        $is_cart_db_free = 0;
        $empty = 1;

        if(STPL == 'mobile'){
            $row['head'] = "".$this->L['unit_yun']."购物车";
            $this->smarty->assign('row',$row);
        }

        //未登录
        if(!$_SESSION['mid']){ $this->msg('',url('/member/login'));die; }
        $cart_goods = $this->yunbuy->cartgoods('',$type);
        $not_buy = empty($cart_goods) ? true : false;
        if($cart_goods){
            $ids = array();
            foreach($cart_goods as $key=>$val){
                $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = '$val[buy_id]'");
                $cart_goods[$key]['need_num'] = $row['need_num'];
                $cart_goods[$key]['end_num'] = $row['end_num'];
                $cart_goods[$key]['num_notbuy'] = $row['buy_num']>=$row['need_num'];
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
                        }
                    }
                }
                $cart_goods[$key]['extData']= $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$val['qty']));
                $cart_goods[$key]['notbuy'] = $cart_goods[$key]['num_notbuy'] || $cart_goods[$key]['extData']['error'];
                $cart_goods[$key]['max_multi'] = $row['max_qishu']-$row['qishu']+1;
                $cart_goods[$key]['multi'] = !empty($val['multi']) ? $val['multi'] : 1;
                if($val['type']==3){
                    $is_cart_buy = 1;
                    if($type==1){ $empty = 0; }
                    if($row['need_num']>0){
                        $cart_goods[$key]['num_notbuy'] = 0;
                        $cart_goods[$key]['notbuy'] = 0;
                    }
                }
                if($val['type']==1){ $is_cart_db = 1; if($type==1){ $empty = 0; } }
                if($val['type']==2){ $is_cart_db_free = 1; if($type==2){ $empty = 0; } }
                if($row['is_show']<1){
                    $cart_goods[$key]['num_notbuy'] = 1;
                    $cart_goods[$key]['notbuy'] = 1;
                }
                if(!$cart_goods[$key]['notbuy']) $ids[] = $val['id'];
            }
            if(empty($ids)) $not_buy = true;
        }

        if($empty){
            $this->msg('你的购物车还是空的<br>赶紧行动吧！',array('iniframe'=>false,'icon'=>'3','link'=>array(
                array('text' => '马上去购物','link'=>($type==2)?'/yunbuy?free':'/yunbuy')
            )));die;
        }

        $this->smarty->assign('cart_goods',$cart_goods);
        $this->smarty->assign('not_buy',$not_buy);
        $this->smarty->assign('is_cart_db',$is_cart_db);
        $this->smarty->assign('is_cart_db_free',$is_cart_db_free);
        $this->smarty->assign('is_cart_buy',$is_cart_buy);

        //推荐云购
        $rec_buy = $this->yunbuy->getyunbuy("need_num <> buy_num ORDER BY is_rec DESC,listorders DESC",5);
        $this->smarty->assign('rec_buy',$rec_buy);

        $this->smarty->assign('unit',$type==1 ?  "".$this->L['unit_db_points']."" : "".$this->L['unit_pay_points']."");

        $this->smarty->assign('cart_total',$this->yunbuy->cartTotal($ids,$type));
        $this->smarty->display('yunbuy/cart.html');
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
                $cart_base = base64_encode(serialize($cartgoods));
                zzcookie('yuncart', $cart_base);
            }else{
                $this->db->delete("###_yuncart",array('id'=>$id,'mid'=>$_SESSION['mid']));
            }
        }

        if($_GET['ajax']!=1){
            $url = !isset($_GET['free']) ? url('/yunbuy/cart') : url('/yunbuy/cart').'?free';
            $this->msg('',$url);
        }
    }

    /**
     * 更新购物车
     */
    function updatecart(){
        $id = intval($_POST['id']);
        $type = isset($_POST['type']) ? intval($_POST['type']) : 1;
        $qty = intval($_POST['qty'])> 0 ? intval($_POST['qty']) : 1 ;
        $qty = $qty>32767 ? 32767 : $qty;
        $ids = explode(",",trim($_POST['ids']));
        if($this->site_config['open_multi']) $multi = intval(abs($_POST['multi']));
        $cart_goods =  $this->db->get("SELECT buy_id,price,multi,qty,type FROM ###_yuncart WHERE id = '$id'",'price');
        if($multi){
            $buy_info = $this->db->get("SELECT qishu,max_qishu FROM ###_yunbuy WHERE buy_id = '$cart_goods[buy_id]'");
            $qty = $cart_goods['qty'];
            $max_multi = $buy_info['max_qishu']-$buy_info['qishu']+1;
            $multi = $multi>$max_multi ? $max_multi : $multi;
        }else{
            $multi = $cart_goods['multi'];
        }
        $subtotal = $cart_goods['price'] * $multi *  $qty;
        $this->db->update("###_yuncart",array('qty'=>$qty,'subtotal'=>$subtotal,'multi'=>$multi),array('id'=>$id,'mid'=>$_SESSION['mid']));
        $total = $this->yunbuy->cartTotal($ids,$type);
        echo json_encode(array('subtotal'=>$subtotal,'total'=>$total));
    }

    /**
     * 加入购物车
     */
    function addtocart(){
        $id = intval($_POST['id']);
        $qty_config = intval($this->site_config['qty']);
        $qty = !empty($_POST['qty']) ? intval($_POST['qty']) : $qty_config;
        $qty = $qty>32767 ? 32767 : $qty;
        $type = !empty($_POST['type']) ? intval($_POST['type']) : 1;
        if($qty<=0) $qty = 1;
        $error = '';
        $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = $id");

        if($row['end_num'] <= 0){
            die(json_encode(array('error'=>'本期商品已经结束！')));
        }

        if(empty($row)){
            die(json_encode(array('error'=>'商品信息错误')));
        }elseif(!empty($row['start_time']) && $row['start_time']>RUN_TIME){
            die(json_encode(array('error'=>"该商品将于".date('Y-m-d H:i:s',$row['start_time'])."开始".$this->L['unit_yun']."")));
        }else{

            /** 圈子商品处理
             * 未发起的商品，直接退出（不允许购买）
             */
            if($row['gobuy'] == 2 && $row['qishu'] == 0){
                die(json_encode(array('error'=>'未发起商品，不可购买')));
            }

            //未登录
            if(empty($_SESSION['mid'])){

                /** 圈子商品处理
                 * 购买圈子商品，需要先登录
                 */
                if($row['gobuy'] == 2){
                    die(json_encode(array('error'=>'请先登录！','url'=>'/member/login?back=/quanzi/detail/'.$id)));
                }

                if($qty>$row['end_num']) $qty = $row['end_num'];
                $cartgoods = $this->yunbuy->cartgoods();
                $isincart = false;
                $cartgoods = !empty($cartgoods) ? $cartgoods : array();
                foreach($cartgoods as $key=>$goods){
                    if($goods['buy_id']==$id){
                        $isincart = true;
                        $qty = $cartgoods[$key]['qty']+$qty > $row['end_num'] ? $row['end_num'] : ($cartgoods[$key]['qty']+$qty);
                        if($qty>32767)$qty=32767;
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
                zzcookie('yuncart', $cart_base);
            }else{
                $extData = array();
                //判断是否在购物车
                $cartgoods = $this->db->get("SELECT * FROM ###_yuncart WHERE mid = '$_SESSION[mid]' AND buy_id = '$id'");

                if($cartgoods){
                    $qty = $cartgoods['qty']+$qty > $row['end_num'] ? $row['end_num'] : ($cartgoods['qty']+$qty);
                    if($qty>32767)$qty = 32767;

                    #购买限制
                    $extData = $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$qty));
                    if($extData['error'] > 0){
                        //die(json_encode(array('error'=>$extData['error_text'])));
                    }else{
                        $this->db->update('###_yuncart',array('qty'=>$qty,'subtotal'=>$cartgoods['price']*$cartgoods['multi']*$qty),array('mid'=>$_SESSION['mid'],'buy_id'=>$id));
                    }
                }else{
                    /** 圈子商品处理
                     */
                    if($row['gobuy'] == 2){
                        //新加入圈子商品前，判断是否已验证密码
                        if(!isset($_SESSION['qz_pass'])){
                            die(json_encode(array('error'=>'请先验证密码！','url'=>'/quanzi/detail/'.$id)));
                        }
                    }

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

                    if($extData['error'] > 0){
                        die(json_encode(array('error'=>$extData['error_text'])));
                    }
                    $this->db->insert('###_yuncart',$cart);
                }
            }
        }
        //更新购物车数量
        if($_SESSION['mid']){
            $cartNum = $this->db->getstr("SELECT COUNT(*) as total FROM ###_yuncart WHERE mid = '$_SESSION[mid]' AND type IN(1,3)",'total');
        }else{
            $cartNum = count($cartgoods);
        }
        //清除圈子临时密码session
        if(isset($_SESSION['qz_pass'])){
            unset($_SESSION['qz_pass']);
        }
        $result = array('error'=>$error,'cartNum'=>$cartNum);
        echo json_encode($result);
    }
    /**
     * 载入购物车
     */
    function loadcart(){
        $cart_goods = $this->yunbuy->cartgoods('',1);
        if($cart_goods){
            $this->load->model('taglib');
            $html = '<div class="gwc-nr"><h3>最近加入的商品</h3>';
            $unit_db_points = $this->L['unit_db_points'];
            foreach($cart_goods as $val){
                $val['imgurl_thumb'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_thumb'],'width'=>64,'height'=>48,'type'=>1));
                if(!$_SESSION['mid']) $val['id'] = $val['buy_id'];

                if($val['type']==3){
                    $html .= '<div class="fn-clear gwc-list"><p class="p1"><a href="'.url('/yunbuy/detail/').$val['buy_id'].'"><img src="'.$val['imgurl_thumb'].'" alt="" /></a></p><p class="p2"><a href="'.url('/yunbuy/detail/').$val['buy_id'].'" class="a-title">'.$val['goods_name'].'</a><span class="color01">【'.$this->L['unit_go_buy'].'】</span><br /><span class="color01">'.price_format($val['price']).' × '.$val['qty'].'</span><span><a href="javascript:;" onclick="delCart('.$val['id'].')" class="right">删除</a></span></span></div>';
                }else{
                    $html .= '<div class="fn-clear gwc-list"><p class="p1"><a href="'.url('/yunbuy/detail/').$val['buy_id'].'"><img src="'.$val['imgurl_thumb'].'" alt="" /></a></p><p class="p2"><a href="'.url('/yunbuy/detail/').$val['buy_id'].'" class="a-title">'.$val['goods_name'].'</a><br /><span class="color01">'.$val['price'].$unit_db_points.' × '.$val['qty'].'期</span><span><a href="javascript:;" onclick="delCart('.$val['id'].')" class="right">删除</a></span></span></div>';
                }
            }
            $total = $this->yunbuy->cartTotal('',1);
            $html .= '</div><div class="gwc-gmbox"><p>共有'.count($cart_goods).'件商品，金额总计：<strong class="color01">'.$total.$unit_db_points.'</strong></p><a href="'.url('/yunbuy/cart').'" class="gwc-btn2">查看清单并结算</a></div></ul></div>';
        }else{
            $html = '<div class="w-miniCart-empty">您的清单中还没有任何物品</div>';
        }
        echo json_encode(array('html'=>$html,'num'=>count($cart_goods)));
    }

    /**
     * 提交订单
     */
    function checkout(){
        
        /*
        {if $cart_total lt $member.db_points add $member.user_money|price_format add $bonus.list|count}
        <span>222222222</span>
        {else}
        <span>11111111</span>
        {/if}
        */
        
        
        if($_POST['Submit']){
            $this->load->model('member');
            $member = $this->member->member_info($_SESSION['mid']);
            $this->smarty->assign('member',$member);

            $row['title'] = '提交订单';
            $this->ur_here($row['title']);
            $this->display_before($row);
            $ids = $_POST['id'];
            $type = $_POST['free'] ? 2 : 1;
            $this->smarty->assign('unit',$type==1 ?  "".$this->L['unit_db_points']."" : "".$this->L['unit_pay_points']."");
            $go_buy = 0;
            $data = array();

            if(empty($ids)){
                exit($this->msg('请选择您要提交的商品',array('iniframe'=>false,'url'=>'back')));
            }

            $cartgoods = $this->yunbuy->cartgoods($ids,$type);

            #检查购物车中是否为有效奖品
            if(empty($cartgoods)){
                $this->msg('您的购物车中没有商品',array('iniframe'=>false,'url'=>'back'));die;
            }
            foreach($cartgoods as $k=>$goods){
                $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = '$goods[buy_id]'");
                if($goods['type']==3){
                    $go_buy = 1;
                    $goods_info = $this->db->get("SELECT tips FROM ###_goods WHERE id=".$row['goods_id']);
                    $cartgoods[$k]['tips'] = $goods_info['tips'];
                    continue;
                }
                $row = $this->db->get("SELECT * FROM ###_yunbuy WHERE buy_id = '$goods[buy_id]' AND end_num <> '0'");
                if(empty($row) || $row['end_num'] <= 0){
                    $this->msg('您的购物车中存在已开奖或待开奖商品,请删除后提交',array('iniframe'=>false,'url'=>'back'));die;
                }

                #购买限制
                $extData = $this->yunbuy->extBuy($row, $_SESSION['mid'], array('qty'=>$goods['qty']));
                if($extData['error'] > 0){
                    $this->msg($extData['error_text'],array('iniframe'=>false,'url'=>'back'));die;
                }
            }

            //存在直购商品
            if($go_buy == 1){
                #收货地址
                $data['addressList'] = $this->member->member_address($_SESSION['mid']);
                if(empty($data['addressList'])){
                    $this->msg('请先添加'.$this->L['unit_go_buy'].'商品收货地址！',array('url'=>'/member/address?back=/yunbuy/cart','iniframe'=>false));
                }
                $_SESSION['order_address_id'] = (isset($_POST['address_id']) && intval($_POST['address_id'])) ? intval($_POST['address_id']) : $data['addressList'][0]['id'];
            }

            $this->smarty->assign('cartgoods',$cartgoods);
            $cart_total = $this->yunbuy->cartTotal($ids,$type);
            $gobuy_cart_total = $this->yunbuy->cartTotal($ids,3);
            $this->smarty->assign('cart_total',$cart_total);

            $this->load->model('payment');
            $where = "";
            $payment = $this->payment->getPayment("enabled = '1' AND is_cod <> '1' AND pay_code <>'balance' $where");

            #检查是否首次参与
            $has_db = $this->db->getstr("SELECT COUNT(*) FROM ###_yundb WHERE mid = '$_SESSION[mid]' AND status > 1");
            //$is_share = empty($has_db) ? 1 : 0;
            $is_share = 0;
            $this->smarty->assign('is_share',$is_share);

            if($type==2 && $member['pay_points']<$cart_total) $this->smarty->assign('disabled_sub',1);
            if($type==1){
                #获取可用的抵用券金额,优先使用
                $this->load->model('bonus');
                $bonus = $this->bonus->getBonusUser(array(
                    'mid'=>$_SESSION['mid'],
                    'money'=>$cart_total,
                	'gobuy_money'=>$gobuy_cart_total
                ));
                if($bonus && $cart_total>$bonus['money']){
                    $cart_total -= $bonus['money'];
                }
                $this->smarty->assign('bonus',$bonus);

                if(($member['db_points']+$member['user_money'])<$cart_total){
                    $this->smarty->assign('disabled_sub',1);
                }
                
                if(($member['db_points']+$member['user_money'])<$cart_total){
                    $inpay=$member['db_points']+$member['user_money'];
                    $outpay=$cart_total-$member['db_points']-$member['user_money'];
                    $this->smarty->assign('inpay',$inpay);
                    $this->smarty->assign('outpay',$outpay);
                }else{
                    $inpay=$cart_total;
                    $this->smarty->assign('inpay',$inpay);
                    $this->smarty->assign('outpay',0);
                }
            }

            if(STPL == 'mobile'){
                $this->smarty->assign('row',array('head'=>"".$this->L['unit_yun']."订单"));
            }
            //满减规则，提示
            $rules = explode('|',$this->site_config['full_cut']);
            if($rules[1]>0){
            	$this->smarty->assign('rules',$rules);
            }
            $this->smarty->assign('data',$data);
            $this->smarty->assign('payment',$payment);
            $this->smarty->display('yunbuy/checkout.html');
        }else{
            $this->msg('',url('/yunbuy/cart'));
        }

    }

    function payTip(){
        $this->smarty->display('yunbuy/payTip.html');
    }

    /**
     * 加入订单
     */
    function done(){
        $this->load->model('member');
        $member = $this->member->member_info($_SESSION['mid']);
        $ids = is_array($_POST['id']) ? $_POST['id'] : array() ;
        if(empty($ids)) $this->msg('','/yunbuy/cart');
        $cartgoods = $this->yunbuy->cartgoods($ids);
        $order = array();
        $go_buy = 0; //购物车存在直购商品标记

        #检查购物车中是否为有效奖品
        //if(empty($cartgoods)){ exit($this->msg('','/yunbuy/cart')); }
        //if (!checkToken()) { exit($this->msg('请不要重复提交订单！',array('iniframe'=>false))); }

        if($cartgoods && $ids && $member){
            $type = 1;
            foreach($cartgoods as $k=>$goods){
                $yuninfo = $this->yunbuy->yuninfo($goods['buy_id']);
                if($goods['type']==2) $type = 2;
                elseif($goods['type']==3){
                    $go_buy = 1;

                    //下单备注
                    $goods_info = $this->db->get("SELECT id,tips FROM ###_goods WHERE id=".$yuninfo['goods_id']);
                    $tips = isset($_POST['goods_info_'.$goods['id']]) ? htmlspecialchars($_POST['goods_info_'.$goods['id']]) : '';
                    if(!empty($goods_info['tips']) && $tips == $goods_info['tips']){ $this->msg('请修改有订单备注的内容!',array('iniframe'=>false));die; }
                    $cartgoods[$k]['tips'] = $tips;

                    continue;
                }
                if($goods['qty']<=0){
                    $this->msg('购物车商品数量不能小于1',array('url'=>'/yunbuy/cart','iniframe'=>false));die;
                }
                if($yuninfo['buy_num']>=$yuninfo['need_num']){
                    $this->msg('购物车中有非进行中商品无法支付',array('url'=>'/yunbuy/cart','iniframe'=>false));die;
                }
                #购买限制
                $extData = $this->yunbuy->extBuy($yuninfo, $_SESSION['mid'], array('qty'=>$goods['qty']));
                if($extData['error'] > 0){
                    $this->msg($extData['error_text'],array('iniframe'=>false,'url'=>'back'));die;
                }
            }
            if($type == 2){
                $go_buy = 0;
            }

            $cart_total = $this->yunbuy->cartTotal($ids,$type);
            $gobuy_cart_total = $this->yunbuy->cartTotal($ids,3);
            if($cart_total<=0){
                $this->msg();die;
            }
            $order['order_sn'] = $this->yunbuy->snOrder();
            $order['total'] = $cart_total>0 ? $cart_total : 0;

            //抵用券支付
            if($_POST['bonus_pay'] && $type==1){
                #获取可用的抵用券金额,优先使用
                $this->load->model('bonus');
                $bonus = $this->bonus->getBonusUser(array(
                    'mid'=>$_SESSION['mid'],
                    'money'=>$cart_total,
                	'gobuy_money'=>$gobuy_cart_total
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
                    if($cart_total>0 && $member['db_points']>0){
                        $order['db_points'] = $member['db_points'] > $cart_total ? $cart_total : $member['db_points'];
                        $cart_total -= $member['db_points'];
                    }
                    if($cart_total>0 && $member['user_money']>0){
                        $order['user_money'] = $member['user_money'] > $cart_total ? $cart_total  :  $member['user_money'];
                        $cart_total -= $member['user_money'];
                    }
                }else{
                    //拍币支付
                    if($member['pay_points'] < $cart_total){
                        $this->msg("您的账户".$this->L['unit_pay_points']."不足，无法支付订单",array('url'=>'/yunbuy/cart?free','iniframe'=>false));die;
                    }
                    $order['pay_points'] =  $member['pay_points'] > $cart_total ? $cart_total : $member['pay_points'];
                    $cart_total -= $member['pay_points'];
                }
            }

            $cart_total = $cart_total>0 ? $cart_total : 0;
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
                $payid=0;
                $pay_id = intval($_POST['pay_id']);
                if($pay_id==99){
                    $pay_id=15;
                    $payid=99;
                }
                $this->load->model('payment');
                $payment = $this->payment->payment_info($pay_id);
                if(empty($payment)){
                    $this->msg('支付方式错误，请重新选择',array('url'=>'back','iniframe'=>false));die;
                }
                $order['pay_id'] = $pay_id;
                $order['pay_name'] = $payment['pay_name'];
                $order['pay_code'] = $payment['pay_code'];

                #选择付款方式（天工）
                if(isset($_POST['payment_type']) && trim($_POST['payment_type'])!=''){
                    $order['payment_type'] = $_POST['payment_type'];
                }
            }else{
                //记录账户明细 第三方支付时，回调时再处理
                $log_arr = array();
                $log_arr['mid'] = $_SESSION['mid'];
                $log_arr['username'] = $_SESSION['username'];
                $log_arr['pay_points'] = -$order['pay_points'];
                $log_arr['db_points'] = -$order['db_points'];
                $log_arr['user_money'] = -$order['user_money'];
                $log_arr['desc'] = "".$this->L['unit_yun']."出价 ".$order['order_sn'];
                if($bonus['money']) $log_arr['desc'] .= "(使用".$this->L['unit_bonus']."{$bonus['money']}元)";
                $log_arr['rank_points'] = $order['pay_points']+$order['user_money']+$order['db_points']; #加经验值
                
                //在线支付送网盘
                if((($order['user_money'])>0)&&($this->site_config['pay_discount_status']==1)&&($this->site_config['pay_discount']>0)){
                	//这里增加空间数量
                	$amount = ($order['user_money'])*number_format($this->site_config['pay_discount']);
                	$this->db->update('member',"spacedata = spacedata+$amount*1024*1024 ",array('mid'=>$_SESSION['mid']));
                }
                if($amount){
                	$log_arr['desc'] .= "，买".$this->L['unit_skydrive']."送".$this->L['unit_db_points']."或者".$this->L['unit_pay_points']."送空间"."$amount"."M";
                }
                $this->member->accountlog('db',$log_arr);
            }

            //插入云购订单表
            $order_id = 0;
            do{
                $order['add_time'] = RUN_TIME;
                $order_id = $this->db->save("###_yunorder",$order);
                //$order_id = $this->db->insert_id();
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
                    $goods_buy = $this->db->get("SELECT goods_id,mid FROM ###_yunbuy WHERE buy_id = ".$goods['buy_id']);
                    $goods_info = $this->db->get("SELECT `virtual` FROM ###_goods WHERE id = ".$goods_buy['goods_id']);
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
                        'virtual'    => $goods_info['virtual'],
                        'goods_info' => $goods['tips'],
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

                $payment_info = $this->payment->payment_info($pay_id);
                //取得支付信息，生成支付代码
                $payment = unserialize_config($payment_info['pay_config']);

                include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
                $row['title'] = '在线支付';
                $this->ur_here($row['title']);
                $this->display_before($row);
				if(IS_MOBILE||IS_WECHAT){
					$this->yunbuy->emptyCart($ids);
				}
                $pay_obj = new $payment_info['pay_code'];
                if($payid==99){
                    $payment_info['pay_button'] = $pay_obj->get_codesm($order, $payment);
                }else{
                    $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);
                }
                $this->smarty->assign('payment',$payment_info);
                //$this->yunbuy->emptyCart($ids);
                $this->smarty->assign('order_sn',$order['order_sn']);
                $this->smarty->assign('paytype',$payment_info['pay_code']);
                $this->smarty->assign('wx_config_false',1);
                $this->smarty->display('order/done.html');
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

                //清空购物车
                //$this->yunbuy->emptyCart($ids);
                $this->msg('',url('/yunbuy/success/').$order['order_sn']);
            }
        }
    }

	function ajaxclear(){
		$order_sn = $_POST['order_sn'];
		
		$order = $this->yunbuy->orderInfo(''," order_sn = '$order_sn'");
		//根据order_id查询buy_id
		if($order['order_id']){
			$orderdb = $this->yunbuy->orderDb($order['order_id']);
			 
			$ids = array();
			foreach($orderdb as $k=>$v){
				$ids[$k] = $v['buy_id'];
			}
			if(!empty($ids)){
				$this->yunbuy->emptyCart_1($ids);
			}
		}
	}
	
    /**
     * 支付订单
     */
    function pay($order_sn = ''){
        $order = $this->yunbuy->orderInfo(''," order_sn = '$order_sn'");

        //重新计算支付金额
        $order = $this->yunbuy->updateOrderAmount($order, $_SESSION['mid']);
        if(empty($order) || $order['status']==2) $this->msg('',url());

        $pay_log =  $this->db->get("SELECT * FROM ###_pay_log WHERE order_id = '$order[order_id]' AND order_type = '".PAY_DB."'");
        $order['log_id'] = $pay_log['log_id'];

        //重置支付日志状态
        if($pay_log['is_paid'] == 1){
            $this->db->save('pay_log',array('is_paid'=>'0'),'',array('log_id'=>$pay_log['log_id']));
        }

        $orderdb = $this->yunbuy->orderDb($order['order_id']);
        if(!empty($orderdb)){
            foreach($orderdb as $val){
                $yuninfo = $this->yunbuy->yuninfo($val['buy_id']);
                #购买限制
                $extData = $this->yunbuy->extBuy($yuninfo, $_SESSION['mid'], array('qty'=>$val['qty']));
                if($extData['error'] > 0){
                    exit($this->msg($extData['error_text'],array('iniframe'=>false,'url'=>'back')));
                }
            }
        }

        $this->load->model('payment');
        $payment_info = $this->payment->payment_info($order['pay_id']);

        //取得支付信息，生成支付代码
        $payment = unserialize_config($payment_info['pay_config']);

        /* 调用相应的支付方式文件 */
        include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
        /* 取得在线支付方式的支付按钮 */
        $row['title'] = '在线支付';
        $this->ur_here($row['title']);
        $this->display_before($row);
        $pay_obj = new $payment_info['pay_code'];
        $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);
        $this->smarty->assign('payment',$payment_info);
        $this->smarty->assign('wx_config_false',1);
        $this->smarty->display('yunbuy/pay.html');
    }

    /**
     * 支付成功
     */
    function success($order_sn = ''){
        $order = $this->yunbuy->orderInfo(''," order_sn = '$order_sn'");
		//根据order_id查询buy_id
        if($order['order_id']){
        	$orderdb = $this->yunbuy->orderDb($order['order_id']);
            $order_info = $this->db->get("SELECT id FROM ###_goods_order WHERE order_sn=".$order['order_sn']);
        	
        	$ids = array();
            if($orderdb){
                foreach($orderdb as $k=>$v){
                    $ids[$k] = $v['buy_id'];
                }
            }
            if($order_info){
                $order_items = $this->db->select("SELECT * FROM ###_goods_order_item WHERE order_id=".$order_info['id']);
                if($order_items){
                    foreach($order_items as $k=>$v){
                        if($v['from']=='group' && $v['from_id'] && $v['buy_num']>0){
                            $ids[$k] = $v['from_id'];
                        }
                    }
                }
            }

        	if(!empty($ids)){
        		$this->yunbuy->emptyCart_1($ids);
        	}
        }
        $this->smarty->assign('order',$order);
        $row['title'] = '支付成功';
        $this->ur_here($row['title']);
        $this->display_before($row);

        if(STPL == 'mobile'){
            $row['head'] = $row['title'];
            $row['noback'] = 1;
        }

        $this->smarty->display('yunbuy/success.html');
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
        if(!isAjax()){ $this->msg(); }
        $id = intval($_POST['id']);
        $skin = trim($_POST['skin']);
        $html = '';
        $this->yunbuy->lottery($id);

        $where = " AND d.status=3 AND d.is_show=1 AND d.buy_id=".$id;
        $list = $this->yunbuy->getyunDb($where,1,1,"",'','1/');
        $list = $this->db->lJoin($list,'yunbuy','buy_id,end_time,title','buy_id','buy_id');
        $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
        foreach($list as $m){
            $this->yunbuy->getYunUrl($m);
            $m = $this->yunbuy->getThumb($m);
            $this->smarty->assign('m',$m);
            if($skin=='index'){
                $html = $this->smarty->fetch('content/windbitemindex.html');
            }elseif($skin=='index_mobile'){
                $html = $this->smarty->fetch('content/windbitemindex.html');
            }elseif($skin=='mobile'){
                $html = '<li class="item ui-clr item-db">'.$this->smarty->fetch('content/lbi/list_db.html').'</li>';
            }else{
                $html = $this->smarty->fetch('content/windbitem.html');
            }
        }

        exit(json_encode(array('html'=>$html)));
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

    /**
     * 根据云购信息获取期数列表
     * @param int $page
     */
    function getQishuList($page = 1) {
        if( ! isAjax()) die;

        $sid = isset($_REQUEST['sid']) ? intval($_REQUEST['sid']) : 0;
        $buy_id = isset($_REQUEST['buy_id']) ? intval($_REQUEST['buy_id']) : 0;
        $qishu = isset($_REQUEST['qishu']) ? intval($_REQUEST['qishu']) : 0;
        $type = isset($_REQUEST['type']) ? intval($_REQUEST['type']) : 0; //0仅获取一行 1获取分页数据
        if( ! $sid || ! $buy_id || ! $qishu) die;

        //共用条件
        $select = "select buy_id,qishu,end_num ";
        $from = "FROM ###_yunbuy WHERE sid='$sid' AND (is_show=1 OR (is_show=0 AND is_off=1)) ";
        $order = "ORDER BY qishu DESC ";

        if ($type == 1){
            $size = 35;

            #分页
            $this->load->model('page');
            $_GET['page'] = intval($page);
            $this->page->set_vars(array('per'=>$size));

            $list = $this->page->hashQuery($select . $from . $order)->result_array();
            $this->smarty->assign('list', $list);
            $this->smarty->assign('qishu', $qishu);
            $this->smarty->display('yunbuy/lbi_qishu_list.html');
            die();
        } else {
            //获取一行
            $max = $this->db->getstr("SELECT MAX(qishu) " . $from . $order . " LIMIT 1");

            if($max <= 10) {
                $data = array('limit'=>10, 'more_text'=>0, 'more_point'=>0, 'max'=>$max-1);
            } elseif ($max - $qishu > 7) {
                $data = array('limit'=>9, 'more_text'=>1, 'more_point'=>1, 'max'=>$qishu + 2);
                if($qishu < 7) { $data['max'] = 8; }
            } else {
                $data = array('limit'=>9, 'more_text'=>1, 'more_point'=>0, 'max'=>$max-1);
            }

            $from .= " AND (qishu='$max' OR qishu<='".$data['max']."')";
            $list = $this->db->select($select . $from . $order . " LIMIT " . $data['limit']);

            $data['html'] = '<div class="fn-clear yhp-wq"><ul>';
            foreach($list as $k=>$v){
                $url = '/yunbuy/detail/'.$v['buy_id'];
                $dq = ($v['buy_id'] == $buy_id) ? "class='dq'" : '';
                $ing = ($v['end_num'] > 0) ?  " class='color01'" : '';
                $img = ($v['end_num'] > 0) ? " <img src='/style/images/ing.gif' />" : '';

                if ($data['more_point'] && $k == 1) {
                    $data['html'] .= "<li class='li_more_1'><a href='javascript:;'>......</a></li>";
                    continue;
                }
                $data['html'] .= "<li $dq><a href='$url' $ing>第".$v['qishu']."期 $img</a></li>";
            }
            if ($data['more_text']) {
                $data['html'] .= "<li class='li_more'><a href='javascript:;'>更多<i>+</i></a></li>";
            }
            $data['html'] .= '</ul></div>';
            $data['max'] = $max;
            die(json_encode($data));
        }
    }

    /**
     * 获取某一期的云购ID
     */
    function getBuyid(){
        if( ! isAjax()) die;

        $sid = isset($_REQUEST['sid']) ? intval($_REQUEST['sid']) : 0;
        $qishu = isset($_REQUEST['qishu']) ? intval($_REQUEST['qishu']) : 0;
        if( ! $sid || ! $qishu) die;

        $row = $this->db->get("SELECT buy_id FROM ###_yunbuy WHERE sid=$sid AND qishu=$qishu");
        die(json_encode($row));
    }

}
