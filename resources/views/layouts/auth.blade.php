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
<link href="{{ asset('/build/dist/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/build/dist/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/build/dist/js/jquery.luara.0.0.1.min.js') }}"></script>
<script src="{{ asset('/build/dist/js/layer/layer.js') }}"></script>
<script src="{{ asset('/build/dist/js/ajax.js') }}"></script>
<script src="{{ asset('/build/dist/js/choose.js') }}"></script>

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
