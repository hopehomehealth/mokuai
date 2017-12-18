<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:10:18
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\page_index.html" */ ?>
<?php /*%%SmartyHeaderCode:144075661020cbe2454-94561051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffa43b1f07e9e1c7c4b6092e1da13760e0c48c37' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\page_index.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144075661020cbe2454-94561051',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661020cccd0a1_26730855',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661020cccd0a1_26730855')) {function content_5661020cccd0a1_26730855($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("public_side_help.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">

            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['cat']['catname'];?>
</h2>
                </div>
                <div class="hy-box">
                    <div class="hy-qalist"><?php echo stripcslashes($_smarty_tpl->tpl_vars['data']->value['page']['content']);?>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>