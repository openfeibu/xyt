$(".sexual_h").live("click",function(){
    var sexual_val = $("input[name='sex']:checked").val();
	if(!sexual_val){
			$('#sexual_error_span').attr('class','error_box_error');
			$('#sexual_error_span').css('display','inline-block');
			//$('#sexual_error_span_b').html('请选择您的性别');
			return false;
	}else{
			$('#sexual_error_span').css('display','none');
	}
});

$(".t_reg_text").live('focus',function(){
	var id = $(this).attr('id');
	$('#'+id+'_error_span').attr('class','error_box');
	$('#'+id+'_error_span').css('display','inline-block');
	$('#'+id+'_error_span b').css('display','block');
	if(id=='school'){
		loadschool();
	}
}).live('blur',function(){
	var id = $(this).attr('id');
	$('#'+id+'_error_span').css('display','none');
	var val = $(this).val();
	if(id=='email'){
		var reg=/^[A-Za-z0-9_-]+@[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)+$/;
		if(!checkreg(reg,val,id,'请正确填写Email!')){
			return false;
		}


	}else if(id=='password'){
		var reg=/^[A-Za-z0-9]{6,12}$/;
		if(!checkreg(reg,val,id,'密码长度不符合要求或包含非法字符!')){
			return false;
		}
	}else if(id=='repassword'){
		//alert(val +'/'+ $('#password').val());
		if(!val || val !== $('#password').val()){
			$('#'+id+'_error_span').attr('class','error_box_error');
				$('#'+id+'_error_span').css('display','inline-block');
				$('#'+id+'_error_span_b').html('两次密码不一致');
			return false;
		}

	}else if(id=='school'){
		return false;
	}
	$.get(CHECK_REGISTER_PARAM_URL+'?'+id+'='+val,function(data){
		if(data.code == '200'){
			$('#'+id+'_error_span').attr('class','box_checked');
			$('#'+id+'_error_span').css('display','inline-block');
			$('#'+id+'_error_span_b').css('display','none');
		}else{
			if(data){
				$('#'+id+'_error_span').attr('class','error_box_error');
				$('#'+id+'_error_span').css('display','inline-block');
				$('#'+id+'_error_span_b').html(data.message);
			}else{
				setformmsg(1500,'服务器繁忙！请刷新页面重新尝试！','RED');
				return false;
			}
		}
	});

});
$("#gender :radio").live('change',function(){
	var val = $(this).val();
	if(val!=''){
		$('#gender_error_span').attr('class','box_checked');
		$('#gender_error_span').css('display','inline-block');
		$('#gender_error_span_b').css('display','none');
	}
});
$(".bselect select").live('change',function(){
	var birthddnum	=	0;
	$(".bselect select").each(function(i){
		var val = $(this).val();
		if(val!=''){
			birthddnum++;
		}
		if(birthddnum>2){
			$('#birthday_error_span').attr('class','box_checked');
			$('#birthday_error_span').css('display','inline-block');
			$('#birthday_error_span_b').css('display','none');
		}
	});
});
$(".dselect select").live('change',function(){
	var val = $(this).val();
	var id 	= $(this).attr('name');
	if(val!=''){
		$('#'+id+'_error_span').attr('class','box_checked');
		$('#'+id+'_error_span').css('display','inline-block');
		$('#'+id+'_error_span_b').css('display','none');
	}
});

