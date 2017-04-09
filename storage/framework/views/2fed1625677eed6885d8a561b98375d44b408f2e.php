<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/vote.css')); ?>" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo e(asset('/build/dist/js/jquery-browser.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.atwho.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/weiba.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.draggable.js')); ?>"></script>
    <div class="vote">
        <div class="vote_top">
            <div class="vote_top_user">
	            <a href="<?php echo route('user.home', [$user->id]); ?>">
					<img src="<?php echo asset($user->avatar_url); ?>" class="fleft vote_top_user_img" alt=""  />
				</a>
                <div class="vote_top_user_span fleft">
                    <p><?php echo e($user->username); ?>的投票</p>
                    <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

                </div>
                <div class="fright vote_top_user_right">
                    <span style="font-size: 12px;"><a href="javascript:;" onclick="history.go(-1)"><<返回上一页</a></span>
                </div>
            </div>
            <div class="vote_top_span clear">
                <p>发起时间：<?php echo friendlyDate($vote->created_at); ?></p>
                <p>参与人数：<?php echo e($vote->vote_count); ?>人</p>
            </div>
        </div>

        <div class="vote_left fleft">
            <p style="text-align: center;">
                <img src="<?php echo e(asset('/build/dist/images/vote_img.png')); ?>" alt="" />
                <font style="font-size: 30px;"><?php echo e($vote->subject); ?></font><font style="font-size: 16px;">（最多选<?php echo e($vote->maxchoice); ?>项）</font>
            </p>
            <p  style="color: #51B837;margin-left:90px;"><?php echo e($vote->message); ?></p>
            <div style="height: 30px;"></div>
            <form action="<?php echo e(route('vote.vote')); ?>" method="post">
	            <input type="hidden" name="vote_id" value="<?php echo e($vote->id); ?>"/>
	            <?php foreach($vote_options as $key => $vote_option ): ?>
                <div class="vote_left_list">
                    <span class="vote_left_list_font"><?php echo e($vote_option->value); ?>：</span>
                    <div class="vote_left_line">
                        <div class="vote_strong" style="width: <?php echo e($vote_option->ratio); ?>;" id="vote_strong<?php echo e($key); ?>"></div>
                    </div>
                    <?php echo e($vote_option->vote_count); ?>（<?php echo e($vote_option->ratio); ?>）<?php if(!$vote_user): ?><input <?php if($vote->maxchoice == 1): ?> type="radio" <?php else: ?>   type="checkbox" onclick="checkSelect(this.checked)" <?php endif; ?> name="vote_option_id[]" style="height: 15px;width: 15px;" value="<?php echo e($vote_option->id); ?>"/><?php endif; ?>
                </div>
                <?php endforeach; ?>
                <div class="vote_left_submit ">
	                <?php if(!$vote_user): ?>
                    <p style="text-align: right;"><input type="submit" id="submit" value="投票" /></p>
                    <p style="text-align: right;margin-right: 20px;"><input type="checkbox" value="匿名投票" />匿名投票</p>
                    <?php endif; ?>
                    <div class="vote_left_share left" >
                        <a href="javascript:;" onclick="showVoter('new');" id="newvoter" class="vote_left_share_span">最新投票</a>
                        <a href="javascript:;" onclick="showVoter('we');" id="wevoter" style="margin-left: 20px;">好友投票</a>
                   	</div>
                   	<div class="vote_right_share right">
                        <a href="#" class="jubaoshow">举报</a>|<a href="" style="color: orange">邀请好友</a>|<a href="http://www.jiathis.com/share" class="btn jiathis jiathis_txt jtico jtico_jiathis share" target="_blank">分享+</a>
                    </div>
                </div>
            </form>
			<div class="clearfix"></div>
            <div class="vote_comments">
	            <div id="showvoter">
	            	
               	</div>
                
            </div>
            
			<?php echo Widget::Reply([ 'tpl'=>'reply','post_id'=>$vote->id, 'post_user_id' => $vote->user_id, 'limit'=>'5', 'post_from'=>'vote','space_id'=>$vote->space_id,'addtoend'=>0 ]); ?>

            
        </div>
        <div class="vote_right fleft">
            <div class="vote_right_top">
                <span class="vote_right_top_new">最新投票</span>
            </div>
            <div class="vote_right_main">
                <dl>
	                <?php foreach($new_votes as $key => $vote): ?>
                    <dd>
                        <img src="<?php echo e(asset('/build/dist/images/vote_new.png')); ?>" alt="" />
                        <span><a href="<?php echo e(route('vote.show',$vote->id)); ?>"><?php echo e($vote->subject); ?></a></span>
                    </dd>
                    <?php endforeach; ?>
                    
                </dl>
            </div>

            <div class="vote_right_top">
                <span class="vote_right_top_new">最新投票</span>
            </div>
            <div class="vote_right_main">
                <dl>
	                <?php foreach($hot_votes as $key => $vote): ?>
                    <dd>
                        <img src="<?php echo e(asset('/build/dist/images/vote_new.png')); ?>" alt="" />
                        <span><a href="<?php echo e(route('vote.show',$vote->id)); ?>"><?php echo e($vote->subject); ?></a></span>
                    </dd>
                    <?php endforeach; ?>
                </dl>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<script src="<?php echo e(asset('/build/dist/js/qqhideshow.js')); ?>" type="text/jscript"></script>
<script>
	
		var arr=['#FE6BBF','#3EDEF8','#32EB65','#BF66FE','#FE3F66','#7E99FE','#967BBE','#FEA50C','#7CD2F9','#03DB9C','#938E07','#EC0707','#FF6B23','#FFE502','#5DF800','#0086F8','#510AD3','#620090','#033909','#332C32'];
	    var i=0;
	    var num = $('.vote_left_list').size();
	    for(i = 0; i < num; i++){
	        var v_s='vote_strong'+i;
	        document.getElementById(v_s).style.background = arr[parseInt(Math.random()*20)];
	    }
	    var maxSelect = <?php echo e($vote->maxchoice); ?>;
		var alreadySelect = 0;
		function checkSelect(sel) {
			if(sel) {
				alreadySelect++;
				if(alreadySelect == maxSelect) {
					var oObj = document.getElementsByName("vote_option_id[]");
					for(i=0; i < oObj.length; i++) {
						if(!oObj[i].checked) {
							oObj[i].disabled = true;
						}
					}
				}
			} else {
				alreadySelect--;
				if(alreadySelect < maxSelect) {
					var oObj = document.getElementsByName("vote_option_id[]");
					for(i=0; i < oObj.length; i++) {
						if(oObj[i].disabled) {
							oObj[i].disabled = false;
						}
					}
				}
			}
		}
	
	
		function showVoter(filtrate) {
			$('#newvoter').attr('class','');
			$('#wevoter').attr('class','');
			$('#'+filtrate+'voter').attr('class','vote_left_share_span');
			if(filtrate = 'new'){
				url = "<?php echo e(route('vote.user_vote_list',['type' => 'new' ])); ?>" ;
			}else{
				url =" <?php echo e(route('vote.user_vote_list',['type' => 'we' ])); ?>" ;
			}
			var parameter = {'vote_id':<?php echo e($vote->id); ?> };
			ajaxget(url, 'showvoter',parameter);
		}
		showVoter('new');
	    
</script>
<script type="text/javascript" src="<?php echo e(asset('/js/module.weibo.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>