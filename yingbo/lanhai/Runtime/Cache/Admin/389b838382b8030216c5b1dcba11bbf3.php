<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>蓝海长青后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">

</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>蓝海长青管理后台 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <i class="icon-user bigger-140"></i><?php echo (session('admin_name')); ?>
                    </a>
                    <!--<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">-->
                        <!--<li>-->
                            <!--<a href="">-->
                                <!--<i class="icon-edit"></i>-->
                                <!--修改密码-->
                            <!--</a>-->
                        <!--</li>-->
                    <!--</ul>-->
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
                <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] != '') AND ($v["auth_a"] != '')): ?><li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>

                            <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>">
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?></span>
                            </a>         
                        </li>
                    <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                        <li>
                            <a class="dropdown-toggle">
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if((CONTROLLER_NAME == $vv['auth_c']) AND (ACTION_NAME == $vv['auth_a'])): ?>class="active"<?php endif; ?>>
                                            <a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
                                                <i class="icon-double-angle-right"></i> <?php echo ($vv["auth_name"]); ?>
                                            </a>
                                        </li><?php endif; endforeach; endif; ?>
                            </ul>
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
            <li > <a href="/index.php/Admin/Keyword/tianjia">关键词添加 </a> </li>

        </ul>
        <!-- .breadcrumb -->
    </div>

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
    <form action="/index.php/Admin/Keywords/insert" method="post" enctype='multipart/form-data' class="form-horizontal">
	<!--
        <div class="form-group">
            <label class="control-label">标题 : </label>
            <div class="controls pull-left">
            <input type="text" class="input-large" name="title">
            <span class="help-inline red"> * </span>
            </div>
        </div>
		-->
        <div class="form-group">
            <label class="control-label">关键字 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="keyword" id = 'keyword'>
            <span class="help-inline red"> * </span>
        </div>
            </div>
		<!--
        <div class="form-group">
            <label class="control-label"> 展示图片 : </label>
            <div class="controls pull-left">
                <input type="file" class="input-large" id="pic" name="pic" >
                <div id="pic_div"><img id='pic_img' width='160' height='100'></div>
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
        <input type="text" class="input-large" name="url">
        <span class="help-inline red"> * </span>
        </div>
        </div>
       -->
        <div class="form-group">
        <label class="control-label">描述 : </label>
        <div class="controls pull-left">
        <textarea class="input-large" id="description" style="margin: 0px; height: 115px; width: 530px;" name="description"></textarea>
        </div>
        </div>
		<!--
        <div class="form-group">
        <label class="control-label">内容 : </label>
        <div class="controls pull-left">
            <textarea rows="5" cols="30" id='content' name='content' style='width:550px;height:260px;'></textarea>
        </div>
        </div>
	-->
        <div class="form-actions">
		<label class="control-label"></label>
        <input id="bsubmit" type="buttom"  class="btn btn-sm btn-primary" value="保存"/>
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
	$("#bsubmit").click(function(){
		var keyword = $("#keyword").val();
		var description = $("#description").val();
		if(keyword == ''){
			alert("请输入关键词！");
			return false;
		}

		if(description == ''){
			alert("请输入详情！");
			return false;
		}
		$.post("/index.php/Admin/Keyword/insert",'key='+keyword+"&description="+description,function(msg){
			if(msg == 1){
				alert('添加成功');
				location.href = '/index.php/Admin/Keyword/index';
			}else{
				alert('系统繁忙请稍后再试！');
			}

		})

	})

</script>

    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->


<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
    $('.active').parent().parent().addClass("active open");
</script>
<script src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script src="<?php echo (JS_URL); ?>ace.min.js"></script>
</body>
</html>