<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/album.css')); ?>" type="text/css" rel="stylesheet" />
<div class="clear"></div>
    <div class="album">
        <div class="album_nav">
            <div style="height: 20px;"></div>
            <?php echo $__env->make('albums.album_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="album_centent">
	        <?php foreach($album_photos as $album_photo): ?>        
            <div class="album_centent_photo fleft">
                <dl>
                    <dd>
                        <img src="<?php echo e($album_photo->image); ?>" alt="" class="album_centent_photo_img" />
                    </dd>
                </dl>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($album_photos))->render();; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>