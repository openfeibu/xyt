<span id='{{$var['diggId']}}{{$var['space_id']}}' rel='{{$var['digg_count']}}'>
@if(!isset($var['diggArr'][$var['space_id']]))
   	<a href="javascript:;" onclick="core.digg.addDigg({{$var['space_id']}})"><i class="digg-like"></i>
   		@if(!empty($var['digg_count']))
   			({{$var['digg_count']}})
   		@endif
   	</a>
@else
   <a href="javascript:;" onclick="core.digg.delDigg({{$var['space_id']}})" class="@if(!empty($var['digg_count']))digg-like-yes @endif"><i class="digg-like"></i>
   		@if(!empty($var['digg_count']))
   			({{$var['digg_count']}})
   		@endif
   </a>
@endif
</span>