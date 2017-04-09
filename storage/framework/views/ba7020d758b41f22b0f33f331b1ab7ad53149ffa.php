<?php $__env->startSection('content'); ?>
<div class="b_j">
<div class="b_ja">
<span>></span>佳丽社区
</div>
<div class="b_k">
<?php $formTypePresenter = app('Hifone\Presenters\FormTypePresenter'); ?>
<?php foreach($users as $key => $user): ?>
<div class="b_ka">
<table cellpadding="0" cellspacing="0">
<tr><td rowspan="4" width="120px"><a href="<?php echo e(route('user.home',$user->id)); ?>"><img src="<?php echo e($user->avatar); ?>" width="95" height="118" alt="" title="" /></a></td><td><span class="green">姓名:</span><?php echo e($user->username); ?></td><td><span class="green">居住地:</span> <?php echo e($user->location); ?></td><td><span class="green">职业:</span> <?php echo e($user->work); ?></td></tr>
<tr><td><span class="green">学历:</span><?php echo e(form_config_value('basic_data','education',$user->education)); ?></td><td><span class="green">学校: </span><?php echo e($user->school); ?></td><td><span class="green">恋爱状态:</span> <?php echo e(form_config_value('standard_data','lovestatus',$user->lovestatus)); ?></td></tr>
<tr><td colspan="3"><span class="green">内心独白:</span> <?php echo e($user->aboutme); ?></td></tr>
<tr><td colspan="3"><a href="" class="b_kb">会员的详细资料及择偶要求</a>（会员号：<?php echo e($user->id); ?>）</td></tr>

</table>
</div>
<?php endforeach; ?>

<div class="clear"></div>
<?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($users))->render(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>