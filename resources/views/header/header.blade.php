<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>象牙塔</title>
</head>
<link href="{{ asset('/build/dist/css/style.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('/build/dist/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/build/dist/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/build/dist/js/jquery.luara.0.0.1.min.js') }}"></script>

        <script type="text/javascript">
            Hifone.Config = {
                'locale' : '{{ $user_locale or $site_locale }}',
                'current_user_id' : {{ Auth::user() ? Auth::user()->id : 'null' }},
                'token' : '{{ csrf_token() }}',
                'emoj_cdn' : '{{ cdn() }}',
                'uploader_url' : '{{ route('upload_image') }}',
                'notification_url' : '{{ route('notification.count') }}'
            };
        </script>

        @if($stylesheet)
		<style type="text/css">
		{!! $stylesheet !!}
		</style>
		@endif
<body>

<div class="all">
    <div class="head">
        <a href="index.html" class="logo"><img src="{{ asset('images/index/logo.jpg') }}" width="370" height="100" alt="" title="" /></a>
        <ul class="heada" style="color:#818181">
			<!--888888888888888888888888888-->
			@if(Auth::check())   
				
				<li style="width:150px;margin-left:-100px">
					欢迎您：</sp<a href="#"><img src="{{asset('images/index/img1.jpg')}}" style="width:20px;height:20px;" />
					{{ $current_user->username }}
				</li>
				
				<li style="margin-left:10px;" class=""><a href="{{ route('user.home', $current_user->id) }}">{{ trans('hifone.users.profile') }}</a></li>
                <li><a href="{!! route('user.edit', Auth::user()->id) !!}">{{ trans('hifone.users.edit.title') }}</a></li>
                <li><a href="{!! url('auth/logout') !!}" onclick=" return confirm('{!! trans('hifone.logout_confirm') !!}')">{!! trans('hifone.logout') !!}登录
                    </a></li>
				</li>
			@endif
			
          @if(Auth::check())
			@if($current_user->hasRole(['Founder','Admin']))
                 <li>
                   <a href="/admin" data-pjax="no" title="{{ trans('hifone.dashboard') }}"><i class="fa fa-wrench"></i> <span class="hidden-xs hidden-sm">{{ trans('hifone.dashboard') }}</span></a>
                 </li>
            @endif
				  <li {!! set_active('notification*', ['notification']) !!} style="width:60px;">
					<a  href="{!! route('notification.index') !!}" class="notification-count {{ $current_user->notification_count ? 'new' : null }}"><span class="count" style="color:red;font-size:17px;float:right">{{ $current_user->notification_count ?: null }}</span><i title="我的消息" class="fa fa-bell"></i></a>
				  </li>
		  @else
			  <li {!! set_active('auth/register') !!} style="margin-left:170px;">
				<a href="{!! url('auth/register') !!}" id="signup-btn">{!! trans('hifone.signup') !!}</a>
			  </li>
			  <li {!! set_active('auth/login') !!} >
				<a href="{!! url('auth/login') !!}" style="margin-left:-20px;" id="login-btn">{!! trans('hifone.login.login') !!}</a>
			  </li>
          @endif
		<!--888888888888888888888888888-->
        </ul>
		
    </div>
    <div class="nav">
        <ul>
            <li class="navb"><a href="{{ route('index.index') }}" class="nava">首页</a></li>
            <li class="navb"><a href="#">空间</a></li>
            <li class="navb"><a href="{{ route('album.index') }}">相册</a></li>
            <li class="navb"><a href="{{route('activity.index')}}">活动</a></li>
            <li class="navb"><a href="{{ route('thread.index') }}">话题</a></li>
            <li class="navb"><a href="{{ route('search.index') }}">搜索</a></li>
            <li class="navb"><a href="#">关于我们</a></li>
            <li class="navc" ><a href="#"><span><img src="{{asset('images/index/img2.jpg')}}" width="28" height="26" alt="" /></span></a></li>
            <li class="navc"><a href="#"><span><img src="{{asset('images/index/img3.jpg')}}" width="28" height="26" alt="" /></span></a></li>
        </ul>
    </div>
    <div class="clear"></div>

		@yield('content')

