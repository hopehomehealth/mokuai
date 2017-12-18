<?php /* Smarty version Smarty-3.1.13, created on 2017-02-07 10:08:08
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/article_show.html" */ ?>
<?php /*%%SmartyHeaderCode:30151832858992c08e10077-72721464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8127957637d40f8ed6402f19f9b4590261d72ecb' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/article_show.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30151832858992c08e10077-72721464',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58992c08e6cdc1_42050355',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58992c08e6cdc1_42050355')) {function content_58992c08e6cdc1_42050355($_smarty_tpl) {?><?php $_smarty_tpl->createLocalArrayVariable('row', null, 0);
$_smarty_tpl->tpl_vars['row']->value['head'] = $_smarty_tpl->tpl_vars['data']->value['cat']['catname'];?>
<?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/content.css">
<div id="content" class="container main">
    <div class="page_content">
        <div class="t"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['title'];?>
</div>
        <div class="c ui-clr"><?php echo stripcslashes($_smarty_tpl->tpl_vars['data']->value['row']['content']);?>
</div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>