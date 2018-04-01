$(document).ready(function() {

    /*新建投票效果*/
    //投票选项详细设置按钮效果
   
    $(".newvotesetbtn").click(function()
    {
        $(".setdetail").slideDown();
        $(this).hide();
        $(".newvoteclosesetbtn").show();
        $(".newvotesubmit").hide();
    });

    $(".newvoteclosesetbtn").click(function()
    {
        $(".setdetail").slideUp();
        $(this).hide();
        $(".newvotesetbtn").show();
        $(".newvotesubmit").show('slow');
    });

    $('.newvotesetdetailsubmit').click(function()
    {
        $(".setdetail").slideUp();
        $(".newvoteclosesetbtn").hide();
        $(".newvotesetbtn").show();
        $(".newvotesubmit").show('slow');
    })

    //点击新建卡片效果
    $(".newcard").click(function()
    {
        $(".newcarddetailset").show();
    });

    //上传图片
    var cardtitle = new Array();
    var cardcontent = new Array();
    var imgsrc = new Array();
    var newimgsrc;
    var i = 0;
    $('.unloadimg').change(function(){
       $('.newcardetailimg').ajaxSubmit({
            dataType: 'text',
            success: function (data)
              {
                var result = eval("("+data+")");
              
                if(result)
                {
                    $('.previewimg').show();
                    $('.previewimg img').attr("src", result.message);
                    newimgsrc = result.message;
                }
              }
        });
    })

    //上传图片结束

    $(".newcardsetover").click(function()
    {
        $(".newcarddetailset").hide();
        $('<li><img src="'+newimgsrc +'" alt="单击选中"> <div class="cardtext"><a><span>' + $('.newcardtitle').val() + '</span><p>'+ $('.newcarddetail').val() + '</p></a></div></li>').insertBefore('.newcard');
        $('.previewimg').hide();
        $('.previewimg img').attr("src", '');

        cardtitle[i] = $('.newcardtitle').val();
        cardcontent[i] = $('.newcarddetail').val();
        imgsrc[i] = newimgsrc;
        i++;        
    });

    /*alert($('.selectcollege')[0][0].text);*/
    
  
    

    $('.selectcollege').change(function()
    {
        
        for (var i=0;i<obj.length;i++)
        {
            if (obj.options[i].selected)
            {
                alert(obj.options[i].text);
            }
        }
    });
    var ctlimType = 0;
    $('.newvotesubmit').click(function()
    {
        $('.selectcollege').change(function()
        {
            ctlimType = 1;
        });

        if($('.newvotesetclass').val())
        {
            ctlimType = 1;
        }

        if ($('.newvotesetpswinput').val()) 
        {
            ctlimType = 2;
        }
        var cttype = 1;//默认必须投一个
        var ctname = $('.newvotetitle').val();
        var ctcontent = $('.newvotedetail').val();
        if($('.votenumlimitnum').val())
        {
            cttype = $('.votenumlimitnum').val();
        }
        var itcount = $('.newvotecardbottom').find('li').length - 1;
        var ctschool = $('#ctschool').val();
        var ctclass = $('#ctclass').val();
        var ctgrade = $('#ctgrade').val();
        var ctclassrm = $('.newvotesetclass').val();
        var ctpasswd = $('.newvotesetpswinput').val();

        var mydate = new Date();
        /*alert(mydate)
        alert(mydate.getDate())*/
        var year = $('.selectyear').val();
        var month = $('.selectmonth').val();
        var day, hour, min;
        day = $('.newvotesetday').val();
        hour = $('.newvotesethour').val();
        min = $('.newvotesetminute').val();
        if(!$('.newvotesetday').val())
        {
            day = mydate.getDate() + 1;            
        }
        else
        {
            day = $('.newvotesetday').val();
        }

        if(!$('.newvotesethour').val())
        {
            hour = mydate.getHours();
        }
        else
        {
            hour = $('.newvotesethour').val();
        }
        
        if(!$('.newvotesetminute').val())
        {
            min = mydate.getMinutes();
        }
        else
        {
            min = $('.newvotesetminute').val();
        }

        var ctofftime = year+'-'+month+'-'+day+' '+hour+':'+min;
    
        
        
        if(ctname.length > 0 && ctcontent.length > 0)
        {
            $.ajax(
            {
                type:"POST",
                url: "http://localhost/votesystem/index.php?c=user&a=add_vote",
                data:{ct_type:cttype,ct_limType:ctlimType,ct_name:ctname,ct_content:ctcontent,count:itcount,ct_offtime:ctofftime,ct_school:ctschool,ct_class:ctclass,ct_grade:ctgrade,ct_classrm:ctclassrm,ct_passwd:ctpasswd,it_name:JSON.stringify(cardtitle),it_content:JSON.stringify(cardcontent),it_images:JSON.stringify(imgsrc)},
                dataType: "text",
                success:function(value)
                {
                    var result = eval("("+value+")");
                    if(result.success)
                    {
                        alert('新建投票成功！')
                        location.href ="http://localhost/votesystem/index.php?c=main&a=index";
                    }

                    if(ctlimType == 2)
                    {
                        alert('您设置的为保密投票，请牢记投票密码！您的投票ID为：' + result.message)
                    }
                },
                error:function()
                {
                    alert('new vote Ajax error');
                }
            });
        }
        else
        {
            alert('请正确填写投票的名字和内容')
        }
        
    });

    /*新建投票效果结束*/
});