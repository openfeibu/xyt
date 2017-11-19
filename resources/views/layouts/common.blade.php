<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{{get_config_value('site_name')}}  {{$title}}</title>
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

        <script type="text/javascript">
            config = {
                'locale' : '{{ $user_locale or $site_locale }}',
                'current_user_id' : {{ Auth::user() ? Auth::user()->id : 'null' }},
                'token' : '{{ csrf_token() }}',
                'emoj_cdn' : '{{ cdn() }}',
                'uploader_url' : '{{ route('upload_image') }}',
                'notification_url' : '{{ route('notification.count') }}',

            };
            var LOGIN_URL = "{{ route('auth.login') }}";
            var SITE_URL = '{{ config('app.url') }}';
  			var SPACE_VIDEO_PARAM_URL = "{{ route('space.videoParamUrl') }}";
  			var SPACE_STORE_URL = "{{ route('space.store') }}";
			var UPLOAD_URL= '{{ route('upload_image') }}';
			var LANG = new Array();
			var MID		  = '1';
			var UID		  = '1';
			var initNums  =  '140';
			var SYS_VERSION = '4.3.1'
			var UMEDITOR_HOME_URL = '{{ config('app.url') }}/js/static/um/';
			var _CP       = 'TS4_';
			var THEME_URL = '{{ config('app.url') }}';
			var SPACE_VIDEO_EXIST = "{{ route('space.video_exist') }}";
			var LIKE = "{{ route('like.index') }}";
			var ADD_DIGG_URL = "{{ route('space.add_digg') }}";
			var DEL_DIGG_URL = "{{ route('space.del_digg') }}";
			var COMMENT_RENDER_URL = "{{ route('comment.render') }}";
			var COMMENT_LIST_URL = "{{ route('comment.list') }}";
			var GET_SMILE_URL = "{{ route('space.smile') }}";
			var ADD_COMMNET_URL = "{{ route('comment.add') }}";
			var SPACE_MORE_URL = "{{ route('space.more') }}";
			var SHARE_SPACE_URL = "{{ route('share.index') }}";
			var ADD_SHARE_SPACE_URL = "{{ route('space.share_space') }}";
			var ADD_REPLY_URL = "{{ route('allReply.add_reply') }}";
			var REMOVE_SPACE_URL = "{{ route('space.remove') }}";
			var SPACE_RECOMMEND_URL = "{{ route('space.recommend') }}";
			var DELETE_COMMENT_URL = "{{ route('comment.remove') }}";
			var DELETE_REPLY_URL = "{{ route('allReply.remove') }}";
			var DELETE_WALL_URL = "{{ route('wall.remove') }}";
			var CHECK_EMAIL_URL = "{{ route('user.check_email') }}";
			var CHECK_REGISTER_URL = "{{ route('user.check_register') }}";
			var CHECK_REGISTER_PARAM_URL = "{{ route('user.check_register_param') }}";
			var LOAD_SCHOOL_URL = "{{ route('user.load_school') }}";
			var REPLY_REPLY_URL = "{{ route('allReply.reply_reply') }}";
			var ADD_WALL_REPLY_URL = "{{route('wall.add_wall')}}";
			var Activity_Mobile_URL = "{{route('user.activityMobile')}}";
			var CONVERT_CHECK_URL ="{{route('pay.convert_check')}}";
			var SEND_HELLO_URL = "{{route('gift.sendHello')}}";
			var SEND_GIFT_URL = "{{route('gift.sendGift')}}";
			var USER_DETAIL_URL = "{{route('user.detail')}}";
			var REPORT_URL = "{{route('report.nodeReport')}}";
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
        </script>

        @if($stylesheet)
		<style type="text/css">
		{!! $stylesheet !!}
		</style>
		@endif
<body>

	<div class="all">
		@include('partials.errors')
    	@include('layouts.nav')

		<div id="pjax-container">
		    @yield('content')
		</div>

		@include('layouts.footer')
	</div>
	<!-- JavaScripts -->
<script type="text/javascript" src="{{ asset('/build/dist/js/ajax.js') }}"></script>
<script src="{{ asset('/build/dist/js/jquery.pjax.min.js') }}"></script>
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
