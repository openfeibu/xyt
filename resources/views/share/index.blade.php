	<!-- 分享弹出窗 -->
	<div model-node='share_model' class="pop-share">

      <div class="forward-content">
      
      	<a href='{$oldInfo.source_user_info.space_url}' target='_blank'>{{$oldInfo['source_user_info']['username']}}</a>
      	<p>
      	<?php $sourceInfo = $oldInfo; ?> </php>
      		@if($shareInfo['shareHtml']!='')    		
      			{$shareInfo.shareHtml}
      		@else
      		{!!parse_html($sourceInfo['source_content'])!!}
			@endif	
      	</p>
      </div>
      	<div class="feed-repeat">

        <div class="input" model-node='share_input' event-args='to=weibo' style="position:static" id='share_input'>
        	{!!Widget::SendSpace(['send_type'=>'repost_space','oldUid'=>$oldInfo['source_user_info']['id'],'space_link'=>$oldInfo['source_user_info']['space_link'],'sid'=>$shareInfo['sid'],'app_name'=>$shareInfo['appname'],'stype'=>$shareInfo['stable'],'initHtml'=>$shareInfo['initHTML'],'curid'=>$shareInfo['curid'],'curtable'=>$shareInfo['curtable'],'cancomment'=>$shareInfo['cancomment']])!!} 
        </div>
        <div class="input" model-node='share_input' event-args='to=people' style='display:none;position:static'>

        <div id='share_message'>
      		<div model-node='share_comment_box' class="mb5">
			<div class="pt10 fw fold"  model-node='add_comment'>{{L('PUBLIC_ADD_COMMENT')}}<i class="arrow-open ml10"></i></div>
			<div class="feed-repeat" model-node='share_message'  style='display:none'>		
	  			<div model-node='weibo_post_box'>
	      		<div class="input_before mt10" model-node="mini_editor">
	      		<div model-node='facediv' rel="facediv" style="top:-10px"> </div>
					<textarea class="input_tips" id="share_inputor" event-node="mini_editor_textarea" hidefocus="true" event-args='parentHeight=60' style="height:52px;width:98.5%">{{$shareInfo['initHTML']}}</textarea>
          <div model-node="numsLeft" class="num">{{$initNums}}</div>
				</div>
				</div>
	     	</div>
     		</div>
           <div class="action clearfix center">
      <a href="javascript:void(0);" id="dosendmessage" class="btn-green-big right" event-node ="share_message" event-args="sid={{$shareInfo['sid']}}&app_name={{$shareInfo['appname']}}&type={{$shareInfo['stable']}}&curid={{$shareInfo['curid']}}&curtable={{$shareInfo['curtable']}}"><span>{{L('PUBLIC_SHARE_STREAM')}}</span></a>
           </div>
       </div> 
       </div> 
          </div>
 <script>

 core.loadFile(THEME_URL+'/js/plugins/core.at.js');
 
 core.loadFile(THEME_URL+'/js/module.share.js',function(){
  //去掉小名片
  $('#tsbox').find('a').each(function(){
    if($(this).attr('event-node') == 'face_card'){
      $(this).attr('event-node','no_face_card');
    }
  });
  core.loadFile(THEME_URL+'/js/module.weibo.js',function(){
      M(document.getElementById('tsbox'));
  });
 });
atWho($('#share_inputor'));
 //快捷方式
 shortcut('ctrl+return', sendmessage , {target:'share_message'});
 function sendmessage(){
	 document.getElementById('dosendmessage').click();
 }
 setTimeout(function (){
	 $('#message_inputor').focus();
 },300)
 </script>