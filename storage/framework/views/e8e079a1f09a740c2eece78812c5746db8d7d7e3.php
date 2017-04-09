
<table cellpadding="0" cellspacing="0">
<tr><td width="90" align="center" valign="top"><img src="<?php echo e($user->avatar); ?>" width="72" height="76" /></td><td><p style="font-size:14px; color:#56ba3c;"><?php echo e($user->username); ?></p><p><?php echo e($user->location); ?></p><p><?php echo e($user->work); ?>  <?php echo e($user->school); ?></p></td></tr>
<tr><td align="center" style=" color:#56ba3c;">女</td><td>   <span>关注：</span><span class="green"><?php echo e($user->following_count); ?></span>  <span>粉丝：</span><span class="green"><?php echo e($user->follower_count); ?></span><span>人气：</span><span class="green"><?php echo e($user->view_count); ?></span></td></tr>
</table>
<div class="l_ahovera">
<a href="javascript:;" data-type="User" data-id="<?php echo e($user->id); ?>" data-url="<?php echo e(route('follow.user',$user->id)); ?>" class="followbtn l_ahpver mr5" ><span class="follow_text">加关注</span></a><a href="javascript:ajaxgethtml('<?php echo e(route('hello',['user_id' => $user->id])); ?>');" class="l_ahpver mr5" >打招呼</a><a href="javascript:ajaxgethtml('<?php echo e(route('gift',['user_id' => $user->id])); ?>');" class="l_ahpver a1" >赠送礼物</a>
</div>
</div>