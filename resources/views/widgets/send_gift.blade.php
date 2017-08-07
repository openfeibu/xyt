<!-- <form action="{{route('gift.sendGift')}}" class="send" method="post" id="gift_form_{!!$to_user->id!!}" name="gift_form">
	<input type="hidden" value="{!!$to_user->id!!}" id="giftToUser" name="giftToUser">
	<div class="">
		<div class="send_title"><span style="color: #fff;font-size: 16px;">&nbsp;&nbsp;赠送礼物</span><span class="buto" style="float: right;margin: 10px 5px;"><img src="{{asset('images/index/buto.png')}}" style="margin-top:-21px;"  class="send_title_close" alt="" onclick="javascript:close_layer();"/></span></div>
		<div style="background-color:#fff;	" class="send_page">
			<div class="gift">
				<ul>
					@foreach($gifts as $gift)
					<input type="radio" value="{{$gift->id}}" name="gift_radio{!!$to_user->id!!}" id="gift_radio{{$gift->id}}_{!!$to_user->id!!}" style="display:none">
					<li class="gift_select gift_select{{$gift->id}}" onclick="show_gift_info({{$gift->id}},{{$gift->gift_experience}},{{$gift->coin}},{{$gift->gift_number}},{{$to_user->id}})" >
						<span></span><img src="{{asset($gift->gift_img)}}" alt=""/>
					</li>
					@endforeach
					<input type="text" value="" id="gift_id{{$to_user->id}}" name="gift_id" style="display:none">
				</ul>
				<div class="clear"></div>
				<div class="text">
					<p><span>增加经验：<font class="gift_experience" color="#1f8d03">0</font></span></p>
					<p><span>道具单价：<font class="price" color="#1f8d03">0</font>象币</span></p>
					<p><span>现有库存：<font class="gift_number" color="#1f8d03">0</font>个</span></p>
					<p><span>购买数量：<input type="text" name="send_number" id="send_number{{$to_user->id}}" class="send_number{{$to_user->id}}" />个</span></p>
				</div>
				<div class="submit">
					<input type="button" onclick="checkSubmit({{$to_user->id}})" id="btn_sub" value="赠送礼物"/>
				</div>
			</div>
		</div>
	</div>
</form> -->

<form action="{{route('gift.sendGift')}}" class="send_new" method="post" id="gift_form_{!!$to_user->id!!}" name="gift_form">
	<input type="hidden" value="{!!$to_user->id!!}" id="giftToUser" name="giftToUser">
	<div class="">
		<div class="send_title"><span style="color: #fff;font-size: 16px;">&nbsp;&nbsp;赠送礼物</span><span class="buto" style="float: right;margin: 10px 5px;"><img src="{{asset('images/index/buto.png')}}" style="margin-top:-21px;"  class="send_title_close" alt="" onclick="javascript:close_layer();"/></span></div>
		<div style="background-color:#fff;	" class="send_page">
			<div class="to_user_title">
				<p>送给用户:{{$to_user->username}}（ {{$base_data['sex']['value'][$to_user->sex]}}  {{$to_user->location}}  {{$to_user->work}}/{{$to_user->school}} @if($to_user->education){{$base_data['education']['value'][$to_user->education]}}@else 未知 @endif )</p>
			</div>
			<div class="gift_type">
				<ul>
					<li><a href="javascript:ajaxgethtml('{{route('gift',['user_id' => $to_user->id])}}');">全部礼物</a></li>
					@foreach($gift_types as $key => $type)
					<li><a href="javascript:ajaxgethtml('{{route('gift',['user_id' => $to_user->id,'type_id' =>$type->id ])}}');">{{$type->name}}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="clear"></div>
			<div class="gift">
				<ul>
					@foreach($gifts as $gift)
					<input type="radio" value="{{$gift->id}}" name="gift_radio{!!$to_user->id!!}" id="gift_radio{{$gift->id}}_{!!$to_user->id!!}" style="display:none">
					<li  onclick="show_gift_info({{$gift->id}},{{$gift->gift_experience}},{{$gift->score}},{{$gift->gift_number}},{{$to_user->id}},'{{$gift->gift_name}}')" >
						<span class="gift_select gift_select{{$gift->id}} img"><img src="{{asset($gift->gift_img)}}" alt=""/></span>
						<p class="center">{{$gift->gift_name}}</p>
						<p class="center">积分：{{$gift->score}}</p>
					</li>
					@endforeach
					<input type="text" value="" id="gift_id{{$to_user->id}}" name="gift_id" style="display:none">
				</ul>
				<div class="clear"></div>
				<div class="message">赠言：<input type="text" name="message" value=""/><</div>
				<div class="text">
					<p><span>选择的礼物：<font class="gift_name" color="#1f8d03">0</font></span><span>积分：<font class="price" color="#1f8d03">0</font></span><span>增加经验：<font class="gift_experience" color="#1f8d03">0</font></span></p>
					<p><span>现有库存：<font class="gift_number" color="#1f8d03">0</font>个</span><span>购买数量：<input type="text" name="send_number" id="send_number{{$to_user->id}}" class="send_number{{$to_user->id}}" />个</span></p>
				</div>
				<div class="btn-div">
					<span class="mr20"><input type="checkbox" name="anonymous" class="anonymous" value="1">匿名赠送</span><span><input type="button" onclick="checkSubmit({{$to_user->id}})" class="btn_sub" value="赠送礼物"/></span>
				</div>

			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
