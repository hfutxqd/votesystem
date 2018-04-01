<?php /* Smarty version Smarty-3.0.8, created on 2015-04-25 13:30:15
         compiled from "E:\wamp\www\votesystem/tpl\index2.html" */ ?>
<?php /*%%SmartyHeaderCode:32135553b7ac7119ed7-72497701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '911503aee6b09e615ff0ae72dd18e57161783824' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\index2.html',
      1 => 1429961412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32135553b7ac7119ed7-72497701',
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
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <div class="box">
        <div class="choiceslogo"></div>
        <div class="loginbox">
            <div class="loginboxtext">
                <p>让自己帮别人做选择<br/>让别人帮自己做选择</p>
            </div>

            <form class="loginboxinputarea">
                <input id="loginusername" type="text" class="inputerror" placeholder='用户名 / 学号'>
                <input id="loginpsw" type="password" placeholder='密码'>

                <p class="inputerrortext">用户名不存在</p>
                <p class="passworderrortext">密码错误</p>
            </form>
            

            <div class="loginboxstatus">
                <input type="checkbox">&nbsp;记住我的登录状态
                <span>|</span>
                <a href="">忘记密码？</a>
            </div>
            
                
            <div class="loginboxBottom">
                <a href="register.html">注册</a>
                <span>或</span>
                <a href="home.html">浏览网站</a>
                
                <input id="loginbtn" class="buttonstyle" type="submit" value="">
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>