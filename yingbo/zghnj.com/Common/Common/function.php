<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/14
 * Time: 10:55
 */

//对富文本编辑器进行防止xss攻击函数
//参数$string 是被处理的字符串信息，内部有可能包含xss攻击内容
function fanXSS($string)
{
    //tp框架中，php代码处理，"./"当前目录都是这对index.php入口文件目录位置
    require_once './Common/Plugin/htmlpurifier/HTMLPurifier.auto.php';
    // 生成配置对象
    $cfg = HTMLPurifier_Config::createDefault();
    // 以下就是配置：
    $cfg->set('Core.Encoding', 'UTF-8');
    // 设置允许使用的HTML标签
    $cfg->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,br,span[style],img[width|height|alt|src]');
    // 设置允许出现的CSS样式属性
    $cfg->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    // 设置a标签上是否允许使用target="_blank"
    $cfg->set('HTML.TargetBlank', TRUE);
    // 使用配置生成过滤用的对象
    $obj = new HTMLPurifier($cfg);
    return $obj->purify($string);// 过滤字符串
}


/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 5,$search) {
    $p = new Think\Page($count, $pagesize,$search);
    $p->parameter["search"] = $search;

    $p->setConfig('header','<li class="rows">&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('first','首页');
    $p->setConfig('prev','上一页');
    $p->setConfig('next','下一页');
    $p->setConfig('last','末页');

    $p->setConfig('theme','%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}
function  log_result($file,$word)
{
    $fp = fopen($file,"a");
    flock($fp, LOCK_EX) ;
    fwrite($fp,"执行日期：".strftime("%Y-%m-%d-%H：%M：%S",time())."\n".$word."\n\n");
    flock($fp, LOCK_UN);
    fclose($fp);
}
function object2array(&$object) {
         $object =  json_decode( json_encode( $object),true);
         return  $object;
}

function iunserializer($value) {
    if (empty($value)) {
        return '';
    }
    /*if (!is_serialized($value)) {
        return $value;
    }*/
    $result = unserialize($value);
    if ($result === false) {
        $temp = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $value);
        return unserialize($temp);
    }
    return $result;
}
//获取平台配置
function sysconfig(){
    require_once("./Common/Sysconfig/sysconfig.php");
    return getconfig();
}
function cutstr($sourcestr,$cutlength){
    $returnstr = '';
    $i = 0;
    $n = 0;
    $str_length = strlen($sourcestr);
    $mb_str_length = mb_strlen($sourcestr,'utf-8');
    while(($n < $cutlength) && ($i <= $str_length)){
    $temp_str = substr($sourcestr,$i,1);
    $ascnum = ord($temp_str);
    if($ascnum >= 224){
    $returnstr = $returnstr.substr($sourcestr,$i,3);
    $i = $i + 3;
    $n++;
    }
    elseif($ascnum >= 192){
    $returnstr = $returnstr.substr($sourcestr,$i,2);
    $i = $i + 2;
    $n++;
    }
    elseif(($ascnum >= 65) && ($ascnum <= 90)){
    $returnstr = $returnstr.substr($sourcestr,$i,1);
    $i = $i + 1;
    $n++;
    }
    else{
    $returnstr = $returnstr.substr($sourcestr,$i,1);
    $i = $i + 1;
    $n = $n + 0.5;
    }
    }
    if ($mb_str_length > $cutlength){
    $returnstr = $returnstr . "...";
    }
    return $returnstr;
}
//制作一个函数实现邮件发送
import('Com.Email.PHPMailer');
import('Com.Email.SMTP');

function send_mail($title, $content, $from, $to, $password, $chart = 'utf-8', $attachment = '') {
    $mail = new \PHPMailer();
    $mail->CharSet = $chart; // 设置采用gb2312中文编码
    $mail->IsSMTP('smtp'); // 设置采用SMTP方式发送邮件
    $mail->Host = "smtp.bjlhcq.com"; // 设置邮件服务器的地址
    $mail->Port = 25; // 设置邮件服务器的端口，默认为25
    $mail->From = "$from"; // 设置发件人的邮箱地址
    $mail->FromName = "蓝海长青"; // 设置发件人的姓名
    $mail->SMTPAuth = true; // 设置SMTP是否需要密码验证，true表示需要
    $mail->Username = "$from"; // 设置发送邮件的邮箱
    $mail->Password ="$password"; // 设置邮箱的密码
    $mail->Subject = $title; // 设置邮件的标题
    $mail->AltBody = "text/html"; // optional, comment out and test
    $mail->Body = $content; // 设置邮件内容
    $mail->IsHTML(true); // 设置内容是否为html类型
    $mail->WordWrap = 50; // 设置每行的字符数
    $mail->AddReplyTo ("地址", "名字" ); // 设置回复的收件人的地址
    $mail->AddAddress ($to, ""); // 设置收件的地址

    if ($attachment != '') {
        $mail->AddAttachment ( $attachment, $attachment );
    }
    if ($mail->Send ()) {
        //$status1 = "$to" . '&nbsp;&nbsp;已投送成功<br />';
        $status = 1;

    } else {
        //$status2 = "$to" . '&nbsp;&nbsp;发送邮件失败<br />';
        $status = 0;
    }
    return $status;
}
//敏感词检查
	function mycheckword($word)
	{
		$content = file_get_contents('./Home/mingan.txt');
		$arr=explode("\r\n",$content);
		$replacearr = array();
		$keyarr = array();
		for($j=0;$j<count($arr);$j++){
			preg_match('/'.$arr[$j].'/',$word,$mnt);
			for($k=0;$k<count($mnt);$k++){
				$keyarr[$j] = '/'.$mnt[$k].'/';
				$replacearr[$j] = "<b style='color:red;background:gray'>".$mnt[$k]."</b>";
			}
		}
		return preg_replace($keyarr,$replacearr,$word);
	}
	function isMobile(){
		$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
		$useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';
		function CheckSubstrs($substrs,$text){
			$ismobile = false;
			foreach($substrs as $substr){
				if(false === strpos($text,$substr)){
					$ismobile = false;
				}else{
					$ismobile = true;
					break;
				}
			}
			return $ismobile;
		}
		$mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');

		$mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');

		$found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) || CheckSubstrs($mobile_token_list,$useragent);

		if ($found_mobile){
			return true;
		}else{
			return false;
		}
	}
    function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
        if(is_array($arrays)){
            foreach ($arrays as $array){
                if(is_array($array)){
                    $key_arrays[] = $array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
        return $arrays;
    }
    function cut_html_str($str, $lenth, $replace='', $anchor='<!-- break -->'){ 
        $_lenth = mb_strlen($str, "utf-8"); // 统计字符串长度（中、英文都算一个字符）
        if($_lenth <= $lenth){
            return $str;    // 传入的字符串长度小于截取长度，原样返回
        }
        $strlen_var = strlen($str);     // 统计字符串长度（UTF8编码下-中文算3个字符，英文算一个字符）
        if(strpos($str, '<') === false){ 
            return mb_substr($str, 0, $lenth);  // 不包含 html 标签 ，直接截取
        } 
        if($e = strpos($str, $anchor)){ 
            return mb_substr($str, 0, $e);  // 包含截断标志，优先
        } 
        $html_tag = 0;  // html 代码标记 
        $result = '';   // 摘要字符串
        $html_array = array('left' => array(), 'right' => array()); //记录截取后字符串内出现的 html 标签，开始=>left,结束=>right
        /*
        * 如字符串为：<h3><p><b>a</b></h3>，假设p未闭合，数组则为：array('left'=>array('h3','p','b'), 'right'=>'b','h3');
        * 仅补全 html 标签，<? <% 等其它语言标记，会产生不可预知结果
        */
        for($i = 0; $i < $strlen_var; ++$i) { 
            if(!$lenth) break;  // 遍历完之后跳出
            $current_var = substr($str, $i, 1); // 当前字符
            if($current_var == '<'){ // html 代码开始 
                $html_tag = 1; 
                $html_array_str = ''; 
            }else if($html_tag == 1){ // 一段 html 代码结束 
                if($current_var == '>'){ 
                    $html_array_str = trim($html_array_str); //去除首尾空格，如 <br / > < img src="" / > 等可能出现首尾空格
                    if(substr($html_array_str, -1) != '/'){ //判断最后一个字符是否为 /，若是，则标签已闭合，不记录
                        // 判断第一个字符是否 /，若是，则放在 right 单元 
                        $f = substr($html_array_str, 0, 1); 
                        if($f == '/'){ 
                            $html_array['right'][] = str_replace('/', '', $html_array_str); // 去掉 '/' 
                        }else if($f != '?'){ // 若是?，则为 PHP 代码，跳过
                            // 若有半角空格，以空格分割，第一个单元为 html 标签。如：<h2 class="a"> <p class="a"> 
                            if(strpos($html_array_str, ' ') !== false){ 
                            // 分割成2个单元，可能有多个空格，如：<h2 class="" id=""> 
                            $html_array['left'][] = strtolower(current(explode(' ', $html_array_str, 2))); 
                            }else{ 
                            //若没有空格，整个字符串为 html 标签，如：<b> <p> 等，统一转换为小写
                            $html_array['left'][] = strtolower($html_array_str); 
                            } 
                        } 
                    } 
                    $html_array_str = ''; // 字符串重置
                    $html_tag = 0; 
                }else{ 
                    $html_array_str .= $current_var; //将< >之间的字符组成一个字符串,用于提取 html 标签
                } 
            }else{ 
                --$lenth; // 非 html 代码才记数
            } 
            $ord_var_c = ord($str{$i}); 
            switch (true) { 
                case (($ord_var_c & 0xE0) == 0xC0): // 2 字节 
                    $result .= substr($str, $i, 2); 
                    $i += 1; break; 
                case (($ord_var_c & 0xF0) == 0xE0): // 3 字节
                    $result .= substr($str, $i, 3); 
                    $i += 2; break; 
                case (($ord_var_c & 0xF8) == 0xF0): // 4 字节
                    $result .= substr($str, $i, 4); 
                    $i += 3; break; 
                case (($ord_var_c & 0xFC) == 0xF8): // 5 字节 
                    $result .= substr($str, $i, 5); 
                    $i += 4; break; 
                case (($ord_var_c & 0xFE) == 0xFC): // 6 字节
                    $result .= substr($str, $i, 6); 
                    $i += 5; break; 
                default: // 1 字节 
                    $result .= $current_var; 
            } 
        } 
        if($html_array['left']){ //比对左右 html 标签，不足则补全
            $html_array['left'] = array_reverse($html_array['left']); //翻转left数组，补充的顺序应与 html 出现的顺序相反
            foreach($html_array['left'] as $index => $tag){ 
                $key = array_search($tag, $html_array['right']); // 判断该标签是否出现在 right 中
                if($key !== false){ // 出现，从 right 中删除该单元
                    unset($html_array['right'][$key]); 
                }else{ // 没有出现，需要补全 
                    $result .= '</'.$tag.'>'; 
                } 
            } 
        } 
        return $result.$replace; 
    }


