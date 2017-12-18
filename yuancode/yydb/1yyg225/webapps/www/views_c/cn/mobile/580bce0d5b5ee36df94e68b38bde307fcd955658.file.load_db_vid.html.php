<?php /* Smarty version Smarty-3.1.13, created on 2016-03-01 19:57:44
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\minfo\load_db_vid.html" */ ?>
<?php /*%%SmartyHeaderCode:775256d583b8ceda57-64427706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '580bce0d5b5ee36df94e68b38bde307fcd955658' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\minfo\\load_db_vid.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '775256d583b8ceda57-64427706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'db_info' => 0,
    'L' => 0,
    'member' => 0,
    'list' => 0,
    'm' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d583b8f1a926_16333148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d583b8f1a926_16333148')) {function content_56d583b8f1a926_16333148($_smarty_tpl) {?><div class="m-user-duobaoRecord">
    <div class="detail">
        <div class="goods">
            <div class="pic">
                <a title="<?php echo $_smarty_tpl->tpl_vars['db_info']->value['goods_name'];?>
" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['db_info']->value['buy_id']));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['db_info']->value['imgurl_thumb'],'width'=>64,'height'=>48,'type'=>0),$_smarty_tpl);?>
" width="64" height="48" alt="<?php echo $_smarty_tpl->tpl_vars['db_info']->value['goods_name'];?>
"></a>
            </div>
            <div class="info info-simple">
                <div class="title"><a title="<?php echo $_smarty_tpl->tpl_vars['db_info']->value['title'];?>
" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['db_info']->value['buy_id']));?>
" target="_blank"><span class="txt-impt">(第<?php echo $_smarty_tpl->tpl_vars['db_info']->value['qishu'];?>
期) </span><?php echo $_smarty_tpl->tpl_vars['db_info']->value['title'];?>
</a></div>
                <div class="opt" style="width: 60px; height: 20px;"><?php if ($_smarty_tpl->tpl_vars['db_info']->value['end_num']){?><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['db_info']->value['buy_id']));?>
" target="_blank" class="w-button w-button-s"><span>跟买</span></a><?php }?></div>
            </div>
        </div>
        <div class="summary">
            本期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
该用户总共参与了<?php echo $_smarty_tpl->tpl_vars['db_info']->value['qty'];?>
人次，拥有<?php echo $_smarty_tpl->tpl_vars['db_info']->value['qty'];?>
个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
号码
            <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['member']->value['mid']));?>
" class="js-back back">&lt;&lt;返回列表</a>
        </div>
        <div id="dvContainer">
            <table class="w-table">
                <thead>
                <tr>
                    <th class="col1"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间</th>
                    <th class="col2">参与人次</th>
                    <th class="col3"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
号码</th>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <tr>
                    <td class="col1" valign="top"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d H:i:s.x');?>
</td>
                    <td class="col2" valign="top"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>
                    <td class="col3" valign="top">
                        <ul class="codeList">
                            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['yun_code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                            <li class="item <?php if ($_smarty_tpl->tpl_vars['m']->value['luck_code']==$_smarty_tpl->tpl_vars['c']->value){?>fwb color02<?php }?>"><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</li>
                            <?php } ?>
                        </ul>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="summary summary-bottom">
            <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['member']->value['mid']));?>
" class="js-back back">&lt;&lt;返回列表</a>
        </div>
    </div>
</div><?php }} ?>