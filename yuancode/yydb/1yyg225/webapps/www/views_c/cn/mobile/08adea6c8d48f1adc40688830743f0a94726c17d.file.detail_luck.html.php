<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 10:59:29
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\detail_luck.html" */ ?>
<?php /*%%SmartyHeaderCode:1316256cfbf91592ee4-44051929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08adea6c8d48f1adc40688830743f0a94726c17d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\detail_luck.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1316256cfbf91592ee4-44051929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'site_join' => 0,
    'm' => 0,
    'L' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cfbf917ae232_76223769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cfbf917ae232_76223769')) {function content_56cfbf917ae232_76223769($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="/style/mobile/css/lottery.css" rel="stylesheet" />
<div id="content" class="container detail">
    <section id="calResult" class="z-minheight">
        <div class="infoResult">
            <dl>截止揭晓时间【<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
】最<em>后100条全站购买时间记录</em></dl>
            <ul class="result2">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['site_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['site_join']['iteration']<101){?>
                <li>
                    <span><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d');?>
<dd><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'H:i:s.x');?>
</dd></span>
                    <span><?php echo $_smarty_tpl->tpl_vars['m']->value['timenum'];?>
</span>
                    <span><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</span>
                    <p><b class="z-arrow"></b></p>
                </li>
                <?php }?>
                <?php } ?>
            </ul>
        </div>
        <div class="infoCount">
            <div class="infoCount2">
                <ul>
                    <li style="border:0;">
                        取以上数值结果得：
                    </li>
                    <li>
                        1、求和：<?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>

                        <em>(上面100条<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录时间取值相加之和</em>
                    </li>
                    <li>
                        <p>
                            2、取余：<?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
<em>(100条时间记录之和)<?php if ($_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>+<?php echo $_smarty_tpl->tpl_vars['row']->value['kjjg_str'];?>
(<?php echo $_smarty_tpl->tpl_vars['row']->value['qihao'];?>
期时时彩开奖结果)<?php }?></em>
                            <br />%<?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>

                            <em>(本商品总需参与人次)</em>=<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
<?php } ?><em>(余数)</em>
                        </p>
                    </li>
                    <li>
                        3、计算结果：<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
<?php } ?><em>(余数)</em>+10000001=
                        <span><?php echo $_smarty_tpl->tpl_vars['row']->value['luck_code'];?>
</span>
                        <p></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="infoResult">
            <ul class="result1 result3">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['site_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['site_join']['iteration']>100){?>
                <li>
                    <span><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d');?>
<dd><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'H:i:s.x');?>
</dd></span>
                    <span><?php echo $_smarty_tpl->tpl_vars['m']->value['timenum'];?>
</span>
                    <span><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</span>
                </li>
                <?php }?>
                <?php } ?>
            </ul>
        </div>
    </section>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>