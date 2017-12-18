<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 18:53:30
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\yunbuy\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:16534565978ed8b1fc4-65815759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ccb4b35d00e2a9056dea17dce7f1d569d145591' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\yunbuy\\edit.html',
      1 => 1448708004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16534565978ed8b1fc4-65815759',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565978ed97ade4_84345792',
  'variables' => 
  array (
    'row' => 0,
    'select_yuncategorys' => 0,
    'select_brands' => 0,
    'goods' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565978ed97ade4_84345792')) {function content_565978ed97ade4_84345792($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/yunbuy/edit">    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
" />    <input type="hidden" name="goods_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_id'];?>
" />    <table class="table-list">    <tbody>        <tr class="table-h3">            <td colspan="2">商品信息</td>        </tr>        <tr>            <td class="td-label"><label>商品分类：<span class="c-red">*</span></label></td>            <td class="td-input">                <select name="post[cid]">                    <option value=''>-请选择分类-</option>                    <?php echo $_smarty_tpl->tpl_vars['select_yuncategorys']->value;?>
                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>商品品牌：<span class="c-red">*</span></label></td>            <td class="td-input">                <select name="post[bid]"><option value="">-请选择品牌-</option><?php echo $_smarty_tpl->tpl_vars['select_brands']->value;?>
</select>            </td>        </tr>        <tr>            <td class="td-label"><label>商品名称：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w300" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>副标题：</label></td>            <td class="td-input">                <input type="text" class="form-i w300" name="post[goods_subtit]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>实际价值：</label></td>            <td class="td-input">                <input type="text" class="form-i w140" name="post[custom_price]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['custom_price'];?>
"/>            </td>        </tr>        <tr>            <td class="td-label"><label>缩略图：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>
                <span class="form-tip">                    建议：最佳尺寸268*195                </span>            </td>        </tr>        <tr>            <td class="td-label"><label>展示图集：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_goods_thumb'];?>
                <span class="form-tip">                    建议：为放大镜效果更好的展示，最佳宽度>=800，高度随意                </span>            </td>        </tr>        <tr>            <td class="td-label"><label>商品详情：</label></td>            <td class="td-input" colspan="2">                <?php echo $_smarty_tpl->tpl_vars['goods']->value['html_content'];?>
            </td>        </tr>        <tr class="table-h3">            <td colspan="2">云购参数</td>        </tr>        <tr>            <td class="td-label"><label>夺宝类型：</label></td>            <td class="td-input">                <label><input type="radio" name="post[type]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['buy_num']>0){?>disabled<?php }?> <?php if ($_smarty_tpl->tpl_vars['row']->value['type']==1){?>checked<?php }?>>夺宝币</label>                <label><input type="radio" name="post[type]" value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['buy_num']>0){?>disabled<?php }?> <?php if ($_smarty_tpl->tpl_vars['row']->value['type']==2){?>checked<?php }?>>拍币</label>            </td>        </tr>        <tr>            <td class="td-label"><label>商品总价：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w140" id="GOODS_PRICE" name="post[goods_price]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['goods_price'])===null||$tmp==='' ? 0 : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['buy_num']>0){?>readonly<?php }?>/>                <span class="form-tip"></span>            </td>        </tr>        <tr>            <td class="td-label"><label>单次价格：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w140" name="post[price]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['price'])===null||$tmp==='' ? 1 : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['buy_num']>0){?>readonly<?php }?>/>            </td>        </tr>        <tr>            <td class="td-label"><label>最大期数：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w140" name="post[max_qishu]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['max_qishu'])===null||$tmp==='' ? 500 : $tmp);?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>限购人次：</label></td>            <td class="td-input">                <input type="text" class="form-i w140" name="post[buynum]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['buynum'];?>
" />                <p class="form-tip">单个会员本期限制购买人次，留空不限制</p>            </td>        </tr>        <tr class="table-h3 s h0">            <td colspan="2">其它参数</td>        </tr>        <tr class="s h0">            <td class="td-label"><label>关键词：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[keywords]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['keywords'];?>
" />            </td>        </tr>        <tr class="s h0">            <td class="td-label"><label>描述：</label></td>            <td class="td-input">                <textarea name="post[description]" style="width:300px;height:60px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>            </td>        </tr>        <tr>            <td class="td-label"><label>推荐：</label></td>            <td class="td-input">                <label><input type="radio" name="post[posid]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['posid']==1){?>checked<?php }?> /> 是</label>                <label><input type="radio" name="post[posid]" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['posid']==0){?>checked<?php }?> /> 否</label>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input td-button">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><script type="text/javascript">    $.loadJs('/admin/js/manage/yunbuy.js',function(){ });</script><?php }} ?>