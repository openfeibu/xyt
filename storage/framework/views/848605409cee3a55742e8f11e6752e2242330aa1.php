<select name="<?php echo e($province_name); ?>" id="<?php echo e($prefix); ?>parentid" onchange="<?php echo e($prefix); ?>changeCate(this)" class="select"></select>
<select name="<?php echo e($city_name); ?>" id="<?php echo e($prefix); ?>cateid" onchange="<?php echo e($prefix); ?>changeCate(this)" class="select"></select>
<input type="hidden" id="<?php echo e($prefix); ?>catecurrent" name="<?php echo e($prefix); ?>cate_ids" value="<?php echo e($selected); ?>"/>
<input type="hidden" id="<?php echo e($prefix); ?>catecurrent_name" name="<?php echo e($name); ?>" value="<?php echo e($current_name); ?>" />
<script type="text/javascript">
var <?php echo e($prefix); ?>json =  eval(<?php echo $list; ?>);			// 分类JSON数据
var <?php echo e($prefix); ?>arrCateNodeChild = new Array();		// 子树数组
// 分类初始化
var <?php echo e($prefix); ?>init = function(selected) {
	var arrSelect = selected.split(',');
	// 获取树形结构的子树
	var option1 = '<option value="0">请选择</option>';
	var option2 = '<option value="0">请选择</option>';
	$.each(<?php echo e($prefix); ?>json, function(i, n) {
		var selected1 = (n.id == arrSelect[0]) ? 'selected="selected"' : '';
		option1 += '<option value="' + n.id + '" ' + selected1 + '>' + n.title + '</option>'
		<?php echo e($prefix); ?>arrCateNodeChild[parseInt(i.replace(/cata_/, ''))] = n.child;
		if(n.child !== null) {
			$.each(n.child, function(ii, nn) {
				if(n.id == arrSelect[0]) {
					var selected2 = (nn.id == arrSelect[1]) ? 'selected="selected"' : '';
					option2 += '<option value="' + nn.id + '" ' + selected2 + '>' + nn.title + '</option>';
				}
				<?php echo e($prefix); ?>arrCateNodeChild[ii] = nn.child;
				if(nn.child !== null) {
					$.each(nn.child, function(iii, nnn) {
						if(nn.id == arrSelect[1]) {
							var selected3 = (nnn.id == arrSelect[2]) ? 'selected="selected"' : '';
							option3 += '<option value="' + nnn.id + '" ' + selected3 + '>' + nnn.title + '</option>';
						}
						<?php echo e($prefix); ?>arrCateNodeChild[iii] = nnn.child;
					});
				}
			});
		}
	});
	$('#<?php echo e($prefix); ?>parentid').append(option1);
	$('#<?php echo e($prefix); ?>cateid').append(option2);
};
// 改变分类方法
var <?php echo e($prefix); ?>changeCate = function(obj) {
	var id = $(obj).attr('id');
	var val = $(obj).val();
	switch(id) {
		case '<?php echo e($prefix); ?>parentid':
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
				$('#<?php echo e($prefix); ?>cateid').html(select);
			}
 			break;
	}
	var current = new Array();
	typeof($('#<?php echo e($prefix); ?>parentid').val()) !== 'undefined' && current.push($('#<?php echo e($prefix); ?>parentid').val());
	typeof($('#<?php echo e($prefix); ?>cateid').val()) !== 'undefined' && current.push($('#<?php echo e($prefix); ?>cateid').val());
	$('#<?php echo e($prefix); ?>catecurrent').val(current.join(','));
	var currentName = new Array();
	$('#<?php echo e($prefix); ?>parentid option:selected').html() != '请选择' && currentName.push($('#<?php echo e($prefix); ?>parentid option:selected').html());
	$('#<?php echo e($prefix); ?>cateid option:selected').html() != '请选择' && currentName.push($('#<?php echo e($prefix); ?>cateid option:selected').html());
	$('#catecurrent_name').val(currentName.join(' '));
} 

<?php echo e($prefix); ?>init('<?php echo e($selected); ?>');
</script>