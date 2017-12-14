<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>新农缘天下后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">
    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>新农缘天下后台 </small>
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
                    <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] != '')): ?>
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
                        <h3><i class="icon-cogs"></i>权限列表</h3>
                         <div class="pull-right"><a class="btn btn-success btn-sm" href="/index.php/Admin/Auth/tianjia">添加权限</a></div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr><th width="30px" ><div align="center">权限ID</div></th>
                        <th width="100px"><div align="center">权限名</div></th>
                        <th width="30px"><div align="center">左侧栏<br/>排序</div></th>
                        <th width="30px"><div align="center">父级id</div></th>
                        <th width="100px"><div align="center">控制器</div></th>
                        <th width="100px"><div align="center">操作方法</div></th>
                        <th width="100px"><div align="center">全路径</div></th>
                        <th width="20px"><div align="center">等级</div></th>
                         <th width="100px"><div align="center">操作</div></th>
                    </tr></thead>
                    <tbody>
                    <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
                            <td><div align="center"><?php echo ($v["auth_id"]); ?></div></td>
                            <td><div align="left"><?php if(($v["auth_level"]) == "0"): echo ($v["auth_name"]); else: ?><i class="board"></i><?php echo ($v["auth_name"]); endif; ?></div></td>
                            <td><div align="center"><?php echo ($v["auth_sort"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["auth_pid"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["auth_c"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["auth_a"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["auth_path"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["auth_level"]); ?></div></td>
                   <td>
                                <div  align="center" class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="<?php echo U('upd',array('auth_id'=>$v['auth_id']));?>"> <i class="icon-pencil bigger-130"></i>&nbsp;编辑 </a>
                                    <a class="red detail" href="<?php echo U('del',array('auth_id'=>$v['auth_id']));?>"> <i class="icon-trash bigger-130"></i>&nbsp;删除 </a>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                         							<style type="text/css">
    .technorati li{float:left;}
</style>
                <div class="technorati"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
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