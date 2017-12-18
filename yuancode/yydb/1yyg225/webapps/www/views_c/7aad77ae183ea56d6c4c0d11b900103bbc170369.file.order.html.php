<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:50:35
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\yunbuy\order.html" */ ?>
<?php /*%%SmartyHeaderCode:21425565978eb821534-35199816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7aad77ae183ea56d6c4c0d11b900103bbc170369' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\yunbuy\\order.html',
      1 => 1446429849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21425565978eb821534-35199816',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'status' => 0,
    'is_award' => 0,
    'total' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565978eb976712_66473643',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565978eb976712_66473643')) {function content_565978eb976712_66473643($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form class="cond-form clear" action="#!yunbuy/order" onsubmit="return xForm.submit(this)">        <div class="f-unit">            <select name="k" id="k">                <option value="goods_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='goods_name'){?>selected<?php }?>>商品名称</option>                <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>会员名</option>                <option value="order_sn" <?php if ($_smarty_tpl->tpl_vars['k']->value=='order_sn'){?>selected<?php }?>>订单号</option>            </select>            <input class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">            <select name="status">                <option value="">-云购状态-</option>                <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1){?>selected<?php }?>>未支付</option>                <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2){?>selected<?php }?>>进行中</option>                <option value="3" <?php if ($_smarty_tpl->tpl_vars['status']->value==3){?>selected<?php }?>>已获得</option>                <option value="4" <?php if ($_smarty_tpl->tpl_vars['status']->value==4){?>selected<?php }?>>待揭晓</option>                <option value="5" <?php if ($_smarty_tpl->tpl_vars['status']->value==5){?>selected<?php }?>>未中奖</option>            </select>            <select name="is_award">                <option value="">-是否领取-</option>                <option value="1" <?php if ($_smarty_tpl->tpl_vars['is_award']->value==1){?>selected<?php }?>>已领取</option>                <option value="2" <?php if ($_smarty_tpl->tpl_vars['is_award']->value==2){?>selected<?php }?>>未领取</option>            </select>            <label class="ui-label">下单时间：</label>            <input class="form-i w80 sitem" name="start_time" value="<?php echo get('start_time');?>
" type="text" onclick="WdatePicker()">            <input style="margin-left:-1px" class="form-i w80 sitem" name="end_time" value="<?php echo get('end_time');?>
" type="text" onclick="WdatePicker()">            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>            &nbsp;&nbsp;&nbsp;云购订单金额:￥<b><?php echo $_smarty_tpl->tpl_vars['total']->value['amount'];?>
</b> 商品总价: ￥<b><?php echo $_smarty_tpl->tpl_vars['total']->value['price_amount'];?>
</b>        </div>    </form>    <table class="list">        <thead>            <tr>                <th class="w30">ID</th>                <th colspan="2" align="left">商品名称</th>                <th>会员名</th>                <th class="w120">商品总价</th>                <th class="w120">单次售价</th>                <th class="w120">参与人次</th>                <th class="w80">状态</th>                <th class="w80">云购时间</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td width="50"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" width="50" /></td>                <td>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span style="background: #00A47C; color: #fff; padding: 0 3px;">赠币专区</span><?php }?></td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['price'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</td>                <td align="center"><?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?><span class="c-disable">未支付</span><?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==2){?><span class="c-green">进行中</span><?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==3){?><span class="c-red">已获得</span><?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==4){?><span class="c-orange">待揭晓</span><?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==5){?><span class="c-gray">未获得</span><?php }?></td>                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['add_time'],'Y-m-d H:i:s');?>
</td>                <td class='opera' align='center' nowrap>                    <a href='#!yunbuy/detail/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|订单详细'>详情</a>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']){?>                    <a href='javascript:;' class='c-green' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","is_show","id")' title='点击设为隐藏'>显示</a>                    <?php }else{ ?>                    <a href='javascript:;' class='c-red' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","is_show","id")' title='点击设为显示'>隐藏</a>                    <?php }?>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==3&&$_smarty_tpl->tpl_vars['m']->value['is_award']==0){?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['fdis']){?>                        <a href='javascript:;' class='c-green' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","fdis","id")' title='点击设为允许'>永不失效</a>                        <?php }else{ ?>                        <a href='javascript:;' class='c-red' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","fdis","id")' title='点击设为永不失效'>允许失效</a>                        <?php }?>                    <?php }?>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>    </div></div><?php }} ?>