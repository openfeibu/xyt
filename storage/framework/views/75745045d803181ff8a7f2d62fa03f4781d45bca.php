<div class="alerts">
    <div class="alert alert-<?php echo e($level); ?> alert-dismissible" role="alert">
        <button type="button" class="hfclose close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <?php if(isset($title)): ?> 
        <h5><?php echo $title; ?></h5> 
        <?php endif; ?>
        <?php if(is_array($message)): ?>
        <ul class="list-unstyled">
            <?php foreach($message as $msg): ?>
            <li><?php echo $msg; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <?php echo $message; ?>

        <?php endif; ?>
    </div>
</div>