<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller
{
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['mg_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Manager') -> count();
        $p = new \Think\Page($count,10);
        $info = D('Manager')
            ->alias('m')
            ->join('__ROLE__ r on m.role_id = r.role_id')
            ->field('m.*,r.role_name')
            ->order('role_id')
            ->where($map)
          ->limit($p->firstRow.','.$p->listRows)
            -> select();
        $page = $p->show();
        $this -> assign('page',$page);

        $this->assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
           $mg = D('Manager');
            $info=$mg->create();
            $info['mg_time'] = time();
            $info['mg_pwd'] = md5($_POST['mg_pwd']);
            if($mg->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $roleinfo = D('Role')->select();
            $this->assign('roleinfo',$roleinfo);
            $this->display();
        }
    }

    function upd(){
        $mg_id = I('get.mg_id');
        $mg = D('Manager');
        if(IS_POST){
            $shuju = $mg -> create();
            $shuju['mg_time'] = time();
            $shuju['mg_pwd'] = md5($_POST['mg_pwd']);
            if($mg->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('mg_id'=>$mg_id)),1);
            }
        }else{
            $info = $mg->find($mg_id);

            $roleinfo = D('Role')->select();
            $this -> assign('roleinfo',$roleinfo);

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function login(){

        layout(false);
        if(IS_POST){
//            $vry = new \Think\Verify();
//            if($vry -> check($_POST['chknumber'])){
            $name = $_POST['admin_name'];
            $pwd = md5($_POST['admin_pwd']);

            $info = D('Manager')
           ->where(array('mg_name'=>$name,'mg_pwd'=>$pwd))
                ->find();

            if($info !== null){
                session('admin_id',$info['mg_id']);
                session('admin_name',$info['mg_name']);
//                $files = "http://www.weishe.com/index.php/Admin/View/Manager/log.txt";
//                $word = "$name".'　登录了乐护后台';
//                log_result($files,$word);

//                 $this->get_real_ip($info);
//                $arr['operation_name'] = $_SESSION['admin_name'];
//                $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
//                 $arr['operation_ip']= ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
//                $arr['operation_time'] = time();
//                if($newid = D('OperationLog')->add($arr)){
//                    $arr['operation_id'] = $newid;
//                    $arr['operation_time'] = date('Y-m-d H:i:s');
//                    echo json_encode($arr);
//                }



                $this -> redirect('Index/index'); //迅速发生跳转
            }else{
                echo "<script type='text/javascript'>alert('用户名或密码错误');</script>";
            }
//            }else{
//                echo "验证码错误";
//            }
        }

        $this -> display();
    }

    //退出系统
    function logout(){
        session(null); //销毁session
        $this -> redirect('login');
    }

    function del(){
        $mg_id = I('get.mg_id');

        if(D('Manager')->delete($mg_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('mg_id'=>$mg_id)),1);
        }
    }

    //输出验证码
//    function verifyImg(){
//        $cfg = array(
//            'fontSize'  =>  9,              // 验证码字体大小(px)
//            'imageH'    =>  25,               // 验证码图片高度
//            'imageW'    =>  60,               // 验证码图片宽度
//            'useNoise'  =>  false,            // 是否添加杂点
//            'length'    =>  4,               // 验证码位数
//            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
//        );
//        $very = new \Think\Verify($cfg);
//        $very -> entry();
//    }

//    function form_submit(){
//        $admin_name = $_POST['admin_name'];
//        $arr['operation_name'] = $admin_name;
//        $arr['operation_time'] = time();
//        if($newid = D('OperationLog')->add($arr)){
//            $arr['operation_id'] = $newid;
//            $arr['operation_time'] = date('Y-m-d H:i:s');
//            echo json_encode($arr);
//        }
//    }


//    function get_real_ip(){
//        $ip=false;
//        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
//            $ip=$_SERVER['HTTP_CLIENT_IP'];
//        }
//        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
//            $ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
//            if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
//            for ($i=0; $i < count($ips); $i++){
//                if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
//                    $ip=$ips[$i];
//                    break;
//                }
//            }
//        }
//        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
//    }

}