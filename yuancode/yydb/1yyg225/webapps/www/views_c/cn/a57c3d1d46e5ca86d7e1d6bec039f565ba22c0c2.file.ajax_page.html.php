<?php /* Smarty version Smarty-3.1.13, created on 2016-06-24 15:40:47
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\ajax_page.html" */ ?>
<?php /*%%SmartyHeaderCode:5673576ce3ff72fac8-43652570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a57c3d1d46e5ca86d7e1d6bec039f565ba22c0c2' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\ajax_page.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5673576ce3ff72fac8-43652570',
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
  'unifunc' => 'content_576ce3ff782678_65482642',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576ce3ff782678_65482642')) {function content_576ce3ff782678_65482642($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['count']>1){?>
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