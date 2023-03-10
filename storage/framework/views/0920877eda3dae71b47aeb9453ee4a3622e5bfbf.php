<select name="province" id="province" onchange="changeArea(this)"></select>
<select name="city" id="city" onchange="changeArea(this)"></select>
<input type="hidden" id="current_name" name="location" value="" />
<script type="text/javascript">
var json =  eval(<?php echo $list; ?>);			// 地区JSON数据
var arrNodeChild = new Array();		// 子树数组
var selected = '{$selected}';		// 默认选中的地区

// 地区初始化
var init = function() {
	selected = selected == '' ? $('#current').val() : selected;
	var arrSelect = selected.split(',');
	// 获取树形结构的子树
	var option1 = '<option value="0">请选择</option>';
	var option2 = '<option value="0">请选择</option>';
	$.each(json, function(i, n) {
		var selected1 = (n.id == arrSelect[0]) ? 'selected="selected"' : '';
		option1 += '<option value="' + n.id + '" ' + selected1 + '>' + n.title + '</option>'
		arrNodeChild[parseInt(i.replace(/area_/, ''))] = n.child;
		if(n.child !== null) {
			$.each(n.child, function(ii, nn) {
				if(n.id == arrSelect[0]) {
					var selected2 = (nn.id == arrSelect[1]) ? 'selected="selected"' : '';
					option2 += '<option value="' + nn.id + '" ' + selected2 + '>' + nn.title + '</option>';
				}
				arrNodeChild[ii] = nn.child;
				if(nn.child !== null) {
					$.each(nn.child, function(iii, nnn) {
						if(nn.id == arrSelect[1]) {
							var selected3 = (nnn.id == arrSelect[2]) ? 'selected="selected"' : '';
							option3 += '<option value="' + nnn.id + '" ' + selected3 + '>' + nnn.title + '</option>';
						}
						arrNodeChild[iii] = nnn.child;
					});
				}
			});
		}
	});
	$('#province').append(option1);
	$('#city').append(option2);
};
// 改变地区方法
var changeArea = function(obj) {
	var id = $(obj).attr('id');
	var val = $(obj).val();
	switch(id) {
		case 'province':
			$(".city_input").hide();
			$('#city_input').val('');
			if(arrNodeChild[val] !== null) {
				if(val == 0) {
					$('#city').html('<option value="0">请选择</option>');
					break;
				}
				var select = '<option value="0">请选择</option>';
				$.each(arrNodeChild[val], function(i, n) {
					select += '<option value="' + n.id + '">' + n.title + '</option>';
				});
				$('#city').html(select);
			}
 			break;
	}
	var current = new Array();
	typeof($('#province').val()) !== 'undefined' && current.push($('#province').val());
	typeof($('#city').val()) !== 'undefined' && current.push($('#city').val());
	$('#current').val(current.join(','));
	var currentName = new Array();
	$('#province option:selected').html() != '请选择' && currentName.push($('#province option:selected').html());
	$('#city option:selected').html() != '请选择' && currentName.push($('#city option:selected').html());
	$('#current_name').val(currentName.join(' '));
} 

init();
</script>