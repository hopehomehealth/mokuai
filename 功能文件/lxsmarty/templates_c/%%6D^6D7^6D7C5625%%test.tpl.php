<?php /* Smarty version 2.6.18, created on 2013-03-12 11:21:53
         compiled from test.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'test.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => '../config/my.conf'), $this);?>


<body bgcolor=<?php echo $this->_config[0]['vars']['bgcolor']; ?>
 >
<h1><?php echo $this->_config[0]['vars']['title']; ?>
</h1>
<hr/>
<br/>*****取字符串******<br/>
<?php echo $this->_tpl_vars['aa']; ?>

<hr/>
<br/>*****取整数******<br/>
<?php echo $this->_tpl_vars['bb']; ?>

<hr/>
<br/>*****取小数******<br/>
<?php echo $this->_tpl_vars['cc']; ?>

<hr/>
<br/>*****取bool******<br/>
<?php echo $this->_tpl_vars['dd']; ?>

<hr/>
<br/>*****取出数组******<br/>
<?php echo $this->_tpl_vars['arr1'][0]; ?>
||<?php echo $this->_tpl_vars['arr1'][1]; ?>
||<?php echo $this->_tpl_vars['arr1'][2]; ?>

<hr/>
<br/>*****取出一维关联数组******<br/>
<?php echo $this->_tpl_vars['arr2']['city1']; ?>
||<?php echo $this->_tpl_vars['arr2']['city2']; ?>
||<?php echo $this->_tpl_vars['arr2']['city3']; ?>

<hr/>
<br/>*****取出二维索引数组******<br/>
<?php echo $this->_tpl_vars['arr3'][0][0]; ?>
||<?php echo $this->_tpl_vars['arr3'][0][1]; ?>
||<?php echo $this->_tpl_vars['arr3'][1][1]; ?>


<hr/>
<br/>*****取出二维关联数组******<br/>
<?php echo $this->_tpl_vars['arr4'][0]['email']; ?>
||<?php echo $this->_tpl_vars['arr4'][0]['age']; ?>
<br/>
<?php echo $this->_tpl_vars['arr5']['emp1']['email']; ?>
<br/>
<?php echo $this->_tpl_vars['arr6']['emp2'][0]; ?>


<hr/>
<br/>*****取出对象******<br/>
取出对象的普通属性:<?php echo $this->_tpl_vars['dog1']->name; ?>
<br/>
取出对象的一维数组属性:<?php echo $this->_tpl_vars['dog1']->arr[0]; ?>
<br/>
取出对象的二维数组属性:<?php echo $this->_tpl_vars['dog1']->arr2[0]['email']; ?>
<br/>
取出对象的对象属性:<?php echo $this->_tpl_vars['dog1']->master->address; ?>


<hr/>
<br/>*****取出get数据******<br/>
<?php echo $_GET['username']; ?>
<br/>
<?php echo $_SERVER['SERVER_NAME']; ?>

</body>