<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 18:37:30
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\post_share.html" */ ?>
<?php /*%%SmartyHeaderCode:1589256d6c26ab575a1-50819372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8040eb65cbfb217cd7cf315bb6384d7bfb3503d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\post_share.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1589256d6c26ab575a1-50819372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'goods' => 0,
    'row' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d6c26acf9f60_65249707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d6c26acf9f60_65249707')) {function content_56d6c26acf9f60_65249707($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>晒单</h2>
                </div>
                <form action="" target="iframeNews" method="post" id="submit_form">
                <div class="hy-box">
                    <div class="hy-yhk">
                        <div class="prompt color04">每个订单只要有一次晒单机会，发布晒单您将获得1-5<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
的奖励，好好把握机会吧！<s></s></div>
                        <table>
                            <tr>
                                <th>晒单商品：</th>
                                <td style="line-height: 48px"><table><tr><td width="70"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['goods']->value['thumb'],'width'=>64,'height'=>48,'type'=>0),$_smarty_tpl);?>
" width="64"/></td><td><a href="<?php echo $_smarty_tpl->tpl_vars['goods']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['goods']->value['title'];?>
</a></td></tr></table></td>
                            </tr>
                            <tr>
                                <th>晒单标题：</th>
                                <td>
                                    <input name="title" type="text" class="inpt-style2 w230" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" /><span class="color01">*</span>
                                </td>
                            </tr>
                            <tr>
                                <th>晒单内容：</th>
                                <td>
                                    <textarea name="content" style="border: 1px solid #CFCFCF;padding:5px; width: 500px; height: 200px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>上传图片：</th>
                                <td>
                                    <?php echo upload_btn('share','','',6);?>

                                    <div style="line-height:1.5;padding-top:10px;color:#777;font-size:14px;">
                                        <p class="mb15 color01">
                                            <b>请按以下要求晒单，系统审核通过后，才会给您奖励哦！</b>
                                        </p>
                                        <p class="mb15">
                                            <b style="color:#444">普通晒单（<b class="color01" style="font-size:14px"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['share_db'];?>
个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</b>）内容要求包含>>>></b><br>
                                            1、<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
感言；<br>
                                            2、<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
商品真实拍摄照片；
                                        </p>
                                        <p class="mb15">
                                            <b style="color:#444">精华晒单（<b class="color01" style="font-size:14px"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['rec_share_db'];?>
个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</b>）内容要求包含>>>></b><br>
                                            1、刷脸和刷<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
产品，合照图片清晰，无倒置图片（即：您或您的亲友与物品的开心合照）；<br>
                                            2、<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
短信通知截图、物品高清照；<br>
                                            2、文字言之有物，分享<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
喜悦得当，寄语<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
、正品、真实可信描述以及个人主观评价。
                                        </p>
                                        <p class="mb15">
                                            <b style="color:#444">随意晒单处理决定（扣除<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
或<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
）>>>></b><br>
                                            1、晒单图片需要商品实拍图，晒单内容为<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
感言或寄语；<br>
                                            2、随意截图和言论，都将被扣除1至10个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
或者<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
。
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th> &nbsp;</th>
                                <td class="">
                                    <input type="hidden" name="Submit" value="1">
                                    <input type="submit" value="提交晒单" class="hy-btn2 fn-left" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
     </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>