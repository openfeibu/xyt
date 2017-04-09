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
                        <form method="post" action="{{route('identify.activity_email')}}" class="c_form">
	                        {!! csrf_field() !!}
							<table cellspacing="0" cellpadding="0" class="formtable">
							<tbody><tr>
							<th style="width:10em;">您的邮箱地址：</th>
							<td>
							<input type="text" id="email" name="email" value="{{$user->email}}" class="t_input">
							</td>
							</tr>
							<tr>
							<th>&nbsp;</th>
							<td>
							<input type="submit" name="submit" value="发送激活链接" class="submit"  style="background: #51B837;color: #fff;width: 120px;height: 30px;text-align: center;line-height: 30px;margin-top: 10px;border-radius: 5px;">
							</td>
							</tr>
							</tbody></table>
							<input type="hidden" name="emailsubmit" value="true">
						</form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

	</div>
    <div class="clear"></div>


@stop