@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/blog.css') }}" type="text/css" rel="stylesheet" />
<script src="{{ asset('/js/lang/public_zh-cn.js') }}"></script>
<script src="{{ asset('/js/lang/admin_zh-cn.js') }}"></script>
<script src="{{ asset('/js/jquery.atwho.js') }}"></script>
<script src="{{ asset('/js/jquery.form.js') }}"></script>
<script src="{{ asset('/js/common.js') }}"></script>
<script type="text/javascript" src = "{{ asset('/js/ui.core.js') }}"></script>
<script src="{{ asset('/js/core.js') }}"></script>
<script src="{{ asset('/js/module.js') }}"></script>
<script src="{{ asset('/js/module.common.js') }}"></script>
<script src="{{ asset('/js/weiba.js') }}"></script>
<script type="text/javascript" src = "{{ asset('/js/ui.draggable.js') }}"></script>
<div class="clear"></div>
<div class="b_n">
<div class="b_na">
	<strong class="green">{!! $breadcrumb or '' !!}</strong>
</div>
<div class="b_nb">
	<div class="left blog">
		<div class="main">
			<div class="blog_main">
				<div class="blog_title">
					<p class="title">{{$blog->title}}</p>
					<p class="time">{{$blog->created_at}}</p>
				</div>
				<div class="blog_body">
					<p>{!!$blog->body!!}</p>
					<div class="blog_handle"><a href="">点赞（{{$blog->digg_count}}）</a><a href="">阅读（{{$blog->view_count}}）</a></div>
 				</div>
			</div>
			<div class="blog_comment">
				{!! Widget::Reply([ 'tpl'=>'reply','post_id'=>$blog->id, 'post_user_id' => $blog->user_id, 'limit'=>'20', 'post_from'=>'blog','space_id'=>$blog->space_id,'addtoend'=>0 ]) !!}
			</div>
		</div>
	</div>
	<div class="left blog_right">
		<div class="blog_right_userinfo common_border">
            <div class="px20"></div>
            <dl class="blog_right_userinfo_dl">
                <dd><a href="{{route('user.home',$user->id)}}"><img src="{!! $user->avatar_small !!}" alt="" class="right_avatar" /></a></dd>
                <dd>{{ $user->username }}</dd>
                <dd>{{ $user->school }}/{{ $user->work }}</dd>
                <dd>
                    <ul style="margin-top: 10px;">
                        <li style="border-right: 1px #ccc solid;">
                            <dl>
                                <dd>{{$user->blog_count}}</dd>
                                <dd>日志</dd>
                            </dl>
                        </li>
                        <li style="border-right: 1px #ccc solid;">
                            <dl>
                                <dd>{{$user->thread_count}}</dd>
                                <dd>话题</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dd>{{$user->space_count}}</dd>
                                <dd>说说</dd>
                            </dl>
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="common_border blog_other">
	        <div class="px20"></div>
	        <div class="common_head">
		        <p>作者的其它最新日志<a href="" class="right">全部</a></p>
	        </div>
	        <div class="blog_list">
		        <ul>
			        @foreach($new_blogs as $key => $blog)
                    <li class="space_right_p"><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></li>
                    @endforeach
				</ul>
		    </div>
	    </div>
	    <div class="common_border blog_hot">
	        <div class="px20"></div>
	        <div class="common_head">
		        <p >作者的热门日志</p>
	        </div>
	        <div class="blog_list">
		        <ul>
			        @foreach($hot_blogs as $key => $blog)
                    <li class="space_right_p"><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></li>
                    @endforeach
				</ul>
		    </div>
	    </div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('/js/module.weibo.js') }}"></script>
@stop
