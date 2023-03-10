 @extends('layouts.common')

@section('title')
{{{ $user->username }}} {{ trans('hifone.users.info') }}_@parent
@stop

@section('content')
<link href="{{ asset('/build/dist/css/space.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('build/dist/css/myhomepage.css') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/build/dist/js/tab.js') }}"></script>
<script images/(\w+)\.jpgtype="text/javascript" src="{{ asset('/build/dist/js/choose.js') }}"></script>
<script src="{{ asset('/js/lang/public_zh-cn.js') }}"></script>
<script src="{{ asset('/js/lang/admin_zh-cn.js') }}"></script>
<script src="{{ asset('/js/jquery.form.js') }}"></script>
<script src="{{ asset('/js/common.js') }}"></script>
<script src="{{ asset('/js/core.js') }}"></script>
<script src="{{ asset('/js/module.js') }}"></script>
<script src="{{ asset('/js/module.common.js') }}"></script>
<script src="{{ asset('/js/jwidget_1.0.0.js') }}"></script>
<script src="{{ asset('/js/jquery.caret.js') }}"></script>
<script src="{{ asset('/js/ui.core.js') }}"></script>
<script src="{{ asset('/js/ui.draggable.js') }}"></script>
<script src="{{ asset('/js/plugins/core.digg.js') }}"></script>
<script src="{{ asset('/js/plugins/core.comment.js') }}"></script>
<script src="{{ asset('/js/plugins/core.message.js') }}"></script>
<script src="{{ asset('/js/jquery.atwho.js') }}"></script>
<script src="{{ asset('/js/weiba.js') }}"></script>

 <div class="clear"></div>
    <div style="height: 30px;"></div>
    <div class="TA">
        <div class="left_content">
            <img src="{!!$user->avatar!!}?v={!!time()!!}" width="227" height="227" alt=""/>
            <div style="text-align: center">
                <p>{!!$user->username!!}</p>
                <p>{{ $user->work }}/{{ $user->school }}</p>
                <!-- <div>
                    <img src="{{asset('images/index/mobile.png')}}" alt=""/>
                </div> -->
                <table>
                    <tr>
                        <td align="center" width="80">{{ $user->follower_count }}</td>
                        <td align="center" width="80">{{ $user->following_count }}</td>
                        <td align="center" width="80">{{ $user->view_count }}</td>
                    </tr>
                    <tr>
                        <td align="center">?????????</td>
                        <td align="center">??????</td>
                        <td align="center">??????</td>
                    </tr>
                </table>
                @if(Auth::id() == $user->id)
				<ul class="user_detail_ul">
					<li><a href="{{route('profile.base')}}"><i class="icon_account png"></i><span>{{$from_lang}}??????</span></a></li>
					<li><a href="{{route('pay.index')}}"><i class="icon_home png"></i><span>????????????</span></a></li>
            	</ul>
                @else

                <table class="table_2">
                    <tr>
                    <td align="left" width="80">
                        <a data-type="User" data-id="{{$user->id}}" data-url="{{route('follow.user',$user->id)}}" class="followbtn">
                            <img src="{{asset('images/index/jgz.png')}}"/> <br/>
                            <span class="follow_text">{{$follow_text}}</span>
                        </a>
                    </td>
                    <td align="center" width="80">
                        <!-- <a onclick="ui.sendmessage(2, 0)" href="javascript:void(0)" event-node="postMsg">
                            <img src="{{asset('images/index/fyj.png')}}" alt="??????"/> <br/>
                            ??????
                        </a> -->
                        <a  href="#wall" event-node="postMsg">
                            <img src="{{asset('images/index/fyj.png')}}" alt="??????"/> <br/>
                            ???TA??????
                        </a>
                    </td>
                    <td align="right" width="80">
                        <a href="javascript:ajaxgethtml('{{route('gift',['user_id' => $user->id])}}');" class="send_click">
                            <img src="{{asset('images/index/slw.png')}}" alt="????????????"/> <br/>
                            ????????????
                        </a>
                    </td>
                    </tr>
                </table>
				@endif
                <div style="height: 12px;"></div>
                <div class="hb" id="hongbao_show" style="width:210px;font-size:12px;">
                    <span></span>
                    <img src="{{asset('images/index/hb.png')}}" alt=""/>
                    ??????????????????????????????
                </div>

                <!-- ***********??????*************** -->
                <div class="clear"></div>
                    <div class="reward" id="hongbao" style="display: none;width: 600px;height: 550px;margin-left: 250px;margin-top:-300px;position: relative;" >
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                ?????????-???????????????????????????
                            </span>
                            <span id="hongbao_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="clear"></div>
                            {!! get_content(16,'body') !!}
                            <p class="reward_input">
                                <input type="radio" name="money" value="20" class="radio"/>20???
                                <input type="radio" name="money" value="50" class="radio"/>50???
                                <input type="text" name="money" value="" style="margin-right: 10px;" id="money"/>???
                            </p>
                            <p class="reward_input">
                                ????????????:
                                <input name="pay_id" type="radio" value="1" class="radio">???????????????
                                <input name="pay_id" type="radio" value="2" class="radio">????????????
                                <input type="submit" id="hongbao_submit" value="????????????" />
                            </p>
                            <div class="clear" style="height: 40px;"></div>
                            <div class="clear" style="text-align: left;margin-left: 5px;border-bottom: 2px #e2e1e1 dotted;height: 40px;line-height: 50px;"><h3>??????????????????????????????????????????????????????</h3></div>
                            @foreach($packet_users as $key => $packet_user)
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                {!!friendlyDate($packet_user->created_at)!!}  {{$packet_user->username}} ????????? {{$packet_user->money}}??????
                            </p>
                            @endforeach
                        </form>
                    </div>
                <!-- ***********??????*************** -->


                <div class="TA_dynamic" id="tab1s">
                    <ul>
                        <li id="tow1" onclick="setTab('tow',1)" class="off">{{$from_lang}}??????</li>
                        <li id="tow2" onclick="setTab('tow',2)">{{$from_lang}}??????</li>
                        <li id="tow3" onclick="setTab('tow',3)" style="margin-right: 0px;">{{$from_lang}}??????</li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="TA_dynamic2">
                    <div id="con_tow_1" class="TA_dynamic_div">
                        <ul>
                            @foreach($user_views as $key => $user_view)
                            <li><a href="{{route('user.home',$user_view->view_user_id)}}"><img src="{{$user_view->avatar}}" alt=""/></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="con_tow_2" class="TA_dynamic_div" style="display: none;">
                        <ul>
                            @foreach($user_viewings as $key => $user_viewing)
                            <li><a href="{{route('user.home',$user_viewing->user_id)}}"><img src="{{$user_viewing->avatar}}" alt=""/></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="con_tow_3" class="TA_dynamic_div" style="display: none;">
                        <ul>
	                        @foreach($followings as $key => $follow)
                            <li><a href="{{route('user.home',$follow->followable_id)}}"><img src="{{$follow->avatar}}" alt=""/></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="right_content">
            <div class="TA_top">
                <ul id="TA_top">
                    <li id="one21" onclick="setTab_t('one2',1,'TA_top')" class="off">
                        <img src="{{asset('images/index/TAimg_06.png')}}" alt="{{$from_lang}}??????"/>
                        <p>{{$from_lang}}??????</p>
                    </li>
                    <li id="one22" onclick="setTab_t('one2',2,'TA_top')">
                        <img src="{{asset('images/index/TAimg_03.png')}}" alt="{{$from_lang}}??????"/>
                        <p>{{$from_lang}}??????</p>
                    </li>
                    <li id="one23" onclick="setTab_t('one2',3,'TA_top')">
                        <img src="{{asset('images/index/TAimg_09.png')}}" alt="{{$from_lang}}??????"/>
                        <p>{{$from_lang}}??????</p>
                    </li>
                    <li id="one24"  style="margin-right: 0;" onclick="setTab_t('one2',4,'TA_top')">
                        <img src="{{asset('images/index/TAimg_11.png')}}" alt="{{$from_lang}}??????"/>
                        <p>{{$from_lang}}??????</p>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div id="con_one2_1" class="TA_bottom" style="display: block">
                 <ul id="TA_bottom1">
                     <li class="dynamic_nav_active"><a href="{{route('user.home',$user->id)}}">??????</a></li>
                     <li class="blog_li" onclick="showDynamic('blog')" >??????({{$blog_count}})</li>
                     <li class="activity_li" onclick="showDynamic('activity')">??????({{$activity_count}})</li>
                     <li class="space_li" onclick="showDynamic('space')">??????({{$space_count}})</li>
                     <li class="thread_li" onclick="showDynamic('thread')">??????({{$thread_count}})</li>
                     <li class="gift_li" onclick="showDynamic('gift')">??????({{$gift_count}})</li>
                     <li class="vote_li" onclick="showDynamic('vote')" >??????({{$vote_count}})</li>
                     <!-- <li onclick="showDynamic('repost')" style="margin-right: 0;">??????(0)</li> -->
                 </ul>
                <div class="clear"></div>
                <div id="con_tow2_1" class="TA_bottom_div" style="display: block;">
                    {{ Widget::FeedList($var) }}
                </div>
                <div  class="TA_bottom_div dynamic" id="dynamic">

                </div>

                <div class="clear"></div>
            </div>
            <div id="con_one2_2" class="TA_bottom">
           <!-- *********{{$from_lang}}??????************ -->
           <div class="my_data">
               <div class="my_data_top">
                   <span class="fleft" style="margin-left: 10px;">{{$user->username}}???ID???{{$user->id}}???
                   <!--<font style="color: #51B837">??????????????????</font>-->
                   </span>
                   <!--<span class="fright" style="margin-right: 10px;">???????????????<font style="color: red">?????????</font><font style="color: #51B837">????????????</font></span>-->

               </div>
               <div class="mydata_level">
                   <p>??????{{$user->view_count}}???????????????{{$user->score}}????????????{{$user->coin}}????????????</p>
                   <p>???????????????<font style="color: #51B837">{{$role->display_name}}</font></p>
                   <p>???????????????
                        @for ($i = 0; $i < $star['star']; $i++)
						    {!!handerStar(1)!!}
						@endfor
						@for ($i = 0; $i < 6 - $star['star']; $i++)
						    {!!handerStar(0)!!}
						@endfor

                   </p>
                   <p>???????????????{{$user->created_at}}</p>
                   <p>???????????????{{$user->last_login}}</p>
                   <p id="email_show">???????????????<span id="email">{{$user->email}}</span>
                   		@if(Auth::id() != $user->id)
                   		<a href="javascript:ajaxgethtml('{{route('card',['key' => 'email','user_id' => $user->id])}}');"><img src="{{asset('images/index/data_email.png')}}" alt="" />???????????????</a>
                   		@endif
                   </p>

                   <div class="clear"></div>

                   <p id="qq_show">QQ?????????<span id="qq">{{$user->qq}}</span>
                        @if(Auth::id() != $user->id)
                   		<a href="javascript:ajaxgethtml('{{route('card',['key' => 'qq','user_id' => $user->id])}}');"><img src="{{asset('images/index/data_qq.png')}}" alt="" />QQ?????????</a>
                   		@endif
                   </p>

                   <p id="wechat_show">???????????????<span id="weixin">{{$user->weixin}}</span>
                   		@if(Auth::id() != $user->id)
                   			<a href="javascript:ajaxgethtml('{{route('card',['key' => 'weixin','user_id' => $user->id])}}');"><img src="{{asset('images/index/data_wechat.png')}}" alt="" />???????????????</a>
                   		@endif

                   </p>
					<div class="clear"></div>

               </div>
               <div class="mydata_main">
                   <p class="mydata_main_nav"><a href="javascript:;" class="active">????????????</a><a href="javascript:;">????????????</a><a href="javascript:;">????????????</a><a href="javascript:;">????????????</a></p>
                    <div class="mydata_main_content" style="display:block;">
                       	<ul class="spacemenu_list">
    						<li><span class="font_z">?????????</span>{{$base_data['sex']['value'][$user->sex]}}</li>
    						<li><span class="font_z">?????????</span> {{getConstellation($user->birthday)}} </li>
    						<li><span class="font_z">?????????</span>{{$user->birthday}}</li>
    						@if($user->height)
    						<li><span class="font_z">?????????</span>{{$user->height}} ??????</li>
    						@endif
    						@if($user->blood)
    						<li><span class="font_z">?????????</span>{{$base_data['blood']['value'][$user->blood]}}</li>
    						@endif
    						@if($user->education)
    						<li><span class="font_z">?????????</span>{{$base_data['education']['value'][$user->education]}}</li>
    						@endif
    						<li><span class="font_z">?????????</span>{{$user->school}}</li>
    						@if($user->income)
    						<li><span class="font_z">?????????</span>{{$base_data['income']['value'][$user->income]}}</li>
    						@endif
    						@if($user->industry)
    						<li><span class="font_z">?????????</span>{{$user->industry}}</li>
    						@endif
    						@if($user->work)
    						<li><span class="font_z">?????????</span>{{$user->work}}</li>
    						@endif
    						@if($user->house)
    						<li><span class="font_z">?????????</span>{{$base_data['house']['value'][$user->house]}}</li>
    						@endif
    						@if($user->marriage)
    						<li><span class="font_z">?????????</span>{{$base_data['marriage']['value'][$user->marriage]}}</li>
    						@endif
    						@if($user->homeplace)
    						<li><span class="font_z">?????????</span>{{$user->homeplace}}</li>
    						@endif
    						@if($user->location)
    						<li><span class="font_z">?????????</span>{{$user->location}}</li>
    						@endif
    						@if($user->smoke)
    						<li><span class="font_z">???????????????</span>{{$base_data['smoke']['value'][$user->smoke]}}</li>
    						@endif
    						@if($user->drink)
    						<li><span class="font_z">???????????????</span>{{$base_data['drink']['value'][$user->drink]}}</li>
    						@endif
    						@if($user->weight)
    						<li><span class="font_z">?????????</span>{{$user->weight}}??????(KG)</li>
    						@endif
    						@if($user->bodytype)
    						<li><span class="font_z">?????????</span>{{$base_data['bodytype']['value'][$user->bodytype]}}</li>
    						@endif
    						@if($user->minority)
    						<li><span class="font_z">?????????</span>{{$base_data['minority']['value'][$user->minority]}}</li>
    						@endif
    						@if($user->religion)
    						<li><span class="font_z">?????????</span>{{$base_data['religion']['value'][$user->religion]}}</li>
    						@endif

    					</ul>
                    </div>
                    <div class="mydata_main_content monologue">
                        <p>
                           <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="{{ route('profile.dating') }}">??????</a></span>
                        </p>
                        <p style="color: #818181">@if($user_dating){{$user_dating->aboutme}}@endif</p>
                    </div>
                    <div class="mydata_main_content monologue">
                        <p>
                            <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="{{ route('profile.detail') }}">??????</a></span>
                         </p>
                         @if($user_detail)
     	                    @foreach($detail_data as $key => $value)
     		               	@if($user_detail->$key) <p><span class="font_z">{{$value['desc']}}???</span>{{$user_detail->$key}}</p>@endif
     		               	@endforeach
     	               	@endif
                    </div>
                    <div class="mydata_main_content monologue">
                        <p>
                            <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="{{ route('profile.happy') }}">??????</a></span>
                         </p>
                         @if($user_happy)
     	                    @foreach($happy_data as $key => $value)
     		               	@if($user_happy->$key)<p><span class="font_z">{{$value['desc']}}???</span>@if(isset($value['type']) && $value['type'] == 'select'){{$value['value'][$user_happy->$key]}}@else {{$user_happy->$key}} @endif </p>@endif
     		               	@endforeach
     	               	@endif
                    </div>
               </div>
           </div>
           <!-- *********{{$from_lang}}??????************ -->
            </div>
            <div id="con_one2_3" class="TA_bottom">
                <div class="my_photo">
                    <p>
                        <span class="fleft" style="margin-top: 20px;margin-left: 20px;">??????</span>
                        <span class="fright"  style="margin-top: 20px;margin-right: 10px;">
                            <a href="{{route('album.upload_common')}}" class="active">???????????????</a>
                        </span>
                    </p>
                    <div class="clear"></div>
                    <div class="showAlbums" id="showAlbums">

	                </div>
                </div>
            </div>
            <div id="con_one2_4" class="TA_bottom">
                <div class="my_require">
                    <div class="my_require_list">
                        <span class="fleft">????????????</span>
                        <a class="fright" href="{{route('profile.standard')}}" style="margin-left: 0px;margin-right: 20px;color: #51B837">??????</a>
                    </div>
                    @if($user_standard)

                    @if($user_standard->oplocation)
                    <div class="my_require_list">
                        <span class="fleft">???????????????{{$user_standard->oplocation}}</span>
                    </div>
                    @endif
                    @if($user_standard->opage)
                    <div class="my_require_list">
                        <span class="fleft">?????????{{$standard_data['opage']['value'][$user_standard->opage]}}???{{$standard_data['opage2']['value'][$user_standard->opage2]}}???</span>
                    </div>
                    @endif
                    @if($user_standard->opheight)
                    <div class="my_require_list">
                        <span class="fleft">?????????{{$user_standard->opheight}}???{{$user_standard->opheight2}}??????</span>
                    </div>
                    @endif
                    @if($user_standard->opmarriage)
                    <div class="my_require_list">
                        <span class="fleft">?????????{{$standard_data['opmarriage']['value'][$user_standard->opmarriage]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opeducation)
                    <div class="my_require_list">
                        <span class="fleft">?????????{{$standard_data['opeducation']['value'][$user_standard->opeducation]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opincome)
                    <div class="my_require_list">
                        <span class="fleft">????????????{{$standard_data['opincome']['value'][$user_standard->opincome]}}</span>
                    </div>
                    @endif
                   @if($user_standard->opwork)
                    <div class="my_require_list">
                        <span class="fleft">?????????{{$standard_data['opwork']['value'][$user_standard->opwork]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opsmoke)
                    <div class="my_require_list">
                        <span class="fleft">???????????????{{$standard_data['opsmoke']['value'][$user_standard->opsmoke]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opdrink)
                    <div class="my_require_list">
                        <span class="fleft">???????????????{{$standard_data['opsmoke']['value'][$user_standard->opdrink]}}</span>
                    </div>
                    @endif

                    @endif
                </div>

            </div>
            <div class="message_board" id="wall">
                    <div class="TA_bottom_title">
                        <span class="fleft span1">?????????</span>
                    </div>
                    <div class="clear"></div>
					{!! Widget::WallWidget([ 'tpl'=>'wall','post_id'=>$user->id, 'limit'=>'5','addtoend'=>0 ]) !!}
                </div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript" src="{{ asset('/js/home/module.home.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/module.weibo.js') }}"></script>
        <script type="text/javascript">
        function show_gift_info(id,experience,price,num,uid){
            window.sessionStorage.setItem('gift_id',id);
            $('#gift_radio'+id+'_'+uid).click();
            $('#gift_id'+uid).val($('#gift_radio'+id+'_'+uid).val());
            if($('#gift_radio'+id+'_'+uid).attr("checked")){
                $('.gift_select').css('border','2px #cbcbcb solid');
                $('.gift_select'+id).css('border','2px #51b837 solid');
            }
            $('.gift_experience').html(experience);
            $('.price').html(price);
            $('.gift_number').html(num);
        }

        function checkSubmit(id){
            var val=$('#gift_radio'+window.sessionStorage.getItem('gift_id')+'_'+id).val();

            if($('.send_number'+id).val() == "" || $('.send_number'+id).val() == 0){
                alert('?????????????????????0');
                return false;
            }else if(val == null){
                alert('?????????????????????');
                return false;
            }else{
                $.post("{{route('gift.sendGift')}}",'giftToUser='+$('#giftToUser').val()+'&gift_id='+window.sessionStorage.getItem('gift_id')+'&send_number='+$('.send_number'+id).val(),function(data){
                    window.sessionStorage.removeItem('gift_id');
                    if(data == 404){
                        alert('??????????????????~~~???????????????');window.location.reload();;
                    }else if(data == 403){
                        alert('????????????????????????');window.location.reload();;
                    }else if(data == 402){
                        alert('????????????????????????3???');window.location.reload();;
                    }else if(data == 200){
                        alert('??????????????????');window.location.reload();;
                    }else if(data == 400){
                        alert('??????????????????????????????');window.location.reload();;
                    }
                });
            }
        }
            $(function(){
                $('.send_click').click(function(){
                    $('.send').show();

                })
                $('.buto').click(function(){
                    $('.send').hide();

                })
            })
			$('#reward_show').click(function(){
				$('#reward').show();
			});
			$('#reward_close').click(function(){
				$('#reward').hide();
			});
			$('#hongbao_show').click(function(){
				$('#hongbao').show();
			});
			$('#hongbao_close').click(function(){
				$('#hongbao').hide();
			});
			$('#email_show').click(function(){
				$('#email').show();
			});
			$('#email_close').click(function(){
				$('#email').hide();
			});
			$('#qq_show').click(function(){
				$('#qq').show();
			});
			$('#qq_close').click(function(){
				$('#qq').hide();
			});
			$('#wechat_show').click(function(){
				$('#wechat').show();
			});
			$('#wechat_close').click(function(){
				$('#wechat').hide();
			});

        </script>
	</div>
    <div class="clear"></div>
    <script>
	    function showDynamic(filtrate) {
		    $(".TA_bottom_div").hide();
		    $(".dynamic").show();
            $("#TA_bottom1").find("li").removeClass("dynamic_nav_active");
            $("#TA_bottom1").find("."+filtrate+"_li").addClass("dynamic_nav_active");

			url = "{{ route('user.dynamic')}}" ;
			var parameter = {'type': filtrate ,'user_id':{{$user->id}}};
			ajaxget(url, 'dynamic',parameter,function(){
                setTimeout(function(){M($('[model-node="feed_list"]').get(0))},0)
            });

		}
		$("#one23").click(function(){
			ajaxget('/album/albumAjax?user_id={{$user->id}}', 'showAlbums');
		});
        $(".mydata_main_nav a").click(function(){
            var index = $(this).index();
            console.log($(this).index());
            $(this).addClass('active').siblings().removeClass('active');
            $(".mydata_main_content").hide();
            $(".mydata_main_content:eq("+index+")").show();
        });
        $("#money").focus(function(){
            $("input[name='money']").removeAttr("checked");
        });
        $("#hongbao_submit").click(function(){
            var pay_id = $('input:radio[name="pay_id"]:checked').val();
            if(pay_id == null)
            {
                layer.msg("?????????????????????");
                return false;
            }
            var money = parseInt($("input[name='money']:checked").val());
            if(!money){
                var money = parseInt($('#money').val());
            }
            if(!money)
            {
                layer.msg("???????????????");
                return false;
            }
            $.ajax({
    			type: 'POST',
    			url: "{{ route('send_red_packet') }}",
    			data: {money:money,pay_id:pay_id},
    			dataType: 'json',
    			success: function(data){
                    if(data.code == 210)
                    {
                        window.location.href = data.url;
                    }else{
                        layer.msg(data.message,{icon:5});
                    }

                }
            });
        });
	</script>
@stop
