/**
 * 赞核心Js
 * @type {Object}
 */
core.digg = {
	// 给工厂调用的接口
	_init: function (attrs) {
		core.digg.init();
	},
	init: function () {
		core.digg.digglock = 0;
	},
	addDigg: function (space_id) {
		// 未登录弹出弹出层
		if(MID == 0){
			ui.quicklogin();
			return;
		}
		
		if (core.digg.digglock == 1) {
			return false;
		}
		core.digg.digglock = 1;
		$.post(ADD_DIGG_URL, {space_id:space_id}, function (res) {
			if (res.status == 1) {
				$digg = {};
				if (typeof $('#digg'+space_id)[0] === 'undefined') {
					$digg = $('#digg_'+space_id);
				} else {
					$digg = $('#digg'+space_id);
				}
				var num = $digg.attr('rel');
				num++;
				$digg.attr('rel', num);

				$('#digg'+space_id).html('<a href="javascript:;" class="like-h digg-like-yes" title="取消赞" onclick="core.digg.delDigg('+space_id+')"><i class="digg-like"></i>('+num+')</a>');
				$('#digg_'+space_id).html('<a href="javascript:;" class="like-h digg-like-yes" title="取消赞" onclick="core.digg.delDigg('+space_id+')"><i class="digg-like"></i>('+num+')</a>');
			} else{
				ui.error(res.info);
			}
			core.digg.digglock = 0;
		}, 'json');
	},
	delDigg: function (space_id) {
		if (core.digg.digglock == 1) {
			return false;
		}
		core.digg.digglock = 1;
		$.post(DEL_DIGG_URL, {space_id:space_id}, function(res) {
			if (res.status == 1) {
				$digg = {};
				if (typeof $('#digg'+space_id)[0] === 'undefined') {
					$digg = $('#digg_'+space_id);
				} else {
					$digg = $('#digg'+space_id);
				}
				var num = $digg.attr('rel');
				num--;
				$digg.attr('rel', num);
				var content;

                if (num == 0) {
					content = '<a href="javascript:;" onclick="core.digg.addDigg('+space_id+')" title="赞"><i class="digg-like"></i></a>';
				} else {
					content = '<a href="javascript:;" onclick="core.digg.addDigg('+space_id+')" title="赞"><i class="digg-like"></i>('+num+')</a>';
				}
				$('#digg'+space_id).html(content);
				$('#digg_'+space_id).html(content);
			} else {
				ui.error(res.info);
			}
			core.digg.digglock = 0;
		}, 'json');
	}
};