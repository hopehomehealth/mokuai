<?php  
header("Content-type:text/html;charset=utf-8");
class Person  
{  
    public $name;  
    public $age;  
    public $knows;  
    //构造函数，当类被实例化时，会自动执行  
    public function __construct($name)  
    {  
        //实例化方式 $变量名 =  new 类名();  
        //其中$变量名就是这个类的引用，变量名当要存储的时候  
        //被改变成pc认知的名字即内存地址来存储在栈内存中  
        $this -> name = $name;  
        echo $this->name."这里被执行了<br>";  
    }  
    public function __destruct()  
    {  
        echo $this->name."我被回收了<br>";  
    }  
}  
$p1 = new Person("张三");  
// $p2 = new Person("李四");  
/*输出 
张三这里被执行了 
李四这里被执行了 
李四我被回收了 
张三我被回收了 


*/  

/*
 * 内存  数据段  栈段（数组名对象名）  堆段（对象）  代码段
 * 静态变量   静态方法  费静态方法  都是存在 类 的内存中的    只有 普通变量存放在对象的内存中   可以print_r证明一下
 * */

// 析构函数 ：__destruct()在对象被销毁的时候调用的函数 。 

// 如何销毁对象 ：

// 1、显式销毁，unset（），直接赋值为null或者其他值

// 2、执行完最后一行代码时自动销毁（如果之前已经销毁，则不再销毁）

// 拥有问题 ：子类继承父类，子类有父类所有的属性和方法，在子类里面能够操作父类中非private修饰的属性或者方法，但是父类中对于private修饰的属性或者方法子类无法操作（类外的范围限制）
// 调用与覆盖问题 ： 子类里面调用对应的属性时，子类没有覆盖父类中的属性或者方法，则调用父类中的属性或方法，否则只调用子类中的，无论传参数是否对。private的调用除外
?>  