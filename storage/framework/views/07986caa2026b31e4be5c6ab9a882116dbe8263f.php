<?php foreach($list as $k => $vo): ?>
<div class="list" id="item_<?php echo e($vo->id); ?>">
    <dl class="b_nc" model-node="comment_list">
		<dt>
			<a href="<?php echo e($vo->user_info['space_url']); ?>">
				<img src="<?php echo $vo->user_info['avatar_url']; ?>" width="48px" height="46px" style="width:48px;height:48px" alt="">
			</a>
		</dt>
		<dd class="b_nd">
			<p>
				<span class="green">
					<?php echo $vo->user_info['space_link']; ?>

				</span> (<?php echo e($vo->user_info['work']); ?>/<?php echo e($vo->user_info['school']); ?>) <?php echo e(friendlyDate($vo->created_at)); ?>

			</p>
			<p><?php echo $vo->content; ?></p>
		</dd>
		<dd class="b_ne" style="margin-top:0px">
			<a href="javascript:void(0)" event-args="url=<?php echo e(route('wall.reply_reply')); ?>&post_id=<?php echo e($post_id); ?>&to_reply_id=<?php echo e($vo->id); ?>&to_user_id=<?php echo e($vo->user_id); ?>&to_comment_uname=<?php echo e($vo->user_info['username']); ?>&id=<?php echo e($vo->id); ?>&addtoend=<?php echo e($addtoend); ?>" event-node="reply_reply"><?php echo e(trans('public.PUBLIC_STREAM_REPLY')); ?></a>&nbsp;
			<?php if(Auth::id() == $vo->user_info['id'] || Auth::user()->can("manage_comment")): ?>
				<a href="javascript:;" event-node="reply_del" event-args="reply_id=<?php echo e($vo->id); ?>">删除</a>&nbsp;
			<?php endif; ?>
		</dd>
	</dl>
</div>
<?php endforeach; ?>