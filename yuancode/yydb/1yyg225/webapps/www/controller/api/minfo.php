<?php
/**
 * 个人中心首页
 */
class minfo extends Lowxp{
    private $id = 0;

    function __construct(){
        parent::__construct();

        $this->load->model('member');
        $this->load->model('yunbuy');
        $this->load->model('auction');
        $this->load->model('taglib');
    }
    //个人空间首页
    function index(){
        $id = intval($_GET['id']);
        if(empty($id)) $this->api_result(array('msg'=>'用户不存在'));
        $data = array();

        $member = $this->member->member_info($id);
        if($member['status']==0){
            $this->api_result(array('msg'=>'该用户因违规已暂停使用'));
        }
        $member['member_rank'] = $this->db->getstr("SELECT rank_name FROM ###_member_rank WHERE id = '$member[rank_id]'");
        $next_level = $this->db->get("SELECT rank_name,min_points FROM ###_member_rank WHERE id > '$member[rank_id]'");
        if($next_level){
            $member['level_upgrade_name'] = $next_level['rank_name'];
            $member['level_upgrade'] = $next_level['min_points'] - $member['rank_points'];
        }else{
            $member['level_upgrade_name'] = '-';
            $member['level_upgrade'] = '0';
        }
        $member['photo'] = $this->taglib->_photo(array('source'=>$member['photo'],'size'=>80));
        $member['username'] = nickname($member['username'],$member['nickname']);
        $member['mid'] = sprintf('1%06d',$member['mid']);
        $member['ip'] = cityIp($member['ip']);
        $data['info'] = $member;
        $data['unit_yun'] = $this->L['unit_yun'];

        //是否为好友关系
        $isfri = -1;
        if(isset($_SESSION['mid'])){
            $isfri = $this->member->isFri($id,$_SESSION['mid']);
        }
        $data['isfri'] = $isfri;

        //访客统计
        if(isset($_SESSION['mid']) && $id != $_SESSION['mid']){
            $sql = "SELECT * FROM ###_member_visit WHERE mid1=$id AND mid2=".$_SESSION['mid'];
            $res = $this->db->get($sql);
            if(!empty($res)){
                $this->db->update('member_visit',"lasttime='".time()."',num=num+1",array('mid1'=>$id,'mid2'=>$_SESSION['mid']));
            }else{
                $this->db->insert('member_visit',array(
                    'mid1' => $id,
                    'mid2' => $_SESSION['mid'],
                    'lasttime' => time(),
                    'num'  => 1
                ));
            }
        }
        $this->api_result(array('data'=>$data));
    }
    //ajax加载夺宝记录
    function load_db($id,$page=1){
        $data = array();
        $vid = isset($_GET['vid']) ? intval($_GET['vid']) : 0;
        if($vid){
            $info = $this->yunbuy->yuninfo($vid);
            if(empty($info)) $this->msg('',url());
            $list = $this->yunbuy->getyunDb(" AND d.buy_id = '$vid' AND d.mid = '$id' AND d.status <> 1 ORDER BY db_time DESC",999,1);
            if($list){
                foreach($list as $key=>$val){
                    $list[$key]['yun_code'] = explode(",",$val['yun_code']);
                    $list[$key]['db_time'] = microtime_format($val['db_time']);
                }
            }
            $info['qty'] = $this->db->getstr("SELECT SUM(qty) as qty FROM ###_yundb WHERE buy_id = '$vid' AND mid = '$id' AND status <> 1");
            $data['list'] = $list;
            $info['imgurl_thumb'] = $this->taglib->_fileurl(array('source'=>$info['imgurl_thumb'],'width'=>200,'height'=>200));
            $data['db_info'] = $info;
            $data['unit_yun'] = $this->L['unit_yun'];
        }else{
            $size = 10;
            $list = $this->yunbuy->getyunDb(" AND d.mid = '$id' AND d.status <> 1 GROUP BY buy_id ORDER BY db_time DESC",$size,$page,"",'href="/minfo/{num}?id='.$id.'"',$id.'/');
            if($list){
                foreach($list as $key=>$val){
                    $list[$key]['buy'] = $this->yunbuy->yuninfo($val['buy_id']);
                    //中奖夺宝信息
                    $list[$key]['luck_db'] = $this->db->get("SELECT * FROM ###_yundb WHERE status = 3 AND buy_id = '$val[buy_id]'");
                    $list[$key]['yun_code'] = explode(',',$val['yun_code']);
                    $list[$key]['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200));
                    $list[$key]['luck_nickname'] = $this->db->getstr("SELECT nickname FROM ###_member WHERE mid = '".$list[$key]['buy']['member_id']."'");
                    $list[$key]['buy']['member_name'] = nickname($list[$key]['buy']['member_name'],$list[$key]['luck_nickname']);
                    $list[$key]['luck_qty'] = $this->db->getstr("SELECT SUM(qty) AS qty FROM ###_yundb  WHERE mid = '".$list[$key]['buy']['member_id']."'  AND buy_id = '$val[buy_id]' ORDER BY db_time DESC");
                    if($list[$key]['type']==2) $list[$key]['unit'] = $this->L['unit_pay_points'];
                }
            }
            $data = $list;
        }
        $this->api_result(array('data'=>$data));

    }
    //ajax加载夺宝中奖
    function load_dbCod($id,$page=1){
        $size = 12;
        $list = $this->yunbuy->getyunDb(" AND d.mid = '$id' AND d.status = 3 GROUP BY buy_id ORDER BY db_time DESC",$size,$page,"",'href="/minfo/luck/{num}?id='.$id.'"',$id.'/');
        $list = $this->db->lJoin($list,'yunbuy','buy_id,custom_price,goods_id,end_time,need_num','buy_id','buy_id');
        $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
        if(!empty($list)){
            foreach($list as $key=>$val){
                $list[$key]['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200));
                $list[$key]['wait_time'] = microtime_format($val['end_time'],'Y-m-d H:i:s.x');
            }
        }
        $this->api_result(array('data'=>$list));
    }
    //ajax加载竞拍记录
    function load_auc($id,$page=1){
        if(isAjax()==false){ $this->msg(); }
        $size = 10;
        $list = $this->auction->getList($size,$page,0,'',array(
            'mid'=>$id,
            'url'=>$id.'/',
            'qishu'=>0,
            'order'=>'a.act_id DESC'
        ));

        $member = $this->member->member_info($id);
        $this->smarty->assign('member',$member);

        $this->smarty->assign('list',$list);
        $this->smarty->display('minfo/load_auc.html');
    }
    //ajax加载竞拍中奖
    function load_aucCod($id,$page=1){
        if(isAjax()==false){ $this->msg(); }
        $size = 12;
        $list = $this->auction->logList($size,$page,0,$id,AllWIN,array(
            'qishu'=>0,
            'url'=>$id.'/',
            'fields'=>'g.title,g.qishu,g.goods_id,g.ext_info',
            'order'=>'a.cod_time DESC'
        ));

        #获取产品信息
        $list = $this->db->lJoin($list,'goods','id,cover,price','goods_id','id','goods_');

        #商品主图
        $this->load->model('upload');
        $list = $this->upload->getImgUrls($list,'goods_cover','gallery',array('src'));

        $this->smarty->assign('list',$list);
        $this->smarty->display('minfo/load_aucCod.html');
    }
    //ajax加载晒单
    function load_share($id,$page=1){
        $vid = isset($_GET['vid']) ? intval($_GET['vid']) : 0;
        $data = array();
        if($vid){
            $share = $this->db->get("SELECT * FROM ###_share WHERE id = '".intval($vid)."'");
            if($share['extension_code']==CART_DB){
                $info = $this->yunbuy->yuninfo($share['obj_id']);
                $info['url'] = url('/yunbuy/detail/'.$share['obj_id']);
                //最新一期
                $new_buy = $this->db->get("SELECT * FROM ###_yunbuy WHERE sid = $info[sid] AND end_num <> 0 ORDER BY buy_id DESC");
                $data['new_buy'] = $new_buy;
                $db_info = $this->db->get("SELECT d.* FROM ###_yundb as d,###_goods_order as o WHERE o.id = $share[order_id] AND o.extension_id = d.id");
                $data['db_info'] = $db_info;
                //往期获得者
                $ended_db = $this->db->select("SELECT * FROM ###_yunbuy WHERE sid = $info[sid] AND luck_code <> 0 AND buy_id <> $info[buy_id]  ORDER BY buy_id DESC");
                if($ended_db){
                    foreach($ended_db as $key=>$val){
                        $ended_db[$key]['photo'] = $this->db->getstr("SELECT photo FROM ###_member WHERE mid = '$val[member_id]'");
                        $ended_db[$key]['share_id'] = $this->db->getstr("SELECT s.id FROM ###_yundb AS y,###_share AS s WHERE y.order_id = s.order_id AND y.mid = '$val[mid]' AND y.buy_id = '$val[buy_id]'");
                    }
                }
                $data['ended_db'] = $ended_db;
            }
            if(in_array($share['extension_code'], array(CART_WIN,CART_AUC))){
                $this->load->model('auction');
                $info = $this->auction->get($share['obj_id']);
                $info['url'] = url('/auction/view/'.$share['obj_id']);

                if($share['extension_code'] == CART_WIN){
                    $this->smarty->assign('cj_info',$this->db->get("SELECT * FROM ###_auction_log WHERE log_id=(SELECT extension_id FROM ###_goods_order WHERE id=".$share['obj_id'].")"));
                }elseif($share['extension_code'] == CART_AUC){
                    $this->smarty->assign('cj_info',$this->db->get("SELECT * FROM ###_auction_log WHERE act_id=".$share['obj_id']." ORDER BY log_id DESC"));
                }
            }
            $share['thumbs'] = unserialize($share['thumbs']);
            if(!empty($share['thumbs'])){
                foreach($share['thumbs'] as $key=>$val){
                    $share['thumbs'][$key] = $this->taglib->_fileurl(array('source'=>$val));
                }
            }
            $data['share'] = $share;
            #最新晒单
            $new_share = $this->yunbuy->getShare("s.mid<>0 ORDER BY id DESC",4,1);
            $member = $this->member->member_info($id);
            $member['username'] = nickname($member['username'],$member['nickname']);
            $data['member'] = $member;
            $info['end_time'] = microtime_format($info['end_time']);
            $data['info'] = $info;
            $data['new_share'] = $new_share;
        }else{
            $size = 18;
            $list = $this->yunbuy->getShare(" s.mid = '$id' ORDER BY addtime DESC",$size,$page,"s.*",'href="/minfo/share/{num}?id='.$id.'"',$id.'/');
            if(!empty($list)){
                foreach($list as $key=>$val){
                    $list[$key]['thumb'] = $this->taglib->_fileurl(array('source'=>$val['thumb'],'width'=>200,'height'=>200));
                    $list[$key]['addtime'] = date('Y-m-d H:i',$val['addtime']);
                    $member = $this->member->member_info($val['mid']);
                    $list[$key]['username'] = nickname($val['username'],$member['nickname']);
                }
            }
            $data = $list;
        }
        $this->api_result(array('data'=>$data));
    }
    //ajax加载访客
    function load_visit($id,$page=1){
        if(isAjax()==false){ $this->msg(); }
        $size = 30;
        $list = $this->member->visitList($size,$page,$id,array('url'=>$id.'/'));
        $this->smarty->assign('list',$list);
        $this->smarty->display('minfo/load_visit.html');
    }
    //ajax加载好友
    function load_fri($id,$page=1){
        if(isAjax()==false){ $this->msg(); }
        $size = 30;
        $list = $this->member->friList($size,$page,$id,array('url'=>$id.'/'));
        $this->smarty->assign('list',$list);
        $this->smarty->display('minfo/load_fri.html');
    }
    //添加/解除好友
    function addFri(){
        if(isAjax()==false){ $this->msg(); }
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if(!$id) exit;

        $member = $this->member->member_info($id);
        if(!$member) exit;

        $act = isset($_POST['act']) ? $_POST['act'] : true;
        if(!isset($_SESSION['mid'])){
            die(json_encode(array('error'=>1,'msg'=>'请先登陆！','url'=>url('/member'))));
        }
        if($_SESSION['mid'] == $id){
            die(json_encode(array('error'=>1,'msg'=>'您不能加自己为好友！')));
        }

        $status = $this->member->addFri($id,$_SESSION['mid']);
        if($status == 1){
            die(json_encode(array('error'=>0,'msg'=>'添加好友成功！')));
        }
        elseif($status == 2){
            die(json_encode(array('error'=>0,'msg'=>'解除好友成功！')));
        }
        die;
    }
}