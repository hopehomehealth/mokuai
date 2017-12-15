<?php	
	require_once "../libs/Smarty.class.php";
	//创建smarty
	$smarty=new Smarty();
	$smarty->left_delimiter="<{";
	$smarty->right_delimiter="}>";
	//这里我们可以根据实际情况来指定模板文件夹目录
	$smarty->template_dir="../templates";
	$smarty->compile_dir="../templates_c";
?>