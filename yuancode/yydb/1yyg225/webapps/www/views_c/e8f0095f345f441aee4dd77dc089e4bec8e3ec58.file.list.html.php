<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:07:03
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/share/list.html" */ ?>
<?php /*%%SmartyHeaderCode:16508582145845202761a648-58443606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8f0095f345f441aee4dd77dc089e4bec8e3ec58' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/share/list.html',
      1 => 1469247154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16508582145845202761a648-58443606',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'common' => 0,
    'L' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584520276ce6e5_91531764',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584520276ce6e5_91531764')) {function content_584520276ce6e5_91531764($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" type="text">
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb'];?>
" width="60" /></a></td>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['obj_name'];?>
</a></td>
</span>
minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" target="_blank" class="c-orange">(<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
)</a><br/>
</span><br/>
</i>
','share','is_show','id')" class="c-green" title="点击隐藏">显示</a>
','share','is_show','id')" class="c-red" title="点击显示">隐藏</a>
",0)' title='点击设为普通'>精华</a>
个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
）？")) share.is_rec("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
",1)' title='点击设为精华'>普通</a>
' class='iconfont icon-a' title='编辑' target="_blank">&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>