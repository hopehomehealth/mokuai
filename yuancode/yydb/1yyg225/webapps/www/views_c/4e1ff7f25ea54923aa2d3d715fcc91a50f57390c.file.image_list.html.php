<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:26:05
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\upload\media\image_list.html" */ ?>
<?php /*%%SmartyHeaderCode:16578565eb92d01a4e4-18064461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e1ff7f25ea54923aa2d3d715fcc91a50f57390c' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\upload\\media\\image_list.html',
      1 => 1432607498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16578565eb92d01a4e4-18064461',
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
  'unifunc' => 'content_565eb92d0415f3_31183633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eb92d0415f3_31183633')) {function content_565eb92d0415f3_31183633($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?>
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" /></a>
">&#xe606;</a>
</div>
