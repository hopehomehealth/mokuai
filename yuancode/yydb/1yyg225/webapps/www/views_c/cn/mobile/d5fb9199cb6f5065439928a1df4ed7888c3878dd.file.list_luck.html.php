<?php /* Smarty version Smarty-3.1.13, created on 2016-03-01 19:57:58
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\lbi\list_luck.html" */ ?>
<?php /*%%SmartyHeaderCode:2167456d583c63e4398-13396006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5fb9199cb6f5065439928a1df4ed7888c3878dd' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\lbi\\list_luck.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2167456d583c63e4398-13396006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d583c654fbf1_36705958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d583c654fbf1_36705958')) {function content_56d583c654fbf1_36705958($_smarty_tpl) {?><dt class="ui-clr">
    <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span class="type-free">霸王餐区</span> <?php }?><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" class="color00"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
</dt>
<dd>
    <div class="db-img"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>200,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></a></div>
    <div class="db-txt color03">
        <p>总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
人次</p>
        <p>幸运号码：<strong class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</strong></p>
        <p>本次参与：<?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</p>
        <p>揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d H:i:s.x');?>
</p>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['is_award']!=1){?>
        <div>
            <form action="<?php echo url('/order/buy');?>
" method="post" style="display: inline-block">
                <input class="btn-small" style="margin-top:5px;" type="submit" value="领奖">
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">
                <input type="hidden" name="type" value="3">
            </form>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['a_money']==1&&$_smarty_tpl->tpl_vars['m']->value['goods_real_price']>0){?>
            <input class="btn-small btn-disable" style="margin-top:5px;" type="button" onclick="a_money('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" value="折现￥<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_real_price'];?>
">
            <?php }?>
        </div>
        <?php }?>
    </div>
</dd><?php }} ?>