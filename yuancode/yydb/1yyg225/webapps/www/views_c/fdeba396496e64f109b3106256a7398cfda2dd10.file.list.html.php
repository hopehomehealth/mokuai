<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 14:47:57
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/business/list.html" */ ?>
<?php /*%%SmartyHeaderCode:12850286345849021dd86981-02330267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdeba396496e64f109b3106256a7398cfda2dd10' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/business/list.html',
      1 => 1481177921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12850286345849021dd86981-02330267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'bus_status' => 0,
    'key' => 0,
    'status' => 0,
    'm' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5849021de3c1f1_13263951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5849021de3c1f1_13263951')) {function content_5849021de3c1f1_13263951($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!business/index" onsubmit="return xForm.submit(this)">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="m.username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='m.username'){?>selected<?php }?>>会员名</option>
                <option value="b.bus_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='b.bus_name'){?>selected<?php }?>>店铺名称</option>
                <option value="b.bus_tel" <?php if ($_smarty_tpl->tpl_vars['k']->value=='b.bus_tel'){?>selected<?php }?>>联系电话</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <select name="status">
                <option value="99">-商家状态-</option>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bus_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['status']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>
                <?php } ?>
            </select>

            <button type="submit" id="submit" style="margin:1px 20px 0 10px;float:left;" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
        <tr>
            <th class="w60">会员ID</th>
            <th align="left" colspan="2">商家名称/用户名</th>
            <th align="left">联系手机/QQ</th>
            <th align="left">实体名称/联系地址</th>
            <th align="left">备注（未审核原因）</th>
            <th class="w140">开店时间/申请时间</th>
            <th class="w80">状态</th>
            <th class="w140">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
</td>
            <td align="left" width="40"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['m']->value['bus_logo'],'store');?>
" width="40" /></td>
            <td align='left'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['bus_name'])===null||$tmp==='' ? '-' : $tmp);?>
<br /><span class="c-gray"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['username'])===null||$tmp==='' ? '-' : $tmp);?>
</span></td>
            <td align='left'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['bus_tel'])===null||$tmp==='' ? '-' : $tmp);?>
<br /><span class="c-gray"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['bus_qq'])===null||$tmp==='' ? '-' : $tmp);?>
</span></td>
            <td align='left'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['bus_company'])===null||$tmp==='' ? '-' : $tmp);?>
 <b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['bus_company_type'];?>
</b><br /><span class="c-gray"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['bus_area'])===null||$tmp==='' ? '-' : $tmp);?>
 <?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['bus_address'])===null||$tmp==='' ? '-' : $tmp);?>
</span></td>
            <td align='left'><?php echo $_smarty_tpl->tpl_vars['m']->value['bus_why'];?>
</td>
            <td align='center'><?php if ($_smarty_tpl->tpl_vars['m']->value['time_open']){?><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['time_open']);?>
<?php }else{ ?>-<?php }?><br /><span class="c-gray"><?php if ($_smarty_tpl->tpl_vars['m']->value['time_apply']){?><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['time_apply']);?>
<?php }else{ ?>-<?php }?></span></td>
            <td align="center">
                <span style="color:<?php echo $_smarty_tpl->tpl_vars['m']->value['bus_status_row']['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['bus_status_row']['name'];?>
</span>
            </td>
            <td class="opera" nowrap>
                <a class="uiBtn" href="#!business/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|编辑商家信息">编辑</a>
                <a class="uiBtn" href="#!goods/index/?k=b.bus_name&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['bus_name'];?>
&is_sale=99">商品审核</a>
                <p style="height: 5px"> </p>
                <a class="uiBtn" href='javascript:;' onclick="main.confirm_del('business/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')">删除</a>
                <a class="uiBtn" href="#!member/account_log?mid=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
&k=desc&q=商家资金结算" title="商家资金结算">结算明细</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
    </div>
</div><?php }} ?>