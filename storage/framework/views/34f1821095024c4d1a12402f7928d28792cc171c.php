<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/pay.css')); ?>" type="text/css" rel="stylesheet" />
        <div class="TA">
            <?php echo $__env->make('pay.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clear" style="height: 10px;"></div>
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            <div class="clear" style="height: 30px;"></div>

            <div class=" fleft">
                <form  action="<?php echo e(route('pay.recharge_store')); ?>" method="post">
                    <div class="xiangya fleft">
                        <div style="height: 100px;border-bottom: 2px #e2e1e1 solid;font-size: 25px;line-height: 100px;text-align: center;">
                            充值象牙币
                        </div>
                        <div style="height: 250px;border-bottom: 2px #e2e1e1 solid;font-size: 15px;text-align: left;line-height: 40px;padding-left: 20px;">
                            <p>●象牙币可用兑换各种服务</p>
                            <p>●1RMB=1象牙币</p>
                            <p style="margin-top: 100px;"><input type="checkbox" />同意 <span style="font-size: 14px;color: #34CED4"> 象牙币服务条款</span></p>
                        </div>
                    </div>
                    <div class="xiangya_bank fleft">
                            <div class="xiangya_bank_form">
                                <p>充值数量：<input type="text" name="money" id="money" style="width: 60px;margin-right: 10px;" />象牙币<span style="font-size: 12px;">（充值1RMB可以获得1象牙币）</span></p>
                            </div>
                            <p>
                                <ul class="activity_pay_main_way activity_pay_main_way_bank" style="margin-left: 118px;">
                                    <li class="active">支付宝</li>
                                    <li>微信支付</li>
                                </ul>
                                <input name="pay_id" type="radio" value="1">
	                            <input name="pay_id" type="radio" value="2">
                            </p>
                            <div class="clear" id="pay_way" style="padding-top: 50px;">
                                <p class="clear">
                                    <input type="submit" id="submit_pay" value="支付" style="margin-left: 250px;margin-top: 50px;" />
                                </p>
                            </div>
                    </form>
            </div>
           
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>