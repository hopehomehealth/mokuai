<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:19:11
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\timing\index.html" */ ?>
<?php /*%%SmartyHeaderCode:16285659718f5dc752-39020369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e013b51027bbf76c13da5fbf8caf413ff7d425d' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\timing\\index.html',
      1 => 1434441033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16285659718f5dc752-39020369',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5659718f681a28_90128549',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5659718f681a28_90128549')) {function content_5659718f681a28_90128549($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <table class="table-list">        <tbody>        <?php if (1==2){?>        <tr class="table-h3">            <td colspan="2">批量处理</td>        </tr>        <tr>            <td class="td-label">                <?php if ($_smarty_tpl->tpl_vars['data']->value['cod']['status']==1){?>                <button type="button" class="uiBtn uiBtn-disabled" disabled>竞拍开奖</button>                <?php }else{ ?>                <button type="button" class="uiBtn BtnGreen" onclick="location.href='#!timing/editCod?com=xshow|今日竞拍开奖'">竞拍开奖</button>                <?php }?>            </td>            <td class="td-input">                <span class="form-tip">                    （待开奖出价记录：<a href="manage#!auction/log?status=0" class="c-red"><b><?php echo $_smarty_tpl->tpl_vars['data']->value['cod']['count'];?>
</b></a>）（下期开奖日：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cod']['nexttime'],'Y-m-d 15:30');?>
）                    <a href="#!timing/cod">查看开奖记录</a>                </span>            </td>        </tr>        <tr>            <td class="td-label">                <?php if ($_smarty_tpl->tpl_vars['data']->value['logSum']){?>                <button type="button" class="uiBtn BtnGreen" onclick="if(confirm('确认批量解冻！')) cron.init('frozen')">解冻保证金</button>                <?php }else{ ?>                <button type="button" class="uiBtn uiBtn-disabled" disabled>解冻保证金</button>                <?php }?>            </td>            <td class="td-input">                <span class="form-tip">（待解冻出价记录：<a href="manage#!auction/log?frozen=98" class="c-red"><b><?php echo $_smarty_tpl->tpl_vars['data']->value['logSum'];?>
</b></a>） （所有已结束并未解冻的竞拍出价保证金，单次最多解冻<?php echo $_smarty_tpl->tpl_vars['data']->value['frozenNum'];?>
条记录）</span>            </td>        </tr>        <?php }?>        <tr class="table-h3">            <td colspan="2">定期处理 <a href="javascript:;" onclick="timing.cron();">【点击更新】</a></td>        </tr>        <tr>            <td colspan="2" id="timingCron"></td>        </tr>        <tr class="table-h3">            <td colspan="2">系统信息</td>        </tr>        <tr>            <td colspan="2">                <p><span class="c-gray">登录IP：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['ip'];?>
</span></p>                <p><span class="c-gray">服务器操作系统：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['os'];?>
</span></p>                <p><span class="c-gray">WEB服务器：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['web_server'];?>
</span></p>                <p><span class="c-gray">PHP版本：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['php_version'];?>
</span></p>                <p><span class="c-gray">MYSQL版本：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['mysql_version'];?>
</span></p>            </td>        </tr>        </tbody>    </table></div><script type="text/javascript">    $.loadJs('/admin/js/manage/timing.js',function(){        timing.cron();    });</script><?php }} ?>