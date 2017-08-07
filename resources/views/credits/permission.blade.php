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

                  <div class="gexing_main">
                      @include('credits.nav')
                      <div class="integra_main" >

                      </div>

                  </div>


        </div>
@stop
