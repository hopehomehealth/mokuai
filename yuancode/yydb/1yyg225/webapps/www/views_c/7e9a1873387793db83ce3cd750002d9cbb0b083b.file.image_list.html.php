<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:36:37
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\upload\media\image_list.html" */ ?>
<?php /*%%SmartyHeaderCode:311725768a835642c08-71441172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e9a1873387793db83ce3cd750002d9cbb0b083b' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\upload\\media\\image_list.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311725768a835642c08-71441172',
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
  'unifunc' => 'content_5768a8356746a6_21232821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a8356746a6_21232821')) {function content_5768a8356746a6_21232821($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?>
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" /></a>
">&#xe606;</a>
</div>