$("#industry select").live('change',function(){
	var val = $(this).val();
	var id 	= $(this).attr('name');
	if(val!=''){
		$('#'+id+'_error_span').attr('class','box_checked');
		$('#'+id+'_error_span').css('display','inline-block');
		$('#'+id+'_error_span_b').css('display','none');
	}
});
var citynum	=	0;
$(".cselect select").live('change',function(){
	$(".cselect select").each(function(i){
		var val = $(this).val();
		if(val!=''){
			citynum++;
		}
		if(citynum>1){
			$('#residecity_error_span').attr('class','box_checked');
			$('#residecity_error_span').css('display','inline-block');
			$('#residecity_error_span_b').css('display','none');
		}
	});
});
$("#identity :radio").live('change',function(){
	var val = $(this).val();
	$('#identity_error_span').attr('class','box_checked');
	$('#identity_error_span').css('display','inline-block');
	$('#identity_error_span_b').css('display','none');
	if(val==1){
		$('#department').css('display','block');
		$('#industry').css('display','none');
	}else if(val==2){
		$('#department').css('display','none');
		$('#industry').css('display','block');
	}else{
		$('#identity_error_span').attr('class','error_box_error');
		$('#identity_error_span').css('display','inline-block');
		$('#identity_error_span_b').css('display','block');
	}
});
function newregform(type){
	if (type == 1) {
		var arrayObj 				= 	{
			"email":$('#email').val(),
			"password":$('#password').val(),
			"repassword":$('#repassword').val(),
			"username":$('#username').val(),
			// "sexual":$("input[name='sex']:checked").val(),
			//"gender":$("input[name='gender']:checked").val(),
			/*"birthyear":$("#birthyear").val(),
			"birthmonth":$("#birthmonth").val(),*/
			"birthday":$("#birthday").val(),
			"work":$("#work").val(),
			"school":$('#school').val(),
	//		"department":$("#departname").val(),
	//		"industry":$("#industryname").val(),
			//"province":$("#province").val(),
			"city":$("#city").val(),
			// "seccode":$('#seccode').val(),
			"mobile":$("#mobile").val(),
			"code":$('#code').val(),
			"agree":$("input[name='agree']:checked").length
		}
	} else {
		var arrayObj 				= 	{
			"email":$('#email').val(),
			"password":$('#password').val(),
			"repassword":$('#repassword').val(),
			"username":$('#username').val(),
			// "sexual":$("input[name='sex']:checked").val(),
			//"gender":$("input[name='gender']:checked").val(),
			// "birthyear":$("#birthyear").val(),
			// "birthmonth":$("#birthmonth").val(),
			// "birthday":$("#birthday").val(),
			// "profession":$("input[name='profession']:checked").val(),
			"school":$('#school').val(),
	//		"department":$("#departname").val(),
	//		"industry":$("#industryname").val(),
			//"province":$("#province").val(),
			"city":$("#city").val(),
			// "seccode":$('#seccode').val(),
			// "mobile":$("#mobile").val(),
			// "code":$('#code').val(),
			"agree":$("input[name='agree']:checked").length
		}
	}

	var ischeck					=	true;
	var birth					=	true;
	var display = '';
	//alert();
	$.each(arrayObj,function(id,value) {
		/*if((arrayObj["identity"]==1&&id=="industry")||(arrayObj["identity"]==2&&id=="department")){
			return true;
		}*/
		console.log(id+':'+value);
		if(!value){
			ischeck				=	false;
			if(id!='school'){
				$('#'+id).focus();
			}
			if(id=='birthyear'||id=='birthmonth'||id=='birthday'){
				birth			=	false;
				$('#birthday_error_span').attr('class','error_box_error');
				$('#birthday_error_span').css('display','inline-block');
				$('#birthday_error_span_b').css('display','block');

			}
			else{
				$('#'+id+'_error_span').attr('class','error_box_error');
				$('#'+id+'_error_span').css('display','inline-block');
				$('#'+id+'_error_span_b').css('display','block');
			}


		}
		else{
			if(id=='birthyear'||id=='birthmonth'||id=='birthday'){
				birth			=	true;
				$('#birthday_error_span').attr('class','error_box_error');
				$('#birthday_error_span').css('display','inline-block');
				$('#birthday_error_span_b').css('display','none');

			}

			if (ischeck) {
				$('#'+id+'_error_span').attr('class','box_checked');
				$('#'+id+'_error_span').css('display','inline-block');
				$('#'+id+'_error_span_b').css('display','none');
			}

			if ($('#'+id + '_error_span_b')) {
				console.log(id+":"+!$('#'+id + '_error_span_b').is(":hidden"))	;
				if (!$('#'+id + '_error_span_b').is(":hidden")) {
					ischeck = false;
				}
			}
		}
	});


	// check sexual by comver
	var sexual_val = $("input[name='sex']:checked").val();
	if(!sexual_val){
			$('#sexual_error_span').attr('class','error_box_error');
			$('#sexual_error_span').css('display','inline-block');
			//$('#sexual_error_span_b').html('请选择您的性别');
			return false;
	}else{
			$('#sexual_error_span').css('display','none');
	}
	console.log(ischeck);
	if(ischeck){
		if (type == 1){
			setformmsg(1500,'正在提交注册，请稍后 <img src="/build/dist/images/loading.gif" />','#24B618');
			// ajaxpost('registerform', 'register');
			$.ajax({ type: "POST",url : '/auth/register', data :$('#registerform').serialize(), success:function(data){

				if (data.code == 200){

					window.location.href = "/user/registerAvatar";
				}else{
					setformmsg(1500,data.message,'RED');
					showErrTip(data.message);
				}
			}});
		} else {
			$('#firstform').hide();
			$('#nextform').show();
		}
	}else{
		setformmsg(1500,'请检查以上填写项是否都验证通过','RED');
	}
	return false;
}
function register(id, result) {
	if(result) {
		$('#registersubmit').disabled = true;
		var url_plus = $("#url_plus").val();
		window.location.href = "space.php?do=set&n=1&"+url_plus;
	} else {
		updateseccode();
	}
}
function setformmsg(time,msg,color){
	$('.__registerform').fadeIn(time);
	$('.__registerform').html(msg);
	if(color){
		$('.__registerform').css('color',color);
	}
}

