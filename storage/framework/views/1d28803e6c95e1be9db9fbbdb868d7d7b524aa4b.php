 

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/activity.css')); ?>" type="text/css" rel="stylesheet" />
<div class="clear"></div>
    <div class="activity">
        <div style="height: 20px;"></div>
        <div class="activity_nav">
            <ul class="activity_nav_ul1">
                <a href="<?php echo e(route('activity.index')); ?>"><li class="bg1">全部活动</li></a>
                <a href="<?php echo e(route('activity.u')); ?>"><li class="bg2">我的活动</li></a>
                <a href="<?php echo e(route('activity.index',['type' => 'recommend'])); ?>"><li>推荐活动</li></a>
                <a href="<?php echo route('activity.create'); ?>"><li>+发起新活动</li></a>
            </ul>
            <div style="height: 20px;" class="clear"></div>
            <ul class="activity_nav_ul2">
                <a href="<?php echo e(route('activity.u')); ?>"><li style="text-align: right;">全部&nbsp;|&nbsp;</li></a>
                <a href="<?php echo e(route('activity.u',['type' => 'join'])); ?>"><li>参加的活动&nbsp;&nbsp;|&nbsp;</li></a>
                <a href="<?php echo e(route('activity.u',['type' => 'follow'])); ?>"><li>关注的活动&nbsp;&nbsp;|&nbsp;</li></a>
                <a href="<?php echo e(route('activity.u',['type' => 'create'])); ?>"><li>组织的活动</li></a>
            </ul>
        </div>
        
        <hr size="1" style="border:1px #e2e1e1 solid;width: 98%;margin: 0 auto;" class="clear" />
        <div style="height:20px;" class="clear"></div>
        <div class="activity_place">
            <div class="activity_place_left fleft">
                <span>活动地点：</span>
            </div>
            <div class="activity_place_right fleft">
                <ul>
                    <a href="<?php echo e(route('activity.u',['type' => $type,'cat_id' => $cat_id])); ?>"><li <?php if(!$province_id): ?>class="selected"<?php endif; ?>>全部</li></a>
                    <?php foreach($provinces as $key => $province): ?>
                    <a href="<?php echo e(route('activity.u',['type' => $type,'province_id' => $province->id,'cat_id' => $cat_id])); ?>" ><li <?php if($province->id == $province_id): ?>class="selected"<?php endif; ?>><?php echo e($province->title); ?></li></a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


        <div class="activity_type">
            <div class="activity_type_left fleft">
                <span>活动类型：</span>
            </div>
            <div class="activity_type_right fleft">
                <ul>
                    <a href="<?php echo e(route('activity.u',['type' => $type,'province_id' => $province_id])); ?>"><li <?php if(!$cat_id): ?>class="selected"<?php endif; ?>>全部</li></a>
                    <?php foreach($cats as $key => $cat): ?>
                    <a href="<?php echo e(route('activity.u',['type' => $type,'province_id' => $province_id,'cat_id' => $cat->id])); ?>"><li <?php if($cat->id == $cat_id): ?>class="selected"<?php endif; ?>><?php echo e($cat->title); ?></li></a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        
        <div class="activity_content">
		<?php foreach($activities as $activity): ?>
        <!-- ******************* -->
            <hr  style=" border:1px #e2e1e1 dotted;width: 98%;margin: 0 auto;margin-top:20px"  class="clear" />
            <div style="height: 20px;"></div>
            <div class="activity_content_main">
                <div class="fleft">
					<a href="<?php echo route('activity.show',['id'=>$activity->id]); ?>">
						<img src="<?php echo e($activity->poster); ?>" alt="" class="activity_content_main_img" />
					</a>
                </div>
                <div class="activity_content_main_dd fleft">
                    <dl>
                        <a href="<?php echo route('activity.show',['id'=>$activity->id]); ?>"><dd style="color: #43AE70;font-size: 15px;"><?php echo $activity->name; ?></dd></a>
                        <dd>时间：
						<?php echo $activity->begin_time; ?>&nbsp;&nbsp;
						<?php 
							$weekday = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六'); 
							echo $weekday[date('w', strtotime($activity->begin_time))]; 
						?>
						</dd>
                        <dd>地点：<span style="color: #43AE70"><?php echo e($activity->location); ?></span></dd>
                        <dd style="color: #858484">参加（<?php echo $activity->join_count; ?>人）关注（<?php echo $activity->follow_count; ?>人）浏览（<?php echo $activity->view_count; ?>）</dd>
                        <dd style="color: red"><?php echo $activity->state; ?></dd>
                    </dl>
                </div>
            </div>
        <!-- ******************** -->
		<?php endforeach; ?>

        </div>
        <div class="clear"></div>
        <div style="height: 50px;"></div>

        <div class="activity_page">
            <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($activities))->render();; ?>

        </div>
    </div>
    <div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>