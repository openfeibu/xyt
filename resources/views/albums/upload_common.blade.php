@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/album.css') }}" type="text/css" rel="stylesheet" />
<script src="{{ asset('/build/dist/js/jquery.uploadify.js') }}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/build/dist/css/uploadify.css') }}">
<div class="clear"></div>
    <div class="TA">
        <div class="b_ja">
            <img src="{{ asset('images/photologo.png') }}" alt="" /><span style="color: #aaa;font-size: 16px;">相册</span>
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf" style="width: 600px;">
                    <ul>
                        <li class="select" style="color: #146500;">普通上传</li>
                        <li class="creat_photo_btn" id="creat_photo_show" style=" border-bottom: 1px #e2e1e1 solid;background: #76D15F;font-size: 18px;color: #fff;height: 35px;line-height: 35px;">+创建相册</li>
                    </ul>
                </div>
                <!-- *********创建相册**************** -->
                <div class="creat_photo_div" id="creat_photo" style="display: none;">
                    <div class="creat_photo_div_top">
                        <span class="fleft" style="margin-left: 20px;">
                            创建相册
                        </span>
                        <span id="creat_photo_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                    </div>
                    <form action="{{route('album.upload_common_handle')}}" method="post">
                        <p style="margin-top: 50px">相册名称：<input type="text" name="name" id="name" value="" class="input_text" /> 0/30</p>
                        <p>相册描述：<textarea name="desc" id="desc"></textarea> 0/200</p>
                        <!--<p>主题：
                            <input type="radio" class="input_radio" name="theme" value="1" checked/> 普通
                            <input type="radio" class="input_radio" name="theme" value="2" /> 校友
                            <input type="radio" class="input_radio" name="theme" value="3" /> 旅游
                        </p>-->
                        <p><input type="button" id="creat_photo_submit" name="creat_photo_submit" value="确定" /></p>
                    </form>
                </div>
                <!-- *********创建相册**************** -->
                <div class="batch_upload fleft" style="width: 598px;" >
                    <!--<p style="margin-left: 30px;margin-top: 10px;">
                        <a href="" style="color: #51b837;">照片</a> | 
                        <a href="">视频</a>
                    </p>
                    <div class="upload_classify">
                        <a href="" style="color: #51b837;margin-left: 10px;">普通上传</a>
                        <a href="" style="margin-left: 30px;">批量上传</a>
                    </div>
                    <p class="select_photo">选择图片</p>-->
                    <div class="prompt clear" >
                        <p style="color: red;">温馨提示：</p>
                        <p>您当前图片空间还剩余容量 10 MB</p>
                        <p>
                            <img src="{{ asset('images/add_space.png') }}" alt="" />
                            <a style="color: #51b837" id="buy_add_show">我要增加空间</a>
                            （您可以购买道具"附件增容卡"来增加附件容量上传更多的图片）
                        </p>
                    </div>
                    
                    <div class="select_upload">
                        <div class="select_upload_content">
                            <p>从电脑中选择您要上传的图片。</p>
                            <p>提示：按住 ctrl 可多选，最多选十张 </p>
                            <p>上传到:
                                <select name="album_id" id="album_select">
	                                @foreach ($albums as $album)
									    <option value="{{ $album->id }}">{{ $album->name }}</option>
									@endforeach                          
                                </select>
                            </p>
                            <p><input type="file" name=""  value="" id="file_upload"/></p>
                            <p>
                            	<a href="javascript:$('#file_upload').uploadify('upload','*');" class="btn-green-big " style="margin-left: 0px;" ><span>上传</span></a>
                            	<!--<a href="javascript:$('#file_upload').uploadify('stop')" class="btn-green-big " style="margin-left: 20px;" ><span>取消上传</span></a>--> 
                            </p>
                        </div>
                    </div>
                    <p class="my_classify">
                        <span>最爱</span>22个
                    </p>
                    <div class="my_classify_photo">
                        <div class="my_classify_list">
                            <dl>
                                <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                                <dd class="my_classify_list_send">转</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="my_classify_photo">
                        <div class="my_classify_list">
                            <dl>
                                <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                                <dd class="my_classify_list_send">转</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="my_classify_photo">
                        <div class="my_classify_list">
                            <dl>
                                <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                                <dd class="my_classify_list_send">转</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="my_classify_photo">
                        <div class="my_classify_list">
                            <dl>
                                <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                                <dd class="my_classify_list_send">转</dd>
                            </dl>
                        </div>
                    </div>
                    
                    <!-- *********附件增容卡**************** -->
                   <div class="clear"></div>
                    <div class="reward" id="buy_add" style="display: none;width: 500px;height: 350px;margin-left: 300px;margin-top: -300px;">
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                购买道具
                            </span>
                            <span id="buy_add_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="{{ asset('images/buy_add.png') }}" alt="" />
                            </div>
                            <div class="email_right fleft" style="font-size: 13px;">
                                <p>附件增容卡</p>
                                <p style="color: #828282">使用一次，可以给自己增加5M的附件空间</p>
                                <p>增加经验：<font style="color: #51B837;">2</font></p>
                                <p>道具单价：<font style="color: #51B837;">500</font>象牙币</p>
                                <p>现有库存：<font style="color: #51B837;">999</font>个</p>
                                <p class="email_right_input">购买数量 <input type="text" name="" /> 个（当前最多可以购买0个）</p>
                                <p><input type="submit" name="buy_add_card" id="buy_add_card" value="购买" style="border-radius: 3px;margin-top: 20px;width: 80px;height: 30px;text-align: center;line-height: 30px;background: #51b837;color: #fff;" /></p>
                            </div>
                        </form> 
                    </div>
                    <!-- *********附件增容卡**************** -->
                </div>
                <div class="recently_visitor fleft">
                    <div class="recently_visitor_top">
                        <span>最近访客</span>
                        <font>访客总数：200</font>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                    <div class="recently_visitor_list">
                        <dl>
                            <dd><img src="{{ asset('images/TAhphoto.png') }}" alt="" /></dd>
                            <dd>asdasa</dd>
                            <dd>12小时前</dd>
                        </dl>
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
    <div class="clear"></div>
    </div>
