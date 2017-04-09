<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/mywork.css')); ?>" type="text/css" rel="stylesheet" />
    <div class="TA">
        <div class="b_ja">
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
	                    <li  class="select" style="color: #146500;"><a href="<?php echo e(route('task.index')); ?>">待参与任务</a></li>
                        <li><a href="<?php echo e(route('task.finish')); ?>">已参与任务</a></li>
                    </ul>
                </div>
                <div class="mywork">
                    <div class="mywork_top">
                        <span>按任务优先级排序，参与任务有大奖，开始吧</span>
                    </div>

                    <div class="px20"></div>
                    
                    <div class="graph">
                         <strong class="bar" style="width: <?php echo e($schedule); ?>;"></strong>
                     </div>
                    <div class="mywork_schedule_span clear">
                      <span>我的当前任务完成度<?php echo e($schedule); ?></span>
                    </div>
                    <div class="mywork_schedule_content clear">
                    <!-- ***************************** -->
                    <?php foreach($tasks as $key => $task): ?>
                      <div class="mywork_schedule_content_main">
                        <div class="mywork_schedule_content_main_photo fleft">
                          <img src="<?php echo e($task->image); ?>" alt="" class="mywork_schedule_content_main_img" />
                        </div>
                        <div class="mywork_schedule_content_main_span fleft">
                          <dl>
                            <dd style="color: #146500;"><?php echo e($task->slug); ?></dd>
                            <dd style="color: #146500;">已参与人次：<?php echo e($task->user_count); ?></dd>
                          </dl>
                          <p><?php echo $task->desc; ?></p>
                        </div>
                        <div class="mywork_schedule_content_main_btn fright">
                          <dl>
                            <dd>可获得积分：<span style="color: #146500;"><?php echo e($task->score); ?></span></dd>
                            <dd class="mywork_schedule_content_main_join" style="background: url(<?php echo e(asset('/build/dist/images/join_btn.png')); ?>)"><a href="<?php echo e($task->url); ?>" style="color: #fff;"><span>立即参与活动</span></a></dd>
                          </dl>
                        </div>
                      </div>
                    <?php endforeach; ?>
                   	
                      <!-- ************************* -->

                      <div class="mywork_footer">
                        <span style="color: #146500;">刚刚完成任务的朋友</span>
                      </div>
					  
                      <div class="mywork_footer_list">
	                    <!-- &&&&&&&&&&&&&&&&& -->
	                    <?php foreach($task_users as $key => $task_user): ?>
                        <div class="mywork_footer_list_main">
                          <dl>
                            <dd><a href="<?php echo e(route('user.home',$task_user->user_id)); ?>"><img src="<?php echo e($task_user->avatar); ?>" class="mywork_footer_list_main_img"  alt="" /></a></dd>
                            <dd style="color: #146500; "><?php echo e($task_user->username); ?></dd>
                            <dd><?php echo friendlyDate($task_user->created_at); ?></dd>
                          </dl>
                        </div>
                        <?php endforeach; ?>


                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>