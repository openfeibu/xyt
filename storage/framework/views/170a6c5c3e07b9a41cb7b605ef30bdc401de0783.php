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

                        状态：<span style="color: #51B837;"><?php echo e(trans('hifone.users.identify_status.'.$user->email_status)); ?></span>
                        <p style="margin-top: 10px;">你的邮箱：<?php echo e($user->email); ?></p>
                        <p style="margin-top: 10px;"><a href="<?php echo e(route('identify.email',['type' => 'edit'])); ?>" class="submit">更换邮箱认证 </a></p>
        
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

	</div>
    <div class="clear"></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>