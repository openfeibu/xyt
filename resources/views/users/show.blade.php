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
                        <td align="center">被关注</td>
                        <td align="center">关注</td>
                        <td align="center">访问</td>
                    </tr>
                </table>
                @if(Auth::id() == $user->id)
				<ul class="user_detail_ul">
					<li><a href="{{route('profile.base')}}"><i class="icon_account png"></i><span>{{$from_lang}}设置</span></a></li>
					<li><a href="{{route('pay.index')}}"><i class="icon_home png"></i><span>积分充值</span></a></li>
            	</ul>
                @else

                <table class="table_2">
                    <tr>
                    <td align="left" width="80">
                        <a data-type="User" data-id="{{$user->id}}" data-url="{{route('follow.user',$user->id)}}" class="followbtn">
                            <img src="{{asset('images/index/jgz.png')}}"/> <br/>
                            <span class="follow_text">加为关注</span>
                        </a>
                    </td>
                    <td align="center" width="80">
                        <!-- <a onclick="ui.sendmessage(2, 0)" href="javascript:void(0)" event-node="postMsg">
                            <img src="{{asset('images/index/fyj.png')}}" alt="发信"/> <br/>
                            发信
                        </a> -->
                        <a  href="#wall" event-node="postMsg">
                            <img src="{{asset('images/index/fyj.png')}}" alt="留言"/> <br/>
                            给TA留言
                        </a>
                    </td>
                    <td align="right" width="80">
                        <a href="javascript:ajaxgethtml('{{route('gift',['user_id' => $user->id])}}');" class="send_click">
                            <img src="{{asset('images/index/slw.png')}}" alt="赠送礼物"/> <br/>
                            赠送礼物
                        </a>
                    </td>
                    </tr>
                </table>
				@endif
                <div style="height: 12px;"></div>
                <div class="hb" id="hongbao_show" style="width:210px;font-size:12px;">
                    <span></span>
                    <img src="{{asset('images/index/hb.png')}}" alt=""/>
                    给象牙塔网站埋个红包
                </div>

                <!-- ***********红包*************** -->
                <div class="clear"></div>
                    <div class="reward" id="hongbao" style="display: none;width: 600px;height: 550px;margin-left: 250px;margin-top:-300px;" >
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                象牙塔-高校单身校友大联盟
                            </span>
                            <span id="hongbao_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="clear"></div>
                            <p style="text-align: center">给XXX的一封信</p>
                            <p style="text-align: left;margin-left: 5px;">Hi</p>
                            <p style="text-align: left;margin-left: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;爱速度就奥斯卡阿萨德啊实打实的asf ；啥看法是joas啊实打实的assaa送还好几个客户应根据公开科技馆加工费分复古风格好和规范化</p>
                            <br />
                            <p style="text-align: left;margin-left: 5px;">
                                <img src="{{asset('images/index/wechat.png')}}" alt="" />
                                <dl>
                                    <dd>微信联谊公众号：1233123123</dd>
                                    <dd>联谊活动QQ：1232323123</dd>
                                </dl>
                            </p>
                            <p class="reward_input">
                                <input type="radio" name="money" value="20" class="radio"/>20元
                                <input type="radio" name="money" value="50" class="radio"/>50元
                                <input type="text" name="money" value="" style="margin-right: 10px;" id="money"/>元
                            </p>
                            <p class="reward_input">
                                支付方式:
                                <input name="pay_id" type="radio" value="1" class="radio">支付宝支付
                                <input name="pay_id" type="radio" value="2" class="radio">微信支付
                                <input type="submit" id="hongbao_submit" value="埋个红包" />
                            </p>
                            <div class="clear" style="height: 40px;"></div>
                            <div class="clear" style="text-align: left;margin-left: 5px;border-bottom: 2px #e2e1e1 dotted;height: 40px;line-height: 50px;"><h3>感谢下列朋友对象牙塔网站的大力支持：</h3></div>
                            @foreach($packet_users as $key => $packet_user)
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                {!!friendlyDate($packet_user->created_at)!!}  {{$packet_user->username}} 打赏了 {{$packet_user->money}}元。
                            </p>
                            @endforeach
                        </form>
                    </div>
                <!-- ***********红包*************** -->


                <div class="TA_dynamic" id="tab1s">
                    <ul>
                        <li id="tow1" onclick="setTab('tow',1)" class="off">{{$from_lang}}来访</li>
                        <li id="tow2" onclick="setTab('tow',2)">{{$from_lang}}足迹</li>
                        <li id="tow3" onclick="setTab('tow',3)" style="margin-right: 0px;">{{$from_lang}}关注</li>
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
                        <img src="{{asset('images/index/TAimg_06.png')}}" alt="{{$from_lang}}动态"/>
                        <p>{{$from_lang}}动态</p>
                    </li>
                    <li id="one22" onclick="setTab_t('one2',2,'TA_top')">
                        <img src="{{asset('images/index/TAimg_03.png')}}" alt="{{$from_lang}}资料"/>
                        <p>{{$from_lang}}资料</p>
                    </li>
                    <li id="one23" onclick="setTab_t('one2',3,'TA_top')">
                        <img src="{{asset('images/index/TAimg_09.png')}}" alt="{{$from_lang}}照片"/>
                        <p>{{$from_lang}}照片</p>
                    </li>
                    <li id="one24"  style="margin-right: 0;" onclick="setTab_t('one2',4,'TA_top')">
                        <img src="{{asset('images/index/TAimg_11.png')}}" alt="{{$from_lang}}要求"/>
                        <p>{{$from_lang}}要求</p>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div id="con_one2_1" class="TA_bottom" style="display: block">
                 <ul id="TA_bottom1">
                     <li ><a href="{{route('user.home',$user->id)}}">全部</a></li>
                     <li onclick="showDynamic('blog')" >日志({{$blog_count}})</li>
                     <li onclick="showDynamic('activity')">活动({{$activity_count}})</li>
                     <li onclick="showDynamic('space')">说说({{$space_count}})</li>
                     <li onclick="showDynamic('thread')">话题({{$thread_count}})</li>
                     <li onclick="showDynamic('gift')">礼物({{$gift_count}})</li>
                     <li onclick="showDynamic('vote')" >投票({{$vote_count}})</li>
                     <!-- <li onclick="showDynamic('repost')" style="margin-right: 0;">分享(0)</li> -->
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
           <!-- *********{{$from_lang}}资料************ -->
           <div class="my_data">
               <div class="my_data_top">
                   <span class="fleft" style="margin-left: 10px;">{{$user->username}}（ID：{{$user->id}}）
                   <!--<font style="color: #51B837">在线（现在）</font>-->
                   </span>
                   <!--<span class="fright" style="margin-right: 10px;">恋爱状态：<font style="color: red">寻觅中</font><font style="color: #51B837">（更新）</font></span>-->

               </div>
               <div class="mydata_level">
                   <p>已有{{$user->view_count}}人次访问，{{$user->score}}个积分，{{$user->coin}}个象牙币</p>
                   <p>用户组别：<font style="color: #51B837">{{$role->display_name}}</font></p>
                   <p>诚信星级：
                        @for ($i = 0; $i < $star['star']; $i++)
						    {!!handerStar(1)!!}
						@endfor
						@for ($i = 0; $i < 6 - $star['star']; $i++)
						    {!!handerStar(0)!!}
						@endfor

                   </p>
                   <p>创建时间：{{$user->created_at}}</p>
                   <p>上次登录：{{$user->last_login}}</p>
                   <p id="email_show">电子邮件：<span id="email">{{$user->email}}</span>
                   		@if(Auth::id() != $user->id)
                   		<a href="javascript:ajaxgethtml('{{route('card',['key' => 'email','user_id' => $user->id])}}');"><img src="{{asset('images/index/data_email.png')}}" alt="" />邮箱联络卡</a>
                   		@endif
                   </p>

                   <div class="clear"></div>

                   <p id="qq_show">QQ号码：<span id="qq">{{$user->qq}}</span>
                        @if(Auth::id() != $user->id)
                   		<a href="javascript:ajaxgethtml('{{route('card',['key' => 'qq','user_id' => $user->id])}}');"><img src="{{asset('images/index/data_qq.png')}}" alt="" />QQ联络卡</a>
                   		@endif
                   </p>

                   <p id="wechat_show">微信号码：<span id="weixin">{{$user->weixin}}</span>
                   		@if(Auth::id() != $user->id)
                   			<a href="javascript:ajaxgethtml('{{route('card',['key' => 'weixin','user_id' => $user->id])}}');"><img src="{{asset('images/index/data_wechat.png')}}" alt="" />微信联络卡</a>
                   		@endif

                   </p>
					<div class="clear"></div>

               </div>
               <div class="mydata_main">
                   <p class="mydata_main_nav"><a href="javascript:;" class="active">基本资料</a><a href="javascript:;">内心独白</a><a href="javascript:;">个性信息</a><a href="javascript:;">幸福宣言</a></p>
                    <div class="mydata_main_content" style="display:block;">
                       	<ul class="spacemenu_list">
    						<li><span class="font_z">性别：</span>{{$base_data['sex']['value'][$user->sex]}}</li>
    						<li><span class="font_z">星座：</span> {{getConstellation($user->birthday)}} </li>
    						<li><span class="font_z">生日：</span>{{$user->birthday}}</li>
    						@if($user->height)
    						<li><span class="font_z">身高：</span>{{$user->height}} 厘米</li>
    						@endif
    						@if($user->blood)
    						<li><span class="font_z">血型：</span>{{$base_data['blood']['value'][$user->blood]}}</li>
    						@endif
    						@if($user->education)
    						<li><span class="font_z">学历：</span>{{$base_data['education']['value'][$user->education]}}</li>
    						@endif
    						<li><span class="font_z">大学：</span>{{$user->school}}</li>
    						@if($user->income)
    						<li><span class="font_z">月薪：</span>{{$base_data['income']['value'][$user->income]}}</li>
    						@endif
    						@if($user->industry)
    						<li><span class="font_z">行业：</span>{{$user->industry}}</li>
    						@endif
    						@if($user->work)
    						<li><span class="font_z">职业：</span>{{$user->work}}</li>
    						@endif
    						@if($user->house)
    						<li><span class="font_z">住房：</span>{{$base_data['house']['value'][$user->house]}}</li>
    						@endif
    						@if($user->marriage)
    						<li><span class="font_z">婚姻：</span>{{$base_data['marriage']['value'][$user->marriage]}}</li>
    						@endif
    						@if($user->homeplace)
    						<li><span class="font_z">家乡：</span>{{$user->homeplace}}</li>
    						@endif
    						@if($user->location)
    						<li><span class="font_z">现居：</span>{{$user->location}}</li>
    						@endif
    						@if($user->smoke)
    						<li><span class="font_z">是否吸烟：</span>{{$base_data['smoke']['value'][$user->smoke]}}</li>
    						@endif
    						@if($user->drink)
    						<li><span class="font_z">是否喝酒：</span>{{$base_data['drink']['value'][$user->drink]}}</li>
    						@endif
    						@if($user->weight)
    						<li><span class="font_z">体重：</span>{{$user->weight}}公斤(KG)</li>
    						@endif
    						@if($user->bodytype)
    						<li><span class="font_z">体型：</span>{{$base_data['bodytype']['value'][$user->bodytype]}}</li>
    						@endif
    						@if($user->minority)
    						<li><span class="font_z">民族：</span>{{$base_data['minority']['value'][$user->minority]}}</li>
    						@endif
    						@if($user->religion)
    						<li><span class="font_z">宗教：</span>{{$base_data['religion']['value'][$user->religion]}}</li>
    						@endif

    					</ul>
                    </div>
                    <div class="mydata_main_content monologue">
                        <p>
                           <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="{{ route('profile.dating') }}">编辑</a></span>
                        </p>
                        <p style="color: #818181">@if($user_dating){{$user_dating->aboutme}}@endif</p>
                    </div>
                    <div class="mydata_main_content monologue">
                        <p>
                            <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="{{ route('profile.detail') }}">编辑</a></span>
                         </p>
                         @if($user_detail)
     	                    @foreach($detail_data as $key => $value)
     		               	@if($user_detail->$key) <p><span class="font_z">{{$value['desc']}}：</span>{{$user_detail->$key}}</p>@endif
     		               	@endforeach
     	               	@endif
                    </div>
                    <div class="mydata_main_content monologue">
                        <p>
                            <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="{{ route('profile.happy') }}">编辑</a></span>
                         </p>
                         @if($user_happy)
     	                    @foreach($happy_data as $key => $value)
     		               	@if($user_happy->$key)<p><span class="font_z">{{$value['desc']}}：</span>@if($value['type'] == 'select'){{$value['value'][$user_happy->$key]}}@else {{$user_happy->$key}} @endif </p>@endif
     		               	@endforeach
     	               	@endif
                    </div>
               </div>
           </div>
           <!-- *********{{$from_lang}}资料************ -->
            </div>
            <div id="con_one2_3" class="TA_bottom">
                <div class="my_photo">
                    <p>
                        <span class="fleft" style="margin-top: 20px;margin-left: 20px;">相册</span>
                        <span class="fright"  style="margin-top: 20px;margin-right: 10px;">
                            <a href="{{route('album.upload_common')}}" class="active">上传新图片</a>
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
                        <span class="fleft">择偶标准</span>
                        <a class="fright" href="{{route('profile.standard')}}" style="margin-left: 0px;margin-right: 20px;color: #51B837">编辑</a>
                    </div>
                    @if($user_standard)

                    @if($user_standard->oplocation)
                    <div class="my_require_list">
                        <span class="fleft">征友地区：{{$user_standard->oplocation}}</span>
                    </div>
                    @endif
                    @if($user_standard->opage)
                    <div class="my_require_list">
                        <span class="fleft">年龄：{{$standard_data['opage']['value'][$user_standard->opage]}}至{{$standard_data['opage2']['value'][$user_standard->opage2]}}岁</span>
                    </div>
                    @endif
                    @if($user_standard->opheight)
                    <div class="my_require_list">
                        <span class="fleft">身高：{{$user_standard->opheight}}至{{$user_standard->opheight2}}厘米</span>
                    </div>
                    @endif
                    @if($user_standard->opmarriage)
                    <div class="my_require_list">
                        <span class="fleft">婚姻：{{$standard_data['opmarriage']['value'][$user_standard->opmarriage]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opeducation)
                    <div class="my_require_list">
                        <span class="fleft">学历：{{$standard_data['opeducation']['value'][$user_standard->opeducation]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opincome)
                    <div class="my_require_list">
                        <span class="fleft">月收入：{{$standard_data['opincome']['value'][$user_standard->opincome]}}</span>
                    </div>
                    @endif
                   @if($user_standard->opwork)
                    <div class="my_require_list">
                        <span class="fleft">职业：{{$standard_data['opwork']['value'][$user_standard->opwork]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opsmoke)
                    <div class="my_require_list">
                        <span class="fleft">是否吸烟：{{$standard_data['opsmoke']['value'][$user_standard->opsmoke]}}</span>
                    </div>
                    @endif
                    @if($user_standard->opdrink)
                    <div class="my_require_list">
                        <span class="fleft">是否喝酒：{{$standard_data['opsmoke']['value'][$user_standard->opdrink]}}</span>
                    </div>
                    @endif

                    @endif
                </div>

            </div>
            <div class="message_board" id="wall">
                    <div class="TA_bottom_title">
                        <span class="fleft span1">留言板</span>
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
                alert('礼物数量不能为0');
                return false;
            }else if(val == null){
                alert('还没选择礼物呢');
                return false;
            }else{
                $.post("{{route('gift.sendGift')}}",'giftToUser='+$('#giftToUser').val()+'&gift_id='+window.sessionStorage.getItem('gift_id')+'&send_number='+$('.send_number'+id).val(),function(data){
                    window.sessionStorage.removeItem('gift_id');
                    if(data == 404){
                        alert('库存空空如也~~~换个礼物吧');window.location.reload();;
                    }else if(data == 403){
                        alert('数量不能大于库存');window.location.reload();;
                    }else if(data == 402){
                        alert('购买数量不得超过3个');window.location.reload();;
                    }else if(data == 200){
                        alert('赠送礼物成功');window.location.reload();;
                    }else if(data == 400){
                        alert('赠送礼物失败，请重试');window.location.reload();;
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
                layer.msg("请选择支付方式");
                return false;
            }
            var money = parseInt($("input[name='money']:checked").val());
            if(!money){
                var money = parseInt($('#money').val());
            }
            if(!money)
            {
                layer.msg("请输入金额");
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
