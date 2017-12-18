<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:19:11
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\cron.html" */ ?>
<?php /*%%SmartyHeaderCode:73755659718f4412b0-09198816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d3420414b7719986c6353faefe6b1d3c4daf604' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\cron.html',
      1 => 1423990364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73755659718f4412b0-09198816',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5659718f4556e1_00448654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5659718f4556e1_00448654')) {function content_5659718f4556e1_00448654($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
    #cron{ position:fixed;right:10px;bottom:20px;display:block; }
    #processBox li{ border: 1px solid #ccc; border-radius: 5px; margin-bottom:10px; padding-bottom: 5px; }
    #processBox li .head{ background: #ccc; height: 24px; line-height: 24px; overflow: hidden; padding:0 10px; }
    #processBox li .head em{ float: right; font-size: 12px; color: #f00; }
    #processDemo{ display: none; }
    .process{ width: 145px; height: 15px; line-height: 15px; background:#ddd; position: relative; margin:10px 10px 0; border-bottom-right-radius: 3px;border-top-right-radius: 3px; }
    .process span{ display: block; position:relative; height: 100%; background: url('/admin/images/process.gif') no-repeat 0 0; width: 0; }
    .process em{ position: absolute; right: -5px; top:15px; color: #f00; font-size: 10px; }
    .processmsg{ padding:0 10px; color: #999; font-style:italic; }
</style>
<div id="cron">
    <ul id="processBox"></ul>
</div><?php }} ?>