

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('/build/dist/js/choose.js')); ?>"></script>
<hr class="hr" />
<div class="left1">
<!--Luara图片切换骨架begin-->
<div class="example2">
<ul>
<li><img src="<?php echo e(asset('images/index/img4.jpg')); ?>" alt="1" width="646" height="298"/></li>
<li><img src="<?php echo e(asset('images/index/img4.jpg')); ?>" alt="2" width="646" height="298"/></li>
<li><img src="<?php echo e(asset('images/index/img4.jpg')); ?>" alt="3" width="646" height="298"/></li>
<li><img src="<?php echo e(asset('images/index/img4.jpg')); ?>" alt="4" width="646" height="298"/></li>
</ul>
</div>
<!--Luara图片切换骨架end-->
<script>
$(function(){
$(".example2").luara({width:"646",height:"298",interval:4500,selected:"seleted",deriction:"left"});
});
</script>
<div class="l_a">
<div class="l_atitle">
<a href="<?php echo e(route('user.rank')); ?>" ><strong>最新会员</strong></a>
<a href="<?php echo e(route('user.weekstar')); ?>" target="_blank" style="float:right; ">本周之星</a><a href="<?php echo e(route('user.birth_users')); ?>" target="_blank">今日生日会员</a>
</div>
<ul>
<?php foreach($new_girls as $key => $user): ?>
<li class="user_info_abroad"><a href="<?php echo e(route('user.home',$user->id)); ?>" class="user_info" rel='<?php echo e($user->id); ?>'><img src="<?php echo e($user->avatar); ?>" width="100" height="105" alt="" /></a><a href="#"><p>昵称：<?php echo e($user->username); ?></p><p>职业：<?php echo e($user->work); ?></p></a>
</li>
<?php endforeach; ?>
</ul>
<div class="l_aa"><a href="<?php echo e(route('user.more',['type' => 'girl'])); ?>">更多女士>></a></div>
<ul>
<?php foreach($new_boys as $key => $user): ?>
<li class="user_info_abroad"><a href="<?php echo e(route('user.home',$user->id)); ?>" class="user_info" rel='<?php echo e($user->id); ?>'><img src="<?php echo e($user->avatar); ?>" width="100" height="105" alt="" /></a><a href="#"><p>昵称：<?php echo e($user->username); ?></p><p>职业：<?php echo e($user->work); ?></p></a>
</li>

<?php endforeach; ?>
</ul>
<div class="l_aa"><a href="<?php echo e(route('user.more',['type' => 'boy'])); ?>">更多男士>></a></div>
<div class="l_ahoverb" id="search">
<div class="l_ahoverc">
<strong>象牙塔高校单身校友联盟</strong><span>关闭</span>
</div>
<div class="show"></div>
<div class="comment">
<div class="com_form">
<textarea class="input" id="saytext" name="saytext"></textarea>
<p><input type="button" class="sub_btn" value="提交"><span class="emotion">表情</span></p>
</div>
</div>
</div>
</div>
<div class="l_b">
<form action="<?php echo e(route('search.result',['page'=>1])); ?>" method="get" target='_blank'>
<input type="hidden" name="hidden" value="this_search">
<span>寻找：居住在</span><?php echo e(Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'location','name' => 'location' ,'province_name' => 'province','city_name' => 'city','prefix' => ''] )); ?>

<span>年龄</span>
<select name="age_min">
	<?php foreach($standard_data['opage']['value'] as $k=>$opage): ?><option value="<?php echo $k; ?>"><?php echo $standard_data['opage']['value'][$k]; ?></option> <?php endforeach; ?>
</select>
<span>-</span>
<select name="age_max">
	<?php foreach($standard_data['opage2']['value'] as $k=>$opage2): ?>
    <option value="<?php echo $k; ?>"><?php echo $standard_data['opage2']['value'][$k]; ?></option>
	<?php endforeach; ?>
