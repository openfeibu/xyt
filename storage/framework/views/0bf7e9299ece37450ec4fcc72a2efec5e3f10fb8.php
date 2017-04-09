<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
    <div class="clear"></div>

        <div class="TA">
            <div class="b_ja">
                <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            </div>
            <div class="clear" style="height: 30px;"></div>
           		<?php if(!empty(Session::get('data'))): ?>
				<?php $data = Session::get('data');?>
				<?php endif; ?> 
               <div class=" fleft">
                  	<?php echo $__env->make('users.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php $formTypePresenter = app('Hifone\Presenters\FormTypePresenter'); ?>			
                  <div class="gexing_main">
                      <?php echo $__env->make('users.profile.profile_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <div class="gexing_main_content">
						<form action="<?php echo e(route('profile.detail_update')); ?>" method="post">
							<?php echo e(csrf_field()); ?>

                          	<table style="COLOR: #666666" cellspacing="0" bordercolordark="#ffffff" cellpadding="5" width="717" align="center" bgcolor="#ffffff" bordercolorlight="#dddddd" border="0" class="formtable">
								<tbody>
								<tr>
								<td align="right" width="150" bgcolor="#ffffff">&nbsp;&nbsp;最难忘的事：</td>
								<td align="left" valign="top" bgcolor="#ffffff" colspan="2"><input class="input" id="nanwang" maxlength="100" size="50" name="nanwang" value="<?php echo e($data['nanwang']); ?>">
								</td></tr>
								<tr>
								<td align="right" width="150" bgcolor="#ffffff">&nbsp;&nbsp;我的个性：</td>
								<td align="left" valign="top" bgcolor="#ffffff" colspan="2"><input class="input" id="gexin" maxlength="225" size="50" name="gexin" value="<?php echo e($data['gexin']); ?>"> 
								</td></tr>
								<tr>
								<td align="right" width="150" bgcolor="#ffffff">&nbsp;&nbsp;朋友形容我：</td>
								<td align="left" valign="top" bgcolor="#ffffff" colspan="2"><input class="input" id="xingrong"  maxlength="450" size="50" name="xingrong" value="<?php echo e($data['xingrong']); ?>"> 
								</td></tr>

								<tr>
								<td width="150" align="right" bgcolor="#ffffff">&nbsp;&nbsp;我的优势：</td>
								<td align="left" valign="top" bgcolor="#ffffff" colspan="2">
								<input class="input" id="youshi" maxlength="100" size="50" name="youshi" value="<?php echo e($data['youshi']); ?>"> 
								<div id="tipinfo3"></div>

								</td></tr>

								<tr>
								<td width="150" align="right" bgcolor="#ffffff">&nbsp;&nbsp;希望寻找的TA：</td>
								<td align="left" valign="top" bgcolor="#ffffff" colspan="2">
								<input class="input" id="hope" maxlength="180" size="50" name="hope" value="<?php echo e($data['hope']); ?>"> 
								<div id="tipinfo4"></div>
								</td></tr>
								<tr>
								<td  width="150" align="right" >&nbsp;&nbsp;我想结交：</td>
								<td>
								<textarea name="trainwith" rows="3" cols="50"><?php echo e($data['trainwith']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;兴趣爱好：</td>
								<td>
								<textarea name="interest" rows="3" cols="50"><?php echo e($data['interest']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;喜欢的书籍：</td>
								<td>
								<textarea name="book" rows="3" cols="50"><?php echo e($data['book']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;喜欢的电影：</td>
								<td>
								<textarea name="movie" rows="3" cols="50"><?php echo e($data['movie']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;喜欢的电视：</td>
								<td>
								<textarea name="tv" rows="3" cols="50"><?php echo e($data['tv']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;喜欢的音乐：</td>
								<td>
								<textarea name="music" rows="3" cols="50"><?php echo e($data['music']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;喜欢的游戏：</td>
								<td>
								<textarea name="game" rows="3" cols="50"><?php echo e($data['game']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;喜欢的运动：</td>
								<td>
								<textarea name="sport" rows="3" cols="50"><?php echo e($data['sport']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;偶像：</td>
								<td>
								<textarea name="idol" rows="3" cols="50"><?php echo e($data['idol']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;座右铭：</td>
								<td>
								<textarea name="motto" rows="3" cols="50"><?php echo e($data['motto']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;最近心愿：</td>
								<td>
								<textarea name="wish" rows="3" cols="50"><?php echo e($data['wish']); ?></textarea>
								</td>
								</tr>
								<tr>
								<td width="150" align="right" >&nbsp;&nbsp;我的简介：</td>
								<td>
								<textarea name="intro" rows="3" cols="50"><?php echo e($data['intro']); ?></textarea>
								</td>

								<th style="width:10em;">&nbsp;</td>
								<td>
								
								</td>
								</tr>
								</tbody>
							</table>
							<p style="margin-left: 350px;margin-top: 40px;">
                              <input type="submit" name="profilesubmit" value="保存" class="gexing_btn" style="width: 100px;" />
                              <input type="button" name="nextsubmit" value="继续下一项" class="gexing_btn" style="width: 100px;"  />
                          	</p>
                        </form>
                      </div>
                      
                  </div>
                    
                         
        </div>
    </div>
    <div class="clear"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>