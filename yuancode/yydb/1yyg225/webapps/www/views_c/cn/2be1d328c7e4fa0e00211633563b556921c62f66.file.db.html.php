<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:56:32
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\member\db.html" */ ?>
<?php /*%%SmartyHeaderCode:8637565faf6016f7d7-75674751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2be1d328c7e4fa0e00211633563b556921c62f66' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\member\\db.html',
      1 => 1449041562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8637565faf6016f7d7-75674751',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'list' => 0,
    'm' => 0,
    'c' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565faf6045aa53_08543953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565faf6045aa53_08543953')) {function content_565faf6045aa53_08543953($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\WWW\\1yyg225\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<script type="text/javascript" src="/style/dp/WdatePicker.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
        <div class="hy-tjxh fn-clear">
            <ul class="fn-clear db-tab">
                <li class="dq"><a href="<?php echo url('/member/db');?>
">夺宝记录</a></li>
                <li><a href="<?php echo url('/member/luck');?>
">中奖记录</a></li>
            </ul>

            <div class="db-nrbox fn-clear">
                <div class="dq-lifl">
                    <a href="<?php echo url('/member/db');?>
" <?php if (!isset($_GET['order'])){?>class="dq"<?php }?>>参与成功</a>   |   <a href="<?php echo url('/member/db');?>
?order" <?php if (isset($_GET['order'])){?>class="dq"<?php }?>>未付款</a>
                </div>
                <?php if (!isset($_GET['order'])){?>
                <div class="dq-ts">
                    我的参与提醒： 即将揭晓奖品<a href="<?php echo url('/member/db');?>
?type=1" class="color01 fwb">（<?php echo $_smarty_tpl->tpl_vars['total']->value['wait'];?>
）</a> 进行中的奖品<a href="<?php echo url('/member/db');?>
?type=2" class="color01 fwb">（<?php echo $_smarty_tpl->tpl_vars['total']->value['ing'];?>
）</a> 已揭晓奖品<a href="<?php echo url('/member/db');?>
?type=3" class="color01 fwb">（<?php echo $_smarty_tpl->tpl_vars['total']->value['end'];?>
）</a>
                </div>
                <?php }?>
                <div class="fn-clear mt20">
                    <div class="fn-left db-sxl">
                        <a href="<?php echo url('/member/db');?>
<?php if (isset($_GET['order'])){?>?order<?php }?>" <?php if ($_GET['time']==''){?>class="dq"<?php }?>>全部</a>
                        <a href="<?php echo url('/member/db');?>
?time=1<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==1){?>class="dq"<?php }?>>今天</a>
                        <a href="<?php echo url('/member/db');?>
?time=2<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==2){?>class="dq"<?php }?>>本周</a>
                        <a href="<?php echo url('/member/db');?>
?time=3<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==3){?>class="dq"<?php }?>>本月</a>
                        <a href="<?php echo url('/member/db');?>
?time=4<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==4){?>class="dq"<?php }?>>最近三个月</a>
                    </div>
                    <form action="<?php echo url('/member/db');?>
">
                    <div class="fn-right db-sxr">
                        <label id="Label1">选择时间段：</label>
                        <input name="from_data" type="text" onclick="WdatePicker()" class="dq-inpt" />
                        <label id="Label1">-</label>
                        <input name="to_data" type="text"  onclick="WdatePicker()" class="dq-inpt"  />
                        <?php if (isset($_GET['order'])){?>
                        <input type="hidden" name="order">
                        <?php }?>
                        <input type="submit" value="搜索" />
                    </div>
                    </form>
                </div>
                <?php if (!isset($_GET['order'])){?>
                <div class="dq-tab-t">
                    <table>
                        <tr>
                            <th style="width:116px;">奖品图片</th>
                            <th style="width:450px;">奖品名称</th>
                            <th style="width:80px;">夺宝状态</th>
                            <th style="width:80px;">参与人次</th>
                            <th>夺宝号码</th>
                        </tr>
                    </table>
                </div>
                <div class="db-tab-list">
                    <table>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <tr>
                            <td style="width:116px;">
                                <div class="db-img"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_thumb']),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></div>
                            </td>
                            <td style="width:450px;">
                                <div class="dq-jd">
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span class="type-free">霸王餐区</span> <?php }?><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
                                    <p>总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['need_num'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?></p>
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['buy']['luck_code']==0){?>
                                    <div class="db-jdt">
                                        <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['jindu'];?>
%"></span>
                                    </div>
                                    <ul class="fn-clear db-jdtxt">
                                        <li class="tl"><strong><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['end_num'];?>
</strong><p>剩余人次</p></li>
                                        <li class="tr"><strong><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['buy_num'];?>
</strong><p>已参与人次</p></li>
                                    </ul>
                                    <?php }else{ ?>
                                    获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['buy']['member_id']));?>
#dbCod" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['buy']['member_name'],$_smarty_tpl->tpl_vars['m']->value['luck_nickname']);?>
</a>（本期共参与<?php echo $_smarty_tpl->tpl_vars['m']->value['luck_qty'];?>
人次）<br/>
                                    幸运号码：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['luck_code'];?>
</b><br/>
                                    揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['buy']['end_time'],'Y-m-d H:i:s.x');?>

                                    <?php }?>
                                </div>
                            </td>
                            <td style="width:80px;">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==2){?>
                                <span class="color02">正进行.....</span>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==3){?>
                                <span class="color01">已中奖</span>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==4){?>
                                <span class="color03">待揭晓</span>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==5){?>
                                <span class="color01">已揭晓</span>
                                <?php }?>
                            </td>
                            <td style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>
                            <td>
                                <ul>
                                    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['yun_code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yun_code']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yun_code']['iteration']++;
?>
                                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['yun_code']['iteration']<10){?><li style="width: 50%; float: left;"><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</li><?php }?>
                                    <?php } ?>
                                    <li><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
#db#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" target="_blank" class="color02">查看更多&gt;&gt;</a></li>
                                </ul>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php }else{ ?>
                        <tr><td>暂时没有相关记录</td></tr>
                        <?php }?>
                    </table>
                </div>
                <?php }else{ ?>
                <div class="dq-tab-t">
                    <table>
                        <tr>
                            <th style="width:116px;">奖品图片</th>
                            <th style="width:450px;">奖品名称</th>
                            <th style="width:120px;">夺宝状态</th>
                            <th>参与人次</th>
                        </tr>
                    </table>
                </div>
                <div class="db-tab-list">
                    <table>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <div class="db-tab-list">
                            <table>
                                <tr>
                                    <th colspan="2" style="text-align:left; padding-left:30px;">订单号：<?php echo $_smarty_tpl->tpl_vars['r']->value['order_sn'];?>
 夺宝时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['add_time'],'Y-m-d H:i:s');?>
        </th>
                                    <th nowrap>
                                        <span class="color01">
                                            <?php if ($_smarty_tpl->tpl_vars['r']->value['type']==1){?>
                                            还需支付：<?php echo $_smarty_tpl->tpl_vars['r']->value['order_amount'];?>
云购币
                                            <?php }else{ ?>
                                            总价：<?php echo $_smarty_tpl->tpl_vars['r']->value['total'];?>
拍币
                                            <?php }?>
                                        </span>
                                    </th>
                                    <th style="width:130px;"><?php if ($_smarty_tpl->tpl_vars['r']->value['allow_pay']){?><a href="<?php echo url(('/yunbuy/pay/').($_smarty_tpl->tpl_vars['r']->value['order_sn']));?>
" target="_blank" class="db-btn">支付订单</a><?php }?></th>
                                </tr>
                                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['r']->value['db']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                                <tr>
                                    <td style="width:116px;">
                                        <div class="db-img"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></div>
                                    </td>
                                    <td style="width:450px;">
                                        <div class="dq-jd">
                                            <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span class="type-free">霸王餐区</span> <?php }?><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
                                            <p>总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['need_num'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?></p>
                                            <?php if ($_smarty_tpl->tpl_vars['m']->value['buy']['luck_code']==0){?>
                                            <div class="db-jdt">
                                                <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['jindu'];?>
%"></span>
                                            </div>
                                            <ul class="fn-clear db-jdtxt">
                                                <li class="tl"><strong><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['end_num'];?>
</strong><p>剩余人次</p></li>
                                                <li class="tr"><strong><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['buy_num'];?>
</strong><p>已参与人次</p></li>
                                            </ul>
                                            <?php }else{ ?>
                                            获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['buy']['member_id']));?>
#db" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['member_name'];?>
</a>（本期共参与<?php echo $_smarty_tpl->tpl_vars['m']->value['luck_qty'];?>
人次）<br/>
                                            幸运号码：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['luck_code'];?>
</b><br/>
                                            揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['buy']['end_time'],'Y-m-d H:i:s.x');?>

                                            <?php }?>
                                        </div>
                                    </td>
                                    <td style="width:120px;">
                                        <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==2){?>
                                        <span class="color02">正进行.....</span>
                                        <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==3){?>
                                        <span class="color01">已中奖</span>
                                        <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==5){?>
                                        <span class="color01">已揭晓</span>
                                        <?php }?>
                                    </td>
                                    <td style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <?php } ?>
                        <?php }else{ ?>
                        <tr><td>暂时没有相关记录</td></tr>
                        <?php }?>
                    </table>
                </div>
                <?php }?>
                <div class="foot-btn">
                    <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>



        </div>





        </div>
     </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>