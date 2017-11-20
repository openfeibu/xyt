 @extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/interaction1.css') }}" type="text/css" rel="stylesheet" />
<div class="interaction">
        <div class="interaction_top">
            <div class="interaction_top_left fleft">
                <img src="{{get_ad_image('4')}}" alt=""  class="interaction_top_left_img" />
            </div>
            <div class="interaction_top_center fleft">
                <dl>
                    <dd class="interaction_top_center_tab">
                        <span style="cursor:pointer" onclick="getNewThreads()">最新话题</span>
                        <span style="cursor:pointer" onclick="getNewReplies()">最新回复</span>
                    </dd>
                    <div class="clear"></div>
					<div class="new_threads">
						@include('threads.partials.threads', ['column' => false])
					</div>
                </dl>
            </div>
            <div class="interaction_top_right fleft">
                <div class="interaction_hot_topic">
                    <img src="{{asset('images/index/xin.png')}}" alt="" class="interaction_hot_topic_img" />
                    <span>热门话题</span>
                </div>
                <div class="interaction_hot_topic_content">
                    <ul>
                        @foreach ($hot_threads as $k=>$thread)
                          @if($k<3)
                            <li style="margin-left:20px;">
                               <span class="interaction_hot_topic_top3">{{{$k+1}}}</span>
                               <a  style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin-top:10px;" href="{{ route('thread.show', [$thread->id]) }}" title="{{{ $thread->title }}}">
                                   {{{ $thread->title }}}
                               </a>
                           </li>
                           @else
                             <li style="margin-left:20px;">
                                <span class="interaction_hot_topic_other">{{{$k+1}}}</span>
                                <a  style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin-top:10px;" href="{{ route('thread.show', [$thread->id]) }}" title="{{{ $thread->title }}}">
                                    {{{ $thread->title }}}
                                </a>
                            </li>
                          @endif
                        @endforeach

                        @if(count($hot_threads)==0)
                           <div class="empty-block" style="margin-left:20px;margin-top:20px;">{{ trans('hifone.noitem') }}</div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>


        <!-- #################$sections######################################? -->

		@foreach($sections as $section_k=>$section)

			<div class="clear" style="height:50px;"></div>
			<div class="b_hf interaction_b_hf" style="border:0px">
				<ul>
					<li>{!! $section->name !!}</li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="interaction_content">
			<!-- **************** -->
				@foreach($node_all[$section_k] as $node_k=>$node)
				<!--@if($node_k<6)-->
				<div class="interaction_content_main" style="height:auto">
					<div class="interaction_content_main_left fleft">
						<img src="{{handle_image($node->icon,'node_img')}}" alt="" class="interaction_content_main_img fleft" />
					</div>
					<div class="interaction_content_main_right">
						<div class="interaction_content_main_right_dl">
							<dl>
								<dd><a href="{{ route('thread.node_content', $node->id)}}"><span style="color: #04B45F;font-size: 18px">
								{!! $node->name!!}
								</span></a><span style="color: red">
								<?php $count = 0?>
								(今日：
									@foreach($thread_in_nodes[$node_k] as $key => $thread_in_node)
										<?php $time = date("Y-m-d",strtotime($thread_in_node->created_at))?>
										@if($time == date("Y-m-d"))
											<?php $count++;?>
										@endif
									@endforeach
									{{$count}}
								)
								</span></dd>
								<dd>{!!$node->description!!}</dd>
							</dl>
						</div>
						<div class="interaction_content_main_right_ul" >
							<ul>
								<li>
								   &nbsp;&nbsp;&nbsp;已有&nbsp; <span style="color: red">{!! $node->member_count!!}</span> &nbsp;人加入
									&nbsp;&nbsp;话题：{!! $node->thread_count!!}，回帖：{!! $node->reply_count!!}
								</li>
								<li>&nbsp;&nbsp;&nbsp;最后发表：

								@foreach($thread_in_nodes[$node_k] as $key => $thread_in_node)
									<?php
										$max_time[$node_k][$key] = $thread_in_node->created_at;
									?>
								@endforeach
                                @if(isset($max_time[$node_k]) && $max_time[$node_k])
								{{friendlyDate(max($max_time[$node_k]))}}
                                @else
                                暂无
                                @endif
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--@endif-->

				@endforeach
				<div class="clear" style="height:50px;"></div>
		@endforeach
@stop


<script>
	function getNewReplies(){
		$.get("{{route('thread.getNewReplies')}}",function(data){
			commmon_thread(data);
		});
	}

	function getNewThreads(){
		$.get("{{route('thread.getNewThreads')}}",function(data){
			commmon_thread(data);
		});
	}

	function commmon_thread(data){
		var class_html = "";

		if(data.length != 0){
			class_html += '<dl style="margin-left:0px;">';
				for(var i=0;i<data.length;i++){
					class_html += '<dd>\
				       <img src="images/index/img9.jpg" alt="" style="margin-top:-10px;"/>\
				        <a target="_blank" style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:23px;" href="/thread/'+data[i].id+'" title="'+data[i].title+'">\
				            '+data[i].title+'\
				        </a>\
				    </dd>';
				}
			class_html += '</dl>';
		}else{
			class_html += '<div style="margin-left:20px;margin-top:20px;" class="empty-block">暂无话题</div>';
		}
		$('.new_threads').html(class_html);
	}
</script>
