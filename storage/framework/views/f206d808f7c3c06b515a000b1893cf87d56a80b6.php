<?php $__env->startSection('title'); ?>
<?php echo e(trans('hifone.users.edit_profile')); ?>@parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="users-show">

  <div class="col-md-3 box">
    <?php echo $__env->make('users.partials.basicinfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>

  <div class="col-md-9 left-col">

    <div class="panel panel-default">

      <div class="panel-body ">
        <ul class="nav nav-tabs" role="tablist">
          <li <?php if(!$tab): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('user.edit',['id'=>$user->id])); ?>"><?php echo e(trans('hifone.users.info')); ?></a></li>
          <li <?php if($tab=='avatar'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('user.edit',['id'=>$user->id,'tab'=>'avatar'])); ?>"><?php echo e(trans('hifone.users.avatar')); ?></a></li>
          <li <?php if($tab=='password'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('user.edit',['id'=>$user->id,'tab'=>'password'])); ?>"><?php echo e(trans('hifone.users.password')); ?></a></li>
        </ul>
        <?php if($tab == 'avatar'): ?>
        <form class="form-horizontal" method="post" action="/settings/update-avatar" enctype="multipart/form-data" id="avatar-form">
                <?php echo e(csrf_field()); ?>

                <h5><i class="fa fa-image"></i>&nbsp;&nbsp;<?php echo e(trans('hifone.users.edit_avatar')); ?></h5><hr>
                <div class="form-group">
                    <div class="col-sm-4 avatar-setting-container">
                       <img src="<?php echo e(Auth::user()->avatar); ?>" id="avatar" class="upload-btn" style="cursor: pointer;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 status-post-submit">
                    <button type="button" class="btn btn-primary upload-btn">
                        <?php echo e(trans('hifone.users.upload_avatar')); ?>

                    </button>
                    <span class="loading"></span>
                    <input type="file" id="avatarinput" name="avatar" class="hide">
                    <span class="help-block">
                        <?php echo e(trans('hifone.users.upload_avatar_help')); ?></span>
                    <button type="submit" class="btn btn-primary hidden" id="avatarinput-submit">更新</button>
                    </div>
                </div>
        </form>
        <?php elseif($tab == 'password'): ?>
        <form class="form-horizontal" method="post" action="/settings/resetPassword" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <h5><i class="fa fa-wrench"></i>&nbsp;&nbsp;<?php echo e(trans('hifone.users.password_settings')); ?></h5><hr>
            <div class="form-group">
                <div class="col-sm-4">
                <input type="password" name="old_password" placeholder="<?php echo e(trans('hifone.users.password_current')); ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                <input type="password" name="password" placeholder="<?php echo e(trans('hifone.users.password_new')); ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                <input type="password" name="password_confirmation" placeholder="<?php echo e(trans('hifone.users.password_new_confirmation')); ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 status-post-submit">
                <button type="submit" class="btn btn-primary" id="update-password"><?php echo e(trans('hifone.users.password_update')); ?></button>
                </div>
            </div>
      </form>
      <?php else: ?>
      <?php echo Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch']); ?>

          <h5><i class="fa fa-tasks"></i>&nbsp;&nbsp;<?php echo e(trans('hifone.users.info')); ?></h5>
          <div class="form-group">
            <?php echo Form::text('nickname', null, ['class' => 'form-control', 'placeholder' => trans('hifone.users.nickname')]); ?>

          </div>
          <div class="form-group">
            <?php echo Form::text('location', null, ['class' => 'form-control', 'placeholder' => trans('hifone.users.location')]); ?>

            <div class="help-block"><?php echo e(trans('hifone.users.location_help')); ?></div>
          </div>
          <div class="form-group">
            <?php echo Form::text('company', null, ['class' => 'form-control', 'placeholder' => trans('hifone.users.company')]); ?>

          </div>
          <div class="form-group">
            <?php echo Form::text('website', null, ['class' => 'form-control', 'placeholder' => trans('hifone.users.website')]); ?>

          </div>
          <div class="form-group">
            <?php echo Form::textarea('signature', null, ['class' => 'form-control',
                                              'rows' => 3,
                                              'placeholder' => trans('hifone.users.signature')]); ?>

          </div>
          <div class="form-group">
            <?php echo Form::textarea('bio', null, ['class' => 'form-control',
                                              'rows' => 3,
                                              'placeholder' => trans('hifone.users.bio')]); ?>

          </div>
          <div class="form-group">
              <label><?php echo e(trans('hifone.users.locale')); ?></label>
              <select name="locale" class="form-control" required>
                  <option value=""><?php echo e(trans('hifone.users.select_language')); ?></option>
                  <?php foreach($langs as $key => $lang): ?>
                      <option value="<?php echo e($key); ?>" <?php echo e($user->locale == $key ? "selected" : null); ?>><?php echo e($lang); ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          <div class="form-group status-post-submit">
            <?php echo Form::submit(trans('forms.update'), ['class' => 'btn btn-primary', 'id' => 'user-edit-submit']); ?>

          </div>
        <?php echo Form::close(); ?>

      <?php endif; ?>
      </div>
    </div>
  </div>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>