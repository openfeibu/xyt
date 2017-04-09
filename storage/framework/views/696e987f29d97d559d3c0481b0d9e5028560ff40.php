<?php $__env->startSection('content'); ?>

<div class="b_p">
<div class="b_pl">高级搜索</div>
<div class="b_pr">
    <div class="content">
  
        <div class="" id="tab1s">
            <div class="Options">
                <ul>
					<a href="<?php echo e(route('search.index')); ?>">
						<li id="tow1" onclick="setTab('tow',1)" class="off" style="color:#51B837">高级方式查找 <span>|</span></li>
					</a>
					<a href="<?php echo e(route('search.friend')); ?>">
						<li id="tow2" onclick="setTab('tow',2)">&nbsp;查找男女朋友 <span>|</span></li>
					</a>
					<a href="<?php echo e(route('search.city')); ?>">
						<li id="tow3" onclick="setTab('tow',3)">&nbsp;查找同城的人 <span>|</span></li>
					</a>
					<a href="<?php echo e(route('search.townee')); ?>">
						<li id="tow4" onclick="setTab('tow',4)">&nbsp;查找老乡 <span>|</span></li>
					</a>
					<a href="<?php echo e(route('search.birthday')); ?>">
						<li id="tow5" onclick="setTab('tow',5)">&nbsp;查找同年同月同日生的人 <span>|</span></li>
					</a>
					<a href="<?php echo e(route('search.classmate')); ?>">
						<li id="tow6" onclick="setTab('tow',6)">&nbsp;查找你的同学 <span>|</span></li>
					</a>
					<a href="<?php echo e(route('search.colleague')); ?>">
						<li id="tow7" onclick="setTab('tow',7)">&nbsp;查找你的同事 <span>|</span></li>
					</a>
					<a href="<?php echo e(route('search.accurate')); ?>">
						<li id="tow8" onclick="setTab('tow',8)">&nbsp;精确查找 </li>
					</a>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="">
                <div id="con_tow_1">
                    <div style="height: 20px;"></div>
                    <form action="<?php echo e(route('search.result',['page'=>1])); ?>" method="get" id="Options_form_1">
						<input type="hidden" name="hidden" value="this_search">
                        <table class="table_tow">
                            <tr>
                                <td align="right">昵称：</td>
                                <td><input type="text" name="nickname" class="Options_input"/></td>
                            </tr>
                            <tr>
                                <td align="right"><?php echo $basic_data['sex']['desc']; ?>：</td>
                                <td>
                                    <select name="sex" id="sex">
										<?php foreach($basic_data['sex']['value'] as $k=>$sex): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['sex']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><?php echo $basic_data['birthday']['desc']; ?>：</td>
                                <td>
                                    <select name="year" id="">
										<?php foreach($basic_data['birthday_year']['value'] as $k=>$birthday_year): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['birthday_year']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                    <select name="month" id="">
                                        <?php foreach($basic_data['birthday_month']['value'] as $k=>$birthday_month): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['birthday_month']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
									<select name="day" id="">
                                        <?php foreach($basic_data['birthday_day']['value'] as $k=>$birthday_day): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['birthday_day']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['blood']['desc']; ?>：</td>
                                <td>
                                    <select name="blood" id="blood">
										<?php foreach($basic_data['blood']['value'] as $k=>$blood): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['blood']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['marriage']['desc']; ?>：</td>
                                <td>
                                    <select name="marriage" id="marriage">
										<?php foreach($basic_data['marriage']['value'] as $k=>$marriage): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['marriage']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['education']['desc']; ?>：</td>
                                <td>
                                    <select name="education" id="education">
										<?php foreach($basic_data['education']['value'] as $k=>$education): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['education']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">学校：</td>
                                <td><input type="text" name="school" class="Options_input"/></td>
                            </tr>
                            <tr>
                                <td align="right"><?php echo $basic_data['home_city']['desc']; ?>：</td>
                                <td>
                                    <?php echo e(Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'homeplace','name' => 'homeplace' ,'province_name' => 'home_province','city_name' => 'home_city','prefix' => 'home_'] )); ?>

                                </td>
                            </tr>
                            <tr>
                                <td align="right"><?php echo $basic_data['city']['desc']; ?>：</td>
                                <td>
                               		<?php echo e(Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'location','name' => 'location' ,'province_name' => 'province','city_name' => 'city','prefix' => ''] )); ?>

                                </td>
                            </tr>
							<tr>
                                <td align="right">年龄：</td>
                                <td>
                                    <select name="age_min" id="age_min">
										<option value="0">请选择</option>
										<?php foreach($standard_data['opage']['value'] as $k=>$opage): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $standard_data['opage']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
									<span>至</span>
									<select name="age_max" id="age_max">
										<option value="0">请选择</option>
										<?php foreach($standard_data['opage2']['value'] as $k=>$opage2): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $standard_data['opage2']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">身高：</td>
                                <td>
                                    <select name="height_min" id="height_min">
										<option value="0">请选择</option>
										<?php foreach($standard_data['opheight']['value'] as $k=>$opheight): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $standard_data['opheight']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
									<span>至</span>
									<select name="height_max" id="height_max">
										<option value="0">请选择</option>
										<?php foreach($standard_data['opheight2']['value'] as $k=>$opheight2): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $standard_data['opheight2']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['income']['desc']; ?>：</td>
                                <td>
                                    <select name="income" id="income">
										<?php foreach($basic_data['income']['value'] as $k=>$income): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['income']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['house']['desc']; ?>：</td>
                                <td>
                                    <select name="house" id="house">
										<?php foreach($basic_data['house']['value'] as $k=>$house): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['house']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['work']['desc']; ?>：</td>
                                <td>
                                    <select name="work" id="work">
										<?php foreach($basic_data['work']['value'] as $k=>$work): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['work']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">诚信星级：</td>
                                <td>
                                    <select name="" id="">
                                        <option value="">不限&nbsp;</option>
                                        <option value="信用高">信用高</option>
										<option value="信用一般">信用一般</option>
										<option value="信用差">信用差</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">是否有头像：</td>
                                <td>
                                    <select name="avatar_url" id="">
                                        <option value="0">不限&nbsp;</option>
                                        <option value="1">有</option>
										<option value="2">无</option>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['smoke']['desc']; ?>：</td>
                                <td>
                                    <select name="smoke" id="smoke">
										<?php foreach($basic_data['smoke']['value'] as $k=>$smoke): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['smoke']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
							<tr>
                                <td align="right"><?php echo $basic_data['drink']['desc']; ?>：</td>
                                <td>
                                    <select name="drink" id="drink">
										<?php foreach($basic_data['drink']['value'] as $k=>$drink): ?>
                                        <option value="<?php echo $k; ?>"><?php echo $basic_data['drink']['value'][$k]; ?>&nbsp;</option>
										<?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div style="width: 100%;margin-top:50px; ">
                        <input type="submit" name="" value="搜索" class="search"/>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>