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
                        <h3><i class="icon-magic"></i>编辑版块</h3>
                    </div>
              </div>
<form action="/index.php/Admin/Boards/upd/board_id/4" method="post" class="form-horizontal" enctype="multipart/form-data">
    <!--<div class="form-group">
        <label class="control-label">斑竹 : </label>
        <div class="controls pull-left">
            <select class="input-medium" name="master_id">
                    <option value='0'>-请选择-</option>
                    <?php if(is_array($classList)): foreach($classList as $key=>$v): if($info["pid"] == 0): ?><option value='<?php echo ($v["cat_id"]); ?>'><?php echo ($v["name"]); ?></option><?php endif; endforeach; endif; ?>
            </select>
            <span class="help-inline red"> * </span>
        </div>
    </div>   -->
    <div class="form-group">
        <label class="control-label">父级板块 : </label>
        <div class="controls pull-left">
            <select class="input-medium" name="pid" <?php if($nowboard['pid'] == 0): ?>disabled="disabled"<?php else: endif; ?>>
                    <?php if($nowboard["pid"] == 0): ?><option value='0'>--无--</option><?php else: endif; ?>
                    <?php if(is_array($boards)): foreach($boards as $key=>$bd): if($bd["pid"] == 0): if($bd["board_id"] == $nowboard['pid']): ?><option style="color:black;font-weight:bold" value='<?php echo ($bd["board_id"]); ?>' selected="selected"><?php echo ($bd["board_title"]); ?></option>
                            <?php else: ?>
                              <option style="color:black;font-weight:bold" value='<?php echo ($bd["board_id"]); ?>'><?php echo ($bd["board_title"]); ?></option><?php endif; ?>
                        <?php else: ?>
                            <option value='<?php echo ($bd["board_id"]); ?>' disabled="disabled"><?php echo ($bd["board_title"]); ?></option><?php endif; endforeach; endif; ?>
            </select>
            <span class="help-inline red"> * </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">板块名 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="board_title" value="<?php echo ($nowboard["board_title"]); ?>">
            <span class="help-inline red"> * </span>
        </div>
    </div>
    <!--<div class="form-group">
        <label class="control-label">板块描述 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="board_desc" value="<?php echo ($nowboard["board_desc"]); ?>">
            <span class="help-inline red"> * </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">板块公告 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-medium" name="board_msg">
            <span class="help-inline red"> * </span>
        </div>
    </div>-->
    <div class="form-group">
        <label class="control-label">板块图标 : </label>
        <div class="controls pull-left">
            <!-- <a style="height:28px;width:150px;line-height:28px;background:#428bca;color:white;padding:8px 8px 8px 8px;border-radius:6px;position:relative;text-decoration:none">
              <input style="position:absolute;left:0;top:2px;width:100%;height:28px;line-height:28px;opacity:0;cursor:pointer" onchange="javascript:setImagePreview();" type="file" id="selectpic" name="board_img">
              上传图片</a> -->
            <div id="localImag" style="height:100px;position:relative;"><?php if($nowboard["board_img"] == ''): ?><img id="preview" src="<?php echo (IMG_URL); ?>qr.png" style="max-height: 100px;"><?php else: ?><img id="preview" src="<?php echo ($nowboard["board_img"]); ?>" style="max-height: 100px;"><?php endif; ?><input style="position:absolute;left:0;top:0;width:100%;height:100%;opacity:0;cursor:pointer" onchange="javascript:setImagePreview();" type="file" id="selectpic" name="board_img"></div><span class="help-inline red"> 主板块可忽略 </span>
        </div>
    </div>
    <div>
        <label class="control-label"></label>
        <input type="hidden" name="board_id" value=<?php echo ($_GET['board_id']); ?>>
        <input type="hidden" name="oldimg" value="<?php echo ($nowboard["board_img"]); ?>">
        <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
    </div>
</form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
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