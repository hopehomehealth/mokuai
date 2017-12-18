<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 18:43:14
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/member_account_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:825077425857b9c2a4e932-26541825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dc56e2ccb18774e4bc3b0140de260eb07a8debf' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/member_account_edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '825077425857b9c2a4e932-26541825',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5857b9c2ad0301_09996864',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857b9c2ad0301_09996864')) {function content_5857b9c2ad0301_09996864($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/member/member_account_edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" enctype="multipart/form-data">
        <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>用户名：</label></td>
                <td class="td-input">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>

                    <input type="hidden" name="post[username]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" />
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>金额：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['amount'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>支付方式：</label></td>
                <td class="td-input">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['pay_name'];?>
 <span class="c-orange"><?php echo $_smarty_tpl->tpl_vars['row']->value['realname'];?>
</span>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['type']==2){?><br/><?php echo $_smarty_tpl->tpl_vars['row']->value['user_note'];?>
<?php }?>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>申请时间：</label></td>
                <td class="td-input"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['row']->value['add_time']);?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>操作备注：</label></td>
                <td class="td-input">
                    <textarea name="post[admin_note]"><?php echo $_smarty_tpl->tpl_vars['row']->value['admin_note'];?>
</textarea>
                </td>
            </tr>
            <tr class="h s0">
                <td class="td-label"><label>状态：</label></td>
                <td class="td-input">
                    <label><input type="radio" name="post[status]" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']!=1){?>disabled<?php }?> value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1||$_smarty_tpl->tpl_vars['row']->value['id']==0){?>checked<?php }?>> 待付款</label>
                    <label><input type="radio" name="post[status]" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']!=1){?>disabled<?php }?>  value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==2){?>checked<?php }?>> 已完成</label>
                    <label><input type="radio" name="post[status]" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']!=1){?>disabled<?php }?>  value="3" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==3){?>checked<?php }?>> 已取消</label>
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