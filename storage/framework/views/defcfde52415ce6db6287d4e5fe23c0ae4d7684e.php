<div class="list" id="item_<?php echo e($reply_id); ?>">
	<dl class="b_nc" model-node="comment_list">
		<dt>
			<a href="<?php echo e($user_info['space_url']); ?>">
				<img src="<?php echo e($user_info['avatar_url']); ?>" width="48px" height="46px" style="width:48px;height:48px" alt="">
			</a>
		</dt>
		<dd class="b_nd">
			<p>
				<span class="green">
					<?php echo $user_info['space_link']; ?>

				</span> (<?php echo e($user_info['work']); ?>/<?php echo e($user_info['school']); ?>) <?php echo e(friendlyDate($created_at)); ?>

			</p>
			<p><?php echo $content; ?></p>
		</dd>
		<dd class="b_ne" style="margin-top:0px">
			<a href="javascript:void(0)" event-args="post_id=<?php echo e($post_id); ?>&to_reply_id=<?php echo e($reply_id); ?>&to_user_id=<?php echo e($user_id); ?>&to_comment_uname=<?php echo e($user_info['username']); ?>&id=<?php echo e($reply_id); ?>&addtoend=<?php echo e($addtoend); ?>" event-node="reply_reply"><?php echo e(trans('public.PUBLIC_STREAM_REPLY')); ?></a>&nbsp;
			<?php if(Auth::id() == $user_info['id'] || Auth::user()->can("manage_comment")): ?>
			<a href="javascript:;" event-node="reply_del" event-args="reply_id=<?php echo e($reply_id); ?>">删除</a>&nbsp;
			<?php endif; ?>
			<!--<a href="#" class="jubaoshow">举报</a>-->
		</dd>
	</dl>
</div>