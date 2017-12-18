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
class disk extends Lowxp{

    function __construct(){
        parent::__construct();
        $method = $_SERVER['request']['method'];
        $isLogin = isset($_SESSION['mid']);
        if($this->site_config['disk_status']!=1){
        	$this->exeJs('location.href="/"');
        	die;
        }
        //注册,提交注册,登录,忘记密码:不能登录状态的方法.
        $notLoginActions = in_array($method, array('regist', 'regist2', 'submit', 'login', 'act_login','forget','check_username','check_ivt','check_email','check_mobile','resetpass','oauth','oauth_login','oauth_chose'));
        //除以上模块外,其他都需要登录状态进行操作.
        if($isLogin){
            if($notLoginActions){
                //$this->exeJs('alert("当前已登录,该操作需在未登录状态下.");');
                //跳转到一个初始页面
                $this->exeJs('location.href="/disk/index"');
                die;
            }
			
            define('MID',$_SESSION['mid']);
            define('USER',$_SESSION['username']);
            $this->load->model('member');
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
                if(empty($this->memberinfo['mobile']) && $method!="verifymobile"){
                    $this->exeJs('location.href="'.url('/member/verifymobile').'";');
                    die;
                }
            }

        }else{
            //跳转登录
            if(!$notLoginActions){
                $this->exeJs('location.href="'.url('/member/login').'"');
                die;
            }
            if($method == 'doexit'){
                return;
            }
        }
        if($isLogin){
	        //查询会员的空间大小
	        $spacenumber = $this->db->getstr("SELECT spacedata FROM ###_member WHERE mid = '".MID."' ");
	        if($spacenumber>1024*1024*1024*1024){
	        	$spacedata = sprintf("%.2f", $spacenumber/(1024*1024*1024*1024))."T";
	        }elseif($spacenumber>1024*1024*1024){
	        	$spacedata = sprintf("%.2f", $spacenumber/(1024*1024*1024))."G";
	        }elseif($spacenumber>1024*1024){
	        	$spacedata = sprintf("%.2f", $spacenumber/(1024*1024))."M";
	        }else{
	        	$spacedata = sprintf("%.2f", $spacenumber/(1024))."KB";
	        }
	        $this->smarty->assign('spacedata',$spacedata);
	        //实际所用大小
	        $sql = "SELECT SUM(size) FROM ###_diskfile WHERE userid=".MID." ";
	        $usernumber =  $this->db->getstr($sql);
	        if($usernumber>1024*1024*1024*1024){
	        	$userdata = sprintf("%.2f", $usernumber/(1024*1024*1024*1024))."T";
	        }elseif($usernumber>1024*1024*1024){
	        	$userdata = sprintf("%.2f", $usernumber/(1024*1024*1024))."G";
	        }elseif($usernumber>1024*1024){
	        	$userdata = sprintf("%.2f", $usernumber/(1024*1024))."M";
	        }else{
	        	$userdata = sprintf("%.2f", $usernumber/(1024))."KB";
	        }
	        $this->smarty->assign('userdata',$userdata);
	        //占用比例
	        $spacebl = $spacenumber ? round($usernumber/$spacenumber,4)*100 : 0;
	        $this->smarty->assign('spacebl',$spacebl."%");
        }
        $this->load->model('disk');
        $this->display_before(array('title'=>'会员中心'));
        $this->ur_here('',array(0=>array('url'=>url('/member'),'name'=>'会员中心')));
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

