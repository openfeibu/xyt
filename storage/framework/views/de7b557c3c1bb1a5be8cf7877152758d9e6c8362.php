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
                        <form action="">
                            状态：<span style="color: #51B837;">已认证</span>
                            <p style="margin-top: 10px;">你的手机：<?php echo e($user->mobile); ?></p>
                            <p style="margin-top: 10px;"><a href="<?php echo e(route('identify.mobile',['type' => 'edit'])); ?>" class="submit">更换手机认证 </a></p>
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