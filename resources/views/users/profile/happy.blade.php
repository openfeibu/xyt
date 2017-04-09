@extends('layouts.common')

@section('content')
<link href="{{ asset('build/dist/css/setting.css') }}" type="text/css" rel="stylesheet" />
    <div class="clear"></div>

        <div class="TA">
            <div class="b_ja">
                {!! $breadcrumb or '' !!}
            </div>
            <div class="clear" style="height: 30px;"></div>
           		@if(!empty(Session::get('data')))
				<?php $data = Session::get('data');?>
				@endif 
               <div class=" fleft">
                   	@include('users.setting_nav')
					@inject('formTypePresenter','Hifone\Presenters\FormTypePresenter')			
                  <div class="gexing_main">
                      @include('users.profile.profile_nav')
                      <form action="{{ route('profile.happy_update')}}" method="post">
	                      {{ csrf_field() }}
                          <div class="xuanyan_main_content">
                            <p><span>结婚后你想要小孩吗：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b2',$data['b2']) !!}
                            </p>
                            <p><span>你愿意为爱情迁居别处吗：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b3',$data['b3']) !!}
                            </p>
                            <p><span>婚后你会承担多少家务：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b4',$data['b4']) !!}
                            </p>
                            <p><span>喜欢旅游吗：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b5',$data['b5']) !!}
                            </p>
                            <p><span>婚恋中双方的关系应该是：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b6',$data['b6']) !!}
                            </p>
                            <p><span>您的婚恋态度：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b7',$data['b7']) !!}
                            </p>
                            <p><span>您的经济状况：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b8',$data['b8']) !!}
                            </p>
                            <p><span>对方的家庭重要吗：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b9',$data['b9']) !!}
                            </p>
                            <p><span>您的消费观：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b10',$data['b10']) !!}
                            </p>
                            <p><span>你对现在工作的态度：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b11',$data['b11']) !!}
                            </p>
                            <p><span>你会打小孩吗：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b12',$data['b12']) !!}
                            </p>
                            <p><span>家庭卫生：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b13',$data['b13']) !!}
                            </p>
                            <p><span>你爱养宠物吗：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b14',$data['b14']) !!}
                            </p>
                            <p><span>是否允许异性密友：</span>
                                {!! $formTypePresenter->showSelect($happy_data,'b15',$data['b15']) !!}
                            </p>
                            <p><span>希望婚后的家庭关系：</span>
                                <input type="text"  name="b16" value="{{$data['b16']}}" />
                            </p>
                            <p><span>你觉得两个人相处最重要的是：</span>
                                <input type="text"  name="b17" value="{{$data['b17']}}" />
                            </p>
                            <p><span>你希望结婚后的生活圈：</span>
                                <input type="text"  name="b18" value="{{$data['b18']}}" />
                            </p>
                            <p><span>你最看重对方的：</span>
                                <input type="text"  name="b19" value="{{$data['b19']}}" />
                            </p>
                            <p style="margin-left: 350px;margin-top: 40px;">
                                <input type="submit" name="profilesubmit" value="保存" class="gexing_btn" style="width: 100px;" />
                                <input type="submit" name="nextsubmit" value="继续下一项" class="gexing_btn" style="width: 100px;"  />
                            </p>
                        </form>
                      
                      </div>
                      
                  </div>
                    
                         
        </div>
    </div>
    <div class="clear"></div>

@stop