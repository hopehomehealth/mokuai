<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:09:47
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/public_map.html" */ ?>
<?php /*%%SmartyHeaderCode:1520410253584520cbeb57b0-41048926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f21cb24e0e548e559e1891bc46e06b05898629c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/public_map.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1520410253584520cbeb57b0-41048926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menus_map' => 0,
    'm' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584520cc134b93_98718286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584520cc134b93_98718286')) {function content_584520cc134b93_98718286($_smarty_tpl) {?><div class="backmap">
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