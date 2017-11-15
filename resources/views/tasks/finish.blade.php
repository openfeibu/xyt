@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/mywork.css') }}" type="text/css" rel="stylesheet" />
    <div class="TA">
        <div class="b_ja">
            {!! $breadcrumb or '' !!}
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
                        <li ><a href="{{route('task.index')}}">待参与任务</a></li>
                        <li class="select" style="color: #146500;"><a href="{{route('task.finish')}}">已参与任务</a></li>
                    </ul>
                </div>
                <div class="mywork">
                    <div class="mywork_top">
                        <span>按任务优先级排序，参与任务有大奖，开始吧</span>
                    </div>

                    <div class="mywork_schedule_content clear">
                    <!-- ***************************** -->
                    @foreach($finish_tasks as $key => $task)
                      <div class="mywork_schedule_content_main">
                        <div class="mywork_schedule_content_main_photo fleft">
                          <img src="{{handle_image($task->image,'system')}}" alt="" class="mywork_schedule_content_main_img" />
                        </div>
                        <div class="mywork_schedule_content_main_span fleft">
                          <dl>
                            <dd style="color: #146500;">{{$task->slug}}</dd>
                            <dd style="color: #146500;">已参与人次：{{$task->user_count}}</dd>
                          </dl>
                          <p>{!!$task->desc!!}</p>
                        </div>
                        <div class="mywork_schedule_content_main_btn fright">
                          <dl>
                            <dd>获得积分：<span style="color: #146500;">{{$task->score}}</span></dd>
                          </dl>
                        </div>
                      </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

@stop
