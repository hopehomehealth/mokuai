<?php /* Smarty version Smarty-3.1.13, created on 2016-03-04 16:19:20
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\bonus\list.html" */ ?>
<?php /*%%SmartyHeaderCode:1889456ce6b459b2806-11347652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '200ccb05c5d237b979f9edd49b5e7b3a3312e242' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\bonus\\list.html',
      1 => 1457079557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1889456ce6b459b2806-11347652',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce6b4719d474_02490757',
  'variables' => 
  array (
    'L' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce6b4719d474_02490757')) {function content_56ce6b4719d474_02490757($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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