<?php
/**
 * Class debug_momdel
 */
class debug_model extends Lowxp_Model{

    function show_log($file='error.log'){
        $file = RootDir.'web/upload/temp/'.$file;
        if(!file_exists($file))die('Error1');

        $str = file_get_contents($file);
        return $str;
    }

    function show_notice(){
        $str = $this->show_log('check_notice.log');
        echo '<pre>';echo $str;echo '</pre>';
    }

    /**
     * 查看日志
     *
     */
    public function renderHtmlShowLog(){
        //wechat,post_data
        if(!isset($_GET['f']))die('xx');
        $file = $_GET['f'].'.log';
        $fname = RootDir.'web/upload/temp/'.$file;

        if(file_exists($fname)){
            $str = file_get_contents($fname);
            return $str;
        }
        return '';
    }

    /**
     * 错误记录
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     */
    function ErrorHandle($errno, $errstr, $errfile, $errline){
        $this->WriteLog('[Line:'.$errline.', No:'.$errno.', File:'.$errfile.'] '.$errstr,'wx_error.log');
    }

    /**
     * 写入日志
     * @param string $message
     * @param string $file
     */
    function WriteLog($message='', $file='wechat.log'){
        $this->db->insert('wx_logs',array(
            'content'=>$message,
            'file'=>$file
        ));
        return;

        $fname = RootDir.'web/upload/temp/'.$file;
        $o = fopen($fname,'a');
        fputs($o,'['.date('Y-m-d H:i:s').']'.$message."\r\n");
        fclose($o);
    }
}