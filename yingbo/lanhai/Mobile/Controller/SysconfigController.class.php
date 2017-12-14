<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Mobile\Controller;
use Common\Common\ComController;
class SysconfigController extends ComController
{
   function tiaokuan() {
	  $set = M('sysconfig')->field('tiaokuan')->find();
	  $set['tiaokuan'] = htmlspecialchars_decode($set['tiaokuan']);
	  $this->assign('tiaokuan',$set['tiaokuan']);
	  $this->display();
   }
   function gongyue() {
	  $set = M('sysconfig')->field('gongyue')->find();
	  $set['gongyue'] = htmlspecialchars_decode($set['gongyue']);
	  $this->assign('gongyue',$set['gongyue']);
	  $this->display();
   }
}