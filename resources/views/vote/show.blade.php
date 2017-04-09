@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/vote.css') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/build/dist/js/jquery-browser.js') }}"></script>
<script src="{{ asset('/js/lang/public_zh-cn.js') }}"></script>
<script src="{{ asset('/js/lang/admin_zh-cn.js') }}"></script>
<script src="{{ asset('/js/jquery.atwho.js') }}"></script>
<script src="{{ asset('/js/jquery.form.js') }}"></script>
<script src="{{ asset('/js/common.js') }}"></script>
<script type="text/javascript" src = "{{ asset('/js/ui.core.js') }}"></script>
<script src="{{ asset('/js/core.js') }}"></script>
<script src="{{ asset('/js/module.js') }}"></script>
<script src="{{ asset('/js/module.common.js') }}"></script>
<script src="{{ asset('/js/weiba.js') }}"></script>
<script type="text/javascript" src = "{{ asset('/js/ui.draggable.js') }}"></script>
    <div class="vote">
        <div class="vote_top">
            <div class="vote_top_user">
	            <a href="{!! route('user.home', [$user->id]) !!}">
					<img src="{!! asset($user->avatar_url) !!}" class="fleft vote_top_user_img" alt=""  />
				</a>
                <div class="vote_top_user_span fleft">
                    <p>{{ $user->username }}的投票</p>
                    {!! $breadcrumb or '' !!}
                </div>
                <div class="fright vote_top_user_right">
                    <span style="font-size: 12px;"><a href="javascript:;" onclick="history.go(-1)"><<返回上一页</a></span>
                </div>
            </div>
            <div class="vote_top_span clear">
                <p>发起时间：{!! friendlyDate($vote->created_at) !!}</p>
                <p>参与人数：{{ $vote->vote_count }}人</p>
            </div>
        </div>

        <div class="vote_left fleft">
            <p style="text-align: center;">
                <img src="{{ asset('/build/dist/images/vote_img.png') }}" alt="" />
                <font style="font-size: 30px;">{{ $vote->subject }}</font><font style="font-size: 16px;">（最多选{{ $vote->maxchoice }}项）</font>
            </p>
            <p  style="color: #51B837;margin-left:90px;">{{ $vote->message }}</p>
            <div style="height: 30px;"></div>
            <form action="{{ route('vote.vote') }}" method="post">
	            <input type="hidden" name="vote_id" value="{{ $vote->id }}"/>
	            @foreach($vote_options as $key => $vote_option )
                <div class="vote_left_list">
                    <span class="vote_left_list_font">{{$vote_option->value}}：</span>
                    <div class="vote_left_line">
                        <div class="vote_strong" style="width: {{$vote_option->ratio}};" id="vote_strong{{$key}}"></div>
                    </div>
                    {{$vote_option->vote_count}}（{{$vote_option->ratio}}）@if(!$vote_user)<input @if($vote->maxchoice == 1) type="radio" @else   type="checkbox" onclick="checkSelect(this.checked)" @endif name="vote_option_id[]" style="height: 15px;width: 15px;" value="{{ $vote_option->id }}"/>@endif
                </div>
                @endforeach
                <div class="vote_left_submit ">
	                @if(!$vote_user)
                    <p style="text-align: right;"><input type="submit" id="submit" value="投票" /></p>
                    <p style="text-align: right;margin-right: 20px;"><input type="checkbox" value="匿名投票" />匿名投票</p>
                    @endif
                    <div class="vote_left_share left" >
                        <a href="javascript:;" onclick="showVoter('new');" id="newvoter" class="vote_left_share_span">最新投票</a>
                        <a href="javascript:;" onclick="showVoter('we');" id="wevoter" style="margin-left: 20px;">好友投票</a>
                   	</div>
                   	<div class="vote_right_share right">
                        <a href="#" class="jubaoshow">举报</a>|<a href="" style="color: orange">邀请好友</a>|<a href="http://www.jiathis.com/share" class="btn jiathis jiathis_txt jtico jtico_jiathis share" target="_blank">分享+</a>
                    </div>
                </div>
            </form>
			<div class="clearfix"></div>
            <div class="vote_comments">
	            <div id="showvoter">
	            	
               	</div>
                
            </div>
            
			{!! Widget::Reply([ 'tpl'=>'reply','post_id'=>$vote->id, 'post_user_id' => $vote->user_id, 'limit'=>'5', 'post_from'=>'vote','space_id'=>$vote->space_id,'addtoend'=>0 ]) !!}
            
        </div>
        <div class="vote_right fleft">
            <div class="vote_right_top">
                <span class="vote_right_top_new">最新投票</span>
            </div>
            <div class="vote_right_main">
                <dl>
	                @foreach($new_votes as $key => $vote)
                    <dd>
                        <img src="{{ asset('/build/dist/images/vote_new.png') }}" alt="" />
                        <span><a href="{{route('vote.show',$vote->id)}}">{{$vote->subject}}</a></span>
                    </dd>
                    @endforeach
                </dl>
            </div>

            <div class="vote_right_top">
                <span class="vote_right_top_new">最热投票</span>
            </div>
            <div class="vote_right_main">
                <dl>
	                @foreach($hot_votes as $key => $vote)
                    <dd>
                        <img src="{{ asset('/build/dist/images/vote_new.png') }}" alt="" />
                        <span><a href="{{route('vote.show',$vote->id)}}">{{$vote->subject}}</a></span>
                    </dd>
                    @endforeach
                </dl>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<script src="{{ asset('/build/dist/js/qqhideshow.js') }}" type="text/jscript"></script>
<script>
	
		var arr=['#FE6BBF','#3EDEF8','#32EB65','#BF66FE','#FE3F66','#7E99FE','#967BBE','#FEA50C','#7CD2F9','#03DB9C','#938E07','#EC0707','#FF6B23','#FFE502','#5DF800','#0086F8','#510AD3','#620090','#033909','#332C32'];
	    var i=0;
	    var num = $('.vote_left_list').size();
	    for(i = 0; i < num; i++){
	        var v_s='vote_strong'+i;
	        document.getElementById(v_s).style.background = arr[parseInt(Math.random()*20)];
	    }
	    var maxSelect = {{ $vote->maxchoice }};
		var alreadySelect = 0;
		function checkSelect(sel) {
			if(sel) {
				alreadySelect++;
				if(alreadySelect == maxSelect) {
					var oObj = document.getElementsByName("vote_option_id[]");
					for(i=0; i < oObj.length; i++) {
						if(!oObj[i].checked) {
							oObj[i].disabled = true;
						}
					}
				}
			} else {
				alreadySelect--;
				if(alreadySelect < maxSelect) {
					var oObj = document.getElementsByName("vote_option_id[]");
					for(i=0; i < oObj.length; i++) {
						if(oObj[i].disabled) {
							oObj[i].disabled = false;
						}
					}
				}
			}
		}
	
	
		function showVoter(filtrate) {
			$('#newvoter').attr('class','');
			$('#wevoter').attr('class','');
			$('#'+filtrate+'voter').attr('class','vote_left_share_span');
			if(filtrate = 'new'){
				url = "{{ route('vote.user_vote_list',['type' => 'new' ])}}" ;
			}else{
				url =" {{ route('vote.user_vote_list',['type' => 'we' ])}}" ;
			}
			var parameter = {'vote_id':{{ $vote->id }} };
			ajaxget(url, 'showvoter',parameter);
		}
		showVoter('new');
	    
</script>
<script type="text/javascript" src="{{ asset('/js/module.weibo.js') }}"></script>
@stop