<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:19:29
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/bonus/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1702009709584909816db061-26334434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '497f69f0a470d0dde1bcdebb32926aeceb98e8a5' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/bonus/list.html',
      1 => 1481177921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1702009709584909816db061-26334434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58490981756904_27347798',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58490981756904_27347798')) {function content_58490981756904_27347798($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

为线上功能，发放给会员后，会员下单时可直接充当余额使用</li>
为自动赠送类型</li>
给会员使用</li>
名称</th>
价值</th>
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</td>
</td>
</b><span class="c-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['money_type_title'];?>
</span></td>
</span><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['send_type_title'];?>
<?php }?></td>
</td>
?com=xshow|发放<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
' class='iconfont icon-a' title='发放<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
'>&#xe604;</a>
' class='iconfont icon-a' title='查看发放的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
'>&#xe605;</a>
&com=xshow|编辑<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
(<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
)' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>