<?php /* Smarty version Smarty-3.1.13, created on 2016-03-04 16:19:20
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\bonus\list.html" */ ?>
<?php /*%%SmartyHeaderCode:1889456ce6b459b2806-11347652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '200ccb05c5d237b979f9edd49b5e7b3a3312e242' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\bonus\\list.html',
      1 => 1457079557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1889456ce6b459b2806-11347652',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce6b4719d474_02490757',
  'variables' => 
  array (
    'L' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce6b4719d474_02490757')) {function content_56ce6b4719d474_02490757($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w30">ID</th>                <th align="left"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
名称</th>                <th align="left"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
价值</th>                <th align="left">赠送类型</th>                <th align="left">有效时间</th>                <th class="w80">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</td>                <td><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['money'];?>
</b><span class="c-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['money_type_title'];?>
</span></td>                <td><?php if ($_smarty_tpl->tpl_vars['m']->value['send_type']>0){?><span class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['send_type_title'];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['send_type_title'];?>
<?php }?></td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['use_day_title'];?>
</td>                <td class='opera' align='center' nowrap>                    <a href='#!bonus/send/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|发放<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
' class='iconfont icon-a' title='发放<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
'>&#xe604;</a>                    <a href='#!bonus/user_bonus/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
' class='iconfont icon-a' title='查看发放的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
'>&#xe605;</a>                    <a href='#!bonus/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
(<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
)' class='iconfont icon-a' title='编辑'>&#xe603;</a>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['send_type']!=1){?>                    <a href='javascript:;' onclick="main.confirm_del('bonus/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                    <?php }?>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>    </div>    </form></div><?php }} ?>