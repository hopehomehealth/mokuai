<?php

/**
 * session日志
 * 功能点：单点登陆、在线、离线、自动下线
 */
class session_model extends Lowxp_Model{

    public  $baseTable = '###_member_login_log';
    public  $expire    = 3600; #秒,会员在线周期，超过未刷新页面视为离线且自动下线
    public  $expire2   = 3600; #秒,游客在线周期，超过将自动清除
    private $salt      = 'iHUtqaQEkfyO5ChP0d2c'; #安全码

    function __construct(){
        //firefox,上传session Bug
        if(isset($_POST['PHPSESSID']) && !empty($_POST['PHPSESSID'])){
            session_id($_POST['PHPSESSID']);
        }
        if(strpos(Domain,':')===false){
            session_set_cookie_params(0, '/', '.'.Domain);
        }
        session_start();
    }

    #入口执行
    function init(){
        #排除蜘蛛
        if($this->useragent->is_robot()){ return; }

        #单点登陆实现
        $mid = (isset($_SESSION['mid']) && $_SESSION['mid'] > 0) ? $_SESSION['mid'] : 0;
        if($mid > 0){
            $res = $this->db->get("SELECT sesskey,mid,c_time FROM " . $this->baseTable . " WHERE mid='$mid'");
            if( empty($res) || (session_id() != $res['sesskey']) || (time()-$res['c_time'])>$this->expire ){
                $this->load->model('setting');

                $setting = $this->setting->value("'sync_login'");
                if(!$setting['sync_login']){
                    $data = $this->checkCookieAuth();
                    if($data['flag'] == 0){
                        $this->logout();
                    }else{
                        //cookie登录时单点实现
                        if(session_id() != $res['sesskey']){
                            $this->logout();
                        }
                    }
                }
            }
        }else{
            //未登录时，判断登录cookie，实现自动登陆
            $data = $this->checkCookieAuth();
            if($data['flag'] == 1){
                $this->load->model('member');
                $this->member->setLogin($data['user']);
            }
        }

        #创建或更新在线日志
        $mid = (isset($_SESSION['mid']) && $_SESSION['mid'] > 0) ? $_SESSION['mid'] : 0;
        $where = array();
        if($mid>0){
            $where['mid'] = $mid;
        }

        $this->save($mid,$where);
    }

    /** 验证登录cookie
     * @return int 1 登录cookie有效
     */
    function checkCookieAuth(){
        $data = array('flag'=>0, 'user'=>array());

        //获取登录cookie
        $salt = $this->salt;
        list($identifier, $token) = explode(':', cookie('auth'));
        if($identifier && $token){
            ctype_alnum($identifier);
            ctype_alnum($token);

            $user = $this->db->get("select mid,username,token from ###_member where identifier='".$identifier."'" );
            if(!empty($user) && $user['token'] == $token){
                $data['flag'] = 1;
                $data['user'] = $user;
            }
        }

        return $data;
    }

    #在线
    function login($mid, $un_login = 0){
        $this->db->delete($this->baseTable, array('sesskey'=>session_id()));
        $res = $this->db->get("SELECT sesskey,mid FROM " . $this->baseTable . " WHERE mid='$mid'");
        $sesskey = empty($res) ? '' : $res['sesskey'];
        //if($sesskey != session_id()) session_regenerate_id();

        $where = array();
        if($mid>0 && $sesskey){
            $where['mid'] = $mid;
        }

        $this->save($mid,$where);

        //记住登录
        if($un_login == 1){
            //写入cooke
            $salt = $this->salt;
            $identifier = md5($salt . md5($mid . $salt));
            $token = md5(uniqid(rand(), TRUE));
            $timeout = time() + 60 * 60 * 24 * 7;
            zzcookie('auth', $identifier.":".$token, $timeout);

            //cookie同步到会员表
            $this->db->save('member',array(
                'identifier' => $identifier,
                'token'      => $token,
            ),'',array('mid'=>$mid));
        }
    }

    #离线
    function logout(){
        if(isset($_SESSION['mid'])){
            unset($_SESSION['mid']);
            unset($_SESSION['username']);
            unset($_SESSION['member']);
        }
        if(isset($_SESSION['oauth'])){
            unset($_SESSION['oauth']);
        }

        //正常退出时，清除登录cookie
        zzcookie('auth', '', time() - 3600);
    }

    #更新
    private function save($mid,$where=''){
        $this->db->save($this->baseTable,array(
            'sesskey' => session_id(),
            'mid'     => $mid,
            'adminid' => 0,
            'ip'      => getIP(),
            'c_time'  => time(),
        ),'',$where);
    }
}