<?php /* Smarty version Smarty-3.1.13, created on 2016-03-29 14:00:16
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\content\windbitem.html" */ ?>
<?php /*%%SmartyHeaderCode:303875660faff4aef56-24626785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce18631445fbe861f0dfc09888cb777943ba785a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\content\\windbitem.html',
      1 => 1459153292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303875660faff4aef56-24626785',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660faff65ba10_10619992',
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660faff65ba10_10619992')) {function content_5660faff65ba10_10619992($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
?><div class="item item-db">
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>150,'type'=>0),$_smarty_tpl);?>
" width="150" /></a></div>
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
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
<?php }?></p>
</p>
" target="_blank">查看详情</a></span></p>