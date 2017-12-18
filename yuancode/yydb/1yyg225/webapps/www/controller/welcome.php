<?php
/**
 * Class welcome
 */
class welcome extends Lowxp{

    /**
     * IndexAction
     */
    function index(){
        echo '<div style="font-family:\5FAE\8F6F\96C5\9ED1;font-size:24px;padding:10px;">欢迎光临'.$this->site_config['site_name'].' :)</div>';
    }

    function setImgSize(){
        return;
        $rows = $this->db->select("SELECT * FROM images");

        foreach($rows as $val){
            $path = RootDir.'web/upload/images/'.$val['cate'].'/'.$val['imgurl'];
            if(is_file($path)){
                $data = getimagesize($path);
                #echo '<pre>';print_r($data);echo '</pre>';
                $size = $data[0].'x'.$data[1];
                $this->db->update('images',array('size'=>$size),array('id'=>$val['id']));
            }
        }
    }

    /**
     * 算术验证码
     */
    function scode() {
        //生成验证码图片
        Header("Content-type: image/PNG");
        srand((double)microtime()*1000000);
        $w = 95; //宽
        $h = 34;  //高

        $answer='';
        $authnum=0;
        $randnuml = rand(1,50);
        $randnumr = rand(1,50);
        $chars = array('+','-');
        $char = array_rand($chars,1);
        $char = $chars[$char];
        switch($char){
            case '+':
                $authnum = $randnuml+$randnumr;
                break;
            case '-':
                $randnumr = rand(0,$randnuml-1);
                $authnum = $randnuml-$randnumr;
                break;
            default:break;
        }
        $answer=$randnuml.$char.$randnumr.'=?';

        $_SESSION['icode'] = iconv('gbk','utf-8',$authnum);

        $im = imagecreate($w,$h);
        $gray = imagecolorallocate($im, rand(230,255),rand(230,255),rand(230,255));
        imagefill($im, 0,0, $gray);

        /*创建干扰线等*/
        for($i=0;$i<10;$i++){
            $color=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagearc($im,mt_rand(-10,$w),mt_rand(-10,$h),mt_rand(30,300),mt_rand(20,200),55,44,$color);
        }

        for($i=0;$i<20;$i++){
            $color = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
            imagesetpixel($im, rand()%90, rand()%30, $color);
        }

        imagettftext($im, 14, 10, 10, 34, imagecolorallocate($im, rand(0,128), rand(0,128), rand(0,128)),RootDir.'web/admin/fonts/scode.ttf', strtoupper($answer));
        imagepng($im);
        imagedestroy($im);
    }

    /**
     * 扫码同步登录二维码
     */
    function wx_scan(){
        include AppDir.'library/phpqrcode/phpqrcode.php';
        $errorCorrectionLevel = 'L';//容错级别
        $matrixPointSize = 8;//生成图片大小
        $dir = RootDir.'web/upload/images/qrcode/';
        //生成二维码图片
        $url = RootUrl.session_id();
        QRcode::png($url,false,$errorCorrectionLevel,$matrixPointSize,2);
    }

