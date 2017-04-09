@foreach ($var ['data'] as $vl)
<div class="list">
    <h4><a href="{{ route('user.home',[$vl['user_info']['id']])}}" target="_blank" class="user_info" rel="{{$vl['user_info']['id']}}"><span><img src="{{ $vl['user_info']['avatar_url'] }}" width="16" height="16" alt="" /></a><a href="{{ route('user.home',[$vl['user_info']['id']])}}" target="_blank" ><span class="r_clist">{{ $vl['user_info']['username'] }} ({{ $vl['user_info']['work'] }}/{{ $vl['user_info']['school'] }})</span></a><span class="r_ctime">{{friendlyDate($vl['created_at'])}}</span></h4>
    <p>{!! $vl['body'] !!}</p>
</div>
@endforeach