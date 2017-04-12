<div class="head">
        <a href="{{route('index.index')}}" class="logo"><img src="{{ asset('images/index/logo.jpg') }}" width="370" height="100" alt="" title="" /></a>
        <ul class="heada" style="color:#818181">
			@if(Auth::check())

				<li>
					欢迎您：</sp<a href="{{ route('user.home', $current_user->id) }}"><img src="{{asset('images/index/img1.jpg')}}" style="width:20px;height:20px;" />
					{{ $current_user->username }}
				</li>

				<li style="margin-left:10px;" class=""><a href="{{ route('user.home', $current_user->id) }}">{{ trans('hifone.users.profile') }}</a></li>
                <li><a href="{!! route('profile.base') !!}">{{ trans('hifone.users.edit.title') }}</a></li>
                <li><a href="{!! route('invitation.index') !!}">邀请好友</a></li>
                <li><a href="{!! url('auth/logout') !!}" onclick=" return confirm('{!! trans('hifone.logout_confirm') !!}')">{!! trans('hifone.logout') !!}登录
                    </a></li>
				</li>
			@endif

          @if(Auth::check())
			@if($current_user->hasRole(['Founder','Admin']))
                 <!--<li>
                   <a href="/admin" data-pjax="no" title="{{ trans('hifone.dashboard') }}"><span class="hidden-xs hidden-sm">{{ trans('hifone.dashboard') }}</span></a>
                 </li>-->
            @endif

		  @else
			  <li {!! set_active('auth/register') !!} style="margin-left:170px;">
				<a href="{!! url('auth/register') !!}" id="signup-btn">{!! trans('hifone.signup') !!}</a>
			  </li>
			  <li {!! set_active('auth/login') !!} >
				<a href="{!! url('auth/login') !!}" style="margin-left:-20px;" id="login-btn">{!! trans('hifone.login.login') !!}</a>
			  </li>
          @endif
        </ul>

    </div>
    <div class="nav">
        <ul>
            <li class="navb"><a href="{{ route('index.index') }}" class="{!! in_array(Route::currentRouteName(),['index.index'])  ? 'nava' : '' !!}">首页</a></li>
            <li class="navb"><a href="{{route('space.index')}}" class="{!! in_array(Route::currentRouteName(),['space.index'])  ? 'nava' : '' !!}">空间</a></li>
            <li class="navb"><a href="{{ route('album.index') }}" class="{!! in_array(Route::currentRouteName(),['album.index'])  ? 'nava' : '' !!}">相册</a></li>
            <li class="navb"><a href="{{route('activity.index')}}" class="{!! in_array(Route::currentRouteName(),['activity.index'])  ? 'nava' : '' !!}">活动</a></li>
            <li class="navb"><a href="{{ route('thread.index') }}" class="{!! in_array(Route::currentRouteName(),['thread.index'])  ? 'nava' : '' !!}">话题</a></li>
            <li class="navb"><a href="{{ route('blog.index') }}" class="{!! in_array(Route::currentRouteName(),['blog.index'])  ? 'nava' : '' !!}">日志</a></li>
            <li class="navb"><a href="{{ route('search.index') }}" class="{!! in_array(Route::currentRouteName(),['search.index'])  ? 'nava' : '' !!}">搜索</a></li>
            <li class="navb"><a href="{{ route('about.index') }}" class="{!! in_array(Route::currentRouteName(),['about.index'])  ? 'nava' : '' !!}">关于我们</a></li>
            <li class="navc" >
	            <a href="{!! route('notification.index') !!}"><span><img src="{{asset('images/index/img2.jpg')}}" width="28" height="26" alt="" /></span>@if($current_user->notification_count)<span class="count">{{ $current_user->notification_count }}</span>@endif</a>
            </li>
            <li class="navc">
	            <a href="{{ route('user.home', $current_user->id) }}"><span><img src="{{asset('images/index/img3.jpg')}}" width="28" height="26" alt="" /></span></a>
	            <ul>
		            <li><a href="{{ route('profile.base') }}">个人设置</a></li>
		            <li><a href="{{ route('task.index') }}">任务</a></li>
		            <li><a href="{{ route('pay.index') }}">我的账户</a></li>
	            </ul>
	        </li>
        </ul>
    </div>
    <div class="clear"></div>
