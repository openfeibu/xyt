{!!replaceUrl(t($body))!!}
<dl class="comment_feed">
	@if($sourceInfo['source_user_info'] != false)
	<dd class="com-info clearfix">
			<!--{* 视频分享 *}-->
			@if($sourceInfo['feedType'] == 'postvideo')
				{{$sourceInfo['source_body']}}
			@endif
			@if($sourceInfo['feedType'] == 'post')
			<div class="feed_txt feed_txt_default">
	      <!--  转发原文 -->
            <span class="source_info">{{$sourceInfo['source_user_info']['space_link']}}<em>&nbsp;&nbsp;{{friendlyDate($sourceInfo['created_at'])}}<!--&nbsp;{{getFromClient($sourceInfo['from'])}}--></em></span>
		    <p class="txt-mt" onclick="core.weibo.clickRepost(this);" href="">{!!msubstr(t($sourceInfo['source_content']),0,100)!!}</p>
			</div>
			@endif

		
	</dd>
	@else
	<dd class="name">内容已被删除</dd>
	@endif
</dl>