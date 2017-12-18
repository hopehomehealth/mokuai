<?php /* Smarty version Smarty-3.1.13, created on 2016-03-23 18:06:31
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\public_map.html" */ ?>
<?php /*%%SmartyHeaderCode:6717566120fa441ac7-37504868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fef4cd99ac2a2b3e77e727d10545264a9d294ada' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\public_map.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6717566120fa441ac7-37504868',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566120fa532885_10679656',
  'variables' => 
  array (
    'menus_map' => 0,
    'm' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566120fa532885_10679656')) {function content_566120fa532885_10679656($_smarty_tpl) {?><div class="backmap">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus_map']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['m']->value['parentid']==0){?>
    <dl>
        <dt><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</dt>
        <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus_map']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['n']->value['parentid']==$_smarty_tpl->tpl_vars['m']->value['id']){?>
        <dd><a href="/manage#!<?php echo $_smarty_tpl->tpl_vars['n']->value['mod'];?>
<?php if ($_smarty_tpl->tpl_vars['n']->value['action']){?>/<?php echo $_smarty_tpl->tpl_vars['n']->value['action'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['n']->value['param']){?>/<?php echo $_smarty_tpl->tpl_vars['n']->value['param'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</a></dd>
        <?php }?>
        <?php } ?>
    </dl>
    <?php }?>
    <?php } ?>
    <br class="clear" />
</div><?php }} ?>