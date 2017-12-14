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
        
               <style type="text/css">
    .technorati li{float:left;}
</style>
       <div class="main-content">
          <div class="page-content">
            <div class="row">
              <div class="page-content box">
              	<div class="box-title margin_bot_20">
                  	<div class="span10">
                   		<h3><i class="icon-cogs"></i>会员列表 </h3>
                  	</div>
                </div>
                <form class="form-horizontal" method="get" action="/index.php/Admin/User/showlist">
                  <div class="form-group">
                    <label class="control-label" style="width:auto;line-height:28px;padding-top:0">会员名： </label>
                    <div class="controls pull-left">
                      <input type="text" class="input-medium" name="search" value="<?php echo ($_GET['serach']); ?>" placeholder="">
                      <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                    </div>
                  </div>
                </form>

                <div class="tableHead">
                    <table class="table table_img table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">会员编号</th>
                                <th style="width:5%;">头像</th>
                                <th style="width:5%;">用户名</th>
                               <!--  <th style="width:5%;">昵称</th> -->
                                <th style="width:5%;">积分</th>
                                <th style="width:5%;">等级</th>
                                <!-- <th style="width:5%;">佣金</th>
                                <th style="width:5%;">可提现</th>
                                <th style="width:5%;">积分</th> -->
                                <!--<th style="width:5%;">状态</th>-->
                                <th style="width:5%;">注册时间</th>
                                <th style="width:5%;">城市</th>
                                <th style="width:5%;">操作</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div id="table_hy">
                    <?php if(is_array($userList)): foreach($userList as $key=>$userinfo): ?><table class="table table_img table-striped table-bordered  table-hover">
                        <tr>
                            <td style="width:5%;"><?php echo ($No1++); ?></td>
                            <td style="width:5%;">
                                <img src="<?php echo ($userinfo["userhead"]); ?>" width="50px" hieght="50px">
                                <!-- <br /><a href="#" class="green" onclick="javascript:img('<?php echo (str_replace('.png','',$userinfo['qrcode'])); ?>')" width="50px" hieght="50px')">[查看二维码]</a> -->
                            </td>
                            <td style="width:5%;"><?php echo ($userinfo["username"]); ?></td>
                            <!-- <td style="width:5%;"><?php echo ($userinfo["nikename"]); ?></td> -->
                            <td style="width:5%;"><?php echo ($userinfo['score1']); ?></td>
                            <td style="width:5%;"><p style="color:#ff6600;font-weight:bold;font-style:italic"><?php echo ($userinfo['level']); ?></p></td>
                            <!-- <td>0</td>
                            <td>0</td>
                            <td>1</td> -->
                            <!--<td style="width:5%;"><?php echo ($userinfo['status']?"<p style='color:green;font-weight:bold;'>在线</p>":"<p style='color:#999;font-weight:bold;'>离开</p>"); ?></td>-->
                            <td style="width:5%;"><?php echo (date('Y-m-d H:i',$userinfo["add_time"])); ?></td>
                            <td style="width:5%;"><?php echo ($userinfo['city']); ?></td>
                            <td style="width:5%;"><a class="green" href="/index.php/Admin/User/userdetail/user_id/<?php echo ($userinfo['user_id']); ?>">查看</a></td>
                        </tr>

                    </table><?php endforeach; endif; ?>
                </div>

                <div class="technorati"><?php echo ($page); ?><div/>
              </div>
            </div>
            <!--/.box-->
          </div><!-- /.page-content -->
        </div><!-- /.main-content -->
        <script type="text/javascript">
            function img(message){
              var img = ['<div class="modal fade" id="img" style="overflow: visible;">',
                                    '<div class="modal-dialog modal-sm">',
                                      '<div class="modal-content">',
                                        '<div class="modal-header border_bot detail_header border" style="padding:0">',
                                    '<h4 class="modal-title" id="mySmallModalLabel">',
                                    '<img src="'+message+'.png">',
                                '</h4>',
                                '</div>',
                                /*'<div class="modal-body detail_sm">',
                                    '<button type="button" class="btn btn-sm btn-default"  id="cancel_img">取消</button>',
                                        '<button type="button" class="btn btn-sm btn-primary">确定</button>',
                                '</div>',*/
                                      '</div>',
                                    '</div>',
                                '</div>'].join('\n');
              $("body").append(img);
              $('#img').modal()
              $(".modal-backdrop").live("click",function(){
                alert(1)
                $('#img,.modal-backdrop').removeClass("in");
                setTimeout(function(){
                  $(".modal-backdrop,#img").remove();
                  },100);
              })
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