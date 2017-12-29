<?php
  require("db_config.php");
  $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
  mysqli_query($conn,"set names 'utf8'"); //数据库输出编码
  mysqli_select_db($conn,$mysql_database); //打开数据库
  $result = mysqli_query($conn,"select * from user");
  $data="";
  $array= array();
  class User{
    public $last_name;
    public $score;
  }
  // while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
  //   $user=new User();
  //   $user->last_name = $row['last_name'];
  //   $user->score = $row['score'];
  //   $array[]=$user;
  // }


while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
  $last_name = $row['last_name'];
  $score = $row['score'];
  $array[] = array('name'=>$last_name,'age'=>$score);
}

  // var_dump($array);
  $data=json_encode($array);
  // echo "{".'"user"'.":".$data."}";
  echo $data;
?>