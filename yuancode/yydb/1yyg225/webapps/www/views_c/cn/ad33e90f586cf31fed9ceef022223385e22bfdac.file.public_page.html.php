<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:43:05
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\public_page.html" */ ?>
<?php /*%%SmartyHeaderCode:27235660fb0dd64471-58605569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad33e90f586cf31fed9ceef022223385e22bfdac' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\public_page.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27235660fb0dd64471-58605569',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fb0ddd5a60_09296427',
  'variables' => 
  array (
    'page' => 0,
    'v' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fb0ddd5a60_09296427')) {function content_5660fb0ddd5a60_09296427($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['count']>1){?>
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