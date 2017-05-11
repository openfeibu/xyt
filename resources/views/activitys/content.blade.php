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
    <span style="font-size: 18px;">【{!!$activity->name!!}】</span>
    <div class="details_top_info">
        <div class="details_top_info_left fleft">
            <img src="{{asset('images/index/img4.jpg')}}" alt=""  class="details_top_info_img" / >
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
                        <dd>活动人数：{!!$activity->number_count!!}人（还剩下{!!$activity->number_count-$activity->join_count!!}个名额）</dd>
                        <dd>活动费用：男 {!!$activity->payboy!!} 元&nbsp;女 {!!$activity->paygirl!!} 元</dd>
                        <dd>联系方式：{!!$activity->mobile!!}</dd>
                    </dl>
                </div>
            </div>
            <div class="details_top_info_right_time">
                <img src="{{asset('images/index/time.jpg')}}" alt=""  class="fleft" />
                <span style="font-size: 18px;line-height:50px;float: left">
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
            @foreach($summaries as $key => $summary)
            <p><a href="{{route('activity.summary',$summary->activity_id)}}">{{$summary->title}}</a></p>
            @endforeach
        </div>

        <div class="details_right_footer">
            <div class="px10"></div>
            <div>
                <span style="font-size: 20px;padding: 10px;color:#1E8A4C" class="fleft">本期活动总结及照片</span>
                <p style="width:90px;padding-right: 10px;" class="fright">
	                <span class="fright"><a href="{{route('album.upload_common',['activity_id' =>$activity->id ])}}">添加照片</a></span>
	                <span class="fright"><a href="{{route('activity.create_summary',['activity_id' => $activity->id])}}">添加活动总结</a></span>
	            </p>
            </div>
            <div class="clear" style="height: 13px;"></div>
            <hr style="border:1px #e2e1e1 solid;margin: 0 aut@stopmmary',$summary->activity_id)}}">{{$summary->title}}</a></p>
                <img src="{{asset('images/index/img6.jpg')}}" alt="" /><img src="{{asset('images/index/img7.jpg')}}" alt="" />
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
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
    $('.activity_join_btn').click(function(){
        var load = layer.load(1);
        var $this = $(this);
		$.ajax({
			type: 'POST',
			url: "{{ route('activity.join') }}",
			data: {user_id:{{Auth::id()}},activity_id:{!!$activity->id!!}},
			dataType: 'json',
			success: function(data){
                layer.close(load);
				if(data.code == 200){
                    if(data.status == 1)
                    {
                        $this.text("取消报名");
                    }
                    else{
                        $this.text("立即报名");
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

    })

</script>
@stop
