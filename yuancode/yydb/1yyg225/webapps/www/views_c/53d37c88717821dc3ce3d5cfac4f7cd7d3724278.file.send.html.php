<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 17:58:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/order/send.html" */ ?>
<?php /*%%SmartyHeaderCode:6640616935857af50d509d4-74744514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53d37c88717821dc3ce3d5cfac4f7cd7d3724278' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/order/send.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6640616935857af50d509d4-74744514',
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
  'unifunc' => 'content_5857af50e23c15_59129214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857af50e23c15_59129214')) {function content_5857af50e23c15_59129214($_smarty_tpl) {?><h3 class="info-tag">
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