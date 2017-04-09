<div class="header">
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header" id="navbar-header">
          <a href="/" class="navbar-brand"><?php if(Config::get('setting.site_logo')): ?><img src="<?php echo e(Config::get('setting.site_logo')); ?>">
        <?php else: ?>
        <?php echo e(Config::get('setting.site_name')); ?>

        <?php endif; ?></a>
        </div>
        <div id="main-nav-menu">
          <ul class="nav navbar-nav">
          <li <?php echo set_active('/'); ?>><a href="<?php echo route('home'); ?>"><i class="fa fa-home"></i> <span class="hidden-xs hidden-sm"><?php echo trans('hifone.home'); ?></span></a></li>
          <li <?php echo set_active('thread*',['hidden-sm hidden-xs']); ?>><a href="<?php echo route('thread.index'); ?>"><i class="fa fa-comments-o"></i> <?php echo trans('hifone.threads.threads'); ?></a></li>
          <li <?php echo set_active('excellent*'); ?>><a href="<?php echo route('excellent'); ?>"><i class="fa fa-diamond"></i> <span class="hidden-xs hidden-sm"><?php echo trans('hifone.excellent'); ?></span></a></li>
          </ul>
        </div>
        <?php if(Auth::check()): ?>
        <ul class="nav user-bar navbar-nav navbar-right">
          <li <?php echo set_active('users*', ['dropdown']); ?>>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo e($current_user->username); ?> <span class="caret"></span></a>
            <button class="navbar-toggle" type="button" data-toggle="dropdown" role="button" aria-expanded="false">
              <span class="sr-only">Toggle</span>
              <i class="fa fa-reorder"></i>
            </button>
            <ul class="dropdown-menu" role="menu"><li class=""><a href="<?php echo e(route('user.home', $current_user->id)); ?>"><?php echo e(trans('hifone.users.profile')); ?></a></li>
            <li><div class='divider'></div></li>
                <li><a href="<?php echo route('user.edit', Auth::user()->id); ?>"><?php echo e(trans('hifone.users.edit.title')); ?></a></li>
                <li><a href="<?php echo e(route('user.favorites',$current_user->id)); ?>"><?php echo e(trans('hifone.users.favorites')); ?></a></li>
                <li><a href="<?php echo e(route('credit.index')); ?>"><?php echo e(trans('hifone.users.credits')); ?></a></li>
                <li class='divider'></li>
                <li><a href="<?php echo url('auth/logout'); ?>" onclick=" return confirm('<?php echo trans('hifone.logout_confirm'); ?>')"><i class="fa fa-sign-out"></i> <?php echo trans('hifone.logout'); ?>

                    </a></li>
            </ul>
          </li>
        </ul>
      <?php endif; ?>

        <ul class="nav navbar-nav navbar-right">
          <li class="nav-search hidden-xs hidden-sm">
            <?php echo Form::open(['method'=>'get', 'class'=>'navbar-form form-search active', 'target'=>'_blank']); ?>

              <div class="form-group">
                <?php echo Form::input('search','q',null,['placeholder'=>trans('hifone.search'),'class'=>'form-control']); ?>

              </div>
              <i class="fa fa-search"></i>
            <?php echo Form::close(); ?>

          </li>
          <?php if(Auth::check()): ?>
            <?php if($current_user->hasRole(['Founder','Admin'])): ?>
                 <li>
                   <a href="/admin" data-pjax="no" title="<?php echo e(trans('hifone.dashboard')); ?>"><i class="fa fa-wrench"></i> <span class="hidden-xs hidden-sm"><?php echo e(trans('hifone.dashboard')); ?></span></a>
                 </li>
            <?php endif; ?>
          <li <?php echo set_active('notification*', ['notification']); ?>>
            <a href="<?php echo route('notification.index'); ?>" class="notification-count <?php echo e($current_user->notification_count ? 'new' : null); ?>"><i class="fa fa-bell"></i><span class="count"><?php echo e($current_user->notification_count ?: null); ?></span></a>
          </li>
          <?php else: ?>
          <li <?php echo set_active('auth/register'); ?>><a href="<?php echo url('auth/register'); ?>" id="signup-btn"><?php echo trans('hifone.signup'); ?></a></li>
              <li <?php echo set_active('auth/login'); ?>><a href="<?php echo url('auth/login'); ?>" id="login-btn"><?php echo trans('hifone.login.login'); ?></a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </div>