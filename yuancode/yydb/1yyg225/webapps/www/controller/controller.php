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
class Lowxp extends Lowxp_Controller{
    public $common;
    public $site_config;
    public $mod;

    #需要转https的页面
    public $httpsUrl = array(
        /*'/member/login',
        '/member/regist',
        '/member/forget',
        '/member/check_username',
        '/member/check_email',
        '/member/check_mobile',*/
    );

    function __construct(){
        parent::__construct();
        header('Content-Type:text/html; charset=utf-8');
        $this->load->model('session');
        $config = $this->load->config('database');
        $this->load->database($config);
        include(AppDir.'config/constant.php');
        include(AppDir.'function/common.php');
        $this->load->library('base');
        $this->load->library('form');
        $this->load->model('lang');
        $this->load->model('setting');
        $lang = $this->setLanguage();//设置语言

        $segments = Lowxp_Router::getInstance()->segments;
        if(!isset($segments[0]))return;
        $this->mod = $mod = $segments[0];
        $class = $segments[1];
        $ajax = 0;

        if($mod != 'manage'){
            //参数防注入
            $segments_old = $segments;
            SafeFilter($segments);
            $c = array_diff($segments_old, $segments);
            if(!empty($c)){ exit($this->msg()); }
        }

        #强制跳转
        static $loaded;
        if(is_null($loaded)){
            $this->load->library('useragent');
            $loaded = 1;
        }

        //控制器选择加载
        if($mod=='statistics')return;
        if($mod=='manage'){
            $this->setManage();
        }elseif($mod=='api'){
            $this->setWebsiteApi();
            $this->api_common();
            define('IS_APP',true);
        }else{
            $this->setWebsite();
            if(($mod.'/'.$class == 'welcome/bidCount')){
                //异步（减少多余操作）
                $ajax = 1;
            }else{
                $this->smarty->assign('mod',$mod);
                $this->home_common();
            }
        }
        //前台载入smarty自定义语法.
        if($mod!='manage' && !$ajax){
            $this->smarty->registerPlugin('function','zz',array($this,'_callViewFunc'));
        }
        //前台载入smarty自定义语法.
        if($mod!='manage' && $mod!='welcome' && !$ajax){
            //推广链接处理（注册页）
            if(isset($segments['1']) && isset($segments[2]) && $segments['1']=='regist'){
                zzcookie('ivt_member',stripcslashes(intval($segments[2])));
                header('Location:/');
            }
            //推广链接处理（其它任何页面）
            if(isset($_GET['iv']) && intval($_GET['iv'])){
                zzcookie('ivt_member',stripcslashes(intval($_GET['iv'])));
            }
            //微信访问
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            if($segments[1]=='sync_login' && !empty($segments[2])){
                zzcookie('sync_sign',trim($segments[2]));
            }
            if(($this->site_config['wx_login']||$this->site_config['wxpc_login']) && empty($_SESSION['oauth'])){
                if((strpos($user_agent,'MicroMessenger') || (!empty($_REQUEST['code']) && !empty($_REQUEST['state'])) )  && empty($_SESSION['mid'])){
                    $this->checkWxLogin();
                }
            }

            if(stristr($user_agent,'Android')) {
            	$app_url = $this->site_config['and_url'];
            }else if(stristr($user_agent,'iPhone')){
            	$app_url = $this->site_config['ios_url'];
            }else{
            	$app_url = $this->site_config['and_url'];
            }
            if(strpos($user_agent,'MicroMessenger')){
                $this->is_wechat = $is_wechat = 1;
                $this->smarty->assign('wechat',1);
                $app_url = "";
            }
            if($this->useragent->is_mobile()){
                $is_mobile = 1;
                $this->smarty->assign('mobile',1);
            }
	        
	    	if($app_url){
	    		$this->smarty->assign('app_url',$app_url);
	    	}

            define('IS_WECHAT',$is_wechat);
            define('IS_MOBILE',$is_mobile);
            if(!$is_wechat && !$is_mobile){
                define('IS_PC',1);
            }
        }


        $this->smarty->assign('l',LANG_NAME);
        $this->smarty->assign('langid',LANG_ID);
        $this->smarty->assign('lang',$lang);
    }

    function checkWxLogin(){
        if(IS_DEV  || isset($_GET['utest'])){
            $member = $this->db->get("SELECT * FROM member WHERE mid=10");
            $this->load->model('member');
            $this->member->setLogin($member);
        }else{
            $this->checkWxAuth();
        }
    }

