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
                            <p>欢迎您，{{$inviter->username}}热情邀请你为好友。</p>
                            <p><span style="color: red">*</span>
                                成为好友后，您们就可以一起参加各种精彩的联谊活动，不仅找到心仪的TA，还可以认识更多志同道合的师兄姐师弟妹，扩大自己的圈子，丰富自己的生活。
                            </p>
                            <p><span style="color: red">*</span>
                                您也可以方便浏览TA的个人资料，找到自己喜欢的人哦！同时您也可以发布自己的日志，上传活动照片及个人的照片、广播生活点滴，发表自己话题一同与好友讨论及分享。
                            </p>
                            <p><span style="color: red">*</span>
                                还等什么呢？赶快加入象牙塔-高校单身校友大联盟吧
                            </p>
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
                        <div class="invite_right_top">xxxxxx的好友们</div>
                        <div class="invite_friend">
                            <dl>
                                <dd><img src="./images/TAhphoto.png" alt="" /></dd>
                                <dd>asdasdsa</dd>
                            </dl>
                        </div>
                        <div class="invite_friend">
                            <dl>
                                <dd><img src="./images/TAhphoto.png" alt="" /></dd>
                                <dd>asdasdsa</dd>
                            </dl>
                        </div>
                        <div class="invite_friend">
                            <dl>
                                <dd><img src="./images/TAhphoto.png" alt="" /></dd>
                                <dd>asdasdsa</dd>
                            </dl>
                        </div>
                        <div class="invite_friend">
                            <dl>
                                <dd><img src="./images/TAhphoto.png" alt="" /></dd>
                                <dd>asdasdsa</dd>
                            </dl>
                        </div>

                        <div class="invite_friend">
                            <dl>
                                <dd><img src="./images/TAhphoto.png" alt="" /></dd>
                                <dd>asdasdsa</dd>
                            </dl>
                        </div><div class="invite_friend">
                            <dl>
                                <dd><img src="./images/TAhphoto.png" alt="" /></dd>
                                <dd>asdasdsa</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

@stop
