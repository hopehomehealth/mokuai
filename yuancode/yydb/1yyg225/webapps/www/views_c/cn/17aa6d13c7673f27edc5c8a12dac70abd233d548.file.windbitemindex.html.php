<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:10:53
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\content\windbitemindex.html" */ ?>
<?php /*%%SmartyHeaderCode:18890565d803d675156-91457543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17aa6d13c7673f27edc5c8a12dac70abd233d548' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\content\\windbitemindex.html',
      1 => 1448540690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18890565d803d675156-91457543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d803d7059f1_17818030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d803d7059f1_17818030')) {function content_565d803d7059f1_17818030($_smarty_tpl) {?><div class="item item-db" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
    <div class="pic">
        <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"><img src="<?php if ($_smarty_tpl->tpl_vars['m']->value['thumb']){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>102,'height'=>102,'type'=>0),$_smarty_tpl);?>
<?php }?>" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" /></a>
    </div>
    <p><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>

    商品价值：<span class="color01"><?php if ($_smarty_tpl->tpl_vars['m']->value['g_price']){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }?></span><br>
    揭晓时间：<span class="color01"><?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['end_time']);?>
</span><br>
    获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod" target="_blank" class="color02" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a><br>

    <?php if ($_smarty_tpl->tpl_vars['m']->value['new_buy']){?>
    <a class="btn-go-green btn-index-01" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['new_buy']['buy_id']));?>
">第<?php echo $_smarty_tpl->tpl_vars['m']->value['new_buy']['qishu'];?>
期进行中...</a>
    <?php }?>
</div><?php }} ?>