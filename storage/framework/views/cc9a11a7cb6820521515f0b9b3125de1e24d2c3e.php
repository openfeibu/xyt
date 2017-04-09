 

<?php $__env->startSection('title'); ?>
<?php echo e($user->username); ?> <?php echo e(trans('hifone.users.info')); ?>_@parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/space.css')); ?>" type="text/css" rel="stylesheet" />
<link href="<?php echo e(asset('build/dist/css/myhomepage.css')); ?>" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo e(asset('/build/dist/js/tab.js')); ?>"></script>
<script images/(\w+)\.jpgtype="text/javascript" src="<?php echo e(asset('/build/dist/js/choose.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jwidget_1.0.0.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.caret.js')); ?>"></script>
<script src="<?php echo e(asset('/js/ui.core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/ui.draggable.js')); ?>"></script>
<script src="<?php echo e(asset('/js/plugins/core.digg.js')); ?>"></script>
<script src="<?php echo e(asset('/js/plugins/core.comment.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.atwho.js')); ?>"></script>
<script src="<?php echo e(asset('/js/weiba.js')); ?>"></script>
 <div class="clear"></div>
    <div style="height: 30px;"></div>
    <div class="TA">
        <div class="left_content">
            <img src="<?php echo $user->avatar; ?>" width="227" height="227" alt=""/>
            <div style="text-align: center">
                <p><?php echo $user->username; ?></p>
                <p><?php echo e($user->work); ?>/<?php echo e($user->school); ?></p>
                <div>

                    <img src="<?php echo e(asset('images/index/mobile.png')); ?>" alt=""/>
                </div>
                <table>
                    <tr>
                        <td align="center" width="80"><?php echo e($user->follower_count); ?></td>
                        <td align="center" width="80"><?php echo e($user->following_count); ?></td>
                        <td align="center" width="80"><?php echo e($user->view_count); ?></td>
                    </tr>
                    <tr>
                        <td align="center">被关注</td>
                        <td align="center">关注</td>
                        <td align="center">访问</td>
                    </tr>
                </table>
                <?php if(Auth::id() == $user->id): ?>
				<ul class="user_detail_ul">
					<li><a href="<?php echo e(route('profile.base')); ?>"><i class="icon_account png"></i><span>我的设置</span></a></li>
					<li><a href="<?php echo e(route('pay.index')); ?>"><i class="icon_home png"></i><span>积分充值</span></a></li>               
            	</ul>
                <?php else: ?>
                
                <table class="table_2">
                    <tr>
                    <td align="left" width="80">
                        <a data-type="User" data-id="<?php echo e($user->id); ?>" data-url="<?php echo e(route('follow.user',$user->id)); ?>" class="followbtn">
                            <img src="<?php echo e(asset('images/index/jgz.png')); ?>"/> <br/>
                            <span class="follow_text">加为关注</span>
                        </a>
                    </td>
                    <td align="center" width="80">
                        <a href="#wall">
                            <img src="<?php echo e(asset('images/index/fyj.png')); ?>" alt="发送邮件"/> <br/>
                            给TA留言
                        </a>
                    </td>
                    <td align="right" width="80">
                        <a href="javascript:ajaxgethtml('<?php echo e(route('gift',['user_id' => $user->id])); ?>');" class="send_click">
                            <img src="<?php echo e(asset('images/index/slw.png')); ?>" alt="赠送礼物"/> <br/>
                            赠送礼物
                        </a>
                    </td>
                    </tr>
                </table>
				<?php endif; ?>
                <div style="height: 12px;"></div>
                <div class="hb" id="hongbao_show" style="width:210px;font-size:12px;">
                    <span></span>
                    <img src="<?php echo e(asset('images/index/hb.png')); ?>" alt=""/>
                    给象牙塔网站埋个红包
                </div>

                <!-- ***********红包*************** -->
                <div class="clear"></div>
                    <div class="reward" id="hongbao" style="display: none;width: 600px;height: 550px;margin-left: 250px;margin-top:-300px;" >
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                象牙塔-高校单身校友大联盟
                            </span>
                            <span id="hongbao_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="clear"></div>
                            <p style="text-align: center">给XXX的一封信</p>
                            <p style="text-align: left;margin-left: 5px;">Hi</p>
                            <p style="text-align: left;margin-left: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;爱速度就奥斯卡阿萨德啊实打实的asf ；啥看法是joas啊实打实的assaa送还好几个客户应根据公开科技馆加工费分复古风格好和规范化</p>
                            <br />
                            <p style="text-align: left;margin-left: 5px;">
                                <img src="<?php echo e(asset('images/index/wechat.png')); ?>" alt="" />
                                <dl>
                                    <dd>微信联谊公众号：1233123123</dd>
                                    <dd>联谊活动QQ：1232323123</dd>
                                </dl>
                            </p>
                            <p class="reward_input">
                                <input type="text" name="" value="20元" readOnly="true"/>
                                <input type="text" name="" value="50元" readOnly="true"/>
                                <input type="text" name="" value="" style="margin-right: 10px;" />
                                其他金额
                                <input type="submit" id="hongbao_submit" value="埋个红包>" />
                            </p>
                            <div class="clear" style="height: 40px;"></div>
                            <div class="clear" style="text-align: left;margin-left: 5px;border-bottom: 2px #e2e1e1 dotted;height: 40px;line-height: 50px;"><h3>感谢下列朋友对象牙塔网站的大力支持：</h3></div>
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                9分钟前在《大飒飒的啊实打实大声道啊哈哈》hasjkdhasd给股市渔夫打赏了40朵鲜花
                            </p>
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                9分钟前在《大飒飒的啊实打实大声道啊哈哈》hasjkdhasd给股市渔夫打赏了40朵鲜花
                            </p>
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                9分钟前在《大飒飒的啊实打实大声道啊哈哈》hasjkdhasd给股市渔夫打赏了40朵鲜花
                            </p>
                        </form>
                    </div>
                <!-- ***********红包*************** -->


                <div class="TA_dynamic" id="tab1s">
                    <ul>
                        <li id="tow1" onclick="setTab('tow',1)" class="off">我的来访</li>
                        <li id="tow2" onclick="setTab('tow',2)">我的足迹</li>
                        <li id="tow3" onclick="setTab('tow',3)" style="margin-right: 0px;">我的关注</li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="TA_dynamic2">
                    <div id="con_tow_1" class="TA_dynamic_div">
                        <ul>
                            <?php foreach($user_views as $key => $user_view): ?>
                            <li><a href="<?php echo e(route('user.home',$user_view->view_user_id)); ?>"><img src="<?php echo e($user_view->avatar); ?>" alt=""/></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div id="con_tow_2" class="TA_dynamic_div" style="display: none;">
                        <ul>
                            <?php foreach($user_viewings as $key => $user_viewing): ?>
                            <li><a href="<?php echo e(route('user.home',$user_viewing->user_id)); ?>"><img src="<?php echo e($user_viewing->avatar); ?>" alt=""/></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div id="con_tow_3" class="TA_dynamic_div" style="display: none;">
                        <ul>
	                        <?php foreach($followings as $key => $follow): ?>
                            <li><a href="<?php echo e(route('user.home',$follow->followable_id)); ?>"><img src="<?php echo e($follow->avatar); ?>" alt=""/></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

                   
        </div>
        <div class="right_content">
            <div class="TA_top">
                <ul id="TA_top">
                    <li id="one21" onclick="setTab_t('one2',1,'TA_top')" class="off">
                        <img src="<?php echo e(asset('images/index/TAimg_06.png')); ?>" alt="我的动态"/>
                        <p>我的动态</p>
                    </li>
                    <li id="one22" onclick="setTab_t('one2',2,'TA_top')">
                        <img src="<?php echo e(asset('images/index/TAimg_03.png')); ?>" alt="我的资料"/>
                        <p>我的资料</p>
                    </li>
                    <li id="one23" onclick="setTab_t('one2',3,'TA_top')">
                        <img src="<?php echo e(asset('images/index/TAimg_09.png')); ?>" alt="我的照片"/>
                        <p>我的照片</p>
                    </li>
                    <li id="one24"  style="margin-right: 0;" onclick="setTab_t('one2',4,'TA_top')">
                        <img src="<?php echo e(asset('images/index/TAimg_11.png')); ?>" alt="我的要求"/>
                        <p>我的要求</p>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div id="con_one2_1" class="TA_bottom" style="display: block">
                 <ul id="TA_bottom1">
                     <li ><a href="<?php echo e(route('user.home',$user->id)); ?>">全部</a></li>
                     <li onclick="showDynamic('blog')" >日志(0)</li>
                     <li onclick="showDynamic('activity')">活动(0)</li>
                     <li onclick="showDynamic('space')">说说(0)</li>
                     <li onclick="showDynamic('thread')">话题(0)</li>
                     <li onclick="showDynamic('gift')">礼物(0)</li>
                     <li onclick="showDynamic('vote')">投票(9)</li>
                     <li onclick="showDynamic('repost')" style="margin-right: 0;">分享(0)</li>
                 </ul>
                <div class="clear"></div>
                <div id="con_tow2_1" class="TA_bottom_div" style="display: block;">
                    <?php echo e(Widget::FeedList($var)); ?>

                </div>
                <div  class="TA_bottom_div dynamic" id="dynamic">
                    
                </div>
                
                <div class="clear"></div>
            </div>
            <div id="con_one2_2" class="TA_bottom">
           <!-- *********我的资料************ -->
           <div class="my_data">
               <div class="my_data_top">
                   <span class="fleft" style="margin-left: 10px;"><?php echo e($user->username); ?>（ID：<?php echo e($user->id); ?>）
                   <!--<font style="color: #51B837">在线（现在）</font>-->
                   </span>
                   <!--<span class="fright" style="margin-right: 10px;">恋爱状态：<font style="color: red">寻觅中</font><font style="color: #51B837">（更新）</font></span>-->
                   
               </div>
               <div class="mydata_level">
                   <p>已有<?php echo e($user->view_count); ?>人次访问，<?php echo e($user->score); ?>个积分，<?php echo e($user->coin); ?>个象牙币</p>
                   <p>用户组别：<font style="color: #51B837"><?php echo e($role->display_name); ?></font></p>
                   <p>诚信星级：
                        <?php for($i = 0; $i < $star['star']; $i++): ?>
						    <?php echo handerStar(1); ?>

						<?php endfor; ?>
						<?php for($i = 0; $i < 6 - $star['star']; $i++): ?>
						    <?php echo handerStar(0); ?>

						<?php endfor; ?>
                        
                   </p>
                   <p>创建时间：<?php echo e($user->created_at); ?></p>
                   <!--<p>上次登录：12分钟前</p>-->
                   <p id="email_show">电子邮件：
                   		 <?php if(Auth::id() == $user->id): ?>
                   		 <?php echo e($user->email); ?>

                   		 <?php else: ?>
                   		 <?php echo e($user->email); ?>

                   		<!-- <img src="<?php echo e(asset('images/index/data_email.png')); ?>" alt="" />邮箱联络卡-->
                   		 <?php endif; ?>
                        
                   </p>
                   <!-- *************邮箱道具****begin********** -->
                   <!-- 
                   <div class="clear"></div>
                    <div class="reward" id="email" style="display: none;width: 550px;height: 350px;margin-left:150px;">
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                购买道具
                            </span>
                            <span id="email_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="<?php echo e(asset('images/index/buy_email.png')); ?>" alt="" />
                            </div>
                            <div class="email_right fleft" style="width:350px">
                                <p>邮箱联络卡</p>
                                <p>可以查看TA的邮箱号码</p>
                                <p>增加经验：<font style="color: #51B837;">1</font></p>
                                <p>道具单价：<font style="color: #51B837;">180</font>象牙币</p>
                                <p>现有库存：<font style="color: #51B837;">997</font>个</p>
                                <p class="email_right_input">购买数量<input type="text" name="" />个（当前最多可以购买0个）</p>
                                <p><input type="submit" name="" id="buy_email" value="购买" /></p>
                            </div>
                        </form>
                    </div>
                    -->
                    <!-- *************邮箱道具****end********** -->
                   <p id="qq_show">QQ号码：
                   		<?php if(Auth::id() == $user->id): ?>
                   			<?php echo e($user->qq); ?>

                   		<?php else: ?>
                   			<?php echo e($user->qq); ?>

                   			<!--<img src="<?php echo e(asset('images/index/data_qq.png')); ?>" alt="" />QQ联络卡-->
                   		<?php endif; ?>
                        
                   </p>
                   <!-- *************qq道具****begin********** -->
                   <!-- 
                   <div class="clear"></div>
                    <div class="reward" id="qq" style="display: none;width: 550px;height: 350px;margin-left:150px;">
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                购买道具
                            </span>
                            <span id="qq_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="<?php echo e(asset('images/index/buy_qq.png')); ?>" alt="" />
                            </div>
                            <div class="email_right fleft" style="width:350px">
                                <p>QQ联络卡</p>
                                <p>可以查看TA的QQ号码</p>
                                <p>增加经验：<font style="color: #51B837;">1</font></p>
                                <p>道具单价：<font style="color: #51B837;">180</font>象牙币</p>
                                <p>现有库存：<font style="color: #51B837;">997</font>个</p>
                                <p class="email_right_input">购买数量<input type="text" name="" />个（当前最多可以购买0个）</p>
                                <p><input type="submit" name="" id="buy_qq" value="购买" /></p>
                            </div>
                        </form>
                    </div>
                    -->
                    <!-- *************qq道具****end********** -->
                   <p id="wechat_show">微信号码：
                   		<?php if(Auth::id() == $user->id): ?>
                   			<?php echo e($user->weixin); ?>

                   		<?php else: ?>
                   			<?php echo e($user->weixin); ?>

                   			<!--<img src="<?php echo e(asset('images/index/data_wechat.png')); ?>" alt="" />微信联络卡-->
                   		<?php endif; ?>
                        
                   </p>
                   <!-- *************微信道具****begin********** -->
                   <!-- 
                   <div class="clear"></div>
                    <div class="reward" id="wechat" style="display: none;width: 550px;height: 350px;margin-left:150px;">
                        <div class="reward_top clear">
                            <span class="fleft" style="margin-left: 20px;">
                                购买道具
                            </span>
                            <span id="wechat_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="<?php echo e(asset('images/index/buy_wechat.png')); ?>" alt="" />
                            </div>
                            <div class="email_right fleft" style="width:350px">
                                <p>微信联络卡</p>
                                <p>可以查看TA的微信号码</p>
                                <p>增加经验：<font style="color: #51B837;">1</font></p>
                                <p>道具单价：<font style="color: #51B837;">180</font>象牙币</p>
                                <p>现有库存：<font style="color: #51B837;">997</font>个</p>
                                <p class="email_right_input">购买数量<input type="text" name="" />个（当前最多可以购买0个）</p>
                                <p><input type="submit" name="" id="buy_wechat" value="购买" /></p>
                            </div>
                        </form>
                    </div>
					<div class="clear"></div>
					-->
                    <!-- *************微信道具****end********** -->
               </div>
               <div class="mydata_main">
                   <p>基本资料</p>

                   	<ul class="spacemenu_list">
						<li><span class="font_z">性别：</span><?php echo e($base_data['sex']['value'][$user->sex]); ?></li>
						<li><span class="font_z">星座：</span> <?php echo e(getConstellation($user->birthday)); ?> </li>
						<li><span class="font_z">生日：</span><?php echo e($user->birthday); ?></li>
						<?php if($user->height): ?>
						<li><span class="font_z">身高：</span><?php echo e($user->height); ?> 厘米</li>
						<?php endif; ?>
						<?php if($user->blood): ?>
						<li><span class="font_z">血型：</span><?php echo e($base_data['blood']['value'][$user->blood]); ?></li>
						<?php endif; ?>
						<?php if($user->education): ?>
						<li><span class="font_z">学历：</span><?php echo e($base_data['education']['value'][$user->education]); ?></li>
						<?php endif; ?>
						<li><span class="font_z">大学：</span><?php echo e($user->school); ?></li>
						<?php if($user->income): ?>
						<li><span class="font_z">月薪：</span><?php echo e($base_data['income']['value'][$user->income]); ?></li>
						<?php endif; ?>
						<?php if($user->industry): ?>
						<li><span class="font_z">行业：</span><?php echo e($user->industry); ?></li>
						<?php endif; ?>
						<?php if($user->work): ?>
						<li><span class="font_z">职业：</span><?php echo e($user->work); ?></li>
						<?php endif; ?>
						<?php if($user->house): ?>
						<li><span class="font_z">住房：</span><?php echo e($base_data['house']['value'][$user->house]); ?></li>
						<?php endif; ?>
						<?php if($user->marriage): ?>
						<li><span class="font_z">婚姻：</span><?php echo e($base_data['marriage']['value'][$user->marriage]); ?></li>
						<?php endif; ?>
						<?php if($user->homeplace): ?>
						<li><span class="font_z">家乡：</span><?php echo e($user->homeplace); ?></li>
						<?php endif; ?>
						<?php if($user->location): ?>
						<li><span class="font_z">现居：</span><?php echo e($user->location); ?></li>
						<?php endif; ?>
						<?php if($user->smoke): ?>
						<li><span class="font_z">是否吸烟：</span><?php echo e($base_data['smoke']['value'][$user->smoke]); ?></li>
						<?php endif; ?>
						<?php if($user->drink): ?>
						<li><span class="font_z">是否喝酒：</span><?php echo e($base_data['drink']['value'][$user->drink]); ?></li>
						<?php endif; ?>
						<?php if($user->weight): ?>
						<li><span class="font_z">体重：</span><?php echo e($user->weight); ?>公斤(KG)</li>
						<?php endif; ?>
						<?php if($user->bodytype): ?>
						<li><span class="font_z">体型：</span><?php echo e($base_data['bodytype']['value'][$user->bodytype]); ?></li>
						<?php endif; ?>
						<?php if($user->minority): ?>
						<li><span class="font_z">民族：</span><?php echo e($base_data['minority']['value'][$user->minority]); ?></li>
						<?php endif; ?>
						<?php if($user->religion): ?>
						<li><span class="font_z">宗教：</span><?php echo e($base_data['religion']['value'][$user->religion]); ?></li>
						<?php endif; ?>
						
					</ul>
                 
               </div>
               <div class="monologue">
                    <p>
                       <span class="span_left">内心独白</span>
                       <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="<?php echo e(route('profile.dating')); ?>">编辑</a></span>
                    </p>
                    <p style="color: #818181"><?php if($user_dating): ?><?php echo e($user_dating->aboutme); ?><?php endif; ?></p>
               </div>
               <div class="monologue">
                   <p>
                       <span class="span_left">个性信息</span>
                       <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="<?php echo e(route('profile.detail')); ?>">编辑</a></span>
                    </p>
                    <?php if($user_detail): ?>
	                    <?php foreach($detail_data as $key => $value): ?>
		               	<?php if($user_detail->$key): ?> <p><span class="font_z"><?php echo e($value['desc']); ?>：</span><?php echo e($user_detail->$key); ?></p><?php endif; ?>
		               	<?php endforeach; ?>
	               	<?php endif; ?>
                    
               </div>
               <div class="monologue">
                   <p>
                       <span class="span_left">幸福宣言</span>
                       <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="<?php echo e(route('profile.happy')); ?>">编辑</a></span>
                    </p>
                    <?php if($user_happy): ?>
	                    <?php foreach($happy_data as $key => $value): ?>
		               	<?php if($user_happy->$key): ?><p><span class="font_z"><?php echo e($value['desc']); ?>：</span><?php if($value['type'] == 'select'): ?><?php echo e($value['value'][$user_happy->$key]); ?><?php else: ?> <?php echo e($user_happy->$key); ?> <?php endif; ?> </p><?php endif; ?>
		               	<?php endforeach; ?>
	               	<?php endif; ?>
                    
               </div>
               
               
           </div>
           <!-- *********我的资料************ -->
            </div>
            <div id="con_one2_3" class="TA_bottom">
                <div class="my_photo">
                    <p>
                        <span class="fleft" style="margin-top: 20px;margin-left: 20px;">相册</span>
                        <span class="fright"  style="margin-top: 20px;margin-right: 10px;">
                            <a href="<?php echo e(route('album.upload_common')); ?>" class="active">上传新图片</a>
                        </span>
                    </p>
                    <div class="clear"></div>
                    <div class="showAlbums" id="showAlbums">
	                    
	                </div>                    
                </div>
            </div>
            <div id="con_one2_4" class="TA_bottom">
                <div class="my_require">
                    <div class="my_require_list">
                        <span class="fleft">择偶标准</span>
                        <a class="fright" href="<?php echo e(route('profile.standard')); ?>" style="margin-left: 0px;margin-right: 20px;color: #51B837">编辑</a>
                    </div>
                    <?php if($user_standard): ?>
                    
                    <?php if($user_standard->oplocation): ?>
                    <div class="my_require_list">
                        <span class="fleft">征友地区：<?php echo e($user_standard->oplocation); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opage): ?>
                    <div class="my_require_list">
                        <span class="fleft">年龄：<?php echo e($standard_data['opage']['value'][$user_standard->opage]); ?>至<?php echo e($standard_data['opage2']['value'][$user_standard->opage2]); ?>岁</span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opheight): ?>
                    <div class="my_require_list">
                        <span class="fleft">身高：<?php echo e($user_standard->opheight); ?>至<?php echo e($user_standard->opheight2); ?>厘米</span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opmarriage): ?>
                    <div class="my_require_list">
                        <span class="fleft">婚姻：<?php echo e($standard_data['opmarriage']['value'][$user_standard->opmarriage]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opeducation): ?>
                    <div class="my_require_list">
                        <span class="fleft">学历：<?php echo e($standard_data['opeducation']['value'][$user_standard->opeducation]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opincome): ?>
                    <div class="my_require_list">
                        <span class="fleft">月收入：<?php echo e($standard_data['opincome']['value'][$user_standard->opincome]); ?></span>
                    </div>
                    <?php endif; ?>
                   <?php if($user_standard->opwork): ?>
                    <div class="my_require_list">
                        <span class="fleft">职业：<?php echo e($standard_data['opwork']['value'][$user_standard->opwork]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opsmoke): ?>
                    <div class="my_require_list">
                        <span class="fleft">是否吸烟：<?php echo e($standard_data['opsmoke']['value'][$user_standard->opsmoke]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opdrink): ?>
                    <div class="my_require_list">
                        <span class="fleft">是否喝酒：<?php echo e($standard_data['opsmoke']['value'][$user_standard->opdrink]); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php endif; ?>
                </div>
                
            </div>
            <div class="message_board" id="wall">
                    <div class="TA_bottom_title">
                        <span class="fleft span1">留言板</span>
                    </div>
                    <div class="clear"></div>
					<?php echo Widget::WallWidget([ 'tpl'=>'wall','post_id'=>$user->id, 'limit'=>'5','addtoend'=>0 ]); ?>

                </div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript">
        function show_gift_info(id,experience,price,num,uid){
            window.sessionStorage.setItem('gift_id',id);            
            $('#gift_radio'+id+'_'+uid).click();
            $('#gift_id'+uid).val($('#gift_radio'+id+'_'+uid).val());
            if($('#gift_radio'+id+'_'+uid).attr("checked")){
                $('.gift_select').css('border','2px #cbcbcb solid');
                $('.gift_select'+id).css('border','2px #51b837 solid');
            }
            $('.gift_experience').html(experience);
            $('.price').html(price);
            $('.gift_number').html(num);
        }

        function checkSubmit(id){
            var val=$('#gift_radio'+window.sessionStorage.getItem('gift_id')+'_'+id).val();
            
            if($('.send_number'+id).val() == "" || $('.send_number'+id).val() == 0){
                alert('礼物数量不能为0');
                return false;
            }else if(val == null){
                alert('还没选择礼物呢');
                return false;
            }else{
                $.post("<?php echo e(route('gift.sendGift')); ?>",'giftToUser='+$('#giftToUser').val()+'&gift_id='+window.sessionStorage.getItem('gift_id')+'&send_number='+$('.send_number'+id).val(),function(data){
                    window.sessionStorage.removeItem('gift_id');
                    if(data == 404){
                        alert('库存空空如也~~~换个礼物吧');window.location.reload();;
                    }else if(data == 403){
                        alert('数量不能大于库存');window.location.reload();;
                    }else if(data == 402){
                        alert('购买数量不得超过3个');window.location.reload();;
                    }else if(data == 200){
                        alert('赠送礼物成功');window.location.reload();;
                    }else if(data == 400){
                        alert('赠送礼物失败，请重试');window.location.reload();;
                    }
                });
            }
        }
            $(function(){
                $('.send_click').click(function(){
                    $('.send').show();

                })
                $('.buto').click(function(){
                    $('.send').hide();

                })
            })
			$('#reward_show').click(function(){
				$('#reward').show();
			});
			$('#reward_close').click(function(){
				$('#reward').hide();
			});
			$('#hongbao_show').click(function(){
				$('#hongbao').show();
			});
			$('#hongbao_close').click(function(){
				$('#hongbao').hide();
			});
			$('#email_show').click(function(){
				$('#email').show();
			});
			$('#email_close').click(function(){
				$('#email').hide();
			});
			$('#qq_show').click(function(){
				$('#qq').show();
			});
			$('#qq_close').click(function(){
				$('#qq').hide();
			});
			$('#wechat_show').click(function(){
				$('#wechat').show();
			});
			$('#wechat_close').click(function(){
				$('#wechat').hide();
			});
			
        </script>
	</div>
    <div class="clear"></div>
    <script>
	    function showDynamic(filtrate) {		
		    $(".TA_bottom_div").hide();
		    $(".dynamic").show();
			url = "<?php echo e(route('user.dynamic')); ?>" ;
			var parameter = {'type': filtrate ,'user_id':<?php echo e($user->id); ?>};
			ajaxget(url, 'dynamic',parameter);
		}
		$("#one23").click(function(){
			ajaxget('/album/albumAjax?user_id=<?php echo e($user->id); ?>', 'showAlbums');
		});
		
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>