<?php
	
	require_once "./libs/Smarty.class.php";
	
	//创建smarty
	$smarty=new Smarty();
	$smarty->left_delimiter="<{";
	$smarty->right_delimiter="}>";
	
	//启用smarty调试功能
	//$smarty->debugging = true;
	
	//配置一下缓存
	$smarty->caching = true;
	$smarty->cache_lifetime = 60;
	
	$arr = array(array("id"=>"a001","name"=>"宋江","nickname"=>"及时雨"),
			array("id"=>"a002","name"=>"小卢","nickname"=>"玉麒麟"),
			array("id"=>"a003","name"=>"吴用","nickname"=>"智多星"));
	$smarty->assign("hero",$arr);
	
	//爱好的选择项
	$hobby = array("lq"=>"篮球","wq"=>"网球","zq"=>"足球");
	$sel = array("lq","wq");
	//$sel = array("zq");
	$sex = array("a"=>"男","b"=>"女");
	
	
	$smarty->assign("hobby",$hobby);
	$smarty->assign("sel",$sel);
	$smarty->assign("sex",$sex);
	$smarty->assign("selec","b");
	
	//讲解html_table的使用
	$cities = array("aa","bb","cc","dd","ee","ff");
	$smarty->assign("cities",$cities);
	
	//insert函数的定义
	function insert_mytime(){
		
		return date("Y-m-d H:i:s");
	}
	
	$smarty->display("test5.tpl");
?>