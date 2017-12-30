<?php
ini_set("display_errors","On");
error_reporting(E_ALL);

abstract class Father{
	public function meth1(){
		echo "meth1....aaaaaaaaaaaaaaaaaaaaa<br>";
	}
	abstract function meth2();
	public $var1 = "var1";
	public static $var2 = "var2";
	const Var3 = "Var3";
}

class Son extends Father{
	function meth2(){
		echo "meth2....of Son...<br>";
	
	}
}

// echo 1;
$s = new Son();
echo Father::$var2."<br>";
echo Father::Var3."<br>";
// echo 2;
echo Father::meth1();

$aaaa = new Father();
echo $aaaa->meth1();
echo "bbbbbb";
Interface IFather{
	// public $iVar1 = "iVar1";//此接口定义中不能包含成员变量
	// public static $iVar2 = "iVar2"//此处接口定义中不能包含静态变量
	const iVar3 = "iVar3";
	function iMeth1();
	// function aaa(){
	// 	echo "aaa";
	// }//不能这样写
}

class ISon implements IFather{
	function iMeth1(){
		echo "iMeth1...ssdfsdfsdfsdfsd 	<br>";
	}
}

// $is  = new ISon();
// echo $is->iMeth1();	
// echo IFather::iVar3;




// 3、接口没有构造函数，抽象类可以有构造函数。
// 4、接口中的方法默认都是public类型的，而抽象类中的方法可以使用private,protected,public来修饰。
// 5、一个类可以同时实现多个接口，但一个类只能继承于一个抽象类。

// 抽象类还是接口。
// 如果要创建一个模型，这个模型将由一些紧密相关的对象采用，就可以使用抽象类。如果要创建将由一些不相关对象采用的功能，就使用接口。
// 如果必须从多个来源继承行为，就使用接口。
// 如果知道所有类都会共享一个公共的行为实现，就使用抽象类，并在其中实现该行为。
























?>