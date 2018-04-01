function getByClass(sClass){
    var aResult=[];
    var aEle=document.getElementsByTagName('*');

    for(var i=0;i<aEle.length;i++)
    { 
       if(aEle[i].className == sClass)
       {
            aResult.push(aEle[i]);
        }
    }

    return aResult;
};

window.onload = function () {

var oVote1 = document.getElementById('vote1');
var oVote1li = oVote1.getElementsByTagName('li');
var oImg = oVote1.getElementsByTagName('img');
var oVote1lia = oVote1.getElementsByTagName('a');
var oChecked = getByClass('checked'); //获取选中元素的标签
var oNumlimit = document.getElementById('numlimit1');
var oCardText = getByClass('cardtext');

var num = 3; /*假定选票个数*/
var now = -1;
oNumlimit.innerHTML = num;

for(i = 0; i < oImg.length; i++)
{
    oVote1li[i].index = i;
    oChecked[i].index = i;
    oImg[i].index = i;
}

for(i = 0; i < oImg.length; i++)
{
    oImg[i].onmouseover = function()
    {

        now = this.index;
        if(num > 0)
            oVote1li[now].style.border = '1px solid #2baf2b';           
    }

    
    oImg[i].onclick = function()
    {
        now = this.index;        
        if(num > 0)
        {
        num--;
        oChecked[now].style.display = 'block';   
        oNumlimit.innerHTML = num;
        }
        if(num == 0)
        {
            oNumlimit.innerHTML = '';
            oNumlimit.className = 'voteover';
        }
    }
   

    oChecked[i].onclick = function()
    {
        now = this.index;
        oChecked[now].style.display = 'none';
        num++;
        oNumlimit.innerHTML = num;
        oNumlimit.className = 'numlimit';
    }  

    
    oImg[i].onmouseout = function()
    {
        now = this.index;
        oVote1li[now].style.border = '1px solid #f0f0f0';         
    } 
}
}


    /*oCardText[i].onmouseover = function()
    {
        now = this.index;
        oVote1li[now].style.width = 228 + 'px';
        oVote1li[now].style.height = 300 + 'px';
        oVote1li[now].style.marginRight= -24 + 'px';
        oVote1li[now].style.marginBottom= -28 + 'px';

        oImg[now].style.width = 228 + 'px';
        oImg[now].style.height = 170 + 'px';
    }

    oCardText[i].onmouseout = function()
    {
        now = this.index;
        oVote1li[now].style.width = 204 + 'px';
        oVote1li[now].style.height = 272 + 'px';
        oVote1li[now].style.marginRight= 0 + 'px';
        oVote1li[now].style.marginBottom= -37 + 'px';
        oImg[now].style.width = 204 + 'px';
        oImg[now].style.height = 153 + 'px';
    }*/
    
    /*oMaincardlia[i].onclick = function()
    {
        now = this.index;
        oShow.style.display = 'block';
        oShowContent.style.display = 'block';
    }*/



/*var oHeaderlink = document.getElementById('headerlink');
var oHeader = document.getElementById('header');*/
/*oHeader.style.height = 168 + 'px';*/
    /*oHeaderlink.style.top = 19 + 'px';*/


    /*var oHeaderlink = document.getElementById('headerlink'); 
    var oHeaderlinka = oHeaderlink.getElementsByTagName('a');//获取顶部三个链接
    var oSquare1 = document.getElementById('square1'); //获取方块1，实现滑动

    alert(oHeaderlinka.length);*/


	/*var oGuanbi = document.getElementById('guanbi');
	var oDynamiccard = document.getElementById('dynamiccard');
	var oDynamiccardButton = document.getElementById('dynamiccardButton');
	var oButtonstyle1 = document.getElementById('buttonstyle1');
	var oDynamiccardspan = document.getElementById('dynamiccardspan');

	var oMaincard = document.getElementById('maincard');
	var oMaincardtop = document.getElementById('maincardtop');
	var oMaincardbottom = document.getElementById('maincardbottom');
	var oMaincardul = document.getElementById('maincardul');
	var oMaincardli = oMaincardul.getElementsByTagName('li');
    var oImg = oMaincardul.getElementsByTagName('img');
	var oMaincardlia = oMaincardul.getElementsByTagName('a');

	var oShow = document.getElementById('show');
    var oShowContent = document.getElementById('showContent');

    var oChecked = getByClass('checked'); //获取选中元素的标签
    var oCardText = getByClass('cardtext');
     

    var now = -1;
    var isShow = false;//选中效果显示
    var isChecked = false; //是否选中
	for(i = 0; i < oImg.length; i++)
	{
		oMaincardli[i].index = i;
		oChecked[i].index = i;
        oImg[i].index = i;
        oCardText[i].index = i;
        oMaincardlia[i].index = i;
	}

    
	for(i = 0; i < oImg.length; i++)
	{
        
		oImg[i].onmouseover = function()
		{
            now = this.index;
            this.style.opacity = 0.3;            
		}

        oImg[i].onclick = function()
        {
            now = this.index;
            oChecked[now].style.display = 'block';
            isChecked = true;
        }

        oChecked[i].onclick = function()
        {
            now = this.index;
            oChecked[now].style.display = 'none';
            isChecked = false;
        }  

        oImg[i].onmouseout = function()
        {
            //if(isChecked == false)
            //{
                now = this.index;
                this.style.opacity = 1;
          //  }
                       
        }  

        oCardText[i].onmouseover = function()
        {
            now = this.index;
            oMaincardli[now].style.width = 225 + 'px';
            oMaincardli[now].style.marginRight= -5 + 'px';
            oImg[now].style.width = 225 + 'px';
        }

        oCardText[i].onmouseout = function()
        {
            now = this.index;
            oMaincardli[now].style.width = 220 + 'px';
            oMaincardli[now].style.marginRight= 0 + 'px';
            oImg[now].style.width = 220 + 'px';
        }
        
        oMaincardlia[i].onclick = function()
        {
            now = this.index;
            oShow.style.display = 'block';
            oShowContent.style.display = 'block';
        }

	}

    oShow.onclick = function()
    {
        this.style.display = 'none';
    }

	oGuanbi.onclick = function()
	{
		oDynamiccard.style.display = 'none';
		oMaincardtop.style.width = oMaincardtop.offsetWidth + 275 + 'px';
		oMaincard.style.width = oMaincard.offsetWidth + 275 + 'px';
		oMaincardbottom.style.width = oMaincardbottom.offsetWidth + 275 +'px';
		oDynamiccardButton.style.display = 'block';
	}

	oButtonstyle1.onclick = oDynamiccardspan.onclick = function()
	{
		oDynamiccard.style.display = 'block';
		oMaincardtop.style.width = oMaincardtop.offsetWidth - 275 + 'px';
		oMaincard.style.width = oMaincard.offsetWidth - 275 + 'px';
		oMaincardbottom.style.width = oMaincardbottom.offsetWidth - 275 +'px';
		oDynamiccardButton.style.display = 'none';

	}

    var oNewvoteul = document.getElementById('newvoteul');
    var oNewcard = document.getElementById('newcard');

    var node = document.createElement("li");
    oNewcard.onclick = function()
    {
        oNewvoteul.appendChild("li");
    }*/





