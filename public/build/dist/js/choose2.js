
function setTab(name,cursel){
	cursel_0=cursel;
	for(var i=1; i<=links_len; i++){
		var menu = document.getElementById(name+i);
		var menudiv = document.getElementById("cons_"+name+"_"+i);
		if(i==cursel){
			menu.className="offs";
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
var name_0='ones';
var cursel_0=1;
//var ScrollTime=3000;循环周期（毫秒）
var links_len,iIntervalId;
onload=function(){
	var links = document.getElementById("b_ib").getElementsByTagName('li')
	links_len=links.length;
	for(var i=0; i<links_len; i++){
		links[i].onmouseover=function(){
			clearInterval(iIntervalId);
			this.onmouseout=function(){
				//iIntervalId = setInterval(Next,ScrollTime);;
			}
		}
	}
	//document.write("糟糕！文档消失了。");
//	document.getElementById("cons_"+name_0+"_"+links_len).parentNode.onmouseover=function(){
//		clearInterval(iIntervalId);
//		this.onmouseout=function(){
//			iIntervalId = setInterval(Next,ScrollTime);;
//		}
//	}
//	setTab(name_0,cursel_0);
//	iIntervalId = setInterval(Next,ScrollTime);
}
