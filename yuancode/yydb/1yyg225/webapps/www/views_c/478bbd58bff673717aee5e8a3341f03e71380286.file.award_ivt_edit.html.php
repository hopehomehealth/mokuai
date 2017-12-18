<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 12:05:12
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\award_ivt_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:139556ce7d78db1e85-47413347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '478bbd58bff673717aee5e8a3341f03e71380286' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\award_ivt_edit.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139556ce7d78db1e85-47413347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce7d78f0ad56_95872052',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce7d78f0ad56_95872052')) {function content_56ce7d78f0ad56_95872052($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/member/award_idcard_edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>用户名：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>邀请人数：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['num'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>处理备注：</label></td>
                <td class="td-input"><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==2){?><?php echo $_smarty_tpl->tpl_vars['row']->value['remark'];?>
<?php }else{ ?><textarea name="remark"><?php echo $_smarty_tpl->tpl_vars['row']->value['remark'];?>
</textarea><?php }?></td>
            </tr>
            <tr>
                <td class="td-label"><label>状态：</label></td>
                <td class="td-input">
                    <label><input type="radio" name="status" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1){?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==2){?>disabled<?php }?>> 处理中</label>
                    <label><input type="radio" name="status" value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==2){?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==2){?>disabled<?php }?>> 已处理</label>
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
</div><?php }} ?>