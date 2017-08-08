<div model-node="weiba_reply_reply" id="reply_box" class="input pop-share repeat">
	<div class="feed-repeat" model-node="comment_textarea">
		<div class="input_before" model-node="mini_editor">
			<textarea class="input_tips" id="mini_editor_textarea" event-node="mini_editor_textarea" hidefocus="true" style="height: 60px;width:98.5%;word-break:break-all;" model-args='t=comment'></textarea>
			<div model-node="numsLeft" class="num">{{$initNums}}</div>
		</div>
		<div class="clear"></div>
		<div model-node="faceDiv"></div>
		<div class="mt5 clearfix">
			<a href="javascript:replycomment();" class="btn-green-small right"><span>{{L('PUBLIC_STREAM_REPLY')}}</span></a>
			<div class="acts" id="demo">
		       <a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情"> <img src="/images/index/img51.jpg" class="face">表情 </a>
		    </div>

		</div>
	</div>
</div>
<script>

var initNums = '{{$initNums}}';
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
	var addtoend = '{{$addtoend}}';
	var post_id = '{{$post_id}}';
	var to_reply_id = '{{$to_reply_id}}';
	var to_user_id = '{{$to_user_id}}';
	var content = document.getElementById('mini_editor_textarea').value;

	content = content.replace('<br>','');
	var strlen = core.getLength(content);
	var leftnums = initNums - strlen;
	if(leftnums < 0 || leftnums == initNums) {
		flashTextarea(document.getElementById('mini_editor_textarea'));
		return;
	}
	$(_this).html('<span>回复中...</span>');
	//alert($('.comment_lists').eq(0).html());exit;
	$.post(ADD_WALL_REPLY_URL,{post_id:post_id,to_reply_id:to_reply_id,to_user_id:to_user_id,content:content,addtoend:addtoend},function(msg){
		if(msg.status == "0"){
			ui.error(msg.data);
		}else{
			ui.box.close();
			ui.success('回复成功');
			console.log('post_id:'+post_id);
			if(addtoend == 1){
				$('#walllist_'+post_id).append(msg.data);
			}else{
				$('#walllist_'+post_id).prepend(msg.data);
			}
		}
		addComment = false;
		setTimeout(function(){M($('[model-node="comment_detail"]').get(0))},0)
	},'json');
}
$(function (){
	shortcut('ctrl+return', replycomment , {target:'mini_editor_textarea'});
	atWho($('#mini_editor_textarea'));
	setTimeout(function (){
		$('#mini_editor_textarea').inputToEnd('{{$initHtml}}');
	},300);
});
M.addModelFns({
	weiba_reply_reply: {

	}
});
M(document.getElementById('reply_box'));
</script>
