<p><?php echo e(replaceUrl($body)); ?></p>
<div class="feed_img_lists" >
<ul class="small">

<?php $attachCount=count($attachInfo);$i = 0; ?>
<?php foreach($attachInfo as $key => $vo ): ?>
	<li rel="<?php echo e($vo['attach_id']); ?>" <?php if($attachCount==1): ?> style="width:205px;height:auto" <?php endif; ?>>
		<a href="<?php echo e($vo['attach_medium']); ?>"  target="_blank">
		   <img <?php if($attachCount==1): ?> onload="/*仅标签上有效，待改进*/;var li=$(this).parents('li');if(li.height()>300){li.css('height','300px');li.find('.pic-btm').show();}" <?php endif; ?> class="imgicon" src='<?php if($attachCount==1): ?> <?php echo e($vo['attach_medium']); ?> <?php else: ?> <?php echo e($vo['attach_small']); ?> <?php endif; ?>' title='点击放大' >
		</a>
	</li>
<?php $i ++; ?>

<?php endforeach; ?>
</ul>
</div>
