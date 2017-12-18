<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:48:31
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\module\list.html" */ ?>
<?php /*%%SmartyHeaderCode:105815660ff50ae7e74-99664276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c89446b6600d1e2db5f9e3142dc3892d2201dc9' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\module\\list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105815660ff50ae7e74-99664276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660ff50c1d144_11349920',
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660ff50c1d144_11349920')) {function content_5660ff50c1d144_11349920($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th class="w100">模型名称</th>                <th class="w100">模型表名</th>                <th align="left">模型简介</th>                <th class="w60">所属模块</th>                <th class="w40">状态</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td align="center"<?php if ($_smarty_tpl->tpl_vars['m']->value['issystem']==1){?> class='c-gray'<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>                <td class="c-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['description'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['menus_name'];?>
</td>                <td align='center'>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','module')" class="c-green" title="点击禁用">开启</a>                    <?php }else{ ?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','module')" class="c-red" title="点击开启">禁用</a>                    <?php }?>                </td>                <td class='opera' align='center' nowrap>                    <a href="#!field/index/?moduleid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class='iconfont icon-a' title='字段管理'>&#xe605;</a>                    <a href='#!module/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑模型' class='iconfont icon-a' title='编辑'>&#xe603;</a>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['issystem']==1){?>                    <span class='iconfont icon-a c-disable'>&#xe606;</span>                    <?php }else{ ?>                    <a href='javascript:;' onclick="main.confirm_del('module/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                    <?php }?>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','module')">更新排序</button>    </div>    </form></div><?php }} ?>