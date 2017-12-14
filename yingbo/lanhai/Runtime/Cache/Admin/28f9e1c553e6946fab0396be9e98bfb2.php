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
                                <h3><i class="icon-cogs"></i>会员资料</h3>
                            </div>
                        </div>
                        <form action="" method="post" class="form-horizontal" style="margin-left:80px">
                            <div class="form-group">
                                <label class="control-label pull-left">用户图像 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="display:inline-block;width:100px;height:100px;overflow:hidden"><img style="width:100px" src="<?php echo ($detail["userhead"]); ?>"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">用户名 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px"><?php echo ($detail["username"]); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">用户等级 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px;font-weight:bolder"><i style="color:#fab22e;font-weight:bolder;font-style:italic;font-size:1.2em">Lv </i><?php echo ($detail["level"]); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">性别 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px"><?php echo ($detail['sex']?"<p style='color:#87b6e7'>♂ 男</p>":"<p style='color:#dd0045'>♀ 女</p>"); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">生日 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px"><?php echo ($detail["birth"]); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">居住地 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px"><?php echo ($detail["address"]); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">电话 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px"><?php echo ($detail["phone"]); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">QQ : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px"><?php echo ($detail["qq"]); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label pull-left">兴趣爱好 : </label>
                                <div class="controls pull-left">
                                    <span class="input-large" style="line-height:28px"><?php echo ($detail["hobby"]); ?></span>
                                </div>
                            </div>

                            <!-- <div class="btnBox">
                                <button class="btn btn-sm btn-primary">保存</button>
                                <a href="#" class="btn btn-sm">取消</a>
                            </div> -->
                        </form>
                    </div>
                </div>
                <!--/.box-->
            </div>
       <!-- /.page-content -->
        </div><!-- /.main-content -->

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