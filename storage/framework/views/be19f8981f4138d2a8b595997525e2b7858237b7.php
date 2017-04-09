<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />

        <div class="TA">
            <div class="b_ja">
               <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            </div>
            <div class="clear" style="height: 30px;"></div>
           
               <div class=" fleft">
                   <?php echo $__env->make('users.setting_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                  <div class="gexing_main" style="height: 700px;">
                      <div class="gexing_main_nav">
                          <h3>设置我的新头像</h3>
                      </div>
                      <div class="photo_main">
                          <!--<div class="photo_main_top">
                              温馨提示：[√]表示审核通过，[×]表示未通过，[?]表示审核中。请上传您的单人真实照片，要求五官清晰。
                          </div>-->
                          <div class="photo_main_upload">
                              <div class="fleft photo_main_upload_img " >
                                  <img src="<?php echo e($user->avatar); ?>" alt="" width="120px;"/>
                                  形象照
                              </div>
                              <div class="photo_main_upload_info fleft">
                                  <!--<p><span>审核状态：</span>还没设置形象照</p>-->
                                  <form  method="post" action="/settings/update-avatar" enctype="multipart/form-data" id="avatar-form">
	                                  <input type="file" id="avatarinput" name="avatar" style="display: none;" >
                                    <!--  <p><span>上传头像：</span><input type="file" id="avatarinput" name="avatar" ></p>-->
                                      <p class="photo_main_upload_info_p">
                                          <button id="submit" class="upload-btn" type="button">上传新头像</button>
                                          <input type="submit" value="上传" id="avatarinput-submit" style="display: none;" />
                                      </p>
                                  </form>
                              </div>
                              <div class="clear"></div>
                              <div style="margin-left: 30px;margin-top: 30px;line-height: 40px;">
                                  <p style="color: #F05380;">温馨提示：</p>
                                  <p>点击浏览，选择您想要上传作为形象照的照片;</p>
                                  <p>仅支持PNG,JPG,JPEG,GIF格式,5M以下文件;</p>
                                  <p>请上传您的单人真实照片，要求五官清晰。请勿上传明星、名人活他人照片，您将对此负法律责任;</p>
                                  <p>如果您的照片被会员投诉为假照片，经查实会将您列入网站黑名单，以后都将无法注册和登录。</p>
                              </div>
                              <p style="margin-top: 60px;margin-left: 350px;">
                              <!--<input type="submit" name="" value="保存" class="gexing_btn" style="width: 100px;" />
                              <input type="button" name="" value="继续下一项" class="gexing_btn" style="width: 100px;"  />-->
                          </p>
                          </div>
                      </div>
                  </div>
                    
                         
        </div>
    </div>
    <div class="clear"></div>
<script type="text/javascript">
	$(function(){
		
		$(".upload-btn").on("click", function() {
			$("#avatarinput").click()
		}), $("#avatarinput").change(function() {
			layer.load(1, {
			  shade: [0.1,'#fff'] //0.1透明度的白色背景
			});
			$("#avatarinput-submit").click();
		});
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>