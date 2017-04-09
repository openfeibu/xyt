@extends('layouts.common')

@section('content')
	<link href="{{ asset('/build/dist/css/vote.css') }}" type="text/css" rel="stylesheet" />
    <div class="TA">
        <div class="b_ja">
            <img src="{{ asset('/build/dist//images/votelogo.png') }}" alt="" /><span style="color: #aaa;font-size: 16px;">投票</span>
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
                        <li class="select" style="color: #146500;">发起投票</li>
                        <li>返回我的投票</li>
                    </ul>
                </div>
                
                <div class="send_vote">
	                <form action="{{ route('vote.store') }}" method="post">
                    <p>投票主题：<input type="text" name="subject" class="input_text"/><a href="javascript:;" onclick="initIntro();" id="addtip"><font style="color: #146500;">添加投票详细说明</font></a></p>
                    <p class="vote_desc" id="intropoll" style="display:none">投票详情：<textarea id="message" class="textarea_text" name="message"></textarea></p>
                    <p>候选项&nbsp;1：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;2：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;3：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;4：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;5：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;6：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;7：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;8：<input type="text"  class="input_text" name="option[]"/></p>
                    <p>候选项&nbsp;9：<input type="text"  class="input_text" name="option[]"/></p>                   
                    <p>候选项&nbsp;10：<input type="text" class="input_text" name="option[]"/><a href="javascript:;" id="moretip" onclick="showMoreOption();"><font style="color: #146500;">增加更多选项</font></a></p>
                    <div id="moreoption" style="display: none;">
	                    <p>候选项&nbsp;11：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;12：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;13：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;14：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;15：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;16：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;17：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;18：<input type="text"  class="input_text" name="option[]"/></p>
	                    <p>候选项&nbsp;19：<input type="text"  class="input_text" name="option[]"/></p> 
	                    <p>候选项&nbsp;20：<input type="text"  class="input_text" name="option[]"/></p>
	                </div>
                    <p>可选选项：<select name="maxchoice" class="select1">
								<option value="1">
								单选
								</option>
								<option value="2">
								可多选，最多2项
								</option>
								<option value="3">
								可多选，最多3项
								</option>
								<option value="4">
								可多选，最多4项
								</option>
								<option value="5">
								可多选，最多5项
								</option>
								<option value="6">
								可多选，最多6项
								</option>
								<option value="7">
								可多选，最多7项
								</option>
								<option value="8">
								可多选，最多8项
								</option>
								<option value="9">
								可多选，最多9项
								</option>
								<option value="10">
								可多选，最多10项
								</option>
								<option value="11">
								可多选，最多11项
								</option>
								<option value="12">
								可多选，最多12项
								</option>
								<option value="13">
								可多选，最多13项
								</option>
								<option value="14">
								可多选，最多14项
								</option>
								<option value="15">
								可多选，最多15项
								</option>
								<option value="16">
								可多选，最多16项
								</option>
								<option value="17">
								可多选，最多17项
								</option>
								<option value="18">
								可多选，最多18项
								</option>
								<option value="19">
								可多选，最多19项
								</option>
								<option value="20">
								可多选，最多20项
								</option>
								</select>
					</p>
                    <p>截止时间：<input type="text"  class="input_text"/></p>
                    <p>
                        投票限制：<input type="radio" name="sex" value="0" checked />不限制
                                    <input type="radio" name="sex" value="1" />男
                                    <input type="radio" name="sex" value="2" />女
                    </p>
                    <p>
                        评论限制：<input type="radio" name="noreply" value="0" checked/>不限制
                                    <input type="radio" name="noreply" value="1" />仅限好友
                    </p>
                    <p>
                        悬赏投票：<input type="radio" name="reward" value="0" checked/>否
                                    <input type="radio" name="reward" value="1" />是
                    </p>
                    <p>
                        动态选项：<input type="checkbox" name="makefeed" value="1" checked/>产生动态
                    </p>
                    <p><input type="submit" value="发起投票" id="submit"/></p>
                    </form>
                </div>
               
            </div>
          </div>
    </div>
<script type="text/javascript">

	var showMoreOption = function(){
		$("#moreoption").show();
		$("#moretip").hide();
	}
	var initIntro = function(){
		var introObj = $('#intropoll');
		var tipObj = $('#addtip');
		if(introObj.css('display') == 'none') {
			introObj.show();
			tipObj.text('隐藏投票详细说明');
		} else {	
			introObj.hide();
			$('#message').val('');
			tipObj.text("添加投票详细说明");
		}
	}
</script>
@stop