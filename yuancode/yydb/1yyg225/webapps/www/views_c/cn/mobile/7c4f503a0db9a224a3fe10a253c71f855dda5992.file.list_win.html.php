<?php /* Smarty version Smarty-3.1.13, created on 2016-03-08 12:29:30
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\lbi\list_win.html" */ ?>
<?php /*%%SmartyHeaderCode:1505356de552a669915-37516372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c4f503a0db9a224a3fe10a253c71f855dda5992' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\lbi\\list_win.html',
      1 => 1457144129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1505356de552a669915-37516372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56de552a946030_37124306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de552a946030_37124306')) {function content_56de552a946030_37124306($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
<li>
    <div class="win-title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><span class="color">第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期</span><?php if ($_smarty_tpl->tpl_vars['m']->value['last_dbtime']){?>( 揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
 )<?php }?></a></div>
    <div class="win-cont ui-clr">
        <div class="win-pic"><a href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
#dbCod"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80'),$_smarty_tpl);?>
"></a></div>
        <div class="win-detail">
            <p class="to">获奖者：<a class="blue" href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
#dbCod"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
            <p class="to gray">( <?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
 IP：<?php echo $_smarty_tpl->tpl_vars['m']->value['ip'];?>
 )</p>
            <p>幸运号码：<span class="color"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</span> </p>
            <p>本期参与：<?php echo $_smarty_tpl->tpl_vars['m']->value['mid_buy_num'];?>
人次</p>
            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d H:i:s.x');?>
</p>
        </div>
    </div>
</li>
<?php } ?><?php }} ?>