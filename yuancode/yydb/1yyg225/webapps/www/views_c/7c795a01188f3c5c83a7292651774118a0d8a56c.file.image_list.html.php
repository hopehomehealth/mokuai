<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:49:48
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\upload\media\image_list.html" */ ?>
<?php /*%%SmartyHeaderCode:245655660fe0952e269-65485248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c795a01188f3c5c83a7292651774118a0d8a56c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\upload\\media\\image_list.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245655660fe0952e269-65485248',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fe09590458_51217991',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fe09590458_51217991')) {function content_5660fe09590458_51217991($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?>
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" /></a>
">&#xe606;</a>
</div>
