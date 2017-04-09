<div class="contents clearfix">
	<div class="mb10 clearfix"><?php echo replaceUrl(t($body)); ?></div>
	<div class="feed_img" id="video_mini_show_<?php echo e($feedid); ?>">
	      <a href="javascript:void(0);" onclick="switchVideo(<?php echo e($feedid); ?>,0,'open','<?php echo e($host); ?>','<?php echo e($flashvar); ?>','<?php if(strpos($flashimg, '://')): ?><?php echo e($flashimg); ?><?php else: ?><?php echo e(getImageUrl2('upload_video_path',$flashimg)); ?> <?php endif; ?>' )">
	        <img src="<?php if(strpos($flashimg, '://')): ?><?php echo e($flashimg); ?><?php else: ?><?php echo e(getImageUrl2('upload_video_path',$flashimg)); ?> <?php endif; ?>" style="width:205px;height:auto;overflow:hidden" data-medz-name="outside-video" onerror="javascript:var default_img = <?php echo e(asset('/images/video_bk.png')); ?> ;$(this).attr('src',default_img);">
	      </a>
	      <div class="video_play" ><a href="javascript:void(0);" onclick="switchVideo(<?php echo e($feedid); ?>,0,'open','<?php echo e($host); ?>','<?php echo e($flashvar); ?>','<?php echo e($flashimg); ?>')"></a>
	      </div>
	</div>
	<div class="feed_quote" style="display:none;" id="video_show_<?php echo e($feedid); ?>"> 
	  <div class="q_tit">
	    <img class="q_tit_l" onclick="switchVideo(<?php echo e($feedid); ?>,0,'open','<?php echo e($host); ?>','<?php echo e($flashvar); ?>','<?php echo e($flashimg); ?>')" src="<?php echo e(asset('/images/zw_img.gif')); ?>" />
	  </div>
	  <div class="q_con">
	    <p style="margin:0;margin-bottom:5px" class="cGray2 f12">
	    <a href="javascript:void(0)" onclick="switchVideo(<?php echo e($feedid); ?>,0,'close')"><i class="ico-pack-up"></i>收起</a>
	    <?php if($source): ?>
	      &nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo e($source); ?>" target="_blank"><i class="ico-show-all"></i><?php echo e($title); ?></a>
	    <?php endif; ?>
	    </p>
	    <div id="video_content_<?php echo e($feedid); ?>"></div>
	  </div>
	  <div class="q_btm"><img class="q_btm_l" src="<?php echo e(asset('/images/zw_img.gif')); ?>" /></div>
	</div>
</div>