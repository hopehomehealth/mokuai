<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:48:32
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\block\list.html" */ ?>
<?php /*%%SmartyHeaderCode:13531566120ff748425-49087349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b280972a931f42b5bc016cfd5d71b308293ae604' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\block\\list.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13531566120ff748425-49087349',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566120ff820161_94566956',
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566120ff820161_94566956')) {function content_566120ff820161_94566956($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">碎片名称</th>                <th class="w60">碎片标识</th>                <th class="w80">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['mark'];?>
</td>                <td class='opera' align='center' nowrap>                    <a href='#!block/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑碎片' class='iconfont icon-a' title='编辑'>&#xe603;</a>                    <a href='javascript:;' onclick="main.confirm_del('block/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','block')">更新排序</button>    </div>    </form></div><?php }} ?>