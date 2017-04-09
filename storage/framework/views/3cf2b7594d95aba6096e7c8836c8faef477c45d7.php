<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/blog.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.atwho.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/weiba.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.draggable.js')); ?>"></script>
<div class="clear"></div>
<div class="b_n">
<div class="b_na">
	<strong class="green"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></strong>
</div>
<div class="b_nb">
	<div class="left blog">
		<div class="main">
			<div class="blog_main" style="width: 975px;">
				<div class="blog_title">
					<p class="title"><?php echo e($summary->title); ?></p>
					<p class="time"><?php echo e($summary->created_at); ?></p>
				</div>
				<div class="blog_body">
					<p><?php echo $summary->body; ?></p>
					
 				</div>
			</div>
			<div class="blog_comment">
				
			</div>
		</div>
	</div>
	
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>