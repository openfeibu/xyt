<p style="color: #51B837">
 	<?php foreach($breadcrumbs as $index => $breadcrumb): ?>
 		<?php if($index == count($breadcrumbs) -1 ): ?>
	        <strong><?php echo e($breadcrumb['name']); ?></strong>
	    <?php else: ?>
	        <a href="<?php echo e($breadcrumb['url']); ?>">
	            <span><?php echo e($breadcrumb['name']); ?> >></span>  
	        </a>
        <?php endif; ?>
 	<?php endforeach; ?>
</p>