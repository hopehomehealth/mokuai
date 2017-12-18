<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 16:35:50
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/ajax_page.html" */ ?>
<?php /*%%SmartyHeaderCode:165559253458579be696def4-30799120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4243442ffaa56c60903ed4756c230b62022a7c41' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/ajax_page.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165559253458579be696def4-30799120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58579be699f500_30599372',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58579be699f500_30599372')) {function content_58579be699f500_30599372($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['count']>1){?>
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