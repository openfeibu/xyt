@foreach($list as $k => $vo)
<div class="list" id="item_{{$vo->id}}"  model-node="comment_list">
    <dl class="b_nc">
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
			<a href="javascript:void(0)" event-args="url={{route('wall.reply_reply')}}&post_id={{$post_id}}&to_reply_id={{$vo->id}}&to_user_id={{$vo->user_id}}&to_comment_uname={{$vo->user_info['username']}}&id={{$vo->id}}&addtoend={{$addtoend}}"  event-node="reply_reply">{{trans('public.PUBLIC_STREAM_REPLY')}}</a>&nbsp;
			@if(Auth::id() == $vo->user_info['id'] || Auth::user()->can("manage_comment"))
				<a href="javascript:;" event-node="wallet_del" event-args="reply_id={{$vo->id}}">删除</a>&nbsp;
			@endif
		</dd>
	</dl>
</div>
@endforeach
