<?php
	
	require_once "./libs/Smarty.class.php";
	
	//$id = @$_GET['id'];
	//创建smarty
	$smarty=new Smarty();
	$smarty->left_delimiter="<{";
	$smarty->right_delimiter="}>";
	
	//启用smarty调试功能
	//$smarty->debugging = true;
	
	//配置一下缓存
	//$smarty->caching = true;
	//$smarty->cache_lifetime = 60;
	
	function insert_getVisitTime(){
		
		$time = "";
		if(!file_exists("mycount.txt")){
			
			$time = "1";
			file_put_contents("mycount.txt","1");
		}else{
			
			$time = file_get_contents("mycount.txt");
			$time = intval($time)+1;
			file_put_contents("mycount.txt",$time);
		}
		
		return $time;
	}
	
	//这样aa就相当于一个一维数组
	$smarty->append("aa","北京");
	$smarty->append("aa","天津");
	
	//bb就相当于一个二维数组
	$testarr = array('id'=>'a001','name'=>'小明');
	//$smarty->append("bb",$testarr);
	//append_by_ref是以引用的方式添加的，也就是说不会进行值拷贝
	$smarty->append_by_ref("bb",$testarr);
	$smarty->append("bb",array('id'=>'a002','name'=>'小明2'));
	
	//assign默认值传递
	$smarty->assign("cc",$testarr);
	//assign_by_ref是引用传递
	$smarty->assign_by_ref("dd",$testarr);
	
	//append不变化,append_by_ref变化
	//$testarr = array();
	
	//清除所有分配的变量
	//$smarty->clear_all_assign();
	//指定清除某个变量
	$smarty->clear_assign("dd");
	
	
	
	class Dog{
		
		var $name;
		public function sayHello(){
			
			return $this->name." say: hello,world!";
		}
	}
	
	$dog1 = new Dog();
	$dog1->name = "小白";
	$smarty->assign("dog",$dog1);
	
	//可以根据id号来生成不同的缓存页面
	if($smarty->template_exists("myindex.tpl")){
		
		$smarty->display("myindex.tpl");
	}
	//$smarty->clear_cache("myindex.tpl",$id);
	//$smarty->clear_all_cache();
?>