function ajaxget(url, showid,parameter,succfun) {
	if(url == "javascript:;"){
		return false;
	}
	$('#'+showid+'_loadMore').remove();
	$('#'+showid).append("<div class='loading' id='"+showid+"_loadMore'>" + L('PUBLIC_LOADING') + "<img src='" + THEME_URL + "/images/ico-load.png' class='load'></div>");
	$.get(url, parameter, function(msg) {
		$("#"+showid).html(msg.html);
		$("#"+showid).append('<div id="page" class="page" >' + msg.pageHtml + '</div>');
		if($('#'+showid+' .page').find('a').size() > 2) {

			var href = false;
			$('#'+showid+' .page').find('a').each(function() {
				href = $(this).attr('href');
			});
			// 重组分页结构
			$('#'+showid+' .page').html(msg.pageHtml).show();
			$('#'+showid+' .page').find('a').each(function() {
				var href = $(this).attr('href');
				if(href) {
					$(this).attr('href', 'javascript:;');
					$(this).attr('onclick', "ajaxget('"+href+"','"+showid+"')");
				}
			});
		} else {
			if($("#"+showid).find('p').size() > 0) {
				$("#"+showid).append('');
			}
		}
		if(succfun){
			setTimeout(function(){
				succfun()
			},0)
		}

	});
}
function ajaxgethtml(url) {
	if(url == "javascript:;"){
		return false;
	}
	var loading = layer.load(1, {shade: false});
	$.get(url, function(msg) {
		layer.close(loading);
		if(msg.code == 200){
			if(typeof window_open!="undefined")
			{
				layer.close(window_open);
			}
			/*layer.open({
				type: 1,
				skin: 'layui-layer-rim', //加上边框
				area: ['100%', '100%'], //宽高
				title: '添加',
				content: msg.html
			});*/
			window_open = layer.open({
			  type: 1,
			  skin: 'layui-layer-demo', //样式类名
			  closeBtn: 0, //不显示关闭按钮
			  title: false,
			  anim: 2,
			  area: ['auto', 'auto'], //宽高
			  shadeClose: true, //开启遮罩关闭
			  content: msg.html
			});
		}
		else{
			layer.msg(msg.message, {icon: 5});
		}
	});
}

function addSort(obj) {
	if (obj.value == 'addoption') {
	 	popupmenu = layer.open({
		  type: 1,
		  skin: 'layui-layer-rim', //加上边框
		  area: ['420px', '180px'], //宽高
		  title: '添加',
		  content: '<div class="popupmenu_inner" style="text-align: center;padding-top:30px;">名称：<input type="text" name="newsort" size="10" id="newsort" class="pinput" /><input type="button" name="addSubmit" value="创建" onclick="addOption(\'newsort\', \''+obj.id+'\')" class="btn-green-small" style="width:53px;"/></div>'
		});
	 	$('#newsort').focus();
 	}
}

function addOption(sid, aid) {
	var obj = $('#'+aid);
	var newOption = $('#'+sid).val();
	$('#'+sid).value = "";
	obj.find("option").attr("selected",false);
	if (newOption!=null && newOption!='') {
		obj.prepend("<option value='new:"+newOption+"' selected>"+newOption+"</option>");
	} else {
		obj.value=$('#'+aid+" option[index='0']").val();
	}
	layer.close(popupmenu);
}
//隐私密码
function passwordShow(value) {
	if(value==4) {
		$('#span_password').show();
		$('#tb_selectgroup').hide();
	} else if(value==2) {
		$('#span_password').hide();
		$('#tb_selectgroup').show();
	} else {
		$('#span_password').hide();
		$('#tb_selectgroup').hide();
	}
}
$("body").on('click','.followbtn',function(){
	var loading = layer.load(1, {shade: false});
	t = $(this);
	m = $(this).find('.follow_text');
	i = t.attr('data-type'), r = t.attr("data-id"), n = t.attr("data-action"), a = t.attr("data-url")
	$.ajax({
		url: a,
		type: "POST",
		data: {
			type: i,
			id: r
		},
		success: function(data) {
			layer.close(loading);
			t.hasClass("active") ? t.removeClass("active") : t.addClass("active");
			if(data.status == 1){
				m.text("取消关注");
				layer.msg('关注成功', {icon:1});
			}else if(data.status == 2){
				m.text("加关注");
				layer.msg('取消关注成功', {icon:1});
			}else{
				layer.msg('不能关注自己', {icon:5});
			}
		},
		error: function(e) {
			layer.close(loading);
			layer.msg('操作失败', {icon: 5});
		}
	}, "json")

});

