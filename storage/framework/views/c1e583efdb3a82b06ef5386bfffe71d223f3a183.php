<div model-node="weiba_reply_reply" id="reply_box" class="input pop-share repeat">
	<div class="feed-repeat" model-node="comment_textarea">
		<div class="input_before" model-node="mini_editor">
			<textarea class="input_tips" id="mini_editor_textarea" event-node="mini_editor_textarea" hidefocus="true" style="height: 60px;width:98.5%;word-break:break-all;" model-args='t=comment'></textarea>
			<div model-node="numsLeft" class="num"><?php echo e($initNums); ?></div>
		</div>
		<div class="clear"></div>
		<div model-node="faceDiv"></div>
		<div class="mt5 clearfix">
			<a href="javascript:replycomment();" class="btn-green-small right"><span><?php echo e(L('PUBLIC_STREAM_REPLY')); ?></span></a>
			<div class="acts" id="demo">
		       <a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情"> <img src="/images/index/img51.jpg" class="face">表情 </a>
		    </div>
			      
		</div>
	</div>
</div>
<script>

var initNums = '<?php echo e($initNums); ?>';
//回复评论
function replycomment(){
	if ( this.noreply == 1 ){
		return;
	}else{
		this.noreply = 1;
	}
	var _this = this;
	setTimeout(function (){
		_this.noreply = 0;
	},5000);
	var addtoend = '<?php echo e($addtoend); ?>';
	var post_id = '<?php echo e($post_id); ?>';
	var post_user_id= '<?php echo e($post_user_id); ?>';
	var to_reply_id = '<?php echo e($to_reply_id); ?>';
	var to_user_id = '<?php echo e($to_user_id); ?>';
	var space_id = '<?php echo e($space_id); ?>';
	var post_from = '<?php echo e($post_from); ?>';
	var content = document.getElementById('mini_editor_textarea').value;

	var ifShareFeed = document.getElementsByName('shareFeed')[0] == undefined ? 0 : Number(document.getElementsByName('shareFeed')[0].checked);

	content = content.replace('<br>','');
	var strlen = core.getLength(content);
	var leftnums = initNums - strlen;
	if(leftnums < 0 || leftnums == initNums) {
		flashTextarea(document.getElementById('mini_editor_textarea'));
		return;
	}
	$(_this).html('<span>回复中...</span>');
	//alert($('.comment_lists').eq(0).html());exit;
	$.post(ADD_REPLY_URL,{post_id:post_id,post_user_id:post_user_id,to_reply_id:to_reply_id,to_user_id:to_user_id,space_id:space_id,content:content,post_from:post_from,addtoend:addtoend,ifShareFeed:ifShareFeed},function(msg){
				if(msg.status == "0"){
					ui.error(msg.data);
				}else{
					ui.box.close();
					ui.success('评论成功');
					if(addtoend == 1){
						$('#commentlist_'+post_id).append(msg.data);
					}else{
						$('#commentlist_'+post_id).prepend(msg.data);
					}
				}
				addComment = false;
	},'json');
}
$(function (){
	shortcut('ctrl+return', replycomment , {target:'mini_editor_textarea'});
	atWho($('#mini_editor_textarea'));
	setTimeout(function (){
		$('#mini_editor_textarea').inputToEnd('<?php echo e($initHtml); ?>');
	},300);
});
M.addModelFns({
	weiba_reply_reply: {

	}
});
M(document.getElementById('reply_box'));
</script>