<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 16:32:19
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\minfo\load_db.html" */ ?>
<?php /*%%SmartyHeaderCode:179885660f759141f95-25748694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '087c1005a165207ef6a2b4cebd2141a91f4f69ef' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\minfo\\load_db.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179885660f759141f95-25748694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f759373f05_02873351',
  'variables' => 
  array (
    'list' => 0,
    'L' => 0,
    'm' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f759373f05_02873351')) {function content_5660f759373f05_02873351($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<table class="w-table">
    <thead>
    <tr>
        <th class="col1"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
图片</th>
        <th class="col2"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
名称</th>
        <th class="col3"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
状态</th>
        <th class="col4">参与人次</th>
        <th class="col5"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
号码</th>
        <th class="col6">操作</th>
    </tr>
    </thead>
    <tbody>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <tr>
        <td class="col1 scrollLoadingDiv"><a target="_blank" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'],'width'=>120,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
"></a></td>
        <td class="col2" style="text-align: left">
            <div class="w-goods w-goods-l">
                <p class="w-goods-title"><a title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" target="_blank" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
                <p class="w-goods-price">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['need_num'];?>
人次</p>
                <div class="w-progressBar">
                    <ul class="w-progressBar-txt f-clear">
                        <li class="w-progressBar-txt-l">
                            已参与<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['buy_num'];?>
人次
                        </li>
                        <li class="w-progressBar-txt-r">
                            剩余<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['end_num'];?>
人次
                        </li>
                    </ul>
                </div>
                <div class="winner" style="display: none;">
                    <div class="name">获得者：<a target="_blank" href="<?php echo url(('/minfo/?id=').($_smarty_tpl->tpl_vars['m']->value['luck_db']['mid']));?>
" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['luck_db']['username'],$_smarty_tpl->tpl_vars['m']->value['luck_db']['nickname']);?>
)"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['luck_db']['username'],$_smarty_tpl->tpl_vars['m']->value['luck_db']['nickname']);?>
</a>（本期共参与<strong class="txt-dark"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_db']['qty'];?>
</strong>人次）</div>
                    <div class="code">幸运号码：<strong class="txt-impt"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_db']['luck_code'];?>
</strong></div>
                </div>
            </div>
        </td>
        <td class="col3" nowrap>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==2){?><span class="color01">正在进行…</span>
            <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==3||$_smarty_tpl->tpl_vars['m']->value['status']==5){?><span class="color02">已揭晓</span>
            <?php }else{ ?><span class="color03">等待揭晓</span><?php }?>
        </td>
        <td class="col4 color01" nowrap style="font-size: 14px;">
            <?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次
        </td>
        <td class="col5" nowrap>
            <ul class="codeLayer">
                <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['yun_code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yun_code']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yun_code']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['yun_code']['iteration']<5){?><li><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</li><?php }?>
                <?php } ?>
            </ul>
        </td>
        <td class="col6" nowrap style="font-size: 14px;"><a href="javascript:;" onclick="mLoad('db#vid='+<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
)" class="color01">详情></a></td>
    </tr>
    <?php } ?>
</tbody>
</table>
<div class="foot-btn">
    <?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }else{ ?>
<div class="m-blank">该用户还没有参与过<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
！</div>
<?php }?>

<script type="text/javascript">
    var load_div = '#load_db';
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