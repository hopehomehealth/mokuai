<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:49:43
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\payment\list.html" */ ?>
<?php /*%%SmartyHeaderCode:183255660fd5dd9d499-19370734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c4020b0f807acfc72145c5ce35b48bd01234416' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\payment\\list.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183255660fd5dd9d499-19370734',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fd5e005914_25396457',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fd5e005914_25396457')) {function content_5660fd5e005914_25396457($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w120" align="left">支付方式</th>                <th>描述</th>                <th class="w40">版本</th>                <th class="w60">费用</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['cod'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['cod']->value = $_smarty_tpl->tpl_vars['m']->key;
?>            <tr>                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_order'];?>
' /></td>                <td nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>                <td class="c-gray"><?php echo nl2br($_smarty_tpl->tpl_vars['m']->value['desc']);?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['version'];?>
</td>                <td align="center">                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_cod']){?>配送决定                    <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_fee'];?>
                    <?php }?>                </td>                <td class='opera' align='center' nowrap>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['install']==1){?>                    <a class="uiBtn" href="#!payment/install/<?php echo $_smarty_tpl->tpl_vars['m']->value['code'];?>
?&com=xshow|编辑<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
">编辑</a>                    <a class="uiBtn" href="javascript:;" onclick="main.confirm_del('payment/uninstall','<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_code'];?>
','确认卸载<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
吗？')">卸载</a>                    <?php }else{ ?>                    <a class="uiBtn" href="#!payment/install/<?php echo $_smarty_tpl->tpl_vars['m']->value['code'];?>
?com=xshow|安装<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
">安装</a>                    <?php }?>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','payment','pay_order','pay_id')">更新排序</button>    </div>    </form></div><?php }} ?>