<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:21:32
         compiled from "/data/01/html/1yyg225/webapps/www/views/tpl/sms_register.html" */ ?>
<?php /*%%SmartyHeaderCode:2091962558584909fc7532d8-39684276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fa37cb61f756f9a7f6383821e1af3dbd9331dad' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/tpl/sms_register.html',
      1 => 1464081044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2091962558584909fc7532d8-39684276',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584909fc7cfe18_43188433',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584909fc7cfe18_43188433')) {function content_584909fc7cfe18_43188433($_smarty_tpl) {?>您的验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。请不要把验证码泄露给其他人。<?php }} ?>