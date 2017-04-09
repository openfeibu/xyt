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
	                    @if($user_education && $attr != 'resubmit' )
	                    <table cellspacing="0" cellpadding="0" class="formtable">
						<tbody><tr>
						<th style="width:10em;">状 态：</th>
						<td><font color="#009933"><strong>{!! trans("hifone.users.identify_status.$user_education->status") !!}</strong></font></td>
						</tr>
						<tr>
						<th>学历证书：</th>
						<td>
						<img src="{{$user_education->image}}" width="300" height="300">
						</td>
						<td></td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td>
							<a href="{{route('identify.education',['attr' => 'resubmit'])}}" class="btn-green-big" style="margin:0px;" >重新认证</a>
							</td>
						</tr>
						</tbody></table>
						@else
                        <form method="post" action="{{ route('identify.educationStore') }}" class="c_form" enctype="multipart/form-data" >
                        	{{ csrf_field() }}
							<table cellspacing="0" cellpadding="0" class="formtable">
							<tbody><tr>
							<tr>
							<th>上传学历证书：</th>
							<td>
							<input type="file" id="image" name="image"><br>
							(上传学历证书，格式只能为jpg,jpeg,gif,png，大小为500K以内)
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