<script>
    $('#describe').click(function() {
        $(this).removeAttr('readOnly');
        $(this).css('border','1px #e2e1e1 solid');
    });
    $('#describe').mouseleave(function() {
        $(this).attr("readonly","readonly");
        $(this).css('border','0');
    });
    $('#creat_photo_show').click(function(){
        $('#creat_photo').show();
    });
    $('#creat_photo_close').click(function(){
        $('#creat_photo').hide();
    });
    $('#buy_add_show').click(function(){
        $('#buy_add').show();
    });
    $('#buy_add_close').click(function(){
        $('#buy_add').hide();
    });
    $(function(){
	    $("#creat_photo_submit").click(function(){
		    var name = $("#name").val();
		    var desc = $("#desc").val();
		    //var theme = $("input[name='theme']").val();
			$.ajax({
				type: "POST",
				url: "{{ route('album.store') }}",
				data: {name:name, desc:desc},
				dataType: "json",
				success: function(data){
					alert(data.message);
				}
			});
	    });

		$('#file_upload').uploadify({
			'formData'     : {
				'csrf_token'     : '{{ csrf_token() }}',
				'album_id' : ''+$("#album_select option:selected").val()+'',
			},
			'swf'      : "{{ asset('/build/dist/images/uploadify.swf') }}",
			'uploader' : "{{ route('album.upload_common_handle') }}",
			'auto' : false,
			'fileSizeLimit' : '1MB',
			'cancelImg'      : "{{ asset('/build/dist/images/uploadify-cancel.png') }}", 
			'file_queue_limit' : 5,		
			'onUploadStart': function (file) {  
				$("#file_upload").uploadify("settings", "formData", { 'album_id': $("#album_select option:selected").val() }); 
			},
			'onUploadSuccess' : function(file, data, response) {
				var data = eval("(" + data + ")"); 
				if(data.code != 200){
					$('#file_upload').uploadify('stop','*');
					alert(data.error);
				}else{
					location.href = data.url;
				}
	            
	        },
	        'onUploadError' : function(file, errorCode, errorMsg, errorString){
		        location.href = "{{ route('auth.login')}}"
	        }
		});

    });
</script>
    @stop
