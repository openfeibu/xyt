<p>{{replaceUrl($body)}}</p>
<div class="feed_img_lists" >
<ul class="small">

<?php $attachCount=count($attachInfo);$i = 0; ?>
@foreach($attachInfo as $key => $vo )
	<li rel="{{$vo['attach_id']}}" @if($attachCount==1) style="width:205px;height:auto" @endif>
		<a href="{{$vo['attach_medium']}}"  target="_blank">
		   <img @if($attachCount==1) onload="/*仅标签上有效，待改进*/;var li=$(this).parents('li');if(li.height()>300){li.css('height','300px');li.find('.pic-btm').show();}" @endif class="imgicon" src='@if($attachCount==1) {{$vo['attach_medium']}} @else {{$vo['attach_small']}} @endif' title='点击放大' >
		</a>
	</li>
<?php $i ++; ?>

@endforeach
</ul>
</div>
