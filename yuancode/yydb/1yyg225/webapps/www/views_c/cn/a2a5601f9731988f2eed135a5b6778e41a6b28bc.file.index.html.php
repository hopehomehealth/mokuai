<?php /* Smarty version Smarty-3.1.13, created on 2016-06-03 09:51:44
         compiled from "D:\test1yyg3\webapps\www\views\cn\index.html" */ ?>
<?php /*%%SmartyHeaderCode:154265750e2b0b4b2d9-56982831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2a5601f9731988f2eed135a5b6778e41a6b28bc' => 
    array (
      0 => 'D:\\test1yyg3\\webapps\\www\\views\\cn\\index.html',
      1 => 1463120329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154265750e2b0b4b2d9-56982831',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'yuncat' => 0,
    'key' => 0,
    'm' => 0,
    'site_config' => 0,
    'tagData' => 0,
    'tagAdw' => 0,
    'tagAds' => 0,
    'data' => 0,
    'recbuy' => 0,
    'L' => 0,
    'luck_db' => 0,
    'ty_yunbuy' => 0,
    'yunbuy' => 0,
    'newyunbuy' => 0,
    'auction' => 0,
    'share' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5750e2b0e0a572_16729674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5750e2b0e0a572_16729674')) {function content_5750e2b0e0a572_16729674($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3\\system\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/index.css');?>
">
<script src="/style/lefttime.js"></script>
<script src="/style/lefttime_jx.js"></script>

<div class="container">
<div class="ui-clr first-screen">
    <div class="screen-left ui-left">
        <ul class="nav-sub">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yuncat']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yuncat']['index']++;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['yuncat']['index']<6){?>
            <li class="n<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
            <?php }?>
            <?php } ?>
        </ul>
        <div class="active">
            <h3><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
公告</h3>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','module'=>'article','field'=>'id,title,url','catid'=>@constant('REC_ID'),'limit'=>3),$_smarty_tpl);?>

            <ul>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rec']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rec']['iteration']++;
?>
                <li class="a<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rec']['iteration'];?>
"><b><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rec']['iteration'];?>
</b><a href="<?php if ($_smarty_tpl->tpl_vars['m']->value['link']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['link'];?>
<?php }else{ ?><?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="screen-center ui-left">
        <div id="slideBox" class="slideBox">
            <div class="bd">
                <ul>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>1),$_smarty_tpl);?>

                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>10),$_smarty_tpl);?>

                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li class="scrollLoadingDiv"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['isblank']){?> target="_blank"<?php }?>><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
" /></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="hd">
                <ul><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?><li><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</li><?php } ?></ul>
            </div>
        </div>

        <div id="scroll" class="scroll">
            <div class="scroll-box">
                <div class="bd" id="win-list">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['jxdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <?php echo $_smarty_tpl->getSubTemplate ("content/windbitemindex.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php } ?>
                </div>
            </div>
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
            <span class="bor"></span>
        </div>
        <input type="hidden" name="ids" id="ids" value="" />

    </div>

    <div class="screen-right ui-right">
        <?php if ($_smarty_tpl->tpl_vars['recbuy']->value){?>
        <div class="recduobao">
            <div class="bd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li>
                        <div class="title"><i></i><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></div>
                        <div class="pic v"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>200,'height'=>150,'type'=>0),$_smarty_tpl);?>
"></a><span></span></div>
                        <div class="progressBar">
                            <p class="progressBar-wrap">
                                <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%"></span>
                            </p>
                            <div class="progressBar-txt">
                                <div class="txt-l">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                                    <p>已参与人次</p>
                                </div>
                                <div class="txt-r">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                                    <p>剩余人次</p>
                                </div>
                            </div>
                        </div>
                        <a class="btn-btn" href="javascript:void(0)" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
,'buy')"></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php }?>
        <?php if (@constant('IsAuction')){?>
        <a class="index-com" href="<?php echo url('/content/newbie/yunbuy');?>
"></a>
        <div class="stock">
            <div class="tip">上证<br>指数</div>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['cod']){?>
            <div class="today">
                <a href="http://cj.gw.com.cn/news/index/000001.shtml" target="_blank"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['cod']['cod'];?>
</strong></a><br>[<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cod']['addtime'],'Y-m-d');?>
]
            </div>
            <?php }?>
            <div class="latest">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['codlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <p>[<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['addtime'],'m-d');?>
] <a><?php echo $_smarty_tpl->tpl_vars['m']->value['cod'];?>
</a></p>
                <?php } ?>
            </div>
        </div>
        <?php }else{ ?>
        <a class="index-com" style="height: 162px; margin-top: 10px; background: url('style/images/index1_1.jpg');" href="<?php echo url('/content/newbie/yunbuy');?>
"></a>
        <?php }?>

    </div>
</div>
<div class="screen-bot"></div>

<div class="section">
    <div class="s-hd">
        <h3>正在<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</h3>
        <ul class="s-nav">
            <li><a href="<?php echo url('/content/share');?>
" target="_blank">查看<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</a></li>
        </ul>
    </div>
    <div class="s-bd ui-clr">
        <div class="s-aside ui-left">
            <div class="win-t"><img src="/style/images/a-pic.png"></div>
            <div class="win-bd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['luck_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li>
                        <div class="pic"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" width="50" height="50"></div>
                        <div class="info">
                            <p class="p1"><span>于<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'m月d日');?>
</span><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><strong><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</strong></a></p>
                            <p class="p2"><b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</b>参与<a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['goods_name'],10,'');?>
</a></p>
                            <p>总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次</p>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="s-main">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '01'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('01', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ty_yunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li>
                    <div class="pic v scrollLoadingDiv"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>210,'height'=>180,'type'=>0),$_smarty_tpl);?>
" /></a><span></span></div>
                    <p class="title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                    <p class="num">价值：<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
 <span class="pay_points"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</span><span class="color01">(免费拍)</span></p>
                    <div class="progressBar">
                        <p class="progressBar-wrap">
                            <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%"></span>
                        </p>
                        <div class="progressBar-txt">
                            <div class="txt-l">
                                <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                                <p>已参与人次</p>
                            </div>
                            <div class="txt-c" style="padding-left: 5px;">
                                <p class="color03"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</p>
                                <p>总需人数</p>
                            </div>
                            <div class="txt-r">
                                <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                                <p>剩余人次</p>
                            </div>
                        </div>
                    </div>
                    <a class="btn-go-green" href="javascript:void(0)" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
,'free')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
                </li>
                <?php } ?>
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '02'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('02', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="section">
    <div class="s-hd">
        <h3>最新上架</h3>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newyunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['newAuction']){?>
        <div class="fn-clear">
            <ul class="pro-list ui-clr">
                <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['newAuction']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
                <li class="aucli">
                    <div class="pic scrollLoadingDiv"><a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['auction']->value['imgurl_src'],'width'=>210,'height'=>130,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" /></a></div>
                    <p class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
</a></p>

                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['cat_type']=='tiyan'){?>
                    <p class="price" style="line-height: 24px;">
                        价值：<?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['price']);?>

                        <?php if ($_smarty_tpl->tpl_vars['auction']->value['paib']){?>
                        仅需<i> <?php echo $_smarty_tpl->tpl_vars['auction']->value['paib'];?>
<em><a href="<?php echo url('/content/tiyan');?>
" target="_blank" title="做任务，赚<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a></em></i>
                        <?php }?>
                    </p>
                    <?php }else{ ?>
                    <p class="price"><i>￥</i><span><?php echo $_smarty_tpl->tpl_vars['auction']->value['current_price'];?>
</span> <del>原价：<?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['price']);?>
</del></p>
                    <?php }?>


                    <p class="tip"><?php if ($_smarty_tpl->tpl_vars['auction']->value['cat_type']=='tiyan'){?><span class="color01">体验</span><?php }?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
率：<?php echo $_smarty_tpl->tpl_vars['auction']->value['win'];?>
%，已有<span class="color01"><?php echo $_smarty_tpl->tpl_vars['auction']->value['bid_user_count'];?>
</span>人参与</p>
                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']<@constant('FINISHED')){?>
                    <div class="count-time"><i></i><?php if ($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('PRE_START')){?>即将开始<?php }else{ ?>剩余<?php }?>：<span id="leftTime<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
">请稍等, 载入中...</span></div>
                    <script type="text/javascript">
                        onload_leftTime('<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
<?php echo $_smarty_tpl->tpl_vars['auction']->value['key'];?>
',"<?php echo $_smarty_tpl->tpl_vars['auction']->value['diff_time'];?>
","<?php echo $_smarty_tpl->tpl_vars['auction']->value['status'];?>
");
                    </script>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('PRE_START')){?>
                    <a class="btn-go btn-pre" href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
">即将推出</a>
                    <?php }elseif($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('UNDER_WAY')){?>
                    <a class="btn-go" href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
">抢拍</a>
                    <?php }else{ ?>
                    <a class="btn-go btn-finish" href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
">已结束</a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['win']){?>
                    <div class="winz"><i><?php echo $_smarty_tpl->tpl_vars['auction']->value['win'];?>
<span>%</span></i></div>
                    <?php }?>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php }?>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['share']->value){?>
<div class="section">
    <div class="s-hd">
        <h3>晒单分享</h3>
        <span id="start"></span>
        <ul class="s-nav">
            <li><a href="<?php echo url('/content/share');?>
" target="_blank">更多分享...</a></li>
        </ul>
    </div>
    <div class="s-bd ui-clr">
        <div class="share-list">
            <ul class="ui-clr">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['share']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li>
                    <div class="pic"><a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'width'=>100,'height'=>82,'type'=>1),$_smarty_tpl);?>
" /></a></div>
                    <div class="detail">
                        <i class="former"></i>
                        <p class="txt"><a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['content'],54);?>
</a></p>
                        <p class="author">&mdash;&mdash; <a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],10);?>
</a>&nbsp; <?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</p>
                        <i class="after"></i>
                    </div>
                </li>
                <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                <li class="empty" style="border:0;width:100%;line-height:200px;">等你来晒单...</li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php }?>

</div>
<script src="<?php echo url('/style/script.js');?>
"></script>
<script src="<?php echo url('/style/jquery.SuperSlide.2.1.1.js');?>
"></script>
<script src="<?php echo url('/style/jcarousellite.js');?>
"></script>

<script type="text/javascript">
    jQuery(".recduobao").slide({mainCell:".bd ul",effect:"top",autoPlay:true,interTime:"3000",delayTime:"1000"});
    jQuery("#slideBox").slide({mainCell:".bd ul",effect:"left",autoPlay:true});
    jQuery("#notice").slide({});
    jQuery("#focus").slide({mainCell:".bd ul",effect:"top",autoPlay:true,interTime:"3000"});
    jQuery(".win-bd").slide({mainCell:"ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:7,interTime:"2500",delayTime:"1000",opp:true});
    jQuery(".act-bd").slide({mainCell:"ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:7,interTime:"2500",delayTime:"1000",opp:true});
    jQuery("#share").slide({mainCell:".share-list ul",autoPage:true,interTime:"5000",effect:"topLoop",autoPlay:true,vis:2});
    //jQuery("#scroll").slide({ mainCell:".bd",autoPage:true,effect:"left",autoPlay:true,interTime:"4000",scroll:2,vis:2 });

    $(function(){
        $(".share-list").jCarouselLite({auto:3000,speed: 300});
        $(".share-list li:even").addClass("even");

        $(".side-r img").each(function(){
            SetImage(this,294,142);
        });

        $('.win-list li,.pro-list li').bind('mouseover',function(){
            $(this).addClass('hover');
        }).bind('mouseout',function(){
            $(this).removeClass('hover');
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        compaceIds();
        setInterval('compaceIds()',5*1000);
    });
    function compaceIds(){
        $.post('/content/ajaxIds','skin=index&ids='+$('#ids').val(),function(data){
            if(data.error==1){
                $('#ids').val(data.ids);
                $('#win-list').prepend(data.html);
            }
        },'json');
    }
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>