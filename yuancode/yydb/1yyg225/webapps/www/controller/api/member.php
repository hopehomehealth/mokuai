<?php
/**
 * 会员中心控制器
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */
class member extends Lowxp{

    function __construct(){
        parent::__construct();
        $method = $_SERVER['request']['method'];
        $isLogin = isset($_SESSION['mid']);
        //注册,提交注册,登录,忘记密码:不能登录状态的方法.
        $notLoginActions = in_array($method, array('regist', 'regist2', 'submit', 'login', 'act_login','forget','check_username','check_ivt','check_email','check_mobile','resetpass','oauth','oauth_login','oauth_chose'));
        //除以上模块外,其他都需要登录状态进行操作.
        if($isLogin){
            if($notLoginActions){
                //$this->exeJs('alert("当前已登录,该操作需在未登录状态下.");');
                //跳转到一个初始页面
                //$this->exeJs('location.href="/"');
                //die;
            }

            define('MID',$_SESSION['mid']);
            define('USER',$_SESSION['username']);
            $this->load->model('member');
            $this->load->model('taglib');
            $this->memberinfo = $this->member->member_info(MID);

            #会员等级
            $sql = "SELECT rank_name FROM ###_member_rank WHERE id='".$this->memberinfo['rank_id']."'";
            $this->memberinfo['rank_name'] = $this->db->getstr($sql);
            $this->memberinfo['username'] = nickname($this->memberinfo['username'],$this->memberinfo['nickname']);
            $this->memberinfo['photo'] = $this->taglib->_photo(array('source'=>$this->memberinfo['photo'],'size'=>80));

            $member = $this->memberinfo;
            $safe_level = 1;
            if($member['verify_email']) $safe_level++;
            if($member['idcard']) $safe_level++;

            #距离下一次升级
            $max_points = $this->db->getstr("SELECT max_points FROM ###_member_rank WHERE id > '$member[rank_id]'");
            if($max_points) $member['level_upgrade'] = $max_points - $member['rank_points'];

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
                if(empty($this->memberinfo['mobile']) && $method!="verifymobile"){
                    //$this->exeJs('location.href="'.url('/member/verifymobile').'";');
                    //die;
                }
            }

        }else{
            //跳转登录
            if(!$notLoginActions){
                $this->api_result(array('msg'=>'已登录'));
                die;
            }
            if($method == 'doexit'){
                return;
            }
            
        }
        $this->display_before(array('title'=>'会员中心'));
        $this->ur_here('',array(0=>array('url'=>url('/member'),'name'=>'会员中心')));
    }
    /**签到*/
    function ajax_signin(){
        #今天是否签到
        $is_signin = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_signin WHERE mid = '$_SESSION[mid]' AND addtime >= '".strtotime('today')."'");

        $count_dob = 5; //设置连续?天送双倍拍币
        $msg = "\n-连续签到 $count_dob 天得 $count_dob 倍".$this->L['unit_pay_points'];

        if(!$_SESSION['mid']){
            die(json_encode(array('error'=>1,'msg'=>'签到请先登陆')));
        }else if(empty($is_signin) && $this->site_config['signin_jl']){
            if($this->memberinfo['free']==0){
                exit(json_encode(array('error'=>1,'msg'=>'账号异常，领取失败，请联系客服！')));
            }

            #同IP只能签到3次
            $ip_signin = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_signin WHERE addtime >= '".strtotime('today')."' AND ip='".getIP()."'");
            if($ip_signin>3){
                die(json_encode(array('error'=>1,'msg'=>'签到次数超过限制，请明天再来！')));
            }

            #是否首次签到
            $first_signin = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_signin WHERE mid = '$_SESSION[mid]'");

            #需要语音认证
//            if($this->memberinfo['is_voice']!=1 && $first_signin==10){
//                die(json_encode(array('error'=>1,'msg'=>"请先对手机进行400-0901-225语音认证【完全免费认证】后，每日签到均可领取".$this->L['unit_pay_points']."",'url'=>'/member/verifyvoice')));
//            }

            $input = array();
            $input['mid'] = MID;
            $input['username'] = USER;

            #判断昨天是否签到
            $start_time = date('Y-m-d 00:00:00',strtotime('-1 day'));
            $end_time = date('Y-m-d 23:59:59',strtotime('-1 day'));
            $sql = "SELECT id,times FROM ###_signin WHERE mid = '".MID."' ".
                "AND addtime>".strtotime($start_time)." AND addtime<=".strtotime($end_time);
            $row_yestoday = $this->db->get($sql);
            if($row_yestoday){
                $input['times'] = $row_yestoday['times']+1;
            }

            //连续?签到拍币翻倍
            if($input['times']>=$count_dob && $input['times']%$count_dob==0){
                $input['points'] = $this->site_config['signin_jl']*5;
            }else{
                //首次签到并已通过语音认证
                if(empty($first_signin)){
                    $input['points'] = $this->site_config['signin_jl']*4;
                }else{
                    $input['points'] = $this->site_config['signin_jl'];
                }
            }

            $input['addtime'] = RUN_TIME;
            $input['ip'] = getIP();
            $this->db->insert("signin",$input);
            $log_arr = array();
            $log_arr['pay_points'] = $input['points'];
            $log_arr['desc'] = "签到奖励";
            $this->member->accountlog('admin',$log_arr);

            #签到累计奖励
            $sum_point = $this->db->getstr("SELECT SUM(points) FROM ###_signin WHERE mid = '".MID."'");

            if(empty($first_signin)){
                $this->api_result(array('msg'=>"首次签到成功，获得 $input[points] ".$this->L['unit_pay_points']."！".$msg));
            }else{
                if($input['times']>=$count_dob && $input['times']%$count_dob==0){
                    $this->api_result(array('msg'=>"连续签到成功，获得 $input[points] ".$this->L['unit_pay_points']."（$count_dob 倍）,已累计获得 $sum_point ".$this->L['unit_pay_points']."！"."\n-连续签到得 $count_dob 倍".$this->L['unit_pay_points']));
                }else{
                    $this->api_result(array('msg'=>"签到成功，获得 $input[points] ".$this->L['unit_pay_points'].",已累计获得 $sum_point ".$this->L['unit_pay_points']."！".$msg));
                }
            }
        }else{
            $this->api_result(array('msg'=>'您今天已签到过了！'.$msg));
        }
    }

    /** 订单列表 */
    function order($page=1){
        $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
        $last = isset($_POST['last']) ? intval($_POST['last']) : 0;

        $where = "";
        if(!empty($_GET['status'])) $where .= " AND status = '".intval($_GET['status'])."'";

        #时间段
        if(!empty($_GET['from_data'])) $where .= " AND c_time >= '".strtotime($_GET['from_data'])."'";
        if(!empty($_GET['end_data'])) $where .= " AND c_time <= '".strtotime($_GET['end_data'])."'";

        switch(intval($_GET['time'])){
            case 1:
                //今天
                $where .= " AND c_time >= '".strtotime('today')."'";
                break;
            case 2:
                //本周
                $where .= " AND c_time >= '".mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))."'";
                break;
            case 3:
                //本月
                $where .= " AND c_time >= '".mktime(0, 0 , 0,date("m"),1,date("Y"))."'";
                break;
            case 4:
                //最近三月
                $where .= " AND c_time >= '".mktime(0, 0 , 0,date("m")-2,1,date("Y"))."'";
                break;
        }

        $this->load->model('page');
        $_GET['page'] = $page;
        $this->page->set_vars(array(
            'per'=>$size,
        ));
        $list = $this->page->hashQuery("SELECT * FROM goods_order WHERE mid = '".MID."' $where ORDER BY id DESC")->result_array();
        $this->load->model('share');
        $this->load->model('order');
        $list = $this->order->unionOrderGoods($list);



        #状态统计
        $total['notpay'] = $this->db->getstr("SELECT COUNT(*) FROM ###_goods_order WHERE status = 1 AND mid = ".MID);
        $total['wait'] = $this->db->getstr("SELECT COUNT(*) FROM ###_goods_order WHERE status = 2 AND mid = ".MID);
        $total['shiped'] = $this->db->getstr("SELECT COUNT(*) FROM ###_goods_order WHERE status = 3 AND mid = ".MID);
        $total['finish'] = $this->db->getstr("SELECT COUNT(*) FROM ###_goods_order WHERE status = 4 AND mid = ".MID);
        $this->smarty->assign('total',$total);
        #express_pinyin

        $this->load->model('payment');
        $order_code = array();
        $order_code[CART_AUC] = $this->L['unit_pay'];
        $order_code[CART_DB] = $this->L['unit_yun_one'];
        $order_code[CART_BUY] = $this->L['unit_go_buy'];
        foreach($list as $k=>$v){
            if(!isset($list[$k]['goods']))$list[$k]['goods'] = array();
            $list[$k]['deliver'] = json_decode($v['deliver'],true);
            $list[$k]['c_time'] = date('Y-m-d H:i:s',$v['c_time']);
            $list[$k]['extension_id'] = str_replace('/yunbuy/detail/','',$v['goods_url']);
            $list[$k]['order_code'] = $order_code[$v['extension_code']];
            if($list[$k]['goods']){
                foreach($list[$k]['goods'] as $k1=>$v1){
                    #商品来源
                    $v1['goods_desc'] = explode('|',$v1['goods_desc']);
                    $v1['imgurl_thumb'] = $this->taglib->_fileurl(array('source'=>$v1['imgurl_thumb'],'width'=>200,'height'=>200));
                    $list[$k]['goods'][$k1] = $v1;
                }
            }

            //未支付完成的生成支付按钮
            if($v['status']==2 && $v['amount']>0){

            }
        }
        $this->api_result(array('data'=>$list));

    }
    /**
     * 确认收货
     */
    function finish_order($id = ''){
        $id = intval($id);
        $order = $this->db->get("SELECT status FROM ###_goods_order WHERE id = '$id'");
        if($order){
            $this->load->model('order');
            $this->order->chageOrderState($id,4,'');
            $this->api_result(array('code'=>0));
        }else{
            $this->api_result(array('code'=>1,'msg'=>'订单不存在'));
        }
    }

    /** 竞拍列表 */
    function auction($page=1){
        $this->load->model('auction');
        $status = $_REQUEST['status'] ? intval($_REQUEST['status']) : '99';
        $size = 10;

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $data['list'] = $this->auction->getList($size,$page,0,$status,array(
            'mid'=>MID,
            'url'=>'',
        ));

        if(STPL == 'mobile'){
            $row['head'] = '竞拍记录';
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($data['list'] as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $this->smarty->assign('k',$k+$size*($page-1));
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_auc.html'));
                }
                die(json_encode($array));
            }
        }

        $this->smarty->assign('data',$data);
        $this->smarty->assign('nav','auction');
        $this->smarty->display('member/auction.html');
    }

    /** 中奖列表 */
    function cod($page=1){
        $this->load->model('auction');
        $status = $_REQUEST['status'] ? intval($_REQUEST['status']) : OKWIN;
        $size = 10;

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $data['list'] = $this->auction->logList($size,$page,0,MID,$status,array(
            'url'=>'',
            'fields'=>'g.title,g.goods_id',
            'order'=>'a.cod_time DESC'
        ));

        #商品主图
        $this->load->model('upload');
        $data['list'] = $this->db->lJoin($data['list'],'goods','id,cover','goods_id','id');
        $data['list'] = $this->upload->getImgUrls($data['list'],'cover','gallery',array('src'));

        if(STPL == 'mobile'){
            $row['head'] = '竞拍中奖记录';
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($data['list'] as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $this->smarty->assign('k',$k+$size*($page-1));
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_cod.html'));
                }
                die(json_encode($array));
            }
        }

        $this->smarty->assign('data',$data);
        $this->smarty->assign('nav','cod');
        $this->smarty->display('member/cod.html');
    }

    /**
     * 完善信息
     */
    function info(){
        $this->load->model('linkage');
        if($_POST){
            $input = array();
            $items = array(
                'birthday','address','zone','nickname','sex','intro'
            );

            foreach($items as $val){
                if(isset($_POST[$val])){
                    $input[$val] = addslashes($_POST[$val]);
                }
            }
            //$input['zone'] = !empty($_POST['zone']) ? end($_POST['zone']) : '';
            $input['zone'] = $this->linkage->getZoneByArea($_POST['area']);
            $reMobile = '/^\d+$/';
            $reDate = '/^[0-9]{4}(\-|\/)[0-9]{1,2}(\\1)[0-9]{1,2}(|\s+[0-9]{1,2}(|:[0-9]{1,2}(|:[0-9]{1,2})))$/';
            $reIdCard = '/^[1-9]([0-9]{14}|[0-9]{17})$/';

            //删除旧图片
            //if($input['photo']) delImage($this->memberinfo['photo']);

//            if(!empty($input['birthday'])){
//                if(!preg_match($reDate,$input['birthday']))die('生日错误!');
//            }
//            if(!empty($input['cardid'])){
//                if(!preg_match($reIdCard,$input['cardid']))die('身份证格式错误!');
//            }
            //限制昵称长度
            $input['nickname'] = trim($input['nickname']);
            $nickname_len = mb_strlen($input['nickname'],'UTF8'); 
            if(!empty($input['nickname']) && ($nickname_len<2 || $nickname_len>9))die($this->api_result(array('msg'=>'请输入2-8个字符长度的昵称')));
//             $reEmail = '/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
//             $email = trim($_POST['email']);
//             if(!preg_match($reEmail,$email))die($this->api_result(array('msg'=>'邮箱格式错误')));

//             $r = $this->db->get("SELECT `username` FROM `member` WHERE `email` = '$email' AND username <> '".USER."'");

//             if ($r) die($this->api_result(array('msg'=>'邮箱已存在,请重新填写')));

//             $input['email'] = $email;
            $input['sex'] = intval($_POST['sex']);

//             if($email!=$this->memberinfo['email']){
//                 $input['verify_email'] = 0;
//             }
            //第一次完善资料奖励经验
            if($this->memberinfo['is_perfect']==0  && !empty($input['nickname']) && !empty($input['birthday']) && !empty($input['zone'])){
                $input['is_perfect'] = 1;
                $this->member->accountlog(ACT_ADJUSTING,array('rank_points'=>80,'desc'=>'完善个人资料获得经验值'));
            }
            $this->db->update('member',$input,array('mid'=>MID));
			die($this->api_result(array('msg'=>'保存成功','code'=>1)));
        }

        $row = array('title'=>'个人资料');
        $this->display_before($row);
        if(STPL == 'mobile'){
            $row['head'] = '个人资料';            
			$data['row'] = $row;
        }
		
		$data['nav'] = "info";
		
        $member = $this->memberinfo;
        $member['zone'] = $member['zone'] ? $member['zone'] : 1;
        $member['area'] = $member['zone'] ? $this->linkage->pos_linkage($member['zone'],false) : '';
        $member['area'] = str_replace('>','',$member['area']);
        $member['mobile'] = substr($member['mobile'],0,-3).'***';
		$data['member'] = $member;
		$data['site_name'] = $this->site_config['site_name'];
        //$area = $this->linkage->select_linkage($member['zone'] ? $member['zone'] : 1,1,'zone');
        $data['area'] = $this->linkage->getLinkage();
        $result = array();
        $result['flag'] = true;
        $result['code'] = 0;
        $result['msg'] = '操作成功';
        $result['data'] = !empty($data) ? $data : 0;
        $result['time'] = RUN_TIME;
        die(urldecode(json_encode($result)));
    }

    /**
     * 编辑头像
     */
    function photo(){
        if(!empty($_FILES)){
            $result = array();
            $result['success'] = false;
            $successNum = 0;
            $i = 0;
            $msg = '';
            $fileName = date("YmdHis").'_'.floor(microtime() * 1000).MID;

            //遍历所有文件域
            while (list($key, $val) = each($_FILES))
            {
                if ( $_FILES[$key]['error'] > 0)
                {
                    $msg .= $_FILES[$key]['error'];
                }
                else
                {
                    if(is_null($upDir))$upDir = $this->load->config('picture','image_dir');#保存目录
                    $dir = 'photo/';
                    $upUrl = $this->load->config('picture','image_url');
                    $this->load->model('upload');
                    //当前头像基于原图的初始化参数，用于修改头像时保证界面的视图跟保存头像时一致。帮助提升用户体验度。修改头像时设置默认加载的原图的url为此图片的url+该参数即可。
                    $virtualPath = "$dir$fileName.jpg";
                    $result['sourceUrl'] = '/upload/images/'.$virtualPath;
                    move_uploaded_file($_FILES[$key]["tmp_name"], $upDir.$virtualPath);
                    //保存入库
                    $this->db->update("member",array('photo'=>$result['sourceUrl']),array('mid'=>MID));
                    $this->upload->yunsave("$dir$fileName.jpg",'photo');
                    $FullDir = $upDir.$dir.'/';

                    //保存三张小图
                    for($i=0;$i<3;$i++){
                        switch($i){
                            case 0:
                                $size = '160';
                                break;
                            case 1:
                                $size = '80';
                                break;
                            case 2:
                                $size = '30';
                                break;
                        }
                        static $loadedImage;
                        if(is_null($loadedImage)){
                            $this->load->library('image',array('ratio'=>true));
                            $loadedImage = true;
                        }
                        //载入图片.
                        $this->image->load_src($upDir.$virtualPath);
                        $widht = $height = $size;
                        $path = $FullDir.$fileName.'_'.$size.".jpg";
                        $this->image->resize($widht, $height, $path, true);
                        $img = str_replace(RootDir.'web','',$path);
                        $this->upload->yunsave($img,'photo');
                        $result['avatarUrls'][$i] = $img;
                        $successNum++;
                    }
                    $successNum++;
                }
            }
            $result['msg'] = $msg;
            if ($successNum > 0)
            {
                $result['success'] = true;
            }
            //返回图片的保存结果（返回内容为json字符串）
            die(json_encode($result));
        }
    }

    function verifyEmail($code=''){
        $member = $this->memberinfo;
        //发送验证邮箱
        if(empty($code)){
            $reEmail = '/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
            $email = $member['email'];
            if(empty($email))$this->api_result(array('msg'=>'您还没有绑定邮箱地址！'));
            if(!preg_match($reEmail,$email))$this->api_result(array('msg'=>'邮箱格式错误'));
            $row = $this->db->get("SELECT * FROM member WHERE email='".$email."' AND verify_email=1");
            if(isset($row['mid'])){
				$this->api_result(array('msg'=>'该邮箱已被其他账号绑定,请换一个邮箱重试!'));
            }
            $code = md5($email.$member['salt']);
            $validate_email = url('/member/verifyEmail/'.$code);
            $this->smarty->assign('user_name',$member['username']);
            $this->smarty->assign('validate_email',$validate_email);
            $this->load->library('mail');
            $this->mail->sendMailTpl($email,'register_validate');
			$this->api_result(array('msg'=>'验证邮件已发送，请到您的邮箱中查看!','code'=>1));
        }else{
            //验证邮箱
            if($code!=md5($member['email'].$member['salt'])) exit($this->msg('验证链接错误',array('iniframe'=>false,'url'=>'back')));
            $this->db->update('###_member',array('verify_email'=>1),array('mid'=>$member['mid']));
			$this->api_result(array('msg'=>'验证成功!','code'=>1));
        }
    }
    /**
     * 语音验证
     */
    function verifyvoice(){
        if($this->memberinfo['is_voice']){
            $this->msg('<b>恭喜您，</b><br>您已通过语音认证!<br>SO EASY',array(
                'iniframe'=>false,
                'icon'=>1,
                'link'=>array(
                    array('link'=>'/content/tiyan/db','text'=>'体验免费夺宝'),
                    array('link'=>'/member#free','text'=>'做任务领拍币')
                )
            ));
            die;
        }
        if($_POST['Submit']){
            if(!empty($_SESSION['voiceVerify']) && $_SESSION['voiceVerify']['mobile']==$this->memberinfo['mobile'] && $_SESSION['voiceVerify']['code'] == trim($_POST['code'])){
                $this->db->update('member',array('is_voice'=>1),array('mid'=>$_SESSION['mid']));
                $this->msg('恭喜您，语音验证成功!',array(
                    'url'=>'/member',
                    'icon'=>'1'
                ));
                unset($_SESSION['voiceVerify']);
            }else{
                $this->msg('验证失败!');die;
            }
        }
        $this->smarty->display('member/verifyvoice.html');

    }


    /**
     * 找回密码
     */
    function forget(){
        if(!empty($_POST)){
            $mobile = trim($_POST['mobile']);
            $verifycode = trim($_POST['sms_code']);

            if(empty($mobile)) exit($this->api_result(array('msg'=>'请输入手机号码')));
            if(!is_mobile($mobile)) exit($this->api_result(array('msg'=>'请输入正确的手机号码')));
            $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND verifycode='$verifycode' AND status=7 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
            if ($this->db->getstr($sql) == 0)
            {
                $this->api_result(array('msg'=>'手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！'));
            }
            $member = $this->db->get("SELECT * FROM ###_member WHERE mobile = '$mobile'");
            if(empty($member)) $this->api_result(array('msg'=>'用户不存在,请确认后重新找回'));
            $member['code'] = md5($member['mid'].$member['salt'].$member['c_time']);
            $this->api_result(array('data'=>$member,'code'=>1));
        }
    }
    /**
     * 重置密码
     */
    function resetpass(){
        $code = trim($_POST['code']);
        $username = addslashes($_POST['username']);
        $member = $this->db->get("SELECT * FROM ###_member WHERE username = '$username'");
        if(empty($member)) $this->api_result(array('msg'=>'用户不存在'));
        if($code != md5($member['mid'].$member['salt'].$member['c_time'])) $this->api_result(array('msg'=>'重置密码请求无效'));
        $this->load->model('member');
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        if(empty($pass1)) $this->api_result(array('msg'=>'请输入密码'));
        if($pass1!=$pass2) $this->api_result(array('msg'=>'两次密码不一致'));
        $setPass = $this->member->get_salt_hash($pass1,$member['salt']);
        $this->db->update('member',array('password'=>$setPass),array('mid'=>$member['mid']));
        $this->api_result(array('code'=>1,'msg'=>'重置成功'));
    }

    /**
     * 注册页
     */
    function regist($username=''){
        $agree = $this->db->getstr("SELECT content FROM ###_block WHERE mark= 'agree'");
        $data = array('site_name'=>$this->site_config['site_name'],'agree'=>$agree);
        $this->api_result(array('data'=>$data));
    }



    /*
     * 注册程序
     */
    function submit() {
        $this->load->model('member');
        $username = empty($_POST['username']) ? '' : trim($_POST['username']);
        $password = empty($_POST['password']) ? '' : trim($_POST['password']);
        $_SESSION['oauth'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth'] : json_decode($_POST['oauth'],true);
        $password2 = $password;
        $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
        $email = '';
        //第三方登录
        if(!empty($_SESSION['oauth'])){
            $username = $mobile;
            $password2 = $password = $_SESSION['oauth']['openid'];
            if(empty($username)){
                die(json_encode(array('error'=>1,'msg'=>'请填写用户名称！')));
            }
//            if(is_mobile($username)){
//                $r = $this->db->get("SELECT username FROM member WHERE username = '$username' OR mobile='$username'");
//                if($r){ die(json_encode(array('error'=>1,'msg'=>'该手机已经存在，请更换！'))); }
//            }
        }else{
            //判断邮箱用户和邮箱是否存在
            if(is_email($username)){
                $r = $this->db->get("SELECT username FROM member WHERE username = '$username' OR email='$username'");
                if($r){ die(json_encode(array('error'=>1,'msg'=>'该邮箱已经存在，请更换！'))); }
                $email = $username;
            }
            //判断手机用户或手机是否存在
            elseif(is_mobile($username)){
                $r = $this->db->get("SELECT username FROM member WHERE username = '$username' OR mobile='$username'");
                if($r){ die(json_encode(array('error'=>1,'msg'=>'该手机已经存在，请更换！'))); }
                $mobile = $username;
            }else{
                die(json_encode(array('error'=>1,'msg'=>'请填写正确的手机或邮箱地址！')));
            }
            if(!trim($username)){ die(json_encode(array('error'=>1,'msg'=>'请输入用户名！'))); }
            if(!$password){ die(json_encode(array('error'=>1,'msg'=>'请输入您的密码，长度6~12个字符！'))); }
            if(!$password2){ die(json_encode(array('error'=>1,'msg'=>'请再次确认密码！'))); }
            if($password != $password2){ die(json_encode(array('error'=>1,'msg'=>'确认密码与密码不一致！'))); }
        }


        #检查验证码
//        if(STPL == ''){
//            $this->load->model('code');
//            $res = $this->code->check();
//            IF($res['code'] != 0){
//                die(json_encode(array('error'=>1,'msg'=>$res['msg'])));
//            }
//        }


        if(is_mobile($mobile)){
            $r = $this->db->get("SELECT * FROM member WHERE mobile='$mobile'");
            if($r){
                if(!empty($_SESSION['oauth'])){
                    //已存在手机号的授权用户
                    $udata = array();
                    if($_REQUEST['type']=='wx'){
                        $udata['openid'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['openid'] : '';
                    }else{
                        $udata['oauth_login'] = !empty($_SESSION['oauth']) ? $_REQUEST['type'].'_'.$_SESSION['oauth']['openid'] : '';
                    }
                    $udata['unionid'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['unionid'] : '';
                    $this->db->update('member',$udata,"mid = '$r[mid]'");

                    //清空第三方登录
                    if(isset($_SESSION['oauth'])){
                        unset($_SESSION['oauth']);
                    }
                    zzcookie('yuncart',$_POST['cart']);
                    $this->member->setLogin($r);
                    $this->app_login($user);
                    die(json_encode(array('error'=>0,'data'=>array('user'=>$r),'msg'=>'注册成功')));

                }else{
                    die(json_encode(array('error'=>1,'msg'=>'该手机已经存在，请更换！')));
                }

            }
        }else{
            die(json_encode(array('error'=>1,'msg'=>'请填写正确的手机号码！')));
        }

        //用户名为手机时，第二步手机号需要相同
        if(is_mobile($username)){
            if($mobile != $username){
                die(json_encode(array('error'=>1,'msg'=>'此手机号与用户名不一致！')));
            }
        }
        //注册短信验证码
        $verifycode = '';
        if($this->site_config['sms_open']==1 && statusTpl('sms_register')){
            $this->load->library('sms');
            $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);

            /* 验证手机号验证码和IP */
            $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND (status=1 OR status=10) AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
            if ($this->db->getstr($sql) == 0)
            {
                die(json_encode(array('error'=>1,'msg'=>'手机号和验证码不匹配 或者 验证码已过期(1小时内有效)')));
            }
        }
        //邀请人
        $ivt_mobile = !empty($_POST['ivt_mobile']) ? trim($_POST['ivt_mobile']) : '';
        if(!empty($ivt_mobile)){
            $ivt_id = $this->db->getstr("SELECT mid FROM ###_member WHERE mobile = '$ivt_mobile' OR mid = '$ivt_mobile'");
            if(empty($ivt_id)) die(json_encode(array('error'=>1,'msg'=>'邀请人不存在,请确认后重新输入')));
            $input['ivt_id'] = $ivt_id;
        }


        $input['username'] = $username;
        $input['password'] = $password;
        $input['email'] = $email;
        $input['mobile'] = $mobile;
        $input['oauth_login'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['oauth_login'] : '';
        $input['nickname'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['nickname'] : '';
        $input['photo'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['headimgurl'] : '';
        if($_REQUEST['type']=='wx'){
            $input['openid'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['openid'] : '';
            $input['unionid'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['unionid'] : '';
        }else{
            $input['oauth_login'] = !empty($_SESSION['oauth']) ? $_REQUEST['type'].'_'.$_SESSION['oauth']['openid'] : '';
            $input['unionid'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['unionid'] : '';
        }

        $input['sex'] = 1;
        $input['birthday'] = '0000-00-00';
        $input['verify_mobile'] = 1;
        if(!empty($_SESSION['voiceVerify'])) $input['is_voice'] = 1;
        $ivt_member = cookie('ivt_member');
        if($ivt_member){
            $r = $this->db->get("SELECT `mid` FROM `member` WHERE `username` = '".trim($ivt_member)."'");
            $input['ivt_id'] = $r ? $r['mid'] : 0;

            #推荐人统计人数
            if($r['mid']) $this->db->update('member',"ivt_count=ivt_count+1",array('mid'=>$r['mid']));
        }
        $input['pay_password'] = substr($mobile,-6);
        $res = $this->member->create_user($input);
        if ($res){
            //清空第三方登录
            if(isset($_SESSION['oauth'])){

                unset($_SESSION['oauth']);
            }
            zzcookie('yuncart',$_POST['cart']);
            $this->member->setLogin($res);
            $this->member->regGive($_SESSION['mid']);

            #修改验证码状态
            if($this->site_config['sms_open']==1 && statusTpl('sms_register')){
                $this->db->update('verify_code', array(
                    'reguid' => $_SESSION['mid'],
                    'regdateline' => time(),
                    'status' => 2,
                ), "`mobile`='$mobile' AND `verifycode`='$verifycode' AND `getip`='" . getIP() . "' AND `status`='1' AND `dateline`>" . (time()-3600));
            }
            $input['mid'] = $res['mid'];
            $user = $this->member->member_info($res['mid']);
            die(json_encode(array('error'=>0,'data'=>array('user'=>$user),'msg'=>'注册成功')));
        } else {
            die(json_encode(array('error'=>1,'msg'=>'注册失败，请重新提交！')));
        }
        $this->api_result(array('data'=>1));
        exit(0);
    }

    /**
     *  注册成功
     */
    function reg_success(){
        $link = array();
        $link[] = array('text'=>'完善会员资料','link'=>url('/member/info'));
        $link[] = array('text'=>'免费领取拍币','link'=>url('/content/tiyan'));
        exit($this->msg('注册成功',array('link'=>$link,'iniframe'=>false,'icon'=>1)));
    }

    function index(){
        $this->load->model('auction');
        $this->load->model('yunbuy');

        #竞拍中奖未领取数量
//        $data['count_cod'] = $this->auction->logList(0,1,0,MID,OKWIN);
//        #竞拍成功未领取数量
//        $data['count_auc'] = $this->auction->getList(0,1,0,FINISHED,array(
//            'mid'=>MID
//        ));
        #夺宝中奖未下单记录
//        $sql = "SELECT COUNT(id) FROM ###_yundb WHERE mid=".MID." AND status=3 AND is_award!=1";
//        $data['count_codDb'] = $this->db->getstr($sql);

        #我的夺宝
//        $size = 8;
//        $list = $this->yunbuy->getyunDb("AND d.mid='".MID."' AND d.status <> 1 ORDER BY db_time DESC",$size,1,"");
//        if($list){
//            foreach($list as $key=>$val){
//                $list[$key]['buy'] = $this->yunbuy->yuninfo($val['buy_id']);
//            }
//        }
//        $data['mydb'] = $list;

        #我的竞拍
//        $size = 4;
//        $data['my'] = $this->auction->getList($size,1,0,'',array('order'=>'a.act_id DESC','mid'=>MID,'imgw'=>205,'imgh'=>127,'key'=>'my'));
//
//        #猜你喜欢
//        if(count($data['mydb'])<4){
//            $size = 4;
//            $list = $this->yunbuy->getyunDb("ORDER BY rand()",$size,1,"");
//            if($list){
//                foreach($list as $key=>$val){
//                    $list[$key]['buy'] = $this->yunbuy->yuninfo($val['buy_id']);
//                }
//            }
//            $data['love'] = $list;
//        }

        #今天是否签到
        $is_signin = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_signin WHERE mid = '".MID."' AND addtime >= '".strtotime('today')."'");

        if(empty($is_signin) && $this->site_config['signin_jl']) {
            $data['signin'] = 0;
        } else {
            $data['signin'] = 1;
        }
        
        //判断是否领取
        $data['memberOther'] = $this->db->get("SELECT * FROM ###_member_other WHERE mid='".MID."'");

        $data['info'] = $this->memberinfo;
        $data['unit_db_points'] = $this->L['unit_db_points'];
        $data['unit_pay_points'] = $this->L['unit_pay_points'];
        $data['unit_yun'] = $this->L['unit_yun'];
        $data['unit_bonus'] = $this->L['unit_bonus'];
        $data['site_config'] = $this->site_config;
        //商家开关
        $this->load->model('business');
        //商家状态
        if($this->business->business_power){
            $business_row = $this->business->get(array('mid'=>MID),'bus_status,bus_times');
        }
        $data['is_store'] = $this->business->business_power && $business_row['bus_status']>9 ? 1 : 0;
        //圈子
        $this->load->model('quanzi');
        $data['is_quanzi'] = $this->quanzi->power;
        $data['app_checking'] = $this->site_config['app_checking'];
        $this->api_result(array('data'=>$data));
    }


    /**
     * 修改密码
     */
    function chpass(){
        if(!empty($_POST)){
            $oldPass = $_POST['oldpass'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if($pass1!=$pass2) die($this->api_result(array('msg'=>'两次密码不一致')));
            $mid = $this->member->alter_pass($oldPass,$pass2,MID);
            if($mid==-1){
                die($this->api_result(array('msg'=>'用户不存在')));
            }elseif($mid==-2 && $this->is_wechat != 1){
                die($this->api_result(array('msg'=>'原密码错误')));
            }else{
                $this->member->logout();
                die($this->api_result(array('msg'=>'修改成功','code'=>1)));
            }
        }
    }

    /**
     *  修改支付密码
     */
    function chpaypass(){
        if($_POST['Submit']){
            $oldPass = $_POST['oldpass'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if($pass1!=$pass2)$this->api_result(array('msg'=>'两次密码不一致'));
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_chpaypass')){
                $this->load->library('sms');
                $verifycode = trim($_POST['sms_code']);
                $mobile = $this->memberinfo['mobile'];
                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=5 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0)
                {
                    $this->api_result(array('msg'=> '手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！'));
                }
            }
            $paypass = $this->member->get_salt_hash($pass2,$this->memberinfo['salt']);
            $this->db->update('member',array('pay_password'=>$paypass),array('mid'=>MID));
			$this->api_result(array('msg'=>'保存成功','code'=>1));
        }

        if(STPL == 'mobile'){
            $row['head'] = '修改支付密码';
            $this->smarty->assign('row',$row);
			$data['row'] = $row;
        }
		$data['sms_verifymobile'] = statusTpl('sms_verifymobile');
		$data['sms_open'] = $this->site_config['sms_open'];
		$data['nav'] = 'chpaypass';
        $this->api_result(array('data'=>$data));
    }


    /**
     * 账户明细
     */
    function accountdetail($page = 1){
        $size = $this->site_config['page_size'];       
        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $this->smarty->assign('nav','accountdetail');
        $_GET['page'] = $page;
        $this->load->model('page');
        $this->page->set_vars(array(
            'per'=>$size,
            'url'=>'href="/member/accountdetail/{num}"'
        ));

        $list = $this->page->hashQuery("SELECT * FROM ###_account_log WHERE mid = '".MID."' ORDER BY id DESC")->result_array();
        foreach($list as $k=>$v){
			$v['logtime'] = date('Y-m-d H:i',$v['logtime']);
            $v['stage_title'] = $this->member->stages($v['stage']);
            $list[$k] = $v;
        }
		if($list)$data['list'] = $list;
		 
        $row['head'] = '资金管理';            
        $data['row'] = $row;       
		$data['member'] = $this->memberinfo;
        
        $this->api_result(array('data'=>$data)); 
    }

    /**
     * 充值提现日志
     */
    function accountlog($page = 1){
        $size = $this->site_config['page_size'];
        $typeid = $_GET['type']?intval($_GET['type']):0;
        $where = '';
        if($typeid){
            $where .= " AND `type`='$typeid'";
        }

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $this->smarty->assign('nav','accountlog');
        $_GET['page'] = $page;
        $this->load->model('page');
        $this->page->set_vars(array(
            'per'=>$size
        ));
        $list = $this->page->hashQuery("SELECT * FROM member_account WHERE `mid` = '".MID."'$where and status = 2 ORDER BY id DESC")->result_array();
        
        foreach($list as $k=>$v){
            $v['add_time'] = date('Y-m-d H:i',$v['add_time']);            
            $list[$k] = $v;
        }
	if($list)$data['list'] = $list;		 
        $row['head'] = '充值提现';            
        $data['row'] = $row;       
	$data['member'] = $this->memberinfo;
        
        $this->api_result(array('data'=>$data)); 
    }
    /**
     * 取消充值/提现申请
     */
    function account_cancel($id=''){
        $row = $this->db->get("SELECT * FROM ###_member_account WHERE id = '$id'");
        $update = array('status'=>3);
        //取消提现解冻保证金
        if($row['type']==2){
            $input = array();
            $input['mid'] = MID;
            $input['user_money'] = $row['amount']+$row['fee'];
            $input['frozen_money'] = -$row['amount'];
            $input['desc'] = '取消账户提现,解冻保证金';
            $this->member->accountlog('withdraw',$input);

            if($row['fee']>0){
                $update['fee'] = 0;
                $update['amount'] = $row['amount']+$row['fee'];
            }
        }
        $this->db->update('member_account',$update,array('id'=>intval($id)));
        $this->api_result(array('msg'=>'取消成功'));        
    }
    /**
     * 充值
     */
    function recchage(){
        $this->load->model('payment');
        $this->load->model('taglib');
        #可用支付方式
        $payment = $this->payment->getPayment("enabled = '1' AND pay_code <>'balance'");
        if(!empty($payment)){
            foreach($payment as $key=>$val){
                if(!empty($val['thumb'])) $payment[$key]['thumb'] = $this->taglib->_fileurl(array('source'=>$val['thumb']));
            }
        }
        if(!empty($_POST)){
            $amount = floatval($_POST['amount']);
            $order = array();

            #使用自定义的金额
            if($amount<=0){
                $amount = floatval($_POST['other']);
            }

            if(empty($amount)) $this->api_result(array('msg'=>'请输入正确的充值金额'));
            if(ceil($amount)!=$amount) $this->api_result(array('msg'=>'请输入的充值金额须整数'));

            //验证支付方式
            $pay_code =  !empty($_POST['pay_code']) ? trim($_POST['pay_code']) : 'wxpayapp';
            $this->load->model('payment');
            $payment_info = $this->db->get("SELECT *  FROM payment WHERE enabled = 1 AND pay_code = '$pay_code'");
            if(empty($payment_info)) $this->api_result(array('msg'=>'支付方式未启用'));
            $input = array();
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['amount'] = $amount;
            $input['add_time'] = RUN_TIME;
            $input['pay_id'] = $payment_info['pay_id'];
            $input['pay_name'] = $payment_info['pay_name'];
            $input['pay_code'] = $payment_info['pay_code'];
            $input['type'] = 1;
            $input['status'] = 1;
            $this->member->member_account_save($input);
            $id = $this->db->insert_id();

            //取得支付信息，生成支付代码
            $payment = unserialize_config($payment_info['pay_config']);
            $order['mid'] = $input['mid'];
            $order['username'] = $input['username'];
            $order['order_sn'] = 'R'.$id;
            $order['surplus_amount'] = $amount;
            //计算支付手续费用
            $payment_info['pay_fee'] = $this->payment->pay_fee($payment_info['pay_id'], $amount);
            $order['order_amount'] = $amount + $payment_info['pay_fee'];
            $order['log_id'] = $this->payment->pay_log_save(array('order_id'=>$id,'order_amount'=>$amount,'order_type'=>PAY_SURPLUS,'is_paid'=>PS_UNPAYED));

            /* 调用相应的支付方式文件 */
            include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
            /* 取得在线支付方式的支付按钮 */
            $pay_obj = new $payment_info['pay_code'];
            if($payment_info['pay_code']=='ipaynow'){
                $payment['order_amount'] = $order['order_amount'];
                $payment['log_id'] = $order['log_id'];
                $payment['notify_url'] = url('/api/welcome/respond');
                $order['payment'] = $payment;
                $order['pay_url'] =url('/api/welcome/pay');
            }else{
                $order['payment'] = $pay_obj->get_code($order, $payment);
            }


            $this->api_result(array('data'=>$order));
        }
        sort($payment);
        $data['payment'] = $payment;
        $data['nav'] = "account";
        $this->api_result(array('data'=>$data)); 
    }
    
    /**
     * 充值
     */
    function recchagewxsm(){
        $this->load->model('payment');
        $this->load->model('taglib');
        #可用支付方式
        $payment = $this->payment->getPayment("enabled = '1' AND pay_code <>'balance'");
        if(!empty($payment)){
            foreach($payment as $key=>$val){
                if(!empty($val['thumb'])) $payment[$key]['thumb'] = $this->taglib->_fileurl(array('source'=>$val['thumb']));
            }
        }
        if(!empty($_POST)){
            $amount = floatval($_POST['amount']);
            $order = array();
    
            #使用自定义的金额
            if($amount<=0){
                $amount = floatval($_POST['other']);
            }
    
            if(empty($amount)) $this->api_result(array('msg'=>'请输入正确的充值金额'));
            if(ceil($amount)!=$amount) $this->api_result(array('msg'=>'请输入的充值金额须整数'));
    
            //验证支付方式
            $pay_code =  !empty($_POST['pay_code']) ? trim($_POST['pay_code']) : 'wxpayapp';
            $this->load->model('payment');
            $payment_info = $this->db->get("SELECT *  FROM payment WHERE enabled = 1 AND pay_code = '$pay_code'");
            if(empty($payment_info)) $this->api_result(array('msg'=>'支付方式未启用'));
            $input = array();
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['amount'] = $amount;
            $input['add_time'] = RUN_TIME;
            $input['pay_id'] = $payment_info['pay_id'];
            $input['pay_name'] = $payment_info['pay_name'];
            $input['pay_code'] = $payment_info['pay_code'];
            $input['type'] = 1;
            $input['status'] = 1;
            $this->member->member_account_save($input);
            $id = $this->db->insert_id();
    
            //取得支付信息，生成支付代码
            $payment = unserialize_config($payment_info['pay_config']);
            $order['mid'] = $input['mid'];
            $order['username'] = $input['username'];
            $order['order_sn'] = 'R'.$id;
            $order['surplus_amount'] = $amount;
            //计算支付手续费用
            $payment_info['pay_fee'] = $this->payment->pay_fee($payment_info['pay_id'], $amount);
            $order['order_amount'] = $amount + $payment_info['pay_fee'];
            $order['log_id'] = $this->payment->pay_log_save(array('order_id'=>$id,'order_amount'=>$amount,'order_type'=>PAY_SURPLUS,'is_paid'=>PS_UNPAYED));
    
            /* 调用相应的支付方式文件 */
            include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
            /* 取得在线支付方式的支付按钮 */
            $pay_obj = new $payment_info['pay_code'];
            if($payment_info['pay_code']=='ipaynow'){
                $payment['order_amount'] = $order['order_amount'];
                $payment['log_id'] = $order['log_id'];
                $payment['notify_url'] = url('/api/welcome/respond');
                $order['payment'] = $payment;
                $order['pay_url'] =url('/api/welcome/pay');
            }else{
                $order['payment'] = $pay_obj->get_codewxsm($order, $payment);
            }
    
    
            $this->api_result(array('data'=>$order));
        }
        sort($payment);
        $data['payment'] = $payment;
        $data['nav'] = "account";
        $this->api_result(array('data'=>$data));
    }

    /**
     * 充值查询
     */
    function rechargewxsmselect(){
        $orderid=$_GET['orderid'];
        $order=$this->db->get("select * from ###_pay_log where order_no = '$orderid'");
        $data['result']=true;
	//$data['123']=$orderid;
	//$data['sql']="select * from ###_pay_log where order_no = '$orderid'";
        if(empty($order)){
            $data['result']=false;
        }else{
            $data['order']=$order;
        }
        $this->api_result(array('data'=>$data));
    }

    /**
     * 充值卡充值
     */
    function rechage_card() {
        $config = $this->setting->value_other();
        $rc_open = isset($config['rc_open']) ? $config['rc_open'] : 0;

        //充值卡功能是否开启
        if (!$rc_open) {
            $msg = '未开启充值卡充值';
            $this->api_result(compact('msg'));
        }

        if ($_POST['Submit']) {
            //接受POST
            $number = trim($_POST['number']);
            $password = trim($_POST['password']);
            $scode = trim($_POST['scode']);

            //POST验证
            if (!$number) {
                $msg = '请输入卡号！';
                $this->api_result(compact('msg'));
            }
            if (!$password) {
                $msg = '请输入卡密！';
                $this->api_result(compact('msg'));
            }

            //验证码验证
            if (strtolower($scode) != strtolower($_SESSION['icode'])) {
                $msg = '验证码错误！';
                $this->api_result(compact('msg'));
            }

            //token验证
            if (!checkToken()) {
                //$msg = '请不要重复提交！';
                //$this->api_result(compact('msg'));
            }

            //卡号卡密验证
            $this->load->model('recharge_card');
            $data = $this->recharge_card->check_status(array(
                'number' => $number,
                'password' => $password,
            ));
            if ($data['error'] > 0) {
                $msg = $data['error'] . $data['error_text'];
                $this->api_result(compact('msg'));
            }

            //充值入账户
            $row = $this->recharge_card->get(array('vr_number' => $number), 'vr_money,vr_type');
            $pay_log = array(
                'mid' => MID,
                'desc' => '充值卡充值',
            );
            if ($row['vr_type'] == 1) {
                $pay_log['user_money'] = $row['vr_money'];
            } elseif ($row['vr_type'] == 2) {
                $pay_log['db_points'] = $row['vr_money'];
            } else {
                $msg = '异常错误';
                $this->api_result(compact('msg'));
            }
            $this->member->accountlog(ACT_CARD, $pay_log);

            //更新充值卡消费状态
            $this->db->save($this->recharge_card->baseTable, array(
                'vr_status' => 1,
                'vr_time_use' => time(),
                'mid' => MID,
                'username' => $this->memberinfo['username'],
                    ), '', array('vr_number' => $number));

            $msg = '充值成功';
            $this->api_result(compact('msg'));
        }
    }
    
    /**
     * 支付
     * @param string $id
     */
    function pay($id=''){
        $rechage = $this->db->get("SELECT * FROM ###_member_account WHERE id = '$id' AND type = '1'");
        if(empty($rechage)) exit($this->msg('充值信息错误',array('iniframe'=>false)));

        $this->load->model('payment');
        $payment_info = $this->payment->payment_info($rechage['pay_id']);
        $order = array();
        //跳转支付
        if(in_array($payment_info['code'],array('alipay','wxpay'))){
            $order['code'] = $payment_info['code'];
            $payment_info = $this->db->get("SELECT * FROM ###_payment WHERE pay_code = 'gotopay'");
        }
        $order['order_sn'] = $id;
        $order['surplus_amount'] = $rechage['amount'];
        //计算支付手续费用
        $payment_info['pay_fee'] = $this->payment->pay_fee($rechage['pay_id'], $rechage['amount']);
        $order['order_amount'] = $rechage['amount'] + $payment_info['pay_fee'];
        $pay_log =  $this->db->get("SELECT * FROM ###_pay_log WHERE order_id = '$id' AND order_type = '".PAY_SURPLUS."'");
        $order['log_id'] = $pay_log['log_id'];

        //取得支付信息，生成支付代码
        $payment = unserialize_config($payment_info['pay_config']);

        /* 调用相应的支付方式文件 */
        include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');

        /* 取得在线支付方式的支付按钮 */
        $pay_obj = new $payment_info['pay_code'];

        $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);


        if(STPL == 'mobile'){
            $row['head'] = '充值';
            $this->smarty->assign('row',$row);
        }

        $this->smarty->assign('order',$order);
        $this->smarty->assign('payment_info',$payment_info);
        $this->smarty->display('member/pay.html');
    }
    /**
     * 提现
     */
    function withdraw(){
        $member = $this->memberinfo;
        if(empty($member['realname']))$this->api_result(array('msg'=>'请先进行实名认证','code'=>2));
        $bankcard = $this->member->bankcard(MID);
        if(empty($bankcard))$this->api_result(array('msg'=>'请先绑定银行卡','code'=>3));

        #提现需要最后一次充值后有余额消费记录
        $sql = "select add_time from ###_member_account where mid='".MID."' and type=1 and status=2 and amount>0";
        $last_time = $this->db->getstr($sql);
        if($last_time){
            $sql = "select count(*) from ###_account_log where mid='".MID."' and logtime>'$last_time' and user_money<0";
            $count_log = $this->db->getstr($sql);
            //if(!$count_log){ $this->api_result(array('msg'=>'抱歉，您最后一次充值后没有余额消费记录，暂时无法申请提现')); }
        }

        #获取提现手续费列表
        $feeList = $this->base->explodeChar($this->site_config['withdraw_fee']);
        $array = array();  
        if($feeList){
            foreach($feeList as $k=>$v){
                $tem['key'] = $k;
                $tem['val'] = $v;
                $array[] = $tem;
            }       
            $data['feelist'] = $array;        
        }
        if($_POST['Submit']){
            $pay_id = intval($_POST['id']);
            $gotime = isset($_POST['gotime'])?trim($_POST['gotime']):'';
            $bankcard = $this->db->get("SELECT * FROM ###_member_bankcard WHERE mid = '".MID."' AND id = '$pay_id'");
            if(empty($bankcard)) $this->api_result(array('msg'=>'您选择的银行卡不存在，请重新选择'));
            $amount = floatval($_POST['amount']);
            if(empty($amount))$this->api_result(array('msg'=>'请输入正确的提现金额'));
            if($amount<50)$this->api_result(array('msg'=>'最小提现金额为50，请修改')); 
            if($amount>$member['user_money'])$this->api_result(array('msg'=>'提现金额超过了您的账户可用金额'));
            //提现手续费
            if(isset($feeList[$gotime])){
                if(strpos($feeList[$gotime],'%')){
                    $path = str_replace('%','',$feeList[$gotime])/100;
                    $fee = $amount*$path;
                }else{
                    $fee = $feeList[$gotime];
                }
            }
            $input = array();
            $input['gotime'] = $gotime;
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['amount'] = $amount-$fee;
            $input['pay_id'] = $pay_id;
            $input['pay_name'] = $bankcard['bankname'];
            $input['type'] = 2;
            $input['fee'] = $fee ? $fee : 0;
            $input['status'] = 1;
            $input['user_note'] = $bankcard['bankcard'];
            $state = $this->member->member_account_save($input);
            //冻结提现金额
            if($state['code']==0){
                $input = array();
                $input['mid'] = MID;
                $input['user_money'] = -$amount;
                $input['frozen_money'] = $amount-$fee;
                $input['desc'] = '账户提现,冻结保证金';
                $this->member->accountlog('withdraw',$input);
            }
            $this->api_result(array('msg'=>'申请成功,我们将尽快为您处理！','code'=>1));
        }

        if(STPL == 'mobile'){
            $row['head'] = '资金管理';
            $data['head'] = $row;
        }
        $data['list'] = $bankcard;
        $data['nav'] = 'account';
        $data['member'] = $member;       
        $this->api_result(array('data'=>$data));
    }

    /**
     * 账户安全
     */
    function safe(){
        $this->smarty->assign('nav','safe');
        $member = $this->memberinfo;
        $member['mobile'] = substr($member['mobile'],0,-3).'***';
		$data['member'] = $member;
        
        //判断资金密码是否有修改
        $is_mobile = false;
        $mobile_salt = substr(trim($member['mobile']),-6);
        $mobile_salt = $this->member->get_salt_hash($mobile_salt, $member['salt']);
        if($mobile_salt == $member['pay_password']){
            $is_mobile = true;
        }
		$data['is_mobile'] = $is_mobile;

        //判断是否绑定银行卡
        $bankcard = $this->member->bankcard(MID);
		$data['is_banks'] = count($bankcard);
		
        //判断是否绑定收货地址
        $address = $this->member->member_address(MID);        
		$data['is_address'] = count($address);
		
        if(STPL == 'mobile'){
            $row['head'] = '帐户安全';
			$data['row'] = $row;;
        }
		$data['site_name'] = $this->site_config['site_name'];
		$this->api_result(array('data'=>$data));
    }

    /**
     * 实名认证
     */
    function verifyidcard(){
        $verify = $this->db->get("SELECT * FROM verify_idcard WHERE mid='". $_SESSION[mid]."' ORDER BY id DESC");
        if($verify){
            $data['verify'] = $verify;
            if($data['verify']){
                $data['verify']['card_image'] = RootUrl.trim($data['verify']['card_image'],'/');
                $data['verify']['card_image2'] = RootUrl.trim($data['verify']['card_image2'],'/');
            }
        }        
        //先进行语音认证
        //if($this->memberinfo['is_voice']!=1) exit($this->msg('请先进行语音认证',array('iniframe'=>false,'url'=>url('/member/verifyvoice'))));
        if($_POST['Submit']){
            if(empty($_POST['realname'])) $this->api_result(array('msg'=>"请输入真实姓名"));
            if(empty($_POST['card'])) $this->api_result(array('msg'=>"请输入身份证号"));
            if(empty($_FILES['idcard'])) $this->api_result(array('msg'=>"请上传身份证正面照"));
            if(empty($_FILES['idcard2'])) $this->api_result(array('msg'=>"请上传身份证反面照"));
            $realname = trim($_POST['realname']);
            $card= trim($_POST['card']);
            //检验唯一性
            $has_realname = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_member WHERE realname = '$realname'");
            $has_idcard = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_member WHERE idcard = '$card'");
            $has_verify = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_verify_idcard WHERE card = '$card' AND realname = '$realname' AND status = 1");
            if(!empty($has_realname) || !empty($has_idcard) || !empty($has_verify)) $this->api_result(array('msg'=>"您的证件已验证过，请使用其他证件"));
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_idcard')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);
                $mobile = $this->memberinfo['mobile'];
                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=3 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0)
                {
                    //$this->api_result(array('msg'=>"手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！"));
                }
            }
            //上传身份证照
            foreach($_FILES as $key=>$val){
                $this->load->model('upload');
                $dir = trim($key);
                //创建目录
                static $upDir;
                if(is_null($upDir))$upDir = $this->load->config('picture','image_dir');#保存目录
                $FullDir = $upDir.$dir.'/';
                is_dir($FullDir)||mkdir($FullDir,0777,true);
                $tmp_name = $val['tmp_name'];
                $filename = trim($val['name']);
                $epos = strrpos($filename,'.');#点的位置
                $name = substr($filename,0,$epos);#文件名称
                $ext = strtolower(substr($filename,$epos));#扩展名

                //新文件名
                $name = $this->upload->random_filename();
                $savePath = $FullDir.$name.'_src'.$ext;
                move_uploaded_file($tmp_name, $savePath);
                $resize = $thumb = array('thumb'=>array('width'=>500,'height'=>500));
                //生成图片缩略图
                if(is_array($resize)){
                    static $loadedImage;
                    if(is_null($loadedImage)){
                        $this->load->library('image',array('ratio'=>true));
                        $loadedImage = true;
                    }
                    //载入图片.
                    $this->image->load_src($savePath);

                    foreach($resize as $size=>$val){
                        if(!isset($val['height'],$val['width']))continue;
                        $widht = $val['width'];
                        $height = $val['height'];
                        $path = $FullDir.$name.'_'.$size.$ext;
                        $this->image->resize($widht, $height, $path, true);
                        $img = str_replace(RootDir.'web/upload/images','',$path);
                        $this->upload->yunsave($img,$dir);
                    }
                }

                if(!empty($thumb)){
                    $this->upload->rmFile($savePath);
                }else{
                    $img = str_replace(RootDir.'web/upload/images','',$savePath);
                    $this->upload->yunsave($img,$dir);
                }
                $_POST[$key] = empty($thumb) ? str_replace(RootDir.'web','',$savePath) : str_replace(RootDir.'web','',$path);
            }


            $input = array();
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['realname'] = $realname;
            $input['card'] = $_POST['card'];
            $input['card_image'] = $_POST['idcard'];
            $input['card_image2'] = $_POST['idcard2'];
            $input['add_time'] = RUN_TIME;
            $this->member->verify_idcard_save($input);
	    $this->api_result(array('msg'=>"提交成功,我们会尽快处理您的验证。",'code'=>1));			
        }

        if(STPL == 'mobile'){
            $row['head'] = '实名认证';
            $data['row'] = $row;            
        }
        $this->load->library('form');
        $data['idcard'] = $this->form->app_upload_files('idcard',500,500);
        $data['idcard2'] = $this->form->app_upload_files('idcard2',500,500);
        
        $data['RootUrl'] = trim(RootUrl,'/');
        $data['site_name'] = $this->site_config['site_name'];
        $data['sms_open'] = $this->site_config['sms_open'];
        $data['sms_idcard'] = statusTpl('sms_idcard');            
        $this->api_result(array('data'=>$data));
    }

    /**
     * 验证手机
     */
    function verifymobile(){
        if($_POST['Submit']){
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_verifymobile')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);
                $mobile = trim($_POST['mobile']);

                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=6 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0) {
					$this->api_result(array('msg'=>'手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！'));
                }
            }
            $this->db->update("###_member",array('mobile'=>$mobile,'verify_mobile'=>1),"mid = $_SESSION[mid]");
			$this->api_result(array('msg'=>'绑定成功','code'=>1));
        }
        if(STPL == 'mobile'){
            $row['head'] = '验证手机';
			$data['row'] = $row;
        }
		$data['sms_verifymobile'] = statusTpl('sms_verifymobile');
		$this->api_result(array('data'=>$data));
    }


    /**
     * 收货地址
     */
    function address($id=''){
        $this->load->Model('linkage');
        if ($_POST['Submit']) {
            $input = array();
            $input['id'] = intval($_POST['id']);
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['name'] = trim($_POST['name']);
            $input['address'] = trim($_POST['address']);
            $input['zip'] = trim($_POST['zip']);
            $input['mobile'] = trim($_POST['mobile']) ? trim($_POST['mobile']) : trim($this->memberinfo['mobile']);
            //$input['zone'] = !empty($_POST['zone']) ? end($_POST['zone']) : '';
            $input['area'] = $_POST['area'];//$input['zone'] ? $this->linkage->pos_linkage($input['zone'], false) : '';
            $input['zone'] = $this->linkage->getZoneByArea($input['area']);
            $input['is_default'] = $_POST['is_default'] ? 1 : 0;

            empty($input['name']) && die($this->api_result(array('msg' => '请输入收件人')));
            empty($input['mobile']) && die($this->api_result(array('msg' => '请输入手机号码')));
            empty($input['address']) && die($this->api_result(array('msg' => '请输入详细地址')));
            empty($input['area']) && die($this->api_result(array('msg' => '请完善所在地区')));
            empty($input['zone']) && die($this->api_result(array('msg' => '请完善所在地区')));

            //清空默认
            if ($_POST['is_default']) {
                $this->db->update('member_address', array('is_default' => 0), array('mid' => MID));
            }
            $res = $this->member->member_address_save($input);

            $address_id = $input['id'] ? $input['id'] : $res;
            $url = $_REQUEST['back'] ? (trim($_REQUEST['back']) . '?address_id=' . $address_id) : '/member/address';
            die($this->api_result(array('msg' => "保存成功", 'code' => 1)));
        }
        if($id){
            $row = $this->db->get("SELECT * FROM member_address WHERE id = '$id'");
        }else{
            $row['zone'] = 1;
        }

        if(STPL == 'mobile'){
            $row['head'] = '收货地址';
        }
		$row['mobile'] = empty($row['mobile'])?$this->memberinfo['mobile']:$row['mobile'];
		$data['row'] = $row;
        $data['area'] = $this->linkage->getLinkage();
        $data['address'] = $this->member->member_address(MID);
        $data['nav'] = 'address';
        $result = array();
        $result['flag'] = true;
        $result['code'] = 0;
        $result['msg'] = '操作成功';
        $result['data'] = !empty($data) ? $data : 0;
        $result['time'] = RUN_TIME;
        die(urldecode(json_encode($result)));
    }
    function address_del($id){
        $url = $_GET['back']?trim($_GET['back']):'/member/address';
        $this->db->delete('member_address',array('id'=>intval($id)));
        $this->api_result(array('msg'=>"删除成功",'data'=>$url));
    }

    /**
     * 站内信
     */
    function message($page=1){
        $this->load->model('msg');
        if($_POST['Submit']){
            $sql = "SELECT COUNT(id) FROM ###_msg ".
                   "WHERE mid='".MID."' AND add_time>='".strtotime(date('Y-m-d'))."'";
            if($this->db->getstr($sql)>50){
                $this->msg('今日发送私信数量已经超出限制，请明天再发！');die;
            }

            if(empty($_POST['content'])) exit($this->msg('请输入发送内容'));
            $input = array();
            if($_POST['to_mid']){
                $to_username = $this->is_member('',$_POST['to_mid']);
                if(empty($to_username)) exit($this->msg('收件人不存在'));
                $input['to_username'] = $to_username['username'];
                $input['to_mid'] = $to_username['mid'];
            }
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['parent_id'] = $_POST['parent_id'] ? $_POST['parent_id'] : 0 ;
            $input['content'] = trim($_POST['content']);
            $this->msg->msg_save($input);
            exit($this->msg('发送成功',array('icon'=>1,'url'=>url('/member/message'))));
        }
        $this->smarty->assign('nav','message');
        $size = $this->site_config['page_size'];

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $_GET['page'] = $page;
        $this->load->model('page');
        $this->page->set_vars(array(
            'per'=>$size,
            'url'=>'href="/member/message/{num}"'
        ));
        $list = $this->page->hashQuery("SELECT * FROM msg WHERE (`mid` = '".MID."' OR `to_mid` = '".MID."') ORDER BY status DESC,id DESC")->result_array();
        if($list){
            foreach($list as $key=>$val){
                $list[$key]['reply'] = $this->db->get("SELECT * FROM msg WHERE `parent_id` = '".$val['id']."'");
                $list[$key]['is_reply'] = $val['to_mid']==MID &&  empty($list[$key]['reply']) ? 1 : 0;
            }
        }
        #回复
        if($_GET['id']){
            $row = $this->db->select("SELECT * FROM msg WHERE `id` = '".$_GET['id']."'");
            $row = $this->db->lJoin($row,'member','mid,nickname','mid','mid');
            $this->smarty->assign('row',$row[0]);
        }
        #发私信
        elseif($_GET['mid']){
            $row = $this->db->get("SELECT mid,username,nickname FROM member WHERE mid = '".intval($_GET['mid'])."'");
            if($row){
                $this->smarty->assign('row',$row);
            }
        }

        if(STPL == 'mobile'){
            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_message.html'));
                }
                die(json_encode($array));
            }
        }

        $this->smarty->assign('list',$list);

        if(STPL == 'mobile'){
            $row['head'] = '站内信';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->display('member/message.html');
    }
    function message_del($id){
        $this->db->delete('msg',array('id'=>intval($id)));
        $this->db->delete('msg',array('parent_id'=>intval($id)));
        exit($this->msg('删除成功',array('iniframe'=>false,'url'=>url('/member/message'))));
    }

    /**
     * 银行卡管理
     */
    function bankcard($id=''){
        $member = $this->memberinfo;
        $data['member'] = $member;
        if(empty($member['realname']))$this->api_result(array('msg'=>"绑定银行卡前请先进行实名认证","code"=>2));
        if($_POST['Submit']){
            if(empty($_POST['bankname']))$this->api_result(array('msg'=>"请输入银行名称")); 
            if(empty($_POST['bankcard']))$this->api_result(array('msg'=>"请输入银行卡号")); 
            if(empty($_POST['bankaddress']))$this->api_result(array('msg'=>"请输入开户行"));
            
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_bankcard')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);

                $mobile = $this->memberinfo['mobile'];

                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=4 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0)
                {
					//$this->api_result(array('msg'=>"手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！"));                   
                }
            }

            $input = array();
            $input['id'] = intval($_POST['id']) ? intval($_POST['id']) : 0;
            $input['name'] = $member['realname'];
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['bankname'] = trim($_POST['bankname']);
            $input['bankcard'] = trim($_POST['bankcard']);
            $input['bankaddress'] = trim($_POST['bankaddress']);
            $input['is_default'] = $_POST['is_default'] ? 1 : 0;
            //清空默认
            if($_POST['is_default']){
                $this->db->update('member_bankcard',array('is_default'=>0),array('mid'=>MID));
            }
            $this->member->bankcard_save($input);
            $this->api_result(array('msg'=>"保存成功",'code'=>1));
        }
        if($id){
            $row = $this->db->get("SELECT * FROM member_bankcard WHERE `id` = '".$id."'");
            $data['row'] = $row;
        }

        if(STPL == 'mobile'){
            $row['head'] = '绑定银行卡';
			$data['row'] = $row;
        }
        $bankcard = $this->member->bankcard(MID);
		$data['bankcard'] = $bankcard;
		$data['sms_open'] = $this->site_config['sms_open'];
		$data['sms_bankcard'] = statusTpl('sms_bankcard');
        
        $this->api_result(array('data'=>$data));
    }
    function bankcard_del($id){
        $this->db->delete('member_bankcard',array('id'=>intval($id)));
		$this->api_result(array('msg'=>'删除成功','code'=>1));        
    }

    /**
     * 夺宝记录
     */
    function db($page=1){
        $this->load->model('yunbuy');
        $this->load->model('taglib');
        //参与成功
        if(!isset($_GET['order'])){
            #状态统计
            $total['wait'] = $this->yunbuy->getDbtotal("status=4 AND mid = ".MID);
            $total['ing'] = $this->yunbuy->getDbtotal("status=2 AND mid = ".MID);
            $total['end'] = $this->yunbuy->getDbtotal("(status=5 OR status=3) AND mid = ".MID);
            $this->smarty->assign('total',$total);
            $where = " AND d.mid='".MID."' AND d.status <> 1";
            #状态
            switch(intval($_GET['type'])){
                case 1:
                    $where .= " AND d.status = 4";
                    break;
                case 2:
                    $where .= " AND d.status = 2";
                    break;
                case 3:
                    $where .= " AND (d.status=5 OR d.status=3)";
                    break;
            }
            #时间段
            if(!empty($_GET['from_data'])) $where .= " AND d.db_time >= '".strtotime($_GET['from_data'])."'";
            if(!empty($_GET['end_data'])) $where .= " AND d.db_time <= '".strtotime($_GET['end_data'])."'";

            switch(intval($_GET['time'])){
                case 1:
                    //今天
                    $where .= " AND d.db_time >= '".strtotime(today)."'";
                    break;
                case 2:
                    //本周
                    $where .= " AND d.db_time >= '".mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))."'";
                    break;
                case 3:
                    //本月
                    $where .= " AND d.db_time >= '".mktime(0, 0 , 0,date("m"),1,date("Y"))."'";
                    break;
                case 4:
                    //最近三月
                    $where .= " AND d.db_time >= '".mktime(0, 0 , 0,date("m")-2,1,date("Y"))."'";
                    break;
            }

            $size = 15;

            if(STPL == 'mobile' && isAjax()==true){
                $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
                $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
                $page = $last>0?ceil($last/$size+1):1;
            }

            $list = $this->yunbuy->getyunDb($where." GROUP BY buy_id ORDER BY db_time DESC",$size,$page,"",'href="/member/db/{num}"');
            if($list){
                foreach($list as $key=>$val){
                    $list[$key]['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200));
                    $list[$key]['buy'] = $this->yunbuy->yuninfo($val['buy_id']);
                    if($list[$key]['buy']['end_time']) $list[$key]['buy']['end_time'] = microtime_format($list[$key]['buy']['end_time'],'Y-m-d H:i:s.x');
                    //中奖夺宝信息
                    $list[$key]['luck_qty'] = $this->db->getstr("SELECT SUM(qty) AS qty FROM ###_yundb  WHERE mid = '".$list[$key][buy][member_id]."'  AND buy_id = '$val[buy_id]' ORDER BY db_time DESC");
                    $list[$key]['luck_nickname'] = $this->db->getstr("SELECT nickname FROM ###_member WHERE mid = '".$list[$key][buy][member_id]."'");
                    $list[$key]['buy']['member_name'] = nickname($list[$key]['buy']['member_name'],$list[$key]['luck_nickname']);
                    $list[$key]['yun_code'] = explode(',',$val['yun_code']);
                    $list[$key]['unit'] = $val['type']==2 ? $this->L['unit_pay_points'] : '';
                }
            }
            $this->api_result(array('data'=>$list));
        }else{
            //未付款
            $where = '';
            #时间段
            if(!empty($_GET['from_data'])) $where .= " AND add_time >= '".strtotime($_GET['from_data'])."'";
            if(!empty($_GET['end_data'])) $where .= " AND add_time <= '".strtotime($_GET['end_data'])."'";

            switch(intval($_GET['time'])){
                case 1:
                    //今天
                    $where .= " AND add_time >= '".strtotime(today)."'";
                    break;
                case 2:
                    //本周
                    $where .= " AND add_time >= '".mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))."'";
                    break;
                case 3:
                    //本月
                    $where .= " AND add_time >= '".mktime(0, 0 , 0,date("m"),1,date("Y"))."'";
                    break;
                case 4:
                    //最近三月
                    $where .= " AND add_time >= '".mktime(0, 0 , 0,date("m")-2,1,date("Y"))."'";
                    break;
            }

            $size = 15;

            if(STPL == 'mobile' && isAjax()==true){
                $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
                $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
                $page = $last>0?ceil($last/$size+1):1;
            }

            $this->load->model('page');
            $_GET['page'] = intval($page);
            $this->page->set_vars(array('per'=>$size,'url'=>'href="/member/db/{num}?order"'));
            $list = $this->page->hashQuery("SELECT * FROM ###_yunorder WHERE mid = '".MID."' AND status = 1 $where ORDER BY add_time DESC")->result_array();
            if($list){
                foreach($list as $key=>$val){
                    $list[$key]['allow_pay'] = 1;
                    $db = $this->yunbuy->getyunDb(" AND d.order_id = '$val[order_id]'",15,$page);
                    if($db){
                        foreach($db as $k=>$v){
                            $db[$k]['buy'] = $this->yunbuy->yuninfo($v['buy_id']);
                            //中奖夺宝信息
                            $db[$k]['luck_qty'] = $this->db->getstr("SELECT qty FROM ###_yundb WHERE status = 3 AND buy_id = '$v[buy_id]'  ORDER BY db_time DESC");
                            if($db[$k]['luck_qty'] || $v['status']==4 || $v['status']==5) $list[$key]['allow_pay'] = 0;
                        }
                        $list[$key]['db'] = $db;
                    }
                    //判断抵用券是否还存在并且未使用
                    $update = array();
                    if($val['user_bonus_id'] > 0){
                        $bonus = $this->db->select("select * from ###_member_bonus where id IN(".$val['user_bonus_id'].")");
                        foreach($bonus as $v){
                            if($v['order_id'] || $v['end_time']<time()){}
                            else{
                                if(isset($update['user_bonus_id']) && !empty($update['user_bonus_id'])){
                                    $update['user_bonus_id'] .= ',' . $v['id'];
                                }else{
                                    $update['user_bonus_id'] = $v['id'];
                                }
                            }
                        }
                    }
                    //更新要扣除的余额
                    if($val['user_money'] && $val['user_money'] > $this->memberinfo['user_money']){
                        $update['user_money'] = $this->memberinfo['user_money'];
                        $update['order_amount'] = $val['order_amount'] + ($val['user_money'] - $this->memberinfo['user_money']);
                    }
                    //更新要扣除的夺宝币
                    if($val['db_points'] && $val['db_points'] > $this->memberinfo['db_points']){
                        $update['db_points'] = $this->memberinfo['db_points'];
                        $update['order_amount'] = $val['order_amount'] + ($val['db_points'] - $this->memberinfo['db_points']);
                    }
                    if(!empty($update)){
                        $this->yunbuy->updateOrder($update, $val['order_id']);
                    }
                }
            }
            $this->api_result(array('data'=>$list));
        }
    }
    /**
     * 中奖记录
     */
    function luck($page=1){
        $this->load->model('yunbuy');

        $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
        $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
        $page = $page>0 ? $page : 1;

        $list = $this->yunbuy->getyunDb(" AND d.mid = ".MID." AND d.status = 3 ORDER BY d.db_time DESC",$size,$page,"",'href="/member/luck/{num}"');
        $list = $this->db->lJoin($list,'yunbuy','buy_id,goods_id','buy_id','buy_id');
        $list = $this->db->lJoin($list,'goods','id,real_price','goods_id','id','goods_');
        if(!empty($list)){
            foreach($list as $key=>$val){
                $list[$key]['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200));
                $list[$key]['db_time'] = microtime_format($val['db_time'],'Y-m-d H:i:s.x');
            }
        }
        $this->api_result(array('data'=>$list));
    }
    /**
     * 晒单
     */
    function share($page=1){
        $this->load->model('yunbuy');
        $list = $this->yunbuy->getShare("s.mid = ".MID,15,$page,"s.*",'href="/member/share/{num}"');
        $this->smarty->assign('list',$list);

        $this->smarty->assign('nav','share');
        $this->smarty->display('member/share.html');
    }
    /**
     * 提交晒单
     */
    function post_share($order_id=''){
        $goods_id = $this->db->getstr("SELECT good_id FROM ###_goods_order_item WHERE order_id = '$order_id' AND mid = '".MID."'");
        if(empty($goods_id)) $this->api_result(array('msg'=>'数据不存在','code'=>1));
        $order = $this->db->get("SELECT * FROM ###_goods_order WHERE id = '$order_id' AND mid = '".MID."'");
        if($order['is_share']>0) $this->api_result(array('msg'=>'已发布晒单','code'=>2));

        if(in_array($order['extension_code'], array(CART_WIN,CART_AUC))){
            $act_id = 0;
            if($order['extension_code'] == CART_WIN){
                $act_id = $this->db->getstr("SELECT act_id FROM ###_auction_log WHERE log_id = '$order[extension_id]'");
            }elseif($order['extension_code'] == CART_AUC){
                $act_id = $order['extension_id'];
            }
            $goods = $this->db->get("SELECT ga.*,g.cover FROM ###_goods_activity AS ga LEFT JOIN ###_goods AS g ON g.id=ga.goods_id WHERE ga.act_id=".$act_id);
            $goods['url'] = url('/auction/view/').$act_id;
            $goods['buy_id'] = $act_id;
            #商品图片
            if($goods['cover']){
                $picdata = array('id'=>$goods['cover']);
                $this->load->model('upload');
                $goods['cover'] = $this->upload->getGalleryImgUrls($picdata,array('middle','src','thumb'));
            }
        }elseif($order['extension_code']==CART_DB){
            $this->load->model('yunbuy');
            $goods = $this->db->get("SELECT b.* FROM ###_yundb AS d,###_yunbuy AS b WHERE d.id = '$order[extension_id]' AND b.buy_id = d.buy_id");
            $goods['url'] = url('/yunbuy/detail/').$goods['buy_id'];
            #商品图片
            if($goods['cover']){
                $picdata = array('id'=>$goods['cover']);
                $this->load->model('upload');
                $goods['cover'] = $this->upload->getGalleryImgUrls($picdata,array('middle','src','thumb'));
            }
            $goods['thumb'] = $this->taglib->_fileurl(array('source'=>$goods['thumb'],'width'=>200,'height'=>200));
        }
        if(!empty($_POST)){
            if($order['is_share']) $this->api_result(array('msg'=>'您已经晒过单了','code'=>2));
            if(empty($_POST['title'])) $this->api_result(array('msg'=>'请输入晒单标题','code'=>3));
            if(empty($_POST['content'])) $this->api_result(array('msg'=>'请输入内容','code'=>4));
            if(empty($_FILES)) $this->api_result(array('msg'=>'无图无真相,上传点晒单照片吧','code'=>5));
            $_POST['share'] = array();
            $this->load->model('upload');
            //上传图片
            foreach($_FILES as $key=>$val){
                $dir = 'share';
                //创建目录
                static $upDir;
                if(is_null($upDir))$upDir = $this->load->config('picture','image_dir');#保存目录
                $FullDir = $upDir.$dir.'/';
                is_dir($FullDir)||mkdir($FullDir,0777,true);
                $tmp_name = $val['tmp_name'];
                $filename = trim($val['name']);
                $epos = strrpos($filename,'.');#点的位置
                $name = substr($filename,0,$epos);#文件名称
                $ext = strtolower(substr($filename,$epos));#扩展名

                //新文件名
                $name = $this->upload->random_filename();
                $savePath = $FullDir.$name.'_src'.$ext;
                move_uploaded_file($tmp_name, $savePath);
                $resize = $thumb = array('thumb'=>array('width'=>500,'height'=>500));
                //生成图片缩略图
                if(is_array($resize)){
                    static $loadedImage;
                    if(is_null($loadedImage)){
                        $this->load->library('image',array('ratio'=>true));
                        $loadedImage = true;
                    }
                    //载入图片.
                    $this->image->load_src($savePath);

                    foreach($resize as $size=>$val){
                        if(!isset($val['height'],$val['width']))continue;
                        $widht = $val['width'];
                        $height = $val['height'];
                        $path = $FullDir.$name.'_'.$size.$ext;
                        $this->image->resize($widht, $height, $path, true);
                        $img = str_replace(RootDir.'web/upload/images','',$path);
                        $this->upload->yunsave($img,$dir);
                    }
                }

                if(!empty($thumb)){
                    $this->upload->rmFile($savePath);
                }else{
                    $img = str_replace(RootDir.'web/upload/images','',$savePath);
                    $this->upload->yunsave($img,$dir);
                }
                $_POST['share'][] = empty($thumb) ? str_replace(RootDir.'web','',$savePath) : str_replace(RootDir.'web','',$path);
            }
            $data_arr = array();
            $data_arr['title'] = trim($_POST['title']);
            $data_arr['content'] = trim($_POST['content']);
            $data_arr['thumb'] = trim($_POST['share'][0]);
            $data_arr['thumbs'] = serialize($_POST['share']);
            $data_arr['extension_code'] = $order['extension_code'];
            $data_arr['obj_id'] = $goods['buy_id'];
            $data_arr['obj_name'] = $goods['title'];
            $data_arr['qishu'] = $goods['qishu'];
            $data_arr['luck_code'] = $goods['luck_code'];
            $data_arr['mid'] = MID;
            $data_arr['username'] = USER;
            $data_arr['addtime'] = RUN_TIME;
            $data_arr['order_id'] = $order_id;
            $data_arr['db_points'] = $this->site_config['share_db'];
            $data_arr['goods_id'] = $goods_id;
            $data_arr['is_show'] = 0;
            $share_id = $this->db->save("share",$data_arr);
            //更新订单已晒单
            $this->db->update('goods_order',array('is_share'=>$share_id),array('id'=>$order_id));
            if($this->site_config['share_db']){
                //$this->member->accountlog('admin',array('db_points'=>(int)$this->site_config['share_db'],'rank_points'=>(int)$this->site_config['share_db']*10,'desc'=>'发布晒单获得奖励'));
            }
            $this->api_result(array('msg'=>'晒单成功,等待系统审核并奖励!','code'=>0));
        }
        $this->load->library('form');
        $goods['btn'] = $this->form->app_upload_files('share','','',6);
        $this->api_result(array('data'=>$goods));

    }
    /**
     * 兑换夺宝币
     */
    function change_db(){
        $desc = '余额兑换';
        //今日已送出多少抵用券总量
        $sql = "SELECT SUM(money) FROM ".$this->bonus->mbTable.
            " WHERE `desc` LIKE '%$desc%' AND start_time>".strtotime('today');
        $bonus_money = $this->db->getstr($sql);

        $withdraw_discount = explode("\n",$this->site_config['withdraw_discount']);
        $discount = array();
        $discount_arr = array();
        foreach($withdraw_discount as $v){
            $v = trim($v);
            if(empty($v)) continue;

            $v = explode('|',$v);
            if(!empty($v[0]) || !empty($v[1])){
                $discount_arr[] = array('s'=>trim($v[1]),'v'=>trim($v[0]));
                $discount[trim($v[0])] = trim($v[1]);
            }
        }

        if(!empty($_POST)){
            $amount = !empty($_POST['other']) ? intval($_POST['other']) : intval($_POST['amount']);
            if($amount<=0) $this->api_result(array('msg'=>'请输入正确的兑换金额'));
            if($this->memberinfo['user_money']<$amount) $this->api_result(array('msg'=>'账户余额不足'));

            //非首次兑换（改为按照比例赠送）
            $give = isset($discount[$amount]) ? $discount[$amount] : 0;

            //非首次兑换不送
            $this->load->model('bonus');
            $bonus_first = $this->db->getstr("SELECT COUNT(*) FROM ".$this->bonus->mbTable." WHERE mid=".MID." AND `desc` LIKE '%$desc%'");
            if($bonus_first>0){
                //$give = 0;
                if($this->site_config['duihuan_lv']){
                    $give = ceil($amount*preg_replace("/%/", "", $this->site_config['duihuan_lv'])/100);
                }else{
                    $give = 0;
                }
            }

            if($give>0 && $bonus_money+$give <= $this->site_config['change_db_limit']){
                $number = ceil($give/1);
                $this->bonus->send(array(
                    'mid'  => MID,
                    'desc' => $desc,
                    'number' => $number,
                    'money' => 1,
                ));
            }
            $log_arr['mid'] = MID;
            $log_arr['user_money'] = -$amount;
            $log_arr['db_points'] = $amount;
            $log_arr['desc'] = "兑换".$this->L['unit_db_points']."";
            $log_arr['desc'] .= $give ? "(赠送 $give ".$this->L['unit_db_points']."".$this->L['unit_bonus'].")" : "";
            $log_arr['desc'] .= "(赠送$amount M空间)";
            $this->member->accountlog(ACT_CHANGE,$log_arr);
            //这里增加空间数量
            $this->db->update('member',"spacedata = spacedata+$amount*1024*1024 ",array('mid'=>MID));
            $this->api_result(array('code'=>1,'msg'=>'兑换成功'));
        }

        $data = array();

        $data['discount'] = $discount_arr;
        $data['change_db_limit'] = !empty($this->site_config['change_db_limit']) ? $this->site_config['change_db_limit'] : 0;
        $data['site_name'] = $this->site_config['site_name'];
        $data['unit_db_points'] = $this->L['unit_db_points'];
        $data['unit_bonus'] = $this->L['unit_bonus'];


        $data['bonus_money'] = !empty($bonus_money) ? $bonus_money : 0;
        $data['end_limit'] = $data['change_db_limit']-$bonus_money;
        $this->api_result(array('data'=>$data));

    }
    function ajax_discount_db(){
        $amount = intval($_POST['amount']);
        $withdraw_discount = $this->base->explodeChar($this->site_config['withdraw_discount']);
        $discount = array();
        if($withdraw_discount){
            foreach($withdraw_discount as $key=>$val){
                $discount[$val] = $key;
            }
        }
        //判断是否赠送
        $give = 0;
        foreach($discount as $key=>$val){
            if($amount>=$key) $give = $val;
        }
        echo $give;
    }
    /**
     * 我的推荐
     */
    function myivt($page=1){
        $data = array();
        $type = intval($_GET['type']);

        $this->load->model('yunbuy');
        $cmss = $this->yunbuy->comss_po();
        $cmss = array_slice($cmss,0,3);

        //获取分销层级及层级人数
        $this->cmss_count(MID, $cmss, 0);
        foreach($cmss as $k=>$v){
            $cmss[$k]['level'] = num2char($k+1);
        }
        $data['cmss'] = $cmss;

        //异步加载邀请人
        if(isset($_GET['type'])){
            $size = 5;

            $this->load->model('page');
            $_GET['page'] = intval($page);
            $this->page->set_vars(array('per'=>$size));

            $where = '';
            $list = $cmss[$type]['list'];
            if($list){
                $where = "mid IN(";
                foreach($list as $k=>$v){
                    if($k>0) $where .= ",";
                    $where .= $v['mid'];
                }
                $where .= ")";
            }else{
                $where = "mid='-1'";
            }

            $list = $this->page->hashQuery("SELECT * FROM ###_member WHERE ".$where." AND status = 1 ORDER BY c_time DESC")->result_array();
            foreach($list as $k=>$v){
                if(!$type){
                    $is_award = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_award_ivt WHERE mid=".MID." AND ivt_mid=".$v['mid']);
                    $v['is_award'] = empty($is_award) ? 0 : 1;
                }
                $v['username'] = nickname($v['username'],$v['nickname']);
                $v['c_time'] = date('Y-m-d H:i',$v['c_time']);
                $v['num'] = $k+1;
                $list[$k] = $v;
            }
            $data['list'] = $list;
        }

        $qrcode = creat_code(url('/member/regist/'.$_SESSION['username']),'qr'.$_SESSION['mid'].'.png');
        $data['qrcode'] = $qrcode;

        //分享内容
        $comment = array();
        $comment['text'] = $this->site_config['share_text'];
        $comment['url'] = url('/member/regist/'.MID);
        $comment['pic'] = url($qrcode);
        $comment['wxKey'] = $this->site_config['wxKey'];
        //短地址
        $dwz = http('http://dwz.cn/create.php','post',array('url'=>$comment['url']));
        $dwz = json_decode($dwz);
        if($dwz->tinyurl) $comment['url'] = $dwz->tinyurl;
        
        $data['comment'] = $comment;
        $data['nav'] = 'myivt';
        $data['ivt1'] =$this->site_config['ivt1'];
        $data['ivtreg_db'] =$this->site_config['ivtreg_db'];
        $data['unit_db_points'] =$this->L['unit_pay_points'];
        $data['unit_yun'] =$this->L['unit_yun'];       
        $this->api_result(array('data'=>$data));
    }
    //递归统计各分销人数
    private function cmss_count($mid, &$cmss, $i){
        $count = count($cmss);
        if($i>=$count){ return; }
        $cmss[$i] = array('itv'=>$cmss[$i]);
        $cmss[$i]['count'] = 0;
        $cmss[$i]['list'] = array();

        $mids = '';
        if($mid){
            $list = $this->db->select("SELECT * FROM ###_member WHERE ivt_id IN(".$mid.") AND status = 1");
            if($list){
                $cmss[$i]['count'] = count($list);
                foreach($list as $k=>$v){
                    if($k>0) $mids .= ',';
                    $mids .= "'".$v['mid']."'";
                }
                $cmss[$i]['list'] = $list;
            }
        }
        $this->cmss_count($mids, $cmss, $i+1);
    }
    /**
     * 领取推荐奖励
     */
    function award_ivt($num=1){
        $num = intval($num);
        $mid = intval($_POST['mid']) ? intval($_POST['mid']) : 0;
        if($mid>0 && $this->site_config['ivt1']){
            #每邀请一位会员领取
            $ivt_member = $this->db->get("SELECT * FROM ###_member WHERE mid = '$mid' AND ivt_id = '".MID."'");
            if(!$ivt_member){ die(json_encode(array('error'=>1,'msg'=>'领取错误'))); }
            #是否已领取过奖励
            $ivt_award = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_award_ivt WHERE mid = '".MID."' AND status = 2 AND ivt_mid = '$mid'");
            if($ivt_award){ die(json_encode(array('error'=>1,'msg'=>'您已领取过奖励'))); }

            $status = 2;
            $log_arr = array();
            $log_arr['mid'] = MID;
            $log_arr['username'] = USER;
            $log_arr['pay_points'] = $this->site_config['ivt1'];
            $log_arr['desc'] = '邀请注册奖励'.$this->L['unit_pay_points'];
            $this->member->accountlog(ACT_IVTREG, $log_arr);

            //保存领取记录
            $this->db->insert('award_ivt',array('mid'=>MID,'username'=>USER,'num'=>$num,'ivt_mid'=>$mid,'status'=>$status,'addtime'=>RUN_TIME));

            $msg = "领取成功,获得 ";
            if($log_arr['pay_points']){
                $msg .= $log_arr['pay_points']." ".$this->L['unit_pay_points'];
            }
            $this->api_result(array('msg'=>$msg,'code'=>0));

            die(json_encode(array('error'=>0,'msg'=>$msg)));
        }
        $this->api_result(array('msg'=>'领取失败','code'=>1));

    }
    /**
     * 推荐佣金
     */
    function commission($page=1){
        $_GET['page'] = $page;
        $this->load->model('page');
        $this->page->set_vars(array(
            'per'=>$this->site_config['page_size'],
            'url'=>'href="/member/commission/{num}"'
        ));
        
        #时间段
        if(!empty($_GET['from_data'])) $where .= " AND addtime >= '".strtotime($_GET['from_data'])."'";
        if(!empty($_GET['end_data'])) $where .= " AND addtime <= '".strtotime($_GET['end_data'])."'";

        switch(intval($_GET['time'])){
            case 1:
                //今天
                $where .= " AND addtime >= '".strtotime(today)."'";
                break;
            case 2:
                //本周
                $where .= " AND addtime >= '".mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))."'";
                break;
            case 3:
                //本月
                $where .= " AND addtime >= '".mktime(0, 0 , 0,date("m"),1,date("Y"))."'";
                break;
            case 4:
                //最近三月
                $where .= " AND addtime >= '".mktime(0, 0 , 0,date("m")-2,1,date("Y"))."'";
                break;
        }

        $list = $this->page->hashQuery("SELECT * FROM ###_commission WHERE mid = '".MID."' $where ORDER BY addtime DESC")->result_array();   
        if($list){
            foreach($list as $k=>$v){
                $list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);                
                $list[$k]['username'] = nickname($v['ivt_username']);
            }
            $data['list'] = $list;
        }        
        $commission_total = $this->db->getstr("SELECT SUM(commission) FROM ###_commission WHERE mid ='".MID."'");

        $data['commission_total'] =!empty($commission_total) ? $commission_total : '0.00';
        //会员信息
        $data['deduct_commission'] = !empty($this->memberinfo['deduct_commission']) ? $this->memberinfo['deduct_commission']: '0.00';
        $data['commission'] = !empty($this->memberinfo['commission'])? $this->memberinfo['commission']: '0.00';

        $data['nav'] = 'commission';
        $data['unit_yun'] = $this->L['unit_yun'];
        $this->api_result(array('data'=>$data));         
    }
    /**
     * 佣金充值
     */
    function recharge_commission() {
        //会员信息
        $data['deduct_commission'] = !empty($this->memberinfo['deduct_commission']) ? $this->memberinfo['deduct_commission'] : '0.00';
        $data['commission'] = !empty($this->memberinfo['commission']) ? $this->memberinfo['commission'] : '0.00';

        $msg = '操作错误';
        $code = 3;
        if ($_POST['Submit']) {
            $change_money = floor($_POST['change_money']);

            if ($change_money <= 0) {
                $msg = '请输入正确的充值佣金';
                $code = 1;
            } elseif ($this->memberinfo['commission'] < $change_money) {
                $msg = '佣金余额不足无法充值';
                $code = 2;
            } else {
                $this->db->update('member', "commission = commission-$change_money , deduct_commission = deduct_commission + $change_money", array('mid' => MID));
                $log_arr = array();
                $log_arr['mid'] = MID;
                $log_arr['username'] = USERNAME;
                $log_arr['db_points'] = $change_money;
                $log_arr['desc'] = '佣金充值夺宝币';
                $this->member->accountlog(ACT_RCGCMS, $log_arr);

                $code = 0;
                $msg = '充值成功';
                $member = $this->member->member_info(MID);
                $data['deduct_commission'] = !empty($member['deduct_commission']) ? $member['deduct_commission'] : '0.00';
                $data['commission'] = !empty($member['commission']) ? $member['commission'] : '0.00';
            }
        }
        $this->api_result(compact('msg', 'code', 'data'));
    }

    /**
     * 佣金提现
     */
    function withdraw_commission() {
        $this->member->commission_fee(100);
        $member = $this->memberinfo;
        if (empty($member['realname'])) {
            $this->api_result(array('msg' => '请先进行实名认证', 'code' => 2));
        }
        $bankcard = $this->member->bankcard(MID);
        if (empty($bankcard)) {
            $this->api_result(array('msg' => '请先绑定银行卡', 'code' => 3));
        }
        $this->site_config['withdraw_commission'];

        if ($_POST['Submit']) {
            $bank_id = intval($_POST['id']);
            $withdraw_money = is_numeric($_POST['amount']) ? $_POST['amount'] : 0;
  
            $code = 4;
            switch (true) {
                case $withdraw_money <= 0:
                    $msg = '请输入正确的充值佣金';
                    break;
                case $this->memberinfo['commission'] < $this->site_config['withdraw_commission']:
                    $msg = '您的佣金还未满' . $this->site_config['withdraw_commission'] . '暂时无法提现';
                    break;
                case $withdraw_money < $this->site_config['withdraw_commission']:
                    $msg = '申请提现佣金必须大于或等于' . $this->site_config['withdraw_commission'];
                    break;
                case $this->memberinfo['commission'] < $withdraw_money:
                    $msg = '佣金余额不足无法提现';
                    break;
                case $withdraw_money > 4000:
                    $msg = '大额佣金提现请联系客服处理';
                    break;
                case empty($bank_id):
                    $msg = '请选择提现账号';
                    break;
                default:
                    $bankcard = $this->db->get("SELECT bankname,bankcard FROM ###_member_bankcard WHERE id = '$bank_id'");
                    $commission_fee = $this->member->commission_fee($withdraw_money);

                    $insert_arr = array();
                    $insert_arr['mid'] = MID;
                    $insert_arr['username'] = USER;
                    $insert_arr['commission'] = $withdraw_money;
                    $insert_arr['amount'] = $commission_fee['amount'];
                    $insert_arr['bankname'] = $bankcard['bankname'];
                    $insert_arr['bankcard'] = $bankcard['bankcard'];
                    $insert_arr['fee'] = $commission_fee['fee'];
                    $insert_arr['sales_tax'] = $commission_fee['sales_tax'];
                    $insert_arr['income_tax'] = $commission_fee['income_tax'];
                    $insert_arr['status'] = 1;
                    $insert_arr['addtime'] = RUN_TIME;
                    $this->db->insert('withdraw_commission', $insert_arr);
                    $this->db->update('member', "commission = commission-$withdraw_money , deduct_commission = deduct_commission + $withdraw_money", array('mid' => MID));
                    $msg = '申请成功';
                    $code = 0;
                    break;
            }
        }
        $data['list'] = $bankcard;
        $data['commission'] = $this->memberinfo['commission'];
        $this->api_result(compact('msg','code','data'));
        //exit($this->msg('申请成功', array('icon' => 1, 'url' => url('/member/withdraw_commission_log'))));
    }

    /**
     * 佣金提现手续费
     */
    function commission_fee(){
        $result = array();
        $amount = is_numeric($_POST['amount']) ? $_POST['amount'] : 0;
        if($amount<=0) $msg='请输入正确的充值佣金';
        if($this->memberinfo['commission']< $this->site_config['withdraw_commission']) $msg='您的佣金还未满'.$this->site_config['withdraw_commission'].'暂时无法提现';
        if($this->memberinfo['commission']<$amount) $msg = '佣金余额不足无法提现';
        if($amount < $this->site_config['withdraw_commission']) $msg = '申请提现佣金必须大于或等于'.$this->site_config['withdraw_commission'];
        if($amount>4000) $msg = '大额佣金提现请联系客服处理';
        if(empty($msg)) $result = $this->member->commission_fee($amount);
        $result['msg'] = $msg;
        echo json_encode($result);
    }
    /**
     * 佣金提现
     */
    function withdraw_commission_log($page=1){
        $_GET['page'] = $page;
        $this->load->model('page');
        $this->page->set_vars(array(
            'per'=>$this->site_config['page_size'],
            'url'=>'href="/member/withdraw_commission_log/{num}"'
        ));

        #时间段
        if(!empty($_GET['from_data'])) $where .= " AND addtime >= '".strtotime($_GET['from_data'])."'";
        if(!empty($_GET['end_data'])) $where .= " AND addtime <= '".strtotime($_GET['end_data'])."'";

        switch(intval($_GET['time'])){
            case 1:
                //今天
                $where .= " AND addtime >= '".strtotime(today)."'";
                break;
            case 2:
                //本周
                $where .= " AND addtime >= '".mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))."'";
                break;
            case 3:
                //本月
                $where .= " AND addtime >= '".mktime(0, 0 , 0,date("m"),1,date("Y"))."'";
                break;
            case 4:
                //最近三月
                $where .= " AND addtime >= '".mktime(0, 0 , 0,date("m")-2,1,date("Y"))."'";
                break;
        }
        
        $list = $this->page->hashQuery("SELECT * FROM ###_withdraw_commission WHERE mid = '".MID."' $where ORDER BY addtime DESC")->result_array();
        if($list){
            foreach($list as $k=>$v){
                $list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']); 
            }
            $data['list'] = $list;
        }

        //$this->smarty->assign('nav','withdraw_commission_log');
        $this->api_result(compact('data'));
    }

    /**
     * 分享码
     */
    function sharecode(){
        #我的分享码
        $sharecode = $this->db->get("SELECT *  FROM ###_sharecode WHERE mid = '".MID."'");
        $this->smarty->assign('sharecode',$sharecode);
        if($sharecode){
            $sharecode_list = $this->db->select("SELECT o.mid,o.username,o.order_sn,o.add_time,m.nickname FROM ###_yunorder AS o LEFT JOIN ###_member AS m ON m.mid = o.mid WHERE o.used_sharecode = '$sharecode'");
            $this->smarty->assign('sharecode_list',$sharecode_list);
        }
        #我使用的分享码
        $used_sharecode = $this->db->getstr("SELECT used_sharecode FROM ###_yunorder WHERE mid = '".MID."' AND used_sharecode <> ''");
        $this->smarty->assign('used_sharecode',$used_sharecode);
        if($used_sharecode){
            $used_sharecode_list = $this->db->select("SELECT o.mid,o.username,o.order_sn,o.add_time,m.nickname FROM ###_yunorder AS o LEFT JOIN ###_member AS m ON m.mid = o.mid  WHERE o.used_sharecode = '$used_sharecode'");
            $this->smarty->assign('used_sharecode_list',$used_sharecode_list);
        }

        //分享内容
        $comment = array();
        $comment['text'] = '#225爱我拍# 分享码 '.$sharecode.'使用即可免费夺宝哦！.';
        $comment['url'] = url();
        $this->smarty->assign('comment',$comment);

        $this->smarty->assign('nav','sharecode');
        $this->smarty->display('member/sharecode.html');
    }

    /**
     * 抵用券
     */
    function bonus($page=1){
        $this->load->model('bonus');
        $this->load->model('page');
        $_GET['page'] = $page;
        $this->page->set_vars(array( 'per'=>10 ));

        $list = $this->page->hashQuery("SELECT * FROM ###_member_bonus WHERE mid = '".MID."' ORDER BY id DESC")->result_array();
        $list = $this->db->lJoin($list,'bonus','id,title','bonus_id','id','b_');
        foreach($list as $k=>$v){
            $v['money_type_title'] = $this->bonus->getMoneyType($v['money_type']);
            if((!empty($v['end_time']) && $v['end_time']<time()) || !empty($v['order_id'])){
                $v['disabled'] = 1;
            }else{
                $v['disabled'] = 0;
            }
            $v['start_time'] = !empty($v['start_time']) ? date('Y-m-d H:i:s',$v['start_time']) : '--';
            $v['end_time'] = !empty($v['end_time']) ? date('Y-m-d H:i:s',$v['end_time']) : '--';
            if(!empty($v['used_time'])){
                $v['used_time'] = date('Y-m-d H:i:s',$v['used_time']);
            }else{
                unset($v['used_time']);
            }
            $list[$k] = $v;
        }
        $full_cut = $this->bonus->full_cut(0);
        $ruls ='1.单次订单支付人次大于等于'.$this->L['unit_bonus'].'面值时，该'.$this->L['unit_bonus'].'即可使用<br>';
        if($full_cut['full_cut_0']){
            $ruls .= '2.所有'.$this->L['unit_bonus'].'遵循满'.$full_cut['full_cut_0'].'减'.$full_cut['full_cut_1'].'的规则（即单次订单支付'.$full_cut['full_cut_0'].'人次即可使用'.$full_cut['full_cut_1'].$this->L['unit_bonus'].')';
        }
        $this->api_result(array('data'=>array('list'=>$list,'unit_bonus'=>$this->L['unit_bonus'],'ruls'=>$ruls)));
    }
    /**
     * AJAX检查注册用户名
     */
    function check_username(){
        $username = trim($_POST['username']);
        $info = '';
        if(is_email($username)){
            $r = $this->db->get("SELECT username FROM member WHERE username='".$username."' OR email='".$username."'");
            $info = '该邮箱已注册';
        }elseif(is_mobile($username)){
            $r = $this->db->get("SELECT username FROM member WHERE username='".$username."' OR mobile='".$username."'");
            $info = '该手机号已注册';
        }else{
            $r = $this->db->get("SELECT username FROM member WHERE username='".$username."'");
            $info = '该用户名已注册';
        }
        if(!empty($r)){
            $result = array('msg'=>$info);
            die(json_encode($result));
        }else{
            $mobile = is_mobile($username) ? $username : '' ;
            $result = array('mobile'=>$mobile);
            die(json_encode($result));
        }
    }
    /**
     * AJAX检查邀请人信息
     */
    function check_ivt(){
        $r = $this->is_member($_POST['param']);
        if($r){
            $result = array('status'=>'y','info'=>'邀请人'.$r['username']);
        }else{
            $result = array('status'=>'n','info'=>'用户不存在');
        }
        echo json_encode($result);
    }
    /**
     * AJAX检查邮箱
     */
    function check_email(){
        $r = $this->db->get("SELECT mid,username FROM member WHERE email = '".trim($_POST['param'])."'");
        if($r){
            $result = array('status'=>'n','info'=>'邮箱已存在');
        }else{
            $result = array('status'=>'y');
        }
        echo json_encode($result);
    }
    /**
     * AJAX检查手机号
     */
    function check_mobile(){
        $r = $this->db->get("SELECT mid,username FROM member WHERE mobile = '".trim($_POST['param'])."'");
        if($r){
            $result = array('status'=>'n','info'=>'手机号已存在');
        }else{
            $result = array('status'=>'y');
        }
        echo json_encode($result);
    }

    function is_member($username,$mid=''){
        if($mid){
            return $r = $this->db->get("SELECT mid,username FROM member WHERE mid = '".intval($mid)."'");
        }else{
            return $r = $this->db->get("SELECT mid,username FROM member WHERE username = '".htmlspecialchars($username)."'");
        }
    }

    function login(){
        $data = array();
        $data['app_checking'] = $this->site_config['app_checking'];
        $data['qqKey'] = $this->site_config['qqKey'];
        $data['wxKey'] = $this->site_config['wxKey'];
        $data['wxSecret'] = $this->site_config['wxSecret'];
        $this->api_result(array('data'=>$data));
    }

    /**
     * 登录程序
     */
    function act_login(){
        !empty($_POST['username']) || exit($this->api_result(array('msg'=>'请输入用户名')));
        !empty($_POST['password']) || exit($this->api_result(array('msg'=>'请输入密码')));

        $username = addslashes(trim($_POST['username']));
        $password = $_POST['password'];

        $user = $this->db->get("SELECT * FROM ###_member WHERE username='".$username."' OR email='".$username."' OR mobile='".$username."'");

        $this->load->model('member');
        if($this->member->get_salt_hash($password, $user['salt']) != $user['password']){
            //登录失败
            $this->api_result(array('msg'=>'用户名或密码错误'));
        }else{
            if($user['status']!=1){
                $this->api_result(array('msg'=>'账户已禁用,请联系客服'));
            }

            $this->member->setLogin($user);
            $_SESSION['oauth'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth'] : $_POST['oauth'];
            //处理微信授权
            if(!empty($_SESSION['oauth'])){
                $data = array();
                //$data['photo'] = $_SESSION['oauth']['headimgurl'];
                //$data['nickname'] = $_SESSION['oauth']['nickname'];
                $data['openid'] = $_SESSION['oauth']['openid'];
                $data['unionid'] = $_SESSION['oauth']['unionid'];
                $this->db->update('###_member',$data,"mid = {$_SESSION['mid']}");
                //清空授权
                unset($_SESSION['oauth']);
            }
            $this->app_login($user);
            $data = array();
            $data['user'] = $user;
            $data['back_url'] = $_POST['back_url'] ? $_POST['back_url'] : 'index';
            $this->api_result(array('data'=>$data));
        }
    }

    function doexit(){
        $this->member->logout();
        $this->api_result(array('data'=>1));
    }


    /**
     * 第三方登录
     */
    function oauth(){

        $type = !empty($_REQUEST['type']) ? trim($_REQUEST['type']) : 'qq';
        $openid = trim($_POST['openid']);
        $unionid = trim($_POST['unionid']);
        if(empty($openid)) $this->api_result(array('msg'=>'授权失败,OPENID不存在'));
        if($type=='wx'){
            $sql = "SELECT * FROM member WHERE status=1 AND openid='".$openid."'";
            if(isset($unionid) && !empty($unionid)){
                $sql = "SELECT * FROM member WHERE status=1 AND unionid='".$unionid."'";
            }
        }else{
            $openid = $type.'_'.$openid;
            $sql = "SELECT * FROM member WHERE status=1 AND oauth_login='".$openid."'";
        }
        $member = $this->db->get($sql);
        if(!empty($member)){
            $this->load->model('member');
            $this->member->setLogin($member);
            $this->app_login($member);
        }
        $member['openid'] = $openid;
        $member['unionid'] = $unionid;
        $this->api_result(array('data'=>$member));
    }
    
    function app_login($member){
        $login_app=$this->site_config['login_app'];
        $login_app_number=$this->site_config['login_app_number'];
        $mobile_login=$member['mobile_login'];
        if($mobile_login==0){
            $this->member->applogin($member['mid']);
        }
        $mobile_login += 1;
        $this->db->update('###_member',array("mobile_login"=>$mobile_login),"mid = {$member['mid']}");
    }

    /**
     * 第三方登录处理
     * @param $type
     */
    function oauth_login($type){
        $type = empty($type) ?  '' : trim($type);

    }

    /*微信登录*/
    function oauth_chose(){
        if(empty($_SESSION['oauth'])){
            $this->msg('授权出错请重试',array('url'=>url(),'iniframe'=>false));exit;
        }
        if(STPL == 'mobile'){
            $row['head'] = '会员授权';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->display('member/oauth_chose.html');
    }
	
	//ajax下拉联动
    function chang_parent(){

        $id = $_POST['id'];

        $hidetop = $_POST['hidetop'];

        $field = $_POST['field'];
         
        $this->load->model('linkage');

        $str = $this->linkage->select_linkage($id,$hidetop,$field,'');
			
        die($this->api_result(array('data'=>$str)));

    }
}
