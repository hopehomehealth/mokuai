<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:19:49
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\upload\image\list.html" */ ?>
<?php /*%%SmartyHeaderCode:31374565971b57a34e7-79836768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c45d8e1ca7a45fb9c4bb072556f9760a30255da8' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\upload\\image\\list.html',
      1 => 1432607451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31374565971b57a34e7-79836768',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cates' => 0,
    'm' => 0,
    'tag_id' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565971b5816727_92050160',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565971b5816727_92050160')) {function content_565971b5816727_92050160($_smarty_tpl) {?><div class="imgsCate">
 $_from = $_smarty_tpl->tpl_vars['cates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" class="e2-upload-chTag-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
<?php if ($_smarty_tpl->tpl_vars['tag_id']->value==$_smarty_tpl->tpl_vars['m']->value['id']){?> on<?php }?>"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a></li>
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" imgId="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" imgsrc="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_src'];?>
" imgname="<?php echo $_smarty_tpl->tpl_vars['m']->value['img_name'];?>
" imgsize="<?php echo $_smarty_tpl->tpl_vars['m']->value['img_size'];?>
">
" width="<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb_size']['height'];?>
">
