<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 12:37:38
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\windbitemindex.html" */ ?>
<?php /*%%SmartyHeaderCode:3240156610233207f85-05292264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eb897bdb6e4a5efbb44705b4f1aab2fae694623' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\windbitemindex.html',
      1 => 1456884337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3240156610233207f85-05292264',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566102332d1c48_07014849',
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566102332d1c48_07014849')) {function content_566102332d1c48_07014849($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
?><li class="item-db">
    <em><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img width="93" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>93,'type'=>0),$_smarty_tpl);?>
"></a></em>
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