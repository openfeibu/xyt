 @extends('layouts.common')

@section('content')

<div class="clear"></div>
<div class="container">
	<div class="container-top-left" style="margin-top: 27px;">
		{!! $breadcrumb or '' !!}
	</div>
	<div class="about_left entry">
		<div class="title" style="background-color:#F7F7F7; border-width:0px;">
			<h1 style="font-size:22px; text-align:center;"> {{$page->title}}</h1>
		</div>
		<div id="blog_article">
			<div class="resizeimg">
				{!!$page->body!!}
			</div>
		</div>
	</div>

	<div id="obar" style="width:126px;margin-right:10px;height:auto;float:right">
		<div id="sidebox">
		<ul class="line_list" style="line-height:30px;">
		<li><a href="">全部分类</a></li>
		@foreach($types as $type)	
			<li style="font-weight:bold;">
				<a href="{{route('about.index',['type_id' => $type['id']])}}">{{$type['type']}}</a>
			</li>
			@foreach($type['child'] as $key => $typechilds)
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				»<a href="{{route('about.index',['type_id' => $typechilds['id']])}}">{{$typechilds['type']}}</a>
				</li>
			@endforeach
		@endforeach
		
		</ul>
		</div>
		 
	</div>


</div>

<script>	
	function getType(id){
		alert(id);
	}
</script>

@stop
