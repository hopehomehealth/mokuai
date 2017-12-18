<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:45:31
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\article_show.html" */ ?>
<?php /*%%SmartyHeaderCode:2472566129b961b072-70693797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ec5d5e0c2e109f5e99ac707e5caa1995380348b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\article_show.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2472566129b961b072-70693797',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566129b96eed56_63150520',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566129b96eed56_63150520')) {function content_566129b96eed56_63150520($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("public_side_help.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['title'];?>
</h2>
                </div>
                <div class="hy-box">
                    <div class="hy-qalist"><?php echo stripcslashes($_smarty_tpl->tpl_vars['data']->value['row']['content']);?>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>