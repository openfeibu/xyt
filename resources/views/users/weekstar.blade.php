@extends('layouts.common')

@section('content')
<div class="b_a">
<div class="b_atitle"><strong>女士</strong></div>
<ul class="b_aul">
@foreach($girl_users as $key => $user)
<li class="user_info_abroad"><a href="{{route('user.home',$user->id)}}" class="user_info" rel='{{$user->id}}'><img src="{{$user->avatar}}?v={!!time()!!}" width="117" height="117" alt="" />
<p>{{$user->username}}</p><p>{{$user->work}} / {{$user->school}}</p></a></li>
@endforeach
</ul>

<div class="b_atitle"><strong>男士</strong></div>
<ul class="b_aul">

@foreach($boy_users as $key => $user)
<li class="user_info_abroad"><a href="{{route('user.home',$user->id)}}" class="user_info" rel='{{$user->id}}'><img src="{{$user->avatar}}?v={!!time()!!}" width="117" height="117" alt="" />
<p>{{$user->username}}</p><p>{{$user->work}} / {{$user->school}}</p></a></li>
@endforeach

</ul>

<div class="clear"></div>
</div>
@stop
