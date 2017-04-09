			<div class="" style="color:#696969;">
	            <h3 class="feed_header"> <div class="r_option"><span id="comment_replynum"></span> </div>留言（<span id="reply_count"><?php echo e($list->count); ?></span>个）</h3>
	            <div id="walllist_<?php echo e($post_id); ?>" class="comment_lists reply_lists">
		            <?php foreach($list as $k => $vo): ?>
		            <div class="list" id="item_<?php echo e($vo->id); ?>">
				        <dl class="b_nc" model-node="comment_list">
							<dt>
								<a href="<?php echo e($vo->user_info['space_url']); ?>">
									<img src="<?php echo $vo->user_info['avatar_url']; ?>" width="48px" height="46px" style="width:48px;height:48px" alt="">
								</a>
							</dt>
							<dd class="b_nd">
								<p>
									<span class="green">
										<?php echo $vo->user_info['space_link']; ?>

									</span> (<?php echo e($vo->user_info['work']); ?>/<?php echo e($vo->user_info['school']); ?>) <?php echo e(friendlyDate($vo->created_at)); ?>

								</p>
								<p><?php echo $vo->content; ?></p>
							</dd>
							<dd class="b_ne" style="margin-top:0px">
								<a href="javascript:void(0)" event-args="url=<?php echo e(route('wall.reply_reply')); ?>&post_id=<?php echo e($post_id); ?>&to_reply_id=<?php echo e($vo->id); ?>&to_user_id=<?php echo e($vo->user_id); ?>&to_comment_uname=<?php echo e($vo->user_info['username']); ?>&id=<?php echo e($vo->id); ?>&addtoend=<?php echo e($addtoend); ?>" event-node="reply_reply"><?php echo e(trans('public.PUBLIC_STREAM_REPLY')); ?></a>&nbsp;
								<?php if(Auth::id() == $vo->user_info['id'] || Auth::user()->can("manage_comment")): ?>
									<a href="javascript:;" event-node="reply_del" event-args="reply_id=<?php echo e($vo->id); ?>">删除</a>&nbsp;
								<?php endif; ?>
							</dd>
						</dl>
					</div>
					<?php endforeach; ?>
					<div class="clearfix"></div>
					<?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($list))->render();; ?>

					
				</div>	
				<div class="clearfix"></div>
				<div class="com_form reply" model-node="comment_textarea">	                
	                <?php echo Form::open(['id' => 'mini_editor_textarea' , 'method' => 'post','model-node' => 'mini_editor']); ?>

			            <?php echo Form::textarea('at',null,['id' => 'saytext' ,'class'=>'input','event-node'=>'mini_editor_textarea','model-args'=>'t=comment']); ?>

			          	<!--<div model-node="numsLeft" class="num">140</div>-->
			            <div model-node="post_ok" style="display:none;text-align:center;position:absolute;left:0;top:70px;width:100%"> <i class="ico-ok"></i> 提交成功 </div>			           
			        <?php echo Form::close(); ?>

		            <div class="action clearfix" style="    width: 600px;">
		                <div class="kind">

		                    <div class="fright release">  <a class="btn-green-big btn" event-node="do_weiba_reply" event-args="" href="javascript:;"  post_id="<?php echo e($post_id); ?>"   to_reply_id="0" to_user_id="0"  addtoend="<?php echo e($addtoend); ?>" url="<?php echo e(route('wall.add_wall')); ?>" list_count=<?php echo e($list->count); ?>  > <span>留言</span> </a> </div>
		                	<div class="fleft attachbody acts">

								<a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情"> <img src="/images/index/img51.jpg" class="face">表情 </a>
		                    	<input type="hidden" id="postvideourl" value="">
		                        <div model-node="faceDiv" style="position: relative;"></div>	
		                	</div>
		                </div>
		            </div>
				</div>
            </div>