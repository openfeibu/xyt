<div class="contents clearfix">
	<div class=" mb10 clearfix">
		{{$sourceInfo['source_content']}}
		<div class="comment_feed feed_txt feed_txt_default">
			<div class="hotspot"><a href="{{$sourceInfo['source_url']}}" class="active">{{$sourceInfo['user_count']}}</a></div>
			<p><a href="{{$sourceInfo['source_url']}}" class="active">{{$sourceInfo['title']}}</a> </p>
			<p>分类名称:<a href="{{ route('thread.node_content', $sourceInfo['node_id'])}}" class="active">{{$sourceInfo['node_name']}}</a></p>
			{{cut_html_str($sourceInfo['body_original'],200)}}

		</div>

	</div>

</div>
