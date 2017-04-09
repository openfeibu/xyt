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
                <div class="b_he">
	                @include('users.identify.identify_nav')
                    <div style="margin-left: 50px;margin-top: 30px;">
	                    @if($real_name)
	                    <table cellspacing="0" cellpadding="0" class="formtable">
						<tbody><tr>
						<th style="width:10em;">状 态：</th>
						<td><font color="#009933"><strong>{!! trans("hifone.users.identify_status.$real_name->status") !!}</strong></font></td>
						</tr>
						<tr>
						<th>您的真实姓名：</th>
						<td>{{$real_name->realname}}</td>
						</tr>
						<tr>
						<th>身份证：</th>
						<td>
						<img src="{{$real_name->usercard}}" width="300" height="300">
						</td>
						<td>温馨提示：<br>身份证仅供管理员审核时查看，其他人士无法查看，本站会严格保护你个人隐私！ </td>
						</tr>
						</tbody></table>
						@else
                        <form method="post" action="{{ route('identify.nameStore') }}" class="c_form" enctype="multipart/form-data" >
                        	{{ csrf_field() }}
							<table cellspacing="0" cellpadding="0" class="formtable">
							<tbody><tr>
							<th style="width:10em;">您的真实姓名：</th>
							<td>
							<input type="text" id="realname" name="realname" value="" class="t_input">
							</td>
							</tr>
							<tr>
							<th>上传身份证：</th>
							<td>
							<input type="file" id="usercard" name="usercard"><br>
							(上传身份证为正面，格式只能为jpg,jpeg,gif,png，大小为500K内，身份证仅供管理员审核时查看，其他人士无法查看！)
							</td>
							</tr>
							<tr>
							<th>&nbsp;</th>
							<td>
							<input type="submit" name="submit" value="提交审核" class="btn-green-big" style="margin:0px;">
							</td>
							</tr>
							</tbody>
							</table>

						</form>
						@endif
						
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

	</div>
    <div class="clear"></div>


@stop