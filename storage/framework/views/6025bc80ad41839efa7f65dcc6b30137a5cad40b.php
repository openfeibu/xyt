<?php $__env->startSection('content'); ?>

<div class="panel panel-default list-panel">
  <div class="panel-heading">
    <h3 class="panel-title text-center">
      <?php echo e(trans('hifone.threads.excellent')); ?> &nbsp;
      <a href="<?php echo e(route('feed')); ?>" style="color: #E5974E; font-size: 14px;" target="_blank">
         <i class="fa fa-rss"></i>
      </a>
    </h3>

  </div>

  <div class="panel-body">
    <?php echo $__env->make('threads.partials.threads', ['column' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>

  <div class="panel-footer text-right">

  	<a href="thread?filter=excellent">
  		<?php echo e(trans('hifone.threads.more')); ?>...
  	</a>
  </div>
</div>

<!-- Nodes Listing -->
<?php echo $__env->make('nodes.partials.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>