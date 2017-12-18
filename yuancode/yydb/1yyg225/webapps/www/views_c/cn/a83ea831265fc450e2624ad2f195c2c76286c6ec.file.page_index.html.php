<?php /* Smarty version Smarty-3.1.13, created on 2016-06-24 15:41:07
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\page_index.html" */ ?>
<?php /*%%SmartyHeaderCode:18521576ce413838fc3-82161763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a83ea831265fc450e2624ad2f195c2c76286c6ec' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\page_index.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18521576ce413838fc3-82161763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576ce4138bda76_92514812',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576ce4138bda76_92514812')) {function content_576ce4138bda76_92514812($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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