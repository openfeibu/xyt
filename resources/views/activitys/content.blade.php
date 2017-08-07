@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/activity_details.css') }}" type="text/css" rel="stylesheet" />
<script src="{{ asset('/js/lang/public_zh-cn.js') }}"></script>
<script src="{{ asset('/js/lang/admin_zh-cn.js') }}"></script>
<script src="{{ asset('/js/common.js') }}"></script>
<script src="{{ asset('/js/core.js') }}"></script>
<script src="{{ asset('/js/module.js') }}"></script>
<script src="{{ asset('/js/module.common.js') }}"></script>
<script src="{{ asset('/js/ui.core.js') }}"></script>
<script src="{{ asset('/js/ui.draggable.js') }}"></script>
<div class="clear"></div>

    <div class="px20"></div>
    <span style="font-size: 18px;">{!!$activity->name!!}</span>
    <div class="details_top_info">
        <div class="details_top_info_left fleft">
            <img src="{{$activity->poster}}" alt=""  class="details_top_info_img" / >
        </div>
        <div class="details_top_info_right fleft">
            <div class="details_top_info_right_info">
                <div class="details_top_info_right_top">
                    发起者：<b style="color: #1E8A4C">
					<a href="{!! route('user.home', [$user->id]) !!}">
						{!!$user->username!!}
					</a>
					</b>
                </div>
                <div class="details_top_info_right_main">
                    <dl>
                        <dd>活动时间：
						<?php $begin_time = strtotime($activity->begin_time)?>
						{!!date("Y-m-d",$begin_time)!!}
						<?php
							$weekday = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
							echo $weekday[date('w', strtotime($activity->begin_time))];
							$close_time = strtotime($activity->close_time)
						?>&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;
						{!!date("Y-m-d",$close_time)!!}
						<?php echo $weekday[date('w', strtotime($activity->close_time))]; ?>
						</dd>
                        <dd>活动地点：{!!$activity->location!!}</dd>
                        <dd>活动类型：{!!$activity->cat_title!!}</dd>
                        <dd>活动人数：{!!$activity->number_count!!}人（还剩下{!!$activity->number_count-$activity->join_count!!}个名额）</dd>
                        <dd>活动费用：男 {!!$activity->payboy!!} 元&nbsp;女 {!!$activity->paygirl!!} 元</dd>
                        <dd>联系方式：{!!$activity->mobile!!}</dd>
                    </dl>
                </div>
            </div>
            <img src="{{asset('images/index/time.jpg')}}" alt=""  class="fleft" />
            <div class="details_top_info_right_time">
	            {!!$activity->deadline_desc!!}
            </div>
        </div>
    </div>


    <div class="px10"></div>
    <div class="details_share">
		<span>
			<a href="javascript:;"  event-args="sid={{$activity->id}}&stable=weiba_post&curtable=feed&curid=94&initHTML=&appname=weiba&cancomment=1&feedtype=weiba_post" event-node="share" >分享</a>&nbsp;|&nbsp;
			<a href="javascript:;">举报</a>&nbsp;|&nbsp;
			<a href="javascript:;" id="follow" onclick="activity_follow({!!$login_user->id!!})">{{$activity_follow_stauts_desc}}</a>
		</span>
	</div>
    <div class="px10"></div>


    <div class="details_left fleft">
        <div class="details_left_top">
            <img src="{{asset('images/index/details.png')}}" alt="" /><span style="font-size: 20px;color: #1E8A4C">【活动详情】</span>
            {!!$activity->body!!}

        </div>

    </div>

    <div class="details_right fleft">
        <div class="details_right_sign">
            <div class="px10"></div>
            <div class="fleft">
                <span style="font-size: 20px;padding: 10px;">最新报名人数（{{$join_count}}人）</span>
            </div>
            <div class="fright" style="margin-right: 10px;font-size: 18px;color:#1E8A4C"><a href="{{route('activity.users',['id'=>$activity->id,'type'=>'join'])}}"><span>全部</span></a></div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto"/>
            <div class="details_right_sign_main">
                <ul>
					<?php $count=12; if(count($activity_joins)<12) $count=count($activity_joins);?>

					@for($i=0;$i<$count;$i++)
                    @if(strtotime($activity['close_time']) < time())
                    <li>
						<a href="{!! route('user.home', [$activity_joins[$i]->user_id]) !!}">
                        <dl>
                            <dd><img src="{!! $activity_joins[$i]->avatar_url !!}" alt="" /></dd>
                            <dd>{!! $activity_joins[$i]->username !!}</dd>
                        </dl>
						</a>
                    </li>
                    @else
                    <li>
						<a href="javascript:;">
                        <dl>
                            <dd><img src="{{asset('images/unknow.png')}}" alt="" /></dd>
                            <dd>匿名</dd>
                        </dl>
						</a>
                    </li>
                    @endif
					@endfor

                </ul>
            </div>
        </div>

        <div class="details_right_focus">
            <div class="px10"></div>
            <div class="fleft">
                <span style="font-size: 20px;padding: 10px;">关注者</span>
            </div>
            <div class="fright" style="margin-right: 10px;font-size: 18px;color:#1E8A4C"><a href="{{route('activity.users',['id'=>$activity->id,'type'=>'follow'])}}"><span>全部</span></a></div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto"/>
            <div class="details_right_sign_main">
                <ul>
					<?php $count=12; if(count($activity_follows)<6) $count=count($activity_follows);?>
					@for($i=0;$i<$count;$i++)
                    <li>
						<a href="{!! route('user.home', [$activity_follows[$i]->user_id]) !!}">
                        <dl>
                            <dd><img src="{!! $activity_follows[$i]->avatar_url !!}" alt="" /></dd>
                            <dd>{!! $activity_follows[$i]->username !!}</dd>
                        </dl>
						</a>
                    </li>
					@endfor
                </ul>
            </div>
        </div>

        <div class="details_right_photo">
            <div class="px10"></div>
            <div class="fleft">
                <span style="font-size: 20px;padding: 10px;color:#1E8A4C">往期活动总结及照片</span>
            </div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto"/>
            @foreach($summaries as $key => $value)
            <p><a href="{{route('activity.summary',['activity_id' => $value->activity_id])}}">{{$value->title}}</a></p>
            @endforeach
        </div>

        <div class="details_right_footer">
            <div class="px10"></div>
            <div>
                <span style="font-size: 20px;padding: 10px;color:#1E8A4C" class="fleft">本期活动总结及照片</span>
                <!-- <p style="width:90px;padding-right: 10px;" class="fright">
	                <span class="fright"><a href="{{route('album.upload_common',['activity_id' =>$activity->id ])}}">添加照片</a></span>
	                <span class="fright"><a href="{{route('activity.create_summary',['activity_id' => $activity->id])}}">添加活动总结</a></span>
	            </p> -->
            </div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 auto;">

            <div class="details_right_footer_main">
                @if($summary)
                <p><a href="{{route('activity.summary',['activity_id' => $summary->activity_id])}}">{{$summary->title}}</a></p>
                <img src="{{asset('images/index/img6.jpg')}}" alt="">
                @endif
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div id="pay_content" style="display:none;">
    <div class="">
        <input name="pay_id" type="radio" value="1">支付宝支付
        <input name="pay_id" type="radio" value="2">微信支付
        <input name="pay_id" type="radio" value="4">现场支付
    </div>
    <div style="text-align:center"><button class="btn-green pay_btn_sub pay_btn">确定</button></div>
