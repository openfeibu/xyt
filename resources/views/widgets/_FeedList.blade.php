
@if(count($var ['data']))
@foreach ($var ['data'] as $vl)
<?php
	$sid = !empty($vl['app_row_id'])? $vl['app_row_id'] : $vl['id'];
?>

<dl class="space_content feed_list" model-node="feed_list" id="feed{{$vl['id']}}">
    <div class="space_content_top clear">
        <div class="fleft">
	       {!! $vl['title'] !!}
        </div>
        <div class="space_content_top_info fleft">
            <p class="hd">
	            {!! $vl['user_info']['user_data'] !!}
				<em class="hover right">

                    @if(Auth::id() == $vl['user_info']['id'] || Auth::user()->can("manage_spaces")) <a href="javascript:;" event-node="delFeed" event-args="space_id={{$vl['id']}}&uid={{$vl['user_info']['id']}}&type={{$vl['type']}}">删除</a>&nbsp;&nbsp;
                    @endif
        			@if(Auth::user()->can("manage_spaces"))
        				<a href="javascript:;" onclick="feed_recommend('{{$vl['id']}}');" id="recommend_{{$vl['id']}}">@if($vl['is_recommend'] == 1)取消推荐@else推荐@endif </a>
        			@endif
              	</em>
	        </p>
            <p>{!! $vl['body'] !!}</p>
        </div>
    </div>
    <div class="clear"></div>
   	<div class="feed_content">
	    <div class="space_content_main">

	    </div>
	    <div class="px10 clear"></div>
	    <div class="space_content_main_footer">
	        <span>{{friendlyDate($vl['created_at'])}} {{$vl['from']}}</span>
	        <span class="fright space_content_main_footer_right">
	            {!! Widget::Share(['sid'=>$sid,'stable'=>$vl['app_row_table'],'initHTML'=>'','current_table'=>'spaces','current_id'=>$vl['id'],'nums'=>$vl['repost_count'],'appname'=>$vl['app'],'cancomment'=>1,'feed_type'=>$vl['type'],'is_repost'=>$vl['is_repost']])!!} <i class="vline">|</i>
	            <a event-node="comment" href="javascript:void(0)" event-args="row_id={{$vl['id']}}&app_uid=&app_row_id={{$vl['app_row_id']}}&app_row_table={{$vl['app_row_table']}}&to_comment_id=0&to_uid=0&app_name={{$vl['app']}}&table=spaces&cancomment=1&cancomment_old=1">{{trans('public.PUBLIC_STREAM_COMMENT')}}
	            @if ($vl['comment_count']) ({{$vl['comment_count']}}) @endif</a>
	            <i class="vline">|</i>
	            {{ Widget::Digg(['space_id' => $vl['id'],'digg_count' =>$vl['digg_count'],'diggArr'=>$var['diggArr'] ])}}
	        </span>
	    </div>
	    <div class="clear"></div>
	    <div model-node="comment_detail" class="comment_detail repeat clearfix w690" style="display:none;"></div>
	</div>
</dl>
@endforeach
@endif
