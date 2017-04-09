<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/activity_details.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/ui.core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/ui.draggable.js')); ?>"></script>
<div class="clear"></div>

    <div class="px20"></div>
    <span style="font-size: 18px;">【<?php echo $activity->name; ?>】</span>
    <div class="details_top_info">
        <div class="details_top_info_left fleft">
            <img src="<?php echo e(asset('images/index/img4.jpg')); ?>" alt=""  class="details_top_info_img" / >
        </div>
        <div class="details_top_info_right fleft">
            <div class="details_top_info_right_info">
                <div class="details_top_info_right_top">
                    发起者：<b style="color: #1E8A4C">
					<a href="<?php echo route('user.home', [$user->id]); ?>">
						<?php echo $user->username; ?>

					</a>
					</b>
                </div>
                <div class="details_top_info_right_main">
                    <dl>
                        <dd>活动时间：
						<?php $begin_time = strtotime($activity->begin_time)?>
						<?php echo date("Y-m-d",$begin_time); ?>

						<?php 
							$weekday = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六'); 
							echo $weekday[date('w', strtotime($activity->begin_time))];
							$close_time = strtotime($activity->close_time)
						?>&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;
						<?php echo date("Y-m-d",$close_time); ?>

						<?php echo $weekday[date('w', strtotime($activity->close_time))]; ?>
						</dd>
                        <dd>活动地点：<?php echo $activity->location; ?></dd>
                        <dd>活动人数：<?php echo $activity->number_count; ?>人（还剩下<?php echo $activity->number_count-$activity->join_count; ?>个名额）</dd>
                        <dd>活动费用：男 <?php echo $activity->payboy; ?> 元&nbsp;女 <?php echo $activity->paygirl; ?> 元</dd>
                        <dd>联系方式：<?php echo $activity->mobile; ?></dd>
                    </dl>
                </div>
            </div>
            <div class="details_top_info_right_time">
                <img src="<?php echo e(asset('images/index/time.jpg')); ?>" alt=""  class="fleft" />
                <span style="font-size: 18px;line-height:50px;float: left">
	            截止报名：
	            <?php echo e($activity->deadline_desc); ?>

				
            </div>
        </div>
    </div>


    <div class="px10"></div>
    <div class="details_share">
		<span>
			<a href="javascript:;"  event-args="sid=<?php echo e($activity->id); ?>&stable=weiba_post&curtable=feed&curid=94&initHTML=&appname=weiba&cancomment=1&feedtype=weiba_post" event-node="share" >分享</a>&nbsp;|&nbsp;
			<a href="javascript:;">举报</a>&nbsp;|&nbsp;
			<a href="javascript:;" id="follow" onclick="follow(<?php echo $login_user->id; ?>)">关注</a>
		</span>
	</div>
    <div class="px10"></div>


    <div class="details_left fleft">
        <div class="details_left_top">
            <img src="<?php echo e(asset('images/index/details.png')); ?>" alt="" /><span style="font-size: 20px;color: #1E8A4C">【活动详情】</span>
            <?php echo $activity->body; ?>


        </div>

    </div>

    <div class="details_right fleft">
        <div class="details_right_sign">
            <div class="px10"></div>
            <div class="fleft">
                <span style="font-size: 20px;padding: 10px;">最新报名人数（<?php echo $activity->join_count; ?>人）</span>
            </div>
            <div class="fright" style="margin-right: 10px;font-size: 18px;color:#1E8A4C"><!--<span>全部</span>--></div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto"/>
            <div class="details_right_sign_main">
                <ul>
					<?php $count=12; if(count($user_joins)<12) $count=count($user_joins);?>
					<?php for($i=0;$i<$count;$i++): ?>
                    <li>
						<a href="<?php echo route('user.home', [$user_joins[$i]->id]); ?>">
                        <dl>
                            <dd><img src="<?php echo $user_joins[$i]->avatar_url; ?>" alt="" /></dd>
                            <dd><?php echo $user_joins[$i]->username; ?></dd>
                        </dl>
						</a>
                    </li>
					<?php endfor; ?>
                </ul>
            </div>
        </div>

        <div class="details_right_focus">
            <div class="px10"></div>
            <div class="fleft">
                <span style="font-size: 20px;padding: 10px;">关注者</span>
            </div>
            <div class="fright" style="margin-right: 10px;font-size: 18px;color:#1E8A4C"><!--<span>全部</span>--></div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto"/>
            <div class="details_right_sign_main">
                <ul>
					<?php $count=12; if(count($user_follows)<6) $count=count($user_follows);?>
					<?php for($i=0;$i<$count;$i++): ?>
                    <li>
						<a href="<?php echo route('user.home', [$user_follows[$i]->id]); ?>">
                        <dl>
                            <dd><img src="<?php echo $user_follows[$i]->avatar_url; ?>" alt="" /></dd>
                            <dd><?php echo $user_follows[$i]->id; ?></dd>
                        </dl>
						</a>
                    </li>
					<?php endfor; ?>
                </ul>
            </div>
        </div>

        <div class="details_right_photo">
            <div class="px10"></div>
            <div class="fleft">
                <span style="font-size: 20px;padding: 10px;color:#1E8A4C">往期活动总结及照片</span>
            </div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto"/>
            <?php foreach($summaries as $key => $summary): ?>
            <p><a href="<?php echo e(route('activity.summary',$summary->activity_id)); ?>"><?php echo e($summary->title); ?></a></p>
            <?php endforeach; ?>
        </div>

        <div class="details_right_footer">
            <div class="px10"></div>
            <div>
                <span style="font-size: 20px;padding: 10px;color:#1E8A4C" class="fleft">本期活动总结及照片</span>
                <p style="width:90px;padding-right: 10px;" class="fright">
	                <span class="fright"><a href="<?php echo e(route('album.upload_common',['activity_id' =>$activity->id ])); ?>">添加照片</a></span>
	                <span class="fright"><a href="<?php echo e(route('activity.create_summary',['activity_id' => $activity->id])); ?>">添加活动总结</a></span> 
	            </p>
            </div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto"/>
            <div class="details_right_footer_main">
                <p><?php if($summary): ?><a href="<?php echo e(route('activity.summary',$summary->activity_id)); ?>"><?php echo e($summary->title); ?></a><?php endif; ?></p>
                <img src="<?php echo e(asset('images/index/img6.jpg')); ?>" alt="" /><img src="<?php echo e(asset('images/index/img7.jpg')); ?>" alt="" />
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<script>
	function follow(id){
		if(confirm("确定要关注该活动吗？")){
			$.ajax({
				type: 'GET',
				url: "<?php echo e(route('activity.follow')); ?>",
				data: {user_id:id,activity_id:<?php echo $activity->id; ?>},
				dataType: 'json',
				success: function(data){
					if(data==200){
						$('#follow').text("已关注");
					}else{
						$('#follow').text("关注失败");
					}
				},
				error: function(xhr, type){
					location.href="<?php echo e(route('auth.login')); ?>";
				}
			});	
		}
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>