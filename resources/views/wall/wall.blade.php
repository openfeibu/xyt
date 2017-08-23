			<div class="" style="color:#696969;" model-node="comment_detail">
	            <h3 class="feed_header"> <div class="r_option"><span id="comment_replynum"></span> </div>留言（<span id="reply_count">{{ $count }}</span>个）</h3>
	            <div id="walllist_{{$post_id}}" class="comment_lists reply_lists" model-node="comment_list">
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<div class="com_form reply" model-node="comment_textarea">
	                {!! Form::open(['id' => 'mini_editor_textarea' , 'method' => 'post','model-node' => 'mini_editor']) !!}
			            {!! Form::textarea('at',null,['id' => 'saytext' ,'class'=>'input','event-node'=>'mini_editor_textarea','model-args'=>'t=comment']) !!}
			          	<!--<div model-node="numsLeft" class="num">140</div>-->
			            <div model-node="post_ok" style="display:none;text-align:center;position:absolute;left:0;top:70px;width:100%"> <i class="ico-ok"></i> 提交成功 </div>
			        {!! Form::close() !!}
		            <div class="action clearfix" style="    width: 600px;">
		                <div class="kind">

		                    <div class="fright release">  <a class="btn-green-big btn" event-node="do_weiba_reply" event-args="" href="javascript:;"  post_id="{{$post_id}}"   to_reply_id="0" to_user_id="0"  addtoend="{{$addtoend}}" url="{{route('wall.add_wall')}}" list_count={{ $count }} type='walllist' > <span>留言</span> </a> </div>
		                	<div class="fleft attachbody acts">
								<a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情"> <img src="/images/index/img51.jpg" class="face">表情 </a>（{{handle_credit_score('wall')}}）
		                    	<input type="hidden" id="postvideourl" value="">
		                        <div model-node="faceDiv" style="position: relative;"></div>
		                	</div>
		                </div>
		            </div>
				</div>
            </div>
            <script>
	            var parameter = {'post_id': {{$post_id}},'limit':'5','addtoend':0 };
	            url = "{{route('wall.wall')}}";
				ajaxget(url, 'walllist_{{$post_id}}',parameter,function(){
					setTimeout(function(){M($('[model-node="comment_list"]').get(0))},0)
				});

        	</script>
