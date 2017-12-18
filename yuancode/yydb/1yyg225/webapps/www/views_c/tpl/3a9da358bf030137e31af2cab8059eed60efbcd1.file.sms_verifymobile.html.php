<?php /* Smarty version Smarty-3.1.13, created on 2016-12-26 20:56:05
         compiled from "/data/01/html/1yyg225/webapps/www/views/tpl/sms_verifymobile.html" */ ?>
<?php /*%%SmartyHeaderCode:554388458586113655e8e57-98409373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a9da358bf030137e31af2cab8059eed60efbcd1' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/tpl/sms_verifymobile.html',
      1 => 1481271004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '554388458586113655e8e57-98409373',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5861136561b9e0_14377759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5861136561b9e0_14377759')) {function content_5861136561b9e0_14377759($_smarty_tpl) {?>您绑定手机号的验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。请不要把验证码泄露给其他人。<?php }} ?>