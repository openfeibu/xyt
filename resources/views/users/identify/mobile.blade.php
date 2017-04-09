@extends('layouts.common')

@section('content')

    <div class="clear"></div>
    <div class="TA">
        <div class="b_ja">
            {!! $breadcrumb or '' !!}
        </div>
        <div class="clear" style="height: 30px;"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                @include('users.setting_nav')
                <div class="b_he" >
	                @include('users.identify.identify_nav')
                    <div style="margin-left: 50px;margin-top: 30px;">
                        <form action="">
                            状态：<span style="color: #51B837;">已认证</span>
                            <p style="margin-top: 10px;">你的手机：{{$user->mobile}}</p>
                            <p style="margin-top: 10px;"><a href="{{route('identify.mobile',['type' => 'edit'])}}" class="submit">更换手机认证 </a></p>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

	</div>
    <div class="clear"></div>


@stop