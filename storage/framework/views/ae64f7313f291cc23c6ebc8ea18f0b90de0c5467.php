
<?php if(count($list['data'])): ?>  
<?php foreach($list['data'] as $vo): ?>
<dl class="b_nc" class="comment_list"  model-node="comment_list">
	<dt>
		<a href="<?php echo e($vo['user_info']['space_url']); ?>">
			<img src="<?php echo e($vo['user_info']['avatar_url']); ?>" width="48px" height="46px" style="width:48px;height:48px" alt="">
		</a>
	</dt>
	<dd class="b_nd">
		<p>
			<span class="green">
				<?php echo $vo['user_info']['space_link']; ?> 
			</span> (<?php echo e($vo['user_info']['work']); ?>/<?php echo e($vo['user_info']['school']); ?>) <?php echo e(friendlyDate($vo['created_at'])); ?>

		</p>
		<p><?php echo $vo['content']; ?></p>
	</dd>
	<dd class="b_ne" style="margin-top:0px">
		<a href="javascript:void(0)" event-args='row_id=<?php echo e($vo['row_id']); ?>&app_uid=<?php echo e($vo['app_user_id']); ?>&to_comment_id=<?php echo e($vo['id']); ?>&to_uid=<?php echo e($vo['user_id']); ?>&to_comment_uname=<?php echo e($vo['user_info']['username']); ?>&app_name=<?php echo e($app_name); ?>&table=<?php echo e($table); ?>' event-node="reply_comment"><?php echo e(trans('public.PUBLIC_STREAM_REPLY')); ?></a>&nbsp;
		<?php if(Auth::id() == $vo['user_info']['id'] || Auth::user()->can("manage_comment")): ?>
		<a href="javascript:void(0);" event-node="comment_del" event-args="comment_id=<?php echo e($vo['id']); ?>"><?php echo e(L('PUBLIC_STREAM_DELETE')); ?></a>&nbsp;
		<?php endif; ?>
	</dd>
</dl>
<?php endforeach; ?> 


<?php endif; ?>