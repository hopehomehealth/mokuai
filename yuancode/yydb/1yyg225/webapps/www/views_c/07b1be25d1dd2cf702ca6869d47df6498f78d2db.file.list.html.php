<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:59:29
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\yunbuy\list.html" */ ?>
<?php /*%%SmartyHeaderCode:80225659769f1b9181-66869627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07b1be25d1dd2cf702ca6869d47df6498f78d2db' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\yunbuy\\list.html',
      1 => 1448704766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80225659769f1b9181-66869627',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5659769f2dcc82_15001182',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'status' => 0,
    'type' => 0,
    'posid' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5659769f2dcc82_15001182')) {function content_5659769f2dcc82_15001182($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" type="text">
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['listorders'];?>
" type="text"></td>
</td>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?> <span class="mark">赠品专区</span><?php }?></td>
 / <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 / <?php echo floor($_smarty_tpl->tpl_vars['m']->value['price']);?>
 / <?php echo $_smarty_tpl->tpl_vars['m']->value['max_qishu'];?>
</td>
</b> / <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</td>
</td>
','yunbuy','posid','buy_id')" class="c-green" title="点击设为不推荐">是</a>
','yunbuy','posid','buy_id')" class="c-red" title="点击设为推荐">否</a>
</td>
","yunbuy","is_show","buy_id")' title='点击设为隐藏'>显示</a>
","yunbuy","is_show","buy_id")' title='点击设为显示'>隐藏</a>
&com=xshow|编辑云购（<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
）' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>