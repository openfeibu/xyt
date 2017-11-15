@extends('layouts.register')

@section('content')
	<div class="b_l">
		<form action="" method="post" onsubmit="return newregform(1)" id="registerform">
		<div class="d_reg b_k" id="firstform">
			<div class="d_reg_head">
				<div class="d_reg_heada fleft">免费开通<span class="reg_notice">象牙塔-高校单身校友大联盟网站</span>帐号</div>
				<div class="d_reg_headb fright" >已有象牙塔网站账号 <a href="{{ route('auth.login') }}">我要登录</a></div>
			</div>
			<table  border="1" class="t_reg ">
			  <tr>
				<td width="90">邮箱：</td>
				<td colspan="2" width=600px ><input name="email" type="text"  class="t_reg_text" id="email"/>
				<span id="email_error_span" class="error_box"><b id="email_error_span_b">请输入正确的邮箱</b></span>
				</td>
				</tr>
			  <tr>
				<td>密码：</td>
				<td colspan="2" ><input name="password" type="password"  class="t_reg_text" id="password"/>
				<span id="password_error_span" class="error_box"><b id="password_error_span_b">密码由6到20个字符组成</b></span>
				</td>
				</tr>
			  <tr>
				<td>确认密码：</td>
				<td colspan="2"><input name="repassword" type="password"  class="t_reg_text" id="repassword"/>
				<span id="repassword_error_span" class="error_box"><b id="repassword_error_span_b">请再输入一次您的密码</b></span>
				</td>
				</tr>
			  <tr>
				<td>昵称：</td>
				<td colspan="2"><input name="username" type="text"  class="t_reg_text" id="username"/>
				<span id="username_error_span" class="error_box"><b id="username_error_span_b">3到15个字符，1个汉字算3个字符</b></span>
				</td>
				</tr>
			  <tr>
				<td>性别：</td>
				<td colspan="2">
					<span style="margin-top:7px; float:left;"><span style="margin-right:10px;"><input type="radio" name="sex" id="sexual" value="1" class="sexual_h" checked>男</span>  <input type="radio" name="sex" id="sexual" value="2" class="sexual_h">女</span>
					<span id="sexual_error_span" class="error_box" style="margin-left:165px;float:left;  font-weight:normal;padding-left:23px;width:218px;color:#801B1B; height:22px; padding-top:5px;">请选择您的性别</span>
				</td>
				</tr>
			  <tr>
				<td>学校：</td>
				<td colspan="2">
					<input type="text" name="school" id="school" value="" class="t_reg_text" readonly />
					<input type="hidden" name="school_id" id="school_id" />
					<span id="school_error_span" class="error_box"><b id="school_error_span_b">请选择您就读的大学</b></span>
				</td>
				</tr>
			  <tr>
				<td height="35">所在城市：</td>
				<td colspan="2">
					{{ Widget::Areas([ 'type'=> 'reg_location','name' => 'location' ,'province_name' => 'province','city_name' => 'city','prefix' => ''] ) }}
					<span id="city_error_span" class="error_box"><b id="city_error_span_b">请选择您所在的城市</b></span>
				</td>
			  </tr>
			  <tr>
				<td height="35"></td>
				<td colspan="2"><input type="checkbox" name="agree" id="agree" checked="checked" value="1"/> 同意 <span class="reg_notice"><a href="{{route('about.show',['id' => 12])}}" target="_blank">{!! get_content('12','title') !!}</a></span>
				<span id="agree_error_span" class="error_box" style="margin-left: 94px;"><b id="agree_error_span_b">必须选择“同意”才可以注册</b></span>
				</td>
				</tr>
			  <tr>
				<td height="35"></td>
				<td colspan="2"><input name="dosubmit" type="button" id="registersubmit" class="t_reg_sub" value="立即注册>>" onclick="newregform(0)"/> </td>
				</tr>
			</table>
		</div>
		<div class="b_k" id="nextform">
			<div class="d_reg_1_head">
				<img src="{{ asset('/build/dist/images/reg1.jpg') }}" />
			</div>
			@inject('formTypePresenter','Hifone\Presenters\FormTypePresenter')
			<div class="d_reg_main">

				<table  border="0" class="t_reg_1" width="100%">
				  <tr>
					<td width="86">*职业：  </td>
					<td colspan="2">
						{!! $formTypePresenter->showSelect($base_data,'work','') !!}
						<span id="work_error_span" class="box_checked" style="display: inline-block;"><b id="work_error_span_b" style="display: none;">请选择您工作的职业</b></span>
					</td>
				  </tr>
				  <tr>
					<td>*生日： </td>
					<td colspan="2" class="birthday"><input event-node="input_date" event-args="min=1&amp;error=请选择时间" type="text" name="birthday" value="" readonly="readonly" class="register_table_text01" id="birthday" style="height: 30px;width: 225px;"> <span id="birthday_error_span" class="error_box"><b id="birthday_error_span_b">请选择您的生日</b></span></td>
				  </tr>
				  <tr>
					<td>*手机号： </td>
					<td width="240"><input type="text" name="mobile" id="mobile" class="register_table_text01" value=""/></td>
					<td width="636"><input type="button" id="sendcode" value="发送验证码" class="submit"><span id="sendmsg"></span><span id="mobile_error_span" class="error_box"><b id="mobile_error_span_b">请填写手机号</b></span></td>
				  </tr>
				  <tr>
					<td>*验证码： </td>
					<td colspan="2"><input type="text" name="code" id="code" class="register_table_text01" value=""/><span id="code_error_span" class="error_box"><b id="code_error_span_b">请填写验证码</b></span> </td>
				  </tr>
				  <tr>
					<td></td>
					<td colspan="2"> <input name="dosubmit" class="nextbtn" value="完成注册" type="submit"/> <span class="reg_notice_1">温馨提示：</span>请正确完成你的信息，其中打 <span class="reg_notice_1">*</span> 项为必选项</td>
				  </tr>
				</table>
				<div class="__registerform"></div>
			</div>
		</div>
		</form>
	</div>
    <div class="clear"></div>
	<div class="message">
    	<div class="message_title">
        	<span style="color: #fff;font-size: 16px;">&nbsp;&nbsp;加入象牙塔网须知：</span><!--<span class="buto" style="float: right;margin: 10px 15px;"><img src="images/buto.png" alt=""/></span> -->
        </div>
        <div class="message_main">
        	<div class="pcontent">
                {!!get_content('19','body')!!}
            </div>
        </div>
        <div class="message_footer">
        	<div class="message_buttons"><button class="aui_state_highlight" type="button">同意</button><button type="button" id="disagree">不同意</button></div>
        </div>
    </div>


