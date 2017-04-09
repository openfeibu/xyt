<?php $__env->startSection('content'); ?>
	<link href="<?php echo e(asset('/build/dist/css/vote.css')); ?>" type="text/css" rel="stylesheet" />
        <div class="TA">
            <div class="b_ja">
                <img src="<?php echo e(asset('/build/dist/images/votelogo.png')); ?>" alt="" /><span style="color: #146500;font-size: 16px;">投票</span>
            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class="vote_list">
                   <div class="b_hf" >
                      	<?php echo $__env->make('vote.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  </div>

                  <div class="vote_main">
                      <!--<p>范围：<a href="">全部</a> | <a href="" style="color: #51B837 ">本周最热</a>  | <a href="">本月最热</a></p>-->
						<?php foreach($votes as $k => $vote): ?>
                      	<div class="vote_main_list">
                          <div class="vote_list_user fleft">
	                        <a href="<?php echo e(route('user.home',$vote->user_id)); ?>">
                            <img src="<?php echo e($vote->user->avatar); ?>" style="border: 1px #e2e1e1 solid;width: 80px;height: 80px;" alt="" />
                            <p style="width: 80px;">adasd</p>
                          </div>
                          <div class="vote_list_info fleft">
                              <dl>
                                  	<dd><?php echo e($vote->subject); ?></dd>
                                  	<?php $i=1;?>
                                   	<?php foreach($vote->vote_options as $key => $vote_option ): ?>
                                   	<?php if($i<=2): ?>
					                <dd><input <?php if($vote->maxchoice == 1): ?> type="radio" <?php else: ?>   type="checkbox" onclick="checkSelect(this.checked)" <?php endif; ?> name="vote_option_id[]" style="height: 15px;width: 15px;" value="<?php echo e($vote_option->id); ?>"/><?php echo e($vote_option->ratio); ?></dd>
					                <?php endif; ?>
					                <?php $i++;?>
					                <?php endforeach; ?>
                                  	<dd><font style="color: #aaa;"><?php echo e(friendlyDate($vote_option->created_at)); ?></font> | <a href="" style="color: #51B837 ">评论（<?php echo e($vote->reply_count); ?>）</a></dd>
                              </dl>
                          </div>
                          <div class="vote_list_right fright" >
                              <div class="vote_list_join">
                                <p>&nbsp;</p>
                                <p><?php echo e($vote->user_count); ?></p>
                                <p>人参与</p>
                              </div>
                              <div class="vote_list_vote">
                                <p><a href="<?php echo e(route('vote.show',$vote->id)); ?>">>去投票</a></p>
                              </div>
                          </div>
                     	</div>
						<?php endforeach; ?>
                      <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($votes))->render(); ?>




                  </div>
                   
               </div>
                    
                         
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>