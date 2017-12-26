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
        $this->load->model('member');
		
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
    /**签到*/
    function ajax_signin(){
        #今天是否签到
        $is_signin = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_signin WHERE mid = '$_SESSION[mid]' AND addtime >= '".strtotime('today')."'");

        $count_dob = 5; //设置连续?天送双倍拍币
        $msg = "<br><span style='color:#999'>-连续签到 <span style='color:red'>$count_dob</span> 天得 $count_dob 倍".$this->L['unit_pay_points']."</span>";

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
                die(json_encode(array('error'=>0,'msg'=>"首次签到成功，获得 $input[points] ".$this->L['unit_pay_points']."！".$msg)));
            }else{
                if($input['times']>=$count_dob && $input['times']%$count_dob==0){
                    die(json_encode(array('error'=>0,'msg'=>"连续签到成功，获得 $input[points] ".$this->L['unit_pay_points']."（$count_dob 倍）,已累计获得 $sum_point ".$this->L['unit_pay_points']."！"."<br><span style='color:#999'>-连续签到得 $count_dob 倍".$this->L['unit_pay_points']."</span>")));
                }else{
                    die(json_encode(array('error'=>0,'msg'=>"签到成功，获得 $input[points] ".$this->L['unit_pay_points'].",已累计获得 $sum_point ".$this->L['unit_pay_points']."！".$msg)));
                }
            }
        }else{
            die(json_encode(array('error'=>1,'msg'=>'您今天已签到过了！'.$msg)));
        }
    }

    /** 订单列表 */
    function order($page=1){
        $size = 10;

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

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
        $this->load->model('yunbuy');
        foreach($list as $k=>$v){
            if(!isset($v['goods'])) $v['goods'] = array();
            $v['deliver'] = json_decode($v['deliver'],true);

            if($v['goods']){
                foreach($v['goods'] as $k1=>$v1){
                    #商品来源
                    $v1['goods_desc'] = explode('|',$v1['goods_desc']);
                    $v['goods'][$k1] = $v1;
                }
            }

            //未支付完成的生成支付按钮
            if($v['status']==2 && $v['amount']>0){ }

            //重新计算支付金额
            if($v['status']==1 && $v['extension_code'] == CART_BUY){
                $yunorder = $this->db->get("select * from ###_yunorder where order_sn='".$v['order_sn']."'");
                if($yunorder){
                    $yunorder = $this->yunbuy->updateOrderAmount($yunorder, MID);
                    if($yunorder['status'] == 2){ $v['status'] = 5; }
                    $v['amount'] = $yunorder['order_amount'];
                }
            }

            $list[$k] = $v;
        }

        if(STPL == 'mobile'){
            $row['head'] = '订单管理';
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('r',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_order.html'));
                }
                die(json_encode($array));
            }
        }
        $this->smarty->assign('list',$list);
        $this->smarty->assign('nav','order');
        $this->smarty->display('member/order.html');

    }
    /**
     * 确认收货
     */
    function finish_order($id = ''){
        $id = intval($id);
        $order = $this->db->get("SELECT status FROM ###_goods_order WHERE mid=".MID." AND id = '$id'");
        if($order){
            $this->load->model('order');
            $this->order->chageOrderState($id,4,'');
        }
        $this->msg('',url('/member/order'));
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
            $row['head'] = $this->L['unit_pay'].'记录';
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
            $row['head'] = $this->L['unit_pay'].$this->L['unit_winning'].'记录';
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
        if($_POST['Submit']){
            $input = array();
            $items = array(
                'birthday','address','zone','nickname','sex','intro'
            );

            foreach($items as $val){
                if(isset($_POST[$val])){
                    $input[$val] = addslashes($_POST[$val]);
                }
            }
            $input['zone'] = !empty($_POST['zone']) ? end($_POST['zone']) : '';

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
            $input['nickname'] = str_replace(array("\r\n","\r","\n"), "", $input['nickname']);
            $nickname_len = mb_strlen($input['nickname'],'UTF8');
            if(!empty($input['nickname']) && ($nickname_len<2 || $nickname_len>9))die($this->msg('请输入2-9个字符长度的昵称'));
            $reEmail = '/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
            //$email = trim($_POST['email']);
            //if(!preg_match($reEmail,$email))exit($this->msg('邮箱格式错误'));

            //$r = $this->db->get("SELECT `username` FROM `member` WHERE `email` = '$email' AND username <> '".USER."'");

            //if ($r) exit($this->msg("邮箱已存在,请重新填写."));

            //$input['email'] = $email;
            $input['sex'] = intval($_POST['sex']);

            //if($email!=$this->memberinfo['email']){
                //$input['verify_email'] = 0;
            //}
            //第一次完善资料奖励经验
            if($this->memberinfo['is_perfect']==0 && !empty($input['email']) && !empty($input['nickname']) && !empty($input['birthday']) && !empty($input['zone'])){
                $input['is_perfect'] = 1;
                $this->member->accountlog(ACT_ADJUSTING,array('rank_points'=>80,'desc'=>'完善个人资料获得经验值'));
            }
            $this->db->update('member',$input,array('mid'=>MID));

            exit($this->msg('保存成功',array('icon'=>1,'url'=>'reload')));
        }

        $row = array('title'=>'个人资料');
        $this->display_before($row);
        if(STPL == 'mobile'){
            $row['head'] = '个人资料';
            $this->smarty->assign('row',$row);
        }

        $this->smarty->assign('nav','info');

        $member = $this->memberinfo;
        $member['zone'] = $member['zone'] ? $member['zone'] : 1;
        $member['mobile'] = substr($member['mobile'],0,-3).'***';
        $this->smarty->assign('member',$member);

        $this->load->model('linkage');
        $area = $this->linkage->select_linkage($member['zone'] ? $member['zone'] : 1,1,'zone');
        $this->smarty->assign('area',$area);


        $this->smarty->display('member/info.html');
    }

    /**
     * 编辑头像
     */
    function photo(){
        if(STPL=='mobile' && isset($_POST['Submit'])){
            $filename = '';
            $savePath = '';
            $w = $h = 160;
            $dir = '/upload/images/photo/';
            $photo = (isset($_POST['photo']) && !empty($_POST['photo'])) ? trim($_POST['photo']) : '';

            if($photo){
                //新上传的图片
                $savePath = RootDir . 'web/'.$photo;
                $filename = $photo;
            }else{
                exit($this->msg("请先选择图片！"));
            }
            $this->load->library('image',array('ratio'=>false));
            $this->load->model('upload');
            $this->image->load_src($savePath);

            //创建目录
            static $upDir;
            if(is_null($upDir))$upDir = $this->load->config('picture','image_dir');#保存目录
            $FullDir = $upDir.'photo'.'/';
            is_dir($FullDir)||mkdir($FullDir,0777,true);

            //获取图片信息
            $epos = strrpos($filename,'?');
            if($epos!==false){ $filename = substr($filename,0,$epos); }
            $epos = strrpos($filename,'.');#点的位置
            $ext = strtolower(substr($filename,$epos));#扩展名
            $name = substr($filename,0,$epos);#文件名称
            $epos = strrpos($name,'/');
            if($epos!==false){ $name = substr($name,$epos+1); }

            $size = array('160','80','30');
            foreach($size as $k=>$v){
                //删除原图
                if($photo){
                    $oldPath = RootDir . 'web' . $this->memberinfo['photo'];
                    $Arr = explode('.',$oldPath);
                    if(count($Arr) == 2){
                        $this->upload->rmFile($Arr[0].'.'.$Arr[1]);
                        $this->upload->rmFile($Arr[0].'_'.$v.'.'.$Arr[1]);
                    }
                }

                //保存图片
                $path = $FullDir.$name.'_'.$v.$ext;
                $this->image->resize($v, $v, $path, false);
                $img = str_replace(RootDir.'web/upload/images','',$path);
                $this->upload->yunsave($img);
            }

            //入库
            $this->db->update("member",array('photo'=>$dir.$name.$ext),array('mid'=>MID));
			
            exit($this->msg("头像上传成功",array('icon'=>1,'url'=>'/member')));
        }
        if(!empty($_GET) && !empty($_FILES)){
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
                	$this->load->model('upload');
                	if($this->upload->checkHex($_FILES[$key]["tmp_name"])){
	                    if(is_null($upDir))$upDir = $this->load->config('picture','image_dir');#保存目录
	                    $dir = 'photo/';
	                    $upUrl = $this->load->config('picture','image_url');
	                    
	                    //保存原图
	                    if ($key == '__source')
	                    {
	                        //当前头像基于原图的初始化参数，用于修改头像时保证界面的视图跟保存头像时一致。帮助提升用户体验度。修改头像时设置默认加载的原图的url为此图片的url+该参数即可。
	                        $initParams = $_POST["__initParams"];
	                        $virtualPath = "$dir$fileName.jpg";
	                        $result['sourceUrl'] = '/upload/images/'.$virtualPath.$initParams;
	                        
	                        move_uploaded_file($_FILES[$key]["tmp_name"], $upDir.$virtualPath);
	                        //保存入库
	                        $this->db->update("member",array('photo'=>$result['sourceUrl']),array('mid'=>MID));
	                        $this->upload->yunsave("$dir$fileName.jpg",'photo');
	                        
	                        $successNum++;
	                        
	                        
	                    }
	                    //保存三张小图
	                    if (strpos($key, '__avatar') === 0)
	                    {
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
	                        $virtualPath = $dir.$fileName.'_'.$size.".jpg";
	                        $result['avatarUrls'][$i] = '/upload/images/'.$virtualPath;
	                        move_uploaded_file($_FILES[$key]["tmp_name"], $upDir.$virtualPath);
	                        $this->upload->yunsave($virtualPath,'photo');
	                        $successNum++;
	                        $i++;
	                    }
                	}else{
                		$msg .= 'error';
                	}
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
        $row['title'] = '更新头像';
        if(STPL == 'mobile'){
            $row['head'] = $row['title'];
            $this->smarty->assign('row',$row);
        }
        $this->display_before($row);
        $this->ur_here('',array(0=>array('url'=>url('/member/photo'),'name'=>$row['title'])));
        $this->smarty->display('member/photo.html');
    }

    function verifyEmail($code=''){
        $member = $this->memberinfo;
        //发送验证邮箱
        if(empty($code)){
            $reEmail = '/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
            $email = $member['email'];
            if(empty($email))exit($this->msg('您还没有绑定邮箱地址！',array('iniframe'=>false,'url'=>'/member/info')));
            if(!preg_match($reEmail,$email))exit($this->msg('邮箱格式错误',array('iniframe'=>false,'url'=>'back')));
            $row = $this->db->get("SELECT * FROM member WHERE email='".$email."' AND verify_email=1");
            if(isset($row['mid'])){
                exit($this->msg('该邮箱已被其他账号绑定,请换一个邮箱重试!',array('iniframe'=>false,'url'=>'back')));
            }
            $code = md5($email.$member['salt']);
            $validate_email = url('/member/verifyEmail/'.$code);
            $this->smarty->assign('user_name',$member['username']);
            $this->smarty->assign('validate_email',$validate_email);
            $this->load->library('mail');
            $this->mail->sendMailTpl($email,'register_validate');
            exit($this->msg('验证邮件已发送，请到您的邮箱中查看!',array('iniframe'=>false,'url'=>'back','icon'=>1)));
        }else{
            //验证邮箱
            if($code!=md5($member['email'].$member['salt'])) exit($this->msg('验证链接错误',array('iniframe'=>false,'url'=>'back')));
            $this->db->update('###_member',array('verify_email'=>1),array('mid'=>$member['mid']));
            exit($this->msg('验证成功!',array('iniframe'=>false,'url'=>url(),'icon'=>1)));
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
                    array('link'=>'/content/tiyan/db','text'=>'体验免费'.$this->L['unit_yun']),
                    array('link'=>'/member#free','text'=>"做任务领".$this->L['unit_pay_points']."")
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
    function forget($type=''){
        if($_POST['Submit']){
            $username = trim($_POST['username']);
            $username2 = trim($_POST['username2']);

            if(empty($username)) exit($this->msg('请输入账户名'));
            if(empty($username2)) exit($this->msg('请输入邮箱'));

            //验证邮箱
            $reEmail = '/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
            if(!preg_match($reEmail,$username2)){
                $mobile = $username2;
                $member = $this->db->get("SELECT * FROM ###_member WHERE username = '$username' AND mobile = '$mobile'");
            }else{
                $email = $username2;
                $member = $this->db->get("SELECT * FROM ###_member WHERE username = '$username' AND email = '$email'");
            }
            if(empty($member)) exit($this->msg('暂时没有该用户信息'));
            //邮箱找回
            if($email){
                $code = md5($member['mid'].$member['salt'].$member['c_time']);
                $reset_email = url('/member/resetpass/'.$member['username'].'/'.$code);
                $this->smarty->assign('user_name',$member['username']);
                $this->smarty->assign('reset_email',$reset_email);
                $this->load->library('mail');
                $this->mail->sendMailTpl($email,'send_password');
                exit($this->msg('找回密码邮件已发送，请到您的邮箱中查看！',array('url'=>url())));
            }
        }

        if($_POST['Submit2']){
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_password')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);
                $mobile = trim($_POST['mobile']);

                $sql = "SELECT COUNT(mid) FROM ###_member WHERE mobile = '$mobile'";
                if ($this->db->getstr($sql) <= 0){
                    exit($this->msg("该手机号未注册过!"));
                }

                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=7 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0){
                    exit($this->msg("手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！"));
                }

                $_SESSION['sms_password_mobile'] = $mobile;
                $this->exeJs("top.location.href='/member/resetpass';");exit;
            }
        }

        //手机找回密码
        if($type == 'mobile'){
            #初始化并生成验证码
            $this->load->model('code');
            $this->code->html(array('gee'=>2));
        }

        $this->smarty->assign('type',$type);
        $this->smarty->assign('row',array('head'=>'密码找回'));
        $this->smarty->display('member/forget.html');
    }
    /**
     * 重置密码
     */
    function resetpass($username='',$code=''){
        if(isset($_SESSION['sms_password_mobile']) && !$username){
            $sql = "SELECT * FROM ###_member WHERE mobile = '".$_SESSION['sms_password_mobile']."'";
            $member = $this->db->get($sql);
            if(empty($member)) exit($this->msg('暂时没有该用户信息',array('iniframe'=>false)));
        }else{
            $username = addslashes($username);
            $member = $this->db->get("SELECT * FROM ###_member WHERE username = '$username'");
            if(empty($member)) exit($this->msg('暂时没有该用户信息',array('iniframe'=>false)));
            if($code != md5($member['mid'].$member['salt'].$member['c_time'])) exit($this->msg('重置密码链接无效',array('iniframe'=>false)));
        }
        if($_POST['Submit']){
            $this->load->model('member');
            $pass1 = $_POST['password'];
            $pass2 = $_POST['confirm_password'];
            if(empty($pass1))exit($this->msg('密码不能为空'));
            if($pass1!=$pass2)exit($this->msg('两次密码不一致'));
            $setPass = $this->member->get_salt_hash($pass1,$member['salt']);
            $this->db->update('member',array('password'=>$setPass),array('mid'=>$member['mid']));
            if(isset($_SESSION['sms_password_mobile'])){
                unset($_SESSION['sms_password_mobile']);
            }
            exit($this->msg('重置成功',array('icon'=>1,'url'=>url())));
        }
        $this->smarty->assign('row',array('head'=>'密码重置'));
        $this->smarty->display('member/resetpass.html');
    }
    /**
     * 登录页
     */
    function login(){
        if(STPL == 'mobile'){
            $row['head'] = '会员登录';
            $this->smarty->assign('row',$row);
        }

        #初始化并生成验证码
        $this->load->model('code');
        $this->code->html(array('gee'=>2,'open'=>0));

        $back_url = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_GET['back'];
        $this->smarty->assign('back_url',$back_url);
        $this->smarty->display('member/login.html');
    }

    /**
     * 注册页
     */
    function regist($username=''){
        #初始化并生成验证码
        $this->load->model('code');
        $this->code->html(array('gee'=>1));

        if(empty($_SESSION['oauth']['nickname'])) unset($_SESSION['oauth']);
        if($username) zzcookie('ivt_member',stripcslashes(trim($username)));
        $this->smarty->assign('ivt_member',$_COOKIE['ivt_member']?$_COOKIE['ivt_member']:$username);

        $back_url = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_GET['back'];
        $this->smarty->assign('back_url',$back_url);

        $this->smarty->assign('row',array('head'=>'会员注册'));
    	if($this->site_config['regist_status']==1){
        	$this->smarty->display('member/regist_new.html');
        }else{
        	$this->smarty->display('member/regist.html');
        }
    }

    /*
     * 注册程序
     */
    function submit() {
        //微信用户被禁止时
        $openid = isset($_SESSION['oauth']['openid']) ? trim($_SESSION['oauth']['openid']) : '';
        $unionid = isset($_SESSION['oauth']['unionid']) ? trim($_SESSION['oauth']['unionid']) : '';
        if($openid || $unionid){
            $sql = "SELECT * FROM member WHERE openid='".$openid."'";
            if($unionid){
                $sql = "SELECT * FROM member WHERE (unionid='".$unionid."' || openid = '".$openid."')";
            }
            $member = $this->db->get($sql);
            if(!empty($member) && !$member['status']){
                die(json_encode(array('error'=>1,'msg'=>'此微信帐户已被封，如有疑问，请咨询网站客服人员！')));
            }
        }

        $step = intval($_POST['step']);

        $this->load->model('member');
        $username = empty($_POST['username']) ? '' : trim($_POST['username']);
        $password = empty($_POST['password']) ? '' : trim($_POST['password']);
        $password2 = empty($_POST['confirm_password']) ? '' : trim($_POST['confirm_password']);
        $mobile = '';
        $email = '';

        //第三方登录
        if(!empty($_SESSION['oauth'])){
            //$username = $_SESSION['oauth']['nickname'];
            //$password2 = $password = $_SESSION['oauth']['oauth_login'] + mt_rand(10-999);

            if(empty($username)){
                die(json_encode(array('error'=>1,'msg'=>'请填写用户名称！')));
            }

            $r = $this->db->get("SELECT username FROM member WHERE username = '$username'");
            if($r){ die(json_encode(array('error'=>1,'msg'=>'用户名已经存在，请更换！'))); }
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

        //第一步提交
        if($step == 1){
            //同IP限制*时间内不能重复注册
            //$r = $this->db->get("SELECT mid FROM member WHERE ip='".getIP()."' AND c_time>'".strtotime("-5 minute")."'");
            //if($r) die(json_encode(array('error'=>1,'msg'=>'请不要注册太快，离上次注册需要等待5分钟！')));

            die(json_encode(array('error'=>0,'mobile'=>$mobile)));
        }
        //第二步提交
        elseif($step == 2){

            #检查验证码
            if(STPL == ''){
                $this->load->model('code');
                $res = $this->code->check();
                IF($res['code'] != 0){
                    die(json_encode(array('error'=>1,'msg'=>$res['msg'])));
                }
            }

            $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : trim($_POST['username']);
            if(is_mobile($mobile)){
                $r = $this->db->get("SELECT username FROM member WHERE mobile='$mobile'");
                if($r){ die(json_encode(array('error'=>1,'msg'=>'该手机已经存在，请更换！'))); }
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
                    die(json_encode(array('error'=>1,'msg'=>'手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！')));
                }
            }

            $input['username'] = $username;
            $input['password'] = $password;
            $input['email'] = $email;
            $input['mobile'] = $mobile;
            $input['oauth_login'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['oauth_login'] : '';
            $input['nickname'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['nickname'] : '';
            $input['photo'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['headimgurl'] : '';
            $input['openid'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['openid'] : '';
            $input['unionid'] = !empty($_SESSION['oauth']) ? $_SESSION['oauth']['unionid'] : '';
            $input['sex'] = 1;
            $input['birthday'] = '0000-00-00';
            if(!empty($_SESSION['voiceVerify'])) $input['is_voice'] = 1;
            $input['verify_mobile'] = 1;

            $ivt_member = cookie('ivt_member');
            if($ivt_member){
                $r = $this->db->get("SELECT `mid` FROM `member` WHERE `mid` = '".trim($ivt_member)."'");
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
                die(json_encode(array('error'=>0)));
            } else {
                die(json_encode(array('error'=>1,'msg'=>'注册失败，请重新提交！')));
            }
        }
        exit(0);
    }

    /**
     *  注册成功
     */
    function reg_success(){
        $link = array();
        $link[] = array('text'=>'完善会员资料','link'=>url('/member/info'));
        $link[] = array('text'=>"免费领取".$this->L['unit_pay_points']."",'link'=>url('/content/tiyan'));
        exit($this->msg('注册成功',array('link'=>$link,'iniframe'=>false,'icon'=>1)));
    }

    function index(){
        $this->load->model('auction');
        $this->load->model('yunbuy');

        if($this->site_config['index_skin'] != 2){

            #竞拍中奖未领取数量
            $data['count_cod'] = $this->auction->logList(0,1,0,MID,OKWIN);
            #竞拍成功未领取数量
            $data['count_auc'] = $this->auction->getList(0,1,0,FINISHED,array(
                'mid'=>MID
            ));
            #夺宝中奖未下单记录
            $sql = "SELECT COUNT(id) FROM ###_yundb WHERE mid=".MID." AND status=3 AND is_award!=1";
            $data['count_codDb'] = $this->db->getstr($sql);

            #我的夺宝
            $size = 8;
            $sql = "select * from ###_yundb where status <> 1 AND mid='".MID."' GROUP BY buy_id ORDER BY db_time DESC LIMIT $size";
            $list = $this->db->select($sql);
            $list = $this->db->lJoin($list,'yunbuy','buy_id,goods_id,need_num,buy_num,end_num,custom_price,goods_price,thumb,thumbs','buy_id','buy_id');
            $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
            foreach($list as $k=>$v){
                $v = $this->yunbuy->getThumb($v);
                $list[$k] = $v;
            }
            $data['mydb'] = $list;

            #我的竞拍
            $size = 4;
            $data['my'] = $this->auction->getList($size,1,0,'',array('order'=>'a.act_id DESC','mid'=>MID,'imgw'=>205,'imgh'=>127,'key'=>'my'));

            #猜你喜欢
            if(count($data['mydb'])<8){
                $size = 8;
                $sql = "select * from ###_yundb where status <> 1 AND mid='".MID."' GROUP BY buy_id ORDER BY rand() LIMIT $size";
                $list = $this->db->select($sql);
                $list = $this->db->lJoin($list,'yunbuy','buy_id,goods_id,need_num,buy_num,end_num,custom_price,goods_price,thumb,thumbs','buy_id','buy_id');
                $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
                foreach($list as $k=>$v){
                    $v = $this->yunbuy->getThumb($v);
                    $list[$k] = $v;
                }
                $data['love'] = $list;
            }
        }

        //判断是否开启任务赚拍币
        $data['isfree'] = 0;
        $c = $this->site_config;
        if($c['isPhoto']>0||$c['isVoice']>0||$c['isIdcard']>0||$c['isMail']>0||$c['isDaren']>0||$c['isJpDaren']>0||$c['signin_jl']>0||$c['ivt1']>0){
            $data['isfree'] = 1;
        }

        //判断是否领取
        $data['memberOther'] = $this->db->get("SELECT * FROM ###_member_other WHERE mid='".MID."'");

        if(STPL == 'mobile'){
            $row['head'] = '会员中心';
            $this->smarty->assign('row',$row);
        }

        $this->smarty->assign('data',$data);
        $this->smarty->assign('nav','index');
        $this->smarty->display('member/index.html');
    }


    /**
     * 修改密码
     */
    function chpass(){
        if($_POST['Submit']){
            $oldPass = $_POST['oldpass'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if($pass1!=$pass2)exit($this->msg('两次密码不一致'));
            $mid = $this->member->alter_pass($oldPass,$pass2,MID);
            if($mid==-1){
                exit($this->msg('用户不存在'));
            }elseif($mid==-2 && $this->is_wechat != 1){
                exit($this->msg('原密码错误'.$this->is_wechat));
            }else{
                $this->member->logout();
                exit($this->msg('保存成功',array('icon'=>1,'url'=>url('/member/login'))));
            }
        }else{
            header('Location:/member/info');
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
            if($pass1!=$pass2)exit(exit($this->msg('两次密码不一致')));
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_chpaypass')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);
                $mobile = $this->memberinfo['mobile'];
                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=5 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0)
                {
                    exit($this->msg("手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！"));
                }
            }
            $paypass = $this->member->get_salt_hash($pass2,$this->memberinfo['salt']);
            $this->db->update('member',array('pay_password'=>$paypass),array('mid'=>MID));

            exit($this->msg('保存成功',array('icon'=>1)));
        }

        if(STPL == 'mobile'){
            $row['head'] = '修改支付密码';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->assign('nav','chpaypass');
        $this->smarty->display('member/chpaypass.html');
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
            $v['stage_title'] = $this->member->stages($v['stage']);
            $list[$k] = $v;
        }

        //第三方支付统计
        $data['amount_in'] = $this->db->getstr("SELECT SUM(amount) FROM ###_account_log WHERE mid = '".MID."' AND amount > 0");
        //余额收支统计
        $data['user_money_in'] = $this->db->getstr("SELECT SUM(user_money) FROM ###_account_log WHERE mid = '".MID."' AND user_money > 0");
        $data['user_money_out'] = $this->db->getstr("SELECT SUM(user_money) FROM ###_account_log WHERE mid = '".MID."' AND user_money < 0");
        //夺宝币收支统计
        $data['db_points_in'] = $this->db->getstr("SELECT SUM(db_points) FROM ###_account_log WHERE mid = '".MID."' AND db_points > 0");
        $data['db_points_out'] = $this->db->getstr("SELECT SUM(db_points) FROM ###_account_log WHERE mid = '".MID."' AND db_points < 0");
        //拍币收支统计
        $data['pay_points_in'] = $this->db->getstr("SELECT SUM(pay_points) FROM ###_account_log WHERE mid = '".MID."' AND pay_points > 0");
        $data['pay_points_out'] = $this->db->getstr("SELECT SUM(pay_points) FROM ###_account_log WHERE mid = '".MID."' AND pay_points < 0");

        if(STPL == 'mobile'){
            $row['head'] = '资金管理';
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_accountdetail.html'));
                }
                die(json_encode($array));
            }
        }
        $this->smarty->assign('list',$list);
        $this->smarty->assign('data',$data);
        $this->smarty->assign('nav','account');
        $this->smarty->display('member/accountdetail.html');
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
        $list = $this->page->hashQuery("SELECT * FROM member_account WHERE `mid` = '".MID."'$where ORDER BY id DESC")->result_array();

        if(STPL == 'mobile'){
            $row['head'] = '资金管理';
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_accountlog.html'));
                }
                die(json_encode($array));
            }
        }
        $this->smarty->assign('list',$list);
        $this->smarty->assign('nav','account');
        $this->smarty->display('member/accountlog.html');
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
            $input['desc'] = '取消账户提现,解冻'.$this->L['unit_baozheng'];
            $this->member->accountlog('withdraw',$input);

            if($row['fee']>0){
                $update['fee'] = 0;
                $update['amount'] = $row['amount']+$row['fee'];
            }
        }
        $this->db->update('member_account',$update,array('id'=>intval($id)));
        exit($this->msg('取消成功',array('iniframe'=>false,'url'=>url('/member/accountlog'))));
    }
    /**
     * 充值
     */
    function recchage(){
        $this->load->model('payment');
        $where = " AND pay_code <> 'gotopay'";
        $payment = $this->payment->getPayment("enabled = '1' AND is_cod <> '1' AND pay_code <>'balance' $where");
        if(empty($payment)) exit($this->msg('暂时没有可用支付方式，无法充值',array('iniframe'=>false,'url'=>'back')));
        if($_POST['Submit']){

            //exit($this->msg("充值接口调整升级中，如急需充值可联系客服 QQ:200676009 电话:400-0901-225。给您带来不便敬请谅解！",array('iniframe'=>false,'url'=>'back')));
            $payid=0;
	    $pay_id = intval($_POST['pay_id']);
	    if($pay_id==99){
	        $pay_id=15;
		$payid=99;
	    }
            $amount = intval($_POST['amount']);
            $order = array();

            #选择了银行时，使用易宝直连
            if(isset($_POST['bank']) && trim($_POST['bank'])!=''){
                $pay_id = 5;
                $order['bank'] = $_POST['bank'];
            }
            #使用自定义的金额
            if(floatval($_POST['other'])>0){
                $amount = floatval($_POST['other']);
            }

            #选择付款方式（天工）
            if(isset($_POST['payment_type']) && trim($_POST['payment_type'])!=''){
                $order['payment_type'] = $_POST['payment_type'];
            }

            if(ceil($amount)!=$amount) exit($this->msg('请输入的充值金额须整数',array('iniframe'=>false,'url'=>'/member/recchage')));
            if(empty($pay_id)) exit($this->msg('请选择支付方式',array('iniframe'=>false,'url'=>'/member/recchage')));
            if(empty($amount)) exit($this->msg('请输入正确的充值金额',array('iniframe'=>false,'url'=>'/member/recchage')));
            //if($amount<10) exit($this->msg('充值金额不能小于10元',array('iniframe'=>false,'url'=>'back')));

            //验证支付方式
            $payment_info = $this->payment->payment_info($pay_id);
            if(empty($payment_info) || $payment_info['enabled']!=1 || $payment_info['is_online']!=1)  exit($this->msg('支付方式不可用,请重新选择'));
            //跳转支付
//            if(in_array($payment_info['pay_code'],array('alipay','wxpay'))){
//                $order['pay_code'] = $payment_info['pay_code'];
//                $oldpayment = $payment_info;
//                $payment_info = $this->db->get("SELECT * FROM ###_payment WHERE pay_code = 'gotopay'");
//                $payment_info['pay_name'] = $oldpayment['pay_name'];
//            }
            $input = array();
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['amount'] = $amount;
            $input['add_time'] = RUN_TIME;
            $input['pay_id'] = $pay_id;
            $input['pay_name'] = $payment_info['pay_name'];
            $input['pay_code'] = $payment_info['pay_code'];
            $input['type'] = 1;
            $input['status'] = 1;
            $this->member->member_account_save($input);
            $id = $this->db->insert_id();

            //取得支付信息，生成支付代码
            $payment = unserialize_config($payment_info['pay_config']);

            $order['order_sn'] = 'R'.$id;
            $order['surplus_amount'] = $amount;
            //计算支付手续费用
            $payment_info['pay_fee'] = $this->payment->pay_fee($pay_id, $amount);
            $order['order_amount'] = $amount + $payment_info['pay_fee'];
            $order['log_id'] = $this->payment->pay_log_save(array('order_id'=>$id,'order_amount'=>$amount,'order_type'=>PAY_SURPLUS,'is_paid'=>PS_UNPAYED));
			$order['mid'] = MID;
            
            /* 调用相应的支付方式文件 */
            include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
            /* 取得在线支付方式的支付按钮 */
            $pay_obj = new $payment_info['pay_code'];
	    if($payid!=99){
                $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);
	    }else{
	    	$payment_info['pay_button'] = $pay_obj->get_codesm($order,$payment);
	    }
            if(STPL == 'mobile'){
                $row['head'] = '充值';
                $this->smarty->assign('row',$row);
            }
            $this->smarty->assign('order',$order);
            $this->smarty->assign('payment_info',$payment_info);
            $this->smarty->display('member/pay.html');
	    die;
        }
        
        if($_GET['Submit']&&STPL == 'mobile'){
        
            //exit($this->msg("充值接口调整升级中，如急需充值可联系客服 QQ:200676009 电话:400-0901-225。给您带来不便敬请谅解！",array('iniframe'=>false,'url'=>'back')));
            $payid=0;
	    $pay_id = intval($_GET['pay_id']);
            if($pay_id==99){
		$payid=99;
	        $pay_id=15;
	    }
	    $amount = intval($_GET['amount']);
            $order = array();
        
            #选择了银行时，使用易宝直连
            if(isset($_GET['bank']) && trim($_GET['bank'])!=''){
                $pay_id = 5;
                $order['bank'] = $_GET['bank'];
            }
            #使用自定义的金额
            if(floatval($_GET['other'])>0){
                $amount = floatval($_GET['other']);
            }
        
            #选择付款方式（天工）
            if(isset($_GET['payment_type']) && trim($_GET['payment_type'])!=''){
                $order['payment_type'] = $_GET['payment_type'];
            }
        
            if(ceil($amount)!=$amount) exit($this->msg('请输入的充值金额须整数',array('iniframe'=>false,'url'=>'/member/recchage')));
            if(empty($pay_id)) exit($this->msg('请选择支付方式',array('iniframe'=>false,'url'=>'/member/recchage')));
            if(empty($amount)) exit($this->msg('请输入正确的充值金额',array('iniframe'=>false,'url'=>'/member/recchage')));
            //if($amount<10) exit($this->msg('充值金额不能小于10元',array('iniframe'=>false,'url'=>'back')));
        
            //验证支付方式
            $payment_info = $this->payment->payment_info($pay_id);
            if(empty($payment_info) || $payment_info['enabled']!=1 || $payment_info['is_online']!=1)  exit($this->msg('支付方式不可用,请重新选择'));
            //跳转支付
            //            if(in_array($payment_info['pay_code'],array('alipay','wxpay'))){
            //                $order['pay_code'] = $payment_info['pay_code'];
            //                $oldpayment = $payment_info;
            //                $payment_info = $this->db->get("SELECT * FROM ###_payment WHERE pay_code = 'gotopay'");
            //                $payment_info['pay_name'] = $oldpayment['pay_name'];
            //            }
            $input = array();
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['amount'] = $amount;
            $input['add_time'] = RUN_TIME;
            $input['pay_id'] = $pay_id;
            $input['pay_name'] = $payment_info['pay_name'];
            $input['pay_code'] = $payment_info['pay_code'];
            $input['type'] = 1;
            $input['status'] = 1;
            $this->member->member_account_save($input);
            $id = $this->db->insert_id();
        
            //取得支付信息，生成支付代码
            $payment = unserialize_config($payment_info['pay_config']);
        
            $order['order_sn'] = 'R'.$id;
            $order['surplus_amount'] = $amount;
            //计算支付手续费用
            $payment_info['pay_fee'] = $this->payment->pay_fee($pay_id, $amount);
            $order['order_amount'] = $amount + $payment_info['pay_fee'];
            $order['log_id'] = $this->payment->pay_log_save(array('order_id'=>$id,'order_amount'=>$amount,'order_type'=>PAY_SURPLUS,'is_paid'=>PS_UNPAYED));
            $order['mid'] = MID;
        
            /* 调用相应的支付方式文件 */
            include_once(AppDir . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');
            /* 取得在线支付方式的支付按钮 */
            $pay_obj = new $payment_info['pay_code'];
	    if($payid!=99){
                $payment_info['pay_button'] = $pay_obj->get_code($order, $payment);
            }else{
		$payment_info['pay_button'] = $pay_obj->get_codesm($order,$payment);
		$payment_info['pay_name'] = '扫码支付';
	    }
            if(STPL == 'mobile'){
                $row['head'] = '充值';
                $this->smarty->assign('row',$row);
            }
            $this->smarty->assign('order',$order);
            $this->smarty->assign('payment_info',$payment_info);
            $this->smarty->display('member/pay.html');
            die;
        }
        
        
        
        $config = $this->setting->value_other();
        $this->smarty->assign('rc_open', isset($config['rc_open']) ? $config['rc_open'] : 0);

        if(STPL == 'mobile'){
            $row['head'] = '资金管理';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->assign('list',$payment);
        $this->smarty->assign('nav','account');
        $this->smarty->display('member/rechage.html');
    }

    /**
     * 充值卡充值
     */
    function rechage_card(){
        $config = $this->setting->value_other();
        $rc_open = isset($config['rc_open']) ? $config['rc_open'] : 0;

        //充值卡功能是否开启
        if(!$rc_open){ $this->msg(); }

        if($_POST['Submit']){
            //接受POST
            $number = trim($_POST['number']);
            $password = trim($_POST['password']);
            $scode = trim($_POST['scode']);

            //POST验证
            if(!$number){ exit($this->msg('请输入卡号！')); }
            if(!$password){ exit($this->msg('请输入卡密！')); }

            //验证码验证
            if(strtolower($scode) != strtolower($_SESSION['icode'])){ exit($this->msg('验证码错误！',array('url'=>'reload'))); }

            //token验证
            if (!checkToken()) { exit($this->msg('请不要重复提交！',array('url'=>'reload'))); }

            //卡号卡密验证
            $this->load->model('recharge_card');
            $data = $this->recharge_card->check_status(array(
                'number'   => $number,
                'password' => $password,
            ));
            if($data['error'] > 0){
                exit($this->msg($data['error_text'],array('url'=>'reload')));
            }

            //充值入账户
            $row = $this->recharge_card->get(array('vr_number'=>$number),'vr_money,vr_type');
            $pay_log = array(
                'mid' => MID,
                'desc'=>'充值卡充值',
            );
            if($row['vr_type'] == 1){
                $pay_log['user_money'] = $row['vr_money'];
            }elseif($row['vr_type'] == 2){
                $pay_log['db_points'] = $row['vr_money'];
            }else{
                exit($this->msg('异常错误',array('url'=>'reload')));
            }
            $this->member->accountlog(ACT_CARD, $pay_log);

            //更新充值卡消费状态
            $this->db->save($this->recharge_card->baseTable,array(
                'vr_status'   => 1,
                'vr_time_use' => time(),
                'mid'         => MID,
                'username'    => $this->memberinfo['username'],
            ),'',array('vr_number'=>$number));

            $this->msg('充值成功',array('icon'=>1,'url'=>'reload'));die;
        }

        $row = array('title'=>'充值卡充值');
        $this->display_before($row);
        if(STPL == 'mobile'){
            $row['head'] = $row['title'];
            $this->smarty->assign('row',$row);
        }

        $this->smarty->assign('nav','rechage_card');
        $this->smarty->display('member/rechage_card.html');
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
        $order['order_sn'] = 'R'.$id;
        $order['surplus_amount'] = $rechage['amount'];
        //计算支付手续费用
        $payment_info['pay_fee'] = $this->payment->pay_fee($rechage['pay_id'], $rechage['amount']);
        $order['order_amount'] = $rechage['amount'] + $payment_info['pay_fee'];
        $pay_log =  $this->db->get("SELECT * FROM ###_pay_log WHERE order_id = '$id' AND order_type = '".PAY_SURPLUS."'");
        $order['log_id'] = $pay_log['log_id'];
        $order['mid'] = MID;

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
        $this->smarty->assign('wx_config_false',1);
        $this->smarty->display('member/pay.html');
    }
    /**
     * 提现
     */
    function withdraw(){ #die;
        $member = $this->memberinfo;
        if(empty($member['realname'])) exit($this->msg('请先进行实名认证',array('iniframe'=>false,'url'=>url('/member/verifyidcard'))));
        $bankcard = $this->member->bankcard(MID);
        if(empty($bankcard)) exit($this->msg('请先绑定银行卡',array('iniframe'=>false,'url'=>url('/member/bankcard'))));

        #提现需要最后一次充值后有余额消费记录
        $sql = "select add_time from ###_member_account where mid='".MID."' and type=1 and status=2 and amount>0";
        $last_time = $this->db->getstr($sql);
        if($last_time){
            $sql = "select count(*) from ###_account_log where mid='".MID."' and logtime>'$last_time' and user_money<0";
            $count_log = $this->db->getstr($sql);
            if(!$count_log){ exit($this->msg('抱歉，您最后一次充值后没有余额消费记录，暂时无法申请提现',array('iniframe'=>false))); }
        }

        #获取提现手续费列表
        $feeList = $this->base->explodeChar($this->site_config['withdraw_fee']);
        $this->smarty->assign('feelist', $feeList);

        if($_POST['Submit']){
            $pay_id = intval($_POST['id']);
            $gotime = isset($_POST['gotime'])?trim($_POST['gotime']):'';
            $bankcard = $this->db->get("SELECT * FROM ###_member_bankcard WHERE mid = '".MID."' AND id = '$pay_id'");
            if(empty($bankcard)) exit($this->msg('您选择的银行卡不存在，请重新选择'));
            $amount = floatval($_POST['amount']);
            if(empty($amount)) exit($this->msg('请输入正确的提现金额'));
            if($amount<50) exit($this->msg('最小提现金额为50，请修改'));
            if($amount>$member['user_money']) exit($this->msg('提现金额超过了您的账户可用金额'.$member['user_money']));
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
                $input['desc'] = '账户提现,冻结'.$this->L['unit_baozheng'];
                $this->member->accountlog('withdraw',$input);
            }
            exit($this->msg('申请成功,我们将尽快为您处理！',array('url'=>url('/member/accountlog'))));
        }

        if(STPL == 'mobile'){
            $row['head'] = '资金管理';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->assign('list',$bankcard);
        $this->smarty->assign('nav','account');
        $this->smarty->display('member/withdraw.html');
    }

    /**
     * 账户安全
     */
    function safe(){
        $this->smarty->assign('nav','safe');
        $member = $this->memberinfo;
        $mobile_salt = substr(trim($member['mobile']),-6);
        $member['mobile'] = substr($member['mobile'],0,-3).'***';
        $this->smarty->assign('member',$member);

        //判断资金密码是否有修改
        $is_mobile = false;
        //$mobile_salt = substr(trim($member['mobile']),-6);
        $mobile_salt = $this->member->get_salt_hash($mobile_salt, $member['salt']);
        if($mobile_salt != $member['pay_password']){
            $is_mobile = true;
        }
        $this->smarty->assign('is_mobile',$is_mobile);

        //判断是否绑定银行卡
        $bankcard = $this->member->bankcard(MID);
        $this->smarty->assign('is_banks',count($bankcard));

        //判断是否绑定收货地址
        $address = $this->member->member_address(MID);
        $this->smarty->assign('is_address',count($address));

        if(STPL == 'mobile'){
            $row['head'] = '帐户安全';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->display('member/safe.html');
    }

    /**
     * 实名认证
     */
    function verifyidcard(){
        $verify = $this->db->get("SELECT * FROM verify_idcard WHERE mid='".MID."' ORDER BY id DESC");
        $this->smarty->assign('verify',$verify);
        //先进行语音认证
        //if($this->memberinfo['is_voice']!=1) exit($this->msg('请先进行语音认证',array('iniframe'=>false,'url'=>url('/member/verifyvoice'))));
        if($_POST['Submit']){
            if(empty($_POST['realname'])) exit($this->msg('请输入真实姓名'));
            if(empty($_POST['card'])) exit($this->msg('请输入身份证号'));
            if(empty($_POST['idcard'])) exit($this->msg('请上传身份证正面照'));
            if(empty($_POST['idcard2'])) exit($this->msg('请上传身份证反面照'));
            $realname = trim($_POST['realname']);
            $card= trim($_POST['card']);
            //检验唯一性
            $has_idcard = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_member WHERE idcard = '$card'");
            $has_verify = $this->db->getstr("SELECT COUNT(*) AS count FROM ###_verify_idcard WHERE card = '$card' AND realname = '$realname' AND status = 1");
            if(!empty($has_idcard) || !empty($has_verify)) exit($this->msg('您的证件已验证过，请使用其他证件'));
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_idcard')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);
                $mobile = $this->memberinfo['mobile'];
                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=3 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0)
                {
                    exit($this->msg("手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！"));
                }
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
            exit($this->msg('提交成功,我们会尽快处理您的验证。',array('icon'=>1,'url'=>url('/member/verifyidcard'))));
        }

        if(STPL == 'mobile'){
            $row['head'] = '实名认证';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->display('member/verifyidcard.html');
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

    /**
     * 验证手机
     */
    function verifymobile(){
        //是否授权
        $oauth = (isset($_SESSION['oauth']) && !empty($_SESSION['oauth'])) ? $_SESSION['oauth'] : 0;
        $isLogin = $_SESSION['mid'] ? 1 : 0;
        $this->load->model('member');
        if($isLogin){
            $sql = "select * from ###_member where mid='".$_SESSION['mid']."'";
            if(!$this->db->get($sql)){
                $isLogin = 0;
            }
        }

        if($_POST['Submit']){
            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_verifymobile')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);
                $mobile = trim($_POST['mobile']);

                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=6 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0) {
                    exit($this->msg("手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！"));
                }

                $sql = "select * from ###_member where mobile='".$mobile."'";
                $member = $this->db->get($sql);

                //会员要更新的字段
                $post['mobile'] = $mobile;
                $post['verify_mobile'] = 1;
                $post['is_voice'] = 1;

                //已登录
                if($isLogin){
                    if($member['mid']==$_SESSION['mid'] && $post['verify_mobile']==1){
                        exit($this->msg("您已经绑定该手机号！"));
                    }
                    if($member['mid']!=$_SESSION['mid'] && $member['mid']){
                        exit($this->msg("该手机号已经被使用，请更换！"));
                    }
                    $this->db->update("###_member",$post,array('mid'=>$_SESSION['mid']));
                }
                //未登录
                else{
                    $is_oauth = false;

                    if(isset($oauth['headimgurl']) && !empty($oauth['headimgurl'])){
                        $post['photo'] = $oauth['headimgurl'];
                    }
                    if(isset($oauth['nickname']) && !empty($oauth['nickname'])){
                        $post['nickname'] = $oauth['nickname'];
                    }
                    if(isset($oauth['openid']) && !empty($oauth['openid'])){
                        $post['openid'] = $oauth['openid'];
                        $is_oauth = true;
                    }
                    if(isset($oauth['unionid']) && !empty($oauth['unionid'])){
                        $post['unionid'] = $oauth['unionid'];
                        $is_oauth = true;
                    }
                    if(isset($oauth['oauth_login']) && !empty($oauth['oauth_login'])){
                        $post['oauth_login'] = $oauth['oauth_login'];
                        $is_oauth = true;
                    }

                    if(!$is_oauth){
                        exit($this->msg("手机验证失败（请先登陆）！"));
                    }

                    //手机帐号存在
                    if($member['mid']){
                        //绑定第三方帐号
                        $this->db->update("###_member",$post,array('mid'=>$member['mid']));
                    }
                    //手机帐号不存在
                    else{
                        $post['username'] = isset($post['nickname']) ? $post['nickname'] : '';
                        $post['c_time'] = RUN_TIME;
                        $post['lastlogin'] = RUN_TIME;

                        //验证用户名
                        if(!$post['username']){
                            exit($this->msg("授权注册失败，未获取到第三方用户名！"));
                        }

                        //重名处理
                        if($this->member->check_username($post['username'])) {
                            $post['username'] = $post['username'].'_'.rand(10000,99999);
                        }

                        //邀请人处理
                        $ivt_member = cookie('ivt_member');
                        if($ivt_member){
                            $r = $this->db->get("SELECT `mid` FROM `member` WHERE `mid`='".trim($ivt_member)."'");
                            if(isset($r['mid'])){
                                $post['ivt_id'] = $r['mid'];
                                $this->db->update('member',"ivt_count=ivt_count+1",array('mid'=>$r['mid']));
                            }
                        }

                        $mid = $this->db->insert('member',$post);
                        $member = $this->db->get("SELECT * FROM member WHERE mid='".$mid."'");
                        $this->member->regGive($mid);
                    }

                    //清空授权
                    if(isset($_SESSION['oauth'])){
                        unset($_SESSION['oauth']);
                    }

                    //登陆
                    if(!$isLogin){
                        $this->member->setLogin($member);
                    }
                }

                exit($this->msg('绑定成功',array('icon'=>1,'url'=>url())));
                die;
            }
        }

        #初始化并生成验证码
        $this->load->model('code');
        $this->code->html(array('gee'=>2));

        $row['title'] = '绑定手机号码';
        if(STPL == 'mobile'){
            $row['head'] = $row['title'];
            $this->smarty->assign('row',$row);
        }
        $this->display_before($row);
        $this->ur_here('',array(0=>array('url'=>url('/member/verifymobile'),'name'=>$row['title'])));
        $this->smarty->display('member/verifymobile.html');
    }

    /**
     * 收货地址
     */
    function address($id=''){
        if($_POST['Submit']){
            $input = array();
            $input['id'] = intval($_POST['id']);
            $input['mid'] = MID;
            $input['username'] = USER;
            $input['name'] = trim($_POST['name']);
            $input['address'] = trim($_POST['address']);
            $input['zip'] = trim($_POST['zip']);
            $input['mobile'] = trim($_POST['mobile'])?trim($_POST['mobile']):trim($this->memberinfo['mobile']);
            $input['zone'] = !empty($_POST['zone']) ? end($_POST['zone']) : '';
            $this->load->Model('linkage');
            $input['area'] = $input['zone'] ? $this->linkage->pos_linkage($input['zone'],false) : '';
            $input['area'] = str_replace('>','',$input['area']);
            $input['is_default'] = $_POST['is_default'] ? 1 : 0;

            if(empty($input['name'])) exit($this->msg('请输入收件人'));
            if(empty($input['mobile'])) exit($this->msg('请输入手机号码'));
            if(empty($input['zone'])) exit($this->msg('请完善所在地区'));
            if(empty($input['address'])) exit($this->msg('请输入详细地址'));

            //清空默认
            if($_POST['is_default']){
                $this->db->update('member_address',array('is_default'=>0),array('mid'=>MID));
            }
            $res = $this->member->member_address_save($input);

            $address_id = $input['id']?$input['id']:$res;
            $char = (isset($_REQUEST['back']) && strpos($_REQUEST['back'],'?')!==false) ? '&' : '?';
            $url = $_REQUEST['back']?(trim($_REQUEST['back']).$char.'address_id='.$address_id):'/member/address';
            exit($this->msg('保存成功',array('icon'=>1,'url'=>url($url))));
        }
        if($id){
            $row = $this->db->get("SELECT * FROM member_address WHERE id = '$id'");
            if($row['mid']!=$_SESSION['mid']) exit($this->msg('数据不存在',array('iniframe'=>false,'url'=>'back')));
        }else{
            $row['zone'] = 1;
        }

        if(STPL == 'mobile'){
            $row['head'] = '收货地址';
        }

        $this->smarty->assign('row',$row);
        $address = $this->member->member_address(MID);
        $this->smarty->assign('address',$address);
        $this->smarty->assign('nav','address');
        $this->smarty->display('member/address.html');
    }
    function address_del($id){
        $address_mid = $this->db->getstr("SELECT mid FROM ###_member_address WHERE id = '$id'");
        if($address_mid!=$_SESSION['mid']) exit($this->msg('暂无操作权限',array('iniframe'=>false,'url'=>'back')));
        $url = $_GET['back']?'/member/address?'.trim($_GET['back']):'/member/address';
        $this->db->delete('member_address',array('id'=>intval($id)));
        exit($this->msg('删除成功',array('iniframe'=>false,'url'=>url($url))));
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
    /**
     * 未读站内信
     */
    function ajax_message_read(){
        $to_mid = MID;
        $to_username = USER;
        $num = $this->db->getstr("select count(*) num from ###_msg where to_mid = '$to_mid' and to_username = '$to_username' and status=0");
        echo json_encode(array('num'=>$num));
    }
    /**
     * 设为已读状态
     * @param  $id
     */
    function message_read($id){
        $this->db->update('###_msg',array('status'=>1),array('id'=>$id));
        exit($this->msg('成功标为已读',array('iniframe'=>false,'icon'=>1,'url'=>url('/member/message'))));
    }
    
    function message_del($id){
        $msg_mid = $this->db->getstr("SELECT mid FROM ###_msg WHERE id = '$id'");
        if($msg_mid!=$_SESSION['mid']) exit($this->msg('暂无操作权限',array('iniframe'=>false,'url'=>'back')));
        $this->db->delete('msg',array('id'=>intval($id)));
        $this->db->delete('msg',array('parent_id'=>intval($id)));
        exit($this->msg('删除成功',array('iniframe'=>false,'url'=>url('/member/message'))));
    }

/**
     * 判断是否登录
     */
    function ajax_islogin(){
        $isLogin = isset($_SESSION['mid']);
        echo json_encode(array('is_login'=>$isLogin)); 
    }


    /**
     * 银行卡管理
     */
    function bankcard($id=''){
        $member = $this->memberinfo;
        $this->smarty->assign('member',$member);
        if(empty($member['realname'])) exit($this->msg('绑定银行卡前请先进行实名认证',array('iniframe'=>false,'url'=>url('/member/verifyidcard'))));
        if($_POST['Submit']){
            if(empty($_POST['bankname'])) exit($this->msg('请输入银行名称'));
            if(empty($_POST['bankcard'])) exit($this->msg('请输入银行卡号'));
            if(empty($_POST['bankaddress'])) exit($this->msg('请输入开户行'));

            //短信验证码
            if($this->site_config['sms_open']==1 && statusTpl('sms_bankcard')){
                $this->load->library('sms');
                $verifycode = empty($_POST['sms_code']) ? '' : trim($_POST['sms_code']);

                $mobile = $this->memberinfo['mobile'];

                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=4 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0)
                {
                    exit($this->msg("手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！"));
                }
            }

            $input = array();
            $input['id'] = $id ? intval($id) : 0;
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
            exit($this->msg('保存成功',array('icon'=>1,'url'=>url('/member/bankcard'))));
        }
        if($id){
            $row = $this->db->get("SELECT * FROM member_bankcard WHERE `id` = '".$id."'");
            $this->smarty->assign('row',$row);
        }

        if(STPL == 'mobile'){
            $row['head'] = '绑定银行卡';
            $this->smarty->assign('row',$row);
        }
        $bankcard = $this->member->bankcard(MID);
        $this->smarty->assign('bankcard',$bankcard);
        $this->smarty->display('member/bankcard.html');
    }
    function bankcard_del($id){
        $this->db->delete('member_bankcard',array('id'=>intval($id)));
        exit($this->msg('删除成功',array('iniframe'=>false,'url'=>url('/member/bankcard'))));
    }

    /**
     * 夺宝记录
     */
    function db($page=1){
        $this->load->model('yunbuy');
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
                case 4:
                    $where .= " AND d.status IN(2,3,4,5) AND multi>1";
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
            $list = $this->db->lJoin($list,'yunqz','qz_buy_id,qz_sn','buy_id','qz_buy_id','');

            if($list){
                foreach($list as $key=>$val){
                    $val['buy'] = $this->yunbuy->yuninfo($val['buy_id']);
                    //中奖夺宝信息
                    $val['luck_qty'] = $this->db->getstr("SELECT SUM(qty) AS qty FROM ###_yundb  WHERE mid = '".$list[$key]['buy']['member_id']."' AND status <> 1 AND buy_id = '$val[buy_id]' ORDER BY db_time DESC");
                    $val['luck_nickname'] = $this->db->getstr("SELECT nickname FROM ###_member WHERE mid = '".$list[$key]['buy']['member_id']."'");
                    $val['yun_code'] = explode(',',$val['yun_code']);
                    $val['gobuyback'] = $this->db->getstr("SELECT is_return FROM ###_yundb WHERE mid='".MID."' AND buy_id='$val[buy_id]' ");
                    //期号圈号...
                    $val['gobuy'] = $val['buy']['gobuy'];
                    $this->yunbuy->getYunUrl($val, 1);

                    $list[$key] = $val;
                }
            }
            if(STPL == 'mobile'){
                if(isAjax()==true){
                    $array = array();
                    foreach($list as $k=>$m){
                        $this->smarty->assign('m',$m);
                        $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_db.html'));
                    }
                    die(json_encode($array));
                }
            }
            $this->smarty->assign('list',$list);
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
                    $val['allow_pay'] = 1;
                    $db = $this->yunbuy->getyunDb(" AND d.order_id = '$val[order_id]'",15,$page);
                    $db = $this->db->lJoin($db,'yunqz','qz_buy_id,qz_sn','buy_id','qz_buy_id','');
                    if($db){
                        foreach($db as $k=>$v){
                            $v['buy'] = $this->yunbuy->yuninfo($v['buy_id']);
                            //中奖夺宝信息
                            $v['luck_qty'] = $this->db->getstr("SELECT qty FROM ###_yundb WHERE status = 3 AND buy_id = '$v[buy_id]'  ORDER BY db_time DESC");
                            if($v['luck_qty'] || $v['status']==4 || $v['status']==5) $val['allow_pay'] = 0;
                            //期号圈号...
                            $v['gobuy'] = $v['buy']['gobuy'];
                            $this->yunbuy->getYunUrl($v, 1);

                            $db[$k] = $v;
                        }
                        $val['db'] = $db;
                    }
                    //重新计算支付金额
                    $val = $this->yunbuy->updateOrderAmount($val, MID);
                    $list[$key] = $val;
                }
            }

            if(STPL == 'mobile'){
                if(isAjax()==true){
                    $array = array();
                    foreach($list as $k=>$m){
                        $this->smarty->assign('r',$m);
                        $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_db_order.html'));
                    }
                    die(json_encode($array));
                }
            }

            $this->smarty->assign('list',$list);
        }

        if(STPL == 'mobile'){
            $row['head'] = $this->L['unit_yun'].'记录';
            $this->smarty->assign('row',$row);
        }
        $this->smarty->assign('nav','db');
        $this->smarty->display('member/db.html');
    }
    /**
     * 未中奖返回抵用券
     */
    function gobuyback($buy_id){
    	if($this->site_config['gobuyback_status']==1&&$this->site_config['backmanual_status']==1){
	    	if(!$buy_id){$this->msg('参数错误！',array('iniframe'=>false,'url'=>url('/member/db')));exit;}
	    	$gobuyback_info = $this->db->get("SELECT is_return,status FROM ###_yundb WHERE buy_id=".$buy_id." AND mid=".MID);
    		if(empty($gobuyback_info)){$this->msg('操作错误！',array('iniframe'=>false,'url'=>url('/member/db')));exit;}
	    	if($gobuyback_info['is_return']==1){$this->msg('该商品已经领取！',array('iniframe'=>false,'url'=>url('/member/db')));exit;}
	    	if($gobuyback_info['status']!=5){$this->msg('该商品不能领取！',array('iniframe'=>false,'url'=>url('/member/db')));exit;}
	    	$this->load->model('gobuyback');
	    	$this->gobuyback->gobuyback($buy_id,MID);
	    	//插入数据
	    	//$this->db->insert('gobuyback',array('mid'=>MID,'buy_id'=>$buy_id,'status'=>1,'addtime'=>RUN_TIME));
	    	
	    	exit($this->msg('领取成功！',array('iniframe'=>false,'icon'=>1,'url'=>url('/member/db'))));
    	}else{
    		exit($this->msg('操作失败，不能领取！',array('iniframe'=>false,'icon'=>1,'url'=>url('/member/db'))));
    	}
    }
    /**
     * 中奖记录
     */
    function luck($page=1){
        $this->load->model('yunbuy');
        $size = 15;

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $list = $this->yunbuy->getyunDb(" AND d.mid = ".MID." AND d.status = 3 ORDER BY d.db_time DESC",$size,$page,"",'href="/member/luck/{num}"');
        $list = $this->db->lJoin($list,'yunbuy','buy_id,goods_id','buy_id','buy_id');
        $list = $this->db->lJoin($list,'goods','id,real_price','goods_id','id','goods_');
        $this->smarty->assign('list',$list);

        if(STPL == 'mobile'){
            $row['head'] = $this->L['unit_yun'].$this->L['unit_winning'].'记录';
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_luck.html'));
                }
                die(json_encode($array));
            }
        }
        $this->smarty->assign('nav','luck');
        $this->smarty->display('member/luck.html');
    }
    /**
     * 晒单
     */
    function share($page=1){
        $this->load->model('yunbuy');
        $size = 15;
        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }
        $list = $this->yunbuy->getShare("s.mid = ".MID,$size,$page,"s.*",'href="/member/share/{num}"');
        if(STPL == 'mobile'){
            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_share.html'));
                }
                die(json_encode($array));
            }
        }
        $this->smarty->assign('list',$list);

        $this->smarty->assign('nav','share');
        $this->smarty->display('member/share.html');
    }
    /**
     * 提交晒单
     */
    function post_share($order_id=''){
        $goods_id = $this->db->getstr("SELECT good_id FROM ###_goods_order_item WHERE order_id = '$order_id' AND mid = '".MID."'");
        if(empty($goods_id)) $this->msg();
        $order = $this->db->get("SELECT * FROM ###_goods_order WHERE id = '$order_id' AND mid = '".MID."'");

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
        }
        if($_POST['Submit']){
            if($order['is_share']) exit($this->msg('您已经晒过单了'));
            if(empty($_POST['title'])) exit($this->msg('请输入晒单标题'));
            if(empty($_POST['content'])) exit($this->msg('请输入内容'));
            if(empty($_POST['share'])) exit($this->msg('无图无真相,上传点晒单照片吧'));
            $data_arr = array();

            //获取一张主图
            foreach($_POST['share'] as $k=>$v){
                $ext = pathinfo($v, PATHINFO_EXTENSION);
                if(in_array(strtolower($ext), array('jpg','gif','png','jpeg'))){
                    $data_arr['thumb'] = $v;
                    break;
                }
            }
            if( ! isset($data_arr['thumb'])){
                foreach($_POST['share'] as $k=>$v){ @unlink($v); }
                exit($this->msg('必须上传一张图片做封面！'));
            }

            $data_arr['title'] = trim($_POST['title']);
            $data_arr['content'] = trim($_POST['content']);
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
            exit($this->msg('晒单成功，等待系统审核并奖励！',array('icon'=>1,'url'=>url('/member/share'))));
        }
        $this->smarty->assign('goods',$goods);

        if(STPL == 'mobile'){
            $row['head'] = '晒单';
            $this->smarty->assign('row',$row);
        }

        $this->smarty->display('member/post_share.html');
    }
    /**
     * 兑换夺宝币
     */
    function change_db(){
        $desc = '余额兑换';
        $withdraw_discount = explode("\n",$this->site_config['withdraw_discount']);
        $discount = array();
        foreach($withdraw_discount as $v){
            $v = trim($v);
            if(empty($v)) continue;

            $v = explode('|',$v);
            if(!empty($v[0]) || !empty($v[1])){
                $discount[trim($v[0])] = trim($v[1]);
            }
        }
        $this->smarty->assign('discount',$discount);

        //今日已送出多少抵用券总量
        $sql = "SELECT SUM(money) FROM ".$this->bonus->mbTable.
            " WHERE `desc` LIKE '%$desc%' AND start_time>".strtotime('today');
        $bonus_money = $this->db->getstr($sql);
        $this->smarty->assign('bonus_money',$bonus_money);

        if($_POST['Submit']){
            $amount = !empty($_POST['other']) ? intval($_POST['other']) : intval($_POST['amount']);
            if($amount<=0){ $this->msg('请输入正确的兑换金额');exit; }
            if($this->memberinfo['user_money']<$amount){ $this->msg('账户余额不足，无法兑换');exit; }

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
        	if($this->site_config['disk_status']==1){
            	$log_arr['desc'] .= "(赠送$amount M空间)";
            }
            $this->member->accountlog(ACT_CHANGE,$log_arr);
            //这里增加空间数量
            $this->db->update('member',"spacedata = spacedata+$amount*1024*1024 ",array('mid'=>MID));
            $this->msg('兑换成功！',array('url'=>url('/member/change_db')));exit;
        }

        if(STPL == 'mobile'){
            $row['head'] = "兑换".$this->L['unit_db_points'];
            $this->smarty->assign('row',$row);
        }

        $this->smarty->assign('nav','change_db');
        $this->smarty->display('member/change_db.html');
    }
    function ajax_discount_db(){
        $amount = intval($_POST['amount']);
        $withdraw_discount = explode("\n",$this->site_config['withdraw_discount']);
        $discount = array();
        foreach($withdraw_discount as $v){
            $v = trim($v);
            if(empty($v)) continue;

            $v = explode('|',$v);
            if(!empty($v[0]) || !empty($v[1])){
                $discount[trim($v[0])] = trim($v[1]);
            }
        }
        //判断是否赠送
        $give = 0;
        foreach($discount as $key=>$val){
            if($amount==$key) $give = $val;
        }
        echo $give;
    }
    /**
     * 我的推荐
     */
    function myivt($page=1){
        $type = intval($_GET['type']);

        $this->load->model('yunbuy');
        $cmss = $this->yunbuy->comss_po();
        $cmss = array_slice($cmss,0,3);

        //获取分销层级及层级人数
        $this->cmss_count(MID, $cmss, 0);
        $this->smarty->assign('cmss',$cmss);

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
                $list[$k] = $v;
            }
            $this->smarty->assign('list',$list);
            $this->smarty->display('member/myitv_list.html');
            die;
        }

        $qrcode = creat_code(url('/member/regist/'.MID),'qr'.$_SESSION['mid'].'.png');
        $this->smarty->assign('qrcode',$qrcode);

        //分享内容
        $comment = array();
        $comment['text'] = $this->site_config['share_text'];
        $comment['url'] = url('/member/regist/'.MID);
        $comment['pic'] = url($qrcode);
        //短地址
        $dwz = http('http://api.t.sina.com.cn/short_url/shorten.json','get',array('source'=>'3271760578','url_long'=>$comment['url']));
        $dwz = json_decode($dwz,true);
        if($dwz[0]['url_short']) $comment['url'] = $dwz[0]['url_short'];
        $this->smarty->assign('username',urlencode(USER));
        $this->smarty->assign('comment',$comment);

        $this->smarty->assign('nav','myivt');
        $this->smarty->display('member/myitv.html');
    }
    //递归统计各分销人数
    private function cmss_count($mid, &$cmss, $i){
        $count = count($cmss);
        if($i>=$count){ return; }
        $cmss[$i] = array('itv'=>$cmss[$i]);
        $cmss[$i]['count'] = 0;
        $cmss[$i]['list'] = array();
        $cmss[$i]['levelName'] = $this->member->ivtLevelName($i+1);

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

            die(json_encode(array('error'=>0,'msg'=>$msg)));
        }

        die(json_encode(array('error'=>1,'msg'=>'领取失败！')));
    }
    /**
     * 推荐佣金
     */
    function commission($page=1){
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

        if(STPL == 'mobile'){
            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_commission.html'));
                }
                die(json_encode($array));
            }
        }

        $this->smarty->assign('list',$list);

        $commission_total = $this->db->getstr("SELECT SUM(commission) FROM ###_commission WHERE mid ='".MID."'");
        $this->smarty->assign('commission_total',!empty($commission_total) ? $commission_total : '0.00' );

        $this->smarty->assign('nav','commission');
        $this->smarty->display('member/commission.html');
    }
    /**
     * 佣金充值
     */
    function recharge_commission(){
        if($_POST['Submit']){
            $change_money = intval($_POST['change_money']);
            if($change_money<=0) exit($this->msg('请输入正确的充值佣金'));
            if($this->memberinfo['commission']<$change_money) exit($this->msg('佣金余额不足无法充值'));
            if($this->db->update('member',"commission = commission-$change_money , deduct_commission = deduct_commission + $change_money",array('mid'=>MID))){
                $log_arr = array();
                $log_arr['mid'] = MID;
                $log_arr['username'] = USERNAME;
                $log_arr['db_points'] = $change_money;
                $log_arr['desc'] = "佣金充值".$this->L['unit_db_points']."";
                $this->member->accountlog(ACT_RCGCMS,$log_arr);
            }
            exit($this->msg('充值成功',array('icon'=>1)));
        }
        $this->smarty->display('member/recharge_commission.html');
    }
    /**
     * 佣金提现
     */
    function withdraw_commission(){
        $this->member->commission_fee(100);
        $member = $this->memberinfo;
        if(empty($member['realname'])) exit($this->msg('请先进行实名认证',array('iniframe'=>false,'url'=>url('/member/verifyidcard'))));
        $bankcard = $this->member->bankcard(MID);
        if(empty($bankcard)) exit($this->msg('请先绑定银行卡',array('iniframe'=>false,'url'=>url('/member/bankcard'))));

        $this->site_config['withdraw_commission'];

        if($_POST['Submit']){
            $bank_id = intval($_POST['id']);
            $withdraw_money = is_numeric($_POST['amount']) ? $_POST['amount'] : 0;
            if($withdraw_money<=0) exit($this->msg('请输入正确的充值佣金'));
            if($this->memberinfo['commission'] < $this->site_config['withdraw_commission']) exit($this->msg('您的佣金还未满'.$this->site_config['withdraw_commission'].'暂时无法提现'));
            if($withdraw_money < $this->site_config['withdraw_commission']) exit($this->msg('申请提现佣金必须大于或等于'.$this->site_config['withdraw_commission']));
            if($this->memberinfo['commission']<$withdraw_money) exit($this->msg('佣金余额不足无法提现'));
            if($withdraw_money>4000) exit($this->msg('大额佣金提现请联系客服处理'));
            if(empty($bank_id)) exit($this->msg('请选择提现账号'));
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
            $this->db->insert('withdraw_commission',$insert_arr);
            $this->db->update('member',"commission = commission-$withdraw_money , deduct_commission = deduct_commission + $withdraw_money",array('mid'=>MID));
            exit($this->msg('申请成功',array('icon'=>1,'url'=>url('/member/withdraw_commission_log'))));
        }
        $this->smarty->assign('list',$bankcard);
        $this->smarty->display('member/withdraw_commission.html');
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
        $this->smarty->assign('list',$list);
        $commission_total = $this->db->getstr("SELECT SUM(commission) FROM ###_commission WHERE mid ='".MID."'");
        $this->smarty->assign('commission_total',!empty($commission_total) ? $commission_total : '0.00' );
        $this->smarty->assign('nav','withdraw_commission_log');
        $this->smarty->display('member/withdraw_commission_log.html');
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
        $comment['text'] = "#".$this->site_config['site_name']."# 分享码 '.$sharecode.'使用即可免费".$this->L['unit_yun']."哦！.";
        $comment['url'] = url();
        $this->smarty->assign('comment',$comment);

        $this->smarty->assign('nav','sharecode');
        $this->smarty->display('member/sharecode.html');
    }

    /**
     * 抵用券
     */
    function bonus($page=1){
        $size = $this->site_config['page_size'];

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $this->load->model('bonus');
        $this->load->model('page');
        $_GET['page'] = $page;
        $this->page->set_vars(array('per'=>$size));

        $list = $this->page->hashQuery("SELECT * FROM ###_member_bonus WHERE mid = '".MID."' ORDER BY id DESC")->result_array();
        $list = $this->db->lJoin($list,'bonus','id,title','bonus_id','id','b_');
        foreach($list as $k=>$v){
            $v['money_type_title'] = $this->bonus->getMoneyType($v['money_type']);
            if((!empty($v['end_time']) && $v['end_time']<time()) || !empty($v['order_id'])){
                $v['disabled'] = 1;
            }else{
                $v['disabled'] = 0;
            }
            $list[$k] = $v;
        }

        if(STPL == 'mobile'){
            $row['head'] = '我的'.$this->L['unit_bonus'];
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_bonus.html'));
                }
                die(json_encode($array));
            }
        }

        $this->smarty->assign('list',$list);
        $this->smarty->assign('full_cut', $this->bonus->full_cut(0));

        $this->smarty->assign('nav','bonus');
        $this->smarty->display('member/bonus.html');
    }
    /**
     * AJAX检查注册用户名
     */
    function check_username(){
        $username = trim($_POST['param']);
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
        if($r){
            $result = array('status'=>'n','info'=>$info);
        }else{
            $result = array('status'=>'y');
        }
        echo json_encode($result);
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

    /**
     * 登录程序
     */
    function act_login(){
        #检查验证码
        /*$this->load->model('code');
        $res = $this->code->check();
        if($res['code'] != 0){
            $this->msg($res['msg']);die;
        }*/

        !empty($_POST['username']) || exit($this->msg("请输入用户名"));
        !empty($_POST['password']) || exit($this->msg("请输入密码"));

        $username = addslashes(trim($_POST['username']));
        $password = $_POST['password'];
        $un_login = isset($_POST['un_login']) ? intval($_POST['un_login']) : 0;

        $user = $this->db->get("SELECT * FROM ###_member WHERE username='".$username."' OR email='".$username."' OR mobile='".$username."'");

        $this->load->model('member');
        if($this->member->get_salt_hash($password, $user['salt']) != $user['password']){
            //登录失败
            exit($this->msg("用户名或密码错误"));
        }else{
            if($user['status']!=1){
                exit($this->msg("此帐户已被封号，如有疑问，请咨询网站客服人员！"));
            }
            //登录成功;
            unset($user['salt'],$user['password']);
            $this->member->setLogin($user, $un_login);
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
            $back_url = ($_POST['back_url'] ? $_POST['back_url'] : url()).'?fromlogin=true';
            exit($this->msg('',array('url'=>$back_url)));
        }
    }

    function doexit() {
        $this->member->logout();
        if(STPL == 'mobile'){
            header('Location:/?tpl=mobile');
        }else{
            header('Location:/');
        }
    }

    /**
     * 第三方登录
     */
    function oauth($type=""){
        $type = $type ? trim($type) : '';
        if(!in_array($type,array('qq','weibo')) || $this->site_config[$type.'_login']==0) $this->msg();
        include_once(AppDir . 'includes/oauth/jntoo.php');

        $c = &website($type);

        if($c)
        {
            if (empty($_REQUEST['callblock']))
            {
                if (empty($_REQUEST['callblock']) && isset($GLOBALS['_SERVER']['HTTP_REFERER']))
                {
                    $back_act = strpos($GLOBALS['_SERVER']['HTTP_REFERER'], 'user.php') ? 'index.php' : $GLOBALS['_SERVER']['HTTP_REFERER'];
                }
                else
                {
                    $back_act = 'index.php';
                }
            }
            else
            {
                $back_act = trim($_REQUEST['callblock']);
            }

            if($back_act[4] != ':') $back_act = url().$back_act;

            $open = empty($_REQUEST['open']) ? 0 : intval($_REQUEST['open']);
            if($type=='qq'){
                $url = $c->login(url().'member/oauth_login/'.$type);
            }else{
                $url = $c->login(url().'member/oauth_login/'.$type.'?callblock='.urlencode($back_act.'&open='.$open));
            }
            if(!$url) $this->msg($c->get_error(),array('url'=>url(),'iniframe'=>false));
            header('Location: '.$url);
        }
        else
        {
            $this->msg('该功能尚未开启！' , array('url'=>url(),'iniframe'=>false));
        }
    }

    /**
     * 第三方登录处理
     * @param $type
     */
    function oauth_login($type){
        $type = empty($type) ?  '' : trim($type);
        include_once(AppDir . 'includes/oauth/jntoo.php');
        $c = &website($type);

        if($c)
        {
            $access = $c->getAccessToken();
            if(!$access)
            {
                //$this->msg($c->get_error(),array('url'=>url(),'iniframe'=>false));
                $this->msg('授权错误，请重试',array('url'=>url(),'iniframe'=>false));
            }
            $c->setAccessToken($access);
            $info = $c->getMessage();
            if(empty($info) || empty($info['mid'])){
                //$this->msg($c->get_error(),array('url'=>url(),'iniframe'=>false));die;
                $this->msg('授权错误，请重试',array('url'=>url(),'iniframe'=>false));die;
            }
            $info_user_id = $type .'_'.$info['mid']; //  加个标识！！！防止 其他的标识 一样  // 以后的ID 标识 将以这种形式 辨认
            $info['username'] = str_replace("'" , "" , $info['name']); // 过滤掉分号
            $info['info_user_id'] = $info_user_id;

            $this->load->model('member');
            $member = $this->db->get("SELECT * FROM ###_member WHERE oauth_login = '$info_user_id'");

            if(empty($member))   // 没有当前数据
            {
                if($this->member->check_username($info['username']))  // 重名处理
                {
                    $info['username'] = $info['username'].'_'.$type.(rand(10000,99999));
                }
                $info['oauth_login'] = $info_user_id;
                $info['type'] = $type;
                $_SESSION['oauth'] = $info;
            }
            else
            {
                if($member['status']!=1){
                    $this->msg("此帐户已被封号，如有疑问，请咨询网站客服人员！",array('url'=>url(),'iniframe'=>false));die;
                }

                unset($_SESSION['oauth']);
                $this->member->setLogin(array('mid'=>$member['mid'],'username'=>$member['username']));
            }

            if(empty($member))
            {
                $this->msg('',url('/?fromlogin=true'));
                //$this->exeJs('window.close();');
            }
            else
            {
                header('Location:/');
            }
        }
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


    /**
     * 同步PC扫码
     */
    function wx_scan(){
        if(!empty($_SESSION['mid'])){
            $this->msg('用户已登录');exit;
        }
        $this->smarty->assign('session_id',session_id());
        $this->smarty->display('member/wx_scan.html');
    }

    /**
     *检查同步登录
     */
    function check_sync(){
        $session_id = !empty($_POST['sessionid']) ? trim($_POST['sessionid']) : '';
        if(empty($session_id)) die(json_encode(array('error'=>1,'msg'=>'标识缺失')));
        $log = $this->db->get("SELECT * FROM member_login_log WHERE sesskey = '$session_id' AND mid <> 0");
        if(empty($log)) die(json_encode(array('error'=>2,'msg'=>'暂未登录')));
        $member = $this->member->member_info($log['mid']);
        $this->member->setLogin($member);
        die(json_encode(array('error'=>0,'msg'=>'登录成功')));
    }

    /**
     * 微信端内授权同步登录
     * @param string $session_id
     */
    function sync_login($session_id=''){
        if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
            if(empty($_POST)){
                if(empty($session_id)) $this->msg('请重新扫码');
                $this->smarty->assign('session_id',$session_id);
                $this->smarty->display('member/sync_login.html');
            }else{
                $pc_session = $_POST['session_id'];
                $mobile = trim($_POST['mobile']);
                $verifycode = trim($_POST['sms_code']);
                if(!is_mobile($mobile)) $this->msg('请填写正确的手机号!');
                if(empty($code)) $this->msg('请填写验证码!');
                /* 验证手机号验证码和IP */
                $sql = "SELECT COUNT(id) FROM ###_verify_code WHERE mobile='$mobile' AND getip='" . getIP() . "' AND verifycode='$verifycode' AND status=6 AND dateline>'" . time() ."'-3600";//验证码60分钟内有效
                if ($this->db->getstr($sql) == 0)
                {
                    $this->msg('手机号和验证码不匹配 或者 验证码已过期（1小时内有效）！');
                }
                /* 若该手机号已注册过,自动绑定会员 */
                $member = $this->db->get("SELECT * FROM ###_member WHERE mobile = '$mobile'");
                if(!empty($member)){
                    $this->db->update('###_member',array('openid'=>$_SESSION['oauth']['openid'],'unionid'=>$_SESSION['oauth']['unionid']),array('mid'=>$member['mid']));
                }else{
                    $this->db->insert('member',array('username'=>$_SESSION['oauth']['nickname'],'nickname'=>$_SESSION['oauth']['nickname'],'mobile'=>$mobile,'photo'=>$_SESSION['oauth']['headimgurl'],'openid'=>$_SESSION['oauth']['unionid'],'unionid'=>$_SESSION['oauth']['unionid'],'c_time'=>RUN_TIME,'lastlogin'=>RUN_TIME));
                    $member = $this->db->get("SELECT * FROM member WHERE openid='".$_SESSION['oauth']['openid']."'");
                }
                $this->member->setLogin($member);
                /*更新PC端SESSION登录日志*/
                $this->db->update("session",array('mid'=>$member['mid'],'c_time'=>RUN_TIME),array('sesskey'=>$pc_session));
                $this->msg('登录成功',array('url'=>url()));
                exit;
            }
        }else{
            $this->msg('请在微信浏览器中打开',array('iniframe'=>false));
        }


    }

    /**
     * 我的抽奖记录
     * @param $page
     */
    function plate($page = 1){
        $this->load->model('plate');
        $size = $this->site_config['page_size'];
        $type = $_GET['type']?intval($_GET['type']):0;
        $where = '';
        if($type == 1){
            $where .= " AND `star`>'0'";
        }

        if(STPL == 'mobile' && isAjax()==true){
            $size = isset($_POST['amount']) ? intval($_POST['amount']) : 10;
            $last = isset($_POST['last']) ? intval($_POST['last']) : 0;
            $page = $last>0?ceil($last/$size+1):1;
        }

        $_GET['page'] = $page;
        $this->load->model('page');
        $this->page->set_vars(array(
            'per'=>$size
        ));
        $list = $this->page->hashQuery("SELECT * FROM plate_log WHERE `mid`='".MID."'$where ORDER BY id DESC")->result_array();
        if($list){
            foreach($list as $k=>$v){
                //抽奖条件
                if($v['cond']==2){
                    $v['cond_info'] = '消耗'.$v['cond_number'].$this->L['unit_pay_points'];
                }else{
                    $v['cond_info'] = '消费'.$v['cond_number'].'人次';
                }
                //中奖信息
                $v['star_info'] = $this->plate->winConfig[$v['star']]['title'];
                if($v['star']){
                    $star_type = $this->plate->getPoints($v['star_type']);
                    $v['star_info'] .= '（'.$v['star_number'].$star_type['title'].'）';
                }
                $list[$k] = $v;
            }
        }

        if(STPL == 'mobile'){
            $row['head'] = '我的大转盘记录';
            $this->smarty->assign('row',$row);

            if(isAjax()==true){
                $array = array();
                foreach($list as $k=>$m){
                    $this->smarty->assign('m',$m);
                    $array[] = array('content'=>$this->smarty->fetch('member/lbi/list_plate.html'));
                }
                die(json_encode($array));
            }
        }
        $this->smarty->assign('list',$list);
        $this->smarty->assign('nav','plate');
        $this->smarty->assign('type',$type);
        $this->smarty->display('member/plate.html');
    }

}