	<?php foreach($albums as $album): ?>        

	    <div class="photo_list">
	        <a href="<?php echo e(route('album.album_photos',['album_id'=>$album->id])); ?>"><img src="<?php echo e($album->image); ?>" alt="" /></a>
	    </div>
    <?php endforeach; ?>