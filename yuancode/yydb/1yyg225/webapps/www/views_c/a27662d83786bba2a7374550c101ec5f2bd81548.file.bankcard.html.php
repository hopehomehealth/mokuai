<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 13:27:23
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\bankcard.html" */ ?>
<?php /*%%SmartyHeaderCode:167156610a11e634e0-53032219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a27662d83786bba2a7374550c101ec5f2bd81548' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\bankcard.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167156610a11e634e0-53032219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610a12010326_41142458',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610a12010326_41142458')) {function content_56610a12010326_41142458($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <table class="list">
        <thead>
        <tr>
            <th class="oid w40">ID</th>
            <th class="w120">持卡人</th>
            <th class="w120">银行名称</th>
            <th class="w120">银行卡号</th>
            <th class="title">开户行地址</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr>
            <td class="oid"><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['bankname'];?>
</td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['bankcard'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bankaddress'];?>
</td>
        </tr>
        <?php } ?>
        <?php }else{ ?>
        <tr>
            <td colspan="5" align='center'>用户暂时没有银行账户</td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div><?php }} ?>