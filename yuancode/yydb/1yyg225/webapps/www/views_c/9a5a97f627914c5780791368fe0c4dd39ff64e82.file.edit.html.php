<?php /* Smarty version Smarty-3.1.13, created on 2016-03-05 11:03:05
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\admin\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:240215660fc05544605-51843064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a5a97f627914c5780791368fe0c4dd39ff64e82' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\admin\\edit.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '240215660fc05544605-51843064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fc0561b5c3_94451096',
  'variables' => 
  array (
    'row' => 0,
    'select_group' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fc0561b5c3_94451096')) {function content_5660fc0561b5c3_94451096($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/admin/edit">    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['uid'];?>
" />    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>用户名：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[username]" id="username" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>角色选择：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['select_group']->value;?>
                <label><input type="checkbox" name="post[visitor]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['visitor']){?>checked<?php }?> /> 访客</label>            </td>        </tr>        <tr>            <td class="td-label"><label>新密码：</label></td>            <td class="td-input">                <input type="password" class="form-i w200 sitem" name="post[pass1]" />                <?php if ($_smarty_tpl->tpl_vars['row']->value['uid']){?>                <div class="form-tip">留空表示不修改密码</div>                <?php }?>            </td>        </tr>        <tr>            <td class="td-label"><label>重复新密码：</label></td>            <td class="td-input">                <input type="password" class="form-i w200 sitem" name="post[pass2]" />            </td>        </tr>        <tr>            <td class="td-label"><label>备注：</label></td>            <td class="td-input">                <textarea name="post[desc]"><?php echo $_smarty_tpl->tpl_vars['row']->value['desc'];?>
</textarea>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php }} ?>