<?php /* Smarty version Smarty-3.1.13, created on 2016-06-02 13:50:43
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\plate\log.html" */ ?>
<?php /*%%SmartyHeaderCode:75225734159944aa27-57731472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5fa0369530a443e4608b639877fed418f4e95ed' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\plate\\log.html',
      1 => 1464846640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75225734159944aa27-57731472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5734159953ec63_66288220',
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnNo' => 0,
    'key' => 0,
    'm' => 0,
    'k' => 0,
    'q' => 0,
    'winConfig' => 0,
    'star' => 0,
    'total' => 0,
    'L' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5734159953ec63_66288220')) {function content_5734159953ec63_66288220($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><h3 class="info-tag">
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>
" type="text">
 $_from = $_smarty_tpl->tpl_vars['winConfig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<?php }?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['key']==$_smarty_tpl->tpl_vars['star']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>
：
</b>
</b>
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</td>
</td>
</td>
</td>
</td>
</td>
</div>