@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/join_list.css') }}" type="text/css" rel="stylesheet" />
    <div class="TA">
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
                        <li @if($type=='join')class="select" style="color: #146500;" @endif><a href="{{route('activity.users',['id'=>$activity->id,'type'=>'join'])}}">{{$join_count}}人参加</a></li>
                        <li @if($type=='follow')class="select" style="color: #146500;" @endif><a href="{{route('activity.users',['id'=>$activity->id,'type'=>'follow'])}}">{{$follow_count}}人关注</a></li>
                    </ul>
                </div>

                <div class="join_list">
                    @if($type=='join')
                    @foreach($users as $key => $user)
                    @if(strtotime($activity->close_time) < time())
                        <div class="join_list_user">
                          <dd><img src="{{$user->avatar_url}}" alt="" class="join_list_user_img" /></dd>
                          <dd>{{$user->username}}</dd>
                        </div>
                    @else
                        <div class="join_list_user">
                          <dd><img src="{{asset('images/unknow.png')}}" alt="" class="join_list_user_img" /></dd>
                          <dd>匿名</dd>
                        </div>
                    @endif
                    @endforeach
                    @else
                    @foreach($users as $key => $user)
                    <div class="join_list_user">
                      <dd><img src="{{$user->avatar_url}}" alt="" class="join_list_user_img" /></dd>
                      <dd>{{$user->username}}</dd>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
          </div>
       </div>
    </div>
@stop
