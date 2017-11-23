<?php
//提供“天气信息和学生信息”的接口程序
//getWeather($city,$time)
$city = isset($_GET['city']) ? $_GET['city'] : 'beijing';
$time = isset($_GET['time']) ? $_GET['time'] : 'am';
$act = isset($_GET['act']) ? $_GET['act'] : 'getInfo';
//getStudent($class,$num)
$class = isset($_GET['class']) ? $_GET['class'] : 'php47';
$num   = isset($_GET['num']) ? $_GET['num'] : '20';
function getWeather($cy,$te){
    //连接数据库，根据城市、时间获得天气预报信息
    echo json_encode(array('city'=>$cy,'time'=>$te,'tianqi'=>'sun'));
}
function getStudent($cs,$nm){
    //连接数据库，根据“班级、人数”获得学员信息
    $students = array('linken','xiaoli','tom');
    echo json_encode(array('class'=>$cs,'num'=>$nm,'xueyuan'=>$students));
}
if($act === 'getWeather'){
    $act($city,$time);
}elseif($act==='getStudent'){
    $act($class,$num);
}



