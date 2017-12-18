<?php /* Smarty version Smarty-3.1.13, created on 2016-12-12 11:49:07
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/bonus.html" */ ?>
<?php /*%%SmartyHeaderCode:1771808849584e1e33c1cce0-96708690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e1ae23a493f2b59264056fa9703190cfcc23d6f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/bonus.html',
      1 => 1481177906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1771808849584e1e33c1cce0-96708690',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'full_cut' => 0,
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584e1e33cd14d4_77555641',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584e1e33cd14d4_77555641')) {function content_584e1e33cd14d4_77555641($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/css/member.css">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <style type="text/css">
            .refer-box .rleft ul li{ width:410px;}
        </style>
        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title"><h2><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
使用规则</h2></div>
                <div class="hy-box">
                    1.单次订单支付人次大于等于<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
面值时，该<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
即可使用<br>
                    <?php if ($_smarty_tpl->tpl_vars['full_cut']->value['full_cut_0']){?>
                    2.所有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
遵循满<?php echo $_smarty_tpl->tpl_vars['full_cut']->value['full_cut_0'];?>
减<?php echo $_smarty_tpl->tpl_vars['full_cut']->value['full_cut_1'];?>
的规则（即单次订单支付<?php echo $_smarty_tpl->tpl_vars['full_cut']->value['full_cut_0'];?>
人次即可使用<?php echo $_smarty_tpl->tpl_vars['full_cut']->value['full_cut_1'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
）
                    <?php }?>
                </div>
                <div class="title"><h2>我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
</h2></div>
                <div class="hy-table" style="margin: 10px auto;">
                    <table>
                        <tbody>
                        <tr>
                            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
序列号</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
名称/价值</th>
                            <th>有效时间</th>
                            <th>使用时间/订单号</th>
                            <th>状态</th>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                          <tr>
                              <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bonus_sn'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['m']->value['b_title'];?>
<br><b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['money'];?>
</b><?php echo $_smarty_tpl->tpl_vars['m']->value['money_type_title'];?>
</td>
                              <td>
                                  <?php if ($_smarty_tpl->tpl_vars['m']->value['start_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['start_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>--<?php }?><br>
                                  <?php if ($_smarty_tpl->tpl_vars['m']->value['end_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['end_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>--<?php }?>
                              </td>
                              <td>
                                  <?php if ($_smarty_tpl->tpl_vars['m']->value['used_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['used_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>--<?php }?><br>
                                  <?php echo $_smarty_tpl->tpl_vars['m']->value['order_id'];?>

                              </td>
                              <td>
                                  <?php if ($_smarty_tpl->tpl_vars['m']->value['disabled']==1){?>
                                  <?php if ($_smarty_tpl->tpl_vars['m']->value['order_id']){?>
                                  <span class="color01">已使用</span>
                                  <?php }else{ ?>
                                  <span class="color01">已过期</span>
                                  <?php }?>
                                  <?php }else{ ?>
                                  未使用
                                  <?php }?>
                              </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                     </table>
                 </div>
                <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>