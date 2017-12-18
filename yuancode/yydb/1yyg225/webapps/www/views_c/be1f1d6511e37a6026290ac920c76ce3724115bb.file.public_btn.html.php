<?php /* Smarty version Smarty-3.1.13, created on 2016-08-23 19:17:58
         compiled from "G:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\public_btn.html" */ ?>
<?php /*%%SmartyHeaderCode:1545757bc30e6940815-24624287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be1f1d6511e37a6026290ac920c76ce3724115bb' => 
    array (
      0 => 'G:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\public_btn.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1545757bc30e6940815-24624287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnRig' => 0,
    'btnNo' => 0,
    'k' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57bc30e6990e46_58136729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57bc30e6990e46_58136729')) {function content_57bc30e6990e46_58136729($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['btnMenu']->value){?>
<h3 class="info-tag">
    <span class="r">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnRig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
        <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNo']->value==$_smarty_tpl->tpl_vars['k']->value){?> BtnGray<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>
        <?php } ?>
    </span>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
    <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNo']->value==$_smarty_tpl->tpl_vars['k']->value){?> BtnBlue<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>
    <?php } ?>
</h3>
<?php }?><?php }} ?>