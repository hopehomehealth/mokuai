<?php
namespace Model;
use Think\Model;

//model模型类

class UserModel extends Model {
    //重写父类的添加瞻前顾后机制方法
    protected function _after_insert($data,$options) {
        //获得新记录的主键id值
        /*dump($data);
        array(5) {
          ["user_name"] => string(12) "bier"
          ["user_pwd"] =>  string(12) "123"
          ["user_email"] => string(5) "bier@163.com"
          ["user_id"] => string(3) "113"
        }
        */
        //给新注册会员发送激活邮件
        //sendMail($to, $title, $content)
        $code = md5(time().$data['user_id']);   //激活账号的校验码32位
        $url = C("SITE_URL")."index.php/Home/User/activeUser/user_id/".$data['user_id'].'/code/'.$code;
        $content = "请点击<a href='$url' target='_blank'>激活</a>按钮激活您的账号";

        if(sendMail($data['user_email'], '新会员激活账号', $content)){
            //把$code更新给新会员的user_check_code字段去
            $arr = array(
                'user_id'=>$data['user_id'],
                'user_check_code' => $code,
            );
            $this -> save($arr);
        }
    }
}
