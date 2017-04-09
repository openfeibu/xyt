
<!--<div class="arrow arrow-t"></div>-->
<!--评论列表-->
<!--评论框-->
<?php if($cancomment == 1): ?>
<div  model-node="comment_textarea">
<div class="input_before1" model-node="mini_editor">
<input type="text"  class="input" id="comment_inputor" event-node="mini_editor_textarea" hidefocus="true" model-args='t=comment'><!--<textarea class="input_tips" id="comment_inputor" event-node="mini_editor_textarea" hidefocus="true" model-args='t=comment'></textarea>-->
<div class="num">可以输入<div model-node="numsLeft" class="numsLeft"><?php echo e($initNums); ?></div>个字</div>
</div>
<div class="action clearfix">
<a href="javascript:void(0);" class="btn-green-small fright " event-node="do_comment" 
event-args='row_id=<?php echo e($row_id); ?>&app_uid=<?php echo e($app_user_id); ?>&app_row_id=<?php echo e($app_row_id); ?>&app_row_table=<?php echo e($app_row_table); ?>&app_name=<?php echo e($app_name); ?>&table=<?php echo e($table); ?>&canrepost=<?php echo e($canrepost); ?>' addtoend ="0"  to_comment_id="0" to_uid="0" to_comment_uname="" ><span><?php echo e(trans('public.PUBLIC_STREAM_REPLY')); ?></span></a>
 
<div class="acts" id="acts">
    <a class="face-block" href="javascript:;" event-node="comment_insert_face" title="表情"><img src="/images/index/img51.jpg" class="face">表情</a>
</div>    
<?php if($canrepost == 1): ?> 
 <!--[if !IE]><!--> 
<label><input type="checkbox" class="checkbox regular-checkbox" name="shareFeed" value="1" id="shareFeed"><span for="shareFeed"></span><?php echo e(trans('public.PUBLIC_SHARETO_STREAM')); ?></label>
<!--<![endif]-->
<!--[if IE]>
<label><input type="checkbox" class="checkbox" name="shareFeed" value="1">{trans('public.PUBLIC_SHARETO_STREAM')}</label>
<![endif]-->  
<?php endif; ?>

 <div class="clear"></div>
<div model-node="faceDiv"></div>          
</div>
</div>

<script>
var initNums = '<?php echo e($initNums); ?>';
</script>

<?php endif; ?>

<div id="commentlist_<?php echo e($row_id); ?>" class="comment_lists">

</div>

