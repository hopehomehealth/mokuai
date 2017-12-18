<?php /* Smarty version Smarty-3.1.13, created on 2016-05-25 10:31:56
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\tpl\sms_register.html" */ ?>
<?php /*%%SmartyHeaderCode:8694566142809840a4-35477349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1eabf1f0cae93450d00c523847689abb1b753644' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\tpl\\sms_register.html',
      1 => 1464081042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8694566142809840a4-35477349',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56614280a0bc74_99151457',
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56614280a0bc74_99151457')) {function content_56614280a0bc74_99151457($_smarty_tpl) {?>您的验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。请不要把验证码泄露给其他人。<?php }} ?>