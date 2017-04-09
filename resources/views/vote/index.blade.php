@extends('layouts.common')

@section('content')
	<link href="{{ asset('/build/dist/css/vote.css') }}" type="text/css" rel="stylesheet" />
        <div class="TA">
            <div class="b_ja">
                <img src="{{ asset('/build/dist/images/votelogo.png') }}" alt="" /><span style="color: #146500;font-size: 16px;">投票</span>
            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class="vote_list">
                   <div class="b_hf" >
                      	@include('vote.nav')
                  </div>

                  <div class="vote_main">
                      <!--<p>范围：<a href="">全部</a> | <a href="" style="color: #51B837 ">本周最热</a>  | <a href="">本月最热</a></p>-->
						@foreach($votes as $k => $vote)
                      	<div class="vote_main_list">
                          <div class="vote_list_user fleft">
	                        <a href="{{route('user.home',$vote->user_id)}}">
                            <img src="{{$vote->user->avatar}}" style="border: 1px #e2e1e1 solid;width: 80px;height: 80px;" alt="" />
                            <p style="width: 80px;">adasd</p>
                          </div>
                          <div class="vote_list_info fleft">
                              <dl>
                                  	<dd>{{$vote->subject}}</dd>
                                  	<?php $i=1;?>
                                   	@foreach($vote->vote_options as $key => $vote_option )
                                   	@if($i<=2)
					                <dd><input @if($vote->maxchoice == 1) type="radio" @else   type="checkbox" onclick="checkSelect(this.checked)" @endif name="vote_option_id[]" style="height: 15px;width: 15px;" value="{{ $vote_option->id }}"/>{{$vote_option->ratio}}</dd>
					                @endif
					                <?php $i++;?>
					                @endforeach
                                  	<dd><font style="color: #aaa;">{{friendlyDate($vote_option->created_at)}}</font> | <a href="" style="color: #51B837 ">评论（{{$vote->reply_count}}）</a></dd>
                              </dl>
                          </div>
                          <div class="vote_list_right fright" >
                              <div class="vote_list_join">
                                <p>&nbsp;</p>
                                <p>{{$vote->user_count}}</p>
                                <p>人参与</p>
                              </div>
                              <div class="vote_list_vote">
                                <p><a href="{{route('vote.show',$vote->id)}}">>去投票</a></p>
                              </div>
                          </div>
                     	</div>
						@endforeach
                      {!!with(new \Hifone\Foundations\Pagination\CustomerPresenter($votes))->render()!!}



                  </div>
                   
               </div>
                    
                         
        </div>
    </div>
@stop