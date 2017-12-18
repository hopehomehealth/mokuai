<?php /* Smarty version Smarty-3.1.13, created on 2015-12-08 20:07:06
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\content\windbitemindex.html" */ ?>
<?php /*%%SmartyHeaderCode:7545565d6495644bc4-97242319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07e75e3ff91cf5b70aca1e492b3063417fec51c6' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\content\\windbitemindex.html',
      1 => 1449568616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7545565d6495644bc4-97242319',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d64956e2202_73455744',
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d64956e2202_73455744')) {function content_565d64956e2202_73455744($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'F:\\WWW\\1yyg225\\system\\smarty\\plugins\\modifier.truncate.php';
?><li class="item-db">
    <em><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img width="93" src="<?php if ($_smarty_tpl->tpl_vars['m']->value['thumb']){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>93,'type'=>0),$_smarty_tpl);?>
<?php }?>"></a></em>
    <div class="new-index-2">
        <span><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['goods_name'],26);?>
</a></span>
        <p>获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
    </div>
</li><?php }} ?>