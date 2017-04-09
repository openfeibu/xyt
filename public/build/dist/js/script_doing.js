

//用于处理发布微博时的各个JS函数
var doing = {
    file: null,
    saytext: null,
    insertImageButton: null,
    aInserImage: null,
	VideoEmptyStr : '请输入视频播放页地址',
	MusicEmptyStr : '请输入音乐文件链接',

    init: function() {
        this.file = $('#myfile');
        this.saytext = $('#saytext');
        this.insertImageButton = $('#doingInsertImageButton');
        this.aInserImage = $('#insertImage');

        if (typeof (this.file) != 'undefined' && this.file != null) {
      		this.file.change(function(){
	      		//console.log(123);
      		});
        }
		$('#divVideo input[type=text]').focus(function () {
			if ($.trim($(this).val()) == doing.VideoEmptyStr) {
				$(this).val('');
			}
		});
		$('#divVideo input[type=text]').blur(function () {
			if ($.trim($(this).val()) == '') {
				$(this).val(doing.VideoEmptyStr);
			}
		});
		//$('#divVideo a.W_btn_a').click(function () {
		//	var txt = $('#divVideo input[type=text]');
		//	var _txtKeyword = $.trim(txt.val());
		//	if (_txtKeyword == doing.VideoEmptyStr || _txtKeyword.length == 0) {
		//		txt[0].focus();
		//		txt[0].select();
		//		return;
		//	}
		//	$('#saytext').val($('#divVideo input[type=text]').val());
		//	doing.closeVideo();
		//});
		$('#divMusic input[type=text]').focus(function () {
			if ($.trim($(this).val()) == doing.MusicEmptyStr) {
				$(this).val('');
			}
		});
		$('#divMusic input[type=text]').blur(function () {
			if ($.trim($(this).val()) == '') {
				$(this).val(doing.MusicEmptyStr);
			}
		});
		$('#divMusic a.W_btn_a').click(function () {
			var txt = $('#divMusic input[type=text]');
			var _txtKeyword = $.trim(txt.val());
			if (_txtKeyword == doing.MusicEmptyStr || _txtKeyword.length == 0) {
				txt[0].focus();
				txt[0].select();
				return;
			}
			$('#saytext').val($('#divMusic input[type=text]').val());
			doing.closeMusic();
		});
    },
	video_add:function(){
		var url = $('#videourl').val();
		
		var _this = this;
		$.post(SPACE_VIDEO_PARAM_URL,{url:url},function(res){
			console.log(res); // # medz
			eval("var data="+res);
			if(data.boolen==1 && data.title==1){
				$('#postvideourl').val(url);
				$('#saytext').val( data.data+' ' );
				$('#divVideo').remove();
				$("#feedType").val("postvideo");
			}else{
				ui.error(data.message);
			}
		});
		
		if("undefined" != typeof(core.weibo)){
			core.weibo.checkNums(this.textarea.get(0));				
		}
	    return false;
	},

    //检验微博的输入
    validate: function(obj) {
        if (doing.saytext) {
            var slen = strlen(doing.saytext.value);
            if (slen < 1 || slen > 140 || doing.saytext.value == '#请在这里输入自定义话题#' || doing.saytext.value == '随便说点什么吧...') {

                doing.saytext.style.backgroundColor = "red";
                setTimeout(function() { 
                    doing.saytext.style.backgroundColor = "#fff";
                }, 500);
                doing.saytext.focus();
                return false;
            }
        }
        doing.submitDoing(obj);
        return true;
    },

    //提交微博
    submitDoing: function(obj) {
        mainForm = obj.form;
        forms = $('#attachbody').getElementsByTagName("FORM");
        albumid = 0;
        nowUid = 0;
        ajaxupload();
    },

    //选择图片路劲以后做的动作
    fileUploadValueChanged: function() {
        imageurls = doing.file.value.split('\\');
        var filename = imageurls[imageurls.length - 1].split('.');
        ext = filename[filename.length - 1];
        if (ext.toLowerCase() != 'jpg' && ext.toLowerCase() != 'png' && ext.toLowerCase() != 'gif') {
            alert("请上传jpg,gif,或者png类型的图片文件");
            return false;
        }
        if (doing.saytext.value == '' || doing.saytext.value == '随便说点什么吧...')
            doing.saytext.value = "分享图片";

        doing.aInserImage.style.display = "none";
        //doing.insertImageButton.innerHTML = "<a href='#' onmouseover='doing.showImage();' onmouseout='doing.hideImage();' id='imageName' >" + imageurls[imageurls.length - 1].substring(1, 15) + "</a>&nbsp;&nbsp;";
        doing.insertImageButton.innerHTML = '<a id="imageName" style="background: none;">' + imageurls[imageurls.length - 1].substring(1, 15) + '</a>&nbsp;&nbsp;';
        doing.insertImageButton.innerHTML += '<a href="javascript:;" style="padding-left:0px;background: none;" onclick="doing.removeImageFile();" title="删除">x</>'
        doing.insertImageButton.innerHTML += "<span id='showmsg0'></span>";

        $('#attach_0').blur();
        $('#attach_0').style.display = "none";
	length_check();
        return false;
    },

    //删除要上传的图片
    removeImageFile: function() {
        doing.saytext.value = "";
        doing.insertImageButton.innerHTML = '<a id="insertImage" tabindex="3" href="javascript:void(0);" class="img" title="插入图片">图片</a>';
        $('#attach_0').style.display = "";
        $('#attach_0').outerHTML = $('#attach_0').outerHTML; ;
        $('#attach_0').onchange = this.fileUploadValueChanged;
        return false;
    },


    //显示图片
    showImage: function() {
        if ($('#showimage')) {
            $('#showimage').style.display = "inline";
        }
        else {
            doing.insertImageButton.innerHTML += "<div id='showimage' style='z-index:100;' ><img src='" + doing.file.value + "' /></div>";
            $('#showimage').style.position = "absolute";
            $('#showimage').style.top = getTop($('#imageName')) + 15 + "px";
            $('#showimage').style.left = getLeft($('#imageName')) + 15 + "px";
        }
        return false;
    },

    //隐藏图片
    hideImage: function() {
        //$('#showimage').style.display = "none";
        return false;
    },

    //插入话题
    insertTwitterTopic: function() {
        key = "请在这里输入自定义话题";
        if (document.createRange) {
            var s = window.getSelection();
            s.collapse(document.body, 0);
            if (!window.find(key)) {
                if (doing.saytext.value != '随便说点什么吧...') {
                    doing.saytext.value += "#" + key + "#";
                }
                else {
                    doing.saytext.value = "#" + key + "#";
                }
                window.find(key)
            }
            doing.saytext.focus();
            s.getRangeAt(0).select();
        }
        if (document.body.createTextRange) {
            var range = doing.saytext.createTextRange();
            if (!range.findText(key)) {
                if (doing.saytext.value != '随便说点什么吧...') {
                    doing.saytext.value += "#" + key + "#";
                }
                else {
                    doing.saytext.value = "#" + key + "#";
                }
                range.findText(key)
            }
            range.select();
        }


    },

    //插入话题
    insertTwitterBugTopic: function(key) {
        doing.saytext.value = "#" + key + "#";
        doing.saytext.focus();
        doing.saytext.value = "#" + key + "#";
        doing.saytext.focus();
        if (document.createRange) {
            var s = window.getSelection();
            s.collapse(document.body, doing.saytext.value.length);
            s.getRangeAt(doing.saytext.value.length - 1).select();
            doing.saytext.focus();
        }
    },
    //插入视频
    insertVideo: function(o) {
		doing.closeMusic();
		var offset = $(o).offset();
		$('#divVideo').css({'left': offset.left - $(o).width() - 5 + 'px', 'top': offset.top + $(o).height() + 8 + 'px'});
        $('#divVideo').show();
    },
    //关闭视频
    closeVideo: function(o) {
		$('#divVideo input[type=text]').val(doing.VideoEmptyStr);
        $('#divVideo').hide();
    },
    //插入音乐
    insertMusic: function(o) {
		doing.closeVideo();
		var offset = $(o).offset();
		$('#divMusic').css({'left': offset.left - $(o).width() - 5 + 'px', 'top': offset.top + $(o).height() + 8 + 'px'});
        $('#divMusic').show();
    },
    //关闭音乐
    closeMusic: function(o) {
		$('#divMusic input[type=text]').val(doing.MusicEmptyStr);
        $('#divMusic').hide();
    },
    //微博里图片的大小切换
    scaleImage: function(ele) {
        if (ele.parentNode.className == "doimagethumb" || ele.parentNode.className == "doimagemiddle") {
            ele = ele.parentNode;
            if (ele.nextSibling && ele.nextSibling.className == "doimagemiddle") {
                ele.style.display = "none";
                ele.nextSibling.style.display = "block";
            }
            if (ele.previousSibling && ele.previousSibling.className == "doimagethumb") {
                ele.style.display = "none";
                ele.previousSibling.style.display = "block";
            }
        }
        else {
            if (ele.nextSibling) {
                ele.style.display = "none";
                ele.nextSibling.style.display = "block";
            }
            if (ele.previousSibling) {
                ele.style.display = "none";
                ele.previousSibling.style.display = "block";
            }
        }
    },

    //微博里图片旋转

    rotate: function(ele, angle) {
        ele = ele.parentNode.parentNode;
        var id = ele.id;
        if ($("#" + id + ">a>img").length > 0)
            $("#" + id + ">a>img").rotateRight(angle);
        else
            $("#" + id + ">a>canvas").rotateRight(angle);
    },


    //提交微博完成后做的动作

    submitDoingCompelted: function(form, s) {
		s = s + '';
		var refer = s.split('&');
		var url = 'cp.php?ac=feed_ajax&' + refer[refer.length - 1].replace('new', '').split('"')[0];
		var x = new Ajax();
		
		x.get(url, function(result) {
			var span = document.createElement('ul');
			span.innerHTML = result;
			
			if ($('#feed_div'))
				$('#feed_div').insertBefore(span, $('#feed_div').childNodes[0]);
			if ($('#doinglist'))
				$('#doinglist').insertBefore(span, $('#doinglist').childNodes[0]);
		});
		doing.removeImageFile();
		var picids = $("input[id^='picid_']");
		picids.remove();
		//$('#maxlimit').innerHTML = "140";
		length_check();
		bind_micro_blog_btn();
		if (s != 0) {
			$('#twittersuccessfully').style.display = "block";
			//$('#twittersuccessfully').style.left = (getLeft($('#saytext')) - 2) + "px";
			//$('#twittersuccessfully').style.top = (getTop($('#saytext')) - 2) + "px";
			setTimeout(function() {$('#twittersuccessfully').style.display = "none";}, 1000);
		}
    },

    //转发微博后做的动作

    showShareCompelted: function(form, s) {
        var refer = s.split('&');
        var url = 'cp.php?ac=feed_ajax&' + refer[refer.length - 1].replace('new', '').split('"')[0];
        var feedid = form.split('_')[2];
        var x = new Ajax();
        x.get(url, function(result) {
            var span = document.createElement('span');
            span.innerHTML = result;
            if ($('#msgContainer'))
                $('#msgContainer').insertBefore(span, $('#msgContainer').childNodes[0]);

            if ($('#sharenum_top')) {
                $('#sharenum_top').innerHTML = parseInt($('#sharenum_top').innerHTML) + 1;
            }
            if ($('#sharenum_bottom')) {
                $('#sharenum_bottom').innerHTML = parseInt($('#sharenum_bottom').innerHTML) + 1;
            }

        //            if ($('sharenum_' + feedid)) {
        //                $('sharenum_' + feedid).innerHTML = parseInt($('sharenum_' + feedid).innerHTML) + 1;
        //            }
        });
    },

    commentAsDoing: function(val, id) {
        if (val == true) {
            $('textnumlimit' + id).style.display = "block";
            if (typeof id != 'undefined' && id != null) {
                $('docommform_btn' + id).onclick = function() {
                    if (strlen($('do_message' + id).value) > 140 || strlen($('do_message' + id).value) < 1) {
                        $('do_message' + id).style.backgroundColor = 'red';
                        setTimeout(function() { 
                            $('do_message' + id).style.backgroundColor = '#fff';
                        }, 500);
                        $('do_message' + id).focus();
                        return false;
                    }
                    if ($('docommform_' + id + '_detail')) {
                        ajaxpost('docommform_' + id + '_detail', 'docomment_get', 1);
                    }
                    else {
                        ajaxpost('docommform_' + id, 'docomment_get', 1);
                    }
                }
            }
        }
        else {
            $('textnumlimit' + id).style.display = "none";
            if (typeof id != 'undefined' && id != null) {
                $('docommform_btn' + id).onclick = function() {
                    if ($('docommform_' + id + '_detail'))
                        ajaxpost('docommform_' + id + '_detail', 'docomment_get', 1);
                    else
                        ajaxpost('docommform_' + id, 'docomment_get', 1);
                }
            }
        }
    }
};

//页面加载时，初始化

doing.init();

