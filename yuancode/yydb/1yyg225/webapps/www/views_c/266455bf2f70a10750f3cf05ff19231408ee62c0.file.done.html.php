<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:53:14
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\robots\done.html" */ ?>
<?php /*%%SmartyHeaderCode:1409556ce6c9aee5619-90122613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '266455bf2f70a10750f3cf05ff19231408ee62c0' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\robots\\done.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1409556ce6c9aee5619-90122613',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce6c9b0be7a1_67269476',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce6c9b0be7a1_67269476')) {function content_56ce6c9b0be7a1_67269476($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<title><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
机器人</title>
<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
<style type="text/css">
body,ul,div,p,h1,h2{ padding: 0px; margin: 0px; }
.red{ color:#ff6600}
</style>
</head>
<body>
<div style="width: 800px; margin: 10px auto;">
    <h2><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
机器人正在执行,关闭页面机器人将停止工作.</h2>
    <ul style="padding:10px;">
        <li>参与<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
机器人总数:<?php echo $_smarty_tpl->tpl_vars['data']->value['robots_num'];?>
</li>
        <li>随机人次最大值:<?php echo $_smarty_tpl->tpl_vars['data']->value['buy_num'];?>
</li>
        <li>随机时间间隔最大值:<?php echo $_smarty_tpl->tpl_vars['data']->value['buy_time'];?>
</li>
        <li>参与最大数:<?php echo $_smarty_tpl->tpl_vars['data']->value['join_max'];?>
</li>
        <li>指定购买的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品总数:<?php echo count($_smarty_tpl->tpl_vars['data']->value['join_goods']);?>
</li>
    </ul>
    <h2 style="font-size:16px;">执行日志 共执行<span class="num">0</span>次,参与<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<span class="join">0</span>人次</h2>
    <div id="join_log" style="height: 500px; overflow-y:scroll;">

    </div>
    <div style="text-align: center">
        <button class="btn stop" style="background:#69A74E; padding: 10px; border: none; border-radius:3px; color: #fff; font-weight: bold;">停止执行</button>
    </div>
</div>
<script type="text/javascript">
var buytime = '<?php echo $_smarty_tpl->tpl_vars['data']->value['buy_time'];?>
';
var ids = '<?php echo $_smarty_tpl->tpl_vars['data']->value['ids'];?>
';
var num = '<?php echo $_smarty_tpl->tpl_vars['data']->value['buy_num'];?>
';
var join_max = '<?php echo $_smarty_tpl->tpl_vars['data']->value['join_max'];?>
';
var t
$(function(){
   $(".btn").click(function(){
       if($(this).hasClass('stop')){
           clearTimeout(t);
           $(this).removeClass('stop');
           $(this).html('继续执行');
       }else{
           doyunbuy();
           $(this).addClass('stop');
           $(this).html('停止执行');
       }
   });
});
doyunbuy();
function doyunbuy(){
    $.post('/manage/robots/done', {
                num: num,
                ids: ids,
                join_max: join_max
            },
            function (data){
                var dotime = 1000*rd(0.1,buytime);
                if(!data.error){
                    $("#join_log").prepend("<p>机器人<span class='red'> "+data.username+"</span>参与<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<a class='red' target='_blank' href='/yunbuy/detail/"+data.buy_id+"'>"+data.goods_name+"</a><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<span class='red'>"+data.num+"</span>人次 "+data.time+"</p>");
                    $(".num").html(parseInt($(".num").html())*1+1);
                    $(".join").html(parseInt($(".join").html())*1+data.num);
                }else{
                    $("#join_log").prepend("<p>"+data.error+" "+data.time+"</p>");
                }
                t = setTimeout('doyunbuy()',dotime);
            },
            "json"
    );
}
function rd(n,m){
    var c = m-n+1;
    return Math.floor(Math.random() * c + n);
}
</script>
</body>
</html><?php }} ?>