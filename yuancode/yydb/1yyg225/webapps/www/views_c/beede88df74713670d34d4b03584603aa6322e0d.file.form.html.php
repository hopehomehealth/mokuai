<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:17:06
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/wxreply/smartreply/form.html" */ ?>
<?php /*%%SmartyHeaderCode:1365547089587622423d0ac5-60726463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'beede88df74713670d34d4b03584603aa6322e0d' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/wxreply/smartreply/form.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1365547089587622423d0ac5-60726463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rule' => 0,
    'k' => 0,
    'm' => 0,
    'ruleJson' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5876224244dd94_83216629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5876224244dd94_83216629')) {function content_5876224244dd94_83216629($_smarty_tpl) {?><h3 class="info-tag media-cate">
    <a class="uiBtn r" href="#!wxreply/smartreply" style="font-size:12px">返回</a>
    <a class="tab-btn" href="#!wxreply/subscribe">被关注自动回复<b class="z1">◆</b><b class="z0">◆</b></a>
    <a class="tab-btn" href="#!wxreply/autoreply">消息自动回复<b class="z1">◆</b><b class="z0">◆</b></a>
    <a class="tab-btn on" href="#!wxreply/smartreply">关键词自动回复<b class="z1">◆</b><b class="z0">◆</b></a>
    <span></span>
</h3>


<style type="text/css">
.reply_list{border:1px solid #ddd; border-bottom:none; border-top:none}
.reply_list li{border-bottom:1px solid #ddd; padding:5px; position:relative}
.wxreply-opera{position:absolute; right:5px; top:5px}
.reply_html{line-height:24px}
</style>

<div class="html-box">

    <form class="newsBox" id="smartreplyForm" method="post" style="width:550px; padding:5px 5px 80px">

        <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" type="hidden">

        <div class="f-unit">
            <label class="ui-label w60">规则名：</label>
            <input class="form-i w200" name="rule_name" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['name'];?>
" type="text">
        </div>

        <div class="f-unit">
            <label class="ui-label w60">关键字： </label>
            <div class="l" style="width: 465px;">
                <table class="list" style="width:100%" id="kwlist">
                    <tbody>
                    <tr><th>关键字</th><th>完全匹配</th><th>操作</th></tr>

                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rule']->value['keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <tr>
                        <td><input type="text" class="form-i LH22 w200" name="kw[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['keyword'];?>
"></td>
                        <td><input type="checkbox" value="1" name="match[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]"<?php if ($_smarty_tpl->tpl_vars['m']->value['match']){?> checked<?php }?>></td>
                        <td><a href="javascript:;" class="uiBtn BtnOrange e2-wxreply-delKw"><i class="iconfont">&#xe60b;</i></a> </td>
                    </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                    <tr>
                        <td><input type="text" class="form-i LH22 w200" name="kw[0]" value=""></td>
                        <td><input type="checkbox" value="1" name="match[0]"></td>
                        <td><a href="javascript:;" class="uiBtn BtnOrange e2-wxreply-delKw"><i class="iconfont">&#xe606;</i></a> </td>
                    </tr>
                    <?php } ?>

                    </tbody>
                </table>
                <div style="padding-top:5px">
                    <a class="uiBtn BtnBlue e2-wxreply-addKw" href="javascript:;">添加关键字</a>
                </div>
            </div>
        </div>

        <div class="f-unit">
            <label class="ui-label w60">回复： </label>
            <div class="l" style="width: 465px;">
                <div class="wxmsg-types clear" id="wxmsg-tabs">
                    <a href="javascript:;" rel="text" class="type-btn tab_text e2-wxmenu-editMsg-text">
                        <i class="iconfont">&#xe603;</i><span>文本</span>
                    </a>
                    <a href="javascript:;" rel="image" class="type-btn tab_img e2-wxmenu-editMsg-image" style="display: none">
                        <i class="iconfont">&#xe611;</i><span>图片</span>
                    </a>
                    <a href="javascript:;" rel="news" class="type-btn tab_news e2-wxmenu-editMsg-news">
                        <i class="iconfont">&#xe602;</i><span>图文</span>
                    </a>
                </div>

                <div>
                    <ul id="reply_list" class="reply_list"></ul>
                </div>

            </div>
        </div>


        <div class="f-unit">
            <label class="ui-label w60">&nbsp;</label>
            <a type="submit" class="uiBtn BtnGreen BtnLg e2-wxmenu-submitRule">提&nbsp;&nbsp;交</a>
        </div>
    </form>


    <div style="height:80px"></div>
</div>
<script type="text/javascript">
    $.loadJs('/admin/js/manage/wxreply.js',function(){
    $.loadJs('/admin/js/manage/wxmenu.js',function(){
        wxreply.initEditReply(<?php echo $_smarty_tpl->tpl_vars['ruleJson']->value;?>
);
    });
    });
</script><?php }} ?>