
$(document).ready(function() {
    
    /*首页效果*/
    //搜索设置

    var searchinputIsshow = false;
    var isfocus = false;

    $('body').click(function()
    {
        if(isfocus == false) 
        {
            $(".search input").hide("slow");
            $('.aboutus').show();
            $('.toprighticon').css({right:20});
            searchinputIsshow = false;
        }        
    });

    $('.search input').focus(function()
    {
        isfocus = true;
    })

    $('.search input').blur(function()
    {
        isfocus = false;
    })
    

    $(".searchlogo").click(function(ev)
    {
        var oEvent=ev||event;
        oEvent.stopPropagation();  //消除事件冒泡

        if(searchinputIsshow == false)
        {
           
            $(".search input").show("slow");
            searchinputIsshow = true;
            $('.aboutus').hide();
            $('.toprighticon').css({right:0});
        }
        else
        {
            
            var inputswd = $('#searchinput').val();
            alert(inputswd);
            /*$.ajax({
                async:false,
                type: "POST",
                url: "http://localhost/votesystem/index.php?c=main&a=search",
                data:{swd:},
                dataType: "text",     
                success: function(value) 
                {
                    var result3 = eval("("+value+")");
                    
                    if(result3)
                    {
                       $(".usercard").slideUp();               
                    }
                },
               error: function() 
               {
                    alert("user information ajax submit error");
                }
            });*/
        }
       
    });

    //搜索设置结束


    //用户名及用户名卡片事件
    $(".dynamicusername").click(function()
    {
        $(".usercard").slideDown();
        $(".dynamicusername").hide();
        $(".dynamiccircle").hide();
    });

    $(".dynamiccircle").click(function()
    {
        $(".usercard").slideDown();
        $(".dynamicusername").hide();
        $(".dynamiccircle").hide();
    });

    $(".usercard .closevote").click(function()
    {
        $(".usercard").slideUp();
        $(".dynamicusername").show();
        $(".dynamiccircle").show();

        setTimeout(function()
        {
            $(".logout").show();
            $(".usergrade").show();
            $(".userinformation").show();
            $(".useractive").show();
            $('.editorcard').hide();
            $('.editoroption').hide();
        }, 500);
    })

    $(".editor").click(function()
    {
        $(".logout").hide();
        $(".usergrade").hide();
        $(".userinformation").hide();
        $(".useractive").hide();
        $('.editorcard').show();
        $('.editoroption').show();
    })



    //顶部标签状态效果
    var headerlis = $(".headerlink li");


    headerlis.eq(0).mouseover(function()
    {
        $(".square1").animate({left:0}, 300);
        $(".square1").css({background : "#5677fc"});
    });

    headerlis.eq(1).mouseover(function()
    {
        $(".square1").animate({left:122}, 300);              
        $(".square1").css({background : "#2baf2b"});
    });

    /*headerlis.eq(1).mouseout(function()
    {
        
        if(isoverul == false)
        {
            
            $(".square1").animate({left:0}, 300);
            $(".square1").css({background : "#5677fc"});
        }
       
    });*/
    //顶部标签状态效果结束

    headerlis.eq(2).mouseover(function()
    {
        $(".square1").animate({left:218}, 300);
        $(".square1").css({background : "#7280b7"});
    });

   
//用户卡片中的信息获取
    
    //用户信息获取
    $.ajax({
        async:false,
        type: "POST",
        url: "http://localhost/votesystem/index.php?c=user&a=getUserInfo",
        data:{},
        dataType: "text",     
        success: function(value) 
        {
            var result2 = eval("("+value+")");
            //console.log(result2);
            
            if(result2)
            {
               $('.logout').show();
               $('.dynamicusername').text(result2.user_nkname);
               $('.userinformation ul').append($('<li><span id="userName1">' + result2.user_nkname + '</span></li><li>'+result2.user_id+'</li><li>'+result2.user_school+'</li><li>'+result2.user_class+'</li><li>'+ result2.user_grade+' 级 '+result2.user_room+' 班</li><li><a href="#">实名认证</a></li>'));
            }

            if(!result2.user_name)
            {
                alert('您还没有进行实名认证，只能浏览该网站，不能进行任何操作。请到用户中心进行实名认证！')
            }
        },
       error: function() 
       {
            alert("user information ajax submit error");
        }
     });

    //用户信息获取结束

    //用户注销
    $('#loginbtn').click(function()
    {
        $.ajax({
            async:false,
            type: "POST",
            url: "http://localhost/votesystem/index.php?c=main&a=logout",
            data:{},
            dataType: "text",     
            success: function(value) 
            {
                var result3 = eval("("+value+")");
                
                if(result3)
                {
                   $(".usercard").slideUp();               
                }
            },
           error: function() 
           {
                alert("user information ajax submit error");
            }
         });
    })
    //用户注销结束


    //编辑用户信息

    var colorli = $('.editorcolor').find('li');
    colorli.each(function(i)
    {
        $(this).mouseover(function()
        {
            $('.usercircle').css('background',$(this).css('backgroundColor'));
        });

        $(this).mouseout(function()
        {
            $('.usercircle').css('background', '#ffd135');
        });

        $(this).click(function()
        {
            $('.likecolorinput').val($(this).css('backgroundColor'));
        })
    });
    
    /**/



    $('.editorover').click(function()
    {
        var colorvalue = $("#lickcolor").val();
        var zhuanye = $('#zhuanye').val();
        var nianji = $('#nianji').val();
        var class_room = $('.editorclass').val();
        
        $.ajax({
            async:false,
            type: "POST",
            url: "http://localhost/votesystem/index.php?c=user&a=editUserInfo",
            data:{/*major:zhuanye,grade:nianji,classroom:class_room, color: '#ff00ff'*/},
            dataType: "text",     
            success: function(value) 
            {
                var result = eval("("+value+")");
                console.log(result);
                if(result.success)
                {
                    alert('编辑成功')
                }
                else
                {
                    alert(result.success)
                }
            },
           error: function() 
           {
                alert("user information editor ajax submit error");
            }
         });
    })
    //编辑用户信息提交结束


    //用户参与的投票数据获取
    $.ajax({
        async:false,
        type: "POST",
        url: "http://localhost/votesystem/index.php?c=user&a=partResult",
        data:{},
        dataType: "text",     
        success: function(value) 
        {
            var result = eval("("+value+")");
            //console.log(result);
            
            if(result.content != null)
            {
                for(var i = 0; i < result.content.length; i++)
                {
                    var voteid = result.content[i].ct_id;
                    var votelimnum = result.content[i].ct_type;
                    var voteitem = result.items[voteid];

                       
                    $('.voteresult').append($('<li><div class="ilaunchtitle">'+result.content[i].ct_name+'</div><ol></ol>'));

                    for(var j = 0; j < 3; j++)
                    {
                        $('.voteresult li ol').eq(i).append($('<li>'+(j+1)+' '+ voteitem[j].it_name +' ' +voteitem[j].it_count +'票</li>'));
                    }                   
                }
            }
        },
       error: function() 
       {
            alert("user vote information ajax submit error");
        }
    });
  
    //用户参与的投票数据获取结束

    //用户发起的投票数据获取
    
    $.ajax(
    {
        async:false,
        type: "POST",
        url: "http://localhost/votesystem/index.php?c=user&a=myVote",
        data:{},
        dataType: "text",     
        success: function(value) 
        {
            var result = eval("("+value+")");
            //console.log(result);
            if(result.content != null && result.success)
            {
                for(var i = 0; i < result.content.length; i++)
                {
                    var voteid = result.content[i].ct_id;
                    var votelimnum = result.content[i].ct_type;
                    var voteitem = result.items[voteid];

                       
                    $('.ilaunch').append($('<li><div class="ilaunchtitle">'+result.content[i].ct_name+'</div><ol></ol>'));

                    if(voteitem.length >= 3)
                    {
                        for(var j = 0; j < 3; j++)
                        {
                            $('.ilaunch li ol').eq(i).append($('<li>'+(j+1)+' '+ voteitem[j].it_name +' ' +voteitem[j].it_count +'票</li>'));
                        }
                    }

                    else
                    {
                        for(var j = 0; j < voteitem.length; j++)
                        {
                            $('.ilaunch li ol').eq(i).append($('<li>'+(j+1)+' '+ voteitem[j].it_name +' ' +voteitem[j].it_count +'票</li>'));
                        }
                    }
                    
                    
                                  
                }
            }
            
        },
       error: function() 
       {
            alert("user vote information ajax submit error");
        }
    });
  
    //用户发起的投票数据获取结束

//用户卡片中的信息获取结束
});