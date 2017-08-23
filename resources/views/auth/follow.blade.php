@extends('layouts.register')

@section('content')
	<div class="b_l">
		<div class="b_k_reg">
			<div class="d_reg_2_head">
				<img src="{{ asset('/build/dist/images/reg3.jpg') }}" />
			</div>
            
			<div class="d_reg_3">
                <div class="d_reg_3_top">
                    <p class="fleft notice">关注本周之星</p><p class="fright"><input type="checkbox" name="ckall" class="ckall"/> 全部关注</p>
                </div>
                <div class="clear"></div>
                <form method="post" action="{{route('user.follow_submit')}}" id="test" name="">
            	<div class="d_reg_3_main">
	            	@foreach($users as $key => $user)
	            	
                    <div class="avatar_list_userblock">   
                        <table cellspacing="0" cellpadding="0" width="100%" class="avatar_list"> 
                        <tbody>
                        <tr>
                        <td align="center">
                        <div class="avatar_bg"><a href="#" class="link2user" target="_blank"><img src="{{$user->avatar}}?v={!!time()!!}"></a>
                        </div>
                        </td>
                        <td>
                        <span ><a href="{{route('user.home',$user->id)}}"  class="user_info" rel='{{$user->id}}' target="_blank" style="color: #1e8a4c">{{$user->username}}</a></span><br>
                        <span >{!! getAge($user->birthday) !!}岁&nbsp;{{ config('form_config.basic_data.education.value.'.$user->education)}}&nbsp;{{$user->work}}</span> <br>
                        <span >{{$user->school}}</span> 
                        </td>
                        </tr>
                        <tr><td align="center"><input type="checkbox"  name="uids[]" value="{{$user->id}}" /></td><td></td></tr>
                        </tbody>
                        </table>
                    </div>
                   	
                    @endforeach     
                </div>
                
                <div class="clear"></div>
                <div style="text-align:center" ><div><input name="dosubmit" class="nextbtn" value="注册，已完成" type="submit"></div></div>
                </form> 
            </div>
		</div>
	</div>

@stop
