 @extends('layouts.common')

@section('content')
<div class="b_p">
<div class="b_pl">同学搜索</div>
<div class="b_pr">
    <div class="content">
  
        <div class="" id="tab1s">
            <div class="Options">
                <ul>
					<a href="{{route('search.index')}}">
						<li id="tow1" onclick="setTab('tow',1)" class="off">高级方式查找 <span>|</span></li>
					</a>
					<a href="{{route('search.friend')}}">
						<li id="tow2" onclick="setTab('tow',2)">&nbsp;查找男女朋友 <span>|</span></li>
					</a>
					<a href="{{route('search.city')}}">
						<li id="tow3" onclick="setTab('tow',3)">&nbsp;查找同城的人 <span>|</span></li>
					</a>
					<a href="{{route('search.townee')}}">
						<li id="tow4" onclick="setTab('tow',4)">&nbsp;查找老乡 <span>|</span></li>
					</a>
					<a href="{{route('search.birthday')}}">
						<li id="tow5" onclick="setTab('tow',5)">&nbsp;查找同年同月同日生的人 <span>|</span></li>
					</a>
					<a href="{{route('search.classmate')}}">
						<li id="tow6" onclick="setTab('tow',6)" style="color:#51B837">&nbsp;查找你的同学 <span>|</span></li>
					</a>
					<a href="{{route('search.colleague')}}">
						<li id="tow7" onclick="setTab('tow',7)">&nbsp;查找你的同事 <span>|</span></li>
					</a>
					<a href="{{route('search.accurate')}}">
						<li id="tow8" onclick="setTab('tow',8)">&nbsp;精确查找 </li>
					</a>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="">
                <div id="con_tow_6" >
                    <div style="height: 20px;"></div>
                    <form action="{{route('search.result',['page'=>1])}}" method="get">
						<input type="hidden" name="hidden" value="this_search">
                        <table class="table_tow">
                            <tr>
                                <td align="right">学校：</td>
                                <td>
                                    <input type="text" class="Options_input"/>
									<select name="enrol_year" id="enrol_year">
										@foreach($basic_data['enrol_year']['value'] as $k=>$enrol_year)
                                        <option value="{!!$k!!}">{!!$basic_data['enrol_year']['value'][$k]!!}&nbsp;</option>
										@endforeach
                                    </select>
                                </td>	
                            </tr>
                            <tr>
                                <td align="right">院系：</td>
                                <td>
                                    <input type="text" name="faculty" class="Options_input"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">姓名：</td>
                                <td>
                                    <input type="text" name="username" class="Options_input"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">昵称：</td>
                                <td>
                                    <input type="text" name="nickname" class="Options_input"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="search2" value="查找"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="clear"></div>
@stop
