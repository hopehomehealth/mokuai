<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:47:55
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\send.html" */ ?>
<?php /*%%SmartyHeaderCode:1059356ce796bbdb4b3-45153710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd54840d93a84db790be301cd6dc8660dabb68f4' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\send.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1059356ce796bbdb4b3-45153710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'g' => 0,
    'k' => 0,
    'express' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce796bdb1739_88575371',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce796bdb1739_88575371')) {function content_56ce796bdb1739_88575371($_smarty_tpl) {?><h3 class="info-tag">
</span>，
</span>
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['g']->key;
?>
" style="width:70px" /></td>
</div>
</div>
">
</b>
[<?php echo $_smarty_tpl->tpl_vars['order']->value['mobile'];?>
]</div>
 <?php echo $_smarty_tpl->tpl_vars['order']->value['deliver'];?>
</div><?php }?>
" />
" id="oldprice"/>
</textarea>
" />
 $_from = $_smarty_tpl->tpl_vars['express']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value['express_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>
" id="express_no"/>