</select><span>岁的</span>
<select style="width:90px;" name="sex">
<?php foreach($basic_data['sex']['value'] as $k=>$sex): ?>
<option value="<?php echo $k; ?>"><?php echo $basic_data['sex']['value'][$k]; ?>&nbsp;</option>
<?php endforeach; ?>
</select>
<input type="submit" value="搜索" />
</div>
</form>
<div class="l_c">
<div class="l_ctitle"><strong>精彩话题榜</strong><a href="<?php echo e(route('thread.index')); ?>">+更多</a></div>
<ul>
<?php $i=1 ;?>
<?php foreach($threads as $key => $thread): ?>
<li><a href="<?php echo e(route('thread.show',$thread->id)); ?>" target='_blank'><div class="l_clist"><span class="l_c1"><?php echo e($i); ?></span><span class="l_c2">【<?php echo e($thread->node_name); ?>】<?php echo e(handle_text($thread->title,20)); ?></span></div><div class="l_c5"><?php echo e($thread->updated_at); ?></div></a></li>
<?php $i++;?>
<?php endforeach; ?>

</ul>
</div>
<div class="l_d">
<div class="l_dtitle">
<strong>青春风采</strong><a href="<?php echo e(route('profile.base')); ?>">我要加入</a>
</div>
<div class="l_da">
上榜条件:<span><b>1.</b>设置清晰的形象照;</span><span><b>2.</b>资料完整度100%;</span><span><b>3.</b>通过身份实名认证</span>
</div>
<?php foreach($recommend_users as $key => $user): ?>
<a href="<?php echo e(route('user.home',$user->id)); ?>" class="l_db"><img src="<?php echo e($user->avatar); ?>" width="155" height="146" alt="" /> <span class="green"><?php echo e($user->username); ?></span>
<p>
  <?php echo getAge($user->birthday); ?>岁 <?php echo e(config('form_config.basic_data.education.value.'.$user->education)); ?> <?php echo e($user->work); ?><br />
<?php echo e($user->school); ?></p>
</a>
<?php endforeach; ?>

</div>
</div>
<!--------左边结束------------------->
<div class="right1">
<div class="r_a">
<div class="r_aa">动态公告：</div>
<div class="r_ab">
<div class="apple">
	<ul>
		<?php foreach($page_notices as $key=> $page): ?>
		<li><a href="javascript:;" target="_blank"><?php echo e($page->title); ?></a></li>
		<?php endforeach; ?>
    </ul>
</div>


<script type="text/javascript">
	  function autoScroll(obj){
			$(obj).find("ul").animate({
				marginTop : "-30px"
			},500,function(){
				$(this).css({marginTop : "0px"}).find("li:first").appendTo(this);
			})
		}
		$(function(){
			setInterval('autoScroll(".maquee")',3000);
			setInterval('autoScroll(".apple")',2000);

		})

</script>
</div>
</div>
<!--选项卡1--->
<div class="r_b" id="tab1s">
	<div class="menus">
		<ul>
			<li id="one1" onclick="setTab('one',1)" class="off">活动公告 </li>
			<li id="one2" onclick="setTab('one',2)">活动总结</li>
			<li id="one3" onclick="setTab('one',3)">活动照片</li>
			<li id="one4" onclick="setTab('one',4)">网站公告</li>
		</ul>
	</div>
	<div class="menudivs">
		<div id="con_one_1" class="con_one">
		<?php foreach($new_activities as $key => $activity): ?>
        <a href="#"><span class="r_b1"><?php echo e($activity->name); ?></span><span class="r_b2">已报<b><?php echo e($activity->join_count); ?>人</b></span></a>
        <?php endforeach; ?>

        </div>
		<div id="con_one_2" class="con_one" style="display:none;">
			<?php foreach($summaries as $key => $summary): ?>
	        <a href="<?php echo e(route('activity.summary',$summary->activity_id)); ?>"><span class="r_b1"><?php echo e($summary->title); ?></span></a>
	        <?php endforeach; ?>
		</div>
		<div id="con_one_3" style="display:none;">
			<img src="<?php echo e(asset('images/index/img6.jpg')); ?>" alt="" /><img src="<?php echo e(asset('images/index/img7.jpg')); ?>" alt="" />
		</div>
		<div id="con_one_4" class="con_one" style="display:none;">
			<?php foreach($announcements as $key => $announcement): ?>
	        <a href="javascript:;"><span class="r_b1"><?php echo e($announcement->title); ?></span></a>
	        <?php endforeach; ?>
		</div>
	</div>
