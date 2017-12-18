<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 14:07:26
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\auction\view.html" */ ?>
<?php /*%%SmartyHeaderCode:230615660fb7472dd35-44028956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ff45e45b04d9040fd79d3a2c5ba885f1c8b1925' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\auction\\view.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230615660fb7472dd35-44028956',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fb74bb9019_99846939',
  'variables' => 
  array (
    'data' => 0,
    'tagPics' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fb74bb9019_99846939')) {function content_5660fb74bb9019_99846939($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo url('/style/lefttime.js');?>
"></script>
<link rel="stylesheet" href="<?php echo url('/style/css/boutique.css');?>
">
<script src="<?php echo url('/style/artDialog/artDialog.js?skin=225');?>
"></script>
<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="container">
    <div id="qishu"></div>
    <div class="fn-clear mt20 jp-sp">
        <div class="picFocus fn-left aucli">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['win']>0){?>
            <div class="winz <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['user']==1){?>winzUser<?php }?>"><i><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['win'];?>
<span>%</span></i></div>
            <?php }?>
            <div class="bd">
                <ul>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagPics','source'=>$_smarty_tpl->tpl_vars['data']->value['row']['thumbs'],'width'=>448,'height'=>277,'type'=>0,'num'=>5),$_smarty_tpl);?>

                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tagPics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <li><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['path'],'width'=>448,'height'=>277,'type'=>0),$_smarty_tpl);?>
" /></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="hd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tagPics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <li class="v"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['path'],'width'=>80,'height'=>54,'type'=>0),$_smarty_tpl);?>
" /><span></span></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="fn-clear jp-fx">
                <span class="fn-left">分享到：</span>
                <?php echo share();?>

            </div>
        </div>

        <div class="fn-right jp-spr">
            <h1 class="jp-title"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['title'];?>
</h1>
            <div class="p4"><?php if ($_smarty_tpl->tpl_vars['data']->value['row']['status']==@constant('PRE_START')){?>即将开始<?php }else{ ?>剩余<?php }?>：<i id="leftTime<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
">请稍等, 正在载入中...</i></div>
            <script type="text/javascript">
                onload_leftTime('<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
',"<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['diff_time'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['status'];?>
");
            </script>
            <p><span class="txt-sc">市场价：<?php echo price_format($_smarty_tpl->tpl_vars['data']->value['row']['price']);?>
</span></p>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['desc'][0]){?>
            <p>商品来源：<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['desc'][1];?>
" class="color02" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['desc'][0];?>
</a> <span class="color04">（正品保障）（采购平台价格会有上下浮动）</span></p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['amplitude']>0){?>
            <p>加价幅度：<span class="color02"><?php echo price_format($_smarty_tpl->tpl_vars['data']->value['row']['amplitude']);?>
</span></p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['deposit']>0){?>
            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
<a _title="为保证公平公正竟拍" class="layerTip"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
</a>：<span class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['data']->value['row']['deposit']);?>
</span> <span class="color04">（参加本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
需暂时缴纳的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
）（<span class="color01">获奖者直接使用此<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
支付部分款项；未获奖者<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
结束后将退还到您的帐户余额</span>）</span></p>
            <?php }?>
            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
模式：<span class="color01"><?php if ($_smarty_tpl->tpl_vars['data']->value['row']['type']==0){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
+<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }?></span> <span class="color04">（<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['type']==0){?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
为<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
模式，只有一次出价机会<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['typenum']>0){?>，参与人数超过<span class="color01"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['typenum'];?>
</span>人，最高出价者将获得商品<?php }?><?php }else{ ?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
最高出价者<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
成功，同时首次出价者还有一次<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
机会<?php }?>）</span></p>
            <p>开奖处理：<span class="color04">工作日每天下午3:00-4:00，系统计算当天14点前所有首次出价结果</span></p>
            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
人数：<?php echo $_smarty_tpl->tpl_vars['data']->value['codCount'];?>
/<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['winnum']<0){?>不限数量<?php }elseif($_smarty_tpl->tpl_vars['data']->value['row']['winnum']>0){?><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['winnum'];?>
<?php }else{ ?>0<?php }?> <span class="color04">（<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['winnum']<0){?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
人数不限数量<?php }elseif($_smarty_tpl->tpl_vars['data']->value['row']['winnum']>0){?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
最大<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
数为前<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['winnum'];?>
位<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
者<?php }else{ ?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
未设置<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }?>）</span></p>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['painum']>0){?>
            <p><a href="<?php echo url('/content/index/78');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>限额：<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['painum'];?>
 <span class="color04">（若您<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
成功或<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
，下单时最多可使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
的数量）</span></p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['paib']){?>
            <p>扣除<a href="<?php echo url('/content/index/78');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>：<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['paib'];?>
 <span class="color04">（本商品首次出价即扣相应<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
数，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
不足则无法出价）</span></p>
            <?php }?>

            <div class="fn-clear jp-spbtn">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['status']==@constant('PRE_START')){?>
                <div class="fn-left jp-btn02">
                    <div class="fn-left jp-jgtxt">
                        即将开始
                    </div>
                </div>
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['row']['status']==@constant('UNDER_WAY')){?>
                <div class="fn-left jp-btn">
                    <div class="fn-left jp-jgtxt">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['winnum']>0&&$_smarty_tpl->tpl_vars['data']->value['codCount']>=$_smarty_tpl->tpl_vars['data']->value['row']['winnum']){?>
                        <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
人数已满，敬待下期
                        <?php }else{ ?>
                        <style type="text/css">
                            .jp-spbtn{ height:78px; line-height:78px; margin-top:20px;}
                            .jp-btn{ background:url('/style/images/jp-btr.png') right top no-repeat; padding-right:15px;}
                            .jp-jgtxt{ background:url('/style/images/jp-btl.png') left top no-repeat; padding-left:35px; color:#ffff00; padding-right:10px;font-size: 40px; font-weight: bold;}
                            .jp-jgtxt i{ font-size: 18px; font-weight: normal; font-style: normal;}
                        </style>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['current_price']>0){?>
                        ￥<span id="CurPrice"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['current_price'];?>
</span>
                        <?php }else{ ?>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['row']['paib'];?>
<i><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</i>
                        <?php }?>
                        <?php }?>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['winnum']>0&&$_smarty_tpl->tpl_vars['data']->value['codCount']>=$_smarty_tpl->tpl_vars['data']->value['row']['winnum']){?>
                    <?php }else{ ?>
                    <div class="fn-left jp-btn-01">
                        <?php if ($_SESSION['mid']){?>
                        <a href="javascript:;" id="qjA">出 价</a>
                        <?php }else{ ?>
                        <a href="<?php echo url('/member/login');?>
">登 陆</a>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
                <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['type']=='1'){?>
                        <?php if ($_SESSION['mid']&&($_smarty_tpl->tpl_vars['data']->value['row']['last_bid']['bid_user']==$_SESSION['mid'])&&($_smarty_tpl->tpl_vars['data']->value['row']['status']==@constant('FINISHED'))){?>
                        <div class="fn-left">
                            <form action="/order/buy" method="post" style="padding-top:12px;">
                                <input type="hidden" name="type" value="<?php echo @constant('CART_AUC');?>
" />
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
" />
                                <button type="submit" class="btn-common">点击购买</button>
                            </form>
                        </div>
                        <?php }else{ ?>
                        <div class="fn-left jp-btn03">
                            <div class="fn-left jp-jgtxt">
                                <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
结束
                            </div>
                        </div>
                        <?php }?>
                    <?php }else{ ?>
                    <div class="fn-left jp-btn03">
                        <div class="fn-left jp-jgtxt">
                            <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
已结束
                        </div>
                    </div>
                    <?php }?>
                <?php }?>
                <div class="fn-left jp-spzjl">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['current_price']>0){?><?php }else{ ?>【<a href="<?php echo url('/content/index/78');?>
" class="color02" target="_blank">领<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>】 <?php }?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
率：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['win'];?>
%</span> ，已有<span class="color01" id="BidCount"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['bid_user_count'];?>
</span>人参与
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("auction/public_qujia.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>

    <div class="fn-clear jp-sptab" id="tab">
        <ul class="fn-left">
            <li class="dq">商品描述</li>
            <li onclick="load_log()">出价记录</li>
            <li onclick="load_cod()"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
名单</li>
        </ul>
        <div class="fn-left">
            <a href="<?php echo url('/content/html/winrules');?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
规则</a>
            <a href="<?php echo url('/content/index/47');?>
" target="_blank">常见问题</a>
        </div>
    </div>
    <div class="jp-spxq fn-clear">
        <div class="nr1 sp-txt">
            <?php echo picurl(stripcslashes($_smarty_tpl->tpl_vars['data']->value['row']['content']));?>

            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['price']>5000){?>
            <div class="special">重要说明：<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
获得者拥有 <?php echo $_smarty_tpl->tpl_vars['data']->value['row']['title'];?>
 10年免费使用权</div>
            <?php }?>
        </div>
        <div class="nr1 sp-zjmd fn-clear" id="log" style="display: none"></div>
        <div class="nr1 sp-zjmd fn-clear" id="cod" style="display: none"></div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['data']->value['love']){?>
    <div class="ceneral-title mt20">
        <h2>猜你喜欢 </h2>
    </div>
    <div class="fn-clear ceneral picScroll-left">
        <div class="bd">
            <ul class="picList">
                <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['love']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("auction/lbi_auction.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
    <?php }?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
    jQuery(".picScroll-left").slide({ titCell:".hd ul",mainCell:".bd ul",autoPage:true,interTime:6000,effect:"left",autoPlay:true,vis:5,trigger:"click" });
</script>
<script type="text/javascript">jQuery(".picFocus").slide({ mainCell:".bd ul",effect:"left",autoPlay:true });</script>
<script type="text/javascript">
    $(function(){
        //选项卡鼠标滑过事件
        $('.jp-sptab  li').click(function(){
            TabSelect(".jp-sptab li", ".jp-spxq .nr1", "dq", $(this))
        });

        function TabSelect(tab,con,addClass,obj){
            var $_self = obj;
            var $_nav = $(tab);
            $_nav.removeClass(addClass);
            $_self.addClass(addClass);
            var $_index = $_nav.index($_self);
            var $_con = $(con);
            $_con.hide();
            $_con.eq($_index).show();
        }
    });

    $("#qishu").load('/auction/ajax_qishu?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
');

    var isloadLog = isloadCod = false;
    function load_log(load){
        load=load?load:false;
        if(isloadLog == false || load==true){
            $("#log").html("拼命加载中...").load('/auction/ajax_log?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
');
            isloadLog = true;
        }
    }
    function load_cod(load){
        load=load?load:false;
        if(isloadCod==false || load==true){
            $("#cod").html("拼命加载中...").load('/auction/ajax_log?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
&status=cod');
            isloadCod = true;
        }
    }
</script>
<?php }} ?>