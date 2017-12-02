<?php
header("Content-type:text/html;charset=gbk");
$pid = $_REQUEST['pid'];
$pid = empty($pid) ? 112 : $pid;

$conn = mysql_connect("localhost","root","root");
mysql_select_db("chengshi");
mysql_query("SET NAMES UTF8");
$sql = "select * from 	city where pid=".$pid;
$result = mysql_query($sql);
$arr= array();
while($row = mysql_fetch_assoc($result)){
	// $arr[$row['cityname']] = $row;
	$arr[] = $row;
}
$str =  json_encode($arr);
echo $str;
// echo "<pre>";
// print_r($arr);


