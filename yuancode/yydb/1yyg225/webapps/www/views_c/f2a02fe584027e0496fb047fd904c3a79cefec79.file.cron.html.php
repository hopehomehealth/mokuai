<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 18:58:09
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\cron.html" */ ?>
<?php /*%%SmartyHeaderCode:3965565d7d41f21235-72357648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2a02fe584027e0496fb047fd904c3a79cefec79' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\cron.html',
      1 => 1423990364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3965565d7d41f21235-72357648',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d7d41f2cdb4_80874323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d7d41f2cdb4_80874323')) {function content_565d7d41f2cdb4_80874323($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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