<?php /* Smarty version Smarty-3.1.13, created on 2016-05-16 12:06:53
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\tpl\sms_password.html" */ ?>
<?php /*%%SmartyHeaderCode:145215739475d764172-47273949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03fdd888f64a0ea52af077db790040768b20d44e' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\tpl\\sms_password.html',
      1 => 1457078354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145215739475d764172-47273949',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5739475d7a1201_27601153',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5739475d7a1201_27601153')) {function content_5739475d7a1201_27601153($_smarty_tpl) {?>您的验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。请不要把验证码泄露给其他人。<?php }} ?>