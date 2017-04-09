<dl class="b_nc" class="comment_list"  model-node="comment_list">
	<dt>
		<a href="{{$userInfo['space_url']}}">
			<img src="{{$userInfo['avatar_url']}}" width="48px" height="46px" style="width:48px;height:48px" alt="">
		</a>
	</dt>
	<dd class="b_nd">
		<p>
			<span class="green">
				{!!$userInfo['space_link']!!}
			</span> ({{ $userInfo['work'] }}/{{ $userInfo['school'] }}) {{friendlyDate($created_at)}}
		</p>
		<p>{!!$content!!}</p>
	</dd>
	<dd class="b_ne" style="margin-top:0px">
		<a href="javascript:void(0)" event-args='row_id={{$row_id}}&app_uid={{$app_user_id}}&to_comment_id={{$comment_id}}&to_uid={{$userInfo['id']}}&to_comment_uname={{$userInfo['username']}}' event-node="reply_comment">{{trans('public.PUBLIC_STREAM_REPLY')}}</a>&nbsp;<a href="javascript:void(0);" event-node="comment_del" event-args="comment_id={{ $comment_id }}">{{ L('PUBLIC_STREAM_DELETE') }}</a>
	</dd>
</dl>