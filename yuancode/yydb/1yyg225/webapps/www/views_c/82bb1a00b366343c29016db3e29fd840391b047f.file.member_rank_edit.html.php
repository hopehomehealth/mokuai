<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:19:23
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/member_rank_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:18910772195849097b9cd7c3-93509509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82bb1a00b366343c29016db3e29fd840391b047f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/member_rank_edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18910772195849097b9cd7c3-93509509',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5849097ba4d405_65098110',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5849097ba4d405_65098110')) {function content_5849097ba4d405_65098110($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/member_rank/edit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>会员等级：</label><span class="c-red"> *</span></td>
                <td class="td-input">
                    <input type="text" name="post[rank_name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['rank_name'];?>
" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>经验值下限：</label></td>
                <td class="td-input">
                    <input type="text" name="post[min_points]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['min_points'];?>
" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>经验值上限：</label></td>
                <td class="td-input">
                    <input type="text" name="post[max_points]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['max_points'];?>
" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>允许分享次数：</label></td>
                <td class="td-input">
                    <input type="text" name="post[allow_time]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['allow_time'];?>
" class="form-i w200">(为0取系统设置)
                </td>
            </tr>
            <tr>
                <td class="td-label"></td>
                <td class="td-input">
                    <label>
                        <input type="checkbox" name="post[special]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['special']==1){?>checked<?php }?> /> 特殊会员组
                    </label>
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