</div>
<!--选项卡2--->
<div class="company_con" class="choose">

	<ul class="choose_nav">
		<li class="selected"><a href="javascript:void(0);" ondblclick="window.open('<?php echo e(route('space.index')); ?>')">最新说说</a></li>
		<li><a href="javascript:void(0);" ondblclick="window.open('<?php echo e(route('blog.index',['type' => 'new'])); ?>')">最新日记</a></li>
        <li><a href="javascript:void(0);" ondblclick="window.open('<?php echo e(route('blog.index',['type' => 'recommend'])); ?>')">热门日记</a></li>
	</ul>


	<div class="company_b2b clearfix r_c choose_list" >
	<?php echo $space_content; ?>

	</div>
	<div class="company_b2b company_b2b_p choose_list" style="display: none;">
		<?php foreach($new_blogs as $key => $blog): ?>
        <p><a href="<?php echo e(route('blog.show',$blog->id)); ?>"><?php echo e($blog->title); ?></a></p>
		<?php endforeach; ?>

	</div>
    <div class="company_b2b company_b2b_p choose_list" style="display: none;">
		<?php foreach($hot_blogs as $key => $blog): ?>
		<p><a href="<?php echo e(route('blog.show',$blog->id)); ?>"><?php echo e($blog->title); ?></a></p>
		<?php endforeach; ?>
	</div>



</div>
<!--选项卡2--->
<div class="company_con" class="choose">

	<ul class="choose_nav">
		<li class="selected"><a href="javascript:void(0);" ondblclick="window.open('<?php echo e(route('vote.index')); ?>')">最新投票</a></li>
		<li><a href="javascript:void(0);" ondblclick="window.open('<?php echo e(route('vote.index')); ?>')">热门投票</a></li>
	</ul>


	<div class="company_b2b company_b2b_p clearfix r_c choose_list" >
		<?php foreach($new_votes as $key => $vote): ?>
        <a style="display: block;" href="<?php echo e(route('vote.show',$vote->id)); ?>">
        <dl>
            <dd class="space_right_vote">
                <img src="<?php echo e(asset('images/index/xin.png')); ?>" alt="" style="width: 10px;height: 10px" class="fleft" />
                <span class="vote_span1 fleft"><?php echo e($vote->subject); ?></span>
                <span class="vote_span2 fright"><b style="color: red"><?php echo e($vote->user_count); ?>人</b>参与</span>
            </dd>
        </dl>
        </a>
        <?php endforeach; ?>
	</div>
	<div class="company_b2b company_b2b_p choose_list" style="display: none;">
		<?php foreach($hot_votes as $key => $vote): ?>
        <a style="display: block;" href="<?php echo e(route('vote.show',$vote->id)); ?>">
        <dl>
            <dd class="space_right_vote">
                <img src="<?php echo e(asset('images/index/xin.png')); ?>" alt="" style="width: 10px;height: 10px" class="fleft" />
                <span class="vote_span1 fleft"><?php echo e($vote->subject); ?></span>
                <span class="vote_span2 fright"><b style="color: red"><?php echo e($vote->user_count); ?>人</b>参与</span>
            </dd>
        </dl>
        </a>
        <?php endforeach; ?>
	</div>



</div>
<!--选项卡2-end-->
<!--<div class="r_d">
<div class="r_da">
<strong>热点辩论 </strong><a href="#">更多</a>
</div>
<h4>避孕谁来做更好？</h4>
<p>无论情侣还是夫妻，享受性的美好时都要避免baby的意外降
 临。男性和女性都有相应的避孕方式，男性可以用避孕套...</p>
 <dl>
 <div class="clear"></div>
 <dt> 观点：<a href="#" class="red">＃男性，主动避孕才是好男人＃ </a></dt>
 <dd><span><img src="<?php echo e(asset('images/index/img17.jpg')); ?>" width="236"  height="14" alt="" /></span><span class="r_db"><b class="red">4008</b> 票</span></dd>
 </dl>
 <dl>
 <div class="clear"></div>
 <dt> 观点：<a href="#" class="red">观点：＃女性，带套影响快感 ＃</a></dt>
 <dd><span><img src="<?php echo e(asset('images/index/img18.jpg')); ?>" width="236"  height="14" alt="" /></span><span class="r_db"><b class="red">4008</b> 票</span></dd>
 </dl>
  <div class="clear"></div>
  <p style="text-align:center;"><a href="#">参与讨论</a></p>
</div>-->

</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>