<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 13:41:26
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\share_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:984856d67d060638b0-77704651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e44989be3829041ff30ec87186b1232613f289d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\share_detail.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '984856d67d060638b0-77704651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'share' => 0,
    'info' => 0,
    'db_info' => 0,
    'new_buy' => 0,
    'L' => 0,
    'cj_info' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d67d063ba5c7_15301290',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d67d063ba5c7_15301290')) {function content_56d67d063ba5c7_15301290($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="content" class="container shareDetail">
    <p class="title"><?php echo $_smarty_tpl->tpl_vars['share']->value['title'];?>
</p>
    <div class="info">
        <p>获奖商品：<a href="<?php echo $_smarty_tpl->tpl_vars['info']->value['url'];?>
" class="color04">
            <?php if ($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?>(第<?php echo $_smarty_tpl->tpl_vars['info']->value['qishu'];?>
期)<?php }?>
            <?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
</a>
        </p>
        <p>获得者：<a href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['share']->value['mid'];?>
" class="color04"><?php echo $_smarty_tpl->tpl_vars['share']->value['username'];?>
</a></p>
        <?php if ($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?>
        <div class="total">总共参与：<span class="color"><?php echo $_smarty_tpl->tpl_vars['db_info']->value['qty'];?>
</span>人次</div>
        <div class="code">幸运号码：<span class="color"><?php echo $_smarty_tpl->tpl_vars['db_info']->value['luck_code'];?>
</span></div>
        <div class="time">揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['info']->value['end_time'],'Y-m-d H:i:s.x');?>
</div>
        <?php if ($_smarty_tpl->tpl_vars['new_buy']->value&&$_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?>
        <div class="more"><a class="color02" href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']);?>
" target="_blank">第<?php echo $_smarty_tpl->tpl_vars['new_buy']->value['qishu'];?>
期正在进行中…</a></div>
        <?php }?>
        <?php }elseif($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_WIN')){?>
        <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
随机码：<span class="color"><?php echo $_smarty_tpl->tpl_vars['cj_info']->value['cod'];?>
</span> </p>
        <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cj_info']->value['cod_time'],'Y-m-d H:i:s');?>
</p>
        <?php }elseif($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_AUC')){?>
        <p>最后出价：<span class="color"><?php echo price_format($_smarty_tpl->tpl_vars['cj_info']->value['bid_price']);?>
</span></p>
        <p>出价时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cj_info']->value['bid_time'],'Y-m-d H:i:s');?>
</p>
        <?php }?>
    </div>
    <div class="all">
        <div class="txt"><?php echo nl2br($_smarty_tpl->tpl_vars['share']->value['content']);?>
</div>
        <div class="pics">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = unserialize($_smarty_tpl->tpl_vars['share']->value['thumbs']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <p><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value),$_smarty_tpl);?>
"/></p>
            <?php } ?>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>