
<!--<div class="arrow arrow-t"></div>-->
<!--评论列表-->
<!--评论框-->
@if($cancomment == 1)
<div  model-node="comment_textarea">
<div class="input_before1" model-node="mini_editor">
<input type="text"  class="input" id="comment_inputor" event-node="mini_editor_textarea" hidefocus="true" model-args='t=comment'><!--<textarea class="input_tips" id="comment_inputor" event-node="mini_editor_textarea" hidefocus="true" model-args='t=comment'></textarea>-->
<div class="num">可以输入<div model-node="numsLeft" class="numsLeft">{{$initNums}}</div>个字</div>
</div>
<div class="action clearfix">
<a href="javascript:void(0);" class="btn-green-small fright " event-node="do_comment" 
event-args='row_id={{$row_id}}&app_uid={{$app_user_id}}&app_row_id={{$app_row_id}}&app_row_table={{$app_row_table}}&app_name={{$app_name}}&table={{$table}}&canrepost={{$canrepost}}' addtoend ="0"  to_comment_id="0" to_uid="0" to_comment_uname="" ><span>{{trans('public.PUBLIC_STREAM_REPLY')}}</span></a>
 
<div class="acts" id="acts">
    <a class="face-block" href="javascript:;" event-node="comment_insert_face" title="表情"><img src="/images/index/img51.jpg" class="face">表情</a>
</div>    
@if($canrepost == 1) 
 <!--[if !IE]><!--> 
<label><input type="checkbox" class="checkbox regular-checkbox" name="shareFeed" value="1" id="shareFeed"><span for="shareFeed"></span>{{trans('public.PUBLIC_SHARETO_STREAM')}}</label>
<!--<![endif]-->
<!--[if IE]>
<label><input type="checkbox" class="checkbox" name="shareFeed" value="1">{trans('public.PUBLIC_SHARETO_STREAM')}</label>
<![endif]-->  
@endif

 <div class="clear"></div>
<div model-node="faceDiv"></div>          
</div>
</div>

<script>
var initNums = '{{$initNums}}';
</script>

@endif

<div id="commentlist_{{$row_id}}" class="comment_lists">

</div>

