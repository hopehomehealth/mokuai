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
        
        <div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
              <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>添加人物</h3>
                    </div>
                </div>
<form action="/index.php/Admin/Famous/adduser.html" method="post" class="form-horizontal" enctype="multipart/form-data">
    
    <div class="form-group">
        <label class="control-label">人物类型 : </label>
        <div class="controls pull-left">
            <select class="input-medium" name="f_type">
                    <option value='0'>--无--</option>
                    <option value='1'>名家讲坛</option>
                    <option value='2'>蓝海人物</option>
            </select>
            <span class="help-inline red"> * </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">姓名 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="f_name">
            <span class="help-inline red"> * </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">省份 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="f_province">
            <span class="help-inline red"> * </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">人物图像 : </label>
        <div class="controls pull-left">
            <div id="localImag" style="position:relative;padding-top:10px"><img id="preview" src="<?php echo (IMG_URL); ?>qr.png"  style="max-height: 100px;"><input style="position:absolute;left:0;top:10px;width:100px;height:100px;opacity:0;cursor:pointer" onchange="javascript:setImagePreview();" type="file" id="selectpic" name="f_photo">
            </div>
        </div>
        <span class="help-inline red" style="display:inline-block;margin-top:10px;"> (点击图像进行上传) </span>
    </div>
    <div class="form-group">
            <label class="control-label">人物简介 : </label>
            <div class="controls pull-left">
                <textarea class="input-large" style="margin: 0px; height: 115px; width: 530px;" name="f_desc"></textarea>
            </div>
        </div>
    <div>
        <label class="control-label"></label>
        <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">添加</button>
    </div>
</form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
    function setImagePreview(avalue) {
      var docObj=document.getElementById("selectpic");
       
      var imgObjPreview=document.getElementById("preview");
      if(docObj.files &&docObj.files[0])
      {
      //火狐下，直接设img属性
      imgObjPreview.style.display = 'block';
      imgObjPreview.style.width = '100px';
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
      localImagId.style.width = "100px";
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
    $("#bsubmit").click(function(){
        if($("select[name='f_type']").val() == 0){
            alert('请选择人物类型');
            return false;
        }
        if($("input[name='f_name']").val() == ''){
            alert('请输入人物姓名');
            return false;
        }
        if($("input[name='f_province']").val() == ''){
            alert('请输入人物省份');
            return false;
        }
        if($("textarea[name='f_desc']").val() == ''){
            alert('请输入人物简介');
            return false;
        }
        if($("input[name='f_photo']").val() == ''){
            alert('请上传人物图像');
            return false;
        }
        return true;
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