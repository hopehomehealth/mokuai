<?php /* Smarty version Smarty-3.1.13, created on 2016-12-26 19:31:33
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/article_show.html" */ ?>
<?php /*%%SmartyHeaderCode:7396996545860ff9588d883-62178780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0172cc4b8abf199e43f060dcf804c61473689554' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/article_show.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7396996545860ff9588d883-62178780',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5860ff9591dbd7_64680263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5860ff9591dbd7_64680263')) {function content_5860ff9591dbd7_64680263($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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