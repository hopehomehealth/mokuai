<?php /* Smarty version Smarty-3.1.13, created on 2016-03-31 10:46:04
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\content\windjxajaxindex.html" */ ?>
<?php /*%%SmartyHeaderCode:296275660f5fab75a18-89604050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40ba14a4a032170bf318c34cabccc60bf5b060d9' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\content\\windjxajaxindex.html',
      1 => 1459391790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296275660f5fab75a18-89604050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f5facf44e5_80206728',
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f5facf44e5_80206728')) {function content_5660f5facf44e5_80206728($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?>
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listDjx']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['wait_status']==0){?>
<div class="item itemDjx" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" id="itemDjx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" q="<?php echo $_smarty_tpl->tpl_vars['m']->value['qihao'];?>
">
    <div class="icon"></div>
    <div class="pic">
        <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>102,'height'=>102,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" /></a>
    </div>
    <p><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>

    商品价值：<span class="color01"><?php if ($_smarty_tpl->tpl_vars['m']->value['goods_price']){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
<?php }?></span><br>
    <span class="color03">已满员</span><br>
    <div class="jx-count">
        <label>剩余时间：</label>
        <strong id="leftTimeJx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
">00:00:00</strong>
    </div>
    <div class="jx-count jx-ing" style="display:none;">开奖计算中...</div>
    <script type="text/javascript">
        $(document).ready(function(){
            onload_leftTime_jx('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
",'index');
        });
    </script>
</div>
<?php }?>
<?php } ?>
<?php }?><?php }} ?>