    /** TODO:短信验证码获取入口
     * verify_code status字段说明（后续添加其它验证码需要往下扩展说明）
     * 1注册验证状态 2注册成功状态
     * 3
     */
    function sms(){
        $iTime = 60; #第ip第隔多少秒才能获取一次

        //总开关
        if(!$this->site_config['sms_open']){
            $result['error'] = 1;
            $result['message'] = '短信接口未开启!';
            die(json_encode($result));
        }

        $mobile = isset($_POST['mobile'])?trim($_POST['mobile']):'';
        $act = isset($_POST['act'])?trim($_POST['act']):'';
        if(empty($act)) die;

        //后台登录验证码
        $sms_manage = 0;
        if($act == 'sms_manage'){
            $sms_manage = 1;

            if(!$this->site_config['managesms']){
                $result['error'] = 1;
                $result['message'] = '后台登录短信验证码功能未开启!';
                die(json_encode($result));
            }

            $username = isset($_POST['username'])?$_POST['username']:'';
            $password = isset($_POST['password'])?$_POST['password']:'';
            if(!$username || !$password){
                $result['error'] = 1;
                $result['message'] = '请输入管理员用户名和密码!';
                die(json_encode($result));
            }else{
                $user = $this->db->get("SELECT * FROM ###_m_user WHERE username='".$username."'");
                $mobile = $user['tel'];
                if(empty($mobile)){
                    $result['error'] = 1;
                    $result['message'] = '该管理员未设置手机号，可直接登录!';
                    die(json_encode($result));
                }
                if(get_salt_hash($password, $user['salt']) != $user['password']){
                    $result['error'] = 1;
                    $result['message'] = '管理员用户名或密码错误!';
                    die(json_encode($result));
                }
            }
        }

        //手机号为空时发送会员手机号
        if(empty($mobile) && $_SESSION['mid']){
            $this->load->model('member');
            $member = $this->member->member_info($_SESSION['mid']);
            $mobile = $member['mobile'];
        }

        //模板开关
        if(!statusTpl($act) && !$sms_manage){
            $result['error'] = 1;
            $result['message'] = '短信模板已禁用!';
            die(json_encode($result));
        }

        //提交的手机号是否正确
        if (empty($mobile) || ($this->base->validate($mobile, 'mobile') == false))
        {
            $result['error'] = 1;
            $result['message'] = '请填写正确的手机号!';
            die(json_encode($result));
        }

        //需要重新设置的变量
        $status = 1;

        //注册验证码
        if($act == 'sms_register'){
            $status = 1;

            //提交的手机号是否已经注册帐号
            $sql = "SELECT COUNT(mid) FROM ###_member WHERE mobile = '$mobile'";
            if ($this->db->getstr($sql) > 0)
            {
                $result['error'] = 2;
                $result['message'] = '手机号已经被注册过!';
                die(json_encode($result));
            }
        }
        //身份证验证
        elseif($act == 'sms_idcard'){
            $status = 3;
        }
        //银行卡验证
        elseif($act == 'sms_bankcard'){
            $status = 4;
        }
        //支付密码验证
        elseif($act == 'sms_chpaypass'){
            $status = 5;
        }
        elseif($act == 'sms_verifymobile'){
            $status = 6;
            $sql = "SELECT status FROM ###_member WHERE mobile = '$mobile'";
            $member = $this->db->get($sql);
            if($member['status']!=1&&!empty($member)){
            	$result['error'] = 3;
            	$result['message'] = '该手机号已被禁用!';
            	die(json_encode($result));
            }
        }
        elseif($act == 'sms_password'){
            $status = 7;

            //提交的手机号是否已经注册帐号
            $sql = "SELECT COUNT(mid) FROM ###_member WHERE mobile = '$mobile'";
            if ($this->db->getstr($sql) <= 0)
            {
                $result['error'] = 2;
                $result['message'] = '该手机号未注册过!';
                die(json_encode($result));
            }
        }
        elseif($sms_manage){

        }
        else{ die; }

        //注册验证时校对验证码
        if(in_array($act, array('sms_register','sms_password','sms_verifymobile','sms_manage'))){
            if($sms_manage && !$this->site_config['verify_admin']){}
            else{
                $this->load->model('code');
                $res = $this->code->check();
                if($res['code'] != 0){
                    die(json_encode(array('error'=>3,'message'=>$res['msg'])));
                }
            }
        }

        if(in_array($act, array('sms_register','sms_idcard','sms_bankcard','sms_chpaypass','sms_password','sms_verifymobile'))){
            //设置每个短信类型每天只能发送5次
            $today = strtotime(date('Y-m-d',time()));
            $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE (status IN($status) || (status IN('2') AND regdateline>0)) AND mobile='$mobile' AND dateline>'$today'";
            if($this->db->getstr($sql)>=5){
                $result['error'] = 3;
                $result['message'] = '每个手机号码同模板每天只能发送5次短信';
                die(json_encode($result));
            }
        }
        
//        if(!empty($_SESSION['send_time']) && $_SESSION['send_time']+$iTime <= RUN_TIME){
//            $result['error'] = 3;
//            $result['message'] = '恶意请求';
//            die(json_encode($result));
//        }else{
//            $_SESSION['send_time'] = RUN_TIME;
//        }

        /*$sql = "SELECT COUNT(id) FROM ###_verify_code WHERE status='$status' AND (getip='".getIP()."' OR mobile='$mobile')";
        if ($this->db->getstr($sql) > 3)
        {
            $result['error'] = 3;
            $result['message'] = '恶意请求';
            die(json_encode($result));
        }*/

        //获取验证码请求是否获取过
        if(!$sms_manage){
            $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE status='$status' AND mobile='$mobile' AND getip='".getIP()."' AND dateline>'".(time()-$iTime)."'";
            if ($this->db->getstr($sql) > 0)
            {
                $result['error'] = 3;
                $result['message'] = '每IP每手机号每'.$iTime.'秒只能获取一次验证码。';
                die(json_encode($result));
            }
        }else{
            //$act = 'sms_register';
        }

        //获取验证码
        if($_SESSION['voiceVerify']) unset($_SESSION['voiceVerify']);
        $this->load->library('sms');
        $verifycode = $this->sms->getVerifyCode();
        $this->smarty->assign('verify_code',  $verifycode);

        //发送短信
        $ret = $this->sms->sendSmsTpl($mobile, $act);
        if($ret === true)
        {
            $data = array(
                'mobile'     => $mobile,
                'getip'      => getIP(),
                'verifycode' => $verifycode,
                'dateline'   => time(),
                'status'     => $status,
            );
            $this->db->save('###_verify_code',$data);

            $result['error'] = 0;
            $result['message'] = '手机短信验证码发送成功';
            die(json_encode($result));
        }
        else
        {
            $result['error'] = 4;
            $result['message'] = $ret?$ret:'手机短信验证码发送失败!';
            die(json_encode($result));
        }
    }

