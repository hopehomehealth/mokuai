<?php/** * Created by PhpStorm. * User: Lowxp * Date: 14-3-31 * Time: 14:18 */class token extends Lowxp{    function __construct(){        parent::__construct();        $this->load->model('debug');        set_error_handler(array($this->debug,'ErrorHandle'));    }    /**     * 微信数据交互入口     * @param $flag     */    function index($flag){        $flag = addslashes($flag);        $row = $this->db->get("SELECT * FROM wx_token WHERE `flag`='{$flag}'");        isset($row['token'])||die('Error1!');        $_SESSION['flag'] = $flag;        //并且有token:        //验证是否有签名        if(!isset($_GET['signature']))die;        //验证来源是否是微信        $this->veryfySignature($row['token'])||die('Error');        //解析微信发送过来的数据        if(isset($_GET['echostr'])){            #首次绑定卫星            $this->BindWechat($row);        }else{            $this->parseXML();        }    }    /**     * 验证请求是否来源于微信     * @param $token     * @return bool     */    private function veryfySignature($token){        if(empty($token))die;#TOKEN        $signature = $_GET["signature"];        $timestamp = $_GET["timestamp"];        $nonce = $_GET["nonce"];        $tmpArr = array($token, $timestamp, $nonce);        sort($tmpArr,SORT_STRING);        $tmpStr = implode( $tmpArr );        $tmpStr = sha1( $tmpStr );        return $tmpStr == $signature;    }    /**     * 绑定微信     * @param $row     */    private function BindWechat($row){        $this->db->update('wx_token',array('status'=>1),array('id'=>$row['id']));        echo $_GET['echostr'];    }    /**     * 解析微信发送来的源数据     */    private function parseXML(){        $postStr = $GLOBALS['HTTP_RAW_POST_DATA'];        $this->debug->WriteLog($postStr);        //extract post data        if(empty($postStr))return;        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);        $msgtype = strtolower($postObj->MsgType);        $this->debug->WriteLog('消息类型:'.$msgtype);        $this->load->model('wechat');        $post = (array)$postObj;        //关注后发送会员卡信息        if(isset($post['FromUserName'])){            $this->wechat->fromUser = $post['FromUserName'];            $this->wechat->toUser = $post['ToUserName'];        }        //事件响应.        if($msgtype=='event'){            $eventName = strtolower($postObj->Event);            $this->debug->WriteLog('事件类型:'.$eventName);            switch($eventName){                case 'subscribe':                    $this->debug->WriteLog("关注...");                    $this->wechat->subscribe($post);                    break;                case 'unsubscribe':                    $this->debug->WriteLog("取消关注..");                    $this->wechat->unsubscribe($post);                    break;                case 'location':                    #$this->debug->WriteLog("定位..");                    #$this->wechat->location($post);                    break;                case 'click':#检查菜单中的事件内容.                    $this->wechat->checkMenuEvent($post['EventKey'],$post['FromUserName'],$post['ToUserName']);                    break;            }        }        //根据会员回复的关键词，返回设置的回复信息        if($msgtype=='text'){            $keyword = $postObj->Content;            #1.关键词自动回复.            $this->wechat->smartreply($keyword,$post['FromUserName'],$post['ToUserName']);            #2.设置机器人开关!            //聊天机器人            #$this->chatRobot($postObj->Content,$post['FromUserName'],$post['ToUserName']);            #3.默认消息回复（没有找到对应关键词）            $rule = $this->db->get("SELECT * FROM wx_autoreply_rule WHERE rule_type='autoreply'");            if(!isset($rule['id']))return;            $this->wechat->outputByRuleId($rule['id']);            #$reply = $this->db->get("SELECT content FROM wx_reply WHERE  re_type = '2' ");            #echo $wxXml = $this->wechat->textTpl($post['FromUserName'],$post['ToUserName'],$reply['content']);        }    }    function chatRobot($content, $fromUser, $toUser){        $tlkey = $this->db->get("SELECT content FROM site_info WHERE  type = 'tlkey' ");        if($tlkey['content']){            $tlapi = $this->db->get("SELECT content FROM site_info WHERE  type = 'tlapi'");            $url = $tlapi['content']."?key=$tlkey[content]&info=".$content;            $data =file_get_contents($url);            if($data){                $data = get_object_vars(json_decode($data));                $wxXml = '';                switch($data['code']){                    case '100000':                        $wxXml = $this->wechat->textTpl($fromUser,$toUser,$data['text']);                        break;                }                echo $wxXml;die;            }        }    }} 