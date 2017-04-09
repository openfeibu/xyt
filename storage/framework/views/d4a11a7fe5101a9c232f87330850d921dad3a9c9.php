<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
        <div class="TA">
	        <div class="b_ja">
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class=" fleft">
                  <?php echo $__env->make('users.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                  <div class="gexing_main" >
                      <?php echo $__env->make('credits.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <div class="integra_main" >
						<table cellspacing="0" cellpadding="0" class="listtable">
						<caption>
						<h2>积分奖励规则</h2>
						<p>进行以下事件动作，会得到积分奖励。不过，在一个周期内，您最多得到的奖励次数有限制。</p>
						</caption>
						<tbody><tr class="title">
						<td>动作名称</td>
						<td align="center">周期范围</td>
						<td align="center">周期内最多奖励次数</td>
						<td align="center" width="100">单次奖励资产</td>
						<td align="center" width="100">单次奖励积分</td>

						</tr>
						<?php foreach($reward_rules as $key => $rule): ?>
						<tr class="linetd">
						<td><?php echo e($rule->slug); ?></td>
						<td align="center"><?php echo e(handleCycle($rule->frequency)); ?></td>
						<td align="center"><?php echo e(handleFrequency($rule->frequency)); ?></td>
						<td align="center"><?php echo e($rule->reward); ?></td>
						<td align="center"><?php echo e($rule->experience); ?></td>
						</tr>
						<?php endforeach; ?>


						</tbody></table>

						<br>
						<table cellspacing="0" cellpadding="0" class="listtable">
						<caption>
						<h2>积分扣减规则</h2>
						<p>以下事件动作发生时，会扣减积分。其中，自己发布的信息自己删除，不扣减积分，被管理员删除才会扣减积分。</p>
						</caption>
						<tbody><tr class="title">
						<th>动作名称</th>
						<th align="center">单次扣减资产</th>
						<th align="center">单次扣减积分</th>
						</tr>
						<?php foreach($punish_rules as $key => $rule): ?>
						<tr class="linetd">
						<td><?php echo e($rule->slug); ?></td>
						<td align="center"><?php echo e($rule->reward); ?></td>
						<td align="center"><?php echo e($rule->experience); ?></td>
						</tr>
						<?php endforeach; ?>
						</tbody></table>
                      </div>
                      
                  </div>
                    
             <div class="clear"></div>            
        </div>
        
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>