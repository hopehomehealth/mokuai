<?php
namespace Admin\Controller;
use Tools\AdminController;

//后台首页面控制器
class IndexController extends AdminController {
    function __construct(){
        parent::__construct();//先执行父类构造方法，避免覆盖
        layout(false); //当前Index控制器中的所有方法都不使用布局
    }

    public function index(){
        C('SHOW_PAGE_TRACE',false); //修改配置变量，不显示跟踪日志
        $this -> display(); }

    public function center(){
        C('SHOW_PAGE_TRACE',false);
        $this -> display(); }

    public function top(){
        C('SHOW_PAGE_TRACE',false);
        $this -> display(); }

    public function down(){
        C('SHOW_PAGE_TRACE',false);
        $this -> display(); }

    public function left(){
        $role_id = session('admin_role');
        $admin_id = session('admin_id');
        $admin_name = session('admin_name');

        if($admin_name==='admin'){
            //A.系统管理员 的权限获取设置
            $authinfoA = D('Auth')
                ->where(array('auth_level'=>0))
                ->select();        
            $authinfoB = D('Auth')
                ->where(array('auth_level'=>1))
                ->select();
        }else{
            //B.普通管理员 的权限获取设置
            //获得角色的记录信息
            $roleinfo = D('Role')->find($role_id);
            //角色对应权限的id信息
            $authids = $roleinfo['role_auth_ids'];//102,107,108
            //父级、子级权限分别获得并传递给模板
            $authinfoA = D('Auth')
                ->where(array('auth_level'=>0,'auth_id'=>array('in',$authids)))
                ->select();        
            $authinfoB = D('Auth')
                ->where(array('auth_level'=>1,'auth_id'=>array('in',$authids)))
                ->select();
        }
        $this -> assign('authinfoA',$authinfoA);
        $this -> assign('authinfoB',$authinfoB);

        $this -> display(); 
    }

    public function right(){$this -> display(); }

}

