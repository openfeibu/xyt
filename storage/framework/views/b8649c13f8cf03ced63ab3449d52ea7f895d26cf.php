<?php echo replaceUrl(t($body)); ?>

<dl class="comment_feed">
	<?php if($sourceInfo['source_user_info'] != false): ?>
	<dd class="com-info clearfix">
			<!--{* 视频分享 *}-->
			<?php if($sourceInfo['feedType'] == 'postvideo'): ?>
				<?php echo e($sourceInfo['source_body']); ?>

			<?php endif; ?>
			<?php if($sourceInfo['feedType'] == 'post'): ?>
			<div class="feed_txt feed_txt_default">
	      <!--  转发原文 -->
            <span class="source_info"><?php echo e($sourceInfo['source_user_info']['space_link']); ?><em>&nbsp;&nbsp;<?php echo e(friendlyDate($sourceInfo['created_at'])); ?><!--&nbsp;<?php echo e(getFromClient($sourceInfo['from'])); ?>--></em></span>
		    <p class="txt-mt" onclick="core.weibo.clickRepost(this);" href=""><?php echo msubstr(t($sourceInfo['source_content']),0,100); ?></p>
			</div>
			<?php endif; ?>

		
	</dd>
	<?php else: ?>
	<dd class="name">内容已被删除</dd>
	<?php endif; ?>
</dl>