<div class="b_hf" style="width: 1000px;">
	<ul>
	    <li  class="<?php echo in_array(Route::currentRouteName(),['profile.base','profile.standard','profile.dating','profile.detail','profile.happy']) ? 'select' : ''; ?>"><a href="<?php echo e(route('profile.base')); ?>">个人资料</a></li>
	    <li  class="<?php echo Route::currentRouteName() == 'setting.avatar' ? 'select' : ''; ?>"><a href="<?php echo e(route('setting.avatar')); ?>">头像设置</a></li>
	    <li  class="<?php echo in_array(Route::currentRouteName(),['credit.index','credit.rule','credit.role','credit.perminssion'])  ? 'select' : ''; ?>"><a href="<?php echo e(route('credit.index')); ?>">积分设置</a></li>
	    <li  class="<?php echo in_array(Route::currentRouteName(), ['identify.mobile','identify.email','identify.name','identify.education']) ? 'select' : ''; ?>"><a href="<?php echo e(route('identify.mobile')); ?>">认证中心</a></li>
	    <li  class="<?php echo Route::currentRouteName() == 'user.star' ? 'select' : ''; ?>"><a href="<?php echo e(route('user.star')); ?>">级别认证</a></li>
	</ul>
</div>