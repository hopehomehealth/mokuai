<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:29:36
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\timing\index.html" */ ?>
<?php /*%%SmartyHeaderCode:20820565d5913c3f150-47505753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd00848f5bdf9258ae9b55cfbab6f29de854fd4b9' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\timing\\index.html',
      1 => 1448972852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20820565d5913c3f150-47505753',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d5913cec198_11788162',
  'variables' => 
  array (
    'data' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d5913cec198_11788162')) {function content_565d5913cec198_11788162($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\WWW\\1yyg225\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</b></a>）（下期开奖日：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cod']['nexttime'],'Y-m-d 15:30');?>
）
</b></a>） （所有已结束并未解冻的竞拍出价保证金，单次最多解冻<?php echo $_smarty_tpl->tpl_vars['data']->value['frozenNum'];?>
条记录）</span>
</span></p>
</span></p>
</span></p>
</span></p>
</span></p>