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
        
        


<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>

<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>添加文章</h3>
                    </div>
                </div>

                <form action="/index.php/Admin/Famous/addslander/f_id/13" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">标题 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="title" value="">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">是否展示 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_show" value="1" checked="checked">
                                <span class="lbl">是</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_show" value="0">
                                <span class="lbl">否</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">是否热点 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_tui" value="1">
                                <span class="lbl">是</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_tui" value="0" checked="checked">
                                <span class="lbl">否</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">长青论坛轮播 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_scroll" value="1">
                                <span class="lbl">是</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_scroll" value="0" checked="checked">
                                <span class="lbl">否</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group selectpic" style="display:none">
                        <label class="control-label">文章展示图 : </label>
                        <div class="controls pull-left">
                            <div id="localImag" style="height:100px;position:relative;"><img id="preview" src="<?php echo (IMG_URL); ?>qr.png"  style="max-height: 100px;width:auto!important;"><input style="position:absolute;left:0;top:0px;width:100%;height:100%;opacity:0;cursor:pointer" onchange="javascript:setImagePreview();" type="file" id="selectpic" name="sland_img"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">内容 : </label>
                        <div class="controls pull-left">
                            <span class="help-inline red">  </span>
                            <textarea rows="5" cols="30" id='content' name='content' style='width:850px;height:350px;'></textarea>
                        </div>
                    </div>


                    <script type="text/javascript">
                        var ue = UE.getEditor('content',{toolbars: [[
                      'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'pasteplain', '|', 'forecolor', 'backcolor', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'attachment', 'map', 'insertframe', 'pagebreak', '|',
            'horizontal', 'date', 'time', 'spechars', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'print', 'preview', 'searchreplace', 'drafts'
                        ]]});
                    </script>
                    <div>
                        <label class="control-label"></label>
                        <input type="hidden" name="f_id" value="<?php echo ($_GET['f_id']); ?>">
                        <button id="bsubmit" type="button"  class="btn btn-sm btn-primary">添加</button>
                    </div>
                </form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script type="text/javascript">
    $(function(){
        $("#bsubmit").click(function(){
            if($("input[name='title']").val() == ''){
                alert('文章标题不能为空');
                return false;
            }
            if($("input[name='is_scroll']:checked").val() == 1){
                if($("input[name='sland_img']").val() == ''){
                    alert('请选择展示图');
                    return false;
                }
            }
            if($("textarea[name='content']").val() == ''){
                alert('文章内容不能为空');
                return false;
            }
			$('form').submit();
           // return true;
        })
        $("input[name='is_scroll']").click(function(){
            if($(this).val() == 1){
                $(".selectpic").show();
            }else{
                $(".selectpic").hide();
            }
        })

    })
</script>
<script type="text/javascript">
    function setImagePreview(avalue) {
      var docObj=document.getElementById("selectpic");

      var imgObjPreview=document.getElementById("preview");
      if(docObj.files &&docObj.files[0])
      {
      //火狐下，直接设img属性
      imgObjPreview.style.display = 'block';
      //imgObjPreview.style.width = '100px';
      imgObjPreview.style.height = '100px';
      //imgObjPreview.src = docObj.files[0].getAsDataURL();

      //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
      imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
      }
      else
      {
      //IE下，使用滤镜
      docObj.select();
      var imgSrc = document.selection.createRange().text;
      var localImagId = document.getElementById("localImag");
      //必须设置初始大小
      //localImagId.style.width = "100%";
      localImagId.style.height = "100px";
      //图片异常的捕捉，防止用户修改后缀来伪造图片
      try{
      localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
      localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
      }
      catch(e)
      {
      alert("您上传的图片格式不正确，请重新选择!");
      return false;
      }
      imgObjPreview.style.display = 'none';
      document.selection.empty();
      }
      return true;
    }
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