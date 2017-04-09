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
                        <form method="post" action="<?php echo e(route('identify.activity_email')); ?>" class="c_form">
	                        <?php echo csrf_field(); ?>

							<table cellspacing="0" cellpadding="0" class="formtable">
							<tbody><tr>
							<th style="width:10em;">您的邮箱地址：</th>
							<td>
							<input type="text" id="email" name="email" value="<?php echo e($user->email); ?>" class="t_input">
							</td>
							</tr>
							<tr>
							<th>&nbsp;</th>
							<td>
							<input type="submit" name="submit" value="发送激活链接" class="submit"  style="background: #51B837;color: #fff;width: 120px;height: 30px;text-align: center;line-height: 30px;margin-top: 10px;border-radius: 5px;">
							</td>
							</tr>
							</tbody></table>
							<input type="hidden" name="emailsubmit" value="true">
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