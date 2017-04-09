<ul class="list-group row">
  <?php foreach($replies as $index => $reply): ?>
   <li class="list-group-item media <?php echo e($reply->highlight); ?>" id="reply<?php echo e($reply->id); ?>">
    <div class="avatar pull-left">
      <a href="<?php echo route('user.show', [$reply->user_id]); ?>">
        <img class="media-object img-thumbnail avatar" alt="<?php echo $reply->user->username; ?>" src="<?php echo $reply->user->avatar_small; ?>"  style="width:48px;height:48px;"/>
      </a>
    </div>
    <div class="infos">

      <div class="media-heading meta">

        <a href="<?php echo route('user.show', [$reply->user_id]); ?>" title="<?php echo $reply->user->username; ?>" class="remove-padding-left author">
            <?php echo $reply->user->username; ?>

        </a>
        <abbr class="timeago" title="<?php echo $reply->created_at; ?>"><?php echo $reply->created_at; ?></abbr>
        <a name="reply<?php echo $thread->replyFloorFromIndex($index); ?>" class="anchor" href="#reply<?php echo $thread->replyFloorFromIndex($index); ?>" aria-hidden="true">#<?php echo $thread->replyFloorFromIndex($index); ?></a>

        <span class="opts pull-right">
          <span class="hideable">
            <?php if(Auth::user() && (Auth::user()->can("manage_threads") || Auth::user()->id == $reply->user_id) ): ?>
            <a class="fa fa-trash-o" id="reply-delete-<?php echo $reply->id; ?>" data-method="delete"  href="javascript:void(0);" data-url="<?php echo route('reply.destroy', [$reply->id]); ?>" title="<?php echo trans('forms.delete'); ?>"></a>
          <?php endif; ?>
            <a class="fa fa-reply btn-reply2reply" data-floor=<?php echo e($index + 1); ?> data-username="<?php echo e($reply->user->username); ?>" href="#" title="回复 <?php echo $reply->user->username; ?>"></a>
          </span>
          <a class="likeable fa fa-thumbs-o-up" data-action="like" data-url="<?php echo e(route('like.store')); ?>" data-type="Reply" data-id="<?php echo e($reply->id); ?>" data-count="<?php echo $reply->like_count ?: 0; ?>" href="javascript:void(0);" title="<?php echo trans('hifone.like'); ?>"> <?php echo $reply->like_count ?: ''; ?>

          </a>
        </span>

      </div>

      <div class="media-body markdown-reply content-body">
      <?php echo $reply->body; ?>

      </div>
    </div>
  </li>
  <?php endforeach; ?>
</ul>