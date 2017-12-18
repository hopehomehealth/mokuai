<?php /* Smarty version Smarty-3.1.13, created on 2016-12-26 18:48:27
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/field/list.html" */ ?>
<?php /*%%SmartyHeaderCode:18077245155860f57ba75b39-16538501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdeffedcec64e952addf83c17410bb9cf532897d' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/field/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18077245155860f57ba75b39-16538501',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'moduleid' => 0,
    'data' => 0,
    'm' => 0,
    'nostatus' => 0,
    'nodelete' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5860f57baea7f4_83580928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5860f57baea7f4_83580928')) {function content_5860f57baea7f4_83580928($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <h3 class="table-title"><?php echo $_smarty_tpl->tpl_vars['module']->value['title'];?>
(<?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
)</h3>

    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <input type="hidden" name="moduleid" value="<?php echo $_smarty_tpl->tpl_vars['moduleid']->value;?>
" />

    <table class="list">
        <thead>
            <tr>
                <th class="w30">排序</th>
                <th class="w100">字段名</th>
                <th align="left">别名</th>
                <th class="w100">字段类型</th>
                <th class="w40">系统字段</th>
                <th class="w40">必填</th>
                <th class="w40">状态</th>
                <th class="w100">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['field'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['type'];?>
</td>
                <td align="center">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['issystem']==1){?>
                    <span class="c-green">√</span>
                    <?php }else{ ?>
                    <span class="c-red">×</span>
                    <?php }?>
                </td>
                <td align="center">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['required']==1){?>
                    <span class="c-green">√</span>
                    <?php }else{ ?>
                    <span class="c-red">×</span>
                    <?php }?>
                </td>
                <td align='center'>
                    <?php if (in_array($_smarty_tpl->tpl_vars['m']->value['field'],$_smarty_tpl->tpl_vars['nostatus']->value)){?>
                    <span class="c-gray"><?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>开启<?php }else{ ?>禁用<?php }?></span>
                    <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','module_field')" class="c-green" title="点击禁用">开启</a>
                    <?php }else{ ?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','module_field')" class="c-red" title="点击开启">禁用</a>
                    <?php }?>
                    <?php }?>
                </td>
                <td class='opera' align='center' nowrap>
                    <a href='#!field/edit/?moduleid=<?php echo $_smarty_tpl->tpl_vars['moduleid']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑字段' class='iconfont icon-a' title='编辑'>&#xe603;</a>
                    <?php if (in_array($_smarty_tpl->tpl_vars['m']->value['field'],$_smarty_tpl->tpl_vars['nodelete']->value)){?>
                    <span class='iconfont icon-a c-disable'>&#xe606;</span>
                    <?php }else{ ?>
                    <a href='javascript:;' onclick="main.confirm_del('field/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
                    <?php }?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="foot-btn">
        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','module_field')">更新排序</button>
    </div>
    </form>

</div>

<?php }} ?>