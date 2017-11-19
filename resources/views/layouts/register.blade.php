<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{{get_config_value('site_name')}}</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link href="{{ asset('/build/dist/css/style.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('/build/dist/css/register.css') }}" type="text/css" rel="stylesheet" >
<script type="text/javascript">
	var CHECK_EMAIL_URL = "{{ route('user.check_email') }}";
	var CHECK_REGISTER_URL = "{{ route('user.check_register') }}";
	var CHECK_REGISTER_PARAM_URL = "{{ route('user.check_register_param') }}";
	var LOAD_SCHOOL_URL = "{{ route('user.load_school') }}";
</script>
<script src="{{ asset('/build/dist/js/jquery-1.8.3.min.js') }}" ></script>
<script src="{{ asset('/build/dist/js/layer/layer.js') }}"></script>
<script src="{{ asset('/build/dist/js/register.js') }}"></script>
<script src="{{ asset('/build/dist/js/choose.js') }}"></script>
<script src="{{ asset('/js/lang/public_zh-cn.js') }}"></script>
<script src="{{ asset('/js/lang/admin_zh-cn.js') }}"></script>
<script src="{{ asset('/js/jquery.form.js') }}"></script>
<script src="{{ asset('/js/module.js') }}"></script>
<script src="{{ asset('/js/module.common.js') }}"></script>
<script src="{{ asset('/js/module.form.js') }}"></script>
<script src="{{ asset('/js/rcalendar.js') }}"></script>
<script type="text/javascript">
	var LANG = new Array();
	var THEME_URL = '{{ config('app.url') }}';
</script>

        @if($stylesheet)
		<style type="text/css">
		{!! $stylesheet !!}
		</style>
		@endif
<body>

	<div class="all">
		@include('partials.errors')
    	<div class="head">
        <a href="{{route('index.index')}}" class="logo"><img src="{{ asset('images/index/logo.jpg') }}" width="370" height="100" alt="" title="" /></a>
        </div>

		<div id="pjax-container">
		    @yield('content')
		</div>

		@include('layouts.footer')
	</div>
	<!-- JavaScripts -->
<script>
    //$(document).pjax('a', '#pjax-container');
    //$(document).on("pjax:timeout", function(event) {
    //    // 阻止超时导致链接跳转事件发生
    //    event.preventDefault()
    //});
    $(function(){
	    $(".close").click(function(){
	    	$(".alert").remove();
   	 	});
    });
     $(document).ajaxError(function(event,xhr,settings,errorType){
		if(errorType == 'Unauthorized'){
			window.location.href= LOGIN_URL;
		}
     });
;!function(){

	//加载扩展模块
	layer.config({
	    extend: "extend/layer.ext.js"
	});
}();
</script>
</body>
</html>
