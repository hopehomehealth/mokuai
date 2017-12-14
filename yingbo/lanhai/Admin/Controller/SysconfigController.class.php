<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;
class SysconfigController extends AdminController
{
    function weixin(){
    	$setting = M('sysconfig');
    	if(IS_POST){
            $_POST['id'] = $_POST['setid'];
    		if($setting->create()){
    			$setting->save();
                $this->success("操作成功");
                exit;
    		}else{
                $this->error("系统繁忙，请稍后重试");
                exit;
            }
    	}
    	$set = $setting -> find();
        if(!$set){
            $data['name'] = '';
            $lastid = $setting->add($data);
            $set['id'] = $lastid;
        }
    	$this->assign('set',$set);
    	$this->display();
    }
    //系统配置
    function base(){
        $setting = M('sysconfig');
        if(IS_POST){
            $_POST['id'] = $_POST['setid'];
            if($setting->create()){
                $setting->save();
                $this->success("操作成功");
                exit;
            }else{
                $this->error("系统繁忙，请稍后重试");
                exit;
            }
        }
        $set = $setting -> find();
        if(!$set){
            $data['name'] = '';
            $lastid = $setting->add($data);
            $set['id'] = $lastid;
        }
        $this->assign('set',$set);
		//敏感词库信息
		$wordlist = file_get_contents("./Home/mingan.txt");
		$this->assign('wordlist',$wordlist);
        $this->display();
    }
	//添加敏感词
	function addword() {
		if(IS_POST){
			$user = $_POST['word'];
			$content = $_POST['description'];
			$arr=explode("\r\n",$content);
			$result = 0;
			for($i=0;$i<count($arr)-1;$i++)
			{
				preg_match('/'.$arr[$i].'/', $user, $mnt);
				if(count($mnt) >= 1){
					$result = 1;
					break;
				}
			}
			if($result > 0){
				echo 'error';
			}else{
				fwrite(fopen('./Home/mingan.txt','a'),print_r($_POST['word']."\r\n",true));
				echo 'success';
			}
		}
	}
	function upd() {
		if(IS_POST){
			fwrite(fopen('./Home/mingan.txt','w'),$_POST['description']);
			echo 'success';
		}
	}
}