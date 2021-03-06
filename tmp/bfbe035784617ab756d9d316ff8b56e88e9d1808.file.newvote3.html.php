<?php /* Smarty version Smarty-3.0.8, created on 2015-05-08 13:36:49
         compiled from "E:\wamp\www\votesystem/tpl\newvote3.html" */ ?>
<?php /*%%SmartyHeaderCode:30548554c9fd1884bc8-81639693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfbe035784617ab756d9d316ff8b56e88e9d1808' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\newvote3.html',
      1 => 1431082868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30548554c9fd1884bc8-81639693',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>新建投票</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/newvote.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    
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
                <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discoverPage'),$_smarty_tpl);?>
">投票</a></li>
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
                <!-- <li><span id="userName1"></span></li>
                      <li>2013214376</li>
                      <li>软件学院</li>
                      <li>软件工程</li> 
                      <li>2013 级 2 班</li>    -->      
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
                    <li>XX中学校花选举大赛</li>
                </ul>
            </div>

             <div class="activecard floatleft">
                <p>我发起的投票</p>
                <ul class="ilaunch">
                    <li>Choices的功能应该要有哪些</li>
                    <li>最近的电影哪一部最精彩</li>
                </ul>
            </div>
            
            
            <div class="newvote"></div>
        </div>
        <div class="closevote"></div>
        
    </div>

    <!-- 新建投票卡片 -->    
    <div class="newvotecard">
       <div class="newvotecardtop">
           <input class="newvotetitle" type="text" placeholder='请在这里输入标题' />
            <textarea class="newvotedetail" placeholder='请在这里输入对投票的详细描述'></textarea> 
          <div class="newvotesetbtn"></div>
          <div class="newvoteclosesetbtn"></div>
          <div class="newvotesubmit"></div>
       </div>
  
        <!-- 新建投票详细设置 -->
       <div class="setdetail">
          <div class="newvotesetdetailsubmit"></div>
           <div class="votenumlimit">
               <p class="votesetcardtitle">投票者需要选择</p>
               <div class="votesetcardicon"><img src="images/setvote_icon1.png"></div>
               <input class="votenumlimitnum" placeholder='2'>
               <p class="votenumlimittext">个选项</p>
            </div>
       
            <div class="newvotetime">
               <p class="votesetcardtitle">投票截止于</p>
               <div class="votesetcardicon"><img src="images/setvote_icon2.png"></div>
               <select class="selectyear">
                   <option value="2015">2015年</option>
                   <option value="2016">2016年</option>
                   <option value="2017">2017年</option>
                   <option value="2018">2018年</option>
               </select>
       
               <select class="selectmonth">
                   <option value="01">1月</option>
                   <option value="02">2月</option>
                   <option value="03">3月</option>
                   <option value="04">4月</option>
                   <option value="05" selected="selected">5月</option>
                   <option value="06">6月</option>
                   <option value="07">7月</option>
                   <option value="08">8月</option>
                   <option value="09">9月</option>
                   <option value="10">10月</option>
                   <option value="11">11月</option>
                   <option value="12">12月</option>
               </select>
               <input class="newvotesetday" placeholder='2'>
               <p class="newvotesetdaytext">日</p>
       
               <input class="newvotesethour" placeholder='22'>
               <span>:</span>
               <input class="newvotesetminute" placeholder='06'>
            </div>
       
            <div class="newvotearea">
               <p class="votesetcardtitle">投票者范围</p>
               <div class="votesetcardicon"><img src="images/setvote_icon3.png"></div>
               <div class="newvoteareaselect">
                   <select id="ctschool" class="selectcollege">
                       <option>全部学院</option>
                       <option>软件学院</option>
                       <option>数学学院</option>
                       <option>仪器学院</option>
                   </select>
       
                   <select id="ctclass" class="selectcollege">
                       <option>全部专业</option>
                       <option>软件工程</option>
                       <option>机械制造</option>
                       <option>车辆工程</option>
                   </select>
       
                   <select id="ctgrade" class="selectcollege">
                       <option>全部年级</option>
                       <option>2012级</option>
                       <option>2013级</option>
                       <option>2014级</option>
                       <option>2015级</option>
                       
                   </select>
               </div>
               
               <input class="newvotesetclass" placeholder='2'>
               <p class="newvotesetclasstext">班</p>
            </div>
       
            <div class="newvotesetpsw">
               <p class="votesetcardtitle">投票密码</p>
               <div class="votesetcardicon"><img src="images/setvote_icon4.png"></div>
       
               <div class="newvotesetpswinputarea">
                   <input class="newvotesetpswinput" placeholder='密码'>
                   <!-- <input class="newvotesetpswinput" placeholder='确认密码'> -->
               </div>               
            </div>
        </div>
        <!-- 新建投票详细设置结束 -->

        <div class="newvotecardbottom">
           <ul>
               <!-- <li>
                   <img src="images/huangshan.jpg" alt="单击选中">
                    <div class="cardtext">
                        <a href="#"><span>黄山</span><br/>
                        <p>奇松怪石，云雾仙境。<br/>日出日陨，曲径幽兰。<br/>好吧，其实最重要的是这个：黄山离咱最近~</p></a>
                    </div>  
               </li> -->
               <li class="newcard"></li>
           </ul>
       </div>
    </div>

    <div class="newcarddetailset">
        
      <form class="newcardetailimg" method="post" action="http://localhost/votesystem/index.php?c=user&a=upload" enctype="multipart/form-data">
        <input class="unloadimg" type="file" name="it_image">
      </form>

      <div class="previewimg">
        <img src="">
      </div>

        <div class="newcardsetover"></div>
        <div class="newcardtext">
            <input class="newcardtitle" type="text" placeholder='请在这里输入标题' />
           <textarea class="newcarddetail" placeholder='请在这里输入对投票的详细描述'></textarea>
        </div>
        
    </div>

    <!-- 新建投票卡片结束 -->   

</div>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/newvote.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-form.js"></script>

</body>
</html>
