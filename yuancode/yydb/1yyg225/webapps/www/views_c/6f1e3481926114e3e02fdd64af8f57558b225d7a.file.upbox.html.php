<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:36:33
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/upload/image/upbox.html" */ ?>
<?php /*%%SmartyHeaderCode:199584545258452711817177-78291898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f1e3481926114e3e02fdd64af8f57558b225d7a' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/upload/image/upbox.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199584545258452711817177-78291898',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'gallery_tags' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58452711853ac2_07987492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452711853ac2_07987492')) {function content_58452711853ac2_07987492($_smarty_tpl) {?><div class="up-tag clear">
 $_from = $_smarty_tpl->tpl_vars['gallery_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>