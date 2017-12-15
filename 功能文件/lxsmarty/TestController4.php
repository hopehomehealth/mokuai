<?php

	require_once "./libs/Smarty.class.php";
	
	//创建smarty
	$smarty=new Smarty();
	$smarty->left_delimiter="<{";
	$smarty->right_delimiter="}>";
	
	//分配变量
	$smarty->assign("sal",100);
	$smarty->assign("tax_rate",0.08);
	define("TAX_RATE",0.08);
	date_default_timezone_set('Asia/Shanghai'); 
	$smarty->assign("str","hello world");
	$smarty->assign("str2","hello world \n xiaoming");
	$smarty->assign("str3","hello world. xiaoming good good.");
	$smarty->assign("str4","nice day susu");
	$smarty->assign("aa","aa的值");
	$smarty->assign("bb","<a href='http://www.baidu.com'>到百度看看</a>");
	$smarty->assign("article",file_get_contents("aa.txt"));
	$smarty->assign("cc","1233l;fj9000falsjf;a2321fds;a");
	$smarty->assign("dd","hello     world    sss");
	$smarty->assign("ee","hello world hello world");
	$smarty->assign("hh","hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;
		hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;
		hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;hello 123;");
	$smarty->assign("kk","hello world hello");
	
	//一维数组
	$arr1 = array("苹果","西瓜","香蕉","山楂");
	//二维数组
	$arr2 = array(array("id"=>"a001","name"=>"悟空"),array("id"=>"a002","name"=>"八戒"),
		array("id"=>"a003","name"=>"沙僧"),array("id"=>"a004","name"=>"唐僧"));
	$smarty->assign("arr1",$arr1);
	$smarty->assign("arr2",$arr2);
	
	$smarty->display("test4.tpl");
?>