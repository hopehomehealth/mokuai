<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 18:40:25
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/withdraw.html" */ ?>
<?php /*%%SmartyHeaderCode:15104742195857b919461ca6-97763163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79b4a2357d5322a8b5fb4d4d244d8aefa4b5c6ed' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/withdraw.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15104742195857b919461ca6-97763163',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'feelist' => 0,
    'key' => 0,
    'm' => 0,
    'list' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5857b9195c5916_28555235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857b9195c5916_28555235')) {function content_5857b9195c5916_28555235($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <form action="" method="post" target="iframeNews">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>提现</h2>
                    <span><a href="<?php echo '/member/accountlog?type=2#m';?>
" class="color02">-查看提现记录-</a></span>
                </div>
                <div class="hy-czbox" style="padding-top:30px">
                    <label>提现金额:</label>
                    <input name="amount" type="text" class="inpt-style2" />
                    <span>可提现余额：<?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</span>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['feelist']->value){?>
                <div class="hy-czbox">
                    <label>到帐时间:</label>
                    <select name="gotime" id="gotime">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</option>
                        <?php } ?>
                    </select>
                    <span class="color01 fee">提现将收取
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fee']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fee']['index']++;
?>
                        <b class="fee<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['fee']['index']!=0){?>style="display:none;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b>
                        <?php } ?>
                        手续费
                    </span>
                </div>
                <script type="text/javascript">
                $('#gotime').bind('change',function(){
                    var v=$(this).val();
                    $('.fee b').hide();
                    $('.fee b.fee'+v).css('display','');
                })
                </script>
                <?php }?>
                <div class="hy-box">
                    <div class="mt15 hy-table">
                        <table>
                            <tr>
                                <th style="width:200px;">银行名称</th>
                                <th>持卡人姓名</th>
                                <th style="width:150px;">银行卡号</th>
                                <th style="width:250px;">开户行所在地</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                            <tr>
                                <td><label><input name="id" type="radio" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['is_default']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->tpl_vars['m']->value['bankname'];?>
</label></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bankcard'];?>
</td>
                                <td style="text-align: left;"><?php echo $_smarty_tpl->tpl_vars['m']->value['bankaddress'];?>
</td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4" style="text-align:right;">您当前的可用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
为：<span class="color01">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['user_money'];?>
</span>	冻结<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
：<span class="color02">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['frozen_money'];?>
</span> 元</td>
                            </tr>
                        </table>
                        <div class="btn2">
                            <input name="Submit" type="submit" value="提交申请" class="hy-btn2" /><input type="reset" value="重置表单" class="hy-btn2" />
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>