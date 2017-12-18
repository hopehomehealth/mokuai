<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 16:36:02
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/minfo/load_db.html" */ ?>
<?php /*%%SmartyHeaderCode:58102362058579bf271aa53-75858442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd40eb4b744ab8462646f68d028297cde6328301' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/minfo/load_db.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58102362058579bf271aa53-75858442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58579bf27ce203_27325299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58579bf27ce203_27325299')) {function content_58579bf27ce203_27325299($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="list01 list-db">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <dl class="item ui-clr">
        <dt class="ui-clr">
            <div class="db-img"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>90,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></a></div>
            <div class="db-txt">
                <p class="p1"><?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span class="type-free">霸王餐区</span><?php }?> <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" class="color00"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
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
#dbCod"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['buy']['member_name'],$_smarty_tpl->tpl_vars['m']->value['luck_nickname']);?>
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
人次
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
                        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['yun_code']['iteration']<10){?><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
&nbsp;&nbsp;
                        <?php }else{ ?>
                        <span class="moreCode" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
&nbsp;&nbsp;</span>
                        <?php }?>
                        <?php } ?>
                        <?php if (count($_smarty_tpl->tpl_vars['m']->value['yun_code'])>9){?>
                        <br /><a href="javascript:;" class="color02" onclick="moreCode(this)">查看更多&gt;&gt;</a>
                        <?php }?>
                    </td>
                </tr>
            </table>
        </dd>
    </dl>
    <?php } ?>
</div>
<div class="foot-btn">
    <?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }else{ ?>
<div class="prompt">该用户还没有参与过<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
！</div>
<?php }?>

<script type="text/javascript">
    var load_div = '#load_db';
    $(document).ready(function(){
        $(load_div).find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"拼命加载中...",
            target:load_div
        }).bind('click',function(){
            $('html,body').animate({ scrollTop: '0px' }, 500);
        });
    });
    function moreCode(obj){
        $(obj).parents('td').find('.moreCode').toggle();
        if($(obj).html()=='查看更多&gt;&gt;') $(obj).html('收起');
        else $(obj).html('查看更多&gt;&gt;');
    }
</script><?php }} ?>