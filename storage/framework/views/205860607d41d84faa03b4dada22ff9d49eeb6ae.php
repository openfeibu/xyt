<select name="<?php echo e($province_name); ?>" id="<?php echo e($prefix); ?>province" onchange="<?php echo e($prefix); ?>changeArea(this)" class="select"></select>
<select name="<?php echo e($city_name); ?>" id="<?php echo e($prefix); ?>city" onchange="<?php echo e($prefix); ?>changeArea(this)" class="select"></select>
<input type="hidden" id="<?php echo e($prefix); ?>current" name="<?php echo e($prefix); ?>city_ids" value="<?php echo e($selected); ?>"/>
<input type="hidden" id="<?php echo e($prefix); ?>current_name" name="<?php echo e($name); ?>" value="<?php echo e($current_name); ?>" />
<script type="text/javascript">
var <?php echo e($prefix); ?>json =  eval(<?php echo $list; ?>);			// 地区JSON数据
var <?php echo e($prefix); ?>arrNodeChild = new Array();		// 子树数组
// 地区初始化
var <?php echo e($prefix); ?>init = function(selected) {
	var arrSelect = selected.split(',');
	// 获取树形结构的子树
	var option1 = '<option value="0">请选择</option>';
	var option2 = '<option value="0">请选择</option>';
	$.each(<?php echo e($prefix); ?>json, function(i, n) {
		var selected1 = (n.id == arrSelect[0]) ? 'selected="selected"' : '';
		option1 += '<option value="' + n.id + '" ' + selected1 + '>' + n.title + '</option>'
		<?php echo e($prefix); ?>arrNodeChild[parseInt(i.replace(/area_/, ''))] = n.child;
		if(n.child !== null) {
			$.each(n.child, function(ii, nn) {
				if(n.id == arrSelect[0]) {
					var selected2 = (nn.id == arrSelect[1]) ? 'selected="selected"' : '';
					option2 += '<option value="' + nn.id + '" ' + selected2 + '>' + nn.title + '</option>';
				}
				<?php echo e($prefix); ?>arrNodeChild[ii] = nn.child;
				if(nn.child !== null) {
					$.each(nn.child, function(iii, nnn) {
						if(nn.id == arrSelect[1]) {
							var selected3 = (nnn.id == arrSelect[2]) ? 'selected="selected"' : '';
							option3 += '<option value="' + nnn.id + '" ' + selected3 + '>' + nnn.title + '</option>';
						}
						<?php echo e($prefix); ?>arrNodeChild[iii] = nnn.child;
					});
				}
			});
		}
	});
	$('#<?php echo e($prefix); ?>province').append(option1);
	$('#<?php echo e($prefix); ?>city').append(option2);
};
// 改变地区方法
var <?php echo e($prefix); ?>changeArea = function(obj) {
	var id = $(obj).attr('id');
	var val = $(obj).val();
	switch(id) {
		case '<?php echo e($prefix); ?>province':
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
				$('#<?php echo e($prefix); ?>city').html(select);
			}
 			break;
	}
	var current = new Array();
	typeof($('#<?php echo e($prefix); ?>province').val()) !== 'undefined' && current.push($('#<?php echo e($prefix); ?>province').val());
	typeof($('#<?php echo e($prefix); ?>city').val()) !== 'undefined' && current.push($('#<?php echo e($prefix); ?>city').val());
	$('#<?php echo e($prefix); ?>current').val(current.join(','));
	var currentName = new Array();
	$('#<?php echo e($prefix); ?>province option:selected').html() != '请选择' && currentName.push($('#<?php echo e($prefix); ?>province option:selected').html());
	$('#<?php echo e($prefix); ?>city option:selected').html() != '请选择' && currentName.push($('#<?php echo e($prefix); ?>city option:selected').html());
	$('#current_name').val(currentName.join(' '));
} 

<?php echo e($prefix); ?>init('<?php echo e($selected); ?>');
</script>