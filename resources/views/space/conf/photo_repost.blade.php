{!!replaceUrl(t($body))!!}
<dl class="comment_feed">
	@if($sourceInfo['source_user_info'] != false)
	<dd class="com-info clearfix">
		<div class="feed_txt feed_txt_default">
        	<!--  转发原文 -->
        	<span class="source_info">{{$sourceInfo['source_user_info']['space_link']}}<em>&nbsp;&nbsp;{{friendlyDate($sourceInfo['created_at'])}}</em></span>
        	<p>{{$sourceInfo['source_content']}}</p>
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
	</dd>
	@else
	<dd class="name">内容已被删除</dd>
	@endif
</dl>