<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 13:43:54
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\log\list_maillog.html" */ ?>
<?php /*%%SmartyHeaderCode:646156ce949aba2246-24583551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abe7c04b46370e2332358c7de1059c0cbfa865b8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\log\\list_maillog.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '646156ce949aba2246-24583551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnNo' => 0,
    'key' => 0,
    'm' => 0,
    'email' => 0,
    'content' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce949acee654_21337821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce949acee654_21337821')) {function content_56ce949acee654_21337821($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><h3 class="info-tag">
    <form class="cond-form r" method="post" action="/manage/log/del_log_maillog" target="iframeNewsTarget" onsubmit="if(!confirm('确认清除吗？')) return false;" style="padding: 0;">
        <select name="log_date">
            <option value="0">-请选择清除的日期-</option>
            <option value="7">一周之前</option>
            <option value="30">一个月之前</option>
            <option value="90">三个月之前</option>
            <option value="180">半年之前</option>
            <option value="365">一年之前</option>
        </select>
        <button type="submit" class="uiBtn BtnOrange" style="padding:1px 10px;">清除日志</button>
    </form>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
    <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNo']->value==$_smarty_tpl->tpl_vars['key']->value){?> BtnBlue<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>
    <?php } ?>
</h3>

<div class="html-box">

    <form class="cond-form clear" action="#!log/smslog" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <label class="ui-label">邮箱地址：</label>
            <input id="email" class="form-i w100" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" type="text">
            <label class="ui-label">邮件内容：</label>
            <input id="content" class="form-i w360" name="content" value="<?php echo $_smarty_tpl->tpl_vars['content']->value;?>
" type="text">
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <table class="list">
        <thead>
            <tr>
                <th align="left" class="w30">ID</th>
                <th align="left" class="w120">邮箱</th>
                <th align="left">邮件内容</th>
                <th align="left">邮件模板</th>
                <th align="left" class="w160">发送时间</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['email'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['tpl'];?>
</td>
                <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['send_time'],'Y-m-d H:i:s');?>
</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
    </div>
    </form>

</div><?php }} ?>