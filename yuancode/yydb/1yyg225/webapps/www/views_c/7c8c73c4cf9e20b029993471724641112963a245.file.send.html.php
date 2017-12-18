<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 01:53:37
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/templates/send.html" */ ?>
<?php /*%%SmartyHeaderCode:111721306584aefa17011f5-35279824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c8c73c4cf9e20b029993471724641112963a245' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/templates/send.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111721306584aefa17011f5-35279824',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'type' => 0,
    'status' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584aefa17ccd56_15137693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584aefa17ccd56_15137693')) {function content_584aefa17ccd56_15137693($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">

    <form class="cond-form clear" action="#!templates/send" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="content" <?php if ($_smarty_tpl->tpl_vars['k']->value=='content'){?>selected<?php }?>>发送内容</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <select name="type">
                <option value="">-发送类型-</option>
                <option value="mail" <?php if ($_smarty_tpl->tpl_vars['type']->value=='mail'){?>selected<?php }?>>邮件</option>
                <option value="sms" <?php if ($_smarty_tpl->tpl_vars['type']->value=='sms'){?>selected<?php }?>>短信</option>
            </select>
            <select name="status">
                <option value="">-状态-</option>
                <option value="99" <?php if ($_smarty_tpl->tpl_vars['status']->value=='99'){?>selected<?php }?>>未发送</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>selected<?php }?>>已发送</option>
            </select>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
            <button type="button" class="uiBtn BtnOrange" onclick="cron.init('sendtpl')">点击全部发送</button>
        </div>
    </form>

    <form name="formlist" target="iframeNewsTarget" method="post" action="">
        <table class="list">
            <thead>
            <tr>
                <th class="w30">ID</th>
                <th align="left" class="w120">用户名</th>
                <th align="left">发送模板</th>
                <th align="left">发送内容</th>
                <th align="left" class="w160">添加时间</th>
                <th align="left" class="w160">发送时间</th>
                <th align="left">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['template_code'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>
</td>
                <td align="left"><?php if ($_smarty_tpl->tpl_vars['m']->value['add_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['add_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>---<?php }?></td>
                <td align="left"><?php if ($_smarty_tpl->tpl_vars['m']->value['send_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['send_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>---<?php }?></td>
                <td class='c-gray'>
                    <a href='javascript:;' onclick="main.confirm_del('templates/del_send','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
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