<?php /* Smarty version Smarty-3.1.13, created on 2017-02-14 16:30:38
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:15817568715848f5e15f7689-74530172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02c90f623749a53fb0be75734c6ce0b4631afe58' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/detail.html',
      1 => 1487059786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15817568715848f5e15f7689-74530172',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5848f5e1a93595_19313700',
  'variables' => 
  array (
    'row' => 0,
    'ext_info' => 0,
    'm' => 0,
    'prev_buy' => 0,
    'L' => 0,
    'row_buy' => 0,
    'site_config' => 0,
    'end_time' => 0,
    'luck_code' => 0,
    'luck_member' => 0,
    'new_db' => 0,
    'member_join' => 0,
    'new_buy' => 0,
    'site_join' => 0,
    'join_arr' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848f5e1a93595_19313700')) {function content_5848f5e1a93595_19313700($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

">
"><?php }?>
" type="text/javascript"></script>
" type="text/javascript"></script><script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>

" />
",
",
",
).format("YYYYMMDD"); $("#qishuBox").html("<div class='fn-clear yhp-wq'><ul><li class='dq'><a href='javascript:;'>"+ qihao +"</a></li></ul></div>");             $('#MAXQI').val(data.max);
"
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['first']){?> id="buy_img_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
"<?php }?> /><span></span>
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>
"><span></span>

" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['prev_buy']->value['photo']),$_smarty_tpl);?>
" alt="" /></a>
" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['prev_buy']->value['member_name'],$_smarty_tpl->tpl_vars['prev_buy']->value['nickname']);?>
</a> (<?php echo cityIp($_smarty_tpl->tpl_vars['prev_buy']->value['ip']);?>
)</span>获得了本商品</p>
</p>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
</p>
码：<strong class="add-color1"><?php echo $_smarty_tpl->tpl_vars['prev_buy']->value['luck_code'];?>
</strong></p>
者
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
<span style="color:red;" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
<?php if ($_smarty_tpl->tpl_vars['row']->value['start_time']>@constant('RUN_TIME')){?> <?php echo date('m-d H:i:s',$_smarty_tpl->tpl_vars['row']->value['start_time']);?>
开始<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<?php }?></span><?php if ($_smarty_tpl->tpl_vars['row']->value['price']>1){?> <span class="zq_ico" style="font-size: 16px;"><?php echo num2char($_smarty_tpl->tpl_vars['row']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?></h3>
要求：本特惠商品需您最少推荐注册<?php echo $_smarty_tpl->tpl_vars['ext_info']->value['usernum'];?>
人<?php if ($_smarty_tpl->tpl_vars['ext_info']->value['isreal']){?><span class="color01">(需实名认证)</span><?php }?>【<a href="<?php echo url('/member/myivt');?>
" target="_blank">呼朋唤友来注册</a>】</p>
：本特惠商品此时间最多可参与<?php echo $_smarty_tpl->tpl_vars['ext_info']->value['buynum'];?>
人次</p>
：7天内注册新会员才能参与此商品<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</p>
：从未<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
成功的用户可参与</p>
</b>
,'buy_buy')">直接购买</a>
','',this)"><i class="ico ico-miniCart"></i>加入清单</a>
</span>
&nbsp;&nbsp;</span>
"></script>
">请稍等, 正在载入中...</i>后开始</span>
',"<?php echo $_smarty_tpl->tpl_vars['row']->value['start_time']-@constant('RUN_TIME');?>
","1");
%">
<?php }?>%;"></span>
<?php }?></b></p>
<?php }?></b></p>
<?php }?></b></p>
<?php }?></b>人次已参与，赶快去参加吧！剩余<b class="txt-red"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
<?php }?></b>人次</p>
"  data-max="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
" style="color: black" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['max_mun'];?>
">
在望！</b></span>
">扫尾</a></label>
','buy')" style="width: 105px"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
','',this)" style="width: 112px"><i class="ico ico-miniCart"></i>加入购物车</a>
','free')" style="width: 125px">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>
？</a>
;
时间求和<?php if ($_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>+下期“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码<?php }?>)%总需人次</p>
哦~！<a href="http://cp.360.cn/ssccq/" target="_blank">查看&gt;&gt;</a><br>如果24小时后还是没有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
，默认时时彩结果为00000计算结果</span><?php }?>
' ,function(result) { window.location.reload(); } );
计算中...</span>");
");
");
 $_from = $_smarty_tpl->tpl_vars['luck_code']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b>
" height="105" width="105"/></dt>
#dbCod"><i><?php echo nickname($_smarty_tpl->tpl_vars['luck_member']->value['username'],$_smarty_tpl->tpl_vars['luck_member']->value['nickname']);?>
</i></a>(<?php echo cityIp($_smarty_tpl->tpl_vars['luck_member']->value['ip']);?>
)</span>获得了本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
<br/>
 (ID为用户唯一不变标识)</em><br/>
<br/>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['luck_member']->value['db_time'],'Y-m-d H:i:s.x');?>
<br/>
#introTab">查看计算结果</a>    <a class="kscy"  id="view_join" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
#recordTab"> 看看谁参加了</a></div>
" target="_blank">公平公正公开</a></li>
" target="_blank">正品保证</a></li>
" target="_blank">权益保障</a></li>
记录</li>
记录</li>
？</li>
 $_from = $_smarty_tpl->tpl_vars['new_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>30),$_smarty_tpl);?>
" alt="" /></a>
" class="color02"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a> (<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
) <?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['add_time']);?>
 <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
了<strong class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</strong>人次</li>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="add-dla">登录</a> <a href="<?php echo url('/member/regist');?>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="add-zca">注册</a>
者<?php }else{ ?>您<?php }?>本期总共参与了<b class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b>人次</p></td>
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>
</span><?php }else{ ?>……<?php }?>
哦</p>

?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
"><b style="color: #3399ff;">请登录</b></a>，查看你的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
号码！
者<?php }else{ ?>您<?php }?>本期总共参与了<b class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b>人次</p></td>
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>
</span><?php }else{ ?>……<?php }?>
哦</p>
者<?php }else{ ?>您<?php }?>本期总共参与了<b class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b>人次</p></td>
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>
</span><?php }else{ ?>……<?php }?>
">
<?php }else{ ?>？<?php }?></b><br><b class="txt-red" style="font-size:12px">本期幸运号码</b></div><div class="operator">=(</div><div class="box gray-box"><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
</b><br>100个时间求和
的最后一个号码分配完毕，公示该分配时间点前本站全部<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
的<span class="txt-red">最后100个参与时间</span>，并求和。</div>
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
<?php } ?><?php }else{ ?>？<?php }?></b><br>“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码
结果，默认<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果为00000
</span>期) <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果。 <a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
查询</a>
</b><br>该<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
总需人次</div><div class="operator" title="相加">+</div><div class="box"><b class="txt-red">10000001</b><br>原始数</div>
" target="_blank"><img width="150" height="150" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['prev_buy']->value['photo']),$_smarty_tpl);?>
" alt="" /></a></div>
" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['prev_buy']->value['member_name'],$_smarty_tpl->tpl_vars['prev_buy']->value['nickname']);?>
</a>(<?php echo smarty_modifier_truncate(cityIp($_smarty_tpl->tpl_vars['prev_buy']->value['ip']),5,'');?>
)</span></p>
</p>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
</p>
码：<strong class="add-color1"><?php echo $_smarty_tpl->tpl_vars['prev_buy']->value['luck_code'];?>
</strong></p>
信息</h4></div>
" title="<?php echo $_smarty_tpl->tpl_vars['new_buy']->value['goods_name'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['new_buy']->value['imgurl_src'],'width'=>129,'height'=>120,'type'=>0),$_smarty_tpl);?>
"></a></div>
%">
%;"></span></p>
</b> 已参与人次</p></li>
</b> 剩余人次</p></li>
" style="width:96px;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
详情<?php }?></div>
的最后100个参与时间；</li>
大于24小时或无法读取老时时彩下一期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果时，默认“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果为00000。<a href="http://chart.cp.360.cn/kaijiang/ssccq" target="_blank">了解更多“老时时彩”信息</a></li>
的最后一个号码分配完毕后，将公示该分配时间点前本站全部<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
的最后100个参与时间；</li>
结果（一个五位数值B）；</li>
总需人次得到的余数<i class="ico ico-questionMark" data-func="remainder" style="margin-top: -3px;"></i>
。</li>
大于24小时或无法读取老时时彩下一期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果时，默认“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果为00000。<a href="http://chart.cp.360.cn/kaijiang/ssccq" target="_blank">了解更多“老时时彩”信息</a></li>
时间</th>
名称</th>
最后<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间【<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
】最后100条全站参与记录
 $_from = $_smarty_tpl->tpl_vars['site_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']++;
?>
</td>
<i class="ico ico-arrow-transfer"></i><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['timenum'];?>
</b></td>
" target="_blank" title=""><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></div></td>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>

期 “老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码：<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" style="margin-left: 10px; color: #FFE000; font-family: simsun;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
查询&gt;&gt;</a></li>

 (商品所需人次) = <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>(余数)
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>
 $_from = $_smarty_tpl->tpl_vars['luck_code']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>)

期 “老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码：<?php if ($_smarty_tpl->tpl_vars['row']->value['kjjg']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="ball">？</b><?php }?><a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" style="margin-left: 10px; color: #FFE000; font-family: simsun;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
查询&gt;&gt;</a></li>
 + <?php if ($_smarty_tpl->tpl_vars['row']->value['kjjg']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="ball">？</b><?php }?>)
 (<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
所需人次) = <?php if ($_smarty_tpl->tpl_vars['row']->value['residue']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="square">？</b><?php }?>(余数)
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>
 $_from = $_smarty_tpl->tpl_vars['luck_code']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="square">？</b><?php }?>)
<?php }else{ ?>？<?php }?></span>
 $_from = $_smarty_tpl->tpl_vars['site_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']++;
?>
</td>
<i class="ico ico-arrow-transfer"></i><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['timenum'];?>
</b></td>
" target="_blank" title=""><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></div></td>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>

获得者拥有 <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
  10年免费使用权</p><?php }?>
');
');
');
获得者<?php }else{ ?>您<?php }?>本期总共参与了<span class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</span>人次</h3>
 $_from = $_smarty_tpl->tpl_vars['join_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</dt>
 $_from = $_smarty_tpl->tpl_vars['m']->value['code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
</dd>

<?php }} ?>