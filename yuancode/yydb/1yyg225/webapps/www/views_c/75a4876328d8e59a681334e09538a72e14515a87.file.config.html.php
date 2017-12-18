<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 14:30:02
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/business/config.html" */ ?>
<?php /*%%SmartyHeaderCode:11649844275848fdeaa50639-39627207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75a4876328d8e59a681334e09538a72e14515a87' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/business/config.html',
      1 => 1467707472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11649844275848fdeaa50639-39627207',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'bus_limit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5848fdeaaa2e63_22180896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848fdeaaa2e63_22180896')) {function content_5848fdeaaa2e63_22180896($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/setting/config_other">        <table class="table-list">            <tbody>            <tr>                <td class="td-input" colspan="2">                    <div class="form-tip" style="color: #000;">                        <b>重要提示：</b><br>                        -.开启商家入驻功能前，建议先确定好平台返佣点（最后抽佣点以最后改动的值为准）；<br>                        -.开启商家入驻功能后，需要定期审核商家（审核位置：后台-商家-商家管理-编辑-商家状态）<br>                        -.商家分润为自动结算：商家商品发货后，自动结算并返现到商家帐户余额<br>                        <b>发布审核：</b><br>                        -.开启商家入驻功能后，需要定期审核商家发布的商品（审核位置：后台-商城-商品管理-上架）（云购商品会根据商品的审核自动同步审核）<br>                        -.开启商家入驻功能后，需要定期审核商家发布的品牌（审核位置：后台-商城-商品品牌-显示）<br><br>                    </div>                </td>            </tr>            <tr>                <td class="td-label"><label>商家入驻功能：</label></td>                <td class="td-input">                    <select name="config[bus_apply]">                        <option value="0" <?php if (!$_smarty_tpl->tpl_vars['config']->value['bus_apply']){?> selected<?php }?>>关闭</option>                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['bus_apply']==1){?> selected<?php }?>>开启</option>                    </select>                    <span class="form-tip">关闭后，会员不可再申请成为商家，不影响之前申请成功的商家</span>                </td>            </tr>            <tr style="display: none;">                <td class="td-label"><label>结算方式：</label></td>                <td class="td-input">                    <select name="config[bus_type]">                        <option value="0" <?php if (!$_smarty_tpl->tpl_vars['config']->value['bus_type']){?>selected<?php }?>>自动结算</option>                    </select>                    <div class="form-tip" style="line-height: 1.5;padding-top:5px;">                        自动结算：商家商品发货后，自动结算并返现到商家帐户余额<br>                        手动结算：后台由管理员定期结算并返现到商家帐户余额                    </div>                </td>            </tr>            <tr>                <td class="td-label"><label>平台返佣点：</label></td>                <td class="td-input">                    <input type="text" class="form-i w40" name="config[bus_rebate]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value['bus_rebate'])===null||$tmp==='' ? '0' : $tmp);?>
" />%                    <div class="form-tip" style="line-height: 1.5;padding-top:5px;">                        注释说明：商家商品发货后，给商家结算时，平台需要抽取的返佣点数（总需的百分比）<br>                        示例说明：如设置为1时，商家商品总需需设置成高出商品成本1%才能获得收益<br>                        重要提示：请不要经常改动，最后抽佣点以最后改动的值为准！                    </div>                </td>            </tr>            <tr>                <td class="td-label"><label>商品发布上限：</label></td>                <td class="td-input">                    <input type="text" class="form-i w40" name="config[bus_limit]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value['bus_limit'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bus_limit']->value : $tmp);?>
" />                    <div class="form-tip" style="line-height: 1.5;padding-top:5px;">商家中心发布商品的数量上限，商家管理可单独设置！</div>                </td>            </tr>            <tr class="tr-btn">                <td class="td-label"></td>                <td class="td-input">                    <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                </td>            </tr>            </tbody>        </table>    </form></div><?php }} ?>