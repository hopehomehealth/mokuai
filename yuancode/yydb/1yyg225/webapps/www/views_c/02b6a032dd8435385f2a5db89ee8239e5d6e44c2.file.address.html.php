<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 16:08:47
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\address.html" */ ?>
<?php /*%%SmartyHeaderCode:244056610a0ec848b9-04039878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02b6a032dd8435385f2a5db89ee8239e5d6e44c2' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\address.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244056610a0ec848b9-04039878',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610a0ed88433_61821194',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610a0ed88433_61821194')) {function content_56610a0ed88433_61821194($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <table class="list">
        <thead>
        <tr>
            <th class="oid w40">ID</th>
            <th class="w120">收件人</th>
            <th class="w120">所在地区</th>
            <th class="title">街道地址</th>
            <th class="w80">邮编</th>
            <th class="w80">手机</th>
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
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['area'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['address'];?>
</td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['zip'];?>
</td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
</td>
        </tr>
        <?php } ?>
        <?php }else{ ?>
        <tr>
            <td colspan="6" align='center'>用户暂时没有收货地址</td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div><?php }} ?>