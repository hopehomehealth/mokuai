<?php /* Smarty version Smarty-3.1.13, created on 2016-12-20 14:25:14
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/bonus/list_user_bonus.html" */ ?>
<?php /*%%SmartyHeaderCode:3532975495858cecaf2af46-58250301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c09bd47017cf218e59986188bc3d4e13141bd007' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/bonus/list_user_bonus.html',
      1 => 1481178449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3532975495858cecaf2af46-58250301',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'status' => 0,
    'L' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5858cecb11a770_40715106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5858cecb11a770_40715106')) {function content_5858cecb11a770_40715106($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" type="text">
序列号</th>
名称/价值</th>
订单号</th>
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</td>
</td>
<br>
</b><span class="c-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['money_type_title'];?>
</span>
<?php }else{ ?>---<?php }?><br>
<?php }else{ ?>---<?php }?>
" target="_blank" class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</a>
</span>
</td>
<?php }else{ ?>---<?php }?><br>

')" class='iconfont icon-a' title='移除'>&#xe606;</a>
</div>