<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:56:36
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\public_page.html" */ ?>
<?php /*%%SmartyHeaderCode:2739256597a54bb0eb9-54248805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5347860aa079f0ae511801de9d219edd577902ef' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\public_page.html',
      1 => 1421848098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2739256597a54bb0eb9-54248805',
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
  'unifunc' => 'content_56597a54bfc630_80714791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597a54bfc630_80714791')) {function content_56597a54bfc630_80714791($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['count']>1){?>
<div class="page">
    <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']>1){?>
    <a <?php echo $_smarty_tpl->tpl_vars['page']->value['home'];?>
>首页</a>
    <a <?php echo $_smarty_tpl->tpl_vars['page']->value['prev'];?>
>上一页</a>
    <?php }?>

    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <a <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['page']->value['nonce']){?> class="dq"<?php }?>><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</a>
    <?php } ?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']<$_smarty_tpl->tpl_vars['page']->value['count']){?>
    <a <?php echo $_smarty_tpl->tpl_vars['page']->value['next'];?>
>下一页</a>
    <a <?php echo $_smarty_tpl->tpl_vars['page']->value['end'];?>
>尾页</a>
    <?php }?>
</div>
<?php }?><?php }} ?>