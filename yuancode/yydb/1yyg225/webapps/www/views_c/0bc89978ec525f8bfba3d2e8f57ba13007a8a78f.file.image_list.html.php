<?php /* Smarty version Smarty-3.1.13, created on 2016-07-11 15:47:03
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\upload\media\image_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2720157834ef7e5cee7-56718747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bc89978ec525f8bfba3d2e8f57ba13007a8a78f' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\upload\\media\\image_list.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2720157834ef7e5cee7-56718747',
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
  'unifunc' => 'content_57834ef7e8eb30_24728933',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57834ef7e8eb30_24728933')) {function content_57834ef7e8eb30_24728933($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?>
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" /></a>
">&#xe606;</a>
</div>
