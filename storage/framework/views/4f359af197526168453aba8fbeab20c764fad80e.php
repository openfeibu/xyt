<?php $__env->startSection('content'); ?>

    <div class="clear"></div>
    <div class="TA">
        <div class="b_ja">
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

        </div>
        <div class="clear" style="height: 30px;"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <?php echo $__env->make('users.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="b_he" >
	                <?php echo $__env->make('users.identify.identify_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div style="margin-left: 50px;margin-top: 30px;">
                        <form method="post" action="<?php echo e(route('user.validateMobile')); ?>" class="c_form">
	                        <?php echo csrf_field(); ?>

							<table cellspacing="0" cellpadding="0" class="formtable">
							<tbody><tr>
							<th style="width:10em;">您的手机号：</th>
							<td>
								<input type="text" id="mobile" name="mobile" value="<?php echo e($user->mobile); ?>" class="t_input">&nbsp;&nbsp;&nbsp;<input type="button" id="sendcode" value="发送验证码" class="submit"><span id="sendmsg" ></span>
							</td>
							</tr>
							<tr>
							<th>验证码：</th>
							<td>
								<input type="text" id="code" name="code" value="" class="t_input">
							</td>
							</tr>

							<tr>
							<th>&nbsp;</th>
							<td>
								<input type="submit" name="submit" value="保存" class="submit">
							</td>
							</tr>
							</tbody></table>
						</form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

	</div>
    <div class="clear"></div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>