@extends('layouts.common')


@section('content')
<link href="{{ asset('/build/dist/css/invite.css') }}" type="text/css" rel="stylesheet" />
<script src="{{ asset('/build/dist/js/clipboard.min.js') }}"></script>
    <div class="TA">
        <div class="b_ja">
            {!! $breadcrumb or '' !!}
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf" style="border-bottom: 0px;">
                    <ul>
                        <li class="select" style="color: #146500;border:1px #51B837 solid;border-bottom: 0px;">邀请好友</li>
                    </ul>
                </div>
                <div class="setting_invite">
                    <div class="setting_invite_top">
                        <span>奖励项目：<font style="color: red">每成功邀请1个好友加入，即可获得150积分，2个象牙币，赶快行动吧！</font></span>
                    </div>
                    <div class="setting_invite_way">
                        <p>
                            <img src="{{ asset('/build/dist/images/invite_logo1.png') }}" alt="" />
                            <font style="color: #51B837">方式一：</font>我的好友邀请链接
                        </p>
                        <div class="setting_invite_way1">
                            <p style="color: #51B837">您可以通过QQ、MSN等IM工具，或者发送邮件，把下面的链接告诉您的好友，邀请他们加入进来。</p>
                            <p class="setting_invite_way1_url" style="line-height: 25px;" id="invite_text">
                                我邀请您加入高校联谊大家庭-象牙塔。这里可以参加各种精彩的联谊活动，不仅可以找到你心仪的TA！还可以认识更多志同道合的师兄姐师弟妹哦！！<br />
                                {{route('invitation.show',['uid' => $user->id])}}
                            </p>
                            <p><span style="cursor:pointer" class='copy_btn'>复制</span></p>
                        </div>
                        <p>
                            <img src="{{ asset('/build/dist/images/invite_logo2.png') }}" alt="" />
                            <font style="color: #51B837">方式二：</font>
                            给好友发送EMAIL邀请<font style="color: #51A38A;margin-left: 30px;">（温馨提醒：发送给多个EMAIL地址时，使用","分割）</font>
                        </p>
                    </div>
                    <div class="setting_invite_way2">
                        <form name="invate_form" action="{{route('invitation.send')}}" method="post" >
                        <p>
                            <img src="{{ asset('/build/dist/images/invite_enail.png') }}" alt="" />
                            第一步：填写好友EMAIL地址
                        </p>
                        <p>
                            <textarea name="email">{{Input::old('email')}}</textarea>
                        </p>
                        <p>
                            <img src="{{ asset('/build/dist/images/invite_talk.png') }}" alt="" />
                            第二步：想对好友说句话
                        </p>
                        <p style="margin-left: 40px;">
                            邀请附言：<input type="text" name="message" class="input_text" value="{{Input::old('message')}}"/>
                        </p>
                        <p>
                            <input type="submit" name="send_invite" id="send_invite" value="发送邀请" />
                        </p>
                        </form>
                    </div>
                    <p style="margin-left: 40px;margin-top: 10px;margin-bottom: 10px;font-size: 18px;">预览邀请函</p>
                    <div class="preview_invitation">
                        <div class="preview_invitation_top">
                            <span>象牙塔-高校单身校友大联盟</span>
                        </div>
                        <div class="preview_invitation_left fleft">
                            <dl>
                                <dd class="preview_invitation_left_user">
                                    <img src="{{$user->avatar}}?v={!!time()!!}" alt="" /><br />
                                    {{$user->username}}
                                </dd>
                                <dd style="margin-top: 3px;">{{$user->work}}/{{$user->school}}</dd>
                            </dl>
                        </div>
                        <div class="preview_invitation_right fleft">
                            <p>HI,</p>
                            <p style="margin-top: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;我是{{$user->username}}，想邀请你加入高校联谊大家庭-象牙塔一起参加活动！</p>
                            <p style="margin-top: 20px;">加入后，你就可以参加各种精彩的联谊活动，比如有户外爬山，K歌，羽毛球，聚餐，电影等联谊活动；可以很快找到心中的TA!同时可以认识更多的师兄姐师弟妹等！大力推荐^_^
                            </p>
                            <div class="invite_fuyan">
                                <span class="fleft">
                                    邀请附言：<br />
                                    很给力的！
                                </span>
                                <span class="fright" style="margin-right: 100px;">
                                    <img src="{{ asset('/build/dist/images/wechat.png') }}" alt="" />
                                </span>
                            </div>
                            <p class="clear">
                                <p>请你点击一下链接，接受好友邀请：</p>
                                <p><a href="{{route('invitation.show',['uid' => $user->id])}}">{{route('invitation.show',['uid' => $user->id])}}</a></p>
                            </p>
                        </div>
                        <div class="clear" style="height: 20px;"></div>
                        <div class="clear preview_invitation_footer">
                            <p>联谊微信公众号：xxxxxxxxxxx <br />
                            联谊活动QQ：xxxxxxxxxxx</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<script type="text/javascript">
function copyToClipBoard(id){
    $("#"+id).text().clone();
    alert("复制成功！");
}

var clipboard = new Clipboard('.copy_btn', {
    text: function() {
        var content = $('#invite_text').text();
        return content;
    }
});

clipboard.on('success', function(e) {
    layer.msg('复制成功' ,{time: 2000, icon:6});
    console.log(e);
});

clipboard.on('error', function(e) {
    layer.msg('复制失败，请使用高版本浏览器或手动复制！' ,{time: 2000, icon:5});
    console.log(e);
});
</script>

@stop
