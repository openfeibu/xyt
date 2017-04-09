@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/setting.css') }}" type="text/css" rel="stylesheet" />
        <div class="TA">
	        <div class="b_ja">
            {!! $breadcrumb or '' !!}
            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class=" fleft">
                  @include('users.setting_nav')

                  <div class="gexing_main" style="height: 550px;">
                      @include('credits.nav')
                      <div class="integra_main" >
                          <p>
                              <div class="fleft"><span>资产值：</span><font style="color: #51B837 ">{{$user->experience}}</font> <img src="./images/grade1.png" alt="" /></div>
                              <div class="clear"></div>
                              <div class="integra" style="margin-left: 146px;">
                                  <p>图标等级有低到高为：
                                  @foreach($roles as $key => $role)
                                  	<img src="{{$role->image}}" alt="{{$role->display_name}}" />
                                  @endforeach
                                  </p>  
                              </div>
                              <div class="clear"></div>
                          </p>
                          <p><span>用户组：</span>{{$role->display_name}}</p>
                          <p><span>积分数：</span><img src="./images/money.png" alt="" />
                          <font style="color: #51B837 ">{{$user->score}}</font><a href="{{route('user.rank',['type' => 'score'])}}"><font style="color: #818181 ">（查看排名）</font></a></p>
                          <p><span>访问量：</span>{{$user->view_count}}<a href="{{route('user.rank',['type' => 'score'])}}"><font style="color: #818181 ">（查看排名）</font></a></p>
                          <p><span>创建时间：</span>{{$user->created_at}}</p>
                          <p><span>上次登录：</span>{{friendlyDate($user->last_login)}}</p>
                          <p><span>空间容量：</span>最大空间{{$role->capacity}}MB，已用0B（0%）</p>
                      </div>
                      
                  </div>
                    
                         
        </div>
@stop

