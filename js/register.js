
$(document).ready(function()
{ 
    /*登录页面有效性检测*/   
    $("#loginusername").focus(function()
    {
        $(".passworderrortext").hide();
    });

    $("#loginpsw").focus(function()
    {
        $(".passworderrortext").hide();
    });

    $("#loginbtn").click(function()
    {
        var loginusername = $("#loginusername").val();
        var loginpsw = $("#loginpsw").val();
        var ischecked = $("#remerbercheck").prop("checked");

        if(loginusername.length > 0 && loginusername.length < 4)
        {
            $(".passworderrortext").show();
        }

        if(loginpsw.length > 0 && loginpsw.length < 4)
        {
            $(".passworderrortext").show();
        }

        if(loginusername.length >= 4 && loginpsw.length >= 6)
        {
            $.ajax({
                async:false,
                type: "POST",
                url: "http://localhost/votesystem/index.php?c=main&a=logingo",
                data:{user_id:loginusername, user_password:loginpsw, remember: ischecked},
                dataType: "text",     
                success: function(value) 
                {
                    var result = eval("("+value+")");
                    
                    if(result.success)
                    {
                        $(".passworderrortext").hide();
                        location.href ="http://localhost/votesystem/index.php?c=main&a=index";
                    }
                    else
                    {                        
                        $(".passworderrortext").show();
                    }                        
                },
               error: function() 
               {
                    alert("login ajax submit error");
                }
            }); 
        }
        
    });

    /*登录页面有效性检测结束*/


    /*注册页面有效性检测*/     
    var useristrue = false; /*用户名是否正确*/
    var pswistrue = false; /*密码是否正确*/
    $("#username").focus(function()
    {
        $("#username").removeClass('inputerror').addClass('logininput');
        $(".usernamerrortext").text("");
    });

    $("#username").blur(function()
    {
        var firstchar = $("#username").val().substring(0, 1);    
        var namelength = $("#username").val().length;
        var username = $("#username").val();
        
        if (!username.match( /^[a-zA-Z0-9_]+$/)) 
        {
            $("#username").removeClass('logininput').addClass('inputerror');
            $(".usernamerrortext").text("用户名只能由英文字母、数字、下划线组成")
            useristrue = false;
        }

        if(namelength <= 0)
        {
            $(".usernamerrortext").text("");
            $("#username").removeClass('inputerror').addClass('logininput');
            useristrue = false;
        }
        
        if(namelength > 0 && namelength < 4)
        {
            $("#username").removeClass('logininput').addClass('inputerror');
            $(".usernamerrortext").text("用户名过短，应不少于4个字符");
            useristrue = false;
        }

        if(firstchar.match( /^[0-9_]/) && $("#username").val().length > 0)
        {
            $("#username").removeClass('logininput').addClass('inputerror');
            $(".usernamerrortext").text("用户名首字符不能为数字或下划线");
            useristrue = false;
        }
        
        if(namelength > 14)
        {
            $("#username").removeClass('logininput').addClass('inputerror');
            $(".usernamerrortext").text("用户名过长");
            useristrue = false;
        }
       
        if(isNaN(firstchar) && namelength > 4 && namelength < 14)
        {
            $.ajax({
                async:false,
                type: "POST",
                url: "http://localhost/votesystem/index.php?c=main&a=isNameExist",
                data:{user_nkname:username},
                dataType: "text",            
                success: function(value) {
                    var result = eval("("+value+")");
                    if(!result.avalible)
                    {
                        $("#username").removeClass('logininput').addClass('inputerror');
                        $(".usernamerrortext").text("用户名已存在");
                        useristrue = false;
                    }
                    else
                    {
                        $(".usernamerrortext").text("");
                        useristrue = true;
                    }
                },
                error:function()
                {
					
                    alert("注册 Ajax 提交错误");
                }   
            });            
        }       
    });
    
    $("#psw").focus(function()
    {
        $("#psw").removeClass('inputerror').addClass('logininput');
        $(".pswerrortext").text("");
    });

    $("#psw").blur(function()
    {
        if($("#psw").val().length > 0 && $("#psw").val().length < 6)
        {
            $("#psw").removeClass('logininput').addClass('inputerror');
            $(".pswerrortext").text("密码长度过短，应不少于6个字符");
            pswistrue = false;
        }
        else if($("#psw").val().length > 14)
        {
            $("#psw").removeClass('logininput').addClass('inputerror');
            $(".pswerrortext").text('密码长度过长，应不多于16个字符');
            pswistrue = false;
        }
        else
        {
            $("#psw").removeClass('inputerror').addClass('logininput');
            $(".pswerrortext").text("");
            pswistrue = true;
        }
    });

    $("#confirmpsw").focus(function()
    {
        $("#confirmpsw").removeClass('inputerror').addClass('logininput');
        $(".confirmpswerrortext").hide();
    });

    $("#confirmpsw").blur(function()
    {
        if($("#psw").val() != $("#confirmpsw").val() && $("#confirmpsw").val().length > 0)
        {
            $("#confirmpsw").removeClass('logininput').addClass('inputerror');
            $(".confirmpswerrortext").show();
            pswistrue = false;
        }

        if($("#psw").val() == $("#confirmpsw").val())
        {
            $("#confirmpsw").removeClass('inputerror').addClass('logininput');
            $(".confirmpswerrortext").hide();
            pswistrue = true;
        }
    });



    $("#submitbtn").click(function()
    {
        if(useristrue && pswistrue)
        {          
            var username = $("#username").val();
            var psw = $("#psw").val();
            var confirmpsw = $("#confirmpsw").val();
            $.ajax({
                async:false,
                type: "POST",
                url: "http://localhost/votesystem/index.php?c=main&a=registergo",
                data:{user_nkname:username, user_password:psw, user_password2:confirmpsw},
                dataType: "text",            
                success: function(value) {
                    var result = eval("("+value+")");
                    if(result.success)
                    {
                        location.href = "http://localhost/votesystem/index.php?c=main&a=index";
                    }
                },
                error:function()
                {
                    alert("Ajax 提交错误");
                }   
            }); 
            
        }
    }); 

    /*注册页面有效性检测结束*/
    
});