    /**
     * 语音验证码入口
     */
    function voice(){
        $iTime = 60; #第ip第隔多少秒才能获取一次
        //手机号为空时发送会员手机号
        if($_SESSION['mid']){
            $this->load->model('member');
            $member = $this->member->member_info($_SESSION['mid']);
            $mobile = $member['mobile'];
        }else{
            $mobile = isset($_REQUEST['mobile'])?trim($_REQUEST['mobile']):'';
        }
        //提交的手机号是否正确
        if (empty($mobile) || ($this->base->validate($mobile, 'mobile') == false))
        {
            $result['error'] = 1;
            $result['message'] = '请填写正确的手机号!';
            die(json_encode($result));
        }
        if(!$_SESSION['mid']){
            //提交的手机号是否已经注册帐号
            $sql = "SELECT COUNT(mid) FROM ###_member WHERE mobile = '$mobile'";
            if ($this->db->getstr($sql) > 0)
            {
                $result['error'] = 2;
                $result['message'] = '手机号已经被注册过!';
                die(json_encode($result));
            }
        }
        $status = 10;

        //获取验证码请求是否获取过
        $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE status='$status' AND mobile='$mobile' AND getip='".getIP()."' AND dateline>'".(time()-$iTime)."'";
        if ($this->db->getstr($sql) > 0)
        {
            $result['error'] = 3;
            $result['message'] = '每IP每手机号每'.$iTime.'秒只能获取一次验证码。';
            die(json_encode($result));
        }

        $verifycode = voiceVerify($mobile);
        if($verifycode){
            $data = array(
                'mobile'     => $mobile,
                'getip'      => getIP(),
                'verifycode' => $verifycode,
                'dateline'   => time(),
                'status'     => $status,
            );
            $this->db->save('###_verify_code',$data);
            $result['error'] = 0;
            $result['message'] = '语音验证码发送成功';
            die(json_encode($result));
        }else{
            $result['error'] = 4;
            $result['message'] = '语音验证码发送失败!';
            die(json_encode($result));
        }

    }

