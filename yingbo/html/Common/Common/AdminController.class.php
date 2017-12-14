<?php
namespace Common\Common;
use Think\Controller;
class AdminController extends Controller
{
    function __construct()
    {
        parent::__construct();

        $admin_id = session('admin_id');
        $admin_name = session('admin_name');
        //正在访问的“控制器-操作方法”
        $nowAC = CONTROLLER_NAME . '-' . ACTION_NAME;
        //判断用户是否处于登录状态
        if (!empty($admin_name)) {
            //管理员对应角色的权限的“控制器-操作方法”字符串
            $roleAC = D('Manager')
                ->alias('m')
                ->join('left join lh_role r on m.role_id=r.role_id')
                ->where(array('m.mg_id' => $admin_id))
                ->getField('r.role_auth_ac,r.role_id');

            //默认允许访问权限
            $allowAC = "Manager-login,Manager-logout,Index-index,Nurse-confirm,Nurse-cancel";

            if (strpos($roleAC, $nowAC) === false && strpos($allowAC, $nowAC) === false && $role_id !== '1') {
                exit('没有权限访问！');
            }
        } else {
            $logoutAllowAC = "Manager-login";

            if (strpos($logoutAllowAC, $nowAC) === false) {
                $js = <<<eof
                <script type="text/javascript">
                    window.top.location.href="/index.php/Admin/Manager/login";
                </script>
eof;
                echo $js;
            }
        }


//        $admin_id   = session('admin_id');
//        $admin_name = session('admin_name');
        if($role_id==='1'){
            $auth_infoA = D('Auth')
                ->where(array('auth_level'=>0))
                ->select();
            $auth_infoB = D('Auth')
                ->where(array('auth_level'=>1))
                ->select();
        }else{
            $auth_ids = D('Manager')
                ->alias('m')
                ->join('left join lh_role as r on m.role_id=r.role_id')
                ->where(array('m.mg_id'=>$admin_id))
                ->getField('r.role_auth_ids');

            //根据$auth_ids查询对应的权限信息
            //顶级、次级分别获取
            $auth_infoA = array();
            $auth_infoB = array();
            if(!empty($auth_ids)){
                $auth_infoA = D('Auth')
                    ->where(array('auth_level'=>0,'auth_id'=>array('in',$auth_ids)))
                    ->select();
                $auth_infoB = D('Auth')
                    ->where(array('auth_level'=>1,'auth_id'=>array('in',$auth_ids)))
                    ->select();
            }

        }
        //       dump($auth_infoB);die;
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);
    }
    function getcity(){
        if($_POST){
            $upid = $_POST['upid'];
            $province = D('province');
            $datalist = $province->where("upid = {$upid}")->select();
            if($datalist){
                $this->ajaxReturn(array(
                        'error'=>0,
                        'content'=>$datalist
                    ));
            }else{
                $this->ajaxReturn(array(
                        'error'=>1,
                        'content'=>''
                    ));
            }
        }
    }
}
