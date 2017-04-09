<!-- 打个招呼的表单 -->
<form action="" class="hello" method="post" id="hello_form_<?php echo $user->id; ?>" name="hello_form">
	<input type="hidden" value="<?php echo $user->id; ?>" name="helloToUser" id="helloToUser">
	<div class="">
		<div class="hello_title"><span style="color: #fff;font-size: 16px;">&nbsp;&nbsp;打个招呼</span><span class="buto" style="float: right;margin: 10px 5px;"><img src="<?php echo e(asset('images/index/buto.png')); ?>" style="margin-top:-21px;"  class="hello_title_close" alt="" onclick="javascript:close_layer();"/></span></div>
		<div class="" style="clear:both"></div>
		<div class="hello_left">
			<div class="hello_left_img">
				<img style="border:1px #e2e1e1 solid;width:80px;height:80px " src="<?php echo asset($user->avatar); ?>" alt=""/>
			</div>
		</div>
		<div class="hello_top">
			<span>向  <b><?php echo $user->username; ?></b>  打招呼:</span>
		</div>
		<div  class="hello_right">
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="无动作">
				<span>不用动作</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="握个手">
				<img src="<?php echo e(asset('images/wgs.gif')); ?>" alt="">
				<span>握个手</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="加油">
				<img src="<?php echo e(asset('images/jy.gif')); ?>" alt="">
				<span>加油</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="拥抱">
				<img src="<?php echo e(asset('images/yb.gif')); ?>" alt="">
				<span>拥抱</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="挠痒痒">
				<img src="<?php echo e(asset('images/nyy.gif')); ?>" alt="">
				<span>挠痒痒</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="电一下">
				<img src="<?php echo e(asset('images/dyx.gif')); ?>" alt="">
				<span>电一下</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="拍拍肩膀">
				<img src="<?php echo e(asset('images/ppjb.gif')); ?>" alt="">
				<span>拍拍肩膀</span>
			</p>
		</div>
		<div class="hello_right">
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="踩一下">
				<img src="<?php echo e(asset('images/cyx.gif')); ?>" alt="">
				<span>踩一下</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="微笑">
				<img src="<?php echo e(asset('images/wx.gif')); ?>" alt="">
				<span>微笑</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="抛媚眼">
				<img src="<?php echo e(asset('images/pmy.gif')); ?>" alt="">
				<span>抛媚眼</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="飞吻">
				<img src="<?php echo e(asset('images/fw.gif')); ?>" alt="">
				<span>飞吻</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="给一拳">
				<img src="<?php echo e(asset('images/gyq.gif')); ?>" alt="">
				<span>给一拳</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="依偎">
				<img src="<?php echo e(asset('images/yw.gif')); ?>" alt="">
				<span>依偎</span>
			</p>
			<p>
				<input type="radio" name="hello_radio" class="hello_radio" value="咬一口">
				<img src="<?php echo e(asset('images/yyk.gif')); ?>" alt="">
				<span>咬一口</span>
			</p>
		</div>
		<div class="hello_footer">
			<input type="button" onclick="helloSubmit(<?php echo e($user->id); ?>)" class="hello_footer_sub" value="确定"/>
		</div>
	</div>
</form>