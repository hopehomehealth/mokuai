<?php
    require_once 'Tools.php';
    
    class payLog{
        static function outLog($api_n,$content){
            $time=Tools::getTime("Y年m月d日G时i分s秒x毫秒");
            $log_str="$time   $api_n\n$content\n------------------\n";
            $file_n="Log__".date("Ymd").".txt";
            $file=fopen(AppDir."includes/modules/payment/ipaynow/log/$file_n", "a+");
            //echo $contents = fread($file, filesize (AppDir."includes/modules/payment/ipaynow/log/$file_n"));
            fwrite($file, $log_str);
            fclose($file);
        }
    }