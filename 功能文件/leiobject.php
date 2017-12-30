<?php
header("content-type:text/html;charset=utf-8");
class Human{
 static public $name = "小妹";
 public $height = 180;
 static public function tell(){
 echo self::$name;//静态方法调用静态属性，使用self关键词
 //echo $this->height;//错。静态方法不能调用非静态属性
//因为 $this代表实例化对象，而这里是类，不知道 $this 代表哪个对象
 }
 public function say(){
 echo self::$name . "我说话了";
 // echo $this->$name . "我说话了";
 //普通方法调用静态属性，同样使用self关键词
 echo $this->height;
 }
}
$p1 = new Human();
$p1->say(); 
$p1->tell();//对象可以访问静态方法
echo $p1::$name;//对象访问静态属性。不能这么访问$p1->name
//因为静态属性的内存位置不在对象里
// Human::say();//错。say()方法有$this时出错；没有$this时能出结果
//但php5.4以上会提示\
//类 先天的自己    对象  后天形成的自己   静态对象不能用  $this


//$this  代表  实例化对象   而这里是类  因此不能退使用$this
//普通方法调用静态属性 同样使用self::关键词
//因为静态属性的内存位置不在对象里面  对象访问静态属性  
//say()方法有$this  是出错 没有$this  shi 能出结果

//静态属性  还有 方法   包括静态方法和费静态方法在内存中  只有一个位置  ，而费静态属性  有多少实例化对象  ，就有多少个属性

//费静态属性需要实例化之后，存放到对象里面
//在php中  ，一个方法被self::,他就自动转换为静态方法

//文章这样阐述道：：：：
//这里分析了php面向对象中static静态属性和静态方法的调用。关于它们的调用（能不能调用，怎么样调用），需要弄明白了他们在内存中存放位置，这样就非常容易理解了。静态属性、方法（包括静态与非静态）在内存中，只有一个位置（而非静态属性，有多少实例化对象，就有多少个属性）。
//文章结论写到
//结论：
// （1）、静态属性不需要实例化即可调用。因为静态属性存放的位置是在类里，调用方法为"类名::属性名"；
// （2）、静态方法不需要实例化即可调用。同上
// （3）、静态方法不能调用非静态属性。因为非静态属性需要实例化后，存放在对象里；
// （4）、静态方法可以调用非静态方法，使用 self 关键词。php里，一个方法被self:: 后，它就自动转变为静态方法；


// 静态延迟绑定
// self::，代表本类(当前代码所在类)
//   永远代表本类，因为在类编译时已经被确定。
//   即，子类调用父类方法，self却不代表调用的子类。
// static::，代表本类(调用该方法的类)
//   用于在继承范围内引用静态调用的类。
//   运行时，才确定代表的类。
//   static::不再被解析为定义当前方法所在的类，而是在实际运行时计算的。


throw new UserException();
try{
	//代码段
}catch(UserExeption $e){
     
}




//类名  方法名  属性名  军不区分大小写
//$this   本对象  self  本类  parent  父类

//三私有一个公有
class MysqlDB{
	private static $instance = null;//寸类实例再次属性中
	//构造方法声明为private,防止直接创建对象
	private function __construct(){
		if(!self::$instance instanceof static){
			self::$instance = new static;
		}
		return self::$instance;
	}
	private function __clone(){}//阻止用户复制对象实例
}


//__call   当调用一个不可访问的费静态方法是（如非定义或者不可见，自动被调用）
//__callStatic 当在调用一个不可访问的静态方法是  （如未定义或者不可见）自动被调用

?>