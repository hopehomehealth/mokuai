<?php
	require_once "./libs/Smarty.class.php";
	
	//´´½¨smarty
	$smarty=new Smarty();
	$smarty->left_delimiter="<{";
	$smarty->right_delimiter="}>";
	$arr=array('emp1'=>array('id'=>'a001','email'=>'xiaoli@163.com',
		'age'=>60),'emp2'=>array('id'=>'a002','email'=>'xiaohong@163.com','age'=>20));
	$smarty->assign("arr",$arr);
	$smarty->display("test.tpl");
?>