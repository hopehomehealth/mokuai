<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:36:24
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/upload/image/list.html" */ ?>
<?php /*%%SmartyHeaderCode:199453669658452708d99bf4-21543961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ed55e80136f1fb9abfa6686fe36dcd3c4f24b5c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/upload/image/list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199453669658452708d99bf4-21543961',
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
  'unifunc' => 'content_58452708dffd11_69423284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452708dffd11_69423284')) {function content_58452708dffd11_69423284($_smarty_tpl) {?><div class="imgsCate">
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
