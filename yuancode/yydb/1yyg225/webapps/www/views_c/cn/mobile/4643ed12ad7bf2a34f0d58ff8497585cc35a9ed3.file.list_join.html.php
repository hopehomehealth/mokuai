<?php /* Smarty version Smarty-3.1.13, created on 2016-03-01 10:02:05
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\lbi\list_join.html" */ ?>
<?php /*%%SmartyHeaderCode:1883556d4f81d338bb3-69449917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4643ed12ad7bf2a34f0d58ff8497585cc35a9ed3' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\lbi\\list_join.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1883556d4f81d338bb3-69449917',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'k' => 0,
    'row' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d4f81d4e43b2_20776557',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d4f81d4e43b2_20776557')) {function content_56d4f81d4e43b2_20776557($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
<div class="day-box">
    <div class="record-time"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</div>
    <ul class="record-list">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <li>
            <div class="pic"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>80),$_smarty_tpl);?>
" /> </a> </div>
            <div class="text">
                <p class="to"><a class="blue" href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a> </p>
                <p class="to">(<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
 IP：<?php echo $_smarty_tpl->tpl_vars['m']->value['ip'];?>
)</p>
                <p>参与了<span class="color"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</span>人次 <?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'H:i:s.x');?>
</p>
            </div>
        </li>
        <?php } ?>
    </ul>
</div>
<?php } ?><?php }} ?>