<?php
class download{
    function index(){
        $filename = "android.apk";
        $content=file_get_contents(WebDir.'upload/android.apk');//���ļ������ַ���
        $length=strlen($content);//ȡ���ַ������ȣ����ļ���С����λ���ֽ�
        $encoded_filename = rawurlencode($filename);//����rawurlencode����ո��滻Ϊ+
        $ua = $_SERVER["HTTP_USER_AGENT"];//��ȡ�û������UA��Ϣ

        header('Content-Type: application/octet-stream');//�������������������ͣ�����
        header('Content-Encoding: none');//���ݲ����ܣ�gzip�ȣ���ѡ
        header("Content-Transfer-Encoding: binary" );//�ļ����䷽ʽ�Ƕ����ƣ���ѡ
        header("Content-Length: ".$length);//����������ļ���С����ѡ

        if (preg_match("/MSIE/", $ua)) {//��UA���ҵ�MSIE�ж���IE
            header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
        } else if (preg_match("/Firefox/", $ua)) {//ͬ���жϻ��
            header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');
        } else {//����������ȸ��
            header('Content-Disposition: attachment; filename="' . $filename . '"');
        }
        echo $content;
    }
}