 	<div class="space_content_top clear">
        <div class="fleft">
	        <a href="{{ route('user.home',[ $user_info['id'] ])}}" target="_blank">
            	<img src="{{ $user_info['avatar_url'] }}" alt="" class="space_content_top_photo" />
            </a>
        </div>
        <div class="space_content_top_info fleft">
            <p class="hd">{{ $user_info['username'] }}<span>（{{ $user_info['work'] }}/{{ $user_info['school'] }}）</span></p>
            <p>{!! $body !!}</p>
        </div>
    </div>
    <div class="clear"></div>
   	<div class="feed_content">
	    <div class="space_content_main">
	    </div>
	    <div class="px10 clear"></div>
	    <div class="space_content_main_footer">
	        <span>{{friendlyDate($created_at)}} {{$from}}</span>
	        <span class="fright space_content_main_footer_right">
		        <?php $sid = !empty($app_row_id)? $app_row_id : $id; ?>
	            {!! Widget::Share(['sid'=>$sid,'stable'=>$app_row_table,'initHTML'=>'','current_table'=>'spaces','current_id'=>$id,'nums'=>$repost_count,'appname'=>$app,'cancomment'=>1,'feed_type'=>$type,'is_repost'=>$is_repost])!!} <i class="vline">|</i>
	            <a event-node="comment" href="javascript:void(0)" event-args="row_id={{$id}}&app_uid=&app_row_id={{$app_row_id}}&app_row_table={{$app_row_table}}&to_comment_id=0&to_uid=0&app_name={{$app}}&table=spaces&cancomment=1&cancomment_old=1">{{trans('public.PUBLIC_STREAM_COMMENT')}}</a>
	            <i class="vline">|</i>
	            {{ Widget::Digg(['space_id' => $id,'digg_count' =>0,'diggArr'=>array() ] )}}
	        </span>
	    </div>
	    <div class="clear"></div>
	    <div model-node="comment_detail" class="comment_detail repeat clearfix w690" style="display:none;"></div>
	</div>
