<?php /* Smarty version Smarty-3.0.8, created on 2014-11-18 17:52:55
         compiled from "D:\www\votesystem/tpl\uservote.html" */ ?>
<?php /*%%SmartyHeaderCode:31040546b16f7a34f88-04683008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c505437af89ed65b2f0b5042b7b8f8b668af5076' => 
    array (
      0 => 'D:\\www\\votesystem/tpl\\uservote.html',
      1 => 1416304371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31040546b16f7a34f88-04683008',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="梦想瞬智网络科技" />
	<title>用户查看</title>
            <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<link href="http://www.kindsoft.net/ke4/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
body{margin: 0px;border: 0px;}
</style>    
</head>
<body>
<div style="margin: 10px;">
<table style="font-size: 14px;width: 100%;text-align: left;border-bottom: 1px solid #aaa;" class="table table-hover">
  <tr>
  <th style="width: 80px;">用户IP</th>
    <th style="width: 50px;">使用语言</th>
    <th style="width: 100px;">浏览器信息</th>
    <th style="width: 100px;">上次投票时间</th>
    <th style="width: 80px;">投票次数</th>
    <th style="width: 80px;">管理操作</th>
  </tr>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>  
  <tr>   
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ip_ip'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ip_yy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ip_ie'];?>
</td>             
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ip_onetime'];?>
</td>         
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ip_num'];?>
</td>  
    <td>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'deluservote','ip_id'=>$_smarty_tpl->tpl_vars['value']->value['ip_id']),$_smarty_tpl);?>
" class="btn btn-danger">删除记录</a>
    </td>
  </tr>
<?php }} ?>
</table>
</body>
</html>