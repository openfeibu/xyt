<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
    <div class="clear"></div>

        <div class="TA">
            <div class="b_ja">
                <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            </div>
            <div class="clear" style="height: 30px;"></div>
           		<?php if(!empty(Session::get('data'))): ?>
				<?php $data = Session::get('data');?>
				<?php endif; ?> 
               <div class=" fleft">
                   	<?php echo $__env->make('users.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php $formTypePresenter = app('Hifone\Presenters\FormTypePresenter'); ?>			
                  <div class="gexing_main">
                      <?php echo $__env->make('users.profile.profile_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <form action="<?php echo e(route('profile.happy_update')); ?>" method="post">
	                      <?php echo e(csrf_field()); ?>

                          <div class="xuanyan_main_content">
                            <p><span>结婚后你想要小孩吗：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b2',$data['b2']); ?>

                            </p>
                            <p><span>你愿意为爱情迁居别处吗：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b3',$data['b3']); ?>

                            </p>
                            <p><span>婚后你会承担多少家务：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b4',$data['b4']); ?>

                            </p>
                            <p><span>喜欢旅游吗：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b5',$data['b5']); ?>

                            </p>
                            <p><span>婚恋中双方的关系应该是：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b6',$data['b6']); ?>

                            </p>
                            <p><span>您的婚恋态度：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b7',$data['b7']); ?>

                            </p>
                            <p><span>您的经济状况：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b8',$data['b8']); ?>

                            </p>
                            <p><span>对方的家庭重要吗：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b9',$data['b9']); ?>

                            </p>
                            <p><span>您的消费观：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b10',$data['b10']); ?>

                            </p>
                            <p><span>你对现在工作的态度：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b11',$data['b11']); ?>

                            </p>
                            <p><span>你会打小孩吗：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b12',$data['b12']); ?>

                            </p>
                            <p><span>家庭卫生：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b13',$data['b13']); ?>

                            </p>
                            <p><span>你爱养宠物吗：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b14',$data['b14']); ?>

                            </p>
                            <p><span>是否允许异性密友：</span>
                                <?php echo $formTypePresenter->showSelect($happy_data,'b15',$data['b15']); ?>

                            </p>
                            <p><span>希望婚后的家庭关系：</span>
                                <input type="text"  name="b16" value="<?php echo e($data['b16']); ?>" />
                            </p>
                            <p><span>你觉得两个人相处最重要的是：</span>
                                <input type="text"  name="b17" value="<?php echo e($data['b17']); ?>" />
                            </p>
                            <p><span>你希望结婚后的生活圈：</span>
                                <input type="text"  name="b18" value="<?php echo e($data['b18']); ?>" />
                            </p>
                            <p><span>你最看重对方的：</span>
                                <input type="text"  name="b19" value="<?php echo e($data['b19']); ?>" />
                            </p>
                            <p style="margin-left: 350px;margin-top: 40px;">
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