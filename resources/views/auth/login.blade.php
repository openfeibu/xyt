<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="" name="description" />
<meta content="" name="keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>象牙塔</title>
</head>
<link href="{{ asset('/build/dist/css/style.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="{{ elixir('dist/css/all.css') }}">
<script src="{{ asset('/build/dist/js/jquery-1.8.3.min.js') }}"></script>
<body>
<div class="all">
@include('partials.errors')
<div class="head">
<a href="index.html" class="logo"><img src="{{ asset('/images/index/logo.jpg') }}" width="370" height="100" alt="" title="" /></a>

</div>

<div class="clear"></div>
<div class="b_m">
<div class="b_ma">
@foreach($ads as $adk => $ad)
<img src="{{handle_image($ad->image,'ad_img')}}" width="600" height="342" alt="" />
@endforeach

</div>
<div class="b_mb">
<img src="{{ asset('/images/index/img47.jpg') }}" width="317" height="52" alt="" />
<form role="form" method="POST" action="/auth/login">
	<ul class="b_mba">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		@if(Session::has('error'))
			<p class="alert alert-danger">{{ Session::get('error') }}</p>
		@endif
		<li><input type="login" class="b_mbb" placeholder="请输入手机或邮箱" style="background:url({{ asset('/images/index/img48.jpg') }}) no-repeat;" name="login"  value="{{ Input::old('login') }}"/></li>
		<li><input type="password" class="b_mbb" name="password"  placeholder="请输入密码" style="background:url({{ asset('/images/index/img49.jpg') }}) no-repeat;" /></li>
		<!--<li>
			@if(!$captcha_login_disabled)
				@include('partials.captcha')
			@endif
		</li>-->
		<li><input type="checkbox"  name="remember" class="b_mbc" style="margin-top:15px;" /><span class="b_mbd">下次自动登录</span><a href="{{route('user.forget_password')}}" class="b_mbe">忘记密码？</a></li>
		<li><input type="submit" class="b_mbf"  name="commit" value="{{ trans('forms.login') }}"  /></li>
		<li><a href="/auth/register">没有账号？<span class="green">免费注册!</span></a></li>
	</ul>
</form>
</div>
</div>

@include('footer.footer')

<script>

    $(function(){
	    $(".close").click(function(){
	    	$(".alert").remove();
   	 	});
    });

</script>
</body>

</html>
