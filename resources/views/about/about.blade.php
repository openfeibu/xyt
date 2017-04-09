 @extends('layouts.common')

@section('content')

<div class="clear"></div>
<div class="container">
	<div class="container-top-left" style="margin-top: 27px;">
		<span><img style="width:30px;height:30px;" src="{{asset('images/index/home.png')}}" alt="" /></span>
		<span>文章中心</span>
	</div>
	<div class="about_left">
		<div class="container-top entry_list">
			
			<ul>		
				@foreach($abouts as $about)
				<li style="padding-left:10px;">
				    <div class="title">
						<h4>[<a href="{{route('about.index',['type_id' => $about->type_id])}}">{{$about->type_name}}</a>]<a href="{{route('about.show',['id' => $about->id])}}">{{$about->title}}</a></h4>
						<br>
					</div>
					<div class="detail image_right l_text s_clear" id="blog_article_37">
						{{$about->body_original}}
					</div>

				</li>
				@endforeach
			</ul>
			{!! with(new \Hifone\Foundations\Pagination\CustomerPresenter($abouts))->render(); !!}
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
