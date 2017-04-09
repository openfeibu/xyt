<?php echo replaceUrl(t($body)); ?>

<dl class="comment_feed">
	<?php if($sourceInfo['source_user_info'] != false): ?>
	<dd class="com-info clearfix">
		<div class="feed_txt feed_txt_default">
        <!--  转发原文 -->
        <span class="source_info"><?php echo e($sourceInfo['source_user_info']['space_link']); ?><em>&nbsp;&nbsp;<?php echo e(friendlyDate($sourceInfo['created_at'])); ?></em></span>
        	<p><?php echo e($sourceInfo['source_content']); ?></p>
		    <div class="feed_img_lists">
				<ul class="small">
					<?php foreach($sourceInfo['images'] as $key => $image): ?>
					<li rel="99">
						<a href="<?php echo e($sourceInfo['album_url']); ?>">
						   <img class="imgicon" src="<?php echo e($image); ?>" >
				        </a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</dd>
	<?php else: ?>
	<dd class="name">内容已被删除</dd>
	<?php endif; ?>
</dl>