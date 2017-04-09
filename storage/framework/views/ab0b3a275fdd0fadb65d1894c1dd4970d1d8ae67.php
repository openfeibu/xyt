 

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/album.css')); ?>" type="text/css" rel="stylesheet" />
<div class="clear"></div>
    <div class="album">
        <div class="album_nav">
            <div style="height: 20px;"></div>
            <?php echo $__env->make('albums.album_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clear"></div>
            <div style="height: 20px;"></div>
            <div class="album_nav_footer">
                <ul>
                    <a href="<?php echo e(route('album.index')); ?>"><li>全部</li></a>
                    <li><a href="<?php echo e(route('album.index',['type'=>$type,'order'=>'new'])); ?>">最新照片</a></li>
                    <li><a href="<?php echo e(route('album.index',['type'=>$type,'order'=>'hot'])); ?>">热门照片</a></li>
                    <li><a href="<?php echo e(route('album.index',['type'=>'activity','order'=>$order])); ?>">活动照片</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="album_centent">
	        <?php foreach($album_photos as $album_photo): ?>        
            <div class="album_centent_photo fleft">
                <dl>
                    <dd>
                        <a href="<?php echo e(route('album.show',$album_photo->id)); ?>" target="__blank"><img src="<?php echo e($album_photo->image); ?>" alt="" class="album_centent_photo_img" /></a>
                    </dd>
                    <dd class="album_centent_photo_dd2">
                        &nbsp;&nbsp;图片来自&nbsp;<span class="" ><a href="<?php echo e($album_photo->link); ?>" style="color: #7CD3F9" target="__blank"><?php echo e($album_photo->form); ?></a></span>
                    </dd>
                </dl>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($album_photos))->render();; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>