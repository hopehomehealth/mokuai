<?php /* Smarty version 2.6.18, created on 2013-03-17 23:12:12
         compiled from test2.tpl */ ?>
<h1>内建函数foreach用户列表的使用</h1>
<h1>取出普通的索引数组</h1>
<?php $_from = $this->_tpl_vars['arr1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
<?php echo $this->_tpl_vars['temp']; ?>

<?php endforeach; endif; unset($_from); ?>
<h1>取出普通的关联数组</h1>
<?php $_from = $this->_tpl_vars['arr2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city'] => $this->_tpl_vars['temp']):
?>
<?php echo $this->_tpl_vars['city']; ?>
=<?php echo $this->_tpl_vars['temp']; ?>

<?php endforeach; endif; unset($_from); ?>
<h1>取出二维索引数组</h1>
<?php $_from = $this->_tpl_vars['arr3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
<?php $_from = $this->_tpl_vars['temp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['person']):
?>
<?php echo $this->_tpl_vars['person']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<h1>取出二维关联数组</h1>
<?php $_from = $this->_tpl_vars['arr4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item1']):
?>
<?php $_from = $this->_tpl_vars['item1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['item2']):
?>
<?php echo $this->_tpl_vars['k']; ?>
=<?php echo $this->_tpl_vars['item2']; ?>

<?php endforeach; endif; unset($_from); ?>
<br/>
<?php endforeach; endif; unset($_from); ?>
<h1>if else测试案例</h1>
<?php if ($this->_tpl_vars['pagenow'] > 10): ?>
pagenow>10
<?php else: ?>
pagenow<=10
<?php endif; ?>