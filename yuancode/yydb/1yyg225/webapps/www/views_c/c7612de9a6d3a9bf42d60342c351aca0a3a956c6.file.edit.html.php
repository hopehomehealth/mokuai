<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:27:10
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\auction\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:27351565eb96ebb21f6-63310988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7612de9a6d3a9bf42d60342c351aca0a3a956c6' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\auction\\edit.html',
      1 => 1419847074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27351565eb96ebb21f6-63310988',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'act' => 0,
    'row' => 0,
    'actTypes' => 0,
    'm' => 0,
    'select_categorys' => 0,
    'winList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565eb96ecf65c0_39982150',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eb96ecf65c0_39982150')) {function content_565eb96ecf65c0_39982150($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\lnest\\1yyg225\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/auction/edit">
    <input type="hidden" name="id" value="<?php if ($_smarty_tpl->tpl_vars['act']->value=='copy'){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['act_id'];?>
<?php }?>" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>竞拍类型：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <select name="post[cat_type]">
                    <option value="">-请选择-</option>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['key'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['key']==$_smarty_tpl->tpl_vars['row']->value['cat_type']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>竞拍商品：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <div class="f-unit" style="padding: 0">
                    <select name="k" id="SEARCH_K">
                        <option value="id">ID</option>
                        <option value='name'>名称</option>
                    </select>
                    <input type="text" class="form-i w100" name="q" id="SEARCH_Q" value="" />
                    <select name="cid" id="SEARCH_CID">
                        <option value=''>-商品分类-</option>
                        <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>

                    </select>
                    <button type="submit" style="margin-left:5px;padding:2px 10px;" class="uiBtn BtnBlue" onclick="auction.search_goods();">搜索</button>
                </div>
                <div class="f-unit" style="padding: 0">
                    <select name="post[goods_id]" id="GOODS_ID" onchange="auction.select_goods(this)" style="width: 400px;">
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['act_id']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_name'];?>
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
                <input type="hidden" id="GOODS_NAME" name="post[goods_name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_name'];?>
" />
                <input type="text" class="form-i w300" id="ACT_NAME" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
                <div class="form-tip">留空时取竞拍商品名称</div>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>成本价：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" id="GOODS_PRICE" name="post[old_price]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['old_price'])===null||$tmp==='' ? 0 : $tmp);?>
" />
                <div class="form-tip">拿货价（前台不显示，便于后台统计成本）</div>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>竞拍时间：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input class="form-i Wdate" name="post[start_time]" id="start_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['start_time'],'Y-m-d H:i');?>
" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm', maxDate:'#F{ $dp.$D(\'end_time\') }' })" readonly />
                ~
                <input class="form-i Wdate" name="post[end_time]" id="end_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['end_time'],'Y-m-d H:i');?>
" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd 11:00', minDate:'#F{ $dp.$D(\'start_time\') }' })" readonly />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>推荐：</label></td>
            <td class="td-input">
                <label><input type="radio" name="post[posid]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['posid']==1){?>checked<?php }?> /> 是</label>
                <label><input type="radio" name="post[posid]" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['posid']==0){?>checked<?php }?> /> 否</label>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>推荐图：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>

            </td>
        </tr>

        <tr class="table-h3">
            <td colspan="2">竞拍参数</td>
        </tr>

        <tr>
            <td class="td-label"><label>起拍价：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140 <?php if ($_smarty_tpl->tpl_vars['act']->value=='edit'&&$_smarty_tpl->tpl_vars['row']->value['bid_user_count']>0){?>c-gray" readonly<?php }else{ ?>"<?php }?> name="post[start_price]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['start_price'])===null||$tmp==='' ? 0 : $tmp);?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>保证金：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140 <?php if ($_smarty_tpl->tpl_vars['act']->value=='edit'&&$_smarty_tpl->tpl_vars['row']->value['bid_user_count']>0){?>c-gray" readonly<?php }else{ ?>"<?php }?> name="post[deposit]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['deposit'])===null||$tmp==='' ? 0 : $tmp);?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>加价幅度：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[amplitude]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['amplitude'])===null||$tmp==='' ? 0 : $tmp);?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>拍币限额：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[painum]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['painum'])===null||$tmp==='' ? 0 : $tmp);?>
" />
                <span class="form-tip">支付时最多可使用的拍币数</span>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>扣除拍币：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[paib]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['paib'])===null||$tmp==='' ? 0 : $tmp);?>
" />
                <span class="form-tip">首次出价需要扣除的拍币</span>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>最大中奖人数：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[winnum]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['winnum'];?>
" />
                <span class="form-tip">负数不限制 0不设置</span>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>设置中奖率：</label></td>
            <td class="td-input">
                <select name="post[win]">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['winList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['win']==$_smarty_tpl->tpl_vars['m']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
%</option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>会员限制：</label></td>
            <td class="td-input">
                <select name="post[user]">
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['user']=='0'){?>selected<?php }?>>所有会员</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['user']=='1'){?>selected<?php }?>>新会员（7天内注册）</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>模式限制：</label></td>
            <td class="td-input">
                <select name="post[type]">
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['type']=='0'){?>selected<?php }?>>中奖模式</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['type']=='1'){?>selected<?php }?>>中奖+竞拍模式</option>
                </select>
                <input type="text" class="form-i w40" name="post[typenum]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['typenum'])===null||$tmp==='' ? 0 : $tmp);?>
" />
                <span class="form-tip">达到此人数自动转竞拍，大于0时有效</span>
            </td>
        </tr>

        <tr class="table-h3 s h0">
            <td colspan="2">SEO设置</td>
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

        <?php if ($_smarty_tpl->tpl_vars['row']->value['status']<@constant('FINISHED')||$_GET['act']=='copy'){?>
        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input td-button">
                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
            </td>
        </tr>
        <?php }?>

    </tbody>
    </table>

    </form>
</div>

<script type="text/javascript">
    $.loadJs('/admin/js/manage/auction.js',function(){ });
</script>


<?php }} ?>