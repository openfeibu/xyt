<div>
    <span class="fleft span1">{{trans('hifone.users.dynamic.'.$type)}}（共{{$count}}篇）</span>
    <!--<span class="fright span2"><a href="" style="color: #51B837">全部</a></span>-->
</div>
<div id=""></div>
<div class="clear" style="height: 10px;border-bottom: 2px #e2e1e1 solid"></div>
@if($type == 'activity')
@foreach($datas as $data)
<div class="my_gift dynamic_{{$data->id}}" style="height: 100px;">
    <div class="fleft">
        <p style="margin-top: 20px;">
            <span class="fleft" style="color: #818181"><a href="{{$data->url}}" style="color: #51B837" target="_blank">{{$data->name}}</a>[{{$data->cate}}]</span>
        </p>
        <div class="clear" style="height: 10px;"></div>
        <p>
            <span style="color: #818181;">
                活动时间：{{$data->begin_time}}
            </span>
        </p>
        <p class="clear" style="margin-top: 10px;">
            <span style="color: #818181">
                活动地点：{{$data->location}}
            </span>
        </p>
    </div>
    <div class="fright" style="margin-top: 20px;">
        <span >{{$data->time_desc}}</br>@if($data->user_id == Auth::user()->id)<a href="{{route('album.upload_common',['activity_id' =>$data->activity_id ])}}">添加照片</a></br><a href="{{route('activity.create_summary',['activity_id' => $data->activity_id])}}">添加活动总结</a></br><a href="{{route('activity.export_member',['activity_id' => $data->activity_id])}}">导出参与会员</a>@endif</span>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
@endforeach
@elseif($type == 'gift')
@foreach($datas as $data)
<div class="my_gift" >
    <p style="margin-top: 20px;">
        <span class="fleft">{!!$data->title!!}</span>
        <span class="fright">{{$data->created_at}}</span>
    </p>
    <div class="clear"></div>
</div>
<div class="clear"></div>
@endforeach
@else
@foreach($datas as $data)
<div class="my_gift dynamic_{{$data->id}}" style="color: #818181">
    <p style="margin-top: 20px;">
        <span class="fleft"><a href="{{$data->url}}" style="color: #51B837" target="_blank">{!!$data->title!!}</a></span>
        <a href="javascript:;" class="fright dynamic_del" onclick="dynamic_del('{{$type}}',{{$data->id}})">删除</a>
        <span class="fright">{{$data->created_at}}</span>
    </p>
    <div class="clear"></div>
</div>
<div class="clear"></div>
@endforeach
@endif