function checkreg(reg,val,id,s){
	if(!reg.test(val)){
		$('#'+id+'_error_span').attr('class','error_box_error');
		$('#'+id+'_error_span').css('display','inline-block');
		$('#'+id+'_error_span_b').html(s);
		return false;
	}
	return true;
}

$("#serachschool").live('click',function(){
	var val = $("#school_search_input").val();
	if(val!=""){
		loadschool(0,val);
	}
});

$("#school").click(function(){
	loadschool(0);
});

function loadschool(id,v){
	var bh = $("body").height();
    var bw = $("body").width();
    $("#fullbg").css({
        height:bh,
        width:bw,
        display:"block"
    });
	$.get(LOAD_SCHOOL_URL+'?pid='+id+'&pn='+($.browser.msie && document.charset == 'utf-8' ? encodeURIComponent(v) : v),'',function(s){

		$("#loadProcess").html(s);
		$("#popup-unis li a").live('click',function(){
			var val	=	$(this).text();
			var id 	= 	$(this).attr('id');
			$('#school').val(val);
			$('#school_id').val(id);
			$(".input-submit").click();

		});

		$("#school_search_input").live('keyup',function(){
			var val = $(this).val();
			if(val!=""){
				$.get(LOAD_SCHOOL_URL+'?pid=0&pn='+($.browser.msie && document.charset == 'utf-8' ? encodeURIComponent(val) : val),'',function(s){
					$("#popup-unis").html(s);
				});
			}
		});

		loadProcess = layer.open({
			type: 1,
			shade: false,
			title: false,
			area: ['660px', ''], 
			content: $('#loadProcess')
	    });

	});
}
$(".input-submit").live('click',function(){
	layer.close(loadProcess);
	$("#fullbg").hide();
	var val = 	$("#school").val();
	if(val==''){
		$('#school_error_span').attr('class','error_box_error');
		$('#school_error_span').css('display','inline-block');
		$('#school_error_span_b').css('display','block');
	}
	else{
		$('#school_error_span').attr('class','box_checked');
		$('#school_error_span').css('display','inline-block');
		$('#school_error_span_b').css('display','none');
	}
});
