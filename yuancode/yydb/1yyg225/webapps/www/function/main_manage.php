<?php #后台公共函数库

/**
 * 获得所有模块的名称以及链接地址
 * @access      public
 * @param       string      $directory      插件存放的目录
 * @return      array
 */
function read_modules($directory = '.')
{
    global $_LANG;

    $dir         = @opendir($directory);
    $set_modules = true;
    $modules     = array();

    while (false !== ($file = @readdir($dir)))
    {
        if (preg_match("/^.*?\.php$/", $file))
        {
            include_once($directory. '/' .$file);
        }
    }
    @closedir($dir);
    unset($set_modules);

    foreach ($modules AS $key => $value)
    {
        ksort($modules[$key]);
    }
    ksort($modules);

    return $modules;
}

/*头像*/
function photo($source){
    global $lowxp;

    $size = 80;
    $nopic = '/upload/default.gif';
    if(empty($source)) return $nopic;
    $img = substr($source,0,strpos($source,'.jpg'));
    $img = $img.'_'.$size.'.jpg';
    return is_file(RootDir.'web'.$img) ? $lowxp->common['cloudurl'].$img : $lowxp->common['cloudurl'].$source;
}