<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
    <div class="clear"></div>

        <div class="TA">
            <div class="b_ja">
                <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class=" fleft">
                   	<?php echo $__env->make('users.profile.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php $formTypePresenter = app('Hifone\Presenters\FormTypePresenter'); ?>				
                  <div class="gexing_main" style="height: 700px;">
                      <?php echo $__env->make('users.profile.profile_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <div class="dubai_main">
	                      <form action="<?php echo e(route('profile.dating_update')); ?>" method="post">
                          <span><p>我们的隐私策略不允许在内心独白里填写QQ、Email、手机等个人隐私信息，请务必遵守！（20-1000字）</p></span>
                          <div class="dubai_main_span fleft">
                            内心独白：
                          </div>
                          <div class="dubai_main_text fleft">
                            <textarea name="aboutme"><?php echo e($aboutme); ?></textarea>
                          </div>
                          <div class="clear"></div>
                          <p style="margin-top: 40px;">
                              <input type="submit" name="profilesubmit" value="保存" class="gexing_btn" style="width: 100px;" />
                              <input type="submit" name="nextsubmit" value="继续下一项" class="gexing_btn" style="width: 100px;"  />
                          </p>
                          </form>
                      </div>
                      
                  </div>
                    
                         
        </div>
    </div>
    <div class="clear"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>