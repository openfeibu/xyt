 @extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/activity.css') }}" type="text/css" rel="stylesheet" />
<div class="clear"></div>
    <div class="activity">
        <div style="height: 20px;"></div>
        <div class="activity_nav">
            <ul class="activity_nav_ul1">
                <a href="{{route('activity.index')}}"><li class="bg1">全部活动</li></a>
                <a href="{{route('activity.u')}}"><li class="bg2">我的活动</li></a>
                <a href="{{route('activity.index',['type' => 'recommend'])}}"><li>推荐活动</li></a>
                <a href="{!! route('activity.create') !!}"><li>+发起新活动</li></a>
            </ul>
            <div style="height: 20px;" class="clear"></div>
        </div>

        <hr size="1" style="border:1px #e2e1e1 solid;width: 98%;margin: 0 auto;" class="clear" />
        <div style="height:20px;" class="clear"></div>
        <div class="activity_place">
            <div class="activity_place_left fleft">
                <span>活动地点：</span>
            </div>
            <div class="activity_place_right fleft">
                <ul>
                    <a href="{{route('activity.index',['cat_id' => $cat_id])}}"><li @if(!$province_id)class="selected"@endif>全部</li></a>
                    @foreach($provinces as $key => $province)
                    <a href="{{route('activity.index',['province_id' => $province->id,'cat_id' => $cat_id])}}" ><li @if($province->id == $province_id)class="selected"@endif>{{$province->title}}</li></a>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="activity_type">
            <div class="activity_type_left fleft">
                <span>活动类型：</span>
            </div>
            <div class="activity_type_right fleft">
                <ul>
                    <a href="{{route('activity.index',['province_id' => $province_id])}}"><li @if(!$cat_id)class="selected"@endif>全部</li></a>
                    @foreach($cats as $key => $cat)
                    <a href="{{route('activity.index',['province_id' => $province_id,'cat_id' => $cat->id])}}"><li @if($cat->id == $cat_id)class="selected"@endif>{{$cat->title}}</li></a>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="activity_content">
		@foreach($activities as $activity)
        <!-- ******************* -->
            <hr  style=" border:1px #e2e1e1 dotted;width: 98%;margin: 0 auto;margin-top:20px"  class="clear" />
            <div style="height: 20px;"></div>
            <div class="activity_content_main">
                <div class="fleft">
					<a href="{!!route('activity.show',['id'=>$activity->id])!!}">
						<img src="{{$activity->poster}}" alt="" class="activity_content_main_img" />
					</a>
                </div>
                <div class="activity_content_main_dd fleft">
                    <dl>
                        <a href="{!!route('activity.show',['id'=>$activity->id])!!}"><dd style="color: #43AE70;font-size: 15px;">{!!$activity->name!!}</dd></a>
                        <dd>时间：
						{!!$activity->begin_time!!}&nbsp;&nbsp;
						<?php
							$weekday = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
							echo $weekday[date('w', strtotime($activity->begin_time))];
						?>
						</dd>
                        <dd>地点：<span style="color: #43AE70">{{$activity->location}}</span></dd>
                        <dd style="color: #858484">参加（{!!$activity->join_count!!}人）关注（{!!$activity->follow_count!!}人）浏览（{!!$activity->view_count!!}）</dd>
                        <dd style="color: red">{!!$activity->state!!}</dd>
                    </dl>
                </div>
            </div>
        <!-- ******************** -->
		@endforeach

        </div>
        <div class="clear"></div>
        <div style="height: 50px;"></div>

        <div class="activity_page">
            {!! with(new \Hifone\Foundations\Pagination\CustomerPresenter($activities))->render(); !!}
        </div>
    </div>
    <div class="clear"></div>
@stop
