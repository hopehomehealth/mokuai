<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 20:57:53
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\member\mobile_status.html" */ ?>
<?php /*%%SmartyHeaderCode:31214565d9951063196-84923240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a2299e49fef0bcd0db6964b26d613eee13a3ef2' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\member\\mobile_status.html',
      1 => 1421376442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31214565d9951063196-84923240',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d99510cc935_68286456',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d99510cc935_68286456')) {function content_565d99510cc935_68286456($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/member/edit" enctype="multipart/form-data">
        <input type="hidden" name="post[mid]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" />
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>用户名：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>手机号：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
</td>
            </tr>
            <tr class="h s0">
                <td class="td-label"><label>手机状态：</label></td>
                <td class="td-input">
                    <label><input type="radio" name="post[verify_mobile]" value="0" checked> 待认证</label>
                    <label><input type="radio" name="post[verify_mobile]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['verify_mobile']==1){?>checked<?php }?>> 已认证</label>
                    <label><input type="radio" name="post[verify_mobile]" value="-1" <?php if ($_smarty_tpl->tpl_vars['row']->value['verify_mobile']==-1){?>checked<?php }?>> 未拨通</label>
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


<script type="text/javascript">
    $.loadJs('/admin/js/manage/linkage.js',function(){
});
</script>
<?php }} ?>