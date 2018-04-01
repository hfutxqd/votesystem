<?php /* Smarty version Smarty-3.0.8, created on 2015-05-06 13:33:14
         compiled from "E:\wamp\www\votesystem/tpl\login3.html" */ ?>
<?php /*%%SmartyHeaderCode:90095549fbfacf47a1-41401184%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0287b29b1c7df011e5780671d92b4849e5033be' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\login3.html',
      1 => 1430398942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90095549fbfacf47a1-41401184',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="box">
        <div class="choiceslogo"></div>
        <div class="loginbox">
            <div class="loginboxtext">
                <p>让自己帮别人做选择<br/>让别人帮自己做选择</p>
            </div>

            <div class="loginboxinputarea">
                <input id="loginusername" type="text" class="" placeholder='用户名 / 学号'>
                <input id="loginpsw" type="password" placeholder='密码'>

                <p class="passworderrortext">用户名或密码错误</p>
            </div>
            

            <div class="loginboxstatus">
                <input id="remerbercheck" type="checkbox">&nbsp;记住我的登录状态
                <span>|</span>
                <a href="">忘记密码？</a>
            </div>
            
                
            <div class="loginboxBottom">
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'register'),$_smarty_tpl);?>
">注册</a>
                <span>或</span>
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">浏览网站</a>
                
                <input id="loginbtn" class="buttonstyle" type="submit" value="">
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>