<?php
// 模拟高并发，实现用户抢购商品
$link = mysql_connect('localhost','root','123456');
mysql_select_db('shop47',$link);
mysql_query('set names utf8');
//锁的使用
mysql_query('lock tables goods1 write');  //写锁
//查询商品库存
$sql = "select number from goods1 where id=203";
$qry = mysql_query($sql);
$rst = mysql_fetch_assoc($qry);
$num = $rst['number']; //获得商品库存

if($num>0){
    //继续购买
    //给用户增加一个购买商品的名额了
    $num--;  //库存减少
    $sql = "update goods1 set number='$num' where id=203";
    $z = mysql_query($sql);
    if($z)
        echo "ok";
}else{
    echo "商品已经售罄";
}
//释放锁
mysql_query('unlock tables');



