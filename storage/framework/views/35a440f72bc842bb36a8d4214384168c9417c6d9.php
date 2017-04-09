
<?php if(count($var ['data'])): ?>
<?php foreach($var ['data'] as $vl): ?>
<?php
	$sid = !empty($vl['app_row_id'])? $vl['app_row_id'] : $vl['id'];
?>

<dl class="space_content feed_list" model-node="feed_list" id="feed<?php echo e($vl['id']); ?>">
    <div class="space_content_top clear">
        <div class="fleft">
	        <a href="<?php echo e(route('user.home',[$vl['user_info']['id']])); ?>" target="_blank" class="user_info" rel="<?php echo e($vl['user_info']['id']); ?>">
            	<img src="<?php echo e($vl['user_info']['avatar_url']); ?>" alt="" class="space_content_top_photo"/>
            </a>
        </div>
        <div class="space_content_top_info fleft">
            <p class="hd">
	            <?php echo e($vl['user_info']['username']); ?><span>（<?php echo e($vl['user_info']['work']); ?>/<?php echo e($vl['user_info']['school']); ?>）</span>
				<em class="hover right">
					
                    <?php if(Auth::id() == $vl['user_info']['id'] || Auth::user()->can("manage_spaces")): ?> <a href="javascript:;" event-node="delFeed" event-args="space_id=<?php echo e($vl['id']); ?>&uid=<?php echo e($vl['user_info']['id']); ?>&type=<?php echo e($vl['type']); ?>">删除</a>&nbsp;&nbsp;
                    <?php endif; ?>
        			<?php if(Auth::user()->can("manage_spaces")): ?>
        				<a href="javascript:;" onclick="feed_recommend('<?php echo e($vl['id']); ?>');" id="recommend_<?php echo e($vl['id']); ?>"><?php if($vl['is_recommend'] == 1): ?>取消推荐<?php else: ?>推荐<?php endif; ?> </a>
        			<?php endif; ?>
              	</em>
	        </p>
            <p><?php echo $vl['body']; ?></p>
        </div>
    </div>
    <div class="clear"></div>
   	<div class="feed_content">
	    <div class="space_content_main">

	    </div>
	    <div class="px10 clear"></div> 
	    <div class="space_content_main_footer">
	        <span><?php echo e(friendlyDate($vl['created_at'])); ?> <?php echo e($vl['from']); ?></span>
	        <span class="fright space_content_main_footer_right">
	            <?php echo Widget::Share(['sid'=>$sid,'stable'=>$vl['app_row_table'],'initHTML'=>'','current_table'=>'spaces','current_id'=>$vl['id'],'nums'=>$vl['repost_count'],'appname'=>$vl['app'],'cancomment'=>1,'feed_type'=>$vl['type'],'is_repost'=>$vl['is_repost']]); ?> <i class="vline">|</i> 
	            <a event-node="comment" href="javascript:void(0)" event-args="row_id=<?php echo e($vl['id']); ?>&app_uid=&app_row_id=<?php echo e($vl['app_row_id']); ?>&app_row_table=<?php echo e($vl['app_row_table']); ?>&to_comment_id=0&to_uid=0&app_name=<?php echo e($vl['app']); ?>&table=spaces&cancomment=1&cancomment_old=1"><?php echo e(trans('public.PUBLIC_STREAM_COMMENT')); ?>

	            <?php if($vl['comment_count']): ?> (<?php echo e($vl['comment_count']); ?>) <?php endif; ?></a>            
	            <i class="vline">|</i>
	            <?php echo e(Widget::Digg(['space_id' => $vl['id'],'digg_count' =>$vl['digg_count'],'diggArr'=>$var['diggArr'] ])); ?>

	        </span>
	    </div>
	    <div class="clear"></div>
	    <div model-node="comment_detail" class="comment_detail repeat clearfix" style="display:none;"></div>
	</div>
</dl>
<?php endforeach; ?>
<?php endif; ?>