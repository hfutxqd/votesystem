<?php /* Smarty version Smarty-3.0.8, created on 2015-04-28 02:30:54
         compiled from "E:\wamp\www\votesystem/tpl\index.html" */ ?>
<?php /*%%SmartyHeaderCode:22194553ed4be6a1e44-53086770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18bcaabfdbc43da256c6fe971b009451cda20521' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\index.html',
      1 => 1430180279,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22194553ed4be6a1e44-53086770',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
	<title>投票系统</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css"/>
	<link rel="stylesheet" href="./css/bootstrap-theme.min.css"/>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<style>
	#title{
	background-color: #6DC7E6;
	text-align: center;
	}
	.content{
	background-color: #C4D8F5;
	text-align: center;
	padding: 40px;
	}
	.item{
	background-color: #C4F5C5;
	text-align: center;
	}
	</style>
</head>
<body>
	<div id="title"> 
		合肥工业大学网络实名投票系统<br>
		<?php if ($_smarty_tpl->getVariable('login')->value==false){?>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
">立即登陆</a>
		<?php }else{ ?>
		欢迎您，<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'logingo'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('user_name')->value;?>
</a><br>
		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'search'),$_smarty_tpl);?>
" method="POST">
			<input type="text" name="swd" size="20"/>
			<input type="submit" class="btn btn-default" value="搜索"/>
		</from>
		<?php }?>
	</div>
	<form></form>
	<?php  $_smarty_tpl->tpl_vars['ct_value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('content')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ct_value']->key => $_smarty_tpl->tpl_vars['ct_value']->value){
?>
		<div class="content" width="1080px">
			<img src="<?php echo $_smarty_tpl->tpl_vars['ct_value']->value['ct_images'];?>
" class="img-rounded" width="300px" /><br>
			投票名称：<?php echo $_smarty_tpl->tpl_vars['ct_value']->value['ct_name'];?>
<br>
			投票内容：<?php echo $_smarty_tpl->tpl_vars['ct_value']->value['ct_content'];?>
<br>
			投票类型：<?php echo $_smarty_tpl->tpl_vars['ct_value']->value['ct_type'];?>
选<br>
			结束时间：<?php echo $_smarty_tpl->tpl_vars['ct_value']->value['ct_offtime'];?>
<br>
			<!-- <?php if ($_smarty_tpl->getVariable('login')->value==true){?>
			您已投<?php echo $_smarty_tpl->getVariable('count')->value[$_smarty_tpl->tpl_vars['ct_value']->value['ct_id']];?>
票，还剩<font color="red"><?php echo $_smarty_tpl->tpl_vars['ct_value']->value['ct_type']-$_smarty_tpl->getVariable('count')->value[$_smarty_tpl->tpl_vars['ct_value']->value['ct_id']];?>
</font>票<br>
			<?php }?> -->
			<br>
			<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'vote'),$_smarty_tpl);?>
" method="post">
			<?php  $_smarty_tpl->tpl_vars['it_value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value[$_smarty_tpl->tpl_vars['ct_value']->value['ct_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it_value']->key => $_smarty_tpl->tpl_vars['it_value']->value){
?>
				<div class="item" width="900px">
					<img src="<?php echo $_smarty_tpl->tpl_vars['it_value']->value['it_image'];?>
" class="img-rounded"  width="200px"/><br/>
					选项名称：<?php echo $_smarty_tpl->tpl_vars['it_value']->value['it_name'];?>
<br>
					选项内容：<?php echo $_smarty_tpl->tpl_vars['it_value']->value['it_content'];?>
<br>
					数量：<?php echo $_smarty_tpl->tpl_vars['it_value']->value['it_count'];?>
<br>
					<input type="checkbox" name="it[]" value="<?php echo $_smarty_tpl->tpl_vars['it_value']->value['it_id'];?>
" />
<!-- 					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'vote','it'=>$_smarty_tpl->tpl_vars['it_value']->value['it_id'],'ct'=>$_smarty_tpl->tpl_vars['ct_value']->value['ct_id']),$_smarty_tpl);?>
">投票</a> -->
				</div>
				<br><br>
			<?php }} ?>
			<?php if ($_smarty_tpl->tpl_vars['ct_value']->value['ct_limType']==2){?>
			<input type="text" name="ct_passwd"/>
			<?php }?>
			<input type="hidden" name="ct" value="<?php echo $_smarty_tpl->tpl_vars['ct_value']->value['ct_id'];?>
"/>
			<input type="submit" class="btn btn-default" value="投票"/>
			</form>
		</div>
		<br><br>
	<?php }} ?>
</body>
</html>