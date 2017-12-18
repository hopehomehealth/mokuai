<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 18:36:34
         compiled from "/data/01/html/1yyg225/webapps/www/views/tpl/sms_bankcard.html" */ ?>
<?php /*%%SmartyHeaderCode:21144981285857b8320fc875-54228313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f80f6a9f3da605c28d94b83d140816e56267443' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/tpl/sms_bankcard.html',
      1 => 1481271287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21144981285857b8320fc875-54228313',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5857b83212f709_99662544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857b83212f709_99662544')) {function content_5857b83212f709_99662544($_smarty_tpl) {?>您绑定银行卡的验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。请不要把验证码泄露给其他人。<?php }} ?>