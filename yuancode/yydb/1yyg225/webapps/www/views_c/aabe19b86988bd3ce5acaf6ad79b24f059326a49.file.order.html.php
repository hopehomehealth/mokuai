<?php /* Smarty version Smarty-3.1.13, created on 2017-02-21 17:31:47
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/yunbuy/order.html" */ ?>
<?php /*%%SmartyHeaderCode:973275618584520263160c1-38590211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aabe19b86988bd3ce5acaf6ad79b24f059326a49' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/yunbuy/order.html',
      1 => 1487149497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '973275618584520263160c1-38590211',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584520263f8a60_29308857',
  'variables' => 
  array (
    'k' => 0,
    'L' => 0,
    'q' => 0,
    'username' => 0,
    'status' => 0,
    'type' => 0,
    'is_award' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584520263f8a60_29308857')) {function content_584520263f8a60_29308857($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!yunbuy/order" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="d.goods_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='d.goods_name'){?>selected<?php }?>>商品名称</option>
                <option value="o.order_sn" <?php if ($_smarty_tpl->tpl_vars['k']->value=='o.order_sn'){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
订单号</option>
                <option value="p.order_no" <?php if ($_smarty_tpl->tpl_vars['k']->value=='p.order_no'){?>selected<?php }?>>商户订单号</option>
                <option value="p.transaction_id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='p.transaction_id'){?>selected<?php }?>>支付订单号</option>
            </select>
            <input class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <label class="ui-label">会员名：</label>
            <input class="form-i w160 sitem" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" type="text">
            <select name="status">
                <option value="">-<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
状态-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1){?>selected<?php }?>>未支付</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2){?>selected<?php }?>>进行中</option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['status']->value==3){?>selected<?php }?>>已中奖</option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['status']->value==4){?>selected<?php }?>>待揭晓</option>
                <option value="5" <?php if ($_smarty_tpl->tpl_vars['status']->value==5){?>selected<?php }?>>未中奖</option>
            </select>
            <select name="type">
                <option value="">-<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
类型-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>selected<?php }?>>普通</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</option>
            </select>
            <select name="is_award">
                <option value="">-是否领奖-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['is_award']->value==1){?>selected<?php }?>>已领奖</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['is_award']->value==2){?>selected<?php }?>>未领奖</option>
            </select>
            <label class="ui-label">下单时间：</label>
            <input class="form-i w80 sitem" name="start_time" value="<?php echo get('start_time');?>
" type="text" onclick="WdatePicker()">
            <input style="margin-left:-1px" class="form-i w80 sitem" name="end_time" value="<?php echo get('end_time');?>
" type="text" onclick="WdatePicker()">
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
            <tr>
                <th class="w30">ID</th>
                <th align="left">商品名称</th>
                <th>会员名</th>
                <th class="w120">商品总价</th>
                <th class="w120">单次售价</th>
                <th class="w120">参与人次[多期]</th>
                <th class="w80">状态</th>
                <th class="w80"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间</th>
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
                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
                <td>
                    <!--(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) -->(<?php echo date("Ymd",$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
)<a href="<?php echo @constant('RootUrl');?>
<?php echo ('yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span style="background: #00A47C; color: #fff; padding: 0 3px;">赠币专区</span><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['order_no']){?>
                    <p class="c-gray">商户订单号：<?php echo $_smarty_tpl->tpl_vars['m']->value['order_no'];?>
</p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['transaction_id']){?>
                    <p class="c-gray">支付订单号：<?php echo $_smarty_tpl->tpl_vars['m']->value['transaction_id'];?>
</p>
                    <?php }?>
                </td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>

                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_robots']){?>
                    <img src="/admin/images/robots.png" style="vertical-align: middle" title="机器人" />
                    <?php }?>
                </td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['price'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
[<?php echo $_smarty_tpl->tpl_vars['m']->value['multi'];?>
]</td>
                <td align="center"><span class="<?php echo $_smarty_tpl->tpl_vars['m']->value['status_class'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
</span></td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['add_time'],'Y-m-d H:i:s');?>
</td>
                <td class='opera' align='center' nowrap>
                    <a href='#!yunbuy/detail/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|订单详细'>详情</a>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']){?>
                    <a href='javascript:;' class='c-green' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","is_show","id")' title='点击设为隐藏'>显示</a>
                    <?php }else{ ?>
                    <a href='javascript:;' class='c-red' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","is_show","id")' title='点击设为显示'>隐藏</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==3&&$_smarty_tpl->tpl_vars['m']->value['is_award']==0){?>
                        <?php if ($_smarty_tpl->tpl_vars['m']->value['fdis']){?>
                        <a href='javascript:;' class='c-green' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","fdis","id")' title='点击设为允许'>永不失效</a>
                        <?php }else{ ?>
                        <a href='javascript:;' class='c-red' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
","yundb","fdis","id")' title='点击设为永不失效'>允许失效</a>
                        <?php }?>
                    <?php }?>
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

<script type="text/javascript">
    function exportExcel(){
        var arr = location.hash.split("?");
        var get = arr[1]?('?'+arr[1]):'';
        if(!get){
            com.xtip('导出量较大，请先进行筛选操作！',{ type:1 });
        }else{
            location.href='/manage/yunbuy/exportExcel'+get;
        }
    }
</script>

<?php }} ?>