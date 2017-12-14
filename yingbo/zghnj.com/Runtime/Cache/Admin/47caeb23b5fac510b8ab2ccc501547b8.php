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
        
           
<div class="main-content" oncontextmenu="return false;" onselectstart="return false">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-cogs"></i>当前正在给【<?php echo ($roleinfo["role_name"]); ?>】分配权限</h3>
                    </div>
                </div>
                <form action="/index.php/Admin/Member/distribute/role_id/3.html" method="post" enctype='multipart/form-data'>
                    <input type='hidden' name='role_id' value='<?php echo ($roleinfo["role_id"]); ?>' />
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                    <?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><tr>
                            <td align="center" style="width:30%">
                                <div class="p_label" data-pid="<?php echo ($v["auth_id"]); ?>" style="float:left;line-height:25px;height:25px;font-size:14px;cursor:pointer">
                                <input class="p_radio" data-pid="<?php echo ($v["auth_id"]); ?>" style="vertical-align:middle;margin:0;padding:0" type='checkbox' name='authid[]' value='<?php echo ($v["auth_id"]); ?>'
                                <?php if(in_array(($v["auth_id"]), is_array($roleinfo["role_auth_ids"])?$roleinfo["role_auth_ids"]:explode(',',$roleinfo["role_auth_ids"]))): ?>checked='checked'<?php endif; ?>
                                />
                                 <?php echo ($v["auth_name"]); ?>
                                 </div>
                            </td>
                            <td style="text-align:left">
                                <?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><div class="sub_label sub_label_<?php echo ($v["auth_id"]); ?>" style="width:100px;float:left;line-height:25px;height:25px;font-size:14px;cursor:pointer;overflow:hidden">
                                        <input class="sub_radio sub_radio_<?php echo ($v["auth_id"]); ?>" style="vertical-align:middle;margin:0;padding:0" type='checkbox' name='authid[]' value='<?php echo ($vv["auth_id"]); ?>'
                                        <?php if(in_array(($vv["auth_id"]), is_array($roleinfo["role_auth_ids"])?$roleinfo["role_auth_ids"]:explode(',',$roleinfo["role_auth_ids"]))): ?>checked='checked'<?php endif; ?>
                                        />
                                        <?php echo ($vv["auth_name"]); ?>
                                        </div><?php endif; endforeach; endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    <tr>
                        <td colspan="2" align="center"><div>
                        <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存设置</button>
                        </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </form>
                <div class="green-black"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script type="text/javascript">
    $(function(){
        $(".p_radio").click(function(){
            var _pid = $(this).data('pid');
            var ischeck = $(this).prop('checked');
            $(".sub_radio_"+_pid).prop('checked',ischeck);
        })
        $(".p_label").click(function(){
            var _pid = $(this).data('pid');
            var ischeck = $(this).find('.p_radio').prop('checked');
            $(this).find('.p_radio').prop('checked',!ischeck);
            $(".sub_radio_"+_pid).prop('checked',!ischeck);
        })
        $(".sub_radio").click(function(){
            var _this = $(this);
            var allcheck = false;
            _this.parent().parent().find(".sub_radio").each(function(){
                if(!$(this).prop('checked')){
                    allcheck = true;
                }
            })
            _this.parent().parent().prev().find('.p_radio').prop('checked',allcheck);
        })
        $(".sub_label").click(function(){
            var _this = $(this);
            var allcheck = false;
            var ischeck = $(this).find(".sub_radio").prop('checked');
            $(this).find(".sub_radio").prop('checked',!ischeck);
            _this.parent().find(".sub_radio").each(function(){
                if($(this).prop('checked')){
                    allcheck = true;
                }
            })
            _this.parent().prev().find('.p_radio').prop('checked',allcheck);
        })
    })
</script>






















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