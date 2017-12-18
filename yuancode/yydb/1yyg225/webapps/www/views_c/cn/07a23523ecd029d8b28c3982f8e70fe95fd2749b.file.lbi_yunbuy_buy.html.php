<?php /* Smarty version Smarty-3.1.13, created on 2016-03-03 13:43:44
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\lbi_yunbuy_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:1194556d7cf10002693-50543901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07a23523ecd029d8b28c3982f8e70fe95fd2749b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\lbi_yunbuy_buy.html',
      1 => 1456976273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1194556d7cf10002693-50543901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d7cf100d0a87_13776441',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d7cf100d0a87_13776441')) {function content_56d7cf100d0a87_13776441($_smarty_tpl) {?><li class="w-quickBuyList-item">
    <div class="w-goods w-goods-l w-goods-ing">
        <div class="w-goods-pic scrollLoadingDiv">
            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
                <img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>250,'height'=>150,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" />
            </a></div>
        <p class="w-goods-title f-txtabb">
            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
        </p>
        <p class="w-goods-price">价格：<b><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['custom_price']);?>
</b></p>
        <div class="w-goods-opr">
            <p class="w-goods-opr-buy">
                <a class="w-button w-button-main w-button-l" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','buy');" href="javascript:;" style="width: 90px;">立即购买</a>
                <a class="w-button w-button-l" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','',this)" href="javascript:;" style="width:90px;">加入购物车</a> </p>
        </div>
    </div>
</li><?php }} ?>