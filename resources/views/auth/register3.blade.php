<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="" name="description" />
<meta content="" name="keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>象牙塔</title>
</head>
<link href="{{ asset('/build/dist/css/style.css') }}" type="text/css" rel="stylesheet" />
<script src="{{ asset('/build/dist/js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('/build/dist/js/choose.js') }}"></script>
<body>
<div class="all">
	<div class="head">
		<a href="index.html" class="logo"><img src="{{ asset('/build/dist/images/logo.jpg') }}" width="370" height="100" alt="" title="" /></a>
	</div>
	<div class="clear"></div>
	<div class="b_l">
		<div class="b_k_reg">
			<div class="d_reg_2_head">
				<img src="{{ asset('/build/dist/images/reg3.jpg') }}" />
			</div>
            <form name="" action="{{route('user.follow_submit')}}" method="post">
    			<div class="d_reg_3">
                    <div class="d_reg_3_top">
                        <p class="fleft notice">关注本周之星</p><p class="fright"><input type="checkbox" name="ckall" class="ckall"/> 全部关注</p>
                    </div>
                	<div class="d_reg_3_main">
                        @foreach($users as $key => $user)
                        <div class="avatar_list_userblock">
                            <table cellspacing="0" cellpadding="0" width="100%" class="avatar_list">
                            <tbody>
                            <tr>
                            <td align="center">
                            <div class="avatar_bg"><a href="{{route('user.home',$user->id)}}" class="link2user" target="_blank"><img src="{{$user->avatar}}"></a>
                            </div>
                            </td>
                            <td>
                            <span ><a href="space.php?uid=39300" target="_blank" style="color: #1e8a4c">{{$user->username}}</a></span><br>
                            <span >{!! getAge($user->birthday) !!}岁&nbsp;{{ config('form_config.basic_data.education.value.'.$user->education)}}&nbsp;{{$user->work}}</span> <br>
                            <span >暨南大学</span>
                            </td>
                            </tr>
                            <tr><td align="center"><input type="checkbox" name="uids[]" value="{{$user->id}}"/></td><td></td></tr>
                            </tbody>
                            </table>
                        </div>
                        @endforeach


                    </div>
                    <div class="clear"></div>
                    <div style="text-align:center" ><div><input name="dosubmit" class="nextbtn" value="注册，已完成" type="submit"></div></div>
                </div>
            </form>
		</div>
	</div>

    @include('layouts.footer')
</body>
</html>
