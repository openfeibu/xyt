<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
        <div class="TA">
	        <div class="b_ja">
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class=" fleft">
                  <?php echo $__env->make('users.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                  <div class="gexing_main">
                      <?php echo $__env->make('credits.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <div class="integra_main" >
						<table cellspacing="0" cellpadding="0" class="listtable">
						<caption>
						<h2>普通用户组</h2>
						<p>随着您的资产值的提高，您的用户组所拥有的权限也会越多。</p>
						</caption>
						<tbody><tr class="title">
						<th width="150">用户组名</th>
						<td>资产值范围</td>
						</tr>
						<?php foreach($common_roles as $key => $role ): ?>
						<tr>
						<th><span><?php echo e($role->display_name); ?></span></th>
						<td><?php echo e($role->min_experience); ?> ~ <?php echo e($role->max_experience); ?></td>
						</tr>
						<?php endforeach; ?>
						</tbody></table>

						<table cellspacing="0" cellpadding="0" class="listtable">
						<caption>
						<h2>特殊用户组</h2>
						<p>不受资产值限制。</p>
						</caption>
						<tbody><tr class="title">
						<th width="150">用户组名</th>
						<td>资产值范围</td>
						</tr>
						<?php foreach($special_roles as $key => $role ): ?>
						<tr>
						<th><span style="color:red;"><?php echo e($role->display_name); ?></span></th>
						<td>-</td>
						</tr>
						<?php endforeach; ?>
						</tbody></table> 
                      </div>
                      
                  </div>
                    
                         
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>