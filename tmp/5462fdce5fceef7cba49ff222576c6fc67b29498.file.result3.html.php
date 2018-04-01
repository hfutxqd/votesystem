<?php /* Smarty version Smarty-3.0.8, created on 2015-05-08 13:31:41
         compiled from "E:\wamp\www\votesystem/tpl\result3.html" */ ?>
<?php /*%%SmartyHeaderCode:30504554c9e9d868d72-45813413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5462fdce5fceef7cba49ff222576c6fc67b29498' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\result3.html',
      1 => 1431066313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30504554c9e9d868d72-45813413',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>结果</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/result.css">
    
    
</head>
<body>
<div class="box">
    <div class="background"></div>

    <div id="header" class="header">
        <img src="images/logo.jpg" >

        <div class="toprighticon floatright">
            <div class="search">
                <div class="aboutus floatright"></div>
                <input type="text" class="floatright">
                <div class="searchlogo floatright"></div>
                              
            </div>
        </div>

        <div id="headerlink" class="headerlink">
            <div id="square1" class="square1"></div>
            <div id="headerlinkbox" class="headerlinkbox floatleft">
            <ul>
                <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">正在进行</a></li>
                <li><span><a href="javascript:void(0)">结果</a></span></li>
                <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discoverPage'),$_smarty_tpl);?>
">发现</a></li>
            </ul>
            </div>

            <div class="dynamicbutton floatright">
                <div id="userName" class="dynamicusername floatleft"></div>
                <div class="dynamiccircle floatright">软</div>
            </div>
        </div>
    </div>
    
    <div class="usercard">
        <div class="usercircle">软</div>
        <div class="userinformation">
            <ul>
            </ul>
        </div>
        <div class="usergrade">
            <div class="floatleft"><span>当选率</span></div>
            <div class="floatright"><span>积分</span></div>
        </div>
        <div class="logout">
            <div class="floatleft"><span>注销</span></div>
            
            <div class="floatright">签到</div>
            <div class="editor floatright">编辑</div>
        </div>
        <div class="useractive">
            <div class="activecard floatleft">
                <p>邀请我参与的投票</p>
                <ul class="invitedme">
                   
                </ul>
            </div>

            <div class="activecard floatleft">
                <p>最近投票的结果</p>
                <ul class="voteresult">
                    
                </ul>
            </div>

             <div class="activecard floatleft">
                <p>我发起的投票</p>
                <ul class="ilaunch">
                   
                </ul>
            </div>
            
            
            <div class="newvote"></div>
        </div>
        <div class="closevote"></div>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'newvote'),$_smarty_tpl);?>
" class="newvotebtn"></a>
    </div>

    <div class="resultcard">
        <ul>
            <!-- <li>
                <div class="resvotetop">
                    <div class="votetitle">
                        软件学院2013级毕业旅行地点选择
                    </div>
                    <p class="votedetail">
                    选3个你最想去的地方，班长大人和班委会根据结果定好毕业旅行的地址。好不容易毕业了，大家一起出去玩玩，可以留下美好的回忆啊。咱们一生都会是好朋友哒~原谅我们只能去国内旅游，班长大人不出钱啊。。
                    </p>
            
                    <div class="resnumlimit">3</div>
                </div>
            
                <div class="resvotecard">
                    <ol>
                        <li>
                            <div class="cardtextname">
                                <div class="usercheckcircle">软</div>
                                <div class="cardtitle">黄山</div>
                            </div>
                            <div class="cardresult">
                                <div class="cardresultdiv"></div>
                                <p>96票 / 100%</p>
                            </div>
                        </li>
            
                        <li>
                            <div class="cardtextname">
                                <div class="usercheckcircle">软</div>
                                <div class="cardtitle">张启</div>
            
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>57票 / 60%</p>
                                </div>
                            </div>
                        </li>
            
                        <li>
                            <div class="cardtextname">
                                <div class="usercheckcircle">软</div>
                                <div class="cardtitle">科大讯飞</div>
            
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>43票 / 45%</p>
                                </div>
                            </div>
                        </li>
            
                        <li>
                            <div class="cardtextname">
                                <div class="usercheckcircle">软</div>
                                <div class="cardtitle">桌游</div>
            
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>35票 / 36%</p>
                                </div>
                            </div>
                        </li>
                    </ol>                    
                </div>
               
            </li>  -->
        </ul>
    </div>


</div>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/result.js"></script>
</body>
</html>
