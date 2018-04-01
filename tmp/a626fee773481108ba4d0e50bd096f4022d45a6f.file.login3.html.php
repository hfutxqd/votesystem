<?php /* Smarty version Smarty-3.0.8, created on 2015-05-09 05:59:42
         compiled from "E:\wamp\www\votesystem4/tpl\login3.html" */ ?>
<?php /*%%SmartyHeaderCode:14080554d862e0850c8-17595539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a626fee773481108ba4d0e50bd096f4022d45a6f' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem4/tpl\\login3.html',
      1 => 1430398942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14080554d862e0850c8-17595539',
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