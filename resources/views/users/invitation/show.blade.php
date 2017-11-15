@extends('layouts.common')


@section('content')
<link href="{{ asset('/build/dist/css/invite.css') }}" type="text/css" rel="stylesheet" />
    <div class="TA">
        <div class="b_ja">
            {!! $breadcrumb or '' !!}
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
                        <li class="select" style="color: #146500;">邀请好友</li>
                    </ul>
                </div>
                <div class="invite">
                    <div class="invite_left">
                        <div class="invite_main">
                            {!! get_content('20') !!}
                        </div>
                        <div class="invite_user">
                            <div class="invite_user_left fleft">
                                <img src="{{$inviter->avatar}}" alt="{{$inviter->username}}" />
                                <span onclick="javascript:window.location.href='/auth/register';" style="cursor: pointer;">接受邀请，我要注册</span>
                            </div>
                            <div class="invite_user_right fleft">
                                <dl>
                                    <dd>{{$inviter->username}}</dd>
                                    <dd>学历：@if($inviter->education){{$base_data['education']['value'][$inviter->education]}}@else 未知 @endif</dd>
                                    <dd>学习：{{$inviter->school}}</dd>
                                    <dd>职业：{{$inviter->work}}</dd>
                                    <dd>居住地：{{$inviter->location}}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="invite_right">
                        <div class="invite_right_top">{{$inviter->username}}的好友们</div>
                        @foreach($inviter_firends as $key => $inviter_firend)
                        <div class="invite_friend" onclick="javascript:window.location.href='{{route('user.home',$inviter_firend->id)}}'">
                            <dl>
                                <dd><img src="{{$inviter_firend->avatar}}?v={!!time()!!}" alt="" /></dd>
                                <dd>{{$inviter_firend->username}}</dd>
                            </dl>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

@stop
