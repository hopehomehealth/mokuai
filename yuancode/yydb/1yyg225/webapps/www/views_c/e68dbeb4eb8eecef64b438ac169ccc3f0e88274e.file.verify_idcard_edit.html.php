<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 17:55:42
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/verify_idcard_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:18986498835857ae9e0738d9-36447875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e68dbeb4eb8eecef64b438ac169ccc3f0e88274e' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/verify_idcard_edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18986498835857ae9e0738d9-36447875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5857ae9e138c56_10325404',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857ae9e138c56_10325404')) {function content_5857ae9e138c56_10325404($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/member/verify_idcard_edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
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
                <td class="td-label"><label>真实姓名：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['realname'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>身份证号：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['card'];?>
<a href="http://www.baidu.com/s?wd=%E8%BA%AB%E4%BB%BD%E8%AF%81%E5%8F%B7%E7%A0%81%E6%9F%A5%E8%AF%A2&rsv_spt=1&issp=1&f=3&rsv_bp=0&rsv_idx=2&ie=utf-8&tn=baiduhome_pg&rsv_enter=1&rsv_sug3=21&rsv_sug6=7&rsv_sug1=19&rsv_pq=ce6639f2000c9926&rsv_t=eb5dsKSUWglHCEVkd%2FKpBAt37VsPobuWgLu%2B6n7tRJrJ9fb4wNWK9jOsG5vVUsvm7wMJ&oq=%E8%BA%AB%E4%BB%BD%E8%AF%81%E5%8F%B7&rsv_sug2=1&rsp=0&inputT=5437&rsv_sug4=5437&qq-pf-to=pcqq.discussion" target="_blank">检测</a></td>
            </tr>
            <tr>
                <td class="td-label"><label>身份证正面照：</label></td>
                <td class="td-input"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['card_image'];?>
"/></td>
            </tr>
            <tr>
                <td class="td-label"><label>身份证反面照：</label></td>
                <td class="td-input"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['card_image2'];?>
"/></td>
            </tr>

            <tr class="h s0">
                <td class="td-label"><label>状态：</label></td>
                <td class="td-input">
                    <label><input type="radio" name="post[status]" value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1||$_smarty_tpl->tpl_vars['row']->value['status']==2){?>checked<?php }?>> 允许通过</label>
                    <label><input type="radio" name="post[status]" value="3" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==3){?>checked<?php }?>> 拒绝通过</label>
                </td>
            </tr>
            <tr class="h s0">
                <td class="td-label"><label>理由：</label></td>
                <td class="td-input">
                    <textarea name="post[remark]" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']!=1){?>disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['remark'];?>
</textarea>
                </td>
            </tr>
            <tr class="tr-btn">
                <td class="td-label"></td>
                <td class="td-input">
                    <input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" />
                    <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                    <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div><?php }} ?>