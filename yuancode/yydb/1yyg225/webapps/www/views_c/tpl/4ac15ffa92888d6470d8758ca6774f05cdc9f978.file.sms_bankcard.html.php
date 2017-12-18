<?php /* Smarty version Smarty-3.1.13, created on 2016-03-26 13:47:34
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\tpl\sms_bankcard.html" */ ?>
<?php /*%%SmartyHeaderCode:1727156f62276ad6975-84849254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ac15ffa92888d6470d8758ca6774f05cdc9f978' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\tpl\\sms_bankcard.html',
      1 => 1457078359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1727156f62276ad6975-84849254',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verify_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56f62276b6ab97_80400552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f62276b6ab97_80400552')) {function content_56f62276b6ab97_80400552($_smarty_tpl) {?>您正在绑定银行卡,验证码是：<?php echo $_smarty_tpl->tpl_vars['verify_code']->value;?>
。若非您本人操作请尽量联系客服。<?php }} ?>