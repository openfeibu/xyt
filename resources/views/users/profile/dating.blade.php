@extends('layouts.common')

@section('content')
<link href="{{ asset('build/dist/css/setting.css') }}" type="text/css" rel="stylesheet" />
    <div class="clear"></div>

        <div class="TA">
            <div class="b_ja">
                {!! $breadcrumb or '' !!}
            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class=" fleft">
                   	@include('users.setting_nav')
					@inject('formTypePresenter','Hifone\Presenters\FormTypePresenter')				
                  <div class="gexing_main" style="height: 700px;">
                      @include('users.profile.profile_nav')
                      <div class="dubai_main">
	                      <form action="{{ route('profile.dating_update') }}" method="post">
		                    {{ csrf_field() }}
                          <span><p>我们的隐私策略不允许在内心独白里填写QQ、Email、手机等个人隐私信息，请务必遵守！（20-1000字）</p></span>
                          <div class="dubai_main_span fleft">
                            内心独白：
                          </div>
                          <div class="dubai_main_text fleft">
                            <textarea name="aboutme">{{$aboutme}}</textarea>
                          </div>
                          <div class="clear"></div>
                          <p style="margin-top: 40px;">
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