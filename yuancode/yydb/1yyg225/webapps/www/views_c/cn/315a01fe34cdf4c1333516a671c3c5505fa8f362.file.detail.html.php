<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:35:23
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\yunbuy\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:8823565971eb938596-88607546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '315a01fe34cdf4c1333516a671c3c5505fa8f362' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\yunbuy\\detail.html',
      1 => 1448702990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8823565971eb938596-88607546',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565971ec1d0c09_92911298',
  'variables' => 
  array (
    'row' => 0,
    'same_db' => 0,
    'm' => 0,
    'ext_info' => 0,
    'prev_buy' => 0,
    'qishu_arr' => 0,
    'from' => 0,
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
<?php if ($_valid && !is_callable('content_565971ec1d0c09_92911298')) {function content_565971ec1d0c09_92911298($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

">
"><?php }?>
" type="text/javascript"></script>
" type="text/javascript"></script>

 $_from = $_smarty_tpl->tpl_vars['same_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['same_db']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['same_db']['iteration']++;
?>
">第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期 <?php if (!$_smarty_tpl->tpl_vars['m']->value['wait_time']){?><img src="/style/images/ing.gif"/><?php }?></a></li>
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
</a> (<?php echo smarty_modifier_truncate(cityIp($_smarty_tpl->tpl_vars['prev_buy']->value['ip']),5,'');?>
)</span>获得了本商品</p>
</p>
</p>
</strong></p>
 $_from = $_smarty_tpl->tpl_vars['qishu_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
">第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期</option>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
<span style="color:red;" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
<?php if ($_smarty_tpl->tpl_vars['row']->value['start_time']>@constant('RUN_TIME')){?> <?php echo date('m-d H:i:s',$_smarty_tpl->tpl_vars['row']->value['start_time']);?>
开始夺宝<?php }?></span></h3>
人<?php if ($_smarty_tpl->tpl_vars['ext_info']->value['isreal']){?><span class="color01">(需实名认证)</span><?php }?>【<a href="<?php echo url('/member/myivt');?>
" target="_blank">呼朋唤友来注册</a>】</p>
人次</p>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_price'];?>
<?php }?></span></span>
" target="_blank" class="color04"><?php echo $_smarty_tpl->tpl_vars['from']->value[0];?>
</a> <i style="color: #999">（采购平台价格会有上下浮动）</i><?php }?></span>
"></script>
">请稍等, 正在载入中...</i>后开始</span>
',"<?php echo $_smarty_tpl->tpl_vars['row']->value['start_time']-@constant('RUN_TIME');?>
","1");
%">
%;"></span>
</b></p>
</b></p>
</b></p>
</b>人次已参与，赶快去参加吧！剩余<b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
</b>人次</p>
"  data-max="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
" style="color: black" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['max_mun'];?>
">
,'buy')" style="width: 105px">立即夺宝</a>
','',this)" style="width: 112px"><i class="ico ico-miniCart"></i>加入购物车</a>
,'free')" style="width: 125px">免费夺宝</a>
78" target="_blank" class="color01">什么是拍币？</a>
' ,function(result) { location.reload(); } );
 ))*1000,null);
 $_from = $_smarty_tpl->tpl_vars['luck_code']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b>
" height="105" width="105"/></dt>
#dbCod"><i><?php echo nickname($_smarty_tpl->tpl_vars['luck_member']->value['username'],$_smarty_tpl->tpl_vars['luck_member']->value['nickname']);?>
</i></a>(<?php echo smarty_modifier_truncate(cityIp($_smarty_tpl->tpl_vars['luck_member']->value['ip']),5,'');?>
)</span>获得了本奖品<br/>
 (ID为用户唯一不变标识)</em><br/>
<br/>
<br/>
#introTab">查看计算结果</a>    <a class="kscy"  id="view_join" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
#recordTab"> 看看谁参加了</a></div>
" target="_blank">公平公正公开</a></li>
" target="_blank">正品保证</a></li>
" target="_blank">权益保障</a></li>
 $_from = $_smarty_tpl->tpl_vars['new_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>30),$_smarty_tpl);?>
" alt="" /></a>
" class="color02"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a> (<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
) <?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['add_time']);?>
 夺宝了<strong class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</strong>人次</li>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="add-dla">登录</a> <a href="<?php echo url('/member/regist');?>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="add-zca">注册</a>
</b>人次</p></td>
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>
</span><?php }else{ ?>……<?php }?>

?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
"><b style="color: #3399ff;">请登录</b></a>，查看你的夺宝号码！
</b>人次</p></td>
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>
</span><?php }else{ ?>……<?php }?>
</b>人次</p></td>
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>
</span><?php }else{ ?>……<?php }?>
">
</b><br><b class="txt-red" style="font-size:12px">本期幸运号码</b></div><div class="operator">=(</div><div class="box gray-box"><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
</b><br>50个时间求和
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
<?php } ?></b><br>“老时时彩”开奖号码
</span>期) 开奖结果。 <a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" target="_blank">开奖查询</a>
</b><br>该奖品总需人次</div><div class="operator" title="相加">+</div><div class="box"><b class="txt-red">10000001</b><br>原始数</div>
" target="_blank"><img width="150" height="150" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['prev_buy']->value['photo']),$_smarty_tpl);?>
" alt="" /></a></div>
" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['prev_buy']->value['member_name'],$_smarty_tpl->tpl_vars['prev_buy']->value['nickname']);?>
</a>(<?php echo smarty_modifier_truncate(cityIp($_smarty_tpl->tpl_vars['prev_buy']->value['ip']),5,'');?>
)</span></p>
</p>
</p>
</strong></p>
" target="_blank"><img src="/style/images/xye.png" width="255" /></a>
" title="<?php echo $_smarty_tpl->tpl_vars['new_buy']->value['goods_name'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['new_buy']->value['cover']['imgurl_src'],'width'=>129,'height'=>120,'type'=>0),$_smarty_tpl);?>
"></a></div>
%">
%;"></span></p>
</b> 已参与人次</p></li>
</b> 剩余人次</p></li>
" style="width:96px;" target="_blank">立即夺宝</a>
】最后50条全站参与记录
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

期 “老时时彩”开奖号码：<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" style="margin-left: 10px; color: #FFE000; font-family: simsun;" target="_blank">开奖查询&gt;&gt;</a></li>
 + <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>)
 (奖品所需人次) = <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
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
</span>
 $_from = $_smarty_tpl->tpl_vars['site_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']++;
?>
</td>
<i class="ico ico-arrow-transfer"></i><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['timenum'];?>
</b></td>
" target="_blank" title=""><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</a></div></td>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>

  10年免费使用权</p><?php }?>
');
');
');
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