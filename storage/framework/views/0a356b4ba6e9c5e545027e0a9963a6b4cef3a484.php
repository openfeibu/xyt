<?php $__env->startSection('content'); ?>
<div class="b_j">
	<div class="b_k b_k_pass">
   	  <div class="common_title">
            <p>取回密码</p>
        </div>
        <div class="common_main font12">
	        <?php if(isset($mobile)): ?>
	        <form method="post" action="<?php echo e(route('user.forget_password_mobile_next')); ?>" id="test" name="">
			<table width="400" border="0"  class="table">
              <tr>
                <td colspan="2">第二步，请正确输入您收到的验证码。</td>
              </tr>
              <tr>
                <td align="right" width="126"><span class="choosetype">手机</span>&nbsp;&nbsp; </td>
                <td><input name="mobile" type="text"	id="mobile" class="pinput" value="<?php echo e($mobile); ?>"/><input  type="button" id="sendforgetcode" class="commonbtn" value="获取验证码" style="margin-left:10px"/><span id="sendmsg"></span></td>
              </tr>
              <tr>
                <td align="right"><span class="choosetype">验证码</span>&nbsp;&nbsp; </td>
                <td><input name="code" id="code" type="text"	 class="pinput" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="dosubmit" type="submit" class="commonbtn findpassword" value="取回密码" /></td>
              </tr>
            </table>
            </form>
	        <?php else: ?>
	        <form method="post" action="<?php echo e(url('/user/forgetPassword')); ?>" id="test">	
	        
        	<table width="400" border="0"  class="table">
              <tr>
                <td colspan="2">第一步，请选择您找回密码的方式。</td>
              </tr>
              <tr>
                <td width="126" align="right">找回方式&nbsp;&nbsp; </td>
                <td ><input type="radio" checked class="rmobile" name="type" value="mobile"/> 手机 &nbsp;&nbsp;  <input  type="radio" class="remail" name="type" value="email"/> 邮箱</td>
              </tr>
              <tr>
                <td align="right"><span class="choosetype">手机</span>&nbsp;&nbsp; </td>
                <td><input name="mobile" type="text" class="pinput rtype" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="dosubmit" type="submit" class="commonbtn" value="下一步" /></td>
              </tr>
            </table>
			</form>
			<?php endif; ?>
        </div>
    </div>
    
</div>
<div class="clear"></div>
<script type="text/javascript">
	$("#mobile").on('blur',function(){
	var mobile 		= 	$("#mobile").val();
	var reg 		= 	/^(((13[0-9]{1})|(15[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	if(!reg.test(mobile) || (mobile.length>11)){
		layer.msg("手机号码格式不正确",{icon: 5});
		$("#mobile").val("");
	}
})
$("#sendforgetcode").on('click',function(){
	var mobile = $("#mobile").val();
	var reg 	= /^(((13[0-9]{1})|(15[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	if(reg.test(mobile)){
		$("#sendforgetcode").each(function(i){
			var i	=	121;
			var time=	setInterval(function(){
			i--;
			$("#sendforgetcode").val("请等待 "+i+" 秒再发送");
			if(i<=0){
				clearInterval(time);
				$("#sendforgetcode").removeAttr("disabled");
				$("#sendforgetcode").val("发送验证码");
			}
			else{
				$("#sendforgetcode").attr("disabled","disabled");
			}
			},1000);
		});

		$.get("<?php echo e(route('user.forget_password_mobile')); ?>"+'?mobile='+mobile,function(data){
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>