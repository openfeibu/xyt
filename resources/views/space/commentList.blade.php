
@if(count($list['data']))  
@foreach ($list['data'] as $vo)
<dl class="b_nc" class="comment_list"  model-node="comment_list">
	<dt>
		<a href="{{$vo['user_info']['space_url']}}">
			<img src="{{$vo['user_info']['avatar_url']}}" width="48px" height="46px" style="width:48px;height:48px" alt="">
		</a>
	</dt>
	<dd class="b_nd">
		<p>
			<span class="green">
				{!!$vo['user_info']['space_link']!!} 
			</span> ({{ $vo['user_info']['work'] }}/{{ $vo['user_info']['school'] }}) {{friendlyDate($vo['created_at'])}}
		</p>
		<p>{!!$vo['content']!!}</p>
	</dd>
	<dd class="b_ne" style="margin-top:0px">
		<a href="javascript:void(0)" event-args='row_id={{$vo['row_id']}}&app_uid={{$vo['app_user_id']}}&to_comment_id={{$vo['id']}}&to_uid={{$vo['user_id']}}&to_comment_uname={{$vo['user_info']['username']}}&app_name={{$app_name}}&table={{$table}}' event-node="reply_comment">{{trans('public.PUBLIC_STREAM_REPLY')}}</a>&nbsp;<a href="#" class="jubaoshow">举报</a>
	</dd>
</dl>
@endforeach 
@if($list['total']>10)

@endif

@endif