    /**
     * 支付返回地址
     */
    function respond($order_sn=""){
        include_once(AppDir.'function/payment.php');
        if(!empty($_REQUEST['metadata'])){
            $metadata = explode(':',$_REQUEST['metadata']);
            $code = $metadata[2];
        }
        /* 支付方式代码 */
        if(!empty($_REQUEST['code'])){
            $pay_code = trim($_REQUEST['code']);
        }elseif(isset($code)){
            $pay_code = $code;
        }else{
            $pay_code = 'wxpay';
        }

        if(!empty($_REQUEST['orderNo'])&&!empty($_REQUEST['payid'])) $pay_code='jubaopay';
        $icon = 0;
        $pay_id = 0;

        if(empty($_REQUEST['code']) && !empty($order_sn) && $order_sn != 'ajax'){

            $is_paid = $this->db->getstr("SELECT is_paid FROM ###_pay_log WHERE log_id = '$order_sn'");
            $icon = 2;
            $is_success = $is_paid ? 1 : 0;
            $msg = $is_paid ? '支付成功' : '支付失败';
            $pay_id = $order_sn;

        }else{
            /* 参数是否为空 */
            if (empty($pay_code))
            {
                $msg = '支付方式不存在';
            }
            else
            {
                /* 检查code里面有没有问号 */
                if (strpos($pay_code, '?') !== false)
                {
                    $arr1 = explode('?', $pay_code);
                    $arr2 = explode('=', $arr1[1]);

                    $_REQUEST['code']   = $arr1[0];
                    $_REQUEST[$arr2[0]] = $arr2[1];
                    $_GET['code']       = $arr1[0];
                    $_GET[$arr2[0]]     = $arr2[1];
                    $pay_code           = $arr1[0];
                }

                /* 判断是否启用 */
                $payment = $this->db->get("SELECT * FROM ###_payment WHERE pay_code = '$pay_code' AND enabled = 1");
                if (empty($payment))
                {
                    $msg = '支付方式不可用';
                }
                else
                {
                    $plugin_file = AppDir.'includes/modules/payment/' . $pay_code . '.php';
                    /* 检查插件文件是否存在，如果存在则验证支付是否成功，否则则返回失败信息 */
                    if (is_file($plugin_file))
                    {
                        /* 根据支付方式代码创建支付类的对象并调用其响应操作方法 */
                        include_once($plugin_file);

                        $payment = new $pay_code();
                        if($order_sn == 'ajax'){
                            @$payment->respond();die;
                        }elseif(isset($_REQUEST['ajax'])){
                            if((@$payment->respond())){ echo 'ok';die; }
                            else{ echo 'error';die; }
                        }else{
                            if(@$payment->respond()){
                                $msg = '恭喜您，支付成功！';
                                $icon = 2;
                                if(isset($_SESSION['pay_id']) && $_SESSION['pay_id']){
                                    $pay_id = $_SESSION['pay_id'];
                                }
                            }else{
                                $msg = '支付失败';
                            }
                        }
                    }
                    else
                    {
                        $msg = '支付方式不存在';
                    }
                }
            }
        }
        if($_REQUEST['ajax']){
            die(json_encode(array('is_success'=>$is_success)));
        }

        //判断支付类型
        $order_type = 1;
        if($pay_id){
            $this->load->model('payment');
            $pay_log = $this->payment->pay_log($pay_id);
            $order_type = $pay_log['order_type'];
        }

        if($icon==2 && $order_type==2){
            if($is_success){
                $this->smarty->display('yunbuy/respond_success.html');die;
            }else{
                $this->msg($msg,array('iniframe'=>false,'icon'=>$icon,'link'=>array(
                    array('text'=>'去夺宝','link'=>'/yunbuy'),
                    array('text'=>'返回首页','link'=>'/'))));
            }
        } elseif ($icon==2 && $order_type==3){
            $this->smarty->display('crowd/support_done.html');die;
        } else {
            $this->msg($msg,array('iniframe'=>false,'url'=>url('/member/recchage'),'icon'=>$icon,array(
                array('text'=>'继续充值','link'=>'/member/recchage'),
                array('text'=>'返回首页','link'=>'/'),
            )));
        }
    }

