<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>中国缓粘结网管理后台</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">
    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
    <style>
    .shuaixuanbtn{border-radius: 0!important;color: #858585;background-color: #fff;border: 1px solid #d5d5d5;padding: 5px 4px;line-height: 1.2;font-size: 14px;height:33px;font-family: inherit;-webkit-box-shadow: none!important;box-shadow: none!important;display:block;float:left;}
    </style>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>中国缓粘结网管理后台 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <i class="icon-user bigger-140"></i><?php echo ((isset($_SESSION['member']['info']['username']) && ($_SESSION['member']['info']['username'] !== ""))?($_SESSION['member']['info']['username']):"未登录"); ?>
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
                    <a href="<?php echo U('Member/logout');?>" target="_top"
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
                                <i class="icon-folder-close"></i>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?></span>
                            </a>
                        </li>
                    <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                        <li>
                            <a class="dropdown-toggle">
                                <i class="icon-folder-close"></i>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if(CONTROLLER_NAME == $vv['auth_c']): if(ACTION_NAME == $vv['auth_a']): ?>class="subli active"<?php else: ?>class="subli"<?php endif; endif; ?>>
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
                        <h3><i class="icon-magic"></i>管理员列表</h3>
                        <div class="pull-right"><a class="btn btn-success btn-sm" href="/index.php/Admin/Member/tianjia">添加管理员</a></div>
                    </div>
                </div>

                <form class="form-horizontal"  action="/index.php/Admin/Member/members" method="post">
                    <div class="form-group">
                        <div>
                            <span class="shuaixuanbtn" style="line-height:1.5;color:block;font-weight:bold;border:none">名称 : </span>
                            <input type="text" class="shuaixuanbtn" placeholder="" value="" name="search">
                            <input type="submit" class="shuaixuanbtn" value="搜索">
                        </div>
                    </div>
                </form>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr><th width="5px"><div align="center">id</div></th>
                        <th width="35px"><div align="center">名称</div></th>
                        <th width="75px"><div align="center">密码</div></th>
                        <th width="35px"><div align="center">角色</div></th>
                        <th width="35px"><div align="center">手机号</div></th>
                        <th width="60px"><div align="center">添加时间</div></th>
                        <th width="60px"><div align="center">操作</div></th>
                    </tr></thead>
                    <tbody>
                    <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
                            <td><div align="center"><?php echo ($v["uid"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["username"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["password"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["role_name"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["phone"]); ?></div></td>

                            <td><div align="center"><?php echo (date('Y-m-d H:i:s',$v["ctime"])); ?></div></td>
                            <td> <div align="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <!--<a href="customize_menus_add.html"> <i class="icon-pencil bigger-130"></i>&nbsp;添加 </a>-->
                                    <a class="green" href="<?php echo U('upd',array('uid'=>$v['uid']));?>"> <i class="icon-pencil bigger-130"></i>&nbsp;编辑 </a>
                                    <a class="red detail" href="<?php echo U('del',array('uid'=>$v['uid']));?>"> <i class="icon-trash bigger-130"></i>&nbsp;删除 </a>
                                </div>
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
    $('.subli').parent().parent().addClass("active open");
</script>
<script src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script src="<?php echo (JS_URL); ?>ace.min.js"></script>
</body>
</html>