<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:36:36
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\plate\config.html" */ ?>
<?php /*%%SmartyHeaderCode:256865768a83410a728-98463791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87400d104d5e5cc8a54fdcee06143b25c5577320' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\plate\\config.html',
      1 => 1464775536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '256865768a83410a728-98463791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'winConfig' => 0,
    'm' => 0,
    'points' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a8341d5c16_43373402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a8341d5c16_43373402')) {function content_5768a8341d5c16_43373402($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss', maxDate:'#F{ $dp.$D(\'end_time\') }' })" autocomplete="false" /> ~
" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss', minDate:'#F{ $dp.$D(\'start_time\') }' })" autocomplete="false" />
" /> <span>人次（不含免费区），可以获得一次大转盘机会；</span><br>
" /> <span>拍币，可以获得一次大转盘机会。</span><br>
 $_from = $_smarty_tpl->tpl_vars['winConfig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
：<?php if ($_smarty_tpl->tpl_vars['m']->value['number']){?>获得<?php }?></span>
]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value[('plate_get_points_').($_smarty_tpl->tpl_vars['m']->value['key'])])===null||$tmp==='' ? 0 : $tmp);?>
" />
]" style="vertical-align: middle">
 $_from = $_smarty_tpl->tpl_vars['points']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
" <?php if ($_smarty_tpl->tpl_vars['config']->value[('plate_get_type_').($_smarty_tpl->tpl_vars['m']->value['key'])]==$_smarty_tpl->tpl_vars['n']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</option>
]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value[('plate_points_').($_smarty_tpl->tpl_vars['m']->value['key'])])===null||$tmp==='' ? 0 : $tmp);?>
" />