<div class="b_hf" style="width: 1000px;">
	<ul>
	    <li  class="{!! in_array(Route::currentRouteName(),['profile.base','profile.standard','profile.dating','profile.detail','profile.happy']) ? 'select' : '' !!}"><a href="{{ route('profile.base') }}">个人资料</a></li>
	    <li  class="{!! Route::currentRouteName() == 'setting.avatar' ? 'select' : '' !!}"><a href="{{ route('setting.avatar') }}">头像设置</a></li>
	    <li  class="{!! in_array(Route::currentRouteName(),['credit.index','credit.rule','credit.role','credit.perminssion'])  ? 'select' : '' !!}"><a href="{{ route('credit.index') }}">积分设置</a></li>
	    <li  class="{!! in_array(Route::currentRouteName(), ['identify.mobile','identify.email','identify.name','identify.education']) ? 'select' : '' !!}"><a href="{{ route('identify.mobile') }}">认证中心</a></li>
	    <li  class="{!! Route::currentRouteName() == 'user.star' ? 'select' : '' !!}"><a href="{{ route('user.star') }}">级别认证</a></li>
	</ul>
</div>