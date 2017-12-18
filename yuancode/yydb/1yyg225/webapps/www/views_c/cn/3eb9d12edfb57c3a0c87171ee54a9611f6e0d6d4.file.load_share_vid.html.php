<?php /* Smarty version Smarty-3.1.13, created on 2017-02-23 16:00:10
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/minfo/load_share_vid.html" */ ?>
<?php /*%%SmartyHeaderCode:101155159558637158b5cba6-95301226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb9d12edfb57c3a0c87171ee54a9611f6e0d6d4' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/minfo/load_share_vid.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101155159558637158b5cba6-95301226',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58637158c43bf6_95299300',
  'variables' => 
  array (
    'share' => 0,
    'member' => 0,
    'db_info' => 0,
    'info' => 0,
    'L' => 0,
    'cj_info' => 0,
    'new_buy' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58637158c43bf6_95299300')) {function content_58637158c43bf6_95299300($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><div class="w-tabs-panel-item m-user-share m-user-shareDetail">
    <div class="hd">
        <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['share']->value['title'];?>
</h1>
        <div class="time">晒单时间：<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['share']->value['addtime']);?>
</div>
        <div class="w-shareTo share" id="dvShare"><?php echo share();?>
</div>
    </div>
    <div class="winDetail">
        <div class="owner">
            <b class="sh_num sh_num<?php echo $_smarty_tpl->tpl_vars['share']->value['db_points'];?>
"></b>
            <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['member']->value['mid']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
" class="avatar"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'nopic'=>'/upload/photo.jpg'),$_smarty_tpl);?>
" height="90" width="90"></a>
            <div class="info">
                <div class="name">获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['member']->value['mid']));?>
"><?php echo nickname($_smarty_tpl->tpl_vars['member']->value['username'],$_smarty_tpl->tpl_vars['member']->value['nickname']);?>
</a></div>
                <?php if ($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?>
                <div class="total">总共参与：<strong class="txt-impt"><?php echo $_smarty_tpl->tpl_vars['db_info']->value['qty'];?>
</strong>人次</div>
                <div class="code">幸运号码：<strong class="txt-impt"><?php echo $_smarty_tpl->tpl_vars['db_info']->value['luck_code'];?>
</strong></div>
                <div class="time">揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['info']->value['end_time'],'Y-m-d H:i:s.x');?>
</div>
                <?php }elseif($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_WIN')){?>
                <div class="code"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
随机码：<strong class="txt-impt"><?php echo $_smarty_tpl->tpl_vars['cj_info']->value['cod'];?>
</strong></div>
                <div class="time"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cj_info']->value['cod_time'],'Y-m-d H:i:s');?>
</div>
                <?php }elseif($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_AUC')){?>
                <div class="code">最后出价：<strong class="txt-impt"><?php echo price_format($_smarty_tpl->tpl_vars['cj_info']->value['bid_price']);?>
</strong></div>
                <div class="time">出价时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cj_info']->value['bid_time'],'Y-m-d H:i:s');?>
</div>
                <?php }?>
            </div>
        </div>
        <div class="goods">
            <?php if ($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['info']->value['url'];?>
" target="_blank"><img class="pic" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['info']->value['thumb'],'width'=>90,'height'=>90,'type'=>1),$_smarty_tpl);?>
" height="90"></a>
            <?php }else{ ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['info']->value['url'];?>
" target="_blank"><img class="pic" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['info']->value['imgurl_src'],'width'=>90,'height'=>90,'type'=>1),$_smarty_tpl);?>
" height="90"></a>
            <?php }?>
            <div class="info">
                <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['info']->value['url'];?>
" target="_blank">
                    <?php if ($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?>(第<?php echo $_smarty_tpl->tpl_vars['info']->value['qishu'];?>
期)<?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>

                    <span class="color01" style="white-space: nowrap">【<?php if ($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
<?php }elseif($_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_WIN')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }elseif($_smarty_tpl->tpl_vars['share']->value['extension_AUC']==@constant('CART_DB')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
获得<?php }?>】</span>
                </a></div>

                <?php if ($_smarty_tpl->tpl_vars['new_buy']->value&&$_smarty_tpl->tpl_vars['share']->value['extension_code']==@constant('CART_DB')){?>
                <div class="more"><a class="color02" href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']);?>
" target="_blank">第<?php echo $_smarty_tpl->tpl_vars['new_buy']->value['qishu'];?>
期正在进行中…</a></div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['share']->value['extension_code']!=@constant('CART_DB')){?>
                <div class="total">参与人数：<b class="txt-impt"><?php echo $_smarty_tpl->tpl_vars['info']->value['bid_user_count'];?>
</b></div>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="cont">
        <div class="text">
            <?php echo nl2br($_smarty_tpl->tpl_vars['share']->value['content']);?>

        </div>
    </div>
    <div class="pics">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = unserialize($_smarty_tpl->tpl_vars['share']->value['thumbs']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <?php if (pathExtType($_smarty_tpl->tpl_vars['m']->value)=='video'){?>
        <iframe src="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
" frameborder=0 allowfullscreen style="background: #fff;width:500px;height: 300px;"></iframe>
        <?php }else{ ?>
        <div class="item scrollLoadingDiv"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value),$_smarty_tpl);?>
"/></div>
        <?php }?>
        <?php } ?>
    </div>
</div><?php }} ?>