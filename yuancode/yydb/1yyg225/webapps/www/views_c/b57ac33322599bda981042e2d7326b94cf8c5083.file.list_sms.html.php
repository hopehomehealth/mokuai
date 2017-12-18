<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 13:43:51
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\log\list_sms.html" */ ?>
<?php /*%%SmartyHeaderCode:1787356ce9497e70a90-01663596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b57ac33322599bda981042e2d7326b94cf8c5083' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\log\\list_sms.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1787356ce9497e70a90-01663596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnNo' => 0,
    'key' => 0,
    'm' => 0,
    'k' => 0,
    'q' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce94980be6c6_20040822',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce94980be6c6_20040822')) {function content_56ce94980be6c6_20040822($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><h3 class="info-tag">
    <form class="cond-form r" method="post" action="/manage/log/del_log_sms" target="iframeNewsTarget" onsubmit="if(!confirm('确认清除吗？')) return false;" style="padding: 0;">
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

    <form class="cond-form clear" action="#!log/sms" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>注册用户</option>
                <option value="mobile" <?php if ($_smarty_tpl->tpl_vars['k']->value=='mobile'){?>selected<?php }?>>手机号</option>
                <option value="getip" <?php if ($_smarty_tpl->tpl_vars['k']->value=='getip'){?>selected<?php }?>>IP地址</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <table class="list">
        <thead>
            <tr>
                <th align="left" class="w30">ID</th>
                <th align="left" class="w120">手机</th>
                <th align="left" class="w120">验证码</th>
                <th align="left" class="w120">IP地址</th>
                <th align="left" class="w160">发送时间</th>
                <th align="left" class="w160">注册时间</th>
                <th align="left" class="w160">注册用户</th>
                <th align="left">状态码</th>
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
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
</td>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['verifycode'];?>
</td>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['getip'];?>
</td>
                <td align="left"><?php if ($_smarty_tpl->tpl_vars['m']->value['dateline']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['dateline'],'Y-m-d H:i:s');?>
<?php }?></td>
                <td align="left"><?php if ($_smarty_tpl->tpl_vars['m']->value['regdateline']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['regdateline'],'Y-m-d H:i:s');?>
<?php }?></td>
                <td align="left" nowrap><?php if ($_smarty_tpl->tpl_vars['m']->value['reguid']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
<?php }?></td>
                <td class='c-gray'>
                    <?php echo $_smarty_tpl->tpl_vars['m']->value['status'];?>

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

</div>

<?php }} ?>