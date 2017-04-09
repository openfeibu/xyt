<div id="notification-<?php echo e($notification->id); ?>" data-id="<?php echo e($notification->id); ?>" class="media notification notification-topic_reply">
  <div class="media-left">
    <a title="<?php echo e($notification->author->username); ?>" class="user-avatar" href="<?php echo e(route('user.home', [$notification->author->id])); ?>"><img src="<?php echo e($notification->author->avatar_small); ?>" alt="<?php echo e($notification->author->id); ?>"></a>
  </div>
  <div class="media-body">
    
  <div class="media-heading">
    <?php echo e($notification->labelUp); ?>

	<a href="<?php echo e(route('thread.show', [$notification->object->thread->id])); ?>#reply<?php echo e($notification->object_id); ?>" title="<?php echo e($notification->object->thread->title); ?>">
		<?php echo str_limit($notification->object->thread->title, '100'); ?>

	</a>
  </div>
    <div class="media-content summary markdown-reply">
      <?php echo $notification->body; ?>

    </div>

  </div>
  <div class="media-right">
		<span class="timeago"><?php echo e($notification->created_at); ?></span>
  </div>
</div>
