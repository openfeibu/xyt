<div class="feed_lists" id="feed-lists">
{!! $var['list'] !!}
</div>
<div class="content_list">                      
	<div class="clear"></div>
	@if ($var['showPage'] === 1)

	<div id="page" class="page">{{$var['pageHtml']}}</div>
	@endif
</div>

<script type="text/javascript">
var firstId = '{{$var['firstId']}}';
var loadId = '{{$var['lastId']}}';
var maxId = '{{$var['firstId']}}';
var feedType = '{{$var['type']}}';
var loadmore = '{{$var['loadmore']}}';
var loadnew = '{{$var['loadnew']}}';
var feed_type = '{{$var['feed_type']}}';
var feed_key = '{{$var['feed_key']}}';
var app = '{{$var['app']}}';

</script>