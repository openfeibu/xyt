<?php $__env->startSection('content'); ?>
	<div class="b_l">
		<div class="b_k_reg">
			<div class="d_reg_2_head">
				<img src="<?php echo e(asset('/build/dist/images/reg3.jpg')); ?>" />
			</div>
            
			<div class="d_reg_3">
                <div class="d_reg_3_top">
                    <p class="fleft notice">关注本周之星</p><p class="fright"><input type="checkbox" name="ckall" class="ckall"/> 全部关注</p>
                </div>
                <div class="clear"></div>
                <form method="post" action="<?php echo e(route('user.follow_submit')); ?>" id="test" name="">
            	<div class="d_reg_3_main">
	            	<?php foreach($users as $key => $user): ?>
	            	
                    <div class="avatar_list_userblock">   
                        <table cellspacing="0" cellpadding="0" width="100%" class="avatar_list"> 
                        <tbody>
                        <tr>
                        <td align="center">
                        <div class="avatar_bg"><a href="#" class="link2user" target="_blank"><img src="<?php echo e($user->avatar); ?>"></a>
                        </div>
                        </td>
                        <td>
                        <span ><a href="<?php echo e(route('user.home',$user->id)); ?>"  class="user_info" rel='<?php echo e($user->id); ?>' target="_blank" style="color: #1e8a4c"><?php echo e($user->username); ?></a></span><br>
                        <span ><?php echo getAge($user->birthday); ?>岁&nbsp;<?php echo e(config('form_config.basic_data.education.value.'.$user->education)); ?>&nbsp;<?php echo e($user->work); ?></span> <br>
                        <span ><?php echo e($user->school); ?></span> 
                        </td>
                        </tr>
                        <tr><td align="center"><input type="checkbox"  name="uids[]" value="<?php echo e($user->id); ?>" /></td><td></td></tr>
                        </tbody>
                        </table>
                    </div>
                   	
                    <?php endforeach; ?>     
                </div>
                
                <div class="clear"></div>
                <div style="text-align:center" ><div><input name="dosubmit" class="nextbtn" value="注册，已完成" type="submit"></div></div>
                </form> 
            </div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>