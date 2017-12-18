<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 15:33:59
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\content\windjxajaxindex.html" */ ?>
<?php /*%%SmartyHeaderCode:15080565e9ee7a49139-84694034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90163f17765540d631e96a76c5b999120adaa99c' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\content\\windjxajaxindex.html',
      1 => 1434635914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15080565e9ee7a49139-84694034',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e9ee7af10d2_51332837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e9ee7af10d2_51332837')) {function content_565e9ee7af10d2_51332837($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listDjx']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?><?php if ($_smarty_tpl->tpl_vars['m']->value['wait_status']==0){?><li class="item-djx" id="itemDjx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
">    <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
">        <em>正在揭晓            <font class="lefttime"><font id="leftTimeJx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
"></font></font>            <font class="jx-ing" style="display: none;">开奖计算中...</font>        </em>        (第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
    </a>    <script type="text/javascript">        $(document).ready(function(){            onload_leftTime_jx('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
",'index_mobile');        });    </script></li><?php }?><?php } ?><?php }?><?php }} ?>