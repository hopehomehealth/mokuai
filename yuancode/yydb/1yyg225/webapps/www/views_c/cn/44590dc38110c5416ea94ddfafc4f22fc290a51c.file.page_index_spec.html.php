<?php /* Smarty version Smarty-3.1.13, created on 2016-06-24 15:41:03
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\page_index_spec.html" */ ?>
<?php /*%%SmartyHeaderCode:25760576ce40fe19ea2-78656311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44590dc38110c5416ea94ddfafc4f22fc290a51c' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\page_index_spec.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25760576ce40fe19ea2-78656311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576ce40fe7e8f5_48501309',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576ce40fe7e8f5_48501309')) {function content_576ce40fe7e8f5_48501309($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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