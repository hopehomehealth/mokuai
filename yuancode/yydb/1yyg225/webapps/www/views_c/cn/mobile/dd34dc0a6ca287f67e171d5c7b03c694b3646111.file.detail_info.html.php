<?php /* Smarty version Smarty-3.1.13, created on 2017-01-05 07:49:10
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/detail_info.html" */ ?>
<?php /*%%SmartyHeaderCode:532769875586d89f641a1c2-61001801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd34dc0a6ca287f67e171d5c7b03c694b3646111' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/detail_info.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '532769875586d89f641a1c2-61001801',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_586d89f648c844_11201803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586d89f648c844_11201803')) {function content_586d89f648c844_11201803($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['viewport'])) {$_smarty_tpl->tpl_vars['viewport'] = clone $_smarty_tpl->tpl_vars['viewport'];
$_smarty_tpl->tpl_vars['viewport']->value = 'pc'; $_smarty_tpl->tpl_vars['viewport']->nocache = null; $_smarty_tpl->tpl_vars['viewport']->scope = 0;
} else $_smarty_tpl->tpl_vars['viewport'] = new Smarty_variable('pc', null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container detail">
    <div class="tab-item detail-info">
        <?php echo picurl(stripcslashes($_smarty_tpl->tpl_vars['row']->value['goods_body']));?>

        <?php if ($_smarty_tpl->tpl_vars['row']->value['goods_price']>=5000){?><p class="special" style="display: none">重要说明：商品获得者拥有 <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
 10年免费使用权</p><?php }?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<style type="text/css">
#header2{ position:relative !important; z-index:10; top:auto; left:auto;min-width:320px}
#content{ margin-top:-3px !important}
.mini-cart{ display: none !important; }
</style>
<script type="text/javascript">
    $(function(){
        $('#content img').removeAttr('width').removeAttr('height');
    })
</script><?php }} ?>