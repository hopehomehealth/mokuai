<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:37:19
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\content\windbitem.html" */ ?>
<?php /*%%SmartyHeaderCode:17546565975cfcf9d25-86423337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7af0ae3253789b26c74892818a40466de9309036' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\content\\windbitem.html',
      1 => 1448537370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17546565975cfcf9d25-86423337',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565975cfde2244_15947242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565975cfde2244_15947242')) {function content_565975cfde2244_15947242($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.truncate.php';
?><div class="item item-db">    <div class="itemc">        <div class="itemL scrollLoadingDiv"><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="<?php if ($_smarty_tpl->tpl_vars['m']->value['thumb']){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>150,'type'=>0),$_smarty_tpl);?>
<?php }?>" width="150" /></a></div>        <div class="itemR">            <div class="user-info">                <div class="photo"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
" target="_blank"><img class="scrollLoading scrollLoadingDiv" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" width="60" height="60" /></a></div>                <div class="txt">                    <p class="p1">获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod" target="_blank" class="color02" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>                    <p>来自：<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
</p>                    <p>幸运号码：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</span></p>                    <p>本期参与：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</span></p>                </div>            </div>            <div class="pro-info">                <p class="tit"><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['goods_name'],26);?>
</a></p>                <p>商品价值：<?php if ($_smarty_tpl->tpl_vars['m']->value['g_price']){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }?></p>                <p>揭晓时间：<?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['end_time']);?>
</p>                <p class="button"><span><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" target="_blank">查看详情</a></span></p>            </div>        </div>    </div></div><?php }} ?>