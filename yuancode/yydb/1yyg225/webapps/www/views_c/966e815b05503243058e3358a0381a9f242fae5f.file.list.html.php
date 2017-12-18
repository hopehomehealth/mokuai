<?php /* Smarty version Smarty-3.1.13, created on 2016-07-22 16:38:07
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\admin\list.html" */ ?>
<?php /*%%SmartyHeaderCode:250145791db6f1d5839-61061406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '966e815b05503243058e3358a0381a9f242fae5f' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\admin\\list.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250145791db6f1d5839-61061406',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5791db6f223a44_17269003',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5791db6f223a44_17269003')) {function content_5791db6f223a44_17269003($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\1yyg\\1yyg225_full\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">

    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <table class="list">
        <thead>
            <tr>
                <th align="left">用户名</th>
                <th align="left">备注</th>
                <th class="w120">角色</th>
                <th class="w140">加入时间</th>
                <th class="w140">最后登入</th>
                <th class="w80">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['c_time'],'Y-m-d H:i');?>
</td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['u_time'],'Y-m-d H:i');?>
</td>
                <td class='opera' align='center' nowrap>
                    <a href='#!admin/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['uid'];?>
&com=xshow|编辑管理员(<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
)' class='iconfont icon-a' title='编辑'>&#xe603;</a>
                    <a href='javascript:;' onclick="main.confirm_del('admin/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['uid'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
    </div>
    </form>

</div>

<?php }} ?>