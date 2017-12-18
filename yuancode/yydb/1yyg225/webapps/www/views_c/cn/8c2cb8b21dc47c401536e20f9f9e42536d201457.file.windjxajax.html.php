<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:52:26
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\content\windjxajax.html" */ ?>
<?php /*%%SmartyHeaderCode:23090565d89fa1f3139-09353317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c2cb8b21dc47c401536e20f9f9e42536d201457' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\content\\windjxajax.html',
      1 => 1448531972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23090565d89fa1f3139-09353317',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d89fa27bcd1_81405675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d89fa27bcd1_81405675')) {function content_565d89fa27bcd1_81405675($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?>
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listDjx']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['wait_status']==0){?>
<div class="item item-djx" id="itemDjx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" q="<?php echo $_smarty_tpl->tpl_vars['m']->value['qihao'];?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==0||$_smarty_tpl->tpl_vars['key']->value%3==0){?> style="margin-left:-1px;width:393px;"<?php }?>>
    <s></s>
    <div class="itemc">
        <div class="itemL scrollLoadingDiv"><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>150,'type'=>0),$_smarty_tpl);?>
" width="150" /></a></div>
        <div class="itemR">
            <div class="pro-info">
                <p class="tit" style="max-height:60px;"><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                <p>商品价值：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
</p>
                <p><span class="btn-ymy">已满员</span></p>
                <div class="jx-time">
                    <p>揭晓倒计时</p>
                    <cite id="leftTimeJx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
">载入中...</cite>
                </div>
                <div class="jx-ing" style="display: none;">开奖计算中...</div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        onload_leftTime_jx('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
");
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php } ?>
<?php }?><?php }} ?>