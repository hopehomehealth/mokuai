<?php
namespace Common\Common;
use Think\Controller;
class AdminController extends Controller
{
    function __construct(){
        parent::__construct();
        //正在访问的“控制器-操作方法”
        $nowAC = CONTROLLER_NAME . '-' . ACTION_NAME;
        //判断用户是否处于登录状态
        if(isset($_SESSION['member']['info'])) {
            //管理员对应角色的权限的“控制器-操作方法”字符串
            $member = M('member')
                ->alias('m')
                ->join('left join hnj_role r on m.role_id=r.role_id')
                ->where(array('m.uid' => $_SESSION['member']['info']['uid']))
                ->getField('r.role_id,r.role_auth_ac,r.role_auth_ids');
            $roleAC = $member[$_SESSION['member']['info']['role_id']]['role_auth_ac'];
            $auth_ids = $member[$_SESSION['member']['info']['role_id']]['role_auth_ids'];
            //默认允许访问权限
            $allowAC = "Member-login,Member-logout,Index-index";
            if (strpos($roleAC, $nowAC) === false && strpos($allowAC, $nowAC) === false && $_SESSION['member']['info']['username'] !== 'admin') {
                $this->error('对不起！没有访问权限');
            }
            $auth_md = M('auth');
            //顶级、次级分别获取
            $auth_infoA = array();
            $auth_infoB = array();
            $condition['is_menu'] = 1;
            if('admin' === $_SESSION['member']['info']['username']){
                $auth_info = $auth_md
                        ->where($condition)
                        ->order('auth_sort,auth_id desc')
                        ->select();
            }else{
                $condition['auth_id'] = array('in',$auth_ids);
                if(empty($auth_ids)){
                    $auth_info = array();
                }else{
                    $auth_info = $auth_md
                            ->where($condition)
                            ->order('auth_sort,auth_id desc')
                            ->select();
                }
            }
            foreach($auth_info as $_k=>$_v){
                if($_v['auth_level'] == 0){
                    $auth_infoA[] = $_v;
                }
                if($_v['auth_level'] == 1){
                    $auth_infoB[] = $_v;
                }
            }
            $this -> assign('auth_infoA',$auth_infoA);
            $this -> assign('auth_infoB',$auth_infoB);
        }else {
            if('Member-login' != $nowAC){
                $this->redirect("Member/login");
            }
        }
    }
    protected function upload($folder,$file){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/{$folder}/";
        $info=$upload->uploadOne($file);
        return $info['savepath'].$info['savename'];
    }
}
