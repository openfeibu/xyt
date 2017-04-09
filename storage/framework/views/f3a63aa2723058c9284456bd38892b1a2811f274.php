<form action="<?php echo e(route('gift.sendGift')); ?>" class="send" method="post" id="gift_form_<?php echo $user->id; ?>" name="gift_form">
	<input type="hidden" value="<?php echo $user->id; ?>" id="giftToUser" name="giftToUser">
	<div class="">
		<div class="send_title"><span style="color: #fff;font-size: 16px;">&nbsp;&nbsp;赠送礼物</span><span class="buto" style="float: right;margin: 10px 5px;"><img src="<?php echo e(asset('images/index/buto.png')); ?>" style="margin-top:-21px;"  class="send_title_close" alt="" onclick="javascript:close_layer();"/></span></div>
		<div style="background-color:#fff;	" class="send_page">
			<div class="gift">
				<ul>
					<?php foreach($gifts as $gift): ?>
					<input type="radio" value="<?php echo e($gift->id); ?>" name="gift_radio<?php echo $user->id; ?>" id="gift_radio<?php echo e($gift->id); ?>_<?php echo $user->id; ?>" style="display:none">	
					<li class="gift_select gift_select<?php echo e($gift->id); ?>" onclick="show_gift_info(<?php echo e($gift->id); ?>,<?php echo e($gift->gift_experience); ?>,<?php echo e($gift->coin); ?>,<?php echo e($gift->gift_number); ?>,<?php echo e($user->id); ?>)" >
						<span></span><img src="<?php echo e(asset($gift->gift_img)); ?>" alt=""/>
					</li>
					<?php endforeach; ?>
					<input type="text" value="" id="gift_id<?php echo e($user->id); ?>" name="gift_id" style="display:none">
				</ul>
				<div class="clear"></div>
				<div class="text">
					<p><span>增加经验：<font class="gift_experience" color="#1f8d03">0</font></span></p>
					<p><span>道具单价：<font class="price" color="#1f8d03">0</font>象币</span></p>
					<p><span>现有库存：<font class="gift_number" color="#1f8d03">0</font>个</span></p>
					<p><span>购买数量：<input type="text" name="send_number" id="send_number<?php echo e($user->id); ?>" class="send_number<?php echo e($user->id); ?>" />个</span></p>
				</div>
				<div class="submit">
					<input type="button" onclick="checkSubmit(<?php echo e($user->id); ?>)" id="btn_sub" value="赠送礼物"/>
				</div>
			</div>
		</div>
	</div>
</form>