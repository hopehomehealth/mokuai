<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:35:10
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\cron.html" */ ?>
<?php /*%%SmartyHeaderCode:162045768a7decdd853-06592602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbb652d4b16a5005c792b71293350d99393b161f' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\cron.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162045768a7decdd853-06592602',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a7dece8c56_80959099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a7dece8c56_80959099')) {function content_5768a7dece8c56_80959099($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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