    //微信授权流程附加码
    private $state = 22138;
    /**
     * 生成微信授权链接
     * @param $url
     * @param string $scope
     * @return string
     */
    function wxAuthorize($url, $scope='snsapi_userinfo'){
        $callback = getUrl('','','');
        zzcookie('return_url',$callback);

        $auth = $this->getWxAuth();

        $oauth2_url = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        $response_type = 'code';

        if(!strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')) $scope='snsapi_login';

        $authUrl = $oauth2_url.
            '?appid='.$auth['appid'].
            '&redirect_uri='.$callback.
            '&response_type='.$response_type.
            '&scope='.$scope.
            '&state='.$this->state.
            '#wechat_redirect';
        return $authUrl;
    }

    /**
     * 读取授权配置
     * @return array|null
     */
    private function getWxAuth(){
        static $auth;
        if(is_null($auth)){
            if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
                $auth = $this->db->get("SELECT * FROM oauth_wx WHERE id=1");
            }elseif($this->site_config['wxpc_login']){
                $auth = array();
                $auth['appid'] = $this->site_config['wxpc_appid'];
                $auth['appsecret'] = $this->site_config['wxpc_appsecret'];
            }
        }
        return $auth;
    }

    /**
     * 检查微信是否授权登录
     */
    function checkWxAuth(){
        if(isset($_SESSION['mid'])){
            return;
        }
        if(isset($_SESSION['oauth'])){
            return;
        }

        //未登录，执行以下操作
        if(isset($_GET['code']) && isset($_GET['state']) && $_GET['state']==$this->state){
            //授权完成后做回调处理，并使程序继续往下执行。
            $this->checkAccessToken();
            $ruturn_url = cookie('return_url');
            if(!empty($ruturn_url)){
                zzcookie('return_url','');
                header('Location:'.$ruturn_url);
            }
            return;
        }

        //未登录，先前往授权。
        $authUrl = $this->wxAuthorize($_SERVER['HTTP_X_REWRITE_URL']);
        header('Location:'.$authUrl);
        exit;
    }

