<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 19:33:08
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\content\winDbItem.html" */ ?>
<?php /*%%SmartyHeaderCode:28264565990f4e999c3-90563691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1eff470407fd3b40d9f992b3d1427b5a57a1d51f' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\content\\winDbItem.html',
      1 => 1448537370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28264565990f4e999c3-90563691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565990f507ed28_89497703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565990f507ed28_89497703')) {function content_565990f507ed28_89497703($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.truncate.php';
?><div class="item item-db">
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="<?php if ($_smarty_tpl->tpl_vars['m']->value['thumb']){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>150,'type'=>0),$_smarty_tpl);?>
<?php }?>" width="150" /></a></div>
#dbCod" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
" target="_blank"><img class="scrollLoading scrollLoadingDiv" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" width="60" height="60" /></a></div>
#dbCod" target="_blank" class="color02" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
</p>
</span></p>
</span></p>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['goods_name'],26);?>
</a></p>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }?></p>
</p>
" target="_blank">查看详情</a></span></p>