</div>
<div id="banned_content" style="display:none;">
    <form class="" name="" method="post" action="{{route('activity.relieve_banned')}}" target="_blank">
        <div class="">
            <input name="pay_id" type="radio" value="1">支付宝支付
            <input name="pay_id" type="radio" value="2">微信支付

        </div>
        <div style="text-align:center"><button class="btn-green pay_btn">确定</button></div>
    </form>
</div>
<script>
	function activity_follow(id){
        var load = layer.load(1);
        var $this = $(this);
		$.ajax({
			type: 'POST',
			url: "{{ route('activity.follow') }}",
			data: {user_id:id,activity_id:{!!$activity->id!!}},
			dataType: 'json',
			success: function(data){
                layer.close(load);
				if(data.code == 200){
                    if(data.status == 1)
                    {
                        $('#follow').text("取消关注");
                    }else{
                        $('#follow').text("关注");
                    }

                    layer.msg(data.msg);
				}else{
					layer.msg(data.msg);
				}
			},
			error: function(xhr, type){
				location.href="{{ route('auth.login') }}";
			}
		});

	}
    $("body").on('click','.activity_unjoin_btn',function(){
        $.ajax({
			type: 'POST',
			url: "{{ route('activity.join') }}",
			data: {activity_id:{!!$activity->id!!}},
			dataType: 'json',
			success: function(data){
				if(data.code == 200){
                    $(".details_top_info_right_time").html(data.desc);
                }
                layer.msg(data.msg);
            }
        });
    });
    $("body").on('click','.activity_join_btn',function(){
        layer_div = layer.open({
            type: 1,
            title: '选择支付方式',
            closeBtn: 1,
            area: '516px',
            skin: 'layui-layer-rim', //没有背景色
            shadeClose: true,
            area: ['420px', '100px'], //宽高
            content: $('#pay_content'),
        });
    });

    $('.pay_btn_sub').click(function(){

        var $this = $(this);
        var pay_id=$('input:radio[name="pay_id"]:checked').val();
        if(pay_id == null )
        {
            layer.msg("请选择支付方式");
            return false;
        }
        var load = layer.load(1);
		$.ajax({
			type: 'POST',
			url: "{{ route('activity.join') }}",
			data: {activity_id:{!!$activity->id!!},pay_id:pay_id},
			dataType: 'json',
			success: function(data){
                layer.close(load);
                layer.close(layer_div);
				if(data.code == 200){
                    $(".details_top_info_right_time").html(data.desc);
                    layer.msg(data.msg);
				}else if(data.code == 210)
                {
                    window.location.href = data.url;
                }
                else if(data.code == 202){
                    //页面层-佟丽娅
                    layer.open({
                        type: 1,
                        title: '支付解除活动黑名单',
                        closeBtn: 1,
                        area: '516px',
                        skin: 'layui-layer-rim', //没有背景色
                        shadeClose: true,
                        area: ['420px', '100px'], //宽高
                        content: $('#banned_content'),
                    });
                }else{
                    layer.msg(data.msg);
				}
			},
			error: function(xhr, type){
				location.href="{{ route('auth.login') }}";
			}
		});

    })

</script>
@stop
