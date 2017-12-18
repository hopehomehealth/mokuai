<?php /* Smarty version Smarty-3.1.13, created on 2016-07-22 16:37:39
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\timing\index.html" */ ?>
<?php /*%%SmartyHeaderCode:11474576a3dc4401b30-53513628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '754fa0f1aacbb290463cd0936bc18c1898d47fc0' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\timing\\index.html',
      1 => 1469086295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11474576a3dc4401b30-53513628',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a3dc44c24b8_90981504',
  'variables' => 
  array (
    'common' => 0,
    'data' => 0,
    'L' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a3dc44c24b8_90981504')) {function content_576a3dc44c24b8_90981504($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\1yyg\\1yyg225_full\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<style type="text/css">    .msg-tip{ color:red;font-size:16px; font-weight:bold; margin-bottom:5px; }</style><div class="html-box">    <?php if (!$_smarty_tpl->tpl_vars['common']->value['managesms']){?>    <p class="msg-tip">安全建议：建议开启后台短信验证码功能！</p>    <?php }?>    <table class="table-list">        <tbody>        <tr class="table-h3">            <td colspan="2">批量处理</td>        </tr>        <?php if (@constant('IsAuction')){?>        <tr>            <td class="td-label">                <?php if ($_smarty_tpl->tpl_vars['data']->value['cod']['status']==1){?>                <button type="button" class="uiBtn uiBtn-disabled" disabled><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
开奖</button>                <?php }else{ ?>                <button type="button" class="uiBtn BtnGreen" onclick="location.href='#!timing/editCod?com=xshow|今日<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
开奖'"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
开奖</button>                <?php }?>            </td>            <td class="td-input">                <span class="form-tip">                    （待开奖出价记录：<a href="manage#!auction/log?status=0" class="c-red"><b><?php echo $_smarty_tpl->tpl_vars['data']->value['cod']['count'];?>
</b></a>）（下期开奖日：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cod']['nexttime'],'Y-m-d 15:30');?>
）                    <a href="#!timing/cod">查看开奖记录</a>                </span>            </td>        </tr>        <tr>            <td class="td-label">                <?php if ($_smarty_tpl->tpl_vars['data']->value['logSum']){?>                <button type="button" class="uiBtn BtnGreen" onclick="if(confirm('确认批量解冻！')) cron.init('frozen')">解冻<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
</button>                <?php }else{ ?>                <button type="button" class="uiBtn uiBtn-disabled" disabled>解冻<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
</button>                <?php }?>            </td>            <td class="td-input">                <span class="form-tip">（待解冻出价记录：<a href="manage#!auction/log?frozen=98" class="c-red"><b><?php echo $_smarty_tpl->tpl_vars['data']->value['logSum'];?>
</b></a>） （所有已结束并未解冻的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
出价<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
，单次最多解冻<?php echo $_smarty_tpl->tpl_vars['data']->value['frozenNum'];?>
条记录）</span>            </td>        </tr>        <?php }?>        <tr>            <td class="td-label">                <button type="button" class="uiBtn BtnGreen" onclick="if(confirm('确认清除整站缩略图！')) cron.init('thumb')">清除缩略图</button>            </td>            <td class="td-input">                <span class="form-tip">当发现网站前后台图片不对应时，可执行此操作（会影响第一次打开页面的速度，请慎重执行）！</span>            </td>        </tr>        <?php if (!$_smarty_tpl->tpl_vars['data']->value['clear']){?>        <tr>            <td class="td-label">                <button type="button" class="uiBtn BtnGreen" onclick="timing.clear()">一键清理数据</button>            </td>            <td class="td-input">                <span class="form-tip">                    <label><input type="checkbox" id="table_member" value="1" disabled checked /> 会员数据</label>                    <label><input type="checkbox" id="table_yunbuy" value="1" disabled checked /> 云购数据</label>                    <label><input type="checkbox" id="table_goods" value="1" disabled checked /> 商品数据</label>                    <label><input type="checkbox" id="table_admin" value="1" disabled checked /> 重置管理员</label>                    <label><input type="checkbox" id="table_count" value="1" disabled checked /> 参拍人次清零</label>                </span>            </td>        </tr>        <?php }?>        <tr>            <td class="td-label">                <button type="button" class="uiBtn BtnGreen" onclick="timing.updateDb();">数据库更新</button>            </td>            <td class="td-input">                <span class="form-tip">网站使用更新包后请进行此操作！</span>            </td>        </tr>        <tr>            <td class="td-label">                <button type="button" class="uiBtn BtnGreen" onclick="if(confirm('确认生成云购缓存！')) cron.init('yunCache')">生成云购缓存</button>            </td>            <td class="td-input">                <span class="form-tip">该功能将提升商品详情页的加载速度（清理掉此缓存前，每个商品仅生成一次）！</span>            </td>        </tr>        <tr class="table-h3">            <td colspan="2">定期处理 <a href="javascript:;" onclick="timing.cron();">【刷新】</a></td>        </tr>        <tr>            <td colspan="2" id="timingCron"></td>        </tr>        <tr class="table-h3">            <td colspan="2">系统信息</td>        </tr>        <tr>            <td colspan="2">                <p><span class="c-gray">登录IP：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['ip'];?>
</span></p>                <p><span class="c-gray">服务器操作系统：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['os'];?>
</span></p>                <p><span class="c-gray">WEB服务器：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['web_server'];?>
</span></p>                <p><span class="c-gray">PHP版本：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['php_version'];?>
</span></p>                <p><span class="c-gray">MYSQL版本：</span><span><?php echo $_smarty_tpl->tpl_vars['system']->value['mysql_version'];?>
</span></p>                <p><span class="c-gray">源码版本：</span><span><?php echo @constant('Version');?>
</span> <a href="http://help.lnest.com/?/article/19" target="_blank">【查看更新】</a></p>            </td>        </tr>        </tbody>    </table></div><script type="text/javascript">    $.loadJs('/admin/js/manage/timing.js',function(){        timing.cron();    });</script><?php }} ?>