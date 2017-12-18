<?php /* Smarty version Smarty-3.1.13, created on 2017-02-24 03:50:44
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/lbi/list2.html" */ ?>
<?php /*%%SmartyHeaderCode:30327472258451d2b5a30a1-84545151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9df1819d08f455a1cf8283bcabd1864efac32316' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/lbi/list2.html',
      1 => 1487750176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30327472258451d2b5a30a1-84545151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d2b5edf01_38115215',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d2b5edf01_38115215')) {function content_58451d2b5edf01_38115215($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<div class="new-box" style="position: relative">
    <?php if ($_smarty_tpl->tpl_vars['m']->value['price']>1){?><span class="zq_ico" style="position: absolute;right:0;top:0;"><?php echo num2char($_smarty_tpl->tpl_vars['m']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?>
    <em><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>180,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
"></a></em>
    <h5><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><span></span><p><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</p></a></h5>
    <dl class="new-box1">
        <dt><i class="iconfont icon-jiarugouwuche" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>free<?php }?>',this)"></i></dt>
        <dd>
            <p class="new-box1-1">揭晓进度<span><?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%</span></p>
            <p class="new-box1-2"><span style="width: <?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%;"></span></p>
        </dd>
    </dl>
</div>
<?php } ?><?php }} ?>