
<?php if(count($threads) != 0): ?>
<dl style="margin-left:0px;">
    <?php foreach($threads as $k=>$thread): ?>
    <?php if($k<=5): ?>
     <dd>
       <img src="<?php echo e(asset('images/index/img9.jpg')); ?>" alt="" style="margin-top:-10px;"/>
        <a  style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:23px;" href="<?php echo e(route('thread.show', [$thread->id])); ?>" title="<?php echo e($thread->title); ?>">
            <?php echo e($thread->title); ?>

        </a>
    </dd>
    <?php endif; ?>
    <?php endforeach; ?>
</dl>

<?php else: ?>
   <div style="margin-left:20px;margin-top:20px;" class="empty-block"><?php echo e(trans('hifone.noitem')); ?></div>
<?php endif; ?>
