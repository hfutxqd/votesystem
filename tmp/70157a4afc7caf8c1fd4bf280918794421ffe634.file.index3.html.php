<?php /* Smarty version Smarty-3.0.8, created on 2015-05-09 05:59:00
         compiled from "E:\wamp\www\votesystem4/tpl\index3.html" */ ?>
<?php /*%%SmartyHeaderCode:18049554d860443d9d7-80768985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70157a4afc7caf8c1fd4bf280918794421ffe634' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem4/tpl\\index3.html',
      1 => 1431081740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18049554d860443d9d7-80768985',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>正在进行</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/newvote.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    
</head>
<body>
<div class="box">
    <div class="background"></div>
    <div class="showvotesucess"><p>投票成功</p></div>

    <!-- <div class="header-wrapper"></div>   -->
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
                <li><a href="javascript:void(0)">正在进行</a></li>
                <li><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'resultPage'),$_smarty_tpl);?>
">结果</a></span></li>
                <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discoverPage'),$_smarty_tpl);?>
">发现</a></li>
            </ul>
            </div>

            <div class="dynamicbutton floatright">
                <div id="userName" class="dynamicusername floatleft"></div>
                <div class="dynamiccircle floatright">软</div>
            </div>
        </div>

        <div class="headervoteshow">
            <p></p>
               
            <div class="closevote"></div>
            <!-- <div class="numlimit"></div> -->
        </div>
    </div>
    

    

    <div class="usercard">
        <div class="usercircle">软</div>
        <div class="userinformation">
            <ul>
               <!-- <li><span id="userName1">fffffffff</span></li>
                    <li>2013214376</li>
                    <li>软件学院</li>
                    <li>软件工程</li> 
                    <li>2013 级 2 班</li>  -->       
            </ul>
        </div>
        <div class="editoroption">
            <a href="#">上传图片</a>
            <a href="#">选择颜色</a>
        </div>
        <div class="usergrade">
            <div class="floatleft"><span>当选率</span></div>
            <div class="floatright"><span>积分</span></div>
        </div>
        <div class="logout">
            <div id="loginbtn" class="floatleft"><span>注销</span></div>
            
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
                    <!-- <li>
                       <div class="ilaunchtitle">Choices的功能应该要有哪些</div>
                       <ol>
                           <li>1st 投票 0票</li>
                           <li>1st 投票 0票</li>
                           <li>1st 投票 0票</li>
                       </ol>
                       
                    </li> -->
                    
                </ul>
            </div>

             <div class="activecard floatleft">
                <p>我发起的投票</p>
                <ul class="ilaunch">
                    <!-- <li>
                       <div class="ilaunchtitle">Choices的功能应该要有哪些</div>
                       <ol>
                           <li>1st 投票 0票</li>
                           <li>1st 投票 0票</li>
                           <li>1st 投票 0票</li>
                       </ol>
                       
                    </li>
                    
                    <li>
                       <div class="ilaunchtitle">Choices的功能应该要有哪些</div>
                       <ol>
                           <li>1st 投票 0票</li>
                           <li>1st 投票 0票</li>
                           <li>1st 投票 0票</li>
                       </ol>
                       
                    </li> -->
                    
                    
                </ul>
            </div>
            
            
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'newvote'),$_smarty_tpl);?>
" class="newvotebtn"></a>
        </div>

        <div class="editorcard">
            <div class="editordiv floatleft">
                <p>颜色板</p>
                <img src="images/editor_icon1.png">
                <div class="editorcolor">               
                    <ul>
                        <li style="background:#e51c23;" value="#e51c23"></li>
                        <li style="background:#e91e63;"></li>
                        <li style="background:#e91e63;"></li>
                        <li style="background:#ffd135;"></li>
                        <li style="background:#2196f3;"></li>
                        <li style="background:#3f51b5;"></li>
                        <li style="background:#9c27b0;"></li>
                        <li style="background:#009688;"></li>
                        <li style="background:#4caf50;"></li>
                        <li style="background:#795548;"></li>
                        <li style="background:#9e9e9e;"></li>
                        <li style="background:#000000;"></li>
                    </ul>
                </div>

                <div class="likecolorp">输入您喜欢的颜色</div>
                <input type="text" id="lickcolor" class="likecolorinput" />
            </div>

            <div class="editordiv floatleft">
                <p>编辑个人信息</p>
                <img src="images/editor_icon2.png">
                <div class="newvoteareaselect">
                    <span>专业</span>
                   <select id="zhuanye" class="editorcollege">
                       <option>全部学院</option>
                       <option>软件学院</option>
                       <option>数学学院</option>
                       <option>外语学院</option>
                   </select>
                    <span>年级</span>
                   <select id="nianji" class="editorcollege">
                       <option>2011</option>
                       <option>2012</option>
                       <option>2013</option>
                       <option>2014</option>
                   </select>
                    <span>班级</span>
               </div>
               <input id="class" class="editorclass" placeholder='2'>
            </div>

             <div class="editordiv floatleft">
                <p>修改个人信息</p>              
                <img src="images/editor_icon3.png">              
                
                <div class="editorpsw">
                   <span>旧密码</span><br/>
                   <input class="editorpswinput" /><br/>
                    <span>新密码</span><br/>
                   <input class="editorpswinput" type="password" /><br/>
                   <span>确认新密码</span><br/>
                   <input class="editorpswinput" type="password"/>
               </div> 
            </div>
            
            <div class="editorover"></div>
        </div>
        <div class="closevote"></div>
    </div>
    
    <div class="maincard">
        <ul>
            

            <!-- <li id="vote1">
                <div class="votetop">
                    <div class="votetitle">
                        软件学院2013级毕业旅行地点选择
                    </div>
                    <p class="votedetail">
                    选3个你最想去的地方，班长大人和班委会根据结果定好毕业旅行的地址。好不容易毕业了，大家一起出去玩玩，可以留下美好的回忆啊。咱们一生都会是好朋友哒~原谅我们只能去国内旅游，班长大人不出钱啊。。
                    </p>
            
                    <div class="votetime">
                        还剩<span>6</span>小时<span>23</span>分钟
                    </div>
            
                    <div id="closevote1" class="closevote"></div>
                    <div id="numlimit1" class="numlimit"></div>
                </div>
            
                <div id="vote" class="votecard">
                    <ul>
                    <li> 
                        <div class="checked"></div>           
                        <img src="images/huangshan.jpg" alt="单击选中">
                        <div class="cardtext">
                            <a href="#"><span>黄山</span><br/>
                            <p>奇松怪石，云雾仙境。<br/>日出日陨，曲径幽兰。<br/>好吧，其实最重要的是这个：黄山离咱最近~</p></a>
                        </div>   
            
                    </li>
                    
                    <li >
                        <div class="checked"></div>
                        <img src="images/zhangqi.jpg">
                        <div class="cardtext">
                            <a href="#"><span>张启</span> <br/>
                            <p>让二班每个人都不挂科<br/>让二班每个人都能过上好日子，走上人生巅峰</p>
                            </a>
                        </div>
                    </li>
            
                    <li >
                        <div class="checked"></div>
                        <img src="images/xunfei.jpg">
                        <div class="cardtext">
                            <a href="#"><span>科大讯飞</span> <br/>
                            <p>让世界聆听你的声音<br/>Let the world hear your speech.<br/>专注语音技术三十年</p></a>
                        </div>
                    </li>
            
                    <li >
                        <div class="checked"></div>
                        <img src="images/zhuoyou.jpg">
                        <div class="cardtext">
                            <a href="#"><span>桌游</span> <br/>
                            <p>桌游听过吗？<br/>炉石传说！三国杀！天黑请闭眼！麻将！斗地主！<br/>让你真的笑，笑出声。</p></a>
                        </div>
                    </li>
            
                    <li >
                        <div class="checked"></div>
                        <img src="images/lizi.jpg">
                        <div class="cardtext">
                            <a href="#"><span>举个栗子</span> <br/>
                            <p>方便地选择是用户的大事，大快所有人心的大好事。<br/>请认真地玩弄这个psd吧！</p></a>
                        </div>
                    </li>
            
            
            
            
                </div>
            </li> -->

            <!-- 投票2 -->
            <!-- <li id="vote2"> 
                <div class="votetop">
                    <div class="votetitle">
                        软件学院2013级毕业旅行地点选择
                    </div>
                    <p class="votedetail">
                    选3个你最想去的地方，班长大人和班委会根据结果定好毕业旅行的地址。好不容易毕业了，大家一起出去玩玩，可以留下美好的回忆啊。咱们一生都会是好朋友哒~原谅我们只能去国内旅游，班长大人不出钱啊。。
                    </p>
            
                    <div class="votetime">
                        还剩<span>6</span>小时<span>23</span>分钟
                    </div>
            
                    <div class="closevote"></div>
                    <div class="numlimit">2</div>
                </div>
            
                <div class="votecard">
                    <ul>
                        <li>
                            <div class="checked"></div>               
                            <img src="images/huangshan.jpg" alt="单击选中">
                            <div class="cardtext">
                                <a href="#"><span>黄山</span><br/>
                                <p>奇松怪石，云雾仙境。<br/>日出日陨，曲径幽兰。<br/>好吧，其实最重要的是这个：黄山离咱最近~</p></a>
                            </div>   
                
                        </li>
                        
                        <li >
                            <div class="checked"></div>
                            <img src="images/zhangqi.jpg">
                            <div class="cardtext">
                                <a href="#"><span>张启</span> <br/>
                                <p>让二班每个人都不挂科<br/>让二班每个人都能过上好日子，走上人生巅峰</p>
                                </a>
                            </div>
                        </li>
                
                        <li >
                            <div class="checked"></div>
                            <img src="images/xunfei.jpg">
                            <div class="cardtext">
                                <a href="#"><span>科大讯飞</span> <br/>
                                <p>让世界聆听你的声音<br/>Let the world hear your speech.<br/>专注语音技术三十年</p></a>
                            </div>
                        </li>
                
                        <li >
                            <div class="checked"></div>
                            <img src="images/zhuoyou.jpg">
                            <div class="cardtext">
                                <a href="#"><span>桌游</span> <br/>
                                <p>桌游听过吗？<br/>炉石传说！三国杀！天黑请闭眼！麻将！斗地主！<br/>让你真的笑，笑出声。</p></a>
                            </div>
                        </li>
                
                        <li >
                            <div class="checked"></div>
                            <img src="images/lizi.jpg">
                            <div class="cardtext">
                                <a href="#"><span>举个栗子</span> <br/>
                                <p>方便地选择是用户的大事，大快所有人心的大好事。<br/>请认真地玩弄这个psd吧！</p></a>
                            </div>
                        </li>
                    </ul>
            
                </div>
            </li> -->
            
            
        </ul>        
    </div>

    <div id="show" class="showContent">
        <!-- <img src="images/huangshan.jpg"> -->
        <img src="">
        <!-- <div class="showContentcheck"></div> -->
        <div class="showContenttitle"></div>
        <div class="showContenttext"><!-- 桌游听过吗？
            炉石传说！三国杀！天黑请闭眼！麻将！斗地主！
            让你真的笑，笑出声。
            我们说到桌上游戏，它可以泛指诸如棋类、牌类、益智游戏等以至于如沙盘推演的战棋、谈判游戏等。好的桌上游戏有几个特点，一个就是会与人产生互动；另一个就是要动脑。记得小时候玩过的象棋、陆军棋、跳棋或是斗兽棋，这些都是属于这种要思考有互动的游戏。桌上游戏至今已经出现数万种不同的游戏[根据BGG上登录的游戏，至2006.2.9为止总共有21117种]，有简单的给婴幼儿玩的，到复杂的需要玩1 个星期的战争游戏，可说无所不包，只要你喜欢玩游戏，几乎都可以找到你喜欢的类型。 -->
        </div>
    </div>

</div>
<!-- <script type="text/javascript" src="js/move.js"></script> -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/jqueryscroll.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>
