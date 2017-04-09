<div class="head">
        <a href="<?php echo e(route('index.index')); ?>" class="logo"><img src="<?php echo e(asset('images/index/logo.jpg')); ?>" width="370" height="100" alt="" title="" /></a>
        <ul class="heada" style="color:#818181">
			<?php if(Auth::check()): ?>   
				
				<li>
					欢迎您：</sp<a href="<?php echo e(route('user.home', $current_user->id)); ?>"><img src="<?php echo e(asset('images/index/img1.jpg')); ?>" style="width:20px;height:20px;" />
					<?php echo e($current_user->username); ?>

				</li>
				
				<li style="margin-left:10px;" class=""><a href="<?php echo e(route('user.home', $current_user->id)); ?>"><?php echo e(trans('hifone.users.profile')); ?></a></li>
                <li><a href="<?php echo route('profile.base'); ?>"><?php echo e(trans('hifone.users.edit.title')); ?></a></li>
                <li><a href="<?php echo url('auth/logout'); ?>" onclick=" return confirm('<?php echo trans('hifone.logout_confirm'); ?>')"><?php echo trans('hifone.logout'); ?>登录
                    </a></li>
				</li>
			<?php endif; ?>
			
          <?php if(Auth::check()): ?>
			<?php if($current_user->hasRole(['Founder','Admin'])): ?>
                 <!--<li>
                   <a href="/admin" data-pjax="no" title="<?php echo e(trans('hifone.dashboard')); ?>"><span class="hidden-xs hidden-sm"><?php echo e(trans('hifone.dashboard')); ?></span></a>
                 </li>-->
            <?php endif; ?>
				 
		  <?php else: ?>
			  <li <?php echo set_active('auth/register'); ?> style="margin-left:170px;">
				<a href="<?php echo url('auth/register'); ?>" id="signup-btn"><?php echo trans('hifone.signup'); ?></a>
			  </li>
			  <li <?php echo set_active('auth/login'); ?> >
				<a href="<?php echo url('auth/login'); ?>" style="margin-left:-20px;" id="login-btn"><?php echo trans('hifone.login.login'); ?></a>
			  </li>
          <?php endif; ?>
        </ul>
		
    </div>
    <div class="nav">
        <ul>
            <li class="navb"><a href="<?php echo e(route('index.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['index.index'])  ? 'nava' : ''; ?>">首页</a></li>
            <li class="navb"><a href="<?php echo e(route('space.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['space.index'])  ? 'nava' : ''; ?>">空间</a></li>
            <li class="navb"><a href="<?php echo e(route('album.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['album.index'])  ? 'nava' : ''; ?>">相册</a></li>
            <li class="navb"><a href="<?php echo e(route('activity.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['activity.index'])  ? 'nava' : ''; ?>">活动</a></li>
            <li class="navb"><a href="<?php echo e(route('thread.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['thread.index'])  ? 'nava' : ''; ?>">话题</a></li>
            <li class="navb"><a href="<?php echo e(route('blog.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['blog.index'])  ? 'nava' : ''; ?>">日志</a></li>
            <li class="navb"><a href="<?php echo e(route('search.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['search.index'])  ? 'nava' : ''; ?>">搜索</a></li>
            <li class="navb"><a href="<?php echo e(route('about.index')); ?>" class="<?php echo in_array(Route::currentRouteName(),['about.index'])  ? 'nava' : ''; ?>">关于我们</a></li>
            <li class="navc" >
	            <a href="<?php echo route('notification.index'); ?>"><span><img src="<?php echo e(asset('images/index/img2.jpg')); ?>" width="28" height="26" alt="" /></span><?php if($current_user->notification_count): ?><span class="count"><?php echo e($current_user->notification_count); ?></span><?php endif; ?></a>
            </li>
            <li class="navc">
	            <a href="<?php echo e(route('user.home', $current_user->id)); ?>"><span><img src="<?php echo e(asset('images/index/img3.jpg')); ?>" width="28" height="26" alt="" /></span></a>
	            <ul>
		            <li><a href="<?php echo e(route('profile.base')); ?>">个人设置</a></li>
		            <li><a href="<?php echo e(route('task.index')); ?>">任务</a></li>
		            <li><a href="<?php echo e(route('pay.index')); ?>">我的账户</a></li>
	            </ul>
	        </li>
        </ul>
    </div>
    <div class="clear"></div>