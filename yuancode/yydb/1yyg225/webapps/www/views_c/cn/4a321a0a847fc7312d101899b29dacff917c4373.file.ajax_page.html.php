<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:43:09
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\ajax_page.html" */ ?>
<?php /*%%SmartyHeaderCode:175205660faff6b9356-28874526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a321a0a847fc7312d101899b29dacff917c4373' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\ajax_page.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175205660faff6b9356-28874526',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660faff72dfd0_24501534',
  'variables' => 
  array (
    'page' => 0,
    'v' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660faff72dfd0_24501534')) {function content_5660faff72dfd0_24501534($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['count']>1){?>
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