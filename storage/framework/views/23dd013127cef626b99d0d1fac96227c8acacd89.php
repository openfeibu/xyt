<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
        <div class="TA">
	        <div class="b_ja">
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class=" fleft">
                  <?php echo $__env->make('users.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                  <div class="gexing_main" style="height: 550px;">
                      <?php echo $__env->make('credits.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <div class="integra_main" >
                          <p>
                              <div class="fleft"><span>资产值：</span><font style="color: #51B837 "><?php echo e($user->experience); ?></font> <img src="./images/grade1.png" alt="" /></div>
                              <div class="clear"></div>
                              <div class="integra" style="margin-left: 146px;">
                                  <p>图标等级有低到高为：
                                  <?php foreach($roles as $key => $role): ?>
                                  	<img src="<?php echo e($role->image); ?>" alt="<?php echo e($role->display_name); ?>" />
                                  <?php endforeach; ?>
                                  </p>  
                              </div>
                              <div class="clear"></div>
                          </p>
                          <p><span>用户组：</span><?php echo e($role->display_name); ?></p>
                          <p><span>积分数：</span><img src="./images/money.png" alt="" />
                          <font style="color: #51B837 "><?php echo e($user->score); ?></font><a href="<?php echo e(route('user.rank',['type' => 'score'])); ?>"><font style="color: #818181 ">（查看排名）</font></a></p>
                          <p><span>访问量：</span><?php echo e($user->view_count); ?><a href="<?php echo e(route('user.rank',['type' => 'score'])); ?>"><font style="color: #818181 ">（查看排名）</font></a></p>
                          <p><span>创建时间：</span><?php echo e($user->created_at); ?></p>
                          <p><span>上次登录：</span><?php echo e(friendlyDate($user->last_login)); ?></p>
                          <p><span>空间容量：</span>最大空间<?php echo e($role->capacity); ?>MB，已用0B（0%）</p>
                      </div>
                      
                  </div>
                    
                         
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>