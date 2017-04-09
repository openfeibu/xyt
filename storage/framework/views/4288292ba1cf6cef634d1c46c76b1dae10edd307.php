 

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/interaction1.css')); ?>" type="text/css" rel="stylesheet" />
<div class="interaction">
        <div class="interaction_top">
            <div class="interaction_top_left fleft">
                <img src="<?php echo e(asset('images/index/TAhphoto.png')); ?>" alt=""  class="interaction_top_left_img" />
            </div>
            <div class="interaction_top_center fleft">
                <dl>
                    <dd class="interaction_top_center_tab">
                        <span style="cursor:pointer" onclick="getNewThreads()">最新话题</span>
                        <span style="cursor:pointer" onclick="getNewReplies()">最新回复</span>
                    </dd>
                    <div class="clear"></div>
					<div class="new_threads">
						<?php echo $__env->make('threads.partials.threads', ['column' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
                </dl>
            </div>
            <div class="interaction_top_right fleft">
                <div class="interaction_hot_topic">
                    <img src="<?php echo e(asset('images/index/xin.png')); ?>" alt="" class="interaction_hot_topic_img" />
                    <span>热门话题</span>
                </div>
                <div class="interaction_hot_topic_content">
                    <ul>
                        <?php foreach($hot_threads as $k=>$thread): ?>
                          <?php if($k<3): ?>
                            <li style="margin-left:20px;">
                               <span class="interaction_hot_topic_top3"><?php echo e($k+1); ?></span>
                               <a  style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin-top:10px;" href="<?php echo e(route('thread.show', [$thread->id])); ?>" title="<?php echo e($thread->title); ?>">
                                   <?php echo e($thread->title); ?>

                               </a>
                           </li>
                           <?php else: ?>
                             <li style="margin-left:20px;">
                                <span class="interaction_hot_topic_other"><?php echo e($k+1); ?></span>
                                <a  style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin-top:10px;" href="<?php echo e(route('thread.show', [$thread->id])); ?>" title="<?php echo e($thread->title); ?>">
                                    <?php echo e($thread->title); ?>

                                </a>
                            </li>
                          <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if(count($hot_threads)==0): ?>
                           <div class="empty-block" style="margin-left:20px;margin-top:20px;"><?php echo e(trans('hifone.noitem')); ?></div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        
        <!-- #################$sections######################################? -->	
	
		<?php foreach($sections as $section_k=>$section): ?>
			
			<div class="clear" style="height:50px;"></div>
			<div class="b_hf interaction_b_hf" style="border:0px">
				<ul>
					<li><?php echo $section->name; ?></li>
				</ul>		
			</div>
			<div class="clear"></div>
			<div class="interaction_content">
			<!-- **************** -->
				<?php foreach($node_all[$section_k] as $node_k=>$node): ?>
				<!--<?php if($node_k<6): ?>-->
				<div class="interaction_content_main" style="height:auto">
					<div class="interaction_content_main_left fleft">
						<img src="<?php echo e(asset($node->icon)); ?>" alt="" class="interaction_content_main_img fleft" />
					</div>
					<div class="interaction_content_main_right">
						<div class="interaction_content_main_right_dl">
							<dl>
								<dd><a href="<?php echo e(route('thread.node_content', $node->id)); ?>"><span style="color: #04B45F;font-size: 18px">
								<?php echo $node->name; ?>

								</span></a><span style="color: red">
								<?php $count = 0?>
								(今日：
									<?php foreach($thread_in_nodes[$node_k] as $key => $thread_in_node): ?>
										<?php $time = date("Y-m-d",strtotime($thread_in_node->created_at))?>
										<?php if($time == date("Y-m-d")): ?>
											<?php $count++;?>
										<?php endif; ?>
									<?php endforeach; ?>
									<?php echo e($count); ?>

								)
								</span></dd>
								<dd><?php echo $node->description; ?></dd>
							</dl>
						</div>
						<div class="interaction_content_main_right_ul" >
							<ul>
								<li>
								   &nbsp;&nbsp;&nbsp;已有&nbsp; <span style="color: red"><?php echo $node->member_count; ?></span> &nbsp;人加入
									&nbsp;&nbsp;话题：<?php echo $node->thread_count; ?>，回帖：<?php echo $node->reply_count; ?>

								</li>
								<li>&nbsp;&nbsp;&nbsp;最后发表：
								
								<?php foreach($thread_in_nodes[$node_k] as $key => $thread_in_node): ?>
									<?php 
										$max_time[$node_k][$key] = $thread_in_node->created_at;
									?>
								<?php endforeach; ?>
								<?php echo e(friendlyDate(max($max_time[$node_k]))); ?>

								
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--<?php endif; ?>-->
				
				<?php endforeach; ?>
				<div class="clear" style="height:50px;"></div>
		<?php endforeach; ?>
<?php $__env->stopSection(); ?>


<script>
	function getNewReplies(){
		$.get("<?php echo e(route('thread.getNewReplies')); ?>",function(data){
			commmon_thread(data);
		});
	}

	function getNewThreads(){
		$.get("<?php echo e(route('thread.getNewThreads')); ?>",function(data){
			commmon_thread(data);
		});
	}

	function commmon_thread(data){
		var class_html = "";

		if(data.length != 0){
			class_html += '<dl style="margin-left:0px;">';
				for(var i=0;i<data.length;i++){
					class_html += '<dd>\
				       <img src="images/index/img9.jpg" alt="" style="margin-top:-10px;"/>\
				        <a target="_blank" style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:23px;" href="/thread/'+data[i].id+'" title="'+data[i].title+'">\
				            '+data[i].title+'\
				        </a>\
				    </dd>';
				}
			class_html += '</dl>';
		}else{
			class_html += '<div style="margin-left:20px;margin-top:20px;" class="empty-block">暂无话题</div>';
		}
		$('.new_threads').html(class_html);
	}
</script>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>