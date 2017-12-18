<?php /* Smarty version Smarty-3.1.13, created on 2016-12-20 14:25:14
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/bonus/list_user_bonus.html" */ ?>
<?php /*%%SmartyHeaderCode:3532975495858cecaf2af46-58250301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c09bd47017cf218e59986188bc3d4e13141bd007' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/bonus/list_user_bonus.html',
      1 => 1481178449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3532975495858cecaf2af46-58250301',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'status' => 0,
    'L' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5858cecb11a770_40715106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5858cecb11a770_40715106')) {function content_5858cecb11a770_40715106($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form class="cond-form clear" action="#!bonus/user_bonus" onsubmit="return xForm.submit(this)">        <div class="f-unit">            <select name="k" id="k">                <option value="m.username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>会员名</option>                <option value="m.mobile" <?php if ($_smarty_tpl->tpl_vars['k']->value=='m.mobile'){?>selected<?php }?>>会员手机号</option>                <option value="m.mid" <?php if ($_smarty_tpl->tpl_vars['k']->value=='m.mid'){?>selected<?php }?>>会员ID</option>            </select>            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">            <select name="status">                <option value="">-状态-</option>                <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1){?>selected<?php }?>>未使用</option>                <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2){?>selected<?php }?>>已使用</option>                <option value="3" <?php if ($_smarty_tpl->tpl_vars['status']->value==3){?>selected<?php }?>>已过期</option>            </select>            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>        </div>    </form>    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w30">ID</th>                <th align="left"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
序列号</th>                <th align="left"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
名称/价值</th>                <th align="left">有效时间</th>                <th align="left">所属会员/ID</th>                <th align="left">获取途径</th>                <th align="center">使用时间/<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
订单号</th>                <th class="w80">状态</th>                <th class="w80">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bonus_sn'];?>
</td>                <td>                    <?php echo $_smarty_tpl->tpl_vars['m']->value['b_title'];?>
<br>                    <b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['money'];?>
</b><span class="c-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['money_type_title'];?>
</span>                </td>                <td>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['start_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['start_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>---<?php }?><br>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['end_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['end_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>---<?php }?>                </td>                <td>                    <a href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" target="_blank" class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</a>                    <span class="c-gray"> / <?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
</span>                </td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>                <td align="center">                    <?php if ($_smarty_tpl->tpl_vars['m']->value['used_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['used_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>---<?php }?><br>                    <?php echo $_smarty_tpl->tpl_vars['m']->value['o_order_sn'];?>
                </td>                <td align="center">                    <?php if ($_smarty_tpl->tpl_vars['m']->value['disabled']==2){?>                    <span class="c-red">已使用</span>                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['disabled']==1){?>                    <span class="c-gray">已过期</span>                    <?php }else{ ?>                    未使用                    <?php }?>                </td>                <td class='opera' align='center' nowrap>                    <a href='javascript:;' onclick="main.confirm_del('bonus/del_user_bonus','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='移除'>&#xe606;</a>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>    </div>    </form></div><?php }} ?>