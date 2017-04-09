@extends('layouts.auth')

@section('content')
<div class="b_j">
	<div class="b_k b_k_pass">
   	  <div class="common_title">
            <p>重设密码</p>
        </div>
        <div class="common_main font12">
	        <form method="post" action="{{route('user.forget_password_next_submit')}}" id="form" name=""  onSubmit="return checkPassword();">
	        	<table width="400" border="0"  class="table">
	              <tr>
	                <td align="right" width="126"><span class="">用户名</span>&nbsp;&nbsp; </td>
	                <td>{{$user->username}}</td>
	              </tr>
	              <tr>
	                <td align="right" width="126"><span class="">新密码</span>&nbsp;&nbsp; </td>
	                <td><input name="password" id="password" type="password"	 class="pinput" /></td>
	              </tr>
	              <tr>
	                <td align="right"><span class="">重复新密码</span>&nbsp;&nbsp; </td>
	                <td><input name="password_confirmation" id="repassword" type="password"	 class="pinput" /></td>
	              </tr>
	              <tr>
	                <td>&nbsp;</td>
	                <td><input name="dosubmit" type="submit" class="commonbtn" value="重设密码" /></td>
	              </tr>
	            </table>     
			</form>
        </div>
    </div>
    
</div>
<div class="clear"></div>

<script type="text/javascript">
	function checkPassword() {
		var pass = $.trim($("#password").val());
		var repass = $.trim($("#repassword").val());
		if(pass.length<6){
			layer.msg('密码最少6位数',{icon: 5});
			return false;
		}
		if(pass != repass){
			layer.msg('两个密码不相同',{icon: 5});
			return false;
		}
		return true;
	}
</script>

@stop