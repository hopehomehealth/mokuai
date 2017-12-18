<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:33:08
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\member\lbi\list_luck.html" */ ?>
<?php /*%%SmartyHeaderCode:19891565fa9e41fada2-80529116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1c84543acafdad81638c10aef9358c7ab5cfd07' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\member\\lbi\\list_luck.html',
      1 => 1435324868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19891565fa9e41fada2-80529116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa9e42be3e6_79771875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa9e42be3e6_79771875')) {function content_565fa9e42be3e6_79771875($_smarty_tpl) {?><dt class="ui-clr">
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
        <?php if ($_smarty_tpl->tpl_vars['m']->value['is_award']!=1){?><div><form action="<?php echo url('/order/buy');?>
" method="post"><input class="btn-small" style="margin-top:5px;" type="submit" value="领奖"><input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><input type="hidden" name="type" value="3"></form></div><?php }?>
    </div>
</dd><?php }} ?>