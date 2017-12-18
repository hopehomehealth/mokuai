<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:19:29
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/bonus/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1702009709584909816db061-26334434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '497f69f0a470d0dde1bcdebb32926aeceb98e8a5' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/bonus/list.html',
      1 => 1481177921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1702009709584909816db061-26334434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58490981756904_27347798',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58490981756904_27347798')) {function content_58490981756904_27347798($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <dl class="help-tip">        <dt><a href="javascript:;" onclick="main.helpTip();"><i class="iconfont icon-a">&#xe63b;</i><span>温馨提示</span> <i class="iconfont icon-a">&#xe65b;</i></a></dt>        <dd class="help-dd">            <ul>                <li>- <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
为线上功能，发放给会员后，会员下单时可直接充当余额使用</li>                <li>- 系统赠送的所有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
为自动赠送类型</li>                <li>- 普通类型只能通过手动发放<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
给会员使用</li>            </ul>        </dd>    </dl>    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w30">ID</th>                <th align="left"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
名称</th>                <th align="left"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
价值</th>                <th align="left">赠送类型</th>                <th align="left">有效时间</th>                <th class="w80">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</td>                <td><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['money'];?>
</b><span class="c-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['money_type_title'];?>
</span></td>                <td><?php if ($_smarty_tpl->tpl_vars['m']->value['send_type']>0){?><span class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['send_type_title'];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['send_type_title'];?>
<?php }?></td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['use_day_title'];?>
</td>                <td class='opera' align='center' nowrap>                    <a href='#!bonus/send/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|发放<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
' class='iconfont icon-a' title='发放<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
'>&#xe604;</a>                    <a href='#!bonus/user_bonus/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
' class='iconfont icon-a' title='查看发放的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
'>&#xe605;</a>                    <a href='#!bonus/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
(<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
)' class='iconfont icon-a' title='编辑'>&#xe603;</a>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['send_type']!=1&&$_smarty_tpl->tpl_vars['m']->value['send_type']!=2){?>                    <a href='javascript:;' onclick="main.confirm_del('bonus/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                    <?php }?>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>    </div>    </form></div><?php }} ?>