<div class="list" id="item_{{$reply_id}}">
	<dl class="b_nc" model-node="comment_list">
		<dt>
			<a href="{{$user_info['space_url']}}">
				<img src="{{$user_info['avatar_url']}}" width="48px" height="46px" style="width:48px;height:48px" alt="">
			</a>
		</dt>
		<dd class="b_nd">
			<p>
				<span class="green">
					{!!$user_info['space_link']!!}
				</span> ({{ $user_info['work'] }}/{{ $user_info['school'] }}) {{friendlyDate($created_at)}}
			</p>
			<p>{!! $content !!}</p>
		</dd>
		<dd class="b_ne" style="margin-top:0px">
			<a href="javascript:void(0)" event-args="post_id={{$post_id}}&post_user_id={{$post_user_id}}&to_reply_id={{$reply_id}}&to_user_id={{$user_id}}&to_comment_uname={{$user_info['username']}}&id={{$reply_id}}&space_id={{$space_id}}&addtoend={{$addtoend}}" event-node="reply_reply">{{trans('public.PUBLIC_STREAM_REPLY')}}</a>&nbsp;
			@if(Auth::id() == $user_info['id'] || Auth::user()->can("manage_comment"))
			<a href="javascript:;" event-node="reply_del" event-args="reply_id={{$reply_id}}">删除</a>&nbsp;
			@endif
			<!--<a href="#" class="jubaoshow">举报</a>-->
		</dd>
	</dl>
</div>