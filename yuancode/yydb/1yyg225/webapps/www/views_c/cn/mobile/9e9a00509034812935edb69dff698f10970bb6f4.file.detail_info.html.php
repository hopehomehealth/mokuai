<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 12:44:46
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\detail_info.html" */ ?>
<?php /*%%SmartyHeaderCode:1238156cfd83ef2b224-34270390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e9a00509034812935edb69dff698f10970bb6f4' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\detail_info.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1238156cfd83ef2b224-34270390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cfd83f1c0190_80966406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cfd83f1c0190_80966406')) {function content_56cfd83f1c0190_80966406($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['viewport'])) {$_smarty_tpl->tpl_vars['viewport'] = clone $_smarty_tpl->tpl_vars['viewport'];
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