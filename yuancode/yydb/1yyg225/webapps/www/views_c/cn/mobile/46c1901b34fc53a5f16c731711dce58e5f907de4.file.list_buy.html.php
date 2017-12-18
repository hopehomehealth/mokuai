<?php /* Smarty version Smarty-3.1.13, created on 2016-12-21 20:19:30
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/lbi/list_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:674439794585a7352436401-84735362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46c1901b34fc53a5f16c731711dce58e5f907de4' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/lbi/list_buy.html',
      1 => 1481177921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '674439794585a7352436401-84735362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_585a735245dee3_29624783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585a735245dee3_29624783')) {function content_585a735245dee3_29624783($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<li class="ui-clr">
    <div class="pic">
        <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src']),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" /></a>
    </div>
    <div class="info">
        <p class="title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
        <p class="price">
            价格：<b><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['custom_price']);?>
</b><br>
            <s><?php if ($_smarty_tpl->tpl_vars['m']->value['goods_price']>$_smarty_tpl->tpl_vars['m']->value['custom_price']){?>市场价：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }?></s>
        </p>
    </div>
    <button class="add-btn" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>free<?php }?>',this)"><span class="ap-icon icon-cart"></span></button>
</li>
<?php } ?><?php }} ?>