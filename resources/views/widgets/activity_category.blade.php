<select name="{{$province_name}}" id="{{$prefix}}parentid" onchange="{{$prefix}}changeCate(this)" class="select"></select>
<select name="{{$city_name}}" id="{{$prefix}}cateid" onchange="{{$prefix}}changeCate(this)" class="select"></select>
<input type="hidden" id="{{$prefix}}catecurrent" name="{{$prefix}}cate_ids" value="{{$selected}}"/>
<input type="hidden" id="{{$prefix}}catecurrent_name" name="{{$name}}" value="{{$current_name}}" />
<script type="text/javascript">
var {{$prefix}}json =  eval({!! $list !!});			// 分类JSON数据
var {{$prefix}}arrCateNodeChild = new Array();		// 子树数组
// 分类初始化
var {{$prefix}}init = function(selected) {
	var arrSelect = selected.split(',');
	// 获取树形结构的子树
	var option1 = '<option value="0">请选择</option>';
	var option2 = '<option value="0">请选择</option>';
	$.each({{$prefix}}json, function(i, n) {
		var selected1 = (n.id == arrSelect[0]) ? 'selected="selected"' : '';
		option1 += '<option value="' + n.id + '" ' + selected1 + '>' + n.title + '</option>'
		{{$prefix}}arrCateNodeChild[parseInt(i.replace(/cata_/, ''))] = n.child;
		if(n.child !== null) {
			$.each(n.child, function(ii, nn) {
				if(n.id == arrSelect[0]) {
					var selected2 = (nn.id == arrSelect[1]) ? 'selected="selected"' : '';
					option2 += '<option value="' + nn.id + '" ' + selected2 + '>' + nn.title + '</option>';
				}
				{{$prefix}}arrCateNodeChild[ii] = nn.child;
				if(nn.child !== null) {
					$.each(nn.child, function(iii, nnn) {
						if(nn.id == arrSelect[1]) {
							var selected3 = (nnn.id == arrSelect[2]) ? 'selected="selected"' : '';
							option3 += '<option value="' + nnn.id + '" ' + selected3 + '>' + nnn.title + '</option>';
						}
						{{$prefix}}arrCateNodeChild[iii] = nnn.child;
					});
				}
			});
		}
	});
	$('#{{$prefix}}parentid').append(option1);
	$('#{{$prefix}}cateid').append(option2);
};
// 改变分类方法
var {{$prefix}}changeCate = function(obj) {
	var id = $(obj).attr('id');
	var val = $(obj).val();
	switch(id) {
		case '{{$prefix}}parentid':
			$(".city_input").hide();
			$('#city_input').val('');
			if(arrCateNodeChild[val] !== null) {
				if(val == 0) {
					$('#city').html('<option value="0">请选择</option>');
					break;
				}
				var select = '<option value="0">请选择</option>';
				$.each(arrCateNodeChild[val], function(i, n) {
					select += '<option value="' + n.id + '">' + n.title + '</option>';
				});
				$('#{{$prefix}}cateid').html(select);
			}
 			break;
	}
	var current = new Array();
	typeof($('#{{$prefix}}parentid').val()) !== 'undefined' && current.push($('#{{$prefix}}parentid').val());
	typeof($('#{{$prefix}}cateid').val()) !== 'undefined' && current.push($('#{{$prefix}}cateid').val());
	$('#{{$prefix}}catecurrent').val(current.join(','));
	var currentName = new Array();
	$('#{{$prefix}}parentid option:selected').html() != '请选择' && currentName.push($('#{{$prefix}}parentid option:selected').html());
	$('#{{$prefix}}cateid option:selected').html() != '请选择' && currentName.push($('#{{$prefix}}cateid option:selected').html());
	$('#catecurrent_name').val(currentName.join(' '));
} 

{{$prefix}}init('{{$selected}}');
</script>