<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('build/dist/js/register.js')); ?>"></script>
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

                  <div class="gexing_main" style="height: 830px">
                      <?php echo $__env->make('users.profile.profile_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <form action="<?php echo e(route('profile.standard_update')); ?>" method="post">
	                      	<?php echo e(csrf_field()); ?>

                      <div class="select_requirement_top">
                          <p>恋爱状态：
                              <?php echo $formTypePresenter->showSelect($standard_data,'lovestatus',$data['lovestatus']); ?>

                              未选择，如果您已结束单身状态，请及时修改您的恋爱状态。
                            </p>
                          <p>如果您选择“约会中”、“恋爱中”、“订婚啦”或“结婚啦”，则您的资料将不会参与搜索匹配。</p>
                      </div>
                      <div class="select_requirement_main">
                         
                             <p><span>年龄：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opage',$data['opage']); ?>至
                                <?php echo $formTypePresenter->showSelect($standard_data,'opage2',$data['opage2']); ?>岁
                            </p>
                            <p><span>身高：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opheight',$data['opheight']); ?>至
                                <?php echo $formTypePresenter->showSelect($standard_data,'opheight2',$data['opheight2']); ?>厘米
                            </p>
                            <p><span>居住地：</span>
                                <?php echo e(Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'oplocation','name' => 'oplocation' ,'province_name' => 'opprovince','city_name' => 'opcity','prefix' => ''] )); ?>

                            </p>
                            <p><span>学历：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opeducation',$data['opeducation']); ?>

                            </p>
                            <p><span>月收入：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opincome',$data['opincome']); ?>

                            </p>
                            <p><span>职业：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opwork',$data['opwork']); ?>

                            </p>
                            <p><span>婚姻状况：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opmarriage',$data['opmarriage']); ?>

                            </p>
                            <p><span>是否吸烟：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opsmoke',$data['opsmoke']); ?>

                            </p>
                            <p><span>是否喝酒：</span>
                                <?php echo $formTypePresenter->showSelect($standard_data,'opdrink',$data['opdrink']); ?>

                            </p>
                            <p style="margin-left: 350px;margin-top: 40px;">
                                <input type="submit" name="profilesubmit" value="保存" class="gexing_btn" style="width: 100px;" />
                                <input type="submit" name="nextsubmit" value="继续下一项" class="gexing_btn" style="width: 100px;"  />
                            </p>
                         
                          
                      </div>
                      </form>
                  </div>
                    
                         
        </div>
    </div>
    <div class="clear"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>