    //微信支付扫码页
    function weixin_qrcode(){
        $data['url'] = urldecode($_POST['url']);
        $data['log_id'] = intval($_POST['log_id']);
        $data['money'] = trim($_POST['money']);
        $this->smarty->assign('data',$data);
        $this->display_before(array('title'=>'微信扫码支付'));
        $this->smarty->display('yunbuy/payment_weixin.html');
    }

    //生成微信二维扫码
    function build_qrcode(){
        $data = urldecode($_GET['data']);
        require AppDir.'library/phpqrcode/phpqrcode.php';
        QRcode::png($data, false, "L", 6);
        exit();
    }
	
    /**
     * 获取时时彩开奖结果
     * $qihao 格式如:141107006
     */
    function lottery($qihao=''){
        $this->load->model('yunbuy');
        echo $this->yunbuy->lottery_code($qihao);
    }
	
    /**
     * 总参与人数
     * 公益金计算
     */
    function bidCount(){
        #总参与
        $data_bid = $this->base->read_static_cache('bidcount','');
        $data_bid['count'] = str_pad($data_bid['logCount'],9,'0',STR_PAD_LEFT);

        #公益金
        $gjj_js = $this->site_config['gjj_js'];
        $gjj_bl = $this->site_config['gjj_bl'];

        $count = number_format($gjj_js+$data_bid['logCount']*$gjj_bl/100,2);
        $data_bid['gjj'] = str_pad($count,9,'0',STR_PAD_LEFT);

        //仅刷新页面时执行一次的操作
        $i = isset($_REQUEST['i']) ? (int) $_REQUEST['i'] : 0;
        if($i == 0){
            /** 发送消息时加锁，避免大流量并发，重复发送的问题 **/
            /*$this->load->library('lock');
            $this->lock->limitTime = '10'; //锁10秒超时
            $this->lock->config('lock_msg', AppDir.'/data/');
            $this->lock->lock();*/

            $data = $this->base->read_static_cache('msg_queue','');
            $this->base->write_static_cache('msg_queue', array(), '');

            //释放文件锁
            /*$this->lock->unlock();*/

            //定期发送中奖消息队列
            if($data !== false && count($data) > 0){
                $array = array();
                foreach($data as $k=>$v){
                    $this->smarty->assign('username',$v['username']);
                    $this->smarty->assign('goodsname',$v['goodsname']);

                    $fail = 0; //发送失败标记
                    if($v['type'] == 'wx'){ //发送微信推送
                        $this->load->model('wxapi');
                        $ret = $this->wxapi->sendTextMessage($v['openid'], $v['msg']);
                        $ret = json_decode($ret,true);
                        if($ret['errcode'] != 0){ $fail = 1; }
                    }
                    elseif($v['type'] == 'sms'){ //发送中奖短信
                        $this->load->library('sms');
                        $ret = $this->sms->sendSmsTpl($v['mobile'], $v['tpl']);
                        if($ret !== true){ $fail = 1; }
                    }
                    elseif($v['type'] == 'app'){ //发送app推送
                        require_once(AppDir.'library/Jpush_send.class.php');
                        $fetion = new Jpush_send();
                        $ret = $fetion->send_pub(array('alias'=>array($v['username'])), $v['msg'], array('winpage'=>'./html/yunbuy_detail','id'=>$v['buy_id']));
                        if($ret !== true){ $fail = 1; }
                    }
                    elseif($v['type'] == 'email'){ //发送中奖邮件
                        $this->load->library('mail');
                        $ret = $this->mail->sendMailTpl($v['email'], $v['tpl']);
                        if($ret !== true){ $fail = 1; }
                    }

                    if($fail == 1){
                        //重发次数限制
                        if(!isset($v['count']) || $v['count'] <= 10){
                            $v['count'] = isset($v['count']) ? ($v['count']+1) : 1;
                            $array[] = $v;
                        }
                    }
                }
                //重写发送失败的消息
                $this->base->write_static_cache('msg_queue', $array, '');
            }
            //*** 定期发送中奖消息队列 end
        }
        
        //定期检查支持表订单过期情况，清理24小时未处理的订单
        $this->load->model('crowd');
        if($this->crowd->crowd_power){
            $this->load->model('crowd_support');
            $time = RUN_TIME - 24 * 60 * 60;
            $where = ' `support_status` = 0 AND `support_created_time` <= ' . $time;
            $this->crowd_support->updateSupportStatus(1, $where);
            //支持开奖
            $this->crowd_support->lottery();
            //定期检测众筹项目
            $this->db->update("crowd",array('is_success'=>1),"end_time <= '".time()."' AND status = 2 AND cd_total>=cd_price");
            $this->db->update("crowd",array('is_success'=>2),"end_time <= '".time()."' AND status = 2 AND cd_total<cd_price");
        }
        die(json_encode($data_bid));
    }

