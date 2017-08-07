<select name="{{$province_name}}" id="{{$prefix}}province" onchange="{{$prefix}}changeArea(this)" class="select"></select>
<select name="{{$city_name}}" id="{{$prefix}}city" onchange="{{$prefix}}changeArea(this)" class="select"></select>
<input type="hidden" id="{{$prefix}}current" name="{{$prefix}}city_ids" value="{{$selected}}"/>
<input type="hidden" id="{{$prefix}}current_name" name="{{$name}}" value="{{$current_name}}" />
<script type="text/javascript">
var {{$prefix}}json =  eval({!! $list !!});			// 地区JSON数据
var {{$prefix}}arrNodeChild = new Array();		// 子树数组
// 地区初始化
var {{$prefix}}init = function(selected) {
	var arrSelect = selected.split(',');
	// 获取树形结构的子树
	var option1 = '<option value="0">请选择</option>';
	var option2 = '<option value="0">请选择</option>';
	$.each({{$prefix}}json, function(i, n) {
		var selected1 = (n.id == arrSelect[0]) ? 'selected="selected"' : '';
		option1 += '<option value="' + n.id + '" ' + selected1 + '>' + n.title + '</option>'
		{{$prefix}}arrNodeChild[parseInt(i.replace(/area_/, ''))] = n.child;
		if(n.child !== null) {
			$.each(n.child, function(ii, nn) {
				if(n.id == arrSelect[0]) {
					var selected2 = (nn.id == arrSelect[1]) ? 'selected="selected"' : '';
					option2 += '<option value="' + nn.id + '" ' + selected2 + '>' + nn.title + '</option>';
				}
				{{$prefix}}arrNodeChild[ii] = nn.child;
				if(nn.child !== null) {
					$.each(nn.child, function(iii, nnn) {
						if(nn.id == arrSelect[1]) {
							var selected3 = (nnn.id == arrSelect[2]) ? 'selected="selected"' : '';
							option3 += '<option value="' + nnn.id + '" ' + selected3 + '>' + nnn.title + '</option>';
						}
						{{$prefix}}arrNodeChild[iii] = nnn.child;
					});
				}
			});
		}
	});
	$('#{{$prefix}}province').append(option1);
	$('#{{$prefix}}city').append(option2);
};
// 改变地区方法
var {{$prefix}}changeArea = function(obj) {
	var id = $(obj).attr('id');
	var val = $(obj).val();
	switch(id) {
		case '{{$prefix}}province':
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
				$('#{{$prefix}}city').html(select);
			}
 			break;
	}
	var current = new Array();
	typeof($('#{{$prefix}}province').val()) !== 'undefined' && current.push($('#{{$prefix}}province').val());
	typeof($('#{{$prefix}}city').val()) !== 'undefined' && current.push($('#{{$prefix}}city').val());
	$('#{{$prefix}}current').val(current.join(','));
	var currentName = new Array();
	$('#{{$prefix}}province option:selected').html() != '请选择' && currentName.push($('#{{$prefix}}province option:selected').html());
	$('#{{$prefix}}city option:selected').html() != '请选择' && currentName.push($('#{{$prefix}}city option:selected').html());
	$('#{{$prefix}}current_name').val(currentName.join(' '));
}

{{$prefix}}init('{{$selected}}');
</script>
