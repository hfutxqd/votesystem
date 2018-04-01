<?php /* Smarty version Smarty-3.0.8, created on 2015-05-08 13:33:11
         compiled from "E:\wamp\www\votesystem/tpl\discover3.html" */ ?>
<?php /*%%SmartyHeaderCode:31580554c9ef74bf292-95254888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd605f8936a8e36a3198526b3e955a926f7b0a53f' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\discover3.html',
      1 => 1431066057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31580554c9ef74bf292-95254888',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>发现</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/discover.css">
    
    
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
                <li><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'resultPage'),$_smarty_tpl);?>
">结果</a></span></li>
                <li><a href="javascript:void(0)">发现</a></li>
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
                    <li>下面哪一本比较适合安卓开发初学者</li>
                    <li>合肥最好的图书馆是哪家</li>
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

    <div class="discovertcard">
        <div class="discoverleft">
            <ul>
                <li>
                    <div class="disvotetop">
                        <p>
                            软件学院2013级毕业旅行地点选择
                        </p>
                    </div>
                    <div class="discovercard">
                        <div class="votecount">
                            已有<span> 250 </span>人投票
                        </div>
                        <div class="voteremaintime">
                            还剩<span> 1 </span>分钟
                        </div>
                        <div class="closediscard"></div>
                    </div>
                </li>

                <li>
                    <div class="disvotetop">
                        <p>
                            软件学院2013级毕业旅行地点选择
                        </p>
                    </div>
                    <div class="discovercard">
                        <div class="votecount">
                            已有<span> 250 </span>人投票
                        </div>
                        <div class="voteremaintime">
                            还剩<span> 1 </span>分钟
                        </div>
                        
                    </div>
                    <div class="closediscard"></div>
                </li>
            </ul>
        </div>

        <div class="discoverright">
            <ul>
                <!-- <li>
                    <div class="disvoteovertop">
                        <p>
                            XX中学校草选举大赛
                        </p>
                    </div>
                    <div class="discovercard">
                       <ol>
                            <li>                            
                                <div class="cardtitle">黄山</div>
                
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>96票 / 100%</p>
                                </div>
                            </li>
                
                            <li>                            
                                <div class="cardtitle">科大讯飞</div>
                
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>96票 / 100%</p>
                                </div>
                            </li>
                
                            <li>                            
                                <div class="cardtitle">桌游</div>
                
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>96票 / 100%</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </li> 
                
                 <li>
                    <div class="disvoteovertop">
                        <p>
                            XX中学校草选举大赛
                        </p>
                    </div>
                    <div class="discovercard">
                       <ol>
                            <li>                            
                                <div class="cardtitle">黄山</div>
                
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>96票 / 100%</p>
                                </div>
                            </li>
                
                            <li>                            
                                <div class="cardtitle">科大讯飞</div>
                
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>96票 / 100%</p>
                                </div>
                            </li>
                
                            <li>                            
                                <div class="cardtitle">桌游</div>
                
                                <div class="cardresult">
                                    <div class="cardresultdiv"></div>
                                    <p>96票 / 100%</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </li>  -->
            </ul>
        </div>
    </div>


</div>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/discover.js"></script>
</body>
</html>
