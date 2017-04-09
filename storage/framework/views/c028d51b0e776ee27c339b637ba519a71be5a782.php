<?php $__env->startSection('content'); ?>
    <div class="TA">
        <div class="b_ja">
             <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
                        <li class="select" style="color: #146500;">全部通知</li>
                    </ul>
                </div>
                <div class="b_he">
                    <div class="notifications panel">
					    <?php if(count($notifications)): ?>
						<div class="panel-body remove-padding-horizontal notification-index content-body">

							<ul class="list-group row">
								<?php foreach($notifications as $day => $item): ?>
									<div class="notification-group">
									<div class="group-title"><i class="fa fa-clock-o"></i> <?php echo e($day); ?></div>
									<?php foreach($item as $notification): ?>
										<?php echo $__env->make('notifications.partials.'.$notification->template, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php endforeach; ?>
									</div>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="panel-footer text-right remove-padding-horizontal pager-footer">
							<!-- Pager -->
						</div>
					    <?php else: ?>
						<div class="panel-body">
							<div class="empty-block"><?php echo trans('hifone.notifications.noitem'); ?></div>
						</div>
					    <?php endif; ?>

					</div>
                   
					
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>