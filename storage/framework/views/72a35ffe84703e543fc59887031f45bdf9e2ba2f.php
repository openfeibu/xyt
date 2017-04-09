<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/pay.css')); ?>" type="text/css" rel="stylesheet" />
<style>
    table{width: 80%;margin: 0 auto;text-align:center;}
    table tr{height:40px;line-height: 40px;font-size: 18px;}
</style>
        <div class="TA">
            <?php echo $__env->make('pay.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clear" style="height: 10px;"></div>
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            <div class="clear" style="height: 30px;"></div>

            
            <div class="open_vip_main">
                <ul class="open_vip_main_ul">
                  	<li id="vip_buy_nav" style="background: #9AEB86; ">购买VIP</li>
                </ul>
                <div class="open_vip_buy clear" id="vip_buy">
                    <div class="clear" style="height: 20px;"></div>
                    <form action="<?php echo e(route('pay.buy_store')); ?>" method="post">
                        <table style="">
                            <tr>
                                <th>VIP类型</th>
                                <th>VIP时长</th>
                                <th>象牙币</th>
                                <th>操作</th>
                            </tr>
                            <?php foreach($vips as $key => $vip): ?>
                            <tr>
                                <td><?php echo e($vip->name); ?></td>
                                <td><?php echo e($vip->duration); ?>个月</td>
                                <td><input type="radio" name="vip_id" value="<?php echo e($vip->id); ?>" /><?php echo e($vip->coin); ?></td>
                                <td><input type="submit" class="buy_submit" value="购买" /></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </form>
                </div>
                <div class="clear" style="height: 20px;"></div>

                <ul class="open_vip_main_ul">
                  <a href=""><li style="background: #C9C9C8;width: 120px">购买VIP记录</li></a>
                </ul>
                <div class="open_vip_buy clear">
                    <div class="clear" style="height: 20px;"></div>
                    <form action="">
                        <table style="">
                            <tr>
                                <th>购买类型</th>
                                <th>购买时期</th>
                                <th>购买时长</th>
                                <th>消耗</th>
                            </tr>
                            <?php foreach($vip_records as $key => $record): ?>
                            <tr>
                                <td><?php echo e($record->name); ?></td>
                                <td><?php echo e($record->created_at); ?></td>
                                <td><?php echo e($record->duration); ?>个月</td>
                                <td><?php echo e($record->coin); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </form>
                </div>

            </div>
           
      </div>
<?php $__env->stopSection(); ?>

<script>
    $('#vip_buy_nav').mouseover(function(){
        $('#vip_buy').show();
        $('#vip_power').hide();
        $('#vip_buy_nav').css('background','#9AEB86') ;
        $('#vip_power_nav').css('background','#fff') ;
    });
    $('#vip_power_nav').mouseover(function(){
        $('#vip_buy').hide();
        $('#vip_power').show();
        $('#vip_buy_nav').css('background','#fff') ;
        $('#vip_power_nav').css('background','#9AEB86') ;
    });
</script>
    

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>