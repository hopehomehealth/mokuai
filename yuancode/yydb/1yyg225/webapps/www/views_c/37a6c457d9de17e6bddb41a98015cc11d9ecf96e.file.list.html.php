<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:14:36
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/templates/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1420806924584521ec6c61b8-41320338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37a6c457d9de17e6bddb41a98015cc11d9ecf96e' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/templates/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1420806924584521ec6c61b8-41320338',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584521ec74bc04_20225840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584521ec74bc04_20225840')) {function content_584521ec74bc04_20225840($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!templates/index" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="type">
                <option value="mail" <?php if ($_smarty_tpl->tpl_vars['type']->value=='mail'){?>selected<?php }?>>邮件模板</option>
                <option value="sms" <?php if ($_smarty_tpl->tpl_vars['type']->value=='sms'){?>selected<?php }?>>短信模板</option>
            </select>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>
    <form name="formlist" target="iframeNewsTarget" method="post" action="">
        <table class="list">
            <thead>
            <tr>
                <th align="left">模板名称【标识】</th>
                <th class="w140">修改日期</th>
                <th class="w140">最后发送</th>
                <th class="w100">发送次数</th>
                <th class="w40">系统模板</th>
                <th class="w40">状态</th>
                <th class="w60">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['template_subject'];?>
<span class="c-gray">【<?php echo $_smarty_tpl->tpl_vars['m']->value['template_code'];?>
】</span></td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['last_modify'],'Y-m-d H:i:s');?>
</td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['last_send'],'Y-m-d H:i:s');?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['send_number'];?>
</td>
                <td align="center">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_system']==1){?>
                    <span class="c-green">√</span>
                    <?php }else{ ?>
                    <span class="c-red">×</span>
                    <?php }?>
                </td>
                <td align="center">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['template_id'];?>
','templates','status','template_id')" class="c-green" title="点击禁用">开启</a>
                    <?php }else{ ?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['template_id'];?>
','templates','status','template_id')" class="c-red" title="点击开启">禁用</a>
                    <?php }?>
                </td>
                <td class='opera' align='center' nowrap>
                    <a href='#!templates/edit/?code=<?php echo $_smarty_tpl->tpl_vars['m']->value['template_code'];?>
&com=xshow|编辑模板（<?php echo $_smarty_tpl->tpl_vars['m']->value['template_code'];?>
）' class='iconfont icon-a' title='编辑'>&#xe603;</a>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_system']==0){?>
                    <a href='javascript:;' onclick="main.confirm_del('templates/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['template_id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
                    <?php }?>
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