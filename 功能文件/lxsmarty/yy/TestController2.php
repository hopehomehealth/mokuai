<?php
	require_once 'smarty_inc.php';

	$smarty->assign("aa","hello");
	$smarty->assign("bb",509);
	$smarty->assign("cc",3.14);
	//php中空就代表false，所以如果dd分配false就不显示
	$smarty->assign("dd",true);
	$smarty->assign("pagenow",20);

	//存放一维数组，数组一般是从数据库取出，这里模拟一下
	//1.索引数组
	$arr1=array("北京","天津","上海");
	//2.关联数组
	$arr2=array('city1'=>'北京','city2'=>'天津','city3'=>'上海');

	//存放二维数组，这个二维数组也是从数据库取出，这里模拟一下子
	//3.索引二维数组
	$arr3=array(array("北京","天津","上海"),array("小倩","老妖","采臣","丽丽"));
	//4.关联的二维数组
	$arr4=array(array('id'=>'a001','email'=>'xiaoli@163.com','age'=>60),array('id'=>'a002','email'=>'xiaohong@163.com','age'=>20));
	$arr5=array('emp1'=>array('id'=>'a001','email'=>'xiaoli@163.com','age'=>60),'emp2'=>array('id'=>'a002','email'=>'xiaohong@163.com','age'=>20));
	$arr6=array('emp1'=>array('a001','xiaoli@163.com',60),'emp2'=>array('a002','xiaohong@163.com',20));


	//*************对象的分配**********
	
	class Master
	{
		var $name;
		var $address;
	}
	$master=new Master();
	$master->name="yy";
	$master->address="hospital";

	class Dog
	{
		var $name;
		var $age;
		var $color;
		var $arr;
		var $arr2;		//二维数组
		var $master;	//小狗的主人
		function __construct($name,$age,$color,$arr,$arr2)
		{
			$this->name=$name;
			$this->age=$age;
			$this->color=$color;
			$this->arr=$arr;
			$this->arr2=$arr2;
		}
	}

	//实例化对象
	$dog1 = new Dog('花花',5,'红色',$arr1,$arr4);
	$dog1->master=$master;

	//比如我们希望把get/post/session/server的数据传递给tpl
	//传统的方式
//	$username=$_GET['username'];
//	$smarty->assign("username",$username);
//	echo "<pre>";
//	print_r($_SERVER);
//	echo "</pre>";
//	exit();

	$smarty->assign("arr1",$arr1);
	$smarty->assign("arr2",$arr2);
	$smarty->assign("arr3",$arr3);
	$smarty->assign("arr4",$arr4);
	$smarty->assign("arr5",$arr5);
	$smarty->assign("arr6",$arr6);
	$smarty->assign("dog1",$dog1);
	

	$smarty->display("test2.tpl");
?>