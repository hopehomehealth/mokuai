<?php /* Smarty version Smarty-3.1.13, created on 2016-12-13 22:53:34
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/lbi/list_db.html" */ ?>
<?php /*%%SmartyHeaderCode:57702736258500b6e61b512-22626023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8116a527af60c50d6ed06e0a2c6a39cfe48b18d7' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/lbi/list_db.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57702736258500b6e61b512-22626023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58500b6e6773b3_00827055',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58500b6e6773b3_00827055')) {function content_58500b6e6773b3_00827055($_smarty_tpl) {?><div class="pic">
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