<?php /* Smarty version Smarty-3.1.13, created on 2016-12-21 11:07:00
         compiled from "/data/01/html/1yyg225/webapps/www/views/tpl/sms_chpaypass.html" */ ?>
<?php /*%%SmartyHeaderCode:17077819625859f1d42d2a34-88904725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '626244880942cf532f6dcc2bc91903d5f7bec58c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/tpl/sms_chpaypass.html',
      1 => 1481271354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17077819625859f1d42d2a34-88904725',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5859f1d436c269_97046874',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5859f1d436c269_97046874')) {function content_5859f1d436c269_97046874($_smarty_tpl) {?>您修改支付密码的验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。请不要把验证码泄露给其他人。<?php }} ?>