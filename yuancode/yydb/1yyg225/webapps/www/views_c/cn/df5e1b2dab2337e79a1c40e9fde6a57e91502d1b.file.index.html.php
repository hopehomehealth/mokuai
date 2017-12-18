<?php /* Smarty version Smarty-3.1.13, created on 2015-12-09 15:50:09
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\yunbuy\index.html" */ ?>
<?php /*%%SmartyHeaderCode:23395565fa8a3eed9f4-26417361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df5e1b2dab2337e79a1c40e9fde6a57e91502d1b' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\yunbuy\\index.html',
      1 => 1449647403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23395565fa8a3eed9f4-26417361',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa8a41a5908_23342648',
  'variables' => 
  array (
    'yuncat' => 0,
    'm' => 0,
    'brand' => 0,
    'cid' => 0,
    'list' => 0,
    'listNo' => 0,
    'free_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa8a41a5908_23342648')) {function content_565fa8a41a5908_23342648($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="g-wrap g-body">
<div class="m-list">
<div class="g-body-hd f-clear">
    <div class="m-list-classification">
        <div class="m-classification">
            <div class="m-classi">分类</div>
            <div class="m-fication">
                <ul>
                    <li <?php if ($_GET['cid']==''){?>class="current"<?php }?>><a href="<?php echo url('/yunbuy');?>
<?php if ($_GET['bid']){?>?bid=<?php echo $_GET['bid'];?>
<?php }?><?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">全部分类</a></li>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li <?php if ($_GET['cid']==$_smarty_tpl->tpl_vars['m']->value['id']){?>class="current"<?php }?>><a href="<?php echo url('/yunbuy');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                    <?php } ?>
                </ul>
                <a href="javascript:;" class="expansion"></a>
            </div>
        </div>

        <div id="dlBrandBox" class="m-classification">
            <div class="m-classi">品牌</div>
            <div class="m-fication">
                <ul id="ulBrandList">
                    <li <?php if ($_GET['bid']==''){?>class="current"<?php }?>><a href="<?php echo url('/yunbuy');?>
<?php if ($_GET['cid']){?>?cid=<?php echo $_GET['cid'];?>
<?php }?><?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>" title="全部">全部</a></li>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brand']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li <?php if ($_GET['bid']==$_smarty_tpl->tpl_vars['m']->value['id']){?>class="current"<?php }?>><a href="<?php echo url('/yunbuy');?>
?bid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
<?php if ($_GET['cid']){?>&cid=<?php echo $_GET['cid'];?>
<?php }?><?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                    <?php } ?>
                </ul>
                <div class="f-a-expansion" style="display: none;">
                    <a class="" href="javascript:;" id="btnExpend" title="展开">展开<div class="f-top-arrow"><cite>◆</cite><b>◆</b></div></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="g-wrap g-body-bd f-clear">
<div class="m-list-mod m-list-goodsList" style="overflow: hidden">
<div class="m-list-mod-hd">
    <h6>排序：</h6>
    <ul class="m-list-sortList">
        <li <?php if ($_GET['k']=='goods_click'){?>class="selected"<?php }?>>
            <a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&k=goods_click<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">人气奖品</a>
        </li>
        <li <?php if ($_GET['k']=='end_num'){?>class="selected"<?php }?>><a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&k=end_num&s=asc<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">剩余人次</a>
        </li>
        <li <?php if ($_GET['k']=='add_time'){?>class="selected"<?php }?>><a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&k=add_time<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">最新奖品</a>
        </li>
        <li <?php if ($_GET['k']=='need_num'&&$_GET['s']=='desc'){?>class="selected"<?php }?>><a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&k=need_num&s=desc<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">总需人次<i class="ico ico-arrow-sort ico-arrow-sort-gray-up" title="升序"></i></a>
        </li>
        <li <?php if ($_GET['k']=='need_num'&&$_GET['s']=='asc'){?>class="selected"<?php }?>><a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&k=need_num&s=asc<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">总需人次<i class="ico ico-arrow-sort ico-arrow-sort-gray-down" title="降序"></i></a>
        </li>
    </ul>
</div>
<div class="m-list-mod-bd">
<ul class="w-quickBuyList f-clear">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
    <p class="empty">产品正在上架</p>
    <?php } ?>
    <?php if ($_smarty_tpl->tpl_vars['listNo']->value<4&&$_smarty_tpl->tpl_vars['listNo']->value>0){?>
    <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['listNo']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['listNo']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
    <li class="w-quickBuyList-item blank"></li>
    <?php }} ?>
    <?php }?>
</ul>
</div>
</div>
<div class="m-list-pager">
    <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<script type="text/javascript">
    $(function(){
        $(".w-number-btn-plus").click(function(){
           var max = $(this).parent().children('input.w-number-input').attr('data-max');
           var qty = $(this).parent().children('input.w-number-input').val()*1;
            if(qty < max){
                $(this).parent().children('input.w-number-input').val(qty+1);
            }
        });
        $(".w-number-btn-minus").click(function(){
            var qty = $(this).parent().children('input.w-number-input').val()*1;
            if(qty>1){
                $(this).parent().children('input.w-number-input').val(qty-1);
            }
        });
        $(".w-number-input").blur(function(){
            var max = $(this).attr('data-max')*1;
            if($(this).val()>max){
                $(this).val(max);
            }
        });
    });
</script>

<div class="m-list-mod m-list-freeList">
    <div class="w-hd">
        <h3 class="w-hd-title">免费专区</h3>
        <a class="w-hd-more" href="<?php echo url('/yunbuy/free');?>
">去免费专区看看！</a>
    </div>
    <div class="m-list-mod-bd">
        <ul class="w-goodsList f-clear">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['free_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <li class="w-goodsList-item row-first">
                <div class="w-goods w-goods-briefFree">
                    <div class="w-goods-pic scrollLoadingDiv"><img class="zjf" height="55" src="/style/images/daz.png" width="47" /><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>210,'height'=>130,'type'=>0),$_smarty_tpl);?>
"></a></div>
                    <p class="w-goods-title f-txtabb">
                        <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                    <p class="w-goods-price">价值：<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
 赠币 </p>
                    <p>总需 <b class="txt-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</b> 人次参与，</p>
                    <p>还剩 <b class="txt-blue"><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b> 人次</p>
                    <div class="w-goods-opr1"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" style="" target="_blank">详情&gt; </a></div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $('.w-quickBuyList-item').bind('mouseover',function(){
        $(this).addClass('hover');
    }).bind('mouseout',function(){
        $(this).removeClass('hover');
    });
</script><?php }} ?>