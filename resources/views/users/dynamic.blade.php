<div>
    <span class="fleft span1">{{trans('hifone.users.dynamic.'.$type)}}（共{{$count}}篇）</span>
    <!--<span class="fright span2"><a href="" style="color: #51B837">全部</a></span>-->
</div>
<div id=""></div>
<div class="clear" style="height: 10px;border-bottom: 2px #e2e1e1 solid"></div>
@if($type == 'activity')
@foreach($datas as $data)
<div class="my_gift" style="height: 100px;">
    <p style="margin-top: 20px;">
        <span class="fleft" style="color: #818181"><a href="{{$data->url}}" style="color: #51B837" target="_blank">{{$data->name}}</a>[{{$data->cate}}]</span>
        <span class="fright">{{$data->time_desc}}</span>
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
<div class="my_gift" style="color: #818181">
    <p style="margin-top: 20px;">
        <span class="fleft"><a href="{{$data->url}}" style="color: #51B837" target="_blank">{!!$data->title!!}</a></span>
        <span class="fright">{{$data->created_at}}</span>
    </p>
    <div class="clear"></div>
</div>
<div class="clear"></div>
@endforeach
@endif
