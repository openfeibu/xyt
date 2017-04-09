<?php foreach($var ['data'] as $vl): ?>
<div class="list">
    <h4><a href="<?php echo e(route('user.home',[$vl['user_info']['id']])); ?>" target="_blank" class="user_info" rel="<?php echo e($vl['user_info']['id']); ?>"><span><img src="<?php echo e($vl['user_info']['avatar_url']); ?>" width="16" height="16" alt="" /></a><a href="<?php echo e(route('user.home',[$vl['user_info']['id']])); ?>" target="_blank" ><span class="r_clist"><?php echo e($vl['user_info']['username']); ?> (<?php echo e($vl['user_info']['work']); ?>/<?php echo e($vl['user_info']['school']); ?>)</span></a><span class="r_ctime"><?php echo e(friendlyDate($vl['created_at'])); ?></span></h4>
    <p><?php echo $vl['body']; ?></p>
</div>
<?php endforeach; ?>