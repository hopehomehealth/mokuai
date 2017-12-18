<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 14:18:42
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/public_btn.html" */ ?>
<?php /*%%SmartyHeaderCode:80633980658451fce756320-30169430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac038f249d98f02caa28c60b919c2d651d134db0' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/public_btn.html',
      1 => 1481177921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80633980658451fce756320-30169430',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451fce7841d7_13892955',
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnRig' => 0,
    'btnNoRig' => 0,
    'k' => 0,
    'm' => 0,
    'btnNo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451fce7841d7_13892955')) {function content_58451fce7841d7_13892955($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['btnMenu']->value){?><h3 class="info-tag">    <span class="r">        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnRig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>        <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNoRig']->value==$_smarty_tpl->tpl_vars['k']->value){?> BtnGreen<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>        <?php } ?>    </span>    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>    <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNo']->value==$_smarty_tpl->tpl_vars['k']->value){?> BtnBlue<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>    <?php } ?></h3><?php }?><?php }} ?>