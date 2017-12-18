<?php /* Smarty version Smarty-3.1.13, created on 2016-04-05 16:52:37
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\minfo\load_auc.html" */ ?>
<?php /*%%SmartyHeaderCode:266657037cd5dd40a8-53227996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '222b330579b5a0abee19d2bde695bc53e279e5ab' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\minfo\\load_auc.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '266657037cd5dd40a8-53227996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'L' => 0,
    'm' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57037cd60b71b9_47858284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57037cd60b71b9_47858284')) {function content_57037cd60b71b9_47858284($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<table class="w-table">
    <thead>
    <tr>
        <th class="col1">商品图片</th>
        <th class="col2">商品名称</th>
        <th class="col3"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
状态</th>
        <th class="col4">最后出价<span class="color03">(￥/人)</span></th>
        <th class="col5">我的出价<span class="color03">(￥/码)</span></th>
    </tr>
    </thead>
    <tbody>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <tr>
        <td class="col1 scrollLoadingDiv"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>120,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"></a></td>
        <td class="col2" style="text-align: left">
            <div class="w-goods w-goods-l">
                <p class="w-goods-title"><a title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><span class="color01">（第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期）</span><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                <p class="w-goods-price">价值：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['price']);?>
</p>
                <div class="w-progressBar">
                    <ul class="w-progressBar-txt f-clear">
                        <li class="w-progressBar-txt-l">
                            已参加<?php echo $_smarty_tpl->tpl_vars['m']->value['bid_user_count'];?>
人次
                        </li>
                        <li class="w-progressBar-txt-r">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank">前去围观<span class="st">>></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </td>
        <td class="col3" nowrap>
            <!-- <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==@constant('UNDER_WAY')){?> -->
            <span class="color01">正在进行中...</span>
            <!-- <?php }else{ ?> -->
            <!-- <?php if ($_smarty_tpl->tpl_vars['m']->value['last_bid']['bid_user']==$_smarty_tpl->tpl_vars['member']->value['mid']&&$_smarty_tpl->tpl_vars['m']->value['type']==1){?> -->
            <span class="color02">最高价获得</span>
            <!-- <?php }else{ ?> -->
            <span class="color03"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
已结束</span>
            <!-- <?php }?> -->
            <!-- <?php }?> -->
        </td>
        <td class="col4" style="table-layout:fixed; word-break: break-all;">
            <span class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['current_price']);?>
</span><br>
            <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['last_bid']['bid_user']));?>
#auc" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['last_bid']['username'],$_smarty_tpl->tpl_vars['m']->value['last_bid']['nickname']);?>
</a>
        </td>
        <td class="col5" style="table-layout:fixed; word-break: break-all;">
            <span class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['my_bid']['bid_price']);?>
</span><br>
            <?php echo $_smarty_tpl->tpl_vars['m']->value['my_bid']['cod'];?>

        </td>
    </tr>
    <?php } ?>
</tbody>
</table>
<div class="foot-btn">
    <?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }else{ ?>
<div class="m-blank">该用户还没有参与过<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
！</div>
<?php }?>

<script type="text/javascript">
    var load_div = '#load_auc';
    $(document).ready(function(){
        $(load_div).find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"拼命加载中...",
            target:load_div,
            success:function(){
                scrollLoading();
            }
        }).bind('click',function(){
            $('html,body').animate({ scrollTop: '400px' }, 500);
        });
    });
</script><?php }} ?>