@if($send_type =='send_space')
<div class="send_weibo diy-send-weibo" model-node="send_weibo" id="send_weibo">
    <div class="b_hr_title">
        <p class="p1">我们在倾听与分享此刻您的心情</p>
        <div class="p2">您还可以输入 <div color="red" size="4"  model-node="numsLeft" class="num" style="display: inline;">{{$initNums}}</div> 字</div>
    </div>
    <div class="com_form">
        
        {!! Form::open(['route' => 'space.store','id' => 'space_create_form','method' => 'post','model-node' => 'mini_editor']) !!}
            {!! Form::textarea('at',null,['id' => 'saytext' ,'class'=>'input_tips','event-node'=>'mini_editor_textarea','model-args'=>'t=feed']) !!}
          	<!--<div model-node="numsLeft" class="num">140</div>-->
            <div model-node="post_ok" style="display:none;text-align:center;position:absolute;left:0;top:70px;width:100%"> <i class="ico-ok"></i> 发布成功 </div>
        {!! Form::close() !!}
            <div class="action clearfix" model-node="send_action">
                <div class="kind">

                    <div class="fright release">  <a class="btn-green-big" event-node="post_feed" event-args="type=post&app_name=public&topicHtml=&channel=&isrefresh=" href="javascript:;"> <span>发布</span> </a> </div>
                	<div class="fleft attachbody acts">
							
                        <!--<span id="biaoqing" class="emotion" style="background:url(images/index/img51.jpg) no-repeat 0px;">表情
                        </span>-->

						<a event-node="insert_face" class="face-block" href="javascript:;" title="表情"> <img src="/images/index/img51.jpg" class="face">表情 </a>
						
                        <a  href="javascript:;" image-type="flash" event-node="insert_image" class="image-block"  rel="post_feed" title="图片"   style="background:url() no-repeat;width: 20px;" ><img src="/images/index/img52.jpg" class="image">图片</a>															
                        <div class="tips-img" style="display:none">
			                <dl>
			                  <dd> <i class="arrow-open"></i> jpg,png,gif,bmp,tif </dd>
			                </dl>
			            </div>
						
                        <a event-node="insert_video" rel="post_feed" class="video-block" href="javascript:;" title="视频"> <img src="/images/index/vedio.png"/>视频</a>
    
                    	<input type="hidden" id="postvideourl" value="">
                        <div model-node="faceDiv" style="position: relative;"></div>	
                	</div>
                </div>
            </div>
            
           
    </div>
    
    <!--<div class="W_layer" id="divVideo" node-type="outer" style=" left: 679px;top: 374px; display:none;"><div class="W_bg"><table cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><div class="content" node-type="layoutContent"><a class="W_close" href="javascript:void(0);" onclick="doing.closeVideo();" node-type="close" title="关闭"></a><div node-type="inner"><div class=" layer_send_medias" style="width:302px;" node-type="outer"><div class="tab W_textb"><p><a class="current W_texta" node-type="tabs" action-type="switchTab" action-data="type=0" href="javascript:void(0);">在线视频</a></p></div><div node-type="inner"><div node-type="content"><div class="laMed_inp"><input node-type="videoInput" action-type="videoInput" type="text" class="W_input inp_video" value="请输入视频播放页地址" style="color:#999" id="videourl"> <a href="javascript:void(0);" class="W_btn_a" action-type="videoSubmit" onclick="core.video.video_add();"><span>确定</span></a></div><div class="laMed_con W_textb W_linkb">请输入优酷网、土豆网、音悦台播放页的链接</div></div></div></div></div></div></td></tr></tbody></table><div class="arrow arrow_t" node-type="arrow"></div></div></div>
<div class="W_layer" id="divMusic" node-type="outer" style=" left: 616px; top: 374px; display:none;"><div class="W_bg"><table cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><div class="content" node-type="layoutContent"><a class="W_close" href="javascript:void(0);" onclick="doing.closeMusic();" node-type="close" title="关闭"></a><div node-type="inner"><div class="layer_send_music" node-type="outer"><div class="tab W_textb"><p><a href="javascript:void(0);" action-type="tabSelect" node-type="tabSelect" class=" current W_texta">输入音乐链接</a></div><div node-type="block" class="laMed_border" style=""><div class="laMed_con W_textb W_linkb">填写音乐文件的网址。(后缀需要是mp3或者wma)</div><div class="laMed_inp"><input action-type="inputAction" type="text" style="color: rgb(153, 153, 153);" node-type="linkInput" value="请输入音乐文件链接" class="W_input inp_music"><a class="W_btn_a" onclick="return false;" node-type="searchLink" href="javascript:void(0)"><span>确定</span></a></div></div></div></div></td></tr></tbody></table><div class="arrow arrow_t" node-type="arrow"></div></div></div>-->
</div>

@else
<div model-node="weibo_post_box" class="clearfix">
  <div class="input_before" model-node="mini_editor" style='margin:0 0 5px 0'>
    <textarea id="message_inputor" class="input_tips" event-node="mini_editor_textarea" event-args='parentHeight=60' model-args="t=repostweibo" style="height: 61px; width: 447px; margin: 0px;">{{$initHtml}}</textarea>
    <div model-node="numsLeft" class="num">{{$initNums}}</div>
  </div>
  <div class="action clearfix"> <a href="javascript:;" class="btn-green-big right" event-node='post_share' event-args='sid={{$sid}}&type={{$stype}}&app_name={{$app_name}}&curid={{$curid}}&curtable={{$curtable}}'><span>{{L('PUBLIC_SHARE_STREAM')}}</span></a>
    <div class="acts"> <a class="face-block" href="javascript:;" event-node="comment_insert_face" title="表情"><i class="face"></i></a> </div>

     <!--[if !IE]><!--><label>
      <input type="checkbox" class="checkbox regular-checkbox" name="comment" value='1' id="comment"><span for="comment"></span>
      {!!L('PUBLIC_SENTWEIBO_TO',array('link'=>$space_link))!!}</label>
     <!--<![endif]-->
     <!--[if IE]>
     <label>
      <input type="checkbox" class="checkbox" name="comment" value='1'>
      {!!L('PUBLIC_SENTWEIBO_TO',array('link'=>$space_link))!!}</label>
     <![endif]-->

    <div class="clear"></div>
    <div model-node="faceDiv"></div>
  </div>
</div>
<script type="text/javascript">
$(function() {
	setTimeout(function() {
		core.weibo.checkNums($('#message_inputor').get(0));
		$('#message_inputor').focus();
	}, 500);
});
</script>

@endif