<ul class="nav nav-tabs" role="tablist">
  <li class="<?php echo Route::currentRouteName() == 'user.home' ? 'active' : ''; ?>">
  	<a href="<?php echo $user->url; ?>" ><?php echo trans('hifone.users.info'); ?></a>
  </li>
  <li class="<?php echo Route::currentRouteName() == 'user.threads' ? 'active' : ''; ?>">
    <a href="<?php echo route('user.threads', $user->id); ?>" ><?php echo trans('hifone.threads.threads'); ?></a>
  </li>
  <li class="<?php echo Route::currentRouteName() == 'user.replies' ? 'active' : ''; ?>">
  	<a href="<?php echo route('user.replies', $user->id); ?>" ><?php echo trans('hifone.replies.replies'); ?></a>
  </li>
  <li class="<?php echo Route::currentRouteName() == 'user.favorites' ? 'active' : ''; ?>">
  	<a href="<?php echo route('user.favorites', $user->id); ?>" ><?php echo trans('hifone.favorite'); ?></a>
  </li>
</ul>
