<div class="gexing_main_nav">
  	<p><a href="<?php echo e(route('profile.base')); ?>" class="<?php echo Route::currentRouteName() == 'profile.base' ? 'nav_select' : ''; ?>">基本资料</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo e(route('profile.standard')); ?>" class="<?php echo Route::currentRouteName() == 'profile.standard' ? 'nav_select' : ''; ?>">择偶要求</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo e(route('profile.dating')); ?>" class="<?php echo Route::currentRouteName() == 'profile.dating' ? 'nav_select' : ''; ?>">内心独白</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo e(route('profile.detail')); ?>" class="<?php echo Route::currentRouteName() == 'profile.detail' ? 'nav_select' : ''; ?>">个性信息</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo e(route('profile.happy')); ?>" class="<?php echo Route::currentRouteName() == 'profile.happy' ? 'nav_select' : ''; ?>">幸福宣言</a></p>
</div>