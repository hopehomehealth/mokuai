<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:20:45
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\ajax_page.html" */ ?>
<?php /*%%SmartyHeaderCode:18108565971ed1799b6-53190981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd271494dc75fc780beab602a3b1908c792e52d5c' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\ajax_page.html',
      1 => 1419924424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18108565971ed1799b6-53190981',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'v' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565971ed1d1fb8_26255805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565971ed1d1fb8_26255805')) {function content_565971ed1d1fb8_26255805($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['count']>1){?>
<div class="page">
    <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']>1){?>
    <a class="demo" <?php echo $_smarty_tpl->tpl_vars['page']->value['home'];?>
>首页</a>
    <a class="demo" <?php echo $_smarty_tpl->tpl_vars['page']->value['prev'];?>
>上一页</a>
    <?php }?>

    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <a <?php if ($_smarty_tpl->tpl_vars['v']->value){?>class="demo"<?php }?> <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['page']->value['nonce']){?> class="dq"<?php }?>><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</a>
    <?php } ?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']<$_smarty_tpl->tpl_vars['page']->value['count']){?>
    <a class="demo" <?php echo $_smarty_tpl->tpl_vars['page']->value['next'];?>
>下一页</a>
    <a class="demo" <?php echo $_smarty_tpl->tpl_vars['page']->value['end'];?>
>尾页</a>
    <?php }?>
</div>
<?php }?><?php }} ?>