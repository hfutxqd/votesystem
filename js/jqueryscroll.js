
$(window).scroll(function(){

$(".header").css("height", 168 + "px");
$(".headerlink").css("top", 19 + "px");
$(".headervoteshow").show(); 
$('.usercard').css("top", 61 + "px");


/*$(".votetop").css("top", 70 + "px");*/

var top = $(document).scrollTop();

if(top == 0)
{
    $(".header").css("height", 112 + "px");
    $(".headerlink").css("top", 70 + "px");
    $(".headervoteshow").hide();
    $('.usercard').css("top", 112 + "px");

}

if(top < 760)
{
    $('.headervoteshow p').text($('.votetitle').eq(0).text());
    /*$('.numlimit').text()*/
    $('.closevote').click(function()
    {
        $("#vote0").hide(1200);
    });
    
}
else
{
    $('.headervoteshow p').text($('.votetitle').eq(1).text());
    $('.closevote').click(function()
    {
        $("#vote1").hide(1200);

    });
}
 
　　/*var scrollTop = $(this).scrollTop();
　　var scrollHeight = $(document).height();
　　var windowHeight = $(this).height();
    
　　if(scrollTop + windowHeight == scrollHeight){
　　　　alert("you are in the bottom");
　　}*/



/*alert($(document.body).scrollTop() )*/
});

