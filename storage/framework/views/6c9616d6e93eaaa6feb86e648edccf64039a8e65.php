 

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
	        <?php foreach($albums as $album): ?>        
            <div class="album_centent_photo fleft">
                <dl>
                    <dd>
                        <a href="<?php echo e(route('album.album_photos',['album_id'=>$album->id])); ?>"><img src="<?php echo e($album->image); ?>" alt="" class="album_centent_photo_img" /></a>
                    </dd>
                    <dd class="album_centent_photo_dd2" style="text-align: center;">
                        <?php echo e($album->name); ?>

                    </dd>
                </dl>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($albums))->render();; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>