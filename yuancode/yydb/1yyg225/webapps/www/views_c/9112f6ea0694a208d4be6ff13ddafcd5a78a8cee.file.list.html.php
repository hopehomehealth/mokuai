<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:05:50
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/content/list.html" */ ?>
<?php /*%%SmartyHeaderCode:151392751758451fdee89491-68022315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9112f6ea0694a208d4be6ff13ddafcd5a78a8cee' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/content/list.html',
      1 => 1468326728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151392751758451fdee89491-68022315',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'moduleinfo' => 0,
    'data' => 0,
    'listshow' => 0,
    'l' => 0,
    'fieldsinfo' => 0,
    'm' => 0,
    'key' => 0,
    's' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451fdf017017_26687530',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451fdf017017_26687530')) {function content_58451fdf017017_26687530($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" name="xform" onsubmit="return xForm.submit(this)" method="get">

 $_from = $_smarty_tpl->tpl_vars['listshow']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
</th>
</th>
</th>
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
 $_from = $_smarty_tpl->tpl_vars['listshow']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>

','<img src=\'<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb'][0]['path'];?>
\' />',{ btnTrue:false,hideBtn:true })" class="iconfont c-green seePic" title="查看缩略图" onmousemove="main.seepic(this)">&#xe602;</a><?php }?>
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
','<?php echo $_smarty_tpl->tpl_vars['moduleinfo']->value['name'];?>
')" class="<?php if ($_smarty_tpl->tpl_vars['key']->value!=0){?>c-green<?php }else{ ?>c-red<?php }?>" title="当前<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
状态"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</a>
状态"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</span>
</td>
?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑内容' class='iconfont icon-a' title='编辑'>&#xe603;</a>
','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>
')">更新排序</button>