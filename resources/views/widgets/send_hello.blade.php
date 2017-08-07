<!-- 打个招呼的表单 -->
<form action="" class="hello" method="post" id="hello_form_{!!$user->id!!}" name="hello_form">
	<input type="hidden" value="{!!$user->id!!}" name="helloToUser" id="helloToUser">
	<div class="">
		<div class="hello_title"><span style="color: #fff;font-size: 16px;">&nbsp;&nbsp;打个招呼</span><span class="buto" style="float: right;margin: 10px 5px;"><img src="{{asset('images/index/buto.png')}}" style="margin-top:-21px;"  class="hello_title_close" alt="" onclick="javascript:close_layer();"/></span></div>
		<div class="" style="clear:both"></div>
		<div class="hello_top">
			<span>向  <b>{!! $user->username !!}</b>  打招呼:</span>
		</div>
		<div  class="hello_content">
			<ul>

				@foreach($emojis as $key => $emoji)
				<li>
					<img src="{{$emoji['file_url']}}"/>
					<input type="radio" name="hello_radio" class="hello_radio" value="{{$emoji['filename']}}">
				</li>
				@endforeach

			</ul>
			<div class="clear"></div>
		</div>

		<div class="hello_footer">
			<input type="button" onclick="helloSubmit({{$user->id}})" class="hello_footer_sub" value="确定"/>
		</div>
	</div>
</form>
