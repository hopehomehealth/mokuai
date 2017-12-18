<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 19:35:30
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\member\cod.html" */ ?>
<?php /*%%SmartyHeaderCode:3132156599182f0c5a7-05773900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a215ddd92465e00db41d5a5b1e02689cf260ead0' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\member\\cod.html',
      1 => 1426667632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3132156599182f0c5a7-05773900',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565991830f0c61_86038477',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565991830f0c61_86038477')) {function content_565991830f0c61_86038477($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <ul class="fn-clear db-tab">
                    <li><a href="<?php echo url('/member/auction');?>
">竞拍记录</a></li>
                    <li class="dq"><a href="<?php echo url('/member/cod');?>
">中奖领取</a></li>
                    <!--<li><a href="<?php echo url('/member/share/auction');?>
">晒单</a></li>-->
                </ul>

                <div class="hy-box">
                    <div class="jp-sx fn-clear">
                        <form action="/member/cod" method="get">
                            <label id="Label1">中奖状态：</label>
                            <select name="status" onchange="this.form.submit();">
                                <option value="<?php echo @constant('OKWIN');?>
">已中奖（未领取）</option>
                                <option value="<?php echo @constant('FINWIN');?>
" <?php if ($_GET['status']==@constant('FINWIN')){?>selected<?php }?>>已中奖（已领取）</option>
                                <option value="<?php echo @constant('AllWIN');?>
" <?php if ($_GET['status']==@constant('AllWIN')){?>selected<?php }?>>所有中奖记录</option>
                            </select>
                            <span style="color:#999;">（7天内未领奖将自动失效）</span>
                        </form>
                    </div>

                    <div class="mt15 hy-table">
                        <table>
                            <tr>
                                <th colspan="2">商品信息</th>
                                <th style="width:120px">需要出价（元）</th>
                                <th style="width:90px">中奖随机号</th>
                                <th style="width:150px">中奖时间</th>
                                <th style="width:90px">状态</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                            <tr>
                                <td width="80">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>80,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" width="80" /></a>
                                </td>
                                <td style="text-align:left">
                                    <a href="<?php echo url(('/auction/view/').($_smarty_tpl->tpl_vars['m']->value['act_id']));?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                                </td>
                                <td><span class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
</span></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['cod'];?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['cod_time'],'Y-m-d H:i:s');?>
</td>
                                <td class="hy-rza">
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==@constant('OKWIN')){?>
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['disabled']==1){?>已失效
                                    <?php }else{ ?>
                                    <form action="/order/buy" method="post">
                                        <input type="hidden" name="type" value="<?php echo @constant('CART_WIN');?>
" />
                                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['log_id'];?>
" />
                                        <button type="submit" class="hy-btn2">领奖</button>
                                    </form>
                                    <?php }?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==@constant('FINWIN')){?>
                                    已领奖
                                    <?php }?>
                                </td>
                            </tr>
                            <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                            <tr>
                                <td colspan="5">没有中奖记录！</td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>

            </div>
        </div>
     </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>