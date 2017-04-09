<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.form.js')); ?>"></script>
<script src="<?php echo e(asset('/js/rcalendar.js')); ?>"></script>
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

                  <div class="gexing_main" style="height: 1230px">
                      	<?php echo $__env->make('users.profile.profile_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <div class="gexing_main_content">
	                      <form action="<?php echo e(route('profile.base_update')); ?>" method="post">
		                      <?php echo e(csrf_field()); ?>

                          <p><span class='span' style="margin-right: 10px;">您的登录昵称：</span><?php echo e($user->username); ?>[<a href="" style="color: #51B837 ">修改</a>][<a href="" style="color: #51B837 ">修改登录密码</a>]</p>
                          <p><span class='span' style="margin-right: 10px;">真实姓名：</span>adasdasd[<a href="" style="color: #51B837 ">点击认证</a>]您填写/修改真实姓名后，需要等待我们认证后才能有效，在认证之前，您将只能使用用户名，并且一些</p><p style="margin-left: 260px;">操作可能会受到限制。</p>
                          <p><span class='span'>性别：</span>
                          		<?php echo $formTypePresenter->showSelect($base_data,'sex',$data['sex']); ?>

                          </p>
                          <p><span class='span'>婚恋状态：</span>
	                            <?php echo $formTypePresenter->showSelect($base_data,'marriage',$data['marriage']); ?>

                          </p>
                          <p><span class='span'>生日：</span><input event-node="input_date" event-args="min=1&amp;error=请选择时间" type="text" name="birthday" value="<?php echo e($data['birthday']); ?>" readonly="readonly" class="s-txt"><font style="color: red">（请按身份证生日填写，系统将自动生成生肖、星座）</font>
                          </p>
                          <p><span class='span'>血型：</span>
	                            <?php echo $formTypePresenter->showSelect($base_data,'blood',$data['blood']); ?>

                          </p>
                          <p><span class='span'>家乡：</span>
                              <?php echo e(Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'homeplace','name' => 'homeplace' ,'province_name' => 'home_province','city_name' => 'home_city','prefix' => 'home_'] )); ?>

                             <a href="" style="color: #51B837 ">&gt;&gt;查找老乡</a>
                          </p>
                          <p><span class='span'>居住地：</span>
                              <?php echo e(Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'location','name' => 'location' ,'province_name' => 'province','city_name' => 'city','prefix' => ''] )); ?>

                              <a href="" style="color: #51B837 ">&gt;&gt;查找同城</a>
                          </p>
                          <p><span class='span'>身高：</span><input type="text" name="height" value="<?php echo e($data['height']); ?>" />cm</p>
                          <p><span class='span'>体重：</span><input type="text" name="weight" value="<?php echo e($data['weight']); ?>" />kg</p>
                          <p><span class='span'>体型：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'bodytype',$data['bodytype']); ?>

                          </p>
                          <p><span class='span'>星座：</span> <?php echo e(getConstellation($user->birthday)); ?> <font style="color: red">（根据生日自动生成，保存后更新）</font></p>
                          <p><span class='span'>学历：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'education',$data['education']); ?>

                          </p>
                          <p><span class='span'>毕业院校：</span><input type="text" name="school" id="school" value="<?php echo e($data['school']); ?>" readonly onclick="javascript:loadschool();"/><input type="hidden" name="school_id" id="school_id" value="<?php echo e($data['school_id']); ?>" readonly/></p>
                          <p><span class='span'>月薪：</span>
                          	  <?php echo $formTypePresenter->showSelect($base_data,'income',$data['income']); ?>

                          </p>
                          <p><span class='span'>住房情况：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'house',$data['house']); ?>

                          </p>
                          <p><span class='span'>行业：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'industry',$data['industry']); ?>

                          </p>
                          <p><span class='span'>职业：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'work',$data['work']); ?>

                          </p>
                          <p><span class='span'>民族：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'minority',$data['minority']); ?>

                          </p>
                          <p><span class='span'>宗教：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'religion',$data['religion']); ?>

                          </p>
                          <p><span class='span'>是否吸烟：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'smoke',$data['smoke']); ?>

                          </p>
                          <p><span class='span'>是否喝酒：</span>
                              <?php echo $formTypePresenter->showSelect($base_data,'drink',$data['drink']); ?>

                          </p>
                          <p><span class='span'>手机：</span> <?php echo e($user->mobile); ?> <a href="">修改</a>
                              <font style="color: red">（方便工作人员与你联系；不会泄露，不参与星级评定）</font>
                          </p>
                          <p><span class='span'>QQ：</span><input type="text" name="qq" value="<?php echo e($data['qq']); ?>" />
                              <font style="color: red">（建议填写，方便活动认识您的朋友联系您）</font>
                          </p>
                          <p><span class='span'>微信：</span><input type="text" name="weixin" value="<?php echo e($data['weixin']); ?>" />
                              <font style="color: red">（建议填写，方便活动认识您的朋友联系您）</font>
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
	<div id="loadProcess"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>