<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 09:59:02
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\wxmedia\appmsg\mutil_form.html" */ ?>
<?php /*%%SmartyHeaderCode:2098756d3a5e663e538-11012550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72d16786f7442a4a9cff2b7b36a6dc751d6e1b7d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\wxmedia\\appmsg\\mutil_form.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2098756d3a5e663e538-11012550',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'news_id' => 0,
    'news' => 0,
    'mutil_news_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d3a5e67002a4_93716292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d3a5e67002a4_93716292')) {function content_56d3a5e67002a4_93716292($_smarty_tpl) {?><h3 class="info-tag"><?php if (empty($_smarty_tpl->tpl_vars['news_id']->value)){?>添加多图文消息<?php }else{ ?>编辑多图文消息<?php }?><span></span></h3>

<form class="html-box" method="post" id="appmsg-form">
    <input type="hidden" id="news_id" value="<?php echo $_smarty_tpl->tpl_vars['news_id']->value;?>
" name="news_id" />
    <div class="media_preview_area">
        <div class="media-multi">
            <div class="preview-box" id="msg-board">
                <!--主图文-->
                <div id="wx-msg1" class="msg-top">
                    <div class="msg-info"><div class="msg-date"></div></div>
                    <div class="msg-cover edit-area">
                        <div class="msg-thumb-wrp">
                            <img class="msg-thumb" src="">
                            <i class="msg-thumb-default">封面图片</i>
                            <h4 class="msg-title">
                                <a href="javascript:;" target="_blank">标题</a>
                            </h4>
                        </div>
                        <div class="msg-mask">
                            <a href="javascript:;" id="initEditBtn" class="ico-edit icon18 e2-wxnews-editItem-1"><i class="iconfont">&#xe607;</i></a>
                        </div>
                    </div>
                </div><!--主图文End-->
                <!--子图文-->
            </div>

            <div class="msg-add"><!--添加信息-->
                <a href="javascript:void(0);" class="e2-wxnews-addmsg">
                    <i class="iconfont" style="font-size:20px">&#xe610;</i>
                </a>
            </div>
        </div>


    </div><!--可视图文区-->


    <div class="media_edit_area" id="edit_area">
        <div class="msg-editor">
            <div class="inner" style="width:452px">
                <div class="edit-item">
                    <label for="msg_title" class="i-label">标题</label>
                    <span class="input-box">
                        <input type="text" id="msg_title" onkeyup="wxnews.setTitle(this)">
                    </span>
                </div>


                <div class="edit-item">
                    <label class="i-label">封面<p class="i-tip">大图片建议尺寸：360像素 * 200像素</p>
                    </label>
                    <div class="input-box xfile">
                        <a href="javascript:;" class="uiBtn BtnOrange e2-wxnews-selImage">选择图片</a>
                        <input type="hidden" name="cover[]" id="wx_cover_1" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['cover'];?>
">
                        <p class="upimg-preview" id="up_thumb">
                            <img src="">
                            <a class="e2-wxnews-rmImg" href="javascript:;">删除</a>
                        </p>
                    </div>
                    <label for="cover_in_detail" class="show-indetail">
                        <input type="checkbox" id="cover_in_detail" value="1" name="cover_in_detail" onclick="wxnews.setCoverInDetail(this)">
                        <span>封面图片显示在正文中</span>
                    </label>
                </div><!--添加封面-->

                <div id="editor-box" class="edit-item">
                    <label for="editor" class="i-label">正文</label>
                    <textarea id="editor" style="height:300px; width:100%;display:block"></textarea>
                    <pre class="editorPre"></pre>
                </div>

                <div id="src_link_area">
                    <div class="edit-item add_src_link">
                        <a class="e2-wxnews-addSrclink addlink" href="javascript:;">添加原文链接</a>
                    </div>
                    <div class="srclink-area edit-item" id="srclink_area">
                        <label for="ipt_src_link" class="i-label">原文链接</label>
                        <span class="input-box"><input type="text" id="ipt_src_link" onkeyup="wxnews.setSrcLink(this)" name="src_link" value=""></span>
                    </div>
                </div>

            </div>
            <i class="arrow arrow_out"></i>
            <i class="arrow arrow_in"></i>
        </div>
    </div><!--编辑器区-->

    <div class="clear"></div>

    <div class="wxnews-btn">
        <a href="javascript:;" class="uiBtn BtnGreen e2-wxnews-submitMultiNews BtnLg">保&nbsp;存</a>
    </div>

</form>

<script type="text/javascript">
var mutil_news_data = <?php echo $_smarty_tpl->tpl_vars['mutil_news_data']->value;?>
;
$.loadJs('/admin/js/upload.js',function(){
$.loadJs('/admin/js/edit/kindeditor.js',function(){
$.loadJs('/admin/js/manage/wxnews.js',function(){
$.loadJs('/admin/js/edit/lang/zh_CN.js',function(){
    com.initEdit(false);
    wxnews.initMutilNews(mutil_news_data);
});
});
});
});
</script><?php }} ?>