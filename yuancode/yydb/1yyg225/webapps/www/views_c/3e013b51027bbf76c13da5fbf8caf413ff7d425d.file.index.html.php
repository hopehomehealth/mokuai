<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:19:11
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\timing\index.html" */ ?>
<?php /*%%SmartyHeaderCode:16285659718f5dc752-39020369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e013b51027bbf76c13da5fbf8caf413ff7d425d' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\timing\\index.html',
      1 => 1434441033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16285659718f5dc752-39020369',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5659718f681a28_90128549',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5659718f681a28_90128549')) {function content_5659718f681a28_90128549($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.date_format.php';
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