<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:40:21
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\tpl\sms_register.html" */ ?>
<?php /*%%SmartyHeaderCode:2442356597685cdf5c8-67496879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e682de2cf059e26b403d24106eea526e2faba61' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\tpl\\sms_register.html',
      1 => 1419398492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2442356597685cdf5c8-67496879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56597685d2b4e3_24691101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597685d2b4e3_24691101')) {function content_56597685d2b4e3_24691101($_smarty_tpl) {?>您的验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。请不要把验证码泄露给其他人。www.225.net<?php }} ?>