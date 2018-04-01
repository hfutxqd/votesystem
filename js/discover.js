//关闭投票函数
function closevote(voteid)
{
    $('#' + voteid).find('.closediscard').click(function()
    {
        $('#' + voteid).hide(1200);
    })
}
//关闭投票函数结束

$(document).ready(function() {
    $(".square1").css({left:218});              
    $(".square1").css({background : "#2baf2b"});

    //获取自由投票结果
    $.ajax(
    {
        type: "POST",
        data:{},
        url: "http://localhost/votesystem/index.php?c=main&a=result",
        dataType: "text",
        success:function(value)
        {
            var result = eval("("+value+")");
            console.log(result);
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
                     
                    $('.discoverright ul').append($('<li id="'+voteid+'"><div class="disvoteovertop"><p>'+result.content[i].ct_name+'</p></div><div class="discovercard"><ol></ol></div><div class="closediscard"></div></li> '));  
                   
                   if(voteitem.length >= 3)
                    {
                       for(var j = 0; j < 3; j++)
                        {
                            $('.discovercard ol').eq(i).append($('<li><div class="cardtitle">'+voteitem[j].it_name+'</div><div class="cardresult"><div class="cardresultdiv"></div><p>'+voteitem[j].it_count+'票 / '+parseInt(voteitem[j].it_count/allcount*100)+'%</p></div></li>')); 
                        }
                    }
                    else
                    {
                        for(var j = 0; j < voteitem.length; j++)
                        {
                            $('.discovercard ol').eq(i).append($('<li><div class="cardtitle">'+voteitem[j].it_name+'</div><div class="cardresult"><div class="cardresultdiv"></div><p>'+voteitem[j].it_count+'票 / '+parseInt(voteitem[j].it_count/allcount*100)+'%</p></div></li>')); 
                        }
                    }
 
                    for(var j = 0; j < voteitem.length; j++) //改变前三名背景颜色
                    {  
                        if(j == 0)
                        {
                            $('.discovercard ol').eq(i).find('.cardresultdiv').eq(j).css({"background": "#2baf2b"})
                        }

                        if(j == 1)
                        {
                            $('.discovercard ol').eq(i).find('.cardresultdiv').eq(j).css({"background": "#42bd41"})
                        }

                         if(j == 2)
                        {
                            $('.discovercard ol').eq(i).find('.cardresultdiv').eq(j).css({"background": "#72d572"})
                        }
                    }

                    for(var j = 0; j < voteitem.length; j++) //改变显示名次的长度
                    {  
                        $('.discovercard ol').eq(i).find('.cardresultdiv').eq(j).width(700*voteitem[j].it_count/allcount)
                    }

                    //showCardDetail(voteid);
                    closevote(voteid);
                }
            }
        }
    });
    //获取自由投票结果结束
});