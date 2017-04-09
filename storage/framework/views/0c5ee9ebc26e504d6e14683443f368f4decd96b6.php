<?php $__env->startSection('content'); ?>
<div class="b_a">
<div class="b_atitle"><strong>女士</strong></div>
<ul class="b_aul">
<?php foreach($girl_users as $key => $user): ?>
<li class="user_info_abroad"><a href="<?php echo e(route('user.home',$user->id)); ?>" class="user_info" rel='<?php echo e($user->id); ?>'><img src="<?php echo e($user->avatar); ?>" width="117" height="117" alt="" />
<p><?php echo e($user->username); ?></p><p><?php echo e($user->work); ?> / <?php echo e($user->school); ?></p></a></li>
<?php endforeach; ?>
</ul>

<div class="b_atitle"><strong>男士</strong></div>
<ul class="b_aul">

<?php foreach($boy_users as $key => $user): ?>
<li class="user_info_abroad"><a href="<?php echo e(route('user.home',$user->id)); ?>" class="user_info" rel='<?php echo e($user->id); ?>'><img src="<?php echo e($user->avatar); ?>" width="117" height="117" alt="" />
<p><?php echo e($user->username); ?></p><p><?php echo e($user->work); ?> / <?php echo e($user->school); ?></p></a></li>
<?php endforeach; ?>

</ul>

<div class="clear"></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>