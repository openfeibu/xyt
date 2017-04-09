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
                        <form method="post" action="{{route('user.validateMobile')}}" class="c_form">
	                        {!! csrf_field() !!}
							<table cellspacing="0" cellpadding="0" class="formtable">
							<tbody><tr>
							<th style="width:10em;">您的手机号：</th>
							<td>
								<input type="text" id="mobile" name="mobile" value="{{$user->mobile}}" class="t_input">&nbsp;&nbsp;&nbsp;<input type="button" id="sendcode" value="发送验证码" class="submit"><span id="sendmsg" ></span>
							</td>
							</tr>
							<tr>
							<th>验证码：</th>
							<td>
								<input type="text" id="code" name="code" value="" class="t_input">
							</td>
							</tr>

							<tr>
							<th>&nbsp;</th>
							<td>
								<input type="submit" name="submit" value="保存" class="submit">
							</td>
							</tr>
							</tbody></table>
						</form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

	</div>
    <div class="clear"></div>


@stop
