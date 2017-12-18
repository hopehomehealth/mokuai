<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 13:27:56
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/introduction.html" */ ?>
<?php /*%%SmartyHeaderCode:1091983321584b925c9f8103-88960397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c4ce06b29a1dfcc15901c545647c68770aaea6b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/introduction.html',
      1 => 1467097010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1091983321584b925c9f8103-88960397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'business_row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584b925ca3a264_44471432',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584b925ca3a264_44471432')) {function content_584b925ca3a264_44471432($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r" id="m">
        <div class="shop-right">
            <h3>店铺设置</h3>
        </div>
        <div class="shop-bor">
            <form action="" method="post" target="iframeNews">
            <ul class="shop-set4 box-sizing">
                <li><textarea rows="20" name="intro" class="shop-textarea" placeholder="请输入您的店铺介绍~"><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_intro'];?>
</textarea></li>
                <li><input type="submit" name="submit" value="保存修改" class="shop-set3"></li>
            </ul>
            <p></p>
            </form>
        </div>
    </div>
</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script><?php }} ?>