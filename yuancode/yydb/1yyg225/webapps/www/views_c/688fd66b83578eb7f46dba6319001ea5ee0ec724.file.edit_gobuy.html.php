<?php /* Smarty version Smarty-3.1.13, created on 2016-04-20 16:15:33
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\yunbuy\edit_gobuy.html" */ ?>
<?php /*%%SmartyHeaderCode:251756d7ca1dbb15f5-47192135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '688fd66b83578eb7f46dba6319001ea5ee0ec724' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\yunbuy\\edit_gobuy.html',
      1 => 1461139957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251756d7ca1dbb15f5-47192135',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d7ca1ddc20e8_93673060',
  'variables' => 
  array (
    'row' => 0,
    'L' => 0,
    'select_categorys' => 0,
    'select_yuncategorys' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d7ca1ddc20e8_93673060')) {function content_56d7ca1ddc20e8_93673060($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/yunbuy/edit">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
" />
    <input type="hidden" name="post[gobuy]" value="1" />

    <table class="table-list">
    <tbody>
        <tr>
            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <div class="f-unit" style="padding: 0">
                    <select name="k" id="SEARCH_K">
                        <option value='name'>名称</option>
                        <option value="id">ID</option>
                    </select>
                    <input type="text" class="form-i w100" name="q" id="SEARCH_Q" value="" />
                    <select name="cid" id="SEARCH_CID">
                        <option value=''>-商品分类-</option>
                        <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>

                    </select>
                    <button type="submit" style="margin-left:5px;padding:2px 10px;" class="uiBtn BtnBlue" onclick="yunbuy.search_goods();">搜索</button>
                </div>
                <div class="f-unit" style="padding: 0">
                    <select name="post[goods_id]" id="GOODS_ID" onchange="yunbuy.select_goods(this)" style="width: 400px;">
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['buy_id']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</option>
                        <?php }else{ ?>
                        <option value=""></option>
                        <?php }?>
                    </select>
                </div>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>商品名称：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" id="GOODS_NAME" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
                <span class="form-tip">留空时取<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品名称</span>
            </td>
        </tr>
        <tr>
            <td class="td-label"><label>副标题：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[goods_subtit]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
" />
            </td>
        </tr>
        <tr>
            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
分类：</label></td>
            <td class="td-input">
                <select name="post[cid]">
                    <option value=''>-<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
分类-</option>
                    <?php echo $_smarty_tpl->tpl_vars['select_yuncategorys']->value;?>

                </select>
            </td>
        </tr>

        <tr class="table-h3">
            <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
参数</td>
        </tr>

        <tr>
            <td class="td-label"><label>购买价格：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" id="GOODS_PRICE" name="post[custom_price]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['custom_price'];?>
"/>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>市场价：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[goods_price]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['goods_price'])===null||$tmp==='' ? 0 : $tmp);?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>库存：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[need_num]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['need_num'])===null||$tmp==='' ? 0 : $tmp);?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>销量：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[buy_num]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['buy_num'])===null||$tmp==='' ? 0 : $tmp);?>
" />
            </td>
        </tr>

        <tr style="display: none;">
            <td class="td-label"><label>最大期数：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[max_qishu]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['max_qishu'])===null||$tmp==='' ? 1 : $tmp);?>
" />
            </td>
        </tr>
        <tr style="display: none;">
            <td class="td-label"><label>限购次数：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[buynum]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['buynum'];?>
" />
                <span class="form-tip">每个会员本期最多可购买的人次，留空不限制</span>
            </td>
        </tr>
        <tr style="display: none;">
            <td class="td-label"><label>推荐人数：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[usernum]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['usernum'];?>
" />
                <label><input type="checkbox" name="post[isreal]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['isreal']==1){?>checked<?php }?> /> 需实名认证</label>
                <div class="form-tip" style="clear: both">会员推荐注册需要达到的人数限制，留空不限制</div>
            </td>
        </tr>
        <tr style="display: none;">
            <td class="td-label"><label>限制会员：</label></td>
            <td class="td-input">
                <select name="post[member]">
                    <option value="">所有会员</option>
                    <option value="-1" <?php if ($_smarty_tpl->tpl_vars['row']->value['member']==-1){?>selected<?php }?>>新会员(7天内注册)</option>
                </select>
                <span class="form-tip">符合该条件的用户才能参与</span>
            </td>
        </tr>

        <tr class="table-h3 s h0">
            <td colspan="2">其它设置</td>
        </tr>
        <tr>
            <td class="td-label"><label>是否显示：</label></td>
            <td class="td-input">
                <label><input type="radio" name="post[is_show]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_show']==1){?>checked<?php }?>>是</label>
                <label><input type="radio" name="post[is_show]" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_show']==0){?>checked<?php }?>>否</label>
            </td>
        </tr>
        <tr style="display: none;">
            <td class="td-label"><label>开售时间：</label></td>
            <td class="td-input">

                <input type="text" class="form-i Wdate" id="start_time" name="post[start_time]" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['start_time']){?><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['row']->value['start_time']);?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['row']->value['buy_num']>0){?>readonly<?php }?>  <?php if ($_smarty_tpl->tpl_vars['row']->value['buy_num']==0){?>onclick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm', minDate:'%y-%M-%d %H:%m' })"<?php }?>/>
            </td>
        </tr>
        <tr class="s h0">
            <td class="td-label"><label>SEO关键词：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[keywords]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['keywords'];?>
" />
            </td>
        </tr>
        <tr class="s h0">
            <td class="td-label"><label>SEO描述：</label></td>
            <td class="td-input">
                <textarea name="post[description]"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>
            </td>
        </tr>

        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input td-button">
                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
            </td>
        </tr>

    </tbody>
    </table>

    </form>
</div>

<script type="text/javascript">
    $.loadJs('/admin/js/manage/yunbuy.js',function(){ });
</script>


<?php }} ?>