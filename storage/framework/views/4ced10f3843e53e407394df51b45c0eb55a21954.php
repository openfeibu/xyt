 

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
                        <td align="center">?????????</td>
                        <td align="center">??????</td>
                        <td align="center">??????</td>
                    </tr>
                </table>
                <?php if(Auth::id() == $user->id): ?>
				<ul class="user_detail_ul">
					<li><a href="<?php echo e(route('profile.base')); ?>"><i class="icon_account png"></i><span>????????????</span></a></li>
					<li><a href="<?php echo e(route('pay.index')); ?>"><i class="icon_home png"></i><span>????????????</span></a></li>               
            	</ul>
                <?php else: ?>
                
                <table class="table_2">
                    <tr>
                    <td align="left" width="80">
                        <a data-type="User" data-id="<?php echo e($user->id); ?>" data-url="<?php echo e(route('follow.user',$user->id)); ?>" class="followbtn">
                            <img src="<?php echo e(asset('images/index/jgz.png')); ?>"/> <br/>
                            <span class="follow_text">????????????</span>
                        </a>
                    </td>
                    <td align="center" width="80">
                        <a href="#wall">
                            <img src="<?php echo e(asset('images/index/fyj.png')); ?>" alt="????????????"/> <br/>
                            ???TA??????
                        </a>
                    </td>
                    <td align="right" width="80">
                        <a href="javascript:ajaxgethtml('<?php echo e(route('gift',['user_id' => $user->id])); ?>');" class="send_click">
                            <img src="<?php echo e(asset('images/index/slw.png')); ?>" alt="????????????"/> <br/>
                            ????????????
                        </a>
                    </td>
                    </tr>
                </table>
				<?php endif; ?>
                <div style="height: 12px;"></div>
                <div class="hb" id="hongbao_show" style="width:210px;font-size:12px;">
                    <span></span>
                    <img src="<?php echo e(asset('images/index/hb.png')); ?>" alt=""/>
                    ??????????????????????????????
                </div>

                <!-- ***********??????*************** -->
                <div class="clear"></div>
                    <div class="reward" id="hongbao" style="display: none;width: 600px;height: 550px;margin-left: 250px;margin-top:-300px;" >
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                ?????????-???????????????????????????
                            </span>
                            <span id="hongbao_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="clear"></div>
                            <p style="text-align: center">???XXX????????????</p>
                            <p style="text-align: left;margin-left: 5px;">Hi</p>
                            <p style="text-align: left;margin-left: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;?????????????????????????????????????????????asf ???????????????joas???????????????assaa????????????????????????????????????????????????????????????????????????????????????</p>
                            <br />
                            <p style="text-align: left;margin-left: 5px;">
                                <img src="<?php echo e(asset('images/index/wechat.png')); ?>" alt="" />
                                <dl>
                                    <dd>????????????????????????1233123123</dd>
                                    <dd>????????????QQ???1232323123</dd>
                                </dl>
                            </p>
                            <p class="reward_input">
                                <input type="text" name="" value="20???" readOnly="true"/>
                                <input type="text" name="" value="50???" readOnly="true"/>
                                <input type="text" name="" value="" style="margin-right: 10px;" />
                                ????????????
                                <input type="submit" id="hongbao_submit" value="????????????>" />
                            </p>
                            <div class="clear" style="height: 40px;"></div>
                            <div class="clear" style="text-align: left;margin-left: 5px;border-bottom: 2px #e2e1e1 dotted;height: 40px;line-height: 50px;"><h3>??????????????????????????????????????????????????????</h3></div>
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                9????????????????????????????????????????????????????????????hasjkdhasd????????????????????????40?????????
                            </p>
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                9????????????????????????????????????????????????????????????hasjkdhasd????????????????????????40?????????
                            </p>
                            <p class="clear" style="text-align: left;margin-left: 5px;color: #818181">
                                9????????????????????????????????????????????????????????????hasjkdhasd????????????????????????40?????????
                            </p>
                        </form>
                    </div>
                <!-- ***********??????*************** -->


                <div class="TA_dynamic" id="tab1s">
                    <ul>
                        <li id="tow1" onclick="setTab('tow',1)" class="off">????????????</li>
                        <li id="tow2" onclick="setTab('tow',2)">????????????</li>
                        <li id="tow3" onclick="setTab('tow',3)" style="margin-right: 0px;">????????????</li>
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
                        <img src="<?php echo e(asset('images/index/TAimg_06.png')); ?>" alt="????????????"/>
                        <p>????????????</p>
                    </li>
                    <li id="one22" onclick="setTab_t('one2',2,'TA_top')">
                        <img src="<?php echo e(asset('images/index/TAimg_03.png')); ?>" alt="????????????"/>
                        <p>????????????</p>
                    </li>
                    <li id="one23" onclick="setTab_t('one2',3,'TA_top')">
                        <img src="<?php echo e(asset('images/index/TAimg_09.png')); ?>" alt="????????????"/>
                        <p>????????????</p>
                    </li>
                    <li id="one24"  style="margin-right: 0;" onclick="setTab_t('one2',4,'TA_top')">
                        <img src="<?php echo e(asset('images/index/TAimg_11.png')); ?>" alt="????????????"/>
                        <p>????????????</p>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div id="con_one2_1" class="TA_bottom" style="display: block">
                 <ul id="TA_bottom1">
                     <li ><a href="<?php echo e(route('user.home',$user->id)); ?>">??????</a></li>
                     <li onclick="showDynamic('blog')" >??????(0)</li>
                     <li onclick="showDynamic('activity')">??????(0)</li>
                     <li onclick="showDynamic('space')">??????(0)</li>
                     <li onclick="showDynamic('thread')">??????(0)</li>
                     <li onclick="showDynamic('gift')">??????(0)</li>
                     <li onclick="showDynamic('vote')">??????(9)</li>
                     <li onclick="showDynamic('repost')" style="margin-right: 0;">??????(0)</li>
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
           <!-- *********????????????************ -->
           <div class="my_data">
               <div class="my_data_top">
                   <span class="fleft" style="margin-left: 10px;"><?php echo e($user->username); ?>???ID???<?php echo e($user->id); ?>???
                   <!--<font style="color: #51B837">??????????????????</font>-->
                   </span>
                   <!--<span class="fright" style="margin-right: 10px;">???????????????<font style="color: red">?????????</font><font style="color: #51B837">????????????</font></span>-->
                   
               </div>
               <div class="mydata_level">
                   <p>??????<?php echo e($user->view_count); ?>???????????????<?php echo e($user->score); ?>????????????<?php echo e($user->coin); ?>????????????</p>
                   <p>???????????????<font style="color: #51B837"><?php echo e($role->display_name); ?></font></p>
                   <p>???????????????
                        <?php for($i = 0; $i < $star['star']; $i++): ?>
						    <?php echo handerStar(1); ?>

						<?php endfor; ?>
						<?php for($i = 0; $i < 6 - $star['star']; $i++): ?>
						    <?php echo handerStar(0); ?>

						<?php endfor; ?>
                        
                   </p>
                   <p>???????????????<?php echo e($user->created_at); ?></p>
                   <!--<p>???????????????12?????????</p>-->
                   <p id="email_show">???????????????
                   		 <?php if(Auth::id() == $user->id): ?>
                   		 <?php echo e($user->email); ?>

                   		 <?php else: ?>
                   		 <?php echo e($user->email); ?>

                   		<!-- <img src="<?php echo e(asset('images/index/data_email.png')); ?>" alt="" />???????????????-->
                   		 <?php endif; ?>
                        
                   </p>
                   <!-- *************????????????****begin********** -->
                   <!-- 
                   <div class="clear"></div>
                    <div class="reward" id="email" style="display: none;width: 550px;height: 350px;margin-left:150px;">
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                ????????????
                            </span>
                            <span id="email_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="<?php echo e(asset('images/index/buy_email.png')); ?>" alt="" />
                            </div>
                            <div class="email_right fleft" style="width:350px">
                                <p>???????????????</p>
                                <p>????????????TA???????????????</p>
                                <p>???????????????<font style="color: #51B837;">1</font></p>
                                <p>???????????????<font style="color: #51B837;">180</font>?????????</p>
                                <p>???????????????<font style="color: #51B837;">997</font>???</p>
                                <p class="email_right_input">????????????<input type="text" name="" />??????????????????????????????0??????</p>
                                <p><input type="submit" name="" id="buy_email" value="??????" /></p>
                            </div>
                        </form>
                    </div>
                    -->
                    <!-- *************????????????****end********** -->
                   <p id="qq_show">QQ?????????
                   		<?php if(Auth::id() == $user->id): ?>
                   			<?php echo e($user->qq); ?>

                   		<?php else: ?>
                   			<?php echo e($user->qq); ?>

                   			<!--<img src="<?php echo e(asset('images/index/data_qq.png')); ?>" alt="" />QQ?????????-->
                   		<?php endif; ?>
                        
                   </p>
                   <!-- *************qq??????****begin********** -->
                   <!-- 
                   <div class="clear"></div>
                    <div class="reward" id="qq" style="display: none;width: 550px;height: 350px;margin-left:150px;">
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                ????????????
                            </span>
                            <span id="qq_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="<?php echo e(asset('images/index/buy_qq.png')); ?>" alt="" />
                            </div>
                            <div class="email_right fleft" style="width:350px">
                                <p>QQ?????????</p>
                                <p>????????????TA???QQ??????</p>
                                <p>???????????????<font style="color: #51B837;">1</font></p>
                                <p>???????????????<font style="color: #51B837;">180</font>?????????</p>
                                <p>???????????????<font style="color: #51B837;">997</font>???</p>
                                <p class="email_right_input">????????????<input type="text" name="" />??????????????????????????????0??????</p>
                                <p><input type="submit" name="" id="buy_qq" value="??????" /></p>
                            </div>
                        </form>
                    </div>
                    -->
                    <!-- *************qq??????****end********** -->
                   <p id="wechat_show">???????????????
                   		<?php if(Auth::id() == $user->id): ?>
                   			<?php echo e($user->weixin); ?>

                   		<?php else: ?>
                   			<?php echo e($user->weixin); ?>

                   			<!--<img src="<?php echo e(asset('images/index/data_wechat.png')); ?>" alt="" />???????????????-->
                   		<?php endif; ?>
                        
                   </p>
                   <!-- *************????????????****begin********** -->
                   <!-- 
                   <div class="clear"></div>
                    <div class="reward" id="wechat" style="display: none;width: 550px;height: 350px;margin-left:150px;">
                        <div class="reward_top clear">
                            <span class="fleft" style="margin-left: 20px;">
                                ????????????
                            </span>
                            <span id="wechat_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="<?php echo e(asset('images/index/buy_wechat.png')); ?>" alt="" />
                            </div>
                            <div class="email_right fleft" style="width:350px">
                                <p>???????????????</p>
                                <p>????????????TA???????????????</p>
                                <p>???????????????<font style="color: #51B837;">1</font></p>
                                <p>???????????????<font style="color: #51B837;">180</font>?????????</p>
                                <p>???????????????<font style="color: #51B837;">997</font>???</p>
                                <p class="email_right_input">????????????<input type="text" name="" />??????????????????????????????0??????</p>
                                <p><input type="submit" name="" id="buy_wechat" value="??????" /></p>
                            </div>
                        </form>
                    </div>
					<div class="clear"></div>
					-->
                    <!-- *************????????????****end********** -->
               </div>
               <div class="mydata_main">
                   <p>????????????</p>

                   	<ul class="spacemenu_list">
						<li><span class="font_z">?????????</span><?php echo e($base_data['sex']['value'][$user->sex]); ?></li>
						<li><span class="font_z">?????????</span> <?php echo e(getConstellation($user->birthday)); ?> </li>
						<li><span class="font_z">?????????</span><?php echo e($user->birthday); ?></li>
						<?php if($user->height): ?>
						<li><span class="font_z">?????????</span><?php echo e($user->height); ?> ??????</li>
						<?php endif; ?>
						<?php if($user->blood): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['blood']['value'][$user->blood]); ?></li>
						<?php endif; ?>
						<?php if($user->education): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['education']['value'][$user->education]); ?></li>
						<?php endif; ?>
						<li><span class="font_z">?????????</span><?php echo e($user->school); ?></li>
						<?php if($user->income): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['income']['value'][$user->income]); ?></li>
						<?php endif; ?>
						<?php if($user->industry): ?>
						<li><span class="font_z">?????????</span><?php echo e($user->industry); ?></li>
						<?php endif; ?>
						<?php if($user->work): ?>
						<li><span class="font_z">?????????</span><?php echo e($user->work); ?></li>
						<?php endif; ?>
						<?php if($user->house): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['house']['value'][$user->house]); ?></li>
						<?php endif; ?>
						<?php if($user->marriage): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['marriage']['value'][$user->marriage]); ?></li>
						<?php endif; ?>
						<?php if($user->homeplace): ?>
						<li><span class="font_z">?????????</span><?php echo e($user->homeplace); ?></li>
						<?php endif; ?>
						<?php if($user->location): ?>
						<li><span class="font_z">?????????</span><?php echo e($user->location); ?></li>
						<?php endif; ?>
						<?php if($user->smoke): ?>
						<li><span class="font_z">???????????????</span><?php echo e($base_data['smoke']['value'][$user->smoke]); ?></li>
						<?php endif; ?>
						<?php if($user->drink): ?>
						<li><span class="font_z">???????????????</span><?php echo e($base_data['drink']['value'][$user->drink]); ?></li>
						<?php endif; ?>
						<?php if($user->weight): ?>
						<li><span class="font_z">?????????</span><?php echo e($user->weight); ?>??????(KG)</li>
						<?php endif; ?>
						<?php if($user->bodytype): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['bodytype']['value'][$user->bodytype]); ?></li>
						<?php endif; ?>
						<?php if($user->minority): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['minority']['value'][$user->minority]); ?></li>
						<?php endif; ?>
						<?php if($user->religion): ?>
						<li><span class="font_z">?????????</span><?php echo e($base_data['religion']['value'][$user->religion]); ?></li>
						<?php endif; ?>
						
					</ul>
                 
               </div>
               <div class="monologue">
                    <p>
                       <span class="span_left">????????????</span>
                       <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="<?php echo e(route('profile.dating')); ?>">??????</a></span>
                    </p>
                    <p style="color: #818181"><?php if($user_dating): ?><?php echo e($user_dating->aboutme); ?><?php endif; ?></p>
               </div>
               <div class="monologue">
                   <p>
                       <span class="span_left">????????????</span>
                       <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="<?php echo e(route('profile.detail')); ?>">??????</a></span>
                    </p>
                    <?php if($user_detail): ?>
	                    <?php foreach($detail_data as $key => $value): ?>
		               	<?php if($user_detail->$key): ?> <p><span class="font_z"><?php echo e($value['desc']); ?>???</span><?php echo e($user_detail->$key); ?></p><?php endif; ?>
		               	<?php endforeach; ?>
	               	<?php endif; ?>
                    
               </div>
               <div class="monologue">
                   <p>
                       <span class="span_left">????????????</span>
                       <span class="span_right fright" style="margin-left: 0px;margin-right: -100px;"><a href="<?php echo e(route('profile.happy')); ?>">??????</a></span>
                    </p>
                    <?php if($user_happy): ?>
	                    <?php foreach($happy_data as $key => $value): ?>
		               	<?php if($user_happy->$key): ?><p><span class="font_z"><?php echo e($value['desc']); ?>???</span><?php if($value['type'] == 'select'): ?><?php echo e($value['value'][$user_happy->$key]); ?><?php else: ?> <?php echo e($user_happy->$key); ?> <?php endif; ?> </p><?php endif; ?>
		               	<?php endforeach; ?>
	               	<?php endif; ?>
                    
               </div>
               
               
           </div>
           <!-- *********????????????************ -->
            </div>
            <div id="con_one2_3" class="TA_bottom">
                <div class="my_photo">
                    <p>
                        <span class="fleft" style="margin-top: 20px;margin-left: 20px;">??????</span>
                        <span class="fright"  style="margin-top: 20px;margin-right: 10px;">
                            <a href="<?php echo e(route('album.upload_common')); ?>" class="active">???????????????</a>
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
                        <span class="fleft">????????????</span>
                        <a class="fright" href="<?php echo e(route('profile.standard')); ?>" style="margin-left: 0px;margin-right: 20px;color: #51B837">??????</a>
                    </div>
                    <?php if($user_standard): ?>
                    
                    <?php if($user_standard->oplocation): ?>
                    <div class="my_require_list">
                        <span class="fleft">???????????????<?php echo e($user_standard->oplocation); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opage): ?>
                    <div class="my_require_list">
                        <span class="fleft">?????????<?php echo e($standard_data['opage']['value'][$user_standard->opage]); ?>???<?php echo e($standard_data['opage2']['value'][$user_standard->opage2]); ?>???</span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opheight): ?>
                    <div class="my_require_list">
                        <span class="fleft">?????????<?php echo e($user_standard->opheight); ?>???<?php echo e($user_standard->opheight2); ?>??????</span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opmarriage): ?>
                    <div class="my_require_list">
                        <span class="fleft">?????????<?php echo e($standard_data['opmarriage']['value'][$user_standard->opmarriage]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opeducation): ?>
                    <div class="my_require_list">
                        <span class="fleft">?????????<?php echo e($standard_data['opeducation']['value'][$user_standard->opeducation]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opincome): ?>
                    <div class="my_require_list">
                        <span class="fleft">????????????<?php echo e($standard_data['opincome']['value'][$user_standard->opincome]); ?></span>
                    </div>
                    <?php endif; ?>
                   <?php if($user_standard->opwork): ?>
                    <div class="my_require_list">
                        <span class="fleft">?????????<?php echo e($standard_data['opwork']['value'][$user_standard->opwork]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opsmoke): ?>
                    <div class="my_require_list">
                        <span class="fleft">???????????????<?php echo e($standard_data['opsmoke']['value'][$user_standard->opsmoke]); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($user_standard->opdrink): ?>
                    <div class="my_require_list">
                        <span class="fleft">???????????????<?php echo e($standard_data['opsmoke']['value'][$user_standard->opdrink]); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php endif; ?>
                </div>
                
            </div>
            <div class="message_board" id="wall">
                    <div class="TA_bottom_title">
                        <span class="fleft span1">?????????</span>
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
                alert('?????????????????????0');
                return false;
            }else if(val == null){
                alert('?????????????????????');
                return false;
            }else{
                $.post("<?php echo e(route('gift.sendGift')); ?>",'giftToUser='+$('#giftToUser').val()+'&gift_id='+window.sessionStorage.getItem('gift_id')+'&send_number='+$('.send_number'+id).val(),function(data){
                    window.sessionStorage.removeItem('gift_id');
                    if(data == 404){
                        alert('??????????????????~~~???????????????');window.location.reload();;
                    }else if(data == 403){
                        alert('????????????????????????');window.location.reload();;
                    }else if(data == 402){
                        alert('????????????????????????3???');window.location.reload();;
                    }else if(data == 200){
                        alert('??????????????????');window.location.reload();;
                    }else if(data == 400){
                        alert('??????????????????????????????');window.location.reload();;
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