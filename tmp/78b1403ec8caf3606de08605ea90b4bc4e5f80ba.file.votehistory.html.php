<?php /* Smarty version Smarty-3.0.8, created on 2015-04-18 09:35:00
         compiled from "E:\wamp\www\votesystem/tpl\votehistory.html" */ ?>
<?php /*%%SmartyHeaderCode:3076555320924f2a464-47586994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78b1403ec8caf3606de08605ea90b4bc4e5f80ba' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\votehistory.html',
      1 => 1429342452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3076555320924f2a464-47586994',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>用户查看</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<style>
body{margin: 0px;border: 0px;}
</style>    
</head>
<body>
<div style="margin: 5px;">
<table style="font-size: 14px;width: 100%;text-align: left;border-bottom: 1px solid #aaa;" class="table table-hover">
  <tr>
	<th style="width: 80px;">学号</th>
	<th style="width: 80px;">投票ID</th>
	<th style="width: 80px;">选项ID</th>
	<th style="width: 100px;">投票时间</th>
	<th style="width: 80px;">IP地址</th>
    <!-- <th style="width: 100px;">浏览器</th> -->
	<th style="width: 80px;">操作</th>
  </tr>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>  
  <tr>   
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value['user_id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value['ct_id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value['it_id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value['vo_time'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['vo_ip'];?>
</td>
    <!-- <td><?php echo $_smarty_tpl->tpl_vars['value']->value['vo_browser'];?>
</td> -->
	<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'votedetail','id'=>$_smarty_tpl->tpl_vars['value']->value['vo_id']),$_smarty_tpl);?>
"> 详情</a></td>
    
  </tr>
<?php }} ?>
</table>
</body>
</html>