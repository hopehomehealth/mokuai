<?php
/**
 * ZZCMS 前后台父类控制器
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */
class crowd_member extends Lowxp{
    function __construct(){
        parent::__construct();
        $method = $_SERVER['request']['method'];
        $isLogin = isset($_SESSION['mid']);
        $this->load->model('member');
        $this->load->model('crowd');

        //注册,提交注册,登录,忘记密码:不能登录状态的方法.
        $notLoginActions = in_array($method, array('regist', 'regist2', 'submit', 'login', 'act_login','forget','check_username','check_ivt','check_email','check_mobile','resetpass','oauth','oauth_login','oauth_chose','wx_scan','check_sync','sync_login'));
        //除以上模块外,其他都需要登录状态进行操作.
        if($isLogin){
            if($notLoginActions){
                //$this->exeJs('alert("当前已登录,该操作需在未登录状态下.");');
                //跳转到一个初始页面
                $this->exeJs('location.href="/"');
                die;
            }

            define('MID',$_SESSION['mid']);
            define('USER',$_SESSION['username']);
            $this->memberinfo = $this->member->member_info(MID);

            #会员等级
            $sql = "SELECT rank_name FROM ###_member_rank WHERE id='".$this->memberinfo['rank_id']."'";
            $this->memberinfo['rank_name'] = $this->db->getstr($sql);

            $member = $this->memberinfo;
            $safe_level = 1;
            if($member['verify_email']) $safe_level++;
            if($member['idcard']) $safe_level++;

            #距离下一次升级
            $max_points = $this->db->getstr("SELECT max_points FROM ###_member_rank WHERE id > '$member[rank_id]'");
            if($max_points) $member['level_upgrade'] = $max_points - $member['rank_points'];
            $this->smarty->assign('member',$member);
            $this->smarty->assign('safe_level',$safe_level);

            #今天是否签到
            $is_signin = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_signin WHERE mid = '".MID."' AND addtime >= '".strtotime('today')."'");
            $this->smarty->assign('is_signin',$is_signin);

            #获取抵用券张数
            $this->load->model('bonus');
            $this->smarty->assign('bonus_count',$this->bonus->getBonusUser(array(
                'mid' => MID
            ),1));

            //未领取数量
            $sql = "SELECT COUNT(id) FROM ###_yundb WHERE mid=".MID." AND status=3 AND is_award=0";
            $this->smarty->assign('dbcod_count', $this->db->getstr($sql));

            #验证手机号码
            if($method!="doexit"){
                if(empty($this->memberinfo['mobile']) && $method!="verifymobile" && !$this->memberinfo['is_robots']){
                    $this->exeJs('location.href="'.url('/member/verifymobile').'";');
                    die;
                }
            }

            //商家开关
            $this->load->model('business');
            $this->smarty->assign('business_power', $this->business->business_power);

            //商家状态
            if($this->business->business_power){
                $business_row = $this->business->get(array('mid'=>MID),'bus_status,bus_times');
                $this->smarty->assign('business_row', $business_row);
            }
            //众筹开关
            $this->load->model('crowd');
            $this->smarty->assign('crowd_power',$this->crowd->crowd_power);
        }else{
            //未登录，已第三方授权（会员中心首页，登录页，注册页），都转手机绑定页面
            $member_oauth = $this->member_oauth();
            if(!in_array($method,array('verifymobile','doexit')) && (!$method || in_array($method,array('index','login','regist'))) && isset($_SESSION['oauth']) && !empty($_SESSION['oauth'])){
                $this->exeJs('location.href="'.url('/member/verifymobile').'";');
                die;
            }
            //跳转登录
            if(!$notLoginActions && !in_array($method,array('verifymobile','doexit'))){
                $this->exeJs('location.href="'.url('/member/login').'"');
                die;
            }
            if($method == 'doexit'){
                return;
            }
        }
        $this->display_before(array('title'=>'会员中心'));
        $this->ur_here('',array(0=>array('url'=>url('/member'),'name'=>'会员中心')));
    }
    function index(){

    }
    /**
     * 我支持的
     * @param int $page
     */
    function support($page=1){
        $size = 10;
        $where = "s.member_id = '".MID."'";
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>$size,'url'=>'href="/crowd_member/start/{num}"'));
        switch(intval($_GET['status'])){
            case 1:
                $where .= " AND s.support_status >= 2";
                break;
            case 2:
                $where .= " AND s.support_status < 2";
                break;
            case 3:
                $where .= " AND s.support_status = '-1'";
                break;
        }
        $list = $this->page->hashQuery("SELECT s.support_sn,s.support_lottery_number,s.support_status,s.support_amount,s.support_created_time,c.cd_id,c.cd_name,c.cd_total,c.cd_price,c.thumb,c.end_time,c.is_success,c.status FROM ###_crowd_support AS s LEFT JOIN ###_crowd AS c ON s.crowd_id = c.cd_id WHERE $where ORDER BY support_created_time DESC")->result_array();
        $this->smarty->assign('list',$list);
        if(STPL=='mobile' && isset($_REQUEST['load'])){
            $content = $this->smarty->fetch('member/lbi/list_crowd_support.html');
            echo $content;die;
        }
        $this->smarty->assign('nav','support');
        $this->smarty->display('member/crowd_support.html');
    }

    /**
     * 我关注的
     * @param int $page
     */
    function focus($page=1){
        $size = 15;
        $where = "f.mid = '".MID."'";
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>$size,'url'=>'href="/crowd_member/start/{num}"'));
        $list = $this->page->hashQuery("SELECT f.add_time,c.cd_id,c.cd_name,c.thumb,c.cd_total,c.cd_price,c.support_num,c.status,c.end_time FROM ###_crowd_focus AS f LEFT JOIN ###_crowd AS c ON f.cd_id = c.cd_id WHERE $where ORDER BY f.add_time DESC")->result_array();
        $list = $this->db->lJoin($list,'crowd_detail','cd_id,focus_num','cd_id','cd_id');
        $this->smarty->assign('list',$list);
        $this->smarty->assign('nav','focus');
        $this->smarty->display('member/crowd_focus.html');
    }

    /**
     * 取消关注
     * @param string $id
     */
    function cancel_focus($id=""){
        $id = intval($id);
        $state = $this->db->delete("###_crowd_focus","mid = '".MID."' AND cd_id = '$id'");
        if($state){
            $this->db->update("###_crowd_detail","focus_num = focus_num-1","cd_id = '$id'");
            $this->msg('取消成功',array('iniframe'=>false,'url'=>url('/crowd_member/focus')));
        }else{
            $this->msg('操作错误',array('iniframe'=>false));
        }
    }

    /**
     * 我发起的
     * @param int $page
     */
    public function start($page = 1) {
        $size = 10;
        $where = "c.mid = '" . MID . "'";
        $this->load->model('page');
        
        unset($_GET);
        $_GET['page'] = intval($page);

        $this->page->set_vars(array('per'=>$size,'url'=>'href="/crowd_member/start/{num}"'));

        $list = $this->page->hashQuery("SELECT c.*,cd.reason FROM ###_crowd AS c LEFT JOIN ###_crowd_detail AS cd ON c.cd_id = cd.cd_id WHERE $where ORDER BY add_time DESC")->result_array();
        $this->smarty->assign('list', $list);
        $this->smarty->assign('nav', 'start');
        $this->smarty->display('member/crowd_start.html');
    }

    /**
     * 发起项目的支持订单
     * @param int $page
     */
    public function supportOrder($id, $page = 1) {
        $info = $this->crowd->get_info($id);

        if (empty($info) || $info['status'] != 2) {
            $this->msg('项目不存在', array('iniframe' => false));
        }
        if ($info['mid'] != MID) {
            $this->msg('非法操作', array('iniframe' => false));
        }
        $size = 8;
        $supportSn = ctype_digit($_GET['supportSn']) ? $_GET['supportSn'] : '';

        $supportStatus1 = isset($_GET['supportStatus2']) ? intval($_GET['supportStatus1']) : -1;
        $supportStatus2 = isset($_GET['supportStatus2']) ? intval($_GET['supportStatus2']) : -1;
        $supportStartTime = isset($_GET['supportStartTime']) ? strtotime($_GET['supportStartTime']) : false;
        $supportToTime = isset($_GET['supportToTime']) ? strtotime($_GET['supportStartTime']) : false;

        $where = 'c.cd_id = \'' . $id . '\'';
        if ($supportStartTime) {
            $where .= ' AND s.support_created_time > ' . $supportStartTime;
        }
        if ($supportToTime) {
            $where .= ' AND s.support_created_time < ' . $supportToTime;
        }
        $status = false;
        if ($supportStatus1 == '-1' || $supportStatus1 == '2') {
            $status = $supportStatus2;
        } else {
            $status = $supportStatus1;
        }
        if ($status >= 0 && $status <= 6) {
            $where .= ' AND s.support_status = ' . $status;
        }
        $this->load->model('page');
        $this->smarty->assign('g', $_GET);

        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per' => $size));
        $sql = 'SELECT *'
                . ' FROM ###_crowd AS c'
                . ' INNER JOIN ###_crowd_return AS r '
                . ' ON c.cd_id = r.cd_id '
                . ' INNER JOIN ###_crowd_support AS s '
                . ' ON r.rt_id = s.return_id '
                . ' WHERE  ' . $where
                . ' ORDER BY s.support_created_time DESC';
        $list = $this->page->hashQuery($sql, $id . '/')->result_array();

        $this->smarty->assign('list', $list);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('nav', 'start');
        $this->smarty->display('member/crowd_support_order.html');
    }

    /**
     * 取消审核
     * @param string $id
     */
    function cancel($id=''){
        if(empty($id)) return false;
        $info = $this->crowd->get_info($id);
        if(empty($info) || $info['status']!=1) $this->msg('项目不在待审核状态',array('iniframe'=>false));
        if($info['mid']!=MID) $this->msg('非法操作',array('iniframe'=>false));
        $state = $this->db->update('crowd',"status = 0","cd_id = '$id'");
        if($state){
            $this->msg('取消成功',array('iniframe'=>false,'url'=>url('/crowd_member/start')));
        }else{
            $this->msg('操作错误',array('iniframe'=>false));
        }
    }

    /**
     * 订单详情
     * @param string $sn
     */
    function orderDetail($sn=""){
        $sn = trim($sn);
        $support = $this->db->get("SELECT c.*,s.* FROM ###_crowd_support AS s,###_crowd AS c WHERE s.crowd_id = c.cd_id AND s.support_sn = '$sn'");
        if(empty($support) || $support['member_id']!=MID) $this->msg('非法操作',array('iniframe'=>false));
        $support['return_name'] = $this->db->getstr("SELECT rt_name FROM ###_crowd_return WHERE rt_id = '$support[return_id]'");
        $support['nickname'] = $this->db->getstr("SELECT nickname FROM ###_member WHERE mid = '$support[mid]'");
        //进展
        $support['progress'] = $this->crowd->progress_list("cd_id = '$support[cd_id]'");
        $support['rt_desc'] = $this->db->getstr("SELECT rt_desc FROM ###_crowd_return WHERE rt_id = '$support[return_id]'");
        $this->smarty->assign('support',$support);
        $this->smarty->display('member/crowd_orderDetail.html');
    }


    /**
     * 更新进展
     * @param string $id
     */
    function updateProgress($id=''){
        $id = intval($id);
        $info = $this->crowd->get_info($id);
        if(empty($info) || $info['status']!=2) $this->msg('项目不存在',array('iniframe'=>false));
        if($info['mid']!=MID) $this->msg('非法操作',array('iniframe'=>false));
        if(!empty($_POST)){
            $post = array();
            $post['content'] = !empty($_REQUEST['content']) ? trim($_REQUEST['content']) : '';
            if(empty($post['content'])) die(json_encode(array('msg'=>'请输入进展内容')));
            if(!empty($_POST['progress'])) $post['thumbs'] = serialize($_POST['progress']);
            $post['mid'] = MID;
            $post['username'] = USER;
            $post['cd_id'] = $id;
            $post['add_time'] = RUN_TIME;
            $state = $this->db->save('crowd_progress',$post);
            if($state){
                die(json_encode(array('msg'=>'','code'=>1)));
            }else{
                die(json_encode(array('msg'=>'操作失败')));
            }
            exit;
        }
        $this->smarty->assign('info',$info);
        $this->smarty->display('member/crowd_progress.html');
    }
    function load_progress($page=1){
        $id = intval($_REQUEST['id']);
        $url = 'href="/corwd_member/load_progress/{num}?id='.$id.'"';
        $where = "pid <> 0 AND cd_id = '$id' ORDER BY add_time DESC";
        $list = $this->crowd->progress_list($where,10,$page);
        $this->smarty->assign('list',$list);
        $info = $this->crowd->get_info($id);
        $info['nickname'] = $this->db->getstr("SELECT nickname FROM ###_member WHERE mid = '$info[mid]'");
        $this->smarty->assign('info',$info);
        $this->smarty->display('member/crowd_load_progress.html');
    }


    //获取第三方授权用户信息
    private function member_oauth(){
        $member_oauth = array();
        $oauth = (isset($_SESSION['oauth']) && !empty($_SESSION['oauth'])) ? $_SESSION['oauth'] : array();

        if(isset($oauth['openid']) && !empty($oauth['openid'])){
            $sql = "SELECT * FROM member WHERE openid = '".$oauth['openid']."'";
        }
        elseif(isset($oauth['unionid']) && !empty($oauth['unionid'])){
            $sql = "SELECT * FROM member WHERE unionid = '".$oauth['unionid']."'";
        }
        elseif(isset($oauth['oauth_login']) && !empty($oauth['oauth_login'])){
            $sql = "SELECT * FROM member WHERE oauth_login = '".$oauth['oauth_login']."'";
        }
        if($sql){
            $member_oauth = $this->db->get($sql);
        }

        return $member_oauth;
    }
}
