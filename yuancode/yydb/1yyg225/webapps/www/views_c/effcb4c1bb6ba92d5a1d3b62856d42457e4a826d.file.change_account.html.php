<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 13:30:24
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\change_account.html" */ ?>
<?php /*%%SmartyHeaderCode:107355660ffca545832-55889905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'effcb4c1bb6ba92d5a1d3b62856d42457e4a826d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\change_account.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107355660ffca545832-55889905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660ffca62e0f8_80829122',
  'variables' => 
  array (
    'row' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660ffca62e0f8_80829122')) {function content_5660ffca62e0f8_80829122($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h3 class="info-tag">调整账户金额/积分<span></span></h3>

<div class="html-box">

    <form target="iframeNewsTarget" method="post" action="/manage/member/change_account" enctype="multipart/form-data">
        <input type="hidden" name="post[mid]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" />
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>用户名：</label></td>
                <td class="td-input">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>

                </td>
            </tr>
            <tr>
                <td class="td-label"><label>可用余额：</label></td>
                <td class="td-input">
                    <select name="post[addfee_user_money]">
                        <option value="1">增加</option>
                        <option value="-1">减少</option>
                    </select>
                    <input type="text" name="post[user_money]" value="" size="5" class="form-i">
                    <span class="form-tip">当前：<?php echo price_format($_smarty_tpl->tpl_vars['row']->value['user_money']);?>
</span>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>冻结金额：</label></td>
                <td class="td-input">
                    <select name="post[addfee_frozen_money]">
                        <option value="1">增加</option>
                        <option value="-1">减少</option>
                    </select>
                    <input type="text" name="post[frozen_money]" value="" size="5" class="form-i">
                    <span class="form-tip">当前：<?php echo price_format($_smarty_tpl->tpl_vars['row']->value['frozen_money']);?>
</span>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
：</label></td>
                <td class="td-input">
                    <select name="post[addfee_pay_points]">
                        <option value="1">增加</option>
                        <option value="-1">减少</option>
                    </select>
                    <input type="text" name="post[pay_points]" value="" size="5" class="form-i">
                    <span class="form-tip">当前：<?php echo $_smarty_tpl->tpl_vars['row']->value['pay_points'];?>
</span>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
：</label></td>
                <td class="td-input">
                    <select name="post[addfee_db_points]">
                        <option value="1">增加</option>
                        <option value="-1">减少</option>
                    </select>
                    <input type="text" name="post[db_points]" value="" size="5" class="form-i">
                    <span class="form-tip">当前：<?php echo $_smarty_tpl->tpl_vars['row']->value['db_points'];?>
</span>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>备注：</label></td>
                <td class="td-input">
                    <textarea name="post[remark]"></textarea>
                </td>
            </tr>
            <tr class="tr-btn">
                <td class="td-label"></td>
                <td class="td-input">
                    <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                    <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
                </td>
            </tr>
            </tbody>
        </table>

    </form>

</div>

<script src="/js/manage/member.js"></script>

<script type="text/javascript">
$.loadJs('/admin/js/manage/linkage.js',function(){

});
</script>
<?php }} ?>