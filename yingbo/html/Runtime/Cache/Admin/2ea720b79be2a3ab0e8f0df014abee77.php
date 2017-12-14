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


    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>city-data.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>jedate.js"></script>
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
        <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] != '') AND ($v["auth_a"] != '')): ?><li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>
                <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                </a>
                </li>



                <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                <li>
                <a class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
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



        
        <div class="main-content"><!-- InstanceBeginEditable name="内容" -->
            <div class="page-content">
                <div class="row">
                    <div class="page-content box">
                        <div class="box-title margin_bot_20">
                            <div class="span10">
                                <h3><i class="icon-magic"></i>自定义菜单</h3>
                            </div>
                        </div>
                        <form action="/index.php/admin/menu/upd/id/37.html" method="post" enctype='multipart/form-data' class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label">菜单名称 : </label>
                                <div class="controls pull-left">
                                    <input type="text" class="input-medium" value="<?php echo ($info["title"]); ?>" name="title">
                                    <span class="help-inline red"> * </span>
                                </div>
                            </div>
							<input name="c_id" value="<?php echo ($info["id"]); ?>" type="hidden">
							<?php if($info["pid"] != 0): ?><div class="form-group">
                                <label class="control-label">父级菜单 : </label>
                                <div class="controls pull-left">
                                    <select name="pid" id="pid">
										<option selected="selected" value="0">请选择菜单</option>
										<?php if(is_array($list)): foreach($list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>
									</select>
                                    <span class="help-inline red"> * </span>
                                </div>
                            </div><?php endif; ?>

							
                            <div class="form-group">
                                <label class="control-label">关键字 : </label>
                                <div class="controls pull-left">
                                    <input type="text" class="input-large" value="<?php echo ($info["keyword"]); ?>" name="keyword">
                                    <span class="help-inline red"> * </span>  </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">排序 : </label>
                                <div class="controls pull-left">
                                    <input type="text" class="input-mini" value="<?php echo ($info["sort"]); ?>" name="sort">
                                    <span class="help-inline red"> * </span>  </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">菜单Url : </label>
                                <div class="controls pull-left">
                                    <input type="text" class="input-large" value="<?php echo ($info["url"]); ?>" name="url">
                                    <span class="help-inline red"> * 注：url必须以http://或https:// 例如：http://www.hlnv.com </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">是否显示 : </label>
                                <div class="controls pull-left">
                                    <label>
                                        <input type="radio" class="ace" name="is_show" value='0' <?php if($info["is_show"] == 0): ?>checked="checked"<?php endif; ?>>
                                        <span class="lbl">是</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="ace" name="is_show" value='1' <?php if($info["is_show"] == 1): ?>checked="checked"<?php endif; ?>>
                                        <span class="lbl">否</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.box-->
            </div>
            <!-- /.page-content -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->

    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript">
        $('.active').parent().parent().addClass("active open");
</script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>pulic.js"></script>
</body>
</html>