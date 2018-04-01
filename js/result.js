//关闭投票函数
function closevote(voteid)
{
    $('#' + voteid).find('.closevote').click(function()
    {
        $('#' + voteid).hide(1200);
    })
}
//关闭投票函数结束

//卡片详细内容函数
function showCardDetail(voteid)
{
    var voteitem = result.items[voteid];
    var oCradtexta = $('#' + voteid).find('.cardtext').find('a');
    
    oCradtexta.each(function(i)
    {
        $(this).click(function()
        {
            $('.showContent').show();
            $('.showContent img').attr("src", voteitem[i].it_image);
            $('.showContenttext').text(voteitem[i].it_content);
        });
        
    });

    $('.showContent').click(function()
    {
        $(this).hide();
    })
}
//卡片详细内容函数结束


$(document).ready(function() {
    $(".square1").css({left:122});              
    $(".square1").css({background : "#2baf2b"});

    //用户发起的投票获取
    var launchvotenum  = 0;
    $.ajax(
    {
        type: "POST",
        data:{},
        url: "http://localhost/votesystem/index.php?c=user&a=result",
        dataType: "text",
        success:function(value)
        {
            var result = eval("("+value+")");
            //console.log(result);

            if(result.content != null)
            {
                launchvotenum = result.content.length;
                for(var i = 0; i < result.content.length; i++)
                {
                    var allcount = 0;
                    var voteid = result.content[i].ct_id;
                    var votelimnum = result.content[i].ct_type;
                    var voteitem = result.items[voteid];

                    for(var j = 0; j < voteitem.length; j++)
                    {
                        allcount += parseInt(voteitem[j].it_count);
                    }
                               
                    $('.resultcard ul').append($('<li id="'+ voteid +'"><div class="resvotetop"><div class="votetitle">'+ result.content[i].ct_name + '</div><p class="votedetail">' + result.content[i].ct_content +'</p><div class="closevote"></div><div class="resnumlimit">'+result.content[i].ct_type+'</div></div><div  class="resvotecard"><ol></ol></div></li>'));
                    
                    
                    for(var j = 0; j < voteitem.length; j++)
                    {
                        $('.resvotecard ol').eq(i).append($('<li id="'+ voteitem[j].it_id +'"><div class="cardtextname"><div class="usercheckcircle">软</div><div class="cardtitle">'+voteitem[j].it_name+'</div></div><div class="cardresult"><div class="cardresultdiv"></div><p>'+voteitem[j].it_count+'票 / '+ parseInt(voteitem[j].it_count/allcount*100)+'%</p></div></li>')); 
                    }

                    for(var j = 0; j < voteitem.length; j++) //改变前三名背景颜色
                    {  
                        if(j == 0)
                        {
                            $('.resvotecard ol').eq(i).find('.cardresultdiv').eq(j).css({"background": "#2baf2b"})
                        }

                        if(j == 1)
                        {
                            $('.resvotecard ol').eq(i).find('.cardresultdiv').eq(j).css({"background": "#42bd41"})
                        }

                         if(j == 2)
                        {
                            $('.resvotecard ol').eq(i).find('.cardresultdiv').eq(j).css({"background": "#72d572"})
                        }
                    }

                    for(var j = 0; j < voteitem.length; j++) //改变显示名次的长度
                    {  
                        $('.resvotecard ol').eq(i).find('.cardresultdiv').eq(j).width(700*voteitem[j].it_count/allcount)
                    }

                    //showCardDetail(voteid);
                    closevote(voteid);
                }
            }
        }
    })
    //用户发起的投票获取结束

    //用户参与的投票结果获取
    $.ajax(
    {
        type: "POST",
        data:{},
        url: "http://localhost/votesystem/index.php?c=user&a=partResult",
        dataType: "text",
        success:function(value)
        {
            var result = eval("("+value+")");
            //console.log(result);

            if(result.content != null)
            {
                
                for(var i = 0; i < result.content.length; i++)
                {
                    var allcount = 0;
                    var voteid = result.content[i].ct_id;
                    var votelimnum = result.content[i].ct_type;
                    var voteitem = result.items[voteid];

                    for(var j = 0; j < voteitem.length; j++)
                    {
                        allcount += parseInt(voteitem[j].it_count);
                    }
                               
                    $('.resultcard ul').append($('<li id="'+ voteid +'"><div class="resvotetop"><div class="votetitle">'+ result.content[i].ct_name + '</div><p class="votedetail">' + result.content[i].ct_content +'</p><div class="closevote"></div><div class="resnumlimit">'+result.content[i].ct_type+'</div></div><div  class="resvotecard"><ol></ol></div></li>'));
                    
                    
                    for(var j = 0; j < voteitem.length; j++)
                    {
                        $('.resvotecard ol').eq(i + launchvotenum).append($('<li id="'+ voteitem[j].it_id +'"><div class="cardtextname"><div class="usercheckcircle">软</div><div class="cardtitle">'+voteitem[j].it_name+'</div></div><div class="cardresult"><div class="cardresultdiv"></div><p>'+voteitem[j].it_count+'票 / '+ parseInt(voteitem[j].it_count/allcount*100)+'%</p></div></li>')); 
                    }

                    for(var j = 0; j < voteitem.length; j++) //改变前三名背景颜色
                    {  
                        if(j == 0)
                        {
                            $('.resvotecard ol').eq(i+ launchvotenum).find('.cardresultdiv').eq(j).css({"background": "#2baf2b"})
                        }

                        if(j == 1)
                        {
                            $('.resvotecard ol').eq(i+ launchvotenum).find('.cardresultdiv').eq(j).css({"background": "#42bd41"})
                        }

                         if(j == 2)
                        {
                            $('.resvotecard ol').eq(i+ launchvotenum).find('.cardresultdiv').eq(j).css({"background": "#72d572"})
                        }
                    }

                    for(var j = 0; j < voteitem.length; j++) //改变显示名次的长度
                    {  
                        $('.resvotecard ol').eq(i+ launchvotenum).find('.cardresultdiv').eq(j).width(700*voteitem[j].it_count/allcount)
                    }

                    //showCardDetail(voteid);
                    closevote(voteid);
                }
            }
        }
    })
    //用户参与的投票结果获取结束
});