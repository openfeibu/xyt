function setTab(name,cursel){
	cursel_0=cursel;
	for(var i=1; i<=links_len; i++){
		var menu = document.getElementById(name+i);
		var menudiv = document.getElementById("con_"+name+"_"+i);
		if(i==cursel){
			menu.className="off";
			menudiv.style.display="block";
		}
		else{
			menu.className="";
			menudiv.style.display="none";
		}
	}
}
function Next(){                                                        
	cursel_0++;
	if (cursel_0>links_len)cursel_0=1
	setTab(name_0,cursel_0);
} 
var name_0='one';
var cursel_0=1;
//var ScrollTime=3000;循环周期（毫秒）
var links_len,iIntervalId;
onload=function(){
	var links = document.getElementById("tab1s").getElementsByTagName('li')
	links_len=links.length;
	for(var i=0; i<links_len; i++){
		links[i].onmouseover=function(){
			clearInterval(iIntervalId);
			this.onmouseout=function(){
				iIntervalId = setInterval(Next,2000);;
			}
		}
	}
	document.getElementById("con_"+name_0+"_"+links_len).parentNode.onmouseover=function(){
		clearInterval(iIntervalId);
		this.onmouseout=function(){
			iIntervalId = setInterval(Next,2000);;
		}
	}
	setTab(name_0,cursel_0);
	iIntervalId = setInterval(Next,2000);
}
////////
$(function(){
		   
   /*B2B/B2C切换 */
   $("#companyUl li").bind("click",function(){
       $(this).addClass("selected").siblings().removeClass("selected");
       $('#companyList .company_b2b ').eq($(this).index()).show().siblings().hide();
   });
	$(".choose_nav li").bind("click",function(){
       $(this).addClass("selected").siblings().removeClass("selected");
       $(this).parent().siblings(".choose_list").eq($(this).index()).show().siblings(".choose_list").hide();
   });
    /*二维码鼠标经过*/
    $(".company_b2b dl").hover(function(){
        $(this).children('dt').eq(1).css({"display":"block","background":"#000","position":"absolute","filter":"alpha(opacity=50)","opacity":"0.5","z-index":"2","top":"0","left":"0"});
        $(this).children('dt').eq(2).css({"display":"block","background":"none","z-index":"3"});
        $(this).children('dd').addClass("mouse_effi");
    },function(){
        $(this).children('dt:gt(0)').css({"display":"none"});
        $(this).children('dd').removeClass("mouse_effi");
        }
    );
	/*全选*/
	$(".ckall").click(function(){
		if($(this).attr('checked')){
			$("input[name='uids[]']").attr('checked','checked');
		}else{
			$("input[name='uids[]']").attr('checked',false);
		}
	});
	$(".remail").click(function(){
		$(".choosetype").text("邮箱");
		$(".rtype").attr('name','email');
	});
	$(".rmobile").click(function(){
		$(".choosetype").text("手机");
		$(".rtype").attr('name','mobile');
	});

})