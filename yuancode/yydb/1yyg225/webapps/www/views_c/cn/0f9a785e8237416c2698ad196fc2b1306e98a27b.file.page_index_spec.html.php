<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:03:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/page_index_spec.html" */ ?>
<?php /*%%SmartyHeaderCode:110328876258451f5c657dd3-42604426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f9a785e8237416c2698ad196fc2b1306e98a27b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/page_index_spec.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110328876258451f5c657dd3-42604426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451f5c7e3254_74479739',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451f5c7e3254_74479739')) {function content_58451f5c7e3254_74479739($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo stripcslashes($_smarty_tpl->tpl_vars['data']->value['page']['content']);?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>