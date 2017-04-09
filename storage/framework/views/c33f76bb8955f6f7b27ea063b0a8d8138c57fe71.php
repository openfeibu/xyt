<div class="contents clearfix">
	<div class="mb10 clearfix">
		<?php echo e($sourceInfo['source_content']); ?>

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
</div>