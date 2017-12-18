<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:49:17
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\mobile\yunbuy\lbi\list2.html" */ ?>
<?php /*%%SmartyHeaderCode:2305576a42fd8e4163-43134311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4b47990673cdc62e56f6bed69aa0d6d28b10ed4' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\mobile\\yunbuy\\lbi\\list2.html',
      1 => 1466512208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2305576a42fd8e4163-43134311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a42fd938438_07335624',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a42fd938438_07335624')) {function content_576a42fd938438_07335624($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<div class="new-box">
    <em><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>180,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
"></a></em>
    <h5><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><span>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span><p><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</p></a></h5>
    <dl class="new-box1">
        <dt><i class="iconfont icon-jiarugouwuche" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>free<?php }?>',this)"></i></dt>
        <dd>
            <p class="new-box1-1">开奖进度<span><?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%</span></p>
            <p class="new-box1-2"><span style="width: 50%;"></span></p>
        </dd>
    </dl>
</div>
<?php } ?><?php }} ?>