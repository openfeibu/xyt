<div class="contents clearfix">
	<div class="mb10 clearfix">
		{{$sourceInfo['source_content']}}
		<div class="feed_img_lists">
			<ul class="small">
				@foreach($sourceInfo['images'] as $key => $image)
				<li rel="99">
					<a href="{{$sourceInfo['album_url']}}">
					   <img class="imgicon" src="{{$image}}" >
			        </a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>