<?php /* Smarty version Smarty-3.0.8, created on 2015-05-06 14:07:13
         compiled from "E:\wamp\www\votesystem/tpl\register3.html" */ ?>
<?php /*%%SmartyHeaderCode:25901554a03f1de4459-65917103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f593c8ad4583de166ec83782ade6638a13adc97a' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\register3.html',
      1 => 1430466606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25901554a03f1de4459-65917103',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    <div class="box">
        <div class="choiceslogo"></div>
        <div class="loginbox">
            <div class="loginboxtext">
                <p>让自己帮别人做选择<br/>让别人帮自己做选择</p>
            </div>

            <div class="loginboxinputarea">
                <input id="username" type="text" class="logininput" placeholder='用户名' autocomplete="off"/>
                <input id="psw" type="password" class="logininput" placeholder='密码'>
                <input id="confirmpsw" type="password" class="logininput" placeholder='确认密码'>

                <p class="usernamerrortext"></p>
                <p class="pswerrortext"></p>
                <p class="confirmpswerrortext">两次密码不一致</p>
            </div>
                
            <div class="loginboxBottom">
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
">登录</a>
                <span>或</span>
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">浏览网站</a>
                
                <input id="submitbtn" class="registersubmitbtn" type="submit" value="">
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>