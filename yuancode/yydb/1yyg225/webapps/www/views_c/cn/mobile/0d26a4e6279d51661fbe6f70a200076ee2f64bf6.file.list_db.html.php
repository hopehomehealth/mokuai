<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 15:33:56
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\member\lbi\list_db.html" */ ?>
<?php /*%%SmartyHeaderCode:31230565e9ee4b0bba3-24985445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d26a4e6279d51661fbe6f70a200076ee2f64bf6' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\member\\lbi\\list_db.html',
      1 => 1449041505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31230565e9ee4b0bba3-24985445',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e9ee4be2957_99320021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e9ee4be2957_99320021')) {function content_565e9ee4be2957_99320021($_smarty_tpl) {?><dt class="ui-clr">
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
<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?></p>
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
#dbCod" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['buy']['member_name'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
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
            <th>云购状态</th>
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
人次
            </td>
        </tr>
        <tr>
            <th>云购号码</th>
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