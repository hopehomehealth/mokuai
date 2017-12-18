<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 15:56:23
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/page_index.html" */ ?>
<?php /*%%SmartyHeaderCode:169511618458451da7ec1ee5-20830500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69f6e38d2faef4281fe67f4c2761af01c50484c9' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/page_index.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169511618458451da7ec1ee5-20830500',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451da8102060_11044157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451da8102060_11044157')) {function content_58451da8102060_11044157($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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