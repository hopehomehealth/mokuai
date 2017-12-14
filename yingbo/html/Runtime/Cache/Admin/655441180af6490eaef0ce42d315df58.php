<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>乐护后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>page.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>hzw-city-picker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>jedate.css">

    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>city-data.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>calendar.js"></script>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>乐护后台管理系统 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a href="#">
                        <i class="icon-user bigger-140"></i><?php echo (session('admin_name')); ?>
                    </a>
                </li>
                <li >
                    <a href="<?php echo U('Manager/logout');?>" target="_top"
                    onclick="if(confirm('确认要退出系统么？')==false){return false;}">
                        <i class="icon-off bigger-130"></i>退出
                    </a>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.navbar-container-->
</div><!-- /.navbar-->
<div class="main-container">
    <div class="main-container-inner">
<div class="sidebar" id="sidebar">
    <ul class="nav nav-list">
        <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] == '') AND ($v["auth_a"] == '')): ?><li <?php if((CONTROLLER_NAME == '') AND (ACTION_NAME == '')): ?>class="open"<?php endif; ?>>
                <a class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if((CONTROLLER_NAME == $vv['auth_c']) AND (ACTION_NAME == $vv['auth_a'])): ?>class="active open"<?php endif; ?>>
                            <a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
                                <i class="icon-double-angle-right"></i> <?php echo ($vv["auth_name"]); ?>
                            </a>
                            </li><?php endif; endforeach; endif; ?>
                </ul>
                </li>
                <?php elseif(($v["auth_a"] != '') AND ($v["auth_c"] != '')): ?>


                <li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>
                <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>" class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                </a>
                </li><?php endif; endforeach; endif; ?>
    </ul>
    <!-- /.nav-list -->
    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>



        <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='<?php echo (JS_URL); ?>uploadPreview.js'></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>
<div class="main-content">
    <div class="breadcrumbs">
        <ul>
            <li > <a href="/index.php/Admin/News/tianjia">文章修改 </a> </li>

        </ul>
        <!-- .breadcrumb -->
    </div>

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <form action="/index.php/Admin/News/upd/news_id/1.html" method="post" enctype='multipart/form-data' class="form-horizontal">
                    <input type='hidden' name='news_id' value='<?php echo ($info["news_id"]); ?>' />
                    <div class="form-group">
                        <label class="control-label">标题 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="title" value="<?php echo ($info["title"]); ?>">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">关键字 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="keyword" value="<?php echo ($info["keyword"]); ?>">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">状态 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_show" checked="checked" value="0">
                                <span class="lbl">显示</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_show" value="1">
                                <span class="lbl">隐藏</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> 图片 : </label>
                        <div class="controls pull-left">
                            <input type="file" class="input-large" id="pic" name="pic" >
                            <div id="pic_div"><img src='<?php echo (SITE_URL); echo (substr($info["pic"],2)); ?>' alt='没有图片' id='pic_img' width='160' height='100'></div>
                        </div>
                    </div>
                    <script type='text/javascript'>
                        $(function(){
                            new uploadPreview({ UpBtn: "pic", DivShow: "pic_div", ImgShow: "pic_img" });
                        });
                    </script>
                    <div class="form-group">
                        <label class="control-label">URL地址: </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="url" value="<?php echo ($info["url"]); ?>">
                       <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">描述 : </label>
                        <div class="controls pull-left">
                            <textarea class="input-large" style="margin: 0px; height: 115px; width: 530px;" name="description" ><?php echo ($info["description"]); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">内容 : </label>
                        <div class="controls pull-left">
                            <textarea rows="5" cols="30" id='content' name='content' style='width:550px;height:260px;'><?php echo ($info["content"]); ?></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input id="bsubmit" type="submit"  class="btn btn-sm btn-primary" value="保存"/>
                    </div>
                </form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->


<script type="text/javascript">
    var ue = UE.getEditor('content',{toolbars: [[
        'fullscreen', 'source', '|', 'undo', 'redo', '|',
        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
        'directionalityltr', 'directionalityrtl', 'indent', '|',
        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
        'simpleupload', 'insertimage'
    ]]});
</script>

    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>pulic.js"></script>
</body>
</html>