    /**
     * 检查授权accessToken,
     * 并获取用户openid进行登录
     * @return mixed
     */
    function checkAccessToken(){
        $code = $_GET['code'];
        $this->load->model('share');
        $auth = $this->getWxAuth();
        $access_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token';

        $response = $this->share->http($access_token_url,'get',array(
            'appid'=>$auth['appid'],
            'secret'=>$auth['appsecret'],
            'code'=>$code,
            'grant_type'=>'authorization_code',
        ));
        $data = json_decode($response,true);
        if(empty($data['openid']) && empty($data['unionid'])){
            exit('微信授权错误！');
        }
        $member = array();
        if($data['openid']){
            $sql = "SELECT * FROM member WHERE openid='".$data['openid']."'";
        }
        if($data['unionid']){
            $sql = "SELECT * FROM member WHERE unionid='".$data['unionid']."'";
        }
        if($sql){
            $member = $this->db->get($sql);
        }

        #$xx = var_export($_SERVER,true);
        #file_put_contents(RootDir.'web/upload/server.log',$xx);
        zzcookie('openid',$data['openid']);
        //此微信号被禁用状态
        if(!empty($member) && !$member['status']){
            return $data;
        }
        if(!isset($member['mid'])){
            $this->load->model('wxapi');
            if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
                $info = $this->wxapi->userInfo($data['openid'],$data['access_token']);
            }else{
                $response = $this->share->http('https://api.weixin.qq.com/sns/userinfo','get',array(
                    'access_token'=>$data['access_token'],
                    'openid'=>$data['openid'],
                ));
                $info = json_decode($response,true);
            }
            $info['nickname'] = trim($info['nickname']);
            $info['nickname'] = !empty($info['nickname']) ? $info['nickname'] : substr(md5($data['openid'].time()),0,6);
            $_SESSION['oauth'] = !empty($info) ? $info : $data;
            /***登录注册时绑定，此时不插入新会员不登录***/
            //推广链接直接返回
            /* $segments = Lowxp_Router::getInstance()->segments;
            if(isset($segments['1']) && isset($segments[2]) && $segments['1']=='regist'){
                return $data;
            } */
            //未绑定帐号
            /* if(!strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
                header('Location:'.url('/member/oauth_chose'));
                exit;
            } */
            /***自动绑定，此时插入新会员并登陆***/
            /*$insert = array(
            		'username'=>$info['nickname'],
            		'nickname'=>$info['nickname'],
            		'photo'=>$info['headimgurl'],
            		'openid'=>$data['openid'],
            		'unionid'=>$data['unionid'],
            		'c_time'=>RUN_TIME,
            		'lastlogin'=>RUN_TIME
            );
            	
            //推广链接处理
            $segments = Lowxp_Router::getInstance()->segments;
            if(isset($segments['1']) && isset($segments[2]) && $segments['1']=='regist'){
            	$ivt_id = intval($segments[2]);
            	$r = $this->db->get("SELECT `mid` FROM `member` WHERE `mid` = '".$ivt_id."'");
            
            	if($r['mid']){
            		#推荐人统计人数
            		$this->db->update('member',"ivt_count=ivt_count+1",array('mid'=>$r['mid']));
            		$insert['ivt_id'] = $r['mid'];
            	}
            }
            
            $this->db->insert('member',$insert);
            $member = $this->db->get("SELECT * FROM member WHERE openid='".$data['openid']."'");*/
            /***验证手机时绑定并登录注册，此时不插入会员不登录***/
            return $data;
        }
        if(!empty($member) && $member['status']==1){
            $this->db->update('###_member',array('unionid'=>$data['unionid']),"mid = $member[mid]");
            $this->load->model('member');
            $this->member->setLogin($member);
        }
        return $data;
    }

    /**
     * 网站前台配置
     */
    private function setWebsite(){
        #终端模板
        $data = $this->setting->getTplByDevice();
        define('STPL', $data['tpl']);
        $this->load->smarty(array(
            'tplDir' => AppDir.'views/'.$data['skin'].'/'.$data['tpl'],
            'compileDir' => AppDir.'views_c/'.$data['skin'].'/'.$data['tpl'],
            'cacheDir' => AppDir.'cache/'.$data['skin'].'/'.$data['tpl'],
        ));

        #获取站点配置
        $this->site_config = $this->setting->value();
        $this->smarty->assign('site_config',$this->site_config);

        #关闭站点
        if($this->mod != 'welcome'){
            if($this->site_config['status_site']){
                echo $this->site_config['status_tip'];die;
            }
        }
    }

    /**
     * 网站前台配置(API)
     */
    private function setWebsiteApi(){
        $this->load->smarty();

        #获取站点配置
        $this->site_config = $this->setting->value();
        $this->smarty->assign('site_config',$this->site_config);

        #关闭站点
        if($this->mod != 'welcome'){
            if($this->site_config['status_site']){
                echo $this->site_config['status_tip'];die;
            }
        }
    }

    /**
     * 设置后台登录模块.
     */
    private function setManage(){
        $this->load->smarty();

        //获取后台全局配置
        $this->common = $this->setting->value();
        $this->smarty->assign('common',$this->common);

        #指定域名后台访问
        $host = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:$_SERVER['SERVER_NAME'];
        if(!empty($this->common['m_domain']) && $host!=$this->common['m_domain']){
            URL_404();die;
        }

        #后台IP限制
        $ip = getIp(1);
        if(strpos($this->common['manageip'].'#127.0.0.1',$ip)===false){
            //URL_404();die;
            //header('Location: /');
        }

        #前端缓存版本
        $main['vjs'] = 1;

        #favicon
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $favicon = '';
        if (preg_match("/\bMSIE\b/i",$agent)){ $favicon = '<link rel="shortcut icon" href="/favicon.ico?v='.$main['vjs'].'" />'; }
        else{ $favicon = '<link rel="shortcut icon" href="/favicon.png?v='.$main['vjs'].'" />'; }
        $this->smarty->assign('favicon',$favicon);

        if($_SERVER['request']['class']=='login')return;

        if(!isset($_SESSION['uid'])){
            if(isset($_REQUEST['ajax'])){
                $this->exeJs('location.href="/manage/login";');
            }else{
                header('Location: /manage/login');
            }
            exit;
        }
        define('UID', $_SESSION['uid']);#当前用户ID
        define('USER',$_SESSION['uname']);#当前账号名
        define('GID', $_SESSION['gid']);#当前账号名
        define('SKIN',$_SESSION['skin']);

        $this->manage_common();
    }

    /**
     * 设置语言
     */
    private function setLanguage(){
        $lang = array(
            0=>array(
                'id'=>1,
                'name'=>'中文',
                'mark'=>'cn',
                'listorder'=>1,
                'status'=>1
            )
        );
        define('LANG_NAME','cn');
        define('LANG_ID',1);
        return $lang;
    }

    //API公共
    function api_common(){
        include(AppDir . 'function/main_web.php');
        include(AppDir . 'includes/languages/common.php');

        //php防注入和XSS攻击通用过滤.
        $_GET     && SafeFilter($_GET,0,1);
        $_POST    && SafeFilter($_POST,0,1);
        $_COOKIE  && SafeFilter($_COOKIE,0,1);
        $_REQUEST && SafeFilter($_REQUEST,0,1);

        #验证KEY
        $key = trim($_SERVER['HTTP_APPKEY']);
        $app = $this->db->get("SELECT * FROM ###_app WHERE secretkey = '$key'");
        define('ISAPI',1);
        if(intval($_SERVER['HTTP_UID'])){
            $_SESSION['mid'] = intval($_SERVER['HTTP_UID']);
            $_SESSION['username'] = trim($_SERVER['HTTP_UNAME']);
            $upsw = trim($_SERVER['HTTP_UPSW']);
            $sql = !empty($upsw) ? "SELECT username FROM ###_member WHERE mid = '$_SESSION[mid]' AND password = '$upsw' AND status = 1" : "SELECT username FROM ###_member WHERE mid = '$_SESSION[mid]' AND password IS NULL AND status = 1";
            $username= $this->db->getstr($sql);
            if(empty($username)){
                unset($_SESSION['mid']);
                unset($_SESSION['username']);
            }
        }
        //if(empty($app)) $this->api_result(array('code'=>'100001','msg'=>'非法授权'));
    }

    //前台公共
    function home_common(){
        include(AppDir . 'function/main_web.php');
        include(AppDir . 'includes/languages/common.php');

        $this->load->model('yunbuy');
        $this->load->model('yuncat');

        //php防注入和XSS攻击通用过滤.
        $_GET     && SafeFilter($_GET);
        $_POST    && SafeFilter($_POST);
        $_COOKIE  && SafeFilter($_COOKIE);
        $_REQUEST && SafeFilter($_REQUEST);

        #单点登陆、更新在线日志
        if(!isAjax()){
            $this->session->init();

            #获取购物车数量
            $cart_goods = $this->yunbuy->cartgoods('',1);
            $this->smarty->assign('cartNum',count($cart_goods));

            #总参与人数
            $array = $this->base->read_static_cache('bidcount','');
            $main['logCount'] = str_pad($array['logCount'],9,'0',STR_PAD_LEFT);

            #热门搜索
            $main['search'] = str_replace('|',' | ',$this->site_config['searchwords']);

            #前端缓存版本
            $main['vjs'] = 1;

            #favicon
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $favicon = '';
            if (preg_match("/\bMSIE\b/i",$agent)){ $favicon = '<link rel="shortcut icon" href="/favicon.ico?v='.$main['vjs'].'" />'; }
            else{ $favicon = '<link rel="shortcut icon" href="/favicon.png?v='.$main['vjs'].'" />'; }
            $main['favicon'] = $favicon;

            //夺宝分类
            $yuncat = $this->yuncat->select();
            $this->smarty->assign('yuncat',$yuncat);

            //APP二维码
            $qrcode = creat_code(url('/content/download/qr.png'));
            $this->smarty->assign('qrcode',$qrcode);

            $this->smarty->assign('main', $main);
        }
    }

    //前台display前的数据处理
    function display_before($row=array()){
        /*seo内容*/
        $seo = array();

        #分类栏目
        if((!isset($row['title']) || empty($row['title'])) && isset($row['catname'])){ $row['title'] = $row['catname']; }

        if(isset($row['title']) && !empty($row['title'])){ $seo['title'] = $row['title']; }
        else{ $seo['title'] = $this->site_config['seo_title']; }
        if(!empty($seo['title'])){ $seo['title'] .= '_'; }
        $seo['title'] .= $this->site_config['site_name'];

        if(isset($row['keywords']) && !empty($row['keywords'])){ $seo['keywords'] = $row['keywords']; }
        else{ $seo['keywords'] = $this->site_config['seo_keywords']; }

        if(isset($row['description']) && !empty($row['description'])){ $seo['description'] = $row['description']; }
        else{ $seo['description'] = $this->site_config['seo_description']; }

        $this->smarty->assign('seo',$seo);
        /*end*/
    }

    //后台公共
    function manage_common(){
        #后台加载
        include(AppDir . 'includes/languages/common.php');
        include(AppDir . 'includes/languages/common_config.php');
        include(AppDir . 'function/main_manage.php');
        include(AppDir . 'function/queue.php');
        $this->load->model('menus');

        //访客权限判断
        $data = $this->menus->vor();
        $this->smarty->assign('vor',$_SESSION['vor']);
        if($data['error']){
            $this->tip($data['error'],array('type'=>2,'iniframe'=>isset($data['iniframe'])?$data['iniframe']:false));die;
        }

        #权限节点判断
        $res = $this->menus->menus_node();
        if(isset($res['code']) && $res['code']>0){
            $this->tip($res['msg'],array('inIframe'=>true,'type'=>2));
            //$this->exeJs("history.back();");
            die;
        }

        #全局action
        $action = isset($_POST['action']) ? trim($_POST['action']) : '';
        if($action == 'order'){ #批量排序
            $post = $_POST['listorders'];
            $table = trim($_POST['table']);
            $field = $_POST['field'];
            $key = isset($_POST['key'])?$_POST['key']:'id';

            if(!empty($post)){
                $res = $this->db->uporder($post,$table,$field,$key);
                if($res) $this->tip('更新排序成功');
                else $this->tip('排序失败',array('type'=>1));
            }
            die;
        }
        elseif($action == 'status'){ #更新状态
            $id = (int) $_POST['id'];
            $table = $_POST['table'];
            $field = $_POST['field']?$_POST['field']:'status';
            $key = $_POST['key']?$_POST['key']:'id';

            if($id && $table){
                $res = $this->db->get("select $field from $table where $key=$id");
                $set[] = $field.'='.(($res[$field]==1)?0:1);

                #多语言状态处理
                if($table == 'lang'){
                    $lang = $this->lang->select();
                    if($res[$field] == 1 && count($lang) == 1){
                        $this->tip('多语言至少开启一个！',array('type'=>1));die;
                    }
                }

                #会员状态处理
                if($table == 'member' && $field == 'status'){
                    $this->db->delete('member_login_log',array('mid'=>$id));
                }

                #晒单状态处理，第一次审核时送夺宝币
                //if($table == 'share') die;
                if($table == 'share' && $field == 'is_show' && $res[$field]==0){
                    $res_share = $this->db->get("select * from $table where $key=$id");
                    if($res_share['is_points']==0){
                        if($this->common['share_db']){
                            $this->load->model('member');
                            $this->member->accountlog(
                                'admin',
                                array(
                                    'mid' => $res_share['mid'],
                                    'db_points'=>(int)$this->common['share_db'],
                                    'rank_points'=>(int)$this->common['share_db']*10,
                                    'desc'=>'发布晒单审核通过获得'.$this->L['unit_jiangli']
                                )
                            );
                        }
                        $set[] = 'is_points=1';
                    }
                }

                //财务确认
                if($table == 'goods_order' && $field == 'ismoney' && !in_array(UID,array(2))){
                    $this->tip('您无权限进行财务确认！',array('type'=>1));die;
                }

                //商家商品上下架
                if($table == 'goods' && $field == 'is_sale'){
                    $goods = $this->db->get("select mid from ###_goods where id=".$id);
                    if($goods['mid'] > 0){
                        $update[] = '`is_show`='.(($res[$field]==1)?0:1);
                        $where = "mid='".$goods['mid']."' and goods_id='".$id."' and buy_num=0";
                        $this->db->update('yunbuy',implode(',',$update),$where);
                    }
                }

                $res_save = $this->db->update($table,implode(',',$set),"$key=$id");
            }
            die;
        }
        elseif($action == 'temp_cache'){ #清除模板缓存
            $this->smarty->clearAllCache();
            $this->tip('模板缓存清除成功');
            die;
        }
        elseif($action == 'backmap'){ #后台地图
            $menus_map = $this->menus->menus_node(false);
            $this->smarty->assign('menus_map',$menus_map);
            $content = $this->smarty->fetch('manage/public_map.html');
            echo $content;
            die;
        }
        elseif($action == 'agree'){ #告知函
            $content = $this->smarty->fetch('manage/public_agree.html');
            echo $content;
            die;
        }

        //按钮菜单
        $this->smarty->assign('btnMenu',isset($this->btnMenu)?$this->btnMenu:array());
        $this->smarty->assign('btnNo',0);
    }

    /**
     * 操作提示信息框。
     * @param $message
     * @param array $options
     *  type:0正确,1提示,2错误
     *  hideWin:隐藏弹出窗
     *  inIframe:当前的javascript是否在iframe中执行
     *  hideoverlay:是否隐藏当前半透明层
     *  time:当前提示信息在几秒后消失.
     */
    function tip($message, $options = array('type'=>0,'hideWin'=>false,'inIframe'=>false)){
        //type:0操作成功,1操作失败
        $defaultOpt = array(
            'type'=>0,
            'hideWin'=>false,
            'time'=>3,
            'inIframe'=>false,
            'hideoverlay'=>false
        );
        $options = array_merge($defaultOpt, $options);
        $optJson = json_encode($options);

        foreach($options as $k=>$v)$options[strtolower($k)] = $v;

        $parent = ($options['iniframe']?'parent.':'');
        echo '<script type="text/javascript">';
        echo $parent.'com.xtip("'.$message.'",'.$optJson.');';
        if($options['hidewin'])echo $parent.'com.xhide();';
        echo '</script>';
    }

    /**
     * 前台提示(layer插件)
     * icon 0失败1成功,
     * type alert:提示 confirm:确认框
     */
    function msg($message='',$options=''){
        if(empty($message) && (empty($options) || !is_array($options))){
            $url = $options ? $options : '/';
            echo $this->exeJs("location.href='$url';");
            exit;
        }else{
            $defaultOpt = array(
                'type'=>'alert',
                'iniframe'=>true,
                'icon'=>0,
            );
            if(empty($options)) $options = array();
            $options = array_merge($defaultOpt, $options);
            extract($options);
        }

        if($url=='back') $url='javascript:history.go(-1)';
        if($url=='reload') $url='javascript:history.go(0)';
        $parent = ($iniframe?'parent.':'');
        //框架内信息提示
        if($parent){
            //URL跳转
            $fun = $url ?  ",function(){".$parent."location.href='".$url."'}" : '';

            if($url && empty($message)){
                $js = $parent."location.href='".$url."'";
            }elseif($type=='alert'){
                $js =  $parent.'layer.alert("'.$message.'",'.$icon.$fun.');';
            }elseif($type=='confirm'){
                $js =  $parent.'layer.confirm("'.$message.'"'.$fun.');';
            }
            echo $this->exeJs($js);
            exit;
        }else{
            $this->smarty->assign('icon',$icon);
            $this->smarty->assign('url',$url);
            $this->smarty->assign('link',$link);
            $this->smarty->assign('message',$message);
            $this->smarty->display('msg.html');
        }

    }
    function refresh($time = 3, $isParent = false){
        $code = 'location.href=location.href;';
        if($isParent)$code = "parent.location.href=parent.location.href;";
        $this->exeJs('setTimeout(function(){'.$code.'},'.($time*1000).')');
    }

    /**
     * 面包屑
     */
    function ur_here($str,$params=array()){
        $sign = ' > ';
        $ur_here = '';
        if(!empty($params)){
            foreach($params as $v){
                $ur_here .= "<font class='st'> $sign </font><a href='$v[url]' style='$v[style]'>$v[name]</a>";
            }
        }
        if($str){
            $ur_here .= "<font class='st'> $sign </font><em>$str</em>";
        }
        $this->smarty->assign('ur_here',$ur_here);
    }

    /**
     * 致命错误提示
     */
    function fatalError($message){
        $this->tip($message,array('type'=>1));
        exit;
    }

    /**
     * API返回
     */
    function api_result($result){
        $result['flag'] = !empty($result['code']) ? false : true;
        $result['code'] = !empty($result['code']) ? $result['code'] : 0;
        $result['msg'] = !empty($result['msg']) ? $result['msg'] : '操作成功';
        $result['data'] = !empty($result['data']) ? $result['data'] : 0;
        $result['time'] = RUN_TIME;
        die(json_encode($result));
    }

    /**
     * 配合前端调用
     * @param $javascript_code
     */
    public function exeJs($javascript_code){
        echo '<script type="text/javascript">'.$javascript_code.'</script>';
    }
	
    /**
     * smarty模板调用
     */
    function _callViewFunc($arguments, $smarty){
        if(!is_array($arguments))return null;

        if(isset($arguments['mod'])){
            $mod = '_'.$arguments['mod'];
            $this->load->model('taglib');
            $this->taglib->smarty = $smarty;
            if(!method_exists($this->taglib,$mod)){
                trigger_error("zzTag: 'mod' parameter is not correct ");
                return null;
            }
            return call_user_func(array($this->taglib,$mod),$arguments);
        }
        return null;
    }

    /**
     * 初始化加载前端smarty模板。
     */
    function initialize_handle(){

    }
}
