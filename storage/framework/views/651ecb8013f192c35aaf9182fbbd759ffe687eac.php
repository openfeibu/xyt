<div class="meta inline-block" >

  <a href="<?php echo e($thread->node->url); ?>" class="remove-padding-left">
    <?php echo e($thread->node->name); ?>

  </a>
  •
  <a href="<?php echo e(route('user.home', $thread->user->username)); ?>">
    <?php echo e($thread->user->username); ?>

  </a>

  <?php if($thread->user->hasBadge): ?>
    <span class="label label-warning" style="position: relative;"><?php echo e($thread->user->badgeName); ?></span>
  <?php endif; ?>
  •
  <?php echo e(trans('hifone.at')); ?> <abbr title="<?php echo e($thread->created_at); ?>" class="timeago"><?php echo e($thread->created_at); ?></abbr>
  •

  <?php if(count($thread->lastReplyUser)): ?>
    <?php echo e(trans('hifone.threads.last_reply_by')); ?>

      <a href="<?php echo e(route('user.home', [$thread->lastReplyUser->username])); ?>">
        <?php echo e($thread->lastReplyUser->username); ?>

      </a>
     <?php echo e(trans('hifone.at')); ?> <abbr title="<?php echo e($thread->updated_at); ?>" class="timeago"><?php echo e($thread->updated_at); ?></abbr>
    •
  <?php endif; ?>

  <?php echo e($thread->view_count); ?> <?php echo e(trans('hifone.view_count')); ?>

</div>
<div class="clearfix"></div>
