<?php /* Smarty version Smarty-3.1.13, created on 2016-06-02 13:50:43
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\plate\log.html" */ ?>
<?php /*%%SmartyHeaderCode:75225734159944aa27-57731472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5fa0369530a443e4608b639877fed418f4e95ed' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\plate\\log.html',
      1 => 1464846640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75225734159944aa27-57731472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5734159953ec63_66288220',
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnNo' => 0,
    'key' => 0,
    'm' => 0,
    'k' => 0,
    'q' => 0,
    'winConfig' => 0,
    'star' => 0,
    'total' => 0,
    'L' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5734159953ec63_66288220')) {function content_5734159953ec63_66288220($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><h3 class="info-tag">    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>    <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNo']->value==$_smarty_tpl->tpl_vars['key']->value){?> BtnBlue<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>    <?php } ?></h3><div class="html-box">    <form class="cond-form clear" action="#!plate/log" onsubmit="return xForm.submit(this)">        <div class="f-unit">            <select name="k" id="k">                <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>用户名</option>            </select>            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">            <select name="star">                <option value="">-中奖等级-</option>                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['winConfig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                <?php if (!$_smarty_tpl->tpl_vars['m']->value['key']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['key']==99;?>
<?php }?>                <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['key'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['key']==$_smarty_tpl->tpl_vars['star']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>                <?php } ?>            </select>            <label>&nbsp;<input type="checkbox" name="total" value="1" <?php if ($_smarty_tpl->tpl_vars['total']->value==1){?>checked<?php }?> /> 统计</label>            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>        </div>    </form>    <?php if ($_smarty_tpl->tpl_vars['total']->value==1){?>    <div class="tips">        消耗<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
：        <b class="c-red"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['pay_points'])===null||$tmp==='' ? 0 : $tmp);?>
</b>        消耗人次：        <b class="c-red"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['pai_number'])===null||$tmp==='' ? 0 : $tmp);?>
</b>    </div>    <?php }?>    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th align="left" class="w30">ID</th>                <th align="left" class="w120">用户名</th>                <th align="left">抽奖条件</th>                <th align="left">中奖信息</th>                <th align="left">描述日志</th>                <th align="left" class="w160">抽奖时间</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</td>                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['cond_info'];?>
</td>                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['star_info'];?>
</td>                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>                <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['c_time'],'Y-m-d H:i');?>
</td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>    </div>    </form></div><?php }} ?>