<?php
	
	require_once "./libs/Smarty.class.php";
	
	//创建smarty
	$smarty=new Smarty();
	$smarty->left_delimiter="<{";
	$smarty->right_delimiter="}>";
	
	
	//自定义一个函数
	//在tpl中的调用方式是 <{test1 times="4" size="5" con="你好，世界" color="red"}>
	function test1($args){
		
		$str="";
		
		for($i=0;$i<$args['times'];$i++){
			
			$str.="<font color='".$args['color']."' size='".$args['size']."'>".$args[con]."</font>"."<br/>";
		}
		
		return $str;
	}
	
	//自定义一个函数（块方式需要两个参数）
	//tpl中调用方式		<{test1 times="10" size="5" color="red"}>你好，世界<{/test1}>

	/*function test2($args,$con){
		
		$str="";
		
		for($i=0;$i<$args['times'];$i++){
			
			$str.="<font color='".$args['color']."' size='".$args['size']."'>".$con."</font>"."<br/>";
		}
		
		return $str;
	}*/
	
	//自定义一个函数jisuan
	function jisuan($args)
	{
		$res=0;
		switch($args['operator'])
		{
			case '+':
				$res=$args['num1']+$args['num2'];
				break;
			case '-':
				$res=$args['num1']-$args['num2'];
				break;
			case '*':
				$res=$args['num1']-$args['num2'];
				break;
			case '/':
				$res=$args['num1']/$args['num2'];
				break;
			default:
				$res="输入的运算符不正确";
		}
		return $res;
	}
	
	//注册自定义函数
	$smarty->register_function("test1","test1");
	//注册块函数
	//$smarty->register_block("test2","test2");
	//注册自定义函数jisuan
	$smarty->register_function("jisuan","jisuan");
	$val="tt";
	$smarty->assign("val",$val);
	
	$smarty->display("test3.tpl");
?>