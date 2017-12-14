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
        <div class="row indexBox">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3 class="red">
                            <i class="icon-volume-down icon-2x green"></i>
                            欢迎<i class="blue"><?php echo (session('admin_name')); ?></i>回家，现在时间：<?php echo (date('Y-m-d g:i a',time())); ?>
                        </h3>


                    </div>
                </div>

                <div class="indexTable">
                    <div class="indexTableLeft">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>最新在线咨询留言</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="90px">ID</th>
                                <th width="120px">姓名</th>
                                <th width="100px">手机号</th>
                                <th width="60px">留言时间</th>
                                <th width="100px">是否回访</th>
                            </tr></thead>
                            <tbody>


                            <?php if(is_array($adviceinfo)): foreach($adviceinfo as $key=>$v): ?><tr> <td><?php echo ($v["advice_id"]); ?></td>
                                <td><?php echo ($v["name"]); ?></td>
                                <td><?php echo ($v["iphone"]); ?></td>
                                <td><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></td>

                                <td><?php if($v["is_hui"] == 0): ?>是<?php else: ?>否<?php endif; ?></td> </tr><?php endforeach; endif; ?>


                            </tbody>
                        </table>
                    </div>
                    <div class="indexTableLeft">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>新加入会员列表</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="60px">会员ID</th>
                                <th width="60px">头像</th>
                                <th width="120px">昵称</th>
                                <th width="60px">注册时间</th>
                            </tr></thead>
                            <tbody>
							<?php if(is_array($userlist)): foreach($userlist as $key=>$info): ?><tr>
                                <td><?php echo ($info["user_id"]); ?></td>
                                <td><img src="<?php echo ($info["userhead"]); ?>" width="50px" hieght="50px"></td>
                                <td><?php echo ($info["username"]); ?></td>
                                <td><?php echo (date("Y-m-d H:i:s",$info["add_time"])); ?></td>
                            </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="indexTable">
				<div class="indexTableRight">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>最新帖子</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="60px">帖子ID</th>
                                <th width="60px">标题</th>
                                <th width="120px">发帖时间</th>
                            </tr></thead>
                            <tbody>
                            <?php if(is_array($postlist)): foreach($postlist as $key=>$postinfo): ?><tr>
                                <td><?php echo ($postinfo["post_id"]); ?></td>
                                <td><?php echo ($postinfo["topic"]); ?></td>
                                <td><?php echo (date("Y-m-d H:i:s",$postinfo["ctime"])); ?></td>
                            </tr><?php endforeach; endif; ?>
							</tbody>
                        </table>
                    </div>

                    <div class="indexTableRight">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>最新博文</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="60px">博文ID</th>
                                <th width="60px">标题</th>
                                <th width="120px">发表时间</th>
                            </tr></thead>
                            <tbody>
							<?php if(is_array($articles)): foreach($articles as $key=>$articleinfo): ?><tr>
                                <td><?php echo ($articleinfo["art_id"]); ?></td>
                                <td><?php echo ($articleinfo["title"]); ?></td>
                                <td><?php echo (date("Y-m-d H:i:s",$articleinfo["add_time"])); ?></td>
                            </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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