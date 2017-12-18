<?php /* Smarty version Smarty-3.1.13, created on 2016-03-13 15:15:09
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\wxmenu\news_list.html" */ ?>
<?php /*%%SmartyHeaderCode:154356e5137d4e7353-66508599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a118216f704fe48de4dc0306eaf1b48dee8df17' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\wxmenu\\news_list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154356e5137d4e7353-66508599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'wxitem' => 0,
    'm' => 0,
    'index' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56e5137d62ded2_45826674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e5137d62ded2_45826674')) {function content_56e5137d62ded2_45826674($_smarty_tpl) {?><div style="height:400px; padding:10px; width:600px; overflow:auto">
<table class="tb-goods" style="width:100%">
    <thead>
    <tr>
        <th class="oid" colspan="3">图文</th>
        <th>操作</th>
    </tr>
    </thead>

<?php  $_smarty_tpl->tpl_vars['wxitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wxitem']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wxitem']->key => $_smarty_tpl->tpl_vars['wxitem']->value){
$_smarty_tpl->tpl_vars['wxitem']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['wxitem']->key;
?>
    <tr><td colspan="5" class="sep-row"></td></tr>
    <tr class="order-head"><td colspan="5">
        <?php if (count($_smarty_tpl->tpl_vars['wxitem']->value['items'])==1){?>单图文消息<?php }else{ ?>多图文消息<?php }?>，
        创建时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['wxitem']->value['c_time']);?>
</span>，
        修改时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['wxitem']->value['c_time']);?>
</span>
    </td></tr>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['wxitem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
    <tr>
        <td class="bdl w5"></td>
        <td class="w50"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" width="50"/></td>
        <td class="bdr"><div class="oi-name"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</div></td>

        <?php if ($_smarty_tpl->tpl_vars['index']->value==0){?>
        <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['wxitem']->value['items']);?>
">
            <a href="javascript:;" class="uiBtn e2-wxmenu-editTabSet-news-<?php echo $_smarty_tpl->tpl_vars['wxitem']->value['id'];?>
">添加</a>
        </td>
        <?php }?>

    </tr>
    <?php } ?>

<?php } ?>
</table>
    <div class="e2-wxmenu-getNewsListPage">
        <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

    </div>

</div><?php }} ?>