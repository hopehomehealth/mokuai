<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 20:55:31
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/upload/media/image_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1386298636584d4cc3cb3b82-28294798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcd936751bce247dec407281c5d42f2e0ed9a4d9' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/upload/media/image_list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1386298636584d4cc3cb3b82-28294798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d4cc3ce1d05_33111322',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d4cc3ce1d05_33111322')) {function content_584d4cc3ce1d05_33111322($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?>
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" /></a>
">&#xe606;</a>
</div>
