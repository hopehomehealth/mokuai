<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 20:27:35
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\timing\index.html" */ ?>
<?php /*%%SmartyHeaderCode:32555565d921cbea546-58276036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '520d15f202683d73031b94c40f865aab2c297bf5' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\timing\\index.html',
      1 => 1448972852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32555565d921cbea546-58276036',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d921cc5f865_50998062',
  'variables' => 
  array (
    'data' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d921cc5f865_50998062')) {function content_565d921cc5f865_50998062($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\lnest\\1yyg225\\system\\smarty\\plugins\\modifier.date_format.php';
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