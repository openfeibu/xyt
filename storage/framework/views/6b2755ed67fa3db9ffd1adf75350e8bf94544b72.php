<span id='<?php echo e($var['diggId']); ?><?php echo e($var['space_id']); ?>' rel='<?php echo e($var['digg_count']); ?>'>
<?php if(!isset($var['diggArr'][$var['space_id']])): ?>
   	<a href="javascript:;" onclick="core.digg.addDigg(<?php echo e($var['space_id']); ?>)"><i class="digg-like"></i>
   		<?php if(!empty($var['digg_count'])): ?>
   			(<?php echo e($var['digg_count']); ?>)
   		<?php endif; ?>
   	</a>
<?php else: ?>
   <a href="javascript:;" onclick="core.digg.delDigg(<?php echo e($var['space_id']); ?>)" class="<?php if(!empty($var['digg_count'])): ?>digg-like-yes <?php endif; ?>"><i class="digg-like"></i>
   		<?php if(!empty($var['digg_count'])): ?>
   			(<?php echo e($var['digg_count']); ?>)
   		<?php endif; ?>
   </a>
<?php endif; ?>
</span>