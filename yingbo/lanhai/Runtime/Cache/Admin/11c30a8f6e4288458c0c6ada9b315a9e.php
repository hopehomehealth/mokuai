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
                   		<h3><i class="icon-cogs"></i>论坛设置中心</h3>
                  	</div>
                </div>
                <form class="form-horizontal" method="get" action="/index.php/Admin/Bbs/base">

                </form>
                <div class="breadcrumbs">
                    <ul>
                        <li class="active"> <a href="/index.php/Admin/Bbs/base">基本设置 </a> </li>
                        <li> <a href="/index.php/Admin/Score/showlist">积分规则 </a> </li>
                        <li> <a href="/index.php/Admin/Rank/showlist">自定义等级 </a> </li>
                    </ul>
                    <!-- .breadcrumb -->
                </div>
                <form action="/index.php/Admin/Bbs/base" method="post" class="form-horizontal" enctype="multipart/form-data" style="padding:10px 10px;">
				  <div class="form-group">
                      <label class="control-label" style="width:160px;">发帖周期: </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="poster_cycle" value="<?php echo ($bbsset["poster_cycle"]); ?>">
                          <span class="help-inline red"> *(单位：分钟) </span>
                      </div>
                  </div>
				  <div class="form-group">
                      <label class="control-label" style="width:160px;">回帖周期: </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="reply_cycle" value="<?php echo ($bbsset["reply_cycle"]); ?>">
                          <span class="help-inline red"> *(单位：分钟) </span>
                      </div>
                  </div>
				  <div class="form-group">
                      <label class="control-label" style="width:160px;">评论周期: </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="com_cycle" value="<?php echo ($bbsset["com_cycle"]); ?>">
                          <span class="help-inline red"> *(单位：分钟) </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label" style="width:160px;">后台分页显示数量: </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="pg_admin" value="<?php echo ($bbsset["pg_admin"]); ?>">
                          <span class="help-inline red"> * </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label" style="width:160px;">前台帖子分页显示数量 : </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="pg_posts" value="<?php echo ($bbsset["pg_posts"]); ?>">
                          <span class="help-inline red"> * </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label" style="width:160px;">前台回帖分页显示数量 : </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="pg_reply" value="<?php echo ($bbsset["pg_reply"]); ?>">
                          <span class="help-inline red"> * </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label" style="width:160px;">前台评论分页显示数量 : </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="pg_comm" value="<?php echo ($bbsset["pg_comm"]); ?>">
                          <span class="help-inline red"> * </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label" style="width:160px;">个人中心分页显示数量 : </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="pg_ucenter" value="<?php echo ($bbsset["pg_ucenter"]); ?>">
                          <span class="help-inline red"> * </span>
                      </div>
                  </div>
                  <!-- <div class="form-group">
                      <label class="control-label">版块默认图标 : </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-large" name="board_desc">
                          <span class="help-inline red"> * </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">用户默认图像 : </label>
                      <div class="controls pull-left">
                          <input type="text" class="input-medium" name="board_msg">
                          <span class="help-inline red"> * </span>
                      </div>
                  </div> -->
                  <div>
                      <label class="control-label" style="width:160px;></label>
                      <input type="hidden" name="id" value="<?php echo ($bbsset["id"]); ?>">
                      <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存设置</button>
                  </div>
                </form>
              </div>
            </div>
            <!--/.box-->
          </div><!-- /.page-content -->
        </div><!-- /.main-content -->
        <script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
        <script type="text/javascript">

            $(function(){
                $(".breadcrumbs .filterorder").click(function(){
                    $(this).addClass("active").siblings().removeClass('active');
                    var filter = $(this).attr("filter");
                    ajax_page("/index.php/Admin/Order/filterorder",filter);
                    $(".technorati").on('click','a',function(){
                      //alert(111);
                        var url = $(this).attr("href");
                        ajax_page(url);
                        return false;  //让a标签不能跳转
                    })
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