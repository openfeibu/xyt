<?php $__env->startSection('content'); ?>
<div class="b_j">
	<div class="b_k b_k_pass">
   	  <div class="message_email">
      <p><img src="<?php echo e(asset('/build/dist/images/cue.png')); ?>" width="28"/> <?php echo e($title); ?> </p>
      <p><?php echo e($content); ?></p>
      <p class="fright"><a href="javascript:history.go(-1);" class="white">返回上一页</a> | <a href="<?php echo e(route('index.index')); ?>" class="white">返回首页</a></p>
      </div>
    </div>
</div>
<div class="clear"></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>