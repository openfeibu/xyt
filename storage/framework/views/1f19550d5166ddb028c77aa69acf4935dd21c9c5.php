<div class="contents clearfix">
	<div class=" mb10 clearfix">
		<?php echo e($sourceInfo['source_content']); ?> 
		<div class="comment_feed feed_txt feed_txt_default">
			<div class="hotspot"><a href="<?php echo e($sourceInfo['source_url']); ?>" class="active"><?php echo e($sourceInfo['user_count']); ?></a></div>
			<p><a href="<?php echo e($sourceInfo['source_url']); ?>" class="active"><?php echo e($sourceInfo['title']); ?></a> </p>
			<p>分类名称:<a href="<?php echo e(route('thread.node_content', $sourceInfo['node_id'])); ?>" class="active"><?php echo e($sourceInfo['node_name']); ?></a></p>
			<p><?php echo e(mb_substr($sourceInfo['body_original'],0,200,'utf-8')); ?></p>
			
		</div>
		
	</div>
	
</div>