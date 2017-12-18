<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:14:42
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/log/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1321796324584521f221fb88-58067472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f3b70cb5dd5e3bddfe151e50686ca5af175fb64' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/log/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1321796324584521f221fb88-58067472',
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
  'unifunc' => 'content_584521f22a9e80_60816995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584521f22a9e80_60816995')) {function content_584521f22a9e80_60816995($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><h3 class="info-tag">
    <form class="cond-form r" method="post" action="/manage/log/del_log" target="iframeNewsTarget" onsubmit="if(!confirm('确认清除吗？')) return false;" style="padding: 0;">
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

    <form class="cond-form clear" action="#!log/index" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>操作者</option>
                <option value="log_info" <?php if ($_smarty_tpl->tpl_vars['k']->value=='log_info'){?>selected<?php }?>>操作记录</option>
                <option value="ip_address" <?php if ($_smarty_tpl->tpl_vars['k']->value=='ip_address'){?>selected<?php }?>>IP地址</option>
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
                <th align="left" class="w30">编号</th>
                <th align="left" class="w120">操作者</th>
                <th align="left" class="w160">操作日期</th>
                <th align="left" class="w140">IP地址</th>
                <th align="left">操作记录</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['log_id'];?>
</td>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</td>
                <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['log_time'],'Y-m-d H:i:s');?>
</td>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['ip_address'];?>
</td>
                <td class='c-gray'>
                    <?php echo $_smarty_tpl->tpl_vars['m']->value['log_info'];?>

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