function setTab_t(name,cursel,pid){
    var links = document.getElementById(pid).getElementsByTagName('li')
    links_len=links.length;
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