function chooseTab(obj,tab) {
	$(".tab").hide();
	$("."+tab).show();
	$(obj).siblings().removeClass('active');
	$(obj).addClass('active');
}

$("#sendcode").on('click',function(){
	var mobile = $("#mobile").val();
	var reg 	= /^(((13[0-9]{1})|(15[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
	if(reg.test(mobile)){
		$("#sendcode").each(function(i){
			var i	=	121;
			var time=	setInterval(function(){
					i--;
					$("#sendcode").val("请等待 "+i+" 秒再发送");
				if(i<=0){
					clearInterval(time);
					$("#sendcode").removeAttr("disabled");
					$("#sendcode").val("发送验证码");
				}
				else{
					$("#sendcode").attr("disabled","disabled");
				}
			},1000);
		});
		$.get(Activity_Mobile_URL+'?mobile='+mobile,function(data){
			if(data.code==200){
				$("#sendmsg").css('color','#24B618');
				$("#sendmsg").html("验证码已发送成功，请注意查看");
			}
			else{
				$("#sendmsg").css('color','red');
				$("#sendmsg").html(data.message);
			}
		});
	}
	else{
		alert("请输入正确的手机号");
	}
});
$("#score").blur(function(){
	var score=$.trim($(this).val());
	var z= /^[0-9]*$/;
	if(!score){return false;}
	if(!z.test(score)){
	   layer.msg('积分值必须是数字', {icon: 5});
	   return false;
	}
	$.get(CONVERT_CHECK_URL+'?type=score&score='+score,function(data){
		if(data.code==200){
			$("#toCoin").val(data.value);
		}
		else{
			layer.msg(data.message, {icon: 5});
		}
	})
});
$("#coin").blur(function(){
	var coin=$.trim($(this).val());
	var z= /^[0-9]*$/;
	if(!coin){return false;}
	if(!z.test(coin)){
	   layer.msg('象牙币必须是数字', {icon: 5});
	   return false;
	}
	$.get(CONVERT_CHECK_URL+'?type=coin&coin='+coin,function(data){
		if(data.code==200){
			$("#toScore").val(data.value);
		}
		else{
			layer.msg(data.message, {icon: 5});
		}
	})
});


function show_send(id){
	$('.send').hide();
	$('.hello').hide();
	$('#gift_form_'+id).show();
}
function show_hello(id){
	$('.send').hide();
	$('.hello').hide();
	$('#hello_form_'+id).show();
}
function close_layer(){
	layer.close(window_open);
}
/*$('.send_title_close').on('click',function(){
	$('.send').hide();
});*/
$('.hello_title_close').on('click',function(){
	$('.hello').hide();
});

function show_gift_info(id,experience,price,num,uid,gift_name){
	window.sessionStorage.setItem('gift_id',id);
	$('#gift_radio'+id+'_'+uid).click();
	$('#gift_id'+uid).val($('#gift_radio'+id+'_'+uid).val());
	if($('#gift_radio'+id+'_'+uid).attr("checked")){
		$('.gift_select').css('border','2px #cbcbcb solid');
		$('.gift_select'+id).css('border','2px #51b837 solid');
	}
	$('.gift_experience').html(experience);
	$('.price').html(price);
	$('.gift_number').html(num);
	$('.gift_name').html(gift_name);
}

function helloSubmit(id){
	var val = $('input[name="hello_radio"]:checked ').val()
	if(val == null){
		layer.msg('还没打招呼的动作', {icon: 5});
		return false;
	}else{
		var loading = layer.load(1, {shade: false});
		$.post(SEND_HELLO_URL,'helloToUser='+$('#helloToUser').val()+'&hello_radio='+val,function(data){
			layer.close(loading);
			if(data == 200){
				layer.msg('打招呼成功', {icon: 1});
			}else if(data == 400){
				layer.msg('打招呼失败，请重试', {icon: 5});
			}
		});
	}
}

function checkSubmit(id){

	var val=$('#gift_radio'+window.sessionStorage.getItem('gift_id')+'_'+id).val();
	var anonymous = 0;
	if($('.anonymous').attr('checked')){
		var anonymous = 1;
	}
	if($('.send_number'+id).val() == "" || $('.send_number'+id).val() == 0){
		layer.msg('礼物数量不能为0', {icon: 5});
		return false;
	}else if(val == null){
		layer.msg('还没选择礼物呢', {icon: 5});
		return false;
	}else{
		var loading = layer.load(1, {shade: false});
		$.post(SEND_GIFT_URL,'to_user_id='+$('#giftToUser').val()+'&gift_id='+window.sessionStorage.getItem('gift_id')+'&anonymous='+anonymous+'&send_number='+$('.send_number'+id).val(),function(data){
			layer.close(loading);
			window.sessionStorage.removeItem('gift_id');
			if(data == 200){
				layer.msg('赠送礼物成功', {icon: 1});
			}else{
				layer.msg(data.message, {icon: 5});
			}
		});
	}
}
$(".navc").mouseover(function(){
  $(this).find("ul").show();
}).mouseout(function(){
	$(this).find("ul").hide();
});
$(".user_info").mouseover(function(){
	if (typeof(request) != "undefined"){
		request.abort();
	}
	$(".user_detail").remove();
	uid = $(this).attr('rel');
	$(this).after("<div class='user_detail l_ahover'></div>")
	parameter = {'uid':uid};
	$('.user_detail').append("<div class='loading' id='user_detail_load'><img src='" + THEME_URL + "/images/ico-load.png' class='load'></div>");
	request = $.get(USER_DETAIL_URL, parameter, function(data) {
		$(".loading").remove();
		if(data.code == 200){
			$(".user_detail").append(data.html);
		}
	});

});
$(".findpassword").click(function(){

});
$("body").on('click','.hello_content li',function(){
	$(this).addClass('active').siblings().removeClass('active');
	$(".hello_radio").removeAttr('checked');
	$(this).find('.hello_radio').attr('checked','true');
});
$("body").on('click','#buy_card',function(){
	var key = $('#card_key').val();
	var user_id = $('#to_user_id').val();
	var loading = layer.load(1, {shade: false});
	$.ajax({
		url: '/card/buyCard',
		type: "POST",
		data: {key:key,user_id:user_id},
		success: function(data) {
			layer.close(loading);
			layer.close(window_open);
			if(data.code == 200){
				layer.msg(data.message, {icon: 1});
				$("#"+key).text(data.value);
			}else{
				layer.msg(data.message, {icon: 5});
			}
		},
		error: function(e) {
			layer.close(loading);
			layer.msg('操作失败', {icon: 5});
		}
	}, "json")
});
/*$(".user_info_abroad").mouseleave(function(){
	request.abort();
	$(".user_detail").remove();
});
*/
function report (type,id)
{
	$(".jubao").show();
}
$('#report_btn').on('click',function(){
	if($('#report_content').val() == ""){
		layer.msg('请填写举报内容！', {icon: 5});
	}else{
		$.post(REPORT_URL,'content='+$('#report_content').val()+'&type='+$('#report_type').val()+'&type_id='+$('#report_type_id').val(),function(data){
				if(data == 200){
					layer.msg("举报成功，我们会根据实际情况给予警告！", {icon: 1});
					$(".jubao").hide();
				}else if(data == 403){
					layer.msg('举报失败,请重试！', {icon: 5});
				}
		});
	}
});
