 

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/album.css')); ?>" type="text/css" rel="stylesheet" />
<div class="clear"></div>
    <div class="album">
        <div class="album_nav">
            <div style="height: 20px;"></div>
            <div class="album_nav_select">
                <ul>
                    <a href="<?php echo e(route('album.index')); ?>"><li>全部相册</li></a>
                    <a href="<?php echo e(route('album.own_album',['user_id'=>Auth::id()])); ?>"><li>我的相册</li></a>
                    <a href=""><li>好友相册</li></a>
                    <a href=""><li style="width: 130px;">我表态过的相册</li></a>
                    <a href="<?php echo e(route('album.upload_common')); ?>"><li style="background: orange;width: 120px;">+上传新图片</li></a>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="album_centent">
	        <?php foreach($albums as $album): ?>        
            <div class="album_centent_photo fleft">
                <dl>
                    <dd>
                        <img src="<?php echo e($album->image); ?>" alt="" class="album_centent_photo_img" />
                    </dd>
                    <dd class="album_centent_photo_dd2" style="text-align: center;">
                        <?php echo e($album->name); ?>

                    </dd>
                </dl>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php echo with(new \Hifone\Foundations\Pagination\MainPresenter($albums))->render();; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>