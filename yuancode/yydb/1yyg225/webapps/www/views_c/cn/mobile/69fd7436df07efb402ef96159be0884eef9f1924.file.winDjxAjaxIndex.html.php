<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 20:19:34
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\mobile\content\winDjxAjaxIndex.html" */ ?>
<?php /*%%SmartyHeaderCode:2245056599bd6384ef5-36570584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69fd7436df07efb402ef96159be0884eef9f1924' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\mobile\\content\\winDjxAjaxIndex.html',
      1 => 1434635914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2245056599bd6384ef5-36570584',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56599bd64975a3_09710939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56599bd64975a3_09710939')) {function content_56599bd64975a3_09710939($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?>
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listDjx']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
">
">
"></font></font>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>

',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
",'index_mobile');