    /**
     * 清除缓存
     */
    function clearCaches(){
        if(!$_POST) die;
        $type = trim($_POST['type']);

        $count = $this->base->clear_caches($type);
        die($count);
    }

    /** 管理员授权前台会员登录
     * @param $mid
     */
    function auth_login($mid){
        if(isset($_SESSION['gid']) && $_SESSION['gid']<2){
            $this->load->model('member');
            $user = $this->db->get("SELECT * FROM ###_member WHERE mid='".$mid."'");
            if(!$user['is_robots']){
                //exit($this->msg('正常会员禁止授权登录！',array('iniframe'=>false,'url'=>'/')));
            }
            if($_SESSION['mid']){
                $this->member->logout();
            }
            $this->member->setLogin($user,1);
            exit($this->msg('授权登录中...',array('iniframe'=>false,'icon'=>1,'url'=>'/member')));
        }else{
            $this->msg();
        }
    }

    /**
     * 提交订单时异步检查今日参拍人次，提醒或限制购买
     */
    function checkYunLimit(){
        if(!isAjax()){ die(json_encode(array('code'=>1))); }
        $mid = isset($_SESSION['mid']) ? intval($_SESSION['mid']) : 0;
        if(!$mid){ die(json_encode(array('code'=>1))); }

        $yun_max_tip = (int) $this->site_config['yun_max_tip'];
        $yun_max_limit = (int) $this->site_config['yun_max_limit'];

        //获取购物车云购人次
        $yun_total = 0;
        $cart_goods = $this->yunbuy->cartgoods('',1);
        if($cart_goods){
            foreach($cart_goods as $v){
                if($v['type'] == 1){
                    $yun_total += $v['subtotal'];
                }
            }
        }
        if($yun_total <= 0){ die(json_encode(array('code'=>0))); }

        if(!$yun_max_tip && !$yun_max_limit){
            die(json_encode(array('code'=>0)));
        }

        //获取会员当日参拍人次
        $start_time = strtotime(date('Y-m-d',time())." 00:00:00");
        $end_time = strtotime(date('Y-m-d',time())." 23:59:59");
        $sql = "SELECT SUM(total) FROM ###_yundb WHERE `mid`=$mid AND `status`>1 AND `type`=1 AND `db_time`>$start_time AND `db_time`<=$end_time";
        $count = $this->db->getstr($sql);
        $count_total = $count + $yun_total;

        //今日参拍人次限制
        if($yun_max_limit > 0 && $count_total > $yun_max_limit){
            $data['msg'] = "您今日".$this->L['unit_yun']."人次已超过 $yun_max_limit 元（最大限制）";
            if($yun_max_limit >= $count){
                $data['msg'] .= "<br>最多还可".$this->L['unit_yun'].($yun_max_limit-$count)."元！";
            }
            $data['code'] = 1;
            $data['url'] = url('/');
            die(json_encode($data));
        }

        //今日参拍人次提醒
        if($yun_max_tip > 0 && $count_total > $yun_max_tip){
            $data['code'] = 2;
            $data['msg'] = "提醒：您今日购买人次已超过 $yun_max_tip 元，点击确认提交订单";
            die(json_encode($data));
        }

        die(json_encode(array('code'=>0)));
    }

}