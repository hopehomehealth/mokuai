<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 20:47:32
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/luck.html" */ ?>
<?php /*%%SmartyHeaderCode:554203469584d4ae4d9f6b0-53361081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '807aa5c977c2a8f149e64a7b4e6743ef08eead21' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/luck.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '554203469584d4ae4d9f6b0-53361081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'list' => 0,
    'm' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d4ae4e35404_52677462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d4ae4e35404_52677462')) {function content_584d4ae4e35404_52677462($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
        <div class="hy-tjxh fn-clear">
            <ul class="fn-clear db-tab">
                <li><a href="<?php echo url('/member/db');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</a></li>
                <li class="dq"><a href="<?php echo url('/member/luck');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
记录</a></li>
            </ul>
            <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
            <div class="db-nrbox fn-clear">
                <ul class="db-zjxx fn-clear">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li>
                        <div class="zjxx-box">
                            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" target="_blank" style="text-align: center; display: block;"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'],'width'=>250,'height'=>175,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></a>
                            <div class="df-qh">
                                <p>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</p>
                                <p>总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
人次</p>
                                <p>幸运号码：<strong class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</strong></p>
                                <p>总共参与：<b><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</b>人次</p>
                                <p>揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d H:i:s.x');?>
</p>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['is_award']!=1){?>
                                <div class="center">
                                    <form action="<?php echo url('/order/buy');?>
" method="post" style="display: inline-block">
                                        <input class="hy-btn2" style="margin-top:5px;" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_lingjiang'];?>
">
                                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">
                                        <input type="hidden" name="type" value="3">
                                    </form>
                                    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['a_money']==1&&$_smarty_tpl->tpl_vars['m']->value['goods_real_price']>0){?>
                                    <input class="hy-btn1" style="margin-top:5px;" type="button" onclick="a_money('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" value="折现￥<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_real_price'];?>
" />
                                    <?php }?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="foot-btn">
                <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
            <?php }else{ ?>
            <div class="m-user-blank" id="dvBlank" style="">还没有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
记录，赶快 <a href="<?php echo url('/yunbuy');?>
">去参加</a> 吧！</div>
            <?php }?>
        </div>
        </div>
     </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['site_config']->value['a_money']==1){?>

<script type="text/javascript">
    function a_money(id){
        var D = {
            id: id,
            type: 3,
            act: 'money'
        };
        $.layer({
            shade: [0],
            area: ['auto','auto'],
            dialog: {
                msg: '确认折现并选择折现方式!',
                btns: 2,
                type: 4,
                btn: ['折现到余额','直接提现'],
                yes: function(){
                    layer.close();
                    $.post('/order/buy',D,function(result){
                        if(!result.error){
                            layer.msg(result.msg,2,1);
                            location.reload();
                        }else{
                            layer.alert(result.msg,8,function(){
                                if(result.url){
                                    location.href=result.url;
                                }
                            });
                        }
                    },'json');
                }, no: function(){
                    layer.close();
                    D['tx'] = 1;
                    $.post('/order/buy',D,function(result){
                        if(!result.error){
                            layer.msg(result.msg,2,1);
                            location.reload();
                        }else{
                            layer.alert(result.msg,8,function(){
                                if(result.url){
                                    location.href=result.url;
                                }
                            });
                        }
                    },'json');
                }
            }
        });
    }
</script>

<?php }?><?php }} ?>