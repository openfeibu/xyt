			<div class="" style="color:#696969;">
	            <h3 class="feed_header"> <div class="r_option"><span id="comment_replynum"></span> </div>评论（<span id="reply_count">{{ $list->count }}</span>个）</h3>
	            <div id="commentlist_{{$post_id}}" class="comment_lists reply_lists">
		            @foreach($list as $k => $vo)
		            <div class="list" id="item_{{$vo->id}}">
				        <dl class="b_nc" model-node="comment_list">
							<dt>
								<a href="{{ $vo->user_info['space_url'] }}">
									<img src="{!! $vo->user_info['avatar_url'] !!}" width="48px" height="46px" style="width:48px;height:48px" alt="">
								</a>
							</dt>
							<dd class="b_nd">
								<p>
									<span class="green">
										{!! $vo->user_info['space_link'] !!}
									</span> ({{ $vo->user_info['work'] }}/{{ $vo->user_info['school'] }}) {{friendlyDate($vo->created_at)}}
								</p>
								<p>{!! $vo->content !!}</p>
							</dd>
							<dd class="b_ne" style="margin-top:0px">
								<a href="javascript:void(0)" event-args="post_id={{$post_id}}&post_user_id={{$post_user_id}}&to_reply_id={{$vo->id}}&to_user_id={{$vo->user_id}}&to_comment_uname={{$vo->user_info['username']}}&id={{$vo->id}}&space_id={{$space_id}}&addtoend={{$addtoend}}&post_from={{$post_from}}" event-node="reply_reply">{{trans('public.PUBLIC_STREAM_REPLY')}}</a>&nbsp;
								@if(Auth::id() == $vo->user_info['id'] || Auth::user()->can("manage_comment"))
									<a href="javascript:;" event-node="reply_del" event-args="reply_id={{$vo->id}}">删除</a>&nbsp;
								@endif
							</dd>
						</dl>
					</div>
					@endforeach
					<div class="clearfix"></div>
					{!! with(new \Hifone\Foundations\Pagination\CustomerPresenter($list))->render(); !!}
					
				</div>	
				<div class="clearfix"></div>
				<div class="com_form reply" model-node="comment_textarea">	                
	                {!! Form::open(['id' => 'space_create_form','method' => 'post','model-node' => 'mini_editor']) !!}
			            {!! Form::textarea('at',null,['id' => 'saytext' ,'class'=>'input','event-node'=>'mini_editor_textarea','model-args'=>'t=comment']) !!}
			          	<!--<div model-node="numsLeft" class="num">140</div>-->
			            <div model-node="post_ok" style="display:none;text-align:center;position:absolute;left:0;top:70px;width:100%"> <i class="ico-ok"></i> 发布成功 </div>			           
			        {!! Form::close() !!}
		            <div class="action clearfix" style="    width: 600px;">
		                <div class="kind">

		                    <div class="fright release">  <a class="btn-green-big btn" event-node="do_weiba_reply" event-args="" href="javascript:;"  post_id="{{$post_id}}"  post_user_id="{{$post_user_id}}"  to_reply_id="0" to_user_id="0" post_from="{{$post_from}}"  space_id="{{$space_id}}" addtoend="{{$addtoend}}" list_count={{ $list->count }}  > <span>评论</span> </a> </div>
		                	<div class="fleft attachbody acts">

								<a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情"> <img src="/images/index/img51.jpg" class="face">表情 </a>
		                    	<input type="hidden" id="postvideourl" value="">
		                        <div model-node="faceDiv" style="position: relative;"></div>	
		                	</div>
		                </div>
		            </div>
				</div>
            </div>