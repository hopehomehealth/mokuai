<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:30:06
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\ajax_page.html" */ ?>
<?php /*%%SmartyHeaderCode:9843566142de4a0411-40469599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c7ad787e1474719d0ecf31e7d37509d6d4b893b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\ajax_page.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9843566142de4a0411-40469599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566142de4e4783_17781512',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566142de4e4783_17781512')) {function content_566142de4e4783_17781512($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['count']>1){?>
<div class="page">
    <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']>1){?>
    <a class="demo" <?php echo $_smarty_tpl->tpl_vars['page']->value['prev'];?>
>上一页</a>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']<$_smarty_tpl->tpl_vars['page']->value['count']){?>
    <a class="demo" <?php echo $_smarty_tpl->tpl_vars['page']->value['next'];?>
>下一页</a>
    <?php }?>
</div>
<?php }?><?php }} ?>