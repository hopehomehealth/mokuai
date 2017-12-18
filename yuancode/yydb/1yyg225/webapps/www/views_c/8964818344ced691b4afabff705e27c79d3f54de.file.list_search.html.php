<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 18:36:39
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\log\list_search.html" */ ?>
<?php /*%%SmartyHeaderCode:1387956ced937d70c99-55637569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8964818344ced691b4afabff705e27c79d3f54de' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\log\\list_search.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1387956ced937d70c99-55637569',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnNo' => 0,
    'key' => 0,
    'm' => 0,
    'k' => 0,
    'q' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ced937ed05e8_14155550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ced937ed05e8_14155550')) {function content_56ced937ed05e8_14155550($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><h3 class="info-tag">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
    <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNo']->value==$_smarty_tpl->tpl_vars['key']->value){?> BtnBlue<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>
    <?php } ?>
</h3>

<div class="html-box">

    <form class="cond-form clear" action="#!log/index" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="word" <?php if ($_smarty_tpl->tpl_vars['k']->value=='word'){?>selected<?php }?>>搜索词</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <table class="list">
        <thead>
            <tr>
                <th align="left" class="w30">ID</th>
                <th align="left" class="w120">搜索词</th>
                <th align="left" class="w140">第一次搜索</th>
                <th align="left" class="w140">最后一次搜索</th>
                <th align="center" class="w40">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['word'];?>
<span class="c-orange">(<?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
)</span></td>
                <td align="left" nowrap><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['start_time'],'Y-m-d H:i:s');?>
</td>
                <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['last_time'],'Y-m-d H:i:s');?>
</td>
                <td class='opera' align='center' nowrap>
                    <a href='javascript:;' onclick="main.confirm_del('log/del_search','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
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