<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:05:53
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/wxmenu/index.html" */ ?>
<?php /*%%SmartyHeaderCode:206150755358451fe1b4d235-75755939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36bfb39a7ff3212cd65ae171026a1528d1e46ba5' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/wxmenu/index.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206150755358451fe1b4d235-75755939',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menusjson' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451fe1bc2744_30052653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451fe1bc2744_30052653')) {function content_58451fe1bc2744_30052653($_smarty_tpl) {?><h3 class="info-tag">微信菜单设置<span></span></h3>


<style type="text/css">
</style>

<div class="html-box">

    <!--添加新闻-->
    <div class="wxmenu-note">可创建最多 3 个一级菜单，每个一级菜单下可创建最多 5 个二级菜单。编辑中的菜单不会马上被用户看到，请放心调试。</div>
    <form method="post" action="#!params/submit" class="menu-form">

        <div class="wx-menu-tag clear">
            <div class="wx-basebtn mode-normal">
                <span>菜单管理</span>
                <a href="javascript:;" class="normal-btn uiBtn BtnGreen e2-wxmenu-add-0">添加</a>
                <a href="javascript:;" class="normal-btn uiBtn e2-wxmenu-moveMode">排序</a>
                <a href="javascript:;" class="move-btn uiBtn BtnGreen e2-wxmenu-moveMode">完成</a>
                <a href="javascript:;" class="move-btn uiBtn e2-wxmenu-moveMode">取消</a>
            </div>
            <div class="wx-right-tag"></div>
        </div><!--Tag End-->

        <div class="wx-menu-box">
            <div id="menu-box"></div>

            <div id="wxmenu-area">

                <div class="wxtype-event" style="display:none">
                    <div class="wxmsg-types clear">
                        <a href="javascript:;" class="type-btn on">
                            <i class="iconfont">&#xz3497;</i>
                            <span>文本</span>
                        </a>
                        <a href="javascript:;" class="type-btn e2-wxmenu-setImage">
                            <i class="iconfont">&#xe611;</i>
                            <span>图片</span>
                        </a>
                        <a href="javascript:;" class="type-btn">
                            <i class="iconfont">&#xe604;</i>
                            <span>图文</span>
                        </a>
                    </div>
                    <div class="wxmsg-editor" contenteditable="true">
                    </div>
                    <div class="msg-em">
                        <a href="javascript:;" class="e2-wxmenu-showEmBox"><i class="iconfont">&#xe602;</i></a>
                        <div class="wxems clear" id="wxem-box">
                            <div class="em-list" id="em-list"></div>
                        </div>
                        <div class="wxmsg-word">还可输入<span>600</span>字</div>
                    </div>

                    <div class="f-unit">
                        <a href="javascript:;" class="uiBtn">返回</a>
                        <a href="javascript:;" class="uiBtn BtnGreen">确定</a>
                    </div>
                </div>


                <div class="wxtype-view" style="display:none">
                    <div class="f-unit">
                        <label class="ui-label s14">订阅者点击该子菜单会跳到以下链接</label>
                        <div class="clear"></div>
                        <input class="form-i w360">
                    </div>
                    <div class="f-unit">
                        <a href="javascript:;" class="uiBtn">返回</a>
                        <a href="javascript:;" class="uiBtn BtnGreen">确定</a>
                    </div>
                </div>


                <div class="wx-types" style="display:none">
                    <div class="wx-sel-tip">
                        请选择订阅者点击菜单后，公众号做出的相应动作
                    </div>
                    <div class="wx-sel clear">
                        <a href="" class="e0-wxmenu-selMsgType">
                            <i class="iconfont">&#xf0018;</i>
                            <span>发送消息</span>
                        </a>
                        <a href="" class="e0-wxmenu-selMsgType">
                            <i class="iconfont">&#xf00b9;</i>
                            <span>跳转网页</span>
                        </a>
                    </div>
                </div>

                <div class="wx-init-word">你可以先添加一个菜单，然后开始为其设置响应动作</div>
            </div>
        </div>
        <div class="clear"></div>
    </form>
    <div class="clear"></div>
    <div style=" text-align: center; padding-top: 15px; width: 725px;"><a href="javascript:;" class="uiBtn BtnGreen e2-wxmenu-postMenu">提交自定义菜单</a></div>
    <div style="height:80px"></div>
</div>

<script type="text/javascript">
var menus = <?php echo $_smarty_tpl->tpl_vars['menusjson']->value;?>
;
$.loadJs('/admin/js/manage/wxmenu.js',function(){
$.loadJs('/admin/js/upload.js',function(){
    wxmenu.menuTree = menus;
    wxmenu.stuffMenu();
});
});
</script><?php }} ?>