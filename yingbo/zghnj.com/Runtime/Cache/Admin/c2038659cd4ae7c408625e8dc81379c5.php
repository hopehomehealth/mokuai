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
        
        <style>
    .shuaixuanbtn{border-radius: 0!important;color: #858585;background-color: #fff;border: 1px solid #d5d5d5;padding: 5px 4px;line-height: 1.2;font-size: 14px;height:33px;font-family: inherit;-webkit-box-shadow: none!important;box-shadow: none!important;display:block;float:left;}
    .danhang{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
</style>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-user"></i>会员管理</h3>  
                    </div>
                </div>
                <div>
                    <form action="/index.php/Admin/User/showlist" method="get">
                        <!--查询-->
                        <div>
                            <div>
                                <span class="shuaixuanbtn" style="line-height:1.5;color:block;font-weight:bold;border:none">查询：</span>
                                <input type="text" class="shuaixuanbtn" placeholder="会员名/手机号" value="" name="keywords">
                                <input type="submit" class="shuaixuanbtn" value="搜索">
                            </div>
                        </div>
                    </form>
                </div>
                <div style="margin-top:20px;float:left">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr><th width="30px" >userid</th>
                        <th width="50px">图像</th>
                        <th width="5%">用户名</th>
                        <th width="5%">密码</th>
                        <th width="5%">姓名</th>
						<th width="5%">电话</th>
                        <th width="5%">性别</th>
                        <th width="5%">地址</th>
                        <th width="5%">注册时间</th>
                    </tr></thead>
                    <tbody>
                    <?php if(is_array($userlist)): foreach($userlist as $k=>$v): ?><tr>
                            <td><?php echo ($v["userid"]); ?></td>
                            <td align="center"><span style="height:50px;width:50px;overflow:hidden"><img style="width:50px" src="<?php echo ($v["userhead"]); ?>" />
                                </span></td>
                            <td title="<?php echo ($v["username"]); ?>" class="danhang"><?php echo ($v["username"]); ?></td>
                            <td title="<?php echo ($v["password"]); ?>" class="danhang"><?php echo ($v["password"]); ?></td>
                            <td title="<?php echo ($v["name"]); ?>" class="danhang"><?php echo ($v["name"]); ?></td>
                            <td title="<?php echo ($v["phone"]); ?>" class="danhang"><?php echo ($v["phone"]); ?></td>
                            <td><?php if($v["sex"] == 1): ?><b class="green">男</b><?php else: ?><b class="red">女</b><?php endif; ?></td>
							<!-- <td><?php if($v["is_merch"] == 1): ?><b class="green">是</b><?php else: ?><b class="red">否</b><?php endif; ?></td> -->
                            <td title="<?php echo ($v["address"]); ?>" class="danhang"><?php echo ($v["address"]); ?></td>
                            <td title="<?php echo (date('Y-m-d H:i:s',$v["ctime"])); ?>" class="danhang"><?php echo (date('Y-m-d H:i:s',$v["ctime"])); ?></td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                </div>
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