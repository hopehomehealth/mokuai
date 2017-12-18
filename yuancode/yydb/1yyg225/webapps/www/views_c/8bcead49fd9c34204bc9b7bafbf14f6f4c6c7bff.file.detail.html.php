<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:52:07
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\yunbuy\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:276255661008f3b0ba8-31499426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bcead49fd9c34204bc9b7bafbf14f6f4c6c7bff' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\yunbuy\\detail.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276255661008f3b0ba8-31499426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661008f4fe6c7_85099802',
  'variables' => 
  array (
    'L' => 0,
    'row' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661008f4fe6c7_85099802')) {function content_5661008f4fe6c7_85099802($_smarty_tpl) {?><table class="table-list">
    <tbody>
    <tr>
        <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品：</label></td>
        <td class="td-input"><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_name'];?>
</a></td>
    </tr>
    <tr>
        <td class="td-label"><label>参与人次：</label></td>
        <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['qty'];?>
</td>
    </tr>
    <tr>
        <td class="td-label"><label>状态：</label></td>
        <td class="td-input"><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1){?><span class="c-disable">未支付</span><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==2){?><span class="c-green">进行中</span><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==3){?><span class="c-red">已<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</span><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==4){?><span class="c-orange">待揭晓</span><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==5){?><span class="c-gray">未<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</span><?php }?></td>
    </tr>
    <?php if (!empty($_smarty_tpl->tpl_vars['row']->value['db_time'])){?>
    <tr>
        <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间：</label></td>
        <td class="td-input"><?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['db_time'],'Y-m-d H:i:s.x');?>
</td>
    </tr>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['row']->value['yun_code'])){?>
    <tr>
        <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
码：</label></td>
        <td class="td-input" width="500">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['yun_code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li style="width: 20%; float: left;" <?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']==$_smarty_tpl->tpl_vars['m']->value){?>class="c-red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table><?php }} ?>