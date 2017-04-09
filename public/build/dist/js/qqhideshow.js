//////////////显示隐藏
$(".a1").click(function(e){
        $("#search").show();
        var ev = e || window.event;
        if(ev.stopPropagation){
            ev.stopPropagation();
        }
        else if(window.event){
            window.event.cancelBubble = true;//兼容IE
        }

})
document.onclick = function(){
        $("#search").hide();
    }
$("#search").click(function(e){
    var ev = e || window.event;
        if(ev.stopPropagation){
                ev.stopPropagation();
         }
        else if(window.event){
                window.event.cancelBubble = true;//兼容IE
        }
})
//////////////显示隐藏
$(".a1").click(function(e){
        $("#search2").show();
        var ev = e || window.event;
        if(ev.stopPropagation){
            ev.stopPropagation();
        }
        else if(window.event){
            window.event.cancelBubble = true;//兼容IE
        }

})

$("#search2").click(function(e){
    var ev = e || window.event;
        if(ev.stopPropagation){
                ev.stopPropagation();
         }
        else if(window.event){
                window.event.cancelBubble = true;//兼容IE
        }
})


//////
$(document).ready(function(){
  $(".l_ahoverc span").click(function(){
  $("#search").hide();
  });
$(".l_ahoverc span").click(function(){
  $("#search2").hide();
  });
  $(".b_bgb b").click(function(){
  $(".b_bga").hide();
  });
  $("#showss").click(function(){
  $(".b_bga").show();
  });
  $(".jubao span").click(function(){
  $(".jubao").hide();
  });
  $(".jubaoshow").click(function(){
  $(".jubao").show();
  });
  
  $(".b_ob span").click(function(){
  $(".b_ob").hide();
  });	
  $(".liuyan").click(function(){
  $(".b_ob").show();
  $(".b_oc").hide();
  });
  
  $(".b_oc span").click(function(){
  $(".b_oc").hide();
  });
  $(".zhufu").click(function(){
  $(".b_oc").show();
  $(".b_ob").hide();
  });
 // 
  
  $(".b_ga b").click(function(){
  $(".b_g").hide();
  });
  $(".b_gshow").click(function(){
  $(".b_g").show();
  });
});

