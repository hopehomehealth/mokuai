<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/31 0031
 * Time: 17:11
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class WeixinController extends AdminController
{
    private $data = array();

    public function __construct($token= 'xnytxtokenasd'){
        $echoStr = $_GET["echostr"];

        if(IS_GET) {
            $this->valid(); // 对接密钥
            echo $_GET['echostr'];
            exit;
        } else {
            //获取消息体 xml格式数据
            $xml = file_get_contents("php://input");
            fwrite(fopen('./Admin/vv.txt', 'w'), print_r($xml, true));
            $xml = new \SimpleXMLElement($xml);
            $xml || exit;
            //fwrite(fopen('./Admin/xx.txt', 'w'), print_r($xml, true));
            foreach ($xml as $key => $value){
                $this -> data[$key] = strval($value);
            }
            //fwrite(fopen('./Admin/uu.txt', 'w'), print_r($this->data, true));
        }

    }



    public function index(){

        $data = $this->request(); //获取数据

        $key = $data['Content']; //获取关键词
        // 获取回复数据
        $res = $this->reply($data);
        fwrite(fopen('./Admin/uu.txt', 'w'), print_r($res, true));
        if(trim($res) != 'nofalse')
        {
            fwrite(fopen('./Admin/xx.txt', 'w'), print_r(trim($res), true));
            list($content, $type) = $res;
            if($content && $content != 'LOCATION'){
                $this -> response($content, $type); //回复
            }else if($content == 'LOCATION'){

            }else{//未定义关键词时回复
                $reser = $this->NoRestMsg();
                list($content, $type) =$reser;
                $this -> response($content, $type);//回复
            }
        }
    }
    //未设置关键词 查数据
    function NoRestMsg(){
        $info = M("keyword")->where(array("type"=>3))->find();
        $desc = $info['descs'];
        return array($desc,'text');
    }
    //回复调用数据
    function reply($data){
        //fwrite(fopen('./Admin/uu.txt', 'w'), print_r($data, true));
        $guanzhu = M('key_n')->find(3);
        $img_info = M("img")->find($guanzhu['tuwen_id']);
        //fwrite(fopen('./Admin/uu.txt', 'w'), print_r($data, true));

        if('subscribe' == $data['Event']) {

            $guanzhu = M('key_n')->find();
            if($guanzhu['type'] == '0'){
                return array($guanzhu['content'],'text');
            }else{
                $img_info = M("img")->where("id = {$guanzhu['tuwen_id']}")->select();
                foreach($img_info as $keya => $infot){
                    if($infot['url'] != false){
                        $url = htmlspecialchars_decode($infot['url']);
                    }else{
                        $url = rtrim($_SERVER['HTTP_HOST']) . U('Home/News/detail', array('news_id' => $infot['id']));
                    }
                    $img_url = 'http://'.$_SERVER['HTTP_HOST'].'/'.substr($infot['img_url'],1);
                    $return[] = array(str_replace('&amp;','&',$infot['title']), str_replace('&amp;','&',$infot['jianjie']), $img_url, $url);
                }
                //fwrite(fopen('./Admin/uu.txt', 'w'), print_r($img_info, true));
                return array($return, 'news');
            }
        }else if($data['Event'] == 'LOCATION'){
            return array('LOCATION','text');
        }else if($data['Event'] == 'CLICK'){
            //fwrite(fopen('./Admin/uu.txt', 'w'), print_r($data, true));
            $keywords = $data['EventKey'];
            $img_info = M("img")->where("keyword =  '{$keywords}'")->select();
            foreach($img_info as $keya => $infot){
                if($infot['url'] != false){
                    $url = htmlspecialchars_decode($infot['url']);
                }else{
                    $url = rtrim($_SERVER['HTTP_HOST']) . U('Home/News/detail', array('news_id' => $infot['id']));
                }
                $img_url = 'http://'.$_SERVER['HTTP_HOST'].'/'.substr($infot['img_url'],1);
                $return[] = array(str_replace('&amp;','&',$infot['title']), str_replace('&amp;','&',$infot['jianjie']), $img_url, $url);
            }
            return array($return, 'news');
        }else{
            //fwrite(fopen('./Admin/uu.txt', 'w'), print_r($11, true));
            $keyword = $data['Content'];
            $where = " keyword like "."'%$keyword%'";
            $info = M("keyword")->where($where)->find();
            if($info){
                $desc = $info['descs'];
                //fwrite(fopen('./Admin/uu.txt', 'w'), print_r(222, true));
                return array($desc,'text');
            }else{
                $img_info = M("img")->where($where)->select();
                //fwrite(fopen('./Admin/uu.txt', 'w'), print_r(333, true));
                //fwrite(fopen('./Admin/uu.txt', 'w'), print_r($img_info, true));
                foreach($img_info as $keya => $infot){
                    if($infot['url'] != false){
                        $url = htmlspecialchars_decode($infot['url']);
                    }else{
                        $url = rtrim($_SERVER['HTTP_HOST']) . U('Home/News/detail', array('news_id' => $infot['id']));
                    }
                    $img_url = 'http://'.$_SERVER['HTTP_HOST'].'/'.substr($infot['img_url'],1);
                    $return[] = array(str_replace('&amp;','&',$infot['title']), str_replace('&amp;','&',$infot['jianjie']), $img_url, $url);
                }
                return array($return, 'news');

            }


        }


    }

    public function request(){
        return $this -> data;
    }
    //设置数据 回复 xml类型
    public function response($content, $type = 'text', $flag = 0){
        $this -> data = array('ToUserName' => $this -> data['FromUserName'], 'FromUserName' => $this -> data['ToUserName'], 'CreateTime' => NOW_TIME, 'MsgType' => $type,);
        $this -> $type($content);
        $this -> data['FuncFlag'] = $flag;
        $xml = new \SimpleXMLElement('<xml></xml>');
        $this -> data2xml($xml, $this -> data);
        exit($xml -> asXML());
    }

    private function text($content){
        $this -> data['Content'] = $content;
    }

    private function music($music){
        list($music['Title'], $music['Description'], $music['MusicUrl'], $music['HQMusicUrl']) = $music;
        $this -> data['Music'] = $music;
    }

    private function news($news){
        $articles = array();
        foreach ($news as $key => $value){
            list($articles[$key]['Title'], $articles[$key]['Description'], $articles[$key]['PicUrl'], $articles[$key]['Url']) = $value;
            if($key >= 9){
                break;
            }
        }
        $this -> data['ArticleCount'] = count($articles);
        $this -> data['Articles'] = $articles;
    }

    private function data2xml($xml, $data, $item = 'item'){
        foreach ($data as $key => $value){
            is_numeric($key) && $key = $item;
            if(is_array($value) || is_object($value)){
                $child = $xml -> addChild($key);
                $this -> data2xml($child, $value, $item);
            }else{
                if(is_numeric($value)){
                    $child = $xml -> addChild($key, $value);
                }else{
                    $child = $xml -> addChild($key);
                    $node = dom_import_simplexml($child);
                    $node -> appendChild($node -> ownerDocument -> createCDATASection($value));
                }
            }
        }
    }

    private function auth($token){
//		$data = array($_GET['timestamp'], $_GET['nonce'], $token);
//		$sign = $_GET['signature'];
//		sort($data);
//		$signature = sha1(implode($data));
//		return $signature === $sign;
        //$data = array($_GET['timestamp'], $_GET['nonce'], $token);
        $data      = array($token, trim($_GET['timestamp']), trim($_GET['nonce']));
        $sign      = trim($_GET['signature']);
        sort($data, SORT_STRING);
        $tmpStr    = implode($data);
        $signature = sha1($tmpStr);

        return $signature === $sign;
    }





    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }


    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = 'xnytxtokenasd';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr1 = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr1 );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}