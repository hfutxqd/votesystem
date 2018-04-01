<?php /* Smarty version Smarty-3.0.8, created on 2014-11-18 17:34:24
         compiled from "D:\www\votesystem/tpl\adminlogin.html" */ ?>
<?php /*%%SmartyHeaderCode:10324546b12a0c090b7-68721809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d1c9bf6f9fb478cb7f68660227004b2a07536e0' => 
    array (
      0 => 'D:\\www\\votesystem/tpl\\adminlogin.html',
      1 => 1416303263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10324546b12a0c090b7-68721809',
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
	<title>投票系统-VOTE SYSTEM</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
body{margin: 0px;border: 0px;}
</style>
</head>

<body>
<div style="width: 100%;">
    <div style="width: 100%;height: 118px;background-image: url(images/1.jpg);">
       <div style="width: 400px;float: left;padding-top: 30px;padding-left: 30px;">
           <span style="color: #ffffff;font-size: 28px;"><b>VOTE SYSTEM---Beat 1.0</b></span>
            </div>   
       <div style="width: 350px;float: right;color: #FFFFFF;padding-top: 67px;">
<ul class="nav nav-pills" role="tablist">
  <li role="presentation" class="active"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'adminlogin'),$_smarty_tpl);?>
">后台首页</a></li>
  <li role="presentation"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
" target="_blank"><span style="color: black;">前台首页</span></a></li>
  <li role="presentation"><a href="http://webscan.360.cn" target="_blank"><span style="color: black;">360网页安全检测</span></a></li>
</ul>
                    </div>    
            </div>
    <div style="width: 100%;height: 550px;">
      <div style="width: 20%;height: 100%;background-image: url(images/3.jpg) ;float: left;padding-top: 5px;line-height: 20px;padding-left: 45px;background-repeat:no-repeat;">
            <p>&nbsp;&nbsp;<b><span style="color: #FFFFFF;">系统功能</span></b></p>      
<p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'config','id'=>$_SESSION['userinfo']['user_id'],'name'=>$_SESSION['userinfo']['user_name']),$_smarty_tpl);?>
" target="iframe">系统设置</a></p><br /><br />
             <p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'addvote','id'=>$_SESSION['userinfo']['user_id'],'name'=>$_SESSION['userinfo']['user_name']),$_smarty_tpl);?>
" target="iframe">添加投票</a></p><br /><br />
             <p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'showvote','id'=>$_SESSION['userinfo']['user_id'],'name'=>$_SESSION['userinfo']['user_name']),$_smarty_tpl);?>
" target="iframe">投票查看</a></p><br /><br /> 
                          <p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'uservote','id'=>$_SESSION['userinfo']['user_id'],'name'=>$_SESSION['userinfo']['user_name']),$_smarty_tpl);?>
" target="iframe">用户日志</a></p><br /><br />
<p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'editpw','id'=>$_SESSION['userinfo']['user_id'],'name'=>$_SESSION['userinfo']['user_name']),$_smarty_tpl);?>
" target="iframe">修改密码</a></p><br /><br />  
              <p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'logout'),$_smarty_tpl);?>
">退出系统</a></p> 
                </div>
      <div style="height: 550px;float: left;width: 80%;">
<iframe src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'adminright'),$_smarty_tpl);?>
" name="iframe" frameborder="0" height="550px" width="100%"></iframe>
                </div>    
        </div>
    <div style="width: 100%;height: 40px;background-image: url(images/2.jpg);"></div>
    </div>


</body>
</html>