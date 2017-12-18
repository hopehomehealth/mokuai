<?php /* Smarty version Smarty-3.1.13, created on 2016-12-30 19:36:50
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/wxmedia/appmsg/form.html" */ ?>
<?php /*%%SmartyHeaderCode:2078911149586646d25f65c2-46227120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd82dfee399372e58e9e718f02f24c2eba53aaa7' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/wxmedia/appmsg/form.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2078911149586646d25f65c2-46227120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_586646d26bade7_10685803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586646d26bade7_10685803')) {function content_586646d26bade7_10685803($_smarty_tpl) {?><h3 class="info-tag"><?php if (empty($_smarty_tpl->tpl_vars['news']->value['news_id'])){?>添加单图文消息<?php }else{ ?>编辑单图文消息<?php }?><span></span></h3>

<style type="text/css">
</style>


<form class="html-box" method="post" id="appmsg-form">

    <div class="media_preview_area">
        <div class="media_preview">
            <div class="preview-box" id="msg-board1">
                <input type="hidden" name="wxnews_id" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['news_id'];?>
">
                <!--主图文-->
                <div id="wx-msg1" class="xmsg">
                    <h4 class="mtitle"><a id="news-tag1" href="javascript:;" target="_blank"><?php if (!empty($_smarty_tpl->tpl_vars['news']->value['title'])){?><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
<?php }else{ ?>标题<?php }?></a></h4>
                    <div class="msg-info">
                        <div class="msg-date"></div>
                    </div>

                    <?php if (empty($_smarty_tpl->tpl_vars['news']->value['cover'])){?>
                    <div class="msg-cover edit-area">
                        <div class="msg-thumb-wrp">
                            <img class="msg-thumb" src="">
                            <i class="msg-thumb-default">封面图片</i>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="msg-cover edit-area">
                        <div class="msg-thumb-wrp has-thumb">
                            <img class="msg-thumb" src="<?php echo $_smarty_tpl->tpl_vars['news']->value['imgurl_src'];?>
">
                            <i class="msg-thumb-default">封面图片</i>
                        </div>
                    </div>
                    <?php }?>

                    <div class="msg-desc" id="news-desc1"><?php echo $_smarty_tpl->tpl_vars['news']->value['desc'];?>
</div>
                </div><!--主图文End-->
            </div>
        </div>
    </div><!--可视图文区-->


    <div class="media_edit_area" id="edit_area">
        <div class="msg-editor">
            <div class="inner" style="width:452px">
                <div class="edit-item">
                    <label for="msg_title" class="i-label">标题</label>
                    <span class="input-box">
                        <input type="text" id="msg_title" onkeyup="wxnews.setTitle(this)" name="title" value="<?php if (!empty($_smarty_tpl->tpl_vars['news']->value['title'])){?><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
<?php }else{ ?><?php }?>">
                    </span>
                </div>

                <div class="edit-item">
                    <label for="msg_title" class="i-label">作者<span style="color:#999">&nbsp;(选填)</span></label>
                    <span class="input-box">
                        <input type="text" id="msg_author" name="author" value="<?php if (!empty($_smarty_tpl->tpl_vars['news']->value['author'])){?><?php echo $_smarty_tpl->tpl_vars['news']->value['author'];?>
<?php }else{ ?><?php }?>">
                    </span>
                </div>


                <div class="edit-item">
                    <label class="i-label">封面<p class="i-tip">大图片建议尺寸：360像素 * 200像素</p>
                    </label>
                    <div class="input-box xfile">
                        <a href="javascript:;" class="uiBtn BtnOrange e2-wxnews-selImage">选择图片</a>
                        <input type="hidden" name="cover" id="wx_cover_1" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['cover'];?>
">
                        <?php if (empty($_smarty_tpl->tpl_vars['news']->value['cover'])){?>
                        <p class="upimg-preview" id="up_thumb">
                            <img src="">
                            <a class="e2-wxnews-rmImg" href="javascript:;">删除</a>
                        </p>
                        <?php }else{ ?>
                        <p class="upimg-preview up_thumb" id="up_thumb">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['news']->value['imgurl_thumb'];?>
">
                            <a class="e2-wxnews-rmImg" href="javascript:;">删除</a>
                        </p>
                        <?php }?>

                    </div>
                    <label for="cover_in_detail" class="show-indetail">
                        <input type="checkbox" id="cover_in_detail"<?php if ($_smarty_tpl->tpl_vars['news']->value['cover_in_detail']){?> checked="checked"<?php }?> value="1" name="cover_in_detail">
                        <span>封面图片显示在正文中</span>
                    </label>
                </div><!--添加封面-->

                <!--添加原文-->
                <div id="desc_area"<?php if (!empty($_smarty_tpl->tpl_vars['news']->value['desc'])){?> class="has_src"<?php }?>>
                    <div class="edit-item add_src_link">
                        <a class="e2-wxnews-addsummary addlink" href="javascript:;">添加摘要</a>
                    </div>
                    <div class="srclink-area edit-item">
                        <label for="ipt_src_link" class="i-label">摘要</label>
                        <span class="input-box">
                            <textarea id="desc" name="desc" onkeyup="wxnews.soulLink(this,'news-desc1')"><?php echo $_smarty_tpl->tpl_vars['news']->value['desc'];?>
</textarea>
                        </span>
                    </div>
                </div>

                <div id="editor-box" class="edit-item">
                    <label for="editor" class="i-label">正文</label>
                    <textarea id="editor" style="height:300px; width:100%;display:block"><?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>
</textarea>
                    <pre class="editorPre"><?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>
</pre>
                </div>

                <div id="src_link_area"<?php if (!empty($_smarty_tpl->tpl_vars['news']->value['src_link'])){?> class="has_src"<?php }?>>
                    <div class="edit-item add_src_link">
                        <a class="e2-wxnews-addSrclink addlink" href="javascript:;">添加原文链接</a>
                    </div>
                    <div class="srclink-area edit-item" id="srclink_area">
                        <label for="ipt_src_link" class="i-label">原文链接</label>
                        <span class="input-box"><input type="text" id="ipt_src_link" onkeyup="wxnews.setSrcLink(this)" name="src_link" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['src_link'];?>
"></span>
                    </div>
                </div>

            </div>
            <i class="arrow arrow_out"></i>
            <i class="arrow arrow_in"></i>
        </div>
    </div><!--编辑器区-->

    <div class="clear"></div>

    <div class="wxnews-btn">
        <a href="javascript:;" class="uiBtn BtnGreen e2-wxnews-submitAppMsg BtnLg">保&nbsp;存</a>
    </div>

</form>


<script type="text/javascript">
$.loadJs('/admin/js/upload.js',function(){//2
$.loadJs('/admin/js/edit/kindeditor.js',function(){//2
$.loadJs('/admin/js/manage/wxnews.js',function(){//2
$.loadJs('/admin/js/edit/lang/zh_CN.js',function(){//3
    com.initEdit(false);
});
});
});
});
</script>
<?php }} ?>