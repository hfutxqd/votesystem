$(document).ready(function()
{ 
    //主卡片信息获取
    $.ajax({
        //async:false,
        type:"POST",
        url: "http://localhost/votesystem/index.php?c=main&a=getIndexData",
        data:{},
        dataType: "text",
        success:function(value)
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
                               
                    $('.maincard ul').append($('<li id="'+ voteid +'"><div class="votetop"><div class="votetitle">'+ result.content[i].ct_name + '</div><p class="votedetail">' + result.content[i].ct_content +'</p><div class="votetime">还剩<span></span>天<span></span>小时<span></span>分钟</div><div class="closevote"></div><div id="numlimit1" class="numlimit"></div></div><div  class="votecard"><ol></ol></div></li>'));
                    
                    
                    for(var j = 0; j < voteitem.length; j++)
                    {
                        $('.votecard ol').eq(i).append($('<li id="'+ voteitem[j].it_id +'"><div class="checked"></div><img src="' + voteitem[j].it_image + '" alt="单击选中"><div class="cardtext"><a href="javascript:void(0);"><span>' + voteitem[j].it_name + '</span><br/><p>'+voteitem[j].it_content +'</p></a></div></li>'))

                        
                    }

                    selected(voteid, votelimnum);
                    showofftime(voteid);
                    showCardDetail(voteid);
                    closevote(voteid);
                    
                }
            }
            

            //关闭投票函数
            function closevote(voteid)
            {
                $('#' + voteid).find('.closevote').click(function()
                {
                    $('#' + voteid).hide(1200);
                })
            }
            //关闭投票函数结束

            //显示时间函数
            function showofftime(voteid)
            {
                var voteofftimeday = result.rest_time[voteid].day;
                var voteofftimehour = result.rest_time[voteid].hour;
                var voteofftimemin = result.rest_time[voteid].min;
                var voteofftimesec = result.rest_time[voteid].sec;


                var votetimespan = $('#' + voteid).find('.votetime').find('span');
    
                setInterval(function()
                {
                    voteofftimesec--;
                    if(voteofftimesec == -1)
                    {
                        voteofftimemin--;
                        voteofftimesec = 59;
                    }

                    if(voteofftimemin == -1)
                    {
                        voteofftimehour--;
                        voteofftimemin = 59;
                    }
                    votetimespan.eq(0).text(voteofftimeday);
                    votetimespan.eq(1).text(voteofftimehour);
                    votetimespan.eq(2).text(voteofftimemin);
                }, 1000);
            }

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
                        $('.showContenttitle').html(voteitem[i].it_name)
                        $('.showContenttext').html(voteitem[i].it_content);
                    });
                    
                });

                $('.showContent').click(function()
                {
                    $(this).hide();
                })
            }
            //卡片详细内容函数结束
            

            //投票样式函数，显示选中及剩余选项计次
            function selected(voteid, limitnum)
            {
                var obj = $('#' + voteid)
                var num = limitnum;
                var objli = obj.find('li');
                var objimg = $(objli).find('img');
                var objnumlimit = obj.find('.numlimit');
                obj.find('.numlimit').text(num);

                //循环开始
                objli.each(function(i)
                {
                    $(this).ischecked = false;
                    $(this).find('img').mouseover(function()
                    {
                        if(num > 0)
                            $(this).parent().css({border : '1px solid #2baf2b'});
                    });

                    $(this).find('img').mouseout(function()
                    {
                        $(this).parent().css({border : '1px solid #f0f0f0'});
                    });

                    //点击图片选中
                    $(this).find('img').click(function()
                    {
                        if(num > 0)
                        {
                            num--;
                            $(this).prev().show();
                            objnumlimit.text(num);
                            objli[i].ischecked = true;
                        }
                        
                        if(num == 0)
                        {
                            objnumlimit.text('');
                            objnumlimit.removeClass('numlimit').addClass('voteover');
                             objnumlimit.click(function(){
                                var checkeditemid = new Array(limitnum);
                                var k = 0;
                                objli.each(function(j)
                                {
                                    if(objli[j].ischecked)
                                    {
                                        checkeditemid[k] = objli[j].id;
                                        k++;
                                    }
                                });
                                
                                //投票完成数据上传
                                $.ajax({
                                    async:false,
                                    type: "POST",
                                    url: "http://localhost/votesystem/index.php?c=user&a=vote",
                                    data:{it:JSON.stringify(checkeditemid), ct:voteid},
                                    dataType: "text",     
                                    success: function(value) 
                                    {
                                        var result1 = eval("("+value+")");
                                        
                                        if(result1.success)
                                           {
                                            $('.showvotesucess').show();
                                            setTimeout(function()
                                            {
                                                $('.showvotesucess').hide('slow');
                                            }, 3000)
                                            $('#' + voteid).hide(1200);
                                            } 

                                    },
                                   error: function() 
                                   {
                                        alert("vote ajax submit error");
                                    }
                                }); 
                
                            });   
                        }
                    });
                    //点击图片选中结束

                    $(this).find('.checked').click(function()
                    {
                        $(this).parent().css({border : '1px solid #f0f0f0'});
                        $(this).hide();
                        num++;
                        objnumlimit.text(num);
                        objnumlimit.removeClass('voteover').addClass('numlimit');
                        objli[i].ischecked = false;
                    });                    
                });
                //循环结束
            }
            //投票样式函数                           
        },
        error:function()
        {
            alert("index ajax submit error");
        }

    });
    //主卡片信息获取结束
});