<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:17:55
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/mobile_status.html" */ ?>
<?php /*%%SmartyHeaderCode:204445166858490923e359a2-23321429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11184fba82d39511f9e0dafa5274e12a7e2c16f7' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/mobile_status.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204445166858490923e359a2-23321429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58490923eb5465_89377191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58490923eb5465_89377191')) {function content_58490923eb5465_89377191($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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