<?php /* Smarty version Smarty-3.1.13, created on 2016-04-20 13:32:25
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\post_share.html" */ ?>
<?php /*%%SmartyHeaderCode:16487571714698583b9-83769887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fefe902b617e26917875ef704894b599271950c5' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\post_share.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16487571714698583b9-83769887',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'site_config' => 0,
    'goods' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57171469e8b257_19664294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57171469e8b257_19664294')) {function content_57171469e8b257_19664294($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tips-m">
        <div class="prompt">每个订单只要有一次晒单机会，发布晒单您将获得（<b class="color01" style="font-size:1.2rem">1-5<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</b>）的奖励，好好把握机会吧！</div>
        <div class="prompt">
            <span>普通晒单（<b class="color01" style="font-size:1.2rem"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['share_db'];?>
个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</b>）内容要求包含>>>></span><br>
            <span class="color03">
            1、<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
感言；<br>
            2、<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
商品真实拍摄照片；
            </span>
        </div>
        <div class="prompt">
            <span>精华晒单（<b class="color01" style="font-size:1.2rem"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['rec_share_db'];?>
个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</b>）内容要求包含>>>></span><br>
            <span class="color03">
            1、刷脸和刷<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
产品，合照图片清晰，无倒置图片（即：您或您的亲友与物品的开心合照）；<br>
            2、<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
短信通知截图、物品高清照；<br>
            2、文字言之有物，分享<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
喜悦得当，寄语<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
、正品、真实可信描述以及个人主观评价。
            </span>
        </div>
    </div>

    <div class="form-m">
        <form action="" target="iframeNews" method="post" id="submit_form">
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">晒单商品：</dt>
                    <dd style="line-height: 2rem;">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['goods']->value['url'];?>
" target="_blank">
                            <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['goods']->value['thumb'],'width'=>64,'type'=>0),$_smarty_tpl);?>
" width="64" style="float:left;margin-right:10px;" />
                            <?php echo $_smarty_tpl->tpl_vars['goods']->value['title'];?>

                        </a>
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">晒单标题：</dt>
                    <dd>
                        <input type="text" class="input-m" name="title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">晒单内容：</dt>
                    <dd>
                        <textarea name="content" class="input-m" style="padding:5px;width:95%;height:80px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">上传图片：</dt>
                    <dd style="line-height: 2;">
                        <?php echo upload_btn('share','','',6);?>


                        <div style="line-height:2rem;padding-top:10px;color:#777;font-size:1.2rem;">

                        </div>

                    </dd>
                </dl>
            </div>
            <input type="hidden" name="Submit" value="1">
            <input type="submit" value="提交晒单" class="btn" />
        </form>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>