<div id="loadProcess"></div>
<script>

layer.ready(function(){

    message=layer.open({
		type: 1,
		shade: false,
		title: false,
		area: ['462px', ''],
		content: $('.message')
    });


});

$(".aui_state_highlight").click(function(){
	layer.close(message);
});

$('#disagree').click(function(){
	window.location.href="{{ route('auth.login') }}";
});




$("#mobile").on('blur',function(){
	var mobile 		= 	$("#mobile").val();
	var reg 		= 	/^(((13[0-9]{1})|(15[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
	if(!reg.test(mobile) || (mobile.length>11)){
		alert("手机号码格式不正确");
		$("#mobile").val("");
	}
})
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

		$.get("{{route('user.register_mobile')}}"+'?mobile='+mobile,function(data){
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
})

function CheckPhoto() {

//alert($('profession').value);
if ($('#profession').value == 0) {
alert('请选择你的职业！');
$('#profession').focus();
$('#profession').css('color', 'red');
return false;
}
else $('#profession').css('color', '');



if ($('#birthyear').value.length == 0) {
alert('请选择你的出生年份！');
$('#birthyear').focus();
$('#birthyear').css('color', 'red');
return false;
}
else $('#birthyear').css('color', '');

if ($('#birthmonth').value.length == 0) {
alert('请选择你的出生月份！');
$('#birthmonth').focus();
$('#birthmonth').css('color', 'red');
return false;
}
else $('#birthmonth').css('color', '');
if ($('#birthday').value.length == 0) {
alert('请选择你的出生日期！');
$('#birthday').focus();
$('#birthday').css('color', 'red');
return false;
}
else $('#birthday').css('color', '');

if ($('#mobile').value.length == 0) {
alert('请输入你的手机号码！');
$('#mobile').focus();
$('#mobile').css('color', 'red');
return false;
}
else $('#mobile').css('color', '');
if ($('#code').value.length == 0) {
alert('请输入你收到的验证码！');
$('#code').focus();
$('#code').css('color', 'red');
return false;
}
else $('#code').css('color', '');
document.getElementById('steponeform').submit();
return true;
}
</script>
@stop
