<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:14:34
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/express/list.html" */ ?>
<?php /*%%SmartyHeaderCode:603948635584521eaa00703-16132066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca4973fdbddad32cd542b460c8c7f23a57c85151' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/express/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '603948635584521eaa00703-16132066',
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
  'unifunc' => 'content_584521eab71a62_02648384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584521eab71a62_02648384')) {function content_584521eab71a62_02648384($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">快递公司</th>                <th class="w60">快递标识</th>                <th class="w80">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['pinyin'];?>
</td>                <td class='opera' align='center' nowrap>                    <a href='#!express/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑快递公司' class='iconfont icon-a' title='编辑'>&#xe603;</a>                    <a href='javascript:;' onclick="main.confirm_del('express/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','express')">更新排序</button>    </div>    </form></div><?php }} ?>