<table style="width: 100%; height: 100%;" class="pop_dialog_table">
<tbody>
<tr>
<td class="pop_topleft"></td>
<td class="pop_border"></td>
<td class="pop_topright"></td>
</tr>
<tr>
<td class="pop_border"></td>
<td class="pop_content">
<h2><span>选择学校</span></h2>
<div class="dialog_content">
<div class="dialog_body">
<ul id="popup-province">
@foreach($areas as $k => $area)	
<li @if($area->id == $area_id ) class="active_school" @endif>
<a href="javascript:;" onclick="loadschool({{ $area->id }})">{{ $area->title }}</a>
</li>
@endforeach
</ul>
<ul id="popup-unis">
@foreach($schools as $k => $school)		
<li>
<a href="javascript:;" id="{{$school->id}}">{{$school->name}}</a>
</li>
@endforeach
</ul>
</div>
<div class="dialog_buttons"><input dialog="1" value="关闭" class="input-submit" type="button" ></div>
</div>
</td>
<td class="pop_border"></td>
</tr>
<tr>
<td class="pop_bottomleft"></td>
<td class="pop_border"></td>
<td class="pop_bottomright"></td>
</tr>
</tbody>
</table>