<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:29:03
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\lbi\list_db.html" */ ?>
<?php /*%%SmartyHeaderCode:1046756d41d6f2a7c06-98907459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd914901b17db4915b9fb20502586deb642c64eb7' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\lbi\\list_db.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1046756d41d6f2a7c06-98907459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
    'L' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41d6f5261e9_16322657',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41d6f5261e9_16322657')) {function content_56d41d6f5261e9_16322657($_smarty_tpl) {?><dt class="ui-clr">
    <div class="db-img"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>200,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></a></div>
    <div class="db-txt">
        <p class="p1"><?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span class="type-free">霸王餐区</span><?php }?> <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" class="color00"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['buy']['luck_code']==0){?>
        <p class="color03">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['need_num'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<?php }?></p>
        <p class="db-jdt">
            <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['jindu'];?>
%"></span>
        </p>
        <ul class="db-nums ui-clr color03">
            <li class="tr">剩余<span><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['end_num'];?>
</span></li>
            <li class="tl">已参与<span><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['buy_num'];?>
</span></li>
        </ul>
        <?php }else{ ?>
        <p class="color03">
        获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['buy']['member_id']));?>
#dbCod" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['buy']['member_name'],$_smarty_tpl->tpl_vars['m']->value['luck_nickname']);?>
</a>（本期共参与<?php echo $_smarty_tpl->tpl_vars['m']->value['luck_qty'];?>
人次）<br/>
        幸运号码：<b class="color01" style="font-size: 1.4rem"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['luck_code'];?>
</b><br/>
        揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['buy']['end_time'],'Y-m-d H:i:s.x');?>

        </p>
        <?php }?>
    </div>
</dt>
<dd>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
状态</th>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==2){?>
                <span class="color02">正进行.....</span>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==3){?>
                <span class="color01">已获得</span>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==4){?>
                <span class="color03">待揭晓</span>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==5){?>
                <span class="color01">已揭晓</span>
                <?php }?>
            </td>
        </tr>
        <tr>
            <th>参与人次</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次 <?php if ($_smarty_tpl->tpl_vars['m']->value['multi']>1){?><span class="color01">参与<?php echo $_smarty_tpl->tpl_vars['m']->value['multi'];?>
期</span><?php }?>
            </td>
        </tr>
        <tr>
            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
号码</th>
            <td>
                <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['yun_code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yun_code']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yun_code']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['yun_code']['iteration']<9){?><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
&nbsp;&nbsp;<?php }?>
                <?php } ?>
                <a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
#db#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" target="_blank" class="color02">查看更多&gt;&gt;</a>
            </td>
        </tr>
    </table>
</dd><?php }} ?>