        unset($_SESSION['oauth']);
        $back_url = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_GET['back'];
        $this->smarty->assign('back_url',$back_url);
        $this->smarty->display('disk/login.html');
    }

    /**
     * 注册页
     */
    function regist($username=''){
        #初始化并生成验证码
        $this->load->model('code');
        $this->code->html(array('gee'=>2));
		
        if(empty($_SESSION['oauth']['nickname'])) unset($_SESSION['oauth']);
        if($username) zzcookie('ivt_member',stripcslashes(trim($username)));
        $this->smarty->assign('ivt_member',$_COOKIE['ivt_member']?$_COOKIE['ivt_member']:$username);
		
        $this->smarty->assign('row',array('head'=>'会员注册'));
        $this->smarty->display('member/regist.html');
    }

    

    function index(){
    	//查询左边的菜单
    	$folder = $this->disk->get_folder(MID);
    	
    	//首页统计
    	//文件夹个数
    	$sql = "SELECT COUNT(ID) FROM ###_folder WHERE userid=".MID." ";
    	$foldernum =  $this->db->getstr($sql);
    	$this->smarty->assign('foldernum',$foldernum);
    	
    	//文件夹个数
    	$sql = "SELECT COUNT(ID) FROM ###_diskfile WHERE userid=".MID." ";
    	$filenum =  $this->db->getstr($sql);
    	$this->smarty->assign('filenum',$filenum);
    	
    	$sql = "SELECT lastlogin FROM ###_member WHERE mid=".MID." ";
    	$lastlogin =  $this->db->getstr($sql);
    	$this->smarty->assign('lastlogin',$lastlogin);
    	
    	$this->smarty->assign('folder',$folder);
        $this->smarty->display('disk/index.html');
    }
	
	function lists(){
		//查询该文件夹下所有文件
		$folderid = $_GET['id'];
		$_GET['page'] = $page;
		$this->load->model('page');
		$size = $this->site_config['page_size'];
		$this->page->set_vars(array(
				'per'=>$size,
				'url'=>'href="/disk/lists/{num}"'
		));
		
		//查询左边的菜单
		$folder = $this->disk->get_folder(MID);
		if(!$folderid){
			$folderid = $folder['0']['id'];
			
		}
		if($folderid){
			$folder_data = $this->disk->find_folder_id($folderid);
		}
		$foldername = $folder_data['0']['title']?$folder_data['0']['title']:"默认文件夹";
		$where  = "";
		if($_GET['search']){
			$title = $_GET['title']?$_GET['title']:exit($this->msg('请输入文件名称',array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
			$where .= " AND title like '%$title%' ";
		}
		
		
		$list = $this->page->hashQuery("SELECT * FROM diskfile WHERE `userid` = '".MID."' AND `folderid`='".$folderid."' $where ORDER BY addtime DESC,id DESC")->result_array();
		//默认就直接下载链接了
		foreach($list as $k=>$v){
			$folder_data = $this->disk->find_folder_id($v['folderid']);
			$list[$k]['foldername'] = $folder_data['0']['name'];
		}
		$this->smarty->assign('folderid',$folderid);
		$this->smarty->assign('foldername',$foldername);
		$this->smarty->assign('folder',$folder);
		$this->smarty->assign('list',$list);
		$this->smarty->display('disk/lists.html');
	}
	/**
	 * 文件添加
	 */
	function addfile() {
		$file = array();
		//上传之前需要先判断是否空间足够
		$spacenumber = $this->db->getstr("SELECT spacedata FROM ###_member WHERE mid = '".MID."' ");
		
		$usernumber =  $this->db->getstr("SELECT SUM(size) FROM ###_diskfile WHERE userid=".MID." ");
		
		//定位是什么文件夹，如果没有文件夹就放到默认的文件夹里边儿
		$folderid = $_POST['folderid']?$_POST['folderid']:self::creat_folder("默认文件夹",0);
		$folder = $this->disk->find_folder_id($folderid);
		
		if(empty($folder))exit($this->msg("请先创建文件夹",array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
		//上传之前需要先判断是否已经超过总空间数量
		$file = $_FILES;
		//上传文件步骤，1，查询该文件是否已经存在，（不是必须的好像），2如果没有就进行数据库操作，插入上传记录，3，移入文件夹
		foreach($file as $k=>$v){
			if($v['name']){
				if($v[type] != "application/x-zip-compressed"&&$v[type] != "application/octet-stream"){
					exit($this->msg($this->L['unit_skydrive']."只能上传zip、rar、7z格式文件",array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
				}
				$filename = $v["tmp_name"];
				$exe_arr = explode(".", $v['name']);
				$count = count($exe_arr);
				$exe = $exe_arr[$count-1];
				$name = time().$input['userid'].rand('001', '999').".".$exe;
				$destination = 'uploadfile/'.$folder['0']['name'].'/'.$name;
				//插入数据库
				//先查询是否已经该文件，如果有就不操作
				$file_data = $this->disk->find_file($v['name'],$folderid);
				if(empty($file_data)){
					//插入数据库
					$input = array();
					$input['folderid'] = $folderid;
					$input['title'] = $v['name'];
					$input['userid'] = MID;
					$input['name'] = $name;
					$input['size'] = $v['size'];
					$usernumber += $v['size'];
					if($usernumber<=$spacenumber){
						$folder_arr = $this->disk->upload_file($input);
						if(!move_uploaded_file ($filename, $destination))
						{
							echo "移动文件出错";
							exit;
						}
					}else{
						exit($this->msg("您的空间不足",array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
					}
				}
			}
		}
		exit($this->msg('操作成功',array('icon'=>1,'url'=>"/disk/lists/?id=$folderid",'iniframe'=>false)));
	}
	/**
	 * 删除文件
	 */
	function delfile(){
		$id = $_GET['id']?$_GET['id']:exit($this->msg('参数接收',array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
		
		$file_data = $this->disk->find_file_id($id);
		if(empty($file_data)){
			exit($this->msg('该文件不存在',array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
		}
		if($file_data['0']['userid']!=MID){
			exit($this->msg('该文件不存在',array('icon'=>1,'url'=>'/disk/lists'.$file_data[0]['folderid'],'iniframe'=>false)));
		}
		//移除文件
		//查询文件夹名称
		$folder = $this->disk->find_folder_id($file_data['0']['folderid']);
		$file = 'uploadfile/'.$folder['0']['name'].'/'.$file_data['0']['name'];
		if (!unlink($file)){
			//echo ("Error deleting $file");
		}
		//修改直接修改名称就好了
		$this->disk->delete_file($id);
		exit($this->msg('操作成功',array('icon'=>1,'url'=>"/disk/lists/?id=".$file_data[0]['folderid'],'iniframe'=>false)));
	}
	/**
	 * 删除文件夹
	 */
	function delfolder(){
		$id = $_GET['id']?$_GET['id']:exit($this->msg('参数接收',array('icon'=>1,'url'=>'/disk/folder','iniframe'=>false)));
	
		$folder_data = $this->disk->find_folder_id($id);
		if(empty($folder_data)){
			exit($this->msg('该文件夹不存在',array('icon'=>1,'url'=>'/disk/folder','iniframe'=>false)));
		}
		if($folder_data['0']['userid']!=MID){
			exit($this->msg('该文件夹不存在',array('icon'=>1,'url'=>'/disk/folder'.$file_data[0]['folderid'],'iniframe'=>false)));
		}
		//移除文件
		/* $aimDir = '/uploadfile/'.$folder_data['0']['name'];
		$dirHandle = opendir($aimDir);
        while (false !== ($file = readdir($dirHandle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!is_dir($aimDir.$file)) {
                unlink($aimDir.$file);
            } else {
                unlink($aimDir.$file);
            }
        }
        closedir($dirHandle);
        rmdir($aimDir); */
		//修改直接修改名称就好了
		$this->disk->delete_folder($id);
		exit($this->msg('操作成功',array('icon'=>1,'url'=>"/disk/folder",'iniframe'=>false)));
	}
	/**
	 * 修改文件
	 */
	function Ajaxedit() {
		if(isAjax()==false){ $this->msg(); }
		$id_post = $_POST['id'];
        $file_data = $this->disk->find_file_id($id_post);

        if(empty($file_data)){
            exit(json_encode(array('error'=>0)));
        }else{
            
            exit(json_encode(array('error'=>1,'ids'=>$ids,'file'=>$file_data['0'])));
        }
	}
	/**
	 * 修改文件夹
	 */
	function Ajaxfolderedit() {
		if(isAjax()==false){ $this->msg(); }
		$id_post = $_POST['id'];
		$folder_data = $this->disk->find_folder_id($id_post);
	
		if(empty($folder_data)){
			exit(json_encode(array('error'=>0)));
		}else{
			exit(json_encode(array('error'=>1,'ids'=>$ids,'folder'=>$folder_data['0'])));
		}
	}
	/**
	 * 文件修改
	 */
	function editfile() {
		$id = $_POST['fileid']?$_POST['fileid']:exit($this->msg('参数接收',array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
		$title = $_POST['title']?$_POST['title']:exit($this->msg('标题文件不能为空',array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));	
		$file_data = $this->disk->find_file_id($id);
	
		if(empty($file_data)){
			exit($this->msg('该文件不存在',array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
		}
		if($file_data[0]['userid']!=MID){
			exit($this->msg('该文件不存在',array('icon'=>1,'url'=>'/disk/lists'.$file_data[0]['folderid'],'iniframe'=>false)));
		}
		//修改直接修改名称就好了
		$this->disk->update_file($id,$title);
		exit($this->msg('操作成功',array('icon'=>1,'url'=>"/disk/lists/?id=".$file_data[0]['folderid'],'iniframe'=>false)));
	}
	/**
	 * 文件夹修改
	 */
	function editfolder() {
		$id = $_POST['folderid']?$_POST['folderid']:exit($this->msg('参数接收',array('icon'=>1,'url'=>'/disk/folder','iniframe'=>false)));
		$title = $_POST['title']?$_POST['title']:exit($this->msg('标题不能为空',array('icon'=>1,'url'=>'/disk/folder','iniframe'=>false)));
		$folder_data = $this->disk->find_folder_id($id);
		
		if(empty($folder_data)){
			exit($this->msg('该文件不存在',array('icon'=>1,'url'=>'/disk/folder','iniframe'=>false)));
		}
		if($folder_data[0]['userid']!=MID){
			exit($this->msg('该文件不存在',array('icon'=>1,'url'=>'/disk/folder'.$file_data[0]['folderid'],'iniframe'=>false)));
		}
		//修改直接修改名称就好了
		$this->disk->update_folder($id,$title);
		exit($this->msg('操作成功',array('icon'=>1,'url'=>"/disk/folder",'iniframe'=>false)));
	}
	/**
	 * 文件夹管理
	 */
	function folder(){
		$_GET['page'] = $page;
		$this->load->model('page');
		$size = $this->site_config['page_size'];
		$this->page->set_vars(array(
				'per'=>$size,
				'url'=>'href="/disk/floder/{num}"'
		));
		
		$where  = "";
		if($_GET['search']){
			$title = $_GET['title']?$_GET['title']:exit($this->msg('请输入文件夹名称',array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
			$where .= " AND title like '%$title%' ";
		}
		
		$list = $this->page->hashQuery("SELECT * FROM folder WHERE `userid` = '".MID."' $where ORDER BY addtime DESC,id DESC")->result_array();
		
		//查询左边的菜单
		$folder = $this->disk->get_folder(MID);
		$this->smarty->assign('list',$list);
		$this->smarty->assign('folder',$folder);
		$this->smarty->display('disk/folder.html');
	}
	
	function addfolder(){
		$parentid = $_POST['parentid'];
		$title = $_POST['title'];
		if(!$title){
			exit($this->msg("请输入文件夹名称",array('icon'=>1,'url'=>'/disk/lists','iniframe'=>false)));
		}
	    $folderid = self::creat_folder($title, $parentid);
		
		
		exit($this->msg('操作成功',array('icon'=>1,'url'=>'/disk/folder','iniframe'=>false)));
	}
	function creat_folder($title,$parentid){
		$input = array();
		$input['parentid'] = $parentid;
		$input['title'] = $title;
		$input['description'] = $_POST['description'];
		$input['userid'] = MID;
		$input['name'] = time().$input['userid'].rand('001', '999');
		//需要查找是否已经次文件夹
		$ishave = $this->disk->find_folder($title,MID);
		if(empty($ishave)){
			$folderid = $this->disk->create_folder($input);
			
			$this->load->library('dir');
			$this->dir->dir_create("uploadfile/$input[name]");
		}else{
			$folderid = $ishave['0']['id'];
		}
		return $folderid;
	}
   

}