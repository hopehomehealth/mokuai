<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 22:46:18
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\lbi\list_db.html" */ ?>
<?php /*%%SmartyHeaderCode:1900056610b46961b18-07377158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b85e05c6efb2e38356e5bfddd28a635a84cd523' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\lbi\\list_db.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1900056610b46961b18-07377158',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610b46a8d532_53301806',
  'variables' => 
  array (
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610b46a8d532_53301806')) {function content_56610b46a8d532_53301806($_smarty_tpl) {?><div class="pic">
    <a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>200,'type'=>0),$_smarty_tpl);?>
" /></a>
</div>
<div class="info">
    <p>获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod" class="color"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
    <p>本期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
：<span class="color"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</span>人次</p>
    <p>幸运码：<span class="color"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</span></p>
    <p>揭晓时间：<span><?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['end_time']);?>
</span></p>
</div><?php }} ?>