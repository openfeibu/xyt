<div class="feed_lists" id="feed-lists">
<?php echo $var['list']; ?>

</div>
<div class="content_list">                      
	<div class="clear"></div>
	<?php if($var['showPage'] === 1): ?>

	<div id="page" class="page"><?php echo e($var['pageHtml']); ?></div>
	<?php endif; ?>
</div>

<script type="text/javascript">
var firstId = '<?php echo e($var['firstId']); ?>';
var loadId = '<?php echo e($var['lastId']); ?>';
var maxId = '<?php echo e($var['firstId']); ?>';
var feedType = '<?php echo e($var['type']); ?>';
var loadmore = '<?php echo e($var['loadmore']); ?>';
var loadnew = '<?php echo e($var['loadnew']); ?>';
var feed_type = '<?php echo e($var['feed_type']); ?>';
var feed_key = '<?php echo e($var['feed_key']); ?>';
var app = '<?php echo e($var['app']); ?>';

</script>