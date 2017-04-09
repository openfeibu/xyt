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
						<table cellspacing="0" cellpadding="0" class="listtable">
						<caption>
						<h2>普通用户组</h2>
						<p>随着您的资产值的提高，您的用户组所拥有的权限也会越多。</p>
						</caption>
						<tbody><tr class="title">
						<th width="150">用户组名</th>
						<td>资产值范围</td>
						</tr>
						@foreach($common_roles as $key => $role )
						<tr>
						<th><span>{{$role->display_name}}</span></th>
						<td>{{$role->min_experience}} ~ {{$role->max_experience}}</td>
						</tr>
						@endforeach
						</tbody></table>

						<table cellspacing="0" cellpadding="0" class="listtable">
						<caption>
						<h2>特殊用户组</h2>
						<p>不受资产值限制。</p>
						</caption>
						<tbody><tr class="title">
						<th width="150">用户组名</th>
						<td>资产值范围</td>
						</tr>
						@foreach($special_roles as $key => $role )
						<tr>
						<th><span style="color:red;">{{$role->display_name}}</span></th>
						<td>-</td>
						</tr>
						@endforeach
						</tbody></table> 
                      </div>
                      
                  </div>
                    
                         
        </div>
@stop

