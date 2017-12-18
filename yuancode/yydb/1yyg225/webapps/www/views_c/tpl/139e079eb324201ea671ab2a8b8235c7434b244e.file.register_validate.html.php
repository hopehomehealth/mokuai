<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 17:57:59
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\tpl\register_validate.html" */ ?>
<?php /*%%SmartyHeaderCode:1863056d021a7524ad9-66515447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '139e079eb324201ea671ab2a8b8235c7434b244e' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\tpl\\register_validate.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1863056d021a7524ad9-66515447',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_name' => 0,
    'site_config' => 0,
    'validate_email' => 0,
    'send_date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d021a75e6f06_23673414',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d021a75e6f06_23673414')) {function content_56d021a75e6f06_23673414($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
您好！<br><br>

这封邮件是 <?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
发送的。你收到这封邮件是为了验证你注册邮件地址是否有效。如果您已经通过验证了，请忽略这封邮件。<br>
请点击以下链接(或者复制到您的浏览器)来验证你的邮件地址:<br>
<a href=\"<?php echo $_smarty_tpl->tpl_vars['validate_email']->value;?>
\" target=\"_blank\"><?php echo $_smarty_tpl->tpl_vars['validate_email']->value;?>
</a><br><br>

<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
<br>
<?php echo $_smarty_tpl->tpl_vars['send_date']->value;?>
<?php }} ?>