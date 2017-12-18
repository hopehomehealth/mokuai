<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:03:20
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:626089662584524e5256049-02174092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cce325e90160cd6f08e8177c128a8effacc2b499' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/edit.html',
      1 => 1481177921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '626089662584524e5256049-02174092',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584524e5512600_17897123',
  'variables' => 
  array (
    'row' => 0,
    'ranklist' => 0,
    'm' => 0,
    'area' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584524e5512600_17897123')) {function content_584524e5512600_17897123($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/member/edit" enctype="multipart/form-data">
        <input type="hidden" name="post[mid]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" />
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>用户名：</label><span class="c-red"> *</span></td>
                <td class="td-input">
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['mid']){?>
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>

                    <input type="hidden" name="post[username]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" />
                    <?php }else{ ?>
                    <input type="text" name="post[username]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" class="form-i w200">
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td class="td-label">会员等级：</td>
                <td class="td-input">
                    <select name="post[rank_id]">
                        <option value="0">非特殊等级</option>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ranklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['id']==$_smarty_tpl->tpl_vars['row']->value['rank_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['rank_name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>昵称：</label></td>
                <td class="td-input">
                    <input type="text" name="post[nickname]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['nickname'];?>
" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>真实名称：</label></td>
                <td class="td-input">
                    <input type="text" name="post[realname]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['realname'];?>
" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>电子邮箱：</label></td>
                <td class="td-input">
                    <input type="text" name="post[email]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" class="form-i w200">
                </td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['mid']){?>
            <tr>
                <td class="td-label"><label>可用余额：</label></td>
                <td class="td-input"> <?php echo $_smarty_tpl->tpl_vars['row']->value['user_money'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>冻结金额：</label></td>
                <td class="td-input"> <?php echo $_smarty_tpl->tpl_vars['row']->value['frozen_money'];?>
 </td>
            </tr>
            <?php }?>
            <tr>
                <td class="td-label"><label>新密码：</label></td>
                <td class="td-input">
                    <input type="password" name="post[password]" value="" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>确认密码：</label></td>
                <td class="td-input">
                    <input type="password" name="post[cfmpassword]" value="" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>新支付密码：</label></td>
                <td class="td-input">
                    <input type="password" name="post[pay_password]" value="" class="form-i w200">
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>确认支付密码：</label></td>
                <td class="td-input">
                    <input type="password" name="post[cfmpay_password]" value="" class="form-i w200">
                </td>
            </tr>
            <tr class="h s0">
                <td class="td-label"><label>性别：</label></td>
                <td class="td-input">
                   <label><input type="radio" name="post[sex]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==1||$_smarty_tpl->tpl_vars['row']->value['id']==0){?>checked<?php }?>> 男</label>
                   <label><input type="radio" name="post[sex]" value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==2){?>checked<?php }?>> 女</label>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>生日：</label></td>
                <td class="td-input"><input type="text" name="post[birthday]" onclick="WdatePicker()" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['birthday'];?>
" class="form-i w200"></td>
            </tr>
            <tr>
                <td class="td-label"><label>所在地区：</label></td>
                <td class="td-input"><div id="select_linkage"><?php echo $_smarty_tpl->tpl_vars['area']->value;?>
</div></td>
            </tr>
            <tr>
                <td class="td-label"><label>联系地址：</label></td>
                <td class="td-input"><input type="text" name="post[address]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" class="form-i w200"></td>
            </tr>
            <tr>
                <td class="td-label"><label>手机号：</label></td>
                <td class="td-input">
                    <input type="text" name="post[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
" class="form-i w200">
                </td>
            </tr>
            <tr class="h s0">
                <td class="td-label"><label>状态：</label></td>
                <td class="td-input">
                    <label><input type="radio" name="post[status]" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1||$_smarty_tpl->tpl_vars['row']->value['id']==0){?>checked<?php }?>> 正常</label>
                    <label><input type="radio" name="post[status]" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==0){?>checked<?php }?>> 关闭</label>
                </td>
            </tr>
            <?php if ($_GET['act']!='show'){?>
            <tr class="tr-btn">
                <td class="td-label"></td>
                <td class="td-input">
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
    $.loadJs('/admin/js/manage/linkage.js',function(){
});
</script>
<?php }} ?>