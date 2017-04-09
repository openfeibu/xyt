<dl class="b_nc" class="comment_list"  model-node="comment_list">
	<dt>
		<a href="<?php echo e($userInfo['space_url']); ?>">
			<img src="<?php echo e($userInfo['avatar_url']); ?>" width="48px" height="46px" style="width:48px;height:48px" alt="">
		</a>
	</dt>
	<dd class="b_nd">
		<p>
			<span class="green">
				<?php echo $userInfo['space_link']; ?>

			</span> (<?php echo e($userInfo['work']); ?>/<?php echo e($userInfo['school']); ?>) <?php echo e(friendlyDate($created_at)); ?>

		</p>
		<p><?php echo $content; ?></p>
	</dd>
	<dd class="b_ne" style="margin-top:0px">
		<a href="javascript:void(0)" event-args='row_id=<?php echo e($row_id); ?>&app_uid=<?php echo e($app_user_id); ?>&to_comment_id=<?php echo e($comment_id); ?>&to_uid=<?php echo e($userInfo['id']); ?>&to_comment_uname=<?php echo e($userInfo['username']); ?>' event-node="reply_comment"><?php echo e(trans('public.PUBLIC_STREAM_REPLY')); ?></a>&nbsp;<a href="#" class="jubaoshow">举报</a>
	</dd>
</dl>