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
			<div class="blog_main" style="width: 975px;">
				<div class="blog_title">
					<p class="title">{{$summary->title}}</p>
					<p class="time">{{$summary->created_at}}</p>
				</div>
				<div class="blog_body">
					<p>{!!$summary->body!!}</p>
					
 				</div>
			</div>
			<div class="blog_comment">
				
			</div>
		</div>
	</div>
	
</div>

@stop
