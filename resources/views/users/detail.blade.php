
<table cellpadding="0" cellspacing="0">
<tr><td width="90" align="center" valign="top"><img src="{{$user->avatar}}?v={!!time()!!}" width="72" height="76" /></td><td><p style="font-size:14px; color:#56ba3c;">{{$user->username}}</p><p>{{$user->location}}</p><p>{{$user->work}}  {{$user->school}}</p></td></tr>
<tr><td align="center" style=" color:#56ba3c;">女</td><td>   <span>关注：</span><span class="green">{{$user->following_count}}</span>  <span>粉丝：</span><span class="green">{{$user->follower_count}}</span><span>人气：</span><span class="green">{{$user->view_count}}</span></td></tr>
</table>
<div class="l_ahovera">
<a href="javascript:;" data-type="User" data-id="{{$user->id}}" data-url="{{route('follow.user',$user->id)}}" class="followbtn l_ahpver mr5" >
    <span class="follow_text">{{$follow_text}}</span>
</a><a href="javascript:ajaxgethtml('{{route('hello',['user_id' => $user->id])}}');" class="l_ahpver mr5" >打招呼</a><a href="javascript:ajaxgethtml('{{route('gift',['user_id' => $user->id])}}');" class="l_ahpver a1" >赠送礼物</a>
</div>
</div>
