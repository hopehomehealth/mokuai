<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:45:52
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\sharecode\list.html" */ ?>
<?php /*%%SmartyHeaderCode:141125660fe7b7f93d2-14757226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '574b5b898b38010ebba592ad6bb12b4d955ab3f8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\sharecode\\list.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141125660fe7b7f93d2-14757226',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fe7b929699_18468665',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'list' => 0,
    'm' => 0,
    'r' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fe7b929699_18468665')) {function content_5660fe7b929699_18468665($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!yunbuy/order" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>会员名</option>
                <option value="code" <?php if ($_smarty_tpl->tpl_vars['k']->value=='code'){?>selected<?php }?>>分享码</option>
            </select>
            <input class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
            <tr>
                <th class="w30">ID</th>
                <th>分享码</th>
                <th>会员名</th>
                <th class="w120">价值</th>
                <th class="w120">使用次数/允许使用次数</th>
                <th>生成时间</th>
                <th>使用记录</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
                <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['code'];?>
</td>
                <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</td>
                <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['value'];?>
</td>
                <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['used_time'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['allow_time'];?>
</td>
                <td align='center'><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</td>
                <td align='center'>
                    <ul>
                    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                    <li><b><?php echo $_smarty_tpl->tpl_vars['r']->value['username'];?>
</b>  订单号<?php echo $_smarty_tpl->tpl_vars['r']->value['order_sn'];?>
  <?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['r']->value['use_time']);?>
</li>
                    <?php } ?>
                    </ul>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
    </div>

</div>

<?php }} ?>