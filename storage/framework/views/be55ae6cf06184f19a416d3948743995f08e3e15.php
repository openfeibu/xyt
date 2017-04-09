<div>
    <span class="fleft span1"><?php echo e(trans('hifone.users.dynamic.'.$type)); ?>（共<?php echo e($count); ?>篇）</span>
    <!--<span class="fright span2"><a href="" style="color: #51B837">全部</a></span>-->
</div>
<div id=""></div>
<div class="clear" style="height: 10px;border-bottom: 2px #e2e1e1 solid"></div>
<?php if($type == 'activity'): ?>
<?php foreach($datas as $data): ?>  
<div class="my_gift" style="height: 100px;">
    <p style="margin-top: 20px;">
        <span class="fleft" style="color: #818181"><a href="<?php echo e($data->url); ?>" style="color: #51B837" target="_blank"><?php echo e($data->name); ?></a>[<?php echo e($data->cate); ?>]</span>
        <span class="fright"><?php echo e($data->time_desc); ?></span>
    </p>
    <div class="clear" style="height: 10px;"></div>
    <p>
        <span style="color: #818181;">
            活动时间：<?php echo e($data->begin_time); ?>

        </span>
    </p>
    <p class="clear" style="margin-top: 10px;">
        <span style="color: #818181">
            活动地点：<?php echo e($data->location); ?>

        </span>
    </p>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<?php endforeach; ?>
<?php else: ?>
<?php foreach($datas as $data): ?>       
<div class="my_gift" style="color: #818181">
    <p style="margin-top: 20px;">
        <span class="fleft"><a href="<?php echo e($data->url); ?>" style="color: #51B837" target="_blank"><?php echo e($data->title); ?></a></span>
        <span class="fright"><?php echo e($data->created_at); ?></span>
    </p>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<?php endforeach; ?>
<?php endif; ?>
